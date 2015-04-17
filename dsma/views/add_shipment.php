<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.6.0/moment.min.js"></script>
<script type="test/javascript" src="<?php echo $vars['moduledir'] ?>js/bootstrap.js"></script>
<script type="test/javascript" src="<?php echo $vars['moduledir'] ?>js/bootstrap-datetimepicker.js"></script>
<link href="<?php echo $vars['moduledir'] ?>css/bootstrap-datetimepicker.min.css" type="text/css" rel="stylesheet"/>
<p><a class="btn btn-primary" href="<?php echo $modulelink . '&action=shipment'; ?>">Shipments</a>
<form class="form-horizontal" action="<?php echo $modulelink . '&action=add_shipment'; ?>" method="post">
    <input type="hidden" name="save">
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
                            echo "<option value='" . $row[id] . "'>" . $row[firstname] . " " . $row[lastname] . "</option>";
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
                            echo "<option value='" . $row[location_id] . "'>" . $row[location_name] . "</option>";
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
                    <input type=text name="tracking_number" class="form-control"/>
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
                    </select>
                </div>
            </div>
        </div>
		<div class="col-lg-6">
            <div class="form-group">
                <label for="ship_date" class="col-sm-4 control-label">Ship Date:</label>
                <div class="col-sm-8">
                    <div class='input-group date' id='datetimepicker1'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="fa fa-fw fa-calendar-o"></span>
                    </span>
                </div>
				<script type="text/javascript">
					$(function () {
					$('#datetimepicker1').datetimepicker(
					icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
						});
					});
				</script>
                </div>
            </div>
			<div class="form-group">
                <label for="ship_receive" class="col-sm-4 control-label">Ship Receive:</label>
                <div class="col-sm-8">
                    <div class='input-group date' id='datetimepicker2'>
                    <input type='text' class="form-control" />
                    <span class="input-group-addon">
                        <span class="fa fa-fw fa-calendar-o"></span>
                    </span>
                </div>
				<script type="text/javascript">
					$(function () {
					$('#datetimepicker2').datetimepicker({
						icons: {
                    time: "fa fa-clock-o",
                    date: "fa fa-calendar",
                    up: "fa fa-arrow-up",
                    down: "fa fa-arrow-down"
						});
					});
				</script>
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
    <input type="submit" value="Add Shipment" class="btn btn-primary"/>
</form>
