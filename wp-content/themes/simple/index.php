<?php get_header(); ?>
  <div class="PageContent" id="page-content">
    <div class="inner">
      <main class="MainContent" id="main-content">
        <section class="_ArticlePart">
          <?php if ( is_month() ): ?>
            <h2 class="_ArticlePart__title">「<?php the_time( 'Y年m月' ); ?>」の記事一覧</h2>
          <?php else: ?>
            <h2 class="_ArticlePart__title">記事一覧ページ</h2>
          <?php endif ;?>
            <?php if ( have_posts() ): ?>
              <?php while ( have_posts() ): the_post(); ?>
                <article <?php post_class( '_ArticleItem' ); ?> >
                  <a href="<?php the_permalink(); ?>">
                    <div class="_ArticleItem__meta">
                      <h3 class="_ArticleItem__title"><?php the_title(); ?></h3>
                    </div>
                    <div class="_ArticleItem__thumbnail">
                      <?php if ( has_post_thumbnail() ): ?>
                        <?php the_post_thumbnail('medium') ?>
                      <?php else: ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/noimage.webp" alt="" width="737" height="150" decoding="async">
                      <?php endif; ?>
                    </div>
                  </a>
                <!-- /._ArticleItem -->
                </article>
              <?php endwhile; ?>
            <?php endif; ?>
        <!-- /._ArticlePart -->
        </section>
        <?php if( function_exists( 'wp_pagenavi' )) { wp_pagenavi(); } ?>
        <?php if( function_exists( 'aioseo_breadcrumbs' ) ) aioseo_breadcrumbs(); ?>
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
