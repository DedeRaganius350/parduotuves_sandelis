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

        $pareigybes = $_POST['pareigybes'];

        if (empty($pastas)) {

            echo 'Blogas pastas';

//            exit();

        } else if (empty($slaptazodis)) {

            echo 'Blogas slaptazodis';


//            exit();

        } else {

            $sql = "SELECT * FROM darbuotojai WHERE pastas='$pastas' AND slaptazodis='$slaptazodis' AND pareigybe='$pareigybes'";
//            var_dump($sql);
            $result = mysqli_query($database, $sql);
//            print_r($result);
            if (mysqli_num_rows($result) === 1) {

                $row = mysqli_fetch_assoc($result);
//var_dump($row);
                if ($row['pastas'] === $pastas && $row['slaptazodis'] === $slaptazodis && $row['pareigybe'] === 'sandelio_darbuotojas') {

                    echo "Logged in!";

                    $_SESSION['pastas'] = $row['pastas'];

                    header("Location: produktu_sandelis.php");


                } else if ($row['pastas'] === $pastas && $row['slaptazodis'] === $slaptazodis && $row['pareigybe'] === 'parduotuves_darbuotojas') {

                    echo "Logged in!";

                    $_SESSION['pastas'] = $row['pastas'];

                    header("Location: parduotuves_valdymas.php");

                }

            } else {

                echo 'Netinka pastas arba slaptazodis arba pasirinktas statusas';

            }

        }

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
    <label for="pareigybes">Pasirinkite statusa:</label>
    <select name="pareigybes" id="pareigybes">
        <option value="sandelio_darbuotojas" name="sandelio_darbuotojas">Sandelio darbuotojas</option>
        <option value="parduotuves_darbuotojas" name="parduotuves_ darbuotojas">Parduotuves darbuotojas</option>
        <option value="pirkejas" name="pirkejas">Pirkejas</option>
    </select><br><br>
    <input type="submit" value="Prisijungti">
    <hr>

</fieldset>
</form>
