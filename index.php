<?php
require_once "request.php";
require_once "ConnectionFactory.php";
require_once "Parts/header.php";
 ?>
 <div class="" >
  <?php require "QueryProcessing/SQLSelectAllTables.php"; ?> <!-- Вывести все с БД по таблицам-->
</div>

    <div class="RefreshBtn">  <!-- Кнопка обновления страницы-->
          <button style="margin-top:30px;" value="Refresh Page" onClick="window.location.reload();">Обновить страницу</button>
    </div>

    <div class="InsertDiv">
      <p class="pInsert">Вставить в таблицу WORK</p>
      <form action="QueryProcessing/SQLInsertTables.php" method="post">
        <select id="FID_Worker" name="selectFID_Worker">
          <?php
          try
          {
            $sth = $dbh->prepare(SQL_SELECT_ALL_WORKER);
            $sth->execute();
            $data = $sth->fetchAll();
            echo "<option disabled>Выберите FID_Worker</option>";
          } catch (PDOException $ex)
          {
            $data = [];
            echo $ex->GetMessage();
          }
          foreach ($data as $d)
          {
            echo "<option value='" . $d['ID_Worker'] . "'>" . $d['ID_Worker'] . "</option>";
          }
           ?>
        </select>
        <select id="FID_Projects" name="selectFID_Projects">
          <?php
          try
          {
            $sth = $dbh->prepare(SQL_SELECT_ALL_PROJECTS);
            $sth->execute();
            $data = $sth->fetchAll();
            echo "<option disabled>Выберите FID_Projects</option>";
          } catch (PDOException $ex)
          {
            $data = [];
            echo $ex->GetMessage();
          }
          foreach ($data as $d)
          {
            echo "<option value='" . $d['ID_Project'] . "'>" . $d['name'] . "</option>";
          }
           ?>
        </select>
        <label class="lblName" for="dateMy">dateMy (YYYY-MM-DD):                  </label>              <input type="text" name="dateMyValue" value="" id="dateMy">
        <label class="lblName" for="time_start">time_start (YYYY-MM-DD hh:mm:ss): </label>      <input type="text" name="time_startValue" value="" id="time_start">
        <label class="lblName" for="time_end">time_end (YYYY-MM-DD hh:mm:ss):     </label>          <input type="text" name="time_endValue" value="" id="time_end">
        <label class="lblName" for="description">description:                     </label>    <input type="text" name="descriptionValue" value="" id="description">
        <input class="sbmBtn" type="submit" name="InsertWork" value="Отправить">
    </form>
    </div>

    <div class="InsertDiv">
      <p class="pInsert">Вставить в таблицу WORKER</p>
      <form action="QueryProcessing/SQLInsertTables.php" method="post">
        <label class="lblName" for="ID_Worker">ID_Worker: </label>     <input type="number" name="ID_WorkerValue" value="" id="ID_Worker">
        <select id="FID_Department" name="selectFID_Department">
          <?php
          try
          {
            $sth = $dbh->prepare(SQL_SELECT_ALL_DEPARTMENT);
            $sth->execute();
            $data = $sth->fetchAll();
            echo "<option disabled>Выберите FID_Department</option>";
          } catch (PDOException $ex)
          {
            $data = [];
            echo $ex->GetMessage();
          }
          foreach ($data as $d)
          {
            echo "<option value='" . $d['ID_Department'] . "'>" . $d['chief'] . "</option>";
          }
           ?>
        </select>
        <input class="sbmBtn" type="submit" name="InsertWorker" value="Отправить">
    </form>
    </div>

    <div class="InsertDiv">
      <p class="pInsert">Вставить в таблицу DEPARTMENT</p>
      <form action="QueryProcessing/SQLInsertTables.php" method="post">
        <label class="lblName" for="ID_Department">ID_Department: </label>   <input type="number" name="ID_DepartmentValue" value="" id="ID_Department">
        <label class="lblName" for="chief">chief: </label>                   <input type="text" name="chiefValue" value="" id="chief">
        <input class="sbmBtn" type="submit" name="InsertDepartment" value="Отправить">
    </form>
    </div>

    <div class="InsertDiv">
      <p class="pInsert">Вставить в таблицу PROJECTS</p>
      <form action="QueryProcessing/SQLInsertTables.php" method="post">
        <label class="lblName" for="ID_Project">ID_Project: </label>   <input type="number" name="ID_ProjectValue" value="" id="ID_Project">
        <label class="lblName" for="Pname">name: </label>              <input type="text" name="PnameValue" value="" id="Pname">
        <label class="lblName" for="manager">manager: </label>         <input type="text" name="managerValue" value="" id="manager">
        <input class="sbmBtn" type="submit" name="InsertProjects" value="Отправить">
    </form>
    </div>



    <div class="SelectDiv">
      <div class="InsertDiv1">
        <form action="QueryProcessing/SQLSelectTables.php" method="post">
          <label class="lblName" for="SelectByProjectAndTime">информация о выполненных задачах по выбранному проекту на указанную дату: </label>
          <select id="SelectByProjectAndTime" name="selectInfoByProjectAndTime">
            <?php
            try
            {
              $sth = $dbh->prepare(SQL_SELECT_ALL_PROJECTS);
              $sth->execute();
              $data = $sth->fetchAll();
              echo "<option disabled>Выберите Project</option>";
            } catch (PDOException $ex)
            {
              $data = [];
              echo $ex->GetMessage();
            }
            foreach ($data as $d)
            {
              echo "<option value='" . $d['ID_Project'] . "'>" . $d['ID_Project'] . "</option>";
            }
             ?>
          </select>
          <label class="lblName" for="dateMy1">date (YYYY-MM-DD): </label> <input type="text" name="dateMy1Value" value="" id="dateMy1">
          <input class="sbmBtn" type="submit" name="SelectByProjectAndTimeBtn" value="Получить">
        </form>
      </div>

      <div class="InsertDiv1">
        <form action="QueryProcessing/SQLSelectTables.php" method="post">
          <label class="lblName" for="SelectByCategory">общее время работы над выбранным проектом: </label>
          <select id="SelectWorkTime" name="selectWorkTime">
            <?php
            try
            {
              $sth = $dbh->prepare(SQL_SELECT_ALL_PROJECTS);
              $sth->execute();
              $data = $sth->fetchAll();
              echo "<option disabled>Выберите Project</option>";
            } catch (PDOException $ex)
            {
              $data = [];
              echo $ex->GetMessage();
            }
            foreach ($data as $d)
            {
              echo "<option value='" . $d['ID_Project'] . "'>" . $d['ID_Project'] . "</option>";
            }
             ?>
          </select>
          <input class="sbmBtn" type="submit" name="SelectByWorkTimeBtn" value="Получить">
        </form>
      </div>

      <div class="InsertDiv1">
        <form action="QueryProcessing/SQLSelectTables.php" method="post">
          <label class="lblName" for="SelectByPrice">число сотрудников отдела выбранного руководителя: </label>
          <select id="SelectCountOfWorkers" name="selectCountOfWorkers">
            <?php
            try
            {
              $sth = $dbh->prepare(SQL_SELECT_ALL_DEPARTMENT);
              $sth->execute();
              $data = $sth->fetchAll();
              echo "<option disabled>Выберите Department</option>";
            } catch (PDOException $ex)
            {
              $data = [];
              echo $ex->GetMessage();
            }
            foreach ($data as $d)
            {
              echo "<option value='" . $d['ID_Department'] . "'>" . $d['ID_Department'] . "</option>";
            }
             ?>
          </select>
          <input class="sbmBtn" type="submit" name="SelectByDepartmentBtn" value="Получить">
        </form>
      </div>
    </div>







<?php require_once "Parts/footer.php"; ?>
