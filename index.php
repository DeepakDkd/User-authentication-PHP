<?php
    include("database.php");
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Registration Form 3</title>
  <style>
    body {
      font-family: sans-serif;
    }

    h1 {
      text-align: center;
      color: #666;
    }

    .container {
      width: 550px;
      margin: 20px auto;
      padding-bottom: 80px;
      box-shadow: 2px 2px 10px #b4b4b4;
      background-image: url('https://storage.googleapis.com/pai-images/bcfaf891fd894e76a046534f46eadb76.jpeg');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      border-radius: 20px;
    }

    form {
      padding: 50px 30px;
    }

    label {
      display: block;
      padding: 5px 10px;
      font-size: 15px;
      font-weight: 600;
      color: black;
    }

    input {
      display: block;
      width: 93%;
      margin: auto;
      padding: 13px;
      border: none;
      margin: 20px 0;
      border-radius: 20px;
      background: #ffffff;
      opacity: 0.8;
    }
    p{
        color:red;
        width: 200px;
        margin: 0 50%;
        transform: translate(-50%,-50%);
    }

   
  </style>
</head>

<body>
  <!-- sign up page -->
  <h1>Registration</h1>
  <div class="container">
  <form action="index.php" method="post">
      <label for="name">USERNAME</label>
      <input type="text" name = "username" required autofocus>

      <label for="password">PASSWORD</label>
      <input type="text" name="password">

      <input type="submit" name="submit" value="Register" required>
        </form>
    <?php 

        if(isset($_POST["submit"])){
            $user = $_POST['username'];
            $password = $_POST['password'];
            if(!empty($user) && !empty($password)){
                
                $hash = password_hash($password,PASSWORD_DEFAULT);

                $sql = "INSERT INTO user (`username` , `password`) VALUES ('$user' , '$hash')";

                if($conn -> query($sql) == true){
                    echo "<p style='color:green'>Registration Successful</p>";
                    header("Location: login.php");
                }
                else{
                    die("<p style='color:red'>Error : ".mysqli_error($conn). "</p>");
                }
            }
            else{
                echo "<p>enter username / password</p>";
            }
            
        }

    ?>
  </div>
</body>

</html>