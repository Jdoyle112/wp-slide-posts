<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://jackdoyle.co
 * @since      1.0.0
 *
 * @package    Wp_Slide_Posts
 * @subpackage Wp_Slide_Posts/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Wp_Slide_Posts
 * @subpackage Wp_Slide_Posts/public
 * @author     Jack Doyle <Jdoyle112@gmail.com>
 */
class Wp_Slide_Posts_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		$this->saved_options = get_option($this->plugin_name);

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */


	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Slide_Posts_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Slide_Posts_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/wp-slide-posts-public.js', array( 'jquery' ), $this->version, false );

	}

	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Wp_Slide_Posts_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Wp_Slide_Posts_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		//wp_enqueue_style('bootstrap', '//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css', array());
		wp_register_style('font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
		wp_enqueue_style('font-awesome');
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/wp-slide-posts-public.css', array(), $this->version, 'all' );

	}	


	public function add_nav(){
		global $wp_query, $post;
		var_dump($this->saved_options);
		$background = $this->saved_options['background'];
		$arrowColor = $this->saved_options['arrow-color'];
		$fontColor = $this->saved_options['font-color'];
		$fontText = $this->saved_options['font-text'];

       	if(!empty($this->saved_options)){
       		foreach ($this->saved_options as $val) {
       			if($post->post_type == $val){ 
       				$next_post = get_next_post(true);
       				$prev_post = get_previous_post(true);

       				if(!empty($next_post)): ?>
					<a href="<?php echo get_permalink($next_post->ID); ?>">
						<div class="blog-nav nav-next" style="background: <?php if(!empty($background)){ echo $background; } ?>">
							<i class="fa fa-angle-right fa-3x" style="color: <?php if(!empty($arrowColor)){ echo $arrowColor; } ?>"></i><br>
							<span class="post-title" style="color: <?php if(!empty($fontColor)){ echo $fontColor; } ?>; font-family: <?php if(!empty($fontText)){ echo $fontText; } ?>, serif;"><?php echo $next_post->post_title; ?></span>
						</div>
					</a>
					<?php endif; ?>
					<?php  if(!empty($prev_post)): ?>
					<a href="<?php echo get_permalink($prev_post->ID); ?>">
						<div class="blog-nav nav-prev" style="background: <?php if(!empty($background)){ echo $background; } ?>">
							<i class="fa fa-angle-left fa-3x" style="color: <?php if(!empty($arrowColor)){ echo $arrowColor; } ?>"></i><br>
							<span class="post-title" style="color: <?php if(!empty($fontColor)){ echo $fontColor; } ?>; font-family: <?php if(!empty($fontText)){ echo $fontText; } ?>, serif;"><?php echo $prev_post->post_title; ?></span>
						</div>
					</a>	

       				<?php endif;
       			}
       		}
       	}		
	}

}
