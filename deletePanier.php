<?php
include '../Controller/PanierP.php';
$panierP = new PanierP();
$panierP->deletePanier($_GET["idPanier"]);
header('Location:ListPanier.php');
