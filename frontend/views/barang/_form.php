<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model frontend\models\Barang */
/* @var $form yii\widgets\ActiveForm */
?>
<section class="breadcrumb-section set-bg" style="background-color: brown;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Posting Kayu</h2>
                    <div class="breadcrumb__option">
                        <!-- <a href="./index.html">Home</a> -->
                        <!-- <span>Checkout</span> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="checkout spad">
    <div class="container">
        <div class="row">
            <!-- <div class="col-lg-12">
                <h6><span class="icon_tag_alt"></span> Have a coupon? <a href="#">Click here</a> to enter your code
                </h6>
            </div> -->
        </div>
        <div class="checkout__form">
            <h4>Form</h4>
            <?php $form = ActiveForm::begin(['options'=> ['enctype '=> 'multipart/form-data']]); ?>
                <div class="row">
                    <div class="col-lg-8 col-md-6">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <?= $form->field($model, 'judul')->textInput(['maxlength' => true, 'placeholder' => 'Judul']) ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="checkout__input">
                                    <?= $form->field($model, 'harga')->textInput(['placeholder' => 'Harga']) ?>
                                </div>
                            </div>
                        </div>
                        <div class="checkout__input pb-1">
                            <p>Ukuran</p>
                            <?= $form->field($model, 'ukuran')->dropDownList($model->getUkuran(), ['data-toggle' => 'dropdown']) ?>
                        </div>
                        <div class="checkout__input">
                            <?= $form->field($model, 'jumlah')->textInput( ['placeholder' => 'Jumlah'] ) ?>
                        </div>
                        <div class="checkout__input">
                            <?= $form->field($model, 'alamat')->textInput(['maxlength' => true, 'placeholder' => 'alamat']) ?>
                        </div>
                        <div class="checkout__input">
                            <?= $form->field($model, 'keterangan')->textarea(['rows' => 6]) ?>
                        </div>
                       
                        <p>Create an account by entering the information below. If you are a returning customer
                            please login at the top of the page</p>
                            
                        <?= $form->field($modelgambar, 'gambar[]'  )->fileInput( ['multiple'=>true] ) ?>
                        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
                    </div>

                
                    <div class="col-lg-4 col-md-6">
                        <div class="checkout__order">
                            <h4>Your Order</h4>
                            <div class="checkout__order__products">Products <span>Total</span></div>
                            <ul>
                                <li>Vegetable’s Package <span>$75.99</span></li>
                                <li>Fresh Vegetable <span>$151.99</span></li>
                                <li>Organic Bananas <span>$53.99</span></li>
                            </ul>
                            <div class="checkout__order__subtotal">Subtotal <span>$750.99</span></div>
                            <div class="checkout__order__total">Total <span>$750.99</span></div>
                            <div class="checkout__input__checkbox">
                                <label for="acc-or">
                                    Create an account?
                                    <input type="checkbox" id="acc-or">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt
                                ut labore et dolore magna aliqua.</p>
                            <div class="checkout__input__checkbox">
                                <label for="payment">
                                    Check Payment
                                    <input type="checkbox" id="payment">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="checkout__input__checkbox">
                                <label for="paypal">
                                    Paypal
                                    <input type="checkbox" id="paypal">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <button type="submit" class="site-btn">PLACE ORDER</button>
                        </div>
                    </div>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</section>
<!-- Checkout Section End -->