<div class="col60">
    <div class="styled_title"><h2>Dedicated Server Management Addon</h2></div>
</div>
{if $errormessage}<div style="clear: both;background: #b7e4a8;padding: 10px 15px;margin-bottom: 10px; ">{$errormessage}</div>{/if}
<table class="table table-striped table-framed table-centered">
    <thead>
        <tr>
            <th>NickName</th>
            <th>Primary IP Address</th>
            <th>Primary Hard Drive</th>
            <th>RAM</th>
            <th>Rack Name/Number</th>
            <th>Switch Port</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        {foreach from=$servers item=server}   
            <tr>
                <td>{$server.nickname}</td>
                <td>{$server.main_ip_address}</td>
                <td>{$server.hd0}</td>
                <td>{$server.ram}</td>
                <td>{$server.rack_name_number}</td>
                <td>{$server.switch_port}</td>
                <td class="textcenter"><a class="btn btn-primary" href="{$vars.modulelink}&action=edit&server_id={$server.server_id}">Edit</a></td>
            </tr>
        {/foreach}

    </tbody>
</table>
