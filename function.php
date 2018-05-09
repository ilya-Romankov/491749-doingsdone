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

//Остались ли сутки до дедлайна
function deadline_date($date_deadline) {
    $hours_in_day = 24;
    if ($date_deadline == null) {
        return false;
    }  
    $date_deadline_str = strtotime($date_deadline);
    $date_div = $date_deadline_str - time();
    $date_result = floor($date_div / (60*60)); // расчёт часов до дедлайна
    if (($date_result <= $hours_in_day) && ($date_result > 0)) {
        return TRUE;
    } 
}



