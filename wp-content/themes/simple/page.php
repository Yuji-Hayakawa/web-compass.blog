<?php get_header(); ?>
  <div class="PageContent" id="page-content">
    <div class="inner">
      <main class="MainContent" id="main-content">
        <section class="_ArticlePart _Popular" id="popular">
          <h2 class="_ArticlePart__title">人気記事</h2>
          <article class="_ArticleItem">
            <a href="/">
              <figure class="_ArticleItem__thumbnail">
                <img src="" alt="" width="200" height="166" decoding="async">
              </figure>
              <div class="_ArticleItem__meta">
                <h3 class="_ArticleItem__title">【実質無料】クリプト運用（DeFi）の「生放送セミナー」を実施します</h3>
                <p class="_ArticleItem__description">クリプト運用（DeFi）の生放送セミナーを実施します。僕は「約２億円」を仮想通貨の「DeFi」で運用しており、利回りは「6.7%」くらいです。セミナーでは「DeFiのメリット＆デメリット、リスク回避の方法、実際の使い方」を解説します。</p>
              </div>
            </a>
          <!-- /._ArticleItem TODO:このパーツを以下に2回繰り返す -->
          </article>
        <!-- /._ArticlePart -->
        </section>
        <section class="_ArticlePart _New" id="new">
          <h2 class="_ArticlePart__title">新着記事</h2>
          <?php if ( have_posts() ): ?>
            <?php while ( have_posts() ): the_post(); ?>
              <article <?php post_class('_ArticleItem'); ?> >
                <a href="<?php the_permalink(); ?>">
                  <figure class="_ArticleItem__thumbnail">
                    <?php the_post_thumbnail('medium') ?>
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