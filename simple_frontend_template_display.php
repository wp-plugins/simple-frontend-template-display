<?php
defined( 'ABSPATH' ) OR exit;
/*
Plugin Name: Simple Frontend Template Display
Plugin URI: http://www.mikeselander.com/
Description: Displays the current page template in the admin bar for quick & easy reference
Version: 0.1
Author: Mike Selander
Author URI: http://www.mikeselander.com/
License: GPL2
*/

/**
 * PageTemplateDisplay
 *
 * Creates a section on the admin menu bar to see the current page template
 *
 * @package WordPress
 * @category plugins
 * @author Mike Selander
 * @since 0.0.0
 * @link      http://mikeselander.com
 * @copyright 2013 Mike Selander
 */
class PageTemplateDisplay{

	const VERSION = '0.1.0';

	/**
	 * Constructor function.
	 *
	 * @access public
	 * @since 0.1.0
	 * @return void
	 */
	public function __construct(){

		add_action('admin_bar_menu', array( $this, "page_template_display" ), 500 );

	} // end __construct()

	/**
	 * Displays the template name on the admin menu bar
	 *
	 * @access public
	 * @since 0.1.0
	 */
	public function page_template_display(){
		global $wp_admin_bar;

		if (!is_super_admin() || !is_admin_bar_showing() )
			return;

		// if you're not in the admin backend & it's a page
		if ( ( !is_admin() ) && ( is_page() ) ){

			// if get_current_template_name returns - set the menu item
			if ( $this->get_current_template_name() ) {
				$wp_admin_bar->add_menu(
					array(
						'id' 		=> 'page_template',
						'title' 	=> __( 'Template: '.$this->get_current_template_name(), 'page_template' ),
						'parent'	=> false,
						'href' 		=> false
					)
				);
			} // end if template name is returned

		} // end if !is_admin && is_page

	} // end page_template_display()

	/**
	 * Grabs the template name
	 *
	 * @access private
	 * @since 0.1.0
	 * @return Template name string
	 */
	public function get_current_template_name(){
		global $wp_query;

		$post_id = $wp_query->post->ID;
		$current_template = get_page_template_slug($post_id);

		// If you only want to return the template filename, uncomment the below line and comment the rest of this function
		// return $current_template

		// get all templates
		$all_templates = wp_get_theme()->get_page_templates();
		$returned = false;
		foreach ( $all_templates as $filename => $name ) {

			// if the template matches one of the filenames, return
			if ( $current_template == $filename ){
				return $name;
				$returned = true;
			};

		} // end foreach

		// If no slug is returned, then return "Default"
		if ( $returned === false ){
			return "Default";
		}

	} // and get_current_template_name()

} // end PageTemplateDisplay

$display_template = new PageTemplateDisplay;

?>