<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <title> Joss Moffatt </title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="fonts.css">
  <link rel="stylesheet" href="style.css">
</head>

<?php
session_start();
/*test_input used to remove excess spaces, tabs
  removes slashesand special chars to avoid
  XSS*/

function test_input($data)
{
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$emailErrorValue = $email = $first_name = $first_nameErrorValue = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
  if (empty($_POST["first_name"]))
  {
    $first_nameErrorValue = "Name is required";
  }//if first name empy
  else
  {
    $first_name = test_input($_POST["first_name"]);

    // check if name only contains letters and whitespace
    if (!preg_match("/^[a-zA-Z ]*$/",$first_name))
    {
      $first_nameErrorValue = "Only letters and white space allowed";
    }//if name matches
  }//if post

  if (empty($_POST["email"]))
  {
    $emailErrorValue = "Email is required";
  }
  else
  {
    $email = test_input($_POST["email"]);
    // check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
      $emailErrorValue = "Invalid email format";
    }//if filtered email is not valid
  }//else
  if ($first_nameErrorValue == "" && $emailErrorValue == "")
  {
    $data = ['first_name' => $first_name, 'email' => $email];
    $query_string = http_build_query($data);
    echo $query_string;
    header("Location: ./welcome.php?$query_string");
  }//if no errors
}
?>


<body>
  <header>
    <div class="intro-body">
      <div class="profile-img">
        <img src="images/image3.jpg" width="300" alt = "Picture of Face">
      </div>
      <p class="uni-img"><img src="images/UOM.jpg"
        width="300" height = "300" alt="Uni Logo"></p>
      <div class="name">Hi, I'm Joss</div>
      <div class="subtitle">Computer Scientist</div>
      <blockquote class="intro" cite="https://www.goodreads.com/quotes/839583-to-those-who-do-not-know-mathematics-it-is-difficult">
      "To those who do not know mathematics it is difficult to get across a real feeling as to the beauty, the deepest beauty,
      of nature ... If you want to learn about nature, to appreciate nature, it is necessary to understand the language that she
      speaks in".-Richard Feynman</blockquote>
    </div>
  </header>
  <div class="topnav">
    <a href="index.html">Home</a>
    <a href="news.html">News</a>
    <a href="about.html">About</a>
    <a class="active" href="index.php">Login</a>
 </div>
  <hr/>

  <div class="icon-bar">
    <a href="https://www.facebook.com/jossmoff" class="facebook"><i class="fa fa-facebook"></i></a>
    <a href="mailto:josshmoffatt@gmail.com" class="google"><i class="fa fa-google"></i></a>
    <a href="https://www.linkedin.com/in/joss-moffatt-5b408a175/" class="linkedin"><i class="fa fa-linkedin"></i></a>
    <a href="https://github.com/JossMoff" class="github"><i class="fa fa-github"></i></a>
    <a href="https://github.com/JossMoff" class="steam"><i class="fa fa-steam"></i></a>
  </div>

  <div class="main-body">
    <div class = "main-heading">Welcome.</div>
       Please enter your details:
      <div class = "main-text">
        <br><br><br>
        <form action = "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
          Name
          <input type = "text" name = "first_name" value = "John">
          <span class="error">* <?php echo $first_nameErrorValue;?></span>
          <br><br>
          Email
          <input type = "text" name = "email" value = "john.smith@domain.com">
          <span class="error">* <?php echo $emailErrorValue;?></span>
          <br><br>
          <hr>
          <input type ="submit" value = "Submit">
        </form>
      </div>
  </div>

</body>
</html>
