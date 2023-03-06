<?php
$value = themesflat_get_json('social_links');
$sharelink = themesflat_available_social_icons();
?>
<div class="social-share-article"><h6><?php echo esc_html__( 'Share:', 'hamela' ); ?></h6>
        
<ul class="themesflat-socials">
	 <?php
	foreach ( $value as $key => $val ) {
		if ( $key != '__ordering__') {
			$link = $sharelink[$key]['share_link'].get_the_permalink();
		    printf(
		        '<li class="%1$s">
		            <a href="%2$s" target="_blank" rel="alternate" title="%1$s">
		                <i class="fab fa-%4$s"></i>
		            </a>
		        </li>',
		        esc_attr( $key ),
		        esc_url( $link ),
		        esc_attr( $link ),
		        esc_attr( $key )
		    );
		}
	}
	    ?>
</ul>
</div>