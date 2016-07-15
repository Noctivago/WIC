function viewAllInvites() {
    var arg = 'viewAllInvites';
    //var div = document.getElementById("div1");
    $.post("../../orgsubmit.php", {arg: arg}, function (result) {
        $("#tbody1").empty();
        var json = $.parseJSON(result);
        if (json.length === 0) {
            var resposta = document.getElementById('res');
            resposta.innerHTML = "you don't have invitations";
            //  table_data(json);
        } else {
            //id="div1" style="display: none"
            // document.getElementById("div1").style = "Display: true";
            console.log(json);
            table_data_invites(json);
        }
    });
    return false;

}
function approveInvite() {
    var id1 = document.getElementById("id" + this.id).value;
    var arg = 'inviteOrganization';
    var apr = 'Accept';
    var res = '1';
    var resp = deleteConfirmation(apr);
    if (resp == true) {
        $.post("../../orgsubmit.php", {arg: arg, id: id1, res: res}, function (result) {
            viewAllInvites();
        });
    }
    return false;

}
function RejectInvite() {
    var id1 = document.getElementById("id" + this.id).value;
    var arg = 'inviteOrganization';
    var rej = 'Reject';
    var res = '0';
    var resp = deleteConfirmation(rej);
    if (resp == true) {
        $.post("../../orgsubmit.php", {arg: arg, id: id1, res: res}, function (result) {
            viewAllInvites();
        });
    }
    return false;


}

function table_data_invites(json_r) {
    var div = document.getElementById('div1');
    var table = document.getElementById('table1');
    var Tbody = document.getElementById('tbody1');
    var boddy = Tbody;
    for (i = 0; i < json_r.length; i++) {
        var tr = document.createElement('TR');
        var td = document.createElement('TD')
        td.appendChild(document.createTextNode(json_r[i].Name));
        tr.appendChild(td)
        var td = document.createElement('TD')
        td.appendChild(document.createTextNode(json_r[i].Address));
        tr.appendChild(td)
        var td = document.createElement('TD')
        td.appendChild(document.createTextNode(json_r[i].Facebook));
        tr.appendChild(td)
        var td = document.createElement('TD')
        td.appendChild(document.createTextNode(json_r[i].Twitter));
        tr.appendChild(td)
        var td = document.createElement('TD')
        td.appendChild(document.createTextNode(json_r[i].Linkdin));
        tr.appendChild(td)
        var td = document.createElement('TD')
        td.appendChild(document.createTextNode(json_r[i].Organization_Email));
        tr.appendChild(td)
        var td = document.createElement('TD')
        td.appendChild(document.createTextNode(json_r[i].Website));
        tr.appendChild(td)
        var dd = document.createElement('input');
        dd.type = "hidden";
        dd.id = "id" + json_r[i].Id;
        dd.value = json_r[i].Id;
        tr.appendChild(dd);
        var btn = document.createElement('input');
        btn.type = 'button';
        btn.className = 'btn btn-danger';
        btn.value = 'Remove';
        btn.id = json_r[i].Id;
        btn.addEventListener("click", RejectInvite);
        tr.appendChild(btn);
        var btn2 = document.createElement('input');
        btn2.type = 'button';
        btn2.className = 'btn btn-success';
        btn2.value = 'Approve';
        btn2.id = json_r[i].Id;
        btn2.addEventListener("click", approveInvite);
        tr.appendChild(btn2);
        boddy.appendChild(tr);
    }
    table.replaceChild(Tbody, boddy);
}






function viewAllOrganizationToValidate() {
    var arg = 'viewAllOrganizationToValidate';
    $.post("../../orgsubmit.php", {arg: arg}, function (result) {
        $("#tbody1").empty();
        var json = $.parseJSON(result);
        console.log(json);
        table_data(json);
    });
    return false;

}
function deleteConfirmation(data) {
    var txt;
    var r = confirm("You want to " + data + " ?");
    if (r == true) {
        return true;
    } else {
        return false;
    }

}
function Reject() {
    var id = document.getElementById("id" + this.id).value;
    var arg = 'validateOrganization';
    var rej = 'Reject';
    var res = '0';
    var resp = deleteConfirmation(rej);
    if (resp == true) {
        $.post("../../orgsubmit.php", {arg: arg, id: id, res: res}, function (result) {
            viewAllOrganizationToValidate();
        });
    }
    return false;

}
function Aprove() {
    var id = document.getElementById("id" + this.id).value;
    var arg = 'validateOrganization';
    var apr = 'Aprove';
    var res = '1';
    var resp = deleteConfirmation(apr);
    if (resp == true) {
        $.post("../../orgsubmit.php", {arg: arg, id: id, res: res}, function (result) {
            viewAllOrganizationToValidate();
        });
    }
    return false;

}
function table_data(json_r) {
    var div = document.getElementById('div1');
    var table = document.getElementById('table1');
    var Tbody = document.getElementById('tbody1');
    var boddy = Tbody;
    for (i = 0; i < json_r.length; i++) {
        var tr = document.createElement('TR');
        var td = document.createElement('TD')
        td.appendChild(document.createTextNode(json_r[i].Name));
        tr.appendChild(td)
        var td = document.createElement('TD')
        td.appendChild(document.createTextNode(json_r[i].Phone_Number));
        tr.appendChild(td)
        var td = document.createElement('TD')
        td.appendChild(document.createTextNode(json_r[i].Mobile_Number));
        tr.appendChild(td)
        var td = document.createElement('TD')
        td.appendChild(document.createTextNode(json_r[i].Address));
        tr.appendChild(td)
        var td = document.createElement('TD')
        td.appendChild(document.createTextNode(json_r[i].Date_Created));
        tr.appendChild(td)
        var td = document.createElement('TD')
        td.appendChild(document.createTextNode(json_r[i].Facebook));
        tr.appendChild(td)
        var td = document.createElement('TD')
        td.appendChild(document.createTextNode(json_r[i].Twitter));
        tr.appendChild(td)
        var td = document.createElement('TD')
        td.appendChild(document.createTextNode(json_r[i].Linkdin));
        tr.appendChild(td)
        var td = document.createElement('TD')
        td.appendChild(document.createTextNode(json_r[i].Organization_Email));
        tr.appendChild(td)
        var td = document.createElement('TD')
        td.appendChild(document.createTextNode(json_r[i].Website));
        tr.appendChild(td)
        var dd = document.createElement('input');
        dd.type = "hidden";
        dd.id = "id" + json_r[i].Id;
        dd.value = json_r[i].Id;
        tr.appendChild(dd);
        var btn = document.createElement('input');
        btn.type = 'button';
        btn.className = 'btn btn-danger';
        btn.value = 'Remove';
        btn.id = json_r[i].Id;
        btn.addEventListener("click", Reject);
        tr.appendChild(btn);
        var btn2 = document.createElement('input');
        btn2.type = 'button';
        btn2.className = 'btn btn-success';
        btn2.value = 'Approve';
        btn2.id = json_r[i].Id;
        btn2.addEventListener("click", Aprove);
        tr.appendChild(btn2);
        boddy.appendChild(tr);
    }
    table.replaceChild(Tbody, boddy);
}
