<?php

function getall_product(){
    $conn=connectdb();
    $stmt = $conn->prepare("SELECT * FROM tbl_product");
    $stmt->execute();
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $kq=$stmt->fetchAll();
    return $kq;
}

function insert_product($id_pd,$quantity_pd,$name_pd,$prices_pd,$img_pd, $id_ee,$sup_pd,$oldprices_pd,$view_pd,$special_pd,$description_pd,$size_pd){
    $conn=connectdb();
    $sql = "INSERT INTO tbl_product(product_name,quantity,product_img,product_prices,catalog_id,employee_entry,sup_id,old_prices,view,special,description,size)
    VALUES ('$name_pd','$quantity_pd','$img_pd',$prices_pd,$id_pd,'$id_ee','$sup_pd','$oldprices_pd','$view_pd','$special_pd','$description_pd','$size_pd')";
    $conn->exec($sql);
  }

function delete_product($id){
    $conn=connectdb();
    $sql = "DELETE FROM tbl_product WHERE id_product=".$id;
    $conn->exec($sql);
  }

function getoneProduct($id)
{
  $conn=connectdb();
  $stmt = $conn->prepare("SELECT * FROM tbl_product WHERE id_product=".$id);
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $kq=$stmt->fetchAll();
  return $kq;
}

function get_product_by_name_and_size($name_pd, $size_pd)
{
  $conn=connectdb();
  $stmt = $conn->prepare("SELECT * FROM tbl_product WHERE product_name='$name_pd' AND size = '$size_pd'");
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $kq = $stmt->fetch(PDO::FETCH_ASSOC);
  return $kq;
}

function getall_cart_id(){
  $conn=connectdb();
  $stmt = $conn->prepare("SELECT * FROM tbl_cart");
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $kq=$stmt->fetchAll();
  return $kq;
}

function update_product_quantity($id, $new_quantity){
  $conn=connectdb();
  $sql = "UPDATE tbl_product SET quantity='$new_quantity' WHERE id_product=".$id;
  $stmt = $conn->prepare($sql);
  $stmt->execute();
}

function update_product($id, $quantity_pd, $id_pd, $name_pd, $prices_pd, $img_pd,$id_ee,$id_sup,$oldprices_pd,$view_pd,$special_pd,$description_pd,$size_pd){
    $conn=connectdb();
    if($img_pd=="")
    {
        $sql = "UPDATE tbl_product SET size='".$size_pd."',description='".$description_pd."',old_prices='".$oldprices_pd."', view='".$view_pd."',special='".$special_pd."',product_name='".$name_pd."',  quantity='".$quantity_pd."',product_prices='".$prices_pd."', catalog_id='".$id_pd."',employee_entry='".$id_ee."',sup_id='".$id_sup."' WHERE id_product=".$id;
    }
    else
    {
        $sql = "UPDATE tbl_product SET old_prices='".$oldprices_pd."', view='".$view_pd."',special='".$special_pd."', product_name='".$name_pd."',quantity='".$quantity_pd."', product_prices='".$prices_pd."', catalog_id='".$id_pd."', product_img='".$img_pd."',employee_entry='".$id_ee."',sup_id='".$id_sup."' WHERE id_product=".$id;
    }
    $stmt = $conn->prepare($sql);
    $stmt->execute();
  }
?>