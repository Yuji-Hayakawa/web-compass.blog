<?php

// plugin stylesheet

if (
	is_plugin_active('wordpress-popular-posts/wordpress-popular-posts.php')
	|| is_plugin_active('table-of-contents-plus/toc.php')
	|| is_plugin_active('easy-table-of-contents/easy-table-of-contents.php')
) {
	add_action('wp_enqueue_scripts', 'stk_add_stylesheet_plugin');
	}

// ---------------------------------------------
// wpp
if(!function_exists('stk_add_stylesheet_plugin')) {
	function stk_add_stylesheet_plugin() {
		$tag = "";
		if ( is_plugin_active('wordpress-popular-posts/wordpress-popular-posts.php') ){
			$tag .= '
		/* WordPress Popular Posts */
		ul.wpp-list {
			counter-reset: number;
		}
		ul.wpp-list li {
			list-style: none;
			position: relative;
			border-bottom: 1px solid #ddd;
			margin: 0;
			padding-bottom: 0.75em;
		}
		ul.wpp-list li a::before {
			counter-increment: number;
			content: counter(number);
			background-color: var(--main-ttl-bg);
			color: var(--main-ttl-color);
			margin-right: 3px;
			width: 1.5em;
			height: 1.5em;
			line-height: 1.5em;
			font-size: 75%;
			border-radius: 3px;
			font-weight: bold;
			display: block;
			text-align: center;
			position: absolute;
			left: 2px;
			top: 2px;
			z-index: 1;
		}
		ul.wpp-list img {
			margin-bottom: 0;
			margin-right: 5px;
		}
		ul.wpp-list li a.wpp-post-title {
			display: block;
		}
		ul.wpp-list li a.wpp-post-title::before,
		ul.wpp-list li .wpp-author a::before,
		ul.wpp-list li .wpp-category a::before {
			content: none;
		}
		ul.wpp-list .wpp-excerpt {
			font-size: 80%;
		}
		';
		}

		if ( is_plugin_active('table-of-contents-plus/toc.php') ){
			$tag .= '
		/* TOC+ */
		@media only screen and (max-width: 480px) {
			#toc_container {
				font-size: 90%;
			}
		}
		#toc_container {
			width: 100%!important;
			padding: 1.2em;
			border: 5px solid rgba(100, 100, 100, 0.2);
		}
		#toc_container li {
			margin: 1em 0;
			font-weight: bold;
		}
		#toc_container li li {
			font-weight: normal;
			margin: 0.5em 0;
		}
		#toc_container li::before {
			content: none;
		}
		#toc_container .toc_number {
			display: inline-block;
			font-weight: bold;
			font-size: 75%;
			background-color: var(--main-ttl-bg);
			color: var(--main-ttl-color);
			min-width: 2.1em;
			min-height: 2.1em;
			line-height: 2.1;
			text-align: center;
			border-radius: 1em;
			margin-right: 0.3em;
			padding: 0 7px;
		}
		#toc_container a {
			color: inherit;
			text-decoration: none;
		}
		#toc_container a:hover {
			text-decoration: underline;
		}
		#toc_container p.toc_title {
			max-width: 580px;
			font-weight: bold;
			text-align: left;
			margin: 0 auto;
			font-size: 100%;
			vertical-align: middle;
		}
		#toc_container .toc_title::before {
			display: inline-block;
			font-family: var(--stk-font-awesome-free, "Font Awesome 5 Free");
			font-weight: 900;
			content: "\f03a";
			margin-right: 0.8em;
			margin-left: 0.4em;
			transform: scale(1.4);
			color: var(--main-ttl-bg);
		}
		#toc_container .toc_title .toc_toggle {
			font-size: 80%;
			font-weight: normal;
			margin-left: 0.2em;
		}
		#toc_container .toc_list {
			max-width: 580px;
			margin-left: auto;
			margin-right: auto;
		}
		#toc_container .toc_list>li {
			padding-left: 0;
		}
		';
		}

		if ( is_plugin_active('easy-table-of-contents/easy-table-of-contents.php') ){
			$tag .= '
		/* EOC */
		#ez-toc-container {
			width: 100%!important;
			border: 5px solid rgba(100, 100, 100, 0.2);
			padding: 1.2em;
		}
		#ez-toc-container li:before {
			content: none;
		}
		#ez-toc-container li,
		#ez-toc-container ul,
		#ez-toc-container ul li,
		.ez-toc-widget-container,
		.ez-toc-widget-container li {
			margin-bottom: 0.2em;
		}
		#ez-toc-container ul.ez-toc-list {
			margin-top: 0.5em;
		}
		#ez-toc-container.counter-decimal ul.ez-toc-list li a::before,
		.ez-toc-widget-container.counter-decimal ul.ez-toc-list li a::before {
			font-weight: bold;
			margin-right: 0.4em;
			display: inline-block;
			transform: scale(0.9);
			opacity: 0.7;
		}
		';
		}

	wp_add_inline_style('stk_style', minify_css($tag));
	}
}