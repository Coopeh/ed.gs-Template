<?php

function minify_html($buffer)
{
    $search = array(
        '/\>[^\S ]+/s', //strip whitespaces after tags, except space
        '/[^\S ]+\</s', //strip whitespaces before tags, except space
        '/(\s)+/s'  // shorten multiple whitespace sequences
        );
    $replace = array(
        '>',
        '<',
        '\\1'
        );
    $buffer = preg_replace($search, $replace, $buffer);

    return $buffer;
}

function main_scripts()
{
  $ver = date ("Ymd-Gis", filemtime(get_template_directory() . '/css/style.css'));
  wp_register_style( 'style', get_template_directory_uri() . '/style.css', array(), $ver, 'all' );
  wp_enqueue_style( 'style' );

  if( !is_admin()){
    wp_deregister_script('jquery');
    wp_register_script('jquery', ("http://code.jquery.com/jquery.min.js"), false, '1.8.3');
    wp_enqueue_script('jquery');
  }
}

add_action( 'wp_enqueue_scripts', 'main_scripts' );

/*
* Add/Remove Features and Functions
*/

remove_action('wp_head', 'wp_generator');

add_editor_style();