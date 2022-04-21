<?php

use yii\bootstrap4\Html;

// echo 'tempat pengguna';
$this->title = Yii::t('app', 'Pengguna');
$this->params['breadcrumbs'][] = $this->title;

// echo '<pre>';
// var_dump($pengguna);

?>



<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th scope="col">Alamat</th>
      <th scope="col">Nomor Hp</th>
      <th scope="col">Nomor Wa</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach ($pengguna as $nomer => $pgn) : ?>
    <tr>
      <th scope="row"> <?= $nomer + 1 ;?> </th>
      <td> <?php echo $pgn['nama']; ?> </td>
      <td> <?php echo $pgn['alamat']; ?> </td>
      <td> <?php echo $pgn['no_hp']; ?> </td>
      <td> <?php echo $pgn['no_wa']; ?> </td>
      <td> <?php //echo $pgn['']; ?> </td>
    </tr>
    <?php endforeach ; ?>
  
  </tbody>
</table>