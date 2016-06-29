function addUser() {
    alert('AddUser');
    var username = $("#username").val();
    var password = $("#password").val();
    var email = $("#email").val();
    var arg = 'addUser';
    //podemos passar um argumento que define a funcao a executar
    //no ficheiro ajaxsubmit
    //desta forma conforme o arg executa uma determinada func

    // Returns successful data submission message when the entered information is stored in database.
    var dataString = 'username=' + username + '&password=' + password + '&email=' + email + '&arg=' + arg;
    if (username === '' || password === '' || email === '')
    {
        alert("Please Fill All Fields");
    } else
    {
        //AJAX code to submit form.
        $.ajax({
            type: "POST",
            url: "ajaxsubmit.php",
            data: dataString,
            cache: false,
            success: function (result) {
                alert(result);
            }

        });
    }
    readAllUsers();
    return false;
}
function news() {
    var email = $("#email").val();
    //validateForm(email);
    if (validateForm(email)) {
        var arg = 'addNews';
        alert('AddUserNewsletter');
        //podemos passar um argumento que define a funcao a executar
        //no ficheiro ajaxsubmit
        //desta forma conforme o arg executa uma determinada func

        // Returns successful data submission message when the entered information is stored in database.
        var dataString = 'email=' + email + '&arg=' + arg;
        if (email === '')
        {
            alert("Please Fill All Fields");
        } else
        {
            //AJAX code to submit form.
            $.ajax({
                type: "POST",
                url: "ajaxsubmit.php",
                data: dataString,
                cache: false,
                success: function (result) {
                    alert(result);
                }

            });
        }
        return false;

    } else {

    }

}
function readAllUsers() {
    alert('readAllUsers');
    var arg = 'readAllUsers';
    var dataString = 'arg=' + arg;
    $.ajax({
        type: "POST",
        url: "ajaxsubmit.php",
        data: dataString,
        cache: false,
        success: function (result) {
            var ajaxDisplay = document.getElementById('ajaxDiv');
            ajaxDisplay.innerHTML = result;
            //alert(result);
        }
    });

    return false;
}

function deleteUser() {
    alert('deleteUser');
    //var username = $("#username").val();
    //var password = $("#password").val();
    //var email = $("#email").val();
    var arg = 'deleteUser';
    //podemos passar um argumento que define a funcao a executar
    //no ficheiro ajaxsubmit
    //desta forma conforme o arg executa uma determinada func

    // Returns successful data submission message when the entered information is stored in database.
    var dataString = 'arg=' + arg;
    //AJAX code to submit form.
    $.ajax({
        type: "POST",
        url: "ajaxsubmit.php",
        data: dataString,
        cache: false,
        success: function (result) {
            alert(result);
        }

    });
    readAllUsers();
    return false;
}

function loginUser() {
    alert('login');
    var user = $("#user").val();
    var pass = $("#pass").val();
    var arg = 'loginUser';
    var dataString = 'user=' + user + '&pass=' + pass + '&arg=' + arg;
    if (user === '' || pass === '')
    {
        alert("Please Fill All Fields");
    } else
    {
        //AJAX code to submit form.
        $.ajax({
            type: "POST",
            url: "ajaxsubmit.php",
            data: dataString,
            cache: false,
            success: function (result) {
                alert(result);
                var ajaxDisplay = document.getElementById('login-response');
                ajaxDisplay.innerHTML = result;
            }

        });
    }
    return false;
}

function validateForm(value) {
    var atpos = value.indexOf("@");
    var dotpos = value.lastIndexOf(".");
    if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= value.length) {
        alert("Not a valid e-mail address");
        return false;
    } else {
        alert("Valid e-mail address");
    }
}
