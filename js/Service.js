function addToWic(b) {
    //alert('add2Wic');
    //DB_addServiceToWicPlanner($pdo, $wicPlannerId, $orgServId)
    var wic = document.getElementById("wicPlannerSelect").value;
    var org = b;
    var arg = 'add2Wic';
    var dataString = 'wicPlannerId=' + wic + '&orgServId=' + org + '&arg=' + arg;
    //alert(dataString);
    if (wic === '' || b === '')
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

//TO DO
function addCommentToService(a, b, c, d) {
    //alert('add2Wic');
    ////DB_addCommentOnService($pdo, $userId, $comment, $orgServId, $d)
    var user = a;
    var comment = b;
    var org = c;
    var date = d;
    var arg = 'addComment';
    var dataString = 'userId=' + a + '&comment=' + b + '&org=' + c + '&date=' + d + '&arg=' + arg;
    alert(dataString);
    if (a === '' || b === '' || c === '' || d === '')
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