<?php // debug($results);
//die()
//?>
<p><a class="btn btn-primary" href="<?php echo $modulelink . '&action=rack'; ?>">Racks</a>
<form class="form-horizontal"  action="<?php echo $modulelink . '&action=update_edit_rack'; ?>" method="post">
    <input type="hidden" name="id" value="<?php echo $results['rack_id'] ?>" class="form-control" id="rack_id" placeholder="">
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
                <label for="rack_name" class="col-sm-4 control-label">Rack Name:</label>
                <div class="col-sm-8">
                    <input type=text name="rack_name" value="<?php echo $results['rack_name']; ?>" class="form-control"/>
                </div>
            </div>
        </div>
	</div>
    <input type="submit" value="Edit Rack" class="btn btn-primary"/>
</form>