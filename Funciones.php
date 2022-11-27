<?php
class Funciones{
    
    public function getData($project, $collection, $document){
        $url = 'https://'.$project.'.firebaseio.com/'.$collection.'/'.$document.'.json';
    
        $ch =  curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        // Se convierte a Object o NULL
        return json_decode($response);
    }

    public function getDataOferta($project, $collection, $document){
        $url = 'https://'.$project.'.firebaseio.com/'.$collection.'/'.$document.'/Editorial.json';
    
        $ch =  curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
        $response = curl_exec($ch);
    
        curl_close($ch);
    
        // Se convierte a Object o NULL
        return json_decode($response);
    }

    function insertar_Prod($project, $collection, $document) {
        $url = 'https://'.$project.'.firebaseio.com/productos/'.$collection.'.json';
    
        $ch =  curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH" );  // en sustitución de curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $document);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/plain'));
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
        $response = curl_exec($ch);
    
        curl_close($ch);
    
        // Se convierte a Object o NULL
        return json_decode($response);
    }

    public function insertar_Detalles($project, $collection, $document) {
        $url = 'https://'.$project.'.firebaseio.com/detalles/'.$collection.'.json';
    
        $ch =  curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH" );  // en sustitución de curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $document);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/plain'));
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
        $response = curl_exec($ch);
    
        curl_close($ch);
    
        // Se convierte a Object o NULL
        return json_decode($response);
    }

    public function update_detalles($project, $collection, $document) {
        $url = 'https://'.$project.'.firebaseio.com/detalles/'.$collection.'.json';
    
        $ch =  curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PATCH" );  // en sustitución de curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $document);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: text/plain'));
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
        $response = curl_exec($ch);
    
        curl_close($ch);
    
        // Se convierte a Object o NULL
        return json_decode($response);
    }

    public function delete_detail($project, $collection, $document) {
        $url = 'https://'.$project.'.firebaseio.com/'.$collection.'/'.$document.'.json';
    
        $ch =  curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
        $response = curl_exec($ch);
    
        // Si no se obtuvieron resultados, entonces no existe la colección
        if( is_null(json_decode($response)) ) {
            $resBool =  false;
        } else {    // Si existe la colección, entnces se procede a eliminar la colección
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE" ); 
            curl_exec($ch);
            $resBool =  true;
        }
        
        curl_close($ch);
    
        // Se devuelve true o false
        return $resBool;
    }

    public function delete_prod($project, $collection, $document) {
        $url = 'https://'.$project.'.firebaseio.com/productos/'.$collection.'/'.$document.'.json';
    
        $ch =  curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    
        $response = curl_exec($ch);
    
        // Si no se obtuvieron resultados, entonces no existe la colección
        if( is_null(json_decode($response)) ) {
            $resBool =  false;
        } else {    // Si existe la colección, entnces se procede a eliminar la colección
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE" ); 
            curl_exec($ch);
            $resBool =  true;
        }
        
        curl_close($ch);
    
        // Se devuelve true o false
        return $resBool;
    }


}
 ?>