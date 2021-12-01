<h2 class="simulator">Úprava záznamu</h2>
<p class="simulator">Tento formulár umožňuje upraviť už existujúci záznam z tabuľky.</p>
<p class="simulator">Do prvého poľa zadajte číslo záznamu, do druhého dátum a do tretieho počet nakazených za daný deň. </p>
<p class="simulator">Poznámka - dátum sa zadáva vo formáte <b>DD-MM-RRRR</b> (deň-mesiac-rok).</p>

<form method="post">

    <input type="number" name="cisloZaznamu" value="<?= /** @var Array $data */
    $data['cislo'] ?>">
    <input type="date" name="novyDatum">
    <input type="number" name="novyPocetNakazenych" placeholder="0">
    <input type="submit" value="Uprav záznam">
</form>

<br>

<p class="error"> <?= /** @var Array $data */
    $data['chyba'] ?>
</p>
