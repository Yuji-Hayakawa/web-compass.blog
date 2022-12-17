<?php

return array(
    'title'   => 'よくある質問',
    'categories' => array( 'stkpatterncat_section' ),
    'content' => '
    <!-- wp:group {"align":"full","style":{"color":{"background":"#ebebeb"}}} -->
    <div class="wp-block-group alignfull has-background" style="background-color:#ebebeb"><!-- wp:heading {"textAlign":"center","className":"has-text-align-center is-style-stylenone"} -->
    <h2 class="has-text-align-center is-style-stylenone">Lorem Ipsum</h2>
    <!-- /wp:heading -->

    <!-- wp:stk-plugin/faq {"faqtitle":"SAMPLE TEXT","faqIconType":"faq-icon\u002d\u002dbg_themecolor","className":"is-style-faq_type_normal"} -->
    <dl class="wp-block-stk-plugin-faq oc-faq faq-icon--bg_themecolor faq-icon--radius_kadomaru is-style-faq_type_normal"><dt class="oc-faq__title">SAMPLE TEXT</dt><dd class="oc-faq__comment"><!-- wp:paragraph -->
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    <!-- /wp:paragraph --></dd></dl>
    <!-- /wp:stk-plugin/faq -->

    <!-- wp:stk-plugin/faq {"faqtitle":"SAMPLE TEXT","faqIconType":"faq-icon\u002d\u002dbg_themecolor","className":"is-style-faq_type_normal"} -->
    <dl class="wp-block-stk-plugin-faq oc-faq faq-icon--bg_themecolor faq-icon--radius_kadomaru is-style-faq_type_normal"><dt class="oc-faq__title">SAMPLE TEXT</dt><dd class="oc-faq__comment"><!-- wp:paragraph -->
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    <!-- /wp:paragraph --></dd></dl>
    <!-- /wp:stk-plugin/faq --></div>
    <!-- /wp:group -->
    ',
);