<?php
require_once 'connection.php';
$token_utilisteur = $_GET['token'];

if (isset($_POST) && !empty($_POST)) {
    $control_form_err = false;
    var_dump($_POST);
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $role = $_POST['role'];
    $datemodif = $_POST['date'];
    $sql = "UPDATE utilisateur SET nom = '" . $nom . "', prenom = '" . $prenom . "', role = '" . $role . "', 
    update_at = '" . $datemodif . "' WHERE token='" . $token_utilisteur . "'";
    mysqli_select_db($conn, 'gestion_stock_medicaments');
    $retval = mysqli_query($conn, $sql);
    if (!$retval) {
        die('could not enter data:' . mysqli_error($conn));
    } else {
        echo "data sont bien rentrée";
        mysqli_close($conn);
        header('Location: index.html');
        exit();
    }
    if (!$retval) {
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

    <title>SB Admin 2 - Login</title>

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

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Modifer l'utilisteur</h1>
                                    </div>
                                    <?php

                                    if (isset($_POST) && !empty($_POST)) {
                                    } else {
                                        $sql = "SELECT * FROM utilisateur WHERE token = '" . $token_utilisteur . "'";

                                        if ($retval = mysqli_query($conn, $sql)) {

                                            while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) { ?>
                                    <h5>token du client est : <span><?= $row["token"] ?></span></h5>
                                    <h5>Nom : <span><?= $row["nom"] ?></span></h5>
                                    <h5>Prenom : <span><?= $row["prenom"] ?></span></h5>
                                    <h5>Role : <span> <?= $row["role"] ?> </span></h5>
                                    <h5>Date de creation : <span> <?= $row["created_at"] ?> </span></h5>
                                    <?php }
                                        }
                                    }

                                    ?>
                                    <form class="user" action="<?php $_PHP_SELF ?>" method="POST">
                                        <div class="form-group row">
                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                <input type="text" class="form-control form-control-user"
                                                    id="exampleFirstName" placeholder="Prenom" name="prenom">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="text" class="form-control form-control-user"
                                                    id="exampleLastName" placeholder="Nom de famille" name="nom">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" placeholder="Role" name="role">
                                        </div>
                                        <input id="Aujourdhui" type="date" name="date" value="" readonly>
                                        <script>
                                        document.getElementById("Aujourdhui").valueAsDate = new Date();
                                        </script>
                                        <input type="submit" value="Modifier">
                                        <hr>
                                    </form>
                                    <hr>

                                    <div class="text-center">
                                        <a class="small" href="register.php">Creer un utilisateur</a>
                                    </div>
                                </div>
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