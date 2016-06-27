function f_1000() {
    var f_1000_username = document.getElementById("username").value;
    var f_1000_password = document.getElementById("password").value;
    var f_1000_email = document.getElementById("email").value;
    alert(f_1000_username);
    var xhr;
    if (window.XMLHttpRequest) { // Mozilla, Safari, ...  
        xhr = new XMLHttpRequest();
    } else if (window.ActiveXObject) { // IE 8 and older  
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    var d_user = "username=" + f_1000_username;
    var d_pass = "password=" + f_1000_password;
    var d_mail = "email=" + f_1000_email;
    xhr.open("POST", "../func/f_1000.php", true);
    alert('FILE');
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //xhr.send(data);
    xhr.send(d_user, d_pass, d_mail);
    xhr.onreadystatechange = display_data;
    function display_data() {
        if (xhr.readyState === 4) {
            alert('xhr.readyState === 4');
            if (xhr.status === 200) {
                alert(xhr.responseText);
                //document.getElementById("suggestion").innerHTML = xhr.responseText;
                var ajaxDisplay = document.getElementById('ajaxDiv');
                ajaxDisplay.innerHTML =  xhr.responseText;
            } else {
                alert('There was a problem with the request.');
            }
        }
    }
}