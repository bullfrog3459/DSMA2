<?php // debug($results);
//die()
//?>
<p><a class="btn btn-primary" href="<?php echo $modulelink . '&action=switches'; ?>">Switches</a>
<form class="form-horizontal"  action="<?php echo $modulelink . '&action=update_edit_switch'; ?>" method="post">
    <input type="hidden" name="id" value="<?php echo $results['switch_id'] ?>" class="form-control" id="switch_id" placeholder="">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="switch_name" class="col-sm-4 control-label">Switch Name:</label>
                <div class="col-sm-8">
                    <input type=text name="location_name" value="<?php echo $results['switch_name']; ?>" class="form-control"/>
                </div>
            </div>
        	<div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">Location:</label>
                <div class="col-sm-8">
                    <select name="location_id" class="form-control">
                        <option value="0">Unlisted</option>
                        <?php
                        $res = mysql_query("select * from mod_dsma_locations order by BINARY location_name");
						
                        while ($row = mysql_fetch_array($res)) {
							if ($results['location_id'] == $row[location_id]) {
								$selected = "selected='selected'";
							} else {
								$selected = '';
							}
							
                            echo "<option value='" . $row[location_id] . "'$selected>" . $row[location_name] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
		</div>
		<div class="col-lg-6">
            <div class="form-group">
                <label for="rack_name" class="col-sm-4 control-label">Rack:</label>
                <div class="col-sm-8">
                    <select name="rack_name" class="form-control">
                        <option value="0">Unlisted</option>
                        <?php
                        $res = mysql_query("select * from mod_dsma_rack order by BINARY rack_name");
						
                        while ($row = mysql_fetch_array($res)) {
							if ($results['rack_id'] == $row[rack_id]) {
								$selected = "selected='selected'";
							} else {
								$selected = '';
							}
							
                            echo "<option value='" . $row[rack_id] . "'>" . $row[rack_name] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="switch_ports" class="col-sm-4 control-label">Switch Ports:</label>
                <div class="col-sm-8">
                    <input type=text name="switch_ports" value="<?php echo $results['switch_ports']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
		<div class="col-lg-6">
			<div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">Owner:</label>
                <div class="col-sm-8">
                    <select name="client_id" class="form-control">
                        <option value="0">Internal</option>
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
                <label for="switch_snmp" class="col-sm-4 control-label">SNMP Community:</label>
                <div class="col-sm-8">
                    <input type=text name="switch_snmp" value="<?php echo $results['switch_snmp']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
	</div>
    <input type="submit" value="Edit Switch" class="btn btn-primary"/>
</form>