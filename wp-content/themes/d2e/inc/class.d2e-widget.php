<?php
namespace D2e\Inc;

class D2e_widget extends D2e_theme_core{

	public function __construct(){

		add_action( 'widgets_init', [$this, 'init_widget'] );

	}

	public function init_widget(){
		register_sidebar( array(
			'name'          => __( 'Blog Sidebar', 'd2e' ),
			'id'            => 'sidebar-1',
			'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'd2e' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		));
	}
}