<?php

/**
 *  Want to return an XML RSS feed file.
 *
 *  Post types returned in the feed are determined by the 'rss/post-types' filter
 */

API_Register::get_instance()->add_endpoint( 
  'get/rssFeed',
  'brg_api_get_rss_feed'
);

function brg_api_get_rss_feed( $data ) {
  // Get our default post types to return
  $post_types = brg_rss_option_does_exist(RSS_OPTION);
  if( !$post_types ) {
    $post_types = array( 'post' );
  }
  $post_types = filter( 'rss/post-types', $post_types );

  
}