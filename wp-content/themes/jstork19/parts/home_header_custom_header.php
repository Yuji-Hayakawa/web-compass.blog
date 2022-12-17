<?php

// headerunderlinkの表示
add_action( 'wp', function() {
    if( stk_is_headeroverlay() ) {
        // 透過headerの場合はヘッダーアイキャッチの下に表示する
        if(get_option('stk_homeheader-headeroverlay__infoposition', 'off') === 'on_under'){
            add_action( 'stk_hook_header_after', 'stk_headerunderlink', 6);	
        }
    } else {
        add_action( 'stk_hook_header_after', 'stk_headerunderlink', 4);
    }
} );

// カスタムヘッダー周りの呼び出し用hook
add_action( 'stk_hook_header_after', 'home_header_custom_header', 5 );
add_action( 'stk_hook_header_after', 'home_header_slider', 10 );
add_action( 'stk_hook_header_after', 'pickUpContent', 15 );


if(!function_exists('home_header_custom_header')) {
    function home_header_custom_header(){
        if ( !is_front_page() || is_paged() || get_option('opencage_toppage_header_display', 'on') =='off' ) {
            return;
        }
            
        // 画像URLを代入
        if ( get_theme_mod('opencage_toppage_headerbgsp') && is_mobile()){
            $imgurl = esc_url(get_theme_mod('opencage_toppage_headerbgsp'));
        } elseif(get_theme_mod('opencage_toppage_headerbg')) {
            $imgurl = esc_url(get_theme_mod('opencage_toppage_headerbg'));
        } else {
            $imgurl = null;
        }
        

        // 動画URLを代入
        if( get_theme_mod('opencage_toppage_headerbg_movie_sp') && is_mobile() ) {
            $movieurl = get_theme_mod('opencage_toppage_headerbg_movie_sp');
        } elseif(get_theme_mod('opencage_toppage_headerbg_movie')) {
            $movieurl = get_theme_mod('opencage_toppage_headerbg_movie');
        } else {
            $movieurl = null;
        }

        // スマホ用に動画か画像をセットしているかどうか
        $sp_movie_set = !get_theme_mod('opencage_toppage_headerbg_movie_sp') && get_theme_mod('opencage_toppage_headerbgsp') && is_mobile() ? true : false;

        // テキスト
        $en_text = get_option( 'opencage_toppage_headeregtext' ) ? get_option( 'opencage_toppage_headeregtext' ) : null;
        $jp_text = get_option( 'opencage_toppage_headerjptext' ) ? get_option( 'opencage_toppage_headerjptext' ) : null;

        // リンク
        $btn_link = get_option( 'opencage_toppage_headerlink' ) ? esc_url(get_option( 'opencage_toppage_headerlink' )) : null;

        $loop = get_theme_mod('stk_toppage_headerbg_movie__loop') ? null : 'loop=""';

        if ( $en_text || $jp_text ) {

            $movieposter = $imgurl ? ' poster="' . $imgurl . '"' : null;

            
            //動画背景
            $tag_bg_movie = $movieurl && !$sp_movie_set ? '<video class="wp-block-cover__video-background" autoplay="" muted="" '.$loop.' playsinline="" src="' . $movieurl . '"' . $movieposter . '></video>' : null;

            // background-image
            if(!$tag_bg_movie && $imgurl) {
                $image_id = attachment_url_to_postid($imgurl);
                $tag_bg_image = wp_get_attachment_image(
                    $image_id, 
                    'full', 
                    false,
                    array(
                        'class' => 'wp-block-cover__image-background',
                        'loading' => false,
                    )
                );
            } else {
                $tag_bg_image = null;
            }
            
            // 最小高さの設定
            $style_minheight = 'min-height:';
            $style_minheight .= is_mobile() ? get_option('opencage_toppage_header_minheight_sp', '60') : get_option( 'opencage_toppage_header_minheight', '50' );
            $style_minheight .= 'vh;';
            
            // レイアウト
            $class_textlayout = ' ' . get_option('opencage_toppage_textlayout', 'textcenter');
            $class_overlaystyle = ' overlay-' . get_theme_mod('opencage_toppage_headder_overlay_design', 'color');
            $style_textcolor = ' color:' . get_theme_mod('opencage_toppage_textcolor','#0ea3c9') . ';';

            echo '<div id="custom_header" class="stk_custom_header wp-block-cover has-background-dim fadeIn' . $class_textlayout . $class_overlaystyle . '" style="' . $style_minheight . '">' 
            .$tag_bg_movie
            .$tag_bg_image. 
            '
            <div class="wp-block-cover__inner-container">
            <div class="stk_custom_header__text header-text" style="'.$style_textcolor.'">';

            if ( $en_text ) {
                echo '<h2 class="en gf fadeInDown delay-0_1s">' . $en_text . '</h2>';
            }
            if ( $jp_text ) {
                echo '<div class="ja fadeInUp delay-0_2s">' . $jp_text . '</div>';
            }

            if ( $btn_link ) {
                $btn_style = 'style="color:'.get_theme_mod( 'opencage_toppage_btncolor', '#ffffff' ).';';
                $btn_style .= 'background:' . get_theme_mod( 'opencage_toppage_btnbgcolor', '#ed7171' ) . ';';
                $btn_style .= 'background:linear-gradient(135deg,' . get_theme_mod( 'opencage_toppage_btnbgcolor', '#ed7171' ) . ',' . get_theme_mod( 'opencage_toppage_btnbgcolor2', '#ffbaba' ) . ');"';

                $btn_text = get_option( 'opencage_toppage_headerlinktext' ) ? get_option( 'opencage_toppage_headerlinktext' ) : '詳しくはこちら';

                $btn_class = 'wp-block-button fadeInUp delay-0_3s';
                if(get_option('opencage_toppage_btnshiny') !== 'normal') {
                    $btn_class .= ' '.get_option('opencage_toppage_btnshiny');
                }
                
                echo '<div class="'.$btn_class.'"><a class="wp-block-button__link" '.$btn_style. 'href="' . $btn_link . '">' . $btn_text . '</a></div>';
            }
            echo '</div>
            </div>
            </div>';

        } elseif( $imgurl || $movieurl ) {

            echo '<div id="custom_header_img" class="stk_custom_header">';
            if ( $btn_link ) {
                echo '<a href="' . $btn_link . '">';
            }

            $poster_tag = $imgurl ? 'poster="' . $imgurl . '"' : null;

            if( $movieurl ) {
                echo '<figrue class="wp-block-video"><video autoplay="" '.$loop.' muted="" ' . $poster_tag . ' src="' . $movieurl . '" playsinline=""></video></figrue>';
            } else {
                $tag_image = wp_get_attachment_image(attachment_url_to_postid($imgurl), 'full');
                echo $tag_image;
            }

            if ( $btn_link ) {
                echo '</a>';
            }
            echo '</div>';
        }
    
    }
}


function stk_homeheader_css() {
    if ( !is_front_page() || is_paged() || get_option('opencage_toppage_header_display', 'on') =='off' ) {
        return;
    }
    

    $overlay_color = get_theme_mod('opencage_toppage_headder_overlay', '#000000');
    $overlay_opacity = get_theme_mod('opencage_toppage_headder_overlay_opacity', 5) * 0.01;
    $overlay_opacity_style = 'opacity: '.$overlay_opacity.';';

    $bg_switch = get_theme_mod('opencage_toppage_headder_overlay_design', 'color');

    // 透過ヘッダーの色： 無指定の場合はヘッダーアイキャッチの文字色と同じにする
    $stk_headercolor = get_theme_mod('stk_homeheader-headeroverlay__textcolor') ? get_theme_mod('stk_homeheader-headeroverlay__textcolor') : get_theme_mod('opencage_toppage_textcolor','#0ea3c9');
    
    $tag = '
        #custom_header.has-background-dim {
            background-color: transparent;
        }
        #custom_header.overlay-stripe::before {
            background-image: repeating-linear-gradient(
                -45deg,
                '.$overlay_color.' 0, 
                '.$overlay_color.' 3px, 
                transparent 3px, 
                transparent 6px
            );
        }
        #custom_header.overlay-dot::before {
            background-image: radial-gradient('.$overlay_color.' 50%, transparent 50%);
            background-size: 5px 5px;
        }
        #custom_header.overlay-color::before {
            background-color: '.$overlay_color.';
        }
        #custom_header::before {'
            .$overlay_opacity_style.
        '}';

	wp_add_inline_style('stk_style', minify_css($tag));
}
add_action( 'wp_enqueue_scripts', 'stk_homeheader_css');


// headerunderlink
if (!function_exists('stk_headerunderlink')) {
	function stk_headerunderlink() {
		if ( get_option('other_options_headerunderlink') && get_option('other_options_headerundertext') ) {
			$style = ' style="background:' . get_theme_mod( 'other_options_headerunderlink_bgcolor', '#F55E5E') . ';';
			$style .= 'background:linear-gradient(135deg,'. get_theme_mod( 'other_options_headerunderlink_bgcolor', '#F55E5E') . ',' . get_theme_mod( 'other_options_headerunderlink_bgcolor2', '#ffbaba') . ');"';

			if(get_option('other_options_headerunderlink_target')){
				$target = ' target="_blank"';
			} else {
				$target = null;
			}

			$link = ' href="' . esc_url(get_option('other_options_headerunderlink')) . '"';

			$output = '<div class="header-info fadeIn">';
			$output .= '<a class="header-info__link"' . $target . $style . $link .'>';
			$output .= get_option('other_options_headerundertext') ;
			$output .= '</a></div>';
			echo $output;
		} else {
			return null;
		}
	}
}
