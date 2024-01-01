<main class="main-wrapper">

    <!-- Start Cart Area  -->
    <div class="axil-product-cart-area axil-section-gap">
        <div class="container">
            <div class="axil-product-cart-wrap">
                <div class="product-table-heading">
                    <h4 class="title">Your Cart</h4>
                    <a href="fashionApp.php?act=clear_cart" class="cart-clear">Clear Shoping Cart</a>
                </div>
                <div class="table-responsive">
                    <table class="table axil-product-table axil-cart-table mb--40">
                        <thead>
                            <tr>
                                <th scope="col" class="product-remove"></th>
                                <th scope="col" class="product-thumbnail">Product</th>
                                <th scope="col" class="product-title">Name</th>
                                <th scope="col" class="product-size">Size</th>
                                <th scope="col" class="product-price">Price</th>
                                <th scope="col" class="product-quantity">Quantity</th>
                                <th scope="col" class="product-subtotal">Subtotal</th>
                            </tr>
                        </thead>
                        <!-- <input type="number" class="quantity-input" value="'.$item[4].'">
                        <div class="pro-qty">
                        <input type="number" class="quantity-input" value="'.$item[4].'">
                        </div> -->
                        <tbody>
                            <?php
                            // unset($_SESSION['cart']);
                            $total_final = 0;
                            $tax = 0;
                            $i=0;
                            if(isset($_SESSION['cart'])&&(count($_SESSION['cart'])>0))
                            {
                                // var_dump($_SESSION['cart']);
                                foreach($_SESSION['cart'] as $item)
                                {
                                    $total = $item[3] * $item[4];
                                    echo '
                                    <tr>
                                        <td class="product-remove"><a href="fashionApp.php?act=removeProductSingle&id='.$item[0].'" class="remove-wishlist"><i class="fal fa-times"></i></a></td>
                                        <td style="width: 80px; height: 80px;" class="product-thumbnail fix_acount_pic"><a href="fashionApp.php?act=detail_product&id='.$item[0].'"><img src="../uploads/'.$item[2].'" alt="Digital Product"></a></td>
                                        <td class="product-title"><a href="fashionApp.php?act=detail_product&id='.$item[0].'">'.$item[1].'</a></td>
                                        <td class="product-price" data-title="Price"><span class="currency-symbol">'.$item[5].'</span></td>
                                        <td class="product-price" data-title="Price"><span class="currency-symbol">'.number_format($item[3]).'đ</span></td>
                                        <td class="product-price" data-title="quantity"><span class="currency-symbol">'.$item[4].'</span></td>
                                        <td class="product-subtotal" data-title="Subtotal"><span class="currency-symbol">'.number_format($total).'đ</span></td>
                                    </tr>
                                    </tbody>
                                    ';
                                    $total_final +=$total;
                                    $tax=$total_final * 0.1;
                                }
                                echo'</table>';

                                echo '
                                        </div>
                                        <div class="cart-update-btn-area">
                                            <div class="input-group product-cupon">
                                                <input placeholder="Enter coupon code" type="text">
                                                <div class="product-cupon-btn">
                                                    <button type="submit" class="axil-btn btn-outline">Apply</button>
                                                </div>
                                            </div>
                                            <div class="update-btn">
                                                <a href="fashionApp.php" class="axil-btn btn-outline">Continuous Buy Product</a>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-5 col-lg-7 offset-xl-7 offset-lg-5">
                                                <div class="axil-order-summery mt--80">
                                                    <h5 class="title mb--20">Order Summary</h5>
                                                    <div class="summery-table-wrap">
                                                        <table class="table summery-table mb--30">
                                                            <tbody>
                                                                <tr class="order-subtotal">
                                                                    <td>Subtotal</td>
                                                                    <td>'.number_format($total_final).'đ</td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Shipping</td>
                                                                    <td>
                                                                        <div class="input-group">
                                                                            <input type="radio" id="radio1" name="shipping" checked>
                                                                            <br>
                                                                            <br>
                                                                            <label for="radio1">Free Shippping</label>
                                                                        </div>
                                                                        <div class="input-group">
                                                                        <input type="radio" id="radio2" name="shipping">
                                                                        <label for="radio2">Local store: 00,000đ</label>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                <form id="check_cart_product_'.$i.'"action="fashionApp.php?act=checkout" method="POST">
                                                                    <td>Payment Method</td>
                                                                    <td>
                                                                            <div class="single-payment">
                                                                                <div class="input-group justify-content-between align-items-center">
                                                                                    <input type="radio" id="radio6"  value="2" name="payment" checked>
                                                                                    <label for="radio6">Momo</label>
                                                                                    <img style="width: 110px; height: 40px;" src="../assets/images/others/momo3.png" alt="Paypal payment">
                                                                                </div>
                                                                            </div>
                                                                            <br>
                                                                            <div class="order-payment-method">
                                                                            <div class="single-payment">
                                                                                <div class="input-group">
                                                                                    <input type="radio" id="radio5" value="1" name="payment">
                                                                                    <label for="radio5">Cash on delivery</label>
                                                                                </div>
                                                                            </div>                                                                            
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr class="order-tax">
                                                                    <td>Tax</td>
                                                                    <td>'.number_format($tax).'đ</td>
                                                                </tr>
                                                                <tr class="order-total">
                                                                    <td>Total</td>
                                                                    <td class="order-total-amount">'.number_format($total_final + $tax).'đ</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <a href="javascript:void(0);" onclick="submitForm('.$i.')" class="axil-btn btn-bg-primary checkout-btn">Payment</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                                <input type="hidden" value="'.($total_final + $tax).'" name="total_prices">
                            </form>
                            ';
                            }
                        ?>
                            <script>
                            function submitForm(formIndex) {
                                var form = document.getElementById('check_cart_product_' + formIndex);
                                form.submit();
                            }
                            </script>

                            <!-- End Cart Area  -->

</main>