<?php
// include '../View/back/index.php';
include '../view/front/index.php';

include '../Controller/PanierP.php';
$error = "";

// create panier
$panier = null;

// create an instance of the controller
$panierP = new PanierP();
if (
    isset($_POST["Name"]) &&
    isset($_POST["prixt"]) &&
    isset($_POST["dp"])
) {
    if (
        !empty($_POST['Name']) &&
        !empty($_POST["prixt"]) &&
        !empty($_POST["dp"])
    ) {
        $panier = new Panier(
            null,
            $_POST['Name'],
            $_POST['prixt'],
            new DateTime($_POST['dp'])
        );
        $panierP->addPanier($panier);
        // header('Location:ListPanier.php');
    } else
        $error = "Missing information";
}


?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>x Display</title>
</head>

<body>
    <a href="ListPanier.php">Back to list </a>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <form action="" method="POST">
        <div class="card-body">
        <div class="form-group">
            <!-- name-->

            <label>Name</label>
                    <input class="form-control" name="Name" id="Name" placeholder="Name"  required>
                        <p id="errorNR" class="error"></p>
                  </div>
 
 
				  <!-- prixt-->
                  <div class="form-group">
                    <label>prixt</label>
                    <input class="form-control" name="prixt" id="prixt" placeholder="prixt"  required>
                  <p id="errorPri" class="error"></p>
 </div>
  <!-- dp-->
 <div class="form-group">
                    <label>dp</label>
                    <input class="form-control" name="dp" id="dp" placeholder="dp"  required>
                  <p id="errorPri" class="error"></p>
 </div>


				
                 

                <div class="card-footer">
                  <button type="submit" value="Save" class="btn btn-primary" onclick="verif()"><i class="fas fa-plus"></i> Ajouter</button>
                  <button class="btn btn-danger"><a style="color: white;" href="listProduit.php">Annuler</a></button>

				  
                </div>
            <!-- <div>
        <table border="1" align="center">

            <tr>
                <td>
                    <label for="Name">Name:
                    </label>
                </td>
                <td><input type="text" name="Name" id="Name" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="prixt">prixt:
                    </label>
                </td>
                <td>
                    <input type="text" name="prixt" id="prixt">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="dp">Date panier:
                    </label>
                </td>
                <td>
                    <input type="d" name="dp" id="dp">
                </td>
            </tr>
           
            <tr align="center">
                <td>
                    <input type="submit" value="Save">
                </td>
                <td>
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table> -->
    </form>
</body>

</html>