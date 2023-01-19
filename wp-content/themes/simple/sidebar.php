<aside class="Sidebar" id="sidebar">
  <?php get_search_form(); ?>
  <div class="_Menu" id="menu">
    <ul class="_Menu__list">
      <li><a href="<?php echo home_url( '/beginner/' ); ?>"><i class="fa-regular fa-star-half-stroke"></i>初心者向け</a></li>
      <li><a href="<?php echo home_url( '/intermediate/' ); ?>"><i class="fa-solid fa-graduation-cap"></i>中級者向け</a></li>
      <li><a href="<?php echo home_url( '/html/' ); ?>"><i class="fa-solid fa-code"></i>HTML</a></li>
      <li><a href="<?php echo home_url( '/css/' ); ?>"><i class="fa-solid fa-palette"></i>CSS</a></li>
      <li><a href="<?php echo home_url( '/wordpress/' ); ?>"><i class="fa-brands fa-wordpress"></i>WordPress</a></li>
      <li><a href="<?php echo home_url( '/books/' ); ?>"><i class="fa-solid fa-book-open"></i>おすすめ本</a></li>
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
    <a href="<?php echo home_url( '/profile/' ); ?>" rel="author">プロフィール詳細</a>
  <!-- /.Profile -->
  </section>
  <section class="Category" id="category">
    <h4 class="Category__title">Category</h4>
    <ul class="Category__list">
      <?php
      $args = array(
        'title_li' => ''
      );
      wp_list_categories( $args );
      ?>
    </ul>
  <!-- /.Category -->
  </section>
  <section class="Archive" id="archive">
    <h4 class="Archive__title">Archive</h4>
    <ul class="Archive__list">
      <?php
        $args = array(
          'type' => 'monthly'
        );
        wp_get_archives( $args );
        ?>
    </ul>
  <!-- /.Archive -->
  </section>
<!-- /.Sidebar -->
</aside>