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