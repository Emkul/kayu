<?php
use yii\helpers\Url;
echo 'ini halaman admin' ;

?>
<br>
<br>
<a href="<?=Url::toRoute(["/barang/admin"]) ?>" class="btn btn-primary" >jumlah barang</a>
<a href="<?=Url::toRoute(["/identitas/index"]) ?>" class="btn btn-primary" >jumlah user</a>