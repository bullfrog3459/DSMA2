<link href="{$vars.moduledir}css/bootstrap.css"  type="text/css" rel="stylesheet"/>
<div class="page-header row">
    <div class="styled_title"><h1>Edit   <a href='{$vars.modulelink}' class='btn btn-danger' style='margin-left: 15px;letter-spacing: 2px;'>Back</a></h1>

    </div>
</div>
<form  name='serveredit' method='POST' action='{$vars.modulelink}&action=edit' class="form-horizontal">
    <input type="hidden" name="id" value="{$servers.server_id}" class="form-control" id="client_id" placeholder="">

    <div class="row">
        <div class="col-lg-12">
            <label for="inputEmail3" class="col-sm-4 control-label">Nickname:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" name="nickname" value="{$servers.nickname}"/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <label for="main_ip_address" class="col-sm-4 control-label">Notes</label>
            <div class="col-sm-8">
                <textarea name="clients_notes" class="form-control"  rows="6">{$servers.clients_notes}</textarea>
            </div>
        </div>

    </div>

    <div class="form-actions">
        <input class="btn btn-primary" type="submit" name="save" value="Save" />
    </div>
</form>

