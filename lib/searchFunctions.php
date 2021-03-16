<?php
/**
 * Funzione di ordine superiore funzione che restituisce una funzione
 * Programmazione Funzionale - dichiarativo 
 */
function searchText ($searchText){
    return function ($taskList) use ($searchText) {
    return  strpos($taskList['taskName'], $searchText)!== false;
};
    
    
};

/**
 * @var string $status è la stringa che corrisponde allo status da cercare
 * (progress|done|todo)
 * @return callable La funzione che verrà utilizzata da array_filter
 */
function searchStatus(string $status) : callable {
    return function ($taskList) use ($status){ //use permette di utilizzare la variabile locale della prima funzione nel return 
    if ($status === "all") {
        return $taskList;
    } else {
        return strpos($taskList["status"], $status)!==false; //il parametro preso in ingresso è lo $status inserito dall'utente. La funzione secondaria prende come argomento tramite lo use lo status, e nelle condizioni chiede se lo status inserito è uguale al valore all, se si ritorna una task list completa di tutti i nomi, altrimenti ritorna la string position dello status in questione selezionato
    }
};

}

function searchColors ($status) {
    if ($status === "progress") {
        return "primary";
    }
    else if ($status === "done") {
        return "secondary";
    }
    else if ($status === "todo") {
        return "danger";
}
}

