<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Vertical Layout with Navigation</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link href='http://fonts.googleapis.com/css?family=Lato:300,700' rel='stylesheet' type='text/css'>

<meta name="viewport" content="width=device-width">
    
    <link href="../assets/css_sidebar/normalize.css" rel="stylesheet" type="text/css"/>

        <link href="../assets/css_sidebar/style.css" rel="stylesheet" type="text/css"/>

    
    
    
  </head>

  <body>

    <nav class="nav">
  <div class="burger">
    <div class="burger__patty"></div>
  </div>

  <ul class="nav__list">
    <li class="nav__item">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
        // Tooltip only Text
        $('.masterTooltip').hover(function(){
                // Hover over code
                var title = $(this).attr('title');
                $(this).data('tipText', title).removeAttr('title');
                $('<p class="tooltip"></p>')
                .text(title)
                .appendTo('body')
                .fadeIn('slow');
        }, function() {
                // Hover out code
                $(this).attr('title', $(this).data('tipText'));
                $('.tooltip').remove();
        }).mousemove(function(e) {
                var mousex = e.pageX + 20; //Get X coordinates
                var mousey = e.pageY + 10; //Get Y coordinates
                $('.tooltip')
                .css({ top: mousey, left: mousex })
        });
});
</script>
      <a href="login.php" class="nav__link c-blue"class="masterTooltip"><i class="fa fa-camera-retro"></i></a>
    </li>
    <li class="nav__item">
      <a href="#2" class="nav__link c-yellow scrolly"><i class="fa fa-bolt"></i></a>
    </li>
    <li class="nav__item">
      <a href="#3" class="nav__link c-red"><i class="fa fa-music"></i></a>
    </li>
    <li class="nav__item">
      <a href="#4" class="nav__link c-green"><i class="fa fa-paper-plane"></i></a>
    </li>
  </ul>
</nav>


<a href="http://ettrics.com/code/vertical-layout-navigation/" class="logo" target="_blank">
 <img class="logo" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/45226/ettrics-logo.svg" alt="" /> 
</a>
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        
        <script src="../assets/js_sidebar/index.js" type="text/javascript"></script>

    
    
    
  </body>
</html>
