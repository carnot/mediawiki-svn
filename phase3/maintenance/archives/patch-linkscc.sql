--
-- linkscc table used to cache link lists in easier to digest form
-- November 2003
--

CREATE TABLE IF NOT EXISTS /*$wgDBprefix*/linkscc (
  lcc_pageid INT UNSIGNED NOT NULL UNIQUE KEY,
  lcc_title VARCHAR(255) binary NOT NULL UNIQUE KEY,
  lcc_cacheobj MEDIUMBLOB NOT NULL);

