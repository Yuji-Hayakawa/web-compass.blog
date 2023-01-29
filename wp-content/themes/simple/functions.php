<?php
// <title>タグを出力する
add_theme_support( 'title-tag' );

// アイキャッチ画像を使用可能にする
add_theme_support( 'post-thumbnails' );

add_action( 'wp_enqueue_scripts', 'add_styles' );
function add_styles() {
  // google fonts
  wp_enqueue_style(
    'font-awesome_style',
    'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css'
  );

  // reset style
  wp_register_style(
    'reset_style',
    get_template_directory_uri() . '/assets/css/normalize.css',
    array(),
    '1.0'
  );

  // main style
  wp_enqueue_style(
    'main_style',
    get_template_directory_uri() . '/assets/css/style.css',
    array('reset_style'),
    '1.0'
  );
}