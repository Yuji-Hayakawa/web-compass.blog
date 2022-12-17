<?php

$localize_arr = array(
  'endpoint' => admin_url('admin-ajax.php'),
  'getStkBalloonMyset' => (get_option( 'stk_balloon_myset' )) ? get_option( 'stk_balloon_myset' ) : [],
  'getStkBalloonMyset2' => 'get_stk_balloon_myset',
  'addStkBalloonMyset' => 'add_stk_balloon_myset',
  'deleteStkBalloonMyset' => 'delete_stk_balloon_myset',
  'nonce' => wp_create_nonce('stk_balloon_myset'),
);

// stkLocalized にローカライズ
wp_localize_script(
  'stk_block_scripts',// 対象のハンドル
  'stkLocalized', // 配列で渡す
  $localize_arr
);

// ajax
add_action( 'wp_ajax_get_stk_balloon_myset', 'get_stk_balloon_myset' );
add_action( 'wp_ajax_add_stk_balloon_myset', 'add_stk_balloon_myset' );
add_action( 'wp_ajax_delete_stk_balloon_myset', 'delete_stk_balloon_myset' );

/**
 * ふきだしマイセットの取得
 */
function get_stk_balloon_myset() {
	if( isset( $_REQUEST['nonce'] ) && wp_verify_nonce( $_REQUEST['nonce'], 'stk_balloon_myset') ) {
		echo json_encode( maybe_unserialize( get_option( 'stk_balloon_myset' ) ) );
	}

	echo [];
	
	die();
}

/**
 * ふきだしマイセットの登録
 */
function add_stk_balloon_myset() {
	if( isset( $_REQUEST['nonce'] ) && wp_verify_nonce( $_REQUEST['nonce'], 'stk_balloon_myset') ) {
		$conf = get_option( 'stk_balloon_myset' );

	// DB戻り値がない場合は空の配列で初期化する
	if (!is_array($conf)) {
		$conf = [];
	}

    // 不正に11件以上の登録をしようとリクエストされた場合は、見た目のうえでは正常終了するが、実際は登録されていない
    if (count($conf) < 10) {
      $conf[] = stripslashes( $_REQUEST['data'] );
		  update_option( 'stk_balloon_myset', $conf );
    }
	}
	
	die();
}

/**
 * ふきだしマイセットの削除
 */
function delete_stk_balloon_myset() {
	if( isset( $_REQUEST['nonce'] ) && wp_verify_nonce( $_REQUEST['nonce'], 'stk_balloon_myset') ) {
		$conf = get_option( 'stk_balloon_myset' );
		$index = $_REQUEST['id'];
		array_splice($conf, $index, 1);
		update_option( 'stk_balloon_myset', $conf );
	}
	
	die();
}
