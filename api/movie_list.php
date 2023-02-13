<?php
include_once "base.php";

$rows=$Movie->all(" order by `rank`");
echo json_encode($rows);
?>