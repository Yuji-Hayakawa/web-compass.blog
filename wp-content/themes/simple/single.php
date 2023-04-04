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
                  <i class="fa-solid fa-arrows-rotate"></i>
                  <time datetime="<?php the_time( 'Y-m-d' ); ?>" class="ArticleContentHeader__times"><?php the_time( 'Y年m月d日' ); ?></time>
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
                  <h3 class="c-lv3HeadingSingle">この記事を書いた人</h3>
                  <div class="ProfileBox">
                    <div class="ProfileBox__author">
                      <div class="Profile__authorImg">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/portrait.jpg" alt="" width="100" height="100" loading="lazy" decoding="async">
                      </div>
                      <p class="Profile__author">はや氏ゆう</p>
                    </div>
                    <div class="ProfileBox__text">
                      <p class="Profile__text">WordPressが得意なホームページ制作者。</p>
                      <p class="Profile__text">【経歴】野球少年 ▶︎ 法大文学部 ▶︎ IT企業でWebエンジニア ▶︎ 2023年独立 ▶︎ ホームページ制作者</p>
                      <p class="Profile__text">● パソコン操作に苦手意識がある方でも、サイトの管理・更新ができるホームページを作るのが得意。</p>
                      <div class="Profile__detail">
                        <a href="/profile/">プロフィール詳細はこちら ></a>
                      </div>
                    </div>
                  <!-- /.ProfileBox -->
                  </div>
                <!-- /.Profile -->
                </section>
                <?php if(has_category() ) {
                  $catlist =get_the_category();
                  $category = array();
                  foreach($catlist as $cat){
                    $category[] = $cat->term_id;
                  }}
                ?>
                <?php $args = array(
                  'post_type' => 'post',
                  'posts_per_page' => '5',
                  'post__not_in' =>array( $post->ID ),
                  'category__in' => $category,
                  'orderby' => 'rand'
                );
                $related_query = new WP_Query( $args );?>
                <section class="_RelatedArticle">
                  <h3 class="c-lv3HeadingSingle">こちらの関連記事もどうぞ</h3>
                  <?php if ( $related_query->have_posts() ): ?>
                  <?php while ( $related_query->have_posts() ) : $related_query->the_post(); ?>
                  <ul class="_RelatedArticle__list">
                    <li class="_RelatedArticle__item">
                      <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </li>
                  </ul>
                  <?php endwhile; ?>
                  <?php wp_reset_postdata(); ?>
                  <?php else: ?>
                    <p>関連記事はありませんでした。<br>
                    以下のカテゴリーから記事を探すことができます。</p>
                    <?php get_sidebar( 'categories' ); ?>
                  <?php endif; ?>
                <!-- /._RelatedArticle -->
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
      <aside class="Sidebar -single" id="sidebar">
        <?php get_search_form(); ?>
        <?php get_sidebar( 'profile' ); ?>
        <?php get_sidebar( 'categories' ); ?>
      <!-- /.Sidebar -->
      </aside>
    </div>
  <!-- /.PageContent -->
  </div>
<?php get_footer(); ?>
