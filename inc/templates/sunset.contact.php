<h1>Sunset Theme Options</h1>
<?php settings_errors(); ?>
<form method="post" action="options.php" class="sunset-general-form">
	<?php settings_fields( 'sunset-contact-options'); ?>
	<?php do_settings_sections('sunset_theme_contact_options'); ?>
	<?php submit_button(); ?>
</form>