<?php
if (!defined('FIREWALL_VERSION')) { exit; }
/**
 * Presents an issue template.
 */
echo wfView::create('scanner/issue-base', array(
	'internalType' => 'optionBadURL',
	'displayType' => __('URL', 'twodayssss'),
	'iconSVG' => '<svg viewBox="0 0 20 20"><g><path d="M18 16V4c0-.55-.45-1-1-1H4c-.55 0-1 .45-1 1v12c0 .55.45 1 1 1h13c.55 0 1-.45 1-1zM8 11h1c.55 0 1 .45 1 1s-.45 1-1 1H8v1.5c0 .28-.22.5-.5.5s-.5-.22-.5-.5V13H6c-.55 0-1-.45-1-1s.45-1 1-1h1V5.5c0-.28.22-.5.5-.5s.5.22.5.5V11zm5-2h-1c-.55 0-1-.45-1-1s.45-1 1-1h1V5.5c0-.28.22-.5.5-.5s.5.22.5.5V7h1c.55 0 1 .45 1 1s-.45 1-1 1h-1v5.5c0 .28-.22.5-.5.5s-.5-.22-.5-.5V9z"/></g></svg>',
	'summaryControls' => array(wfView::create('scanner/issue-control-ignore', array('ignoreC' => __('Ignore URL', 'twodayssss'), 'ignoreP' => __('Ignore Option', 'twodayssss'))), wfView::create('scanner/issue-control-show-details')),
	'detailPairs' => array(
		__('Option Name', 'twodayssss') => '${data.optionKey}',
		__('Bad URL', 'twodayssss') => '<strong class="wfWarn wf-split-word">${data.badURL}</strong>',
		null,
		__('Details', 'twodayssss') => '{{html longMsg}}',
		null,
		__('Multisite Blog ID', 'twodayssss') => array('data.isMultisite', '${data.blog_id}'),
		__('Multisite Blog Domain', 'twodayssss') => array('data.isMultisite', '${data.domain}'),
		__('Multisite Blog Path', 'twodayssss') => array('data.isMultisite', '${data.path}'),
	),
	'detailControls' => array(
		'<a href="#" class="wf-btn wf-btn-default wf-btn-callout-subtle wf-issue-control-mark-fixed">' . __('Mark as Fixed', 'twodayssss') . '</a>',
	),
	'textOutput' => (isset($textOutput) ? $textOutput : null),
	'textOutputDetailPairs' => array(
		__('Option Name', 'twodayssss') => '$data.optionKey',
		__('Bad URL', 'twodayssss') => '$data.badURL',
		null,
		__('Details', 'twodayssss') => '$longMsg',
		null,
		__('Multisite Blog ID', 'twodayssss') => array('$data.isMultisite', '$data.blog_id'),
		__('Multisite Blog Domain', 'twodayssss') => array('$data.isMultisite', '$data.domain'),
		__('Multisite Blog Path', 'twodayssss') => array('$data.isMultisite', '$data.path'),
	),
))->render();
