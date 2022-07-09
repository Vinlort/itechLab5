<?php
require_once "../request.php";
require_once "../ConnectionFactory.php";
require_once "../functions.php";
 ?>
 <?php
if (isset($_POST['SelectByProjectAndTimeBtn']))
{
  try
  {
    $sth = $dbh->prepare(SQL_SELECT_INFO_BY_PROJECT_AND_DATE);
    $sth->execute([$_POST['selectInfoByProjectAndTime'], $_POST['dateMy1Value']]);
    $data = $sth->fetchAll();
    echo "<table style='border-collapse: collapse;' border='1'><tr><td colspan='9' style='text-align:center; color:blue;'>Таблица информация о выполненных задачах по выбранному проекту на указанную дату</td></tr><tr><td>FID_Worker</td><td>FID_Projects</td>
    <td>dateMy</td><td>time_start</td><td>time_end</td><td>description</td><td>ID_Project</td><td>name</td><td>manager</td></tr>";
  } catch (PDOException $ex)
  {
    $data = [];
    echo $ex->GetMessage();
  }
  foreach ($data as $d)
  {
    echo "<tr><td>" . $d['FID_Worker'] . "</td><td>" . $d['FID_Projects']  . "</td><td>" . $d['dateMy'] . "</td><td>"
    . $d['time_start'] . "</td><td>" . $d['time_end'] . "</td><td>" . $d['description'] . "</td><td>" . $d['ID_Project'] . "</td><td>" . $d['name'] . "</td><td>" . $d['manager'] . "</td></tr>";
  }
  echo "</table>";
}

if (isset($_POST['SelectByWorkTimeBtn']))
{
  try
  {
    $sth = $dbh->prepare(SQL_SELECT_TIME_OF_WORK);
    $sth->execute([$_POST['selectWorkTime']]);
    $data = $sth->fetchAll();
    echo "<table style='border-collapse: collapse;' border='1'><tr><td colspan='1' style='text-align:center; color:blue;'>Таблица общее время работы над выбранным проектом</td></tr><tr><td>Время</td></tr>";
  } catch (PDOException $ex)
  {
    $data = [];
    echo $ex->GetMessage();
  }
  foreach ($data as $d)
  {
    echo "<tr><td>" . $d['datediff'] . "</td></tr>";
  }
  echo "</table>";
}

if (isset($_POST['SelectByDepartmentBtn']))
{
  try
  {
    $sth = $dbh->prepare(SQL_SELECT_COUNT_OF_WORKERS);
    $sth->execute([$_POST['selectCountOfWorkers']]);
    $data = $sth->fetchAll();
    echo "<table style='border-collapse: collapse;' border='1'><tr><td colspan='1' style='text-align:center; color:blue;'>Таблица число сотрудников отдела выбранного руководителя</td></tr><tr><td>COUNT(a.ID_Worker)</td></tr>";
  } catch (PDOException $ex)
  {
    $data = [];
    echo $ex->GetMessage();
  }
  foreach ($data as $d)
  {
    echo "<tr><td>" . $d['count'] . "</td></tr>";
  }
  echo "</table>";
}

 ?>

 <div style="text-align: center;">
      <form action="../functions.php" method="post">
        <input type="submit" name="HomeBtn" value="Go Home">
      </form>
 </div>
