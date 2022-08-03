<?php session_start();

include('verification/verif_con.php');

?>
<!DOCTYPE html>
<html>

<?php
include('includes/head.php');
?>

<body>
    <?php
    include('includes/header.php');
    include('includes/nav_barre.php');
    ?>
    <div class="btc">
        <?php
        $url = "https://bitpay.com/api/rates";
        $json = json_decode(file_get_contents($url));
        $dollar = $btc = 0;
        echo '<div class="my-5">';
        foreach ($json as $obj) {
            echo '<div class="text-white">';
            echo '<li>1 BITCOIN = $' . $obj->rate . ' ' . $obj->name . ' (' . $obj->code . ') </li><br>';
            echo '</div>';
        }
        echo '</div>';
        ?>
    </div>
    <?php include('includes/footer.php'); ?>
</body>

</html>