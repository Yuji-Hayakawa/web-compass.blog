<?php

if (!defined('ABSPATH')) {
    exit;
}


add_action('registered_post_type', 'stk_wp_block_menu_display', 10, 2);
function stk_wp_block_menu_display($type, $args)
{
    if ('wp_block' !== $type) {
        return;
    }
    $args->show_in_menu = true;
    $args->_builtin = false;
    $args->labels->name = esc_html('再利用ブロック（ブログパーツ）');
    $args->labels->menu_name = esc_html('再利用ブロック（ブログパーツ）');
    $args->menu_icon = 'dashicons-star-filled';
    $args->menu_position = 58;
}



// 呼び出し用のショートコード
function stk_blogparts_shortcode_fanc($attr)
{
    $id = isset($attr['id']) ? esc_attr($attr['id']) : '';
    $warning_message = is_user_logged_in() ? '<div><span class="span-stk-label-gray">ブログパーツを取得できませんでした。（管理者のみに表示）</span></div>' : null;

    if ($id) {
        if (get_post_type($id) !== 'wp_block') { // 再利用blockじゃない場合は無効
            return $warning_message;
        } else {
            $reuse_block = get_post($id);
            $reuse_block_content = apply_filters('the_content', $reuse_block->post_content);
            return $reuse_block_content;
        }
    } else {
        return $warning_message;
    }
}
add_shortcode('blogparts', 'stk_blogparts_shortcode_fanc');



// カスタム投稿にオリジナルの項目を追加

function stk_blogparts_screen_add_column($columns)
{
    $columns = array(
        'cb' => '<input type="checkbox" />',
        'title' => 'タイトル',
        'stk-blogparts-shortcode' => esc_html('呼び出し用ショートコード'),
        'stk-blogparts-id' => esc_html('ID'),
        'stk-blogparts-conversion' => esc_html('ブロックパターン変換'),
        'date' => '日時',
    );
    return $columns;
}
add_filter('manage_wp_block_posts_columns', 'stk_blogparts_screen_add_column');

function stk_blogparts_screen_fill_column($column, $ID)
{
    global $post;
    switch ($column) {

        case 'stk-blogparts-shortcode':

            $shortcode = '[blogparts id=&quot;' . $ID . '&quot;]';

            echo '<p><input type="text" value="' . $shortcode . '"></p>';

            break;

        case 'stk-blogparts-id':


            echo '<p><input type="text" value="' . $ID . '" style="width:6em;"></p>';

            break;

        case 'stk-blogparts-conversion':

            if (true == get_post_meta($ID, 'transformed_into_pattern', true)) {
                echo '<p>' . esc_html('ブロックパターンに変換しました。') . '</p>';
                echo '<p class="reblex-delete-pattern"><a href="' . admin_url('edit.php?post_type=wp_block&delete_pattern=' . $ID) . '">' . esc_html('ブロックパターンから取り除く') . '</a></p>';
            } else {
                echo '<a class="button button-primary" href="' . admin_url('edit.php?post_type=wp_block&create_pattern=' . $ID) . '">' . esc_html('ブロックパターンに変換') . '</a>';
            }

            break;

        default:
            break;
    }
}
add_action('manage_wp_block_posts_custom_column', 'stk_blogparts_screen_fill_column', 1000, 2);

// ブロックパターンに変換するボタン
function stk_blogparts_screen_block_pattern_registration()
{
    $screen = get_current_screen();

    if ('wp_block' !== $screen->post_type) {
        return;
    }

    if (isset($_GET['create_pattern']) && intval($_GET['create_pattern']) > 0) :
        update_post_meta(intval($_GET['create_pattern']), 'transformed_into_pattern', true);

    // echo '<div class="notice notice-success is-dismissible">
    // 	<p>ブロックパターンに変換しました。</p>
    // </div>';

    endif;

    if (isset($_GET['delete_pattern']) && intval($_GET['delete_pattern']) > 0) :
        update_post_meta(intval($_GET['delete_pattern']), 'transformed_into_pattern', false);

    // echo '<div class="notice notice-warning is-dismissible">
    //     <p>削除しました。</p>
    // </div>';
    endif;
}
add_action('admin_notices', 'stk_blogparts_screen_block_pattern_registration');


// パターン
function stk_blogparts_register_block_patterns()
{
    global $pagenow;

    // var_dump($pagenow);

    if (!function_exists('register_block_type') || !function_exists('register_block_pattern')) {
        return;
    }

    if ('media-new.php' === $pagenow || 'async-upload.php' === $pagenow) {
        return;
    }

    register_block_pattern_category(
        'stk_my_pattern',
        array(
            'label' => 'STORK: Myブロックパターン',
        )
    );

    $args = array(
        'post_type'      => 'wp_block',
        'posts_per_page' => -1,
        'post_status'    => 'publish',
        'meta_query'     => array(
            array(
                'key'   => 'transformed_into_pattern',
                'value' => 1,
            )
        )
    );
    $query_patterns = new WP_Query($args);
    if ($query_patterns->have_posts()) {
        while ($query_patterns->have_posts()) {
            $query_patterns->the_post();

            $pattern_id      = get_the_ID();
            $pattern_title   = get_the_title();
            $pattern_slug    = get_post_field('post_name', $pattern_id);
            $pattern_content = get_the_content();

            register_block_pattern(
                'stkblogparts/' . $pattern_slug,
                array(
                    'title'      => $pattern_title,
                    'content'    => $pattern_content,
                    'keywords'   => array(
                        $pattern_id,
                        $pattern_slug
                    ),
                    'categories' => array('stk_my_pattern'),
                )
            );
        }
    }
    wp_reset_postdata();
}
add_action('admin_init', 'stk_blogparts_register_block_patterns');





// カテゴリ編集ページに項目を追加
function stk_category_form_fields_function($term)
{

    $meta = get_term_meta($term->term_id);
    $term_name = $term->taxonomy === 'category' ? __('カテゴリー') : __('タグ');

    $cat_blogpart_id = isset($meta['cat_blogpart_id'][0]) ? esc_html($meta['cat_blogpart_id'][0]) : null;
    $cat_blogpart_select = isset($meta['cat_blogpart_select'][0]) ? esc_html($meta['cat_blogpart_select'][0]) : null;

    if (!is_numeric($cat_blogpart_id)) {
        $cat_blogpart_id = '';
    }
    $cat_blogpart_nextpage_display = isset($meta['cat_blogpart_nextpage_display'][0]) ? 'checked' : '';


    $cat_title_replace = isset($meta['cat_title_replace'][0]) ? esc_html($meta['cat_title_replace'][0]) : null;

    $cat_hidden_title = isset($meta['cat_title_hidden'][0]) ? 'checked' : '';
    $cat_base_archives = isset($meta['cat_base_archives'][0]) ? 'checked' : '';

    // ブログパーツのquery
    $blogparts_args = [
        'post_type' => 'wp_block',
        'posts_per_page' => -1,
    ];
    $blogparts_query = new WP_Query($blogparts_args);
    $blogpartslists = '';
    if ($blogparts_query->have_posts()) {
        while ($blogparts_query->have_posts()) : $blogparts_query->the_post();
            $selected = $cat_blogpart_id == get_the_id() ? ' selected' : '';
            $blogpartslists .= '<option value="' . get_the_id() . '"' . $selected . '>' . get_the_title() . '(' . get_the_id() . ')</option>';
        endwhile;
    }

    $cat_blogpart_edit_link = $cat_blogpart_id ? '<a href="' . get_edit_post_link($cat_blogpart_id) . '" target="_blank">編集<span class="dashicons dashicons-external"></span></a>' : '';
    $cat_blogpart_reset_btn = $cat_blogpart_id ? '<button type="button" onclick="stkResetFrom()" style="font-size: 80%; margin-right: 1em;">リセットする</button>' : '';

    echo '<tr><th colspan="2"><hr></th></tr>';

    echo '<tr class="form-field">
            <th>説明をブログパーツで置き換え</th>
            <td>
                <input type="text" name="cat_blogpart_id" id="cat_blogpart_id" size="5" style="width:6em;" value="' . $cat_blogpart_id . '" /> OR 

                <select name="cat_blogpart_id" id="stk-blogpartselect" style="width:18em;">
                    <option value="">--ブログパーツを選択--</option>
                    ' . $blogpartslists . '
                </select>
                ' . $cat_blogpart_reset_btn
        . $cat_blogpart_edit_link . '
                <script>
                    function stkResetFrom() {
                        document.getElementById("cat_blogpart_id").value = "";
                        document.getElementById("stk-blogpartselect").value = "";
                    }
                </script>

                <p class="description">「説明」を任意の「再利用ブロック（ブログパーツ）」で置き換えることができます。
                <a href="./edit.php?post_type=wp_block" target="_blank">ブログパーツ一覧をみる<span class="dashicons dashicons-external"></a></span></p>

                <div style="padding: 25px 0">
                    <label>
                        <input id="cat_blogpart_nextpage_display" name="cat_blogpart_nextpage_display" type="checkbox" ' . $cat_blogpart_nextpage_display . '>
                        <span class="widefat">2ページ目以降もブログパーツを表示する</span>
                    </label>
                </div>
            </td>
        </tr>';
    echo '<tr class="form-field">
        <th>' . $term_name . '名の置き換え（H1領域）</th>
        <td>
            <input type="text" name="cat_title_replace" id="cat_title_replace" size="5" value="' . $cat_title_replace . '" />
            <p class="description">サイト上に表示される' . $term_name . 'の名前を置き換えることができます。<br>
            ※下の表示設定で「タイトルを表示しない」にチェックを入れている場合は表示されません。</p>
        </td>
    </tr>';
    echo '<tr class="form-field form-required term-name-wrap">
        <th scope="row">高度な設定</th>
        <td>
            <div style="padding-bottom: 25px;">
                <label>
                    <input id="cat_title_hidden" name="cat_title_hidden" type="checkbox" ' . $cat_hidden_title . '>
                    <span class="widefat">' . $term_name . 'タイトルを表示しない</span>
                </label>
            </div>
            <div style="padding-bottom: 25px;">
                <label>
                    <input id="cat_base_archives" name="cat_base_archives" type="checkbox" ' . $cat_base_archives . '>
                    <span class="widefat">デフォルトの記事一覧を表示しない</span>
                </label>
            </div>
        </td>
    </tr>';
};
add_action('category_edit_form_fields', 'stk_category_form_fields_function');
add_action('post_tag_edit_form_fields', 'stk_category_form_fields_function');

// SAVE用
function stk_save_category()
{
    if (!isset($_POST['tag_ID'])) {
        return;
    }
    update_term_meta($_POST['tag_ID'], 'cat_blogpart_id', $_POST['cat_blogpart_id']);
    update_term_meta($_POST['tag_ID'], 'cat_blogpart_select', $_POST['cat_blogpart_select']);
    update_term_meta($_POST['tag_ID'], 'cat_blogpart_nextpage_display', $_POST['cat_blogpart_nextpage_display']);
    update_term_meta($_POST['tag_ID'], 'cat_title_replace', $_POST['cat_title_replace']);
    update_term_meta($_POST['tag_ID'], 'cat_title_hidden', $_POST['cat_title_hidden']);
    update_term_meta($_POST['tag_ID'], 'cat_base_archives', $_POST['cat_base_archives']);
};
add_action('edited_term', 'stk_save_category');
