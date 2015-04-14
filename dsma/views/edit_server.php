<?php // debug($results);
//die()
//?>
<p><a class="btn btn-primary" href="<?php echo $modulelink; ?>">Server List</a>
<p>Please use the following form to add a new server.</p>
<form class="form-horizontal"  action="<?php echo $modulelink . '&action=update_edit_server'; ?>" method="post">
    <input type="hidden" name="id" value="<?php echo $results['server_id'] ?>" class="form-control" id="client_id" placeholder="">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">Owner:</label>
                <div class="col-sm-8">
                    <select name="client_id" class="form-control">
                        <option value="0">None</option>
                        <?php
                        $res = mysql_query("select * from tblclients order by BINARY firstname");

                        while ($row = mysql_fetch_array($res)) {
                            if ($results['client_id'] == $row[id]) {
                                $selected = "selected='selected'";
                            } else {
                                $selected = '';
                            }
                            echo "<option value='" . $row[id] . "'$selected>" . $row[firstname] . " " . $row[lastname] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="main_ip_address" class="col-sm-4 control-label">Main IP Address:</label>
                <div class="col-sm-8">
                    <input type=text name="main_ip_address"  value="<?php echo $results['main_ip_address']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="server_name" class="col-sm-4 control-label">Server Name:</label>
                <div class="col-sm-8">
                    <input type=text name="server_name" value="<?php echo $results['server_name']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="additional_ip_addresses" class="col-sm-4 control-label">Additional IP Addresses:</label>
                <div class="col-sm-8">
                    <input type=text name="additional_ip_addresses" value="<?php echo $results['additional_ip_addresses']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="multiple_nics" class="col-sm-4 control-label">Multiple NICS:</label>
                <div class="col-sm-8">
                    <input type=text name="multiple_nics" value="<?php echo $results['multiple_nics']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="drac_ip" class="col-sm-4 control-label">DRAC/IPMI IP:</label>
                <div class="col-sm-8">
                    <input type=text name="drac_ip" value="<?php echo $results['drac_ip']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="location" class="col-sm-4 control-label">Location:</label>
                <div class="col-sm-8">
                    <input type=text name="location" value="<?php echo $results['location']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="os" class="col-sm-4 control-label">Operating System:</label>
                <div class="col-sm-8">
                    <input type=text name="os" value="<?php echo $results['os']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="username" class="col-sm-4 control-label">Username:</label>
                <div class="col-sm-8">
                    <input type=text name="root_username"  value="<?php echo $results['root_username']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="root_pass" class="col-sm-4 control-label">Password:</label>
                <div class="col-sm-8">
                    <input type=text name="root_pass" value="<?php echo $results['root_pass']; ?>"  class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="ssh_port" class="col-sm-4 control-label">SSH Port:</label>
                <div class="col-sm-8">
                    <input type=text name="ssh_port" value="<?php echo $results['ssh_port']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="rdc_port" class="col-sm-4 control-label">RDC Port:</label>
                <div class="col-sm-8">
                    <input type=text name="rdc_port" value="<?php echo $results['rdc_port']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="control_panel" class="col-sm-4 control-label">Control Panel:</label>
                <div class="col-sm-8">
                    <input type=text name="control_panel" value="<?php echo $results['control_panel']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="cpu" class="col-sm-4 control-label">CPU:</label>
                <div class="col-sm-8">
                    <input type=text name="cpu" value="<?php echo $results['cpu']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="cpu_cache" class="col-sm-4 control-label">CPU Cache:</label>
                <div class="col-sm-8">
                    <input type=text name="cpu_cache" value="<?php echo $results['cpu_cache']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="cpu_speed" class="col-sm-4 control-label">CPU Speed:</label>
                <div class="col-sm-8">
                    <input type=text name="cpu_speed" value="<?php echo $results['cpu_ghz']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="ram" class="col-sm-4 control-label">RAM:</label>
                <div class="col-sm-8">
                    <input type=text name="ram" value="<?php echo $results['ram']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="ram_speed" class="col-sm-4 control-label">RAM Speed:</label>
                <div class="col-sm-8">
                    <input type=text name="ram_speed" value="<?php echo $results['ram_speed']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="bandwidth" class="col-sm-4 control-label">Bandwidth:</label>
                <div class="col-sm-8">
                    <input type=text name="bandwidth" value="<?php echo $results['bandwidth']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="drive_controller" class="col-sm-4 control-label">RAID Controller:</label>
                <div class="col-sm-8">
                    <input type=text name="drive_controller" value="<?php echo $results['drive_controller']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="hd0" class="col-sm-4 control-label">Primary Drive:</label>
                <div class="col-sm-8">
                    <input type=text name="hd0" value="<?php echo $results['hd0']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="hd1" class="col-sm-4 control-label">Secondary Drive:</label>
                <div class="col-sm-8">
                    <input type=text name="hd1" value="<?php echo $results['hd1']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="hd2" class="col-sm-4 control-label">Tertiary Drive:</label>
                <div class="col-sm-8">
                    <input type=text name="hd2" value="<?php echo $results['hd2']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="hd3" class="col-sm-4 control-label">Fourth Drive:</label>
                <div class="col-sm-8">
                    <input type=text name="hd3" value="<?php echo $results['hd3']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="drive_raid" class="col-sm-4 control-label">Drive RAID:</label>
                <div class="col-sm-8">
                    <input type=text name="drive_raid" value="<?php echo $results['drive_raid']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="multiple_psus" class="col-sm-4 control-label">Multiple PSU's:</label>
                <div class="col-sm-8">
                    <input type=text name="multiple_psus" value="<?php echo $results['multiple_psus']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="chassis_brand" class="col-sm-4 control-label">Chassis Brand:</label>
                <div class="col-sm-8">
                    <input type=text name="chassis_brand" value="<?php echo $results['chassis_brand']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="chassis_model" class="col-sm-4 control-label">Chassis Model:</label>
                <div class="col-sm-8">
                    <input type=text name="chassis_model" value="<?php echo $results['chassis_model']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="service_tag" class="col-sm-4 control-label">Service Tag:</label>
                <div class="col-sm-8">
                    <input type=text name="service_tag" value="<?php echo $results['service_tag']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="asset_tag" class="col-sm-4 control-label">Asset Tag:</label>
                <div class="col-sm-8">
                    <input type=text name="asset_tag" value="<?php echo $results['asset_tag']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="warranty_expiration" class="col-sm-4 control-label">Warranty Expiration:</label>
                <div class="col-sm-8">
                    <input type=text name="warranty_expiration" value="<?php echo $results['warranty_expiration']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="managed" class="col-sm-4 control-label">Managed or Unmanaged:</label>
                <div class="col-sm-8">
                    <input type=text name="managed" value="<?php echo $results['managed']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="vps" class="col-sm-4 control-label">VPS:</label>
                <div class="col-sm-8">
                    <input type=text name="vps" value="<?php echo $results['vps']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="vps_node" class="col-sm-4 control-label">VPS Node:</label>
                <div class="col-sm-8">
                    <input type=text name="vps_node" value="<?php echo $results['vps_node']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="switch" class="col-sm-4 control-label">Switch:</label>
                <div class="col-sm-8">
                    <input type=text name="switch" value="<?php echo $results['switch_id']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="switch_port" class="col-sm-4 control-label">Switch Port:</label>
                <div class="col-sm-8">
                    <input type=text name="switch_port" value="<?php echo $results['switch_port']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="rack_name_number" class="col-sm-4 control-label">Rack Name/Number:</label>
                <div class="col-sm-8">
                    <input type=text name="rack_name_number" value="<?php echo $results['rack_name_number']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="rack_position" class="col-sm-4 control-label">Rack Position:</label>
                <div class="col-sm-8">
                    <input type=text name="rack_position" value="<?php echo $results['rack_position']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">

            <div class="form-group">
                <label for="ups" class="col-sm-4 control-label">UPS:</label>
                <div class="col-sm-8">
                    <input type=text name="ups" value="<?php echo $results['ups']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="ups_port" class="col-sm-4 control-label">UPS Port:</label>
                <div class="col-sm-8">
                    <input type=text name="ups_port" value="<?php echo $results['ups_port']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="pdu" class="col-sm-4 control-label">PDU:</label>
                <div class="col-sm-8">
                    <input type=text name="pdu" value="<?php echo $results['pdu_id']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="pdu_port" class="col-sm-4 control-label">PDU Port:</label>
                <div class="col-sm-8">
                    <input type=text name="pdu_port" value="<?php echo $results['pdu_port']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="notes" class="col-sm-4 control-label">Notes:</label>
                <div class="col-sm-8">
                    <textarea name="server_notes" rows="7" cols="35"><?php echo $results['server_notes'] ?></textarea>
                </div>
            </div>
        </div>
    </div>
    <input type="submit" value="Edit Server" class="btn btn-primary"/>
</form>