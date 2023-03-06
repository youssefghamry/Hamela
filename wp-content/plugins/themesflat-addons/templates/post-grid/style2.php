<?php

use Elementor\Utils;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}
$query_args = tfl_get_query_args('post', 'category', $settings);

// The Query
$post_list_query = new \WP_Query($query_args);

echo '<div class="tfl-posts-grid">';

if (!empty($settings['tfl_title'])):
    echo '<' . $settings['tfl_title_tag'] . ' class="section-title mb-5 ' . $settings['tfl_align'] . '">';
    echo $settings['tfl_title'];
    echo '</' . $settings['tfl_title_tag'] . '>';
endif;

$arrCols = array(
    2 => 'blog-two-columns',
    3 => 'blog-three-columns',
    4 => 'blog-four-columns',
);


echo '<div class="wrap-blog-article blog-archive blog-grid style2 ' . $arrCols[$settings['grid_columns']] . ' has-post-content">';
while ($post_list_query->have_posts()) :
    $post_list_query->the_post();
    ?>


    <div class="item">
        <article id="post-<?php the_ID(); ?>" <?php post_class('blog-post'); ?>>
            <div class="main-post entry-border">

                <div class="featured-post">
                    <?php

                    $themesflat_thumbnail = $settings['post_lists_size_size'];
                    if ($settings['post_lists_size_size'] == 'custom') {
                        $size = array_values($settings['post_lists_size_custom_dimension']);
                    } else {
                        $size = $themesflat_thumbnail;
                    }

                    $feature_post = get_the_post_thumbnail(get_the_ID(), $size);

                    if ($feature_post && $settings['show_thumb'] == 'yes') echo $feature_post;


                    if ($settings['show_date'] == 'yes'):
                        ?>
                        <div class="post-date">
                            <?php
                            $archive_year  = get_the_time('Y'); 
                            $archive_month = get_the_time('m'); 
                            $archive_day   = get_the_time('d'); 
                            ?>
                            <i class="far fa-calendar-alt"></i>
                            <a href="<?php echo get_day_link( $archive_year, $archive_month, $archive_day); ?>"><?php echo get_the_date();?></a>            
                        </div>
                        <?php
                    endif;
                    ?>
                    <div class="overlay"></div>
                </div>

                <div class="content-post">

                    <!-- Blog Grid -->

                    <div class="entry-box-title clearfix">
                        <div class="wrap-entry-title">
                            <?php

                            printf(
                            '<span class="post-author"><span class="author"><i class="far fa-user"></i><a href="%s" title="%s" rel="author">%s %s</a></span></span>',                            
                            esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) )),                            
                            esc_attr( sprintf( esc_html__( 'View all posts by %s', 'hamela' ), get_the_author() ) ), esc_html__('BY','themesflat-addons'), get_the_author() );

                            if ($settings['show_category'] == 'yes'):
                                printf('<span class="meta-category-list"><i class="far fa-folder-open"></i> %s</span>', get_the_category_list(' '));
                            endif;

                            if (is_singular('post')) :
                                the_title('<h1 class="entry-title">', '</h1>');
                            else :
                                the_title(sprintf('<h5 class="entry-title %s"><a href="%s" rel="bookmark" title="%s">',$settings['tfl_title_align'], esc_url(get_permalink()), get_the_title()), '</a></h5>');
                            endif;
                            ?>
                        </div><!-- /.wrap-entry-title -->
                    </div>

                    <div class="content-post-inner <?php echo $settings['tfl_desc_align']; ?>">
                        <?php
                        if ($settings['show_desc'] == 'yes'):
                            the_excerpt();
                        endif;
                        ?>
                    </div>

                </div><!-- /.entry-post -->

            </div><!-- /.main-post -->
        </article><!-- #post-## -->
    </div>


<?php
endwhile;
echo '</div>'; // end .wrap-blog-article

echo '</div>'; // end .tfl-posts-grid


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

<?php wp_reset_postdata(); ?>

