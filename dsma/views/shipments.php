<link href="<?php echo $vars['moduledir'] ?>css/font-awesome.min.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo $vars['moduledir'] ?>css/ionicons.min.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo $vars['moduledir'] ?>css/icon.css" type="text/css" rel="stylesheet"/>
<div id="box-header seperator ds_manage_main">
    <p>
        <a class="btn btn-primary" href="<?php echo $modulelink; ?>">Server List</a>
        <a class="btn btn-primary" href="<?php echo $modulelink . '&action=add_shipment'; ?>">Add Shipment</a>
		<a class="btn btn-primary" href="<?php echo $modulelink . '&action=shipments_received'; ?>">Shipments Received</a>
    <p>Below is a list of the shipments.</p>
    <table class="table table-bordered table-striped" width=100% cellspacing=0 cellpadding=5>
        <thead>
            <tr>
                <th>Owner</th>
                <th>Location</th>
                <th>Tracking Number</th>
				<th>Shipper</th>
                <th>Shipment Date</th>
                <th>Shipment Receive</th>
                <th align="center">Action</th>
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
                    <td>
                        <?php echo '<a href = "addonmodules.php?module=dsma&action=edit_shipment&tracking_id=' . $rows[tracking_id] . '" class = "some other classes"><i class = "fa fa-fw fa-pencil"></i></a>
<a href = "addonmodules.php?module=dsma&tracking_id=' . $rows[tracking_id] . '&action=shipment_received" class = "some other classes"><i class = "fa fa-fw fa-check"></i></a>
<a href = "addonmodules.php?module=dsma&tracking_id=' . $rows[tracking_id] . '&action=shipment_delete" class = "some other classes"><i class = "fa fa-fw fa-trash-o"></i></a>'
                        ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <p>You currently have <b><?php echo $numservers; ?></b> Shipments in transit.</p>
</div>
