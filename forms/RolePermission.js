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
            url: "RolePermissionSubmit.php",
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
    var permission = $("#permission").val();
    var permissionOrg = $("#Org").val();
    if (permissionOrg === 'OP')
    {
        //alert("TRUE");
        permissionOrg = 1;
    } else {
        //alert("FALSE");
        permissionOrg = 0;
    }
    var arg = 'addPermission';
    var dataString = 'permission=' + permission + '&permissionOrg=' + permissionOrg + '&arg=' + arg;
    alert(dataString);
    if (permission === '') {
        alert('Please filld the fields!');
    } else
    {
        $.ajax({
            type: "POST",
            //../forms/RolePermissionSubmit.php
            url: "RolePermissionSubmit.php",
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

function readRole() {
    var arg = 'readAllRole';
    var dataString = 'arg=' + arg;
    alert('readAllRole');
    $.ajax({
        type: "POST",
        url: "RolePermissionSubmit.php",
        data: dataString,
        cache: false,
        sucess: function (result) {
            alert(result);
            var ajaxDisplay = document.getElementById('loadRole');
            ajaxDisplay.innerHTML = result;
        }
    });
    return false;

}

function readPermission() {
    alert('readPermission');
    var arg = 'readAllPermission';
    var dataString = 'arg=' + arg;
    $.ajax({
        type: "POST",
        url: "RolePermissionSubmit.php",
        data: dataString,
        cache: false,
        success: function (result) {
            var ajaxDisplay = document.getElementById('loadPermission');
            ajaxDisplay.innerHTML = result;
            //alert(result);
        }
    });

    return false;
}

function readRolePermission() {
    readPermission();
    readRole();
}