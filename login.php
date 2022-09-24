<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<!-- <body> -->
<!-- this is the first page in the website its gonna be a portal to login -->
<!-- </body> -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
<!--Stylesheet-->
<link rel="stylesheet" href="./styling/login.css">
</head>

<body>
    <?php
    // start conn
    include "./functions/conn.php";


    $username = $_POST['username'];
    $password = $_POST['password'];
    $btn = $_POST['submit'];

    if (isset($btn)) {
        $stmt = $conn->prepare("SELECT * FROM users");
        $stmt->execute();
        $logdata = $stmt->fetchAll();

        $data_user = $logdata[0]["username"];
        $data_pass = $logdata[0]["pass"];
        if ($username == $data_user and $password == $data_pass) {
            header("Location:http://localhost/hospital/overview.php");
        } else {
            function errToLog()
            {
                echo "YOU ARE NOT AUTHORIZED";
            }
        }
    }

    ?>

    <div class="background">
        <div class="shape"></div>
        <div class="shape"></div>
    </div>
    <form action="#" method="POST">
        <h3>Login Here</h3>

        <label for="username">Username</label>
        <input name="username" type="text" placeholder="Email or Phone" id="username">

        <label for="password">Password</label>
        <input name="password" type="password" placeholder="Password" id="password">

        <button type="submit" name="submit">Log In</button>
        <P style="padding: 10px; color: red; "><?PHP if (isset($btn)) errToLog(); ?></P>
    </form>

</body>

</html>