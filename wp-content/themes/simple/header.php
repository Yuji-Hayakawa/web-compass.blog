<!DOCTYPE html>
<html lang="ja">
  <?php get_template_part( 'head' ); ?>
  <body class="Page">
    <?php wp_body_open(); ?>
      <div class="PageContainer" id="page-container">
        <header class="PageHeader" id="page-header">
          <div class="inner">
            <?php if ( is_home() && !is_paged() ): ?>
              <h1 class="HeaderPageId">
                <a href="https://web-compass.blog/">webコンパス</a>
              </h1>
            <?php else: ?>
              <div class="HeaderPageId">
                <a href="https://web-compass.blog/">webコンパス</a>
              </div>
            <?php endif; ?>
            <p class="PageHeader__catchcopy">元文学部出身の「現役コーダー」がWeb制作に役立つ情報をわかりやすく解説！</p>
            <nav class="HeaderGlobalNav" id="global-nav" aria-label="メインメニュー">
              <div class="HeaderGlobalNav__contents">
                <ul class="HeaderGlobalNav__list">
                  <li><a href="/category/wordpress/"><i class="fa-brands fa-wordpress"></i>WordPress</a></li>
                  <li><a href="/category/html/"><i class="fa-solid fa-code"></i>HTML</a></li>
                  <li><a href="/category/css/"><i class="fa-solid fa-palette"></i>CSS</a></li>
                  <li><a href="/category/javascript/"><i class="fa-brands fa-square-js"></i>JavaScript</a></li>
                  <li><a href="/category/work/"><i class="fa-solid fa-desktop"></i>Work</a></li>
                  <li><a href="/category/books/"><i class="fa-solid fa-book-open"></i>Books</a></li>
                </ul>
              </div>
            <!-- /.HeaderGlobalNav -->
            </nav>
          </div>
        <!-- /.PageHeader -->
        </header>