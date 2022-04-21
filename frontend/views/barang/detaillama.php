<?php
use yii\bootstrap4\Carousel;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
?>
<style>
  /* .card{
    margin-top: 15px;
  } */
  .carousel-control-next{
    color: black;
  }
  .img-fluid{
      width: 811px;
    }
  p{
    font-family: Arial, Helvetica, sans-serif ;
  }
</style>


<?php
$this->title = Yii::t('app', 'Detail');
$this->params['breadcrumbs'][] = $this->title;

?>


<?php
$data =  [];
foreach($modelgambar as $gambar){
  $kos = '@web/barang';
  $data[] = Html::img('@web/barang/'. $gambar['gambar'], ['class'=> 'img-fluid']);
}
?>

<?php
//'<img src=  " '.$kos.' '.$gambar['gambar'] .' " class="img-fluid" \>';
?>
<?php echo $this->render('_search', ['model' => $searchModel]); ?>


<div class="container-fluid" >
  <div class="row" >
    <div class="col-md-8 col-sm-12 mb-3" >
      <div class="container text-center">
        <?php
          // echo "<pre>";
          // echo implode($cob);
          // exit();
          echo Carousel::widget([
            'items' => $data,
            'options' => [
              // 'class' => 'carousel slide d-block w-100',
              'style' => 'background-color:#dcdcdc;'
            ]
          ]);
        ?>
      </div>
    </div>
    <div class="col-md-4 col-sm-12">
      <div class="card" >
          <div class="card-body" >
            
            <h2> <b> Nama <?= $detail["judul"] ?> </b> </h2> 
                             
          </div>
      </div>
      <div class="card" >
          <div class="card-body" >
            <p> Nama <?= $coba["nama"] ?> </p>
            <p> Alamat <?= $coba["alamat"] ?> </p>
            <p>  <?= $coba["no_hp"] ?> </p>
            <p> <?= $coba["no_wa"] ?> </p>
          </div>
      </div>
    </div>
  </div>
  <div class="row" >
    <div class="col-sm-12 col-md-8">
      <div class="card">
        <div class="card-body">
        <?php if($detail['jenis'] == 1){ ?>
          <div class="row" >
            <div class="col-4" >
              <p> Harga   : <?php echo $detail['harga'] ; ?> </p>
              <p> Ukuran  : <?php echo $detail['ukuran'] ; ?> </p>
              <p> Jumlah  : <?php echo $detail['jumlah'] ; ?> </p>
              <p> Alamat <?php echo $detail['alamat'] ; ?> </p>
              <p> <?php echo $detail['keterangan'] ; ?> </p>
              <p> <?php echo 'kayu'; ?> </p>
            <?php } else { ?>
              <p> <?php echo $detail['judul'] ; ?> </p>
              <p> <?php echo $detail['sopir'] ; ?> </p>
              <p> <?php echo $detail['mobil'] ; ?> </p>
              <p> <?php echo $detail['no_hp'] ; ?> </p>
              <p> <?php echo $detail['no_wa'] ; ?> </p>
              <p> <?php echo 'supir'; ?> </p>
            <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>



