<?php
$database = mysqli_connect('localhost', 'root', '', 'parduotuves_sandelis');

$submit = $_GET['forma'] ?? null;

if ($submit == 'create_employee') {
    $vardas = $_POST['vardas'];
    $pareigybes = $_POST['pareigybes'];
    $pastas = $_POST['pastas'];
    $slaptazodis = $_POST['slaptazodis'];

    if (empty($vardas)) {
        echo '<pre>';
        echo 'Nera vardo';
        echo '</pre>';
    }

    if (empty($pastas)) {
        echo '<pre>';
        echo 'Nera pasto';
        echo '</pre>';
    }

    if (empty($slaptazodis)) {
        echo '<pre>';
        echo 'Nera slaptazodzio';
        echo '</pre>';
    } else {

        $sql = "insert into darbuotojai (vardas, pareigybe, pastas, slaptazodis) value ('$vardas','$pareigybes','$pastas','$slaptazodis')";
        mysqli_query($database, $sql);
        header('Location: produktu_sandelis.php');

    }
}

?>


<form action="registration.php?forma=create_employee" method="post">
    <h1>Registracijos Forma</h1>
    <fieldset>
        <legend>Registracija:</legend>
        <label for="vardas">Vardas:</label>
        <input type="text" id="vardas" name="vardas">
        <br>
        <label for="pareigybes">Pareigybes:</label>
        <select name="pareigybes" id="pareigybes">
            <option value="sandelio_darbuotojas" name="sandelio_darbuotojas">Sandelio darbuotojas</option>
            <option value="parduotuves_darbuotojas" name="parduotuves_ darbuotojas">Parduotuves darbuotojas</option>
        </select>
        <br>
        <label for="pastas">Pastas:</label>
        <input type="text" id="pastas" name="pastas">
        <br>
        <label for="slaptazodis">Slaptazodis:</label>
        <input type="text" id="slaptazodis" name="slaptazodis">
        <br>
        <hr>
        <input type="submit" value="Registruotis">
    </fieldset>
</form>