<?php  

/*
Plugin Name: post_slider
Description: slide.....
Plugin URI: http://apurba.me
Author: Apurba
Author URI: http://apblogs.com
Version: 1.0
License: GPL2
Text Domain: ap_slider
Domain Path: Domain Path
*/

/*

    Copyright (C) Year  Author  Email

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/




function ap_scripts() {

	wp_enqueue_style( 'flexslider_css', plugins_url( 'css/flexslider.css', __FILE__ ));
	wp_enqueue_style( 'slider_css', plugins_url( 'css/slider.css', __FILE__ ));


	wp_enqueue_script( 'jquery_flexslider_js',  plugins_url( 'js/jquery.flexslider.js', __FILE__ ), array('jquery',), '', true );
	wp_enqueue_script( 'slider_js',  plugins_url( 'js/slider.js', __FILE__ ), array('jquery',), '', true );

}
add_action( 'wp_enqueue_scripts', 'ap_scripts' );



function slide_show( $atts ) {
	$atts = shortcode_atts( array(
		'ids' => ''
	), $atts );
	extract($atts);
	
	$links=explode( ',',  $ids );


	$h="";

	//$h.='<div class="container">';
	$h.='<div class="slider-container">';
	
					
	
	$h.= '<div class="flexslider">';
	$h.=' <ul class="slides">';
	$slize=array(100,100);
	foreach ((array)$links as $link) {

	
		$h.='<li>'.wp_get_attachment_image( $link, 'thumbnails').'</li>';
		
	}

	$h.='  </ul>';
	$h.='</div>';
				
			$h.='</div>';
	
	//$h.='</div>';	
	return $h;

	// do shortcode actions here
}
add_shortcode( 'gallerys','slide_show' );