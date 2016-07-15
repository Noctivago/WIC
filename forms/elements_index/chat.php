
<main class="cd-main-content">
    <div class="content-wrapper" style="padding-left: 0%">
        <!--         <div class="top-content">
                    <div class="col-lg-12">
                        <h1 class="page-header" style=" padding-bottom: 30px; padding-top: 20px;">  Inbox </h1> <h4 style="color: darkgray"> <?php echo $msg; ?></h4>
        
                    </div>
                </div>-->
        <div class="top-content" style="height: 480px">
            <link href="../../assets/assests_sidebar/css/chat.css" rel="stylesheet">
            <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
            <!--<link href="../../assets/assests_sidebar/css/style_inside.css" rel="stylesheet" type="text/css"/>-->
            <!--    <div class="inner-bg" style="padding-top: 0px">-->

            <div class="container">
                <div class="row" style="
                     margin-top: 0px;
                     width: 800px;
                     height: 68px;
                     ">
                    <div class="col-lg-3">
                        <div class="btn-panel btn-panel-conversation">
                            <!--<a href="" class="btn  col-lg-6 send-message-btn " role="button"><i class="fa fa-search"></i> Search</a>-->
                            <!--<a href="" class="btn  col-lg-6  send-message-btn pull-right" role="button"><i class="fa fa-plus"></i> New Message</a>-->
                        </div>
                    </div>

                    <div class="col-lg-offset-1 col-lg-7">
                        <div class="btn-panel btn-panel-msg">

                <!--<a href="" class="btn  col-lg-3  send-message-btn pull-right" role="button"><i class="fa fa-gears"></i> Settings</a>-->
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!--HERE-->
                    <div class="conversation-wrap col-lg-3">
                        <!--GET ALL USERS IN CONVERSATION WITH THE USER-->
                        <!--document.getElementById("COVERSATIONID").value = "My value";-->

                        <?= DB_getMyConversations($pdo, $_SESSION['id']); ?>

                    </div>

                    <!--Caixa de escrever mensagens-->

                    <!--SET ENABLED = FALSE; ON USER CLICK ENABLED AND GET MESSAGES FROM
                                        THAT CONVERSATION-->
                    <script type="text/javascript">
                        function myFunction() {
                            x = document.getElementById("COVERSATIONID").value;
                            document.getElementById(x).style.backgroundColor = "lightblue";
                            alert(x);
                        }
                        function setConvId(ConvID) {
                            document.getElementById("COVERSATIONID").value = ConvID;
                            //x = document.getElementById("COVERSATIONID").value;
                            document.getElementById(ConvID).style.backgroundColor = "lightblue";
                            alert(x);
                            //alert(ConvID);
                        }
                        function setUserId(ConvID) {
                            document.getElementById("USERID").value = ConvID;
                            //alert(ConvID);
                            //window.boot_chat = function(){return false;};
                            boot_chat();
                        }
                    </script>

                    <!--<a href="javascript:myFunction('You clicked!')">My link</a>-->

                    <div class="message-wrap col-lg-8">
                        <!--MAKE INVISABLE -> TURN VISIBLE ON MESSAGES RECEIVED-->
                        <div class="msg-wrap msg-wgt-body">
                            <!--GET THE MESSAGES OF A SPECIFIC CONVERSATION-->
                            <!--WORKING ON AJAX CALL-->

                        </div>

                        <div class="send-wrap ">
                            <textarea class="form-control send-message" id = "chatMsg" rows="3" placeholder="Write a reply... Press ENTER to submit..."></textarea>
                        </div>
                        <div class="btn-panel">
                            <!--<a href="" class=" col-lg-3 btn   send-message-btn " role="button"><i class="fa fa-cloud-upload"></i> Add Files</a>-->
                            <a href="javascript:myFunction(this.id)" class=" col-lg-4 text-right btn   send-message-btn pull-right" role="button"><i class="fa fa-plus"></i> Send Message</a>
                        </div>

                    </div>
                    <!--IDS NECESSARIOS-->
                    <input type="text" id ="COVERSATIONID" onchange="myFunction()" name="COVERSATIONID" style="visibility: hidden;"><br>
                    <input type="text" id ="USERID" name="USERID" style="visibility: hidden;"><br>
                    <input type="text" id ="CHATID" value="0" name="CHATID" style="visibility: hidden;"><br>

                    <!--Caixa de escrever mensagens-->
                </div>
            </div>
        </div>
    </div>
</main>

<script src="../../assets/assests_sidebar/css/css_main/assets/js/jquery-1.11.1.min.js" type="text/javascript"></script>
<script src="../../assets/assests_sidebar/css/css_main/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../../assets/assests_sidebar/css/css_main/assets/js/jquery.backstretch.js" type="text/javascript"></script>
<script src="../../assets/assests_sidebar/css/css_main/assets/js/scripts.js" type="text/javascript"></script>
<script src="../../js/chat.js" type="text/javascript"></script>



