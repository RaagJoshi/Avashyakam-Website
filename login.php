<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $server = "localhost";
    $host = "root";
    $password = "";
    $dbname = "apc";

    $con = mysqli_connect($server, $host, $password, $dbname);
    if (!$con) {
        die("Connection failed." . mysqli_connect_error());
    }

    $u_name = $_POST["u_name"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM user_data WHERE u_name = '$u_name' AND password = '$password'";

    $result = mysqli_query($con, $sql);
    $num = mysqli_num_rows($result);
    if ($num == true) {
        $login = true;
        session_start();
        $_SESSION['login'] = true;
        $_SESSION['user'] = $u_name;
        header("Location: home_page.php");
        exit();
    } else {
        echo '<script> alert("Invalid Username Or Password"); </script>';
    }
    mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In Page</title>
</head>

<body>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Raleway', sans-serif;
            font-size: 2.5vh;
            box-sizing: border-box;
            font-weight: bold;
            color: black;
        }

        body {
            background-color: whitesmoke;
        }

        header {
            padding: 3.5vh;
            font-size: 4vh;
            text-align: center;
            background-color: goldenrod;
            box-sizing: border-box;
        }

        p {
            margin: 7vh 0 5vh 42vw;
        }

        #cont {
            width: 40vw;
            height: 50vh;
            margin: 6.6vh 30vw;
            padding: 7vh 7vw;
            background-color: wheat;
            box-shadow: 2vh 2vh 2vh silver;
            border: 0.5vh solid goldenrod;
            border-radius: 3vh;
        }

        input {
            width: 25vw;
            height: 4.5vh;
            border: 0.35vh solid rgb(95, 16, 16);
            margin-top: 1vh;
            border-radius: 1vh;
        }

        .btn {
            color: wheat;
            background-color: goldenrod;
            border: 3vh solid goldenrod;
            border-radius: 2vh;
            cursor: pointer;
            margin: 5vh 9vw;
            font-weight: bold;
        }

        .btn:hover {
            background-color: rgb(95, 16, 16);
            border-color: rgb(95, 16, 16);
            transition-duration: 0.3s;
        }

        footer {
            padding: 5vh;
            font-size: 2vh;
            text-align: center;
            background-color: goldenrod;
        }
    </style>

    <header>Avashyakam</header>
    <section>
        <p>Welcome to the Login Page</p>
        <div id="cont">
            <form action="login.php" method="post" name="getinfo" onsubmit="go()">
                Username<br>
                <input type="text" id="u_name" name="u_name"><br><br><br>
                Password<br>
                <input type="password" id="password" name="password">
                <button type="submit" class="btn" name="submit">Submit</button>
            </form>
        </div>
    </section><br>
    <footer>Copyright</footer>

    <script>
        function go() {
            alert("Logged in Successfully");
        }
    </script>
</body>

</html>