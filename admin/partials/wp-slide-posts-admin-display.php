<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://jackdoyle.co
 * @since      1.0.0
 *
 * @package    Wp_Slide_Posts
 * @subpackage Wp_Slide_Posts/admin/partials
 */

	$post_types = get_post_types(array('public' => true));

?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->
<div class="wrap">
	<h2><?php echo esc_html(get_admin_page_title()); ?></h2>
	<form action="options.php" name="cleanup_options" method="post" class="setup">
		<?php
			//Grab all options
        	$options = get_option($this->plugin_name);

        	$background_color = $options['background'];
        	$arrowColor = $options['arrow-color'];
        	$fontColor = $options['font-color'];
        	$fontText = $options['font-text'];

        	settings_fields($this->plugin_name);
        	do_settings_sections($this->plugin_name);
		?>
		<?php settings_fields($this->plugin_name); ?>
		<div class="form-group post_select">
			<p>Select which posts the navigation will be active on.</p>
			<?php foreach ($post_types as $post) : ?>
				<?php if($post !== 'page' && $post !== 'attachment'): ?>
					<span><?php echo $post; ?></span>
					<input type="checkbox" name="<?php echo $this->plugin_name; ?>[post_types][]" value="<?php echo $post; ?>"  <?php foreach ($options as $value) {
						checked($value, $post);
					} ?> >
				<?php endif; ?>
			<?php endforeach; ?>	
		</div>

		<div class="form-group">
			<span>Select a background color for the nav links</span><br><br>
			<input type="color" name="<?php echo $this->plugin_name; ?>[background]" value="<?php echo $background_color;?>">
		</div>

		<div class="form-group">
			<span>Specify a color for the arrows</span><br><br>
			<input type="color" name="<?php echo $this->plugin_name; ?>[arrow-color]" value="<?php echo $arrowColor; ?>">
		</div>				

		<div class="form-group">
			<span>Specify a color for the text</span><br><br>
			<input type="color" name="<?php echo $this->plugin_name; ?>[font-color]" value="<?php echo $fontColor; ?>">
		</div>		

		<div class="form-group">
			<span>Specify a font for the text</span><br><br>
			<input type="text" name="<?php echo $this->plugin_name; ?>[font-text]" value="<?php echo $fontText; ?>">
		</div>

		<?php submit_button('Save all changes', 'primary','submit', TRUE); ?>
	</form>
</div>
