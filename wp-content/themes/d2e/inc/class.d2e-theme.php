<?php 
namespace D2e\Inc;
//if same namespace (extends) -> ignore use
//use D2e\Inc\D2e_settings;
//use D2e\Inc\D2e_theme_core;
//use D2e\Inc\D2e_theme_frontend;

class D2e_theme extends D2e_theme_frontend{
	
	
	public function __construct(){
		add_action( 'init', [$this,'init'] );
		add_filter( 'login_redirect', [$this,'redirect_login'], 10, 3 );
		add_action( 'init', [$this, 'blockusers_init'] );
		$theme_settings_obj = new D2e_settings();
		$theme_widget_obj = new D2e_widget();
		
	}

	public function member(){
		return new D2e_member();
	}	

	public function init(){
		add_action('wp_enqueue_scripts', [$this,'add_theme_script_web']);
		$this->add_menus();
		add_theme_support( 'post-thumbnails' );

	}

	public function add_theme_script_web(){
		wp_enqueue_style('component', THEME_URI.'/assets/css/components.css');
		wp_enqueue_style('responsee', THEME_URI.'/assets/css/responsee.css');
		wp_enqueue_style('template-style', THEME_URI.'/assets/css/template-style.css');
		wp_enqueue_style('carousel-style', THEME_URI.'/assets/owl-carousel/owl.carousel.css');
		wp_enqueue_style('carousel-theme-style', THEME_URI.'/assets/owl-carousel/owl.theme.css');


		wp_enqueue_script('jquery-lib', THEME_URI.'/assets/js/jquery-1.8.3.min.js');
		wp_enqueue_script('jquery-ui', THEME_URI.'/assets/js/jquery-ui.min.js');
		wp_enqueue_script('modernizr', THEME_URI.'/assets/js/modernizr.js');
		wp_enqueue_script('responsee', THEME_URI.'/assets/js/responsee.js');
		wp_enqueue_script('carousel', THEME_URI.'/assets/owl-carousel/owl.carousel.js');
	}

	


	public function add_menus(){
		add_theme_support( 'menus' );
		register_nav_menus( array(
			'top-left-menu' => __( 'Top Left Menu' ),
			'top-right-menu' => __('Top Right Menu')
		));
	}
	

	public function redirect_login( $redirect_to, $request, $user ) {
		//is there a user to check?
		if ( isset( $user->roles ) && is_array( $user->roles ) ) {
			//check for admins
			if ( in_array( 'administrator', $user->roles ) ) {
				return admin_url( $path = '', $scheme = 'admin' );
			} else {
				return home_url();
			}
		} else {
			return $redirect_to;
		}
	}

	
	public function blockusers_init() {
		if ( is_admin() && ! current_user_can( 'administrator' ) && ! ( defined( 'DOING_AJAX' ) && DOING_AJAX ) ) {
		wp_redirect( home_url() );
		exit;
		}
	}
	
}