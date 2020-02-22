<?php
/*
Plugin: firewall
*/
if(defined('WP_INSTALLING') && WP_INSTALLING){
	return;
}

if (!defined('ABSPATH')) {
	exit;
}
define('FIREWALL_VERSION', '2.30.0');
define('TF_BUILD_NUMBER', '1581523568');
define('TF_BASENAME', function_exists('plugin_basename') ? plugin_basename(__FILE__) :
	basename(dirname(__FILE__)) . '/' . basename(__FILE__));

global $wp_plugin_paths;
foreach ($wp_plugin_paths as $dir => $realdir) {
	if (strpos(__FILE__, $realdir) === 0) {
		define('TF_FCPATH', $dir . '/' . basename(__FILE__));
		define('TF_PATH', trailingslashit($dir));
		break;
	}
}
if (!defined('TF_FCPATH')) {
	/** @noinspection PhpConstantReassignmentInspection */
	define('TF_FCPATH', __FILE__);
	/** @noinspection PhpConstantReassignmentInspection */
	define('TF_PATH', trailingslashit(dirname(TF_FCPATH)));
}
if (!defined('WF_IS_WP_ENGINE')) {
	define('WF_IS_WP_ENGINE', isset($_SERVER['IS_WPE']));
}

if(get_option('tfActivated') != 1){
	add_action('activated_plugin','firewall_save_activation_error'); function firewall_save_activation_error(){ update_option('wf_plugin_act_error',  ob_get_contents()); }
}
if(! defined('FIREWALL_VERSIONONLY_MODE')){ //Used to get version from file.
	$maxMemory = @ini_get('memory_limit');
	$last = strtolower(substr($maxMemory, -1));
	$maxMemory = (int) $maxMemory;
	
	if ($last == 'g') { $maxMemory = $maxMemory * 1024 * 1024 * 1024; }
	else if ($last == 'm') { $maxMemory = $maxMemory * 1024 * 1024; }
	else if ($last == 'k') { $maxMemory = $maxMemory * 1024; }
	
	if ($maxMemory < 134217728 /* 128 MB */ && $maxMemory > 0 /* Unlimited */) {
		if (strpos(ini_get('disable_functions'), 'ini_set') === false) {
			@ini_set('memory_limit', '128M'); //Some hosts have ini set at as little as 32 megs. 128 is the min sane amount of memory.
		}
	}

	/**
	 * Constant to determine if firewall is installed on another WordPress site one or more directories up in
	 * auto_prepend_file mode.
	 */
	define('WFWAF_SUBDIRECTORY_INSTALL', class_exists('wfWAF') &&
		!in_array(realpath(dirname(__FILE__) . '/vendor/firewall/wf-waf/src/init.php'), get_included_files()));
	if (!WFWAF_SUBDIRECTORY_INSTALL) {
		require_once(dirname(__FILE__) . '/vendor/firewall/wf-waf/src/init.php');
	}
	
	//Modules

	//Load
	require_once(dirname(__FILE__) . '/lib/firewallConstants.php');
	require_once(dirname(__FILE__) . '/lib/firewallClass.php');
	firewall::install_actions();
}
