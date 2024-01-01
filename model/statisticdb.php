<?php
    function count_invoice_month($month) {
        $conn = connectdb();
        $sql = "SELECT COUNT(*) AS invoice_count FROM tbl_order WHERE MONTH(due_date) = :month AND status != 'Pending' AND status != 'Cancel'";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':month', $month, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['invoice_count'];
    }
    function sum_invoice_month($month) {
        $conn = connectdb();
        $sql = "SELECT SUM(total_prices) AS total_value FROM tbl_order WHERE MONTH(due_date) = :month AND status != 'Pending' AND status != 'Cancel'";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':month', $month, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['total_value'];
    }
    function getall_invoice_month($month){
        $conn = connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_order WHERE MONTH(due_date) =:month ");
        $stmt->bindParam(':month', $month, PDO::PARAM_INT);
        $stmt->execute();
        $kq = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $kq;
    }
    
    function getall_cart_month($id){
        $conn = connectdb();
        $stmt = $conn->prepare("SELECT * FROM tbl_cart WHERE id_order =:id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $kq = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $kq;
    }
    
?>