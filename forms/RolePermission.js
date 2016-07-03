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
    var permissionOrg = 0;
    if (document.getElementById("Org").checked = true)
    {
        permissionOrg = 1;
    }
    var arg = 'addPermission';
    var dataString = 'permission=' + permission + '&permissionOrg=' + permissionOrg + '&arg=' + arg;
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
            var ajaxDisplay = document.getElementById('loadRole');
            ajaxDisplay.innerHTML = result;
            alert(result);
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
        sucess: function (result) {
            var ajaxDisplay = document.getElementById('loadPermission');
            ajaxDisplay.innerHTML = result;
            alert(result);
        }
    });
    return false;

}