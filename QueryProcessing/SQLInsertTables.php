<?php
require_once "../request.php";
require_once "../ConnectionFactory.php";
require_once "../functions.php";

if (isset($_POST['InsertWork']))
{
  try
  {
    $sth = $dbh->prepare(SQL_ADD_WORK);
    $sth->execute([$_POST['selectFID_Worker'], $_POST['selectFID_Projects'], $_POST['dateMyValue'], $_POST['time_startValue'], $_POST['time_endValue'], $_POST['descriptionValue']]);
    redirectToHome();
  } catch (PDOException $ex)
  {
    echo $ex->GetMessage();
  }
}

if (isset($_POST['InsertWorker']))
{
  try
  {
    $sth = $dbh->prepare(SQL_ADD_WORKER);
    $sth->execute([$_POST['ID_WorkerValue'], $_POST['selectFID_Department']]);
    redirectToHome();
  } catch (PDOException $ex)
  {
    echo $ex->GetMessage();
  }
}

if (isset($_POST['InsertDepartment']))
{
  try
  {
    $sth = $dbh->prepare(SQL_ADD_DEPARTMENT);
    $sth->execute([$_POST['ID_DepartmentValue'], $_POST['chiefValue']]);
    redirectToHome();
  } catch (PDOException $ex)
  {
    echo $ex->GetMessage();
  }
}

if (isset($_POST['InsertProjects']))
{
  try
  {
    $sth = $dbh->prepare(SQL_ADD_PROJECTS);
    $sth->execute([$_POST['ID_ProjectValue'], $_POST['PnameValue'], $_POST['managerValue']]);
    redirectToHome();
  } catch (PDOException $ex)
  {
    echo $ex->GetMessage();
  }
}

 ?>
