<?php get_header(); ?>
      <div class="PageContent" id="page-content">
        <div class="inner">
          <main class="MainContent" id="main-content">
            <section class="_ArticlePart">
              <?php if ( is_month() ): ?>
                <h2 class="_ArticlePart__title">「<?php the_time( 'Y年m月' ); ?>」の記事一覧</h2>
              <?php else: ?>
                <h2 class="_ArticlePart__title">「<?php wp_title( '' ); ?>」の記事一覧</h2>
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
            <nav class="Pagination" aria-label="ページネーション">
              <ul class="Pagination__numbers">
                <li class="Pagination__number -page"><span>1</span></li>
                <li class="Pagination__number -page"><a href="<?php echo home_url( '/page/2/' ); ?>">2</a></li>
                <li class="Pagination__number -dots"><span>…</span></li>
                <li class="Pagination__number -page"><a href="<?php echo home_url( '/page/10/' ); ?>">10</a></li>
                <li class="Pagination__number -next"><a href="<?php echo home_url( '/page/2/' ); ?>"></a></li>
              </ul>
            <!-- /.Pagination -->
            </nav>
          <!-- /.MainContent -->
          </main>
          <?php get_sidebar(); ?>
        </div>
      <!-- /.PageContent -->
      </div>
<?php get_footer(); ?>