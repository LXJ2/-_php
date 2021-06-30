<?php
include 'utils/function.php';

$fileData = select('file','*');
return_json(200,$fileData);




?>