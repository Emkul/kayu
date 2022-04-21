<?php

use rmrevin\yii\fontawesome\FA;
use yii\bootstrap4\Html;
use yii\helpers\Url;
rmrevin\yii\fontawesome\AssetBundle::register($this);
// echo '<pre>';
// var_dump($barang);
// var_dump($identitas);
// \hail812\adminlte3\assets\PluginAsset::register($this)->add(['sweetalert2', 'toastr']);
?>
<!-- Bread -->
<section class="breadcrumb-section set-bg" style="background-color: brown;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="breadcrumb__text">
                    <h2>Identitas</h2>
                    <div class="breadcrumb__option">
                        <!-- <a href="./index.html">Home</a> -->
                        <!-- <span>Checkout</span> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Checkout Section Begin -->
<section class="checkout spad">
	<div class="container">

		<div class="checkout__form">
			<form action="#">
				<div class="row">
					<div class="col-lg-8 col-md-6">
						<table class="table table-striped">
								<thead>
									<tr>
										<th scope="col">#</th>
										<th scope="col">Judul</th>
										<th scope="col">Jenis</th>
										<th scope="col">Tanggal Dibuat</th>
										<th scope="col">Action</th>
									</tr>
								</thead>
								<tbody>
									<?php foreach($barang as $nomer => $brg): ?>  
									<tr>
										<th scope="row"> <?= $nomer + 1 ?> </th>
										<td><?php echo $brg['judul'] ?> </td>
										<td><?php echo $brg['jenis'] ?></td>
										<td><?php echo $brg['updated_at'] ?> </td>
										<td> 
											<div class="d-flex flex-row" >
												<a href="<?=Url::toRoute(["/barang/update", "id" => $brg['id']]) ?>" class="btn btn-primary rounded-circle mr-2" ><?php echo FA::icon('pencil'); ?></a>
												<a href="<?=Url::toRoute(["/barang/delete", "id" => $brg['id']] ) ?>" class="btn btn-danger rounded-circle" ><?php echo FA::icon('trash'); ?></a>
											</div>
										</td>
									</tr>
									<?php endforeach;  ?>
								</tbody>
							</table>

					</div>
					<div class="col-lg-4 col-md-6">
						<div class="checkout__order">
							<h4>Identitas</h4>
							<!-- <div class="checkout__order__products">Nama : <span>Total</span></div> -->
							<ul>
								<li>Nama : <span><?php echo $identitas['nama']; ?></span></li>
								<li>Alamat : <span><?php echo $identitas['alamat']  ?></span></li>
								<li>No Hp : <span><?php echo $identitas['no_hp']  ?></span></li>
								<li>No WA : <span><?php echo $identitas['no_wa']  ?></span></li>
							</ul>
							<button type="submit" class="site-btn">
								<?= html::a('Update', ['identitas/update', 'id' => $identitas['id']], ['class' => 'text-white'])  ?>
							</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</section>

