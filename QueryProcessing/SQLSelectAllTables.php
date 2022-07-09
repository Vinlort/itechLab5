<?php
echo "<table style='text-align:center;'><tr><td style='padding:20px;'>";
try // Вывести все с таблицы work
{
  $sth = $dbh->prepare(SQL_SELECT_ALL_WORK);
  $sth->execute();
  $data = $sth->fetchAll();
  echo "<table style='border-collapse: collapse;' border='1'><tr><td colspan='6' style='text-align:center; color:blue;'>Таблица WORK</td></tr><tr><td>FID_Worker</td><td>FID_Project</td><td>dateMy</td><td>time_start</td><td>time_end</td><td>description</td></tr>";
} catch (PDOException $ex) {
  $data = [];
  echo $ex->GetMessage();
}
foreach ($data as $d)
{
  echo "<tr><td>" . $d['FID_Worker'] . "</td><td>" . $d['FID_Projects'] . "</td><td>" . $d['dateMy'] . "</td><td>" . $d['time_start'] . "</td><td>" . $d['time_end'] . "</td><td>" . $d['description'] . "</td></tr>";
}

echo "</table>";
echo "</td><td style='padding:20px;'>";

try // Вывести все с таблицы worker
{
  $sth = $dbh->prepare(SQL_SELECT_ALL_WORKER);
  $sth->execute();
  $data = $sth->fetchAll();
  echo "<table style='border-collapse: collapse;' border='1'><tr><td colspan='2' style='text-align:center; color:blue;'>Таблица WORKER</td></tr><tr><td>ID_Worker</td><td>FID_Department</td></tr>";
} catch (PDOException $ex)
{
  $data = [];
  echo $ex->GetMessage();
}
foreach ($data as $d)
{
  echo "<tr><td>" . $d['ID_Worker'] . "</td><td>" . $d['FID_Department'] . "</td></tr>";
}

echo "</table>";
echo "</td><td style='padding:20px;'>";

try // Вывести все с таблицы department
{
  $sth = $dbh->prepare(SQL_SELECT_ALL_DEPARTMENT);
  $sth->execute();
  $data = $sth->fetchAll();
    echo "<table style='border-collapse: collapse;' border='1'><tr><td colspan='2' style='text-align:center; color:blue;'>Таблица DEPARTMENT</td></tr><tr><td>ID_Department</td><td>chief</td></tr>";
} catch (PDOException $ex)
{
  $data = [];
  echo $ex->GetMessage();
}
foreach ($data as $d)
{
  echo "<tr><td>" . $d['ID_Department'] . "</td><td>" . $d['chief'] . "</td></tr>";
}

echo "</table>";
echo "</td></tr></table>";

try // Вывести все с таблицы projects
{
  $sth = $dbh->prepare(SQL_SELECT_ALL_PROJECTS);
  $sth->execute();
  $data = $sth->fetchAll();
    echo "<table style='border-collapse: collapse;' border='1'><tr><td colspan='3' style='text-align:center; color:blue;'>Таблица PROJECTS</td></tr><tr><td>ID_Project</td><td>name</td><td>manager</td></tr>";
} catch (PDOException $ex)
{
  $data = [];
  echo $ex->GetMessage();
}
foreach ($data as $d)
{
  echo "<tr><td>" . $d['ID_Project'] . "</td><td>" . $d['name'] . "</td><td>" . $d['manager'] . "</td></tr>";
}

echo "</table>";
echo "</td></tr></table>";
 ?>
