<!DOCTYPE html>
<html lang="en">

<body>
    <?php
require_once 'connection.php';

$token_produit = $_GET["token"];

$sql = 'DELETE FROM produit where token='.$token_produit;


if ($retval = mysqli_query( $conn, $sql )){
    header('Location: tables_prod.php');
    exit();
    printf('Deleted successfully');
}else{
    printf("erreur");
}



?>
</body>

</html>