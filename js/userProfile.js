function updateUserProfile() {
    alert('updateUserProfile');
    var firstName = $("#firstname").val();
    var lastName = $("#lastname").val();
    var picture = $("#picture").val();
    var picturePath = $("#picturepath").val();
    var userId = $("#userId").val();
    var cityId = $("#cityId").val();
    var languageId = $("#languageId").val();
    var arg = 'updateUserProfile';
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
            //2CHECK
            url: "userProfile.php",
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

function updateUserProfile() {

}