<div class="container">
    <div class="row">
    <form class="col s12" action="<?php echo base_url() ?>shop/store" method="POST">
      <div class="row">
        <div class="input-field col s12">
          <input type="text" placeholder="" name="name" value="" class="validate" autofocus>
          <label for="first_name">Nama Barang</label>
        </div>
      </div>
      <div class="row">
        <div class="input-field col s12">
          <input type="number" placeholder="" name="price" value="" class="validate">
          <label for="first_name">Harga (Rp.)</label>
        </div>
      </div>
      <div class="row">
        <button class="btn waves-effect waves-light" style="float:right;" type="submit" name="action">Simpan
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