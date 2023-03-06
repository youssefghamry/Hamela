<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package hamela
 */

get_header(); ?>

	<div class="row">
		<div class="col-md-12">
			<div id="primary" class="fullwidth-404">
				<main id="main" class="main-content" role="main">
					<section class="error-404 not-found">
						<div class="error-box-404 vertical-center">
							<div class="error-box text-center">
								<div class="error-404-text">
									<h1 class="bg-404 clip-text"><?php esc_html_e( '404', 'hamela' ); ?></h1>
									<h4><span><?php esc_html_e( 'Oops,', 'hamela' ); ?></span> <?php esc_html_e( 'This Page Could Not Be Found!', 'hamela' ); ?></h4>
								</div>
								
								<div class="wrap-button-404">
                                    <div class="tfl-button tfl-style1 tfl-align-left mt-5">
                                        <div class="tfl-content-wrapper">
                                            <a href="<?php echo esc_url( home_url('/') ); ?>">
                                                <span class="text"> <?php esc_html_e( 'Back To Home Page','hamela' ) ?></span>
                                                <span class="icon"><i class="fas fa-plus"></i></span>
                                            </a>
                                        </div>
                                    </div>
								</div>
							</div>
						</div>
					</section><!-- .error-404 -->
				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!-- /.col-md-12 -->
	</div><!-- /.row -->

<?php get_footer(); ?>