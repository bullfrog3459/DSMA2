<p><a class="btn btn-primary" href="<?php echo $modulelink . '&action=rack'; ?>">Rack List</a>
<table class="table table-bordered table-striped" width=100% cellspacing=0 cellpadding=5>
        <thead>
            <tr>
                <th>Rack U</th>
                <th>Device</th>
            </tr>
        </thead>
        <tbody>
            <?php
			for($i = $row['height']; $i >= 1; $i--) {
				$data_query = mysql_query("select * from mod_dsma_rack left join mod_dsma_rack_rows on (mod_dsma_rack.rack_id=mod_dsma_rack_rows.rack_id) left join mod_dsma on (mod_dsma_rack_rows.server_id=mod_dsma.server_id) where mod_dsma_rack.rack_id = '" . $rackid . "' AND mod_dsma_rack_rows.rack_position = '" . $i . "'");
				$data = mysql_fetch_array($data_query);
                ?>
                <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo "<a href=$modulelink&action=view_server&server_id=" . $data[server_id] . ">" . $data[server_name] . "</a>"; ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
<table class="table table-bordered table-striped" width=100% cellspacing=0 cellpadding=5>
        <thead>
            <tr>
                <th>Zero U</th>
            </tr>
        </thead>
        <tbody>
            <?php
			$res = mysql_query("select * from mod_dsma_rack left join mod_dsma_rack_rows on (mod_dsma_rack.rack_id=mod_dsma_rack_rows.rack_id) left join mod_dsma on (mod_dsma_rack_rows.server_id=mod_dsma.server_id) where mod_dsma_rack.rack_id = '" . $rackid . "' AND mod_dsma_rack_rows.rack_position = '0'");

                while ($row = mysql_fetch_array($res)) {
                ?>
                <tr>
                    <td><?php echo "<a href=$modulelink&action=view_server&server_id=" . $data[server_id] . ">" . $data[server_name] . "</a>"; ?></td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
<p><a class="btn btn-primary" href="<?php echo $modulelink; ?>">Back</a></p>