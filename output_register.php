<?php
 //регистрация 
 require_once ('init.php');
 $name_page = "Регистрация";
 $massiv_errors = [];
 if($_SERVER['REQUEST_METHOD'] == 'POST' ) {
 $requeare_fields_register = ['email','password','name'];
 foreach($requeare_fields_register as $fields) {
     if(!isset($_POST[$fields])) {
         $massiv_errors[$fields] = "Необходимо заполнить это поле";
     }
 }

 if (isset($_POST['email'])) {
     if ($_POST['email'] == "") {
         $massiv_errors['email'] = "Введите email";
     }
     elseif ( filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
         $massiv_errors['email'] = "Введите email корректно(testmail@domen.ru)";
     }
     elseif (get_user_by_email($_POST['email'],$connect)) {
        $massiv_errors['email'] = "Такой email существует";
     }
 }
 if (isset($_POST['password'])) {
    if ($_POST['password'] =="") {
     $massiv_errors['password'] = "Введите пароль";
    }
    else {
        $password_hash = password_hash($_POST['password'],PASSWORD_DEFAULT);
    } 
 }
 if(isset($_POST['name'])) {
    if ($_POST['name'] === '') {
        $massiv_errors['name'] = "Введите имя";
    }
}


 if (!count($massiv_errors)) {
    $user_data = [];
    $user_data['date_registration_users'] = date('Y-m-d');
    $user_data['email_users'] = $_POST['email'];
    $user_data['name_users'] = $_POST['name'];
    $user_data['password_users'] = $password_hash;
    $user_data['contact_users'] = "Контактов пока нет";
    if (! insert_user($user_data, $connect)) {
        http_response_code(500);
        echo output_page('template/error.php',[
            'message' =>  'Не удалось добавить пользователя'
        ]);
        exit();
    }
    header('Location: guest_page.php');
        exit();
 }
}

 $register_page = output_page('template/register.php',[
     'massiv_errors' => $massiv_errors,
     'last_post' => $_POST,
     'name_page' =>$name_page
 ]);
 print($register_page);