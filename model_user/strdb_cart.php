<?php
function getall_srtcart(){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_storage");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}

function insert_strcart($id_user, $id_product){
    $conn=connectdb();
    $sql = "INSERT INTO tbl_storage(id_user_s,id_product_s)
    VALUES ('$id_user','$id_product')";
    $conn->exec($sql);
  }
?>