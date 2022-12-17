<?php

return array(
    'title'   => '下層ページ1',
    'categories' => array( 'stkpatterncat_pagewide' ),
    'content' => '
    <!-- wp:group {"align":"full","backgroundColor":"mainttlbg","textColor":"mainttltext"} -->
<div class="wp-block-group alignfull has-mainttltext-color has-mainttlbg-background-color has-text-color has-background"><!-- wp:heading {"level":1,"className":"is-style-stylenone"} -->
<h1 class="is-style-stylenone">Lorem Ipsum</h1>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit,</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:group {"align":"full","backgroundColor":"white","className":"stk-pd-l","paddingSetting":"stk-pd-l"} -->
<div class="wp-block-group alignfull stk-pd-l has-white-background-color has-background"><!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->
    ',
);