<?php
add_action( 'widgets_init', 'theme_register_sidebars' );
function theme_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar1',
		'name' => __( 'PC：メインサイドバー', 'stork19theme' ),
		'description' => __( 'メインのサイドバーです。', 'stork19theme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle gf"><span>',
		'after_title' => '</span></h4>',
	));

	register_sidebar(array(
		'id' => 'sp-contentfoot',
		'name' => __( 'SP：メインサイドバー（コンテンツ下）', 'stork19theme' ),
		'description' => __( 'スマホのコンテンツ下には、通常は「メインサイドバー」のものが表示されますがこちらのウィジェットを入力した場合は、こちらの「スマホ用コンテンツ下」ウィジェットが優先されます。', 'stork19theme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle gf"><span>',
		'after_title' => '</span></h4>',
	));

	register_sidebar(array(
		'id' => 'sidebar-sp',
		'name' => __( 'SP：ハンバーガーメニュー', 'stork19theme' ),
		'description' => __( 'スマートフォンのヘッダー部分のハンバーガーボタン（menu）を押したときに表示されるウィジェット', 'stork19theme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle gf"><span>',
		'after_title' => '</span></h4>',
	));

	register_sidebar(array(
		'id' => 'side-fixed',
		'name' => __( 'PC：スクロール領域', 'stork19theme' ),
		'description' => __( 'サイドバーの下に表示されるスクロール追従型ウィジェットです。（※position：sticky；を使用 ※モダンブラウザのみに対応）', 'stork19theme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle gf"><span>',
		'after_title' => '</span></h4>',
	));


	register_sidebar(array(
		'id' => 'addbanner-titletop',
		'name' => __( '共通：記事タイトル上', 'stork19theme' ),
		'description' => __( '記事タイトル上にテキストウィジェットを使って、イベントなどのお知らせなどを表示します。', 'stork19theme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widgettitle gf"><span>',
		'after_title' => '</span></h2>',
	));

	register_sidebar(array(
		'id' => 'addbanner-sp-titleunder',
		'name' => __( 'SP：[広告]記事タイトル下', 'stork19theme' ),
		'description' => __( '記事タイトル下にAdsenseなどの広告を表示します。テキストウィジェットを追加して広告コードを貼り付けて下さい。こちらはスマートフォン用！【推奨サイズ】レスポンシブ', 'stork19theme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));


	register_sidebar(array(
		'id' => 'addbanner-pc-titleunder',
		'name' => __( 'PC：[広告]記事タイトル下', 'stork19theme' ),
		'description' => __( '記事タイトル下にAdsenseなどの広告を表示します。テキストウィジェットを追加して広告コードを貼り付けて下さい。こちらはパソコン用！', 'stork19theme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));

    if (is_plugin_active_amp()) {
        register_sidebar(array(
			'id' => 'addbanner-amp-titleunder',
			'name' => __('AMP：[広告]記事タイトル下', 'stork19theme'),
			'description' => __('AMP表示のときのみ表示します。', 'stork19theme'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2>',
			'after_title' => '</h2>',
		));
    }

	register_sidebar(array(
		'id' => 'addbanner-sp-contentfoot',
		'name' => __( 'SP：[広告]記事コンテンツ下', 'stork19theme' ),
		'description' => __( '記事コンテンツ下にAdsenseなどの広告を表示します。テキストウィジェットを追加して広告コードを貼り付けて下さい。こちらはスマートフォン用！', 'stork19theme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));


	register_sidebar(array(
		'id' => 'addbanner-pc-contentfoot',
		'name' => __( 'PC：[広告]記事コンテンツ下', 'stork19theme' ),
		'description' => __( '記事コンテンツ下にAdsenseなどの広告を表示します。テキストウィジェットを追加して広告コードを貼り付けて下さい。こちらはパソコン用！', 'stork19theme' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2>',
		'after_title' => '</h2>',
	));

    if (is_plugin_active_amp()) {
        register_sidebar(array(
			'id' => 'addbanner-amp-contentfoot',
			'name' => __('AMP：[広告]記事コンテンツ下', 'stork19theme'),
			'description' => __('AMP表示のときのみ表示します。', 'stork19theme'),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget' => '</div>',
			'before_title' => '<h2>',
			'after_title' => '</h2>',
		));
    }

	register_sidebar(array(
		'id' => 'home-top',
		'name' => __( 'PC：トップページ上部', 'stork19theme' ),
		'description' => __( 'トップページ（PC/Tablet）のヘッダー下 最大サイズ：728px', 'stork19theme' ),
		'before_widget' => '<div id="%1$s" class="widget homewidget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widgettitle"><span>',
		'after_title' => '</span></h2>',
	));
	register_sidebar(array(
		'id' => 'home-top_mobile',
		'name' => __( 'SP：トップページ上部', 'stork19theme' ),
		'description' => __( 'トップページ（スマートフォン）のヘッダー下', 'stork19theme' ),
		'before_widget' => '<div id="%1$s" class="widget homewidget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widgettitle"><span>',
		'after_title' => '</span></h2>',
	));

	register_sidebar(array(
		'id' => 'home-bottom',
		'name' => __( 'PC：トップページ下部', 'stork19theme' ),
		'description' => __( 'トップページ（PC/Tablet）のフッター上 最大サイズ：728px', 'stork19theme' ),
		'before_widget' => '<div id="%1$s" class="widget homewidget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widgettitle"><span>',
		'after_title' => '</span></h2>',
	));
	register_sidebar(array(
		'id' => 'home-bottom_mobile',
		'name' => __( 'SP：トップページ下部', 'stork19theme' ),
		'description' => __( 'トップページ（スマートフォン）の記事一覧下', 'stork19theme' ),
		'before_widget' => '<div id="%1$s" class="widget homewidget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h2 class="widgettitle"><span>',
		'after_title' => '</span></h2>',
	));


	register_sidebar(array(
		'id' => 'footer1',
		'name' => __( 'PC：フッター', 'stork19theme' ),
		'description' => __( 'PC・タブレット用のウィジェットです。', 'stork19theme' ),
		'before_widget' => '<div id="%1$s" class="widget footerwidget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle gf"><span>',
		'after_title' => '</span></h4>',
	));

	register_sidebar(array(
		'id' => 'footer-sp',
		'name' => __( 'SP：フッター', 'stork19theme' ),
		'description' => __( 'スマートフォン用のフッターウィジェットです。通常はPC版で設定したフッターウィジェットが表示されますが、スマートフォン用を設定した場合は、この内容で置き換えられます。', 'stork19theme' ),
		'before_widget' => '<div id="%1$s" class="widget footerwidget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '<h4 class="widgettitle gf"><span>',
		'after_title' => '</span></h4>',
	));

	register_sidebar(array(
		'id' => 'cta',
		'name' => __( '共通：CTA設定', 'stork19theme' ),
		'description' => __( '記事（single）の一番下にColl To Actionを設置できます。「テキスト」や「カスタムHTML」を追加してテキストやコードを記載可能です。', 'stork19theme' ),
		'before_widget' => '<div id="%1$s" class="ctawidget %2$s">',
		'after_widget' => '</div>',
		'before_title' => '',
		'after_title' => '',
	));

}

//ウィジェット内でショートコードを使用可能に
add_filter('widget_text', 'do_shortcode');

// Remove category widget title
function remove_categories_widget_title( $cat_args ) {
    $cat_args['use_desc_for_title'] = 0;
    return $cat_args;
}
add_filter( 'widget_categories_args', 'remove_categories_widget_title' );

// カテゴリの投稿数をaタグの中に
add_filter( 'wp_list_categories', 'my_list_categories', 10, 2 );
function my_list_categories( $output, $args ) {
  $output = preg_replace('/<\/a>\s*\((\b\d{1,3}(,\d{3})*\b)\)/',' <span class="count">($1)</span></a>',$output);
  return $output;
}

// アーカイブの投稿数をaタグの中に
add_filter( 'get_archives_link', 'my_archives_link' );
function my_archives_link( $output ) {
  $output = preg_replace('/<\/a>\s*(&nbsp;)\((\d+)\)/',' ($2)</a>',$output);
  return $output;
}

// 新着記事のフォーマットを変更
class My_Recent_Posts_Widget extends WP_Widget_Recent_Posts {
	function widget($args, $instance) {
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : false;
		extract( $args );
		$title = apply_filters('widget_title', empty($instance['title']) ? __('Recent Posts') : $instance['title'], $instance, $this->id_base);
		if( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
			$number = 5;
		$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
		if( $r->have_posts() ) :
			echo $before_widget;
			if( $title ) echo $before_title . $title . $after_title; ?>
			<ul class="widget_recent_entries__ul">
				<?php while( $r->have_posts() ) : $r->the_post(); ?>
				<li class="widget_recent_entries__li">
					<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" class="widget_recent_entries__link">
						<div class="widget_recent_entries__ttl ttl<?php echo stk_post_newmark();?>"><?php the_title(); ?></div>
						<?php if ( $show_date ) {
							echo stk_archivesdate();
						}?>
					</a>
				</li>
				<?php endwhile; ?>
			</ul>
			<?php
			echo $after_widget;
		wp_reset_postdata();
		endif;
	}
}
function my_recent_widget_registration() {
  unregister_widget('WP_Widget_Recent_Posts');
  register_widget('My_Recent_Posts_Widget');
}
add_action('widgets_init', 'my_recent_widget_registration');


//画像付き新着記事ウィジェット追加
class NewEntryImageWidget extends WP_Widget {
    public function __construct() {
        parent::__construct(
			false,
			$name = '[画像付き] 最新の投稿'
        );
    }
    function widget($args, $instance) {
        extract( $args );
        $title_new = "";
        $title_new = apply_filters( 'widget_title_new', empty($instance['title_new']) ? "" : $instance['title_new'] );
        $show = apply_filters( 'widget_entry_count', empty($instance['entry_count']) ? 5 : $instance['entry_count'] );
		$show_date = isset( $instance['show_date'] ) ? $instance['show_date'] : true;
		$date = ($show_date == true) ? 'on' : 'off';
        
		$sticky_posts = isset( $instance['sticky_posts'] ) ? $instance['sticky_posts'] : true;
		$ignore_sticky_posts = ($sticky_posts == true) ? ' ignore_sticky_posts="false"' : null;

		echo $args['before_widget'];
			
			if ($title_new) {
				echo $args['before_title'] . $title_new . $args['after_title'];
			}

			// ob_start();
				echo do_shortcode( '[postlist ttl="none" class="mode_widget" '.$ignore_sticky_posts.' show="'.$show.'" date="'.$date.'"]' );
			// return ob_get_clean();

		echo $args['after_widget'];
    }
    function update($new_instance, $old_instance) {
		$instance = $old_instance;
		$instance['title_new'] = strip_tags($new_instance['title_new']);
		$instance['entry_count'] = strip_tags($new_instance['entry_count']);
		$instance['show_date'] = isset( $new_instance['show_date'] ) ? (bool) $new_instance['show_date'] : false;
		$instance['sticky_posts'] = isset( $new_instance['sticky_posts'] ) ? (bool) $new_instance['sticky_posts'] : false;
        return $instance;
    }
    function form($instance) {
        $title_new = esc_attr( empty($instance['title_new']) ? "" : $instance['title_new'] );
        $entry_count = esc_attr( empty($instance['entry_count']) ? 5 : $instance['entry_count'] );
		$show_date = isset( $instance['show_date'] ) ? (bool) $instance['show_date'] : true;
		$sticky_posts = isset( $instance['sticky_posts'] ) ? (bool) $instance['sticky_posts'] : true;
        ?>
        <p>
          <label for="<?php echo $this->get_field_id('title_new'); ?>">
          <?php _e( 'Title:' ); ?>
          </label>
          <input class="widefat" id="<?php echo $this->get_field_id('title_new'); ?>" name="<?php echo $this->get_field_name('title_new'); ?>" type="text" value="<?php echo $title_new; ?>" />
        </p>
        <p>
          <label for="<?php echo $this->get_field_id('entry_count'); ?>">
          <?php _e( 'Number of posts to show:' ); ?>
          </label>
          <input class="tiny-text" id="<?php echo $this->get_field_id('entry_count'); ?>" name="<?php echo $this->get_field_name('entry_count'); ?>" type="number" value="<?php echo $entry_count; ?>" />
        </p>
		<p>
			<input class="checkbox" type="checkbox"<?php checked( $show_date ); ?> id="<?php echo $this->get_field_id( 'show_date' ); ?>" name="<?php echo $this->get_field_name( 'show_date' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'show_date' ); ?>"><?php _e( 'Display post date?' ); ?></label>
		</p>
		<p>
			<input class="checkbox" type="checkbox"<?php checked( $sticky_posts ); ?> id="<?php echo $this->get_field_id( 'sticky_posts' ); ?>" name="<?php echo $this->get_field_name( 'sticky_posts' ); ?>" />
			<label for="<?php echo $this->get_field_id( 'sticky_posts' ); ?>"><?php _e( '固定投稿を表示' ); ?></label>
		</p>


        <?php
    }
}
add_action('widgets_init', function(){ register_widget('NewEntryImageWidget'); });



// Home Widget
if (!function_exists('parts_add_top')) {
	function parts_add_top(){
		if ( is_front_page()&&!is_admin()){
			if ( is_active_sidebar( 'home-top_mobile' ) && is_mobile() ){
				echo '<div class="homeadd_wrap homeaddtop mobile">';
				dynamic_sidebar( 'home-top_mobile' );
				echo '</div>';
			}
			if ( is_active_sidebar( 'home-top' ) && !is_mobile() ){
				echo '<div class="homeadd_wrap homeaddtop">';
				dynamic_sidebar( 'home-top' );
				echo '</div>';
			}
		}
	}
}

if (!function_exists('parts_add_bottom')) {
	function parts_add_bottom(){
		if ( is_front_page()&&!is_admin()){
			if ( is_active_sidebar( 'home-bottom_mobile' ) && is_mobile() ){
				echo '<div class="homeadd_wrap homeaddbottom mobile">';
				dynamic_sidebar( 'home-bottom_mobile' );
				echo '</div>';
			}
			if ( is_active_sidebar( 'home-bottom' ) && !is_mobile() ){
				echo '<div class="homeadd_wrap homeaddbottom">';
				dynamic_sidebar( 'home-bottom' );
				echo '</div>';
			}
		}
	}
}

// 記事ページ用Widget

if (!function_exists('widget_single_titleunder')) {
	function widget_single_titleunder(){
		if ( is_active_sidebar( 'addbanner-amp-titleunder' ) && stk_is_amp()) {
			echo '<div class="add titleunder amp_widget">';
			dynamic_sidebar( 'addbanner-amp-titleunder' );
			echo '</div>';
			return;
		}

		if ( is_active_sidebar( 'addbanner-sp-titleunder' ) && is_mobile() ) {
			echo '<div class="add titleunder">';
			dynamic_sidebar( 'addbanner-sp-titleunder' );
			echo '</div>';
		}
		
		if ( is_active_sidebar( 'addbanner-pc-titleunder' ) && !is_mobile()) {
			echo '<div class="add titleunder">';
			dynamic_sidebar( 'addbanner-pc-titleunder' );
			echo '</div>';
		}
	}
}

if (!function_exists('widget_single_contentunder')) {
	function widget_single_contentunder(){
		if ( is_active_sidebar( 'addbanner-amp-contentfoot' ) && stk_is_amp()) {
			echo '<div class="add contentunder amp_widget">';
			dynamic_sidebar( 'addbanner-amp-contentfoot' );
			echo '</div>';
			return;
		}

		if ( is_active_sidebar( 'addbanner-sp-contentfoot' ) && is_mobile() ) {
			echo '<div class="add contentunder">';
			dynamic_sidebar( 'addbanner-sp-contentfoot' );
			echo '</div>';
		}
		
		if ( is_active_sidebar( 'addbanner-pc-contentfoot' ) && !is_mobile()) {
			echo '<div class="add contentunder">';
			dynamic_sidebar( 'addbanner-pc-contentfoot' );
			echo '</div>';
		}
	}
}


function stk_widget_cta(){
    if (
		!is_active_sidebar('cta')
		|| ( is_page() && !get_option('post_options_page_cta') )
	) {
		return;
    }
	
	echo '<div class="cta-wrap">';
	dynamic_sidebar( 'cta' );
	echo '</div>';
}