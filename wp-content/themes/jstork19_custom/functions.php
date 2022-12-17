<?php

// 子テーマのstyle.cssを後から読み込む
add_action( 'wp_enqueue_scripts', 'stk_add_child_stylesheet' );
function stk_add_child_stylesheet() {
    wp_enqueue_style( 'stk_child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('stk_style')
    );
}


// カスタマイズでコードを追記する場合はここよりも下に記載してください