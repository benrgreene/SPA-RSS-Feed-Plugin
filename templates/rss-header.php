<?php

echo sprintf( '<?xml version="1.0" encoding="ISO-8859-1" ?>
  <rss version="2.0">
    <channel>
      <title>%s</title>
      <link>%s</link>
      <description>%s</description>
      <language>en-us</language>
', SITE_TITLE, get_site_base_url(), 'how to define this one?' );