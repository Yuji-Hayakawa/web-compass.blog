<?php

return array(
    'title'   => 'カテゴリーリスト シンプル',
    'categories' => array( 'stkpatterncat_pagewide' ),
    'content' => '
    <!-- wp:group {"align":"full","backgroundColor":"white"} -->
<div class="wp-block-group alignfull has-white-background-color has-background"><!-- wp:stk-plugin/grids {"gridcolumn_pc":2,"gridcolumn_sp":1} -->
<div class="stk_grids" style="--gridgap_pc:16px;--gridgap_sp:16px;--gridcolumn_pc:2;--gridcolumn_sp:1"><!-- wp:stk-plugin/grid -->
<div class="stk_grid__child"><!-- wp:heading {"textAlign":"center","className":"is-style-style__section_ttl__border_under"} -->
<h2 class="has-text-align-center is-style-style__section_ttl__border_under">NEW POST</h2>
<!-- /wp:heading -->

<!-- wp:stk-plugin/postlistnew {"num":"5","postlistType":"simple"} /--></div>
<!-- /wp:stk-plugin/grid -->

<!-- wp:stk-plugin/grid -->
<div class="stk_grid__child"><!-- wp:heading {"textAlign":"center","className":"is-style-style__section_ttl__border_under"} -->
<h2 class="has-text-align-center is-style-style__section_ttl__border_under">CATEGORY1</h2>
<!-- /wp:heading -->

<!-- wp:stk-plugin/postlistcat {"num":"5","postlistType":"simple"} /--></div>
<!-- /wp:stk-plugin/grid -->

<!-- wp:stk-plugin/grid -->
<div class="stk_grid__child"><!-- wp:heading {"textAlign":"center","className":"is-style-style__section_ttl__border_under"} -->
<h2 class="has-text-align-center is-style-style__section_ttl__border_under">CATEGORY2</h2>
<!-- /wp:heading -->

<!-- wp:stk-plugin/postlistcat {"num":"5","postlistType":"simple"} /--></div>
<!-- /wp:stk-plugin/grid -->

<!-- wp:stk-plugin/grid -->
<div class="stk_grid__child"><!-- wp:heading {"textAlign":"center","className":"is-style-style__section_ttl__border_under"} -->
<h2 class="has-text-align-center is-style-style__section_ttl__border_under">CATEGORY3</h2>
<!-- /wp:heading -->

<!-- wp:stk-plugin/postlistcat {"num":"5","postlistType":"simple"} /--></div>
<!-- /wp:stk-plugin/grid --></div>
<!-- /wp:stk-plugin/grids --></div>
<!-- /wp:group -->
    ',
);