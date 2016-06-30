function addOrganization(){
    alert('AddOrg');
    var name = $("#name").val();
    var phone = $("#phone").val();
    var mobile = $("#mobile").val();
    var logotype = $("#logotype").val();
    var address = $("#Address").val();
    var facebook= $("#facebook").val();
    var twitter = $("#twitter").val();
    var linkdin = $("#linkdin").val();
    var orgEmail = $("#email").val();
    var website = $("#website").val();
    var arg = 'addOrganization';
    var dataString = 'name'+name+'&phone'+phone+'&moble'+mobile+'&logtype'+logotype+'&addres'+address+'&facebook'+facebook+'&twitter'+twitter+'&linkdin'+linkdin+'&orgEmail'+orgEmail+'&website'+'arg'+arg;
    if(name===''||phone===''||mobile===''||logotype===''||address===''||orgEmail=''){
        alert('Please fill All Fields');
    }else
    {
        $.ajax({
            type:"POST",
            url:"orgsubmit.php",
            data:dataString,
            cache:false,sucess:function(result){
                alert(result);
            }
        });
    }
}

function removeOrganization(){
    
}

function editOrganizationInformation(){
    
}

function validateOrganization(){
    
}

function assignUserInOrganization(){
    
}

function removeUserInOrganization(){
    
}

function UserValidateInvite(){
    
}

function assignOrganizationCategoryOwner(){
    
}

function assignOrganizationSubCategoryOwner(){
    
}
function removeOrganizationCategoryOwner(){
    
}

function removeOrganizationSubCategoryOwner(){
    
}

function editPermissionUserInOrganization(){
    
}

