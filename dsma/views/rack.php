<link href="<?php echo $vars['moduledir'] ?>css/font-awesome.min.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo $vars['moduledir'] ?>css/ionicons.min.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo $vars['moduledir'] ?>css/icon.css" type="text/css" rel="stylesheet"/>
<div id="box-header seperator ds_manage_main">
    <p>
        <a class="btn btn-primary" href="<?php echo $modulelink; ?>">Server List</a>
        <a class="btn btn-primary" href="<?php echo $modulelink . '&action=add_rack'; ?>">Add Rack</a>
    <p>Below is a list of the racks.</p>
    <table class="table table-bordered table-striped" width=100% cellspacing=0 cellpadding=5>
        <thead>
            <tr>
                <th>Name</th>
                <th>Location</th>
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
                    <td><?php echo "<a href=addonmodules.php?module=dsma&action=view_rack&rack_id=" . $rows[rack_id] . ">" . $rows[rack_name] . "</a>"; ?></td>
                    <td><?php echo $rows[location_name]; ?></td>
                    <td><?php echo "<a href=clientssummary.php?userid=" . $rows[client_id] . ">" . $rows[firstname] . " " . $rows[lastname] . "</a>"; ?></td>
                    <td>
                        <?php echo '<a href = "addonmodules.php?module=dsma&action=edit_rack&rack_id=' . $rows[rack_id] . '" class = "some other classes"><i class = "fa fa-fw fa-pencil"></i></a>
<a href = "addonmodules.php?module=dsma&rack_id=' . $rows[rack_id] . '&action=rack_delete" class = "some other classes"><i class = "fa fa-fw fa-trash-o"></i></a>'
                        ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <p>You currently have <b><?php echo $numservers; ?></b> Racks.</p>
</div>
