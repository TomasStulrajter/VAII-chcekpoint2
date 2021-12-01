<h2 class="simulator">Vloženie nového záznamu</h2>
<p class="simulator">Tento formulár umožňuje zadať do tabuľky nový záznam. </p>
<p class="simulator">Do prvého poľa zadajte dátum, do druhého počet nakazených za daný deň. </p>
<p class="simulator">Poznámka - dátum sa zadáva vo formáte <b>DD-MM-RRRR</b> (deň-mesiac-rok).</p>

<form method="post">
    <input type="date" name="datum">
    <input type="number" name="pocetNakazenych", placeholder="0">
    <input type="submit" value="Pridaj záznam">
</form>

<br>

<p class="error"> <?= /** @var Array $data */
    $data['chyba'] ?>
</p>
