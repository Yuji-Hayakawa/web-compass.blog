<?php

//関連記事
register_block_type( 'stk-plugin/kanrenpost', array(
	'attributes' => array(
		'id' => array (
			'type' => 'string',
			'default' => null
		),
		'url' => array (
			'type' => 'string',
			'default' => null
		),
		'target' => array (
			'type' => 'boolean',
			'default' =>  false
		),
		'type' => array (
			'type' => 'string',
			'default' => 'simple'
		),
		'date' => array (
			'type' => 'boolean',
			'default' =>  false
		),
		'labeltext' => array (
			'type' => 'string',
			'default' =>  '関連記事'
		),
		'className' => array (
			'type' => 'string',
			'default' =>  null
		),
		'marginTopSetting' => array (
			'type' => 'string',
			'default' =>  null
		),
		'marginBottomSetting' => array (
			'type' => 'string',
			'default' =>  null
		),
		'stkWowFadeIn' => array (
			'type' => 'string',
			'default' =>  null
		),
		'blockHiddenSetting' => array (
			'type' => 'string',
			'default' =>  null
		),
	),
	
	'render_callback' => 'kanrenpost_func',
) );

if(!function_exists('kanrenpost_func')){
	function kanrenpost_func($attributes) {
		$id = isset($attributes['id']) ? esc_attr($attributes['id']) : null;
		$url = isset($attributes['url']) ? esc_url($attributes['url']) : null;

		if(!$id && $url){
			$id = url_to_postid($url);
		}

		// post typeを取得
		$posttype = get_post_type($id);
		
		
		$id = ' '.$posttype.'id="'.$id.'"';
		
		if($attributes['target']){
			$target = ' target="on"';
		} else {
			$target = '';
		}
		$type = isset($attributes['type']) ? ' type="'.esc_attr($attributes['type']).'"' : null;
		$date = isset($attributes['date']) ? ' date="'.esc_attr($attributes['date']).'"' : null;
		$labeltext = isset($attributes['labeltext']) ? ' labeltext="'.esc_attr($attributes['labeltext']).'"' : ' label="none"';
		if($attributes['labeltext']) {
			$labeltext = ' labeltext="'.esc_attr($attributes['labeltext']).'"';
		} else {
			$labeltext = ' label="none"';
		}
		// var_dump($attributes['className']);
		$classname = isset($attributes['className']) ? ' class="'.esc_attr($attributes['className']).'"' : null;

		ob_start();
// 			echo var_dump( '[kanren'.$id.$type.$date.$target.$labeltext.$classname.']' );
			echo do_shortcode( '[kanren'.$id.$type.$date.$target.$labeltext.$classname.']' ) ;
		return ob_get_clean();
	}
}
