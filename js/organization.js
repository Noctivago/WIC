function readAllUserNewsletter() {
    var arg = 'readAllUserNewsletter';
    var dataString = 'arg=' + arg;
    $.ajax({
        type: 'POST',
        url: "orgsubmit.php",
        data: dataString,
        cache: false,
        sucess: function (result) {
            alert(result);
        }
    });
    return false;
}

function readDataOrganization() {
    var arg = 'viewAllOrganization';
    var arg1 = 'GetOrganizationUser';
    $.post("../../orgsubmit.php", {arg: arg1}, function (result) {
        var json = $.parseJSON(result);
        var orgId = json[0].Id;
        $.post("../../orgsubmit.php", {arg: arg, id: orgId}, function (result1) {
            var json2 = $.parseJSON(result1);
            if (json2.length === 0)
            {
                alert(json2);
            } else {
                console.log(json2);
                document.getElementById('name').value = json2[0].Name;
                document.getElementById('phone').value = json2[0].Phone_Number;
                document.getElementById('mobile').value = json2[0].Mobile_Number;
                document.getElementById('address').value = json2[0].Address;
                document.getElementById('facebook').value = json2[0].Facebook;
                document.getElementById('twitter').value = json2[0].Twitter;
                document.getElementById('linkdin').value = json2[0].Linkdin;
                document.getElementById('orgEmail').value = json2[0].Organization_Email;
                document.getElementById('website').value = json2[0].Website;
            }
        });

    });
    return false;
}

function updateDataOrganization() {
    var arg = 'updateOrganizationInform';
    var arg1= 'GetOrganizationUser';
    var name = $("#name").val();
    var phone = $("#phone").val();
    var mobile = $("#mobile").val();
    var address = $("#address").val();
    var facebook = $("#facebook").val();
    var twitter = $("#twitter").val();
    var linkdin = $("#linkdin").val();
    var orgEmail = $("#orgEmail").val();
    var website = $("#Website").val();
    $.post("../../orgsubmit.php", {arg: arg1}, function (result) {
        var json = $.parseJSON(result);
        var orgId = json[0].Id;
        $.post("../../orgsubmit.php", {arg: arg, orgId: orgId, name: name, phone: phone, mobile: mobile, address: address, facebook: facebook, twitter: twitter, linkdin: linkdin, orgEmail: orgEmail, Website: website}, function (result) {
            readDataOrganization();
        });
    });
    return false;
}


function removeUserNewsletter($IdNews) {
    var arg = 'removeUserNewsletter';
    var dataString = 'arg=' + arg + '&idNews=' + $IdNews;
    alert(dataString);
    $.ajax({
        type: 'POST',
        url: "../orgsubmit.php",
        data: dataString,
        cache: false,
        sucess: function (result) {
            alert(result);
        }
    });
    return false;

}

function deleteConfirmation() {
    var txt;
    var r = confirm("Are you sure?");
    if (r == true) {
        return true;
    } else {
        return false;
    }

}

function removeOrganization() {
    //remove organização selecionada pelo o boss
    var orgId = $("#org").val();
    var resp = deleteConfirmation();
    if (resp == true) {
        var arg = 'removeOrganization';
        $.post("../orgsubmit.php", {arg: arg, id: orgId}, function (result) {
            var json = $.parseJSON(result);
            alert(result);
        });
        return false;
    }
}
function cleanInformation() {
    //document.getElementById('Org-Id').value = 0;
    document.getElementById('name').value = "";
    document.getElementById('phone').value = "";
    document.getElementById('mobile').value = "";
    document.getElementById('address').value = "";
    document.getElementById('facebook').value = "";
    document.getElementById('twitter').value = "";
    document.getElementById('linkdin').value = "";
    document.getElementById('orgEmail').value = "";
    document.getElementById('website').value = "";
    document.getElementById('addOrg').style = "display: true";
    document.getElementById('update').style = "display: none";
    document.getElementById('delete').style = "display: none";
//    document.getElementById('delete').style = "display: none";
}



//validar organização por parte do admin
function validateOrganization() {
    var arg = 'validateOrganization';
    var orgId = $("#Id").val();
    //falta enviar user id para verificar se é admin para poder validar
    var dataString = 'arg=' + arg + '&org=' + orgId;
    alert(dataString);
    $.ajax({
        type: 'POST',
        url: "orgsubmit.php",
        data: dataString,
        cache: false,
        sucess: function (result) {
            alert(result);
        }
    });
    viewAllOrganization();
    return false;
}

//atribuir chefe
function assignOrganizationCategoryOwner() {
    var arg = 'assignOrganizationCategoryOwner';
    var orgId = $("#organizationId3").val();
    var userId = $("#userOwner").val();
    var dataString = 'arg=' + arg + '&orgId=' + orgId + '&userId=' + userId;
    alert(dataString);
    $.ajax({
        type: 'POST',
        url: "orgsubmit.php",
        data: dataString,
        cache: false,
        success: function (result) {
            alert(result);
        }
    });
    return false;

}
//atribuir subchefe
function assignOrganizationSubCategoryOwner() {
    var arg = 'assignOrganizationSubCategoryOwner';
    var orgId = $("#organizationId4").val();
    var userId = $("#userOwner1").val();
    var dataString = 'arg=' + arg + '&orgId=' + orgId + '&userId=' + userId;
    alert(dataString);
    $.ajax({
        type: 'POST',
        url: "orgsubmit.php",
        data: dataString,
        cache: false,
        success: function (result) {
            alert(result);
        }
    });
    return false;


}
//remover chefe
function removeOrganizationCategoryOwner() {
    var arg = 'removeOrganizationCategoryOwner';
    var orgId = $("#roco").val();
    var userId = $("#userOwnerCat").val();
    var dataString = 'arg=' + arg + '&orgId=' + orgId + '&userId=' + userId;
    alert(dataString);
    $.ajax({
        type: 'POST',
        url: "orgsubmit.php",
        data: dataString,
        cache: false,
        success: function (result) {
            alert(result);
        }
    });
    return false;

}



//remover subchefe da organização
function removeOrganizationSubCategoryOwner() {
    var arg = 'removeOrganizationSubCategoryOwner';
    var orgId = $("#rosco").val();
    var userId = $("#userOwnerSubCat").val();
    var dataString = 'arg=' + arg + '&orgId=' + orgId + '&userId=' + userId;
    alert(dataString);
    $.ajax({
        type: 'POST',
        url: "orgsubmit.php",
        data: dataString,
        cache: false,
        success: function (result) {
            alert(result);
        }
    });
    return false;


}
//editar permissoes de um utilizador em um serviço
function editPermissionUserInOrganization() {

}

function viewAllOrganization(id) {
    //var msg = deleteConfirmation();
    var arg = 'viewAllOrganization';
    var dataString = 'arg=' + arg + '&idUser=' + id;
    $.ajax({
        type: 'POST',
        url: "../orgsubmit.php",
        data: dataString,
        cache: false,
        success: function (result) {
            alert(result);
            var ajaxDisplay = document.getElementById('orgresp');
            ajaxDisplay.innerHTML = result;
        }
    });

    return false;
}
