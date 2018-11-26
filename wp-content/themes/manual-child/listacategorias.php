<?php
/**
 * The template part to load Profiles Categories
*/

function carregaLista(){
    return $listagem = array( '39' , '373' , '51' , '387' , '369' , '370' , '396' , '452');
}

function cats_select(){
    $var = $_COOKIE["perfil"];
    if($var == 'Administrator'){
        $idcategorias = array();
    }
    
    else if($var == 'Subscriber'){
        
        
    }
    
    else if($var == 'Manager'){
        
    }
    
    else if($var == 'Technician'){
        
    }
    
    else if($var == 'Requester'){
        
        
    }
    
    else if($var == 'Developer'){
       
        
    }
    return $idcategorias;
}

?>