<?php
/**
 * 
 * Theme Info wimpie Lite
 * 
 */

function wimpie_lite_customizer_themeinfo( $wp_customize ) {
	$wp_customize->add_section( 'theme_info' , array(
		'title'       => __( 'Theme Information' , 'wimpie-lite' ),
		'priority'    => 500,
		));

	$wp_customize->add_setting('theme_info_theme',array(
		'default' => '',
		'sanitize_callback' => 'wimpie_lite_sanitize_text',
		));

	$wimpie_lite_desc_theme_opt = "";
	$wimpie_lite_desc_theme_opt .= "<strong>".__('Need help?','wimpie-lite')."</strong><br />";
	$wimpie_lite_desc_theme_opt .= "<span>".__('View documentation','wimpie-lite').' : </span> <a target="_blank" href="'.esc_url('http://8degreethemes.com/documentation/wimpie-lite/').'">'.__('here','wimpie-lite').'</a> <br />';
	$wimpie_lite_desc_theme_opt .= "<span>".__('Support forum','wimpie-lite').' : </span><a target="_blank" href="'.esc_url('http://8degreethemes.com/support/forum/wimpie-lite/').'">'.__('here','wimpie-lite').'</a> <br />';
	$wimpie_lite_desc_theme_opt .= "<span>".__('View Video tutorials','wimpie-lite').' : </span><a target="_blank" href="'.esc_url('https://www.youtube.com/watch?list=PLyv2_zoytm1ifr1RwkKCsePhS6v5ynylV&v=HhSeA4TyvXQ').'">'.__('here','wimpie-lite').'</a> <br />';
	$wimpie_lite_desc_theme_opt .= "<span>".__('Email us','wimpie-lite').' : </span><a target="_blank" href="'.esc_url('mailto:support@8degreethemes.com').'">support@8degreethemes.com</a> <br />';
	$wimpie_lite_desc_theme_opt .= "<span>".__('More Details','wimpie-lite').' : </span><a target="_blank" href="'.esc_url('http://8degreethemes.com/').'">'.__('here','wimpie-lite').'</a><br/><strong class="customize-text_editor">'.__('WordPress Resources','wimpie-lite').'</strong><a target="_blank" class="red" href="'.esc_url('https://wpall.club/').'">'.__('WordPress Tutorials and Resources','wimpie-lite').'</a><a class="upgrade-pro" target="_blank" href="https://8degreethemes.com/wordpress-themes/wimpie-pro/"><img src="http://8degreethemes.com/demo/upgrade-wimpie-lite.jpg" alt="UPGRADE TO WIMPIE PRO" /></a>';

	$wimpie_lite_desc_theme_opt .= '<h1>Wimpie Pro Features:</h1><ul><li>Fully Customizer Based</li><li>Custom Logo option</li><li>Stat Counter</li><li>Testimonial Showcase</li><li>Access to Google Fonts</li><li>Social Icons</li><li>Multipurpose</li><li>Responsive Design</li><li>CSS3 Animations</li><li>WooCommerce Compatible</li><li>bbPress Friendly</li><li>Cross Browser Compatible</li><li>SEO Friendly</li><li>Easy and Detailed Documentation</li><li>Email Support</li><li>Dedicated Forum Support</li><li>Translation Ready</li><li>Sidebars</li><li>Multiple Column page/post</li><li>Typography Options</li><li>Multiple Slider Options</li><li>Portfolio Layouts</li><li>Team Layouts</li><li>Blog Layouts</li><li>Client Logo Settings</li><li>Call To Action</li><li>Google Map Options</li><li>Innerpage options</li><li>Enable Disable Sections on Homepage</li><li>Header Style and Colors Options</li><li>Page templates</li><li>Custom shortcodes</li><li>Custom Widgets</li><li>Wow Animation Effects</li><li>Background configuration options for all homepage sections</li><li>Breadcrumb Options</li><li>Text Length and Readmore buttons options</li><li>Custom Boxes for js and css</li><li>Pricing Table/Plans Table</li><li>One Click Demo Import</li></ul>';

	$wp_customize->add_control( new Wimpie_Lite_Theme_Info_Custom_Control( $wp_customize ,'theme_info_theme',array(
		'label' => __( 'About Wimpie Lite' , 'wimpie-lite' ),
		'section' => 'theme_info',
		'description' => $wimpie_lite_desc_theme_opt
		)));

}
add_action( 'customize_register', 'wimpie_lite_customizer_themeinfo' );


if(class_exists( 'WP_Customize_control')){

	class Wimpie_Lite_Theme_Info_Custom_Control extends WP_Customize_Control
	{
    	/**
       	* Render the content on the theme customizer page
       	*/
       	public function render_content()
       	{
       		?>
       		<label>
       			<strong class="customize-text_editor"><?php echo esc_html( $this->label ); ?></strong>
       			<br />
       			<span class="customize-text_editor_desc">
       				<?php echo wp_kses_post( $this->description ); ?>
       			</span>
       		</label>
       		<?php
       	}
    }//editor close
}//class close