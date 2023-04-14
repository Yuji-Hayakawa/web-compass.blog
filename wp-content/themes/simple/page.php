<?php get_header(); ?>
  <div class="PageContent" id="page-content">
    <div class="inner">
      <main class="MainContent" id="main-content">
      <?php if ( have_posts() ): ?>
          <?php while ( have_posts() ): the_post(); ?>
            <article <?php post_class( 'ArticleContent' ); ?> >
              <header class="ArticleContentHeader">
                <div class="ArticleContentHeader__title">
                  <h1 class="c-lv1HeadingSingle"><?php the_title(); ?></h1>
                  <i class="fa-regular fa-clock"></i>
                  <time datetime="<?php the_time( 'Y-m-d' ); ?>" class="ArticleContentHeader__times"><?php the_date( 'Y年m月d日' ); ?></time>
                  <i class="fa-solid fa-arrows-rotate"></i>
                  <time datetime="<?php the_time( 'Y-m-d' ); ?>" class="ArticleContentHeader__times"><?php the_modified_date( 'Y年m月d日' ); ?></time>
                </div>
              <!-- /.ArticleContentHeader -->
              </header>
              <div class="ArticleContentBody">
                <?php the_content(); ?>
                <?php
                  $before = '<i class="fa-solid fa-tag"></i>';
                  the_tags( $before, '' );
                ?>
              <!-- /.ArticleContentBody -->
              </div>
              <footer class="ArticleContentFooter">
                <?php get_template_part( 'shareBtn' ); ?>
                <section class="Profile -author">
                  <h3 class="c-lv3HeadingSingle">webコンパスの中の人</h3>
                  <div class="ProfileBox">
                    <div class="ProfileBox__author">
                      <div class="Profile__authorImg">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/portrait.jpg" alt="" width="100" height="100" loading="lazy" decoding="async">
                      </div>
                      <p class="Profile__author">はやかわ</p>
                    </div>
                    <div class="ProfileBox__text">
                      <p class="Profile__text">WordPressが得意なホームページ制作者。</p>
                      <p class="Profile__text">【経歴】野球少年 ▶︎ 法大文学部 ▶︎ IT企業でWebエンジニア ▶︎ 2023年独立 ▶︎ ホームページ制作者</p>
                      <p class="Profile__text">● サイトの管理・更新がしやすいホームページを作るのが得意です。</p>
                      <div class="Profile__detail">
                        <a href="/profile/">運営者情報はこちら ></a>
                      </div>
                    </div>
                  <!-- /.ProfileBox -->
                  </div>
                <!-- /.Profile -->
                </section>
              <!-- /.ArticleContentFooter -->
              </footer>
            <!-- /.ArticleContent -->
            </article>
          <?php endwhile; ?>
        <?php endif; ?>
        <?php get_template_part( 'breadcrumb' ); ?>
      <!-- /.MainContent -->
      </main>
      <aside class="Sidebar" id="sidebar">
        <?php get_search_form(); ?>
        <?php get_sidebar( 'menu' ); ?>
        <?php get_sidebar( 'profile' ); ?>
        <?php get_sidebar( 'categories' ); ?>
      <!-- /.Sidebar -->
      </aside>
    </div>
  <!-- /.PageContent -->
  </div>
<?php get_footer(); ?>
