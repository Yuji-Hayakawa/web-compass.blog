<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ページの紹介文">
    <meta name="format-detection" content="telephone=no, email=no, address=no">
    <meta property="og:url" content="https://web-compass.blog/">
    <meta property="og:title" content="ページのタイトル">
    <meta property="og:description" content="">
    <meta property="og:image" content="ページのサムネ画像">
    <meta property="og:type" content="website">
    <meta property="og:locale" content="ja_JP">
    <meta property="og:site_name" content="webコンパス">
    <meta name="twitter:card" content="summary">
    <meta name="twitter:site" content="@ここに自分のTwitterユーザ名">
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="canonical" href="https://web-compass.blog">
    <?php
    wp_enqueue_style('font-awesome','https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css');
    wp_head();
    ?>
  </head>
  <body class="Page">
    <?php wp_body_open(); ?>
      <div class="PageContainer" id="page-container">
        <header class="PageHeader" id="page-header">
          <div class="inner">
            <h1 class="HeaderPageId">
              <a href="/">webコンパス</a>
            </h1>
            <p>国内シェアNo1サービスの「中の人」がブログ運営に役立つ情報をわかりやすくお届け！</p>
            <nav class="HeaderGlobalNav" id="global-nav" aria-label="メインメニュー">
              <div class="HeaderGlobalNav__contents">
                <ul class="HeaderGlobalNav__list">
                  <li><a href="<?php echo home_url( '/category/wordpress/' ); ?>"><i class="fa-brands fa-wordpress"></i>WordPress</a></li>
                  <li><a href="<?php echo home_url( '/category/html/' ); ?>"><i class="fa-solid fa-code"></i>HTML</a></li>
                  <li><a href="<?php echo home_url( '/category/css/' ); ?>"><i class="fa-solid fa-palette"></i>CSS</a></li>
                  <li><a href="<?php echo home_url( '/category/javascript/' ); ?>"><i class="fa-brands fa-square-js"></i>JavaScript</a></li>
                  <li><a href="<?php echo home_url( '/category/work/' ); ?>"><i class="fa-solid fa-desktop"></i>Work</a></li>
                  <li><a href="<?php echo home_url( '/category/books/' ); ?>"><i class="fa-solid fa-book-open"></i>Books</a></li>
                </ul>
              </div>
            <!-- /.HeaderGlobalNav -->
            </nav>
          </div>
        <!-- /.PageHeader -->
        </header>