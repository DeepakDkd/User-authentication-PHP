<?php
include("database.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .container {
            max-width: 500px;
            margin: auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 16px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
     
    </style>
</head>

<body>
    <h1>Login page</h1>
    <form action="login.php" method="post">

        <label for="name">Name:</label>
        <input type="text"  name="user_name" placeholder="Your name.." required>

        <label for="password">Password:</label>
        <input type="password" name="pass_word" placeholder="Your password.." required>


        <input type="submit" name="login" value="log in">
    </form>
    <?php
    if (isset($_POST['login'])) {
        $user_name = $_POST["user_name"];
        $pass_word = $_POST["pass_word"];
        if (!empty($user_name) && !empty($pass_word)) {
            $query = "SELECT * FROM user WHERE username='$user_name'";
            $result = mysqli_query($conn, $query);

            if ($result) {
                $row = mysqli_fetch_assoc($result);
                $hash = $row['password'];
                if (password_verify($pass_word, $hash)) {
                    echo "loggin successful";
                    header("Location: Home.html");
                } else {
                    echo "user not found";
                }
            }
        } else {
            echo "enter username/password";
        }
    }
    ?>
</body>

</html>