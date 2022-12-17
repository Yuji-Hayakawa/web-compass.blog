<?php

if (!defined('ABSPATH')) {
    exit;
}


// global setting
function opencage_global_customizer($wp_customize)
{
    $wp_customize->add_panel(
        'global_section',
        array(
            'title' => 'サイト全体の設定',
            'priority' => 1,
            'description' => 'サイト全体のレイアウトやフォント、ウィジェット関連の設定ができます。',
        )
    );

    // ---------------------------------------------
    // パネル

    $wp_customize->add_section('title_tagline', array(
        'title' => 'サイト基本設定・ロゴ・ヘッダー',
        'priority' => 1,
        'description' => 'サイトの基本的な設定が可能です。ロゴ画像やファビコン（サイトアイコン）はこちらのページからアップロード可能。',
        'panel' => 'global_section',
    ));


    $wp_customize->add_section('global_section__font', array(
        'title' => 'フォントサイズ・Googleフォント設定',
        'panel' => 'global_section',
    ));

    $wp_customize->add_section('global_section__headerunder', array(
        'title' => 'ヘッダー下お知らせテキスト',
        'panel' => 'global_section',
    ));

    $wp_customize->add_section('global_section__sitelayout', array(
        'title' => 'パンくずナビ・メインカラム設定',
        'panel' => 'global_section',
    ));

    $wp_customize->add_section('global_section__pagetop', array(
        'title' => 'ページトップへ戻るボタン',
        'panel' => 'global_section',
    ));

    $wp_customize->add_section('global_section__widget', array(
        'title' => 'ウィジェット関連の設定',
        'panel' => 'global_section',
    ));

    $wp_customize->add_section('global_section__richresults', array(
        'title' => '構造化データの設定',
        'panel' => 'global_section',
        'description' => 'JSON-LD形式の構造化データを表示するために必要な項目です。',
    ));


    // ---------------------------------------------
    // セレクターショートカット
    $wp_customize->selective_refresh->add_partial(
        'custom_logo',
        array(
            'selector' => '.site__logo__title',
        )
    );
    $wp_customize->selective_refresh->add_partial(
        'other_options_headerundertext',
        array(
            'selector' => '.header-info__link',
        )
    );
    $wp_customize->selective_refresh->add_partial(
        'pannavi_position',
        array(
            'selector' => '#breadcrumb .wrap',
        )
    );
    $wp_customize->selective_refresh->add_partial(
        'side_options_cataccordion',
        array(
            'selector' => '.widget.widget_categories',
        )
    );
    $wp_customize->selective_refresh->add_partial(
        'side_options_twitterlink_url',
        array(
            'selector' => '.stk_sns_links',
        )
    );


    $wp_customize->add_setting('opencage_site_description', array(
        'type'  => 'option',
        'default' => 'sitedes_off',
    ));
    $wp_customize->add_control('opencage_site_description', array(
        'settings' => 'opencage_site_description',
        'label' => 'キャッチフレーズを表示する',
        'description' => '<span style="font-size:11px;">サイトタイトル上に「キャッチフレーズ」を表示するかどうかの設定です。</span>',
        'section' => 'title_tagline',
        'type' => 'radio',
        'choices' => array(
            'sitedes_on' => '表示する',
            'sitedes_off' => '表示しない',
        ),
    ));

    $wp_customize->add_setting('opencage_logo_gf', array(
        'type'  => 'option',
        'default' => 'off',
    ));
    $wp_customize->add_control('opencage_logo_gf', array(
        'settings' => 'opencage_logo_gf',
        'label' => 'サイトのタイトルをGoogleフォントにする',
        'description' => '<span style="font-size:11px;">※日本語フォントには適用されません。</span>',
        'section' => 'title_tagline',
        'type' => 'radio',
        'choices' => array(
            'on' => '適用する',
            'off' => '適用しない',
        ),
    ));


    $wp_customize->add_setting('opencage_logo_size', array(
        'type'  => 'option',
        'default' => 'fs_m',
    ));
    $wp_customize->add_control('opencage_logo_size', array(
        'settings' => 'opencage_logo_size',
        'label' => 'ロゴサイズ変更',
        'description' => '<span style="font-size:11px;">ロゴのフォントサイズを変更できます。</span>',
        'section' => 'title_tagline',
        'type' => 'radio',
        'choices' => array(
            'fs_ss' => 'フォントサイズ SS',
            'fs_s' => 'フォントサイズ S',
            'fs_m' => 'フォントサイズ M（デフォルト）',
            'fs_l' => 'フォントサイズ L',
            'fs_ll' => 'フォントサイズ LL',
            'fs_custom' => 'カスタムフォントサイズ（詳細設定）',
        ),
    ));

    $wp_customize->add_setting('opencage_logo_size_custom_sp', array(
        'type'  => 'option',
        'default' => '25',
        'sanitize_callback' => 'theme_slug_sanitize_number_range',
    ));
    $wp_customize->add_control('opencage_logo_size_custom_sp', array(
        'settings' => 'opencage_logo_size_custom_sp',
        'label' => 'カスタムロゴサイズ（モバイル）',
        'description' => '<span style="font-size:11px;">【画面サイズ~980px】ロゴ（サイトタイトル）の大きさをpx単位で指定できます。（※画像の場合は最大の高さ）</span>',
        'section' => 'title_tagline',
        'type' => 'number',
        'input_attrs' => array(
            'step'     => '1',
            'min'      => '2',
            'max'      => '500',
        ),
        'active_callback'    => 'callback_oc_customlogosize',
    ));

    $wp_customize->add_setting('opencage_logo_size_custom_sp_margin', array(
        'type'  => 'option',
        'default' => '5',
        'sanitize_callback' => 'theme_slug_sanitize_number_range',
    ));
    $wp_customize->add_control('opencage_logo_size_custom_sp_margin', array(
        'settings' => 'opencage_logo_size_custom_sp_margin',
        'label' => 'ロゴ上下の余白（モバイル）',
        'description' => '<span style="font-size:11px;">サイトロゴ上下の余白を設定できます。</span>',
        'section' => 'title_tagline',
        'type' => 'number',
        'input_attrs' => array(
            'step'     => '1',
            'min'      => '0',
            'max'      => '500',
        ),
        'active_callback'    => 'callback_oc_customlogosize',
    ));

    $wp_customize->add_setting('opencage_logo_size_custom_pc', array(
        'type'  => 'option',
        'default' => '30',
        'sanitize_callback' => 'theme_slug_sanitize_number_range',
    ));
    $wp_customize->add_control('opencage_logo_size_custom_pc', array(
        'settings' => 'opencage_logo_size_custom_pc',
        'label' => 'カスタムロゴサイズ（PC / タブレット）',
        'description' => '<span style="font-size:11px;">【画面サイズ981px~】ロゴ（サイトタイトル）の大きさをpx単位で指定できます。（※画像の場合は最大の高さ）</span>',
        'section' => 'title_tagline',
        'type' => 'number',
        'input_attrs' => array(
            'step'     => '1',
            'min'      => '2',
            'max'      => '500',
        ),
        'active_callback'    => 'callback_oc_customlogosize',
    ));
    $wp_customize->add_setting('opencage_logo_size_custom_pc_margin', array(
        'type'  => 'option',
        'default' => '5',
        'sanitize_callback' => 'theme_slug_sanitize_number_range',
    ));
    $wp_customize->add_control('opencage_logo_size_custom_pc_margin', array(
        'settings' => 'opencage_logo_size_custom_pc_margin',
        'label' => 'ロゴ上下の余白（PC / タブレット）',
        'description' => '<span style="font-size:11px;">サイトロゴ上下の余白を設定できます。</span>',
        'section' => 'title_tagline',
        'type' => 'number',
        'input_attrs' => array(
            'step'     => '1',
            'min'      => '0',
            'max'      => '500',
        ),
        'active_callback'    => 'callback_oc_customlogosize',
    ));

    // カスタムフォントサイズの active_callback関数
    function callback_oc_customlogosize($control)
    {
        if ($control->manager->get_setting('opencage_logo_size')->value() == 'fs_custom') {
            return true;
        } else {
            return false;
        }
    }

    // ---------------------------------------------
    //　ヘッダー設定

    $wp_customize->add_setting('stk_header_layout_pc', array(
        'type'  => 'option',
        'default' => stk_header_layout_option_patch(),
    ));

    $wp_customize->add_control('stk_header_layout_pc', array(
        'settings' => 'stk_header_layout_pc',
        'label' => 'ヘッダーのデザイン（PC）',
        // 'description' => '<span style="font-size:11px;">サイトのメインヘッダーの背景を横幅いっぱいに表示することができます。（※PC表示）</span>',
        'section' => 'title_tagline',
        'type' => 'radio',
        'choices' => array(
            'left_full' => 'ロゴ左：フル',
            'left_wide' => 'ロゴ左：ワイド',
            'left_normal' => 'ロゴ左：コンテンツ幅',
            'center_full' => 'ロゴ中央：フル',
            'center_wide' => 'ロゴ中央：ワイド',
            'center_normal' => 'ロゴ中央：コンテンツ幅',
        ),
    ));

    $wp_customize->add_setting('stk_header_layout_sp', array(
        'type'  => 'option',
        'default' => 'center',
    ));

    $wp_customize->add_control('stk_header_layout_sp', array(
        'settings' => 'stk_header_layout_sp',
        'label' => 'ヘッダーのデザイン（モバイル）',
        // 'description' => '<span style="font-size:11px;">サイトのメインヘッダーの背景を横幅いっぱいに表示することができます。（※PC表示）</span>',
        'section' => 'title_tagline',
        'type' => 'radio',
        'choices' => array(
            'center' => 'ロゴ中央',
            'left' => 'ロゴ左',
        ),
    ));


    $wp_customize->add_setting('side_options_headerfix', array(
        'type'  => 'option',
        'default' => 'headernormal',
    ));
    $wp_customize->add_control('side_options_headerfix', array(
        'settings' => 'side_options_headerfix',
        'label' => 'サイトヘッダーの固定',
        'description' => '<span style="font-size:11px;">ヘッダーをスクロールに追従させることができます。（※モダンブラウザのみに対応）</span>',
        'section' => 'title_tagline',
        'type' => 'radio',
        'choices' => array(
            'headernormal' => '固定しない（デフォルト）',
            'headerfix' => 'すべての端末で固定する',
            'headerfixpc' => 'PCでのみ固定する',
            'headerfixmobile' => 'スマートフォンでのみ固定する',
        ),
    ));

    $wp_customize->add_setting('side_options_header_search2', array(
        'type'  => 'option',
        'default' => 'search_on',
    ));
    $wp_customize->add_control('side_options_header_search2', array(
        'settings' => 'side_options_header_search2',
        'label' => '検索 or お問い合わせボタンの表示設定',
        'section' => 'title_tagline',
        'type' => 'radio',
        'choices' => array(
            'search_off' => '表示しない',
            'search_on' => '検索ボタンを表示',
            'contact_on' => 'お問い合わせボタンを表示（詳細設定）',
        ),
    ));

    // お問い合わせボタンの active_callback関数
    function callback_oc_contactlink($control)
    {
        if ($control->manager->get_setting('side_options_header_search2')->value() == 'contact_on') {
            return true;
        } else {
            return false;
        }
    }
    $wp_customize->add_setting('stk_contactpage_url');
    $wp_customize->add_control('stk_contactpage_url', array(
        'settings' => 'stk_contactpage_url',
        'label' => 'お問い合わせボタンのリンク',
        'description' => '<span style="font-size:11px;"><span style="color:red;">※ボタンを表示する場合は必須</span> リンクさせたいお問い合わせページなどのURLを入力</span>',
        'section' => 'title_tagline',
        'active_callback' => 'callback_oc_contactlink',
    ));
    $wp_customize->add_setting('stk_contactpage_text', array(
        'type'  => 'option',
    ));
    $wp_customize->add_control('stk_contactpage_text', array(
        'settings' => 'stk_contactpage_text',
        'label' => 'お問い合わせアイコン下のテキスト',
        'description' => '<span style="font-size:11px;">デフォルト(CONTACT)を別の文字に置き換えます。</span>',
        'section' => 'title_tagline',
        'active_callback' => 'callback_oc_contactlink',
    ));

    $wp_customize->add_setting('stk_navbtn_menu_mode', array(
        'default' => '--modenormal',
    ));
    $wp_customize->add_control('stk_navbtn_menu_mode', array(
        'settings' => 'stk_navbtn_menu_mode',
        'label' => 'ハンバーガーメニューの表示方法',
        'description' => '<span style="font-size:11px;">ハンバーガーメニューをタップした際のメニューの表示方法</span>',
        'section' => 'title_tagline',
        'type' => 'radio',
        'choices' => array(
            '--modenormal' => '中央に表示',
            '--modeleft' => '左から表示',
            // '--moderight' => '右から表示',
        ),
    ));

    $wp_customize->add_setting('side_options_header_btn_text_hide', array(
        'type'  => 'option',
    ));
    $wp_customize->add_control('side_options_header_btn_text_hide', array(
        'settings' => 'side_options_header_btn_text_hide',
        'label' => 'アイコン下の文字を非表示にする',
        'description' => '<span style="font-size:11px;">検索ボタン、メニューボタンのアイコン下のテキストを非表示にできます。</span>',
        'section' => 'title_tagline',
        'type' => 'checkbox',
    ));

    //sns links
    $wp_customize->add_setting('stk_facebooklink_url');
    $wp_customize->add_control('stk_facebooklink_url', array(
        'settings' => 'stk_facebooklink_url',
        'label' => '[リンクアイコン]Facebook',
        'description' => '<span style="font-size:11px;">リンクさせたいfacebookページのURLを入力</span>',
        'section' => 'title_tagline',
    ));
    $wp_customize->add_setting('stk_twitterlink_url');
    $wp_customize->add_control('stk_twitterlink_url', array(
        'settings' => 'stk_twitterlink_url',
        'label' => '[リンクアイコン]Twitter',
        'description' => '<span style="font-size:11px;">リンクさせたいTwitterのURLを入力</span>',
        'section' => 'title_tagline',
    ));
    $wp_customize->add_setting('stk_youtubelink_url');
    $wp_customize->add_control('stk_youtubelink_url', array(
        'settings' => 'stk_youtubelink_url',
        'label' => '[リンクアイコン]YouTube',
        'description' => '<span style="font-size:11px;">リンクさせたいYouTubeチャンネルのURLを入力</span>',
        'section' => 'title_tagline',
    ));
    $wp_customize->add_setting('stk_instagramlink_url');
    $wp_customize->add_control('stk_instagramlink_url', array(
        'settings' => 'stk_instagramlink_url',
        'label' => '[リンクアイコン]Instagram',
        'description' => '<span style="font-size:11px;">リンクさせたいInstagramのURLを入力</span>',
        'section' => 'title_tagline',
    ));
    $wp_customize->add_setting('stk_linelink_url');
    $wp_customize->add_control('stk_linelink_url', array(
        'settings' => 'stk_linelink_url',
        'label' => '[リンクアイコン]LINE',
        'description' => '<span style="font-size:11px;">リンクさせたいLINE公式アカウントのURLを入力</span>',
        'section' => 'title_tagline',
    ));
    $wp_customize->add_setting('stk_tiktoklink_url');
    $wp_customize->add_control('stk_tiktoklink_url', array(
        'settings' => 'stk_tiktoklink_url',
        'label' => '[リンクアイコン]TikTok',
        'description' => '<span style="font-size:11px;">リンクさせたいTikTokのURLを入力</span>',
        'section' => 'title_tagline',
    ));

    $wp_customize->add_setting('stk_snslinks_pc_hide');
    $wp_customize->add_control('stk_snslinks_pc_hide', array(
        'settings' => 'stk_snslinks_pc_hide',
        'label' => 'PCで非表示にする',
        'section' => 'title_tagline',
        'type' => 'checkbox',
    ));

    $wp_customize->add_setting('stk_snslinks_sp_hide');
    $wp_customize->add_control('stk_snslinks_sp_hide', array(
        'settings' => 'stk_snslinks_sp_hide',
        'label' => 'モバイルで非表示にする',
        'section' => 'title_tagline',
        'type' => 'checkbox',
    ));

    // ---------------------------------------------
    $wp_customize->add_setting('other_options_headerundertext', array(
        'type'  => 'option',
    ));
    $wp_customize->add_control('other_options_headerundertext', array(
        'settings' => 'other_options_headerundertext',
        'label' => 'ヘッダー下お知らせテキスト',
        'description' => '<span style="font-size:11px;">ヘッダー下にお知らせを表示できます。イベントの告知や読んで欲しい記事などへのリンクを設置したりと、使い方は様々！※下の「<b>ヘッダー下お知らせリンク</b>」を設定しないと表示されません</span>',
        'section' => 'global_section__headerunder',
    ));

    $wp_customize->add_setting('other_options_headerunderlink', array(
        'type'  => 'option',
    ));
    $wp_customize->add_control('other_options_headerunderlink', array(
        'settings' => 'other_options_headerunderlink',
        'label' => 'ヘッダー下お知らせリンク',
        'description' => '<span style="font-size:11px;">ヘッダー下のお知らせにリンクを設置可能です。<br>例）https://open-cage.com</span>',
        'section' => 'global_section__headerunder',
    ));
    $wp_customize->add_setting('other_options_headerunderlink_bgcolor', array(
        'default' => '#f55e5e',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'other_options_headerunderlink_bgcolor', array(
        'settings' => 'other_options_headerunderlink_bgcolor',
        'label' => 'お知らせ背景色1',
        'section' => 'global_section__headerunder',
    )));
    $wp_customize->add_setting('other_options_headerunderlink_bgcolor2', array(
        'default' => '#ffbaba',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'other_options_headerunderlink_bgcolor2', array(
        'settings' => 'other_options_headerunderlink_bgcolor2',
        'label' => 'お知らせ背景色2',
        'description' => '<span style="font-size:11px;">背景色2を設定することでグラデーションにすることが可能です。背景色1と同じ色にすれば単色にできます。</span>',
        'section' => 'global_section__headerunder',
    )));
    $wp_customize->add_setting('other_options_headerunderlink_target', array(
        'type'  => 'option',
    ));
    $wp_customize->add_control('other_options_headerunderlink_target', array(
        'settings' => 'other_options_headerunderlink_target',
        'label' => 'リンクを別タブで開く（_target設定）',
        'description' => '<span style="font-size:11px;"><br></span>',
        'section' => 'global_section__headerunder',
        'type' => 'checkbox',
    ));


    $wp_customize->add_setting('side_options_sidebarlayout', array(
        'type'  => 'option',
        'default' => 'sidebarright',
    ));
    $wp_customize->add_control('side_options_sidebarlayout', array(
        'settings' => 'side_options_sidebarlayout',
        'label' => 'メインカラム表示位置',
        'section' => 'global_section__sitelayout',
        'type' => 'radio',
        'choices' => array(
            'sidebarright' => 'メインカラム左側（デフォルト）',
            'sidebarleft' => 'メインカラム右側',
        ),
    ));

    $wp_customize->add_setting('pannavi_position', array(
        'type'  => 'option',
        'default' => 'pannavi_on_bottom',
    ));
    $wp_customize->add_control('pannavi_position', array(
        'settings' => 'pannavi_position',
        'label' => 'パンくずナビ表示設定',
        'description' => '<span style="font-size:11px;">パンくずナビの表示位置のコントロールができます。</span>',
        'section' => 'global_section__sitelayout',
        'type' => 'radio',
        'choices' => array(
            'pannavi_on' => 'パンくずナビを「サイト上部」に表示する',
            'pannavi_on_bottom' => 'パンくずナビを「サイト下部」に表示する',
            'pannavi_off' => 'パンくずナビを表示しない',
        ),
    ));


    $wp_customize->add_setting('stk_basefontfamily', array(
        'default' => 'default',
    ));
    $wp_customize->add_control('stk_basefontfamily', array(
        'settings' => 'stk_basefontfamily',
        'label' => 'ベースフォント',
        'section' => 'global_section__font',
        'type' => 'radio',
        'choices'  => array(
            'default' => '游ゴシック体ベース（デフォルト）',
            'hiragino' => 'ヒラギノ角ゴ、メイリオベース',
            'yumincyo' => '明朝体ベース',
        ),
    ));

    $wp_customize->add_setting('side_options_googlefontinclude', array(
        'type'  => 'option',
        'default' => 'gf_Concert',
    ));
    $wp_customize->add_control('side_options_googlefontinclude', array(
        'settings' => 'side_options_googlefontinclude',
        'label' => 'Googleフォント設定',
        'description' => '<span style="font-size:11px;">読み込むGoogleフォントを変更できます。</span>',
        'section' => 'global_section__font',
        'type' => 'radio',
        'choices' => array(
            'gf_Concert' => 'Concert（デフォルト）',
            'gf_Quicksand' => 'Quicksand',
            'gf_Roboto' => 'Roboto',
            'gf_UbuntuCon' => 'UbuntuCon',
            'gf_Lora' => 'Lora',
            'gf_Lobster' => 'Lobster Two',
            'gf_Catamaran' => 'Catamaran',
            'gf_none' => 'Googleフォントを適用しない',
        ),
    ));

    $wp_customize->add_setting('stk_basefontsize_pc', array(
        'default' => '103%',
    ));
    $wp_customize->add_control('stk_basefontsize_pc', array(
        'settings' => 'stk_basefontsize_pc',
        'label' => 'フォントサイズ設定（PC）',
        'description' => '<span style="font-size:11px;">画面幅768px以上の場合のベースフォントサイズ（14〜20px）</span>',
        'section' => 'global_section__font',
        'type' => 'select',
        'choices'  => array(
            '103%' => 'デフォルトサイズ',
            '14px' => '14px',
            '15px' => '15px',
            '16px' => '16px',
            '17px' => '17px',
            '18px' => '18px',
            '19px' => '19px',
            '20px' => '20px',
        ),
    ));


    $wp_customize->add_setting('stk_basefontsize_sp', array(
        'default' => '103%',
    ));
    $wp_customize->add_control('stk_basefontsize_sp', array(
        'settings' => 'stk_basefontsize_sp',
        'label' => 'フォントサイズ設定（SP）',
        'description' => '<span style="font-size:11px;">【モバイル用】画面幅767px以下の場合のベースフォントサイズ（14〜18px）</span>',
        'section' => 'global_section__font',
        'type' => 'select',
        'choices'  => array(
            '103%' => 'デフォルトサイズ',
            '14px' => '14px',
            '15px' => '15px',
            '16px' => '16px',
            '17px' => '17px',
            '18px' => '18px',
        ),
    ));


    $wp_customize->add_setting('advanced_pagetop_btn', array(
        'type'  => 'option',
        'default' => 'on',
    ));
    $wp_customize->add_control('advanced_pagetop_btn', array(
        'label' => 'ページトップへ戻るボタン',
        'description' => '<span style="font-size:11px;">画面右下に出現するページトップ戻るボタンの表示設定。</span>',
        'settings' => 'advanced_pagetop_btn',
        'section' => 'global_section__pagetop',
        'type' => 'radio',
        'choices' => array(
            'on' => '表示する（デフォルト）',
            'off' => '表示しない',
        ),
    ));



    $wp_customize->add_setting('side_options_cataccordion', array(
        'type'  => 'option',
        'default' => 'accordion_on',
    ));
    $wp_customize->add_control('side_options_cataccordion', array(
        'settings' => 'side_options_cataccordion',
        'label' => '[ウィジェット]サブカテゴリー階層化',
        'description' => '<span style="font-size:11px;">カテゴリーウィジェットのサブカテゴリーを隠しておいて、ボタンで表示させることができます。</span>',
        'section' => 'global_section__widget',
        'type' => 'radio',
        'choices' => array(
            'accordion_on' => 'サブカテゴリーを折りたたむ（+ボタンで表示できるようになります）',
            'accordion_off' => 'サブカテゴリーを全て表示',
        ),
    ));
    
    

    $wp_customize->add_setting(
        'stk_jsonld_display',
        array(
            'default' => 'off',
        )
    );
    $wp_customize->add_control('stk_jsonld_display', array(
        'settings' => 'stk_jsonld_display',
        'label' => '構造化データの出力',
        'description' => '<span style="font-size:11px;">構造化データ（リッチリザルト）を出力するかどうかの設定。</span>',
        'section' => 'global_section__richresults',
        'type' => 'radio',
        'choices' => array(
            'on' => '出力する',
            'off' => '出力しない',
        ),
    ));

    $wp_customize->add_setting(
        'stk_publisher_type',
        array(
            'default' => 'Organization',
        )
    );
    $wp_customize->add_control('stk_publisher_type', array(
        'settings' => 'stk_publisher_type',
        'label' => '組織タイプ',
        'section' => 'global_section__richresults',
        'type' => 'select',
        'choices' => array(
            'Organization' => '組織',
            'Person' => '個人',
        ),
    ));

    $wp_customize->add_setting('stk_publisher_name');
    $wp_customize->add_control('stk_publisher_name', array(
        'settings' => 'stk_publisher_name',
        'label' => '組織名',
        'description' => '<span style="font-size:11px;">企業名や団体名など。特になければサイト名などを入力。</span>',
        'section' => 'global_section__richresults',
    ));

    $wp_customize->add_setting(
        'stk_publisher_logo'
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'stk_publisher_logo',
            array(
                'settings'   => 'stk_publisher_logo',
                'label'        => 'ロゴ画像',
                'description' => '<span style="font-size:11px;">企業や団体のロゴ画像。特になければサイトロゴと同じ画像でもOK。</span>',
                'section'    => 'global_section__richresults',
            )
        )
    );


    if (is_plugin_active('wordpress-seo/wp-seo.php')) {// Yoast SEOプラグインが有効な場合
        $wp_customize->add_setting('stk_remove_other_jsonld_yoast');
        $wp_customize->add_control('stk_remove_other_jsonld_yoast', array(
            'settings' => 'stk_remove_other_jsonld_yoast',
            'label' => 'YoastSEOの構造化データを取り除く',
            // 'description' => '<span style="font-size:11px;">YoastSEOプラグインが出力するJSON-LDを取り除きます。</span>',
            'section' => 'global_section__richresults',
            'type' => 'checkbox',
        ));
    }

    if (is_plugin_active('all-in-one-seo-pack/all_in_one_seo_pack.php')) { // AIO SEOプラグインが有効な場合
        $wp_customize->add_setting('stk_remove_other_jsonld_aioseo');
        $wp_customize->add_control('stk_remove_other_jsonld_aioseo', array(
            'settings' => 'stk_remove_other_jsonld_aioseo',
            'label' => 'All In One SEOの構造化データを取り除く',
            // 'description' => '<span style="font-size:11px;">All In One SEOプラグインが出力するJSON-LDを取り除きます。</span>',
            'section' => 'global_section__richresults',
            'type' => 'checkbox',
        ));
    }
}
add_action('customize_register', 'opencage_global_customizer');



// ---------------------------------------------
// ver 3.10 にてヘッダーレイアウトの仕様を変更
// 過去にカスタマイザーで設定していたものとの整合性をとるための関数

function stk_header_layout_option_patch()
{
    // 既存のlayout設定をここに代入
    $h_position = get_option('side_options_headercenter', 'headerleft') !== 'headerleft' ? 'center' : 'left';
    $side_options_headerbg = get_option('side_options_headerbg', 'bgfull');
    if ($side_options_headerbg === 'bgnormal') {
        $h_size = 'normal';
    } elseif ($side_options_headerbg === 'bgfull_wide') {
        $h_size = 'wide';
    } else {
        $h_size = 'full';
    }
    return $h_position . '_' . $h_size;
}
