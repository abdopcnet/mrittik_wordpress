<?php
/**
* The Mrittik_Admin_Dashboard base class
*/

if( !defined( 'ABSPATH' ) )
	exit; 

class Mrittik_Admin_Dashboard extends Mrittik_Admin_Page {

	public function __construct() {
		$this->id = 'pxlart';
		$this->page_title = mrittik()->get_name();
		$this->menu_title = mrittik()->get_name();
		$this->position = '50';

		parent::__construct();
	}

	public function display() {
		include_once( get_template_directory() . '/inc/admin/views/admin-dashboard.php' );
	}
 
	public function save() {

	}
}
new Mrittik_Admin_Dashboard;
