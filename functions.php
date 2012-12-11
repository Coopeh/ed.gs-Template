<?php

/*
 * Minify HTML
 */

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

/*
 * Enqueue Main Scripts/CSS
 */

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
 * Register Sidebar(s)
 */

function widgets_init() {
  register_sidebar( array(
    'name' => 'Sidebar',
    'id' => 'sidebar',
    'description' => 'Appears on posts and pages except the optional Front Page template, which has its own widgets',
    'before_widget' => '<aside id="%1$s" class="widget %2$s">',
    'after_widget' => '</aside>',
    'before_title' => '<h3 class="widget-title">',
    'after_title' => '</h3>',
  ) );
}

add_action( 'widgets_init', 'widgets_init' );

/*
 * Add/Remove Features and Functions
 */

remove_action('wp_head', 'wp_generator');

add_editor_style();