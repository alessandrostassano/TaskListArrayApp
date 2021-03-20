<?php
/**
 * Funzione di ordine superiore funzione che restituisce una funzione
 * Programmazione Funzionale - dichiarativo 
 */
function searchText ($searchText){
    return function ($mocktaskList) use ($searchText) { //gli sot dicendo con use di usare anche per questa funzione la variabile contenuta nella funciton superiore $searchText
        $TextNoSpace = preg_replace("/[ ]+/m"," ",$searchText);
        $searchTextTrim = trim($TextNoSpace);
        //$TextLower = strtolower($searchTextTrim);
        //$taskNameLower = strtolower($mocktaskList["taskName"]);

       If ($searchTextTrim !== ""){
        $risultato = stripos($mocktaskList["taskName"],$searchTextTrim) !== false; 
        } else {
        $risultato = true;
       }

    return $risultato;
};
};

/**
 * @var string $status è la stringa che corrisponde allo status da cercare
 * (progress|done|todo)
 * @return callable La funzione che verrà utilizzata da array_filter
 */
function searchStatus(string $status) : callable {
    return function ($taskList) use ($status){ //use permette di utilizzare la variabile locale della prima funzione nel return 
    if (($status === "all") || ($status === "")) {
        return $taskList;
    } else {
        return stripos($taskList["status"], $status)!==false; //il parametro preso in ingresso è lo $status inserito dall'utente. La funzione secondaria prende come argomento tramite lo use lo status, e nelle condizioni chiede se lo status inserito è uguale al valore all, se si ritorna una task list completa di tutti i nomi, altrimenti ritorna la string position dello status in questione selezionato
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

