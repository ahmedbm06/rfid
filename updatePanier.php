<?php

include '../Controller/PanierP.php';
include '../View/back/index.php';   
$error = "";

// create panier
$panier = null;

// create an instance of the controller
$panierP = new PanierP();
if (
    isset($_POST["idPanier"]) &&
    isset($_POST["Name"]) &&
    isset($_POST["prixt"]) &&
    isset($_POST["dp"])
) {
    if (
        !empty($_POST["idPanier"]) &&
        !empty($_POST['Name']) &&
        !empty($_POST["prixt"]) &&
        !empty($_POST["dp"])
    ) {
        $panier = new Panier(
            $_POST['idPanier'],
            $_POST['Name'],
            $_POST['prixt'],
            new DateTime($_POST['dp'])
        );
        $panierP->updatePanier($panier, $_POST["idPanier"]);
        header('Location:ListPanier.php');
    } else
        $error = "Missing information";
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>panier Display</title>
</head>

<body>
    <button><a href="ListPanier.php">Back to list</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idPanier'])) {
        $panier = $panierP->showPanier($_POST['idPanier']);

    ?>

        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idPanier">Id Panier:
                        </label>
                    </td>
                    <td><input type="text" name="idPanier" id="idPanier" value="<?php echo $panier['idPanier']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="Name"> Name:
                        </label>
                    </td>
                    <td><input type="text" name="Name" id="Name" value="<?php echo $panier['Name']; ?>" maxlength="20"></td>
                </tr>
            
                <tr>
                    <td>
                        <label for="prixt">PRIX TOTAL:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="prixt" value="<?php echo $panier['prixt']; ?>" id="prixt">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="dp">Date Panier:
                        </label>
                    </td>
                    <td>
                        <input type="date" name="dp" id="dp" value="<?php echo $panier['dp']; ?>">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Update">
                    </td>
                    <td>
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>
</body>

</html>