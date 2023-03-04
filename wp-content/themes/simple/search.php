<?php get_header(); ?>
  <div class="PageContent" id="page-content">
    <div class="inner">
      <main class="MainContent" id="main-content">
        <?php if ( have_posts() ): ?>
          <section class="_ArticlePart">
            <h2 class="_ArticlePart__title">「<?php the_search_query(); ?>」の検索結果</h2>
            <?php while ( have_posts() ): the_post(); ?>
              <article <?php post_class( '_ArticleItem' ); ?> >
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
            <?php else: ?>
              <section class="_NotfoundPage">
                <h2 class="_ArticlePart__title">「<?php the_search_query(); ?>」の検索結果</h2>
                <p class="_NotfoundPage__title">お探しの記事が見つかりませんでした。</p>
                <p class="_NotfoundPage__description">指定されたキーワードでは記事が見つかりませんでした。<br>
                別のキーワード、もしくはカテゴリーから記事をお探しください。</p>
                <p class="_NotfoundPage__description">以下より キーワード を入力して検索してみてください。</p>
                <?php get_search_form(); ?>
                <p class="_NotfoundPage__description">以下のカテゴリーから記事を探すこともできます。</p>
                <?php get_sidebar( 'categories' ); ?>
                <div class="_NotfoundPage__return c-button"><a href="/">TOPページに戻る</a></div>
              <!-- /._NotfoundPage -->
              </section>
            <?php endif; ?>
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