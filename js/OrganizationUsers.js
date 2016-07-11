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
    var dataString = 'arg=' + arg + '&orgId=' + org;
    alert(dataString);
    $.ajax({
        type: 'POST',
        url: "../orgsubmit.php",
        data: dataString,
        cache: false,
        success: function (result) {
            alert(result + 'oi');
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