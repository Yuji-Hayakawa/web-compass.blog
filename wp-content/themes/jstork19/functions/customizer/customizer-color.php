<?php

if (!defined('ABSPATH')) {
	exit;
}

function stk_customize_register($wp_customize)
{
	$wp_customize->add_section('colors', array(
		'title' => __('サイトカラー設定', 'opencage'),
		'priority' => 30,
		'description' => 'サイトの色変更が可能です。<br>※「背景色」を適用させたい場合は、【カスタマイズ > 背景画像】から背景画像を削除しておく必要があります。',
	));


	$wp_customize->add_setting('opencage_color_headerbg', array('default' => '#1bb4d3',));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'opencage_color_headerbg', array(
		'label' => __('[ヘッダー]背景色（メインカラー）', 'opencage'),
		'section' => 'colors',
		'settings' => 'opencage_color_headerbg',
	)));

	$wp_customize->add_setting('opencage_color_headerlogo', array('default' => '#eeee22',));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'opencage_color_headerlogo', array(
		'label' => __('[ヘッダー]サイトロゴ', 'opencage'),
		'section' => 'colors',
		'settings' => 'opencage_color_headerlogo',
	)));

	$wp_customize->add_setting('opencage_color_headertext', array('default' => '#edf9fc',));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'opencage_color_headertext', array(
		'label' => __('[ヘッダー]テキスト', 'opencage'),
		'section' => 'colors',
		'settings' => 'opencage_color_headertext',
	)));

	$wp_customize->add_setting('opencage_color_maintext', array('default' => '#3E3E3E',));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'opencage_color_maintext', array(
		'label' => __('[全体]テキスト色', 'opencage'),
		'section' => 'colors',
		'settings' => 'opencage_color_maintext',
	)));

	$wp_customize->add_setting('opencage_color_mainlink', array('default' => '#1bb4d3',));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'opencage_color_mainlink', array(
		'label' => __('リンク色', 'opencage'),
		'description' => '<span style="font-size:10px; opacity:0.7;">記事内のテキストリンク色</span>',
		'section' => 'colors',
		'settings' => 'opencage_color_mainlink',
	)));

	$wp_customize->add_setting('opencage_color_mainlink_hover', array('default' => '#E69B9B',));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'opencage_color_mainlink_hover', array(
		'label' => __('リンク色（hover時）', 'opencage'),
		'description' => '<span style="font-size:10px; opacity:0.7;">マウスオーバーの際のテキストリンク色</span>',
		'section' => 'colors',
		'settings' => 'opencage_color_mainlink_hover',
	)));


	$wp_customize->add_setting('opencage_color_contentbg', array('default' => '#ffffff',));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'opencage_color_contentbg', array(
		'label' => __('[メインコンテンツ]背景色', 'opencage'),
		'section' => 'colors',
		'settings' => 'opencage_color_contentbg',
	)));

	$wp_customize->add_setting('opencage_color_ttlbg', array('default' => '#1bb4d3',));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'opencage_color_ttlbg', array(
		'label' => __('[記事ページ]見出し(H2)背景', 'opencage'),
		'section' => 'colors',
		'settings' => 'opencage_color_ttlbg',
	)));

	$wp_customize->add_setting('opencage_color_ttltext', array('default' => '#ffffff',));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'opencage_color_ttltext', array(
		'label' => __('[記事ページ]見出し(H2)文字色', 'opencage'),
		'section' => 'colors',
		'settings' => 'opencage_color_ttltext',
	)));

	$wp_customize->add_setting('opencage_color_labelbg', array('default' => '#fcee21',));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'opencage_color_labelbg', array(
		'label' => __('[ラベル]背景色', 'opencage'),
		'section' => 'colors',
		'settings' => 'opencage_color_labelbg',
	)));

	$wp_customize->add_setting('opencage_color_labeltext', array('default' => '#3e3e3e',));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'opencage_color_labeltext', array(
		'label' => __('[ラベル]テキスト', 'opencage'),
		'section' => 'colors',
		'settings' => 'opencage_color_labeltext',
	)));


	$wp_customize->add_setting('opencage_color_sidetext', array('default' => '#3e3e3e',));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'opencage_color_sidetext', array(
		'label' => __('[サイドバー]テキスト', 'opencage'),
		'section' => 'colors',
		'settings' => 'opencage_color_sidetext',
	)));


	$wp_customize->add_setting('opencage_color_footerbg', array('default' => '#666666',));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'opencage_color_footerbg', array(
		'label' => __('[フッター]背景色', 'opencage'),
		'section' => 'colors',
		'settings' => 'opencage_color_footerbg',
	)));

	$wp_customize->add_setting('opencage_color_footertext', array('default' => '#CACACA',));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'opencage_color_footertext', array(
		'label' => __('[フッター]テキスト', 'opencage'),
		'section' => 'colors',
		'settings' => 'opencage_color_footertext',
	)));

	$wp_customize->add_setting('opencage_color_footerlink', array('default' => '#f7f7f7',));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'opencage_color_footerlink', array(
		'label' => __('[フッター]リンク', 'opencage'),
		'section' => 'colors',
		'settings' => 'opencage_color_footerlink',
	)));
}
add_action('customize_register', 'stk_customize_register');


function stk_customize_css_admin_classiceditor($mceInit)
{
	$styles = '.mce-content-body.editor-area { color: ' . get_theme_mod('opencage_color_maintext', '#3E3E3E') . '}';
	$styles .= '.mce-content-body.editor-area,.mce-content-body.editor-area blockquote:before,.mce-content-body.editor-area blockquote:after,.editor-styles-wrapper .mce-content-body blockquote:before,.editor-styles-wrapper .mce-content-body blockquote:after { background-color: ' . get_theme_mod('opencage_color_contentbg', '#ffffff') . '}';
	$styles .= '.mce-content-body.editor-area a { color: ' . get_theme_mod('opencage_color_mainlink', '#1bb4d3') . '}';
	$styles .= '.mce-content-body.editor-area h2,.mce-content-body.editor-area ol li:before { background-color: ' . get_theme_mod('opencage_color_ttlbg', '#1bb4d3') . '}';
	$styles .= '.mce-content-body.editor-area ol li:before { border-color: ' . get_theme_mod('opencage_color_ttlbg', '#1bb4d3') . '}';
	$styles .= '.mce-content-body.editor-area h2,.mce-content-body.editor-area ol li:before { color: ' . get_theme_mod('opencage_color_ttltext', '#ffffff') . '}';
	$styles .= '.mce-content-body.editor-area h3,.mce-content-body.editor-area h4 { border-color: ' . get_theme_mod('opencage_color_ttlbg', '#1bb4d3') . '}';
	$styles .= '.mce-content-body.editor-area ul li:before { color: ' . get_theme_mod('opencage_color_ttlbg', '#1bb4d3') . '}';
	$styles .= '.mce-content-body.editor-area .btn-wrap:not(.simple):not(.rich_yellow):not(.rich_pink):not(.rich_orange):not(.rich_green):not(.rich_blue) a { background-color: ' . get_theme_mod('opencage_color_mainlink', '#1bb4d3') . '}';
	$styles .= '.mce-content-body.editor-area .btn-wrap:not(.rich_yellow):not(.rich_pink):not(.rich_orange):not(.rich_green):not(.rich_blue) a, .mce-content-body.editor-area .btn-wrap.simple { border-color: ' . get_theme_mod('opencage_color_mainlink', '#1bb4d3') . '}';
	if (isset($mceInit['content_style'])) {
		$mceInit['content_style'] .= ' ' . $styles . ' ';
	} else {
		$mceInit['content_style'] = $styles . ' ';
	}
	return $mceInit;
}
add_filter('tiny_mce_before_init', 'stk_customize_css_admin_classiceditor');
