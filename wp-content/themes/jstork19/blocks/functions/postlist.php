<?php

//カテゴリ一覧を表示させる
register_block_type( 'stk-plugin/postlistcat', array(
	'attributes' => array(
		'id' => array (
			'type' => 'integer',
			
		),
		'num' => array (
			'type' => 'integer',
			'default' => 8
		),
		'ttlnone' => array (
			'type' => 'boolean',
			'default' =>  true
		),
		'postlistType' => array (
			'type' => 'string',
			'default' => 'card'
		),
		'postlistDateFirst' => array (
			'type' => 'boolean',
			'default' =>  false
		),
		'postlistDate' => array (
			'type' => 'boolean',
			'default' =>  false
		),
		'orderby' => array (
			'type' => 'string',
			'default' => 'post_date'
		),
		'order' => array (
			'type' => 'string',
			'default' => 'DESC'
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
		'layoutpc' => array (
			'type' => 'string',
			'default' =>  4
		),
		'layouttb' => array (
			'type' => 'string',
			'default' =>  4
		),
		'layoutsp' => array (
			'type' => 'string',
			'default' =>  2
		),
	),
	'render_callback' => 'postlist_cat_func',
) );

if(!function_exists('postlist_cat_func')){
	function postlist_cat_func($attributes) {
		$id = isset($attributes['id']) ? $attributes['id'] : '';
		$num = $attributes['num'];
		$ttlnone = $attributes['ttlnone'];
		if($ttlnone) {
			$ttlnone = 'ttl="none"';
		} else {
			$ttlnone = null;
		}
		$type = $attributes['postlistType'];
		if($attributes['postlistDateFirst'] ) {
			$type = $type.' text__datefirst';
		}
		$date = $attributes['postlistDate'];
		if($date) {
			$date = 'off';
		} else {
			$date = 'on';
		}
		$orderby = $attributes['orderby'];
		$order = $attributes['order'];

		$classname = isset($attributes['className']) ? ' class="'.esc_attr($attributes['className']).'"' : null;

		$layoutpc = isset($attributes['layoutpc']) ? ' layoutpc="'.$attributes['layoutpc'].'"' : '';
		$layouttb = isset($attributes['layouttb']) ? ' layouttb="'.$attributes['layouttb'].'"' : '';
		$layoutsp = isset($attributes['layoutsp']) ? ' layoutsp="'.$attributes['layoutsp'].'"' : '';
		
		ob_start();
			echo do_shortcode( '[postlist catid="'.$id.'" show="'.$num.'" type="'.$type.'" date="'.$date.'" orderby="'.$orderby.'" order="'.$order.'" '.$ttlnone . $classname. $layoutpc.$layouttb.$layoutsp.']' );
		return ob_get_clean();
	}
}


//タグ一覧を表示させる
register_block_type( 'stk-plugin/postlisttag', array(
	'attributes' => array(
		'id' => array (
			'type' => 'integer',
		),
		'num' => array (
			'type' => 'integer',
			'default' => 8
		),
		'ttlnone' => array (
			'type' => 'boolean',
			'default' =>  true
		),
		'postlistType' => array (
			'type' => 'string',
			'default' => 'card'
		),
		'postlistDateFirst' => array (
			'type' => 'boolean',
			'default' =>  false
		),
		'postlistDate' => array (
			'type' => 'boolean',
			'default' =>  false
		),
		'orderby' => array (
			'type' => 'string',
			'default' => 'post_date'
		),
		'order' => array (
			'type' => 'string',
			'default' => 'DESC'
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
		'layoutpc' => array (
			'type' => 'string',
			'default' =>  4
		),
		'layouttb' => array (
			'type' => 'string',
			'default' =>  4
		),
		'layoutsp' => array (
			'type' => 'string',
			'default' =>  2
		),
	),
	'render_callback' => 'postlist_tag_func',
) );

if(!function_exists('postlist_tag_func')){
	function postlist_tag_func($attributes) {
		$id = isset($attributes['id']) ? $attributes['id'] : '';
		$num = $attributes['num'];
		$ttlnone = $attributes['ttlnone'];
		if($ttlnone) {
			$ttlnone = 'ttl="none"';
		} else {
			$ttlnone = null;
		}
		$type = $attributes['postlistType'];
		if($attributes['postlistDateFirst'] ) {
			$type = $type.' text__datefirst';
		}
		$date = $attributes['postlistDate'];
		if($date) {
			$date = 'off';
		} else {
			$date = 'on';
		}
		$orderby = $attributes['orderby'];
		$order = $attributes['order'];

		$classname = isset($attributes['className']) ? ' class="'.esc_attr($attributes['className']).'"' : null;

		$layoutpc = isset($attributes['layoutpc']) ? ' layoutpc="'.$attributes['layoutpc'].'"' : '';
		$layouttb = isset($attributes['layouttb']) ? ' layouttb="'.$attributes['layouttb'].'"' : '';
		$layoutsp = isset($attributes['layoutsp']) ? ' layoutsp="'.$attributes['layoutsp'].'"' : '';
		
		ob_start();
			echo do_shortcode( '[postlist tagid="'.$id.'" show="'.$num.'" type="'.$type.'" date="'.$date.'" orderby="'.$orderby.'" order="'.$order.'" '.$ttlnone . $classname. $layoutpc.$layouttb.$layoutsp.']' );
		return ob_get_clean();
	}
}

//新着一覧を表示させる
register_block_type( 'stk-plugin/postlistnew', array(
	'attributes' => array(
		'num' => array (
			'type' => 'integer',
			'default' => 8
		),
		'notcategorys' => array (
			'type' => 'string',
			'default' => null
		),
		'nottags' => array (
			'type' => 'string',
			'default' => null
		),
		'catlabel' => array (
			'type' => 'boolean',
			'default' =>  false
		),
		'ttlnone' => array (
			'type' => 'boolean',
			'default' =>  true
		),
		'postlistType' => array (
			'type' => 'string',
			'default' => 'card'
		),
		'postlistDateFirst' => array (
			'type' => 'boolean',
			'default' =>  false
		),
		'postlistDate' => array (
			'type' => 'boolean',
			'default' =>  false
		),
		'orderby' => array (
			'type' => 'string',
			'default' => 'post_date'
		),
		'order' => array (
			'type' => 'string',
			'default' => 'DESC'
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
		'layoutpc' => array (
			'type' => 'string',
			'default' =>  4
		),
		'layouttb' => array (
			'type' => 'string',
			'default' =>  4
		),
		'layoutsp' => array (
			'type' => 'string',
			'default' =>  2
		),
	),
	'render_callback' => 'postlist_new_func',
) );

if(!function_exists('postlist_new_func')){
	function postlist_new_func($attributes) {
		$num = $attributes['num'];
		$ttlnone = $attributes['ttlnone'];
		if($ttlnone) {
			$ttlnone = 'ttl="none"';
		} else {
			$ttlnone = null;
		}
		$type = $attributes['postlistType'];
		if($attributes['postlistDateFirst'] ) {
			$type = $type.' text__datefirst';
		}
		$date = $attributes['postlistDate'];
		if($date) {
			$date = 'off';
		} else {
			$date = 'on';
		}
		$orderby = $attributes['orderby'];
		$order = $attributes['order'];

		$classname = isset($attributes['className']) ? ' class="'.esc_attr($attributes['className']).'"' : null;
		$notcategorys = isset($attributes['notcategorys']) ? ' notcategorys="'.esc_attr($attributes['notcategorys']).'"' : null;
		$nottags = isset($attributes['nottags']) ? ' nottags="'.esc_attr($attributes['nottags']).'"' : null;
		$catlabel = $attributes['catlabel'] ? ' catlabel="on"' : null;

		$layoutpc = isset($attributes['layoutpc']) ? ' layoutpc="'.$attributes['layoutpc'].'"' : '';
		$layouttb = isset($attributes['layouttb']) ? ' layouttb="'.$attributes['layouttb'].'"' : '';
		$layoutsp = isset($attributes['layoutsp']) ? ' layoutsp="'.$attributes['layoutsp'].'"' : '';
		
		ob_start();
			echo do_shortcode( '[postlist show="'.$num.'" type="'.$type.'" date="'.$date.'" orderby="'.$orderby.'" order="'.$order.'" '.$ttlnone . $classname. $notcategorys. $nottags. $catlabel. $layoutpc.$layouttb.$layoutsp.']' );
		return ob_get_clean();
	}
}