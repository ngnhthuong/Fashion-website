<?php
function getall_client_user(){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_client");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}

function insert_client_user($lname,$fname,$sex,$email,$phone,$user,$password, $address){
    $conn=connectdb();
    $sql = "INSERT INTO tbl_client(fname,lname,sex,email,phone,user,password,address)
    VALUES ('$fname','$lname','$sex','$email','$phone','$user','$password','$address')";
    $conn->exec($sql);
  }

  function get_userban($user, $ban) {
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_client WHERE user='".$user."' AND ban='".$ban."'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq = $stmt->fetchAll();
    if(count($kq) > 0) {
        return 0;
    }
    return 1;
}

function get_user($user, $pass) {
  $conn = connectdb();
  $stmt = $conn->prepare("SELECT * FROM tbl_client WHERE user='".$user."' AND password='".$pass."'");
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $kq = $stmt->fetchAll();
  if(count($kq) > 0) {
      return $kq;
  }
  return 0;
}


  function get_user_checkout($id_user){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_client WHERE id=".$id_user);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    if(count($kq)>0){
      return $kq;
    }
    return 0;
  }
?>