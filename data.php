<?php 
define("PROJECT_ALL",-1);
function catygorys_db(int $id_user, mysqli $con) {
    $sql = "SELECT name_projects, id_projects FROM projects  WHERE id_users = ?";
    $stmt = db_get_prepare_stmt($con, $sql, [$id_user]);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
    $result = [];
    foreach($rows as $project) {
        $result[$project['id_projects']] = $project;
    }
    return $result;
}

function insert_task(array $task, mysqli $con) {

    $sql="INSERT INTO task (
        id_users,  
        id_projects , 
        date_create_task, 
        name_task,  
        file_task, 
        term_task, 
        done_task ) VALUE 
        (?,?,?,?,?,?,".((bool)$task['done_task'] ? "true" : "false") .")";
    $stmt = db_get_prepare_stmt($con, $sql, [
        (int)$task['id_users'],
        (int)$task['id_projects'] ,
        $task['date_create_task'],     
        $task['name_task'],  
        $task['file_task'], 
        $task['term_task'],
    ]);
    

    if(mysqli_stmt_execute($stmt)) {
        return mysqli_insert_id($con);
    }
    return false;
}

function task_db(int $id_user, int $id_project, bool $show_complete_tasks, mysqli $con) {
    $sql_base = 'SELECT id_task ,id_users ,id_projects ,date_create_task ,date_achievement_task ,name_task,file_task ,term_task ,done_task  FROM task';
    $where_array = [];
    $params_array = [];
    $where_array[] = 'id_users = ?';
    $params_array[] = $id_user;
    if (! $show_complete_tasks) {
        $where_array[] = 'done_task = false';
    }
    if ($id_project !== PROJECT_ALL) {
        $where_array[] = 'id_projects = ?';
        $params_array[] = $id_project;
    }
    $sql = $sql_base . ' WHERE ' . implode(' AND ', $where_array);
    $stmt = db_get_prepare_stmt($con, $sql, $params_array);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
    return $rows;
}
function get_count_tasks_by_user(int $user_id, mysqli $con){
    $sql = "SELECT id_projects, count(*) as cnt FROM task WHERE id_users = ? group by id_projects";
    $mysqli_stmt =  db_get_prepare_stmt($con,$sql,[$user_id]);
    mysqli_stmt_execute($mysqli_stmt);
    $res = mysqli_stmt_get_result($mysqli_stmt);
    $result = [];
    $all_count = 0;
    foreach (mysqli_fetch_all($res, MYSQLI_ASSOC) as $item ) {
        $result[$item["id_projects"]] = $item["cnt"]; 
        $all_count += (int) $item["cnt"]; 
    }
    $result[PROJECT_ALL] = $all_count;
    return $result;
}



