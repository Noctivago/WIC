function viewAllOrganizationToValidate(){
    var arg = 'viewAllOrganizationToValidate';
    $.post("../../orgsubmit.php", {arg: arg}, function (result) {
        var json = $.parseJSON(result);
        alert(json);
    });
    return false;
    
}

function change_table_data(json_r) {
    var div = document.getElementById(div_table);
    var table = document.getElementById(id_table);
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
