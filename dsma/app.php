<?php

function index($vars) {
    $modulelink = $vars['modulelink'];
	?>
    <script type="text/javascript">
        function doDelete(loc) {
            if (confirm("Are you sure you want to delete this record? ")) {
                window.location=loc;
            }}
    </script>
    <?php

    if (isset($_SESSION['errormsg'])) {
        echo '<div class="errorbox"><strong><span class="title">Server</span></strong><br> ' . $_SESSION['errormsg'] . '</div>';
        unset($_SESSION['errormsg']);
    }
    if (isset($_SESSION['successmsg'])) {
        echo '<div class="successbox"><strong><span class="title">Server</span></strong><br>' . $_SESSION['successmsg'] . '</div>';
        unset($_SESSION['successmsg']);
    }
	
    $res = mysql_query("select * from mod_dsma left join tblclients on (mod_dsma.client_id=tblclients.id) left join tblproducts on (mod_dsma.product_id=tblproducts.id)");
    require_once 'views/index.php';
}

function rack($vars) {
    $modulelink = $vars['modulelink'];
    $res = mysql_query("select * from mod_dsma_rack left join mod_dsma_locations on (mod_dsma_rack.location_id=mod_dsma_locations.location_id) left join tblclients on (mod_dsma_rack.client_id=tblclients.id) order by location_name");
    require_once 'views/rack.php';
}

function locations($vars) {
    $modulelink = $vars['modulelink'];
    $res = mysql_query("select * from mod_dsma_locations order by location_id");
	$res2 = mysql_query("select * from mod_dsma_racks where location_id = '$rows[location_id]'");
    require_once 'views/locations.php';
}

function switches($vars) {
    $modulelink = $vars['modulelink'];
    $res = mysql_query("select * from mod_dsma_switches left join mod_dsma_locations on (mod_dsma_switches.location_id=mod_dsma_locations.location_id) left join tblclients on (mod_dsma_switches.client_id=tblclients.id) left join mod_dsma_rack on (mod_dsma_switches.rack_id=mod_dsma_rack.rack_id)order by switch_id");
    require_once 'views/switches.php';
}

function allocations($vars) {
    $modulelink = $vars['modulelink'];
    $res = mysql_query("select * from mod_dsma_allocations left join mod_dsma on (mod_dsma_allocations.server_id=mod_dsma.server_id) order by allocation_id");
    require_once 'views/allocations.php';
}

function shipments($vars) {
    $modulelink = $vars['modulelink'];
    $res = mysql_query("select * from mod_dsma_shipping left join mod_dsma_locations on (mod_dsma_shipping.location_id=mod_dsma_locations.location_id) left join tblclients on (mod_dsma_shipping.client_id=tblclients.id) where `received` = '0' order by tracking_id");
    require_once 'views/shipments.php';
}

function shipments_received($vars) {
    $modulelink = $vars['modulelink'];
    $res = mysql_query("select * from mod_dsma_shipping left join mod_dsma_locations on (mod_dsma_shipping.location_id=mod_dsma_locations.location_id) left join tblclients on (mod_dsma_shipping.client_id=tblclients.id) where `received` = '1' order by tracking_id");
    require_once 'views/shipments_received.php';
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
        $nickname = $_POST['nickname'];
        $client_notes = $_POST['clientsnotes'];
        unset($_POST['token']);
        if (mysql_num_rows($res) == 0) {
            $query = full_query("INSERT INTO mod_dsma (client_id,main_ip_address,server_name,additional_ip_addresses,multiple_nics,drac_ip,location,os,root_username,root_pass,ssh_port,rdc_port,control_panel,cpu,cpu_cache,cpu_ghz,ram,ram_speed,bandwidth,drive_controller,hd0,hd1,hd2,hd3,drive_raid,chassis_brand,chassis_model,service_tag,asset_tag,warranty_expiration,managed,vps,vps_node,switch_id,switch_port,rack_name_number,rack_position,ups,ups_port,pdu_id,pdu_port,server_notes,nickname,clients_notes) " . " VALUES ('" . $clientID . "', '" . $mainip_add . "', '" . $servername . "', '" . $addip_add . "', '" . $multiple_nics . "', '" . $dracip . "', '" . $location . "', '" . $os . "', '" . $root_username . "', '" . $root_pass . "', '" . $sshport . "', '" . $rdcport . "', '" . $controlpanel . "', '" . $cpu . "', '" . $cpucache . "', '" . $cpuspeed . "', '" . $ram . "', '" . $ramspeed . "', '" . $bandwidht . "', '" . $drivecon . "', '" . $hd0 . "', '" . $hd1 . "', '" . $hd2 . "', '" . $hd3 . "', '" . $driveraid . "', '" . $chassisbrand . "', '" . $chassisemodel . "', '" . $servicetag . "', '" . $assettag . "', '" . $warranty_exp . "', '" . $managed . "', '" . $vps . "', '" . $vpsnode . "', '" . $switch . "', '" . $switch_port . "', '" . $rack_no . "', '" . $rack_position . "', '" . $ups . "', '" . $ups_port . "', '" . $pdu . "', '" . $pdu_port . "', '" . $notes . "', '" . $nickname . "', '" . $client_notes . "')");
            $_SESSION['successmsg'] = "Add Successfully";
            header('location:' . $vars['modulelink']);
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

function view_server($vars) {
    $id = $_GET['server_id'];
    $query = full_query("SELECT *FROM mod_dsma WHERE server_id='$id' ");
    $results = mysql_fetch_assoc($query);
    $modulelink = $vars['modulelink'];
    require_once 'views/view_server.php';
}

function update_edit_server($vars) {
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
    $nickname = $_POST['nickname'];
    $client_notes = $_POST['clientsnotes'];

    $query = full_query("UPDATE mod_dsma SET client_id = '$clientID', server_name = '$servername',main_ip_address='$mainip_add',additional_ip_addresses='$addip_add'
     ,multiple_nics='$multiple_nics',drac_ip='$dracip',location='$location',os='$os',root_username='$root_username',root_pass='$root_pass',ssh_port='$sshport',
     rdc_port='$rdcport',control_panel='$controlpanel',cpu='$cpu',cpu_cache='$cpucache',cpu_ghz='$cpuspeed',ram='$ram',bandwidth='$bandwidht',ram_speed='$ramspeed'
     ,drive_controller='$drivecon',hd0='$hd0',hd1='$hd1',hd2='$hd2',hd3='$hd3',drive_raid='$driveraid',chassis_brand='$chassisbrand',chassis_model='$chassisemodel',
     multiple_psus='$multiplepsus',service_tag='$servicetag',asset_tag='$assettag',warranty_expiration='$warranty_exp',managed='$managed',vps='$vps',vps_node='$vpsnode',switch_id='$switch',
     switch_port='$switch_port',rack_name_number='$rack_no',rack_position='$rack_position',ups='$ups',ups_port='$ups_port',pdu_id='$pdu',pdu_port='$pdu_port',server_notes='$notes',nickname='$nickname',clients_notes='$client_notes' WHERE server_id =$serverid");
    $_SESSION['successmsg'] = "Edit Successfully";
    header('location:' . $vars['modulelink']);
}

function server_delete($vars) {
    $id = $_GET['server_id'];
	$client_id = $_GET['client_id'];
	$tablename = 'mod_dsma';
    
	if ($client_id == 0) {
        $sql = full_query("DELETE FROM mod_dsma WHERE server_id='" . ($id) . "'" .
                " AND client_id='" . ($client_id) . "'");
        $_SESSION['successmsg'] = "Server was removed successfully.";
        header('location:' . $vars['modulelink']);
    } else {
        $_SESSION['errormsg'] = "Server was NOT removed. It is still assigned to an owner!";
        header('location:' . $vars['modulelink']);
    }
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

function add_switch($vars) {
    $modulelink = $vars['modulelink'];
    if (isset($_POST['save'])) {
		$clientID = $_POST['client_id'];
		$locationID = $_POST['location_id'];
		$rackID = $_POST['rack_id'];
        $switchname = $_POST['switch_name'];
        $switchports = $_POST['switch_ports'];
        
        unset($_POST['token']);
        if (mysql_num_rows($res) == 0) {
            $query = full_query("INSERT INTO mod_dsma_switches (client_id,location_id,rack_id,switch_name,switch_ports) " . " VALUES ('" . $clientID . "', '" . $locationID . "', '" . $rackID . "', '" . $switchname . "', '" . $switchports . "')");
            header('Location: /theboss/addonmodules.php?module=dsma&action=switches');
        } else {
            $query = "";
        }
    }

    require_once 'views/add_switch.php';
}

function switch_delete() {
    $id = $_GET['switch_id'];
    $del = full_query("DELETE FROM mod_dsma_switches where switch_id= $id");
    header('Location: /theboss/addonmodules.php?module=dsma&action=switches');
}

function edit_switch($vars) {
    $id = $_GET['switch_id'];
    $query = full_query("SELECT * FROM mod_dsma_switches WHERE switch_id='$id' ");
    $results = mysql_fetch_assoc($query);
    $modulelink = $vars['modulelink'];
    require_once 'views/edit_switch.php';
}

function update_edit_switch() {
//    debug($_POST);
//    die();
		$clientID = $_POST['client_id'];
		$locationID = $_POST['location_id'];
		$rackID = $_POST['rack_id'];
        $switchname = $_POST['switch_name'];
        $switchports = $_POST['switch_ports'];


    $query = full_query("UPDATE mod_dsma_switches SET client_id = '$clientID', location_id = '$locationID', rack_ID = '$rackID', switch_name = '$switchname', switch_ports = '$switchports' WHERE location_id =$id");
    header('Location: /theboss/addonmodules.php?module=dsma&action=switches');
}

function add_allocation($vars) {
    $modulelink = $vars['modulelink'];
    if (isset($_POST['save'])) {
		$serverID = $_POST['server_id'];
		$ip = $_POST['ip'];
        $subnet = $_POST['subnet'];
        
        unset($_POST['token']);
        if (mysql_num_rows($res) == 0) {
            $query = full_query("INSERT INTO mod_dsma_allocations (server_id, ip, subnet) " . " VALUES ('" . $serverID . "', '" . $ip . "', '" . $subnet . "')");
            header('Location: /theboss/addonmodules.php?module=dsma&action=allocations');
        } else {
            $query = "";
        }
    }

    require_once 'views/add_allocation.php';
}

function allocation_delete() {
    $id = $_GET['allocation_id'];
    $del = full_query("DELETE FROM mod_dsma_allocations where allocation_id= $id");
    header('Location: /theboss/addonmodules.php?module=dsma&action=allocations');
}

function edit_allocation($vars) {
    $id = $_GET['allocation_id'];
    $query = full_query("SELECT * FROM mod_dsma_allocations WHERE allocation_id='$id' ");
    $results = mysql_fetch_assoc($query);
    $modulelink = $vars['modulelink'];
    require_once 'views/edit_allocation.php';
}

function update_edit_allocation() {
    //debug($_POST);
    //die();
		$allocationid = $_POST['id'];
		$ip = $_POST['ip'];
        $subnet = $_POST['subnet'];
		$serverID = $_POST['server_id'];

    $query = full_query("UPDATE mod_dsma_allocations SET server_id = '$serverID', ip = '$ip', subnet = '$subnet' WHERE allocation_id =$allocationid");
    header('Location: /theboss/addonmodules.php?module=dsma&action=allocations');
}

function shipment_delete() {
    $id = $_GET['tracking_id'];
    $del = full_query("DELETE FROM mod_dsma_shipping where tracking_id= $id");
    header('Location: /theboss/addonmodules.php?module=dsma&action=shipments');
}

function edit_shipment($vars) {
    $id = $_GET['tracking_id'];
    $query = full_query("SELECT * FROM mod_dsma_shipping WHERE tracking_id='$id'");
    $results = mysql_fetch_assoc($query);
    $modulelink = $vars['modulelink'];
    require_once 'views/edit_shipment.php';
}

function update_edit_shipment() {
    //debug($_POST);
    //die();
		$trackingID = $_POST['id'];
		$clientID = $_POST['client_id'];
        $locationID = $_POST['location_id'];
		$tracking = $_POST['tracking_number'];
		$shipper = $_POST['shipper'];
		$shipdate = $_POST['ship_date'];
		$shiprec = $_POST['ship_receive'];
		$rec = $_POST['received'];
		

    $query = full_query("UPDATE mod_dsma_shipping SET client_id = '$clientID', location_id = '$locationID', tracking_number = '$tracking', shipper = '$shipper', ship_date = '$shipdate', ship_receive = '$shiprec', received = '$rec' WHERE tracking_id =$trackingID");
    header('Location: /theboss/addonmodules.php?module=dsma&action=shipments');
}

function shipment_received() {
    //debug($_POST);
    //die();
		$id = $_GET['tracking_id'];
		

    $received = full_query("UPDATE mod_dsma_shipping SET received = '1' WHERE tracking_id =$id");
    header('Location: /theboss/addonmodules.php?module=dsma&action=shipments');
}

function add_shipment($vars) {
    $modulelink = $vars['modulelink'];
    if (isset($_POST['save'])) {
		$clientID = $_POST['client_id'];
        $locationID = $_POST['location_id'];
		$tracking = $_POST['tracking_number'];
		$ship = $_POST['shipper'];
		$shipdate = $_POST['ship_date'];
		$shiprec = $_POST['ship_receive'];
		$rec = $_POST['received'];
        
        unset($_POST['token']);
        if (mysql_num_rows($res) == 0) {
            $query = full_query("INSERT INTO mod_dsma_shipping (client_id, location_id, tracking_number, shipper, ship_date, ship_receive, received) " . " VALUES ('" . $clientID . "', '" . $locationID . "', '" . $tracking . "', '" . $ship . "', '" . $shipdate . "', '" . $shiprec . "', '" . $rec . "')");
            header('Location: /theboss/addonmodules.php?module=dsma&action=shipments');
        } else {
            $query = "";
        }
    }


    require_once 'views/add_shipment.php';
}