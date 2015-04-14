<link href="<?php echo $vars['moduledir'] ?>css/font-awesome.min.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo $vars['moduledir'] ?>css/ionicons.min.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo $vars['moduledir'] ?>css/icon.css" type="text/css" rel="stylesheet"/>
<div id="box-header seperator ds_manage_main">
    <p>
        <a class="btn btn-primary" href="<?php echo $modulelink; ?>">Server List</a>
        <a class="btn btn-primary" href="<?php echo $modulelink . '&action=add_switch'; ?>">Add Switch</a>
    <p>Below is a list of the locations.</p>
    <table class="table table-bordered table-striped" width=100% cellspacing=0 cellpadding=5>
        <thead>
            <tr>
                <th>Name</th>
                <th>Location</th>
                <th>Rack</th>
				<th>Ports</th>
				<th>Owner</th>
                <th align="center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
			
            $numservers = mysql_num_rows($res);
            while ($rows = mysql_fetch_array($res)) {
                ?>
                <tr>
                    <td><?php echo $rows[switch_name]; ?></td>
                    <td><?php echo $rows[location_name]; ?></td>
                    <td><?php echo $rows[rack_name]; ?></td>
					<td><?php echo $rows[switch_ports]; ?></td>
					<td><?php echo "<a href=clientssummary.php?userid=" . $rows[client_id] . ">" . $rows[firstname] . " " . $rows[lastname] . "</a>"; ?></td>
                    <td>
                        <?php echo '<a href = "addonmodules.php?module=dsma&action=edit_switch&switch_id=' . $rows[switch_id] . '" class = "some other classes"><i class = "fa fa-fw fa-pencil"></i></a>
<a href = "addonmodules.php?module=dsma&switch_id=' . $rows[switch_id] . '&action=switch_delete" class = "some other classes"><i class = "fa fa-fw fa-trash-o"></i></a>'
                        ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <p>You currently have <b><?php echo $numservers; ?></b> Switches.</p>

</div>