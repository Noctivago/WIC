<?php

include_once './db/conn.inc.php';

$arg = (filter_var($_POST['arg'], FILTER_SANITIZE_STRING));

if ($arg === 'addOrganization') {
    try {
        $userid = (filter_var($_POST['userid']));
        $name = (filter_var($_POST['name'], FILTER_SANITIZE_STRING));
        $phone = (filter_var($_POST['phone'], FILTER_SANITIZE_STRING));
        $mobile = (filter_var($_POST['mobile'], FILTER_SANITIZE_STRING));
        //     $logotype = (filter_var($_POST['logotype'],FILTER_SANITIZE_STRING));
        $address = (filter_var($_POST['addres'], FILTER_SANITIZE_STRING));
        $facebook = (filter_var($_POST['facebook'], FILTER_SANITIZE_STRING));
        $twitter = (filter_var($_POST['twitter'], FILTER_SANITIZE_STRING));
        $linkdin = (filter_var($_POST['linkdin'], FILTER_SANITIZE_STRING));
        $orgEmail = (filter_var($_POST['orgEmail'], FILTER_SANITIZE_STRING));
        $website = (filter_var($_POST['website'], FILTER_SANITIZE_STRING));

  /**      sql($pdo, "INSERT INTO [dbo].[Organization]
           ([Name]
           ,[Phone_Number]
           ,[Mobile_Number]
           ,[Validate]
           ,[Address]
           ,[Enabled]
           ,[User_Boss]
           ,[Facebook]
           ,[Twitter]
           ,[Linkdin]
           ,[Abusive_Organization]
           ,[Good_Organization]
           ,[Organization_Email]
           ,[Website]) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?)", array($name, $phone, $mobile, 0, $address, 1, $userid, $facebook, $twitter, $linkdin, 0, 0, $orgEmail, $website));
**/

        sql($pdo, "INSERT INTO [dbo].[Organization]([Name],[Phone_Number],[Website]) VALUES(?,?,?)", array($name, $phone, $website));
        echo 'Organization added!';
    } catch (Exception $ex) {
        echo 'ERRO';
    }
} else if ($arg === 'removeOrganization') {
    
} else if ($arg === 'editOrganizationInformation') {
    
} else if ($arg === 'validateOrganization') {
    
} else if ($arg === 'assignUserInOrganization') {
    
} else if ($arg === 'removeUserInOrganization') {
    
} else if ($arg === 'UserValidateInvite') {
    
} else if ($arg === 'assignOrganizationCategoryOwner') {
    
} else if ($arg === 'assignOrganizationSubCategoryOwner') {
    
} else if ($arg === 'removeOrganizationCategoryOwner') {
    
} else if ($arg === 'removeOrganizationSubCategoryOwner') {
    
} else if ($arg === 'editPermissionUserInOrganization') {
    
} else if ($arg === 'viewAllOrganizations') {
    
} else if ($arg === 'viewAllUsersInOrganization') {
    
}  else {
    echo 'lol';    
}