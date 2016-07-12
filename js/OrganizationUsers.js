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
    var org = document.getElementById("org").value;
    var div_table1 = "title-1";
    var id_table1 = "table1";
    var div_table2 ="title-2";
    var id_table2 = "table2";
    alert(org);
    var arg = 'viewAllUsersInOrganization';
    $.post("../../orgsubmit.php", {arg: arg, id: org}, function (result) {
        var json_r = $.parseJSON(result);
        change_table_data(json_r,div_table1,id_table1);
        console.log(json_r);
    });
    return false;
}
function change_table_data(json_r,div_table,id_table){
    var div = document.getElementById(div_table);
    var table = document.getElementById(id_table);
    document.getElementById(div_table).style = "Display: true";
    document.getElementById(id_table).style = "Display: true";
    var Tbody = document.getElementById('body1');
    var boddy = document.createElement('TBODY');
    for (i = 0; i < json_r.length; i++) {
        var tr = document.createElement('TR');
        var td = document.createElement('TD')
        td.appendChild(document.createTextNode(json_r[i].Name));
        tr.appendChild(td)
        var td = document.createElement('TD')
        td.appendChild(document.createTextNode(json_r[i].Email));
        tr.appendChild(td)
        var td = document.createElement('TD')
        td.appendChild(document.createTextNode("Delete"));
        tr.appendChild(td)
        boddy.appendChild(tr);
    }
    
    table.replaceChild(Tbody,boddy);
}

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