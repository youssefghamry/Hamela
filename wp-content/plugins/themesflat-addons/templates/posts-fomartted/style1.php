<?php

use Elementor\Utils;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$query_args = tfl_get_query_args('post', 'category', $settings);
// The Query
$post_list_query = new \WP_Query($query_args);
global $themesflat_post_formatted;
$themesflat_post_formatted = 1;

echo '<div class="wrap-blog-articles">';

if (!empty($settings['tfl_title'])):
    echo '<' . $settings['tfl_title_tag'] . ' class="mb-5 post-formatted-section-title ' . $settings['tfl_align'] . '">';
    echo $settings['tfl_title'];
    echo '</' . $settings['tfl_title_tag'] . '>';
endif;


echo '<div class="blog-archive blog-formatted">';
while ($post_list_query->have_posts()) :
    $post_list_query->the_post();
    ?>


    <div class="item">
        <article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
            <div class="main-post entry-border <?php if($settings['show_date'] != 'yes') echo 'no-date'; ?>">
                <?php
                if ($settings['show_thumb'] == 'yes'):
                    get_template_part('tpl/feature-post');
                endif;
                ?>

                <div class="content-post">

                    <!-- Blog Grid -->
                    <?php if (themesflat_get_opt('blog_archive_layout') == 'blog-grid'): ?>
                        <div class="entry-box-title clearfix">
                            <div class="wrap-entry-title">
                                <?php
                                if ($settings['show_category'] == 'yes'):
                                    printf('<div class="meta-category-list">%s</div>', get_the_category_list(' '));
                                endif;

                                if (is_singular('post')) :
                                    the_title('<h1 class="entry-title">', '</h1>');
                                else :
                                    the_title(sprintf('<h4 class="entry-title"><a href="%s" rel="bookmark" title="%s">', esc_url(get_permalink()), get_the_title()), '</a></h4>');
                                endif;
                                ?>
                            </div><!-- /.wrap-entry-title -->
                        </div>
                    <?php endif; ?>

                    <?php if ($settings['show_desc'] == 'yes'): ?>
                        <div class="post-excerpt">
<!--                            the_excerpt();-->
                            <?php
                            the_excerpt();

//                            themesflat_render_post(themesflat_get_opt('blog_archive_layout'));
                            ?>
                        </div>
                    <?php endif; ?>

                </div><!-- /.entry-post -->

            </div><!-- /.main-post -->
        </article><!-- #post-## -->
    </div>


<?php
endwhile;
echo '</div>';

$themesflat_paging_for = 'blog';
$paged = get_query_var('paged') ? intval(get_query_var('paged')) : 1;
$pagenum_link = html_entity_decode(get_pagenum_link());
$query_args = array();
$url_parts = explode('?', $pagenum_link);
if (isset($url_parts[1])) {
    wp_parse_str($url_parts[1], $query_args);
}
$pagenum_link = remove_query_arg(array_keys($query_args), $pagenum_link);
$pagenum_link = trailingslashit($pagenum_link) . '%_%';
//$format  = $GLOBALS['wp_rewrite']->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
//$format .= $GLOBALS['wp_rewrite']->using_permalinks() ? user_trailingslashit( 'page/%#%', 'paged' ) : '?paged=%#%';

//get_template_part('tpl/pagination');
$numeric_links = paginate_links(array(
    'base' => $pagenum_link,
//    'format'   => $format,
    'total' => $post_list_query->max_num_pages,
    'current' => $paged,
    'mid_size' => 1,
    'add_args' => array_map('urlencode', $query_args),
    'prev_next' => true,
    'prev_text' => ('<i class="fa fa-angle-left"></i>'),
    'next_text' => ('<i class="fa fa-angle-right"></i>'),
));
if ($settings['show_pagination'] == 'yes'):
    ?>

    <nav class="navigation paging-navigation numeric <?php themesflat_esc_attr($themesflat_paging_for); ?>"
         role="navigation">
        <div class="pagination loop-pagination">
            <?php echo wp_kses($numeric_links, themesflat_kses_allowed_html()) ?>
        </div>
    </nav>
<?php endif; ?>

<?php wp_reset_postdata();

echo '</div>';