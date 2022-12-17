<?php get_header(); ?>
<div id="content">
<div id="inner-content" class="fadeIn wrap">
<main id="main">
<?php parts_add_top(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

<?php if ( get_option( 'front_page_ttl_display', 'off' ) == 'on' && !is_home() || !is_front_page() ) : ?>

<header class="article-header entry-header">

<?php 
	stk_post_title();
	stk_post_main_thum( get_the_ID() );
	stk_snsbutton(); 
?>

</header>

<?php endif; ?>

<section class="entry-content cf">
<?php the_content(); ?>
</section>
</article>

<?php get_template_part( 'parts/singlefoot' ); ?>

<?php endwhile; endif; ?>
<?php parts_add_bottom(); ?>
</main>
<?php get_sidebar(); ?>
</div>
</div>
<?php get_footer(); ?>