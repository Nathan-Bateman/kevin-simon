<?php 
session_start();
    $data = array();
    $errors = array(); 
    //echo '<link rel="stylesheet" type="text/css" href="css/bootstrap.min.form.css"></head>';
    function generateFormToken($form) {
    
        // generate a token from an unique value, took from microtime, you can also use salt-values, other crypting methods...
      $token = md5(uniqid(microtime(), true));  
      
      // Write the generated token to the session variable to check it against the hidden field when the form is sent
      $_SESSION[$form.'_token'] = $token; 
      return $token;
    }
    
    function verifyFormToken($form) {
        
        // check if a session is started and a token is transmitted, if not return an error
      if(!isset($_SESSION[$form.'_token'])) { 
        return false;
        }
      
      // check if the form is sent with token in it
      if(!isset($_POST['token'])) {
        return false;
        }
      
      // compare the tokens against each other if they are still the same
      if ($_SESSION[$form.'_token'] !== $_POST['token']) {
        return false;
        }
      return true;
    }
    function check_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
   if (isset($_POST['submit']))
    { 
    if (verifyFormToken('form1')) {
      $name = check_input($_POST["name"]);
        $email = check_input($_POST["emailaddress"]);
        $message = check_input($_POST["message"]);
        $ForwardTo = 'nathan.bateman.jr@gmail.com';
        $details='Name: '.$name."\n".'Email: '.$email."\n".'Message: '.$message."\n";
        $data['success'] = true;
        $data['message'] = 'Success!';
        mail($ForwardTo,"Kivin Simon Insurance Contact",$details,"From:$email");
        
    } else {
    
      $data['success'] = false;
        $data['errors']  = $errors;
        
    }
    exit('
      <body>
    <div class="modal fade" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content" style="top:4em">
      <div class="modal-header">
        <h4 class="modal-title" style="border-top:none; border-bottom:none; Color:#003D7A">Thanks for writing in!</h4>
      </div>
      <div class="modal-body">
        <p>Thanks for writing in! I will get back to you withing 1-2 business days.<br><br>Thanks!<br><br>Kevin Simon </p>
      </div>
      <div class="modal-footer">
<form action="index.php" style="text-align:left">
    <button type="button" class="btn btn-primary">Back to site</button>
</form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</body>
      <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>'
);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Kevin Simon Insurance Agent - Kansas City</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Oswald:300,400" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/scrolling-nav.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<?php
   // generate a new token for the $_SESSION superglobal and put them in a hidden field
  $newToken = generateFormToken('form1');  
?>

<!-- The #page-top ID is part of the scrolling feature - the data-spy and data-target are part of the built-in Bootstrap scrollspy function -->

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
<?php echo "string"; ?>
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class='logo-wrapper'>
                    <a class="navbar-brand page-scroll" href="#page-top"><img src="images/kevin_simon_logo.svg" alt="Kevin Simon Logo" class='logo-img' style="
                        width: 265px;
                        padding-top: 5px;
                        margin-top:-28px;">
                        <h3 class='mobile-logo'>HOMETOWN INSURANCE LLC</h3>
                        <h3 class='hide small-menu'>HOMETOWN INSURANCE LLC</h3>
                    </a>
                </div>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav">
                    <!-- Hidden li included to remove active class from about link when scrolled up past about section -->
                    <li class="hidden">
                        <a class="page-scroll" href="#page-top"></a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#about">About</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#services">Services</a>
                    </li>
                    <li>
                        <a class="page-scroll" href="#contact">Quote</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Intro Section -->
    <section id="intro" class="intro-section logo">
        <div class="container">
            <div id='pic-call-action' class="row">
                <div class="col-md-6 kevin-pic">
                   <img class='kevin-simon-picture' src="images/kevin_simon_kc.jpg" alt="Kevin Simon Picture Insurance Kansas City">
                   <h2>Kevin Simon - Agent</h2>
                   <a id="tel-small" href="tel:9137875212"><p>913-341-4448</p></a>
                   <ul id='social-icons'>
                       <li><a href="https://www.facebook.com/kevin.simon.1441"><img src="images/facebook.svg" alt="Kevin Simon Kansas City Insurance Facebook" style="width:40px;"></a></li>
                       <li><a href="https://www.linkedin.com/in/kevin-simon-a1248835"><img src="images/linkedin.svg" alt="Kevin Simon Kansas City Insurance LinkedIn" style="width:40px;"></a></li>
                       <li><a href="mailto:kevinsimon282@gmail.com"><img src="images/email.svg" alt="Kevin Simon Kansas City Insurance Email" style="width:40px;"></a></li>
                   </ul>
                </div>
                <div class="col-md-6">
                   <form class='CAT' action="index.php" method='post'>
                       <div class='form-group'>
                            <label class='col-form-label visuallyhidden'>Name</label>
                                <input class='form-control' id="name" name='name' required type="text" placeholder="Name" autofocus>
                            <label class='col-form-label visuallyhidden'>Email</label>
                                <input id='email-address' name='emailaddress' data-toggle="tooltip" data-trigger='manual' data-animation='true' data-placement="top" class='form-control' type="email" required placeholder="Email" autocomplete='email'>

                            <label class='col-form-label visuallyhidden'>Message</label>
                                <textarea id="event-guest" name='message' row='10' class='form-control' type="text" cols="50" rows="1" maxlength="100" required placeholder="Message"></textarea>
                        </div>
                        <input type="hidden" name="token" value="<?php echo $newToken; ?>">
                            <input id="submit-event" class='submit' name='submit' type="submit" value="Contact Kevin">
                   </form>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="about-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Note from Kevin</h1>
                    <p>On Sept 14th my contract with American Family Insurance was terminated abruptly and without warning.  Fortunately, I have found a new home with an "independent" insurance agency and now have 10 companies to represent, rather than just one.  I have a one-year non-compete with American Family and cannot solicit my prior customers, but if they request a comparison for their insurance, I can gladly provide that.  In September 2017 I will actively solicit them.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Services</h1>
                </div>
            </div>
            <div class="row service-image-section">
                <div class="col-md-4">
                    <img class='service-image' src="images/kevin_simon_kansas_city_home_owners_insurance.jpeg" alt="kevin_simon_kansas_city_home_owners_insurance">
                    <h3>Home Owners</h3>
                    <p>Protect your equity with our many flexible home owners plans.</p>
                </div>
                <div class="col-md-4">
                    <img class='service-image' src="images/kevin_simon_kansas_city_auto_insurance.jpg" alt="kevin_simon_kansas_city_auto_insurance">
                    <h3>Auto</h3>
                    <p>We have a range of plans to keep you protected.</p>
                </div>
                <div class="col-md-4">
                    <img class='service-image' src="images/kevin_simon_kansas_city_life_insurance.jpeg" alt="kevin_simon_kansas_city_life_insurance">
                    <h3>Life</h3>
                    <p>Giving you the peace of mind you need to enjoy your family.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="quote-wrap">
                        <h1>Get a Free Quote</h1>
                        <a href="https://docs.google.com/forms/d/e/1FAIpQLSdki3anwQarkyDouGoY5gd2v3GuVfw65RRCVejD4rMz0RqmhA/viewform"><button type="button">GET QUOTE</button></a>
                        <p>Fill out the information in the form and I will get back to you within two business days.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Scrolling Nav JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/scrolling-nav.js"></script>

</body>

</html>
