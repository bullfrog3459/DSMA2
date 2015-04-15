<?php // debug($results);
//die()
//?>
<p><a class="btn btn-primary" href="<?php echo $modulelink . '&action=allocations'; ?>">Allocations</a>
<form class="form-horizontal"  action="<?php echo $modulelink . '&action=update_edit_allocation'; ?>" method="post">
    <input type="hidden" name="id" value="<?php echo $results['allocation_id'] ?>" class="form-control" id="allocation_id" placeholder="">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="ip" class="col-sm-4 control-label">Version:</label>
                <div class="col-sm-8">
				<input type=text name="ip" value="<?php echo $results['ip']; ?>" class="form-control" readonly="readonly"/>
                </div>
            </div>
        </div>
		<div class="col-lg-6">
            <div class="form-group">
                <label for="subnet" class="col-sm-4 control-label">Subnet:</label>
                <div class="col-sm-8">
                    <input type=text name="subnet" value="<?php echo $results['subnet']; ?>" class="form-control" readonly="readonly"/>
                </div>
            </div>
        </div>
		<div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">Assigned:</label>
                <div class="col-sm-8">
                    <select name="server_id" class="form-control">
                        <option value="0">Unassigned</option>
                        <?php
                        $res = mysql_query("select * from mod_dsma order by BINARY server_id");

                        while ($row = mysql_fetch_array($res)) {
                            if ($results['server_id'] == $row[server_id]) {
                                $selected = "selected='selected'";
                            } else {
                                $selected = '';
                            }
                            echo "<option value='" . $row[server_id] . "'$selected>" . $row[server_name] . "</option>";
                        }
                        ?>
                    </select>
                </div>
        </div>
	</div>
    <input type="submit" value="Edit Allocation" class="btn btn-primary"/>
</form>