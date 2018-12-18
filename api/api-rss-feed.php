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

  // hmm... need to update the query builder to include 'OR'!
  $query = DB_Query_Builder::select_query( 
    'posts', 
    array(
      'type' => 'post'
    ),
    array(
      'order'     => 'ID',
      'direction' => 'DESC',
      'limit'     => 10
    )
  );
  $results = (new Database_Interface)->query( $query );
  
  // Output the RSS Feed content
  $template_dir = dirname(__DIR__) . '/templates';
  ob_start();
  include $template_dir . '/rss-header.php';
  foreach( $results as $key => $value ) {
    include $template_dir . '/rss-item.php';
  }
  include $template_dir . '/rss-footer.php';
  $content = ob_get_clean();
  // set our header for the RSS to be XML content, echo the RSS content, and cut off the page from doing anything else.
  header('Content-Type: application/xml; charset=ISO-8859-1');
  echo $content;
  die();
}