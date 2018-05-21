<?php 

define("PROJECT_ALL",-1);

function catygorys_db(int $id_user, mysqli $con) {
    $sql = "SELECT name_projects, id_projects FROM projects  WHERE id_users = ?";
    $stmt = db_get_prepare_stmt($con, $sql, [$id_user]);
    mysqli_stmt_execute($stmt);
    $res = mysqli_stmt_get_result($stmt);
    $rows = mysqli_fetch_all($res, MYSQLI_ASSOC);
    return $rows;
}

function task_db(int $id_user, mysqli $con) {
    $sql = "SELECT id_task ,id_users ,id_projects ,date_create_task ,date_achievement_task ,name_task,file_task ,term_task ,done_task  FROM task  WHERE id_users = ?";
    $stmt = db_get_prepare_stmt($con, $sql, [$id_user]);
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




