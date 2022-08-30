<?php require_once('inc/header.php'); ?>
    <div class="container">
        <div class="columns">
            <div class="column is-12 main">




                <span class="heading">Perturbation du réseau <span style="font-size: 12.5px;color: #9f9f9f;">hors déviations programmées</span></span>
                <section id="order">
                    <div class="order-body">
<?php 

$fileContents= file_get_contents("https://www.dkbus.com/deviations.php");
        $fileContents = str_replace(array("\n", "\r", "\t"), '', $fileContents);
        $fileContents = trim(str_replace('"', "'", $fileContents));
        $simpleXml = simplexml_load_string($fileContents);
        $json = json_decode(json_encode($simpleXml), true);


		if($json['perturbation']['titre_perturbation'] == "Aucune perturbation sur le réseau"){
			?>
				<article class="media order shadow success">
                            <figure class="media-left">
                                <i class="fas fa-check"></i>
                            </figure>
                            <div class="media-content">
                                <div class="content">
                                    <p>
                                        <strong><?= $json['perturbation']['titre_perturbation']; ?></strong>
                                        <br>
                                        <small>DunkerqueBusInfo, <?= $json['perturbation']['message_perturbation']; ?> 
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </article>
			<?php
		}else{
			?>
			<article class="media order shadow warning">
                            <figure class="media-left">
							<i class="fas fa-exclamation-triangle"></i>
                            </figure>
                            <div class="media-content">
                                <div class="content">
									<p>
                                        <strong><?= $json['perturbation']['titre_perturbation']; ?></strong>
                                        <br>
                                        <small><?= $json['perturbation']['message_perturbation']; ?> 
                                        </small>
                                    </p>
                                </div>
                            </div>
                        </article>
			<?php
		}

 ?>
                    </div>
                </section>


				<span class="heading">Accès rapide <span style="font-size: 12.5px;color: #9f9f9f;">Lignes Chrono & Noctibus uniquement</span></span>
				<section class="info-tiles">
                    <div class="tile is-ancestor has-text-centered">

                        <a class="tile is-parent" href="#">
                            <article class="tile is-child box" style="background:#008000;">
                                <p class="subtitle">Ligne C1</p>
                            </article>
						</a>
                        <a class="tile is-parent" href="#">
                            <article class="tile is-child box" style="background:#FF0000;">
                                <p class="subtitle">Ligne C2</p>
                            </article>
						</a>
                        <a class="tile is-parent" href="#">
                            <article class="tile is-child box" style="background:#3366FF;">
                                <p class="subtitle">Ligne C3</p>
                            </article>
						</a>
                        <a class="tile is-parent" href="#">
                            <article class="tile is-child box" style="background:#FF6600;">
                                <p class="subtitle">Ligne C4</p>
                            </article>
						</a>
						<a class="tile is-parent" href="#">
                            <article class="tile is-child box" style="background:#800080;">
                                <p class="subtitle">Ligne C5</p>
                            </article>
						</a>
						<a class="tile is-parent" href="#">
                            <article class="tile is-child box" style="background:#333399;">
                                <p class="subtitle">Ligne N1</p>
                            </article>
						</a>
						<a class="tile is-parent" href="#">
                            <article class="tile is-child box" style="background:#00CCFF;">
                                <p class="subtitle">Ligne N2</p>
                            </article>
						</a>
                    </div>
                </section>



                <span class="heading">Informations utiles</span>
                <section class="info-tiles">
                    <div class="tile is-ancestor has-text-centered">

                        <a class="tile is-parent" href="#">
                            <article class="tile is-child box">
                                <p class="title counter"><?= $stats_bus_online; ?></p>
                                <p class="subtitle">Bus en circulations</p>
                            </article>
						</a>
                        <a class="tile is-parent" href="#">
                            <article class="tile is-child box">
                                <p class="title counter"><?= $stats_bus_offline; ?></p>
                                <p class="subtitle">Bus Hors Services</p>
                            </article>
                        </a>
                        <a class="tile is-parent" href="#">
                            <article class="tile is-child box">
                                <p class="title counter"><?= $stats_lignes; ?></p>
                                <p class="subtitle">Lignes</p>
                            </article>
                        </a>
                        <a class="tile is-parent" href="#">
                            <article class="tile is-child box">
                                <p class="title counter"><?= $stats_deviations; ?></p>
                                <p class="subtitle">Deviations</p>
                            </article>
						</a>
                    </div>
                </section>
            </div>
        </div>

    </div>
    <br>
    <br>
	<footer>
	<p>© DunkerqueBusInfo, <?= date('Y'); ?><br/>
	DunkerqueBusInfo (DBI) n'est en aucun cas affilié ou partenaire à DK'BUS.<br/>
	DK'BUS est une filliale du groupe <a href="https://transdev.com/" target="_blank">TransDev</a><br/>
	Conçu par <a href="https://leoberteloot.fr/">Léo Berteloot</a></p>
	<br>
	<img src="http://www.mon-compteur.fr/html_c01genv2-235964-2"/>
	</footer>
</body>

</html>