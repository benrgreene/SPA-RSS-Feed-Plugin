<?php

$title       = SITE_TITLE;
$link        = get_site_base_url();
$description = brg_rss_option_does_exist( 'rss_description' )['value'];

echo sprintf( '<?xml version="1.0" encoding="ISO-8859-1" ?>
  <rss version="2.0">
    <channel>
      <title>%s</title>
      <link>%s</link>
      <description><![CDATA[%s]]></description>
      <language>en-us</language>
', $title, $link, $description );