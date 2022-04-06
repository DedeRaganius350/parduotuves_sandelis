<form action="index.php?page=register" method="post">
    <h1>Registracijos Forma</h1>
    <fieldset>
        <legend>Registracija:</legend>
        <label for="vardas">Vardas:</label>
        <input type="text" id="vardas" name="vardas">
        <br>
        <label for="pareigybes">Pareigybes:</label>
        <select name="pareigybes" id="pareigybes">
            <option value="sandelio darbuotojas">Sandelio darbuotojas</option>
            <option value="parduotuves darbuotojas">Parduotuves darbuotojas</option>
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