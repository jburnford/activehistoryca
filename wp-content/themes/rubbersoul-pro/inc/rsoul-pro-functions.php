<?php
/**
 * RubberSoul Pro 1.0
 */

/*----------------------
 Breadcrumb
-----------------------*/
if (! function_exists('rubbersoul_pro_breadcrumb')){
	function rubbersoul_pro_breadcrumb() {
		echo '<a href="';
		echo home_url();
		echo '">';
		echo __( 'Home','rubbersoul-pro');
		echo "</a>";
			if (is_category() || is_single()) {
				echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
				the_category(' &bull; ');
					if (is_single()) {
						/*echo " &nbsp;&nbsp;&#187;&nbsp;&nbsp; ";
						the_title();*/
					}
			} elseif (is_page()) {
				echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;";
				echo the_title();
			} elseif (is_search()) {
				echo "&nbsp;&nbsp;&#187;&nbsp;&nbsp;Resultados de b&uacute;squeda para... ";
				echo '"<em>';
				echo the_search_query();
				echo '</em>"';
			}
	}
}

/*----------------------
 Paginación
-----------------------*/

function rubbersoul_pro_paginacion($pages = '', $range = 3) { 
$showitems = ($range * 3)+1;
global $paged; 
if (empty($paged)) $paged = 1;
if ($pages == '') {
	global $wp_query; $pages = $wp_query->max_num_pages; 
	if(!$pages){ $pages = 1; } 
}

 if (1 != $pages) { echo "<div align='center'><div class='paginacion'><ul>";
 
 if ($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."'>" . __('&laquo; First', 'rubbersoul-pro') . "</a></li>";
 
 if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."' class='inactive'>" . __('&lsaquo; Previous', 'rubbersoul-pro') . "</a></li>";
 
for ($i=1; $i <= $pages; $i++){ 
 	if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems )){ 
		echo ($paged == $i)? "<li class='current'><span class='currenttext'>".$i."</span></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive'>".$i."</a></li>";
 	} 
} 

if ($paged < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged + 1)."' class='inactive'>" . __('Next &rsaquo;', 'rubbersoul-pro') . "</a></li>";

 if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a class='inactive' href='".get_pagenum_link($pages)."'>" . __('Last &raquo;', 'rubbersoul-pro') . "</a>";
 echo "</ul></div></div>"; }
 
 }

/*
 * Campos sociales en perfil de usuario
 */
 
// Si el usuario puede publicar posts
if (current_user_can('publish_posts')){
    // Añadimos los campos
    add_filter('user_contactmethods', 'rubbersoul_add_contact_methods');
}
 
function rubbersoul_add_contact_methods($profile_fields) {
    $profile_fields['galusso_author_twitter'] = 'Twitter URL';
    $profile_fields['galusso_author_facebook'] = 'Facebook URL';
    $profile_fields['galusso_author_gplus'] = 'Google+ URL';
	$profile_fields['galusso_author_linkedin'] = 'LinkedIn URL';
 
    return $profile_fields;
}

?>