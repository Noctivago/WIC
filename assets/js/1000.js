/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function createUser() {
    alert('createUser');
    var f_1000_username = document.getElementById("username").value;
    var f_1000_password = document.getElementById("password").value;
    var f_1000_email = document.getElementById("email").value;
    var xhr;
    if (window.XMLHttpRequest) { // Mozilla, Safari, ...  
        xhr = new XMLHttpRequest();
    } else if (window.ActiveXObject) { // IE 8 and older  
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhr.open("POST", "../controller/1000.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    var the_data = ''
            + 'op=' + 'new'
            + '&username=' + window.encodeURIComponent(f_1000_username)
            + '&password=' + window.encodeURIComponent(f_1000_password)
            + '&email=' + window.encodeURIComponent(f_1000_email);
    xhr.send(the_data);
    alert(the_data);
    xhr.onreadystatechange = display_data;
    function display_data() {
        if (xhr.readyState === 4) {
            alert('createUser->readyState === 4');
            if (xhr.status === 200) {
                 alert('createUser->readyState === 200');
                var ajaxDisplay = document.getElementById('show');
                ajaxDisplay.innerHTML = xhr.responseText;
            } else {
                alert('There was a problem with the request.');
            }
        }
    }
}

function readUser() {
    $.ajax({
        type: "POST",
        url: "test2.php",
        data: {"ac": "test", "pp": "YHOOOOOOOO"}
    }).done(function (data) {
        $("#show").html(data);
    });
}

function updateUser() {
    $.ajax({
        type: "POST",
        url: "test2.php",
        data: {"ac": "test", "pp": "YHOOOOOOOO"}
    }).done(function (data) {
        $("#show").html(data);
    });
}

function deleteUser() {
    $.ajax({
        type: "POST",
        url: "test2.php",
        data: {"ac": "test", "pp": "YHOOOOOOOO"}
    }).done(function (data) {
        $("#show").html(data);
    });
}

function actionTest() {
    alert('');
    var ajaxDisplay = document.getElementById('show');
    ajaxDisplay.innerHTML = "Hello!";
    alert('');
}

