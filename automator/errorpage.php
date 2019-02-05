<?php
/* Replace String Function*/
    function replace_string_in_file($filename, $string_to_replace, $replace_with){
        
    $content=file_get_contents($filename);
    $content_chunks=explode($string_to_replace, $content);
    $content=implode($replace_with, $content_chunks);
    file_put_contents($filename, $content);
    
    }
 
/* Error Page*/
    
    $error_filename="../app/bundles/CoreBundle/Views/Error/base.html.php";
    
    /*Changing Mautibot Text*/
    $error_string_to_replace= "<footer class=\"text-right\">Mautibot</footer>";
    $error_replace_with= "<footer class=\"text-right\">Campact</footer>";
    replace_string_in_file($error_filename, $error_string_to_replace, $error_replace_with);  
    
    /*Removing Link to Mautic*/
    
    $a ="<a class=\"text-muted\" href=\"http://mau.tc/report-issue\" target=\"_new\"><?php echo ";
    $b = "$";
    $c = "view['translator']->trans('mautic.core.report_issue'); ?></a>";
    $error_link_to_replace= $a.$b.$c;
    $error_link_replace_with= " ";
    replace_string_in_file($error_filename, $error_link_to_replace, $error_link_replace_with); 
    
    
?>
<h1>Error Page Modified Sucessfully</h1>
<h2> <a href="/abd.php">Click Here</a> to view the modified Version of Error Page</h2>