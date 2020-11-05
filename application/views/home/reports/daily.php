<div class="container">
    <div class="row">
        <table class="striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $total_price = 0;
            $no = 1;
            foreach ($reports as $value) :
                $date_now = date('d');
                $create_at = new DateTime($value->created_at);
                if ($create_at->format('d') === $date_now) {

            ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $value->product_name; ?></td>
                    <td><?php echo $value->quantity; ?> <?php echo $value->short_name; ?></td>
                    <td>Rp. <?php echo $value->price; ?></td>
                    <td>
                        <a href="<?= base_url().'shop/edit/'.$value->id ?>" class="btn btn-warning btn-sm">
                            Edit
                        </a>
                    </td>
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
        <h4 class="right-align">Total Rp. <?php echo number_format($total_price, 0, '', '.'); ?></h4>
    </div>
</div>