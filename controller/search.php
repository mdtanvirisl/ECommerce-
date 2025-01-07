<?php
require_once('../model/userModel.php');


    $name = $_REQUEST['name'];
    $result = searchContent($name);

    echo json_encode($result);

?>