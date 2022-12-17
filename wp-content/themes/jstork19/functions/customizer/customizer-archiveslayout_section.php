<?php

if (!defined('ABSPATH')) {
    exit;
}

// archives setting
function stk_layout_customizer($wp_customize)
{
    $wp_customize->add_section('archiveslayout_section', array(
        'title'          => '記事一覧ページ設定',
        'priority'       => 40,
        'description' => 'アーカイブページ（トップページ・カテゴリー・タグのページ等）のレイアウトなどを変更可能です。',
    ));

    $wp_customize->add_setting('stk_archives_noimg', array(
        'default' => get_theme_file_uri('/images/noimg.png'),
    ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'stk_archives_noimg', array(
        'settings'   => 'stk_archives_noimg',
        'label'        => 'NO IMAGE画像',
        'description' => '<span style="font-size:11px;">アイキャッチ画像を設定していない場合のNO IMAGE画像を変更することが可能です。</span>',
        'section'    => 'archiveslayout_section',
    )));

    $wp_customize->add_setting('post_new_mark', array(
        'type'  => 'option',
        'default' => '3',
    ));
    $wp_customize->add_control('post_new_mark', array(
        'settings' => 'post_new_mark',
        'label' => 'NEWマークの表示期間',
        'description' => '<span style="font-size:11px;">表示したい日数を入力することでNEWマークラベルを表示します。※NEWマークを非表示にしたい場合は「0」と記入します。</span>',
        'section' => 'archiveslayout_section',
        'type' => 'number',
    ));

    $wp_customize->add_setting('post_new_mark_bgcolor', array(
        'default' => '#ff6347',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'post_new_mark_bgcolor', array(
        'settings' => 'post_new_mark_bgcolor',
        'label' => 'NEWマークラベル背景色',
        'section' => 'archiveslayout_section',
    )));

    $wp_customize->selective_refresh->add_partial(
        'stk_archivelayout_home',
        array(
            'selector' => '.archives-list',
        )
    );
    $wp_customize->add_setting('stk_archivelayout_home', array(
        'type'  => 'option',
        'default' => 'toplayout-card',
    ));
    $wp_customize->add_control('stk_archivelayout_home', array(
        'settings' => 'stk_archivelayout_home',
        'label' => '[PC]トップページ記事レイアウト',
        'section' => 'archiveslayout_section',
        'type' => 'radio',
        'choices' => array(
            'toplayout-simple' => 'シンプル',
            'toplayout-card' => 'カード型',
            'toplayout-big' => 'ビッグ',
        ),
    ));

    $wp_customize->add_setting('stk_archivelayout_home_sp', array(
        'type'  => 'option',
        'default' => 'toplayout-simple',
    ));
    $wp_customize->add_control('stk_archivelayout_home_sp', array(
        'settings' => 'stk_archivelayout_home_sp',
        'label' => '[SP]トップページ記事レイアウト',
        'description' => '<span style="font-size:11px;">※PC画面では確認できません。実機にてご確認ください。</span>',
        'section' => 'archiveslayout_section',
        'type' => 'radio',
        'choices' => array(
            'toplayout-simple' => 'シンプル',
            'toplayout-card' => 'カード型',
            'toplayout-card2' => 'カード型（2カラム）',
            'toplayout-big' => 'ビッグ',
        ),
    ));

    $wp_customize->add_setting('stk_archivelayout', array(
        'type'  => 'option',
        'default' => 'toplayout-simple',
    ));
    $wp_customize->add_control('stk_archivelayout', array(
        'settings' => 'stk_archivelayout',
        'label' => '[PC]その他一覧ページ記事レイアウト',
        'section' => 'archiveslayout_section',
        'type' => 'radio',
        'choices' => array(
            'toplayout-simple' => 'シンプル',
            'toplayout-card' => 'カード型',
            'toplayout-big' => 'ビッグ',
        ),
    ));

    $wp_customize->add_setting('stk_archivelayout_sp', array(
        'type'  => 'option',
        'default' => 'toplayout-card',
    ));
    $wp_customize->add_control('stk_archivelayout_sp', array(
        'settings' => 'stk_archivelayout_sp',
        'label' => '[SP]その他一覧ページ記事レイアウト',
        'description' => '<span style="font-size:11px;">※PC画面では確認できません。実機にてご確認ください。</span>',
        'section' => 'archiveslayout_section',
        'type' => 'radio',
        'choices' => array(
            'toplayout-simple' => 'シンプル',
            'toplayout-card' => 'カード型',
            'toplayout-card2' => 'カード型（2カラム）',
            'toplayout-big' => 'ビッグ',
        ),
    ));

    $wp_customize->add_setting('stk_archives_posthtag', array(
        'type'  => 'option',
        'default' => 'h1',
    ));
    $wp_customize->add_control('stk_archives_posthtag', array(
        'settings' => 'stk_archives_posthtag',
        'label' => '記事タイトルの見出しタグ変更',
        'description' => '<span style="font-size:11px;">記事一覧ページにて「記事タイトルの見出しタグ」をデフォルトのh1タグから変更できます。</span>',
        'section' => 'archiveslayout_section',
        'type' => 'select',
        'choices' => array(
            'h1' => 'h1（デフォルト）',
            'h2' => 'h2',
            // 'h3' => 'h3',
            'div' => 'div',
        ),
    ));

    $wp_customize->add_setting('stk_archivelayout_onecolumn', array(
        'type'  => 'option',
        'default' => 'sidebar_on',
    ));
    $wp_customize->add_control('stk_archivelayout_onecolumn', array(
        'settings' => 'stk_archivelayout_onecolumn',
        'label' => '記事一覧ページのワンカラム化',
        'description' => '<span style="font-size:11px;">※サイドバーを表示せずに記事一覧ページをワンカラム化することができます。</span>',
        'section' => 'archiveslayout_section',
        'type' => 'select',
        'choices' => array(
            'sidebar_on' => '2カラム',
            'sidebar_none' => '1カラム（サイドバーなし）',
        ),
    ));

    $wp_customize->add_setting('stk_archive_description', array(
        'type'  => 'option',
        'default' => 'on',
    ));
    $wp_customize->add_control('stk_archive_description', array(
        'settings' => 'stk_archive_description',
        'label' => '抜粋の表示設定',
        'description' => '<span style="font-size:11px;">アーカイブページで記事冒頭の抜粋文の表示非表示を切り替えることができます。</span>',
        'section' => 'archiveslayout_section',
        'type' => 'select',
        'choices' => array(
            'on' => '表示する',
            'off' => '表示しない',
        ),
    ));

    $wp_customize->add_setting('stk_home_exclusion_cat', array(
        'default' => '',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
        // 'transport'   => 'postMessage',
    ));
    $wp_customize->add_control('stk_home_exclusion_cat', array(
        'settings' => 'stk_home_exclusion_cat',
        'label' => 'トップページ記事一覧から除外するカテゴリーID',
        'description' => '<span style="font-size:11px;">指定したカテゴリーIDの記事がトップページから除外されます。複数の場合は 1,3 のように ,（コンマ）または半角スペース区切りで指定。<a target="_blank" href="'. admin_url('edit-tags.php?taxonomy=category') . '">→カテゴリーIDを確認する</a></span>',
        'input_attrs' => array(
            'placeholder' => '例）1,125',
        ),
        'section' => 'archiveslayout_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('stk_search_filter', array(
        'type'  => 'option',
        'default' => 'post',
    ));
    $wp_customize->add_control('stk_search_filter', array(
        'settings' => 'stk_search_filter',
        'label' => '検索結果に表示する投稿タイプ',
        'description' => '<span style="font-size:11px;">記事を検索した場合に表示する投稿タイプの設定ができます。</span>',
        'section' => 'archiveslayout_section',
        'type' => 'select',
        'choices' => array(
            'post' => '投稿ページのみ',
            'post_page' => '投稿・固定ページ',
            'any' => 'すべての投稿タイプ',
        ),
    ));
}
add_action('customize_register', 'stk_layout_customizer');
