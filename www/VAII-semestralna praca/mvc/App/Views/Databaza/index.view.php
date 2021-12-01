<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="Styly.css">
    <meta charset="UTF-8">
    <title>Simulátor</title>
</head>

<body>
<h1 class="simulator">Simulátor šírenia ochorenia COVID-19</h1>
<p class="simulator">Na tejto stránke sa nachádza jednoduchý simulátor šírenia ochorenia COVID-19. Priamo na tejto stránke nájdete tabuľku
    denných prírastkov ochorenia spolu so sumárnymi štatistikami šírenia. Na vedľajších stránkach (na lište označených
    <b style="color:red">červene</b>) sa nachádzajú formuláre,
    prostredníctvom ktorých je s tabuľkou možné manipulovať. </p>


<br>

<table style="width:25%" id="tabulka">

    <tr>
        <th>Záznam</th>
        <th>Dátum</th>
        <th>Počet nových nákaz</th>
        <th>Úpravy</th>
    </tr>

    <?php
    $datumy = [];
    $poctyBakazenych = [];
    for ($i = 0; $i < count($data[0]); $i++) { ?>
            <?php array_push($datumy, $data[0][$i]->getDatum());
            array_push($poctyBakazenych, $data[0][$i]->getPocetNakazenych());?>
        <tr>
            <td><?php echo $data[0][$i]->getCisloZaznamu() ?></td>
            <td><?php echo $data[0][$i]->getDatum() ?></td>
            <td><?php echo $data[0][$i]->getPocetNakazenych()?></td>

            <td>
                <div class="upravaButton"><a href="?c=Databaza&a=zmazZaznam&cislo=<?php echo $data[0][$i]->getCisloZaznamu()?>" class="btn btn-secondary btn-sm active" role="button" aria-pressed="true">Zmaž</a></div>
                <div class="upravaButton"><a href="?c=Databaza&a=editujZaznam&cislo=<?php echo $data[0][$i]->getCisloZaznamu()?>" class="btn btn-secondary btn-sm active" role="button" aria-pressed="true">Uprav</a></div>
            </td>


        </tr>
    <?php } ?>

</table>

<br>

<pre>Priemerný počet nových denných nákaz je : <b><?= /** @var Array $data */
        $data['priemer'] ?></b>
Minimálny počet nových denných nákaz je : <b><?= /** @var Array $data */
        $data['minimum'] ?></b>
Maximálny počet nových denných nákaz je : <b><?= /** @var Array $data */
        $data['maximum'] ?></b>
</pre>

<div id="graf" style="width:500px;height:250px;"></div>
<script graf>
    GRAF = document.getElementById('graf');
    let datumy = <?php echo json_encode($datumy); ?>;
    let poctyNakazenych = <?php echo json_encode($poctyBakazenych); ?>;

    //1) combine the arrays:
    var list = [];
    for (var j = 0; j < datumy.length; j++)
        list.push({'datum': datumy[j], 'pocetNakazenych': poctyNakazenych[j]});

    //2) sort:
    list.sort(function(a, b) {
        return ((a.datum < b.datum) ? -1 : ((a.datum == b.datum) ? 0 : 1));
    });

    //3) separate them back out:
    for (var k = 0; k < list.length; k++) {
        datumy[k] = list[k].datum;
        poctyNakazenych[k] = list[k].pocetNakazenych;
    }

    Plotly.newPlot( GRAF, [{

        x: datumy,

        y: poctyNakazenych }], {

        margin: { t: 0 } } );
</script>

</body>
