<?php

function index($vars) {
    $modulelink = $vars['modulelink'];
    $res = mysql_query("select * from mod_dsma left join tblclients on (mod_dsma.client_id=tblclients.id) left join tblproducts on (mod_dsma.product_id=tblproducts.id) order by mod_dsma.server_id");

//
//    echo "</table>
//<p>You currently have a total of <b>$numservers</b> Servers.</p>";
    require_once 'views/index.php';
}

function add_server($vars) {
     $modulelink = $vars['modulelink'];
    require_once 'views/add_server.php';
}
