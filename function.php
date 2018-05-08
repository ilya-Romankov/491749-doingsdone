<?php
//Функция для вывода страниц
function output_page ($path, $massiv_data) {
     if (!file_exists($path)) {
        return '';
    }
    ob_start();
    extract($massiv_data);
    require($path);
    return ob_get_clean();
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