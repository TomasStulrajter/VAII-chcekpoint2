<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="https://cdn.plot.ly/plotly-2.6.3.min.js"></script>

    <link rel="stylesheet" href="Styly.css">
    <meta charset="UTF-8">
    <title>Hlavná stránka</title>
</head>

<body class="main">
<h1 id = "vrchol" class="main">COVID-19 na Slovensku - Analýza za mesiace september a október 2021</h1>
<p class="main">Na tejto stránke sa nachádzajú prehľadne usporiadané informácie z analýzy výskytu choroby COVID-19 a miery zaočkovania
    na Slovensku počas septembra a októbra tohoto roku, ktorú vypracoval Úrad verejného zdravotníctva. Všetky údaje
    zverejnené na tejto stránke sú prevzaté z oficiálneho dokumentu vydaného ÚVZ, ku ktorému prikladám odkaz v hlavnom menu stránky.
    Stránka obsahuje aj jednoduchý simulátor šírenia vírusu.</p>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="?c=Legacy&a=index">Hlavné informácie</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#hlavneMenu" aria-controls="hlavneMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Hlavne menu -->
    <div class="collapse navbar-collapse" id="hlavneMenu">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="?c=Legacy&a=faq">FAQ</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?c=Legacy&a=statistiky">Štatistiky</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="https://korona.gov.sk/wp-content/uploads/2021/10/tk_covid_automat_a_epid_situacia_211013.pdf" target="_blank">Analýza v PDF</a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="?c=Databaza&a=index" style="color:red">Simulátor</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?c=Databaza&a=vlozZaznam" style="color:indianred">Vlož nový záznam</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?c=Databaza&a=zmazZaznam" style="color:indianred">Zmaž záznam</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="?c=Databaza&a=editujZaznam" style="color:indianred">Uprav záznam</a>
            </li>

        </ul>
    </div>
</nav>

</div>
<div class="web-content">
    <?= $contentHTML ?>
</div>

</body>
</html>

