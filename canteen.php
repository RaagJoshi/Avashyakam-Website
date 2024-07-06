<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $server = "localhost";
    $host = "root";
    $password = "";
    $dbname = "apc";

    $con = mysqli_connect($server, $host, $password, $dbname);
    if (!$con) {
        die("Connection failed." . mysqli_connect_error());
    }

    $user = $_SESSION['user'];
    $sql_1 = "SELECT uid FROM user_data WHERE u_name = '$user'";

    $result_1 = mysqli_query($con, $sql_1);
    $num_1 = mysqli_num_rows($result_1);

    if ($num_1 == true) {
        while ($row = mysqli_fetch_assoc($result_1)) {
            $id = $row["uid"];
        }
    }

    if (isset($_POST["coffee"])) {
        $v1 = 1;
        $c1 = 15;
    } else {
        $v1 = 0;
        $c1 = 0;
    }
    if (isset($_POST["thepla"])) {
        $v2 = 1;
        $c2 = 20;
    } else {
        $v2 = 0;
        $c2 = 0;
    }
    if (isset($_POST["parle_g"])) {
        $v3 = 1;
        $c3 = 10;
    } else {
        $v3 = 0;
        $c3 = 0;
    }
    if (isset($_POST["paratha"])) {
        $v4 = 1;
        $c4 = 25;
    } else {
        $v4 = 0;
        $c4 = 0;
    }
    if (isset($_POST["idli"])) {
        $v5 = 1;
        $c5 = 40;
    } else {
        $v5 = 0;
        $c5 = 0;
    }
    if (isset($_POST["tea"])) {
        $v6 = 1;
        $c6 = 10;
    } else {
        $v6 = 0;
        $c6 = 0;
    }

    $total = $c1 + $c2 + $c3 + $c4 + $c5 + $c6;
    $d = date("Y-m-d");


    $sql_2 = "INSERT INTO canteen (uid, coffee, thepla, parle_g, paratha, idli, tea, total, date) VALUES ('$id', '$v1', '$v2', '$v3', '$v4', '$v5', '$v6', '$total', '$d')";

    $result_2 = mysqli_query($con, $sql_2);
    if ($result_2 == true) {
        header("Location: home_page.php");
        exit();
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
    <title>Canteen</title>
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

        p {
            text-align: center;
            color: rgb(95, 16, 16);
            margin: 5vh;
        }

        .cont {
            display: flex;
            justify-content: center;
        }

        .item {
            height: 15vh;
            width: 15vw;
            margin: 5vh 2vw;
            padding: 5vh 2vw;
            font-weight: bold;
            font-size: 3vh;
            color: rgb(95, 16, 16);
            background-color: wheat;
            box-shadow: 2vh 2vh 2vh silver;
            border: 0.5vh solid goldenrod;
            border-radius: 3vh;
            text-align: center;
        }

        .btn {
            color: wheat;
            background-color: goldenrod;
            border: 2vh solid goldenrod;
            border-radius: 2vh;
            cursor: pointer;
            margin: 5vh 0 0 47vw;
            font-weight: bold;
        }

        .btn:hover {
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
        <div id="welcome">Canteen</div>
        <button type="submit" class="head_ele" onclick="home_go()">Home</button>
        <button type="submit" class="head_ele" onclick="contact_go()">Contact Us</button>
    </header>
    <p>Select items that you want to order for Breakfast (7:00 - 9:00 AM).<br><br>Dishes will be served as per the net quantity and available ingrediants...</p>
    <form action="canteen.php" method="post" name="getinfo" onsubmit="go()">
        <section class="cont">
            <div class="item">
                <input type="checkbox" id="tea" name="tea" value="tea">
                <label for="tea"> Tea - 10&nbsp;&#8377;</label>
            </div>
            <div class="item">
                <input type="checkbox" id="coffee" name="coffee" value="coffee">
                <label for="coffee"> Coffee - 15&nbsp;&#8377;</label>
            </div>
            <div class="item">
                <input type="checkbox" id="thepla" name="thepla" value="thepla">
                <label for="thepla"> Thepla - 20&nbsp;&#8377;</label>
            </div>
        </section>
        <section class="cont">
            <div class="item">
                <input type="checkbox" id="paratha" name="paratha" value="paratha">
                <label for="paratha"> Paratha - 25&nbsp;&#8377;</label>
            </div>
            <div class="item">
                <input type="checkbox" id="parle_g" name="parle_g" value="parle_g">
                <label for="parle_g"> Parle G - 10&nbsp;&#8377;</label>
            </div>
            <div class="item">
                <input type="checkbox" id="idli" name="idli" value="idli">
                <label for="idli"> Idli - 40&nbsp;&#8377;</label>
            </div>
        </section>
        <button type="submit" value="submit" class="btn" name="submit">Submit</button>
    </form>
    <footer>Copyright</footer>

    <script>
        function go() {
            alert("Ordered Placed");
        }

        function home_go() {
            window.open("home_page.php", "_self");
        }

        function contact_go() {
            window.open("contact_us.php", "_self");
        }
    </script>
</body>

</html>