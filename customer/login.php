<?php 
require_once "navbar.php";
require_once "link.php";
?>
<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/login.css" />
  </head>
  <body>
    <div class="main">
    <section class="wrapper">
          <div class="form signup">
            <header>Signup</header>
            <form action="checksignup.php" method="POST">
              <input type="text" name="name" placeholder="Full name" required />
              <input type="text" name="email" placeholder="Email address" required />
              <input type="text" name="address" placeholder="Address" required />
              <input type="password" name="password" placeholder="Password" required />
              <input type="submit" value="Signup" />
            </form>
            <?php if(isset($_GET["signup"])&& $_GET['signup']=='success'): ?>
            <p class="text-green-600 text-l font-bold">Successfully Signup.Login again</p>
            <?php endif ?>
            <?php if(isset($_GET["signup"])&& $_GET['signup']=='failed'): ?>
            <p class="text-red-600 text-l font-bold">Sign up failed</p>
            <?php endif ?>
          </div>

          <div class="form login">
            <header>Login</header>
            <form action="checklogin.php" method="POST">
              <input type="text" placeholder="Email address" name="email"  required />
              <input type="password" placeholder="Password" name="password" required />
              <a href="#">Forgot password?</a>
              <input type="submit" value="Login" />
            </form>
            <?php if(isset($_GET["login"])&& $_GET['login']=='failed'): ?>
            <p class="text-red-600 text-l font-bold">Login Failed.</p>
            <?php endif ?>
          </div>
        </section>
    </div>
    
  </body>

  <script src="js/login.js"></script>
</html>

<?php 
require_once "footer.php";
?>