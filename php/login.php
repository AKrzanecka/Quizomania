<?php
include "class/User.php";
include "class/DBConnection.php";

$msg = '';
$user = new User();
if(@$_SESSION['login']){
  if($_SESSION['rola']==="1"){
    header("location:admin_panel.php");
  } 
  else{
    header("location:user_panel.php");
  }
}
if (isset($_POST['submit'])) {
    $user->setLogin($_POST['emailusername']);
    $user->setHaslo($_POST['password']);
    $login = $user->doLogin();
    if ($login) {     
      if($_SESSION['rola']==="1"){
        header("location:admin_panel.php");
      } 
      else{
        header("location:user_panel.php");
      }     

    } else {            
        $msg = 'Wrong username or password';
    }
}
?>

<html>
    <head>
        
        <meta name="description">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css" integrity="sha256-l85OmPOjvil/SOvVt3HnSSjzF1TUMyT9eV0c2BzEGzU=" crossorigin="anonymous" />
        <link href="https://fonts.googleapis.com/css2?family=Roboto+Condensed:wght@400;700&display=swap" rel="stylesheet">
        <link href="../css/style.css" rel="stylesheet">
        <link href="../css/main-banner.css" rel="stylesheet">
        <link href="../css/container.css" rel="stylesheet">
        <link href="../css/about-us.css" rel="stylesheet">
        <link href="../css/main-navigation.css" rel="stylesheet">
        <link href="../css/bookmark.css" rel="stylesheet">
        <link href="../css/footer.css" rel="stylesheet">
            
    </head>
    <body>
        <nav class="main-navigation">
            <div class="main-navigation__inner">
            <div class="main-navigation__logo">
                <a href="#" class="main-navigation__logo-link">
                    <img src="../images/tytul.svg" alt="Logo" class="main-navigation__logo-image">
                </a>
            </div>
            <ul class="main-navigation__quizy js-main-navigation__quizy">
                <li class="main-navigation__quizy-item">
                    <a  href="../index.php" class="main-navigation__link">
                      Home
                    </a>
                  </li>
                <li class="main-navigation__quizy-item">
                    <a  href="../index.php#about-us" class="main-navigation__link">
                      O nas
                    </a>
                  </li>
                <li class="main-navigation__quizy-item">
                  <a  href="../index.php#quizy" class="main-navigation__link">
                    Quizy
                  </a>
                </li>
                <li class="main-navigation__quizy-item">
                    <a  href="../php/login.php" class="main-navigation__link">
                      Logowanie
                    </a>
                  </li>
                  <li class="main-navigation__quizy-item">
                    <a  href="../php/register.php" class="main-navigation__link">
                      Nowe konto
                    </a>
                  </li>
            </ul>
            <button class="main-navigation__mobile-button js-main-navigation__mobile-button">
               <img src="images/navigation.svg" alt="Otwórz / zamknij nawigację" class="main-navigation__mobile-button-image">
            </button>
            </div>
        </nav>
        <script src="js/main-navigation.js"></script>


        <section class="main-banner">
        <div class="col-lg-12">
        <?php if(!empty($msg)){ 
                echo '<div class="alert alert-danger">Wrong username or password</div>';
       } ?>    
    </div>

        <form action="" method="post" name="login">    
            <div class="input-group mb-3">
                <input type="text" name="emailusername" class="form-control" placeholder="Username/Email">
            </div>
            
            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="******">        
            </div>
            
            <button type="submit" name="submit" class="float-right btn btn-primary">Login</button>
            <a href="<?php print SITE_URL; ?>register.php">Zarejestruj się</a>
        </form>
    </div>
</div>
</div>
      </section>
        <footer class="footer">
          <a href="#" class="footer__logo-link">
            <img src="../images/tytul.svg" alt="Logo" class="footer__logo-image">
        </a>
        </footer>
    </body>
</html>

      
