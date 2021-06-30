<?php
include 'utils/function.php';

$fileData = select('editor','*');
return_json(200,$fileData);




?>