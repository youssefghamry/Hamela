<?php
/**
 * This class will be present an colorpicker control
 */
if (class_exists('WP_Customize_Control')) {

	class themesflat_Typography extends WP_Customize_Control {
		/**
		 * The control type
		 * 
		 * @var  string
		 */
		public $type = 'typography';
		public $fields = array(
			'family', 'size', 'style', 'subsets','color','line_height'
		);
		private $fonts = false;
		private $titles, $titles_subsets;
		private static $localize_enqueued = false;

		/**
		 * Enqueue assets for this control
		 * 
		 * @return  void
		 */
		
		/**
		 * Render the control markup
		 * 
		 * @return  void
		 */
		public function render() {
			$id    = 'themesflat-options-control-' . $this->id;
			$class = 'themesflat-options-control themesflat-options-control-' . $this->type;

			if ( $this->value() )
				$this->class = 'active';

			if ( ! empty( $this->class ) )
				$class .= " {$this->class}";

			if ( empty( $this->label ) )
				$class .= ' no-label';

			?><li id="<?php themesflat_esc_attr( $id ); ?>" class="<?php themesflat_esc_attr( $class ) ?>">
				<?php $this->render_content(); ?>
			</li><?php
		}

		public function render_content() {
			$this->titles = array(
				'100'        => esc_html__( 'Thin 100', 'hamela' ),
				'100italic'  => esc_html__( 'Thin 100 italic', 'hamela' ),
				'200'        => esc_html__( 'Extra-light 200', 'hamela' ),
				'200italic'  => esc_html__( 'Extra-light 200 italic', 'hamela' ),
				'300'        => esc_html__( 'Light 300', 'hamela' ),
				'300italic'  => esc_html__( 'Light 300 italic', 'hamela' ),
				'400'        => esc_html__( 'Normal 400', 'hamela' ),
				'400italic'  => esc_html__( 'Normal 400 italic', 'hamela' ),
				'regular'    => esc_html__( 'Normal 400', 'hamela' ),
				'italic'     => esc_html__( 'Normal 400 italic', 'hamela' ),
				'500'        => esc_html__( 'Medium 500', 'hamela' ),
				'500italic'  => esc_html__( 'Medium 500 italic', 'hamela' ),
				'600'        => esc_html__( 'Semi-bold 600', 'hamela' ),
				'600italic'  => esc_html__( 'Semi-bold 600 italic', 'hamela' ),
				'700'        => esc_html__( 'Bold 700', 'hamela' ),
				'700italic'  => esc_html__( 'Bold 700 italic', 'hamela' ),
				'800'        => esc_html__( 'Extra-bold 800', 'hamela' ),
				'800italic'  => esc_html__( 'Extra-bold 800 italic', 'hamela' ),
				'900'        => esc_html__( 'Ultra-bold 900', 'hamela' ),
				'900itallic' => esc_html__( 'Ultra-bold 900 italic', 'hamela' )
			);

			$this->titles_subsets = array(
				"cyrillic-ext"  => esc_html__("Cyrillic Extended",'hamela'),
			    "greek" 		=> esc_html__("Greek",'hamela'),
			    "greek-ext"		=>	esc_html__("Greek Extended",'hamela'),
			    "latin-ext"		=>	esc_html__("Latin Extended",'hamela'),
			    "cyrillic"		=>	esc_html__("Cyrillic",'hamela'),
			    "vietnamese"	=>	esc_html__("Vietnamese",'hamela'),
			    "latin" 		=> esc_html__("Latin",'hamela')
				);

			$name = '_themesflat-options-control-typography-' . $this->id;
			$values = $this->value();
			$fonts_json = $this->get_fonts();
			if ( ! is_array( $values ) ) {
				$decoded_value = json_decode(str_replace('&quot;', '"', $values), true );
				$values = is_array( $decoded_value ) ? $decoded_value : array();
			}
			$index = '';
			?>
			
			<div class="themesflat-options-control-inputs">					
				<?php if ( in_array( 'family', $this->fields ) ): ?>
				<div class="themesflat-options-control-chosen typography-font">
					<div class="themesflat-options-control-title">
						<label for="<?php themesflat_esc_attr( $name ) ?>-family"><?php esc_html_e( 'Font Family', 'hamela' ) ?></label>
					</div>
					<div class="themesflat-options-control-inputs">
						<select name="<?php themesflat_esc_attr( $name ) ?>[family]" id="<?php themesflat_esc_attr( $name ) ?>-family" class="select-choosen" >
							<optgroup label="<?php themesflat_esc_html( 'Google Fonts', 'hamela' ) ?>">
								<?php foreach ($fonts_json as $key => $fonts ): 
										foreach ($fonts as $id => $font ):											
										?>
										<?php if( strcmp($font['family'],$values['family']) == 0 ){ $index = $id; }
										?>
										<option value="<?php themesflat_esc_attr( $font['family'] ) ?>" data_variants='<?php echo json_encode($font['variants']);?>' data_subsets='<?php echo json_encode($font['subsets']);?>' <?php selected($font['family'], $values['family']) ?> ><?php themesflat_esc_html( $font['family'] ) ?></option>
								<?php endforeach; endforeach; ?>
							</optgroup>
						</select>
					</div>
				</div>
				<!-- /family -->
				<?php endif;?>
				
				<div class="themesflat-options-control-chosen typography-style">
					<div class="themesflat-options-control-title">
						<label><?php esc_html_e( 'Font Weight & Style', 'hamela' ) ?></label>
					</div>
					<div class="themesflat-options-control-inputs">
						<label>
							<select name="<?php themesflat_esc_attr($name);?>[style]" id="<?php themesflat_esc_attr( $name ) ?>-style" class="selectpicker" data-live-search="true">
							    <?php foreach ($fonts_json as $key => $fonts ): 
										foreach ($fonts as $id => $font ):											
							    			if (strtolower(ucwords(str_replace(" ", "-", $font['family']))) == $index) {
							    				foreach ($font['variants'] as $font_weight ):
							    					?>
													<option value="<?php themesflat_esc_attr( $font_weight ) ?>" <?php selected( $font_weight, $values['style'] ) ?> >
														<?php

															if ( isset( $this->titles[$font_weight] ) )
																themesflat_esc_html( $this->titles[$font_weight] );
															else
																themesflat_esc_html( $font_weight );
														?>
													</option>
						    						<?php
						    					endforeach;
						    				}							    			
							    		?>											
								<?php endforeach; endforeach; ?>
							</select>
						</label>
					</div>
				</div>
				<!-- /font-weight -->

				<?php if ( in_array( 'subsets', $this->fields ) ): ?>
					<div class="themesflat-options-control typography-subsets themesflat-options-control-switcher active">
						<div class="themesflat-options-control-title">
							<label><?php esc_html_e( 'Font subsets', 'hamela' ) ?></label>
						</div>
						<div class="themesflat-options-control-inputs">
						    <?php foreach ($fonts[$index]->subsets as $id => $subset):?>

								<label class="_options-switcher-subsets">
									<span class="themesflat-options-control-title"><?php
												if ( isset( $this->titles_subsets[$subset] ) )
													themesflat_esc_html( $this->titles_subsets[$subset] );
												else
													themesflat_esc_html( $subset );
											?></span>
									<input type="checkbox" <?php if(isset($values['subsets'])){checked(in_array($subset,$values['subsets']));}?> value="<?php themesflat_esc_attr($subset);?>" name="<?php themesflat_esc_attr($name);?>[subsets]">
									<span class="themesflat-options-control-indicator">
										<span></span>
									</span>
								</label>
							<?php endforeach;?>
						</div>
					</div>
				<?php endif;?>
					<!-- /font-subsets -->

				<?php if ( in_array( 'size', $this->fields ) ): ?>
				<div class="typography-size">
					<div class="themesflat-options-control-title">
						<label for="<?php themesflat_esc_attr( $name ) ?>-size"><?php esc_html_e( 'Font Size (px)', 'hamela' ) ?></label>
					</div>
					<div class="themesflat-options-control-inputs">
						<input type="text" name="<?php themesflat_esc_attr( $name ) ?>[size]" value="<?php themesflat_esc_attr( $values['size'] ) ?>" id="<?php themesflat_esc_attr( $name ) ?>-size" />
					</div>
				</div>
				<!-- /size -->
				<?php endif ?>

				<?php if ( in_array( 'line_height', $this->fields ) ): ?>
				<div class="typography-line_height">
					<div class="themesflat-options-control-title">
						<label for="<?php themesflat_esc_attr( $name ) ?>-line_height"><?php esc_html_e( 'Line height (ex: 25px or 1.8 or 150%)', 'hamela' ) ?></label>
					</div>
					<div class="themesflat-options-control-inputs">
						<input type="text" name="<?php themesflat_esc_attr( $name ) ?>[line_height]" value="<?php themesflat_esc_attr( $values['line_height'] ) ?>" id="<?php themesflat_esc_attr( $name ) ?>-line_height" />
					</div>
				</div>
				<!-- /size -->
				<?php endif ?>				

				<?php if ( in_array( 'color', $this->fields ) ): ?>
				<div class="themesflat-options-control-color-picker typography-color">
					<div class="themesflat-options-control-title">
						<label><?php esc_html_e( 'Font Color', 'hamela' ) ?></label>
					</div>
					<div class="themesflat-options-control-inputs">
						<div class="themesflat-options-control-color-picker">
							<div class="themesflat-options-control-inputs">
							<input type="hidden" class="choose-color"></input>
								<input type="text" class='themesflat-color-picker wp-color-picker' id="<?php themesflat_esc_attr( $name ) ?>-color" data-default-color="<?php themesflat_esc_attr( $values['default_color'] ) ;?>" value="<?php themesflat_esc_attr( $values['color'] ) ;?>" name="<?php themesflat_esc_attr($name);?>[color]" />
								
							</div>
						</div>
					</div>
				</div>
				<?php endif ?>

				<input type="hidden" id="typography-value"  name="<?php themesflat_esc_attr($name);?>" <?php $this->link();?>  value="<?php themesflat_esc_attr (  $values ) ;?>" />
				<input type="hidden" id="datas" data_subsets='<?php echo json_encode($this->titles_subsets);?>' data_variants = '<?php echo json_encode($this->titles);?>'/>
			</div>
		
		<?php
	}
		public function get_contents($fontFile) {
			ob_start();
			include  $fontFile;
			$file = ob_get_contents();
			ob_end_clean();
			return $file;
		}

	    public function get_fonts( $amount = 300 ) {
	    	require_once ABSPATH . 'wp-admin/includes/file.php';
	        global $wp_filesystem;
	        $fonts_array = array();
			$json_dir = THEMESFLAT_DIR. '/fonts';
			$access_type = get_filesystem_method(array(),$json_dir);
			if ( 'direct' === $access_type ) {
				$creds = request_filesystem_credentials( $json_dir, '', false, false, array() );
				if ( ! WP_Filesystem( $creds ) ) {
					return false;
				} 

				global $wp_filesystem;

				$dir = $wp_filesystem->find_folder($json_dir);
				$file = trailingslashit($dir) . 'google-fonts.json';

				if($wp_filesystem->exists($file)) {
					$google_fonts_json = $wp_filesystem->get_contents($file);
					$google_fonts_array = json_decode($google_fonts_json, true);
					foreach ( $google_fonts_array as $key => $value ) {
						if ( is_array($value) ) {
							foreach ( $value as $key2 => $value2 ) {
								$font_key = str_replace(' ', '-', strtolower($value2['family']));
								$fonts_array[] = array( 
									$font_key => array(
										'family' => $value2['family'],
										'variants' => $value2['variants'],
										'subsets' => $value2['subsets']
									)
								);
							}
						}
					}
				}
			}
			return $fonts_array;

	    }
	}
}