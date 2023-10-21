<?php
/**
 * Routing
 * Waar in de applicatie ben je?
 *
 * Voor het gebruik gaan we er gebruik van maken van de volgende opbouw
 * - index(home)
 * - contact
 * - details
 *      - profiel
 *      - cijfers
 *      - ervaringen
 *      - hobby
 * - about
 */
$sql = "SELECT * FROM hobbies";
$stmt = $conn->prepare($sql);
$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
$strdata = '';
foreach ($data as $item) {
	$strdata .=  '<div class="row"><div class="cell">'.$item['name'].'</div><div class="cell">'.$item['description'] . "</div></div>";
 }
$sql = "SELECT * FROM content where page='details'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);
$content = $data['content'];
$content = str_replace("%data%", $strdata, $myContent);

require 'views/html.view.php';

/**
 * PDO - connect to database
 *
 */