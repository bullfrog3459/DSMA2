<p><a class="btn btn-primary" href="<?php echo $modulelink . '&action=allocations'; ?>">Allocations</a>
<form class="form-horizontal" action="<?php echo $modulelink . '&action=add_allocation'; ?>" method="post">
    <input type="hidden" name="save">
    <div class="row">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="ip" class="col-sm-4 control-label">Version:</label>
                <div class="col-sm-8">
                    <select name="ip" class="form-control">
                        <option value="IPv4">IPv4</option>
						<option value="IPv6">IPv6</option>
                    </select>
                </div>
            </div>
        </div>
		<div class="col-lg-6">
            <div class="form-group">
                <label for="subnet" class="col-sm-4 control-label">Subnet:</label>
                <div class="col-sm-8">
                    <input type=text name="subnet" class="form-control"/>
                </div>
            </div>
        </div>
		<div class="form-group">
                <label for="inputEmail3" class="col-sm-4 control-label">Assigned:</label>
                <div class="col-sm-8">
                    <select name="location_id" class="form-control">
                        <option value="0">Unlisted</option>
                        <?php
                        $res = mysql_query("select * from mod_dsma order by BINARY server_id");
                        while ($row = mysql_fetch_array($res)) {
                            echo "<option value='" . $row[server_id] . "'>" . $row[server_name] . "</option>";
                        }
                        ?>
                    </select>
                </div>
        </div>
	</div>
    <input type="submit" value="Add Allocation" class="btn btn-primary"/>
</form>
