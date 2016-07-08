function readAllUserNewsletter(){
    var arg = 'readAllUserNewsletter';
    var dataString = 'arg=' + arg;
    $.ajax({
        type: 'POST',
        url: "orgsubmit.php",
        data: dataString,
        cache: false,
        sucess : function (result) {
                alert(result);
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
function removeUserNewsletter($IdNews){
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

function deleteConfirmation(){
    var txt;
    var r = confirm("Are you sure?");
    if (r == true) {
        return true;
    } else {
        return false;
}

}
function editOrganization($orgId,$idUser){
    
}
function removeOrganization($IdOrg,$id) {
    //remove organização selecionada pelo o boss
    var resp = deleteConfirmation();
    if(resp == true){
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
//edidar a informação da organização
function editOrganizationInformation(cont) {
 //   var x = document.getElementById("mytable").getElementsByTagName("td").item(cont);
 //   alert(x[0]);
 var UserId = $('#mytable #'+cont+' #UserId').text();
 var Name = $('#mytable #'+cont+' #OName').text();
 var Phone = $('#mytable #'+cont+' #OPhone').text();
 var Mobile = $('#mytable #'+cont+' #OMobile').text();
 var Address = $('#mytable #'+cont+' #OAddress').text();
 var Facebook = $('#mytable #'+cont+' #OFacebook').text();
 var Twitter = $('#mytable #'+cont+' #OTwitter').text();
 var Linkdin = $('#mytable #'+cont+' #OLinkdin').text();
 var OEmail = $('#mytable #'+cont+' #OO_Email').text();
 var Website = $('#mytable #'+cont+' #OWebsite').text();
 alert(UserId + '    ' + Name + '   '+Phone+ '   '+ Mobile+ '   '+ Address+ '   '+ Facebook+ '   '+ Twitter+ '   '+ Linkdin+ '   '+ OEmail+ '   '+ Website);
    var dataString = 'arg=' + arg; //+ '&org=' + org + '&userId='+userId;
    //alert(dataString);
    $.ajax({
        type: 'POST',
        url: "../orgsubmit.php",
        data: dataString,
        cache: false,
        sucess: function (result) {
            alert('func');
            var ajaxDisplay = document.getElementById('name');
            ajaxDisplay.innerHTML = result['Id'];
        }
    });
    return false;
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
//atribuir utilizador para a organização
function assignUserInOrganization() {
    var email = $("#emailuser").val();
    var orgId = $("#orgId2").val();
    var arg = 'assignUserInOrganization';
    var dataString = 'arg=' + arg + '&email=' + email + '&orgId=' + orgId;
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
    viewAllUsersInOrganization();
    return false;
}
//remover utilizador da organização
function removeUserInOrganization() {
    var userId = $("#userIdOrg").val();
    var orgId = $("#orgId3").val();
    var arg = 'removeUserInOrganization';
    var dataString = 'arg=' + arg + '&userId=' + userId + '&orgId=' + orgId;
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
    viewAllUsersInOrganization();
    return false;
}
function viewAllUsersInOrganization() {
    var orgId = $("#organizationId").val();
    var arg = 'viewAllUsersInOrganization';
    var dataString = 'arg=' + arg + '&orgId=' + orgId;
    alert(dataString);
    $.ajax({
        type: 'POST',
        url: "orgsubmit.php",
        data: dataString,
        cache: false,
        success: function (result) {
            var ajaxDisplay = document.getElementById('membros');
            ajaxDisplay.innerHTML = result;
        }
    });
    viewAllOrganization();
    return false;
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
        url: "orgsubmit.php",
        data: dataString,
        cache: false,
        success: function (result) {
            alert(result);
        }
    });
    return false;

}

//atribuir chefe
function assignOrganizationCategoryOwner() {
    var arg = 'assignOrganizationCategoryOwner';
    var orgId = $("#organizationId3").val();
    var userId = $("#userOwner").val();
    var dataString = 'arg=' + arg + '&orgId=' + orgId + '&userId=' + userId ;
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
    var dataString = 'arg=' + arg + '&orgId=' + orgId + '&userId=' + userId ;
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
    var dataString = 'arg=' + arg + '&orgId=' + orgId + '&userId=' + userId ;
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
    var dataString = 'arg=' + arg + '&orgId=' + orgId + '&userId=' + userId ;
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
    var dataString = 'arg=' + arg +'&idUser='+id;
    $.ajax({
        type: 'POST',
        url: "../orgsubmit.php",
        data: dataString,
        cache: false,
        success: function (result) {
             var ajaxDisplay = document.getElementById('orgresp');
                ajaxDisplay.innerHTML = result;
        }
    });

    return false;
}
