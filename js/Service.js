function addToWic(b) {
    //alert('add2Wic');
    //DB_addServiceToWicPlanner($pdo, $wicPlannerId, $orgServId)
    var wic = document.getElementById("wicPlannerSelect").value;
    var org = b;
    var arg = 'add2Wic';
    var dataString = 'wicPlannerId=' + wic + '&orgServId=' + org + '&arg=' + arg;
    alert(dataString);
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

function addCommentToService(a, b) {
    //alert('add2Wic');
    ////DB_addCommentOnService($pdo, $userId, $comment, $orgServId, $d)
    var wic = a;
    var org = b;
    var arg = 'add2Wic';
    var dataString = 'wicPlannerId=' + a + '&orgServId=' + b + '&arg=' + arg;
    alert(dataString);
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