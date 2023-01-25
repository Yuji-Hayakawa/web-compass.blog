<?php get_header(); ?>
  <div class="PageContent" id="page-content">
    <div class="inner">
      <main class="MainContent" id="main-content">
        <section class="_ArticlePart _New" id="new">
          <?php if ( have_posts() ): ?>
            <?php while ( have_posts() ): the_post(); ?>
              <article <?php post_class('_ArticleItem'); ?> >
                <div class="_ArticleItem__meta">
                  <h1 class="_ArticleItem__title"><?php the_title(); ?></h1>
                </div>
                <figure class="_ArticleItem__thumbnail">
                  <?php if ( has_post_thumbnail() ): ?>
                    <?php the_post_thumbnail('medium') ?>
                  <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/noimage.png" alt="" width="200" height="166" decoding="async">
                  <?php endif; ?>
                </figure>
                <div class="_ArticleItem__body">
                  <?php the_content(); ?>
                </div>
              <!-- /._ArticleItem -->
              </article>
            <?php endwhile; ?>
          <?php endif; ?>
        <!-- /._ArticlePart -->
        </section>
        <?php get_template_part( 'breadcrumb' ); ?>
        <!-- TODO： ここにタグ（カテゴリー）を出力 -->
        <div class="ShareBtns">
          <ul class="ShareBtns__list">
            <li class="ShareBtns__item -twitter"><a href="" target="_blank"><i class="fa-brands fa-twitter"></i>Tweet</a></li>
            <li class="ShareBtns__item -line"><a href="" target="_blank"><i class="fa-brands fa-line"></i>LINE</a></li>
            <li class="ShareBtns__item -copy"><a href=""><i class="fa-regular fa-copy"></i>Copy URL</a></li>
          </ul>
        <!-- /.ShareBtns -->
        </div>
        <section class="Profile" id="profile">
          <h3 class="Profile__title">この記事を書いた人</h3>
          <div class="ProfileBox">
            <div class="ProfileBox__author">
              <figure class="Profile__authorImg">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/portrait.jpg" alt="" width="120" height="120" decoding="async">
              </figure>
              <p class="Profile__author">はや氏</p>
              <p class="Profile__job">Webエンジニア</p>
            </div>
            <div class="ProfileBox__text">
              <p class="Profile__text">WordPressが得意なWeb屋。HPcode代表。300件以上のWordPress案件を対応してきました。SE → 農家 → アフィリエイター → Web屋。生まれは三重県。<br>
              ホームページ制作を承っております。お気軽にお問い合わせください！</p>
              <a href="/profile/" rel="author">プロフィール詳細</a>
            </div>
          <!-- /.ProfileBox -->
          </div>
        <!-- /.Profile -->
        </section>
        <section class="_RelatedArticle" id="related-article">
          <h3 class="_RelatedArticle__title">こちらの関連記事もどうぞ</h3>
          <ul class="_RelatedArticle__list">
            <li class="_RelatedArticle__item">
              <a href="<?php the_permalink(); ?>">
                <div class="_RelatedArticle__thumbnail">
                  <figure>
                    <?php if ( has_post_thumbnail() ): ?>
                      <?php the_post_thumbnail('medium') ?>
                    <?php else: ?>
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/noimage.png" alt="" width="260" height="135" decoding="async">
                    <?php endif; ?>
                  </figure>
                </div>
                <div class="_RelatedArticle__meta">
                  <p class="_RelatedArticle__title">関連記事のタイトル</p>
                  <time datetime="2023-01-25">2023年1月25日</time>
                </div>
              </a>
            </li>
            <!-- TODO: 上記の._RelatedArticle__itemを下記に3回繰り返す -->
          </ul>
        <!-- /._RelatedArticle -->
        </section>
      <!-- /.MainContent -->
      </main>
      <aside class="Sidebar" id="sidebar">
        <?php get_search_form(); ?>
        <?php get_sidebar( 'profile' ); ?>
        <?php get_sidebar( 'categories' ); ?>
      <!-- /.Sidebar -->
      </aside>
    </div>
  <!-- /.PageContent -->
  </div>
<?php get_footer(); ?>