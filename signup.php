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

    $f_name = $_POST["f_name"];
    $l_name = $_POST["l_name"];
    $number = $_POST["number"];
    $city = $_POST["city"];
    $dob = $_POST["dob"];
    $state = $_POST["state"];
    $email = $_POST["email"];
    $sex = $_POST["sex"];
    $u_name = $_POST["u_name"];
    $password = $_POST["password"];

    $sql = "INSERT INTO user_data (f_name, l_name, number, email, city, state, dob, sex, u_name, password) VALUES ('$f_name', '$l_name', '$number', '$email', '$city', '$state', '$dob', '$sex', '$u_name', '$password')";

    $result = mysqli_query($con, $sql);
    if ($result == true) {
        header("Location: login.php");
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
    <title>Sign Up Page</title>
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
            color: rgb(95, 16, 16);
            margin: 10vh 0 10vh 0;
            text-align: center;
        }

        section {
            display: flex;
            flex-direction: row;
            flex-wrap: row;
            justify-content: center;
            align-items: center;
        }

        fieldset {
            width: 50vw;
            background-color: wheat;
            border: 0.5vh solid goldenrod;
            border-radius: 3vh;
            margin: 0 9vw 5vh 9vw;
            padding: 4vh 6vw;
            box-shadow: 2vh 2vh 2vh silver;
        }

        legend {
            font-size: 4vh;
            box-shadow: 1vh 1vh 5vh silver;
            background-color: goldenrod;
            color: rgb(95, 16, 16);
            border-radius: 3vh;
            padding: 2vh;
        }

        input {
            width: 15vw;
            height: 4.5vh;
            border: 0.35vh solid rgb(95, 16, 16);
            margin-top: 1vh;
            border-radius: 1vh;
        }

        .sex {
            width: 2vw;
            height: 2vh;
            margin-top: 3vh;
        }

        #pers {
            display: flex;
        }

        .pers {
            width: 25vw;
        }

        #f2 {
            padding-bottom: 10vh;
            display: flex;
        }

        .acc {
            width: 25vw;
        }

        #u_name,
        #password {
            width: 20vw;
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
            margin-top: 11vh;
            font-weight: bold;
        }

        .btn:hover {
            background-color: rgb(95, 16, 16);
            border-color: rgb(95, 16, 16);
            transition-duration: 0.4s;
        }

        footer {
            padding: 3vh;
            font-size: 2vh;
            text-align: center;
            background-color: goldenrod;
            box-sizing: border-box;
        }

        @media screen and (max-width: 600px) {
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: 'Raleway', sans-serif;
                font-size: 2vh;
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
                color: rgb(95, 16, 16);
                margin: 3vh;
            }

            section {
                display: flex;
                flex-direction: row;
                flex-wrap: row;
                justify-content: center;
                align-items: center;
            }

            fieldset {
                width: 80vw;
                background-color: wheat;
                border: 0.5vh solid goldenrod;
                border-radius: 3vh;
                margin: 3vh;
                padding: 1vh 5vw;
                box-shadow: 2vh 2vh 2vh silver;
            }

            legend {
                font-size: 2vh;
                box-shadow: 1vh 1vh 5vh silver;
                background-color: goldenrod;
                color: rgb(95, 16, 16);
                border-radius: 3vh;
                padding: 2vh;
            }

            input {
                width: 50vw;
                height: 4vh;
                border: 0.35vh solid rgb(95, 16, 16);
                margin-top: 1vh;
                border-radius: 1vh;
            }

            .sex {
                width: 12vw;
                height: 2vh;
                margin-top: 1vh;
            }

            #pers {
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
            }

            .pers {
                width: 35vw;
            }

            #f2 {
                padding-bottom: 5vh;
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
            }

            .acc {
                width: 35vw;
            }

            #u_name,
            #password {
                width: 50vw;
                height: 4vh;
                border: 0.35vh solid rgb(95, 16, 16);
                margin-top: 1vh;
                border-radius: 1vh;
            }

            .btn {
                color: wheat;
                background-color: goldenrod;
                border: 2vh solid goldenrod;
                border-radius: 2vh;
                cursor: pointer;
                margin: 5vh 0 0 20vw;
                font-weight: bold;
            }

            .btn:hover {
                background-color: rgb(95, 16, 16);
                border-color: rgb(95, 16, 16);
                transition-duration: 0.4s;
            }

            footer {
                padding: 3vh;
                font-size: 2vh;
                text-align: center;
                background-color: goldenrod;
                box-sizing: border-box;
            }
        }
    </style>

    <header>APC website</header>
    <p>Welcome to the APC website, since you are a new user fill up the registration details.</p>
    <section>
        <form action="signup.php" method="post" name="getinfo" onsubmit="register(event)">
            <fieldset id="f1">
                <legend>Personal Info</legend><br>
                Name<br>
                <input type="text" id="f_name" name="f_name" placeholder="  First">&nbsp;&nbsp;
                <input type="text" id="l_name" name="l_name" placeholder="  Last"><br><br><br>
                <div id="pers">
                    <div class="pers">
                        Contact No<br>
                        <input type="text" id="number" name="number"><br><br><br>
                        City<br>
                        <input type="text" id="city" name="city"><br><br><br>
                        DOB<br>
                        <input type="date" id="dob" name="dob"><br><br><br>
                    </div>
                    <div class="pers">
                        Email<br>
                        <input type="email" id="email" name="email"><br><br><br>
                        State<br>
                        <input type="text" id="state" name="state"><br><br><br>
                        Sex<br>
                        <label><input type="radio" value="male" name="sex" class="sex">Male</label>
                        <label><input type="radio" value="female" name="sex" class="sex">Female</label><br><br><br>
                    </div>
                </div>
            </fieldset>
            <fieldset id="f2"><br>
                <legend>Create an Account</legend>
                <div class="acc"><br>
                    Enter the Username<br>
                    <input type="text" id="u_name" name="u_name"><br><br><br>
                    Enter the Password<br>
                    <input type="password" id="password" name="password">
                </div>
                <div class="acc" align="center">
                    <button type="submit" value="submit" class="btn" name="create">Create</button>
                </div>
            </fieldset>
        </form>
    </section>
    <footer>copyright of APC 2023</footer>

    <script>
        function register(event) {
            var x1, x2, x3, x4, x5, x6, x7, x8, x9, exp1, exp2, exp3, exp4, exp5, exp6, exp7, exp8, exp9;

            //values
            var a1 = document.getinfo.f_name.value;
            var a2 = document.getinfo.l_name.value;
            var a3 = document.getinfo.number.value;
            var a4 = document.getinfo.city.value;
            var a5 = document.getinfo.state.value;
            var a6 = document.getinfo.email.value;
            var a7 = document.getinfo.u_name.value;
            var a8 = document.getinfo.password.value;
            var a9 = document.getElementById("dob").value;
            var d = new Date(a9);
            var year = d.getFullYear();

            //regexps
            exp1 = RegExp("^[a-z A-Z]+$");
            exp2 = RegExp("^[a-z A-Z]+$");
            exp3 = RegExp("^[0-9]{10}$");
            exp4 = RegExp("^[a-z A-Z]+$");
            exp5 = RegExp("^[a-z A-Z]+$");
            exp6 = RegExp("^[a-z A-Z 0-9]+\@gmail.com$");
            exp7 = RegExp("^[a-z A-Z 0-9]{5,20}$");
            exp8 = RegExp("^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,20}$");
            exp9 = new Date().getFullYear();

            //tested values in boolean
            x1 = exp1.test(a1);
            x2 = exp2.test(a2);
            x3 = exp3.test(a3);
            x4 = exp4.test(a4);
            x5 = exp5.test(a5);
            x6 = exp6.test(a6);
            x7 = exp7.test(a7);
            x8 = exp8.test(a8);
            if ((exp9 - year) >= 18) {
                x9 = 1;
            } else {
                x9 = 0;
            }

            //checking
            if (!x1 || !x2) {
                alert("Enter a valid name containing only letters.");
                event.preventDefault();
            }
            if (!x3) {
                alert("Enter a valid number containing only numbers.");
                event.preventDefault();
            }
            if (!x4 || !x5) {
                alert("Wrong city or state name");
                event.preventDefault();
            }
            if (!x6) {
                alert("Enter a valid Email.");
                event.preventDefault();
            }
            if (!x9) {
                alert("Only students above 17 are allowed.");
                event.preventDefault();
            }
            if (!x7) {
                alert("Username must be 5-20 digits or letters.");
                event.preventDefault();
            }
            if (!x8) {
                alert("Password must be 8-20 letters with one digit and special character.");
                event.preventDefault();
            }
            if (x1 && x2 && x3 && x4 && x5 && x6 && x7 && x8 && x9) {
                alert("Account Created Successfully.");
            } else {
                window.location.reload();
            }
        }
    </script>
</body>

</html>