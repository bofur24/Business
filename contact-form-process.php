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
    $email_subject = "Contact from KH WEB DESIGNS";

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
    <body>
    <!-- Icon bar (Sidebar - hidden on small screen) -->
    <div class="top">
  <div class="bar white card" id="myNavbar">
    <a href="index.html#home" class="bar-item wide"><img src="IMG/KHlogoSM.PNG" alt="KHLogo" class="img-width"></a>
    <!-- Right-sided navbar links -->
    <div class="right hide-small padding-24">
      <a href="index.html#about" class="bar-item button">ABOUT</a>
      <a href="index.html#team" class="bar-item button"><i class="fa fa-user"></i> TEAM</a>
      <a href="index.html#work" class="bar-item button"><i class="fa fa-th"></i> WORK</a>
      <a href="index.html#pricing" class="bar-item button"><i class="fa fa-usd"></i> PRICING</a>
      <a href="index.html#contact" class="bar-item button"><i class="fa fa-envelope"></i> CONTACT</a>
    </div>
    <!-- Hide right-floated links on small screens and replace them with a menu icon -->

    <a href="javascript:void(0)" class="bar-item button right hide-large hide-medium" onclick="sideBarOpen()">
      <i class="fa fa-bars"></i>
    </a>
  </div>
</div>

<!-- Sidebar on small screens when clicking the menu icon -->
<nav class="sidebar bar-block black card animate-left hide-medium hide-large" style="display:none" id="mySidebar">
  <a href="javascript:void(0)" onclick="sideBarItemClose()" class="bar-item button large padding-16">Close ×</a>
  <a href="index.html#about" onclick="sideBarItemClose()" class="bar-item button">ABOUT</a>
  <a href="index.html#team" onclick="sideBarItemClose()" class="bar-item button">TEAM</a>
  <a href="index.html#work" onclick="sideBarItemClose()" class="bar-item button">WORK</a>
  <a href="index.html#pricing" onclick="sideBarItemClose()" class="bar-item button">PRICING</a>
  <a href="index.html#contact" onclick="sideBarItemClose()" class="bar-item button">CONTACT</a>
</nav>
    <!-- Footer -->
    <footer class="center dark-grey padding-64">
        <header class="padding-64 white"  > 
            <h3 class="text-24">Thanks for contacting. I will be in touch with you very soon.</h3>
        </header>
      <div class="xxlarge section">
        <a href="https://github.com/bofur24" target="_blank"><i class="fa fa-github hover-opacity"></i></a>
        <a href="https://www.linkedin.com/in/keith-heffington/"><i class="fa fa-linkedin hover-opacity"></i></a>
      </div>
    </footer>



    <script>
    // Toggle between showing and hiding the sidebar when clicking the menu icon
    var mySidebar = document.getElementById("mySidebar");

    function sideBarOpen() {
      if (mySidebar.style.display === 'block') {
        mySidebar.style.display = 'none';
      } else {
        mySidebar.style.display = 'block';
      }
    }

    // Close the sidebar with the close button
    function sideBarItemClose() {
        mySidebar.style.display = "none";
    }
    </script>
</body>
   
<?php
}
?>