  <!-- Start Shop Area  -->
  <style>
.active {
    background-color: green;
}
  </style>

  <?php
    // var_dump($detail_product);
    $i = 0;
    echo '
        <div class="axil-single-product-area axil-section-gap pb--0 bg-color-white">
            <div class="single-product-thumb mb--40">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 mb--40">
                            <div class="row">
                                <div class="col-lg-10 order-lg-2">
                                    <div class="single-product-thumbnail-wrap zoom-gallery">
                                        <div class="single-product-thumbnail product-large-thumbnail-3 axil-product">
                                            <div class="thumbnail">
                                                <a href="../uploads/'.$detail_product[0]["product_img"].'" class="popup-zoom">
                                                    <img class="custom_img_detail" src="../uploads/'.$detail_product[0]["product_img"].'" alt="Product Images">
                                                </a>
                                            </div>
                                            <div class="thumbnail">
                                                <a href="../uploads/size.png" class="popup-zoom">
                                                    <img class="custom_img_detail" src="../uploads/size.png" alt="Product Images">
                                                </a>
                                            </div>
                                        </div>

                                        <div class="product-quick-view position-view">
                                            <a href="../uploads/'.$detail_product[0]["product_img"].'" class="popup-zoom">
                                                <i class="far fa-search-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-2 order-lg-1">
                                    <div class="product-small-thumb-3 small-thumb-wrapper">
                                        <div class="small-thumb-img">
                                            <img src="../uploads/'.$detail_product[0]["product_img"].'" alt="thumb image">
                                        </div>
                                        <div class="small-thumb-img">
                                            <img src="../uploads/size.png" alt="thumb image">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 mb--40">
                            <div class="single-product-content">
                                <div class="inner">
                                    <h2 class="product-title">'.$detail_product[0]["product_name"].'</h2>
                                    <span class="price-amount">'.number_format($detail_product[0]["product_prices"]).'đ</span>';

                                    if ($detail_product[0]["quantity"] == 0) {
                                        echo '
                                            <ul class="product-meta">
                                                <li style="color: red;"><i class="fal fa-times"></i>Run out of stock</li>
                                                <li style="color: red;"><i class="fal fa-times"></i>'.$detail_product[0]["quantity"].' product available</li>
                                            </ul>
                                        ';
                                    } else {
                                        echo '
                                            <ul class="product-meta">
                                                <li style="color: Blue;"><i class="fal fa-check"></i>'.$detail_product[0]["quantity"].' product available</li>
                                            </ul>
                                        ';
                                    }

                                    echo '
                                    <div class="product-rating">
                                        <div class="star-rating">
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="fas fa-star"></i>
                                            <i class="far fa-star"></i>
                                        </div>
                                        <div class="review-link">
                                            <a href="#">(<span>2</span> customer reviews)</a>
                                        </div>
                                    </div>
                                    <ul class="product-meta">
                                        <li><i class="fal fa-check"></i>Free delivery available</li>
                                    </ul>
                                    <p class="description">'.$detail_product[0]["description"].'.</p>
                                    <div class="product-variations-wrapper">

                                        <!-- Start Product Variation  -->
                                        <div class="product-variation product-size-variation">
                                            <h6 class="title">Size:</h6>
                                            <ul class="range-variant">
                                                <li onclick="highlightSize(this)" class="active">'.$detail_product[0]["size"].'</li>
                                                <li onclick="highlightSize(this)">XL</li>
                                                <li onclick="highlightSize(this)">XXL</li>

                                            </ul>
                                        </div>
                                        <!-- End Product Variation  -->

                                    </div>';

                                    echo '
                                    <!-- Start Product Action Wrapper  -->
                                    <div class="product-action-wrapper d-flex-center">
                                        <form id="slider_product_'.$i.'" action="fashionApp.php?act=add_cart" method="POST">
                                            <input type="hidden" value="'.$detail_product[0]["product_img"].'" name="img">
                                            <input type="hidden" value="'.$detail_product[0]["product_name"].'" name="name">
                                            <input type="hidden" value="'.$detail_product[0]["product_prices"].'" name="price">
                                            <input type="hidden" value="'.$detail_product[0]["id_product"].'" name="id">
                                            <input type="hidden" value="'.$detail_product[0]["size"].'" name="size">
                                            <label style="color: red; font-weight: bold;">Quantity:</label>
                                            <input style="height: 59.2px; border: 1px solid #ccc; border-radius: 5px; font-size: 16px; color: #333;
                                            width: 100px;" type="number" name="quantity" value="1"  min="1" max="'.$detail_product[0]["quantity"].'" placeholder="quantity"  oninput="limitInput(this)">
                                        </form>
                                        <!-- Start Product Action  -->
                                        <ul class="product-action d-flex-center mb--0">';

                                            if ($detail_product[0]["quantity"] != 0) {
                                                echo '
                                                    <li class="add-to-cart"><a href="javascript:void(0);" onclick="submitForm('.$i.')" class="axil-btn btn-bg-primary">Add to Cart</a></li>
                                                    <li class="wishlist"><a href="#" class="axil-btn wishlist-btn"><i class="far fa-heart"></i></a></li>
                                                ';
                                            } else {
                                                echo '
                                                <li class="add-to-cart" ><a style="background-color: grey; color: white;"href="#" class="axil-btn" >Out of stock</a></li>
                                                <li class="wishlist"><a href="#" class="axil-btn wishlist-btn"><i class="far fa-heart"></i></a></li>
                                                ';
                                            }

                                    echo '
                                        </ul>
                                        <!-- End Product Action  -->
                                    </div>
                                    <!-- End Product Action Wrapper  -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    ';
?>


  <script>
function submitForm(formIndex) {
    var form = document.getElementById('slider_product_' + formIndex);
    form.submit();
}

//     function highlightSize(element) {
//   // Xóa class 'highlighted' từ tất cả các phần tử
//     var sizeElements = document.querySelectorAll('.range-variant li');
//     sizeElements.forEach(function(el) {
//         el.classList.remove('highlighted');
//     });

//     // Thêm class 'highlighted' vào phần tử được click
//     element.classList.add('highlighted');
//     }
  </script>

  <script>
function limitInput(input) {
    var min = parseInt(input.getAttribute("min"));
    var max = parseInt(input.getAttribute("max"));

    if (parseInt(input.value) < min) {
        input.value = min;
    } else if (parseInt(input.value) > max) {
        input.value = max;
    }
}
  </script>

  <script>
function highlightSize(element) {
    var sizeItems = document.getElementsByTagName("li");

    // Xóa lớp "active" cho tất cả các phần tử <li>
    for (var i = 0; i < sizeItems.length; i++) {
        sizeItems[i].classList.remove("active");
    }

    // Thêm lớp "active" cho phần tử được nhấp
    element.classList.add("active");
}
  </script>


  <!-- End .single-product-thumb -->