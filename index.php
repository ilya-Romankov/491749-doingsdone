<?php
require_once ('init.php');
$user_id = 1;
$show_complete_tasks = rand(0, 1);

$category_active = PROJECT_ALL;

$categorys = catygorys_db($user_id, $connect); 
$is_catygory_found = false;
if (isset($_GET['id_projects'])) {
    foreach ($categorys as $catygory) {
        if ($_GET['id_projects'] == $catygory['id_projects']) {
           $category_active = $_GET['id_projects'];
           $is_catygory_found = true;
           break;
        }
    }
    if (!$is_catygory_found) { 
        http_response_code(404);
        echo output_page('template/error.php',[
            'message' =>  'Данной категории не существует'
        ]);
        exit();
    }
}

$massiv_errors = [];
$hidden = true;
$overlay_class = false;
if($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $requeare_fields = ['name','project'];
    foreach($requeare_fields as $field) {
        if(!isset($_POST[$field])) {
            $massiv_errors[$field] = "Необходимо заполнить это поле";
        }
    }
    if (isset($_POST['date']) && $_POST['date'] !=="") {
        $date = DateTime::createFromFormat('d:m:Y', $_POST['date']);
        if (!$date) {
            $massiv_errors['date'] = "Неверное заполненная дата";
        }
    }

    if (isset($_POST['project'])) {
        if(!isset ($categorys[$_POST['project']])) {
            $massiv_errors['project'] = "Такого проекта нету";
        }
    }

    if(isset($_POST['name'])) {
        if ($_POST['name'] === '') {
            $massiv_errors['name'] = "Имя задачи не должно быть пустой строкой";
        }
    }

    if (isset($_FILES['preview'])) {
        $file_name = $_FILES['preview']['name'];
        $file_path = '/'.$file_name;
        move_uploaded_file($_FILES['preview']['tmp_name'],$_SERVER['DOCUMENT_ROOT'] . $file_path);
    }

    if (count($massiv_errors)) {
        $overlay_class = true;
        $hidden = false;

    }
    else {
        $task = [];
        $task['id_users'] = $user_id;
        $task['id_projects'] = $_POST['project'];
        $task['date_create_task'] = date('Y-m-d'); 
        $task['name_task'] = $_POST['name']; 
        $task['file_task'] = $file_path ;
        $task['term_task'] = $date->format('Y-m-d');
        $task['done_task'] = false;

        $task_id = insert_task($task, $connect);
        if (!$task_id) {
            http_response_code(500);
            echo output_page('template/error.php',[
                'message' =>  'Не удалось добавить задачу'
            ]);
            exit();
        }
        header('Location: /');
        exit();
    }    
}




$tasks = task_db($user_id, $category_active, (bool)$show_complete_tasks, $connect);
$count_task_by_user_id = get_count_tasks_by_user(1,$connect);


$modal_task = output_page('template/modal-task.php', [
    'categorys' => $categorys,
    'hidden' => $hidden,
    'massiv_errors' => $massiv_errors,
    'last_post' => $_POST
]);


$index = output_page('template/index.php',[
    'show_complete_tasks' =>$show_complete_tasks ,
    'tasks' => $tasks
]);



$layout = output_page('template/layout.php', [
        'name_page' =>  'Дела в порядке',
        'overlay_class' => $overlay_class,
        'categorys' => $categorys,
        'category_active' => $category_active,
        'content' => $index,
        'tasks' => $tasks,
        'modal_task' => $modal_task,
        'count_task_by_user_id' => $count_task_by_user_id 
]);
print($layout);