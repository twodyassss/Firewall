<?php if (!defined('FIREWALL_VERSION')) { exit; } ?>
<?php printf(__('Either you or someone at IP address <b>%s</b> requested an alert unsubscribe link for the website <a href="%s"><b>%s</b></a>.', 'twodayssss'), esc_html($IP), esc_attr($siteURL), esc_html($siteName)); ?>
<br><br>
<?php printf(__('Request was generated at: %s', 'twodayssss'), wfUtils::localHumanDate()); ?>
<br><br>
<?php _e('If you did not request this, you can safely ignore it.', 'twodayssss'); ?>
<br><br>
<?php printf(__('<a href="%s" target="_blank">Click here</a> to stop receiving security alerts.', 'twodayssss'), wfUtils::getSiteBaseURL() . '?_wfsf=removeAlertEmail&jwt=' . $jwt); ?>
