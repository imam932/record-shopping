<link rel="stylesheet" href="<?= base_url() ?>assets/admin/css/dataTables.bootstrap.min.css">
<div class="container">
    <div class="row">
        <table class="striped" id="datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $total_price = 0;
            $no = 1;
            foreach ($reports as $value) :
                $date_now = date('m');
                $create_at = new DateTime($value->created_at);
                if ($create_at->format('m') === $date_now) {
            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $value->product_name; ?></td>
                    <td><?php echo $value->quantity; ?> <?php echo $value->short_name; ?></td>
                    <td>Rp. <?php echo $value->price; ?></td>
                </tr>
            <?php
                $sum = $value->price * $value->quantity;
                $total_price += $sum;
            }
            endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="row">
        <h4 class="right-align">Rp. <?php echo number_format($total_price, 0, '', '.'); ?></h4>
    </div>
</div>
<script src="<?= base_url() ?>assets/admin/js/dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/admin/js/dataTables.bootstrap.min.js"></script>
<script>
$(document).ready(function() {
	$('#datatable').DataTable();
});
</script>