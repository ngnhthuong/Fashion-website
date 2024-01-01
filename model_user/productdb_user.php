<?php
function getall_product(){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_product");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}

// function search_product($query){
//     $conn=connectdb();
//     $stmt = $conn->prepare("SELECT * FROM tbl_product WHERE product_name LIKE '%$query%' OR description LIKE '%$query%' OR product_prices LIKE '%$query% ");
//     $stmt->execute();
//     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//     $kq=$stmt->fetchAll();
//     return $kq;
// }

function search_product($query) {
    $conn = connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_product WHERE product_name LIKE :query OR description LIKE :query OR product_prices LIKE :query");
    $stmt->bindParam(':query', $queryParam, PDO::PARAM_STR);
    $queryParam = '%' . $query . '%';
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}


function update_quantity_product($id,$quantity){
    $conn=connectdb();
    $sql = "UPDATE tbl_product SET quantity='".$quantity."' WHERE id_product=".$id;
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function getall_product_hot(){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_product WHERE special ='1'");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
// function getall_product_new(){
//     $conn=connectdb();
//     $stmt = $conn->prepare("SELECT * FROM tbl_product ORDER BY id_product DESC");
//     $stmt->execute();
//     $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
//     $kq=$stmt->fetchAll();
//     return $kq;
// }
function get_detail_product($id){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_product Where id_product =".$id);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}

function getall_product_view($iddm,$view){
    $conn=connectdb();
    $sql = "SELECT * FROM tbl_product WHERE 1";
    if($iddm > 0){
        $sql.=" AND catalog_id =".$iddm;
    }
    if($view == 1)
    {
        $sql.=" order by view DESC";
    } else {
        $sql.=" order by id_product DESC";
    }
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}
?>