<?php 

add_theme_support( 'editor-color-palette', array(
	array(
		'name'  => __( 'Black' ),
		'slug'  => 'black',
		'color'  => '#000',
	),
	array(
		'name'  => __( 'Cyan bluish gray' ),
		'slug'  => 'cyan-bluish-gray',
		'color'  => '#abb8c3',
	),
	array(
		'name'  => __( 'White' ),
		'slug'  => 'white',
		'color'  => '#fff',
	),
	array(
		'name'  => __( 'Pale pink' ),
		'slug'  => 'pale-pink',
		'color'  => '#f78da7',
	),
	array(
		'name'  => __( 'Vivid red' ),
		'slug'  => 'vivid-red',
		'color' => '#cf2e2e',
	),
	array(
		'name'  => __( 'Luminous vivid orange' ),
		'slug'  => 'luminous-vivid-orange',
		'color' => '#ff6900',
	),
	array(
		'name'  => __( 'Luminous vivid amber' ),
		'slug'  => 'luminous-vivid-amber',
		'color' => '#fcb900',
	),
	array(
		'name'  => __( 'Light green cyan' ),
		'slug'  => 'light-green-cyan',
		'color' => '#7bdcb5',
	),
	array(
		'name'  => __( 'Vivid green cyan' ),
		'slug'  => 'vivid-green-cyan',
		'color' => '#00d084',
	),
	array(
		'name'  => __( 'Pale cyan blue' ),
		'slug'  => 'pale-cyan-blue',
		'color' => '#8ed1fc',
	),
	array(
		'name'  => __( 'Vivid cyan blue' ),
		'slug'  => 'vivid-cyan-blue',
		'color' => '#0693e3',
	),
	array(
		'name'  => __( 'Vivid purple' ),
		'slug'  => 'vivid-purple',
		'color' => '#9b51e0',
	),
) );

// カラーパレットにテーマカラー（見出し色）を追加
function stk_add_block_editor_custom_color_palette() {
    $palette = get_theme_support( 'editor-color-palette' );
    if ( ! empty( $palette ) ) {
		
        $palette = array_merge( $palette[0], array(
            array(
				'name'  => __( 'テーマカラー（見出し背景色）', 'stork19' ),
				'slug'  => 'mainttlbg',
				'color' => 'var(--main-ttl-bg)',
			),
			array(
				'name'  => __( 'テーマカラー（見出し文字色）', 'stork19' ),
				'slug'  => 'mainttltext',
				'color' => 'var(--main-ttl-color)',
			),
        ) );
        add_theme_support( 'editor-color-palette', $palette );
    }
}
add_action( 'after_setup_theme', 'stk_add_block_editor_custom_color_palette', 11 );