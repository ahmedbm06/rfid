<?php
include '../Controller/PanierP.php';
include '../View/back/index.php';

$panierP = new PanierP();
$list = $panierP->ListPanier();
?>
<html>

<head>
    
</head>

<body>

    <center>
        <h1>List of Panier</h1>
        <h2>
            <a href="addPanier.php">Add Panier</a>
        </h2>
    </center>
    <table border="1" align="center" width="70%">
        <tr>
            <th>Id Panier</th>
            <th> Name</th>
            <th>PRIX TOTAL</th>
            <th>Date PANIER</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        foreach ($list as $panier) {
        ?>
            <tr>
                <td><?= $panier['idPanier']; ?></td>
                <td><?= $panier['Name']; ?></td>
                <td><?= $panier['prixt']; ?></td>
                <td><?= $panier['dp']; ?></td>
                <td align="center">
                    <form method="POST" action="updatePanier.php">
                        <input type="submit" name="update" value="Update">
                        <input type="hidden" value=<?PHP echo $panier['idPanier']; ?> name="idPanier">
                    </form>
                </td>
                <td>
                    <a href="deletePanier.php?idPanier=<?php echo $panier['idPanier']; ?>">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
</body>

</html>