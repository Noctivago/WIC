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
    var orgId = $("#org").val();
    alert(orgId);
    var arg = 'viewAllOrganization';
    $.post("../orgsubmit.php", {arg: arg, id: orgId}, function (result) {
        var json = $.parseJSON(result);
        if (json.length === 0) {
            cleanInformation();
        } else {
            console.log(json[0].Name);
            document.getElementById('name').value = json[0].Name;
            document.getElementById('phone').value = json[0].Phone_Number;
            document.getElementById('mobile').value = json[0].Mobile_Number;
            document.getElementById('address').value = json[0].Address;
            document.getElementById('facebook').value = json[0].Facebook;
            document.getElementById('twitter').value = json[0].Twitter;
            document.getElementById('linkdin').value = json[0].Linkdin;
            document.getElementById('orgEmail').value = json[0].Organization_Email;
            document.getElementById('website').value = json[0].Website;
            document.getElementById('addOrg').style = "display: none";
            document.getElementById('update').style = "display: true";
            document.getElementById('delete').style = "display: true";
        //    document.getElementById('cancel').style = "display: true";
        }
    });
    return false;
}

function addOrganization() {
var userid = $("#userid").val();
    var name = $("#name").val();
    var phone = $("#phone").val();
    var mobile = $("#mobile").val();
    //  var logotype = $("#logotype").val();
    var address = $("#Address").val();
    var facebook = $("#facebook").val();
    var twitter = $("#twitter").val();
    var linkdin = $("#linkdin").val();
    var orgEmail = $("#email").val();
    var website = $("#website").val();
    var arg = 'addOrganization';
    var dataString = 'userid=' + userid + '&name=' + name + '&phone=' + phone + '&mobile=' + mobile + '&address=' + address + '&facebook=' + facebook + '&twitter=' + twitter + '&linkdin=' + linkdin + '&orgEmail=' + orgEmail + '&website=' + website + '&arg=' + arg;
    alert(dataString);
    if (name === '' || mobile === '' || address === '' || orgEmail === '') {
        alert('Please filld the fields required <br/>Name<br/>mobile<br/>Adress<br/>Organization Email');
    } else
    {
        $.ajax({
            type: "POST",
            url: "orgsubmit.php",
            data: dataString,
            cache: false,
            sucess: function (result) {
                var ajaxDisplay = document.getElementById('result');
                ajaxDisplay.innerHTML = result;
                alert(result);
            }
        });

        viewAllOrganization();
        return false;
    }
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

function removeOrganization($IdOrg, $id) {
    //remove organização selecionada pelo o boss
    var resp = deleteConfirmation();
    if (resp == true) {
        var arg = 'removeOrganization';
        var dataString = 'arg=' + arg + '&org=' + $IdOrg;
        alert(dataString);
        $.ajax({
            type: 'POST',
            url: "../orgsubmit.php",
            data: dataString,
            cache: false,
            sucess: function (result) {

            }
        });
    }
    viewAllOrganization($id);
    //viewAllOrganization();
    return false;

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
