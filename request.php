<?php
const SQL_ADD_WORK ="INSERT INTO work(FID_Worker, FID_Projects, dateMy,
  time_start , time_end, description)
VALUES(?,?,?,?,?,?);";    //Добавить в таблицу work

const SQL_ADD_WORKER = "INSERT INTO worker(ID_Worker, FID_Department) VALUES(?,?);"; //Добавить в таблицу worker

const SQL_ADD_DEPARTMENT = "INSERT INTO department(ID_Department, chief) VALUES(?,?);"; //Добавить в таблицу department

const SQL_ADD_PROJECTS = "INSERT INTO projects(ID_Project, name, manager) VALUES(?,?,?);"; //Добавить в таблицу projects



const SQL_SELECT_ALL_WORK = "SELECT * FROM work;"; // Получить все с work

const SQL_SELECT_ALL_WORKER = "SELECT * FROM worker;"; // Получить все с worker

const SQL_SELECT_ALL_DEPARTMENT = "SELECT * FROM department;"; // Получить все с department

const SQL_SELECT_ALL_PROJECTS = "SELECT * FROM projects;"; // Получить все с projects



const SQL_SELECT_INFO_BY_PROJECT_AND_DATE = "SELECT * FROM work AS a
                                    INNER JOIN projects AS b ON a.FID_Projects = b.ID_Project
                                    WHERE b.ID_Project = ? AND a.dateMy = ?;";

const SQL_SELECT_TIME_OF_WORK = "SELECT DATEDIFF(a.time_end, a.time_start) as 'datediff' FROM work AS a
                                      INNER JOIN projects AS b ON a.FID_Projects = b.ID_Project
                                    WHERE b.ID_Project = ?;";

const SQL_SELECT_COUNT_OF_WORKERS = "SELECT COUNT(a.ID_Worker) as 'count' FROM worker AS a
                                   INNER JOIN department AS b ON a.FID_Department = b.ID_Department
                                   WHERE b.ID_Department = ?;";


 ?>
