<?php // debug($results);
//die()
//?>
<p><a class="btn btn-primary" href="<?php echo $modulelink . '&action=shipment'; ?>">Shipments</a>
<form class="form-horizontal"  action="<?php echo $modulelink . '&action=update_edit_shipment'; ?>" method="post">
    <input type="hidden" name="id" value="<?php echo $results['tracking_id'] ?>" class="form-control" id="tracking_id" placeholder="">
    <div class="row">
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
                <label for="tracking_number" class="col-sm-4 control-label">Tracking Number:</label>
                <div class="col-sm-8">
                    <input type=text name="tracking_number" value="$results['tracking_number']; ?>" class="form-control" readonly="readonly"/>
                </div>
            </div>
			<div class="form-group">
                <label for="shipper" class="col-sm-4 control-label">Shipper:</label>
                <div class="col-sm-8">
                    <select name="shipper" class="form-control">
						<option value="0">UPS</option>
						<option value="1">FedEx</option>
						<option value="2">DHL</option>
						<option value="3">USPS</option>
						<option value="4">Other</option>
					<?php
                        $res = mysql_query("select * from mod_dsma_shipping order by BINARY tracking_id");
						
                        while ($row = mysql_fetch_array($res)) {
							if ($results['shipper'] == $row[shipper]) {
								$selected = "selected='selected'";
							} else {
								$selected = '';
							}
							
                            echo "<option value='" . $row[shipper] . "'$selected>" . $row[shipper] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
		<div class="col-lg-6">
            <div class="form-group">
                <label for="ship_date" class="col-sm-4 control-label">Ship Date:</label>
                <div class="col-sm-8">
                    <input type=date name="ship_date" class="form-control"/>
                </div>
            </div>
			<div class="form-group">
                <label for="ship_receive" class="col-sm-4 control-label">Ship Receive:</label>
                <div class="col-sm-8">
                    <input type=date name="ship_receive" class="form-control"/>
                </div>
            </div>
        </div>
		<div class="col-lg-6">
            <div class="form-group">
                <label for="received" class="col-sm-4 control-label">Received:</label>
                <div class="col-sm-8">
                    <select name="shipper" class="form-control">
                        <option value="0">No</option>
						<option value="1">Yes</option>
                    </select>
                </div>
            </div>
        </div>
	</div>
    <input type="submit" value="Edit Shipment" class="btn btn-primary"/>
</form>