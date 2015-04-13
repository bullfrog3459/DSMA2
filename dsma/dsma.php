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
