<?php
/* Replace String Function*/
    function replace_string_in_file($filename, $string_to_replace, $replace_with){
        
    $content=file_get_contents($filename);
    $content_chunks=explode($string_to_replace, $content);
    $content=implode($replace_with, $content_chunks);
    file_put_contents($filename, $content);
    
    }
 
/* SEGMENT FIX*/
    
    $segment_filename="../app/config/local.php";

    $segment_string_to_replace= "'db_driver' => 'mysqli',";
    $segment_replace_with= "'db_driver' => 'pdo_mysql',";
    replace_string_in_file($segment_filename, $segment_string_to_replace, $segment_replace_with);    
?>
<h1> Segment Fix error fixed Sucessfully</h1>