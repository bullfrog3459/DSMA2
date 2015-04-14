<?php

function index($vars) {
    $modulelink = $vars['modulelink'];
    $res = mysql_query("select * from mod_dsma left join tblclients on (mod_dsma.client_id=tblclients.id) left join tblproducts on (mod_dsma.product_id=tblproducts.id)");
    require_once 'views/index.php';
//
//    echo "</table>
//<p>You currently have a total of <b>$numservers</b> Servers.</p>";
    require_once 'views/index.php';
}

function rack($vars) {
    $modulelink = $vars['modulelink'];
    $res = mysql_query("select * from mod_dsma_rack left join mod_dsma_locations on (mod_dsma_rack.location_id=mod_dsma_locations.location_id) left join tblclients on (mod_dsma_rack.client_id=tblclients.id) order by location_name");
    require_once 'views/rack.php';
//
//    echo "</table>
//<p>You currently have a total of <b>$numservers</b> Servers.</p>";
    require_once 'views/rack.php';
}

function locations($vars) {
    $modulelink = $vars['modulelink'];
    $res = mysql_query("select * from mod_dsma_locations order by 'location_id'");
    require_once 'views/locations.php';
//
//    echo "</table>
//<p>You currently have a total of <b>$numservers</b> Servers.</p>";
    require_once 'views/locations.php';
}

function add_server($vars) {
    $modulelink = $vars['modulelink'];
    if (isset($_POST['save'])) {
        $clientID = $_POST['client_id'];
        $mainip_add = $_POST['main_ip_address'];
        $servername = $_POST['server_name'];
        $addip_add = $_POST['additional_ip_addresses'];
        $multiple_nics = $_POST['multiple_nics'];
        $dracip = $_POST['drac_ip'];
        $location = $_POST['location'];
        $os = $_POST['os'];
        $root_username = $_POST['root_username'];
        $root_pass = $_POST['root_pass'];
        $sshport = $_POST['ssh_port'];
        $rdcport = $_POST['rdc_port'];
        $controlpanel = $_POST['control_panel'];
        $cpu = $_POST['cpu'];
        $cpucache = $_POST['cpu_cache'];
        $cpuspeed = $_POST['cpu_speed'];
        $ram = $_POST['ram'];
        $ramspeed = $_POST['ram_speed'];
        $bandwidht = $_POST['bandwidth'];
        $drivecon = $_POST['drive_controller'];
        $hd0 = $_POST['hd0'];
        $hd1 = $_POST['hd1'];
        $hd2 = $_POST['hd2'];
        $hd3 = $_POST['hd3'];
        $driveraid = $_POST['drive_raid'];
        $chassisbrand = $_POST['chassis_brand'];
        $chassisemodel = $_POST['chassis_model'];
        $servicetag = $_POST['service_tag'];
        $assettag = $_POST['asset_tag'];
        $warranty_exp = $_POST['warranty_expiration'];
        $managed = $_POST['managed'];
        $vps = $_POST['vps'];
        $vpsnode = $_POST['vps_node'];
        $switch = $_POST['switch'];
        $switch_port = $_POST['switch_port'];
        $rack_no = $_POST['rack_name_number'];
        $rack_position = $_POST['rack_position'];
        $ups = $_POST['ups'];
        $ups_port = $_POST['ups_port'];
        $pdu = $_POST['pdu'];
        $pdu_port = $_POST['pdu_port'];
        $notes = $_POST['notes'];
        unset($_POST['token']);
        if (mysql_num_rows($res) == 0) {
            $query = full_query("INSERT INTO mod_dsma (client_id,main_ip_address,server_name,additional_ip_addresses,multiple_nics,drac_ip,location,os,root_username,root_pass,ssh_port,rdc_port,control_panel,cpu,cpu_cache,cpu_ghz,ram,ram_speed,bandwidth,drive_controller,hd0,hd1,hd2,hd3,drive_raid,chassis_brand,chassis_model,service_tag,asset_tag,warranty_expiration,managed,vps,vps_node,switch_id,switch_port,rack_name_number,rack_position,ups,ups_port,pdu_id,pdu_port,server_notes) " . " VALUES ('" . $clientID . "', '" . $mainip_add . "', '" . $servername . "', '" . $addip_add . "', '" . $multiple_nics . "', '" . $dracip . "', '" . $location . "', '" . $os . "', '" . $root_username . "', '" . $root_pass . "', '" . $sshport . "', '" . $rdcport . "', '" . $controlpanel . "', '" . $cpu . "', '" . $cpucache . "', '" . $cpuspeed . "', '" . $ram . "', '" . $ramspeed . "', '" . $bandwidht . "', '" . $drivecon . "', '" . $hd0 . "', '" . $hd1 . "', '" . $hd2 . "', '" . $hd3 . "', '" . $driveraid . "', '" . $chassisbrand . "', '" . $chassisemodel . "', '" . $servicetag . "', '" . $assettag . "', '" . $warranty_exp . "', '" . $managed . "', '" . $vps . "', '" . $vpsnode . "', '" . $switch . "', '" . $switch_port . "', '" . $rack_no . "', '" . $rack_position . "', '" . $ups . "', '" . $ups_port . "', '" . $pdu . "', '" . $pdu_port . "', '" . $notes . "')");
            header('Location: /theboss/addonmodules.php?module=dsma');
        } else {
            $query = "";
        }
    }


    require_once 'views/add_server.php';
}

function edit_server($vars) {
    $id = $_GET['server_id'];
    $query = full_query("SELECT *FROM mod_dsma WHERE server_id='$id' ");
    $results = mysql_fetch_assoc($query);
    $modulelink = $vars['modulelink'];
    require_once 'views/edit_server.php';
}

function update_edit_server() {
//    debug($_POST);
//    die();
    $serverid = $_POST['id'];
    $clientID = $_POST['client_id'];
    $mainip_add = $_POST['main_ip_address'];
    $servername = $_POST['server_name'];
    $addip_add = $_POST['additional_ip_addresses'];
    $multiple_nics = $_POST['multiple_nics'];
    $dracip = $_POST['drac_ip'];
    $location = $_POST['location'];
    $os = $_POST['os'];
    $root_username = $_POST['root_username'];
    $root_pass = $_POST['root_pass'];
    $sshport = $_POST['ssh_port'];
    $rdcport = $_POST['rdc_port'];
    $controlpanel = $_POST['control_panel'];
    $cpu = $_POST['cpu'];
    $cpucache = $_POST['cpu_cache'];
    $cpuspeed = $_POST['cpu_speed'];
    $ram = $_POST['ram'];
    $ramspeed = $_POST['ram_speed'];
    $bandwidht = $_POST['bandwidth'];
    $drivecon = $_POST['drive_controller'];
    $hd0 = $_POST['hd0'];
    $hd1 = $_POST['hd1'];
    $hd2 = $_POST['hd2'];
    $hd3 = $_POST['hd3'];
    $driveraid = $_POST['drive_raid'];
    $chassisbrand = $_POST['chassis_brand'];
    $chassisemodel = $_POST['chassis_model'];
    $multiplepsus = $_POST['multiple_psus'];
    $servicetag = $_POST['service_tag'];
    $assettag = $_POST['asset_tag'];
    $warranty_exp = $_POST['warranty_expiration'];
    $managed = $_POST['managed'];
    $vps = $_POST['vps'];
    $vpsnode = $_POST['vps_node'];
    $switch = $_POST['switch'];
    $switch_port = $_POST['switch_port'];
    $rack_no = $_POST['rack_name_number'];
    $rack_position = $_POST['rack_position'];
    $ups = $_POST['ups'];
    $ups_port = $_POST['ups_port'];
    $pdu = $_POST['pdu'];
    $pdu_port = $_POST['pdu_port'];
    $notes = $_POST['server_notes'];

    $query = full_query("UPDATE mod_dsma SET client_id = '$clientID', server_name = '$servername',main_ip_address='$mainip_add',additional_ip_addresses='$addip_add'
     ,multiple_nics='$multiple_nics',drac_ip='$dracip',location='$location',os='$os',root_username='$root_username',root_pass='$root_pass',ssh_port='$sshport',
     rdc_port='$rdcport',control_panel='$controlpanel',cpu='$cpu',cpu_cache='$cpucache',cpu_ghz='$cpuspeed',ram='$ram',bandwidth='$bandwidht',ram_speed='$ramspeed'
     ,drive_controller='$drivecon',hd0='$hd0',hd1='$hd1',hd2='$hd2',hd3='$hd3',drive_raid='$driveraid',chassis_brand='$chassisbrand',chassis_model='$chassisemodel',
     multiple_psus='$multiplepsus',service_tag='$servicetag',asset_tag='$assettag',warranty_expiration='$warranty_exp',managed='$managed',vps='$vps',vps_node='$vpsnode',switch_id='$switch',
     switch_port='$switch_port',rack_name_number='$rack_no',rack_position='$rack_position',ups='$ups',ups_port='$ups_port',pdu_id='$pdu',pdu_port='$pdu_port',server_notes='$notes' WHERE server_id =$serverid");
    header('Location: /theboss/addonmodules.php?module=dsma');
}

function server_delete() {
    $id = $_GET['server_id'];
    $del = full_query("DELETE  FROM mod_dsma where server_id= $id");
    header('Location: /theboss/addonmodules.php?module=dsma');
}

function add_rack($vars) {
    $modulelink = $vars['modulelink'];
    if (isset($_POST['save'])) {
        $clientID = $_POST['client_id'];
        $locationID = $_POST['location_id'];
        $rackname = $_POST['rack_name'];
        unset($_POST['token']);
        if (mysql_num_rows($res) == 0) {
            $query = full_query("INSERT INTO mod_dsma_rack (client_id,location_id,rack_name) " . " VALUES ('" . $clientID . "', '" . $locationID . "', '" . $rackname . "')");
            header('Location: /theboss/addonmodules.php?module=dsma&action=rack');
        } else {
            $query = "";
        }
    }


    require_once 'views/add_rack.php';
}

function rack_delete() {
    $id = $_GET['rack_id'];
    $del = full_query("DELETE  FROM mod_dsma_rack where rack_id= $id");
    header('Location: /theboss/addonmodules.php?module=dsma&action=rack');
}

function edit_rack($vars) {
    $id = $_GET['rack_id'];
    $query = full_query("SELECT * FROM mod_dsma_rack WHERE rack_id='$id' ");
    $results = mysql_fetch_assoc($query);
    $modulelink = $vars['modulelink'];
    require_once 'views/edit_rack.php';
}

function update_edit_rack() {
//    debug($_POST);
//    die();
		$rackid = $_POST['id'];
        $clientID = $_POST['client_id'];
        $locationID = $_POST['location_id'];
        $rackname = $_POST['rack_name'];


    $query = full_query("UPDATE mod_dsma_rack SET client_id = '$clientID', location_id = '$locationID', rack_name='$rackname' WHERE rack_id =$rackid");
    header('Location: /theboss/addonmodules.php?module=dsma&action=rack');
}

function add_location($vars) {
    $modulelink = $vars['modulelink'];
    if (isset($_POST['save'])) {
        $location = $_POST['location_name'];
        $address = $_POST['location_address'];
        
        unset($_POST['token']);
        if (mysql_num_rows($res) == 0) {
            $query = full_query("INSERT INTO mod_dsma_locations (location_name,location_address) " . " VALUES ('" . $location . "', '" . $address . "')");
            header('Location: /theboss/addonmodules.php?module=dsma&action=locations');
        } else {
            $query = "";
        }
    }


    require_once 'views/add_location.php';
}

function location_delete() {
    $id = $_GET['location_id'];
    $del = full_query("DELETE FROM mod_dsma_locations where location_id= $id");
    header('Location: /theboss/addonmodules.php?module=dsma&action=locations');
}

function edit_location($vars) {
    $id = $_GET['location_id'];
    $query = full_query("SELECT * FROM mod_dsma_locations WHERE location_id='$id' ");
    $results = mysql_fetch_assoc($query);
    $modulelink = $vars['modulelink'];
    require_once 'views/edit_location.php';
}

function update_edit_location() {
//    debug($_POST);
//    die();
		$locationid = $_POST['id'];
        $location = $_POST['location_name'];
        $address = $_POST['location_address'];


    $query = full_query("UPDATE mod_dsma_locations SET location_name = '$location', location_address = '$address' WHERE location_id =$locationid");
    header('Location: /theboss/addonmodules.php?module=dsma&action=locations');
}