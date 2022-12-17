<?php

if (!defined('ABSPATH')) {
    exit;
}

// Google Analytics・head tags
add_action('customize_register', 'opencage_headtags_customizer');
function opencage_headtags_customizer($wp_customize)
{

    $wp_customize->add_panel(
        'panel_optiontag_settings',
        array(
            'title' => 'アクセス解析コード・headタグ',
            'priority' => 55,
            'description' => 'GoogleAnalyticsやheadなどに表示されるタグを設定できます。',
        )
    );

    $wp_customize->add_section('google_analytics_section', array(
        'title'          => 'Google Analyticsタグ',
        'panel' => 'panel_optiontag_settings',
        'priority'       => 55,
    ));
    $wp_customize->add_section('head_foot_tags_section', array(
        'title'          => 'head / bodyタグ',
        'panel' => 'panel_optiontag_settings',
        'priority'       => 55,
    ));
    $wp_customize->add_section('amp_head_foot_tags_section', array(
        'title'          => 'head / bodyタグ（AMP用）',
        'panel' => 'panel_optiontag_settings',
        'priority'       => 55,
        'description' => 'AMP時のみにheadなどに表示されるタグを設定できます。ただし、AMPにて許可された仕様のコード出ない場合は自動的に削除される可能性もあります。',
    ));



    $wp_customize->add_setting('other_options_ga', array(
        'type'  => 'option',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control('other_options_ga', array(
        'label' => 'GoogleAnalytics解析コード',
        'description' => '<span style="font-size:11px;">入力例：「G-xxxxxxxxx」<br>※すでにプラグイン等で設定している場合はこちらを設定しないようご注意ください。</span>',
        'settings' => 'other_options_ga',
        'section' => 'google_analytics_section',
    ));

    if (is_plugin_active_amp()) {
        $wp_customize->add_setting('other_options_ga_amp', array(
            'type'  => 'option',
            'transport' => 'postMessage',
        ));
        $wp_customize->add_control('other_options_ga_amp', array(
            'label' => '[AMP用]GoogleAnalytics解析コード',
            'description' => '<span style="font-size:11px;">AMPプラグインを利用していて、通常のアクセス解析コードと別のものを使いたい場合に入力してください。</span>',
            'settings' => 'other_options_ga_amp',
            'section' => 'google_analytics_section',
        ));
    }


    $wp_customize->add_setting('other_options_headcode', array(
        'type'  => 'option',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new WP_Customize_Code_Editor_Control(
        $wp_customize,
        'other_options_headcode',
        array(
            'label' => '＜head＞タグ内',
            'description' => '<span style="font-size:11px;">＜head＞タグ内に解析コードなどを入力したい場合はここにコードを！</span>',
            'settings' => 'other_options_headcode',
            'section' => 'head_foot_tags_section',
        )
    ));

    $wp_customize->add_setting('other_options_bodycode', array(
        'type'  => 'option',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new WP_Customize_Code_Editor_Control(
        $wp_customize,
        'other_options_bodycode',
        array(
            'label' => '＜body＞タグの直後',
            'description' => '<span style="font-size:11px;">＜body＞タグの直後にscriptタグなどを設置する場合にここにコードを! </span>',
            'settings' => 'other_options_bodycode',
            'section' => 'head_foot_tags_section',
        )
    ));

    $wp_customize->add_setting('other_options_footercode', array(
        'type'  => 'option',
        'transport' => 'postMessage',
    ));
    $wp_customize->add_control(new WP_Customize_Code_Editor_Control(
        $wp_customize,
        'other_options_footercode',
        array(
            'label' => '＜/body＞の直前',
            'description' => '<span style="font-size:11px;">＜/body＞タグの直前に解析コードなどを入力したい場合にここにコードを！</span>',
            'settings' => 'other_options_footercode',
            'section' => 'head_foot_tags_section',
        )
    ));


    if (is_plugin_active_amp()) {
        $wp_customize->add_setting('stk_amp_headcode', array(
            'type'  => 'option',
            'transport' => 'postMessage',
        ));
        $wp_customize->add_control(new WP_Customize_Code_Editor_Control(
            $wp_customize,
            'stk_amp_headcode',
            array(
                'label' => '【AMP用】＜head＞タグ内',
                'description' => '<span style="font-size:11px;">【AMP用】＜head＞タグ内に広告用コードなどを入力したい場合はここに！</span>',
                'settings' => 'stk_amp_headcode',
                'section' => 'amp_head_foot_tags_section',
            )
        ));

        $wp_customize->add_setting('stk_amp_bodycode', array(
            'type'  => 'option',
            'transport' => 'postMessage',
        ));
        $wp_customize->add_control(new WP_Customize_Code_Editor_Control(
            $wp_customize,
            'stk_amp_bodycode',
            array(
                'label' => '【AMP用】＜body＞タグの直後',
                'description' => '<span style="font-size:11px;">【AMP用】＜body＞タグの直後にscriptタグなどを設置する場合にここにコードを! </span>',
                'settings' => 'stk_amp_bodycode',
                'section' => 'amp_head_foot_tags_section',
            )
        ));

        $wp_customize->add_setting('stk_amp_footercode', array(
            'type'  => 'option',
            'transport' => 'postMessage',
        ));
        $wp_customize->add_control(new WP_Customize_Code_Editor_Control(
            $wp_customize,
            'stk_amp_footercode',
            array(
                'label' => '【AMP用】＜/body＞の直前',
                'description' => '<span style="font-size:11px;">【AMP用】＜/body＞タグの直前に解析コードなどを入力したい場合にここにコードを！</span>',
                'settings' => 'stk_amp_footercode',
                'section' => 'amp_head_foot_tags_section',
            )
        ));
    }
}
