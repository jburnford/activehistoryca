<?php

if ( ! class_exists( 'WP_Customize_Control' ) )
    return NULL;

/**
 * A class to create about us content
 */
class Hamza_Lite_About_Us extends WP_Customize_Control
{

    /**
     * Render the content of about us
     *
     * @return HTML
     */
    public function render_content()
    {
        $hamza_lite_eightdegree_link = esc_url('http://8degreethemes.com');

        $hamza_lite_return = '<p>';
        $hamza_lite_return .= __('Hamza Lite - is a FREE WordPress theme by', 'hamza-lite'); 
        $hamza_lite_return .= '<a target="_blank" href="'.$hamza_lite_eightdegree_link.'">';
        $hamza_lite_return .= __(' 8Degree Themes ', 'hamza-lite');
        $hamza_lite_return .= '</a>'; 
        $hamza_lite_return .= __('- A WordPress Division of 8Degree.', 'hamza-lite');
        $hamza_lite_return .= '</p>';            
        
        $hamza_lite_desc_theme_opt = "<span class='customize-text_editor_desc'>";
        $hamza_lite_desc_theme_opt .= "<strong>".__('Need help?','hamza-lite')."</strong><br />";
        $hamza_lite_desc_theme_opt .= "<span>".__('View documentation','hamza-lite').' : </span> <a target="_blank" href="'.esc_url('http://8degreethemes.com/documentation/hamza-lite/').'">'.__('here','hamza-lite').'</a> <br />';
        $hamza_lite_desc_theme_opt .= "<span>".__('Support forum','hamza-lite').' : </span><a target="_blank" href="'.esc_url('http://8degreethemes.com/support/forum/hamza-lite/').'">'.__('here','hamza-lite').'</a> <br />';
        $hamza_lite_desc_theme_opt .= "<span>".__('View Video tutorials','hamza-lite').' : </span><a target="_blank" href="'.esc_url('https://www.youtube.com/watch?list=PLyv2_zoytm1ifr1RwkKCsePhS6v5ynylV&v=HhSeA4TyvXQ').'">'.__('here','hamza-lite').'</a> <br />';
        $hamza_lite_desc_theme_opt .= "<span>".__('Email us','hamza-lite').' : </span><a target="_blank" href="'.esc_url('mailto:support@8degreethemes.com').'">support@8degreethemes.com</a> <br />';
        $hamza_lite_desc_theme_opt .= "<span>".__('More Details','hamza-lite').' : </span><a target="_blank" href="'.esc_url('http://8degreethemes.com/').'">'.__('here','hamza-lite').'</a><br />';

        $hamza_lite_desc_theme_opt .= '<a class="upgrade-pro" target="_blank" href="https://8degreethemes.com/wordpress-themes/hamza-pro/"><img src="http://8degreethemes.com/demo/upgrade-hamza-lite.jpg" alt="UPGRADE TO HAMZA PRO" /></a><strong class="customize-text_editor">'.__('WordPress Resources','hamza-lite').'</strong><a target="_blank" class="red" href="'.esc_url('https://wpall.club/').'">'.__('WordPress Tutorials and Resources','hamza-lite').'</a> <br />';

        $hamza_lite_desc_theme_opt .= "</span>";

        $hamza_lite_return .= $hamza_lite_desc_theme_opt;
        echo $hamza_lite_return;
    }
}
?>