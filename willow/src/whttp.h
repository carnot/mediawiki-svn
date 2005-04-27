/* @(#) $Header$ */
/* This source code is in the public domain. */
/*
 * Willow: Lightweight HTTP reverse-proxy.
 * whttp: HTTP implementation.
 */

#ifndef WHTTP_H
#define WHTTP_H

struct fde;

void http_new(struct fde *);
void whttp_init(void);
void whttp_shutdown(void);

extern const char *request_string[];

#endif
