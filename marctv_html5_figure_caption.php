<?php
/*
  Plugin Name: MarcTV HTML5 Figure Caption
  Plugin URI: http://www.marctv.de/blog/2010/08/25/marctv-wordpress-plugins/
  Description: Replaces image markup with the HTML5 figure and figcaption tags. Removes the inline styles, too. 
  Version: 1.2
  Author: Marc Tönsing
  Author URI: http://www.marctv.de
  License: GPL2

  This program is free software; you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation; either version 2 of the License, or
  (at your option) any later version.
 */

add_filter('img_caption_shortcode', 'html5_img_caption_shortcode', 1, 3 );
function html5_img_caption_shortcode($string, $attr, $content = null) {
    extract(shortcode_atts(array(
        'id'    => '',
        'align' => 'alignnone',
        'width' => '',
        'caption' => ''
    ), $attr)
    );
    if ( 1 > (int) $width || empty($caption) )
        return $content;
    if ( $id ) $id = 'id="' . esc_attr($id) . '" ';
 
    return '<p ' . $id . 'class="childIMG wp-caption figure ' . esc_attr($align) . '">' .
        do_shortcode( $content ) .
        '<span class="figcaption wp-caption-text">' . $caption . '</span>'.
        '</p>';
}