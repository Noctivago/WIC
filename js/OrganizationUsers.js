//atribuir utilizador para a organização
function assignUserInOrganization() {
    var email = $("#email-user").val();
    var orgId = $("#org").val();
    var arg = 'assignUserInOrganization';
    var dataString = 'arg=' + arg + '&email=' + email + '&orgId=' + orgId;
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


//remover utilizador da organização
function removeUserInOrganization() {
    var userId = $("#userIdOrg").val();
    var orgId = $("#orgId3").val();
    var arg = 'removeUserInOrganization';
    var dataString = 'arg=' + arg + '&userId=' + userId + '&orgId=' + orgId;
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
    var orgId = $("#org2 #org").val();
    var arg = 'viewAllUsersInOrganization';
    var dataString = 'arg=' + arg + '&orgId=' + orgId;
    alert(dataString);
    $.ajax({
        type: 'POST',
        url: "../orgsubmit.php",
        data: dataString,
        cache: false,
        success: function (result) {
            var ajaxDisplay = document.getElementById('table-users-in-organization');
            ajaxDisplay.innerHTML = result;
        }
    });
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
        url: "../orgsubmit.php",
        data: dataString,
        cache: false,
        success: function (result) {
            alert(result);
        }
    });
    return false;

}