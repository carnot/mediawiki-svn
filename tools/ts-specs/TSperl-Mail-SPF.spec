%define _basedir /opt/TSperl
%include Solaris.inc

Name:		TSperl-Mail-SPF
Summary:	Mail::SPF module for Perl
Version:	2.006
Source:		http://search.cpan.org/CPAN/authors/id/J/JM/JMEHNLE/mail-spf/Mail-SPF-v%{version}.tar.gz
Patch1:		mail-spf-01-sbin.diff

SUNW_BaseDir:	%{_basedir}
BuildRoot:	%{_tmppath}/%{name}-%{version}-build
%include default-depend.inc

Requires: TSperl
Requires: TSperl-Net-DNS-Rslvr-Prgrmmbl
Requires: TSperl-Error
Requires: TSperl-NetAddr-IP
Requires: TSperl-URI
BuildRequires: TSperl
BuildRequires: TSperl-Net-DNS-Rslvr-Prgrmmbl
BuildRequires: TSperl-Error
BuildRequires: TSperl-NetAddr-IP
BuildRequires: TSperl-URI

%prep
%setup -q -n Mail-SPF-v%version
%patch1 -p0

%build

/opt/TSperl/bin/perl Makefile.PL INSTALLDIRS=vendor
make

%install
rm -rf $RPM_BUILD_ROOT

make DESTDIR=$RPM_BUILD_ROOT install

%clean
rm -rf $RPM_BUILD_ROOT

%files
%defattr (-, root, bin)
%dir %attr (0755, root, bin) %{_bindir}
%{_bindir}/*
%dir %attr (0755, root, bin) %{_sbindir}
%{_sbindir}/*
%dir %attr (0755, root, bin) %{_libdir}
%dir %attr (0755, root, bin) %{_libdir}/vendor_perl
%dir %attr (0755, root, bin) %{_libdir}/vendor_perl/5.8
%{_libdir}/vendor_perl/5.8/*
%dir %attr (0755, root, sys) %{_datadir}
%dir %attr (0755, root, bin) %{_mandir}
%dir %attr (0755, root, bin) %{_mandir}/man1
%{_mandir}/man1/*
%dir %attr (0755, root, bin) %{_mandir}/man3
%{_mandir}/man3/*

%changelog
* Fri Jan 30 2009 - river@loreley.flyingparchment.org.uk
- Initial spec
