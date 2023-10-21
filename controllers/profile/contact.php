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

$sql = "SELECT * FROM content where page='contact'";
$stmt = $conn->prepare($sql);
$stmt->execute();
$data = $stmt->fetch(PDO::FETCH_ASSOC);
$content = $data['content'];
require 'views/base.view.php';