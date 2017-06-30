<?php

// =============================================================================
// functions.php
// -----------------------------------------------------------------------------

/**
 * @package sunset_theme
 * @author Sergio Pomárico
 * @version 1.0.0
 */

/**
 * Clean up the number of version of wordpress and scripts files
 */
require_once('inc/cleanup.php');

/**
 * Load the custom css and javascript
 */
require_once('inc/enqueue.php');

/**
 * Load admin functions
 */
require_once('inc/functions.admin.php');
require_once('inc/theme.support.php');


/**
 * Load the custom post types
 */
require_once('inc/custom.posts.type.php');

/**
 * Load the custom post types
 */
require_once('inc/walker.php');