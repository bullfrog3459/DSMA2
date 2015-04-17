<p><a class="btn btn-primary" href="<?php echo $modulelink; ?>">Server List</a>
<p>Please use the following form to add a new server.</p>
<form class="form-horizontal"  action="<?php echo $modulelink . '&action=update_edit_server'; ?>" method="post">
    <input type="hidden" name="id" value="<?php echo $results['server_id'] ?>" class="form-control" id="client_id" placeholder="">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">Owner:</label>
                <div class="col-sm-8">
                    <select name="client_id" class="form-control" tabindex=1>
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
                    <input type=text name="main_ip_address" tabindex=3  value="<?php echo $results['main_ip_address']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="server_name" class="col-sm-4 control-label">Server Name:</label>
                <div class="col-sm-8">
                    <input type=text name="server_name" tabindex=2 value="<?php echo $results['server_name']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="additional_ip_addresses" class="col-sm-4 control-label">Additional IP Addresses:</label>
                <div class="col-sm-8">
                    <input type=text name="additional_ip_addresses" tabindex=4 value="<?php echo $results['additional_ip_addresses']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="multiple_nics" class="col-sm-4 control-label">Multiple NICS:</label>
                <div class="col-sm-8">
                    <input type=text name="multiple_nics" tabindex=5 value="<?php echo $results['multiple_nics']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="drac_ip" class="col-sm-4 control-label">DRAC/IPMI IP:</label>
                <div class="col-sm-8">
                    <input type=text name="drac_ip" tabindex=7 value="<?php echo $results['drac_ip']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="location" class="col-sm-4 control-label">Location:</label>
                <div class="col-sm-8">
                    <input type=text name="location" tabindex=6 value="<?php echo $results['location']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="os" class="col-sm-4 control-label">Operating System:</label>
                <div class="col-sm-8">
                    <input type=text name="os" tabindex=8 value="<?php echo $results['os']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="username" class="col-sm-4 control-label">Username:</label>
                <div class="col-sm-8">
                    <input type=text name="root_username"  tabindex=9 value="<?php echo $results['root_username']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="root_pass" class="col-sm-4 control-label">Password:</label>
                <div class="col-sm-8">
                    <input type=text name="root_pass" tabindex=11 value="<?php echo $results['root_pass']; ?>"  class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="ssh_port" class="col-sm-4 control-label">SSH Port:</label>
                <div class="col-sm-8">
                    <input type=text name="ssh_port" tabindex=10 value="<?php echo $results['ssh_port']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="rdc_port" class="col-sm-4 control-label">RDC Port:</label>
                <div class="col-sm-8">
                    <input type=text name="rdc_port" tabindex=12 value="<?php echo $results['rdc_port']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="control_panel" class="col-sm-4 control-label">Control Panel:</label>
                <div class="col-sm-8">
                    <input type=text name="control_panel" tabindex=13 value="<?php echo $results['control_panel']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="cpu" class="col-sm-4 control-label">CPU:</label>
                <div class="col-sm-8">
                    <input type=text name="cpu" tabindex=15 value="<?php echo $results['cpu']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="cpu_cache" class="col-sm-4 control-label">CPU Cache:</label>
                <div class="col-sm-8">
                    <input type=text name="cpu_cache" tabindex=14 value="<?php echo $results['cpu_cache']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="cpu_speed" class="col-sm-4 control-label">CPU Speed:</label>
                <div class="col-sm-8">
                    <input type=text name="cpu_speed"  tabindex=16 value="<?php echo $results['cpu_ghz']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="ram" class="col-sm-4 control-label">RAM:</label>
                <div class="col-sm-8">
                    <input type=text name="ram" tabindex=17 value="<?php echo $results['ram']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="ram_speed" class="col-sm-4 control-label">RAM Speed:</label>
                <div class="col-sm-8">
                    <input type=text name="ram_speed" tabindex=19 value="<?php echo $results['ram_speed']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="bandwidth" class="col-sm-4 control-label">Bandwidth:</label>
                <div class="col-sm-8">
                    <input type=text name="bandwidth" tabindex=18 value="<?php echo $results['bandwidth']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="drive_controller" class="col-sm-4 control-label">RAID Controller:</label>
                <div class="col-sm-8">
                    <input type=text name="drive_controller" tabindex=20 value="<?php echo $results['drive_controller']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="hd0" class="col-sm-4 control-label">Primary Drive:</label>
                <div class="col-sm-8">
                    <input type=text name="hd0" tabindex=21 value="<?php echo $results['hd0']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="hd1" class="col-sm-4 control-label">Secondary Drive:</label>
                <div class="col-sm-8">
                    <input type=text name="hd1" tabindex=23 value="<?php echo $results['hd1']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="hd2" class="col-sm-4 control-label">Tertiary Drive:</label>
                <div class="col-sm-8">
                    <input type=text name="hd2" tabindex=22 value="<?php echo $results['hd2']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="hd3" class="col-sm-4 control-label">Fourth Drive:</label>
                <div class="col-sm-8">
                    <input type=text name="hd3" tabindex=24 value="<?php echo $results['hd3']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="drive_raid" class="col-sm-4 control-label">Drive RAID:</label>
                <div class="col-sm-8">
                    <input type=text name="drive_raid" tabindex=25 value="<?php echo $results['drive_raid']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="multiple_psus" class="col-sm-4 control-label">Multiple PSU's:</label>
                <div class="col-sm-8">
                    <input type=text name="multiple_psus" tabindex=27 value="<?php echo $results['multiple_psus']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="chassis_brand" class="col-sm-4 control-label">Chassis Brand:</label>
                <div class="col-sm-8">
                    <input type=text name="chassis_brand" tabindex=26 value="<?php echo $results['chassis_brand']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="chassis_model" class="col-sm-4 control-label">Chassis Model:</label>
                <div class="col-sm-8">
                    <input type=text name="chassis_model" tabindex=28 value="<?php echo $results['chassis_model']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="service_tag" class="col-sm-4 control-label">Service Tag:</label>
                <div class="col-sm-8">
                    <input type=text name="service_tag" tabindex=29 value="<?php echo $results['service_tag']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="asset_tag" class="col-sm-4 control-label">Asset Tag:</label>
                <div class="col-sm-8">
                    <input type=text name="asset_tag"  tabindex=31 value="<?php echo $results['asset_tag']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="warranty_expiration" class="col-sm-4 control-label">Warranty Expiration:</label>
                <div class="col-sm-8">
                    <input type=text name="warranty_expiration" tabindex=30 value="<?php echo $results['warranty_expiration']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="managed" class="col-sm-4 control-label">Managed or Unmanaged:</label>
                <div class="col-sm-8">
                    <input type=text name="managed" tabindex=32 value="<?php echo $results['managed']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="vps" class="col-sm-4 control-label">VPS:</label>
                <div class="col-sm-8">
                    <input type=text name="vps" tabindex=33 value="<?php echo $results['vps']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="vps_node" class="col-sm-4 control-label">VPS Node:</label>
                <div class="col-sm-8">
                    <input type=text name="vps_node" tabindex=35 value="<?php echo $results['vps_node']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="switch" class="col-sm-4 control-label">Switch:</label>
                <div class="col-sm-8">
                    <input type=text name="switch" tabindex=34 value="<?php echo $results['switch_id']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="switch_port" class="col-sm-4 control-label">Switch Port:</label>
                <div class="col-sm-8">
                    <input type=text name="switch_port" tabindex=36 value="<?php echo $results['switch_port']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="rack_name_number" class="col-sm-4 control-label">Rack Name/Number:</label>
                <div class="col-sm-8">
                    <input type=text name="rack_name_number" tabindex=37 value="<?php echo $results['rack_name_number']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="rack_position" class="col-sm-4 control-label">Rack Position:</label>
                <div class="col-sm-8">
                    <input type=text name="rack_position" tabindex=39 value="<?php echo $results['rack_position']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">

            <div class="form-group">
                <label for="ups" class="col-sm-4 control-label">UPS:</label>
                <div class="col-sm-8">
                    <input type=text name="ups" tabindex=38 value="<?php echo $results['ups']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="ups_port" class="col-sm-4 control-label">UPS Port:</label>
                <div class="col-sm-8">
                    <input type=text name="ups_port" tabindex=40 value="<?php echo $results['ups_port']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="pdu" class="col-sm-4 control-label">PDU:</label>
                <div class="col-sm-8">
                    <input type=text name="pdu" tabindex=41 value="<?php echo $results['pdu_id']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="pdu_port" class="col-sm-4 control-label">PDU Port:</label>
                <div class="col-sm-8">
                    <input type=text name="pdu_port" tabindex=43 value="<?php echo $results['pdu_port']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="notes" class="col-sm-4 control-label">Notes:</label>
                <div class="col-sm-8">
                    <textarea name="server_notes" rows="7" tabindex=42 cols="35"><?php echo $results['server_notes'] ?></textarea>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="notes" class="col-sm-4 control-label">Nick Name:</label>
                <div class="col-sm-8">
                    <input type=text name="nickname" tabindex=44 value="<?php echo $results['nickname']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="notes" class="col-sm-4 control-label">Clients Notes:</label>
                <div class="col-sm-8">
                    <textarea name="clientsnotes"  tabindex=45 rows="7" cols="35"><?php echo $results['clients_notes'] ?></textarea>
                </div>
            </div>
        </div>
    </div>
    <input type="submit" value="Edit Server" class="btn btn-primary"/>
</form>