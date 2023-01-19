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