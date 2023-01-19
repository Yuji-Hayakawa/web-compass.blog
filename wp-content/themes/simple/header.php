<!DOCTYPE html>
<html lang="ja">
  <?php get_template_part( 'head' ); ?>
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