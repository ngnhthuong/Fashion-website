<?php
include "../model_user/connectdb_user.php";
include "../model_user/catalogdb_user.php";
include "../model_user/productdb_user.php";
include "../model_user/clientdb_user.php";
include "../model_user/invoicedb.php";
session_start(); // Bắt đầu session

// Kết nối tới cơ sở dữ liệu


// Lấy từ khóa tìm kiếm từ yêu cầu POST
$query = $_POST['query'];

$searchResults = search_product($query);

// Gán kết quả tìm kiếm vào session
$_SESSION['searchResults'] = $searchResults;


// Trả về HTML để hiển thị kết quả tìm kiếm
if (!empty($searchResults)) {
    foreach ($searchResults as $result) {
        echo'
            <div class="psearch-results">
            <div class="axil-product-list">
                <div class="thumbnail">
                    <a href="fashionApp.php?act=detail_product&id='.$result['id_product'].'">
                        <img style="    height: 80px;
                        width: 80px;" src="../uploads/'.$result['product_img'].'"
                            alt="Yantiti Leather Bags">
                    </a>
                </div>
                <div class="product-content">
                    <div class="product-rating">
                        <span class="rating-icon">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fal fa-star"></i>
                        </span>
                        <span class="rating-number"><span>100+</span> Reviews</span>
                    </div>
                    <h6 class="product-title">             
                        <a href="fashionApp.php?act=detail_product&id='.$result['id_product'].'">'.$result['product_name'].'</a>
                    </h6>
                    <div class="product-price-variant">
                    <span class="price current-price">'.number_format($result['product_prices']).'đ</span>
                    </div>
                    <div class="product-cart">
                        <a href="fashionApp.php?act=detail_product&id='.$result['id_product'].'" class="cart-btn"><i
                                class="fal fa-shopping-cart"></i></a>
                    </div>
                </div>
            </div>
        </div> 
        ';
    }
} else {
    echo "No results found.";
}
?>