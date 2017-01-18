<?php
error_reporting(E_ALL);
ini_set('display_errors', true); //показывает ошибки

$db_host = 'localhost';
$db_user = 'root';
$db_password = '';
$db_name = 'contact_manager';
$db_table = 'contacts';

$db = mysqli_connect($db_host, $db_user, $db_password, $db_name) or die("Не могу создать соединение ");
$query = "SELECT id, name, number, date  FROM contacts";
$contacts = [];
if ($result = mysqli_query($db, $query)) {
    /* извлечение ассоциативного массива */

    while ($contact = mysqli_fetch_assoc($result)) {
        $contacts[] = $contact;
    }
    mysqli_free_result($result);

}
//$file_contacts = "files/contacts.json";//старый метод вывода информации.
//$contacts_json = file_get_contents($file_contacts);
//$all_contacts = json_decode($contacts_json, true);
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
    <div class="row">
        <div class="col-xs-12 header">
            Contact Manager
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 add">
            <a href="add_contact.php">
                <button type="button" class="btn btn-primary">Добавить контакт</button>
            </a>
        </div>
    </div>
    <?php foreach ($contacts as $contact) { ?>
        <div class="row contact">
            <div class="col-xs-3 contact-elem">Имя</div>
            <div class="col-xs-9"><?php echo $contact['name']; ?></div>
            <div class="col-xs-3 contact-elem">Номер телефона</div>
            <div class="col-xs-9"><?php echo $contact['number']; ?></div>
            <div class="col-xs-3 contact-elem">Дата</div>
            <div class="col-xs-9"><?php echo $contact['date']; ?></div>
            <div class="rename-btn col-xs-6">
                <a href="change.php" id="<?php echo $contact['id']; ?>">
                    <button type="button" class="btn btn-primary ">Изменить</button>
                </a>
            </div>
            <div class="delete-btn col-xs-6">
                <button type="button" class="btn btn-primary ">Удалить</button>
            </div>
        </div>
    <?php } ?>
</div>

</body>
</html>