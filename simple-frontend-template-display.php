<?php
defined( 'ABSPATH' ) OR exit;
/*
Plugin Name: Simple Frontend Template Display
Plugin URI: http://www.mikeselander.com/
Description: Displays the current page template in the admin bar for quick & easy reference
Version: 0.2
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

	const VERSION = '0.2.0';

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
	public function page_template_display( $wp_admin_bar ){
		//global $wp_admin_bar;

		if (!is_super_admin() || !is_admin_bar_showing() )
			return;

		// if you're not in the admin backend & it's a page
		if ( ( !is_admin() ) && ( is_page() ) ){

			// if get_current_template_name returns - set the menu item
			if ( $this->get_current_template_name() ) {
				$wp_admin_bar->add_node(
					array(
						'id' 		=> 'page_template',
						'title' 	=> __( 'Template: '.$this->get_current_template_name(), 'page_template' ),
						'parent'	=> false,
						'href' 		=> false
					)
				);
				if ( $this->get_current_page_slug() ) {
					$wp_admin_bar->add_node(
						array(
							'id' 		=> 'page_template_slug',
							'title' 	=> __( $this->get_current_page_slug(), 'page_template' ),
							'parent'	=> page_template,
							'href' 		=> false
						)
					);
				}



			} // end if template name is returned

		} // end if !is_admin && is_page

	} // end page_template_display()

	/**
	 * Grabs the template name
	 *
	 * @access public
	 * @since 0.1.0
	 * @return Template name string
	 */
	public function get_current_template_name(){

		// get all templates
		$all_templates = wp_get_theme()->get_page_templates();
		$returned = false;
		foreach ( $all_templates as $filename => $name ) {

			// if the template matches one of the filenames, return
			if ( $this->get_current_page_slug() == $filename ){
				return $name;
				$returned = true;
			};

		} // end foreach

		// If no slug is returned, then return "Default"
		if ( $returned === false ){
			return "Default";
		}

	} // end get_current_template_name()

	/**
	 * Grabs the template slug
	 *
	 * @access public
	 * @since 0.2.0
	 * @return Template slug string
	 */
	public function get_current_page_slug(){
		global $wp_query;

		$post_id = $wp_query->post->ID;
		return get_page_template_slug($post_id);
	} // end get_current_page_slug()

} // end PageTemplateDisplay

$display_template = new PageTemplateDisplay;

?>