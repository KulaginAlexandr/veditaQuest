<?
    class CProducts
    {
        public $name, $age;
        function CreateTable()
        {
            require_once 'constants.php';
            $link = mysqli_connect(HOST,LOGIN,PASS,DB);
            mysqli_query($link,'set names utf8');
            $sections = mysqli_query($link,"CREATE TABLE `products` (
                `ID` int(11) NOT NULL,
                `PRODUCT_ID` int(5) DEFAULT NULL,
                `PRODUCT_NAME` varchar(30) DEFAULT NULL,
                `PRODUCT_PRICE` decimal(7,2) DEFAULT NULL,
                `PRODUCT_ARTICLE` varchar(30) DEFAULT NULL,
                `PRODUCT_QUANTITY` int(5) DEFAULT NULL,
                `DATE_CREATE` datetime DEFAULT CURRENT_TIMESTAMP,
                `PRODUCT_SHOW` tinyint(1) DEFAULT NULL) ENGINE=InnoDB DEFAULT CHARSET=utf8;");
        }
    }
    function showProducts($count){
        require_once 'constants.php';
        $link = mysqli_connect(HOST,LOGIN,PASS,DB);
        mysqli_query($link,'set names utf8');
        $sections = mysqli_query($link,"SELECT * FROM  Products WHERE PRODUCT_SHOW!=0  ORDER BY DATE_CREATE DESC LIMIT ".$count);
        echo"<tr>
                <td>ID</td>
                <td>PRODUCT_ID</td>
                <td>PRODUCT_NAME</td>
                <td>PRODUCT_PRICE</td>
                <td>PRODUCT_ARTICLE</td>
                <td>PRODUCT_QUANTITY</td>
                <td>DATE_CREATE</td>
                <td>PRODUCT_SHOW</td>
            </tr>";
        while ($row= mysqli_fetch_assoc($sections)) {
            echo "<tr><td>".$row["ID"]."</td><td>".$row["PRODUCT_ID"]."</td>
            <td>".$row["PRODUCT_NAME"]."</td>
            <td>".$row["PRODUCT_PRICE"]."</td>
            <td>".$row["PRODUCT_ARTICLE"]."</td>
            <td>
            <button onclick='changeQuantity(".$row["ID"].",-1)'>-</button>
            <input id='PRODUCT_QUANTITY".$row["ID"]."' class='' type='number' readonly='true' value='".$row["PRODUCT_QUANTITY"]."' min='0' max='99999'>
            <button onclick='changeQuantity(".$row["ID"].",1)'>+</button>
            </td>
            <td>".$row["DATE_CREATE"]."</td>";
            echo '<td><button onclick="hideElement('.$row["ID"].')">Скрыть</button></td></tr>';
        }
    }
    function hideRow($id){
        require_once 'constants.php';
        $link = mysqli_connect(HOST,LOGIN,PASS,DB);
        mysqli_query($link,'set names utf8');
        mysqli_query($link,"UPDATE Products SET  PRODUCT_SHOW=0 WHERE ID=".$id."");
    }
    function changeQuantity($id,$value){
        require_once 'constants.php';
        $link = mysqli_connect(HOST,LOGIN,PASS,DB);
        mysqli_query($link,'set names utf8');
        mysqli_query($link,"UPDATE Products SET  PRODUCT_QUANTITY=".$value." WHERE ID=".$id."");
    }
    showProducts($_GET["count"]);
    if (isset($_GET["hideRowId"])) hideRow($_GET["hideRowId"]);
    if (isset($_GET["changeQuantity"]))changeQuantity($_GET["changeQuantity"],$_GET["value"])
?>