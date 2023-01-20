<?php get_header(); ?>
  <div class="PageContent" id="page-content">
    <div class="inner">
      <main class="MainContent" id="main-content">
        <section class="_ArticlePart">
          <h2 class="_ArticlePart__title">「<?php the_search_query(); ?>」の検索結果</h2>
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
          <?php else: ?>
            <p>記事が見つかりませんでした。</p>
          <?php endif; ?>
        <!-- /._ArticlePart -->
        </section>
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