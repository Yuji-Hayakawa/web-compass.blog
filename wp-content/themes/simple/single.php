<!-- TODO: 個別記事ページを仮で作成。後にデザインから修正作業を行う。 -->
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
                      <?php the_post_thumbnail('medium') ?>
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
            <nav class="Pagination" aria-label="ページネーション">
              <ul class="Pagination__numbers">
                <li class="Pagination__number -page"><span>1</span></li>
                <li class="Pagination__number -page"><a href="/page/2/">2</a></li>
                <li class="Pagination__number -dots"><span>…</span></li>
                <li class="Pagination__number -page"><a href="/page/10/">10</a></li>
                <li class="Pagination__number -next"><a href="/page/2/"></a></li>
              </ul>
            <!-- /.Pagination -->
            </nav>
          <!-- /.MainContent -->
          </main>
          <aside class="Sidebar" id="sidebar">
            <div class="Search" id="search">
              <form action="https://web-compass.blog/" class="SearchForm" method="get" role="search">
                <input type="text" name="s" value="" placeholder="検索" class="SearchForm__input">
                <button type="submit" class="SearchForm__submit" aria-label="検索する"></button>
              </form>
            <!-- /.Search -->
            </div>
            <div class="_Menu" id="menu">
              <ul class="_Menu__list">
                <li><a href="/beginner/"><i class="fa-regular fa-star-half-stroke"></i>初心者向け</a></li>
                <li><a href="/intermediate/"><i class="fa-solid fa-graduation-cap"></i>中級者向け</a></li>
                <li><a href="/html/"><i class="fa-solid fa-code"></i>HTML</a></li>
                <li><a href="/css/"><i class="fa-solid fa-palette"></i>CSS</a></li>
                <li><a href="/wordpress/"><i class="fa-brands fa-wordpress"></i>WordPress</a></li>
                <li><a href="/books/"><i class="fa-solid fa-book-open"></i>おすすめ本</a></li>
              </ul>
            <!-- /._Menu -->
            </div>
            <section class="Profile" id="profile">
              <h4 class="Profile__author">はや氏</h4>
              <figure class="Profile__authorImg">
                <img src="" alt="はや氏の似顔絵" width="120" height="120" decoding="async">
              </figure>
              <p class="Profile__job">Webエンジニア</p>
              <p class="Profile__text">WordPressが得意なWeb屋。HPcode代表。300件以上のWordPress案件を対応してきました。SE → 農家 → アフィリエイター → Web屋。生まれは三重県。<br>
              ホームページ制作を承っております。お気軽にお問い合わせください！</p>
              <a href="/profile/" rel="author">プロフィール詳細</a>
            <!-- /.Profile -->
            </section>
            <section class="Category" id="category">
              <h4 class="Category__title">Category</h4>
              <ul class="Category__list">
                <li><a href="/category/wordpress/">WordPress</a></li>
                <li><a href="/category/html/">HTML</a></li>
                <li><a href="/category/css/">CSS</a></li>
                <li><a href="/category/javascript/">JavaScript</a></li>
                <li><a href="/category/work/">Work</a></li>
                <li><a href="/category/books/">Books</a></li>
                <!-- TODO: 以下liタグ繰り返し -->
              </ul>
            <!-- /.Category -->
            </section>
            <section class="Archive" id="archive">
              <h4 class="Archive__title">Archive</h4>
              <ul class="Archive__list">
                <li><a href="/2023/01/">2023年1月</a></li>
                <li><a href="/2022/12/">2022年12月</a></li>
                <li><a href="/2022/11/">2022年11月</a></li>
                <!-- TODO: 以下liタグ繰り返し -->
              </ul>
            <!-- /.Archive -->
            </section>
          <!-- /.Sidebar -->
          </aside>
        </div>
      <!-- /.PageContent -->
      </div>
<?php get_footer(); ?>