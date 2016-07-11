function addToWic(a, b) {
    alert('add2Wic');
    //DB_addServiceToWicPlanner($pdo, $wicPlannerId, $orgServId)
    var wic = a;
    var org = b;
    var arg = 'add2Wic';
    var dataString = 'wicPlannerId=' + username + '&orgServId=' + password + '&arg=' + arg;
    if (a === '' || b === '')
    {
        alert("Please Fill All Fields");
    } else
    {
        //AJAX code to submit form.
        $.ajax({
            type: "POST",
            url: "../forms/serviceFunc.php",
            data: dataString,
            cache: false,
            success: function (result) {
                alert(result);
            }

        });
    }
    return false;
}