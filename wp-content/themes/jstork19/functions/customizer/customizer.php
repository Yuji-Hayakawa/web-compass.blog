<?php

if (!defined('ABSPATH')) {
    exit;
}

function stk_customize_register_seting($wp_customize)
{
    // CheckBox
    function theme_slug_sanitize_checkbox($checked)
    {
        return ((isset($checked) && true == $checked) ? true : false);
    }

    // 最大最小を設定
    function theme_slug_sanitize_number_range($number, $setting)
    {
        $number = absint($number);
        $atts = $setting->manager->get_control($setting->id)->input_attrs;
        $min = (isset($atts['min']) ? $atts['min'] : $number);
        $max = (isset($atts['max']) ? $atts['max'] : $number);
        $step = (isset($atts['step']) ? $atts['step'] : 1);
        return ($min <= $number && $number <= $max && is_int($number / $step) ? $number : $setting->default);
    }
}
add_action('customize_register', 'stk_customize_register_seting');

require_once('customizer-color.php');
require_once('customizer-global_section.php');
require_once('customizer-panel_toppege_settings.php');
require_once('customizer-archiveslayout_section.php');
require_once('customizer-postpage_section.php');
require_once('customizer-snsbutton_section.php');
require_once('customizer-option_section.php');
require_once('customizer-ad_section.php');
require_once('customizer-advanced_section.php');
require_once('customizer-static_front_page.php');