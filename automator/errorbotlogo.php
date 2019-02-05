<?php

   if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"../media/images/".$file_name);
      }else{
         print_r($errors);
      }
   }
 
 
/* Replace String Function*/
    function replace_string_in_file($filename, $string_to_replace, $replace_with){
        
    $content=file_get_contents($filename);
    $content_chunks=explode($string_to_replace, $content);
    $content=implode($replace_with, $content_chunks);
    file_put_contents($filename, $content);
    
    }
 
/* Error Page*/
    
    $error_filename="../app/bundles/CoreBundle/Views/Error/base.html.php";
    $f =$file_name;
    $a='<img class="img-responsive" src="<?php echo $src; ?>" />';
    $b= '<img class="img-responsive" src="/media/images/'; 
    $c='" />';
    $d =$b.$f.$c;
    /*Changing Mautibot Text*/
    $error_string_to_replace= $a;
    $error_replace_with= $d;
    replace_string_in_file($error_filename, $error_string_to_replace, $error_replace_with);  
    
    $error_filenamea="../app/bundles/CoreBundle/Views/Helper/noresults.html.php";
    $fa =$file_name;
    $aa='<img class="img-responsive" style="max-height: 125px; margin-left: auto; margin-right: auto;" src="<?php echo $view[\'mautibot\']->getImage(\'wave\'); ?>" />';
    $ba= '<img class="img-responsive" style="max-height: 125px; margin-left: auto; margin-right: auto;" src="/media/images/'; 
    $ca='" />';
    $da =$ba.$fa.$ca;
    /*Changing Mautibot Text*/
    $error_string_to_replacea= $aa;
    $error_replace_witha= $da;
    replace_string_in_file($error_filenamea, $error_string_to_replacea, $error_replace_witha); 
    ?>
<h1>Error Page Modified Sucessfully</h1>
<h3> <a href="abb.php">CLick Here</a> to View the Modified Version of Error Page</h3>
