
<p>Please use the following form to add a new server.</p>
<form class="form-horizontal" action="<?= $modulelink; ?>&page=server_add" method="post">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">Owner:</label>
                <div class="col-sm-8">
                    <select name="client_id" class="form-control">
                        <option value="0">None</option>
                        <?
                        $res = mysql_query("select * from tblclients order by BINARY firstname");
                        while ($row = mysql_fetch_array($res)) {
                            echo "<option value='" . $row[id] . "'>" . $row[firstname] . " " . $row[lastname] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-4 control-label">Main IP Address:</label>
                <div class="col-sm-8">
                    <input type=text name="main_ip_address" class="form-control"/>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group">
                <label for="inputPassword3" class="col-sm-4 control-label">Server Name:</label>
                <div class="col-sm-8">
                    <input type=text name="server_name" class="form-control"/>
                </div>
            </div>
            <div class="form-group">
                <label for="additional_ip_addresses" class="col-sm-4 control-label">Additional IP Addresses:</label>
                <div class="col-sm-8">
                    <input type=text name="additional_ip_addresses" class="form-control"/>
                </div>
            </div>
        </div>
    </div>
</form>
<form action="<?= $modulelink; ?>&page=server_add" method="post">
    <input type="hidden" name="posted" value="yes" />
    <table>
        
        <tr><td>Main IP Address:</td><td><input type=text name="main_ip_address" /></td></tr>
        <tr><td>Additional IP Addresses:</td><td><input type=text name="additional_ip_addresses" /></td></tr>
        <tr><td>Multiple NIC's:</td><td><input type=text name="multiple_nics" /></td></tr>
        <tr><td>DRAC IP:</td><td><input type=text name="drac_ip" /></td></tr>
        <tr><td>Location:</td><td><input type=text name="location" /></td></tr>
        <tr><td>OS:</td><td><input type=text name="os" /> </td></tr>
        <tr><td>Administrative Username:</td><td><input type=text name="root_username" /></td></tr>
        <tr><td>Root Password:</td><td><input type=text name="root_pass" /></td></tr>
        <tr><td>SSH Port:</td><td><input type=text name="ssh_port" /></td></tr>
        <tr><td>RDC Port:</td><td><input type=text name="rdc_port" /></td></tr>
        <tr><td>Control Panel:</td><td><input type=text name="control_panel" /></td></tr>
        <tr><td>CPU:</td><td><input type=text name="cpu" /></td></tr>
        <tr><td>CPU Cache:</td><td><input type=text name="cpu_cache" /></td></tr>
        <tr><td>CPU Speed:</td><td><input type=text name="cpu_ghz" /></td></tr>
        <tr><td>RAM:</td><td><input type=text name="ram" /></td></tr>
        <tr><td>RAM Speed:</td><td><input type=text name="ram_speed" /></td></tr>
        <tr><td>Bandwidth:</td><td><input type=text name="bandwidth" /></td></tr>
        <tr><td>Drive Controller:</td><td><input type=text name="drive_controller" /></td></tr>
        <tr><td>Primary Hard Disk:</td><td><input type=text name="hd0" /></td></tr>
        <tr><td>Secondary Hard Disk:</td><td><input type=text name="hd1" /></td></tr>
        <tr><td>Tertiary Hard Disk:</td><td><input type=text name="hd2" /></td></tr>
        <tr><td>Fourth Hard Disk:</td><td><input type=text name="hd3" /></td></tr>
        <tr><td>Drive RAID:</td><td><input type=text name="drive_raid" /></td></tr>
        <tr><td>Multiple PSU's:</td><td><input type=text name="multiple_psus" /></td></tr>
        <tr><td>Chassis Brand:</td><td><input type=text name="chassis_brand" /></td></tr>
        <tr><td>Chassis Model:</td><td><input type=text name="chassis_model" /></td></tr>
        <tr><td>Service Tag:</td><td><input type=text name="service_tag" /></td></tr>
        <tr><td>Asset Tag:</td><td><input type=text name="asset_tag" /></td></tr>
        <tr><td>Warranty Expiration:</td><td><input type=text name="warranty_expiration" /></td></tr>
        <tr><td>Managed or Unmanaged:</td><td><input type=text name="managed" /></td></tr>
        <tr><td>VPS:</td><td><input type=text name="vps" /></td></tr>
        <tr><td>VPS Node:</td><td><input type=text name="vps_node" /></td></tr>
        <tr><td>Switch:</td><td><input type=text name="switch_id" /></td></tr>
        <tr><td>Switch Port:</td><td><input type=text name="switch_port" /></td></tr>
        <tr><td>Switch Speed:</td><td><input type=text name="switch_speed" /></td></tr>
        <tr><td>Rack Name/Number:</td><td><input type=text name="rack_name_number" /></td></tr>
        <tr><td>Rack Position:</td><td><input type=text name="rack_position" /></td></tr>
        <tr><td>UPS:</td><td><input type=text name="ups" /></td></tr>
        <tr><td>UPS Port:</td><td><input type=text name="ups_port" /></td></tr>
        <tr><td>PDU:</td><td><input type=text name="pdu_id" /></td></tr>
        <tr><td>PDU Port:</td><td><input type=text name="pdu_port" /></td></tr>
        <tr><td valign="top">Contract Terms:</td><td><textarea name="contract_terms" rows="7" cols="35"></textarea></td></tr>
        <tr><td valign="top">Notes:</td><td><textarea name="server_notes" rows="7" cols="35"></textarea></td></tr>
        <tr><td colspan="2" align="center"><input type="submit" value="Add Server" /></td></tr>
    </table>

</form>