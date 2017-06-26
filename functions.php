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