<? 
    require_once 'constants.php';
    $link = mysqli_connect(HOST,LOGIN,PASS,DB);
    mysqli_query($link,'set names utf8');
    mysqli_query($link,"UPDATE Products SET  PRODUCT_SHOW=0 WHERE ID=".$_GET["id"]."");
    header("Location: index.php");
?>