<h2 class="simulator">Zmazanie záznamu</h2>
<p class="simulator">Tento formulár umožňuje zmazať ktorýkoľvek záznam z tabuľky.</p>
<p class="simulator">Do poľa zadajte poradové číslo záznamu. </p>

<form method="post">
    <input type="number" name="cisloZaznamu" value="<?= /** @var Array $data */
    $data['cislo'] ?>">
    <input type="submit" value="Zmaž záznam">
</form>

<br>

<p class="error"> <?= /** @var Array $data */
    $data['chyba'] ?>
</p>
