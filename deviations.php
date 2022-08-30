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



            <span class="heading">Déviations <span style="font-size: 12.5px;color: #9f9f9f;">Suivi des
                    déviations</span></span>

            <section id="order">
                <div class="order-body">
                    <article class="media order shadow">
                        <figure class="media-left">
                            <i class="fas fa-exclamation-triangle"></i>
                        </figure>
                        <div class="media-content">
                            <div class="content">
                                <p>
                                    <strong>Informations</strong>
                                    <br>
                                    <small>Les déviations ne sont, pour le moment, non détecter comme des
                                        "perturbations" du réseau DK'BUS. Les perturbations du réseau sont, à ce
                                        jour, uniquement dû à des événements imprévus.
                                    </small>
                                </p>
                            </div>
                        </div>
                    </article>
                </div>
            </section>

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
                    <tbody>

                    <tbody class="labels">
                        <tr>
                            <td colspan="5" style="background:#008000;">
                                <label for="lignec1">Ligne C1</label>
                                <input type="checkbox" name="lignec1" id="lignec1" data-toggle="toggle">
                            </td>
                        </tr>
                    </tbody>
                    <tbody class="hide">
                        <?php 
                    foreach ($deviations['deviations']['deviation'] as $dvt) {
                        if($dvt['ligne'] == "C1"){
                            ?>
                        <tr>
                            <td style="width: 10%;"><?= $dvt['date_debut']; ?></td>
                            <td style="width: 10%;"><?= $dvt['date_fin']; ?></td>
                            <td><?= $dvt['text_deviation']; ?></td>
                        </tr>
                        <?php
                        }
                    }
                    ?>

                    </tbody>
                    <tbody class="labels">
                        <tr>
                            <td colspan="5" style="background:#FF0000;">
                                <label for="lignec2">Ligne C2</label>
                                <input type="checkbox" name="lignec2" id="lignec2" data-toggle="toggle">
                            </td>
                        </tr>
                    </tbody>
                    <tbody class="hide">
                        <?php 
                        foreach ($deviations['deviations']['deviation'] as $dvt) {
                            if($dvt['ligne'] == "C2"){
                                ?>
                        <tr>
                            <td style="width: 10%;"><?= $dvt['date_debut']; ?></td>
                            <td style="width: 10%;"><?= $dvt['date_fin']; ?></td>
                            <td><?= $dvt['text_deviation']; ?></td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>

                    <tbody class="labels">
                        <tr>
                            <td colspan="5" style="background:#3366FF;">
                                <label for="lignec3">Ligne C3</label>
                                <input type="checkbox" name="lignec3" id="lignec3" data-toggle="toggle">
                            </td>
                        </tr>
                    </tbody>
                    <tbody class="hide">
                        <?php 
                        foreach ($deviations['deviations']['deviation'] as $dvt) {
                            if($dvt['ligne'] == "C3"){
                                ?>
                        <tr>
                            <td style="width: 10%;"><?= $dvt['date_debut']; ?></td>
                            <td style="width: 10%;"><?= $dvt['date_fin']; ?></td>
                            <td><?= $dvt['text_deviation']; ?></td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>

                    <tbody class="labels">
                        <tr>
                            <td colspan="5" style="background:#FF6600;">
                                <label for="lignec4">Ligne C4</label>
                                <input type="checkbox" name="lignec4" id="lignec4" data-toggle="toggle">
                            </td>
                        </tr>
                    </tbody>
                    <tbody class="hide">
                        <?php 
                        foreach ($deviations['deviations']['deviation'] as $dvt) {
                            if($dvt['ligne'] == "C4"){
                                ?>
                        <tr>
                            <td style="width: 10%;"><?= $dvt['date_debut']; ?></td>
                            <td style="width: 10%;"><?= $dvt['date_fin']; ?></td>
                            <td><?= $dvt['text_deviation']; ?></td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>

                    <tbody class="labels">
                        <tr>
                            <td colspan="5" style="background:#800080;">
                                <label for="lignec5">Ligne C5</label>
                                <input type="checkbox" name="lignec5" id="lignec5" data-toggle="toggle">
                            </td>
                        </tr>
                    </tbody>
                    <tbody class="hide">
                        <?php 
                        foreach ($deviations['deviations']['deviation'] as $dvt) {
                            if($dvt['ligne'] == "C5"){
                                ?>
                        <tr>
                            <td style="width: 10%;"><?= $dvt['date_debut']; ?></td>
                            <td style="width: 10%;"><?= $dvt['date_fin']; ?></td>
                            <td><?= $dvt['text_deviation']; ?></td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>

                    <tbody class="labels">
                        <tr>
                            <td colspan="5" style="background:#993366;">
                                <label for="ligne14">Ligne 14</label>
                                <input type="checkbox" name="ligne14" id="ligne14" data-toggle="toggle">
                            </td>
                        </tr>
                    </tbody>
                    <tbody class="hide">
                        <?php 
                        foreach ($deviations['deviations']['deviation'] as $dvt) {
                            if($dvt['ligne'] == "14"){
                                ?>
                        <tr>
                            <td style="width: 10%;"><?= $dvt['date_debut']; ?></td>
                            <td style="width: 10%;"><?= $dvt['date_fin']; ?></td>
                            <td><?= $dvt['text_deviation']; ?></td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>

                    <tbody class="labels">
                        <tr>
                            <td colspan="5" style="background:#87B8BA;">
                                <label for="ligne15">Ligne 15</label>
                                <input type="checkbox" name="ligne15" id="ligne15" data-toggle="toggle">
                            </td>
                        </tr>
                    </tbody>
                    <tbody class="hide">
                        <?php 
                        foreach ($deviations['deviations']['deviation'] as $dvt) {
                            if($dvt['ligne'] == "15"){
                                ?>
                        <tr>
                            <td style="width: 10%;"><?= $dvt['date_debut']; ?></td>
                            <td style="width: 10%;"><?= $dvt['date_fin']; ?></td>
                            <td><?= $dvt['text_deviation']; ?></td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>

                    <tbody class="labels">
                        <tr>
                            <td colspan="5" style="background:#99CCFF;">
                                <label for="ligne16">Ligne 16</label>
                                <input type="checkbox" name="ligne16" id="ligne16" data-toggle="toggle">
                            </td>
                        </tr>
                    </tbody>
                    <tbody class="hide">
                        <?php 
                        foreach ($deviations['deviations']['deviation'] as $dvt) {
                            if($dvt['ligne'] == "16"){
                                ?>
                        <tr>
                            <td style="width: 10%;"><?= $dvt['date_debut']; ?></td>
                            <td style="width: 10%;"><?= $dvt['date_fin']; ?></td>
                            <td><?= $dvt['text_deviation']; ?></td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>

                    <tbody class="labels">
                        <tr>
                            <td colspan="5" style="background:#FFCC00;">
                                <label for="ligne17">Ligne 17</label>
                                <input type="checkbox" name="ligne17" id="ligne17" data-toggle="toggle">
                            </td>
                        </tr>
                    </tbody>
                    <tbody class="hide">
                        <?php 
                        foreach ($deviations['deviations']['deviation'] as $dvt) {
                            if($dvt['ligne'] == "17"){
                                ?>
                        <tr>
                            <td style="width: 10%;"><?= $dvt['date_debut']; ?></td>
                            <td style="width: 10%;"><?= $dvt['date_fin']; ?></td>
                            <td><?= $dvt['text_deviation']; ?></td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>

                    <tbody class="labels">
                        <tr>
                            <td colspan="5" style="background:#CC99FF;">
                                <label for="ligne18">Ligne 18</label>
                                <input type="checkbox" name="ligne18" id="ligne18" data-toggle="toggle">
                            </td>
                        </tr>
                    </tbody>
                    <tbody class="hide">
                        <?php 
                        foreach ($deviations['deviations']['deviation'] as $dvt) {
                            if($dvt['ligne'] == "18"){
                                ?>
                        <tr>
                            <td style="width: 10%;"><?= $dvt['date_debut']; ?></td>
                            <td style="width: 10%;"><?= $dvt['date_fin']; ?></td>
                            <td><?= $dvt['text_deviation']; ?></td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>

                    <tbody class="labels">
                        <tr>
                            <td colspan="5" style="background:#993300;">
                                <label for="ligne19">Ligne 19</label>
                                <input type="checkbox" name="ligne19" id="ligne19" data-toggle="toggle">
                            </td>
                        </tr>
                    </tbody>
                    <tbody class="hide">
                        <?php 
                        foreach ($deviations['deviations']['deviation'] as $dvt) {
                            if($dvt['ligne'] == "19"){
                                ?>
                        <tr>
                            <td style="width: 10%;"><?= $dvt['date_debut']; ?></td>
                            <td style="width: 10%;"><?= $dvt['date_fin']; ?></td>
                            <td><?= $dvt['text_deviation']; ?></td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>

                    <tbody class="labels">
                        <tr>
                            <td colspan="5" style="background:#FF8080;">
                                <label for="ligne20">Ligne 20</label>
                                <input type="checkbox" name="ligne20" id="ligne20" data-toggle="toggle">
                            </td>
                        </tr>
                    </tbody>
                    <tbody class="hide">
                        <?php 
                        foreach ($deviations['deviations']['deviation'] as $dvt) {
                            if($dvt['ligne'] == "20"){
                                ?>
                        <tr>
                            <td style="width: 10%;"><?= $dvt['date_debut']; ?></td>
                            <td style="width: 10%;"><?= $dvt['date_fin']; ?></td>
                            <td><?= $dvt['text_deviation']; ?></td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>

                    <tbody class="labels">
                        <tr>
                            <td colspan="5" style="background:#3EA791;">
                                <label for="ligne21">Ligne 21</label>
                                <input type="checkbox" name="ligne21" id="ligne21" data-toggle="toggle">
                            </td>
                        </tr>
                    </tbody>
                    <tbody class="hide">
                        <?php 
                        foreach ($deviations['deviations']['deviation'] as $dvt) {
                            if($dvt['ligne'] == "21"){
                                ?>
                        <tr>
                            <td style="width: 10%;"><?= $dvt['date_debut']; ?></td>
                            <td style="width: 10%;"><?= $dvt['date_fin']; ?></td>
                            <td><?= $dvt['text_deviation']; ?></td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>

                    <tbody class="labels">
                        <tr>
                            <td colspan="5" style="background:#999999;">
                                <label for="ligne22">Ligne 22</label>
                                <input type="checkbox" name="ligne22" id="ligne22" data-toggle="toggle">
                            </td>
                        </tr>
                    </tbody>
                    <tbody class="hide">
                        <?php 
                        foreach ($deviations['deviations']['deviation'] as $dvt) {
                            if($dvt['ligne'] == "22"){
                                ?>
                        <tr>
                            <td style="width: 10%;"><?= $dvt['date_debut']; ?></td>
                            <td style="width: 10%;"><?= $dvt['date_fin']; ?></td>
                            <td><?= $dvt['text_deviation']; ?></td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>

                    <tbody class="labels">
                        <tr>
                            <td colspan="5" style="background:#99CC00;">
                                <label for="ligne23">Ligne 23</label>
                                <input type="checkbox" name="ligne23" id="ligne23" data-toggle="toggle">
                            </td>
                        </tr>
                    </tbody>
                    <tbody class="hide">
                        <?php 
                        foreach ($deviations['deviations']['deviation'] as $dvt) {
                            if($dvt['ligne'] == "23"){
                                ?>
                        <tr>
                            <td style="width: 10%;"><?= $dvt['date_debut']; ?></td>
                            <td style="width: 10%;"><?= $dvt['date_fin']; ?></td>
                            <td><?= $dvt['text_deviation']; ?></td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>

                    <tbody class="labels">
                        <tr>
                            <td colspan="5" style="background:#8CA9FF;">
                                <label for="ligne24">Ligne 24</label>
                                <input type="checkbox" name="ligne24" id="ligne24" data-toggle="toggle">
                            </td>
                        </tr>
                    </tbody>
                    <tbody class="hide">
                        <?php 
                        foreach ($deviations['deviations']['deviation'] as $dvt) {
                            if($dvt['ligne'] == "24"){
                                ?>
                        <tr>
                            <td style="width: 10%;"><?= $dvt['date_debut']; ?></td>
                            <td style="width: 10%;"><?= $dvt['date_fin']; ?></td>
                            <td><?= $dvt['text_deviation']; ?></td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>

                    <tbody class="labels">
                        <tr>
                            <td colspan="5" style="background:#FF9900;">
                                <label for="ligne25">Ligne 25</label>
                                <input type="checkbox" name="ligne25" id="ligne25" data-toggle="toggle">
                            </td>
                        </tr>
                    </tbody>
                    <tbody class="hide">
                        <?php 
                        foreach ($deviations['deviations']['deviation'] as $dvt) {
                            if($dvt['ligne'] == "25"){
                                ?>
                        <tr>
                            <td style="width: 10%;"><?= $dvt['date_debut']; ?></td>
                            <td style="width: 10%;"><?= $dvt['date_fin']; ?></td>
                            <td><?= $dvt['text_deviation']; ?></td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>

                    <tbody class="labels">
                        <tr>
                            <td colspan="5" style="background:#A38F4E;">
                                <label for="ligne26">Ligne 26</label>
                                <input type="checkbox" name="ligne26" id="ligne26" data-toggle="toggle">
                            </td>
                        </tr>
                    </tbody>
                    <tbody class="hide">
                        <?php 
                        foreach ($deviations['deviations']['deviation'] as $dvt) {
                            if($dvt['ligne'] == "26"){
                                ?>
                        <tr>
                            <td style="width: 10%;"><?= $dvt['date_debut']; ?></td>
                            <td style="width: 10%;"><?= $dvt['date_fin']; ?></td>
                            <td><?= $dvt['text_deviation']; ?></td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>

                    <tbody class="labels">
                        <tr>
                            <td colspan="5" style="background:#333399;">
                                <label for="ligneN1">Ligne N1</label>
                                <input type="checkbox" name="ligneN1" id="ligneN1" data-toggle="toggle">
                            </td>
                        </tr>
                    </tbody>
                    <tbody class="hide">
                        <?php 
                        foreach ($deviations['deviations']['deviation'] as $dvt) {
                            if($dvt['ligne'] == "N1"){
                                ?>
                        <tr>
                            <td style="width: 10%;"><?= $dvt['date_debut']; ?></td>
                            <td style="width: 10%;"><?= $dvt['date_fin']; ?></td>
                            <td><?= $dvt['text_deviation']; ?></td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>

                    <tbody class="labels">
                        <tr>
                            <td colspan="5" style="background:#00CCFF;">
                                <label for="ligneN2">Ligne N2</label>
                                <input type="checkbox" name="ligneN2" id="ligneN2" data-toggle="toggle">
                            </td>
                        </tr>
                    </tbody>
                    <tbody class="hide">
                        <?php 
                        foreach ($deviations['deviations']['deviation'] as $dvt) {
                            if($dvt['ligne'] == "N2"){
                                ?>
                        <tr>
                            <td style="width: 10%;"><?= $dvt['date_debut']; ?></td>
                            <td style="width: 10%;"><?= $dvt['date_fin']; ?></td>
                            <td><?= $dvt['text_deviation']; ?></td>
                        </tr>
                        <?php
                            }
                        }
                        ?>
                    </tbody>




                    </tbody>
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