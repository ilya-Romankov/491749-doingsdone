CREATE DATABASE business_is_all_right
    DEFAULT CHARACTER SET utf8 
    DEFAULT COLLATE utf8_general_ci;

use business_is_all_right;

CREATE TABLE projects (
    id_projects INT AUTO_INCREMENT PRIMARY KEY,
    name_projects CHAR(32)
);

CREATE TABLE users (
    id_users INT AUTO_INCREMENT PRIMARY KEY,
    date_registration_users DATE,
    email_users CHAR(32),
    name_users CHAR(32),
    password_users CHAR (255),
    contact_users CHAR(64)
);

CREATE TABLE task (
    id_task INT AUTO_INCREMENT PRIMARY KEY,
    id_users INT ,
    id_projects INT,
    date_create_task DATE,
    date_achievement_task DATE,
    name_task CHAR(64),
    file_task VARCHAR(512),
    term_task INT,
    FOREIGN KEY (id_users)
        REFERENCES users(id_users),
    FOREIGN KEY (id_projects)
        REFERENCES projects(id_projects)
    
); 