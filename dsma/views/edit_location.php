<?php // debug($results);
//die()
//?>
<p><a class="btn btn-primary" href="<?php echo $modulelink . '&action=locations'; ?>">Locations</a>
<form class="form-horizontal"  action="<?php echo $modulelink . '&action=update_edit_location'; ?>" method="post">
    <input type="hidden" name="id" value="<?php echo $results['location_id'] ?>" class="form-control" id="location_id" placeholder="">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="location_name" class="col-sm-4 control-label">Location Name:</label>
                <div class="col-sm-8">
                    <input type=text name="location_name" value="<?php echo $results['location_name']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
		<div class="col-lg-6">
            <div class="form-group">
                <label for="location_address" class="col-sm-4 control-label">Location Address:</label>
                <div class="col-sm-8">
                    <input type=text name="location_address" value="<?php echo $results['location_address']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
	</div>
    <input type="submit" value="Edit Location" class="btn btn-primary"/>
</form>