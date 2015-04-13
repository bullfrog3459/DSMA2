<?php

if (!defined("WHMCS"))
    die("This file cannot be accessed directly");

function dsma_config() {
    $configarray = array(
    "name" => "Dedicated Server Management Addon",
    "description" => "This is an open source addon module for dedicated server management.",
    "version" => "1.0",
    "author" => "Jeremiah Shinkle",
    "language" => "english",
);
    return $configarray;
}

function dsma_activate() {

    # Create Custom DB Table
    $query = "CREATE TABLE `mod_dsma` (
  `server_id` int(1) NOT NULL AUTO_INCREMENT,
  `client_id` int(11) NOT NULL,
  `server_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `main_ip_address` varchar(255) CHARACTER SET utf8 NOT NULL,
  `additional_ip_addresses` varchar(255) CHARACTER SET utf8 NOT NULL,
  `multiple_nics` varchar(255) CHARACTER SET utf8 NOT NULL,
  `drac_ip` varchar(255) CHARACTER SET utf8 NOT NULL,
  `location` varchar(255) CHARACTER SET utf8 NOT NULL,
  `os` varchar(255) CHARACTER SET utf8 NOT NULL,
  `root_username` varchar(255) CHARACTER SET utf8 NOT NULL,
  `root_pass` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ssh_port` varchar(255) CHARACTER SET utf8 NOT NULL,
  `rdc_port` varchar(255) CHARACTER SET utf8 NOT NULL,
  `control_panel` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cpu` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cpu_cache` varchar(255) CHARACTER SET utf8 NOT NULL,
  `cpu_ghz` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ram` varchar(255) CHARACTER SET utf8 NOT NULL,
  `bandwidth` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ram_speed` varchar(255) CHARACTER SET utf8 NOT NULL,
  `drive_controller` varchar(255) CHARACTER SET utf8 NOT NULL,
  `hd0` varchar(255) CHARACTER SET utf8 NOT NULL,
  `hd1` varchar(255) CHARACTER SET utf8 NOT NULL,
  `hd2` varchar(255) CHARACTER SET utf8 NOT NULL,
  `hd3` varchar(255) CHARACTER SET utf8 NOT NULL,
  `drive_raid` varchar(5) CHARACTER SET utf8 NOT NULL,
  `multiple_psus` varchar(255) CHARACTER SET utf8 NOT NULL,
  `chassis_brand` varchar(255) CHARACTER SET utf8 NOT NULL,
  `chassis_model` varchar(255) CHARACTER SET utf8 NOT NULL,
  `service_tag` varchar(255) CHARACTER SET utf8 NOT NULL,
  `asset_tag` varchar(255) CHARACTER SET utf8 NOT NULL,
  `warranty_expiration` varchar(255) CHARACTER SET utf8 NOT NULL,
  `managed` varchar(10) CHARACTER SET utf8 NOT NULL,
  `vps` varchar(5) CHARACTER SET utf8 NOT NULL,
  `vps_node` varchar(255) CHARACTER SET utf8 NOT NULL,
  `switch_id` varchar(255) CHARACTER SET utf8 NOT NULL,
  `switch_port` varchar(255) CHARACTER SET utf8 NOT NULL,
  `switch_speed` varchar(255) CHARACTER SET utf8 NOT NULL,
  `rack_name_number` varchar(255) CHARACTER SET utf8 NOT NULL,
  `rack_position` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ups` varchar(255) CHARACTER SET utf8 NOT NULL,
  `ups_port` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pdu_id` varchar(255) CHARACTER SET utf8 NOT NULL,
  `pdu_port` varchar(255) CHARACTER SET utf8 NOT NULL,
  `contract_terms` text CHARACTER SET utf8 NOT NULL,
  `server_notes` text CHARACTER SET utf8 NOT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`server_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8";
    $result = full_query($query);

    # Return Result
    return array('status'=>'success','description'=>'Dedicated Server Module Installed Successfully.');
    return array('status'=>'error','description'=>'Dedicated Server Module Failed to Install. Please check the logs and try again.');

}

function dsma_deactivate() {

    # Remove Custom DB Table
    $query = "DROP TABLE `mod_dsma`";
    $result = full_query($query);

    # Return Result
    return array('status'=>'success','description'=>'Dedicated Server Module Removed Successfully');
    return array('status'=>'error','description'=>'Dedicated Server Module Failed to remove. Please check the logs and try again.');

}

function dsma_output($vars) {

    $modulelink = $vars['modulelink'];

echo '<div style="padding: 15px 15px 10px 6px;border: 1px solid #DDDDDD;border-radius: 4px 4px 4px 4px;border-left: 0px;border-right: 0px;box-shadow: 0 1px 3px rgba(0,0,0,0.1);-webkit-border-radius-topright: 5px;-webkit-border-radius-topleft: 5px;-moz-border-radius-topright: 5px;-moz-border-radius-topleft: 5px;" id="box-header seperator ds_manage_main">
<p><a class="btn" href=$modulelink&page=add_server target="_blank">Add Server</a><p>Below is a list of the currently available servers. Please click on server name to get the server details.</p><table class="table table-bordered" width=100% cellspacing=0 cellpadding=5>
<tr><td><b>Name</b></td><td><b>Location</b></td><td><b>Primary IP Address</b></td><td><b>Owner</b></td><td><b>OS</b></td><td><b>Product</b></td>
<td><b>CPU</b></td><td><b>RAM</b></td><td><b>Primary Hard Drive</b></td><td><b>Bandwidth</b></td><td><b>Control Panel</b></td><td align="center"><b>Delete</b></td></tr>';


	$res=mysql_query("select * from mod_dsma left join tblclients on (mod_dsma.client_id=tblclients.id) left join tblproducts on (mod_dsma.product_id=tblproducts.id)");
	$numservers=mysql_num_rows($res);
	while($rows=mysql_fetch_array($res))

{
$odd=$odd+1;

if ($odd%2)
{
$bgcolor="#eeeeee";
}
else
{
$bgcolor="#ffffff";
}
echo "<tr bgcolor=$bgcolor><td><a href=$modulelink&page=server_details&server_id=".$rows[server_id].">".$rows[server_name]."</a></td><td>".$rows[location]."</td><td>".$rows[main_ip_address]."</td><td><a href=clientssummary.php?userid=".$rows[client_id].">".$rows[firstname]." ".$rows[lastname]."</a></td>
<td>".$rows[os]."</td><td>".$rows[name]."</td><td>".$rows[cpu]."</td><td>".$rows[ram]."</td><td>".$rows[hd0]."</td><td>".$rows[bandwidth]."</td><td>".$rows[control_panel]."</td><td align=center><a href=$modulelink&server_id=$rows[server_id]&page=server_delete>[x]</a></td>
</tr>";
}

echo "</table>
<p>You currently have a total of <b>$numservers</b> Servers.</p>";
}

function dsma_sidebar($vars) {

    $modulelink = $vars['modulelink'];
	$version = $vars['version'];
    $LANG = $vars['_lang'];

    $sidebar = '<span class="header"><img src="images/icons/addonmodules.png" class="absmiddle" width="16" height="16" /> DSMA</span>
<ul class="menu">
        <li><a href="#">DSMA</a></li>
        <li><a href="#">Version: '.$version.'</a></li>
    </ul>';
    return $sidebar;

}