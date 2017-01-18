<?php
error_reporting(E_ALL);
ini_set('display_errors', true); //показывает ошибки


$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'contact_manager';
$db_table = 'contacts';

$db = mysqli_connect($db_host, $db_user, $db_password, $db_name) or die("Не могу создать соединение ");
$query = mysqli_query("SELECT $contact FROM contacts  WHERE id");

if (isset($_GET['id']));

if ($result = mysqli_query($db, $query)) {
    /* извлечение ассоциативного массива */

    while ($contact = mysqli_fetch_assoc($result)) {
        $contact=[];
    }
    mysqli_free_result($result);


}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/libs/normolize.css">
    <link rel="stylesheet" href="css/libs/bootstrap.css">
    <link rel="stylesheet" href="css/build/style.css" type="text/css">
</head>
<body>
<div class="container ">
    <div class="row ">
        <div class="col-xs-12 header ">Изменить контакт</div>
        <div class="col-xs-12 add-form">
            <form method="post" action="add_contact.php" class="form-horizontal">
                <div class="form-group">
                    <label class="col-xs-3 control-label">Имя</label>
                    <div class="col-xs-8">
                        <input name=" first_name" type="text" class="form-control" placeholder="Имя" value="<?php echo $contact['name'];?>" >
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-3 control-label">Номер телефона</label>
                    <div class="col-xs-8">
                        <input name="number" type="text" class="form-control" placeholder="Номер телефона" value="<?php echo $contact['number'];?>">
                    </div>
                </div>
                <div class="col-xs-12 add">
                    <button type="button" class="btn btn-primary">Сохранить</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>