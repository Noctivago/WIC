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
    alert(org);
    var arg = 'viewAllUsersInOrganization';
    $.post("../../orgsubmit.php", {arg: arg, id: org}, function (result) {
        var json_r = $.parseJSON(result);
        console.log(json_r);
        addTable(json_r);
    });
    return false;
}

function addTable(json_resp){
    var heading = new Array();
    heading[0] = "Name";
    heading[1] = "Email";
    heading[2] = "Remove";
    var mytable = document.getElementById("no-more-tables");
    var table = document.createElement('TABLE');
    var tableBody = document.createElement('TBODY');
    table.appendChild(tableBody);
    var tr = document.createElement('TR');
    tableBody.appendChild(tr)
    for(i= 0;i<heading.length;i++){
        var th = document.createElement('TH');
        th.appendChild(document.createTextNode(heading[i]));
        tr.appendChild(th);
    };
    //add rows
    for (i = 0; i < json_resp.length; i++) {
    var tr = document.createElement('TR');
    for (j = 0; j < json_resp[i].length; j++) {
        var td = document.createElement('TD')
        td.appendChild(document.createTextNode(json_resp[i][j]));
        tr.appendChild(td)
    }
    tableBody.appendChild(tr);
}
        
    
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