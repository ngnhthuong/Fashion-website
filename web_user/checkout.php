<div class="axil-checkout-area axil-section-gap">
            <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="axil-checkout-billing">
                                <?php
                                    // var_dump($more_order);
                                    $checs=1;
                                    echo '
                                        <form action="fashionApp.php?act=check_out_update" method="POST">
                                            <h4 class="title mb--40">Order details</h4>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>First Name <span>*</span></label>
                                                        <input type="text" id="first-name" value="'.$more_order[0]['fname'].'" placeholder="First Name" name="fname">
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Last Name <span>*</span></label>
                                                        <input type="text" id="last-name" value="'.$more_order[0]['lname'].'" placeholder="Last Name" name="lname">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Address <span>*</span></label>
                                                <input type="text" value="'.$more_order[0]['address'].'"  id="country" name="address">
                                            </div>
                                            <div class="form-group">
                                                <label>Phone <span>*</span></label>
                                                <input type="tel" value="'.$more_order[0]['phone'].'" id="phone" name="phone">
                                            </div>
                                            <div class="form-group">
                                                <label>Email Address <span>*</span></label>
                                                <input type="email" value="'.$more_order[0]['email'].'" id="email" name="email">
                                            </div>
                                            <div class="form-group">
                                                <label>Other Notes (optional)</label>
                                                <textarea name="notes" id="notes" rows="2" placeholder="Notes about your order, e.g. speacial notes for delivery."></textarea>
                                            </div>
                                            <input type="hidden" value="'.$iddh.'" id="email" name="iddh">
                                    ';
                                ?>
                            </div>
                        </div>
                        <!--  -->
                                    <div class="col-lg-6">
                                    <div class="axil-order-summery order-checkout-summery">
                                        <h5 class="title mb--20">Your Order</h5>
                                        <div class="summery-table-wrap">
                                            <table class="table summery-table">
                                                <thead>
                                                    <tr>
                                                        <th>Product</th>
                                                        <th>Size</th>
                                                        <th style="text-align:left;">Subtotal</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        foreach($more_cart as $cart)
                                                        {
                                                            if($iddh == $cart['id_order'])
                                                            {
                                                                echo '
                                                                <tr class="order-product">
                                                                    <td>'.$cart['name_pro'].' <span class="quantity">x'.$cart['quantity'].'</span></td>
                                                                    <td>'.$cart['size'].'</td>
                                                                    <td style="text-align:left;">'.number_format($cart['prices']).'đ</td>
                                                                </tr>
                                                            ';
                                                            }
                                                        }
                                                    ?>
                                                    <?php
                                                        $total = 0;
                                                        foreach($more_order as $order)
                                                        {
                                                            if($iddh == $order['id'])
                                                            {
                                                                $total = $order['total_prices'];
                                                            }                                    
                                                        }
                                                        echo '
                                                        <tr class="order-subtotal">
                                                        <td>Subtotal</td>
                                                        <td>'.number_format($total).'đ</td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2">
                                                                <div class="order-shipping" >
                                                                    <div class="shipping-amount">
                                                                        <span class="title">Shipping Method</span>
                                                                        <span class="amount">0.00đ</span>
                                                                    </div>
                                                                </div>
                                                                <br>
                                                                <div class="input-group">
                                                                    <input type="radio" id="radio1" name="shipping" checked>
                                                                    <label for="radio1">Free Shippping</label>
                                                                </div>
                                                                <br>
                                                                <div class="input-group">
                                                                    <input type="radio" id="radio2" name="shipping">
                                                                    <label for="radio2">Local</label>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                        ';
                                                    ?>
                                                    <?php                                    
                                                    echo'
                                                                            <tr class="order-total">
                                                                                <td>Total</td>
                                                                                <td class="order-total-amount">'.number_format($total).'đ</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <input value="Finished" type="submit" name="submit"  class="axil-btn btn-bg-primary checkout-btn"></input>
                                                            </div>
                                                        </div>
                                                    ';
                                                    ?>
                        <!--  -->               </tbody>
                        </form>
                    </div>
            </div>
        </div>
                                                                <!-- End Checkout Area  -->
                                                                <!-- <div class="order-payment-method">
                                                                    <div class="single-payment">
                                                                        <div class="input-group">
                                                                            <input type="radio" id="radio5" name="payment">
                                                                            <label for="radio5">Cash on delivery</label>
                                                                        </div>
                                                                        <p>Pay with cash upon delivery.</p>
                                                                    </div>
                                                                    <div class="single-payment">
                                                                        <div class="input-group justify-content-between align-items-center">
                                                                            <input type="radio" id="radio6" name="payment" checked>
                                                                            <label for="radio6">Momo</label>
                                                                            <img style="width: 110px; height: 40px;" src="../assets/images/others/momo3.png" alt="Paypal payment">
                                                                        </div>
                                                                        <p>Momo-nom-nom, convenience awaits!</p>
                                                                    </div>
                                                                </div> -->