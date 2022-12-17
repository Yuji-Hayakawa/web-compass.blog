<?php

if (!defined('ABSPATH')) {
    exit;
}


function stk_static_front_page($wp_customize)
{
    $wp_customize->add_section('static_front_page', array(
        'title' => 'ホームページ設定',
        'description' => '固定ページをフロントページ（ホームページ）に変更することができます。',
    ));


    $wp_customize->add_setting('front_page_ttl_display', array(
        'type'  => 'option',
        'default' => 'off',
    ));
    $wp_customize->add_control('front_page_ttl_display', array(
        'settings' => 'front_page_ttl_display',
        'label' => '固定フロントページのタイトル表示',
        'description' => '<span style="font-size:11px;">固定ページをトップページにした場合にページタイトルを表示させるかどうかのオプションです。</span>',
        'section' => 'static_front_page',
        'type' => 'radio',
        'choices' => array(
            'on' => '表示する',
            'off' => '表示しない（デフォルト）',
        ),
    ));
}
add_action('customize_register', 'stk_static_front_page');
