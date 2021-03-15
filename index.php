<?php

require "./lib/JSONreader.php";
require "./lib/searchFunctions.php";



$taskList = JSONReader("./dataset/TaskList.json");
if (isset($_GET['searchText']) && trim($_GET['searchText']) !== '') {
    $searchText = trim(filter_var($_GET["searchText"],FILTER_SANITIZE_STRING));
    $taskList = array_filter($taskList, searchText($searchText)); //array filter sta applicando la condizione di vero o falso su ogni elemento dell'array dato, della funzione esplicata dopo la parantesi e la virgola
}else {
    $searchText = "";
}

//il name serve a php per prendere il valore che hai selezionato
if (isset($_GET["status"])) {
    
}







//var_dump($searchText);
?>







<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <title>Taklist</title>
</head>
<body>

    <div class="container-fluid bg-secondary py-3 mb-3 text-light">
        <div class="container">
            <h1 class="display-1">Tasklist</h1>
        </div>
    </div>
    
    <form action="./index.php">
    <div class="container">
        <div class="input-group pb-3 my-1">
            <label class="w-100 pb-1 fw-bold" for="searchText">Cerca</label>
            <input id="searchText" name = "searchText" type="text" class="form-control" placeholder="attività da cercare">
            <div class="input-group-append">
              <button class="btn btn-primary" type="submit">Invia</button>
            </div>
        </div>

        <div id="status-radio" class=" mb-3">
            <div class="fw-bold pe-2 w-100">Stato attività</div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" value="all" name="status">
                <label class="form-check-label" >tutti</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio"   value="to do" name="status">
                <label class="form-check-label" >da fare</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio"   value="progress" name="status">
                <label class="form-check-label" >in lavorazione</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio"   value="done" name="status">
                <label class="form-check-label" >fatto</label>
              </div>
        </div>
    
        <section class="tasklist mt-3">
            <h1 class="fw-bold fs-6">Elenco delle attività</h1>
            <table class="table">
                <tr>
                    <th class="w-100">nome</th>
                    <th class="text-center">stato</th>
                    <th class="text-center">data</th>
                </tr>
                <tr>
                <?php 
                      foreach ($taskList as $key => $task) { 
            
                        $status = $task["status"];
                        $taskName = $task["taskName"];
                        $expirationDate = $task["expirationDate"];
                      

                ?>
        
                    <td><?php echo $taskName ?> </td>
                    <td class="text-center">
                        <span class="badge bg-danger text-uppercase"> <?php echo $status ?></span>
                    </td>
                    <td class="text-nowrap "> 
                    <?php echo $expirationDate ?>
                    </td>
            </tr>
            <?php } ?>
                <!--<tr>
                    <td>Comprare la farina</td>
                    <td class="text-center">
                        <span class="badge bg-secondary text-uppercase">done</span>
                    </td>
                    <td class="text-nowrap">
                        20 Settembre
                    </td>
                </tr>
                <tr>
                    <td>Comprare la farina</td>
                    <td class="text-center">
                        <span class="badge bg-primary text-uppercase">progress</span>
                    </td>
                    <td class="text-nowrap">
                        18 Settembre
                    </td>
                </tr> -->
            </table>

        </section>
    </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>
