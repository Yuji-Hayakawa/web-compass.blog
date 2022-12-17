<?php

if (!defined('ABSPATH')) {
    exit;
}

// add setting
function opencage_adsetting_customizer($wp_customize)
{
    $wp_customize->add_section('ad_section', array(
        'title'          => '広告用ショートコードの登録',
        'priority'       => 60,
        'description' => '広告用のHTMLを登録することによって、ショートコードで呼び出すことが可能です。→<a href="https://www.stork19.com/ad-setting/" target="_blank">使い方</a>',
    ));

    $wp_customize->add_setting('other_options_ad1');
    $wp_customize->add_control(new WP_Customize_Code_Editor_Control(
        $wp_customize,
        'other_options_ad1',
        array(
            'label' => '広告用ショートコード1',
            'description' => '<span style="font-size:11px;"><code style="font-size:11px;">[ad1]</code>というショートコードを記事内に設置することで、ここに登録したコードを呼び出すことができます。</span>',
            'settings' => 'other_options_ad1',
            'section' => 'ad_section',
        )
    ));

    $wp_customize->add_setting('other_options_ad2');
    $wp_customize->add_control(new WP_Customize_Code_Editor_Control(
        $wp_customize,
        'other_options_ad2',
        array(
            'label' => '広告用ショートコード2',
            'description' => '<span style="font-size:11px;"><code style="font-size:11px;">[ad2]</code>というショートコードを記事内に設置することで、ここに登録したコードを呼び出すことができます。</span>',
            'settings' => 'other_options_ad2',
            'section' => 'ad_section',
        )
    ));
}
add_action('customize_register', 'opencage_adsetting_customizer');
