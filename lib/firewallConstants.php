<?php
define('FIREWALL_API_VERSION', '2.26');
define('FIREWALL_API_URL_SEC', '');
define('FIREWALL_API_URL_NONSEC', '');
define('FIREWALL_API_URL_BASE_SEC', FIREWALL_API_URL_SEC . 'v' . FIREWALL_API_VERSION . '/');
define('FIREWALL_BREACH_URL_BASE_SEC', FIREWALL_API_URL_SEC . 'passwords/');
define('FIREWALL_HACKATTEMPT_URL_SEC', '');
if (!defined('FIREWALL_CENTRAL_URL_SEC')) { define('FIREWALL_CENTRAL_URL_SEC', ''); }
if (!defined('FIREWALL_CENTRAL_API_URL_SEC')) { define('FIREWALL_CENTRAL_API_URL_SEC', ''); }
if (!defined('FIREWALL_CENTRAL_PUBLIC_KEY')) { define('FIREWALL_CENTRAL_PUBLIC_KEY', "\xb6\x33\x81\x05\xdf\xdf\xec\xcf\xf3\xe3\x36\xc6\xf0\x99\xc6\xf7\xca\x05\x36\xca\x87\x54\x53\x43\x31\xf2\xc6\x0d\xe1\x3d\x55\x0f"); }
define('FIREWALL_MAX_SCAN_LOCK_TIME', 86400); //Increased this from 10 mins to 1 day because very big scans run for a long time. Users can use kill.
define('FIREWALL_DEFAULT_MAX_SCAN_TIME', 10800);
if (!defined('FIREWALL_SCAN_ISSUES_MAX_REPORT')) { define('FIREWALL_SCAN_ISSUES_MAX_REPORT', 1500); }
define('FIREWALL_TRANSIENTS_TIMEOUT', 3600); //how long are items cached in seconds e.g. files downloaded for diffing
define('FIREWALL_MAX_IPLOC_AGE', 86400); //1 day
define('FIREWALL_CRAWLER_VERIFY_CACHE_TIME', 604800); 
define('FIREWALL_REVERSE_LOOKUP_CACHE_TIME', 86400);
define('FIREWALL_MAX_FILE_SIZE_TO_PROCESS', 52428800); //50 megs
define('FIREWALL_TWO_FACTOR_GRACE_TIME_AUTHENTICATOR', 90);
define('FIREWALL_TWO_FACTOR_GRACE_TIME_PHONE', 1800);
if (!defined('FIREWALL_DISABLE_LIVE_TRAFFIC')) { define('FIREWALL_DISABLE_LIVE_TRAFFIC', false); }
if (!defined('FIREWALL_SCAN_ISSUES_PER_PAGE')) { define('FIREWALL_SCAN_ISSUES_PER_PAGE', 100); }
if (!defined('FIREWALL_BLOCKED_IPS_PER_PAGE')) { define('FIREWALL_BLOCKED_IPS_PER_PAGE', 100); }
if (!defined('FIREWALL_DISABLE_FILE_VIEWER')) { define('FIREWALL_DISABLE_FILE_VIEWER', false); }
if (!defined('FIREWALL_SCAN_FAILURE_THRESHOLD')) { define('FIREWALL_SCAN_FAILURE_THRESHOLD', 300); }
if (!defined('FIREWALL_SCAN_START_FAILURE_THRESHOLD')) { define('FIREWALL_SCAN_START_FAILURE_THRESHOLD', 15); }
if (!defined('FIREWALL_PREFER_WP_HOME_FOR_WPML')) { define('FIREWALL_PREFER_WP_HOME_FOR_WPML', false); } //When determining the unfiltered `home` and `siteurl` with WPML installed, use WP_HOME and WP_SITEURL if set instead of the database values
if (!defined('FIREWALL_SCAN_MIN_EXECUTION_TIME')) { define('FIREWALL_SCAN_MIN_EXECUTION_TIME', 8); }
if (!defined('FIREWALL_SCAN_MAX_INI_EXECUTION_TIME')) { define('FIREWALL_SCAN_MAX_INI_EXECUTION_TIME', 90); }
if (!defined('FIREWALL_ALLOW_DIRECT_MYSQLI')) { define('FIREWALL_ALLOW_DIRECT_MYSQLI', true); }
