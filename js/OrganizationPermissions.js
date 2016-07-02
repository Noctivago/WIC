function addOrganizationService() {
    var userid = $("#userid").val();
    var name = $("#name").val();
    var phone = $("#phone").val();
    var mobile = $("#mobile").val();
    //  var logotype = $("#logotype").val();
    var address = $("#Address").val();
    var facebook = $("#facebook").val();
    var twitter = $("#twitter").val();
    var linkdin = $("#linkdin").val();
    var orgEmail = $("#email").val();
    var website = $("#website").val();
    var arg = 'addOrganization';
    var dataString = 'userid=' + userid + '&name=' + name + '&phone=' + phone + '&mobile=' + mobile + '&address=' + address + '&facebook=' + facebook + '&twitter=' + twitter + '&linkdin=' + linkdin + '&orgEmail=' + orgEmail + '&website=' + website + '&arg=' + arg;
    alert(dataString);
    if (name === '' || mobile === '' || address === '' || orgEmail === '') {
        alert('Please filld the fields required <br/>Name<br/>mobile<br/>Adress<br/>Organization Email');
    } else
    {
        $.ajax({
            type: "POST",
            url: "orgsubmit.php",
            data: dataString,
            cache: false,
            sucess: function (result) {
                var ajaxDisplay = document.getElementById('result');
                ajaxDisplay.innerHTML = result;
                alert(result);
            }
        });
        viewAllOrganization();
        return false;
    }
}
