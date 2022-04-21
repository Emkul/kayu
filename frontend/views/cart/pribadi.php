<?php
use yii\helpers\Html;
?>

<h3 class="text-center pt-5" > Wishlist saya </h3>

<?php foreach ($cart as $data):?>
    <?php echo Html::a($data["id_barang"], null ,['class' => 'list-group-item list-group-item-action mb-3']) ?>
<?php endforeach; ?>

