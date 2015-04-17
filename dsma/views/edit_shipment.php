<link rel="stylesheet" type="text/css" href="<?php echo $vars['moduledir'] ?>css/jquery.datetimepicker.css"/>
<p><a class="btn btn-primary" href="<?php echo $modulelink . '&action=shipments'; ?>">Shipments</a>
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
                    <input type=text name="tracking_number" value="<?php echo $results['tracking_number']; ?>" class="form-control" readonly="readonly"/>
                </div>
            </div>
			<div class="form-group">
                <label for="shipper" class="col-sm-4 control-label">Shipper:</label>
                <div class="col-sm-8">
                    <input type=text name="shipper" value="<?php echo $results['shipper']; ?>" class="form-control" readonly="readonly"/>
                </div>
            </div>
        </div>
		<div class="col-lg-6">
            <div class="form-group">
                <label for="ship_date" class="col-sm-4 control-label">Ship Date:</label>
                <div class="col-sm-8">
				<input type="text" id="datetimepicker1" class="form-control" name="ship_date" value="<?php echo $results['ship_date']; ?>"/><br><br>
                </div>
            </div>
			<div class="form-group">
                <label for="ship_receive" class="col-sm-4 control-label">Ship Receive:</label>
                <div class="col-sm-8">
				<input type="text" id="datetimepicker2" class="form-control" name="ship_receive" value="<?php echo $results['ship_receive']; ?>"/><br><br>
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
<script src="<?php echo $vars['moduledir'] ?>js/jquery.js"></script>
<script src="<?php echo $vars['moduledir'] ?>js/jquery.datetimepicker.js"></script>
<script>
$('#datetimepicker1').datetimepicker({
	lang:'en',
	timepicker:false,
	format:'m/d/Y',
	formatDate:'m/d/Y',
	closeOnDateSelect: true
});
$('#datetimepicker2').datetimepicker({
	lang:'en',
	timepicker:false,
	format:'m/d/Y',
	formatDate:'m/d/Y',
	closeOnDateSelect: true
});
</script>