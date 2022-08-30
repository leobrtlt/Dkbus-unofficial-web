<?php require_once('inc/header.php'); ?>
<div class="container">
    <div class="columns">
        <div class="column is-12 main">



            <span class="heading">Perturbation du réseau <span style="font-size: 12.5px;color: #9f9f9f;">hors déviations
                    de ligne</span></span>
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



            <span class="heading">Lignes</span>

            <section class="info-tiles" style="margin-top:20px;">
                <style>
                    table {
                        width: 100%;
                        border-collapse: collapse;
                        background-color: #2b3350 !important;
                        ;
                        color: #ededed !important;
                    }

                    th {
                        background: #2e3756;
                        color: #fff !important;
                    }

                    td,
                    th {
                        padding: 10px;
                        border: 1px solid #ccc;
                        text-align: left;
                        font-size: 18px;
                    }

                    .labels tr td {
                        background-color: #2a334f;
                        font-weight: bold;
                        color: #fff;
                        border-radius: 3px;
                    }

                    .labels tr td label {
                        width: 100%;
                        position: relative;
                        float: right;
                        cursor: pointer !important;
                    }

                    .label tr td label {
                        display: block;
                    }

                    [data-toggle="toggle"] {
                        display: none;
                        float: left;
                    }
                </style>



                <table class="table">


                <?php 

    // foreach ($arrets as $arret) {
    //     if(explode(':', $arret['id'])[0] == 1){
    //         echo $arret['name'].'<br>';
    //     }
    // }

    foreach ($lignes as $ligne) {
        if($ligne['reseau'] == "1"){
            ?>

            <tbody class="labels">
                <tr>
                    <td colspan="5" style="background:#<?= $ligne['couleur']; ?>">
                        <label for="lignec1">Ligne <?= $ligne['ligne']; ?> - <?= $ligne['destination']; ?></label>
                        <input type="checkbox" name="lignec1" id="lignec1" data-toggle="toggle">
                    </td>
                </tr>
            </tbody>
            <tbody class="hide" style="display:none;">
                <!-- <tr>
                    <td style="width: 10%;">17-09-2020</td>
                    <td style="width: 10%;">31-12-2022</td>
                    <td>Pour cause de Marché de Grande-Synthe tous les jeudis de 6h00 à 15h00 dans les deux sens
                        de circulation entre les arrêts Garnaerstraete et René Carême. Les arrêts Garnaerstaete
                        vers Leffrinckoucke Fort des Dunes, Saint Jacques, Daudet, Michelet et René Carême vers
                        Grande-Synthe Puythouck ne pourront être desservis. L'arrêt René Carême de la Ligne C4
                        vers Grande-Synthe Puythouck est à votre disposition</td>
                </tr> -->
            </tbody>

<?php
        }
        
    }
?>

                    
                </table>
            </section>
        </div>
    </div>

</div>
<br>
<br>
<footer>
    <p>© DunkerqueBusInfo, <?= date('Y'); ?><br />
        DunkerqueBusInfo (DBI) n'est en aucun cas affilié ou partenaire à DK'BUS.<br />
        DK'BUS est une filliale du groupe <a href="https://transdev.com/" target="_blank">TransDev</a><br />
        Conçu par <a href="https://leoberteloot.fr/">Léo Berteloot</a></p>
    <br>
    <img src="http://www.mon-compteur.fr/html_c01genv2-235964-2" />
</footer>

<script>
    $(document).ready(function () {
        $('[data-toggle="toggle"]').change(function () {
            $(this).parents().next('.hide').toggle();
        });
    });
</script>
</body>

</html>