#! /usr/bin/env python

# $URL: svn+bsb://svn.winnegan.de/svn/adm/trunk/mailman/postfix-to-mailman.py $
# $Id: postfix-to-mailman.py 38 2004-04-15 19:11:32Z bsb $
#
# Interface mailman to a postfix with a mailman transport. Does not require
# the creation of _any_ aliases to connect lists to your mail system.
#
# Dax Kelson, dkelson@gurulabs.com, Sept 2002.
# coverted from qmail to postfix interface
# Jan 2003: Fixes for Mailman 2.1
# Thanks to Simen E. Sandberg <senilix@gallerbyen.net>
# Feb 2003: Change the suggested postfix transport to support VERP
# Thanks to Henrique de Moraes Holschuh <henrique.holschuh@ima.sp.gov.br>
#
# Mar 2004: Siggy Brentrup <bsb@debian.org>
#   downloaded from http://www.gurulabs.com/files/postfix-to-mailman-2.1.py
#   and adopted for inclusion in the Debian Mailman package.
#   (hi Bruce, back to the roots :-)
#   rewritten for python >= 2.2 taking configuration from mm_cfg
#
# This script was originally qmail-to-mailman.py by:
# Bruce Perens, bruce@perens.com, March 1999.
# This is free software under the GNU General Public License.

# This script is meant to be called as a postfix transport pipe.

# It catches all mail to a virtual domain, eg "lists.example.com".  It
# looks at the recipient for each mail message and decides if the mail
# is addressed to a valid list or not, and optionally bounces the
# message with a helpful suggestion if it's not addressed to a
# list. It decides if it is a posting, a list command, or mail to the
# list administrator, by checking for the -admin, -owner, -request,
# -join, -leave, -subscribe and -unsubscribe addresses. It will
# recognize a list as soon as the list is created, there is no need to
# add _any_ aliases for any list.  It recognizes mail to postmaster,
# abuse and mailer-daemon, and routes those mails to DEB_LISTMASTER as
# defined in mm_cfg.py

# INSTALLATION:
#
# Install this file as /var/lib/mailman/bin/postfix-to-mailman.py
#
# To configure a virtual domain to connect to mailman, edit Postfix thusly:
#
# /etc/postfix/main.cf:
#    relay_domains = ... lists.example.com
#    transport_maps = hash:/etc/postfix/transport
#    mailman_destination_recipient_limit = 1
#
# /etc/postfix/master.cf
#    mailman unix  -       n       n       -       -       pipe
#      flags=FR user=list 
#      argv=/var/lib/mailman/bin/postfix-to-mailman.py ${nexthop} ${mailbox}
#
# /etc/postfix/transport:
#   lists.example.com   mailman:
#
# /etc/mailman/mm_cfg.py
#    MTA = None # No MTA alias processing required
#    # alias for postmaster, abuse and mailer-daemon
#    DEB_LISTMASTER = 'postmaster@example.com'
#
# Replace lists.example.com above with the name of the domain to be
# connected to Mailman. Note that _all_ mail to that domain will go to
# Mailman, so you don't want to put the name of your main domain
# here. Typically a virtual domain lists.domain.com is used for
# Mailman, and domain.com for regular email.
#
# With the sheer amount of spam using faked addresses it seems more
# appropriate to me to just reject non-existing addresses.  The old
# behavior sending a helpful bounce message is still configurable
# by defining DEB_HELP_TEXT in mm_cfg.

# Exit codes accepted by postfix
#  from postfix-2.0.16/src/global/sys_exits.h
EX_USAGE    = 64    # command line usage error 
EX_NOUSER   = 67    # addressee unknown
EX_SOFTWARE = 70    # internal software error
EX_TEMPFAIL = 75    # temporary failure

import sys, os
sys.path.append("/usr/lib/mailman/bin")
import paths

from Mailman import mm_cfg

def main():
    os.nice(5)     # Handle mailing lists at non-interactive priority.
                   # delete this if you wish

    try:
        MailmanOwner = mm_cfg.DEB_LISTMASTER
    except AttributeError:
        MailmanOwner = 'postmaster@localhost'

    try:
        domain, local = [ a.lower() for a in sys.argv[1:] ]
    except:
        # This might happen if we're not using Postfix or
        # /etc/postfix/master.cf is badly misconfigured
        sys.stderr.write('Illegal invocation: %r\n'
                         % ' '.join(sys.argv))
        if len(sys.argv) > 3:
            sys.stderr.write('Did you forget to set '
                             'mailman_destination_recipient_limit=1 '
                             'in main.cf?')
        sys.exit(EX_USAGE)

    # Redirect required addresses to 
    if local in ('postmaster', 'abuse', 'mailer-daemon'):
        os.execv("/usr/sbin/sendmail",
                 ("/usr/sbin/sendmail", MailmanOwner))
        sys.exit(0)

    # Assume normal posting to a mailing list
    mlist, func = local, 'post'

    # Check for control extension on local part
    for ext in ('-admin',
                '-owner',
                '-request',
                '-bounces',
                '-confirm',
                '-join',
                '-leave',
                '-subscribe',
                '-unsubscribe',
                ):
        if local.endswith(ext):
            mlist = local[:-len(ext)]
            func  = ext[1:]
            break

    # Let Mailman decide if a list exists.
    from Mailman.Utils import list_exists
    if list_exists(mlist):
        mm_pgm = os.path.join(paths.prefix, 'mail', 'mailman')
        os.execv(mm_pgm, (mm_pgm, func, mlist))
        # NOT REACHED
    else:
        try:
            sys.stderr.write(mm_cfg.DEB_HELP_TEXT)
        except AttributeError:
            sys.exit(EX_NOUSER)

        sys.exit(1)


if __name__ == '__main__':
    try:
        main()
    except SystemExit, argument:
        sys.exit(argument)
    except Exception:
        xt, xv, tb = sys.exc_info()
        sys.stderr.write("%s %s\n" % (xt, xv))
        sys.stderr.write("Line %d\n" % (tb.tb_lineno))
        sys.exit(EX_TEMPFAIL) # Soft failure, try again later.
