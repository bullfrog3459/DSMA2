<p><a class="btn btn-primary" href="<?php echo $modulelink; ?>">Server List</a>
<p>Please use the following form to add a new server.</p>
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">Owner:</label>
                <div class="col-sm-8">
                    <select name="client_id" class="form-control" readonly="readonly">
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
                    <input type=text name="main_ip_address" readonly="readonly" value="<?php echo $results['main_ip_address']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="server_name" class="col-sm-4 control-label">Server Name:</label>
                <div class="col-sm-8">
                    <input type=text name="server_name" readonly="readonly" value="<?php echo $results['server_name']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="additional_ip_addresses" class="col-sm-4 control-label">Additional IP Addresses:</label>
                <div class="col-sm-8">
                    <input type=text name="additional_ip_addresses" readonly="readonly" value="<?php echo $results['additional_ip_addresses']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="multiple_nics" class="col-sm-4 control-label">Multiple NICS:</label>
                <div class="col-sm-8">
                    <input type=text name="multiple_nics" readonly="readonly" value="<?php echo $results['multiple_nics']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="drac_ip" class="col-sm-4 control-label">DRAC/IPMI IP:</label>
                <div class="col-sm-8">
                    <input type=text name="drac_ip" readonly="readonly" value="<?php echo $results['drac_ip']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="location" class="col-sm-4 control-label">Location:</label>
                <div class="col-sm-8">
                    <input type=text name="location" readonly="readonly" value="<?php echo $results['location']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="os" class="col-sm-4 control-label">Operating System:</label>
                <div class="col-sm-8">
                    <input type=text name="os" readonly="readonly" value="<?php echo $results['os']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="username" class="col-sm-4 control-label">Username:</label>
                <div class="col-sm-8">
                    <input type=text name="root_username"  readonly="readonly" value="<?php echo $results['root_username']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="root_pass" class="col-sm-4 control-label">Password:</label>
                <div class="col-sm-8">
                    <input type=text name="root_pass" readonly="readonly" value="<?php echo $results['root_pass']; ?>"  class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="ssh_port" class="col-sm-4 control-label">SSH Port:</label>
                <div class="col-sm-8">
                    <input type=text name="ssh_port" readonly="readonly" value="<?php echo $results['ssh_port']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="rdc_port" class="col-sm-4 control-label">RDC Port:</label>
                <div class="col-sm-8">
                    <input type=text name="rdc_port" readonly="readonly" value="<?php echo $results['rdc_port']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="control_panel" class="col-sm-4 control-label">Control Panel:</label>
                <div class="col-sm-8">
                    <input type=text name="control_panel" readonly="readonly" value="<?php echo $results['control_panel']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="cpu" class="col-sm-4 control-label">CPU:</label>
                <div class="col-sm-8">
                    <input type=text name="cpu" readonly="readonly" value="<?php echo $results['cpu']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="cpu_cache" class="col-sm-4 control-label">CPU Cache:</label>
                <div class="col-sm-8">
                    <input type=text name="cpu_cache" readonly="readonly" value="<?php echo $results['cpu_cache']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="cpu_speed" class="col-sm-4 control-label">CPU Speed:</label>
                <div class="col-sm-8">
                    <input type=text name="cpu_speed"  readonly="readonly" value="<?php echo $results['cpu_ghz']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="ram" class="col-sm-4 control-label">RAM:</label>
                <div class="col-sm-8">
                    <input type=text name="ram" readonly="readonly" value="<?php echo $results['ram']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="ram_speed" class="col-sm-4 control-label">RAM Speed:</label>
                <div class="col-sm-8">
                    <input type=text name="ram_speed" readonly="readonly" value="<?php echo $results['ram_speed']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="bandwidth" class="col-sm-4 control-label">Bandwidth:</label>
                <div class="col-sm-8">
                    <input type=text name="bandwidth" readonly="readonly" value="<?php echo $results['bandwidth']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="drive_controller" class="col-sm-4 control-label">RAID Controller:</label>
                <div class="col-sm-8">
                    <input type=text name="drive_controller" readonly="readonly" value="<?php echo $results['drive_controller']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="hd0" class="col-sm-4 control-label">Primary Drive:</label>
                <div class="col-sm-8">
                    <input type=text name="hd0" readonly="readonly" value="<?php echo $results['hd0']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="hd1" class="col-sm-4 control-label">Secondary Drive:</label>
                <div class="col-sm-8">
                    <input type=text name="hd1" readonly="readonly" value="<?php echo $results['hd1']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="hd2" class="col-sm-4 control-label">Tertiary Drive:</label>
                <div class="col-sm-8">
                    <input type=text name="hd2" readonly="readonly" value="<?php echo $results['hd2']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="hd3" class="col-sm-4 control-label">Fourth Drive:</label>
                <div class="col-sm-8">
                    <input type=text name="hd3" readonly="readonly" value="<?php echo $results['hd3']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="drive_raid" class="col-sm-4 control-label">Drive RAID:</label>
                <div class="col-sm-8">
                    <input type=text name="drive_raid" readonly="readonly" value="<?php echo $results['drive_raid']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="multiple_psus" class="col-sm-4 control-label">Multiple PSU's:</label>
                <div class="col-sm-8">
                    <input type=text name="multiple_psus" readonly="readonly" value="<?php echo $results['multiple_psus']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="chassis_brand" class="col-sm-4 control-label">Chassis Brand:</label>
                <div class="col-sm-8">
                    <input type=text name="chassis_brand" readonly="readonly" value="<?php echo $results['chassis_brand']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="chassis_model" class="col-sm-4 control-label">Chassis Model:</label>
                <div class="col-sm-8">
                    <input type=text name="chassis_model" readonly="readonly" value="<?php echo $results['chassis_model']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="service_tag" class="col-sm-4 control-label">Service Tag:</label>
                <div class="col-sm-8">
                    <input type=text name="service_tag" readonly="readonly" value="<?php echo $results['service_tag']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="asset_tag" class="col-sm-4 control-label">Asset Tag:</label>
                <div class="col-sm-8">
                    <input type=text name="asset_tag"  readonly="readonly" value="<?php echo $results['asset_tag']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="warranty_expiration" class="col-sm-4 control-label">Warranty Expiration:</label>
                <div class="col-sm-8">
                    <input type=text name="warranty_expiration" readonly="readonly" value="<?php echo $results['warranty_expiration']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="managed" class="col-sm-4 control-label">Managed or Unmanaged:</label>
                <div class="col-sm-8">
                    <input type=text name="managed" readonly="readonly" value="<?php echo $results['managed']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="vps" class="col-sm-4 control-label">VPS:</label>
                <div class="col-sm-8">
                    <input type=text name="vps" readonly="readonly" value="<?php echo $results['vps']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="vps_node" class="col-sm-4 control-label">VPS Node:</label>
                <div class="col-sm-8">
                    <input type=text name="vps_node" readonly="readonly" value="<?php echo $results['vps_node']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="switch" class="col-sm-4 control-label">Switch:</label>
                <div class="col-sm-8">
                    <input type=text name="switch" readonly="readonly" value="<?php echo $results['switch_id']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="switch_port" class="col-sm-4 control-label">Switch Port:</label>
                <div class="col-sm-8">
                    <input type=text name="switch_port" readonly="readonly" value="<?php echo $results['switch_port']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="rack_name_number" class="col-sm-4 control-label">Rack Name/Number:</label>
                <div class="col-sm-8">
                    <input type=text name="rack_name_number" readonly="readonly" value="<?php echo $results['rack_name_number']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="rack_position" class="col-sm-4 control-label">Rack Position:</label>
                <div class="col-sm-8">
                    <input type=text name="rack_position" readonly="readonly" value="<?php echo $results['rack_position']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">

            <div class="form-group">
                <label for="ups" class="col-sm-4 control-label">UPS:</label>
                <div class="col-sm-8">
                    <input type=text name="ups" readonly="readonly" value="<?php echo $results['ups']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="ups_port" class="col-sm-4 control-label">UPS Port:</label>
                <div class="col-sm-8">
                    <input type=text name="ups_port" readonly="readonly" value="<?php echo $results['ups_port']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="pdu" class="col-sm-4 control-label">PDU:</label>
                <div class="col-sm-8">
                    <input type=text name="pdu" readonly="readonly" value="<?php echo $results['pdu_id']; ?>" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="pdu_port" class="col-sm-4 control-label">PDU Port:</label>
                <div class="col-sm-8">
                    <input type=text name="pdu_port" readonly="readonly" value="<?php echo $results['pdu_port']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="notes" class="col-sm-4 control-label">Notes:</label>
                <div class="col-sm-8">
                    <textarea name="server_notes" rows="7" readonly="readonly" cols="35"><?php echo $results['server_notes'] ?></textarea>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="notes" class="col-sm-4 control-label">Nick Name:</label>
                <div class="col-sm-8">
                    <input type=text name="nickname" readonly="readonly" value="<?php echo $results['nickname']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="notes" class="col-sm-4 control-label">Clients Notes:</label>
                <div class="col-sm-8">
                    <textarea name="clientsnotes"  readonly="readonly" rows="7" cols="35"><?php echo $results['clients_notes'] ?></textarea>
                </div>
            </div>
        </div>
		<div class="col-lg-6">
            <div class="form-group">
                <label for="graphs" class="col-sm-4 control-label">Graphs:</label>
                <div class="col-sm-8">
				<?php
					$url="http://cactistats.hostress.net/cacti/api/api.php";
                    $url_d=$url."?switch=".$results['switch_id']."&port=".$results['switch_port']."&cycle=-1d";
					$url_w=$url."?switch=".$results['switch_id']."&port=".$results['switch_port']."&cycle=-1w";
					$url_m=$url."?switch=".$results['switch_id']."&port=".$results['switch_port']."&cycle=-1m";
				?>
				<label for="1dgraph" class="col-sm-4 control-label">1 Day Graph:</label><img src="<?php echo $url_d; ?>" /><br><br>
				<label for="1wgraph" class="col-sm-4 control-label">1 Week Graph:</label><img src="<?php echo $url_w; ?>" /><br><br>
				<label for="1dmgraph" class="col-sm-4 control-label">1 Month Graph:</label><img src="<?php echo $url_m; ?>" /><br><br>
                </div>
            </div>
        </div>
    </div>
<p><a class="btn btn-primary" href="<?php echo $modulelink; ?>">Back</a></p>