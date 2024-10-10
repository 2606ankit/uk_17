<?= $this->extend('admin/layout/admin_default_layout');  ?>

<?= $this->section('content') ?>
 
 <div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb float-xl-right">
				<li class="breadcrumb-item"><a href="<?= base_url();?>home">Home</a></li>
				<li class="breadcrumb-item"><a href="<?= base_url();?>catagorylisting">Catagory</a></li>
				<li class="breadcrumb-item active">Add Sub Catagory</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Add Sub Catagory</h1>
			<!-- end page-header -->
            <div class="panel panel-inverse">
				<div class="panel-heading">
					<h4 class="panel-title">Add Sub Catagory</h4>
					<div class="panel-heading-btn">
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-redo"></i></a>
						<a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
					</div>
				</div>
			 
			    <div class="panel-body">
							<form class="form-horizontal" method="post" data-parsley-validate="true" enctype="multipart/form-data" name="addcatagory_form" novalidate="" action="<?= base_url(); ?>addsubcatagory_form">
								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="fullname">Sub Catagory Name * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="sub_category_name" name="sub_category_name" placeholder="Sub Catagory Name" data-parsley-required="true">
									</div>
								</div>
                                 
								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="email">Parent Catagory * :</label>
									<div class="col-md-8 col-sm-8">
                                    <select class="form-control" id="parent_category_id" name="parent_category_id" data-parsley-required="true">
											<option value="">- - Select Status - -</option>
											<?php 
												foreach($allcatagory as $key=>$val){
											?>
												<option value="<?php echo $val->id; ?>"><?php echo $val->category_name; ?></option>
											<?php 
												}
											?>
										</select>
									</div>
								</div>
                                <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="fullname">Sub Catagory Text * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="sub_category_text" name="sub_category_text" placeholder="Sub Catagory Text" data-parsley-required="true">
									</div>
								</div>
                                <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="fullname">Sub Catagory Image * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="file" id="sub_category_image" name="sub_category_image" placeholder="Sub Catagory Image" data-parsley-required="true">
									</div>
								</div>
                                <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="message">Sub Catagory Description  :</label>
									<div class="col-md-8 col-sm-8">
										<textarea class="form-control" id="sub_category_description" name="sub_category_description" rows="4"  placeholder="Sub Catagory Description"></textarea>
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="email">Sub Status * :</label>
									<div class="col-md-8 col-sm-8">
                                    <select class="form-control" id="is_active" name="is_active" data-parsley-required="true">
											<option value="">- - Select Status - -</option>
											<option value="1">Active</option>
											<option value="2">Inactive</option>
										</select>
									</div>
								</div>
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