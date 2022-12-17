<?php

if ( !defined( 'ABSPATH' ) ) exit;

function shortcode_empty_paragraph_fix($content) {
    $array = array (
        '<p>[' => '[',
        ']</p>' => ']',
        ']<br />' => ']'
    );

    $content = strtr($content, $array);
    return $content;
}
add_filter('the_content', 'shortcode_empty_paragraph_fix');

// pickup content

function pickUpContentParts($number = 1) {
    if ( ! get_theme_mod('stk_pickupcontent_'.$number.'_img')) {
		return;
    }
	$target = get_option('stk_pickupcontent_'.$number.'_linktarget') ? ' target="_blank"' : null;
	$image_id = attachment_url_to_postid(get_theme_mod('stk_pickupcontent_'.$number.'_img'));
	$image = wp_get_attachment_image(
		$image_id, 
		'full', 
		false, 
		array( 
			'class' => 'pickup_content__img', 
		)
	);

	if($number === 2) {
		$delay_class = ' delay-0_2s';
	} elseif($number === 3) {
		$delay_class = ' delay-0_4s';
	} elseif($number === 4) {
		$delay_class = ' delay-0_6s';
	} else {
		$delay_class = null;
	}

	$output = '<li class="pickup_content__li fadeInDown'.$delay_class.'"><a class="pickup_content__link no-icon" href="' . get_option('stk_pickupcontent_'.$number.'_link') . '"' . $target . '>';
	$output .= '<figure class="eyecatch">' . $image . '</figure>';
	if(get_option('stk_pickupcontent_'.$number.'_text')){
		$output .= '<div class="pickup_content__text"><span class="pickup_content__text__label">' . get_option('stk_pickupcontent_'.$number.'_text') . '</span></div>';
	}
	$output .= '</a></li>';
	return $output;
	
}

function pickUpContentCode($id = null) {
	if(get_theme_mod('stk_pickupcontent_1_img')
	|| get_theme_mod('stk_pickupcontent_2_img')
	|| get_theme_mod('stk_pickupcontent_3_img')
	|| get_theme_mod('stk_pickupcontent_4_img')) {

		if( $id ) {
			$id = 'id="'. $id .'" ';
		}
		$output = '<div '.$id.'class="pickup_content"><ul class="pickup_content__ul">';
		$output .= pickUpContentParts(1);
		$output .= pickUpContentParts(2);
		$output .= pickUpContentParts(3);
		$output .= pickUpContentParts(4);

		$output .= '</ul></div>';

		echo $output;

	}
}

function pickUpContent() {
	if(
		(get_option('stk_pickupcontent_display', 'on') == 'on' && ! (is_page_template( 'page-lp.php' ) || is_page_template( 'page-wide.php' )))
		|| (get_option('stk_pickupcontent_display', 'on') == 'on_top' && ( is_front_page() || is_home() ) && ! (is_page_template( 'page-lp.php' ) || is_page_template( 'page-wide.php' )))
	) {

		return pickUpContentCode('main-pickup_content');

	} else {

		null;

	}
}

function pickUpContentFunc($atts) {
	ob_start();
	echo pickUpContentCode();
	return ob_get_clean();
}
add_shortcode('pickupcontent', 'pickUpContentFunc');


// Recommend post
function kanrenFunc($atts) {

	$postid = isset($atts['postid']) ? esc_attr($atts['postid']) : null;
	$pageid = isset($atts['pageid']) ? esc_attr($atts['pageid']) : null;

	$posturl = isset($atts['posturl']) ? esc_url($atts['posturl']) : null;
	$pageurl = isset($atts['pageurl']) ? esc_url($atts['pageurl']) : null;
	if($posturl) {
		$postid = url_to_postid($posturl);
	}
	if($pageurl) {
		$pageid = url_to_postid($pageurl);
	}

	if($postid || $pageid) {

		$postids = (explode(',',$postid));
		$datenone = isset($atts['date']) ? esc_attr($atts['date']) : null;
		$order = isset($atts['order']) ? esc_attr($atts['order']) : "DESC";
		$orderby = isset($atts['orderby']) ? esc_attr($atts['orderby']) : "post_date";
		$labelclass = isset($atts['label']) ? ' labelnone' : "";
		$labeltext = isset($atts['labeltext']) ? esc_attr($atts['labeltext']) : '関連記事';
		$target = isset($atts['target']) ? ' target="_blank"' : "";
		$type = isset($atts['type']) ? ' type'.esc_attr($atts['type']) : " typesimple";
		$classname = isset($atts['class']) ? ' '.esc_attr($atts['class']) : null;

		$echo ="";

		$args = array(
			"post_type" => array('post','page'),
		    'posts_per_page' => -1,
			'post__in' => $postids,
			'page_id' => $pageid,
		    'orderby' => $orderby,
		    'order' => $order,
		    'post_status' => 'publish',
		    'suppress_filters' => true,
		    'ignore_sticky_posts' => true,
		    'no_found_rows' => true
		);

		$the_query = new WP_Query( $args );

		if ( $the_query->have_posts() ) {
			while ( $the_query->have_posts() ) {
				$the_query->the_post();

				$post_id = '';

				$url = esc_url(get_permalink());
				$postimg = has_post_thumbnail() && $type !== ' typetext' ? '<figure class="eyecatch of-cover thum">' .skt_oc_post_thum(). '</figure>' : null;
				$postdate = (!$datenone && !$pageid) ? stk_archivesdate() : null;
				$postlabel = (!$labelclass == ' labelnone') ? '<span class="labeltext">' . $labeltext . '</span>' : null;
				$postttl = '<div class="related_article__ttl ttl">' . $postlabel . esc_attr(get_the_title()) . '</div>';

				$echo .= '<div class="related_article' . $labelclass . $type . $classname .'"><a class="related_article__link no-icon" href="' . $url . '"' . $target .'>' .$postimg. '<div class="related_article__meta archives_post__meta inbox">' . $postttl . $postdate . '</div></a></div>';
			} // LOOP END
			wp_reset_postdata();
		} else {
			$echo = '<p>記事を取得できませんでした。記事IDをご確認ください。</p>';
		}

		return $echo;

	} else {
		return null;
	}

}
add_shortcode('kanren','kanrenFunc');

// Recommend post2 (none label)
function kanren2Func($atts) {

	$postid = isset($atts['postid']) ? esc_attr($atts['postid']) : null;
	$pageid = isset($atts['pageid']) ? esc_attr($atts['pageid']) : null;

	$posturl = isset($atts['posturl']) ? ' posturl="'.esc_url($atts['posturl']).'"' : null;
	$pageurl = isset($atts['pageurl']) ? ' pageurl="'.esc_url($atts['pageurl']).'"' : null;

	$date = isset($atts['date']) ? ' date="'.esc_attr($atts['date']).'"' : null;
	$order = isset($atts['order']) ? ' order="'.esc_attr($atts['order']).'"' : null;
	$orderby = isset($atts['orderby']) ? ' orderby="'.esc_attr($atts['orderby']).'"' : null;
	$target = isset($atts['target']) ? ' target="'.esc_attr($atts['target']).'"' : null;
	$type = isset($atts['type']) ? ' type="'.esc_attr($atts['type']).'"' : null;
	$classname = isset($atts['class']) ? ' class="'.esc_attr($atts['class']).'"' : null;

	ob_start();

		if( $postid || $posturl ) {
			echo do_shortcode( '[kanren postid="'.$postid.'" label="none"'.$date.$order.$orderby.$type.$target.$posturl.$classname.']' );
		} elseif( $pageid || $pageurl ) {
			echo do_shortcode( '[kanren pageid="'.$pageid.'" label="none"'.$date.$order.$orderby.$type.$target.$pageurl.$classname.']' );
		} else {
			null;
		}
	return ob_get_clean();


}
add_shortcode('kanren2','kanren2Func');


// Grid wrap
function colwrapFunc( $atts, $content = null ) {
	$class = isset($atts['class']) ? esc_attr($atts['class']) : null;

    return '<div class="column-wrap ' . $class . '">' . do_shortcode($content) . '</div>';
}
add_shortcode('colwrap', 'colwrapFunc');

// Grid Desktop & Tablet (2 Column) mobile(1 Column)
function col2Func( $atts, $content = null ) {
	$class = isset($atts['class']) ? esc_attr($atts['class']) : null;

    return '<div class="column_2 child_column ' . $class . '">' . do_shortcode($content) . '</div>';
}
add_shortcode('col2', 'col2Func');

// Grid Desktop & Tablet (3 Column) mobile(1 Column)
function col3Func( $atts, $content = null ) {
	$class = isset($atts['class']) ? esc_attr($atts['class']) : null;

    return '<div class="column_3 child_column ' . $class . '">' . do_shortcode($content) . '</div>';
}
add_shortcode('col3', 'col3Func');

// CTA
function ctainnerFunc( $atts, $content = null ) {
    return '<div class="cta-inner cf">' . do_shortcode($content) . '</div>';
}
add_shortcode('cta_in', 'ctainnerFunc');

//CTA COPYWRITING
function ctacopyFunc( $atts, $content = null ) {
	$class = (isset($atts['class'])) ? esc_attr($atts['class']) : null;

    return '<h2 class="cta_ttl"><span>' . $content . '</span></h2>';
}
add_shortcode('cta_ttl', 'ctacopyFunc');


// CTA Button
function ctabtnFunc( $atts, $content = null ) {
	$link = isset($atts['link']) ? esc_attr($atts['link']) : null;

    return '<div class="wp-block-button aligncenter big lightning cta_btn"><a class="wp-block-button__link" href="' . $link . '">' . $content . '</a></div>';
}
add_shortcode('cta_btn', 'ctabtnFunc');

// supplement
function asideFunc( $atts, $content = null ) {
	$type = isset($atts['type']) ? esc_attr($atts['type']) : null;

    return '<div class="supplement '. $type . '">' . do_shortcode($content) . '</div>';
}
add_shortcode('aside', 'asideFunc');


// Button
function btnFunc( $atts, $content = null ) {
	$subtext = isset($atts['subtext']) ? ' data-subtext="' . esc_attr($atts['subtext']) . '"' : null;
	$class = isset($atts['class']) ? ' ' . esc_attr($atts['class']) : null;
	$link = isset($atts['link']) ? esc_url($atts['link']) : null;
	$pattern = array(
		'rich_',
		'simple',
	);
	$replace = array(
		'is-style-rich_',
		'is-style-outline',
	);
	$class = str_replace($pattern,$replace,$class);
	$classset = 'wp-block-button btn-wrap aligncenter' . $class;

	// aタグにclassを付与する
	$content = preg_replace_callback('/<a([^>]*)>/', function( $matches ) {
		$match = rtrim ( $matches[1], '/' );
		
		if ( strpos( $match, 'class=' ) !== false ) {
			$match = preg_replace('/class="([^"]*)"/', 'class="$1 wp-block-button__link"', $match);
		} else {
			$match .= 'class="wp-block-button__link" ';
		}
		
		return '<a'. $match .'>';
	}, $content);


	if($link) {
		$content = '<a class="wp-block-button__link" href="'.$link.'">'.$content.'</a>';
	}
	
    return '<div class="' . $classset . '"' . $subtext . '>' . $content . '</div>';
}
add_shortcode('btn', 'btnFunc');

// ad
if(get_theme_mod('other_options_ad1')){
	function ad1Func( $atts, $content = null ) {
	    return '<div class="add">' . get_theme_mod('other_options_ad1') . '</div>';
	}
	add_shortcode('ad1', 'ad1Func');
}
if(get_theme_mod('other_options_ad2')){
	function ad2Func( $atts, $content = null ) {
	    return '<div class="add">' . get_theme_mod('other_options_ad2') . '</div>';
	}
	add_shortcode('ad2', 'ad2Func');
}

// Voice
function voiceFunc( $atts, $content = null ) {
	$icon = isset($atts['icon']) ? '<img src="' . esc_attr($atts['icon']) . '" class="voice_icon__img" width="150" height="150">' : null;
	$type = isset($atts['type']) ? esc_attr($atts['type']) : null;
	$name = isset($atts['name']) ? '<figcaption class="name">' . esc_attr($atts['name']) . '</figcaption>' : null;

    return '<div class="voice cf ' .$type. '"><figure class="icon">' . $icon . $name . '</figure><div class="voicecomment">' . do_shortcode($content) . '</div></div>';
}
add_shortcode('voice', 'voiceFunc');

// box
function contentboxFunc($atts , $content = null) {
	if($atts && $content) {
		$class = isset($atts['class']) ? 'is-style-'.esc_attr($atts['class']) : null;
		$title = isset($atts['title']) ? esc_attr($atts['title']) : null;
		$icon = isset($atts['icon']) ? '<i class="fas fa-' . esc_attr($atts['icon']) . ' fa-lg"></i> ' : null;
		$type = isset($atts['type']) ? ' type_'.esc_attr($atts['type']) : ' type_normal';
		if(!$title && $class) {
			return '<div class="cbox ' . $class . $type .'"><div class="cboxcomment">' . $icon . do_shortcode($content) . '</div></div>';
		} elseif($title && $class) {
			return '<div class="cbox intitle ' . $class . $type .'"><div class="box_title"><span class="span__box_title">' . $icon . $title . '</span></div><div class="cboxcomment">'. do_shortcode($content) .'</div></div>';
		}
	}
}
add_shortcode('box','contentboxFunc');

// Accordion
function accordionFunc($atts, $content = null) {
	$title = isset($atts['title']) ? $atts['title'] : null;
	$type = isset($atts['type']) ? ' type_'.$atts['type'] : null;
	$randid = uniqid('input');
	if ($title) {
		$output = '<div class="accordion' . $type . '"><input type="checkbox" id="' . $randid . '" class="accordion_check" /><label for="' . $randid . '" class="accordion_label">' . $title . '</label><div class="accordion_content">' . do_shortcode($content) . '</div></div>';
		return $output;
	} else {
		return null;
	}
}
add_shortcode('open','accordionFunc');


// post list (category & new post list)
function postlistFuncParts($type, $date, $catlabel) {

	// var_dump($catlabel);

	$catlabel = $catlabel ? stk_archivecatname() : null;

	$postimg = (($type === 'typetext' || $type === 'typetext text__datefirst')) ? null : '<figure class="eyecatch of-cover">' . skt_oc_post_thum() . $catlabel . '</figure>';
	$postttl = '<div class="ttl' . stk_post_newmark() . '">' . get_the_title() . '</div>';
	if(($type === 'typetext' || $type === 'typetext text__datefirst') && $catlabel) {
		$postttl = '<div class="ttl' . stk_post_newmark() . '">' . $catlabel . get_the_title() . '</div>';
	}
	if($date !== 'off'){ $postdate = stk_archivesdate();} else { $postdate = null;}

	return '<li class="cat_postlist__li"><a href="'. get_permalink() .'" class="cat_postlist__link no-icon">' . $postimg . '<div class="postbody archives_post__meta">' . $postttl . $postdate . '</div></a></li>';
}

function postlistFunc($atts) {
	$catid = isset($atts['catid']) ? esc_attr($atts['catid']) : null;
	$tagid = isset($atts['tagid']) ? esc_attr($atts['tagid']) : null;

	$show = isset($atts['show']) ? esc_attr($atts['show']) : 5;
	$date = isset($atts['date']) ? esc_attr($atts['date']) : null;
	$type = isset($atts['type']) ? 'type'.esc_attr($atts['type']) : "typesimple";
	
	$catlabel = isset($atts['catlabel']) ? true : null;

	$order = isset($atts['order']) ? esc_attr($atts['order']) : "DESC";
	$orderby = isset($atts['orderby']) ? esc_attr($atts['orderby']) : "post_date";

	$btntext = isset($atts['btntext']) ? esc_attr($atts['btntext']) : null;
	$ttltag = isset($atts['ttltag']) ? esc_attr($atts['ttltag']) : 'div';

	$class = isset($atts['class']) ? esc_attr($atts['class']) : null;
	$notcategorys = isset($atts['notcategorys']) ? explode(",",$atts['notcategorys']) : null;
	$nottags = isset($atts['nottags']) ? explode(",",$atts['nottags']) : null;

	$ignore_sticky_posts = isset($atts['ignore_sticky_posts']) ? false : true;

	$layoutsp = isset($atts['layoutsp']) && ctype_digit($atts['layoutsp']) ? 100 / $atts['layoutsp'] : null;
	$layoutpc = isset($atts['layoutpc']) && ctype_digit($atts['layoutpc']) ? 100 / $atts['layoutpc'] : null;
	$layouttb = isset($atts['layouttb']) && ctype_digit($atts['layouttb']) ? 100 / $atts['layouttb'] : null;

	// カード型レイアウトでカラム数を変更する場合のstyle
	$style = '';
	if(($layoutsp || $layoutpc|| $layouttb) && $atts['type'] === 'card') {
		$layoutpc_css = $layoutpc ? '--stk-postlist_column_pc:'.$layoutpc.'%;' : '';
		$layouttb_css = $layouttb ? '--stk-postlist_column_tb:'.$layouttb.'%;' : '';
		$layoutsp_css = $layoutsp ? '--stk-postlist_column_sp:'.$layoutsp.'%;' : '';
		$style = ' style="'.$layoutsp_css . $layoutpc_css . $layouttb_css .'"';
	}

	// typeとカスタムclassを配列にしてclasslistとして出力
	$classlist = '';
	$classarray = [];
	$classarray []= $type;
	if($class) {
		$classarray []= $class;
	}
	$classlist = $classarray ? ' ' . implode(" ",$classarray) : null;

	$output = "";

	if( empty( $catid ) && empty( $tagid ) ){
		$args = array(
		    'posts_per_page' => $show,
		    'offset' => 0,
		    'orderby' => $orderby,
		    'order' => $order,
		    'post_type' => array('post'),
		    'post_status' => 'publish',
		    'suppress_filters' => true,
		    'ignore_sticky_posts' => $ignore_sticky_posts,
		    'no_found_rows' => true,
			'category__not_in' => $notcategorys,
			'tag__not_in' => $nottags
		);

		$the_query = new WP_Query( $args );
		if ( $the_query->have_posts() ) {

			$ttl = isset($atts['ttl']) ? esc_attr($atts['ttl']) : '新着記事';
			if( $ttl == 'none' ) {
				$ttl = null;
			} else {
				$ttl = '<'.$ttltag.' class="catttl">' . $ttl . '</'.$ttltag.'>';
			}


			$output .= '<div class="cat_postlist new_postlist'.$classlist.'"'.$style.'>' . $ttl . '<ul class="cat_postlist__ul">';

				while ( $the_query->have_posts() ) {
				$the_query->the_post();

					$output .= postlistFuncParts($type, $date, $catlabel);

				}
				wp_reset_postdata();

			$output .= '</ul>';
			$btnlink = (isset($atts['btnlink'])) ? esc_url($atts['btnlink']) : null;
			if(!$btntext == null && !$btnlink == null) {
				$output .= '<div class="wp-block-button is-style-outline aligncenter arrow"><a class="wp-block-button__link" href="'. $btnlink .'">'. $btntext .'</a></div>';
			}
			$output .= '</div>';

		}

	} elseif( $catid ) {

		$args = array(
			'type'                     => 'post',
			'child_of'                 => 0,
			'parent'                   => '',
			'orderby'                  => 'none',
			'order'                    => 'ASC',
			'hide_empty'               => 1,
			'hierarchical'             => 1,
			'exclude'                  => '',
			'include'                  => $catid,
			'number'                   => '',
			'taxonomy'                 => 'category',
			'pad_counts'               => false
		);

		$categories = get_categories( $args );

		foreach($categories as $category) :


			$args = array(
				'cat'=> $category->cat_ID,
				'posts_per_page' => $show,
				'orderby' => $orderby,
				'order' => $order,
			);


			$the_query = new WP_Query( $args );
			if ( $the_query->have_posts() ) {

				$ttl = isset($atts['ttl']) ? esc_attr($atts['ttl']) : $category->cat_name ;
				if( $ttl == 'none' ) {
					$ttl = null;
				} else {
					$ttl = '<'.$ttltag.' class="catttl">' . $ttl . '</'.$ttltag.'>';
				}

				$output .= '<div class="cat_postlist'.$classlist.'"'.$style.'>' . $ttl . '<ul class="cat_postlist__ul">';

				while ( $the_query->have_posts() ) {
				$the_query->the_post();

					$output .= postlistFuncParts($type, $date, $catlabel);

				}
				wp_reset_postdata();

				$output .= '</ul>';
				if(!$btntext == null) {
					$output .= '<div class="wp-block-button is-style-outline aligncenter arrow"><a class="wp-block-button__link" href="'.get_category_link( $category->term_id ).'">'. $btntext .'</a></div>';
				}
				$output .= '</div>';
			} else {
				return;
			}

		endforeach;

	} elseif( $tagid ) {

		$args = array(
		    'posts_per_page' => $show,
		    'offset' => 0,
		    'orderby' => $orderby,
		    'order' => $order,
		    'tag_id' => $tagid,
		    'post_type' => array('post', 'page'),
		    'post_status' => 'publish',
		    'suppress_filters' => true,
		    'ignore_sticky_posts' => true,
		    'no_found_rows' => true
		);

		$tag = get_tag( $tagid );


		$the_query = new WP_Query( $args );
		if ( $the_query->have_posts() ) {

			if(!$tag){
				return;
			}

			$ttl = isset($atts['ttl']) ? esc_attr($atts['ttl']) : $tag->name;
			if( $ttl == 'none' ) {
				$ttl = null;
			} else {
				$ttl = '<'.$ttltag.' class="catttl">' . $ttl . '</'.$ttltag.'>';
			}

			$output .= '<div class="cat_postlist tag_postlist'.$classlist.'"'.$style.'>' . $ttl . '<ul class="cat_postlist__ul">';

				while ( $the_query->have_posts() ) {
				$the_query->the_post();

					$output .= postlistFuncParts($type, $date, $catlabel);

				}
				wp_reset_postdata();

			$output .= '</ul>';
			if(!$btntext == null) {
				$output .= '<div class="wp-block-button is-style-outline aligncenter arrow"><a class="wp-block-button__link" href="'.get_tag_link( $tagid ).'">'. $btntext .'</a></div>';
			}
			$output .= '</div>';

		} else {
			return;
		}
	}

	return $output;
}
add_shortcode('postlist','postlistFunc');


// fontawesome icon
function stk_iconFunc($atts) {
    extract(shortcode_atts(array(
        'class' => '',
    ), $atts));

    return '<i class="' . $class . '"></i>';
}
add_shortcode('icon', 'stk_iconFunc');


// プロフィール

function stk_profileFunc($atts) {
	$id = isset($atts['id']) ? $atts['id'] : get_the_author_meta('ID');
	$class = isset($atts['class']) ? " ".$atts['class'] : null;
	$position = isset($atts['position']) ? $atts['position'] : null;
	$wrap = isset($atts['wrap']) ? null : 'nowrap';

	$sub_title = isset($atts['sub_title']) ? '<span class="subtext">' . $atts['sub_title'] . '</span>' : null;
	$title = isset($atts['title']) ? '<div class="h_ttl h2 subtext__none gf">' . $atts['title'] . $sub_title . '</div>' : '<div class="h_ttl h2 gf">ABOUT US</div>';

	$bgimg = isset($atts['bgimg']) ? $atts['bgimg'] : null;
	
	$username = get_userdata($id);

	if(!$username ) {
		if (is_user_logged_in()) {
			return '[profile] 正しいユーザーIDを指定してください。';
		}
	} else {
		$output = "";

		if($position == 'singlefoot') {
			// template側の呼び出しで非表示設定と説明が入ってない場合は非表示
			if(
				get_option('post_options_authordisplay','author_on') == 'author_off' 
				|| !get_the_author_meta('description')
				|| !is_single()
			) 
			{
				return;
			}
		}

		if(!$wrap) {
			$output .= '<div class="stk_authorbox">
			' . $title ;
		}

		$output .= '<div class="author_meta ' . $wrap . $class . '">';
		if($bgimg) {
			$output .= '<img src="'.$bgimg.'" class="author__bgimg">';
		}
		$output .= '<div class="author_img">' . get_avatar($id, 150) . '</div>';
		$output .= '<div class="author_info"><div class="author_name">';
		$output .= $username->display_name;
		if(get_the_author_meta('userposition', $id))
			$output .= '<span class="userposition">' . get_the_author_meta( 'userposition', $id ) . '</span>';
		$output .= '</div>';

		$output .= '<div class="author_description">' . get_the_author_meta("description", $id ) . '</div>';

		$output .= stk_author_sns_lists($id);

		$output .= '</div>
		</div>';

		if( !get_option( 'post_options_authornewpost' ) && $position == 'singlefoot') { // オプションで非表示設定になっていなくて、かつポジション指定のないもの

			$output .= '<div id="author-newpost">
			<div class="h_ttl h2"><span class="gf">NEW POST</span></div>
			<ul>';

			$author_id = get_the_author_meta( 'ID' );
			$args = array(
				'post_type' => 'post',
				'author' => $author_id,
				'showposts' => 4,
			);

			$loop = new WP_Query( $args );
		
			while ($loop->have_posts()) : $loop->the_post();
				$output .= skt_singlefoot_post_li();
			endwhile;
			wp_reset_query();

			$output .= '</ul>
			</div>';
		}
			
		
		if(!$wrap) {
			$output .= '</div>';
		}

		return $output;
	}
}
add_shortcode('profile', 'stk_profileFunc');
