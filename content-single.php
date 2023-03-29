<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post'); ?>>

    <header class="entry-header alignwide">
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php
        the_content();
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer default-max-width">
        <a class="post-go-back" href="javascript:history.back()">&#60; <?php _e('Voltar', 'qrcb'); ?></a>
    </footer><!-- .entry-footer -->


</article><!-- #post-<?php the_ID(); ?> -->