<link href="<?php echo $vars['moduledir'] ?>css/font-awesome.min.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo $vars['moduledir'] ?>css/ionicons.min.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo $vars['moduledir'] ?>css/icon.css" type="text/css" rel="stylesheet"/>
<div id="box-header seperator ds_manage_main">
    <p>
		<a class="btn btn-primary" href="<?php echo $modulelink . '&action=shipments'; ?>">Shipments</a>
    <p>Below is a list of the shipments that have arrived.</p>
    <table class="table table-bordered table-striped" width=100% cellspacing=0 cellpadding=5>
        <thead>
            <tr>
                <th>Owner</th>
                <th>Location</th>
                <th>Tracking Number</th>
				<th>Shipper</th>
                <th>Shipment Date</th>
                <th>Shipment Receive</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $numservers = mysql_num_rows($res);
            while ($rows = mysql_fetch_array($res)) {
                ?>
                <tr>
                    <td><?php echo "<a href=clientssummary.php?userid=" . $rows[client_id] . ">" . $rows[firstname] . " " . $rows[lastname] . "</a>"; ?></td>
                    <td><?php echo $rows[location_name]; ?></td>
                    <td><?php echo "<a target='_blank' href=https://www.google.com/search?q=" . $rows[tracking_number] . ">" . $rows[tracking_number] . "</a>"; ?></td>
					<td><?php echo $rows[shipper]; ?></td>
					<td><?php echo $rows[ship_date]; ?></td>
					<td><?php echo $rows[ship_receive]; ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <p>You currently have <b><?php echo $numservers; ?></b> Shipments received</p>
</div>
