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
            <p class="PageHeader__catchcopy">文学部出身の「現役コーダー」が<br class="u-hidden-pc">
            Web制作に役立つ情報をわかりやすく解説！</p>
            <nav class="HeaderGlobalNav" id="global-nav" aria-label="メインメニュー">
              <div class="HeaderGlobalNav__contents">
                <ul class="HeaderGlobalNav__list">
                  <li><a href="/homepage-start/"><i class="fas fa-shapes"></i>ホームページ作り方</a></li>
                  <li><a href="/category/wordpress/"><i class="fa-brands fa-wordpress"></i>WordPress活用</a></li>
                  <li><a href="/category/programming/"><i class="fa-solid fa-code"></i>プログラミング</a></li>
                  <li><a href="/engineer-shushoku/"><i class="fa-solid fa-desktop"></i>Webエンジニア就職</a></li>
                  <li><a href="/category/profile/"><i class="fa-sharp fa-solid fa-face-smile"></i>プロフィール</a></li>
                  <li><a href="/contact/"><i class="fa fa-envelope"></i>お問い合わせ</a></li>
                </ul>
              </div>
            <!-- /.HeaderGlobalNav -->
            </nav>
          </div>
        <!-- /.PageHeader -->
        </header>
