<link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/dataTables.bootstrap.min.css">
<div class="container">
    <div class="row">
        <?php
            $total_price = 0;
            $price_montly = 0;
            foreach ($shops as $value) :
                $total_price += $value->price;

                $splitdate = explode("-", $value->created_at);
                if ($splitdate[1] === date('m')) {
                    $price_montly += $value->price;
                }
            endforeach; 
        ?>
        <div class="col s12 m6">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                    <span class="card-title">Total : </span>
                    <h1>Rp. <?php echo number_format($price_montly, 0, '', '.'); ?></h1>
                    <p>Total pengeluaran bulan <?php echo date('M') ?>.</p>
                </div>
                <div class="card-action">
                    <a href="<?php echo base_url() ?>monthly">Detail</a>
                </div>
            </div>
        </div>
        <div class="col s12 m6">
            <div class="card blue-grey darken-1">
                <div class="card-content white-text">
                <span class="card-title">Total : </span>
                    <h1>Rp. <?php echo number_format($total_price, 0, '', '.'); ?></h1>
                    <p>Total pengeluaran tahun <?php echo date('Y') ?>.</p>
                </div>
                <div class="card-action">
                    <!-- <a href="#">Detail</a> -->
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <h4 class="right-align"></h4>
    </div>
</div>
<script src="<?= base_url() ?>assets/admin/js/dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/admin/js/dataTables.bootstrap.min.js"></script>
<script>
$(document).ready(function() {
	$('#datatable').DataTable();
});
</script>