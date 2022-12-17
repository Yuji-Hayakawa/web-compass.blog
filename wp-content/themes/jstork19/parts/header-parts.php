<?php

if (!defined('ABSPATH')) {
    exit;
}


// グローバルナビ
if (!function_exists('stk_gnav')) {
    function stk_gnav()
    {
        $output = "";
        if (has_nav_menu('main-nav')) {
            $output .=
                wp_nav_menu(array(
                    'container' => 'nav',
                    'container_class' => 'stk_g_nav stk-hidden_sp',
                    'menu_class' => 'ul__g_nav',
                    'theme_location' => 'main-nav',
                    'before' => '',
                    'after' => '',
                    'link_before' => '',
                    'link_after' => '',
                    'depth' => 0,
                    'fallback_cb' => ''
                ));
        }

        if (has_nav_menu('main-nav-sp')) {
            $output .=
                wp_nav_menu(array(
                    'container' => 'nav',
                    // 'container_id' => '',
                    'container_class' => 'stk_g_nav fadeIn stk-hidden_pc',
                    'menu_class' => 'ul__g_nav',
                    'theme_location' => 'main-nav-sp',
                    'before' => '',
                    'after' => '',
                    'link_before' => '',
                    'link_after' => '',
                    'depth' => 0,
                    'fallback_cb' => ''
                ));
        }
        return $output;
    }
}

// サイトロゴ
if (!function_exists('stk_sitelogo')) {
    function stk_sitelogo()
    {

        $output = '<div class="site__logo ' . esc_html(get_option('opencage_logo_size', 'fs_m')) . '">';
        if (get_option('opencage_site_description', 'sitedes_off') == 'sitedes_on') {
            $output .= '<p class="site_description">' . get_bloginfo('description') . '</p>';
        }

        $sitelogo_tag = (is_home() || is_front_page()) ? 'h1' : 'p';


        if (has_custom_logo()) {

            $overlay_logo_url = get_theme_mod('stk_homeheader-headeroverlay__logoimg') ? get_theme_mod('stk_homeheader-headeroverlay__logoimg') : null;

            $sitelogo_img = "";
            $sitelogo_img .= get_custom_logo();

            if (
                $overlay_logo_url
                && stk_is_headeroverlay()
            ) {
                $sitelogo_fix = '<a href="' . esc_url(home_url()) . '" class="custom-logo-link custom-logo-link-fix_logo no-icon">';

                $sitelogo_alt = stk_is_fixheader() ? false : get_bloginfo('name'); // サイトロゴが1つか2つかによってaltを切り替え

                $sitelogo_fix .= wp_get_attachment_image(
                    attachment_url_to_postid($overlay_logo_url),
                    'full',
                    false,
                    array(
                        'class' => 'custom-logo',
                        'alt' => $sitelogo_alt,
                        'loading' => false,
                    )
                );
                $sitelogo_fix .= '</a>';

                if (stk_is_fixheader()) {
                    // 固定ヘッダーの場合は2つ
                    $sitelogo_img = $sitelogo_fix . $sitelogo_img;
                } else {
                    // 固定ヘッダーじゃない場合は置き換える
                    $sitelogo_img = $sitelogo_fix;
                }
            }

            $img_fix_class = ($overlay_logo_url && stk_is_headeroverlay()) ? ' sitelogo_double' : null;

            $output .= '<' . $sitelogo_tag . ' class="site__logo__title img' . $img_fix_class . '">' . $sitelogo_img . '</' . $sitelogo_tag . '>';
        } else {

            $gf_font = get_option('opencage_logo_gf', 'off') == 'on' ? ' gf' : ' none_gf';
            $output .= '<' . $sitelogo_tag . ' class="site__logo__title text' . $gf_font . '"><a href="' . esc_url(home_url()) . '" class="text-logo-link">' . get_bloginfo('name') . '</a></' . $sitelogo_tag . '>';
        }

        $output .= '</div>';

        return $output;
    }
}
function stk_sitelogo_size_custom_inlinestyle()
{
    // カスタムフォントサイズ以外の場合はreturn
    if (get_option('opencage_logo_size', 'fs_m') !== 'fs_custom') return;

    $custom_sitelogo_size_sp = get_option('opencage_logo_size_custom_sp', 25);
    $custom_sitelogo_size_pc = get_option('opencage_logo_size_custom_pc', 30);
    $custom_sitelogo_size_sp_margin = get_option('opencage_logo_size_custom_sp_margin', 5);
    $custom_sitelogo_size_pc_margin = get_option('opencage_logo_size_custom_pc_margin', 5);

    $output = '
    @media only screen and (max-width: 980px) {
        .site__logo.fs_custom .custom-logo {
            max-height: ' . $custom_sitelogo_size_sp . 'px;
        }
        .site__logo.fs_custom .text {
            font-size: ' . $custom_sitelogo_size_sp . 'px;
        }
        .site__logo .custom-logo,
        .site__logo .text-logo-link {
            margin-top: ' . $custom_sitelogo_size_sp_margin . 'px;
            margin-bottom: ' . $custom_sitelogo_size_sp_margin . 'px;
        }
    }
    @media only screen and (min-width: 981px) {
        .site__logo.fs_custom .custom-logo {
            max-height: ' . $custom_sitelogo_size_pc . 'px;
        }
        .site__logo.fs_custom .text {
            font-size: ' . $custom_sitelogo_size_pc . 'px;
        }
        .site__logo .custom-logo,
        .site__logo .text-logo-link {
            margin-top: ' . $custom_sitelogo_size_pc_margin . 'px;
            margin-bottom: ' . $custom_sitelogo_size_pc_margin . 'px;
        }
    }
    ';

    wp_add_inline_style('stk_style', minify_css($output));
}
add_action('wp_enqueue_scripts', 'stk_sitelogo_size_custom_inlinestyle');

// search button
if (!function_exists('stk_navbtn_search')) {
    function stk_navbtn_search($icon_color = null)
    {
        if (get_option('side_options_header_search2', 'search_on') == 'search_on') {

            if (stk_is_amp()) {
                $remodal_target = 'on="tap:ampsearchbox.open" tabindex="0" role="button"';
            } else {
                $remodal_target = 'href="#searchbox" data-remodal-target="searchbox"';
            }

            $text = !get_option('side_options_header_btn_text_hide') ? '<span class="text gf">search</span>' : null;
            // if(!$icon_color){
            //     $icon_color = get_theme_mod( 'opencage_color_headertext', '#edf9fc');
            // }

            $svgicon = '
			<svg version="1.1" id="svgicon_search_btn" class="stk_svgicon nav_btn__svgicon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
				y="0px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
				<path fill="' . $icon_color . '" d="M44.35,48.52l-4.95-4.95c-1.17-1.17-1.17-3.07,0-4.24l0,0c1.17-1.17,3.07-1.17,4.24,0l4.95,4.95c1.17,1.17,1.17,3.07,0,4.24
					l0,0C47.42,49.7,45.53,49.7,44.35,48.52z"/>
				<path fill="' . $icon_color . '" d="M22.81,7c8.35,0,15.14,6.79,15.14,15.14s-6.79,15.14-15.14,15.14S7.67,30.49,7.67,22.14S14.46,7,22.81,7 M22.81,1
				C11.13,1,1.67,10.47,1.67,22.14s9.47,21.14,21.14,21.14s21.14-9.47,21.14-21.14S34.49,1,22.81,1L22.81,1z"/>
			</svg>
			';

            $output = '<a ' . $remodal_target . ' class="nav_btn search_btn">' . $svgicon . $text . '</a>';

            return $output;
        }
    }
}

// contact button

if (!function_exists('stk_navbtn_contact')) {
    function stk_navbtn_contact()
    {
        if (get_option('side_options_header_search2', 'search_on') == 'contact_on' && get_theme_mod('stk_contactpage_url')) {

            $link = 'href="' . esc_url(get_theme_mod('stk_contactpage_url')) . '"';
            $text = get_option('stk_contactpage_text') ? get_option('stk_contactpage_text') : 'CONTACT';
            $btn_text = !get_option('side_options_header_btn_text_hide') ? '<span class="text gf">' . $text . '</span>' : null;

            $output = '<a ' . $link . ' class="nav_btn contact_btn"><svg class="stk_svgicon nav_btn__svgicon"><use xlink:href="#stk-envelope-svg" /></svg>' . $btn_text . '</a>';

            echo $output;
        } else {
            return;
        }
    }
}

// menu button
if (!function_exists('stk_navbtn_menu')) {
    function stk_navbtn_menu($icon_color = null)
    {
        if (is_active_sidebar('sidebar-sp')) {
            if (stk_is_amp()) {
                $remodal_target = 'on="tap:ampspnavibox.open" tabindex="0" role="button"';
            } else {
                $remodal_target = 'href="#spnavi" data-remodal-target="spnavi"';
            }

            $text = !get_option('side_options_header_btn_text_hide') ? '<span class="text gf">menu</span>' : null;
            // if(!$icon_color){
            //     $icon_color = get_theme_mod( 'opencage_color_headertext', '#edf9fc');
            // }

            $svgicon = '
			<svg version="1.1" id="svgicon_nav_btn" class="stk_svgicon nav_btn__svgicon" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
				y="0px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
			<g>
				<g>
					<path fill="' . $icon_color . '" d="M45.1,46.5H4.9c-1.6,0-2.9-1.3-2.9-2.9v-0.2c0-1.6,1.3-2.9,2.9-2.9h40.2c1.6,0,2.9,1.3,2.9,2.9v0.2
						C48,45.2,46.7,46.5,45.1,46.5z"/>
				</g>
				<g>
					<path fill="' . $icon_color . '" d="M45.1,28.5H4.9c-1.6,0-2.9-1.3-2.9-2.9v-0.2c0-1.6,1.3-2.9,2.9-2.9h40.2c1.6,0,2.9,1.3,2.9,2.9v0.2
						C48,27.2,46.7,28.5,45.1,28.5z"/>
				</g>
				<g>
					<path fill="' . $icon_color . '" d="M45.1,10.5H4.9C3.3,10.5,2,9.2,2,7.6V7.4c0-1.6,1.3-2.9,2.9-2.9h40.2c1.6,0,2.9,1.3,2.9,2.9v0.2
						C48,9.2,46.7,10.5,45.1,10.5z"/>
				</g>
			</g>
			</svg>
			';

            $output = '<a ' . $remodal_target . ' class="nav_btn menu_btn">' . $svgicon . $text . '</a>';
            return $output;
        }
    }
}

// searchbox
if (!function_exists('stk_navbtn_search_content')) {
    add_action('stk_hook_footer_before', 'stk_navbtn_search_content');
    function stk_navbtn_search_content()
    {
        if (get_option('side_options_header_search2', 'search_on') == 'search_on') {

            if (stk_is_amp()) {
                $btn_close = 'on="tap:ampsearchbox.close"';
            } else {
                $btn_close = 'data-remodal-action="close"';
            }
            $svgicon = '
			<svg version="1.1" class="stk_svgicon svgicon_close" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
				y="0px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
			<g>
				<path fill="currentColor" d="M10.7,42.3c-0.77,0-1.54-0.29-2.12-0.88c-1.17-1.17-1.17-3.07,0-4.24l28.6-28.6c1.17-1.17,3.07-1.17,4.24,0
					c1.17,1.17,1.17,3.07,0,4.24l-28.6,28.6C12.24,42.01,11.47,42.3,10.7,42.3z"/>
				<path fill="currentColor" d="M39.3,42.3c-0.77,0-1.54-0.29-2.12-0.88l-28.6-28.6c-1.17-1.17-1.17-3.07,0-4.24c1.17-1.17,3.07-1.17,4.24,0l28.6,28.6
					c1.17,1.17,1.17,3.07,0,4.24C40.83,42.01,40.07,42.3,39.3,42.3z"/>
			</g>
			</svg>
			';

            if (stk_is_amp()) {
                echo '<amp-lightbox id="ampsearchbox" layout="nodisplay">
				<div class="ampsearchbox-wrapper">
				<button class="remodal-bg-close"' . $btn_close . '></button>';
            }

            echo '<div id="navbtn_search_content" class="remodal searchbox" data-remodal-id="searchbox" data-remodal-options="hashTracking:false">';
            echo get_search_form(false);

            echo '<button class="remodal-close"' . $btn_close . '>' . $svgicon . '<span class="text gf">CLOSE</span></button>';

            echo '</div>' . "\n";

            if (stk_is_amp()) {
                echo '</div>
				</amp-lightbox>';
            }
        }
    }
}

// menu content
if (!function_exists('stk_navbtn_menu_content')) {
    add_action('stk_hook_footer_before', 'stk_navbtn_menu_content');
    function stk_navbtn_menu_content()
    {
        if (is_active_sidebar('sidebar-sp')) {
            if (stk_is_amp()) {
                $btn_close = 'on="tap:ampspnavibox.close"';
            } else {
                $btn_close = 'data-remodal-action="close"';
            }

            if (stk_is_amp()) {
                echo '<amp-lightbox id="ampspnavibox" layout="nodisplay">
				<div class="ampspnavibox-wrapper">
				<button class="remodal-bg-close"' . $btn_close . '></button>';
            }
            $svgicon = '
			<svg version="1.1" class="stk_svgicon svgicon_close" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
				y="0px" viewBox="0 0 50 50" style="enable-background:new 0 0 50 50;" xml:space="preserve">
			<g>
				<path fill="currentColor" d="M10.7,42.3c-0.77,0-1.54-0.29-2.12-0.88c-1.17-1.17-1.17-3.07,0-4.24l28.6-28.6c1.17-1.17,3.07-1.17,4.24,0
					c1.17,1.17,1.17,3.07,0,4.24l-28.6,28.6C12.24,42.01,11.47,42.3,10.7,42.3z"/>
				<path fill="currentColor" d="M39.3,42.3c-0.77,0-1.54-0.29-2.12-0.88l-28.6-28.6c-1.17-1.17-1.17-3.07,0-4.24c1.17-1.17,3.07-1.17,4.24,0l28.6,28.6
					c1.17,1.17,1.17,3.07,0,4.24C40.83,42.01,40.07,42.3,39.3,42.3z"/>
			</g>
			</svg>
			';

            $btn = '<button ' . $btn_close . ' class="remodal-close">' . $svgicon . '<span class="text gf">CLOSE</span></button>';

            $mode = get_theme_mod('stk_navbtn_menu_mode', '--modenormal');

            echo '<div id="navbtn_menu_content" class="remodal spnavi ' . $mode . '" data-remodal-id="spnavi" data-remodal-options="hashTracking:false">' . $btn;
            dynamic_sidebar('sidebar-sp');
            echo $btn . '</div>';

            if (stk_is_amp()) {
                echo '</div>
				</amp-lightbox>';
            }
        }
    }
}


// サイトヘッダー一式
if (!function_exists('stk_header_set')) {
    function stk_header_set()
    {
        if (is_page_template('page-lp.php')) {
            return;
        }

        $iconcolor = get_theme_mod('stk_homeheader-headeroverlay__textcolor') ? get_theme_mod('stk_homeheader-headeroverlay__textcolor') : get_theme_mod('opencage_toppage_textcolor', '#0ea3c9');
        $iconcolor = null;

        $headerclass = '';

        if (
            (stk_is_headeroverlay() && get_option('stk_homeheader-headeroverlay', 'off') == 'on_wide')
            || (!stk_is_headeroverlay() && (get_option('stk_header_layout_pc') == 'left_wide' || get_option('stk_header_layout_pc') == 'center_wide'))
        ) {
            $headerclass .= ' wide';
        }


        stk_hook_header_before();

        echo '<header id="header" class="stk_header' . $headerclass . '"><div class="inner-header wrap">';

        echo stk_sitelogo();
        stk_gnav();
        stk_snslinks('header');
        echo stk_navbtn_search($iconcolor);
        echo stk_navbtn_contact($iconcolor);
        echo stk_navbtn_menu($iconcolor);

        echo '</div></header>';

        stk_hook_header_after();
    }
}

// 固定ヘッダーの場合に内部リンクが重ならないようにする
function fix_header_add_scripts()
{
    if (
        !stk_is_fixheader() || is_page_template('page-lp.php')
    ) {
        return;
    }
    $data = <<<EOT
jQuery(document).ready(function($) {
    $(function () {
        var headerH = $('.stk_header').outerHeight(true) + 40;
        $('a[href^="#"]').not('.nav_btn').not('.toc_toggle a').click(function(){
            var href= $(this).attr("href");
            var target = $(href == "#" || href == "" ? 'html' : href);
            var position = target.offset().top - headerH;
            $("html, body").animate({scrollTop:position}, 150, "swing");
            return false;
        });
    });
});
EOT;
    wp_add_inline_script('main-js', minify_js($data));
}
add_action('wp_enqueue_scripts', 'fix_header_add_scripts');

// 固定 & 透過ヘッダーの場合のscript
function fix_and_overlay_header_add_scripts()
{
    if (
        !stk_is_headeroverlay()
        || !stk_is_fixheader()
        || stk_is_amp()
    ) {
        return;
    }
    $data = <<<EOT
	(function () {
        if(!document.querySelector('.stk_header')) {
            return;
        }
    
        const select = document.getElementById('stk_observer_target');
    
        let options = {
            rootMargin: '0px',
            threshold: 1.0
        }
        
        const fixheaderObserver = new window.IntersectionObserver((entry) => {
            if (!entry[0].isIntersecting) {
                document.querySelector('.stk_header').setAttribute('data-fixheader', true);
            } else {
                document.querySelector('.stk_header').setAttribute('data-fixheader', false);
            }
        }, options);
        fixheaderObserver.observe(select);
    }());
EOT;
    wp_add_inline_script('main-js', $data);
}
add_action('wp_enqueue_scripts', 'fix_and_overlay_header_add_scripts');
