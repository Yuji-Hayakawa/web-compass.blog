<?php

if (!defined('ABSPATH')) {
    exit;
}

// yoast seo用のjsonldを無効
if (get_theme_mod('stk_remove_other_jsonld_yoast', false)) {
    add_filter('wpseo_json_ld_output', '__return_false');
}

// AIO SEO
if (get_theme_mod('stk_remove_other_jsonld_aioseo', false)) {
    add_filter( 'aioseo_schema_disable', '__return_true' );
}

// 構造化データを表示
function stk_basic_jsonld()
{
    // 投稿・固定ページ以外の場合は表示しない
    if (!is_singular(array( 'post' , 'page' ))) return;
    if (get_theme_mod('stk_jsonld_display', 'off') === 'off') return;


    $page_url = get_the_permalink();
    $headline = esc_attr(get_the_title());

    $img_src = '';
    $img_width = '';
    $img_height = '';

    $img_mata = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');

    $image_json = '';
    if ($img_mata) {
        $img_src = $img_mata[0];
        $img_width = $img_mata[1];
        $img_height = $img_mata[2];

        $image_json = '
            "image": {
                "@type": "ImageObject",
                "url": "' . $img_src . '",
                "width": ' . $img_width . ',
                "height": ' . $img_height . '
            },
        ';
    }

    $date_published = get_the_date(DATE_ISO8601);
    $date_modified = (get_the_date() != get_the_modified_time()) ? get_the_modified_date(DATE_ISO8601) : get_the_date(DATE_ISO8601);

    global $post;
    $author_id = $post->post_author;
    $author_name = get_the_author_meta('display_name', $author_id);
    $author_url = get_the_author_meta('url', $author_id);

    $publisher_name = esc_attr(get_theme_mod('stk_publisher_name'));
    $publisher_type = esc_attr(get_theme_mod('stk_publisher_type', 'Organization'));
    $publisher_logo_url = esc_url(get_theme_mod('stk_publisher_logo'));
    $description = esc_attr(get_the_excerpt());

    $json = '
    {
        "@context": "http://schema.org",
        "@type": "Article",
        "mainEntityOfPage":"' . $page_url . '",
        "headline": "' . $headline . '",
        '.$image_json.'
        "datePublished": "' . $date_published . '",
        "dateModified": "' . $date_modified . '",
        "author": {
            "@type": "Person",
            "name": "' . $author_name . '",
            "url": "' . $author_url . '"
        },
        "publisher": {
            "@type": "' . $publisher_type . '",
            "name": "' . $publisher_name . '",
            "logo": {
                "@type": "ImageObject",
                "url": "' . $publisher_logo_url . '"
            }
        },
        "description": "' . $description . '"
    }
    ';

    $json = minify_js($json);

    // echo '<pre>';
    // var_dump($json);
    // echo '</pre>';

    echo "\n".'<script type="application/ld+json" class="stk_jsonld">' . $json . '</script>'."\n";
}
add_action('wp_footer','stk_basic_jsonld');



// FAQblockで構造化チェックが入っているものを取得してJSON-LDに変換
function stk_faq_jsonld_array($blocks = array(), $faqblocks = array()) {
    if (empty($blocks)){
        return;
    }

    foreach ($blocks as $block) {
        if ($block['blockName'] === 'stk-plugin/faq') {
            $showRichResults = isset($block['attrs']['showRichResults']) ? $block['attrs']['showRichResults'] : false;
            if($showRichResults === true) {
                
                $innerBlocks = $block["innerBlocks"];
                $faqinnerContent = '';
                foreach ($innerBlocks as $innerBlock) {
                    $faqinnerContent .= $innerBlock["innerContent"][0];
                }
                $faqinnerContent = addslashes($faqinnerContent);
                
                $faqblocks[] = array(
                    $block['attrs']['faqtitle'],
                    $faqinnerContent
                );
            }
        }

        foreach ($block['innerBlocks'] as $block) {
            if ($block['blockName'] === 'stk-plugin/faq') {
                $showRichResults = isset($block['attrs']['showRichResults']) ? $block['attrs']['showRichResults'] : false;
                if($showRichResults === true) {
                    
                    $innerBlocks = $block["innerBlocks"];
                    $faqinnerContent = '';
                    foreach ($innerBlocks as $innerBlock) {
                        $faqinnerContent .= $innerBlock["innerContent"][0];
                    }
                    $faqinnerContent = addslashes($faqinnerContent);
                    
                    $faqblocks[] = array(
                        $block['attrs']['faqtitle'],
                        $faqinnerContent
                    );
                }
            }

            foreach ($block['innerBlocks'] as $block) {
                if ($block['blockName'] === 'stk-plugin/faq') {
                    $showRichResults = isset($block['attrs']['showRichResults']) ? $block['attrs']['showRichResults'] : false;
                    if($showRichResults === true) {
                        
                        $innerBlocks = $block["innerBlocks"];
                        $faqinnerContent = '';
                        foreach ($innerBlocks as $innerBlock) {
                            $faqinnerContent .= $innerBlock["innerContent"][0];
                        }
                        $faqinnerContent = addslashes($faqinnerContent);
                        
                        $faqblocks[] = array(
                            $block['attrs']['faqtitle'],
                            $faqinnerContent
                        );
                    }
                }

                foreach ($block['innerBlocks'] as $block) {
                    if ($block['blockName'] === 'stk-plugin/faq') {
                        $showRichResults = isset($block['attrs']['showRichResults']) ? $block['attrs']['showRichResults'] : false;
                        if($showRichResults === true) {
                            
                            $innerBlocks = $block["innerBlocks"];
                            $faqinnerContent = '';
                            foreach ($innerBlocks as $innerBlock) {
                                $faqinnerContent .= $innerBlock["innerContent"][0];
                            }
                            $faqinnerContent = addslashes($faqinnerContent);
                            
                            $faqblocks[] = array(
                                $block['attrs']['faqtitle'],
                                $faqinnerContent
                            );
                        }
                    }

                    foreach ($block['innerBlocks'] as $block) {
                        if ($block['blockName'] === 'stk-plugin/faq') {
                            $showRichResults = isset($block['attrs']['showRichResults']) ? $block['attrs']['showRichResults'] : false;
                            if($showRichResults === true) {
                                
                                $innerBlocks = $block["innerBlocks"];
                                $faqinnerContent = '';
                                foreach ($innerBlocks as $innerBlock) {
                                    $faqinnerContent .= $innerBlock["innerContent"][0];
                                }
                                $faqinnerContent = addslashes($faqinnerContent);
                                
                                $faqblocks[] = array(
                                    $block['attrs']['faqtitle'],
                                    $faqinnerContent
                                );
                            }
                        }
                    }
                }
            }
        }
    }

    return $faqblocks;
}

function stk_faq_jsonld()
{
    if ( !has_block( 'stk-plugin/faq' ) ) return; // よくある質問blockがない場合は何もしない
    if (!is_singular(array( 'post' , 'page' ))) return;
    
    global $post;
    $content = $post->post_content;
    $blocks = parse_blocks($content); // 本文内のブロックを配列で
    
    $faqblocks = stk_faq_jsonld_array($blocks);

    $json = '';

    foreach($faqblocks as $faqblock) {
        $faqtitle = $faqblock[0];
        $faqContent = $faqblock[1];
        
        $json .= <<< EOM
        {
            "@type": "Question",
            "name": "$faqtitle",
            "acceptedAnswer": {
            "@type": "Answer",
            "text": "$faqContent"
            }
        }
EOM;
        if ($faqblock !== end($faqblocks)) {
            $json .= ",";
        }
    }
    // 何も取得できない場合は何もしない
    if(!$json) return;

    // echo '<pre>';
    // var_dump($json);
    // echo '</pre>';
    
    $json = minify_html($json);

    $output = <<< EOM
    <script type="application/ld+json" class="stk_jsonld_faq">
    {
        "@context": "https://schema.org",
        "@type": "FAQPage",
        "mainEntity": [
            $json
        ]
    }
    </script>
EOM;

    echo minify_js($output)."\n";
}
add_action('wp_footer','stk_faq_jsonld');

// 抜粋内のインナーブロックを管理
function stk_custom_excerpt_allowed_wrapper_blocks( $allowed_wrapper_blocks ) {

    $allowed_wrapper_blocks[] = 'stk-plugin/accordion';
    $allowed_wrapper_blocks[] = 'stk-plugin/voicecomment';
    $allowed_wrapper_blocks[] = 'stk-plugin/cbox';
    $allowed_wrapper_blocks[] = 'stk-plugin/cbox-notitle';
    $allowed_wrapper_blocks[] = 'stk-plugin/faq';
    $allowed_wrapper_blocks[] = 'stk-plugin/supplement2';
    $allowed_wrapper_blocks[] = 'stk-plugin/grids';
    $allowed_wrapper_blocks[] = 'stk-plugin/grid';

    return $allowed_wrapper_blocks;
}
add_filter( 'excerpt_allowed_wrapper_blocks', 'stk_custom_excerpt_allowed_wrapper_blocks' );