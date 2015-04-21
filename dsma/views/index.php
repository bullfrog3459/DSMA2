<link href="<?php echo $vars['moduledir'] ?>css/font-awesome.min.css" type="text/css" rel="stylesheet"/>
<div id="box-header seperator ds_manage_main">
    <p>
        <a class="btn btn-primary" href="<?php echo $modulelink; ?>">Server List</a>
        <a class="btn btn-primary" href="<?php echo $modulelink . '&action=add_server'; ?>">Add Server</a>
    <p>Below is a list of the currently available servers. Please click on server name to get the server details.</p>
    <table class="table table-bordered table-striped" width=100% cellspacing=0 cellpadding=5>
        <thead>
            <tr>
                <th>Name</th>
                <th>Location</th>
                <th>Primary IP Address</th>
                <th>Owner</th>
                <th>OS</th>
                <th>Product</th>
                <th>CPU</th>
                <th>RAM</th>
                <th>Primary Hard Drive</th>
                <th>Bandwidth</th>
                <th>Control Panel</th>
                <th align="center">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $numservers = mysql_num_rows($res);
            while ($rows = mysql_fetch_array($res)) {
                ?>
                <tr>
                    <td><?php echo "<a href=$modulelink&action=edit_server&server_id=" . $rows[server_id] . ">" . $rows[server_name] . "</a>"; ?></td>
                    <td><?php echo $rows[location]; ?></td>
                    <td><?php echo $rows[main_ip_address]; ?></td>
                    <td><?php echo "<a href=clientssummary.php?userid=" . $rows[client_id] . ">" . $rows[firstname] . " " . $rows[lastname] . "</a>"; ?></td>
                    <td><?php echo $rows[os]; ?></td>
                    <td><?php echo $rows[name]; ?></td>
                    <td><?php echo $rows[cpu]; ?></td>
                    <td><?php echo $rows[ram]; ?></td>
                    <td><?php echo $rows[hd0]; ?></td>
                    <td><?php echo $rows[bandwidth]; ?></td>
                    <td><?php echo $rows[control_panel]; ?></td>
                    <td>
                        <?php
                        $cnfrm = ' data-confirm-message="Are you sure you want to delete this server"';
                        echo '<a href = "addonmodules.php?module=dsma&action=edit_server&server_id=' . $rows[server_id] . '" class = "some other classes" ><i class = "fa fa-fw fa-pencil"></i></a>
<a href = "addonmodules.php?module=dsma&server_id=' . $rows[server_id] . '&client_id=' . $rows[client_id] . '&action=server_delete" class = "some other classes cnfrm" onclick="" ' . $cnfrm . '><i class = "fa fa-fw fa-trash-o"></i></a>'
                        ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
    <p>You currently have a total of <b><?php echo $numservers; ?></b> Servers.</p>
</div>

<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
<script type="text/javascript" src="<?php echo $vars['moduledir'] ?>js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo $vars['moduledir'] ?>js/confirm-bootstrap.js"></script>
<script type="text/javascript">
    $.noConflict();

    jQuery(document).ready(function () {
        jQuery('.cnfrm').confirmModal();
    });
</script>
