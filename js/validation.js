function viewAllOrganizationToValidate() {
    var arg = 'viewAllOrganizationToValidate';
    $.post("../../orgsubmit.php", {arg: arg}, function (result) {
        $("tbody1").empty();
        var json = $.parseJSON(result);
        console.log(json);
        table_data(json);
    });
    return false;

}
function Reject() {
    var id = document.getElementById("id" + this.id).value;
    alert(id);
}
function Aprove() {
    var id = document.getElementById("id" + this.id).value;
    alert(id);
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
        btn.className = 'btn';
        btn.value = 'Remove';
        btn.id = json_r[i].Id;
        btn.addEventListener("click", Reject);
        td.appendChild(btn);
        var btn2 = document.createElement('input');
        btn2.type = 'button';
        btn2.className = 'btn';
        btn2.value = 'Approve';
        //  btn.placeholder = 'Remove';
        btn2.id = json_r[i].Id;
        btn2.addEventListener("click", Aprove);
        td.appendChild(btn2);
        tr.appendChild(td);
        boddy.appendChild(tr);
    }
    table.replaceChild(Tbody, boddy);
}
