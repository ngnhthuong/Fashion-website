<?php
    function getall_order(){
        $conn=connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_order  ORDER BY due_date DESC");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();
        return $kq;
    }
    function getall_order_id($id){
        $conn=connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_order WHERE id = $id ORDER BY due_date DESC");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();
        return $kq;
    }
    function getall_cart_id($id){
        $conn=connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_cart WHERE id_order = $id");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();
        return $kq;
    }
    function getall_cart(){
        $conn=connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_cart");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();
        return $kq;
    }
    function create_order($invoice_id,$total_prices,$payment,$lname,$fname,$address,$email,$phone,$id_user){
        $conn=connectdb();
        $sql = "INSERT INTO tbl_order(fname,lname,email,phone,address,id_user,invoice_id,total_prices,payment)
        VALUES ('$fname','$lname','$email','$phone','$address','$id_user','$invoice_id','$total_prices','$payment')";
        $conn->exec($sql);
        $last_id=$conn->lastInsertId();
        return $last_id;
    }
    
    function addtocart($iddh,$id,$name,$img,$price,$quantity,$size){
        $conn=connectdb();
        $sql = "INSERT INTO tbl_cart(id_order,id_pro,quantity,prices,size,name_pro,img_pro)
        VALUES ('".$iddh."','".$id."','".$quantity."','".$price."','".$size."','".$name."','".$img."')";
        $conn->exec($sql);
    }

    function update_checkout($address,$lname,$fname,$phone,$iddh,$email,$notes){
        $conn=connectdb();
        $sql = "UPDATE tbl_order SET lname='".$lname."',fname='".$fname."',email='".$email."',phone='".$phone."',address='".$address."',notes='".$notes."' WHERE id=".$iddh;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
      }
?>