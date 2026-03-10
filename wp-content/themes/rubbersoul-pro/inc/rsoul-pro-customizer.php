<?php
/**
 * Register postMessage support.
 *
 * Add postMessage support for site title and description for the Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */

add_action( 'customize_register', 'rubbersoul_pro_customize_register' );

function rubbersoul_pro_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
}

//Enqueue Javascript postMessage handlers for the Customizer.
add_action( 'customize_preview_init', 'rubbersoul_pro_customize_preview_js' ); 

function rubbersoul_pro_customize_preview_js() {
	wp_enqueue_script( 'rubbersoul_pro-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20130301', true );
}

/*
 * Sanitize functions.
 */

// Sanitizar textarea permitiendo javascript
add_action('admin_init','optionscheck_change_santiziation', 100);
function optionscheck_change_santiziation() {
    remove_filter( 'of_sanitize_textarea', 'of_sanitize_textarea' );
    add_filter( 'of_sanitize_textarea', 'custom_sanitize_textarea' );
}
function custom_sanitize_textarea($input) {
    global $allowedposttags;
      $custom_allowedtags["script"] = array( "src" => array() );
      $custom_allowedtags = array_merge($custom_allowedtags, $allowedposttags);
      $output = wp_kses( $input, $custom_allowedtags);
    return $output;
}

function rubbersoul_pro_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

function rubbersoul_pro_sanitize_checkbox( $input ) {
    if ( $input == 1 ) {
        return 1;
    } else {
        return '';
    }
}

function rubbersoul_pro_sanitize_sidebar_position( $input ) {
    $valid = array(
        'izquierda' => 'Left',
        'derecha' => 'Right',
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

function rubbersoul_pro_sanitize_donde_excerpt( $input ) {
    $valid = array(
		'home_and_archives' => 'Home and archive pages (Categories, Tags, Author, Archives)',
		'archives' => 'Only archive pages (Categories, Tags, Author, Archives)',
		'no_excerpt' => 'Always full content',
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

function rubbersoul_pro_sanitize_fonts( $input ) {
    $valid = array(
		'Open Sans' => 'Open Sans',
		'Alegreya Sans' => 'Alegreya Sans',
		'Arimo' => 'Arimo',
		'Asap' => 'Asap',
		'Bitter' => 'Bitter',
		'Cabin' => 'Cabin',
		'Cuprum' => 'Cuprum',
		'Dosis' => 'Dosis',
		'Droid Serif' => 'Droid Serif',
		'Exo' => 'Exo',
		'Exo 2' => 'Exo 2',
		'Fira Sans' => 'Fira Sans',
		'Istok Web' => 'Istok Web',
		'Josefin Sans' => 'Josefin Sans',
		'Josefin Slab' => 'Josefin Slab',
		'Karla' => 'Karla',
		'Lato' => 'Lato',
		'Lora' => 'Lora',
		'Merriweather Sans' => 'Merriweather Sans',
		'Muli' => 'Muli',
		'Noto Sans' => 'Noto Sans',
		'PT Sans' => 'PT Sans',
		'Quattrocento Sans' => 'Quattrocento Sans',
		'Raleway' => 'Raleway',
		'Roboto' => 'Roboto',
		'Source Sans Pro' => 'Source Sans Pro',
		'Titillium Web' => 'Titillium Web',
		'Ubuntu' => 'Ubuntu',
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

function rubbersoul_pro_sanitize_num_img_slider_front_page($input) {
	$valid = array(
		'3' => 3,
		'4' => 4,
		'5' => 5,
		'6' => 6,
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

function rubbersoul_pro_sanitize_boton_addthis( $input ) {
    $valid = array(
		'<div class="addthis_sharing_toolbox"></div>' => 'Toolbox',
        '<div class="addthis_native_toolbox"></div>' => 'Original',
    );
 
    if ( array_key_exists( $input, $valid ) ) {
        return $input;
    } else {
        return '';
    }
}

/**
 * Crear menú de opciones
 */
 
add_action( 'admin_menu', 'rubbersoul_pro_menu_opciones' );
function rubbersoul_pro_menu_opciones() {
	$url_icon = get_stylesheet_directory_uri() .'/img/menu-icon.png';
	// Obtenemos la url actual para volver cuando cerramos el customizer
	$return = add_query_arg( array()) ;
	
	// Menú que abre directamente el panel de opciones de personalización de RubberSoul Pro
	/* add_theme_page( __('RubberSoul Pro Options', 'rubbersoul-pro'), __('RubberSoul Pro Options', 'rubbersoul-pro'), 'edit_theme_options', 'customize.php?return='.$return.'&autofocus[panel]=rubbersoul_pro_pro_panel'); */
	
	add_menu_page (__('RubberSoul Pro', 'rubbersoul-pro'), __('RubberSoul Pro', 'rubbersoul-pro'), 'manage_options', 'customize.php?return='.$return.'&autofocus[panel]=rubbersoul_pro_pro_panel', '', $url_icon, '59.2');
	
}

/** ----------------------------
 * RubberSoul Pro Customizer
 * ----------------------------*/

add_action('customize_register', 'rubbersoul_pro_pro_theme_customizer');

function rubbersoul_pro_pro_theme_customizer( $wp_customize ) {

// Quitar el control por defecto del color de texto de cabecera
$wp_customize->remove_control('header_textcolor');
// Quitar opción mostrar/ocultar texto de cabecera
$wp_customize->remove_control('display_header_text');

// Mostrar nombre y descripción del blog
$wp_customize->add_setting('rubbersoul_pro_mostrar_titulo_descripcion', array('default' => 1, 'sanitize_callback' => 'rubbersoul_pro_sanitize_checkbox',));
$wp_customize->add_control('rubbersoul_pro_mostrar_titulo_descripcion', array(
        'type' => 'checkbox',
        'label' => __('Show title and description', 'rubbersoul-pro'),
        'section' => 'title_tagline',
		));
		
// Agregar a la sección 'title_tagline' de WordPress título y descripción sin mayúsculas
$wp_customize->add_setting('rubbersoul_pro_titulo_descripcion_no_mayus', array('default' => '', 'sanitize_callback' => 'rubbersoul_pro_sanitize_checkbox',));
$wp_customize->add_control('rubbersoul_pro_titulo_descripcion_no_mayus', array(
        'type' => 'checkbox',
        'label' => __('No change in capital title and description.', 'rubbersoul-pro'),
        'section' => 'title_tagline',
		));

// Desbordar logo
$wp_customize->add_setting('rubbersoul_pro_desbordar_logo', array('default' => 1, 'sanitize_callback' => 'rubbersoul_pro_sanitize_checkbox',));
$wp_customize->add_control('rubbersoul_pro_desbordar_logo', array(
        'type' => 'checkbox',
        'label' => __('Overflow logo', 'rubbersoul-pro'),
        'section' => 'header_image',
		'priority' => 1,
		));
		
// Ajustar tamaño del logo	
$wp_customize->add_setting('rubbersoul_pro_ajustar_tam_logo', array('default' => 1, 'sanitize_callback' => 'rubbersoul_pro_sanitize_checkbox',));
$wp_customize->add_control('rubbersoul_pro_ajustar_tam_logo', array(
        'type' => 'checkbox',
        'label' => __('Adjust the width of the logo to 60px', 'rubbersoul-pro'),
        'section' => 'header_image',
		'priority' => 2,
		));

// Mantener transparencia logo	
$wp_customize->add_setting('rubbersoul_pro_transparencia_logo', array('default' => '', 'sanitize_callback' => 'rubbersoul_pro_sanitize_checkbox',));
$wp_customize->add_control('rubbersoul_pro_transparencia_logo', array(
        'type' => 'checkbox',
        'label' => __('Maintain transparency logo', 'rubbersoul-pro'),
        'section' => 'header_image',
		'priority' => 3,
		));	

// Logo cuadrado
$wp_customize->add_setting('rubbersoul_pro_logo_cuadrado', array('default' => '', 'sanitize_callback' => 'rubbersoul_pro_sanitize_checkbox',));
$wp_customize->add_control('rubbersoul_pro_logo_cuadrado', array(
        'type' => 'checkbox',
        'label' => __('Logo square', 'rubbersoul-pro'),
        'section' => 'header_image',
		'priority' => 4,
		));

/**
 * PANEL RUBBERSOUL PRO
 */
$wp_customize->add_panel('rubbersoul_pro_pro_panel', array(
		'title' => __('RubberSoul Pro Options', 'rubbersoul-pro'),
		'priority' => 10,
		));

/**
 * Color, fuentes y posts
 */
 
// Color de tema
$wp_customize->add_section('rubbersoul_pro_pro_color_posts', array(
		'panel' => 'rubbersoul_pro_pro_panel',
		'title' => __('Theme color, fonts and posts', 'rubbersoul-pro'),
		'priority' => 40,
		));
$wp_customize->add_setting('rubbersoul_pro_color_tema', array('default' => '#0098D3', 'sanitize_callback' => 'sanitize_hex_color', ));
$wp_customize->add_control(
		new WP_Customize_Color_Control(
        $wp_customize,
        'rubbersoul_pro_color_tema',
        array(
            'label' => __('Select Theme Color', 'rubbersoul-pro'),
            'section' => 'rubbersoul_pro_pro_color_posts',
            'settings' => 'rubbersoul_pro_color_tema',
        )
    )
);

// Cabezera blanca
$wp_customize->add_setting('rubbersoul_pro_cabecera_blanca', array('default' => '', 'sanitize_callback' => 'rubbersoul_pro_sanitize_checkbox',));
$wp_customize->add_control('rubbersoul_pro_cabecera_blanca', array(
        'type' => 'checkbox',
        'label' => __('White header', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_color_posts',
		));

// Color título de post en extractos
$wp_customize->add_setting('rubbersoul_pro_color_excerpt_title', array('default' => '', 'sanitize_callback' => 'rubbersoul_pro_sanitize_checkbox',));
$wp_customize->add_control('rubbersoul_pro_color_excerpt_title', array(
        'type' => 'checkbox',
        'label' => __('Apply to entry title in excerpts', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_color_posts',
		));
		
// Color de fondo texto seleccionado	
$wp_customize->add_setting('rubbersoul_pro_selected_text_bg_color', array('default' => '', 'sanitize_callback' => 'rubbersoul_pro_sanitize_checkbox',));
$wp_customize->add_control('rubbersoul_pro_selected_text_bg_color', array(
        'type' => 'checkbox',
        'label' => __('Apply to the background color of the selected text.', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_color_posts',
		));

// Integrar bbPress
$wp_customize->add_setting('rubbersoul_pro_integrar_bbpress', array('default' => '', 'sanitize_callback' => 'rubbersoul_pro_sanitize_checkbox',));
$wp_customize->add_control('rubbersoul_pro_integrar_bbpress', array(
        'type' => 'checkbox',
        'label' => __('Apply RubberSoul Pro style to bbPress', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_color_posts',
		));

// Fuentes
$wp_customize->add_setting('rubbersoul_pro_fonts', array('default' => 'Open Sans', 'sanitize_callback' => 'rubbersoul_pro_sanitize_fonts' ));
$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'rubbersoul_pro_fonts',
        array(
            'label'          => __( 'Select font', 'rubbersoul-pro' ),
            'section'        => 'rubbersoul_pro_pro_color_posts',
            'settings'       => 'rubbersoul_pro_fonts',
            'type'           => 'select',
            'choices'        => array(
				'Open Sans' => 'Open Sans',
				'Alegreya Sans' => 'Alegreya Sans',
				'Arimo' => 'Arimo',
				'Asap' => 'Asap',
				'Bitter' => 'Bitter',
				'Cabin' => 'Cabin',
				'Cuprum' => 'Cuprum',
				'Dosis' => 'Dosis',
				'Droid Serif' => 'Droid Serif',
				'Exo' => 'Exo',
				'Exo 2' => 'Exo 2',
				'Fira Sans' => 'Fira Sans',
				'Istok Web' => 'Istok Web',
				'Josefin Sans' => 'Josefin Sans',
				'Josefin Slab' => 'Josefin Slab',
				'Karla' => 'Karla',
				'Lato' => 'Lato',
				'Lora' => 'Lora',
				'Merriweather Sans' => 'Merriweather Sans',
				'Muli' => 'Muli',
				'Noto Sans' => 'Noto Sans',
				'PT Sans' => 'PT Sans',
				'Quattrocento Sans' => 'Quattrocento Sans',
				'Raleway' => 'Raleway',
				'Roboto' => 'Roboto',
				'Source Sans Pro' => 'Source Sans Pro',
				'Titillium Web' => 'Titillium Web',
				'Ubuntu' => 'Ubuntu',
            )
        )
    )
);

$wp_customize->add_setting('rubbersoul_pro_donde_excerpt', array('default' => 'home_and_archives', 'sanitize_callback' => 'rubbersoul_pro_sanitize_donde_excerpt',));
$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'rubbersoul_pro_donde_excerpt',
        array(
            'label'          => __( 'Where do you want to show excerpts?', 'rubbersoul-pro' ),
            'section'        => 'rubbersoul_pro_pro_color_posts',
            'settings'       => 'rubbersoul_pro_donde_excerpt',
            'type'           => 'radio',
            'choices'        => array(
                'home_and_archives' => __('Home and archive pages (Categories, Tags, Author, Archives)', 'rubbersoul-pro'),
				'archives' => __('Only archive pages (Categories, Tags, Author, Archives)', 'rubbersoul-pro'),
				'no_excerpt' => __('Always full content', 'rubbersoul-pro'),
            )
        )
    )
);

// Thumbnails redondos
$wp_customize->add_setting('rubbersoul_pro_thumbnail_rounded', array('default' => 1, 'sanitize_callback' => 'rubbersoul_pro_sanitize_checkbox',));
$wp_customize->add_control('rubbersoul_pro_thumbnail_rounded', array(
        'type' => 'checkbox',
        'label' => __("Excerpt's thumbnail image rounded", 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_color_posts',
		));

// Breadcrumb
$wp_customize->add_setting('rubbersoul_pro_breadcrumb', array('default' => 1, 'sanitize_callback' => 'rubbersoul_pro_sanitize_checkbox',));
$wp_customize->add_control('rubbersoul_pro_breadcrumb', array(
        'type' => 'checkbox',
        'label' => __('Display breadcrumb above the entry title', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_color_posts',
		));

// Botón Volver arriba
$wp_customize->add_setting('rubbersoul_pro_boton_ir_arriba', array('default' => 1, 'sanitize_callback' => 'rubbersoul_pro_sanitize_checkbox',));
$wp_customize->add_control('rubbersoul_pro_boton_ir_arriba', array(
        'type' => 'checkbox',
        'label' => __("Display 'Back to top' button", 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_color_posts',
		));

// Autor
$wp_customize->add_setting('rubbersoul_pro_show_autor', array('default' => 1, 'sanitize_callback' => 'rubbersoul_pro_sanitize_checkbox',));
$wp_customize->add_control('rubbersoul_pro_show_autor', array(
        'type' => 'checkbox',
        'label' => __('Show author post', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_color_posts',
		));

// Fecha
$wp_customize->add_setting('rubbersoul_pro_show_fecha', array('default' => 1, 'sanitize_callback' => 'rubbersoul_pro_sanitize_checkbox',));
$wp_customize->add_control('rubbersoul_pro_show_fecha', array(
        'type' => 'checkbox',
        'label' => __('Show date', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_color_posts',
		));

// Comentarios
$wp_customize->add_setting('rubbersoul_pro_show_comments', array('default' => 1, 'sanitize_callback' => 'rubbersoul_pro_sanitize_checkbox',));
$wp_customize->add_control('rubbersoul_pro_show_comments', array(
        'type' => 'checkbox',
        'label' => __('Show comments', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_color_posts',
		));
		
// Texto justificado
$wp_customize->add_setting('rubbersoul_pro_text_justify', array('default' => '', 'sanitize_callback' => 'rubbersoul_pro_sanitize_checkbox',));
$wp_customize->add_control('rubbersoul_pro_text_justify', array(
        'type' => 'checkbox',
        'label' => __('Entry text justified', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_color_posts',
		));

// Mostrar/Ocultar títulos de página	
$wp_customize->add_setting('rubbersoul_pro_hide_page_title', array('default' => '', 'sanitize_callback' => 'rubbersoul_pro_sanitize_checkbox'));
$wp_customize->add_control('rubbersoul_pro_hide_page_title', array(
        'label' => __('Hide pages title', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_color_posts',
        'type' => 'checkbox',
    ));
		
// Entradas relacionadas
$wp_customize->add_setting('rubbersoul_pro_related_posts', array('default' => 1, 'sanitize_callback' => 'rubbersoul_pro_sanitize_checkbox',));
$wp_customize->add_control('rubbersoul_pro_related_posts', array(
        'type' => 'checkbox',
        'label' => __('Show related posts', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_color_posts',
		));

$wp_customize->add_setting('rubbersoul_pro_related_posts_title', array('default' => __('Related posts...', 'rubbersoul-pro'), 'sanitize_callback' => 'rubbersoul_pro_sanitize_text'));
$wp_customize->add_control('rubbersoul_pro_related_posts_title', array(
        'label' => __('Related posts title', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_color_posts',
        'type' => 'text',
    ));

$wp_customize->add_setting('rubbersoul_pro_show_nav_single', array('default' => 1, 'sanitize_callback' => 'rubbersoul_pro_sanitize_text',));
$wp_customize->add_control('rubbersoul_pro_show_nav_single', array(
        'type' => 'checkbox',
        'label' => __('Show navigation at the end of posts (links to previous and next posts)', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_color_posts',
		));

/**
 * Slider
 */
 
$wp_customize->add_section('rubbersoul_pro_pro_slider', array(
		'panel' => 'rubbersoul_pro_pro_panel',
		'title' => __('Slider of recent posts', 'rubbersoul-pro'),
		'description' => __('For the slider maintains a constant size with different images, featured image posts should have minimum dimensions of 720x360 pixels.', 'rubbersoul-pro'),
		'priority' => 41,
		));
		
$wp_customize->add_setting('rubbersoul_pro_slider_front_page', array('default' => '', 'sanitize_callback' => 'rubbersoul_pro_sanitize_checkbox',));
$wp_customize->add_control('rubbersoul_pro_slider_front_page', array(
        'type' => 'checkbox',
        'label' => __('Enable slider in front-page', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_slider',
		));

$wp_customize->add_setting('rubbersoul_pro_slider_fp_forzar_ajuste_imagenes', array('default' => '', 'sanitize_callback' => 'rubbersoul_pro_sanitize_checkbox',));
$wp_customize->add_control('rubbersoul_pro_slider_fp_forzar_ajuste_imagenes', array(
        'type' => 'checkbox',
        'label' => __('Forcing image adjustment', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_slider',
		'description' => '(' . __('This will make small images to fit the slider but the proportion of the images will not be correct on mobile devices', 'rubbersoul-pro') . ')',
		));

$wp_customize->add_setting('rubbersoul_pro_num_img_slider_front_page', array('default' => 5, 'sanitize_callback' => 'rubbersoul_pro_sanitize_num_img_slider_front_page' ));
$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'rubbersoul_pro_num_img_slider_front_page',
        array(
            'label'          => __( 'Number of posts', 'rubbersoul-pro' ),
            'section'        => 'rubbersoul_pro_pro_slider',
            'settings'       => 'rubbersoul_pro_num_img_slider_front_page',
            'type'           => 'select',
            'choices'        => array(
				'3' => 3,
				'4' => 4,
				'5' => 5,
				'6' => 6,
            )
        )
    )
);
		
/**
 * Sidebar y áreas de widgets
 */
 
$wp_customize->add_section('rubbersoul_pro_pro_sidebar_widgets', array(
		'panel' => 'rubbersoul_pro_pro_panel',
		'title' => __('Sidebar and widgets areas', 'rubbersoul-pro'),
		'priority' => 42,
		));

// Posición del sidebar	
$wp_customize->add_setting('rubbersoul_pro_sidebar_position', array('default' => 'derecha', 'sanitize_callback' => 'rubbersoul_pro_sanitize_sidebar_position' ));
$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'rubbersoul_pro_sidebar_position',
        array(
            'label'          => __( 'Select sidebar position', 'rubbersoul-pro' ),
            'section'        => 'rubbersoul_pro_pro_sidebar_widgets',
            'settings'       => 'rubbersoul_pro_sidebar_position',
            'type'           => 'radio',
            'choices'        => array(
                'izquierda'   => __( 'Left','rubbersoul-pro' ),
                'derecha'  => __( 'Right','rubbersoul-pro' ),
            )
        )
    )
);

// Widgets areas final de post
$wp_customize->add_setting('rubbersoul_pro_warea_final_post_en_archive', array('default' => '', 'sanitize_callback' => 'rubbersoul_pro_sanitize_checkbox',));
$wp_customize->add_control('rubbersoul_pro_warea_final_post_en_archive', array(
        'type' => 'checkbox',
        'label' => __('Widgets area at the end of post: Also display its contents in archive pages (category, tags, author and archive)', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_sidebar_widgets',
		));
		
// Widgets area sobre comentarios
$wp_customize->add_setting('rubbersoul_pro_warea_sobre_comentarios_en_pages', array('default' => '', 'sanitize_callback' => 'rubbersoul_pro_sanitize_checkbox',));
$wp_customize->add_control('rubbersoul_pro_warea_sobre_comentarios_en_pages', array(
        'type' => 'checkbox',
        'label' => __('Widgets area above comments: Also display its contents in pages', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_sidebar_widgets',
		));
		
// Widgets area bajo comentarios
$wp_customize->add_setting('rubbersoul_pro_warea_bajo_comentarios_en_pages', array('default' => '', 'sanitize_callback' => 'rubbersoul_pro_sanitize_checkbox',));
$wp_customize->add_control('rubbersoul_pro_warea_bajo_comentarios_en_pages', array(
        'type' => 'checkbox',
        'label' => __('Widgets area comments below: Also display its contents in pages', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_sidebar_widgets',
		));

/**
 * Favicon y login logo
 */
 
$wp_customize->add_section('rubbersoul_pro_pro_favicon_login_logo', array(
		'panel' => 'rubbersoul_pro_pro_panel',
		'title' => __('Favicon and login logo', 'rubbersoul-pro'),
		'priority' => 42,
		));
 
// Favicon
$wp_customize->add_setting( 'rubbersoul_pro_favicon' , array('default' => '', 'sanitize_callback' => 'esc_url_raw',));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'rubbersoul_pro_favicon', array(
		'label'    => __( 'Favicon (formats: ico, png or gif)', 'rubbersoul-pro' ),
		'section'  => 'rubbersoul_pro_pro_favicon_login_logo',
		'settings' => 'rubbersoul_pro_favicon',
		)));
		
$wp_customize->add_setting( 'rubbersoul_pro_login_logo' , array('default' => '', 'sanitize_callback' => 'esc_url_raw',));
$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'rubbersoul_pro_login_logo', array(
		'label'    => __( 'Login logo', 'rubbersoul-pro' ),
		'section'  => 'rubbersoul_pro_pro_favicon_login_logo',
		'settings' => 'rubbersoul_pro_login_logo',
		)));

/**
 * Footer
 */
 
$wp_customize->add_section('rubbersoul_pro_pro_footer', array(
		'panel' => 'rubbersoul_pro_pro_panel',
		'title' => __('Footer', 'rubbersoul-pro'),
		'priority' => 45,
		));
		
$wp_customize->add_setting('rubbersoul_pro_enable_footer_widget_areas', array('default' => 1, 'sanitize_callback' => 'rubbersoul_pro_sanitize_checkbox',));
$wp_customize->add_control('rubbersoul_pro_enable_footer_widget_areas', array(
        'type' => 'checkbox',
        'label' => __('Enable footer widget areas', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_footer',
		));
		
$wp_customize->add_setting('rubbersoul_pro_credits_left', array('default' => 'Copyright 2015', 'sanitize_callback' => 'rubbersoul_pro_sanitize_text'));
$wp_customize->add_control('rubbersoul_pro_credits_left', array(
        'label' => __('Footer text left', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_footer',
        'type' => 'textarea',
    ));
	
$wp_customize->add_setting('rubbersoul_pro_credits_center', array('default' => '', 'sanitize_callback' => 'rubbersoul_pro_sanitize_text'));
$wp_customize->add_control('rubbersoul_pro_credits_center', array(
        'label' => __('Footer text center', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_footer',
        'type' => 'textarea',
    ));
	
$wp_customize->add_setting('rubbersoul_pro_credits_right', array('default' => '', 'sanitize_callback' => 'rubbersoul_pro_sanitize_text'));
$wp_customize->add_control('rubbersoul_pro_credits_right', array(
        'label' => __('Footer text right', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_footer',
        'type' => 'textarea',
    ));
	
$wp_customize->add_setting('rubbersoul_pro_ocultar_creditos_tema_wp', array('default' => '', 'sanitize_callback' => 'rubbersoul_pro_sanitize_checkbox',));
$wp_customize->add_control('rubbersoul_pro_ocultar_creditos_tema_wp', array(
        'type' => 'checkbox',
        'label' => __('Hide theme and WordPress credits', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_footer',
		));

/**
 * AddThis
 */
 
$wp_customize->add_section('rubbersoul_pro_pro_addthis', array(
		'panel' => 'rubbersoul_pro_pro_panel',
		'title' => __('AddThis', 'rubbersoul-pro'),
		'priority' => 46,
		));
		
// Habilitar AddThis		
$wp_customize->add_setting('rubbersoul_pro_enable_addthis', array('default' => '', 'sanitize_callback' => 'rubbersoul_pro_sanitize_checkbox',));
$wp_customize->add_control('rubbersoul_pro_enable_addthis', array(
        'type' => 'checkbox',
        'label' => __('Enable AddThis', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_addthis',
		));
		
// Código AddThis
$wp_customize->add_setting('rubbersoul_pro_addthis_code', array('default' => '', 'sanitize_callback' => 'custom_sanitize_textarea',));
$wp_customize->add_control('rubbersoul_pro_addthis_code', array(
        'type' => 'textarea',
        'label' => __('Paste your AddThis code', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_addthis',
		));
		
// Habilitar botones
$wp_customize->add_setting('rubbersoul_pro_habilitar_botones_addthis', array('default' => '', 'sanitize_callback' => 'rubbersoul_pro_sanitize_checkbox',));
$wp_customize->add_control('rubbersoul_pro_habilitar_botones_addthis', array(
        'type' => 'checkbox',
        'label' => __('Enable AddThis Sharing Buttons', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_addthis',
		));

// Tipo de botones AddThis
$wp_customize->add_setting('rubbersoul_pro_tipo_boton', array('default' => '<div class="addthis_sharing_toolbox"></div>', 'sanitize_callback' => 'rubbersoul_pro_sanitize_boton_addthis' ));
$wp_customize->add_control(
    new WP_Customize_Control(
        $wp_customize,
        'rubbersoul_pro_tipo_boton',
        array(
            'label'          => __( 'Button type', 'rubbersoul-pro' ),
            'section'        => 'rubbersoul_pro_pro_addthis',
            'settings'       => 'rubbersoul_pro_tipo_boton',
            'type'           => 'radio',
            'choices'        => array(
				'<div class="addthis_sharing_toolbox"></div>' => 'ToolBox',
                '<div class="addthis_native_toolbox"></div>' => 'Original',
            )
        )
    )
);

// Localización de los botones AddThis
$wp_customize->add_setting('rubbersoul_pro_boton_addthis_bajo_titulo', array('default' => 1, 'sanitize_callback' => 'rubbersoul_pro_sanitize_checkbox',));
$wp_customize->add_control('rubbersoul_pro_boton_addthis_bajo_titulo', array(
        'type' => 'checkbox',
        'label' => __('Below of entry title', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_addthis',
		));
		
$wp_customize->add_setting('rubbersoul_pro_boton_addthis_final_entrada', array('default' => '', 'sanitize_callback' => 'rubbersoul_pro_sanitize_checkbox',));
$wp_customize->add_control('rubbersoul_pro_boton_addthis_final_entrada', array(
        'type' => 'checkbox',
        'label' => __('End of entry', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_addthis',
		));

/**
 * Google Analytics
 */
 
$wp_customize->add_section('rubbersoul_pro_pro_ganalytics', array(
		'panel' => 'rubbersoul_pro_pro_panel',
		'title' => 'Google Analytics',
		'priority' => 47,
		));

$wp_customize->add_setting('rubbersoul_pro_enable_ganalytics', array('default' => '', 'sanitize_callback' => 'rubbersoul_pro_sanitize_checkbox',));
$wp_customize->add_control('rubbersoul_pro_enable_ganalytics', array(
        'type' => 'checkbox',
        'label' => __('Enable Google Analytics', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_ganalytics',
		));
		
// Código Google Analytics
$wp_customize->add_setting('rubbersoul_pro_ganalytics_code', array('default' => '', 'sanitize_callback' => 'custom_sanitize_textarea',));
$wp_customize->add_control('rubbersoul_pro_ganalytics_code', array(
        'type' => 'textarea',
        'label' => __('Paste your Google Analytics code', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_ganalytics',
		));

/**
 * Iconos sociales
 */	

$wp_customize->add_section('rubbersoul_pro_pro_top_bar', array(
		'panel' => 'rubbersoul_pro_pro_panel',
		'title' => __('Social icons', 'rubbersoul-pro'),
		'priority' => 44,
		));

// Social icons
$wp_customize->add_setting('rubbersoul_pro_twitter_url', array('default' => 'https://twitter.com/', 'sanitize_callback' => 'rubbersoul_pro_sanitize_text'));
$wp_customize->add_control('rubbersoul_pro_twitter_url', array(
        'label' => __('Twitter URL', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_top_bar',
        'type' => 'text',
    ));
	
$wp_customize->add_setting('rubbersoul_pro_facebook_url', array('default' => 'https://facebook.com/', 'sanitize_callback' => 'rubbersoul_pro_sanitize_text'));
$wp_customize->add_control('rubbersoul_pro_facebook_url', array(
        'label' => __('Facebook URL', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_top_bar',
        'type' => 'text',
    ));
	
$wp_customize->add_setting('rubbersoul_pro_googleplus_url', array('default' => 'https://plus.google.com/', 'sanitize_callback' => 'rubbersoul_pro_sanitize_text'));
$wp_customize->add_control('rubbersoul_pro_googleplus_url', array(
        'label' => __('Google plus URL', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_top_bar',
        'type' => 'text',
    ));
	
$wp_customize->add_setting('rubbersoul_pro_linkedin_url', array('default' => 'https://linkedin.com/', 'sanitize_callback' => 'rubbersoul_pro_sanitize_text'));
$wp_customize->add_control('rubbersoul_pro_linkedin_url', array(
        'label' => __('LinkedIn URL', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_top_bar',
        'type' => 'text',
    ));
	
$wp_customize->add_setting('rubbersoul_pro_youtube_url', array('default' => 'https://youtube.com/', 'sanitize_callback' => 'rubbersoul_pro_sanitize_text'));
$wp_customize->add_control('rubbersoul_pro_youtube_url', array(
        'label' => __('YouTube URL', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_top_bar',
        'type' => 'text',
    ));
	
$wp_customize->add_setting('rubbersoul_pro_instagram_url', array('default' => 'http://instagram.com/', 'sanitize_callback' => 'rubbersoul_pro_sanitize_text'));
$wp_customize->add_control('rubbersoul_pro_instagram_url', array(
        'label' => __('Instagram URL', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_top_bar',
        'type' => 'text',
    ));
	
$wp_customize->add_setting('rubbersoul_pro_pinterest_url', array('default' => 'https://pinterest.com/', 'sanitize_callback' => 'rubbersoul_pro_sanitize_text'));
$wp_customize->add_control('rubbersoul_pro_pinterest_url', array(
        'label' => __('Pinterest URL', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_top_bar',
        'type' => 'text',
    ));

$wp_customize->add_setting('rubbersoul_pro_rss_url', array('default' => 'http://wordpress.org/', 'sanitize_callback' => 'rubbersoul_pro_sanitize_text'));
$wp_customize->add_control('rubbersoul_pro_rss_url', array(
        'label' => __('RSS URL', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_top_bar',
        'type' => 'text',
    ));

/**
 * Shortcodes
 */
 
 $wp_customize->add_section('rubbersoul_pro_pro_shortcodes', array(
		'panel' => 'rubbersoul_pro_pro_panel',
		'title' => 'Shortcodes',
		'priority' => 50,
		));
		
$wp_customize->add_setting('rubbersoul_pro_sc_mensajes', array('default' => '', 'sanitize_callback' => 'rubbersoul_pro_sanitize_checkbox',));
$wp_customize->add_control('rubbersoul_pro_sc_mensajes', array(
        'type' => 'checkbox',
        'label' => __('Enable messages shortcode', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_shortcodes',
		));
		
$wp_customize->add_setting('rubbersoul_pro_sc_botones', array('default' => '', 'sanitize_callback' => 'rubbersoul_pro_sanitize_checkbox',));
$wp_customize->add_control('rubbersoul_pro_sc_botones', array(
        'type' => 'checkbox',
        'label' => __('Enable buttoms shortcode', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_shortcodes',
		));
		
$wp_customize->add_setting('rubbersoul_pro_sc_tabs', array('default' => '', 'sanitize_callback' => 'rubbersoul_pro_sanitize_checkbox',));
$wp_customize->add_control('rubbersoul_pro_sc_tabs', array(
        'type' => 'checkbox',
        'label' => __('Enable tabs shortcode', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_shortcodes',
		));

$wp_customize->add_setting('rubbersoul_pro_sc_acordeon', array('default' => '', 'sanitize_callback' => 'rubbersoul_pro_sanitize_checkbox',));
$wp_customize->add_control('rubbersoul_pro_sc_acordeon', array(
        'type' => 'checkbox',
        'label' => __('Enable accordion shortcode', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_shortcodes',
		));
		
$wp_customize->add_setting('rubbersoul_pro_enable_sc_widget_text', array('default' => '', 'sanitize_callback' => 'rubbersoul_pro_sanitize_checkbox',));
$wp_customize->add_control('rubbersoul_pro_enable_sc_widget_text', array(
        'type' => 'checkbox',
        'label' => __('Enable shortcodes in widgets text', 'rubbersoul-pro'),
        'section' => 'rubbersoul_pro_pro_shortcodes',
		));

}