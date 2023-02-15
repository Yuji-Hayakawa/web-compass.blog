<section class="Archive" id="archive">
  <h4 class="Archive__title">Archive</h4>
  <ul class="Archive__list">
    <?php
      $args = array(
        'type' => 'monthly',
        'show_post_count' => true,
      );
      wp_get_archives( $args );
    ?>
  </ul>
<!-- /.Archive -->
</section>