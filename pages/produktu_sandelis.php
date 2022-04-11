<?php

$database = mysqli_connect('localhost', 'root', '', 'parduotuves_sandelis');

$submit = $_GET['action'] ?? null;

if ($submit == 'add_product') {
    $kategorija = $_POST['produkto_kategorija'];
    $pavadinimas = $_POST['produkto_pavadinimas'];
    $kaina = $_POST['kaina'];
    $galiojimo_dienos = $_POST['galiojimo_dienos'];

    if (empty($kategorija)) {
        echo '<pre>';
        echo 'Iveskite produkto kategorija';
        echo '</pre>';
    }

    if (empty($pavadinimas)) {
        echo '<pre>';
        echo 'Iveskite produkto pavadinima';
        echo '</pre>';
    }

    if (empty($kaina)) {
        echo '<pre>';
        echo 'Iveskite kaina';
        echo '</pre>';
    }

    if (empty($galiojimo_dienos)) {
        echo '<pre>';
        echo 'Iveskite galiojimo laikotarpi (dienomis)';
        echo '</pre>';

    } else {

        $sql = "insert into produktai (kategorija, pavadinimas, kaina, galiojimo_dienos) value ('$kategorija','$pavadinimas','$kaina','$galiojimo_dienos')";
        mysqli_query($database, $sql);


    }
}

// Pasirenku is duomenu bazes produktai lentele
$result = mysqli_query($database, 'select * from produktai');

// Pasiimta lentele paverciu i array
$produktai = mysqli_fetch_all($result, MYSQLI_ASSOC);

?>

<style>
    table, th, td {
        border: 1px solid black;
    }
</style>

<h1>Produktu Sandelis</h1>
<hr>

<form action="produktu_sandelis.php?action=add_product" method="post"">
<fieldset>
    <legend> Produktu pridejimas</legend>
    <label for="produkto_kategorija">Produkto kategorija:</label><br>
    <input type="text" id="produkto_kategorija" name="produkto_kategorija"><br>
    <label for="produkto_pavadinimas">Produkto pavadinimas:</label><br>
    <input type="text" id="produkto_pavadinimas" name="produkto_pavadinimas"><br>
    <label for="kaina">Kaina:</label><br>
    <input type="text" id="kaina" name="kaina"><br>
    <label for="galiojimo_dienos">Galiojimo dienos:</label><br>
    <input type="number" id="galiojimo_dienos" name="galiojimo_dienos"><br>
    <hr>
    <input type="submit" value="Prideti"><br><br>
<!--    <select name="category_id">-->
<!--        --><?php //foreach ($categories as $category) { ?>
<!--            <option value="--><?php //echo $category['id'] ?><!--">--><?php //echo $category['kategorija'] ?><!--</option>-->
<!--        --><?php //} ?>
<!--    </select><br/>-->
</fieldset>
</form>

<table>
    <tr>
        <th>Produkto kategorija</th>
        <th>Pavadinimas</th>
        <th>Kaina</th>
        <th>Galiojimo dienos</th>
    </tr>
    <?php foreach ($produktai as $produktas) { ?>
        <tr>
            <td>
                <?php echo $produktas['kategorija'] ?>
            </td>
            <td>
                <?php echo $produktas['pavadinimas'] ?>
            </td>
            <td>
                <?php echo $produktas['kaina'] ?>
            </td>
            <td>
                <?php echo $produktas['galiojimo_dienos'] ?>
            </td>
        </tr>
    <?php } ?>
</table>

<!--<h1>Prekiu Kategorijos</h1>-->
<!--<table>-->
<!--    <thead>-->
<!--    <tr>-->
<!--        <th>Darzoves</th>-->
<!--        <th>Vaisiai</th>-->
<!--        <th>Pieno Produktai</th>-->
<!--        <th>Mesos produktai</th>-->
<!--        <th>Duonos gaminiai</th>-->
<!--    </tr>-->
<!--    </thead>-->
<!--    <tbody>-->
<!--    <tr>-->
<!--        <td>a</td>-->
<!--        <td>b</td>-->
<!--        <td>c</td>-->
<!--        <td>d</td>-->
<!--        <td>e</td>-->
<!--    </tr>-->
<!--    </tbody>-->
<!--</table>-->