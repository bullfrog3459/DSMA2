<link href="<?php echo $vars['moduledir'] ?>css/font-awesome.min.css" type="text/css" rel="stylesheet"/>
<div id="box-header seperator ds_manage_main">
    <p>
        <a class="btn btn-primary" href="<?php echo $modulelink; ?>">Server List</a>
        <a class="btn btn-primary" href="<?php echo $modulelink . '&action=add_server'; ?>">Add Server</a>
		<a class="btn btn-primary" href="<?php echo $modulelink . '&action=rack'; ?>">Racks</a>
		<a class="btn btn-primary" href="<?php echo $modulelink . '&action=switches'; ?>">Switches</a>
		<a class="btn btn-primary" href="<?php echo $modulelink . '&action=locations'; ?>">Locations</a>
		<a class="btn btn-primary" href="<?php echo $modulelink . '&action=allocations'; ?>">Allocations</a>
		<a class="btn btn-primary" href="<?php echo $modulelink . '&action=shipments'; ?>">Shipments</a>
    <p>Below is a list of the currently available servers. Please click on server name to get the server details.</p>
    <table class="table table-bordered table-striped" width=100% cellspacing=0 cellpadding=5>
        <thead>
            <tr>
                <th>Nickname</th>
                <th>Device</th>
                <th>Type</th>
                <th>Owner</th>
				<th>Location</th>
                <th>Rack</th>
                <th align="center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $numservers = mysql_num_rows($res);
            while ($rows = mysql_fetch_array($res)) {
                ?>
                <tr>
                    <td><?php echo $rows[nickname]; ?></td>
                    <td><?php echo "<a href =addonmodules.php?module=dsma&action=view_server&server_id=" . $rows[server_id] . ">" . $rows[server_name] ."</a>"; ?></td>
                    <td><?php echo $rows[device_type]; ?></td>
                    <td><?php echo "<a href=clientssummary.php?userid=" . $rows[client_id] . ">" . $rows[firstname] . " " . $rows[lastname] . "</a>"; ?></td>
                    <td><?php echo $rows[location]; ?></td>
                    <td><?php echo $rows[rack_name_number]; ?></td>
                    <td>
                        <?php
                        echo '<a href = "addonmodules.php?module=dsma&action=edit_server&server_id=' . $rows[server_id] . '" class = "some other classes"><i class = "fa fa-fw fa-pencil"></i></a>
<a href = "addonmodules.php?module=dsma&server_id=' . $rows[server_id] . '&client_id=' . $rows[client_id] . '&action=server_delete" class = "some other classes" data-confirm="Are you sure to delete this item?"><i class = "fa fa-fw fa-trash-o"></i></a>'
                        ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <p>You currently have a total of <b><?php echo $numservers; ?></b> Servers.</p>
</div>
