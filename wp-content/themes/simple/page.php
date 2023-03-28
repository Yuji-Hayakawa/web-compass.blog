<?php get_header(); ?>
  <div class="PageContent" id="page-content">
    <div class="inner">
      <main class="MainContent" id="main-content">
        <?php get_template_part( 'breadcrumb' ); ?>
        <article class="ArticleContent">
          <h1 class="c-lv1HeadingSingle"><?php the_title(); ?></h1>
          <?php the_content(); ?>
        <!-- /.ArticleContent -->
        </article>
      <!-- /.MainContent -->
      </main>
      <aside class="Sidebar" id="sidebar">
        <?php get_search_form(); ?>
        <?php get_sidebar( 'menu' ); ?>
        <?php get_sidebar( 'profile' ); ?>
        <?php get_sidebar( 'categories' ); ?>
      <!-- /.Sidebar -->
      </aside>
    </div>
  <!-- /.PageContent -->
  </div>
<?php get_footer(); ?>
