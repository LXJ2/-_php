<?php
function function_upload($name,$newname="",$dir="upload") 
{ 
 global $_FILES,$ext; 

 $return=""; 

 $time=time(); 

 $upload=trim($_FILES[$name][’tmp_name’]); 

 $upload_name=trim($_FILES[$name][’name’]); 

 $size=trim($_FILES[$name][’size’]); 

 if(empty($upload) or empty($upload_name) or $size==0) 
 { 
  return $return; 
 } 

 $dir.="/".date("Y-m",$time); 

 if (is_uploaded_file($upload)) 
 { 
  $ext=file_extension($upload_name); 

  if(liu_mkdir($dir)) 
  { 
    
   if($newname!="") 
   { 
     
    $newname.=".".$ext; 
    //$newname=TIME_NOW.".".$ext; 
   }else{ 
    //$newname=$upload_name; 
    $newname=$time.".".$ext; 
   } 

   if(move_uploaded_file($upload,$dir."/".$newname) and file_exists($dir."/".$newname)) 
   { 
    chmod($dir."/".$newname,0755); 
    $return=$dir."/".$newname; 
   } 
  } 

 } 

 return $return; 

} 

function file_extension($filename) 
{ 
 return substr(strrchr($filename, ’.’), 1); 
} 

function liu_mkdir($dir,$mode=0777) 
{ 
 if(is_dir($dir)) 
 { 

  if(!is_writable($dir)) 
  { 

   @chmod($dir,$mode); 

  } 
  return true; 
 } 
 else 
  
 { 

  $oldmask = @umask(0); 

  $partialpath = dirname($dir); 

  if(!liu_mkdir($partialpath,$mode)) 
  { 

   return false; 

  } 
  else 

  { 
   return mkdir($dir,$mode); 
  } 

 } 
}