<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>

<body>
<?php
    session_start();
    $mysql = mysqli_connect("localhost", "root", "", "basket");
    $fio = $_POST['fio'];
    $service = $_POST['service'];
    $costService = $_POST['cost_service'];
    $query = "SELECT * FROM `basket`";
 
    $result = mysqli_query($mysql, $query);
    if(isset($_POST['submit'])){
        if($fio == ''){
            echo "<div class='err'>Введите ФИО</div>";
        } elseif ($service == '') {
            echo "<div class='err'>Введите услугу</div>";
        } elseif ($costService == '') {
            echo "<div class='err'>Введите стоимость услуги</div>";
        } else {
            mysqli_query($mysql, "INSERT INTO `basket` (`id`, `ФИО`, `Услуга`, `Стоимость услуги`) VALUES (NULL, '{$fio}', '{$service}', '{$costService}')");
        }
    }
?>
    <main>
        <form action="./index.php" method="post" class="form">
            <h1>Добавить товар</h1>
            <input name="fio" type="text" placeholder="ФИО" require>
            <input name="service" type="text" placeholder="Услуга" require>
            <input name="cost_service" type="text" placeholder="Стоимость услуги" require>
            <button name="submit" type="submit">Добавить</button>
        </form>
        <div class="basket">
            <h1>Корзина товаров</h1>
                <table class="table">
                    <tbody>
                        <tr>
                            <td>Номер заказа</td>
                            <td>ФИО</td>
                            <td>Услуга</td>
                            <td>Стоимость услуги</td>
                        </tr>
                        <?php 
                        while($rows = $result -> fetch_assoc())
                        {
                            ?>
                        <tr>
                            <td><?php echo $rows['id'];?></td>
                            <td><?php echo $rows['ФИО'];?></td>
                            <td><?php echo $rows['Услуга'];?></td>
                            <td><?php echo $rows['Стоимость услуги'];?></td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
        </div>
    </main>
    <footer>
        Курдияшко Никита Олегович
    </footer>
<script>
if ( window.history.replaceState ) {
  window.history.replaceState( null, null, window.location.href );
}   

</script>
</body>

</html>