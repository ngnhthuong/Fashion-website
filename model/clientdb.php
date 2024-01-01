<?php

function getall_client(){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_client");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
function delete_client($id){
    echo $id;
    $conn=connectdb();
    $sql = "DELETE FROM tbl_client WHERE id=".$id;
    $conn->exec($sql);
  }

function insert_client($lname,$fname,$sex,$email,$phone,$user,$password,$address){
    $conn=connectdb();
    $sql = "INSERT INTO tbl_client(fname,lname,sex,email,phone,user,password,address)
    VALUES ('$fname','$lname','$sex','$email','$phone','$user','$password','$address')";
    $conn->exec($sql);
  }

  function getoneClient($id)
  {
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_client WHERE id=".$id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
  }
  
  function update_client($id,$lname,$fname,$sex,$email,$phone,$user,$password,$address,$ban){
    $conn=connectdb();
    $sql = "UPDATE tbl_client SET ban='".$ban."', lname='".$lname."',fname='".$fname."',sex='".$sex."',email='".$email."',phone='".$phone."',user='".$user."',password='".$password."',address='".$address."' WHERE id=".$id;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
  }
?>