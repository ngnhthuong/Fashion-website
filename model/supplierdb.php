<?php

function getall_supplier(){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_supplier");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}

function getoneSupplier($id)
{
  $conn=connectdb();
  $stmt = $conn->prepare("SELECT * FROM tbl_supplier WHERE sup_id=".$id);
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $kq=$stmt->fetchAll();
  return $kq;
}

function update_supplier($id,$name,$address,$bank,$tax){
  $conn=connectdb();
  $sql = "UPDATE tbl_supplier SET sup_name='".$name."',sup_address='".$address."',sup_bank='".$bank."',sup_tax_code='".$tax."' WHERE sup_id=".$id;
  $stmt = $conn->prepare($sql);
  $stmt->execute();
}

function delete_supplier($id){
    $conn=connectdb();
    $sql = "DELETE FROM tbl_supplier WHERE sup_id=".$id;
    $conn->exec($sql);
  }
function insert_supplier($name,$address,$bank,$tax){
    $conn=connectdb();
    $sql = "INSERT INTO tbl_supplier (sup_name,sup_address,sup_bank,sup_tax_code) VALUES ('$name','$address','$bank','$tax')";
    $conn->exec($sql);
}
?>