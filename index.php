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
        echo output_page('template/404.php',[
            'message' =>  'Данной категории не существует'
        ]);
        exit();
    }
}

$tasks = task_db($user_id, $category_active, (bool)$show_complete_tasks, $connect);
$count_task_by_user_id = get_count_tasks_by_user(1,$connect);

$message = output_page($message, []);
$index = output_page('template/index.php',[
    'show_complete_tasks' =>$show_complete_tasks ,
    'tasks' => $tasks
]);



$layout = output_page('template/layout.php', [
        'name_page' =>  'Дела в порядке',
        'categorys' => $categorys,
        'category_active' => $category_active,
        'content' => $index,
        'tasks' => $tasks,
        'count_task_by_user_id' => $count_task_by_user_id 
]);
print($layout);