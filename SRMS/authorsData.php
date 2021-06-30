<?php
include 'utils/function.php';

$fileData = select('author','*');
return_json(200,$fileData);




?>