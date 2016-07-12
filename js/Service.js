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

function addToConversation(a, c) {
    alert('addToConversation');
    var arg = 'addToConversation';
    var user = a;
    var org = c;
    var dataString = 'userId=' + user + '&org=' + org + '&arg=' + arg;
    alert(dataString);
    if (a === '' || c === '')
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
            },
            error: function (status, err) {
                console.log('Something went wrong', status, err);
            }

        });
    }
    return false;
}