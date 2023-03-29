<?php

/**
 * qrcb_debug
 *
 * @param  mixed $a
 * @return void
 */
function qrcb_debug($a)
{
    echo '<pre>';
    var_dump($a);
    echo '</pre>';
}

/**
 * qrcb_frontend_scripts
 *
 * @return void
 */
function qrcb_frontend_scripts()
{

    $min = (in_array($_SERVER['REMOTE_ADDR'], array('127.0.0.1', '::1', '10.0.0.3'))) ? '' : '.min';

    if (empty($min)) :
        wp_enqueue_script('qrcode-blog-livereload', 'http://localhost:35729/livereload.js?snipver=1', array(), null, true);
    endif;

    wp_register_script('qrcode-blog-script', get_stylesheet_directory_uri() . '/assets/js/qrcode-blog' . $min . '.js', array('jquery'), '1.0.0', true);

    wp_enqueue_script('qrcode-blog-script');

    wp_localize_script('qrcode-blog-script', 'ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));

    // style
    wp_enqueue_style('qrcode-blog-style', get_stylesheet_directory_uri() . '/assets/css/qrcode-blog.css', array(), false, 'all');
}

add_action('wp_enqueue_scripts', 'qrcb_frontend_scripts');

/**
 * grcb_google_fonts
 *
 * @return void
 */
function grcb_google_fonts()
{
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Palanquin+Dark:wght@400;700&family=Roboto:wght@400;700&display=swap', array(), null);
}

add_action('wp_enqueue_scripts', 'grcb_google_fonts');

// Adiciona custom logo ao tema
add_theme_support('custom-logo');
add_theme_support('post-thumbnails');

// Pagination

/**
 * qrcb_pagination
 *
 * @param  mixed $mid
 * @param  mixed $end
 * @param  mixed $show
 * @param  mixed $query
 * @return void
 */
function qrcb_pagination($mid = 2, $end = 1, $show = false, $query = null)
{

    // Prevent show pagination number if Infinite Scroll of JetPack is active.
    if (!isset($_GET['infinity'])) {

        global $wp_query, $wp_rewrite;

        $total_pages = $wp_query->max_num_pages;

        if (is_object(
            $query
        ) && null != $query) {
            $total_pages = $query->max_num_pages;
        }

        if (
            $total_pages > 1
        ) {
            $url_base = $wp_rewrite->pagination_base;
            $big = 999999999;

            // Sets the paginate_links arguments.
            $arguments = apply_filters(
                'qrcb_pagination_args',
                array(
                    'base'      => esc_url_raw(str_replace($big, '%#%', get_pagenum_link($big, false))),
                    'format'    => '',
                    'current'   => max(1, get_query_var('paged')),
                    'total'     => $total_pages,
                    'show_all'  => $show,
                    'end_size'  => $end,
                    'mid_size'  => $mid,
                    'type'      => 'list',
                    'prev_text' => '&laquo;',
                    'next_text' => '&raquo;',
                )
            );

            $pagination = '<div class="pagination-wrap">' . paginate_links($arguments) . '</div>';

            // Prevents duplicate bars in the middle of the url.
            if ($url_base) {
                $pagination = str_replace('//' . $url_base . '/', '/' . $url_base . '/', $pagination);
            }

            return $pagination;
        }
    }
}

/**
 * qrcb_paging_nav
 *
 * @return void
 */
function qrcb_paging_nav()
{
    $mid  = 2;     // Total of items that will show along with the current page.
    $end  = 1;     // Total of items displayed for the last few pages.
    $show = false; // Show all items.

    echo qrcb_pagination($mid, $end, false);
}

// TGM
require_once 'tgm/tgm.php';

// Plugin Update
require 'plugin-update-checker-4.10/plugin-update-checker.php';

$updateChecker = Puc_v4_Factory::buildUpdateChecker(
    'https://raw.githubusercontent.com/IngoStramm/qrcode-blog/master/info.json',
    __FILE__,
    'qrcode-blog'
);