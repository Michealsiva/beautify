<?php
$embed = new WP_Embed();
 
	if(!wp_script_is('fitvids'))
		wp_enqueue_script('fitvids', plugin_dir_url(SITEORIGIN_PANELS_BASE_FILE).'widgets/js/jquery.fitvids.js', array('jquery'), SITEORIGIN_PANELS_VERSION);

	if(!wp_script_is('siteorigin-panels-embedded-video'))
		wp_enqueue_script('siteorigin-panels-embedded-video', plugin_dir_url(SITEORIGIN_PANELS_BASE_FILE).'widgets/js/embedded-video.js', array('jquery', 'fitvids'), SITEORIGIN_PANELS_VERSION);

	echo $args['before_widget'];
	?><div class="siteorigin-fitvids"><?php echo $embed->run_shortcode( '[embed]' . $instance['embed_text'] . '[/embed]' ) ?></div><?php
	echo $args['after_widget']; 