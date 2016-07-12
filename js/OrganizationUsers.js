//remover utilizador da organização
function removeUserInOrganization(id) {
    var arg = 'removeUserInOrganization';
    var dataString = 'arg=' + arg + '&Id=' + id;
    alert(dataString);
    $.ajax({
        type: 'POST',
        url: "../orgsubmit.php",
        data: dataString,
        cache: false,
        success: function (result) {
            alert(result);
        }
    });
    viewAllUsersInOrganization();
    return false;
}

function viewAllUsersInOrganization() {
    var title = "Users in Organization";
    var org = document.getElementById("org").value;
    alert(org);
    var arg = 'viewAllUsersInOrganization';
    $.post("../../orgsubmit.php", {arg: arg, id: org}, function (result) {
        var json_r = $.parseJSON(result);
            addTable(json_r);
        console.log(json_r);
    });
    return false;
}

function addTable(json_resp) {
    var heading = new Array();
    heading[0] = "Name";
    heading[1] = "Email";
    heading[2] = "Remove";
    //document.getElementById("title").innerHTML = Title;
    var mytable = document.getElementById("no-more-tables");
    var table = document.createElement('TABLE');
    table.setIdAttribute("my-table");
    table.className = "col-md-12 table-bordered table-striped table-condensed cf ";
    var tableBody = document.createElement('TBODY');
    table.appendChild(tableBody);
    var tr = document.createElement('TR');
    tableBody.appendChild(tr)
    for (i = 0; i < heading.length; i++) {
        var th = document.createElement('TH');
        th.className = "cf";
        th.appendChild(document.createTextNode(heading[i]));
        tr.appendChild(th);
    }
    ;
    //add rows
    for (i = 0; i < json_resp.length; i++) {
        var tr = document.createElement('TR');
        var td = document.createElement('TD')
        td.appendChild(document.createTextNode(json_resp[i].Name));
        tr.appendChild(td)
        var td = document.createElement('TD')
        td.appendChild(document.createTextNode(json_resp[i].Email));
        tr.appendChild(td)
        var td = document.createElement('TD')
        td.appendChild(document.createTextNode("Delete"));
        tr.appendChild(td)
        tableBody.appendChild(tr);
    }
    mytable.appendChild(table);

}}
//aceitar convite para ingressar na organizaçao
function UserValidateInvite() {
    var arg = 'UserValidateInvite';
    var orgId = $("#organizationId2").val();
    var userId = $("#UserValidateInvite").val();
    var response = $("#response").val();
    var dataString = 'arg=' + arg + '&orgId=' + orgId + '&userId=' + userId + '&response=' + response;
    alert(dataString);
    $.ajax({
        type: 'POST',
        url: "../orgsubmit.php",
        data: dataString,
        cache: false,
        success: function (result) {
            alert(result);
        }
    });
    return false;

}