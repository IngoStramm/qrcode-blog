<?php

/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header id="header">
        <?php
        $site_url = get_site_url();
        $custom_logo_id = get_theme_mod('custom_logo');
        $logo = wp_get_attachment_image_src($custom_logo_id, 'medium');
        if (has_custom_logo()) {
            echo '<a href="' . $site_url . '"><img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '"></a>';
        } else {
            echo '<h1><a href="' . $site_url . '">' . get_bloginfo('name') . '<a/></h1>';
        }
        ?>
    </header>

    <main id="content">