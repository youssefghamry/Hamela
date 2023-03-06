<?php

use Elementor\Utils;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

// list($animate_class, $animation_attr) = tfl_get_animation_atts($settings['widget_animation']);



//var_dump(get_the_ID());
$post_id = get_the_ID();
$author_id = get_post_field( 'post_author', $post_id );
$author_name = get_the_author_meta( 'display_name', $author_id );

$author_image = get_avatar_url($author_id);
?>
<!---->
<!--<div class="tfl-button tfl---><?php //echo $settings['style']; ?><!-- tfl-align--><?php ////echo $settings['align']; ?><!-- --><?php ////echo $animate_class; ?><!--" --><?php ////echo $animation_attr; ?><!---->
<!--    <div class="tfl-content-wrapper">-->
<!--        <a href="--><?php //echo $settings['link']['url']; ?><!--">-->
<!--        	<span class="text"> --><?php //echo $settings['button_text']; ?><!--</span>-->
<!--            <span class="icon"><i class="fas fa-plus"></i></span>-->
<!--        </a>-->
<!--    </div>-->
<!--</div>-->


<div class="box-author wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">
    <div class="img-author">
        <img src="<?php echo $author_image; ?>" alt="">
        <ul>
            <li class="fb-author"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
        </ul>
    </div>
    <h5 class="name "><?php echo $author_name; ?></h5>
    <p class="text">“Praesent scelerisque, odio eu fermentum malesuada, nisi arcu volutpat nisl, sit amet convallis scelerisque, odio eu nun”</p>
    <hr>
    <ul class="list-social">
        <li><a href="#"><i class="fab fa-instagram"></i></a></li>
        <li><a href="#"><i class="fab fa-behance"></i></a></li>
        <li class="none"><a href="#"><i class="fab fa-dribbble"></i></a></li>
    </ul>
</div>