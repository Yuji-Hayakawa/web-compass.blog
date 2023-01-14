<?php get_header(); ?>
      <div class="PageContent" id="page-content">
        <div class="inner">
          <main class="MainContent" id="main-content">
            <?php if ( is_home() ): ?>
            <article class="_PickupPost" id="pickup-post">
              <a href="/how-to-start-programming/">
                <figure class="_PickupPost__thumbnail">
                  <img src="" alt="" width="574" height="318" decoding="async">
                </figure>
                <div class="_PickupPost__meta">
                  <h3 class="_PickupPost__title">プログラミング始め方完全ガイド！立ち上げから収入を得る方法まで</h3>
                  <p class="_PickupPost__description">初心者向けにブログで収入が得られる理由やブログの始め方から始めた後のブログ運営のポイント、ブログで収入を得るために必要な定番広告サービスの紹介までまとめて解説。</p>
                  <p class="_PickupPost__button"><span>この記事を読む</span></p>
                </div>
              </a>
            <!-- /._PickupPost -->
            </article>
            <?php endif; ?>

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
              <!-- /._ArticleItem TODO:このパーツを以下に9回繰り返す -->
              </article>
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