<!-- Page Heading -->
<div class="row">
	<div class="col-lg-12">
		<p>
			<a href="<?= base_url().'admin/type/create' ?>" class="btn btn-primary btn-sm"> Create New</a>
		</p>
		 <br>

		<?php if(isset($message)) { ?>
      <div class="alert alert-success"><?= $message ?></div>
    <?php } ?>

		<div class="row">
			<div class="col-lg-12">
				<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>No.</th>
							<th>Name</th>
							<th>Short Name</th>
							<th>Create Date</th>
							<th>Action</th>
						</tr>
					</thead>

					<tbody>
						<?php
						$no =1;
						foreach ($types as $row) {
							?>
							<tr>
								<td><?= $no++ ?></td>
								<td><?= $row->name ?></td>
								<td><?= $row->short_name ?></td>
								<td><?= $row->created_at ?></td>
								<td>
									<a href="<?= base_url().'admin/type/edit/'.$row->id ?>" class="btn btn-primary btn-sm">
										Edit
									</a>
									<a href="<?= base_url().'admin/type/delete/'.$row->id ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete Type ?')">
										Delete
									</a>
								</td>
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
