<?php
function getall_catalog_user(){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_catalog");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
?>