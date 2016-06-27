function f_1000() {
    var f_1000_username = document.getElementById("username").value;
    var f_1000_password = document.getElementById("password").value;
    var f_1000_email = document.getElementById("email").value;
    //alert(f_1000_username);
    var xhr;
    if (window.XMLHttpRequest) { // Mozilla, Safari, ...  
        xhr = new XMLHttpRequest();
    } else if (window.ActiveXObject) { // IE 8 and older  
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhr.open("POST", "../func/f_1000.php", true);
    //alert('FILE');
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    //xhr.send(data);
    var the_data = ''
            + 'username=' + window.encodeURIComponent(f_1000_username)
            + '&password=' + window.encodeURIComponent(f_1000_password)
            + '&email=' + window.encodeURIComponent(f_1000_email);
// 
    xhr.send(the_data);
    xhr.onreadystatechange = display_data;
    function display_data() {
        if (xhr.readyState === 4) {
            //alert('xhr.readyState === 4');
            if (xhr.status === 200) {
                //alert(xhr.responseText);
                //document.getElementById("suggestion").innerHTML = xhr.responseText;
                var ajaxDisplay = document.getElementById('ajaxDiv');
                ajaxDisplay.innerHTML = xhr.responseText;
            } else {
                alert('There was a problem with the request.');
            }
        }
    }
}