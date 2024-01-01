<?php

function getall_user(){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_user");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}

function insert_acadmin($name,$address,$mail,$user,$password,$role){
    $conn=connectdb();
    $sql = "INSERT INTO tbl_user(name_us,address_us,email,user,password_us,role_us)
    VALUES ('$name','$address','$mail','$user','$password',$role)";
    $conn->exec($sql);
  }

  function check_user($user,$pass){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_user WHERE user='".$user."' AND password_us='".$pass."'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    if(count($kq) > 0)
    {
      return $kq[0]['role_us'];
    }
    return 0;
}

?>