<?php
require_once ('init.php');
$user_id = 1;
$show_complete_tasks = rand(0, 1);
$category_active = 0;

$categorys = catygorys_db($user_id, $connect);
$tasks = task_db($user_id, (bool)$show_complete_tasks, $connect);
$count_task_by_user_id = get_count_tasks_by_user(1,$connect);

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