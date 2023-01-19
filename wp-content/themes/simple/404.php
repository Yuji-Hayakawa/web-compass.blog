<?php get_header(); ?>
  <div class="PageContent" id="page-content">
    <div class="inner">
      <main class="MainContent" id="main-content">
        <section class="_NotfoundPage">
          <h2 class="_NotfoundPage__title">404ページ</h2>
            <p class="_NotfoundPage__description">お探しのページが見つかりませんでした。<br>
            お探しのページは現在閲覧できなくなっているか、URLが正しくないようです。<a href="<?php echo home_url( '/' ); ?>">トップページへ戻る</a></p>
        <!-- /._NotfoundPage -->
        </section>
      <!-- /.MainContent -->
      </main>
      <?php get_sidebar(); ?>
    </div>
  <!-- /.PageContent -->
  </div>
<?php get_footer(); ?>