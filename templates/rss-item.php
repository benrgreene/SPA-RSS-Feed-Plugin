<?php

// Need to clean up the input we're using in the feed
$title       = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $value['title'] );
$link        = sprintf( '%s/?%s=%s', get_site_base_url(), $value['type'], $value['slug'] );
$description = preg_replace('/&(?!#?[a-z0-9]+;)/', '&amp;', $value['excerpt'] );
$description = str_replace('’', "'", $description);

// output the cleaned item data to the feed.
echo sprintf( '<item>
  <title>%s</title>
  <link>%s</link>
  <description>%s</description>
</item>', $title, $link, $description );

