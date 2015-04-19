<?php
if (!defined("WHMCS"))
    die("This file cannot be accessed directly");

function dsma_config() {
    $configarray = array(
        "name" => "Dedicated Server Management Addon",
        "description" => "This is an open source addon module for dedicated server management.",
        "version" => "1.1",
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
  `server_name` varchar(255) CHARACTER SET utf8 NULL,
  `main_ip_address` varchar(255) CHARACTER SET utf8 NULL,
  `additional_ip_addresses` varchar(255) CHARACTER SET utf8 NULL,
  `multiple_nics` varchar(255) CHARACTER SET utf8 NULL,
  `drac_ip` varchar(255) CHARACTER SET utf8 NULL,
  `location` varchar(255) CHARACTER SET utf8 NULL,
  `os` varchar(255) CHARACTER SET utf8 NULL,
  `root_username` varchar(255) CHARACTER SET utf8 NULL,
  `root_pass` varchar(255) CHARACTER SET utf8 NULL,
  `ssh_port` varchar(255) CHARACTER SET utf8 NULL,
  `rdc_port` varchar(255) CHARACTER SET utf8 NULL,
  `control_panel` varchar(255) CHARACTER SET utf8 NULL,
  `cpu` varchar(255) CHARACTER SET utf8 NULL,
  `cpu_cache` varchar(255) CHARACTER SET utf8 NULL,
  `cpu_ghz` varchar(255) CHARACTER SET utf8 NULL,
  `ram` varchar(255) CHARACTER SET utf8 NULL,
  `bandwidth` varchar(255) CHARACTER SET utf8 NULL,
  `ram_speed` varchar(255) CHARACTER SET utf8 NULL,
  `drive_controller` varchar(255) CHARACTER SET utf8 NULL,
  `hd0` varchar(255) CHARACTER SET utf8 NULL,
  `hd1` varchar(255) CHARACTER SET utf8 NULL,
  `hd2` varchar(255) CHARACTER SET utf8 NULL,
  `hd3` varchar(255) CHARACTER SET utf8 NULL,
  `drive_raid` varchar(5) CHARACTER SET utf8 NULL,
  `multiple_psus` varchar(255) CHARACTER SET utf8 NULL,
  `chassis_brand` varchar(255) CHARACTER SET utf8 NULL,
  `chassis_model` varchar(255) CHARACTER SET utf8 NULL,
  `service_tag` varchar(255) CHARACTER SET utf8 NULL,
  `asset_tag` varchar(255) CHARACTER SET utf8 NULL,
  `warranty_expiration` varchar(255) CHARACTER SET utf8 NULL,
  `managed` varchar(10) CHARACTER SET utf8 NULL,
  `vps` varchar(5) CHARACTER SET utf8 NULL,
  `vps_node` varchar(255) CHARACTER SET utf8 NULL,
  `switch_id` varchar(255) CHARACTER SET utf8 NULL,
  `switch_port` varchar(255) CHARACTER SET utf8 NULL,
  `switch_speed` varchar(255) CHARACTER SET utf8 NULL,
  `rack_name_number` varchar(255) CHARACTER SET utf8 NULL,
  `rack_position` varchar(255) CHARACTER SET utf8 NULL,
  `ups` varchar(255) CHARACTER SET utf8 NULL,
  `ups_port` varchar(255) CHARACTER SET utf8 NULL,
  `pdu_id` varchar(255) CHARACTER SET utf8 NULL,
  `pdu_port` varchar(255) CHARACTER SET utf8 NULL,
  `contract_terms` text CHARACTER SET utf8 NULL,
  `server_notes` text CHARACTER SET utf8 NULL,
  `product_id` int(11) NOT NULL,
  `nickname` varchar(255) CHARACTER SET utf8 NULL,
  `clients_notes` text CHARACTER SET utf8 NULL
  PRIMARY KEY (`server_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8";
    $result = full_query($query);

    # Return Result
    return array('status' => 'success', 'description' => 'Dedicated Server Module Installed Successfully.');
    return array('status' => 'error', 'description' => 'Dedicated Server Module Failed to Install. Please check the logs and try again.');
}

function dsma_deactivate() {

    # Remove Custom DB Table
    $query = "DROP TABLE `mod_dsma`";
    $result = full_query($query);

    # Return Result
    return array('status' => 'success', 'description' => 'Dedicated Server Module Removed Successfully');
    return array('status' => 'error', 'description' => 'Dedicated Server Module Failed to remove. Please check the logs and try again.');
}

function dsma_output($vars) {

    $moduledir = $vars['modulelink'];
    $vars['moduledir'] = '../modules/addons/dsma/';
    $action = get_action();
    require_once 'app.php';
    dsma_header($vars);
    $action($vars);
    echo '</div></div>';
}

function dsma_header($vars) {
    ?>
    <link href="<?php echo $vars['moduledir'] ?>css/bootstrap.css" type="text/css" rel="stylesheet"/>
    <link href="<?php echo $vars['moduledir'] ?>/style.css" type="text/css" rel="stylesheet"/>
    <div class="dmca-panel panel panel-default">
        <div class="panel-body">

            <?php
}

function get_action() {
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        } else {
            $action = 'index';
        }
            return $action;
}

function dsma_clientarea($vars) {
    $vars['moduledir'] = 'modules/addons/dsma/';
    $servers = '';
    $message = false;
    $templatefile = "dsma_index";
	
    if ($_GET['action'] == "edit") {
        if (isset($_POST['id'])) {
        $_SESSION['successmessage'] = "Server updated successfuly";
        update_query('mod_dsma', array('nickname' => $_POST['nickname'], 'clients_notes' => $_POST['clients_notes']), array('server_id' => $_POST['id']));
        header('location:' . $vars['modulelink']);
        } else if (isset($_GET['server_id'])) {
            $servers = get_query_vals('mod_dsma', '*', array('server_id' => $_GET['server_id']));
				$templatefile = "dsma_edit";
        } 
    } else {
        if (isset($_SESSION['uid'])) {
            $getuserservers = full_query("SELECT * FROM mod_dsma where client_id='" . $_SESSION['uid'] . "'");
            while ($row = mysql_fetch_assoc($getuserservers)) {
                $servers[] = $row;
            }
        }
    }
	
      if (isset($_SESSION['successmessage'])) {
        $message = $_SESSION['successmessage'];
            unset($_SESSION['successmessage']);
    }
        return array(
            'pagetitle' => 'DSMA',
            'breadcrumb' => array('index.php?m=dsma' => 'DSMA'),
            'templatefile' => $templatefile,
            'requirelogin' => true, # or false
            'vars' => array(
                'content' => '',
                'vars' => $vars,
                'errormessage' => $message,
                'servers' => $servers
                ),
        );
}

//function dsma_sidebar($vars) {
//
//    $modulelink = $vars['modulelink'];
//    $version = $vars['version'];
//    $LANG = $vars['_lang'];
//
//    $sidebar = '<span class="header"><img src="images/icons/addonmodules.png" class="absmiddle" width="16" height="16" /> DSMA</span>
//<ul class="menu">
//        <li><a href="#">DSMA</a></li>
//        <li><a href="#">Version: ' . $version . '</a></li>
//    </ul>';
//    return $sidebar;
//}
        ?>
