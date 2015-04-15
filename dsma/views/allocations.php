<link href="<?php echo $vars['moduledir'] ?>css/font-awesome.min.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo $vars['moduledir'] ?>css/ionicons.min.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo $vars['moduledir'] ?>css/icon.css" type="text/css" rel="stylesheet"/>
<div id="box-header seperator ds_manage_main">
    <p>
        <a class="btn btn-primary" href="<?php echo $modulelink; ?>">Server List</a>
        <a class="btn btn-primary" href="<?php echo $modulelink . '&action=add_allocation'; ?>">Add Allocation</a>
    <p>Below is a list of the allocations.</p>
    <table class="table table-bordered table-striped" width=100% cellspacing=0 cellpadding=5>
        <thead>
            <tr>
                <th>Version</th>
                <th>Subnet</th>
                <th>Assigned Device</th>
                <th align="center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
			
            $numservers = mysql_num_rows($res);
            while ($rows = mysql_fetch_array($res)) {
                ?>
                <tr>
                    <td><?php echo $rows[ip]; ?></td>
                    <td><?php echo $rows[subnet]; ?></td>
                    <td><?php echo $rows[server_name]; ?></td>
                    <td>
                        <?php echo '<a href = "addonmodules.php?module=dsma&action=edit_allocation&allocation_id=' . $rows[allocation_id] . '" class = "some other classes"><i class = "fa fa-fw fa-pencil"></i></a>
<a href = "addonmodules.php?module=dsma&allocation_id=' . $rows[allocation_id] . '&action=allocation_delete" class = "some other classes"><i class = "fa fa-fw fa-trash-o"></i></a>'
                        ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <p>You currently have <b><?php echo $numservers; ?></b> Allocations.</p>
</div>
