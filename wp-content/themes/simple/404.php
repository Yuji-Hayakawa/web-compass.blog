<?php get_header(); ?>
  <div class="PageContent" id="page-content">
    <div class="inner">
      <main class="MainContent" id="main-content">
        <section class="_NotfoundPage">
          <h2 class="_NotfoundPage__title">お探しのページが見つかりませんでした。</h2>
            <p class="_NotfoundPage__description">お探しのページは「すでに移動または削除されている」、「URLが異なっている」などの理由で見つかりませんでした。</p>
            <p class="_NotfoundPage__description">以下より キーワード を入力して検索してみてください。</p>
            <?php get_search_form(); ?>
            <p class="_NotfoundPage__description">以下のカテゴリーから記事を探すこともできます。</p>
            <?php get_sidebar( 'categories' ); ?>
            <div class="_NotfoundPage__return c-button"><a href="/">TOPページに戻る</a></div>
        <!-- /._NotfoundPage -->
        </section>
      <!-- /.MainContent -->
      </main>
      <aside class="Sidebar" id="sidebar">
        <?php get_sidebar( 'categories' ); ?>
        <?php get_sidebar( 'menu' ); ?>
      <!-- /.Sidebar -->
      </aside>
    </div>
  <!-- /.PageContent -->
  </div>
<?php get_footer(); ?>