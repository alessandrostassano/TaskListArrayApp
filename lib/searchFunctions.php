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
    return function ($taskList) use ($status){
    return strpos($taskList["status"], $status)!==false;
};

}

