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

function removeOrganization() {
        //remove organização selecionada pelo o boss
        var arg = 'removeOrganization';
        var org = $("#orgId").val();
        var dataString = 'arg=' + arg + '&org='+org;
        alert(dataString);
        $.ajax({
            type:"POST",
            url:"orgsubmit.php",
            data:dataString,
            cache:false,
            success: function(result){
                alert(result);
            }
        });
        viewAllOrganization();
        return false;
        
}
//edidar a informação da organização
function editOrganizationInformation() {


}
//validar organização por parte do admin
function validateOrganization() {

}
//atribuir utilizador para a organização
function assignUserInOrganization() {

}
//remover utilizador da organização
function removeUserInOrganization() {

}
//aceitar convite para ingressar na organizaçao
function UserValidateInvite() {

}
//atribuir chefe
function assignOrganizationCategoryOwner() {

}
//atribuir subchefe
function assignOrganizationSubCategoryOwner() {

}
//remover chefe
function removeOrganizationCategoryOwner() {

}
//remover subchefe da organização
function removeOrganizationSubCategoryOwner() {

}
//editar permissoes de um utilizador em um serviço
function editPermissionUserInOrganization() {

}

function viewAllOrganization() {
    alert('viewAllOrganization');
    var arg = 'viewAllOrganization';
    var dataString = 'arg=' + arg;
    $.ajax({
        type: "POST",
        url: "orgsubmit.php",
        data: dataString,
        cache: false,
        success: function (result) {
            var ajaxDisplay = document.getElementById('orgresp');
            ajaxDisplay.innerHTML = result;
        }
    });

    return false;
}
