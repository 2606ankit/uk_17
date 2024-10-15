<?= $this->extend('admin/layout/admin_default_layout');  ?>

<?= $this->section('content') ?>
 
<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb float-xl-right">
				<li class="breadcrumb-item"><a href="<?= base_url();?>home">Home</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url();?>catagorylisting">Catagory</a></li>
				<li class="breadcrumb-item active">Add Catagory</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Add Catagory</h1>
			<!-- end page-header -->
            <div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">Add Catagory</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
					</div>
				</div>
			    <div class="panel-body">
							<form class="form-horizontal" method="post" data-parsley-validate="true" enctype="multipart/form-data" name="addcatagory_form" novalidate="" action="<?= base_url(); ?>edit_catagoryform">
								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="fullname">Catagory Name * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="catagoryname" name="catagoryname" placeholder="Catagory Name" data-parsley-required="true" value="<?= $getCatagoryById[0]->category_name; ?>">
									</div>
								</div>
                                <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="fullname">Catagory Alias * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="catagoryalias" value="<?= $getCatagoryById[0]->category_alias; ?>" name="catagoryalias" placeholder="Catagory Alias" data-parsley-required="true">
									</div>
								</div>
                                <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="fullname">Catagory Text * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="catagoryatext" value="<?= $getCatagoryById[0]->category_text; ?>" name="catagoryatext" placeholder="Catagory Text" data-parsley-required="true">
									</div>
								</div>
                                <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="fullname">Catagory Image * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="file" id="catagoryaimage" name="catagoryaimage" placeholder="Catagory Image">
										<div>
											<img src="<?php echo base_url();?>catagory_image/<?php echo $getCatagoryById[0]->category_image; ?>" style="width:50px; border:1px solid #ddd; border-radius: 4px; padding:10px;margin-top:10px;">
										</div>
										<input type="hidden" name="pre_image_name" id="pre_image_name" value="<?= $getCatagoryById[0]->category_image; ?>">
										<input type="hidden" name="pre_image_path" id="pre_image_path" value="<?= $getCatagoryById[0]->category_image_url; ?>">
									</div>
								</div>
                                <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="message">Catagory Description  :</label>
									<div class="col-md-8 col-sm-8">
										<textarea class="form-control" id="catagorymessage" name="catagorymessage" rows="4"  placeholder="Catagory Description"><?php echo $getCatagoryById[0]->category_description; ?></textarea>
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="email">Status * :</label>
									<div class="col-md-8 col-sm-8">
                                    <select class="form-control" id="catstatus" name="catstatus" data-parsley-required="true">
											<option value="">- - Select Status - -</option>
											<option value="1" <?php if ($getCatagoryById[0]->is_active  == '1'){echo 'selected="selected"';}?>>Active</option>
											<option value="0" <?php if ($getCatagoryById[0]->is_active  == '0'){echo 'selected="selected"';}?>>Inactive</option>
										</select>
									</div>
								</div>
								<input type="hidden" name="editid" id="editid" value="<?= $getCatagoryById[0]->id; ?>">
                                <?= csrf_field() ?>
								<div class="form-group row m-b-0">
									<label class="col-md-4 col-sm-4 col-form-label">&nbsp;</label>
									<div class="col-md-8 col-sm-8">
										<button type="submit" class="btn btn-primary">Submit</button>
									</div>
								</div>
							</form>
						</div>
				</div>
			</div>
		 
		</div>
  
<?= $this->endSection() ?>             