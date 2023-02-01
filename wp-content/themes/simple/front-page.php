<?php get_header(); ?>
  <div class="PageContent" id="page-content">
    <div class="inner">
      <main class="MainContent" id="main-content">
        <?php if ( is_home() && !is_paged() ): ?>
        <article class="_PickupPost" id="pickup-post">
          <a href="/">
            <div class="_PickupPost__meta">
              <h3 class="_PickupPost__title">プログラミング始め方完全ガイド！立ち上げから収入を得る方法まで</h3>
              <p class="_PickupPost__description">初心者向けにブログで収入が得られる理由やブログの始め方から始めた後のブログ運営のポイント、ブログで収入を得るために必要な定番広告サービスの紹介までまとめて解説。</p>
              <p class="_PickupPost__button"><span>この記事を読む</span></p>
            </div>
            <figure class="_PickupPost__thumbnail">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/img/engineer-shukatu.jpg" alt="" width="574" height="318" decoding="async">
            </figure>
          </a>
        <!-- /._PickupPost -->
        </article>
        <?php endif; ?>

        <section class="_ArticlePart _Popular" id="popular">
          <h2 class="_ArticlePart__title">人気記事</h2>
          <?php
            $args = array(
              'post_type' => 'post',
              'post__in' => array(34,36,38),
            );
            $set_query = new WP_Query( $args );
          ?>
          <?php if ( $set_query -> have_posts() ): ?>
            <?php while ( $set_query -> have_posts() ): $set_query -> the_post(); ?>
              <article <?php post_class('_ArticleItem'); ?> >
                <a href="<?php the_permalink(); ?>">
                  <div class="_ArticleItem__meta">
                    <h3 class="_ArticleItem__title"><?php the_title(); ?></h3>
                    <?php the_excerpt(); ?>
                  </div>
                  <figure class="_ArticleItem__thumbnail">
                    <?php if ( has_post_thumbnail() ): ?>
                      <?php the_post_thumbnail('medium') ?>
                    <?php else: ?>
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/noimage.png" alt="" width="200" height="166" decoding="async">
                    <?php endif; ?>
                  </figure>
                </a>
              <!-- /._ArticleItem -->
              </article>
            <?php endwhile; ?>
          <?php endif; ?>
          <?php wp_reset_postdata(); ?>
        <!-- /._ArticlePart -->
        </section>
        <section class="_ArticlePart _New" id="new">
          <h2 class="_ArticlePart__title">新着記事</h2>
          <?php
            $args = array(
              'post_type' => 'post',
              'post__not_in' => array(34,36,38),
            );
            $set_query = new WP_Query( $args );
          ?>
          <?php if ( $set_query -> have_posts() ): ?>
            <?php while ( $set_query -> have_posts() ): $set_query -> the_post(); ?>
              <article <?php post_class('_ArticleItem'); ?> >
                <a href="<?php the_permalink(); ?>">
                  <div class="_ArticleItem__meta">
                    <h3 class="_ArticleItem__title"><?php the_title(); ?></h3>
                    <?php the_excerpt(); ?>
                  </div>
                  <figure class="_ArticleItem__thumbnail">
                    <?php if ( has_post_thumbnail() ): ?>
                      <?php the_post_thumbnail('medium') ?>
                    <?php else: ?>
                      <img src="<?php echo get_template_directory_uri(); ?>/assets/img/noimage.png" alt="" width="200" height="166" decoding="async">
                    <?php endif; ?>
                  </figure>
                </a>
              <!-- /._ArticleItem -->
              </article>
            <?php endwhile; ?>
          <?php endif; ?>
          <?php wp_reset_postdata(); ?>
        <!-- /._ArticlePart -->
        </section>
        <?php if( function_exists( 'wp_pagenavi' )) { wp_pagenavi(); } ?>
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