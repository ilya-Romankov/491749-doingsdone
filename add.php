<?php
require_once ('init.php');
$categorys = catygorys_db($user_id, $connect); 

$massiv_errors = [];
if($_SERVER['REQUEST_METHOD'] == 'POST' ) {
    $requeare_fields = ['name','project'];
    foreach($requeare_fields as $field) {
        if(!isset($_POST[$field])) {
            $massiv_errors[$field] = "Необходимо заполнить это поле";
        }
    }
    if (isset($_POST['date'])) {
        $date_check = DateTime::createFromFormat('d:m:Y', $_POST['date']);
        if (!$date_check) {
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
        $file_path = __DIR__ . '/';
        move_uploaded_file($_FILES['preview']['tmp_name'],$file_path . $file_name);
        $file_path = "$file_path . $file_name";
    }








    $name_task = $_POST['name'];
    $date_task = NULL;
    if($name_task == NULL ) {
        $massiv_errors[] = 1;
        $error_class_body = "overlay";
        $hidden = "";
        $error_input_name = "form__input--error";
        $error_name = true;
        
    }
   
    
}
if(empty($massiv_errors)) {
    
}


$tasks = task_db($user_id, $category_active, (bool)$show_complete_tasks, $connect);
$count_task_by_user_id = get_count_tasks_by_user(1,$connect);

$modal_task = output_page('template/modal-task.php', [
    'categorys' => $categorys,
    'hiddenm' => $hidden,
    'error_input_name' => $error_input_name,
    'error_name' => $error_name,
    'error_input_date' => $error_input_date,
    'error_date' => $error_date,
    'date_task' => $date_task,
    'name_task' => $name_task
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