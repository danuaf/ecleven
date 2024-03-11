<?php
session_start();
  require "../koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <style>
    .main {
  
      height: 100vh;
    }

    .login-box {
      width: 300px;
      padding: 20px;
     
      border-radius: 8px;
      box-sizing: border-box;
    }
  
  .custom-btn {
    background-color: #5955B3;
    color: #fff;
  }

  .custom-btn:hover {
      background-color: #4F4B96; 
      color: #fff;
    }
  </style>
</head>

<body>
  <div class="main d-flex flex-column justify-content-center align-items-center">
    <div class="login-box shadow">
      <h2 class="text-center">Login</h2>
      <form action="" method="post">
        <div class="mb-3">
          <label for="username" class="form-label">Username:</label>
          <input type="text" class="form-control" id="username" name="username">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password:</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <div>
          <button type="submit" class="btn custom-btn form-control" name="loginbtn">Login</button>
        </div>
      </form>
    </div>

    <div class="mt-3">
      <?php
        if(isset($_POST['loginbtn'])){
          $username = htmlspecialchars($_POST['username']);
          $password = htmlspecialchars($_POST['password']);

          $query = mysqli_query($conn,"SELECT * FROM users WHERE username='$username'");
          $hitungdata = mysqli_num_rows($query);
          $data = mysqli_fetch_array($query);

          if($hitungdata>0){
            if (password_verify($password, $data['password'])) {
              $_SESSION['username'] = $data['username'];
              $_SESSION['login'] = true;
              header('location: ../admin');
            }
            else {
              ?>
              <div class="alert alert-warning" role="alert">
                password salah
              </div>
              <?php
            }

          }
          else {
            ?>
            <div class="alert alert-warning" role="alert">
              username salah
            </div>
            <?php
          }
        }
      ?>
    </div>
  </div>
</body>

</html>
