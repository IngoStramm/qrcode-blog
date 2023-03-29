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
        <?php the_title(sprintf('<h1 class="entry-title"><a href="%s">', get_the_permalink()), '</a></h1>'); ?>

        <?php
        if (has_post_thumbnail()) {
        ?>
            <figure class="post-thumbnail">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail(array(400, 'auto'), array('loading' => true)); ?>
                </a>
            </figure><!-- .post-thumbnail -->
        <?php } ?>
    </header><!-- .entry-header -->

    <footer class="entry-footer default-max-width">
        <a href="<?php the_permalink(); ?>" class="post-read-more"><?php _e('Ver mais', 'qrcb'); ?> &gt;</a>
    </footer><!-- .entry-footer -->


</article><!-- #post-<?php the_ID(); ?> -->