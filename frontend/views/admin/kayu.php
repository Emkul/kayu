<?php

use yii\grid\GridView;

$this->title = Yii::t('app', 'Pengguna');
$this->params['breadcrumbs'][] = $this->title;


?>



<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">jenis</th>
      <th scope="col">judul</th>
      <th scope="col">harga</th>
      <th scope="col">dibuat pada</th>
      <th scope="col"> pengiklan </th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($kayu as $brg => $nomor) : ?>
    <tr>
      <th scope="row"> <?= $brg + 1 ;?> </th>
      <td> <?php echo $nomor['jenis']; ?> </td>
      <td> <?php echo $nomor['judul']; ?> </td>
      <td> <?php echo $nomor['harga']; ?> </td>
      <td> <?php echo $nomor['created_at']; ?> </td>
      <td> <?php echo $nomor['pengiklan']; ?> </td>
    </tr>
    <?php endforeach ; ?>
  </tbody>
</table>