<?php

// gutenberg theme support
add_theme_support('align-wide');
add_theme_support('responsive-embeds');
add_theme_support('custom-units', 'px', 'em', 'vh', 'vw');
add_theme_support('custom-line-height');
add_theme_support('custom-spacing');


// block Widgetを無効化
add_action('after_setup_theme', function() {
    remove_theme_support('widgets-block-editor');
});
