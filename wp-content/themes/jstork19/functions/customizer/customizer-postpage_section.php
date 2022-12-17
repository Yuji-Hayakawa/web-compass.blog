<?php

if (!defined('ABSPATH')) {
    exit;
}

// single, page setting
function opencage_postpage_customizer($wp_customize)
{
    $wp_customize->add_section('postpage_section', array(
        'title'          => '投稿・固定ページ設定',
        'priority'       => 45,
    ));

    $wp_customize->add_setting('post_options_ttl', array(
        'type'  => 'option',
        'default' => 'h_default',
    ));
    $wp_customize->add_control('post_options_ttl', array(
        'settings' => 'post_options_ttl',
        'label' => '見出しデザイン',
        'description' => '<span style="font-size:11px;">見出しのデザインを変更することが可能です。※CSSで独自カスタマイズする場合はデフォルトを選択してください。</span>',
        'section' => 'postpage_section',
        'type' => 'radio',
        'choices' => array(
            'h_default' => 'シンプル（デフォルト）',
            'h_boader' => 'ボーダー',
            'h_balloon' => '吹き出し',
            'h_stitch' => 'ステッチ',
            'h_stripe' => 'ストライプ',
        ),
    ));

    $wp_customize->add_setting('post_options_eyecatch_display', array(
        'type'  => 'option',
        'default' => 'on',
    ));
    $wp_customize->add_control('post_options_eyecatch_display', array(
        'settings' => 'post_options_eyecatch_display',
        'label' => 'アイキャッチ画像の表示設定',
        'description' => '<span style="font-size:11px;">記事ページ、固定ページでのアイキャッチ画像の表示設定ができます。</span>',
        'section' => 'postpage_section',
        'type' => 'radio',
        'choices' => array(
            'on' => '表示する',
            'off' => '表示しない',
        ),
    ));

    $wp_customize->add_setting('post_options_authordisplay', array(
        'type'  => 'option',
        'default' => 'author_on',
    ));
    $wp_customize->add_control('post_options_authordisplay', array(
        'settings' => 'post_options_authordisplay',
        'label' => '投稿者名の表示設定',
        'description' => '<span style="font-size:11px;">記事ページ（記事タイトル付近）、記事一覧ページにて投稿者名を表示します。</span>',
        'section' => 'postpage_section',
        'type' => 'radio',
        'choices' => array(
            'author_on' => '表示する（記事ページのみ）',
            'author_on_archives' => '表示する（記事・一覧ページの両方）',
            'author_off' => '表示しない',
        ),
    ));

    $wp_customize->add_setting('post_options_authordisplay_top', array(
        'type'  => 'option',
        'default' => true,
    ));
    $wp_customize->add_control('post_options_authordisplay_top', array(
        'settings' => 'post_options_authordisplay_top',
        'label' => '記事上部の投稿者名を非表示にする',
        // 		'description' => '<span style="font-size:11px;">※記事ページのタイトル横の投稿者名を非表示にできます。</span>',
        'section' => 'postpage_section',
        'type' => 'checkbox',
    ));

    $wp_customize->add_setting('post_options_authornewpost', array(
        'type'  => 'option',
    ));
    $wp_customize->add_control('post_options_authornewpost', array(
        'settings' => 'post_options_authornewpost',
        'label' => 'このライターの最新記事を非表示にする',
        'description' => '<span style="font-size:11px;"><br></span>',
        'section' => 'postpage_section',
        'type' => 'checkbox',
    ));


    $wp_customize->add_setting('post_options_date', array(
        'type'  => 'option',
        'default' => 'undo_on',
    ));
    $wp_customize->add_control('post_options_date', array(
        'settings' => 'post_options_date',
        'label' => '投稿日・更新日の表示設定',
        'description' => '<span style="font-size:11px;">【※1】通常は投稿日が表示されます。更新があった場合に更新日のみの表示に切り替わります。</span>',
        'section' => 'postpage_section',
        'type' => 'radio',
        'choices' => array(
            'undo_on' => '更新日のみ表示する（※1）',
            'date_on' => '投稿日のみ表示する',
            'date_undo_on' => '投稿日・更新日を表示する',
            'date_undo_off' => '投稿日・更新日を非表示にする',
        ),
    ));

    $wp_customize->selective_refresh->add_partial(
        'fbbox_options_url',
        array(
            'selector' => '.fb-likebtn',
        )
    );

    $wp_customize->add_setting('fbbox_options_url', array(
        'type'  => 'option',
    ));
    $wp_customize->add_control('fbbox_options_url', array(
        'settings' => 'fbbox_options_url',
        'label' => '[フォローボタン]facebook',
        'description' => '<span style="font-size:11px;">リンクさせたいfacebookページのURLを入力。</span>',
        'section' => 'postpage_section',
    ));

    $wp_customize->add_setting('twbox_options_url', array(
        'type'  => 'option',
    ));
    $wp_customize->add_control('twbox_options_url', array(
        'settings' => 'twbox_options_url',
        'label' => '[フォローボタン]Twitter',
        'description' => '<span style="font-size:11px;">リンクさせたいTwitterのURLを入力</span>',
        'section' => 'postpage_section',
    ));

    $wp_customize->add_setting('youtubebox_options_url', array(
        'type'  => 'option',
    ));
    $wp_customize->add_control('youtubebox_options_url', array(
        'settings' => 'youtubebox_options_url',
        'label' => '[フォローボタン]YouTube',
        'description' => '<span style="font-size:11px;">リンクさせたいYouTubeチャンネルのURLを入力</span>',
        'section' => 'postpage_section',
    ));

    $wp_customize->add_setting('instagrambox_options_url', array(
        'type'  => 'option',
    ));
    $wp_customize->add_control('instagrambox_options_url', array(
        'settings' => 'instagrambox_options_url',
        'label' => '[フォローボタン]Instagram',
        'description' => '<span style="font-size:11px;">リンクさせたいInstagramのURLを入力</span>',
        'section' => 'postpage_section',
    ));

    $wp_customize->add_setting('linebox_options_url', array(
        'type'  => 'option',
    ));
    $wp_customize->add_control('linebox_options_url', array(
        'settings' => 'linebox_options_url',
        'label' => '[フォローボタン]LINE',
        'description' => '<span style="font-size:11px;">リンクさせたいLINE@のURLを入力</span>',
        'section' => 'postpage_section',
    ));

    $wp_customize->add_setting('feedlybox_options_url', array(
        'type'  => 'option',
    ));
    $wp_customize->add_control('feedlybox_options_url', array(
        'settings' => 'feedlybox_options_url',
        'label' => '[フォローボタン]feedly',
        'description' => '<span style="font-size:11px;">Feedlyボタンを表示させたい場合はURLを入力（例： https://feedly.com/i/subscription/feed/https://demo-stork19.open-cage.com/feed/）</span>',
        'section' => 'postpage_section',
    ));


    $wp_customize->add_setting('np_hide_options', array(
        'type'  => 'option',
        'default' => 'on',
    ));
    $wp_customize->add_control('np_hide_options', array(
        'settings' => 'np_hide_options',
        'label' => '前後の記事の表示設定',
        'description' => '<span style="font-size:11px;">記事下の「前後の記事へのリンク」を表示させるかどうかの設定</span>',
        'section' => 'postpage_section',
        'type' => 'radio',
        'choices' => array(
            'on' => '表示する',
            'off' => '表示しない',
        ),
    ));

    $wp_customize->add_setting('np_excluded_terms', array(
        'type'  => 'option',
        'default' => 'all',
    ));
    $wp_customize->add_control('np_excluded_terms', array(
        'settings' => 'np_excluded_terms',
        'label' => '前後の記事リンクを同じカテゴリーにする',
        'description' => '<span style="font-size:11px;">記事下の「前後の記事へのリンク」同じカテゴリーにする</span>',
        'section' => 'postpage_section',
        'type' => 'radio',
        'choices' => array(
            'all' => '全ての記事',
            'same_cat' => '同じカテゴリー',
        ),
    ));


    $wp_customize->add_setting('recommend_hide_options', array(
        'type'  => 'option',
        'default' => 'on',
    ));
    $wp_customize->add_control('recommend_hide_options', array(
        'settings' => 'recommend_hide_options',
        'label' => '関連記事の表示設定',
        'description' => '<span style="font-size:11px;">記事下の「関連記事」を表示させるかどうかの設定</span>',
        'section' => 'postpage_section',
        'type' => 'radio',
        'choices' => array(
            'on' => '表示する',
            'off' => '表示しない',
        ),
    ));

    $wp_customize->add_setting('ga_recommend_options', array(
        'type'  => 'option',
    ));
    $wp_customize->add_control(new WP_Customize_Code_Editor_Control(
        $wp_customize,
        'ga_recommend_options',
        array(
            'label' => 'GoogleAdSense「関連コンテンツユニット」を表示する',
            'description' => '<span style="font-size:11px;">GoogleAdSenseの「関連コンテンツユニット」を記事下の「関連記事」と置き換えるためのオプションです。下記の入力欄にGoogleAdSenseで取得したscriptを貼り付けることで関連記事と内容が置き換わります。</b></span>',
            'settings' => 'ga_recommend_options',
            'section' => 'postpage_section',
        )
    ));
    if (is_plugin_active_amp()) {
        $wp_customize->add_setting('stk_amp_ga_recommend_options', array(
            'type'  => 'option',
        ));
        $wp_customize->add_control(new WP_Customize_Code_Editor_Control(
            $wp_customize,
            'stk_amp_ga_recommend_options',
            array(
                'label' => '【AMP用】GoogleAdSense「関連コンテンツユニット」を表示する',
                'description' => '<span style="font-size:11px;">AMPプラグインを有効化しているときにAMP用の関連コンテンツユニットを表示するためのオプションです。</b></span>',
                'settings' => 'stk_amp_ga_recommend_options',
                'section' => 'postpage_section',
            )
        ));
    }

    $wp_customize->add_setting('post_options_page_cta', array(
        'type'  => 'option',
    ));
    $wp_customize->add_control('post_options_page_cta', array(
        'settings' => 'post_options_page_cta',
        'label' => '固定ページにもCTAウィジェットを表示する',
        'description' => '<span style="font-size:11px;">固定ページ下にもCTAウィジェットを表示させたい場合はチェックをいれてください。</span>',
        'section' => 'postpage_section',
        'type' => 'checkbox',
    ));
}
add_action('customize_register', 'opencage_postpage_customizer');
