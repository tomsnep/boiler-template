<?php
/*
Plugin Name: Custom Post Types
Description: Handmade plugin for custom post types
Author: Tom Snepvangers
Author URI: http://www.tomsnepvangers.com
*/


add_action( 'init', 'custom_post_type' );

function custom_post_type() {

register_post_type( 'collectie', array(
  'labels' => array(
    	'name'                  => 'Collectie',
        'singular_name'         => 'Antiek Object',
        'menu_name'             => 'Collectie', 'antiekuitleen',
        'name_admin_bar'        => 'Collectie', 'antiekuitleen',
        'archives'              => 'Collectie archieven', 'antiekuitleen',
        'parent_item_colon'     => 'Parent Item', 'antiekuitleen',
        'all_items'             => 'Alle objecten', 'antiekuitleen',
        'add_new_item'          => 'Voeg nieuw object toe', 'antiekuitleen',
        'add_new'               => 'Nieuw object toevoegen', 'antiekuitleen',
        'new_item'              => 'Nieuw object', 'antiekuitleen',
        'edit_item'             => 'Bewerk object', 'antiekuitleen',
        'update_item'           => 'Update object', 'antiekuitleen',
        'view_item'             => 'Bekijk object', 'antiekuitleen',
        'search_items'          => 'Zoek objecten', 'antiekuitleen',
        'not_found'             => 'Niet gevonden', 'antiekuitleen',
        'not_found_in_trash'    => 'Niet gevonden in de prullenbak', 'antiekuitleen',
        'featured_image'        => 'Uitgelichte afbeelding', 'antiekuitleen',
        'set_featured_image'    => 'Uitgelichte afbeelding instellen', 'antiekuitleen',
        'remove_featured_image' => 'Verwijder uitgelichte afbeelding', 'antiekuitleen',
        'use_featured_image'    => 'Gebruik als uitgelichte afbeelding', 'antiekuitleen',
        'insert_into_item'      => 'Invoegen in object', 'antiekuitleen',
        'uploaded_to_this_item' => 'Uploaded naar dit object', 'antiekuitleen',
        'items_list'            => 'Collectie lijst', 'antiekuitleen',
        'items_list_navigation' => 'Collectie lijst navigatie', 'antiekuitleen',
        'filter_items_list'     => 'Filter Collectie', 'antiekuitleen',
   ),
  'description' 				=> 'A plugin to create your own custom post types',
  'public' 						=> true,
  'menu_icon'             		=> 'dashicons-store',
  'menu_position' 				=> 3,
  'supports' 					=> array( 'title', 'editor', 'custom-fields' )
));
}