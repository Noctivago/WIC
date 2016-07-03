function addRole() {
    var role = $("#role").val();
    var arg = 'addRole';
    var dataString = 'role=' + role + '&arg=' + arg;
    alert(dataString);
    if (role === '') {
        alert('Please filld the fields!');
    } else
    {
        $.ajax({
            type: "POST",
            //../forms/RolePermissionSubmit.php
            url: "../forms/RolePermissionSubmit.php",
            data: dataString,
            cache: false,
            sucess: function (result) {
                //var ajaxDisplay = document.getElementById('loadRole');
                //ajaxDisplay.innerHTML = result;
                alert(result);
            }
        });
        readRole();
        return false;
    }
}

function addPermission() {

}

function readRole() {
    var arg = 'readAllRole';
    var dataString = 'arg=' + arg;
    $.ajax({
        type: "POST",
        url: "../forms/RolePermissionSubmit.php",
        data: dataString,
        cache: false,
        sucess: function (result) {
            var ajaxDisplay = document.getElementById('loadRole');
            ajaxDisplay.innerHTML = result;
            alert(result);
        }
    });
    viewAllOrganization();
    return false;

}

function readPermission() {

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