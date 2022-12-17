<?php

include_once(ABSPATH . 'wp-admin/includes/plugin.php');

if (!is_plugin_active('stork19-editor/stork19-editor.php')) {
    add_action('init', 'stk_assets_to_block_editor');
    function stk_assets_to_block_editor()
    {

        $script_asset = require( "index.asset.php" );
        wp_register_script(
            'stk_block_scripts',
            get_theme_file_uri('/blocks/index.js'),
            array(
                'lodash', 
                'wp-block-editor', 
                'wp-blocks', 
                'wp-components', 
                'wp-data', 
                'wp-deprecated', 
                'wp-element', 
                'wp-i18n', 
                'wp-keycodes', 
                'wp-rich-text',
                'wp-editor'
            ),
            $script_asset['version'],
            false
        );
    
        
        wp_register_style(
            'stk_block_style', 
            get_theme_file_uri('/blocks/index.css'),
            array(),
            filemtime( get_template_directory().'/blocks/index.css' )
            // $script_asset['version']
        );
    
        register_block_type( 'stk-plugin/stork19-editor', array(
            'editor_script' => 'stk_block_scripts',
            'editor_style'  => 'stk_block_style'
        ) );

        $fa_v = get_option('stk_fontawesome_ver', '6') === '6' ? '6' : '5';
        wp_register_style('stk_block_fontawesome', get_theme_file_uri('/css/fa'.$fa_v.'_all.min.css'));
        
        register_block_type( 'stk-plugin/stork19-fontawesome', array(
            'editor_style'  => 'stk_block_fontawesome'
        ) );

        require_once('functions/postlist.php');
        require_once('functions/kanren.php');
        require_once('functions/balloon.php');
    }

} // end: if(!is_plugin_active( 'stork19-editor/stork19-editor.php' ))


add_action('enqueue_block_editor_assets', 'stk_assets_to_block_tools');
function stk_assets_to_block_tools()
{
    // Googleフォントの読み込み
    stk_gf_wp_enqueue_style_set(true);



    // cssのrootセットを読み込み
    wp_add_inline_style( 'stk_block_style', stk_theme_css_root_set() );

    // ブロックエディタ用CSS class
    function stk_add_admin_body_class($classes)
    {
        global $post;

        //template class
        if (isset($post->ID)) {

            // ページテンプレート用class
            $page_template = get_page_template_slug($post->ID);

            if (!$page_template || $page_template == null || $page_template === 'single-viral.php') {
                $page_template_class = 'pagewidth__default';
            } else {
                $page_template_class = 'pagewidth__w980';
            }
            // 見出し用class
            $post_options_ttl_class = get_option('post_options_ttl', 'h_default');

            return "$classes  $page_template_class $post_options_ttl_class";
        }
        return $classes;
    }
    add_filter('admin_body_class', 'stk_add_admin_body_class');
}


require_once('patterns/block-patterns.php');
require_once('functions/block-color-palette.php');
require_once('functions/block-theme-color-setting.php');
require_once('functions/block-theme-support.php');
