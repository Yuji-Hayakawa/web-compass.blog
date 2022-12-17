<?php 

// editor custom styles
function stk_customize_css_admin() {
	$maintext = get_theme_mod( 'opencage_color_maintext', '#3E3E3E');
	$contentbg = get_theme_mod( 'opencage_color_contentbg', '#ffffff');
    $mainlink = get_theme_mod( 'opencage_color_mainlink', '#1bb4d3');
    $mainttlbg = get_theme_mod( 'opencage_color_ttlbg', '#1bb4d3');
    $mainttltext = get_theme_mod( 'opencage_color_ttltext', '#ffffff');
    $labelbg = get_theme_mod( 'opencage_color_labelbg', '#fcee21');
    $labeltext = get_theme_mod( 'opencage_color_labeltext', '#3e3e3e');

    // 見出し背景色を透過させる
	$color_hex = $mainttlbg;
	$code_red = hexdec(substr($color_hex, 1, 2));
	$code_green = hexdec(substr($color_hex, 3, 2));
	$code_blue = hexdec(substr($color_hex, 5, 2));

	$mainttlbg_rgb = 'rgba(' . $code_red . ', ' . $code_green . ', ' . $code_blue . ', 0.1)';

    ?>
<style type="text/css">
#editor .editor-styles-wrapper,
.editor-styles-wrapper .editor-post-title__block .editor-post-title__input{
	background-color: <?php echo $contentbg; ?>;
	color: <?php echo $maintext; ?>;
}
.editor-styles-wrapper .cbox.type_simple,
.editor-styles-wrapper .cbox.type_simple .span__box_title,
.accordion_content,
.wp-block-quote::before,.wp-block-quote::after {
	background-color: <?php echo $contentbg; ?>;
}

.has-mainttlbg-color {color: <?php echo $mainttlbg; ?> ;}
.has-mainttlbg-background-color { background-color: <?php echo $mainttlbg; ?> ;}
.has-mainttltext-color {color: <?php echo $mainttltext; ?> ;}
.has-mainttltext-background-color { background-color: <?php echo $mainttltext; ?> ;}

.mce-content-body.editor-area a,
.editor-styles-wrapper .block-editor-rich-text__editable:not(.has-text-color) a,
.wp-block-heading a{
	color: <?php echo $mainlink; ?>;
}
.mce-content-body.editor-area h2,
.editor-styles-wrapper h2:not(.is-style-stylenone):not(.has-text-color):not(.has-background),
.faq-icon--bg_themecolor .oc-faq__title::before,
.faq-icon--bg_themecolor .oc-faq__comment::before,
.icon-controle .components-radio-control__option input[value="faq-icon--bg_themecolor"] + label::before,
.accordion::before,
.is-style-faq_type_bg1::before,
.cbox.is-style-site_color:not(.type_simple) .span__box_title {
	background: <?php echo $mainttlbg; ?>!important;
	color: <?php echo $mainttltext; ?>!important;
}
.is-style-p_balloon_bottom:not(.has-background) {
	background: <?php echo $mainttlbg; ?>;
}
.is-style-p_balloon_bottom:not(.has-text-color) {
	color: <?php echo $mainttltext; ?>;
}
.cbox.type_simple.is-style-site_color:not(.type_normal):not(.type_ttl) .span__box_title,
.stk_timeline__child::before {
	color: <?php echo $mainttlbg; ?>!important;
}
.cbox.is-style-site_color {
	border-color: <?php echo $mainttlbg; ?>!important;
}
.cbox.is-style-site_color:not(.type_simple):not(.type_ttl),
.cbox.is-style-site_color.type_normal {
	background: <?php echo $mainttlbg_rgb; ?>!important;
}
.voice-controle-icon_color-column4 input[value="is-style-site_color"] + label::before {
	border-color: <?php echo $mainttlbg; ?>!important;
	background: <?php echo $mainttlbg_rgb; ?>!important;
}

.h_balloon .editor-styles-wrapper h2:not(.is-style-stylenone):not(.has-text-color):not(.has-background)::after {
	border-top-color: <?php echo $mainttlbg; ?>!important;
}
.h_boader .editor-styles-wrapper h2:not(.is-style-stylenone):not(.has-text-color):not(.has-background) {
	border-color: <?php echo $mainttlbg; ?>!important;
	background: none!important;
	color: inherit!important;
}
.mce-content-body.editor-area h3,
.editor-styles-wrapper h3,
.mce-content-body.editor-area h4,
.editor-styles-wrapper h4,
.editor-styles-wrapper .cat_postlist .catttl {
	border-color: <?php echo $mainttlbg; ?>;
}
.editor-styles-wrapper .btn-wrap:not([class*="rich_"]) a,
.wp-block-button.is-style-normal .wp-block-button__link,
.wp-block-button.is-style-fill .wp-block-button__link:not(.has-background):not(.has-text-color){ background: <?php echo $mainlink; ?>!important; border-color: <?php echo $mainlink; ?>!important; }
.editor-styles-wrapper .btn-wrap.simple a,
.wp-block-button.is-style-simple .wp-block-button__link,
.wp-block-button.is-style-outline .wp-block-button__link:not(.has-background):not(.has-text-color){ border-color: <?php echo $mainlink; ?>!important; color: <?php echo $mainlink; ?>!important; }

.editor-styles-wrapper .block-editor-block-list__layout ol[data-type="core/list"] > li:before,
.editor-styles-wrapper .block-editor-block-list__layout .mce-content-body ol li:before,
.editor-styles-wrapper .wp-block-freeform ol li:before{ background: <?php echo $mainttlbg; ?>; border-color: <?php echo $mainttlbg; ?>; color: <?php echo $mainttltext; ?>;}
.editor-styles-wrapper .block-editor-block-list__layout ul li:before,
.editor-styles-wrapper .block-editor-block-list__layout .mce-content-body ul li::before,
.editor-styles-wrapper .wp-block-freeform ul li:before{ color: <?php echo $mainttlbg; ?>;}

.editor-styles-wrapper .cat-name,.editor-styles-wrapper .related_article .ttl:before{ background-color: <?php echo $labelbg; ?>; color:  <?php echo $labeltext; ?>;}
</style>
<?php
    }
// add_action('admin_print_styles', 'stk_customize_css_admin');