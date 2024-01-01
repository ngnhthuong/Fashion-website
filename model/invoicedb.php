<?php
    function getall_invoice(){
        $conn=connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_order ORDER BY due_date DESC");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $kq=$stmt->fetchAll();
        return $kq;
    }

    function getoneInvoice($id)
    {
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_order WHERE id=".$id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
    }

    function update_invoice($id,$id_ee,$status,$phone,$email,$fname,$lname,$address){
        $conn=connectdb();
        $sql = "UPDATE tbl_order SET status='$status', employee_pr='$id_ee', phone='$phone', email='$email', lname='$lname', fname='$fname', address='$address' WHERE id=".$id;
        $stmt = $conn->prepare($sql);
        $stmt->execute();
    }
?>