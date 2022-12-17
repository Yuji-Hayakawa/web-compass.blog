<?php

if (!defined('ABSPATH')) {
    exit;
}

// Advanced setting
function opencage_advancedsetting_customizer($wp_customize)
{
    $wp_customize->add_section('advanced_section', array(
        'title'          => 'その他の設定',
        'priority'       => 65,
        'description' => 'こちらの設定では、プラグインなどとの競合により問題が発生した場合などに設定を変更してください。<b>※ここの設定項目は内容がわかる方のみご利用ください。</b>通常は変更の必要はありません。',
    ));

    $wp_customize->add_setting('side_options_stork_block_pattern', array(
        'type'  => 'option',
        'default' => 'on',
    ));
    $wp_customize->add_control('side_options_stork_block_pattern', array(
        'settings' => 'side_options_stork_block_pattern',
        'label' => 'テーマ専用ブロックパターンの読み込み',
        'description' => '<span style="font-size:11px;">STORK19用のブロックパターンの読み込み設定をすることが可能です。</span>',
        'section' => 'advanced_section',
        'type' => 'radio',
        'choices' => array(
            'on' => '読み込む',
            'off' => '読み込まない',
        ),
    ));

    $wp_customize->add_setting('side_options_unregister_block_pattern', array(
        'type'  => 'option',
        'default' => 'off',
    ));
    $wp_customize->add_control('side_options_unregister_block_pattern', array(
        'settings' => 'side_options_unregister_block_pattern',
        'label' => 'デフォルトのブロックパターンの読み込み',
        'description' => '<span style="font-size:11px;">デフォルトのブロックパターンを読み込むかどうかの設定ができます。</span>',
        'section' => 'advanced_section',
        'type' => 'radio',
        'choices' => array(
            'on' => '読み込む',
            'off' => '読み込まない',
        ),
    ));
    
    $wp_customize->add_setting('side_options_style_min_css', array(
        'type'  => 'option',
        'default' => 'normal',
    ));
    $wp_customize->add_control('side_options_style_min_css', array(
        'settings' => 'side_options_style_min_css',
        'label' => 'テーマcssの読み込み設定',
        'description' => '<span style="font-size:11px;">テーマのスタイルシート（style.css）をどのように読み込むかどうかの設定</span>',
        'section' => 'advanced_section',
        'type' => 'radio',
        'choices' => array(
            'normal' => 'デフォルト（style.css）',
            'min' => '圧縮版（style.min.css）',
            'inline' => 'インラインで読み込む（キャッシュ使用）',
        ),
    ));

    $wp_customize->add_setting('side_options_fontawesomeinclude', array(
        'type'  => 'option',
        'default' => 'fonta_cdn',
    ));
    $wp_customize->add_control('side_options_fontawesomeinclude', array(
        'settings' => 'side_options_fontawesomeinclude',
        'label' => 'アイコンフォント（Fontawesome）の読み込み設定',
        'description' => '<span style="font-size:11px;"><b style="color:red;">※1</b>「Fontawesomeを読み込まない」を選択するとアイコンが表示されなくなる可能性があります。プラグインや独自にファイルを読み込んている場合のみ選択してください。</span>',
        'section' => 'advanced_section',
        'type' => 'radio',
        'choices' => array(
            'fonta_cdn' => 'CDN版（デフォルト）',
            'fonta_download' => 'ダウンロード版',
            'fonta_off' => 'Fontawesomeを読み込まない（※1）',
        ),
    ));
    $wp_customize->add_setting('stk_fontawesome_ver', array(
        'type'  => 'option',
        'default' => '6',
    ));
    $wp_customize->add_control('stk_fontawesome_ver', array(
        'settings' => 'stk_fontawesome_ver',
        'label' => 'アイコンフォント（Fontawesome）のバージョン',
        'section' => 'advanced_section',
        'type' => 'radio',
        'choices' => array(
            '6' => 'ver6（6.1.1）',
            '5' => 'ver5（5.15.4）',
        ),
    ));

    $wp_customize->add_setting('side_options_cdn_jquery_include', array(
        'type'  => 'option',
        'default' => 'off',
    ));
    $wp_customize->add_control('side_options_cdn_jquery_include', array(
        'settings' => 'side_options_cdn_jquery_include',
        'label' => 'jQueryの読み込み設定',
        'description' => '<span style="font-size:11px;">※「デフォルトのjQuery」ではWordPressに内包されているjQueryを読み込みます。</span>',
        'section' => 'advanced_section',
        'type' => 'radio',
        'choices' => array(
            'off' => 'デフォルトのjQueryを使用',
            'on' => 'CDN版（1.12.4）を読み込む',
            'on_3' => 'CDN版（3.5.1）を読み込む',
        ),
    ));
    $wp_customize->add_setting('side_options_jquery_migrate', array(
        'type'  => 'option',
        'default' => 'on',
    ));
    $wp_customize->add_control('side_options_jquery_migrate', array(
        'settings' => 'side_options_jquery_migrate',
        'label' => 'jQuery Migrateの読み込み',
        'description' => '<span style="font-size:11px;">jQuery Migrateを読み込むかどうかの設定です。プラグインの表示などに不具合がでる場合は「読み込む」に設定して下さい。</span>',
        'section' => 'advanced_section',
        'type' => 'radio',
        'choices' => array(
            'on' => 'jQuery Migrateを読み込む',
            'off' => 'jQuery Migrateを読み込まない',
        ),
    ));

    $wp_customize->add_setting('advanced_print_emoji', array(
        'type'  => 'option',
        'default' => 'on',
    ));
    $wp_customize->add_control('advanced_print_emoji', array(
        'label' => '絵文字用JSの読み込み設定',
        'description' => '<span style="font-size:11px;">WordPressの初期設定で読み込まれる絵文字用JavaScriptの読み込み設定ができます。絵文字を使わない場合は「読み込まない」を選んでください。</span>',
        'settings' => 'advanced_print_emoji',
        'section' => 'advanced_section',
        'type' => 'radio',
        'choices' => array(
            'on' => '読み込む',
            'off' => '読み込まない',
        ),
    ));

    $wp_customize->add_setting('advanced_js_defer', array(
        'type'  => 'option',
        'default' => 'off',
    ));
    $wp_customize->add_control('advanced_js_defer', array(
        'label' => '【JavaScript】defer属性の付与',
        'description' => '<span style="font-size:11px;">jQuery以外のjavascriptにdefer属性を付与します。※プラグインなどと干渉する場合はOFFに。</span>',
        'settings' => 'advanced_js_defer',
        'section' => 'advanced_section',
        'type' => 'radio',
        'choices' => array(
            'on' => '付与する',
            'off' => '付与しない',
        ),
    ));

    $wp_customize->add_setting('google_search_thumbnail', array(
        'type'  => 'option',
        'default' => 'on',
    ));
    $wp_customize->add_control('google_search_thumbnail', array(
        'label' => 'モバイル検索結果にアイキャッチ画像を表示する',
        'description' => '<span style="font-size:11px;">Googleの検索結果にアイキャッチ画像を表示します。（※Googleの仕様に依存するため必ず表示されるわけではありません）</span>',
        'settings' => 'google_search_thumbnail',
        'section' => 'advanced_section',
        'type' => 'radio',
        'choices' => array(
            'on' => '表示する',
            'off' => '表示しない',
        ),
    ));

    $wp_customize->add_setting('advanced_custom_lp', array(
        'type'  => 'option',
        'default' => 'off',
    ));
    $wp_customize->add_control('advanced_custom_lp', array(
        'label' => 'カスタム投稿タイプのランディングページを表示する',
        'description' => '<span style="font-size:11px;">以前のバージョンのOPENCAGE製テーマをお使いで、管理画面にカスタム投稿タイプの「ランディングページ」を表示させたい場合に。※ページとしては表示されないため、固定ページ（ランディングページ）へコピーしてご利用ください。</span>',
        'settings' => 'advanced_custom_lp',
        'section' => 'advanced_section',
        'type' => 'radio',
        'choices' => array(
            'on' => '表示する',
            'off' => '表示しない（デフォルト）',
        ),
    ));
}
add_action('customize_register', 'opencage_advancedsetting_customizer');
