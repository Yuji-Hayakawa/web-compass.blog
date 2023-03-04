<?php get_header(); ?>
  <div class="PageContent" id="page-content">
    <div class="inner">
      <main class="MainContent" id="main-content">
        <?php get_template_part( 'breadcrumb' ); ?>
        <?php if ( have_posts() ): ?>
          <?php while ( have_posts() ): the_post(); ?>
            <article <?php post_class( 'ArticleContent' ); ?> >
              <header class="ArticleContentHeader">
                <div class="ArticleContentHeader__title">
                  <h1 class="c-lv1HeadingSingle"><?php the_title(); ?></h1>
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
                <div class="_ShareBtn">
                  <ul class="_ShareBtn__list">
                    <li class="_ShareBtn__item c-button -line"><a href=""><i class="fa-brands fa-line"></i> LINE</a></li>
                    <li class="_ShareBtn__item c-button -twitter"><a href="" target="_blank"><i class="fa-brands fa-twitter"></i> Tweet</a></li>
                    <li class="_ShareBtn__item c-button -feedly"><a href="" target="_blank"><i class="fa-solid fa-rss"></i> Feedly</a></li>
                  </ul>
                <!-- /._ShareBtn -->
                </div>
                <section class="Profile -author">
                  <h3 class="c-lv3HeadingSingle">この記事を書いた人</h3>
                  <div class="ProfileBox">
                    <div class="ProfileBox__author">
                      <div class="Profile__authorImg">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/portrait.jpg" alt="" width="100" height="100" loading="lazy" decoding="async">
                      </div>
                      <p class="Profile__author">はや氏</p>
                    </div>
                    <div class="ProfileBox__text">
                      <p class="Profile__text">WordPressが得意なWeb屋。HPcode代表。300件以上のWordPress案件を対応してきました。SE → 農家 → アフィリエイター → Web屋。生まれは三重県。<br>
                      ホームページ制作を承っております。お気軽にお問い合わせください！</p>
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
                  'posts_per_page' => '4',
                  'post__not_in' =>array( $post->ID ),
                  'category__in' => $category,
                  'orderby' => 'rand'
                );
                $related_query = new WP_Query( $args );?>
                <section class="_RelatedArticle">
                  <h3 class="c-lv3HeadingSingle">こちらの関連記事もどうぞ</h3>
                  <ul class="_RelatedArticle__list">
                    <?php while ( $related_query->have_posts() ) : $related_query->the_post(); ?>
                    <li class="_RelatedArticle__item">
                      <a href="<?php the_permalink(); ?>">
                        <p class="_RelatedArticle__title"><?php the_title(); ?></p>
                        <div class="_RelatedArticle__thumbnail">
                          <?php if ( has_post_thumbnail() ): ?>
                            <?php the_post_thumbnail( 'medium' ) ?>
                          <?php else: ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/noimage.png" alt="" width="300" height="300" loading="lazy" decoding="async">
                          <?php endif; ?>
                        </div>
                      </a>
                    </li>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                  </ul>
                <!-- /._RelatedArticle -->
                </section>
              <!-- /.ArticleContentFooter -->
              </footer>
            <!-- /.ArticleContent -->
            </article>
          <?php endwhile; ?>
        <?php endif; ?>
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