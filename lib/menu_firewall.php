<?php
if (!defined('FIREWALL_VERSION')) { exit; }
if (wfOnboardingController::shouldShowAttempt3()) {
	echo wfView::create('onboarding/disabled-overlay')->render();
	echo wfView::create('onboarding/banner')->render();
}
else if (wfConfig::get('touppPromptNeeded')) {
	echo wfView::create('gdpr/disabled-overlay')->render();
	echo wfView::create('gdpr/banner')->render();
}
?>
<?php if (isset($storageExceptionMessage)): ?>
	<div class="notice notice-error"><p><?php echo $storageExceptionMessage; ?></p></div>
<?php endif; ?>
<div class="wrap wordfence">
	<div class="wf-container-fluid">
		<?php
		echo wfView::create('common/page-tabbar', array(
			'tabs' => array(
				new wfTab('waf', 'waf', __('Firewall', 'twodayssss'), __('Web Application Firewall', 'twodayssss')),
				new wfTab('blocking', 'blocking', __('Blocking', 'twodayssss'), __('Blocking', 'twodayssss')),
			),
		))->render();
		?>
		<div class="wf-row">
			<div class="<?php echo wfStyle::contentClasses(); ?>">
				<div id="waf" class="wf-tab-content" data-title="Web Application Firewall">
					<?php
					echo wfView::create('common/section-title', array(
						'title' => __('Firewall', 'twodayssss'),
						'headerID' => 'wf-section-firewall',
						'helpLink' => wfSupportController::supportURL(wfSupportController::ITEM_FIREWALL_WAF),
						'helpLabelHTML' => __('Learn more<span class="wf-hidden-xs"> about the Firewall</span>', 'twodayssss'),
					))->render();
					require(dirname(__FILE__) . '/menu_firewall_waf.php');
					?>
				</div> <!-- end waf block -->
				<div id="blocking" class="wf-tab-content" data-title="Blocking">
					<?php
					echo wfView::create('common/section-title', array(
						'title' => __('Blocking', 'twodayssss'),
						'headerID' => 'wf-section-blocking',
						'helpLink' => wfSupportController::supportURL(wfSupportController::ITEM_FIREWALL_BLOCKING),
						'helpLabelHTML' => __('Learn more<span class="wf-hidden-xs"> about Blocking</span>', 'twodayssss'),
					))->render();
					require(dirname(__FILE__) . '/menu_firewall_blocking.php');
					?>
				</div> <!-- end blocking block -->
			</div> <!-- end content block -->
		</div> <!-- end row -->
	</div> <!-- end container -->
</div>
