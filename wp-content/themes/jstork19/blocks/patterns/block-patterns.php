<?php

if (!function_exists('register_block_pattern')) {
    return;
}

// デフォルトブロックパターンの読み込み設定
if (get_option('side_options_unregister_block_pattern', 'off') == 'off') {
    add_action('after_setup_theme', function ()
        {
            remove_theme_support('core-block-patterns');
        }
    );
    
}


if (!function_exists('stk_my_block_pattern')) {
    function stk_my_block_pattern()
    {
        if (get_option('side_options_stork_block_pattern', 'on') == "off") {
            return;
        }

        //ブロックパターンカテゴリ追加
        $block_pattern_categories = array(
            'stkpatterncat_section' => array( 'label' => __( 'STORK:セクション', 'stork19' ) ),
            'stkpatterncat_pagewide'   => array( 'label' => __( 'STORK:フルワイドページ', 'stork19' ) ),
            'stkpatterncat_blogparts'   => array( 'label' => __( 'STORK:ブログパーツ', 'stork19' ) ),
        );


        $block_pattern_categories = apply_filters( 'stk_block_pattern_categories', $block_pattern_categories );

        foreach ( $block_pattern_categories as $name => $properties ) {
            if ( ! WP_Block_Pattern_Categories_Registry::get_instance()->is_registered( $name ) ) {
                register_block_pattern_category( $name, $properties );
            }
        }

        // パターンファイルの読み込み
        $block_patterns = array(
            'cover-block-in-button1',
            'cover-block-in-button2',
            'cover-block-in-button3',
            'cover-block_movie-in-button1',
            'page-header1',
            'page-header2',
            'cover-block-in-column_text',
            'column-block-two',
            'column-block-three-image',
            'column-block-three-wide-bg-textbase',
            'grid-block-circle-icon',
            'mediatext-block',
            'balloon-block',
            'group-block-cta1',
            'group-block-newpost',
            'caver-block-user',
            'caver-block-user_grid',
            'group_block_faq_accordion',
            'group_block_faq',
            'columns_block_ranking1',
            'columns_block_ranking2',
            'page-wide-lp1',
            'page-wide-lp2',
            'page-sample1',
            'page-wide-cat_post_simple',
            'page-wide-cat_post_card',
        );
        
        $block_patterns = apply_filters( 'stk_block_patterns', $block_patterns );

        foreach ( $block_patterns as $block_pattern ) {
            $pattern_file = get_theme_file_path( '/blocks/patterns/templates/' . $block_pattern . '.php' );

            register_block_pattern(
                'stk-plugin/' . $block_pattern,
                require $pattern_file
            );
        }
        
    }
}
add_action('init', 'stk_my_block_pattern');