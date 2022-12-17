<?php

if (!defined('ABSPATH')) {
    exit;
}

// Classic editor body class
function stk_classic_editor_body_class($initArray)
{
    $initArray['body_class'] = 'editor-area';
    return $initArray;
}
add_filter('tiny_mce_before_init', 'stk_classic_editor_body_class');

// include editor css

add_action('admin_init',function(){
    add_editor_style('css/classic-editor-style.css');
});

// customizer css
function stk_add_customizer_stylesheet()
{
    wp_enqueue_style('stk-czr-style', get_template_directory_uri().'/css/customizer-style.css');
}
add_action('customize_controls_enqueue_scripts', 'stk_add_customizer_stylesheet');


// content width
function stk_content_width()
{
    global $content_width;
    if (is_page_template('page-wide.php') || is_page_template('page-full.php') || is_page_template('page-lp.php') || is_page_template('single-full.php')) {
        $content_width = 1166;
    }
}
add_action('template_redirect', 'stk_content_width');


// embedded content size
if (! isset($content_width)) {
    $content_width = 728;
}

// lp include header & footer
if (!function_exists('lp_template_if_header')) :
    function lp_template_if_header()
    {
        return ! (is_page_template('page-lp.php'));
    }
endif;
if (!function_exists('lp_template_if_footer')) :
    function lp_template_if_footer()
    {
        return lp_template_if_header();
    }
endif;

// Remove .hentry
function remove_hentry($classes)
{
    if (!is_single()) {
        $classes = array_diff($classes, array('hentry'));
    }
    return $classes;
}
add_filter('post_class', 'remove_hentry');

// 除外するカテゴリー
function stk_home_exclusion_category( $query ) {
    
    if( !get_theme_mod('stk_home_exclusion_cat') ) return $query;
    if( is_admin() ) return $query;
    
    $catId = get_theme_mod('stk_home_exclusion_cat');

    $catIds = double_explode(' ', ',', $catId);
    
    $ids = [];
    foreach ($catIds as $id) {
        $id = intval($id) * -1;
        $ids[] = $id;
    }

    // トップページの記事一覧とfeedかどうか
    if ( ($query->is_home() && $query->is_main_query()) || $query->is_feed() ) {
        $query->set( 'cat', $ids );
    }
    return $query;
}
add_action( 'pre_get_posts', 'stk_home_exclusion_category' );

// Add Class post_class
function add_class_article($classes)
{
    $classes[] = 'article';
    return $classes;
}
add_filter('post_class', 'add_class_article');

// Add Class body
add_filter('body_class', 'stk_custom_class');
function stk_custom_class($classes)
{
    if (
        (is_home() || is_archive() || is_search()) 
        && get_option('stk_archivelayout_onecolumn', 'sidebar_on') == 'sidebar_none' 
        && !is_mobile()
    ) {
        $classes[] = 'sidebar_none';
    }
    if ( stk_is_fixheader() )
    {
        $classes[] = 'fixhead-active';
    }
    if( stk_is_headeroverlay())
    {
        $classes[] = 'headeroverlay';
    }

    
    if (get_option('post_options_ttl', 'h_default') !== 'h_default') {
        $classes[] = get_option('post_options_ttl');
    }
    if (get_option('side_options_sidebarlayout', 'sidebarright') !== 'sidebarright') {
        $classes[] = get_option('side_options_sidebarlayout');
    }
    if (get_option('side_options_googlefontinclude', 'gf_Concert') !== 'gf_Concert') {
        $classes[] = get_option('side_options_googlefontinclude');
    }
    
    $classes[] = 'h_layout_pc_'.get_option('stk_header_layout_pc', stk_header_layout_option_patch());
    $classes[] = 'h_layout_sp_'.get_option('stk_header_layout_sp', 'center');

    return $classes;
}


// Remove WordPress Version
if (!function_exists('remove_src_wp_ver')) :
    function remove_src_wp_ver($dep)
    {
        $dep->default_version = '';
    }
    add_action('wp_default_scripts', 'remove_src_wp_ver');
    add_action('wp_default_styles', 'remove_src_wp_ver');
endif;

// カテゴリー・タグ一覧にIDを追加
if (is_admin()) {
    function stk_add_term_columns($columns)
    {
        $index = 2;
        return array_merge(
            array_slice($columns, 0, $index),
            array('id' => 'ID'),
            array_slice($columns, $index)
        );
    }
    add_filter('manage_edit-category_columns', 'stk_add_term_columns');
    add_filter('manage_edit-post_tag_columns', 'stk_add_term_columns');

    //IDを表示
    function stk_custom_term_columns($content, $column_name, $term_id)
    {
        if ('id' === $column_name) {
            $content = $term_id;
        }
        return $content;
    }
    add_action('manage_category_custom_column', 'stk_custom_term_columns', 10, 3);
    add_action('manage_post_tag_custom_column', 'stk_custom_term_columns', 10, 3);

    // ソート
    function stk_sort_term_columns($columns)
    {
        $columns['id'] = 'ID';
        return $columns;
    }
    add_filter('manage_edit-category_sortable_columns', 'stk_sort_term_columns');
    add_filter('manage_edit-post_tag_sortable_columns', 'stk_sort_term_columns');

    // ユーザーID欄を追加
    function stk_custom_useid_columns($columns)
    {
        $columns['user_id'] = 'ID';
        return $columns;
    }
    add_action('manage_users_columns', 'stk_custom_useid_columns', 10, 3);

    // ユーザーIDを表示
    function stk_custom_useid_columns_return($value, $column_name, $user_id)
    {
        $user = get_userdata($user_id);
        if ('user_id' == $column_name) {
            return $user_id;
        }
        return $value;
    }
    add_action('manage_users_custom_column', 'stk_custom_useid_columns_return', 10, 3);
}

// page tags
function add_tag_to_page()
{
    register_taxonomy_for_object_type('post_tag', 'page');
}
add_action('init', 'add_tag_to_page');

// category HTML tags
remove_filter('pre_term_description', 'wp_filter_kses');

// Site Search Page unset
if (!function_exists('stk_SearchFilter')) {
    function stk_SearchFilter($query)
    {
        if(is_admin() || ! $query->is_main_query()) {
            return;
        }

        $post_type_target = get_option('stk_search_filter', 'post');

        if($post_type_target == 'any') {
            return;
        }
        if($post_type_target == 'post_page') {
            $post_type_target = array('post', 'page');
        }

        if ( $query->is_search()) {
            $query->set('post_type', $post_type_target);
        }
    }
    add_filter('pre_get_posts', 'stk_SearchFilter');
}

// user page description html
remove_filter('pre_user_description', 'wp_filter_kses');

// User Profile set_unset
if (!function_exists('update_profile_fields')) {
    function update_profile_fields($contactmethods)
    {
        //項目の削除
        unset($contactmethods['aim']);
        unset($contactmethods['jabber']);
        unset($contactmethods['yim']);
        //項目の追加
        $contactmethods['twitter'] = 'Twitter';
        $contactmethods['facebook'] = 'Facebook';
        $contactmethods['instagram'] = 'Instagram';
        $contactmethods['youtube'] = 'YouTube';
        $contactmethods['line'] = 'LINE';
        $contactmethods['tiktok'] = 'TikTok';
        $contactmethods['userposition'] = '肩書';

        return $contactmethods;
    }
    add_filter('user_contactmethods', 'update_profile_fields', 10, 1);
}


// Self Pingback
function no_self_pingst(&$links)
{
    $home = home_url();
    foreach ($links as $l => $link) {
        if (0 === strpos($link, $home)) {
            unset($links[$l]);
        }
    }
}
add_action('pre_ping', 'no_self_pingst');


// Archives P Tags
add_filter('the_content', 'opencage_filter_ptags_on_images');
function opencage_filter_ptags_on_images($content)
{
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
// more
if (!function_exists('opencage_excerpt_more')) {
    add_filter('excerpt_more', 'opencage_excerpt_more');
    function opencage_excerpt_more($more)
    {
        global $post;
        return '...';
    }
}

// add_theme_support

add_theme_support('title-tag');

add_theme_support('post-thumbnails');

add_theme_support(
    'custom-background',
    array(
    'default-color' => 'f7f7f7',
    'wp-head-callback' => '_custom_background_cb',
    'admin-head-callback' => '',
    'admin-preview-callback' => ''
    )
);

add_theme_support('menus');
register_nav_menus(
    array(
        'main-nav' => 'グローバルナビ（PC用）' ,
        'main-nav-sp' => 'グローバルナビ（モバイル用）' ,
        'footer-links' => 'フッターナビ（ページ最下部）',
    )
);

// Custom Menu
if (!function_exists('description_in_nav_menu')) {
    add_filter('walker_nav_menu_start_el', 'description_in_nav_menu', 10, 4);
    function description_in_nav_menu($item_output, $item)
    {
        if (!empty($item->description)) {
            $pattern = '/(<a.*?>)([^<]*?)<\/a/';
            $replace =  '$1' . '<span class="gnav_ttl">' . '$2' . '</span><span class="gf">' . $item->description . '</span></a';
            $item_output = preg_replace($pattern, $replace, $item_output);
        }
        return $item_output;
    }
}


add_theme_support(
    'custom-logo',
    array(
    'height' => 120,
    'width' => 420,
    'flex-height' => true,
    'flex-width'  => true,
    )
);

add_theme_support('automatic-feed-links');

add_theme_support('html5', array(
    'comment-list',
    'search-form',
    'comment-form',
    'gallery',
    'caption',
));

// Classic Editor YouTube responsive
add_filter('the_content', 'classic_youtube_responsive');
function classic_youtube_responsive($the_content)
{
    $pattern = '#<p.*<iframe.*src="https://www.youtube.com/(.+?)</p>#i';
    $replace = '<figure class="wp-block-embed-youtube wp-block-embed is-type-video is-provider-youtube wp-embed-aspect-16-9 wp-has-aspect-ratio"><div class="wp-block-embed__wrapper"><iframe src="https://www.youtube.com/$1</div></figure>';
    return preg_replace($pattern, $replace, $the_content);
}


add_filter('the_generator', 'opencage_rss_version');
function opencage_rss_version()
{
    return '';
}

function opencage_remove_wp_ver_css_js($src)
{
    if (strpos($src, 'ver=')) {
        $src = remove_query_arg('ver', $src);
    }
    return $src;
}

add_filter('wp_head', 'opencage_remove_wp_widget_recent_comments_style', 1);
function opencage_remove_wp_widget_recent_comments_style()
{
    if (has_filter('wp_head', 'wp_widget_recent_comments_style')) {
        remove_filter('wp_head', 'wp_widget_recent_comments_style');
    }
}

add_action('wp_head', 'opencage_remove_recent_comments_style', 1);
function opencage_remove_recent_comments_style()
{
    global $wp_widget_factory;
    if (isset($wp_widget_factory->widgets['WP_Widget_Recent_Comments'])) {
        remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
    }
}

// Thumbnail Size
if (!function_exists('add_mythumbnail_size')) {
    function add_mythumbnail_size()
    {
        add_image_size('oc-post-thum', 485, 9999, false);
    }
    add_action('after_setup_theme', 'add_mythumbnail_size');
}

if (get_option('advanced_print_emoji', 'on') == 'off') {
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
}


// LP CUSTOM POST
if (!function_exists('custom_post_lp') && (get_option('advanced_custom_lp', 'off') == "on")) {
    add_action('init', 'custom_post_lp');
    function custom_post_lp()
    {
        register_post_type(
            'post_lp',
            array( 'labels' => array(
                'name' => __('ランディングページ', 'opencagetheme'),
                'singular_name' => __('ランディングページ', 'opencagetheme'),
                'all_items' => __('すべてのランディングページ', 'opencagetheme'),
                'add_new' => __('新規作成', 'opencagetheme'),
                'add_new_item' => __('ランディングページをつくる', 'opencagetheme'),
                'edit' => __('編集', 'opencagetheme'),
                'edit_item' => __('ランディングページを編集', 'opencagetheme'),
                'new_item' => __('New Post Type', 'opencagetheme'),
                'view_item' => __('ランディングページを表示', 'opencagetheme'),
                'search_items' => __('ランディングページを検索', 'opencagetheme'),
                'not_found' =>  __('Nothing found in the Database.', 'opencagetheme'),
                'not_found_in_trash' => __('Nothing found in Trash', 'opencagetheme'),
                'parent_item_colon' => ''
                ),
                'description' => __('ランディングページをつくれます。', 'opencagetheme'),
                'public' => true,
                'publicly_queryable' => true,
                'exclude_from_search' => false,
                'show_ui' => true,
                'query_var' => true,
                'show_in_rest' => true,
                'menu_position' => 20,
                'menu_icon' => 'dashicons-admin-page',
                'rewrite'	=> array( 'slug' => 'post_lp', 'with_front' => false ),
                'has_archive' => 'post_lp',
                'capability_type' => 'page',
                'hierarchical' => true,
                'supports' => array('title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'custom-fields', 'comments', 'revisions', 'page-attributes')
            )
        );
    }
}


// ウィジェットを追加する
function add_stk_manual_widget__html()
{
    $icon_external = ' <div class="dashicons dashicons-external"></div>';
    echo '
	<p>STORK19の使い方を解説したページへリンクしています。</p>
	<a class="button button-primary button-hero" href="https://www.stork19.com/document/" target="_blank" rel=”noopener”>STORK19の使い方一覧をみる'.$icon_external.'</a>
	<ol class="stk_manual_widget custom_widget">
		<li><a target="_blank" rel=”noopener” href="https://www.stork19.com/category/basic-setting/">基本設定'.$icon_external.'</a></li>
		<li><a target="_blank" rel=”noopener” href="https://www.stork19.com/category/basic-setting/global-setting/">サイト全体の設定'.$icon_external.'</a></li>
		<li><a target="_blank" rel=”noopener” href="https://www.stork19.com/category/basic-setting/post_page-setting/">記事ページに関する設定'.$icon_external.'</a></li>
		<li><a target="_blank" rel=”noopener” href="https://www.stork19.com/block-style/">STORK19のブロックエディタについての解説'.$icon_external.'</a></li>
	</ol>
	';
}
function add_stk_manual_widget()
{
    wp_add_dashboard_widget('stk_manual_widget', 'STORK19マニュアル', 'add_stk_manual_widget__html');
}
add_action('wp_dashboard_setup', 'add_stk_manual_widget');

// adminbarにマニュアルのリンクを追加
// add_action('admin_bar_menu', 'add_stk_manual_admin_bar', 999);
function add_stk_manual_admin_bar($wp_admin_bar)
{
    // 1st menu
    $wp_admin_bar->add_menu(array(
        'id'    => 'stk-manual-link',
        'title' => '<span class="ab-icon" aria-hidden="true"></span> STORK19マニュアル',
        'href'  => 'https://www.stork19.com/document/',
        'meta'  => [
            'target' => '_blank',
            'rel' => 'noopener',
        ],
    ));
    //　2nd　sab menu
    $wp_admin_bar->add_menu(array(
        'parent' => 'stk-manual-link',
        'id'     => 'stk-manual-link-document',
        'title'  => 'STORK19マニュアル',
        'href'   => 'https://www.stork19.com/document/',
        'meta'  => [
            'target' => '_blank',
            'rel' => 'noopener',
        ],
    ));
    $wp_admin_bar->add_menu(array(
        'parent' => 'stk-manual-link',
        'id'     => 'stk-manual-link-global-setting',
        'title'  => 'サイト全体の設定',
        'href'   => 'https://www.stork19.com/category/basic-setting/global-setting/',
        'meta'  => [
            'target' => '_blank',
            'rel' => 'noopener',
        ],
    ));
    $wp_admin_bar->add_menu(array(
        'parent' => 'stk-manual-link',
        'id'     => 'stk-manual-link-post_page-setting',
        'title'  => '記事ページに関する設定',
        'href'   => 'https://www.stork19.com/category/basic-setting/post_page-setting/',
        'meta'  => [
            'target' => '_blank',
            'rel' => 'noopener',
        ],
    ));
    $wp_admin_bar->add_menu(array(
        'parent' => 'stk-manual-link',
        'id'     => 'stk-manual-link-block-style',
        'title'  => 'ブロックエディタについての解説',
        'href'   => 'https://www.stork19.com/block-style/',
        'meta'  => [
            'target' => '_blank',
            'rel' => 'noopener',
        ],
    ));
    $wp_admin_bar->add_menu(array(
        'parent' => 'stk-manual-link',
        'id'     => 'stk-manual-link-short-code',
        'title'  => 'ショートコード一覧',
        'href'   => 'https://www.stork19.com/short-code/',
        'meta'  => [
            'target' => '_blank',
            'rel' => 'noopener',
        ],
    ));
}