<?php
require_once ('init.php');
$name_page = "Дела в поряке";
$massiv_errors = [];
$hidden = true;
$overlay_class = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $requeare_fields = ['email','password'];
    foreach($requeare_fields as $field) {
        if(!isset($_POST[$field])) {
            $massiv_errors[$field] = "Необходимо заполнить это поле";
        }
    }
    $user = get_user_by_email($_POST['email'], $connect);
    if (!$user) {
        $massiv_errors['password'] = "Неверный пароль или email";
    }
    else {
        if (isset($_POST['email'])) {
            if ($_POST['email'] == "") {
                $massiv_errors['email'] = "Введите email";
            }
            elseif ( filter_var($_POST["email"], FILTER_VALIDATE_EMAIL) === false) {
                $massiv_errors['email'] = "Введите email корректно(testmail@domen.ru)";
            }
        }

        if (isset($_POST['password'])) {
            if ($_POST['password'] =="") {
                $massiv_errors['password'] = "Введите пароль";
            }
            else {
                if(!password_verify($_POST['password'],$user['password_users'])) {
                    $massiv_errors['password'] = "Неверный пароль или mail";
                }
            }
        }
    }
    if (count($massiv_errors)) {
        $overlay_class = true;
        $hidden = false;
    }
    else  {
        $_SESSION['user'] = $user;
        header('Location: index.php');
    }
}

$modal_authorization = output_page('template/modal-authorization.php',[
    'hidden' => $hidden,
    'massiv_errors' => $massiv_errors,
    'last_post' => $_POST
]);

$guest = output_page('template/guest.php',[
    'modal_authorization' => $modal_authorization,
    'hidden' => $hidden,
    'name_page' =>  'Дела в порядке',
    'massiv_errors' => $massiv_errors,
    'last_post' => $_POST,
    'overlay_class' => $overlay_class,
    'user' => $_SESSION['user']
]);

$layout = output_page('template/layout.php', [
    'user' => $_SESSION['user'],
    'guest' => $guest
]);

print($layout);

