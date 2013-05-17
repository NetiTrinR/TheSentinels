<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title><?php echo $title;?> - The Sentinels</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="Michael Manning">
    <!-- Le styles -->
      <link href="/TheSentinels/assets/css/bootstrap.css" rel="stylesheet">
      <style type="text/css">
        body {
          padding-top: 60px;
          padding-bottom: 40px;
        }
      </style>
      <link href="/TheSentinels/assets/css/bootstrap-responsive.css" rel="stylesheet">
      
    <!--Le HTML5 shim, for IE6-8 support of HTML5 elements -->
      <!--[if lt IE 9]>
        <script src="/TheSentinels/assets/js/html5shiv.js"></script>
      <![endif]-->

    <!--Le Fav and touch icons -->
      <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
      <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
                      <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">
                                     <link rel="shortcut icon" href="assets/ico/favicon.png">

    <!--le functions-->
    <?php include("/TheSentinels/scripts/functions.php"); ?>
  </head>

  <body>
    <!--Le Header-->
      <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
          <div class="container">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <!--Le Logo-->
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="brand" href="index.php">The Sentinels</a>
            <div class="nav-collapse collapse">
              <ul class="nav">
                <li <?php if($current == "home") {echo "class=\"active\"";};?> ><a href="/TheSentinels/">Frontpage</a></li>
                <li <?php if($current == "forum"){echo "class=\"active\"";};?> ><a href="/TheSentinels/forum.php">Forum</a></li>
                <li <?php if($current == "cal")  {echo "class=\"active\"";};?> ><a href="#calender">Calender</a></li>
                <li <?php if($current == "about"){echo "class=\"active\"";};?> ><a href="/TheSentinels/about.php">About</a></li>
              </ul>
              <!--Le Dropdown-->
              <ul class="nav pull-right">
                <!--le Sign_in scripts-->
                <?php
                include '../TheSentinels/scripts/connect.php';
                if(isset($_SESSION['signed_in']) && $_SESSION['signed_in'] == true){
                  echo "<li";
                  if($current == "settings"){echo "class=\"active\"";};
                    echo "><a href='/TheSentinels/user/settings.php'><i></<i class='icon-cog icon-white'></a></li>
                      <li class='divider-vertical'></li>
                      <li class='dropdown'>
                        <a href='#' class='dropdown-toggle' data-toggle='dropdown'>
                        <i class='icon-user icon-white'></i>"
                        .$_SESSION['user_name'].
                        "<strong class='caret'></strong></a></li>
                      <!--Logged in Dropdown menu items here-->
                       <ul class='dropdown-menu' role='menu' aria-labelledby='dLabel'>
                       <li>Stuff 1</li>
                       <li>Stuff 2</li>
                       <li>Stuff 3</li>
                       </ul>";
                } else {
                  if($_SERVER['REQUEST_METHOD'] != 'POST'){  
                    echo "<li";
                    if($current == "apply"){echo "class='active'";};
                    echo "><a href='/TheSentinels/user/application.php'>Application</a></li>
                      <li class='divider-vertical'></li>
                      <li class='dropdown'>
                        <a href='#' class='dropdown-toggle' data-toggle='dropdown'>Sign In<strong class='caret'></strong></a></li>
                        <div class='dropdown-menu' style='Padding: 15px; Padding-0ottom: 0 px'>
                        <form action='' method='POST' accept-charset='UTF-8'>
                          <input id='user_username' style='margin-bottom: 15px;' type='text' name='user[username]' size='30' placeholder='User'/>
                          <input id='user_password' style='margin-bottom: 15px;' type='password' name='user[password]' size='30' placeholder='Password'/>
                          <input id='user_remember_me' style='float: left; margin-right: 10px;' type='checkbox' name='user[remember_me]' value='1' />
                          <label class='string optional' for='user_remember_me'> Remember me</label>
                          <input class='btn btn-primary btn-inverse' style='clear: left; width: 100%; height: 32px; font-size: 13px;' type='submit' name='commit' value='Sign In' />
                        </form>
                      </div>";
                  }else{ 
                    /* so, the form has been posted, we'll process the data in three steps:  
                        1.  Check the data  
                        2.  Let the user refill the wrong fields (if necessary)  
                        3.  Varify if the data is correct and return the correct response  
                    */  
                    $errors = array(); /* declare the array for later use */  
                      
                    if(!isset($_POST['user_username']))  
                    {  
                        $errors[] = 'The username field must not be empty.';  
                    }  
                      
                    if(!isset($_POST['user_password']))  
                    {  
                        $errors[] = 'The password field must not be empty.';  
                    }
                  }
                  /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/  
                  if(!empty($errors)){  
                    echo 'Hmm... It seems that you entered your credentials in wrong.'; 
                    echo '<ul>'; 
                    foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */ 
                      {echo '<li>' . $value . '</li>';/* this generates a nice error list */} 
                    echo '</ul>'; 
                  }else{ 
                    //the form has been posted without errors, so save it 
                    //notice the use of mysql_real_escape_string, keep everything safe! 
                    //also notice the sha1 function which hashes the password 
                    $sql = "SELECT user_id, user_name, user_level FROM users WHERE user_name = \'".mysql_real_escape_string($_POST['user[username]'])."\' AND user_pass = \'".sha1($_POST['user[password]'])."\' LIMIT 1";
                    $result = mysql_query($sql);
                    if(!$result){  
                      //something went wrong, display the error  
                      echo 'Something went \'ruh-roh\' while signing in. Please try again later.'; 
                      echo mysql_error(); //debugging purposes, uncomment when needed 
                    }else{ 
                      //the query was successfully executed, there are 2 possibilities 
                      //1. the query returned data, the user can be signed in 
                      //2. the query returned an empty result set, the credentials were wrong 
                      if(mysql_num_rows($result) == 0) { 
                        echo 'You have supplied a wrong user/password combination. Please try again.'; 
                      }else{ 
                        //set the $_SESSION['signed_in'] variable to TRUE 
                        $_SESSION['signed_in'] = true; 
                        //we also put the user_id and user_name values in the $_SESSION, so we can use it at various pages 
                        while($row = mysql_fetch_assoc($result)){ 
                            $_SESSION['user_id']    = $row['user_id']; 
                            $_SESSION['user_name']  = $row['user_name']; 
                            $_SESSION['user_level'] = $row['user_level']; 
                        } 
                          //Refresh the page with user signed in
                          echo "<script>location.reload();</script> ";
                      } 
                    } 
                  }  
                }?>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </div>
      </div>
    <div class="container-fluid"><!--closed in footer-->