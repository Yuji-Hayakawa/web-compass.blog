<?php

if (!defined('ABSPATH')) {
    exit;
}

// top header image setting
function opencage_toppage_theme_customizer($wp_customize)
{
    $wp_customize->add_panel(
        'panel_toppege_settings',
        array(
            'title' => 'トップページ設定',
            'priority' => 34,
        )
    );

    // パネル

    $wp_customize->add_section('stk_toppage_section', array(
        'title'       => 'ヘッダーアイキャッチの設定',
        'panel' => 'panel_toppege_settings',
        'description' => 'トップページの「ヘッダーアイキャッチ」の設定ができます。',
    ));

    $wp_customize->add_section('stk_toppageslider_section', array(
        'title'       => 'スライダー設定',
        'panel' => 'panel_toppege_settings',
        'description' => 'トップページに表示するピックアップスライドショーの設定が可能です。→<a href="https://www.stork19.com/pickup-slider/" target="_blank">使い方</a>',
    ));

    $wp_customize->add_section('stk_pickupcontent_section', array(
        'title'       => 'ピックアップコンテンツ設定',
        'panel' => 'panel_toppege_settings',
        'description' => 'ヘッダー下のおすすめリンクを設置することができます。4つまで設定可能。→<a href="https://www.stork19.com/pickup-content/" target="_blank">使い方</a>',
    ));

    // ---------------------------------------------
    // セレクターショートカット
    $wp_customize->selective_refresh->add_partial(
        'opencage_toppage_header_display',
        array(
            'selector' => '.stk_custom_header__text',
        )
    );
    $wp_customize->selective_refresh->add_partial(
        'stk_toppageslider_display',
        array(
            'selector' => '#top_carousel',
        )
    );
    $wp_customize->selective_refresh->add_partial(
        'stk_pickupcontent_display',
        array(
            'selector' => '#main-pickup_content',
        )
    );



    // ヘッダーアイキャッチ


    $wp_customize->add_setting('opencage_toppage_header_display', array(
        'type'  => 'option',
        'default' => 'on',
    ));
    $wp_customize->add_control('opencage_toppage_header_display', array(
        'settings' => 'opencage_toppage_header_display',
        'label' => 'ヘッダーアイキャッチの表示設定',
        'description' => '<span style="font-size:11px;">トップページヘッダーの表示設定。</span>',
        'section' => 'stk_toppage_section',
        'type' => 'radio',
        'choices' => array(
            'on' => '表示する',
            'off' => '表示しない',
        ),
    ));

    $wp_customize->add_setting(
        'opencage_toppage_headerbg'
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'opencage_toppage_headerbg',
            array(
                'settings'   => 'opencage_toppage_headerbg',
                'label'        => '画像（PC用）',
                'section'    => 'stk_toppage_section',
            )
        )
    );

    $wp_customize->add_setting(
        'opencage_toppage_headerbg_movie'
    );
    $wp_customize->add_control(
        new WP_Customize_Upload_Control(
            $wp_customize,
            'opencage_toppage_headerbg_movie',
            array(
                'settings' => 'opencage_toppage_headerbg_movie',
                'label'    => '動画背景（PC用）',
                'description' => '<span style="font-size:11px;">動画ファイルのみ利用可能。画像と動画を両方指定した場合、動画が優先されます。</span>',
                'section'  => 'stk_toppage_section',
            )
        )
    );


    $wp_customize->add_setting(
        'opencage_toppage_headerbgsp'
    );
    $wp_customize->add_control(new WP_Customize_Image_Control(
        $wp_customize,
        'opencage_toppage_headerbgsp',
        array(
            'settings'   => 'opencage_toppage_headerbgsp',
            'label'        => '画像（スマートフォン用）',
            'description' => '<span style="font-size:11px;">※設定しなかった場合は上の項目で設定した画像or動画が表示されます。</span>',
            'section'    => 'stk_toppage_section',
        )
    ));

    $wp_customize->add_setting(
        'opencage_toppage_headerbg_movie_sp'
    );
    $wp_customize->add_control(
        new WP_Customize_Upload_Control(
            $wp_customize,
            'opencage_toppage_headerbg_movie_sp',
            array(
                'settings' => 'opencage_toppage_headerbg_movie_sp',
                'label'    => '動画背景（スマートフォン用）',
                'description' => '<span style="font-size:11px;">動画ファイルのみ利用可能。</span>',
                'section'  => 'stk_toppage_section',
            )
        )
    );

    $wp_customize->add_setting('stk_toppage_headerbg_movie__loop');
    $wp_customize->add_control('stk_toppage_headerbg_movie__loop', array(
        'settings' => 'stk_toppage_headerbg_movie__loop',
        'label' => '動画を繰り返し再生しない',
        'section' => 'stk_toppage_section',
        'type' => 'checkbox',
    ));


    $wp_customize->add_setting('opencage_toppage_headeregtext', array(
        'type'  => 'option',
    ));
    $wp_customize->add_control('opencage_toppage_headeregtext', array(
        'settings' => 'opencage_toppage_headeregtext',
        'label' => '英語表示テキスト（大テキスト）',
        'description' => '<span style="font-size:11px;">推奨はローマ字です。日本語でも表示は可能ですがフォントの見た目が変わります。</span>',
        'section' => 'stk_toppage_section',
    ));
    $wp_customize->add_setting('opencage_toppage_headerjptext', array(
        'type'  => 'option',
    ));
    $wp_customize->add_control('opencage_toppage_headerjptext', array(
        'settings' => 'opencage_toppage_headerjptext',
        'label' => '日本語表示テキスト（小テキスト）',
        'description' => '<span style="font-size:11px;">小さな補足テキストが入ります。</span>',
        'section' => 'stk_toppage_section',
        'type' => 'textarea',
    ));
    $wp_customize->add_setting('opencage_toppage_textcolor', array(
        'default' => '#0ea3c9',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'opencage_toppage_textcolor',
            array(
                'settings' => 'opencage_toppage_textcolor',
                'label' => 'テキストカラー',
                'section' => 'stk_toppage_section',
            )
        )
    );

    $wp_customize->add_setting('opencage_toppage_headder_overlay', array(
        'default' => '#000000',
    ));
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'opencage_toppage_headder_overlay',
            array(
                'settings' => 'opencage_toppage_headder_overlay',
                'label' => 'オーバーレイカラー',
                'description' => '<span style="font-size:11px;">画像の上に薄く色をかぶせて文字を見やすくできます。（テキストを表示させている場合にのみ有効）</span>',
                'section' => 'stk_toppage_section',
            )
        )
    );

    $wp_customize->add_setting('opencage_toppage_headder_overlay_design', array(
        'default' => 'color',
    ));
    $wp_customize->add_control('opencage_toppage_headder_overlay_design', array(
        'settings' => 'opencage_toppage_headder_overlay_design',
        'label' => 'オーバーレイのデザイン',
        'description' => '<span style="font-size:11px;">オーバーレイのデザインを変更できます。</span>',
        'section' => 'stk_toppage_section',
        'type' => 'radio',
        'choices' => array(
            'color' => 'ベタ塗り',
            'stripe' => 'ストライプ',
            'dot' => 'ドット',
        ),
    ));

    $wp_customize->add_setting('opencage_toppage_headder_overlay_opacity', array(
        'default' => '5',
    ));
    $wp_customize->add_control('opencage_toppage_headder_overlay_opacity', array(
        'settings' => 'opencage_toppage_headder_overlay_opacity',
        'label' => 'オーバーレイの透明度',
        'section' => 'stk_toppage_section',
        'type' => 'range',
    ));

    $wp_customize->add_setting('opencage_toppage_textlayout', array(
        'type'  => 'option',
        'default' => 'textcenter',
    ));
    $wp_customize->add_control('opencage_toppage_textlayout', array(
        'settings' => 'opencage_toppage_textlayout',
        'label' => 'テキストレイアウト',
        'description' => '<span style="font-size:11px;">PC・タブレットの場合にテキストの配置位置を変更します。※スマートフォンでは全て中央よせとなります。</span>',
        'section' => 'stk_toppage_section',
        'type' => 'radio',
        'choices' => array(
            'textcenter' => '中央よせ',
            'textleft' => '左よせ',
            'textright' => '右よせ',
        ),
    ));

    $wp_customize->add_setting('opencage_toppage_header_minheight', array(
        'default' => '50',
        'type'  => 'option',
    ));
    $wp_customize->add_control('opencage_toppage_header_minheight', array(
        'settings' => 'opencage_toppage_header_minheight',
        'label' => 'アイキャッチの最小の高さ',
        'description' => '<span style="font-size:11px;">デバイス画面高に対しての最低限の高さを指定できます。（デフォルトは50）</span>',
        'section' => 'stk_toppage_section',
        'type' => 'number',
    ));

    $wp_customize->add_setting('opencage_toppage_header_minheight_sp', array(
        'default' => '60',
        'type'  => 'option',
    ));
    $wp_customize->add_control('opencage_toppage_header_minheight_sp', array(
        'settings' => 'opencage_toppage_header_minheight_sp',
        'label' => 'アイキャッチの最小の高さ（スマートフォン用）',
        'description' => '<span style="font-size:11px;">スマートフォンの画面高に対しての最低限の高さを指定できます。（デフォルトは60）</span>',
        'section' => 'stk_toppage_section',
        'type' => 'number',
    ));

    $wp_customize->add_setting('opencage_toppage_headerlink', array(
        'type'  => 'option',
    ));
    $wp_customize->add_control('opencage_toppage_headerlink', array(
        'settings' => 'opencage_toppage_headerlink',
        'label' => 'ボタンURL',
        'description' => '<span style="font-size:11px;"><span style="color:red;">※リンクさせる場合は必須</span> リンクさせたいページやサイトのURLを入力</span>',
        'section' => 'stk_toppage_section',
    ));
    $wp_customize->add_setting('opencage_toppage_headerlinktext', array(
        'type'  => 'option',
    ));
    $wp_customize->add_control('opencage_toppage_headerlinktext', array(
        'settings' => 'opencage_toppage_headerlinktext',
        'label' => 'ボタンテキスト',
        'description' => '<span style="font-size:11px;">ここに入力した文字で置き換えます。※上の項目の「ボタンURL」を設定していない場合は表示されません。</span>',
        'section' => 'stk_toppage_section',
    ));
    $wp_customize->add_setting('opencage_toppage_btncolor', array(
        'default' => '#ffffff',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'opencage_toppage_btncolor', array(
        'settings' => 'opencage_toppage_btncolor',
        'label' => 'ボタンテキストカラー',
        'section' => 'stk_toppage_section',
    )));
    $wp_customize->add_setting('opencage_toppage_btnbgcolor', array(
        'default' => '#ed7171',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'opencage_toppage_btnbgcolor', array(
        'settings' => 'opencage_toppage_btnbgcolor',
        'label' => 'ボタン背景カラー1',
        'section' => 'stk_toppage_section',
    )));
    $wp_customize->add_setting('opencage_toppage_btnbgcolor2', array(
        'default' => '#ffbaba',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'opencage_toppage_btnbgcolor2', array(
        'settings' => 'opencage_toppage_btnbgcolor2',
        'label' => 'ボタン背景カラー2',
        'description' => '<span style="font-size:11px;">ボタン背景カラー2を設定することでグラデーションにすることが可能です。ボタン背景カラー1と同じ色にすれば単色にできます。</span>',
        'section' => 'stk_toppage_section',
    )));

    $wp_customize->add_setting('opencage_toppage_btnshiny', array(
        'type'  => 'option',
        'default' => 'normal',
    ));
    $wp_customize->add_control('opencage_toppage_btnshiny', array(
        'settings' => 'opencage_toppage_btnshiny',
        'label' => 'ボタンを光らせる',
        'description' => '<span style="font-size:11px;">白背景のボタンの場合、光の効果がわからないので色付きのボタンに適用してください。</span>',
        'section' => 'stk_toppage_section',
        'type' => 'radio',
        'choices' => array(
            'normal' => 'ノーマル',
            'stk-shiny-button' => '光るボタン',
        ),
    ));

    $wp_customize->add_setting('stk_homeheader-headeroverlay', array(
        'type'  => 'option',
        'default' => 'off',
    ));
    $wp_customize->add_control('stk_homeheader-headeroverlay', array(
        'settings' => 'stk_homeheader-headeroverlay',
        'label' => 'ヘッダー背景を透過する',
        'description' => '<span style="font-size:11px;">ヘッダーアイキャッチを設定している場合で、トップページのみヘッダーの背景を透明にできます。</span>',
        'section' => 'stk_toppage_section',
        'type' => 'radio',
        'choices' => array(
            'off' => '透過しない',
            'on' => '透過する',
            'on_wide' => '透過する（幅広）',
        ),
    ));

    $wp_customize->add_setting(
        'stk_homeheader-headeroverlay__textcolor',
        array(
            'default' => "",
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'stk_homeheader-headeroverlay__textcolor',
            array(
                'settings' => 'stk_homeheader-headeroverlay__textcolor',
                'label' => '背景を透明にしている場合の文字色',
                'description' => '<span style="font-size:11px;">透過ヘッダーの文字色が見えづらい場合に変更可能です。（デフォルトはヘッダーアイキャッチのテキストカラー）</span>',
                'section' => 'stk_toppage_section',
            )
        )
    );

    $wp_customize->add_setting(
        'stk_homeheader-headeroverlay__logoimg'
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'stk_homeheader-headeroverlay__logoimg',
            array(
                'settings'   => 'stk_homeheader-headeroverlay__logoimg',
                'label'        => '背景を透明にしている場合のロゴ画像',
                'description' => '<span style="font-size:11px;">透過ヘッダーのロゴ画像色が見えづらい場合に変更可能です。※ ロゴ画像が設定されている場合のみ使用可能</span>',
                'section'    => 'stk_toppage_section',
            )
        )
    );

    $wp_customize->add_setting('stk_homeheader-headeroverlay__infoposition', array(
        'type'  => 'option',
        'default' => 'off',
    ));
    $wp_customize->add_control('stk_homeheader-headeroverlay__infoposition', array(
        'settings' => 'stk_homeheader-headeroverlay__infoposition',
        'label' => 'お知らせテキストの表示位置',
        'description' => '<span style="font-size:11px;">ヘッダーアイキャッチを設定していない場合は、「表示しない」のままにしておくことをおすすめします。</span>',
        'section' => 'stk_toppage_section',
        'type' => 'radio',
        'choices' => array(
            'off' => '表示しない',
            'on_under' => '表示（ヘッダーアイキャッチ下）',
        ),
    ));



    // slider


    $wp_customize->add_setting('stk_toppageslider_display', array(
        'type'  => 'option',
        'default' => 'off',
    ));
    $wp_customize->add_control('stk_toppageslider_display', array(
        'settings' => 'stk_toppageslider_display',
        'label' => 'スライダーの表示設定',
        'description' => '<span style="font-size:11px;">トップページのおすすめ記事スライドの表示設定。</span>',
        'section' => 'stk_toppageslider_section',
        'type' => 'radio',
        'choices' => array(
            'on' => '表示する',
            'off' => '表示しない',
        ),
    ));

    $wp_customize->add_setting('stk_toppageslider_postsnumber', array(
        'type'  => 'option',
        'default' => '10',
    ));
    $wp_customize->add_control('stk_toppageslider_postsnumber', array(
        'label' => 'スライダーの最大表示数',
        'description' => '<span style="font-size:11px;">最大何個までのスライドを表示させるかの設定が可能です。（※スライドが動かなくなるので最低でも5以上の数を指定してください。）</span>',
        'settings' => 'stk_toppageslider_postsnumber',
        'section' => 'stk_toppageslider_section',
        'type' => 'number',
    ));

    $wp_customize->add_setting('opencage_color_slidertext', array(
        'default' => '#444444',
    ));
    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'opencage_color_slidertext',
        array(
            'label' => __('スライダーのテキスト色', 'opencage'),
            'description' => '<span style="font-size:11px;">スライダーのテキストカラーを変更できます</span>',
            'settings' => 'opencage_color_slidertext',
            'section' => 'stk_toppageslider_section',
        )
    ));

    $wp_customize->add_setting('stk_toppageslider_size', array(
        'type'  => 'option',
        'default' => 'default',
    ));
    $wp_customize->add_control('stk_toppageslider_size', array(
        'settings' => 'stk_toppageslider_size',
        'label' => 'スライダーの横幅サイズ',
        'description' => '<span style="font-size:11px;">スライダーを画面幅いっぱいに表示するかどうかを選択。</span>',
        'section' => 'stk_toppageslider_section',
        'type' => 'radio',
        'choices' => array(
            'default' => 'デフォルト',
            'large' => 'ラージ',
        ),
    ));


    // ピックアップコンテンツ

    $wp_customize->add_setting('stk_pickupcontent_display', array(
        'type'  => 'option',
        'default' => 'on',
    ));
    $wp_customize->add_control('stk_pickupcontent_display', array(
        'settings' => 'stk_pickupcontent_display',
        'label' => 'ピックアップコンテンツの表示設定',
        'description' => '<span style="font-size:11px;">ピックアップコンテンツを設定している場合で、ここで表示非表示を設定できます。</span>',
        'section' => 'stk_pickupcontent_section',
        'type' => 'radio',
        'choices' => array(
            'on' => '表示する（全ページ）',
            'on_top' => '表示する（トップページのみ）',
            'off' => '表示しない',
        ),
    ));

    $wp_customize->add_setting('stk_pickupcontent_1_img');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'stk_pickupcontent_1_img', array(
        'settings'   => 'stk_pickupcontent_1_img',
        'label'        => '[バナー01] 画像',
        'section'    => 'stk_pickupcontent_section',
    )));

    $wp_customize->add_setting('stk_pickupcontent_1_link', array(
        'type'  => 'option',
    ));
    $wp_customize->add_control('stk_pickupcontent_1_link', array(
        'label' => '[バナー01] リンク',
        'settings' => 'stk_pickupcontent_1_link',
        'section' => 'stk_pickupcontent_section',
    ));

    $wp_customize->add_setting('stk_pickupcontent_1_text', array(
        'type'  => 'option',
    ));
    $wp_customize->add_control('stk_pickupcontent_1_text', array(
        'settings' => 'stk_pickupcontent_1_text',
        'label' => '[バナー01] テキスト',
        'section' => 'stk_pickupcontent_section',
    ));
    $wp_customize->add_setting('stk_pickupcontent_1_linktarget', array(
        'type'  => 'option',
    ));
    $wp_customize->add_control('stk_pickupcontent_1_linktarget', array(
        'settings' => 'stk_pickupcontent_1_linktarget',
        'label' => 'リンクを別タブで開く（_target設定）',
        'description' => '<span style="font-size:11px;"><br></span>',
        'section' => 'stk_pickupcontent_section',
        'type' => 'checkbox',
    ));



    $wp_customize->add_setting('stk_pickupcontent_2_img');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'stk_pickupcontent_2_img', array(
        'settings'   => 'stk_pickupcontent_2_img',
        'label'        => '[バナー02] 画像',
        'section'    => 'stk_pickupcontent_section',
    )));

    $wp_customize->add_setting('stk_pickupcontent_2_link', array(
        'type'  => 'option',
    ));
    $wp_customize->add_control('stk_pickupcontent_2_link', array(
        'label' => '[バナー02] リンク',
        'settings' => 'stk_pickupcontent_2_link',
        'section' => 'stk_pickupcontent_section',
    ));

    $wp_customize->add_setting('stk_pickupcontent_2_text', array(
        'type'  => 'option',
    ));
    $wp_customize->add_control('stk_pickupcontent_2_text', array(
        'settings' => 'stk_pickupcontent_2_text',
        'label' => '[バナー02] テキスト',
        'section' => 'stk_pickupcontent_section',
    ));
    $wp_customize->add_setting('stk_pickupcontent_2_linktarget', array(
        'type'  => 'option',
    ));
    $wp_customize->add_control('stk_pickupcontent_2_linktarget', array(
        'settings' => 'stk_pickupcontent_2_linktarget',
        'label' => 'リンクを別タブで開く（_target設定）',
        'description' => '<span style="font-size:11px;"><br></span>',
        'section' => 'stk_pickupcontent_section',
        'type' => 'checkbox',
    ));


    $wp_customize->add_setting('stk_pickupcontent_3_img');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'stk_pickupcontent_3_img', array(
        'settings'   => 'stk_pickupcontent_3_img',
        'label'        => '[バナー03] 画像',
        'section'    => 'stk_pickupcontent_section',
    )));

    $wp_customize->add_setting('stk_pickupcontent_3_link', array(
        'type'  => 'option',
    ));
    $wp_customize->add_control('stk_pickupcontent_3_link', array(
        'label' => '[バナー03] リンク',
        'settings' => 'stk_pickupcontent_3_link',
        'section' => 'stk_pickupcontent_section',
    ));

    $wp_customize->add_setting('stk_pickupcontent_3_text', array(
        'type'  => 'option',
    ));
    $wp_customize->add_control('stk_pickupcontent_3_text', array(
        'settings' => 'stk_pickupcontent_3_text',
        'label' => '[バナー03] テキスト',
        'section' => 'stk_pickupcontent_section',
    ));
    $wp_customize->add_setting('stk_pickupcontent_3_linktarget', array(
        'type'  => 'option',
    ));
    $wp_customize->add_control('stk_pickupcontent_3_linktarget', array(
        'settings' => 'stk_pickupcontent_3_linktarget',
        'label' => 'リンクを別タブで開く（_target設定）',
        'description' => '<span style="font-size:11px;"><br></span>',
        'section' => 'stk_pickupcontent_section',
        'type' => 'checkbox',
    ));


    $wp_customize->add_setting('stk_pickupcontent_4_img');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'stk_pickupcontent_4_img', array(
        'settings'   => 'stk_pickupcontent_4_img',
        'label'        => '[バナー04] 画像',
        'section'    => 'stk_pickupcontent_section',
    )));

    $wp_customize->add_setting('stk_pickupcontent_4_link', array(
        'type'  => 'option',
    ));
    $wp_customize->add_control('stk_pickupcontent_4_link', array(
        'label' => '[バナー04] リンク',
        'settings' => 'stk_pickupcontent_4_link',
        'section' => 'stk_pickupcontent_section',
    ));

    $wp_customize->add_setting('stk_pickupcontent_4_text', array(
        'type'  => 'option',
    ));
    $wp_customize->add_control('stk_pickupcontent_4_text', array(
        'settings' => 'stk_pickupcontent_4_text',
        'label' => '[バナー04] テキスト',
        'section' => 'stk_pickupcontent_section',
    ));
    $wp_customize->add_setting('stk_pickupcontent_4_linktarget', array(
        'type'  => 'option',
    ));
    $wp_customize->add_control('stk_pickupcontent_4_linktarget', array(
        'settings' => 'stk_pickupcontent_4_linktarget',
        'label' => 'リンクを別タブで開く（_target設定）',
        'description' => '<span style="font-size:11px;"><br></span>',
        'section' => 'stk_pickupcontent_section',
        'type' => 'checkbox',
    ));
}
add_action('customize_register', 'opencage_toppage_theme_customizer');
