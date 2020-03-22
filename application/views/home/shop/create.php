<div class="container">
    <div class="row">
    <form class="col s12" action="<?php echo base_url() ?>shop/store" method="POST">
      <div class="row">
        <div class="input-field col s12">
          <input type="text" placeholder="" name="name" value="" class="validate">
          <label for="first_name">Nama Barang</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s6">
          <input type="text" placeholder="" name="quantity" value="" class="validate">
          <label for="first_name">Jumlah</label>
        </div>
        <div class="input-field col s6">
            <select name="type_id">
            <option value="" disabled selected>Pilih Satuan</option>
            <?php foreach($types as $item): ?>
            <option value="<?php echo $item->id; ?>"><?php echo $item->name; ?></option>
            <?php endforeach; ?>
            </select>
            <label>Satuan</label>
        </div>
      </div>
      <div class="row">
        <button class="btn waves-effect waves-light" type="submit" name="action">Simpan
            <i class="material-icons right">send</i>
        </button>
      </div>
    </form>
  </div>
</div>
<script>
$(document).ready(function(){
    $('select').formSelect();
  });
</script>