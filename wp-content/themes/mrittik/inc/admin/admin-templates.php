<?php

if( !defined( 'ABSPATH' ) )
	exit;

class Mrittik_Admin_Templates extends Mrittik_Base{

	public function __construct() {
		$this->add_action( 'admin_menu', 'register_page', 20 );
	}

	public function register_page() {
		add_submenu_page(
			'pxlart',
		    esc_html__( 'Templates', 'mrittik' ),
		    esc_html__( 'Templates', 'mrittik' ),
		    'manage_options',
		    'edit.php?post_type=pxl-template',
		    false
		);
	}
}
new Mrittik_Admin_Templates;
