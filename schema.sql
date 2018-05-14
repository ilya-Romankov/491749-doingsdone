CREATE DATABASE business_is_all_right
    DEFAULT CHARACTER SET utf8 
    DEFAULT COLLATE utf8_general_ci;

use business_is_all_right;

CREATE TABLE projects (
    id_projects INT AUTO_INCREMENT PRIMARY KEY,
    name_projects CHAR(32)
);

CREATE INDEX index_name_projects ON projects (name_projects) USING BTREE;

CREATE TABLE users (
    id_users INT AUTO_INCREMENT PRIMARY KEY,
    date_registration_users DATE,
    email_users CHAR(32),
    name_users CHAR(32),
    password_users CHAR (255),
    contact_users CHAR(64)
);

CREATE INDEX index_name_users ON users (name_users) USING BTREE;
CREATE INDEX index_email_users ON users (email_users) USING BTREE;

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

CREATE INDEX index_date_create_task ON task (date_create_task) USING BTREE;
CREATE INDEX index_date_achievement_task ON task (date_achievement_task) USING BTREE;
CREATE INDEX index_name_task ON task (name_task) USING BTREE;
CREATE INDEX index_term_task ON task (term_task) USING BTREE;