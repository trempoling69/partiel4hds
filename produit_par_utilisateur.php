<?php
require_once 'connection.php';
// if (isset($_POST) && !empty($_POST)) {
//     $control_form_err = false;
//     var_dump($_POST);
//     $token_user = $_POST['token_user'];
//     $sql = "SELECT *
//     FROM (users_medicaments INNER JOIN produit ON users_medicaments.token_produit = produit.token)
//     INNER JOIN utilisateur ON users_medicaments.token_utilisateur = utilisateur.token
//     WHERE token_utilisateur = '".$token_user."'";
//     mysqli_select_db($conn, 'gestion_stock_medicaments');
//     $retval = mysqli_query($conn, $sql);
//     if (!$retval) {
//         die('could not enter data:' . mysqli_error($conn));
//     } else {
//         echo "data trouver";
// mysqli_close($conn);
// }
// if (!$retval) {
// $control_form_err = true;
// }
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Forgot Password</title>

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
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Rechercher un utilisateur</h1>
                                        <p class="mb-4">taper l'utilisateur rechercher pour trouver les prescriptions
                                            qui lui sont associées</p>
                                    </div>
                                    <form class="user" action="<?php $_PHP_SELF ?>" method="POST">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Entrer le token de l'utilisateur" name="token_user">
                                        </div>
                                        <input type="submit" value="Rechercher"
                                            class="btn btn-primary btn-user btn-block">
                                    </form>
                                    <?php 
                                    if (isset($_POST) && !empty($_POST)) {
                                        $control_form_err = false;
                                        
                                        $token_user = $_POST['token_user'];
                                        $sql = "SELECT *
                                        FROM (users_medicaments INNER JOIN produit ON users_medicaments.token_produit = produit.token)
                                        INNER JOIN utilisateur ON users_medicaments.token_utilisateur = utilisateur.token
                                        WHERE token_utilisateur = '".$token_user."'";
                                        
                                        $retval = mysqli_query($conn, $sql);
                                        if (!$retval) {
                                            die('could not enter data:' . mysqli_error($conn));
                                        } else { ?>
                                    <table>
                                        <thead>
                                            <th>Nom du patient</th>
                                            <th>Nom du produit</th>
                                            <th>Reference du produit</th>
                                            <th>Date de prescription</th>
                                        </thead>
                                    </table>
                                    <?php while($row=mysqli_fetch_array($retval, MYSQLI_ASSOC)) { ?>
                                    <tr>
                                        <td><?=$row["nom"]?></td>
                                        <td><?=$row["nom_produit"]?></td>
                                        <td><?=$row["reference"]?></td>
                                        <td><?=$row["date_presc"]?></td>
                                    </tr>
                                    <?php
                                            }
                                    mysqli_close($conn);
                                    }
                                    if (!$retval) {
                                    $control_form_err = true;
                                    }
                                    }
                                    ?>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="register.html">Create an Account!</a>
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