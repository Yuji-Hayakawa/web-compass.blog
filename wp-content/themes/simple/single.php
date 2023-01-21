<!-- TODO: 個別投稿ページを仮で作成。後にデザインから修正作業を行う。 -->
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