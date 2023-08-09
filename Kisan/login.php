<?php
include('includes/config.php');
// session_start();
if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $pass = mysqli_real_escape_string($con, ($_POST['password']));
    $select = mysqli_query($con, "SELECT * FROM `user_form` WHERE Email = '$email' AND Password = '$pass'") or die('query failed');
    if (mysqli_num_rows($select) > 0) {
        $row = mysqli_fetch_assoc($select);
        $_SESSION['user_id'] = $row['ID'];
        // Set the cookie with the username
        $username = $row['Username'];
        setcookie('username', $username, time() + 3600, '/');
        header('location: dashboard.php');
    } else {
        $message[] = 'incorrect email or password!';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <!-- custom css file link  -->
    <link rel="stylesheet" href="dist/css/userForm.css">
    <style>
        /* Navbar styles */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #f2f2f2;
            padding: 10px;
        }

        .navbar-brand {
            font-weight: bold;
            margin-right: 20px;
        }

        .navbar-items {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            margin-left: 20px;
        }

        .navbar-items li {
            margin-left: 10px;
        }
    </style>
</head>

<body>
    <nav class="navbar">
        <div class="navbar-brand">BARI</div>
        <ul class="navbar-items">
            <li><a href="../index.php">home</a></li>
            <li><a href="logout.php">logout</a></li>
        </ul>
    </nav>
    <div class="form-container">
        <form action="" method="post" enctype="multipart/form-data">
            <h3>login now</h3>
            <?php
            if (isset($message)) {
                foreach ($message as $message) {
                    echo '<div class="message">' . $message . '</div>';
                }
            }
            ?>
            <input type="email" name="email" placeholder="enter email" class="box" required>
            <input type="password" name="password" placeholder="enter password" class="box" required>
            <input type="submit" name="submit" value="login now" class="btn">
            <p>don't have an account? <a href="register.php">regiser now</a></p>
        </form>

    </div>

</body>

</html>