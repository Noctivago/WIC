function addUser() {
    alert('AddUser');
    var username = $("#username").val();
    var password = $("#password").val();
    var email = $("#email").val();

    // Returns successful data submission message when the entered information is stored in database.
    var dataString = 'username=' + username + '&password=' + password + '&email=' + email;
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
    return false;
}