<link href="<?php echo $vars['moduledir'] ?>css/font-awesome.min.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo $vars['moduledir'] ?>css/ionicons.min.css" type="text/css" rel="stylesheet"/>
<link href="<?php echo $vars['moduledir'] ?>css/icon.css" type="text/css" rel="stylesheet"/>
<div id="box-header seperator ds_manage_main">
    <p>
        <a class="btn btn-primary" href="<?php echo $modulelink; ?>">Server List</a>
        <a class="btn btn-primary" href="<?php echo $modulelink . '&action=add_location'; ?>">Add Location</a>
    <p>Below is a list of the locations.</p>
    <table class="table table-bordered table-striped" width=100% cellspacing=0 cellpadding=5>
        <thead>
            <tr>
                <th>Name</th>
                <th>Address</th>
                <th>Total Racks</th>
                <th align="center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
			
            $numservers = mysql_num_rows($res);
			$numrack = mysql_num_rows($res2);
            while ($rows = mysql_fetch_array($res)) {
                ?>
                <tr>
                    <td><?php echo $rows[location_name]; ?></td>
                    <td><?php echo $rows[location_address]; ?></td>
                    <td><?php 
					
					echo $numrack;
					
					?></td>
                    <td>
                        <?php echo '<a href = "addonmodules.php?module=dsma&action=edit_location&location_id=' . $rows[location_id] . '" class = "some other classes"><i class = "fa fa-fw fa-pencil"></i></a>
<a href = "addonmodules.php?module=dsma&location_id=' . $rows[location_id] . '&action=location_delete" class = "some other classes"><i class = "fa fa-fw fa-trash-o"></i></a>'
                        ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <p>You currently have <b><?php echo $numservers; ?></b> Racks.</p>
</div>
