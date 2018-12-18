<?php

define( 'RSS_OPTION', 'rss_post_types' );

// Add our RSS feed API endpoint
add_action( 'load-apis', function() {
  load_directory( __DIR__ . '/api' );
});

// Add our option for setting the post types for the RSS feed
add_action( 'admin_set_defaults', function() {
  if( !brg_rss_option_does_exist( RSS_OPTION ) ) {
    brg_rss_add_option( RSS_OPTION, json_encode( array( 'post' ) ) );
  }
});

// Want to check if an option exists in the database
function brg_rss_option_does_exist( $option_name ) {
  $query = DB_Query_Builder::select_query( 'theme_options', array(
    'name' => $option_name
  ));
  $results = (new Database_Interface)->query( $query );
  return $results;
}

// Add our default plugin option for rss feed post types (post) to the database
function brg_rss_add_option( $option, $value ) {
  $query = DB_Query_Builder::insert_query( 'theme_options', array(
    'name'  => $option,
    'value' => $value
  ));
  $results = (new Database_Interface)->insert( $query );
  return $results;
}