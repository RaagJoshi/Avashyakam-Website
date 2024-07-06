<?php
session_start();
if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
    $server = "localhost";
    $host = "root";
    $password = "";
    $dbname = "apc";

    $con = mysqli_connect($server, $host, $password, $dbname);
    if (!$con) {
        die("Connection failed." . mysqli_connect_error());
    }
    mysqli_close($con);
} else {
    header("Location: first_page.html");
    exit();
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
    <title>Home Page</title>
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
            background-color: rgb(250, 241, 225);
        }

        header {
            padding: 3.5vh;
            font-size: 4vh;
            background-color: goldenrod;
            box-sizing: border-box;
            display: flex;
        }

        #welcome {
            margin: 0 10vw 0 0;
            background-color: rgb(95, 16, 16);
            border: 2vh solid rgb(95, 16, 16);
            color: wheat;
            border-radius: 2vh;
            font-size: 3vh;
        }

        .head_ele {
            margin: 0 2vw;
            background-color: goldenrod;
            border: 2vh solid goldenrod;
            border-radius: 2vh;
            cursor: pointer;
        }

        .head_ele:hover {
            color: wheat;
            background-color: rgb(95, 16, 16);
            border-color: rgb(95, 16, 16);
            transition-duration: 0.3s;
        }

        img {
            height: auto;
            width: 98.95vw;
            z-index: -1;
            opacity: 0.5;
        }

        #img {
            position: relative;
            margin-top: -97vh;
            margin-left: 30vw;
            margin-bottom: 87vh;
            color: rgb(95, 16, 16);
            font-size: 8vh;
            z-index: 1;
        }

        #note {
            margin: 100vh 0 0 22vw;
        }

        #info {
            margin: 10vh 9vw;
            display: flex;
            flex-direction: row;
            flex-wrap: row;
            justify-content: center;
            align-items: center;
        }

        .tasks {
            height: 35vh;
            width: 30vw;
            margin: 5vh 2vw;
            padding: 0 3vw;
            font-weight: bold;
            font-size: 3vh;
            color: rgb(95, 16, 16);
            background-color: wheat;
            box-shadow: 2vh 2vh 2vh silver;
            border: 0.5vh solid goldenrod;
            border-radius: 3vh;
            cursor: pointer;
        }

        .tasks:hover {
            color: wheat;
            background-color: rgb(95, 16, 16);
            border-color: rgb(95, 16, 16);
            transition-duration: 0.4s;
        }

        footer {
            margin: 10vh 0 0 0;
            padding: 4vh;
            font-size: 2vh;
            text-align: center;
            background-color: goldenrod;
        }
    </style>

    <header>
        <div id="welcome">Welcome - <?php echo $_SESSION['user'] ?></div>
        <button type="submit" class="head_ele" onclick="home_go()">Home</button>
        <button type="submit" class="head_ele" onclick="contact_go()">Contact Us</button>
    </header>

    <section>
        <img src="images\home_page_mandir.jpg" alt="Image of Swaminarayan Mandir">
        <p id="img">Heaven Welcomes You</p>
    </section>

    <p id="note"></p>
    <section id="info">
        <button type="submit" class="tasks" name="submit" onclick="canteen_go()">Canteen</button>
        <button type="submit" class="tasks" name="submit" onclick="shop_go()">Shop</button>
    </section>

    <footer>Copyright</footer>

    <script>
        function home_go() {
            window.location.reload();
        }

        function contact_go() {
            window.open("contact_us.php", "_self");
        }

        function canteen_go() {
            window.open("canteen.php", "_self");
        }

        function shop_go() {
            window.open("shop.php", "_self");
        }
    </script>
</body>

</html>