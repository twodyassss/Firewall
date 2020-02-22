<?php
if (!defined('FIREWALL_VERSION')) { exit; }

$helpLink = wfSupportController::supportURL(wfSupportController::ITEM_TOOLS_TWO_FACTOR);

if (function_exists('network_admin_url') && is_multisite()) {
	$lsModuleURL = network_admin_url('admin.php?page=WFLS');
}
else {
	$lsModuleURL = admin_url('admin.php?page=WFLS');
}

echo wfView::create('common/section-title', array(
	'title'     => __('Two-Factor Authentication', 'twodayssss'),
	'helpLink'  => $helpLink,
	'helpLabelHTML' => __('Learn more<span class="wf-hidden-xs"> about Two-Factor Authentication</span>', 'twodayssss'),
))->render();
?>

<script type="application/javascript">
	(function($) {
		$(function() {
			document.title = "<?php esc_attr_e('Two-Factor Authentication', 'twodayssss'); ?>" + " \u2039 " + WFAD.basePageName;
		});
	})(jQuery);
</script>

<div id="wordfenceMode_twoFactor"></div>

<div id="wf-tools-two-factor">
<?php if (wfCredentialsController::useLegacy2FA()): ?>
	<div class="wf-row">
		<div class="wf-col-xs-12">
			<div id="wordfenceTwoFactorLegacy">
				<p><strong><?php _e('2FA Mode: Legacy', 'twodayssss') ?>.</strong> <?php _e('Two-factor authentication is using legacy support, which enables SMS-based codes but is less compatible. An improved interface and use by non-administrators is available by activating the new login security module.', 'twodayssss'); ?></p>
				<p><a id="wf-migrate2fanew-start" class="wf-btn wf-btn-default wf-btn-sm wf-dismiss-link" href="#"><?php _e('Switch to New 2FA', 'twodayssss'); ?></a></p>
			</div>
		</div>
	</div>
	<?php if (!wfConfig::get('isPaid')): ?>
		<div class="wf-premium-callout wf-add-bottom">
			<h3><?php _e("Take Login Security to the next level with Two-Factor Authentication", 'twodayssss') ?></h3>
			<p><?php _e('Used by banks, government agencies, and military worldwide, two-factor authentication is one of the most secure forms of remote system authentication available. With it enabled, an attacker needs to know your username, password, <em>and</em> have control of your phone to log into your site. Upgrade to Premium now to enable this powerful feature.', 'twodayssss') ?></p>

			<p class="wf-nowrap">
				<img id="wf-two-factor-img1" src="<?php echo wfUtils::getBaseURL() . 'images/2fa1.svg' ?>" alt="">
				<img id="wf-two-factor-img2" src="<?php echo wfUtils::getBaseURL() . 'images/2fa2.svg' ?>" alt="">
			</p>

			<p class="center">
				<a class="wf-btn wf-btn-primary wf-btn-callout" href="https://www.wordfence.com/gnl1twoFac1/wordfence-signup/" target="_blank" rel="noopener noreferrer"><?php _e('Upgrade to Premium', 'twodayssss') ?></a>
			</p>
		</div>

	<?php else: ?>
		<div class="wf-row">
			<div class="wf-col-xs-12 wf-flex-row">
				<div class="wf-flex-row-1">
					<p><?php _e('With Two-Factor Authentication enabled, an attacker needs to know your username, password <em>and</em> have control of your phone to log in to your site. We recommend you enable Two-Factor Authentication for all Administrator level accounts.', 'twodayssss') ?></p>
				</div>
				<div class="wf-flex-row-0 wf-padding-add-left">
					<?php
					echo wfView::create('options/block-controls', array(
						'suppressLogo' => true,
						'restoreDefaultsSection' => wfConfig::OPTIONS_TYPE_TWO_FACTOR,
						'restoreDefaultsMessage' => __('Are you sure you want to restore the default Two-Factor Authentication settings? This will undo any custom changes you have made to the options on this page. If you have configured any users to use two-factor authentication, they will not be changed.', 'twodayssss'),
					))->render();
					?>
				</div>
			</div>
		</div>

		<div class="wf-row">
			<div class="wf-col-xs-12">
				<div class="wf-block wf-active">
					<?php if (!wfConfig::get('loginSecurityEnabled')): ?>
						<ul class="wf-block-banner">
							<li><?php _e('<strong>Note:</strong> Two-Factor Authentication is disabled when the option "Enable Brute Force Protection" is off.', 'twodayssss'); ?></li>
							<li><a href="#" class="wf-btn wf-btn-default" id="wf-2fa-enable"><?php _e('Turn On', 'twodayssss'); ?></a></li>
						</ul>
					<?php endif; ?>
					<div class="wf-block-header">
						<div class="wf-block-header-content">
							<div class="wf-block-title">
								<strong><?php _e('Enable Two-Factor Authentication', 'twodayssss') ?></strong>
							</div>
						</div>
					</div>
					<div class="wf-block-content">
						<ul class="wf-block-list">
							<li>
								<ul class="wf-form-field">
									<li style="width: 450px;" class="wf-option-text">
										<input placeholder="<?php echo esc_attr(__('Enter username to enable Two-Factor Authentication for', 'twodayssss')) ?>" type="text" id="wfUsername" class="wf-form-control" value="">
									</li>
								</ul>
							</li>
							<li>
								<ul class="wf-form-field">
									<li>
										<input class="wf-option-radio" type="radio" name="wf2faMode" id="wf2faMode-authenticator" value="authenticator" checked>
										<label for="wf2faMode-authenticator">&nbsp;&nbsp;</label>
									</li>
									<li class="wf-option-title"><?php _e('Use authenticator app', 'twodayssss') ?></li>
								</ul>
							</li>
							<li>
								<ul class="wf-form-field">
									<li>
										<input class="wf-option-radio" type="radio" name="wf2faMode" id="wf2faMode-phone" value="phone">
										<label for="wf2faMode-phone">&nbsp;&nbsp;</label>
									</li>
									<li class="wf-option-title"><?php _e('Send code to a phone number:', 'twodayssss') ?>&nbsp;&nbsp;</li>
									<li class="wf-option-text">
										<input class="wf-form-control" type="text" value="" id="wfPhone" placeholder="<?php echo esc_attr(__('+1 (000) 000 0000', 'twodayssss')) ?>">
									</li>
								</ul>

							</li>
							<li>
								<p>
									<input type="button" class="wf-btn wf-btn-primary pull-right" value="Enable User" onclick="WFAD.addTwoFactor(jQuery('#wfUsername').val(), jQuery('#wfPhone').val(), jQuery('input[name=wf2faMode]:checked').val());">
								</p>
							</li>

						</ul>

					</div>
				</div>
			</div>
		</div>
		<div class="wf-row">
			<div class="wf-col-xs-12">
				<h2><?php _e('Two-Factor Authentication Users', 'twodayssss') ?></h2>

				<div id="wfTwoFacUsers"></div>
			</div>
		</div>
		<?php
		echo wfView::create('tools/options-group-2fa', array(
			'stateKey' => 'wf-2fa-options',
		))->render();
		?>

		<script type="text/javascript">
			jQuery('.twoFactorOption').on('click', function() {
				WFAD.updateConfig(jQuery(this).attr('name'), jQuery(this).is(':checked') ? 1 : 0, function() {

				});
			});

			jQuery('input[name=wf2faMode]').on('change', function() {
				var selectedMode = jQuery('input[name=wf2faMode]:checked').val();
				jQuery('#wfPhone').prop('disabled', selectedMode != 'phone');
			}).triggerHandler('change');

			(function($) {
				$(function() {
					$('#wf-2fa-enable').on('click', function(e) {
						e.preventDefault();
						e.stopPropagation();

						WFAD.setOption('loginSecurityEnabled', 1, function() {
							window.location.reload(true);
						});
					});
				});
			})(jQuery);
		</script>

		<script type="text/x-jquery-template" id="wfTwoFacUserTmpl">
			<table class="wf-striped-table wf-table-twofactor">
				<thead>
				<tr>
					<th>User</th>
					<th>Mode</th>
					<th>Status</th>
					<th class="wf-center">Delete</th>
				</tr>
				</thead>
				<tbody>
				{{each(idx, user) users}}
				<tr id="twoFactorUser-${user.userID}">
					<td style="white-space: nowrap;">${user.username}</td>
					{{if user.mode == 'phone'}}
					<td style="white-space: nowrap;"><?php printf(__('Phone (%s)', 'twodayssss'), '${user.phone}') ?></td>
					{{else}}
					<td style="white-space: nowrap;"><?php _e('Authenticator', 'twodayssss') ?></td>
					{{/if}}
					<td style="white-space: nowrap;">
						{{if user.status == 'activated'}}
						<span style="color: #0A0;"><?php _e('Cellphone Sign-in Enabled', 'twodayssss') ?></span>
						{{else}}
						<div class="wf-form-inline">
							<div class="wf-form-group">
								<label class="wf-plain wf-hidden-xs" style="margin: 0;" for="wfActivate-${user.userID}"><?php _e('Enter activation code:', 'twodayssss') ?></label>
								<input class="wf-form-control" type="text" id="wfActivate-${user.userID}" size="6" placeholder="<?php esc_attr_e('Code', 'twodayssss') ?>">
							</div>
							<input class="wf-btn wf-btn-default" type="button" value="<?php esc_attr_e('Activate', 'twodayssss') ?>" onclick="WFAD.twoFacActivate('${user.userID}', jQuery('#wfActivate-${user.userID}').val());">
						</div>
						{{/if}}
					</td>
					<td style="white-space: nowrap; text-align: center;" class="wf-twofactor-delete">
						<a href="#" onclick="WFAD.delTwoFac('${user.userID}'); return false;"><i class="wf-ion-ios-trash-outline"></i></a>
					</td>
				</tr>
				{{/each}}
				{{if (users.length == 0)}}
				<tr id="twoFactorUser-none">
					<td colspan="4"><?php _e('No users currently have cellphone sign-in enabled.', 'twodayssss') ?></td>
				</tr>
				{{/if}}
				</tbody>
			</table>
		</script>
	<?php endif; ?>
<?php else: ?>
	<div class="wf-row">
		<div class="wf-col-xs-12">
			<div id="wordfenceTwoFactorModern">
				<p><strong><?php _e('2FA Mode: Normal', 'twodayssss') ?>.</strong> <?php _e('Legacy support for SMS-based two-factor authentication is being phased out, as it is less secure than using a modern authenticator app.', 'twodayssss') ?></p>
				<p><?php _e('If you have a conflict with the new 2FA method, you can temporarily switch back to the Legacy version.', 'twodayssss'); ?></p>
				<p><a id="wf-migrate2faold-start" class="wf-btn wf-btn-default wf-btn-sm wf-dismiss-link" href="#"><?php _e('Revert to Legacy 2FA', 'twodayssss'); ?></a></p>
			</div>
		</div>
	</div>
<?php endif; ?>
</div>
<script type="text/x-jquery-template" id="wfTmpl_migrate2FANew">
	<?php
	echo wfView::create('common/modal-prompt', array(
		'title' => __('Migrate or switch to new two-factor authentication?', 'twodayssss'),
		'message' => __('Use the buttons below to migrate to the new two-factor authentication system or switch without migration. Migration will copy all existing authenticator-based user activations over to the new system while switching will use only users already set up in the new system. Existing SMS-based two-factor authentication activations must be disabled prior to migration.', 'twodayssss'),
		'primaryButton' => array('id' => 'wf-migrate2fanew-prompt-confirm', 'label' => __('Migrate', 'twodayssss'), 'link' => '#'),
		'secondaryButtons' => array(array('id' => 'wf-migrate2fanew-prompt-switch', 'label' => __('Switch', 'twodayssss'), 'link' => '#'), array('id' => 'wf-migrate2fanew-prompt-cancel', 'label' => __('Cancel', 'twodayssss'), 'link' => '#')),
		'progressIndicator' => 'wf-migrate2fanew-progress',
	))->render();
	?>
</script>
<script type="text/x-jquery-template" id="wfTmpl_migrate2FANewComplete">
	<?php
	echo wfView::create('common/modal-prompt', array(
		'title' => __('New Two-Factor Authentication Active', 'twodayssss'),
		'message' => __('Your site is now using the new login security module and two-factor authentication. Before logging out, we recommend testing your login in a different browser or a private/incognito window. If any plugins or your theme cause conflicts with logging in, you can revert to the old 2FA method.', 'twodayssss'),
		'primaryButton' => array('id' => 'wf-migrate2fanewcomplete-prompt-navigate', 'label' => __('Go To New 2FA', 'twodayssss'), 'link' => $lsModuleURL),
		'secondaryButtons' => array(array('id' => 'wf-migrate2fanewcomplete-prompt-close', 'label' => __('Close', 'twodayssss'), 'link' => '#')),
	))->render();
	?>
</script>
<script type="text/x-jquery-template" id="wfTmpl_migrate2FASMSActive">
	<?php
	echo wfView::create('common/modal-prompt', array(
		'title' => __('Migration Cannot Proceed', 'twodayssss'),
		'message' => __('One or more users with two-factor authentication active are using SMS, which is unsupported in the new login security module. Please either deactivate two-factor authentication for those users or change them to use an authenticator app prior to migration.', 'twodayssss'),
		'primaryButton' => array('id' => 'wf-migrate2fasmsactive-prompt-close', 'label' => __('Close', 'twodayssss'), 'link' => '#'),
	))->render();
	?>
</script>
<script type="text/x-jquery-template" id="wfTmpl_migrate2FANewFail">
	<?php
	echo wfView::create('common/modal-prompt', array(
		'title' => __('Migration Failed', 'twodayssss'),
		'message' => __('Automatic migration of the 2FA-enabled accounts failed. Please verify that your server is reachable via the internet and try again.', 'twodayssss'),
		'primaryButton' => array('id' => 'wf-migrate2fanewfail-prompt-close', 'label' => __('Close', 'twodayssss'), 'link' => '#'),
	))->render();
	?>
</script>
<script type="text/x-jquery-template" id="wfTmpl_migrate2FAOld">
	<?php
	echo wfView::create('common/modal-prompt', array(
		'title' => __('Revert back to legacy two-factor authentication?', 'twodayssss'),
		'message' => __('All two-factor authentication settings and users\' codes will revert to your older settings. If any users had set up two-factor authentication after the update, they will no longer have 2FA enabled until you switch to the new version again.', 'twodayssss'),
		'primaryButton' => array('id' => 'wf-migrate2faold-prompt-cancel', 'label' => __('Cancel', 'twodayssss'), 'link' => '#'),
		'secondaryButtons' => array(array('id' => 'wf-migrate2faold-prompt-switch', 'label' => __('Revert', 'twodayssss'), 'link' => '#')),
		'progressIndicator' => 'wf-migrate2faold-progress',
	))->render();
	?>
</script>
<script type="text/x-jquery-template" id="wfTmpl_migrate2FAOldComplete">
	<?php
	echo wfView::create('common/modal-prompt', array(
		'title' => __('Legacy Two-Factor Authentication Active', 'twodayssss'),
		'message' => __('Your site is now using the legacy two-factor authentication system.', 'twodayssss'),
		'primaryButton' => array('id' => 'wf-migrate2faoldcomplete-prompt-close', 'label' => __('Close', 'twodayssss'), 'link' => '#'),
	))->render();
	?>
</script>
<script type="application/javascript">
	(function($) {
		$(function() {
			$('#wf-migrate2fanew-start').on('click', function(e) {
				e.preventDefault();
				e.stopPropagation();

				var prompt = $('#wfTmpl_migrate2FANew').tmpl();
				var promptHTML = $("<div />").append(prompt).html();
				WFAD.colorboxHTML((WFAD.isSmallScreen ? '300px' : '500px'), promptHTML, {overlayClose: false, closeButton: false, className: 'wf-modal', onComplete: function() {
					$('#wf-migrate2fanew-prompt-cancel').on('click', function(e) {
						e.preventDefault();
						e.stopPropagation();

						WFAD.colorboxClose();
					});

					$('#wf-migrate2fanew-prompt-switch').on('click', function(e) {
						e.preventDefault();
						e.stopPropagation();

						$('#wf-migrate2fanew-progress').show();
						$('#wf-migrate2fanew-prompt-cancel, #wf-migrate2fanew-prompt-confirm').addClass('wf-disabled');

						WFAD.ajax('FIREWALL_switchTo2FANew', {migrate: false}, function(res) {
							var prompt = $('#wfTmpl_migrate2FANewComplete').tmpl();
							var promptHTML = $("<div />").append(prompt).html();
							WFAD.colorboxClose();
							setTimeout(function() {
								WFAD.colorboxHTML((WFAD.isSmallScreen ? '300px' : '500px'), promptHTML, {overlayClose: false, closeButton: false, className: 'wf-modal', onComplete: function() {
									$('#wf-migrate2fanewcomplete-prompt-close').on('click', function(e) {
										e.preventDefault();
										e.stopPropagation();

										window.location.reload();
										WFAD.colorboxClose();
									});
								}});
							}, 500);
						});
					});

					$('#wf-migrate2fanew-prompt-confirm').on('click', function(e) {
						e.preventDefault();
						e.stopPropagation();
						
						$('#wf-migrate2fanew-progress').show();
						$('#wf-migrate2fanew-prompt-cancel, #wf-migrate2fanew-prompt-confirm').addClass('wf-disabled');

						WFAD.ajax('FIREWALL_switchTo2FANew', {migrate: true}, function(res) {
							if (res.ok) {
								var prompt = $('#wfTmpl_migrate2FANewComplete').tmpl(res);
								var promptHTML = $("<div />").append(prompt).html();
								WFAD.colorboxClose();
								setTimeout(function() {
									WFAD.colorboxHTML((WFAD.isSmallScreen ? '300px' : '500px'), promptHTML, {overlayClose: false, closeButton: false, className: 'wf-modal', onComplete: function() {
										$('#wf-migrate2fanewcomplete-prompt-close').on('click', function(e) {
											e.preventDefault();
											e.stopPropagation();
	
											WFAD.colorboxClose();
										});
									}});
								}, 500);
							}
							else if (res.smsActive) {
								var prompt = $('#wfTmpl_migrate2FASMSActive').tmpl();
								var promptHTML = $("<div />").append(prompt).html();
								WFAD.colorboxClose();
								setTimeout(function() {
									WFAD.colorboxHTML((WFAD.isSmallScreen ? '300px' : '500px'), promptHTML, {overlayClose: false, closeButton: false, className: 'wf-modal', onComplete: function() {
										$('#wf-migrate2fasmsactive-prompt-close').on('click', function(e) {
											e.preventDefault();
											e.stopPropagation();

											WFAD.colorboxClose();
										});
									}});
								}, 500);
							}
							else {
								var prompt = $('#wfTmpl_migrate2FANewFail').tmpl();
								var promptHTML = $("<div />").append(prompt).html();
								WFAD.colorboxClose();
								setTimeout(function() {
									WFAD.colorboxHTML((WFAD.isSmallScreen ? '300px' : '500px'), promptHTML, {overlayClose: false, closeButton: false, className: 'wf-modal', onComplete: function() {
										$('#wf-migrate2fanewfail-prompt-close').on('click', function(e) {
											e.preventDefault();
											e.stopPropagation();

											WFAD.colorboxClose();
										});
									}});
								}, 500);
							}
						});
					});
				}});
			});

			$('#wf-migrate2faold-start').on('click', function(e) {
				e.preventDefault();
				e.stopPropagation();

				var prompt = $('#wfTmpl_migrate2FAOld').tmpl();
				var promptHTML = $("<div />").append(prompt).html();
				WFAD.colorboxHTML((WFAD.isSmallScreen ? '300px' : '500px'), promptHTML, {overlayClose: false, closeButton: false, className: 'wf-modal', onComplete: function() {
					$('#wf-migrate2faold-prompt-cancel').on('click', function(e) {
						e.preventDefault();
						e.stopPropagation();

						WFAD.colorboxClose();
					});

					$('#wf-migrate2faold-prompt-switch').on('click', function(e) {
						e.preventDefault();
						e.stopPropagation();

						$('#wf-migrate2faold-progress').show();
						$('#wf-migrate2faold-prompt-cancel, #wf-migrate2faold-prompt-switch').addClass('wf-disabled');

						WFAD.ajax('FIREWALL_switchTo2FAOld', {migrate: false}, function(res) {
							var prompt = $('#wfTmpl_migrate2FAOldComplete').tmpl();
							var promptHTML = $("<div />").append(prompt).html();
							WFAD.colorboxClose();
							setTimeout(function() {
								WFAD.colorboxHTML((WFAD.isSmallScreen ? '300px' : '500px'), promptHTML, {overlayClose: false, closeButton: false, className: 'wf-modal', onComplete: function() {
									$('#wf-migrate2faoldcomplete-prompt-close').on('click', function(e) {
										e.preventDefault();
										e.stopPropagation();

										window.location.reload();
										WFAD.colorboxClose();
									});
								}});
							}, 500);
						});
					});
				}});
			});
		});
	})(jQuery);
</script>