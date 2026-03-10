<?php
/**
 * SeaSun Theme Customizer.
 * @package SeaSun
 * @since SeaSun 2.0.0
*/

/**
 * Default values - backwards compatibility for older SeaSun versions.
 *  
*/ 
function seasun_default_options($key) {

$seasun_theme_options = get_option('seasun_options');

/* Define the array of defaults */ 
$seasun_defaults = array(
			'seasun_css' => 'Blue (default)',
			'seasun_layout_width' => 'Wide (1170 px)',
			'seasun_display_sidebar' => 'Display',
			'seasun_display_sidebar_archives' => 'Hide',
			'seasun_display_breadcrumb' => 'Display',
			'seasun_header_layout' => 'Centered',
			'seasun_display_header_image' => 'Everywhere',
			'seasun_page_title_width' => '50',
			'seasun_header_menu_width' => '50',
			'seasun_logo_url' => '',
			'seasun_header_image_headline' => '',
			'seasun_header_image_link_url' => '',
			'seasun_header_image_link_text' => '',
			'seasun_display_site_description' => 'Display',
			'seasun_display_image_post' => 'Display',
			'seasun_display_meta_post' => 'Display',
			'seasun_next_preview_post' => 'Display',
			'seasun_display_image_page' => 'Display',
			'seasun_post_entry_format' => 'Grid - Masonry',
			'seasun_display_meta_post_entry' => 'Display',
			'seasun_content_archives' => 'Excerpt',
			'seasun_body_google_fonts' => 'default',
			'seasun_headings_google_fonts' => 'default',
			'seasun_description_google_fonts' => 'default',
			'seasun_headline_google_fonts' => 'default',
			'seasun_postentry_google_fonts' => 'default',
			'seasun_sidebar_google_fonts' => 'default',
			'seasun_menu_google_fonts' => 'default',
      'seasun_top_menu_google_fonts' => 'default',
      'seasun_header_facebook_link' => '',
      'seasun_header_twitter_link' => '',
      'seasun_header_google_link' => '',
      'seasun_header_rss_link' => '',
			'seasun_own_css' => '' );

$seasun_theme_options = wp_parse_args( $seasun_theme_options, $seasun_defaults );

if ( isset($seasun_theme_options[$key]) ) {
return $seasun_theme_options[$key]; } else {
return false;
}}

/**
 * Register Customizer sections and options.
 *  
*/
function seasun_customize_register($wp_customize){

$seasun_fonts = array(
			'default' => 'default',	
			'Abel' => 'Abel',			
			'Aclonica' => 'Aclonica',
			'Actor' => 'Actor',
			'Adamina' => 'Adamina',
			'Aldrich' => 'Aldrich',
			'Alice' => 'Alice',
			'Alike' => 'Alike',
			'Allan' => 'Allan',
			'Allerta' => 'Allerta',
      'Amarante' => 'Amarante',
			'Amaranth' => 'Amaranth',
      'Andika' => 'Andika',
			'Antic' => 'Antic',
			'Arimo' => 'Arimo',	
			'Artifika' => 'Artifika',
			'Arvo' => 'Arvo',
			'Brawler' => 'Brawler',
			'Buda' => 'Buda',	
      'Butcherman' => 'Butcherman',	
			'Cantarell' => 'Cantarell',	
      'Cherry Swash' => 'Cherry Swash',				
			'Chivo' => 'Chivo',			
			'Coda' => 'Coda',	
      'Concert One' => 'Concert One',		
			'Copse' => 'Copse',
			'Corben' => 'Corben',
			'Cousine' => 'Cousine',			
			'Coustard' => 'Coustard',
			'Covered By Your Grace' => 'Covered By Your Grace',
			'Crafty Girls' => 'Crafty Girls',
			'Crimson Text' => 'Crimson Text',
			'Crushed' => 'Crushed',
			'Cuprum' => 'Cuprum',
			'Damion' => 'Damion',
			'Dancing Script' => 'Dancing Script',
			'Dawning of a New Day' => 'Dawning of a New Day',
			'Days One' => 'Days One',
			'Delius' => 'Delius',
			'Delius Swash Caps' => 'Delius Swash Caps',
			'Delius Unicase' => 'Delius Unicase',
			'Didact Gothic' => 'Didact Gothic',
			'Dorsa' => 'Dorsa',
			'Droid Sans' => 'Droid Sans',
			'Droid Sans Mono' => 'Droid Sans Mono',
      'Droid Serif' => 'Droid Serif',
			'EB Garamond' => 'EB Garamond',
			'Expletus Sans' => 'Expletus Sans',
			'Fanwood Text' => 'Fanwood Text',
			'Federo' => 'Federo',
			'Fontdiner Swanky' => 'Fontdiner Swanky',
			'Forum' => 'Forum',
			'Francois One' => 'Francois One',
			'Gentium Basic' => 'Gentium Basic',
			'Gentium Book Basic' => 'Gentium Book Basic',
			'Geo' => 'Geo',
			'Geostar' => 'Geostar',
			'Geostar Fill' => 'Geostar Fill',
      'Gilda Display' => 'Gilda Display',
			'Give You Glory' => 'Give You Glory',
			'Gloria Hallelujah' => 'Gloria Hallelujah',
			'Goblin One' => 'Goblin One',
			'Goudy Bookletter 1911' => 'Goudy Bookletter 1911',
			'Gravitas One' => 'Gravitas One',
			'Gruppo' => 'Gruppo',
			'Hammersmith One' => 'Hammersmith One',
			'Holtwood One SC' => 'Holtwood One SC',
			'Homemade Apple' => 'Homemade Apple',
			'Inconsolata' => 'Inconsolata',
			'Indie Flower' => 'Indie Flower',
      'IM Fell English' => 'IM Fell English',
			'Irish Grover' => 'Irish Grover',
			'Irish Growler' => 'Irish Growler',
			'Istok Web' => 'Istok Web',
			'Judson' => 'Judson',
			'Julee' => 'Julee',
			'Just Another Hand' => 'Just Another Hand',
			'Just Me Again Down Here' => 'Just Me Again Down Here',
			'Kameron' => 'Kameron',
			'Kelly Slab' => 'Kelly Slab',
			'Kenia' => 'Kenia',
			'Kranky' => 'Kranky',
			'Kreon' => 'Kreon',
			'Kristi' => 'Kristi',
			'La Belle Aurore' => 'La Belle Aurore',
      'Lato' => 'Lato',
			'League Script' => 'League Script',
			'Leckerli One' => 'Leckerli One',
			'Lekton' => 'Lekton',
      'Lily Script One' => 'Lily Script One',
			'Limelight' => 'Limelight',
			'Lobster' => 'Lobster',
			'Lobster Two' => 'Lobster Two',
			'Lora' => 'Lora',
			'Love Ya Like A Sister' => 'Love Ya Like A Sister',
			'Loved by the King' => 'Loved by the King',
      'Lovers Quarrel' => 'Lovers Quarrel',
			'Luckiest Guy' => 'Luckiest Guy',
			'Maiden Orange' => 'Maiden Orange',
			'Mako' => 'Mako',
			'Marvel' => 'Marvel',
			'Maven Pro' => 'Maven Pro',
			'Meddon' => 'Meddon',
			'MedievalSharp' => 'MedievalSharp',
      'Medula One' => 'Medula One',
			'Megrim' => 'Megrim',
			'Merienda One' => 'Merienda One',
			'Merriweather' => 'Merriweather',
			'Metrophobic' => 'Metrophobic',
			'Michroma' => 'Michroma',
			'Miltonian Tattoo' => 'Miltonian Tattoo',
			'Miltonian' => 'Miltonian',
			'Modern Antiqua' => 'Modern Antiqua',
			'Molengo' => 'Molengo',
      'Monofett' => 'Monofett',
			'Monoton' => 'Monoton',
      'Montaga' => 'Montaga',
			'Montez' => 'Montez',
      'Montserrat' => 'Montserrat',
			'Mountains of Christmas' => 'Mountains of Christmas',
			'Muli' => 'Muli',
			'Neucha' => 'Neucha',
			'Neuton' => 'Neuton',
			'News Cycle' => 'News Cycle',
			'Nixie One' => 'Nixie One',
			'Nobile' => 'Nobile',
			'Nova Cut' => 'Nova Cut',
			'Nova Flat' => 'Nova Flat',
			'Nova Mono' => 'Nova Mono',
			'Nova Oval' => 'Nova Oval',
			'Nova Round' => 'Nova Round',
			'Nova Script' => 'Nova Script',
			'Nova Slim' => 'Nova Slim',
			'Nova Square' => 'Nova Square',
			'Numans' => 'Numans',
			'Nunito' => 'Nunito',
      'Open Sans' => 'Open Sans',
			'Oswald' => 'Oswald',
			'Over the Rainbow' => 'Over the Rainbow',
			'Ovo' => 'Ovo',
			'Pacifico' => 'Pacifico',
			'Passero One' => 'Passero One',
			'Patrick Hand' => 'Patrick Hand',
			'Paytone One' => 'Paytone One',
			'Permanent Marker' => 'Permanent Marker',
			'Philosopher' => 'Philosopher',
			'Play' => 'Play',
			'Playfair Display' => 'Playfair Display',
			'Podkova' => 'Podkova',
			'Poller One' => 'Poller One',
			'Pompiere' => 'Pompiere',
			'Prata' => 'Prata',
			'Prociono' => 'Prociono',
			'PT Sans' => 'PT Sans',
			'PT Sans Caption' => 'PT Sans Caption',
			'PT Sans Narrow' => 'PT Sans Narrow',
			'PT Serif' => 'PT Serif',
			'PT Serif Caption' => 'PT Serif Caption',
			'Puritan' => 'Puritan',
			'Quattrocento' => 'Quattrocento',
			'Quattrocento Sans' => 'Quattrocento Sans',
			'Questrial' => 'Questrial',
			'Radley' => 'Radley',
			'Raleway' => 'Raleway', 
      'Rationale' => 'Rationale',
			'Redressed' => 'Redressed',
      'Reenie Beanie' => 'Reenie Beanie', 
      'Roboto' => 'Roboto',
      'Roboto Condensed' => 'Roboto Condensed',
			'Rock Salt' => 'Rock Salt',
			'Rochester' => 'Rochester',
			'Rokkitt' => 'Rokkitt',
			'Rosario' => 'Rosario',
			'Ruslan Display' => 'Ruslan Display',
      'Sancreek' => 'Sancreek',
			'Sansita One' => 'Sansita One',
			'Schoolbell' => 'Schoolbell',
			'Shadows Into Light' => 'Shadows Into Light',
			'Shanti' => 'Shanti',
			'Short Stack' => 'Short Stack',
			'Sigmar One' => 'Sigmar One',
			'Six Caps' => 'Six Caps',
			'Slackey' => 'Slackey',
			'Smokum' => 'Smokum',
			'Smythe' => 'Smythe',
			'Sniglet' => 'Sniglet',
			'Snippet' => 'Snippet',
			'Sorts Mill Goudy' => 'Sorts Mill Goudy',
			'Special Elite' => 'Special Elite',
			'Spinnaker' => 'Spinnaker',
			'Stardos Stencil' => 'Stardos Stencil',
			'Sue Ellen Francisco' => 'Sue Ellen Francisco',
			'Sunshiney' => 'Sunshiney',
			'Swanky and Moo Moo' => 'Swanky and Moo Moo',
			'Syncopate' => 'Syncopate',
			'Tangerine' => 'Tangerine',
			'Tenor Sans' => 'Tenor Sans',
			'Terminal Dosis Light' => 'Terminal Dosis Light',
			'Tinos' => 'Tinos',
			'Tulpen One' => 'Tulpen One',
			'Ubuntu' => 'Ubuntu',
			'Ultra' => 'Ultra',
      'UnifrakturCook' => 'UnifrakturCook',
			'UnifrakturMaguntia' => 'UnifrakturMaguntia',
      'Unkempt' => 'Unkempt',
			'Unna' => 'Unna',
			'Varela' => 'Varela',
			'Varela Round' => 'Varela Round',
			'Vibur' => 'Vibur',
			'Vidaloka' => 'Vidaloka',
			'Volkhov' => 'Volkhov',
			'Vollkorn' => 'Vollkorn',
			'Voltaire' => 'Voltaire',
			'VT323' => 'VT323',
			'Waiting for the Sunrise' => 'Waiting for the Sunrise',
			'Wallpoet' => 'Wallpoet',
			'Walter Turncoat' => 'Walter Turncoat',
			'Wire One' => 'Wire One',
			'Yanone Kaffeesatz' => 'Yanone Kaffeesatz',
			'Yellowtail' => 'Yellowtail',
			'Yeseva One' => 'Yeseva One',
			'Zeyada' => 'Zeyada');
      
/**
 * Textarea custom control.
 *  
*/ 
class seasun_customize_textarea_control extends WP_Customize_Control {
    public $type = 'textarea'; 
    public function render_content() { ?>
        <label>
        <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
        <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
        </label>
<?php }}

/**
 * Sections and Options.
 *  
*/     
    $wp_customize->add_section('seasun_general_settings', array(
        'title'    => __('SeaSun General Settings', 'seasun'),
        'description' => '',
        'priority' => 120,
    ));
    $wp_customize->add_section('seasun_header_settings', array(
        'title'    => __('SeaSun Header Settings', 'seasun'),
        'description' => '',
        'priority' => 130,
    ));
    $wp_customize->add_section('seasun_posts_settings', array(
        'title'    => __('SeaSun Posts/Pages Settings', 'seasun'),
        'description' => '',
        'priority' => 140,
    ));
    $wp_customize->add_section('seasun_post_entries_settings', array(
        'title'    => __('SeaSun Post Entries Settings', 'seasun'),
        'description' => '',
        'priority' => 150,
    ));
    $wp_customize->add_section('seasun_font_settings', array(
        'title'    => __('SeaSun Font Settings', 'seasun'),
        'description' => '',
        'priority' => 160,
    ));
 
    //  =============================
    //  = Color Scheme              =
    //  =============================
    $wp_customize->add_setting('seasun_css', array(
        'default'        => seasun_default_options('seasun_css'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'seasun_sanitize_text',
    ));
 
    $wp_customize->add_control('seasun_css_control', array(
        'label'      => __('Color Scheme', 'seasun'),
        'section'    => 'seasun_general_settings',
        'settings'   => 'seasun_css',
        'type'       => 'radio',
        'choices'    => array(
            'Blue (default)' => __( 'Blue (default)' , 'seasun' ),
            'Green' => __( 'Green' , 'seasun' ),
            'Red' => __( 'Red' , 'seasun' ),
        ),
    ));
    
    //  =============================
    //  = Layout Width              =
    //  =============================
    $wp_customize->add_setting('seasun_layout_width', array(
        'default'        => seasun_default_options('seasun_layout_width'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'seasun_sanitize_text',
    ));
 
    $wp_customize->add_control('seasun_layout_width_control', array(
        'label'      => __('Layout Width', 'seasun'),
        'section'    => 'seasun_general_settings',
        'settings'   => 'seasun_layout_width',
        'type'       => 'radio',
        'choices'    => array(
            'Wide (1170 px)' => __( 'Wide (1170 px)' , 'seasun' ),
            'Thin (960 px)' => __( 'Thin (960 px)' , 'seasun' ),
        ),
    ));
    
    //  ==================================
    //  = Display Sidebar on Posts/Pages =
    //  ==================================
    $wp_customize->add_setting('seasun_display_sidebar', array(
        'default'        => seasun_default_options('seasun_display_sidebar'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'seasun_sanitize_text',
    ));
 
    $wp_customize->add_control('seasun_display_sidebar_control', array(
        'label'      => __('Display Sidebar on Posts/Pages', 'seasun'),
        'section'    => 'seasun_general_settings',
        'settings'   => 'seasun_display_sidebar',
        'type'       => 'radio',
        'choices'    => array(
            'Display' => __( 'Display' , 'seasun' ),
            'Hide' => __( 'Hide' , 'seasun' ),
        ),
    ));
    
    //  ==================================
    //  = Display Sidebar on Archives    =
    //  ==================================
    $wp_customize->add_setting('seasun_display_sidebar_archives', array(
        'default'        => seasun_default_options('seasun_display_sidebar_archives'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'seasun_sanitize_text',
    ));
 
    $wp_customize->add_control('seasun_display_sidebar_archives_control', array(
        'label'      => __('Display Sidebar on Archives', 'seasun'),
        'section'    => 'seasun_general_settings',
        'settings'   => 'seasun_display_sidebar_archives',
        'type'       => 'radio',
        'choices'    => array(
            'Hide' => __( 'Hide' , 'seasun' ),
            'Display' => __( 'Display' , 'seasun' ),
        ),
    ));
    
    //  =================================
    //  = Display Breadcrumb Navigation =
    //  =================================
    $wp_customize->add_setting('seasun_display_breadcrumb', array(
        'default'        => seasun_default_options('seasun_display_breadcrumb'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'seasun_sanitize_text',
    ));
 
    $wp_customize->add_control('seasun_display_breadcrumb_control', array(
        'label'      => __('Display Breadcrumb Navigation', 'seasun'),
        'section'    => 'seasun_general_settings',
        'settings'   => 'seasun_display_breadcrumb',
        'type'       => 'radio',
        'choices'    => array(
            'Display' => __( 'Display' , 'seasun' ),
            'Hide' => __( 'Hide' , 'seasun' ),
        ),
    ));
    
    //  ==================================
    //  = Header Layout                  =
    //  ==================================
    $wp_customize->add_setting('seasun_header_layout', array(
        'default'        => seasun_default_options('seasun_header_layout'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'seasun_sanitize_text',
    ));
 
    $wp_customize->add_control('seasun_header_layout_control', array(
        'label'      => __('Header Layout', 'seasun'),
        'section'    => 'seasun_header_settings',
        'settings'   => 'seasun_header_layout',
        'type'       => 'radio',
        'choices'    => array(
            'Centered' => __( 'Centered' , 'seasun' ),
            'Wide' => __( 'Wide' , 'seasun' ),
        ),
    ));
    
    //  ==================================
    //  = Display Header Image           =
    //  ==================================
    $wp_customize->add_setting('seasun_display_header_image', array(
        'default'        => seasun_default_options('seasun_display_header_image'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'seasun_sanitize_text',
    ));
 
    $wp_customize->add_control('seasun_display_header_image_control', array(
        'label'      => __('Display Header Image', 'seasun'),
        'section'    => 'seasun_header_settings',
        'settings'   => 'seasun_display_header_image',
        'type'       => 'radio',
        'choices'    => array(
            'Everywhere' => __( 'Everywhere' , 'seasun' ),
            'Only on Homepage' => __( 'Only on Homepage' , 'seasun' ),
            'Everywhere except Homepage' => __( 'Everywhere except Homepage' , 'seasun' ),
        ),
    ));
        
    //  =============================
    //  = Header Image Headline     =
    //  =============================
    $wp_customize->add_setting('seasun_header_image_headline', array(
        'default'        => seasun_default_options('seasun_header_image_headline'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'seasun_sanitize_text',
    ));
 
    $wp_customize->add_control('seasun_header_image_headline_control', array(
        'label'      => __('Homepage Header Image Headline', 'seasun'),
        'section'    => 'seasun_header_settings',
        'settings'   => 'seasun_header_image_headline',
    ));
    
    //  =============================
    //  = Header Image Link URL     =
    //  =============================
    $wp_customize->add_setting('seasun_header_image_link_url', array(
        'default'        => seasun_default_options('seasun_header_image_link_url'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'seasun_sanitize_uri',
    ));
 
    $wp_customize->add_control('seasun_header_image_link_url_control', array(
        'label'      => __('Homepage Header Image Link URL', 'seasun'),
        'section'    => 'seasun_header_settings',
        'settings'   => 'seasun_header_image_link_url',
    ));
    
    //  =============================
    //  = Header Image Link Text    =
    //  =============================
    $wp_customize->add_setting('seasun_header_image_link_text', array(
        'default'        => seasun_default_options('seasun_header_image_link_text'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'seasun_sanitize_text',
    ));
 
    $wp_customize->add_control('seasun_header_image_link_text_control', array(
        'label'      => __('Homepage Header Image Link Text', 'seasun'),
        'section'    => 'seasun_header_settings',
        'settings'   => 'seasun_header_image_link_text',
    ));
    
    //  =================================
    //  = Title Box/Logo width          =
    //  =================================
    $wp_customize->add_setting('seasun_page_title_width', array(
        'default'        => seasun_default_options('seasun_page_title_width'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'seasun_sanitize_text',
    ));
 
    $wp_customize->add_control('seasun_page_title_width_control', array(
        'label'      => __('Title Box/Logo width (in Wide Header Layout)', 'seasun'),
        'section'    => 'seasun_header_settings',
        'settings'   => 'seasun_page_title_width',
        'type'       => 'radio',
        'choices'    => array(
            '100' => '100%',
            '90' => '90%',
            '80' => '80%',
            '70' => '70%',
            '60' => '60%',
            '50' => '50%',
            '40' => '40%',
            '30' => '30%',
            '20' => '20%',
            '10' => '10%',
            '0' => '0%',
        ),
    ));
    
    //  =================================
    //  = Menu Box width                =
    //  =================================
    $wp_customize->add_setting('seasun_header_menu_width', array(
        'default'        => seasun_default_options('seasun_header_menu_width'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'seasun_sanitize_text',
    ));
 
    $wp_customize->add_control('seasun_header_menu_width_control', array(
        'label'      => __('Menu Box width (in Wide Header Layout)', 'seasun'),
        'section'    => 'seasun_header_settings',
        'settings'   => 'seasun_header_menu_width',
        'type'       => 'radio',
        'choices'    => array(
            '100' => '100%',
            '90' => '90%',
            '80' => '80%',
            '70' => '70%',
            '60' => '60%',
            '50' => '50%',
            '40' => '40%',
            '30' => '30%',
            '20' => '20%',
            '10' => '10%',
            '0' => '0%',
        ),
    ));
    
    //  =============================
    //  = Header Logo               =
    //  =============================
    $wp_customize->add_setting('seasun_logo_url', array(
        'default'        => seasun_default_options('seasun_logo_url'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'seasun_sanitize_uri',
    ));
 
    $wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'seasun_logo_url_control', array(
        'label'    => __('Header Logo', 'seasun'),
        'section'  => 'seasun_header_settings',
        'settings' => 'seasun_logo_url',
    )));
    
    //  =============================
    //  = Facebook Link             =
    //  =============================
    $wp_customize->add_setting('seasun_header_facebook_link', array(
        'default'        => seasun_default_options('seasun_header_facebook_link'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'seasun_sanitize_uri',
    ));
 
    $wp_customize->add_control('seasun_header_facebook_link_control', array(
        'label'      => __('Facebook Link', 'seasun'),
        'section'    => 'seasun_header_settings',
        'settings'   => 'seasun_header_facebook_link',
    ));
    
    //  =============================
    //  = Twitter Link              =
    //  =============================
    $wp_customize->add_setting('seasun_header_twitter_link', array(
        'default'        => seasun_default_options('seasun_header_twitter_link'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'seasun_sanitize_uri',
    ));
 
    $wp_customize->add_control('seasun_header_twitter_link_control', array(
        'label'      => __('Twitter Link', 'seasun'),
        'section'    => 'seasun_header_settings',
        'settings'   => 'seasun_header_twitter_link',
    ));
    
    //  =============================
    //  = Google+ Link              =
    //  =============================
    $wp_customize->add_setting('seasun_header_google_link', array(
        'default'        => seasun_default_options('seasun_header_google_link'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'seasun_sanitize_uri',
    ));
 
    $wp_customize->add_control('seasun_header_google_link_control', array(
        'label'      => __('Google+ Link', 'seasun'),
        'section'    => 'seasun_header_settings',
        'settings'   => 'seasun_header_google_link',
    ));
    
    //  =============================
    //  = RSS Link                  =
    //  =============================
    $wp_customize->add_setting('seasun_header_rss_link', array(
        'default'        => seasun_default_options('seasun_header_rss_link'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'seasun_sanitize_uri',
    ));
 
    $wp_customize->add_control('seasun_header_rss_link_control', array(
        'label'      => __('RSS Link', 'seasun'),
        'section'    => 'seasun_header_settings',
        'settings'   => 'seasun_header_rss_link',
    ));
    
    //  ====================================
    //  = Display Site Description         =
    //  ====================================
    $wp_customize->add_setting('seasun_display_site_description', array(
        'default'        => seasun_default_options('seasun_display_site_description'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'seasun_sanitize_text',
    ));
 
    $wp_customize->add_control('seasun_display_site_description_control', array(
        'label'      => __('Display Site Description on Blog page', 'seasun'),
        'section'    => 'seasun_header_settings',
        'settings'   => 'seasun_display_site_description',
        'type'       => 'radio',
        'choices'    => array(
            'Display' => __( 'Display' , 'seasun' ),
            'Hide' => __( 'Hide' , 'seasun' ),
        ),
    ));
    
    //  ==========================================
    //  = Display Featured Image on single posts =
    //  ==========================================
    $wp_customize->add_setting('seasun_display_image_post', array(
        'default'        => seasun_default_options('seasun_display_image_post'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'seasun_sanitize_text',
    ));
 
    $wp_customize->add_control('seasun_display_image_post_control', array(
        'label'      => __('Display Featured Image on single posts', 'seasun'),
        'section'    => 'seasun_posts_settings',
        'settings'   => 'seasun_display_image_post',
        'type'       => 'radio',
        'choices'    => array(
            'Display' => __( 'Display' , 'seasun' ),
            'Hide' => __( 'Hide' , 'seasun' ),
        ),
    ));
    
    //  ====================================
    //  = Display Meta Box on single posts =
    //  ====================================
    $wp_customize->add_setting('seasun_display_meta_post', array(
        'default'        => seasun_default_options('seasun_display_meta_post'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'seasun_sanitize_text',
    ));
 
    $wp_customize->add_control('seasun_display_meta_post_control', array(
        'label'      => __('Display Meta Box on single posts', 'seasun'),
        'section'    => 'seasun_posts_settings',
        'settings'   => 'seasun_display_meta_post',
        'type'       => 'radio',
        'choices'    => array(
            'Display' => __( 'Display' , 'seasun' ),
            'Hide' => __( 'Hide' , 'seasun' ),
        ),
    ));
    
    //  =================================
    //  = Next/Previous Post Navigation =
    //  =================================
    $wp_customize->add_setting('seasun_next_preview_post', array(
        'default'        => seasun_default_options('seasun_next_preview_post'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'seasun_sanitize_text',
    ));
 
    $wp_customize->add_control('seasun_next_preview_post_control', array(
        'label'      => __('Display Next/Previous Post Navigation on single posts', 'seasun'),
        'section'    => 'seasun_posts_settings',
        'settings'   => 'seasun_next_preview_post',
        'type'       => 'radio',
        'choices'    => array(
            'Display' => __( 'Display' , 'seasun' ),
            'Hide' => __( 'Hide' , 'seasun' ),
        ),
    ));
    
    //  ==========================================
    //  = Display Featured Image on pages        =
    //  ==========================================
    $wp_customize->add_setting('seasun_display_image_page', array(
        'default'        => seasun_default_options('seasun_display_image_page'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'seasun_sanitize_text',
    ));
 
    $wp_customize->add_control('seasun_display_image_page_control', array(
        'label'      => __('Display Featured Image on pages', 'seasun'),
        'section'    => 'seasun_posts_settings',
        'settings'   => 'seasun_display_image_page',
        'type'       => 'radio',
        'choices'    => array(
            'Display' => __( 'Display' , 'seasun' ),
            'Hide' => __( 'Hide' , 'seasun' ),
        ),
    ));
    
    //  ==================================
    //  = Post Entries Format            =
    //  ==================================
    $wp_customize->add_setting('seasun_post_entry_format', array(
        'default'        => seasun_default_options('seasun_post_entry_format'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'seasun_sanitize_text',
    ));
 
    $wp_customize->add_control('seasun_post_entry_format_control', array(
        'label'      => __('Post Entries Format', 'seasun'),
        'section'    => 'seasun_post_entries_settings',
        'settings'   => 'seasun_post_entry_format',
        'type'       => 'radio',
        'choices'    => array(
            'Grid - Masonry' => __( 'Grid - Masonry' , 'seasun' ),
            'One Column' => __( 'One Column' , 'seasun' ),
        ),
    ));
    
    //  ====================================
    //  = Display Meta Box on Post Entries =
    //  ====================================
    $wp_customize->add_setting('seasun_display_meta_post_entry', array(
        'default'        => seasun_default_options('seasun_display_meta_post_entry'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'seasun_sanitize_text',
    ));
 
    $wp_customize->add_control('seasun_display_meta_post_entry_control', array(
        'label'      => __('Display Meta Box on Post Entries', 'seasun'),
        'section'    => 'seasun_post_entries_settings',
        'settings'   => 'seasun_display_meta_post_entry',
        'type'       => 'radio',
        'choices'    => array(
            'Display' => __( 'Display' , 'seasun' ),
            'Hide' => __( 'Hide' , 'seasun' ),
        ),
    ));
    
    //  ===============================
    //  = Content/Excerpt Displaying  =
    //  ===============================
    $wp_customize->add_setting('seasun_content_archives', array(
        'default'        => seasun_default_options('seasun_content_archives'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'seasun_sanitize_text',
    ));
 
    $wp_customize->add_control('seasun_content_archives_control', array(
        'label'      => __('Content/Excerpt Displaying', 'seasun'),
        'section'    => 'seasun_post_entries_settings',
        'settings'   => 'seasun_content_archives',
        'type'       => 'radio',
        'choices'    => array(
            'Excerpt' => __( 'Excerpt' , 'seasun' ),
            'Content' => __( 'Content' , 'seasun' ),
        ),
    ));
    
    //  =============================
    //  = Body font                 =
    //  =============================
     $wp_customize->add_setting('seasun_body_google_fonts', array(
        'default'        => seasun_default_options('seasun_body_google_fonts'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'seasun_sanitize_text',
 
    ));
    $wp_customize->add_control( 'seasun_body_google_fonts_control', array(
        'settings' => 'seasun_body_google_fonts',
        'label'   => __('Body font', 'seasun'),
        'section' => 'seasun_font_settings',
        'type'    => 'select',
        'choices'    => $seasun_fonts,
    ));
    
    //  =============================
    //  = Site Title font           =
    //  =============================
     $wp_customize->add_setting('seasun_headings_google_fonts', array(
        'default'        => seasun_default_options('seasun_headings_google_fonts'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'seasun_sanitize_text',
 
    ));
    $wp_customize->add_control( 'seasun_headings_google_fonts_control', array(
        'settings' => 'seasun_headings_google_fonts',
        'label'   => __('Site Title font', 'seasun'),
        'section' => 'seasun_font_settings',
        'type'    => 'select',
        'choices'    => $seasun_fonts,
    ));
    
    //  =============================
    //  = Site Description font     =
    //  =============================
     $wp_customize->add_setting('seasun_description_google_fonts', array(
        'default'        => seasun_default_options('seasun_description_google_fonts'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'seasun_sanitize_text',
 
    ));
    $wp_customize->add_control( 'seasun_description_google_fonts_control', array(
        'settings' => 'seasun_description_google_fonts',
        'label'   => __('Site Description font', 'seasun'),
        'section' => 'seasun_font_settings',
        'type'    => 'select',
        'choices'    => $seasun_fonts,
    ));
    
    //  =============================
    //  = Page/Post Headlines font  =
    //  =============================
     $wp_customize->add_setting('seasun_headline_google_fonts', array(
        'default'        => seasun_default_options('seasun_headline_google_fonts'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'seasun_sanitize_text',
 
    ));
    $wp_customize->add_control( 'seasun_headline_google_fonts_control', array(
        'settings' => 'seasun_headline_google_fonts',
        'label'   => __('Page/Post Headlines (h1 - h6) font', 'seasun'),
        'section' => 'seasun_font_settings',
        'type'    => 'select',
        'choices'    => $seasun_fonts,
    ));
    
    //  =============================
    //  = Post Entry Headline font  =
    //  =============================
     $wp_customize->add_setting('seasun_postentry_google_fonts', array(
        'default'        => seasun_default_options('seasun_postentry_google_fonts'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'seasun_sanitize_text',
 
    ));
    $wp_customize->add_control( 'seasun_postentry_google_fonts_control', array(
        'settings' => 'seasun_postentry_google_fonts',
        'label'   => __('Post Entry Headline font', 'seasun'),
        'section' => 'seasun_font_settings',
        'type'    => 'select',
        'choices'    => $seasun_fonts,
    ));
    
    //  ========================================
    //  = Sidebar/Footer Widget Headlines font =
    //  ========================================
     $wp_customize->add_setting('seasun_sidebar_google_fonts', array(
        'default'        => seasun_default_options('seasun_sidebar_google_fonts'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'seasun_sanitize_text',
 
    ));
    $wp_customize->add_control( 'seasun_sidebar_google_fonts_control', array(
        'settings' => 'seasun_sidebar_google_fonts',
        'label'   => __('Sidebar/Footer Widget Headlines font', 'seasun'),
        'section' => 'seasun_font_settings',
        'type'    => 'select',
        'choices'    => $seasun_fonts,
    ));
    
    //  =============================
    //  = Main Header Menu font     =
    //  =============================
     $wp_customize->add_setting('seasun_menu_google_fonts', array(
        'default'        => seasun_default_options('seasun_menu_google_fonts'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'seasun_sanitize_text',
 
    ));
    $wp_customize->add_control( 'seasun_menu_google_fonts_control', array(
        'settings' => 'seasun_menu_google_fonts',
        'label'   => __('Main Header Menu font', 'seasun'),
        'section' => 'seasun_font_settings',
        'type'    => 'select',
        'choices'    => $seasun_fonts,
    ));
    
    //  =============================
    //  = Top Header Menu font      =
    //  =============================
     $wp_customize->add_setting('seasun_top_menu_google_fonts', array(
        'default'        => seasun_default_options('seasun_top_menu_google_fonts'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'seasun_sanitize_text',
 
    ));
    $wp_customize->add_control( 'seasun_top_menu_google_fonts_control', array(
        'settings' => 'seasun_top_menu_google_fonts',
        'label'   => __('Top Header Menu font', 'seasun'),
        'section' => 'seasun_font_settings',
        'type'    => 'select',
        'choices'    => $seasun_fonts,
    ));
    
    //  =============================
    //  = Custom CSS                =
    //  =============================
    $wp_customize->add_setting('seasun_own_css', array(
        'default'        => seasun_default_options('seasun_own_css'),
        'capability'     => 'edit_theme_options',
        'type'           => 'theme_mod',
        'sanitize_callback' => 'wp_filter_nohtml_kses',
    ));
 
    $wp_customize->add_control( new seasun_customize_textarea_control($wp_customize, 'seasun_own_css_control', array(
        'label'    => __('Custom CSS', 'seasun'),
        'section'  => 'seasun_general_settings',
        'settings' => 'seasun_own_css',
    )));
}

add_action('customize_register', 'seasun_customize_register');

/**
 * Sanitize URIs
*/
function seasun_sanitize_uri($uri) {
	if('' === $uri){
		return '';
	}
	return esc_url_raw($uri);
}

/**
 * Sanitize Texts
*/
function seasun_sanitize_text($str) {
	if('' === $str){
		return '';
	}
	return sanitize_text_field( $str);
} ?>