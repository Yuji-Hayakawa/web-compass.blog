<?php

add_action('wp_enqueue_scripts', 'stk_home_slider_script');
function stk_home_slider_script() {
    // add_defer_to_enqueue_script が有効な場合はjsの読み込み位置をheadに移動
    $defer_boolean = get_option('advanced_js_defer', 'off') == 'on' ? false : true;

    // slick js
    if( (is_home() || is_front_page())
    && (get_option('stk_toppageslider_display','off') == 'on' )
    ){
        if( !stk_is_amp() ) 
        {
            wp_enqueue_script( 'slick-js', get_theme_file_uri('/js/slick.min.js'), array('jquery'), '1.5.9', $defer_boolean );

            // largeサイズにした場合のarrowオプションの出力を制御
            $large_option_arrow = get_option('stk_toppageslider_size', 'default') == 'large' ? 'arrows: false,' : null;
            
            $slicktag = "
            jQuery(document).ready(function($) {
                $('.slickcar').slick({
                    autoplay: true,
                    autoplaySpeed: 3000,
                    pauseOnDotsHover: true,
                    dots: true,
                    speed: 260,
                    slidesToShow: 3,
                    centerPadding: '20%',
                    " . $large_option_arrow . "
                    
                    centerMode: true,

                    responsive: [
                        {
                            breakpoint: 1166,
                            settings: {
                                arrows: false,
                                centerPadding: '50px'
                            }
                        },
                        {
                            breakpoint: 480,
                            settings: {
                                arrows: false,
                                slidesToShow: 1
                            }
                        }
                    ]
                });
            });";
            wp_add_inline_script('slick-js', minify_js($slicktag));
        }

        // slick css
        wp_enqueue_style('slick', get_theme_file_uri('/css/slick.min.css'));

    }
}

function home_header_slider() {
    if(get_option('stk_toppageslider_display', 'off') =='on'  && ( is_front_page() || is_home() )) {

        $args = array(
            'posts_per_page' => get_option('stk_toppageslider_postsnumber', '10'),
            'offset' => 0,
            'tag' => 'pickup',
            'orderby' => 'post_date',
            'order' => 'DESC',
            'post_type' => array('post','page'),
            'post_status' => 'publish',
            'suppress_filters' => true,
            'ignore_sticky_posts' => true,
            'no_found_rows' => true
        );
        $the_query = new WP_Query( $args );
        if ( $the_query->have_posts() ) {
        
            $s_size = get_option('stk_toppageslider_size', 'default');
            $slide_class = ($s_size == 'default') ? 'wrap' : 'slide_size-' . $s_size;
            if( stk_is_amp() ) {
                $slide_class .= ' amp_slide';
            }

            $output = '<div id="top_carousel" class="' . $slide_class . '">
                    <ul class="slickcar">';

            while ( $the_query->have_posts() ) {
            $the_query->the_post();

            $output .= '<li class="top_carousel__li"><a href="' .get_permalink(). '" class="top_carousel__link">
                    <figure class="eyecatch of-cover">';
            $output .= skt_oc_post_thum();
            $output .= stk_archivecatname(). '</figure>';
            $output .= '<h2 class="entry-title">' .get_the_title(). '</h2>';
            $output .= '</a></li>';
            }

            $output .= '</ul>
                </div>';
            
            echo $output;
        }
        wp_reset_postdata();
    }
}