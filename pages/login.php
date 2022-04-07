<?php
$database = mysqli_connect('localhost', 'root', '', 'parduotuves_sandelis');


$submit = $_GET['action'] ?? null;

if ($submit == 'login_employee') {

//    session_start();

    if (isset($_POST['pastas']) && isset($_POST['slaptazodis'])) {

        function validate($data)
        {

            $data = trim($data);

            $data = stripslashes($data);

            $data = htmlspecialchars($data);

            return $data;

        }

        $pastas = validate($_POST['pastas']);

        $slaptazodis = validate($_POST['slaptazodis']);

        if (empty($pastas)) {

            echo 'Blogas pastas';

//            exit();

        } else if (empty($slaptazodis)) {

            echo 'Blogas slaptazodis';


//            exit();

        } else {

            $sql = "SELECT * FROM darbuotojai WHERE pastas='$pastas' AND slaptazodis='$slaptazodis'";

            $result = mysqli_query($database, $sql);

            if (mysqli_num_rows($result) === 1) {

                $row = mysqli_fetch_assoc($result);

                if ($row['pastas'] === $pastas && $row['slaptazodis'] === $slaptazodis) {

                    echo "Logged in!";

                    $_SESSION['pastas'] = $row['pastas'];

                    header("Location: produktu_sandelis.php");

                    exit();

                } else {

                    echo 'Netinka pastas arba slaptazodis';

                    exit();

                }

            } else {

                echo 'Netinka pastas arba slaptazodis';

                exit();

            }

        }

    } else {

        header("Location: index.php");

        exit();

    }
}

?>

<h1>Parduotuve Sandelis</h1>

<form action="login.php?action=login_employee" method="post"">
<fieldset>
    <legend>Prisijungimas:</legend>
    <label for="pastas">Pastas:</label>
    <input type="text" id="pastas" name="pastas"><br><br>
    <label for="slaptazodis">Slaptazodis:</label>
    <input type="text" id="slaptazodis" name="slaptazodis"><br><br>
    <input type="submit" value="Prisijungti">
    <hr>

</fieldset>
</form>
