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

    $feed_name = $_POST["feed_name"];
    $feed_no = $_POST["feed_no"];
    $feed = $_POST["feed"];

    $sql = "INSERT INTO feedback (feed_name, feed_no, feed) VALUES ('$feed_name', '$feed_no', '$feed')";

    $result = mysqli_query($con, $sql);
    if ($result == true) {
        header("Location: first_page.html");
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
    <title>Contact Us</title>
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

        #contact {
            width: 50vw;
            background-color: wheat;
            border: 0.5vh solid goldenrod;
            border-radius: 3vh;
            margin: 10vh 25vw;
            padding: 5vh 4vw;
            box-shadow: 2vh 2vh 2vh silver;
        }

        input {
            width: 20vw;
            height: 4vh;
            border: 0.35vh solid rgb(95, 16, 16);
            margin-top: 2vh;
            border-radius: 1vh;
        }

        #feed {
            border: 0.35vh solid rgb(95, 16, 16);
            margin-top: 2vh;
            border-radius: 1vh;
        }

        .btn {
            color: wheat;
            background-color: goldenrod;
            border: 2vh solid goldenrod;
            border-radius: 2vh;
            cursor: pointer;
            margin: 5vh 0 0 17vw;
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
        <div id="welcome">Contact us</div>
        <button type="submit" class="head_ele" onclick="home_go()">Home</button>
    </header>
    <p>We are more than just a hostel, we are a family.</p>
    <p>Hey there, if you have any problems or queries let us know. Your feedback will be very helpful.</p>
    <section>
        <form action="contact_us.php" method="post" name="getinfo" onsubmit="go()">
            <div id="contact">
                Name<br>
                <input type="text" id="feed_name" name="feed_name" placeholder="  Enter Full Name"><br><br><br>
                Contact No.<br>
                <input type="text" id="feed_no" name="feed_no"><br><br><br>
                <label>Feedback</label><br>
                <textarea id="feed" name="feed" rows="6" cols="50"></textarea>
                <br><br>
                <button type="submit" value="submit" class="btn" name="submit">Submit</button>
            </div>
        </form>
    </section>
    <footer>Copyright</footer>

    <script>
        function home_go() {
            window.open("home_page.php", "_self");
        }

        function go() {
            alert("Feedback Submitted");
        }
    </script>
</body>

</html>