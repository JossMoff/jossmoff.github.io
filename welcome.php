<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8"/>
  <title> Joss Moffatt </title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="fonts.css">
  <link rel="stylesheet" href="style.css">
</head>
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
    Your details are:
    <br><br>
    <?php
    session_start();
    $first_name = $_GET['first_name'];
    $email = $_GET['email'];
    $group_names = array("Vlad", "Kostadin ", "Ziad", "Isabelle", "Tamara", "Saman");

    //checks to see if the name givem is in Z5

    function check_name($data, $group_names)
    {
      if (in_array($data, $group_names))
      {
        echo " Hi $data, hope you have read the Z5 framework recently! <br><br>";
      }
      else
      {
        echo "Your name is $data <br><br>";
      }
    }
    ?>
    <?php check_name($first_name, $group_names); ?>

    Your email address is: <?php echo ($email) ?>


  </div>

</body>
</html>
