<?php

return array(
    'title'   => '3カラム 画像つき',
    'categories' => array( 'stkpatterncat_section' ),
    'content' => '
    <!-- wp:group {"align":"full","style":{"color":{"background":"#fcfcfc"}}} -->
<div class="wp-block-group alignfull has-background" style="background-color:#fcfcfc"><!-- wp:heading {"textAlign":"center","className":"has-text-align-center is-style-stylenone"} -->
<h2 class="has-text-align-center is-style-stylenone">Column Sample</h2>
<!-- /wp:heading -->

<!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="'.get_theme_file_uri('blocks/patterns/images/column-block-three-image-img01.jpeg').'" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"className":"is-style-stylenone"} -->
<h3 class="is-style-stylenone">Headding text...</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="'.get_theme_file_uri('blocks/patterns/images/column-block-three-image-img02.jpeg').'" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"className":"is-style-stylenone"} -->
<h3 class="is-style-stylenone">Headding text...</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:image {"sizeSlug":"large"} -->
<figure class="wp-block-image size-large"><img src="'.get_theme_file_uri('blocks/patterns/images/column-block-three-image-img03.jpeg').'" alt=""/></figure>
<!-- /wp:image -->

<!-- wp:heading {"level":3,"className":"is-style-stylenone"} -->
<h3 class="is-style-stylenone">Headding text...</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"className":"gf"} -->
<p class="gf">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->
    ',
);