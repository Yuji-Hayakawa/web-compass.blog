<?php if (have_posts()) :
	if (is_mobile() && ((get_option('stk_archivelayout_sp', 'toplayout-card') == 'toplayout-card2') || (get_option('stk_archivelayout_home_sp', 'toplayout-simple') == 'toplayout-card2')) ){
		$archives_class = ' card-column2-sp';
	} else {
		$archives_class = null;
	}
?>
<div class="archives-list card-list<?php echo $archives_class;?>">

<?php while (have_posts()) : the_post(); ?>

<article <?php post_class('post-list fadeInDown'); ?>>
<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php the_title_attribute(); ?>" class="post-list__link">
<figure class="eyecatch of-cover">
<?php
	echo skt_oc_post_thum();
	echo stk_archivecatname();
?>
</figure>

<section class="archives-list-entry-content">
<?php 
	echo stk_archives_entrytitle();
	echo stk_archives_post_meta();
	echo stk_archives_description();
?>
</section>
</a>
</article>

<?php endwhile; ?>
</div>

<?php 
	elseif(is_search()):
		echo stk_archives_notfound();
	endif;
?>