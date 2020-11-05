<!-- Page Heading -->
<div class="row">
  <div class="col-lg-12">
    <?php if(isset($error)) { ?>
      <div class="alert alert-danger"><?= $error ?></div>
    <?php } ?>
    <div class="row">
      <!-- panel left -->
      <div class="col-lg-6">
        <div class="panel panel-default">
          <div class="panel-heading">
            <b>Add New Type</b>
          </div>
          <form class="" action="<?= base_url().'admin/type/store' ?>" method="post">
            <div class="panel-body">
              <div class="form-group">
              <label for="Name">Name</label>
                <input type="text" name="name" class="form-control" placeholder="Name">
              </div>
              <div class="form-group">
              <label for="Short Name">Short Name</label>
                <input type="text" name="short_name" class="form-control"  placeholder="Short Name">
              </div>

              <a href="<?= base_url() ?>admin/type" class="btn btn-danger">Cancel</a>
              <input type="submit" value="Submit" class="btn btn-primary">
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
