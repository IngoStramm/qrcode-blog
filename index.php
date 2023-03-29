<?php get_header(); ?>

<?php
if (have_posts()) { ?>
    <ul class="posts">
        <?php
        while (have_posts()) {
            the_post(); ?>
            <li class="post-item">
                <?php get_template_part('content', 'list'); ?>
            </li>
        <?php } ?>
    </ul>
<?php
    qrcb_paging_nav();
}

get_footer();
