<!DOCTYPE html>
<html lang="en">

<body>
    <?php
require_once 'connection.php';

$token_utilisateur = $_GET["token"];

$sql = 'DELETE FROM utilisateur where token='.$token_utilisateur;


if ($retval = mysqli_query( $conn, $sql )){
    header('Location: tables.php');
    exit();
    printf('Deleted successfully');
}else{
    printf("erreur");
}



?>
</body>

</html>