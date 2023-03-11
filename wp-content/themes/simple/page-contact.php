<?php get_header(); ?>
  <div class="PageContent" id="page-content">
    <div class="inner">
      <main class="MainContent" id="main-content">
        <section class="Contact">
          <h1 class="Contact__title"><?php the_title(); ?></h1>
          <div class="Contact__form">
            <iframe src="https://docs.google.com/forms/d/e/1FAIpQLScAZt9COGVCG_J_6nf-GNurnq_T4o6ZIWHNg6sc7FK4_ZS8Qw/viewform?embedded=true" width="100%" height="966" frameborder="0" marginheight="0" marginwidth="0">読み込んでいます…</iframe>
          </div>
        <!-- /.Contact -->
        </section>
      <!-- /.MainContent -->
      </main>
      <aside class="Sidebar" id="sidebar">
        <?php get_sidebar( 'contact' ); ?>
      <!-- /.Sidebar -->
      </aside>
    </div>
  <!-- /.PageContent -->
  </div>
<?php get_footer(); ?>
