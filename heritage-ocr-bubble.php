<?php
/*
Plugin Name: Heritage Foundation Real-Time OCR Bubble
Description: Adds a floating heritage-themed OCR bubble that allows visitors to extract text from images in real time using Tesseract.js.
Version: 1.0.0
Author: Heritage Foundation
License: GPL2
*/

if (!defined('ABSPATH')) exit; // Exit if accessed directly

// Enqueue scripts and styles
function heritage_ocr_enqueue_scripts() {
    wp_enqueue_style('heritage-ocr-style', plugin_dir_url(__FILE__) . 'css/style.css');
    wp_enqueue_script('tesseract-js', 'https://cdn.jsdelivr.net/npm/tesseract.js@5/dist/tesseract.min.js', [], null, true);
    wp_enqueue_script('heritage-ocr-bubble', plugin_dir_url(__FILE__) . 'js/ocr-bubble.js', ['tesseract-js'], null, true);

    // Pass settings to JS
    $options = get_option('heritage_ocr_settings');
    wp_localize_script('heritage-ocr-bubble', 'heritageOCR', [
        'bubbleColor' => $options['color'] ?? '#B66A50',
        'icon' => $options['icon'] ?? '🏺'
    ]);
}
add_action('wp_enqueue_scripts', 'heritage_ocr_enqueue_scripts');

// Add settings menu
function heritage_ocr_add_admin_menu() {
    add_options_page(
        'Heritage OCR Bubble Settings',
        'Heritage OCR Bubble',
        'manage_options',
        'heritage-ocr-bubble',
        'heritage_ocr_settings_page'
    );
}
add_action('admin_menu', 'heritage_ocr_add_admin_menu');

// Register settings
function heritage_ocr_register_settings() {
    register_setting('heritage_ocr_settings_group', 'heritage_ocr_settings');
}
add_action('admin_init', 'heritage_ocr_register_settings');

// Settings page
function heritage_ocr_settings_page() {
    include(plugin_dir_path(__FILE__) . 'admin/settings-page.php');
}
?>

