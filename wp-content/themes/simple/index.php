<?php get_header(); ?>
  <div class="PageContent" id="page-content">
    <div class="inner">
      <main class="MainContent" id="main-content">
        <?php if ( is_home() || is_front_page() ) : ?>
        ここにトップページにだけ表示したいHTMLを記載
        <?php else : ?>
        ここにトップページ意外に表示したいHTMLを記載
        <?php endif; ?>
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
                    <figure class="_ArticleItem__thumbnail">
                      <?php the_post_thumbnail( 'medium' ) ?>
                    </figure>
                    <div class="_ArticleItem__meta">
                      <h3 class="_ArticleItem__title"><?php the_title(); ?></h3>
                      <?php the_excerpt(); ?>
                    </div>
                  </a>
                <!-- /._ArticleItem -->
                </article>
              <?php endwhile; ?>
            <?php endif; ?>
        <!-- /._ArticlePart -->
        </section>
        <?php if( function_exists( 'wp_pagenavi' )) { wp_pagenavi(); } ?>
        <?php get_template_part( 'breadcrumb' ); ?>
      <!-- /.MainContent -->
      </main>
      <aside class="Sidebar" id="sidebar">
        <?php get_search_form(); ?>
        <?php get_sidebar( 'menu' ); ?>
        <?php get_sidebar( 'profile' ); ?>
        <?php get_sidebar( 'categories' ); ?>
        <?php get_sidebar( 'archives' ); ?>
      <!-- /.Sidebar -->
      </aside>
    </div>
  <!-- /.PageContent -->
  </div>
<?php get_footer(); ?>