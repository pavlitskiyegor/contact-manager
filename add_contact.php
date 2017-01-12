<?php
error_reporting(E_ALL);
ini_set('display_errors', true); //показывает ошибки
//class Contact
//{
//    public $name;
//    public $number;
//    public $date;
//
//    public function __construct($name, $number, $date)
//    {
//        $this->name = $name;
//        $this->number = $number;
//        $this->date = $date;
//    }
//
//    public function addToList(){
//
//    }
//
//
//}
//$contact = new Contact("", "", "");
//$contact->name = "123";
//echo $contact->name;
//$contact->addToList();
function getEmptyContact(){


    return [
        "name" => '',
        "number" => '',
        "date" => '',
    ];//очистка данных формы

}


/**
 * @param $contact
 */
function saveToFile($contact)
{
    $file_contacts = "files/contacts.json";//переменная с значением путя к файлу
    $contacts_json = file_get_contents($file_contacts);//считываю содержимое файла в строку
    $contacts = json_decode($contacts_json, true);//декодирую json строку
    $contacts[] = $contact;//??
    file_put_contents($file_contacts, json_encode($contacts, JSON_UNESCAPED_UNICODE));//записываю строку в файл и кодирую обратно в json
}

/**
 * @param $contact
 * @param $errors
 * @return array
 */
function isValid($contact)
{
    $errors = [];
    if (!isset($contact["name"]) || empty($contact["name"])) {
        $errors["name"] = 'Поле "Имя" не должно быть пустым.';
    }
    if (!isset($contact ["number"]) || empty($contact["number"])) {
        $errors["number"] = 'Поле "Номер" не должно быть пустым.';
        return array($contact, $errors);
    }
    return $errors;
}

$errors = [];
$contact = getEmptyContact();

if (isset($_POST['submit'])) {



    //валидация
    $contact = [
        "name" => trim($_POST['name']),
        "number" => trim($_POST['number']),
        "date" => date("y-m-d h:i:s")
    ];

    $errors = isValid($contact);
    if (count($errors) == 0) {
        saveToFile($contact);

        $contact = getEmptyContact();
    }

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
        <div class="col-xs-12 header ">Добавить контакт</div>
        <?php if (isset($_POST['submit']) && count($errors) > 0) { ?>
            <div class="col-xs-12 errors">
                <?php foreach ($errors as $error) { ?>
                    <p><?php echo $error; ?></p>
                <?php } ?>
            </div>
        <?php } ?>
        <div class="col-xs-12 add-form">
            <form method="post" action="add_contact.php" class="form-horizontal">
                <div class="form-group">
                    <label class="col-xs-3 control-label">Имя</label>
                    <div class="col-xs-8">
                        <input name="name" type="text" class="form-control" placeholder="Имя">
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-xs-3 control-label">Номер телефона</label>
                    <div class="col-xs-8">
                        <input name="number" type="text" class="form-control" placeholder="Номер телефона">
                    </div>
                </div>
                <div class="col-xs-12 add">
                    <input type="submit" name="submit" class="btn btn-primary" value="Добавить">
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>