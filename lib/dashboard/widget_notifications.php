<?php if (!defined('FIREWALL_VERSION')) { exit; } ?>
<div class="wf-flex-row wf-flex-row-full-height wf-flex-row-vertical-xs">
	<div class="wf-flex-col-xs-100 <?php if (wfCentral::isSupported() && wfConfig::get('showWfCentralUI', false)): ?>wf-flex-col-lg-50 wf-col-lg-half-padding-right wf-dashboard-item-flex-wrapper<?php endif ?>">
		<div class="wf-dashboard-item active">
			<div class="wf-dashboard-item-inner">
				<div class="wf-dashboard-item-content">
					<div class="wf-dashboard-item-title">
						<strong>Notifications</strong><span class="wf-dashboard-badge wf-notification-count-container wf-notification-count-value<?php echo (count($d->notifications) == 0 ? ' wf-hidden' : ''); ?>"><?php echo number_format_i18n(count($d->notifications)); ?></span>
					</div>
					<div class="wf-dashboard-item-action"><div class="wf-dashboard-item-action-disclosure"></div></div>
				</div>
			</div>
			<div class="wf-dashboard-item-extra">
				<ul class="wf-dashboard-item-list wf-dashboard-item-list-striped">
					<?php foreach ($d->notifications as $n): ?>
						<li class="wf-notification<?php if ($n->priority % 10 == 1) { echo ' wf-notification-critical'; } else if ($n->priority % 10 == 2) { echo ' wf-notification-warning'; } ?>" data-notification="<?php echo esc_html($n->id); ?>">
							<div class="wf-dashboard-item-list-title"><?php echo $n->html; ?></div>
							<?php foreach ($n->links as $l): ?>
								<div class="wf-dashboard-item-list-action"><a href="<?php echo esc_html($l['link']); ?>"<?php if (preg_match('/^https?:\/\//i', $l['link'])) { echo ' target="_blank" rel="noopener noreferrer"'; } ?>><?php echo esc_html($l['label']); ?></a></div>
							<?php endforeach; ?>
							<div class="wf-dashboard-item-list-dismiss"><a href="#" class="wf-dismiss-notification"><i class="wf-fa wf-fa-times-circle" aria-hidden="true"></i></a></div>
						</li>
					<?php endforeach; ?>
					<?php if (count($d->notifications) == 0): ?>
						<li class="wf-notifications-empty">No notifications received</li>
					<?php endif; ?>
				</ul>
			</div>
		</div>
	</div>
	<?php if (wfCentral::isSupported() && wfConfig::get('showWfCentralUI', false)): ?>
		<div class="wf-flex-col-xs-100 wf-flex-col-lg-50 wf-col-lg-half-padding-left wf-dashboard-item-flex-wrapper wf-central-connected">
			<div class="wf-dashboard-item active wf-flex-row-1">
				<div class="wf-central-dashboard">
					<img class="wf-central-dashboard-logo" src="<?php echo wfUtils::getBaseURL() ?>images/wf-central-logo.svg" alt="Wordfence Central">
					<div class="wf-central-dashboard-copy">
						<p><strong><?php _e('Wordfence Central Status', 'twodayssss') ?></strong></p>
						<p><?php
							if ($d->wordfenceCentralConnected) {
								printf(__('Connected by %s on %s', 'twodayssss'), esc_html($d->wordfenceCentralConnectEmail), esc_html(date_i18n(get_option('date_format'), $d->wordfenceCentralConnectTime)));
							} elseif ($d->wordfenceCentralDisconnected) {
								printf(__('Disconnected by %s on %s', 'twodayssss'), esc_html($d->wordfenceCentralDisconnectEmail), esc_html(date_i18n(get_option('date_format'), $d->wordfenceCentralDisconnectTime)));
							} elseif (wfCentral::isPartialConnection()) {
								_e('It looks like you\'ve tried to connect this site to Wordfence Central, but the installation did not finish.', 'twodayssss');
							} else {
								_e('Wordfence Central allows you to manage Wordfence on multiple sites from one location. It makes security monitoring and configuring Wordfence easier.', 'twodayssss');
							}
						?></p>
						<div class="wf-flex-row">
							<?php if (wfCentral::isPartialConnection()): ?>
								<p>
									<a href="<?php echo FIREWALL_CENTRAL_URL_SEC ?>/sites/connection-issues?complete-setup=<?php echo esc_attr(wfConfig::get('wordfenceCentralSiteID')) ?>"
											class="wf-central-resume wf-btn wf-btn-sm wf-btn-primary"
									><?php _e('Resume Installation', 'twodayssss') ?></a>
									<a href="#" class="wf-central-disconnect wf-btn wf-btn-sm wf-btn-default"><strong><?php _e('Disconnect This Site', 'twodayssss') ?></strong></a>
								</p>
							<?php else: ?>
								<p class="wf-flex-row-1">
									<?php if ($d->wordfenceCentralConnected): ?>
										<a href="#" class="wf-central-disconnect"><strong><?php _e('Disconnect This Site', 'twodayssss') ?></strong></a>
									<?php else: ?>
										<a href="<?php echo FIREWALL_CENTRAL_URL_SEC ?>?newsite=<?php echo esc_attr(home_url()) ?>"><strong><?php _e($d->wordfenceCentralDisconnected ? 'Reconnect This Site' : 'Connect This Site', 'twodayssss') ?></strong></a>
									<?php endif; ?>
								</p>
								<p class="wf-flex-row-1 wf-right wf-nowrap"><a href="<?php echo esc_url(FIREWALL_CENTRAL_URL_SEC) ?>" target="_blank" rel="noopener noreferrer"><strong><?php _e('Visit Wordfence Central', 'twodayssss') ?></strong></a></p>
							<?php endif ?>

						</div>
					</div>
				</div>
			</div>
		</div>
	<?php endif ?>
</div>
<script type="application/javascript">
	(function($) {
		$('.wf-dismiss-notification').on('click', function(e) {
			e.preventDefault();
			e.stopPropagation();
			
			var n = $(this).closest('.wf-notification');
			var id = n.data('notification');
			n.fadeOut(400, function() {
				n.remove();
				
				var count = $('.wf-dismiss-notification').length;
				WFDash.updateNotificationCount(count);
			});
			
			WFAD.ajax('FIREWALL_dismissNotification', {
				id: id
			}, function(res) {
				//Do nothing
			});
		});

		$('.wf-central-disconnect').on('click', function(e) {
			e.preventDefault();

			var prompt = $('#wfTmpl_wfCentralDisconnectPrompt').tmpl();
			var promptHTML = $("<div />").append(prompt).html();
			WFAD.colorboxHTML('400px', promptHTML, {
				overlayClose: false, closeButton: false, className: 'wf-modal', onComplete: function() {
					$('#wf-central-prompt-cancel').on('click', function(e) {
						e.preventDefault();
						e.stopPropagation();

						WFAD.colorboxClose();
					});

					$('#wf-central-prompt-disconnect').on('click', function(e) {
						e.preventDefault();
						e.stopPropagation();
						WFAD.ajax('FIREWALL_wfcentral_disconnect', {}, function(response) {
							window.location.reload(true);
						});
					});
				}
			});

			return false;
		});
	})(jQuery);
</script>
<script type="text/x-jquery-template" id="wfTmpl_wfCentralDisconnectPrompt">
	<?php
	echo wfView::create('common/modal-prompt', array(
		'title'            => __('Confirm Disconnect', 'twodayssss'),
		'message'          => __('Are you sure you want to disconnect your site from Wordfence Central?', 'twodayssss'),
		'primaryButton'    => array('id' => 'wf-central-prompt-cancel', 'label' => __('Cancel', 'twodayssss'), 'link' => '#'),
		'secondaryButtons' => array(array('id' => 'wf-central-prompt-disconnect', 'label' => __('Disconnect', 'twodayssss'), 'link' => '#')),
	))->render();
	?>
</script>
