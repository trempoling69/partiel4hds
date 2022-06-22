<?php
require_once 'connection.php';
function randomToken($car) {
    $string = "";
    $chaine = 
    "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqr
    stuvwxyz";
    srand ( ( double ) microtime () * 1000000 );
    for($i = 0; $i < $car; $i ++) {
    $string .= $chaine [rand () % strlen ( $chaine )];
    }
     return $string;
     }
if(isset($_POST) && !empty($_POST)){
    $control_form_err = false;
    var_dump($_POST);
    $nom = $_POST['nom'];
    $description =addslashes($_POST['description']) ;
    $prix= $_POST['prix'];
    $stock =  $_POST['stock'];
    $reference =  randomToken(10);
    $datecreation = $_POST['date'];
    $sql = "INSERT INTO produit"."(nom,description,prix,stock,reference,create_at)"."VALUES".
    "('$nom','$description', '$prix', '$stock', '$reference', '$datecreation')";
    mysqli_select_db($conn, 'gestion_stock_medicaments');
    $retval = mysqli_query($conn, $sql);
    if(! $retval ) {
        die('could not enter data:' .mysqli_error($conn));
        }
        else {
        echo "data sont bien rentrée";
        mysqli_close($conn);
        header('Location: index.php');
        exit();
        }
        if(! $retval ) {
           $control_form_err = true;
       }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Creer un produit</h1>
                            </div>
                            <form class="user" action="<?php $_PHP_SELF ?>" method="POST">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="nom du produit" name="nom">
                                    </div>
                                    <div class="col-sm-6">

                                        <input type="number" class="form-control form-control-user"
                                            id="exampleInputEmail" placeholder="Prix unitaire" name="prix">
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="number" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Stock dispo" name="stock">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="exampleLastName"
                                        placeholder="description du produit" name="description">
                                </div>
                                <input id="Aujourdhui" type="date" name="date" value="" readonly hidden>
                                <script>
                                document.getElementById("Aujourdhui").valueAsDate = new Date();
                                </script>
                                <input type="submit" value="Enregistrer">
                                <hr>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password.html">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.html">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>