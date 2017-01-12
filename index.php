<?php
$file_contacts = "files/contacts.json";
$contacts_json = file_get_contents($file_contacts);
$all_contacts = json_decode($contacts_json, true);
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
    <?php foreach ($all_contacts as $contact) { ?>
        <div class="row contact">
            <div class="col-xs-3 contact-elem">Имя</div>
            <div class="col-xs-9"><?php echo $contact['name']; ?></div>
            <div class="col-xs-3 contact-elem">Номер телефона</div>
            <div class="col-xs-9"><?php echo $contact['number']; ?></div>
            <div class="col-xs-3 contact-elem">Дата</div>
            <div class="col-xs-9"><?php echo $contact['date']; ?></div>
            <div class="rename-btn col-xs-6">
                <a href="change.php">
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