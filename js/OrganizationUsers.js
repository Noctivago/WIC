function fill_Users_Category() {
    var title = "title-1";
    var idOrg = document.getElementById("org1").value;
    var arg = 'viewAllUsersInOrganizationAsSelect';
    var userSel = 'userOrg1';
    var tbody = "body1";
    $.post("../../orgsubmit.php", {arg: arg, id: idOrg}, function (result) {
        $("#body1").empty();
        $("#" + userSel).empty();
        var json_r = $.parseJSON(result);
        dataSelect(json_r, userSel, title);
        viewAllUsersInOrgOwners(idOrg);
    });
}


function fill_Users_Sub_Category() {
    var idOrg = document.getElementById("org2").value;
    var title = "title-2";
    var arg = 'viewAllUsersInOrganizationAsSelect';
    var userSel = 'userOrg2';
    var tbody = "body2";
    $.post("../../orgsubmit.php", {arg: arg, id: idOrg}, function (result) {
        $("#body2").empty();
        $("#" + userSel).empty();
        var json_r = $.parseJSON(result);
        dataSelect(json_r, userSel, title);
        viewAllUsersInOrgO(idOrg);
    });

}

function dataSelect(json, userSel, title) {
    var div = document.getElementById(title);
    var select = document.getElementById(userSel);
    select.disabled = false;
    var newSele = select;
    for (i = 0; i < json.length; i++) {
        var option = document.createElement('Option');
        option.textContent = json[i].Name;
        option.value = json[i].Id;
        newSele.appendChild(option);
    }
    //select.appendChild(newSele);
    div.replaceChild(select, newSele);
}
function viewAllUsersInOrgO() {
    var idOrg = document.getElementById('org2').value;
    var div_table = "title-2";
    var id_table = "table2";
    var tbody = "body2"
    var arg = 'viewAllUsersInOrgOwners';
    $.post("../../orgsubmit.php", {arg: arg, id: idOrg}, function (result) {
        $("#body2").empty();
        var json = $.parseJSON(result);
        change_tableData(json, div_table, id_table, tbody);
        console.log(json);
    });

//    $.post("../../orgsubmit.php", {arg: arg2, id: org}, function (result) {
//        $("#body2").empty();
//        var json_r2 = $.parseJSON(result);
//        change_table_data(json_r2, div_table2, id_table2, tbody2);
//        console.log(json_r2);
//    });
    return false;
}
function viewAllUsersInOrgOwners() {
    var idOrg = document.getElementById('org1').value;
    var div_table1 = "title-1";
    var id_table1 = "table1";
    var tbody1 = "body1"
    var arg = 'viewAllUsersInOrgOwners';
    $.post("../../orgsubmit.php", {arg: arg, id: idOrg}, function (result) {
        $("#body1").empty();
        var json = $.parseJSON(result);
        change_tableData(json, div_table1, id_table1, tbody1);
        console.log(json);
    });

//    $.post("../../orgsubmit.php", {arg: arg2, id: org}, function (result) {
//        $("#body2").empty();
//        var json_r2 = $.parseJSON(result);
//        change_table_data(json_r2, div_table2, id_table2, tbody2);
//        console.log(json_r2);
//    });
    return false;
}

function change_tableData(json_r, div_table, id_table, tbody) {
    var div = document.getElementById(div_table);
    var table = document.getElementById(id_table);
    document.getElementById(div_table).style = "Display: true";
    document.getElementById(id_table).style = "Display: true";
    var Tbody = document.getElementById(tbody);
    var boddy = Tbody;
    for (i = 0; i < json_r.length; i++) {
        var tr = document.createElement('TR');
        var td = document.createElement('TD')
        td.appendChild(document.createTextNode(json_r[i].First_Name));
        tr.appendChild(td)
        var td = document.createElement('TD')
        td.appendChild(document.createTextNode(json_r[i].Name));
        tr.appendChild(td)
        var td = document.createElement('TD')
        var dd = document.createElement('input');
        dd.type = "hidden";
        dd.id = "idUserOrg";
        dd.value = json_r[i].Id;
        tr.appendChild(dd);
        var btn = document.createElement('input');
        btn.type = 'button';
        btn.className = 'btn';
        btn.value = 'Remove';
        //  btn.placeholder = 'Remove';
        btn.id = 'idUserInOrg';
        btn.addEventListener("click", viewAllUsersInOrgO);
        td.appendChild(btn);
        tr.appendChild(td);
        boddy.appendChild(tr);
    }
    table.replaceChild(Tbody, boddy);
}

function viewAllUsersInOrganization() {
    var org = document.getElementById("org").value;
    var div_table1 = "title-1";
    var id_table1 = "table1";
    var tbody1 = "body1"
    var div_table2 = "title-2";
    var id_table2 = "table2";
    var tbody2 = "body2"
    var arg = 'viewAllUsersInOrganization';
    var arg2 = 'viewAllInviteWaitingForResponse';
    $.post("../../orgsubmit.php", {arg: arg, id: org}, function (result) {
        $("#body1").empty();
        var json_r = $.parseJSON(result);
        change_table_data(json_r, div_table1, id_table1, tbody1);
        console.log(json_r);
    });

    $.post("../../orgsubmit.php", {arg: arg2, id: org}, function (result) {
        $("#body2").empty();
        var json_r2 = $.parseJSON(result);
        change_table_data(json_r2, div_table2, id_table2, tbody2);
        console.log(json_r2);
    });
    return false;
}
function removeUserInOrgOwner() {
    var id2 = document.getElementById("idUserOrg").value;
    alert(id2);
    var arg = 'removeUserInOrgOwner';
    $.post("../../orgsubmit.php", {arg: arg, id: id2}, function (result) {
        document.location.reload(true);
    });
    return false;
}

function removeUserInOrganization() {
    var id = document.getElementById("idUserOrg").value;
    alert(id);
    var arg = 'removeUserInOrganization';
    $.post("../../orgsubmit.php", {arg: arg, id: id}, function (result) {
        alert(result);
        viewAllUsersInOrganization();
    });
    return false;
}

function change_table_data(json_r, div_table, id_table, tbody) {
    var div = document.getElementById(div_table);
    var table = document.getElementById(id_table);
    document.getElementById(div_table).style = "Display: true";
    document.getElementById(id_table).style = "Display: true";
    var Tbody = document.getElementById(tbody);
    var boddy = Tbody;
    for (i = 0; i < json_r.length; i++) {
        var tr = document.createElement('TR');
        var td = document.createElement('TD')
        td.appendChild(document.createTextNode(json_r[i].Email));
        tr.appendChild(td)
        var td = document.createElement('TD')
        td.appendChild(document.createTextNode(json_r[i].Username || json_r[i].First_Name));
        tr.appendChild(td)
        var td = document.createElement('TD')
        if (id_table === "table1") {
            var dd = document.createElement('input');
            dd.type = "hidden";
            dd.id = "idUserOrg";
            dd.value = json_r[i].Id;
            tr.appendChild(dd);
            var btn = document.createElement('input');
            btn.type = 'button';
            btn.className = 'btn';
            btn.value = 'Remove';
            //  btn.placeholder = 'Remove';
            btn.id = 'idUserInOrg';
            btn.addEventListener("click", removeUserInOrganization);
            td.appendChild(btn);
            tr.appendChild(td);
        } else {

        }
        boddy.appendChild(tr);
    }
    table.replaceChild(Tbody, boddy);
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
