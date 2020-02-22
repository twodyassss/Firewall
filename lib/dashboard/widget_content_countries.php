<?php if (!defined('FIREWALL_VERSION')) { exit; } ?>
<?php //$data is defined here as an array of login attempts: array('IP' => binary ip, 'countryCode' => string, 'blockCount' => int, 'unixday' => int, 'totalIPs' => int, 'totalBlockCount' => int, 'countryName' => string) ?>
<table class="wf-table wf-table-hover">
	<thead>
		<tr>
			<th colspan="2">Country</th>
			<th>Block Count</th>
		</tr>
	</thead>
	<tbody>
	<?php foreach ($data as $l): ?>
		<tr>
			<td><?php echo esc_html($l['countryName']); ?></td>
			<td><span class="wf-flag <?php echo esc_attr('wf-flag-' . strtolower($l['countryCode'])); ?>" title="<?php echo esc_attr($l['countryName']); ?>"></span></td>
			<td><?php echo esc_html(number_format_i18n($l['totalBlockCount'])); ?></td>
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>