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

function loginUser(){
    alert('login');
    var user = $("#user").val();
    var pass = $("#pass").val();
    var arg = 'loginUser';

    var dataString = 'user=' + user + '&pass=' + pass + '&arg=' + arg;
    if (username === '' || password === '')
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
}

