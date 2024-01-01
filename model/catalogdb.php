<?php
function delete_catalog($id){
  $conn=connectdb();
  $sql = "DELETE FROM tbl_catalog WHERE id_catalog_k=".$id;
  $conn->exec($sql);
}

function getall_catalog(){
  $conn=connectdb();
  $stmt = $conn->prepare("SELECT * FROM tbl_catalog");
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $kq=$stmt->fetchAll();
  return $kq;
}

function getoneCatalog($id)
{
  $conn=connectdb();
  $stmt = $conn->prepare("SELECT * FROM tbl_catalog WHERE id_catalog_k=".$id);
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $kq=$stmt->fetchAll();
  return $kq;
}

function update_catalog($id,$name,$display){
  $conn=connectdb();
  $sql = "UPDATE tbl_catalog SET catalog_name='".$name."', display_ctl='".$display."' WHERE id_catalog_k=".$id;
  $stmt = $conn->prepare($sql);
  $stmt->execute();
}

function insert_catalog($name,$prioritize,$display){
  $conn=connectdb();
  $sql = "INSERT INTO tbl_catalog (catalog_name,prioritize,display_ctl) VALUES ('$name','$prioritize','$display')";
  $conn->exec($sql);
}
?>