<head>
<title>KH Web Designs</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="CSS/styles.css">
<script src="https://kit.fontawesome.com/29ebd4b032.js"></script>
<style>
body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

body, html {
  height: 100%;
  line-height: 1.8;
}
.bar .button {
  padding: 16px;
}
</style>
</head>
<?php
if (isset($_POST['Email'])) {

    // EDIT THE 2 LINES BELOW AS REQUIRED
    $email_to = "keith.heffington@gmail.com";
    $email_subject = "Contact from WebSite";

    function problem($error)
    {
        echo "We are very sorry, but there were error(s) found with the form you submitted. ";
        echo "These errors appear below.<br><br>";
        echo $error . "<br><br>";
        echo "Please go back and fix these errors.<br><br>";
        die();
    }

    // validation expected data exists
    if (
        !isset($_POST['Name']) ||
        !isset($_POST['Email']) ||
        !isset($_POST['Message'])
    ) {
        problem('We are sorry, but there appears to be a problem with the form you submitted.');
    }

    $name = $_POST['Name']; // required
    $email = $_POST['Email']; // required
    $message = $_POST['Message']; // required

    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

    if (!preg_match($email_exp, $email)) {
        $error_message .= 'The Email address you entered does not appear to be valid.<br>';
    }

    $string_exp = "/^[A-Za-z .'-]+$/";

    if (!preg_match($string_exp, $name)) {
        $error_message .= 'The Name you entered does not appear to be valid.<br>';
    }

    if (strlen($message) < 2) {
        $error_message .= 'The Message you entered do not appear to be valid.<br>';
    }

    if (strlen($error_message) > 0) {
        problem($error_message);
    }

    $email_message = "Form details below.\n\n";

    function clean_string($string)
    {
        $bad = array("content-type", "bcc:", "to:", "cc:", "href");
        return str_replace($bad, "", $string);
    }

    $email_message .= "Name: " . clean_string($name) . "\n";
    $email_message .= "Email: " . clean_string($email) . "\n";
    $email_message .= "Message: " . clean_string($message) . "\n";

    // create email headers
    $headers = 'From: ' . $email . "\r\n" .
        'Reply-To: ' . $email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();
    @mail($email_to, $email_subject, $email_message, $headers);
?>

    <!-- include your success message below -->
    <body class="bg-grey">
    <!-- Icon bar (Sidebar - hidden on small screen) -->
    <nav class="sidebar bar-block text-12 hide-small center">
        <img src="Images/Keith_Image.png" alt="Avatar" class="image-width">
        <a href="default.html" class="bar-item button padding-large light-grey">
            <i class="fas fa-home text-36"></i>
            <p>HOME</p>
        </a>
        <a href="default.html#ABOUT" class="bar-item button padding-large light-grey">
            <i class="fas fa-user text-36"></i>
            <p>ABOUT</p>
        </a>
        <a href="default.html#PROJECTS" class="bar-item button padding-large light-grey">
            <i class="fas fa-eye text-36"></i>
            <p>PROJECTS</p>
        </a>
        <a href="default.html#CONTACT" class="bar-item button padding-large light-grey">
            <i class="fas fa-envelope text-36"></i>
            <p>CONTACT</p>
        </a>
    </nav>
    <!-- Navbar on small screens (Hidden on medium and large screens) -->
    <div class="top hide-large hide-medium" id="myNavbar">
         <div class="bar light-grey opacity hover-opacity-off center small">
            <a href="default.html" class="bar-item button bar-item-width">HOME</a>
            <a href="default.html#ABOUT" class="bar-item button bar-item-width">ABOUT</a>
            <a href="default.html#PROJECTS" class="bar-item button bar-item-width">PROJECTS</a>
            <a href="default.html#CONTACT" class="bar-item button bar-item-width">CONTACT</a>
         </div>
    </div>
    <!-- Page Container -->
    <div class="padding-large" id="main">
        <!-- Header/Home -->
        <header class="container padding-32 center text-light-grey" id="HOME"> 
            <h3 class="text-24">Thanks for contacting. I will be in touch with you very soon.</h3>
        </header>
        <footer class="content padding-64 text-light-grey center">
            <p class="text-24">
                    &copy; <script type="text/javascript">document.write(new Date().getFullYear())</script> Keith Heffington
            </p>
            <div class="text-36">
                <!-- <a href="https://www.facebook.com/keith.heffington" target="_blank"><i class="fab fa-facebook-square hover-opacity"></i></a> -->
                <!-- <a href="https://twitter.com/BarBarousBofur" target="_blank"><i class="fab fa-twitter-square hover-opacity"></i></a> -->
                <a href="https://github.com/bofur24" target="_blank"><i class="fab fa-github-square hover-opacity"></i></a>
                <a href="https://www.linkedin.com/in/keith-heffington/"><i class="fab fa-linkedin hover-opacity"></i></a>
            </div>
        </footer>
    </div>
</body>
   
<?php
}
?>