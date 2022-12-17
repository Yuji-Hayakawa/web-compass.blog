<?php

if (!defined('ABSPATH')) {
    exit;
}

// sns button
function opencage_snsbutton_customizer($wp_customize)
{
    $wp_customize->add_section('snsbutton_section', array(
        'title'          => 'SNSボタン設定',
        'priority'       => 50,
    ));

    $wp_customize->selective_refresh->add_partial(
        'sns_button_display',
        array(
            'selector' => '.sns_btn',
        )
    );

    $wp_customize->add_setting('sns_button_display', array(
        'type'  => 'option',
        'default' => 'on',
    ));
    $wp_customize->add_control('sns_button_display', array(
        'settings' => 'sns_button_display',
        'label' => 'SNSボタン表示設定',
        'description' => '<span style="font-size:11px;">SNSボタンの表示・非表示を設定可能です。</span>',
        'section' => 'snsbutton_section',
        'type' => 'radio',
        'choices' => array(
            'on' => '表示する（投稿ページ）',
            'on_withpage' => '表示する（投稿 ＆ 固定ページ）',
            'off' => '表示しない',
        ),
    ));
    $wp_customize->add_setting('sns_button_display__tophidden', array(
        'type'  => 'option',
    ));
    $wp_customize->add_control('sns_button_display__tophidden', array(
        'settings' => 'sns_button_display__tophidden',
        'label' => 'アイキャッチ下のSNSボタンを非表示にする',
        'description' => '<span style="font-size:11px;"><br><br></span>',
        'section' => 'snsbutton_section',
        'type' => 'checkbox',
    ));


    $wp_customize->add_setting('sns_button_hide_twitter', array(
        'type'  => 'option',
        'default' => '',
    ));
    $wp_customize->add_control('sns_button_hide_twitter', array(
        'settings' => 'sns_button_hide_twitter',
        'label' => 'Twitterボタン',
        'section' => 'snsbutton_section',
        'type' => 'select',
        'choices' => array(
            '' => '表示する',
            '1' => '表示しない',
        ),
    ));

    $wp_customize->add_setting('sns_button_hide_facebook', array(
        'type'  => 'option',
        'default' => '',
    ));
    $wp_customize->add_control('sns_button_hide_facebook', array(
        'settings' => 'sns_button_hide_facebook',
        'label' => 'facebookボタン',
        'section' => 'snsbutton_section',
        'type' => 'select',
        'choices' => array(
            '' => '表示する',
            '1' => '表示しない',
        ),
    ));

    $wp_customize->add_setting('sns_button_hide_hatebu', array(
        'type'  => 'option',
        'default' => '',
    ));
    $wp_customize->add_control('sns_button_hide_hatebu', array(
        'settings' => 'sns_button_hide_hatebu',
        'label' => 'はてなブックマークボタン',
        'section' => 'snsbutton_section',
        'type' => 'select',
        'choices' => array(
            '' => '表示する',
            '1' => '表示しない',
        ),
    ));

    $wp_customize->add_setting('sns_button_hide_line', array(
        'type'  => 'option',
        'default' => '',
    ));
    $wp_customize->add_control('sns_button_hide_line', array(
        'settings' => 'sns_button_hide_line',
        'label' => 'LINEボタン',
        'section' => 'snsbutton_section',
        'type' => 'select',
        'choices' => array(
            '' => '表示する',
            '1' => '表示しない',
        ),
    ));

    $wp_customize->add_setting('sns_button_hide_pocket', array(
        'type'  => 'option',
        'default' => '',
    ));
    $wp_customize->add_control('sns_button_hide_pocket', array(
        'settings' => 'sns_button_hide_pocket',
        'label' => 'Pocketボタン',
        'section' => 'snsbutton_section',
        'type' => 'select',
        'choices' => array(
            '' => '表示する',
            '1' => '表示しない',
        ),
    ));
    $wp_customize->add_setting('sns_button_hide_pinterest', array(
        'type'  => 'option',
        'default' => '1',
    ));
    $wp_customize->add_control('sns_button_hide_pinterest', array(
        'settings' => 'sns_button_hide_pinterest',
        'label' => 'Pinterestボタン',
        'section' => 'snsbutton_section',
        'type' => 'select',
        'choices' => array(
            '' => '表示する',
            '1' => '表示しない',
        ),
    ));

    if (is_plugin_active_amp()) {
        $wp_customize->add_setting('sns_button_facebook_app_id', array(
            'type'  => 'option',
        ));
        $wp_customize->add_control('sns_button_facebook_app_id', array(
            'settings' => 'sns_button_facebook_app_id',
            'label' => 'Facebook APP ID',
            'description' => '<span style="font-size:11px;">AMPのFacebookシェアボタンを表示させるために必要となります。Facebook app_idの<a href="https://open-cage.com/facebook-appid-amp" target="_blank">取得方法はこちら</a></span>',
            'section' => 'snsbutton_section',
        ));
    }

    $wp_customize->add_setting('sns_options_text', array(
        'type'  => 'option',
    ));
    $wp_customize->add_control('sns_options_text', array(
        'settings' => 'sns_options_text',
        'label' => '記事下のシェアタイトルを表示',
        'description' => '<span style="font-size:11px;">ここに入力したテキストがSNSボタン上に表示されます。<b>例）シェアしてね！</b> など。</span>',
        'section' => 'snsbutton_section',
    ));
}
add_action('customize_register', 'opencage_snsbutton_customizer');
