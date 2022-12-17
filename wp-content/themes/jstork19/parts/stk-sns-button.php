<?php

if (!defined('ABSPATH')) {
  exit;
}

function stk_snsbutton($position = null)
{

	if (
		get_option('sns_button_display', 'on') == 'off'
		|| ( is_page() && get_option( 'sns_button_display', 'on' ) !== 'on_withpage')
		|| ( is_home() && is_front_page() )
		|| ( get_option('sns_button_display__tophidden')==1 && $position !== 'under' )
	) {
		return;
    }
	
	
	$url_encode = rawurlencode(get_permalink());
	$title_encode = rawurlencode(get_the_title());
	
	$tw_url = get_the_author_meta( 'twitter' );
	$tw_domain = array("http://twitter.com/"=>"","https://twitter.com/"=>"","//twitter.com/"=>"");
	$tw_user = get_the_author_meta('twitter') ? '&via=' . strtr($tw_url , $tw_domain) : null;
	
	$output = "";
	
	if($position)
	{
		$output .= '<div class="sharewrap">';
		$sns_options_text = get_option( 'sns_options_text' ) ? '<div class="h3 sharewrap__title">' . get_option( 'sns_options_text' ) . '</div>' : null;
		$output .= $sns_options_text;
	}

	$output .= '<ul class="sns_btn__ul">';

	if( !get_option( 'sns_button_hide_twitter' ) == 1 )
	{
		$output .= '<li class="sns_btn__li twitter">';
		if ( stk_is_amp() )
		{
			$output .= '<amp-social-share type="twitter"></amp-social-share>';
		} else {
			$output .= '<a class="sns_btn__link" target="blank" 
				href="//twitter.com/intent/tweet?url=' . $url_encode . '&text='.$title_encode. $tw_user . '&tw_p=tweetbutton" 
				onclick="window.open(this.href, \'tweetwindow\', \'width=550, height=450,personalbar=0,toolbar=0,scrollbars=1,resizable=1\'); return false;
				">
				<svg class="stk_sns__svgicon"><use xlink:href="#stk-twitter-svg" /></svg>
				<span class="sns_btn__text">ツイート</span>';
				
			$output .= stk_sns_count('twitter');

			$output .= '</a>';
		}
		$output .= '</li>';
	}

	if( !get_option( 'sns_button_hide_facebook' ) == 1 ) 
	{
		$output .= '<li class="sns_btn__li facebook">';
        if (stk_is_amp()) 
		{
			$fb_app_id = get_option('sns_button_facebook_app_id');
			$output .= '<amp-social-share type="facebook" data-param-app_id="' . $fb_app_id . '"></amp-social-share>';
        } else {
			$output .= '<a class="sns_btn__link" 
				href="//www.facebook.com/sharer.php?src=bm&u=' .$url_encode. '&t=' . $title_encode . '" 
				onclick="javascript:window.open(this.href, \'\', \'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=300,width=600\');return false;
				">
				<svg class="stk_sns__svgicon"><use xlink:href="#stk-facebook-svg" /></svg>
				<span class="sns_btn__text">シェア</span>';
			$output .= stk_sns_count('facebook');
			$output .= '</a>';
		}
		$output .= '</li>';
	}
		
	if( !get_option( 'sns_button_hide_hatebu' ) == 1 ) 
	{
		$share_url = add_query_arg(
			array(
			  'mode'  => 'confirm',
			  'url'   => $url_encode,
			  'title' => $title_encode,
			),
			'https://b.hatena.ne.jp/add'
		);

		$output .= '<li class="sns_btn__li hatebu">';
        if (stk_is_amp()) 
		{
			$output .= '<amp-social-share type="hatebu" data-share-endpoint="' . esc_url( $share_url ) . '">
			<svg class="stk_sns__svgicon"><use xlink:href="#stk-hatebu-svg" /></svg>
			</amp-social-share>';
        } else {
			$output .= '<a class="sns_btn__link" target="_blank"
				href="//b.hatena.ne.jp/add?mode=confirm&url=' . get_permalink() . '
				&title=' . $title_encode . '" 
				onclick="window.open(this.href, \'HBwindow\', \'width=600, height=400, menubar=no, toolbar=no, scrollbars=yes\'); return false;
				">
				<svg class="stk_sns__svgicon"><use xlink:href="#stk-hatebu-svg" /></svg>
				<span class="sns_btn__text">はてブ</span>';
			$output .= stk_sns_count('hatebu');
			$output .= '</a>';	
		}
		$output .= '</li>';
	}
	
	if( !get_option( 'sns_button_hide_line' ) == 1 ) 
	{
		$output .= '<li class="sns_btn__li line">';
		if ( stk_is_amp() )
		{
			$output .= '<amp-social-share type="line"></amp-social-share>';
		} else {
			$output .= '<a class="sns_btn__link" target="_blank"
				href="//line.me/R/msg/text/?' . $title_encode . '%0A' . $url_encode . '
				">
				<svg class="stk_sns__svgicon"><use xlink:href="#stk-line-svg" /></svg>
				<span class="sns_btn__text">送る</span>';
			$output .= '</a>';
		}
		$output .= '</li>';
	}

	if( !get_option( 'sns_button_hide_pocket' ) == 1 )
	{
		$output .= '<li class="sns_btn__li pocket">';
		$share_url = add_query_arg(
			array(
			  'url'   => $url_encode,
			  'title' => $title_encode,
			),
			'https://getpocket.com/edit'
		);

		if ( stk_is_amp() ) 
		{
			$output .= '<amp-social-share type="pocket" data-share-endpoint="' . esc_url( $share_url ) . '">
			<svg class="stk_sns__svgicon"><use xlink:href="#stk-pokect-svg" /></svg>
			</amp-social-share>';
		} else {
			$output .= '<a class="sns_btn__link" 
				href="//getpocket.com/edit?url=' . get_permalink() . '&title=' . $title_encode . '" 
				onclick="window.open(this.href, \'Pocketwindow\', \'width=550, height=350, menubar=no, toolbar=no, scrollbars=yes\'); return false;
				">
				<svg class="stk_sns__svgicon"><use xlink:href="#stk-pokect-svg" /></svg>
				<span class="sns_btn__text">Pocket</span>';
			$output .= stk_sns_count('pocket');
			$output .= '</a>';
		}
		$output .= '</li>';
	}

	if( !get_option( 'sns_button_hide_pinterest', 1) == 1)
	{
		$pin_media = get_the_post_thumbnail_url() ? get_the_post_thumbnail_url() : null;
		$pin_media_url = $pin_media ? "&media=" . $pin_media : null;
		
		$output .= '<li class="sns_btn__li pinterest">';

		if ( stk_is_amp() ) 
		{
			$output .= '<amp-social-share type="pinterest"></amp-social-share>';
		} else {
			$output .= '<a class="sns_btn__link" target="_blank" 
				href="//pinterest.com/pin/create/button/?url=' . $url_encode . '&media=' . $pin_media . '&description=' . $title_encode . '
				">
				<svg class="stk_sns__svgicon"><use xlink:href="#stk-pinterest-svg" /></svg>
				<span class="sns_btn__text">Pin it</span>';
			$output .= '</a>';
		}
		$output .= '</li>';
	}

	$output .= '</ul>';

    if ($position) {
		$output .= '</div>';
    }
	echo $output;
}


// sns count cache ボタンカウント用メソッド

function stk_sns_count($name) {

	$socialname = 'scc_get_share_'.$name;

	if(function_exists($socialname)) {
		if($socialname() == 0) {
			return;
		} else {
			return '<span class="sns_btn__count">'.$socialname().'</span>';
		}
	}
}
