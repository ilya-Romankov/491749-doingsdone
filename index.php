<?php
require ('function.php');
// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);
$categorys=["Всё","Входящие","Учёба","Работа"];
$tasks= [
    ["task" => "Собеседование в IT комании","date" => "01.06.2018","category" => "Работа","done" => "Нет"],
    ["task" => "Выполнить тестовое задание","date" => "25.05.2018","category" => "Работа","done" => "Нет"],
    ["task" => "Сделать задание первого раздела","date" => "21.04.2018","category" => "Учёба","done" => "Да"],
    ["task" => "Встреча с другоми","date" => "22.04.2018","category" => "Входящие","done" => "Нет"],
    ["task" => "Купить корм для кота","date" => "Нет","category" => "Домашние дела","done" => "Нет"],
    ["task" => "Заказать пиццу","date" => "Нет","category" => "Работа","done" => "Нет"]
];
$filtered_tasks=[];
$category_active = 0;
if ($show_complete_tasks == 1){
    foreach ($tasks as  $task) {
        if ($task['done'] == 'Нет') {
            continue;
        }
        $filtered_tasks[] = $task;
    }
    $tasks = $filtered_tasks;
}
//Функция для подсчёта задач
function tasks_count($massiv_tasks , $project_name) {
    $index_coincidence = 0;

    if ($project_name == "Всё")  {
        return count($massiv_tasks);
    }
    foreach ($massiv_tasks as  $task) {
        if ($task['category'] == $project_name) {
            $index_coincidence++;
        }
    }
    return $index_coincidence;
}



$index = output_page('template/index.php',[
        'show_complete_tasks' =>$show_complete_tasks ,
        'tasks' => $tasks
    ]);
$layout = output_page('template/layout.php', [
        'name_page' =>  'Дела в порядке',
        'categorys' => $categorys,
        'content' => $index,
        'tasks' => $tasks
]);

print($layout);

