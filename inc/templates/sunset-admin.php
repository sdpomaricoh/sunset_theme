<h1>Sunset Theme Options</h1>
<?php settings_errors(); ?>
<?php
	$profilePicture = esc_attr(get_option('first_name'));
	$firstName = esc_attr(get_option('first_name'));
	$lastName = esc_attr(get_option('last_name'));
	$fullNane = $firstName.' '.$lastName;
	$userDescription= esc_attr(get_option('user_description'));
?>
<div class="sunset-sidebar-preview">
	<div class="sunset-sidebar">
		<div class="image-container">
			<div class="profile-picture" id="profile-picture-image" style="background-image: url('<?php echo $profilePicture; ?>')">
			</div>
		</div>
		<h1 class="sunset-username"><?php echo $fullNane; ?></h1>
		<h2 class="sunset-description"><?php echo $userDescription; ?></h2>
		<div class="icon-wraper"></div>
	</div>
</div>
<form method="post" action="options.php" class="sunset-general-form">
	<?php settings_fields( 'sunset-settings-group' ); ?>
	<?php do_settings_sections( 'sunset_theme' ); ?>
	<?php submit_button(); ?>
</form>