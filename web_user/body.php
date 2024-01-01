<main class="main-wrapper">
    <!-- Start Slider Area (banner) -->
    <div class="axil-main-slider-area main-slider-style-3">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6">
                    <div class="main-slider-content">
                        <span class="subtitle"><i class="fas fa-fire"></i>Buy now before run off 🌟</span>
                        <h1 class="title">Where there is will, there is way</h1>
                        <!-- <div class="shop-btn">
                  <a
                    href="shop-sidebar.html"
                    class="axil-btn btn-bg-white right-icon"
                    >Shopping Now <i class="fal fa-long-arrow-right"></i
                  ></a>
                </div> -->
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="main-slider-large-thumb">
                        <div class="slider-thumb-activation-two axil-slick-dots">
                            <!-- start -->
                            <?php
                  $i =0;
                  foreach($product_view as $pd){
                    if($i<5)
                    {
                      if($pd['special'] == 1){
                        echo'
                        <div class="single-slide slick-slide">
                            <div class="axil-product product-style-five">
                                    <div class="thumbnail">
                                        <a href="fashionApp.php?act=detail_product&id='.$pd['id_product'].'">
                                            <img
                                            src="../uploads/'.$pd['product_img'].'"
                                            alt="Product Images"
                                            />
                                        </a>
                                    </div>
                                    <div class="product-content">
                                        <div class="inner">
                                            <h5 class="title">
                                              <a href="fashionApp.php?act=detail_product&id='.$pd['id_product'].'">'.$pd['product_name'].'</a>
                                            </h5>
                                            <div class="product-price-variant">
                                                <span class="price current-price">'.number_format($pd['product_prices']).'đ</span>
                                            </div>
                                            <ul class="cart-action">
                                                <li class="select-option">
                                                    <a " href="fashionApp.php?act=detail_product&id='.$pd['id_product'].'">Buy Product</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        ';
                        $i++;
                      }
                    }
                  }?>
                            <!-- end -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Hot Product -->
    <div class="axil-best-seller-product-area bg-color-white axil-section-gap pb--0">
        <div class="container">
            <div class="product-area pb--50">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-primary">
                        <i class="far fa-shopping-basket"></i>This Month</span>
                    <h2 class="title">Hot products</h2>
                </div>
                <div
                    class="new-arrivals-product-activation-2 slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide product-slide-mobile">
                    <?php
            // var_dump($product);
            $i=0;
            foreach($product as $pd)
            {
              if($pd['view']==1 && $pd['special']==1){
                echo'
                    <div class="slick-single-layout">
                        <div class="axil-product product-style-six">
                            <div class="thumbnail">
                                <a href="fashionApp.php?act=detail_product&id='.$pd['id_product'].'">
                                    <img
                                    class="conform-img"
                                    data-sal="fade"
                                    data-sal-delay="100"
                                    data-sal-duration="1500"
                                    src="../uploads/'.$pd['product_img'].'"
                                    alt="Product Images"
                                    />
                                </a>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <div class="product-price-variant">
                                    <span class="price current-price">'.number_format($pd['product_prices']).'đ</span>
                                    </div>
                                        <h5 style="text-align:center" class="title">
                                            <a href="fashionApp.php?act=detail_product&id='.$pd['id_product'].'"
                                                >'.$pd['product_name'].'
                                                <span class="verified-icon"
                                                ><i class="fas fa-badge-check"></i></span
                                            ></a>
                                        </h5>
                                        <ul class="cart-action">
                                            <li class="select-option">
                                                <a href="fashionApp.php?act=detail_product&id='.$pd['id_product'].'">Buy product</a>
                                            </li>
                                        </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                ';
                $i++;
              }
            }                ?>
                    <!-- End .slick-single-layout -->
                </div>
            </div>
        </div>
    </div>
    <!-- News Product  -->
    <div class="axil-product-area bg-color-white axil-section-gap pb--0">
        <div class="container">
            <div class="product-area pb--20">
                <div class="axil-isotope-wrapper">
                    <div class="product-isotope-heading">
                        <div class="section-title-wrapper">
                            <span class="title-highlighter highlighter-primary"><i class="far fa-shopping-basket"></i>
                                Our New Products</span>
                            <h2 class="title">New Products</h2>
                        </div>
                        <div class="isotope-button">
                            <?php
                    echo'
                    <button data-filter="*" class="is-checked">
                    <span class="filter-text">All</span>
                    </button>';
                    foreach($catalog_use as $catalog){
                      echo'
                      <button data-filter=".'.$catalog['id_catalog_k'].'" class="">
                      <span class="filter-text">'.$catalog['catalog_name'].'</span>
                      </button>
                      ';
                    }
                  ?>
                        </div>
                    </div>
                </div>
                <div class="row row--15 isotope-list">
                    <!-- Start -->
                    <!--  -->
                    <?php
                        $count = 0;
                        foreach($product_use as $result){
                            if($count <8)
                            {
                              if($result['view'] == 1)
                              {
                                echo '                
                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12 mb--30 product '.$result['catalog_id'].'">
                                    <div class="axil-product product-style-one">
                                        <div class="thumbnail">
                                            <a href="fashionApp.php?act=detail_product&id='.$pd['id_product'].'">
                                                <img
                                                class="conform-img"
                                                data-sal="fade"
                                                data-sal-delay="100"
                                                data-sal-duration="1500"
                                                src="../uploads/'.$result['product_img'].'"
                                                alt="Product Images"
                                                />
                                            </a>
                                            <div class="product-hover-action">
                                                <ul class="cart-action">
                                                    <li class="select-option">
                                                        <a href="fashionApp.php?act=detail_product&id='.$result['id_product'].'">Buy Product</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="inner">
                                                <h5 class="title">
                                                    <a href="fashionApp.php?act=detail_product&id='.$result['id_product'].'"
                                                        >'.$result['product_name'].'
                                                        <span class="verified-icon"
                                                        ><i class="fas fa-badge-check"></i></span
                                                    ></a>
                                                </h5>
                                                <div class="product-price-variant">
                                                    <span class="price current-price">'.number_format($result['product_prices']).'đ</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                                $count++;
                              }
                            }
                        }
                    ?>
                </div>
            </div>
            <!-- <form id="product_'.$count.'" action="index.php?act=add_cart" method="POST">
                                        <input type="hidden" value="'.$result['product_img'].'" name="img">
                                        <input type="hidden" value="'.$result['product_name'].'" name="name">
                                        <input type="hidden" value="'.$result['product_prices'].'" name="price">
                                        <input type="hidden" value="'.$result['id_product'].'" name="id">
                                        <input type="hidden" value="'.$result['size'].'" name="size">
                                    </form> -->
            <!-- <script>
                    function submitNewForm(formIndex) 
                    {
                        var form = document.getElementById('product_' + formIndex);
                        form.submit();
                    }
                </script> -->
        </div>
    </div>
    </div>
    </div>
    </div>
    <!-- End Expolre Product Area  -->