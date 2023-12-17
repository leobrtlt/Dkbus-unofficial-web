<?php
/**
 * @version 1.0
 * @author Léo Berteloot
 * @license Creative-Commons
 * 
 * 
 * 
 * https://www.dkbus.com/vehicules.php
 * https://www.dkbus.com/deviations.php
 * https://dkbus.transdev-hdf.fr/wp-content/uploads/2021/09/Plan-reseau-22-09-21.pdf
 * https://www.dkbus.com/lignes.php
 * https://www.dkbus.com/arret.php
 */


$stats_bus_online = 0;
$stats_bus_offline = 0;
$stats_lignes = 20;
$stats_deviations = 0;


/* Get Vehicules */
$vehicules = xml2json("https://www.dkbus.com/vehicules.php");
foreach ($vehicules['vehicule'] as $veh) { if($veh['ligne'] == 0){ $stats_bus_offline++; }else{ $stats_bus_online++; } }


/* Get Deviations */
$deviations = xml2json("https://www.dkbus.com/deviations.php");
foreach ($deviations['deviations']['deviation'] as $dvt) { $stats_deviations++; }

/* Get Lignes */
$lignes = json_decode(file_get_contents('https://www.dkbus.com/lignes.php'), true);

/* Get Arrets */
$arrets = json_decode(file_get_contents('https://www.dkbus.com/arret.php'), true);

 


/* Functions  */
function xml2json($url){
    $fileContents= file_get_contents($url);
    $fileContents = str_replace(array("\n", "\r", "\t"), '', $fileContents);
    $fileContents = trim(str_replace('"', "'", $fileContents));
    $simpleXml = simplexml_load_string($fileContents);
    return json_decode(json_encode($simpleXml), true);
}

