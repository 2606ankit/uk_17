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
							<form class="form-horizontal" method="post" data-parsley-validate="true" enctype="multipart/form-data" name="addcatagory_form" novalidate="" action="<?= base_url(); ?>addproduct_form">
								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="fullname">Product Name * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="product_name" name="product_name" placeholder="Product Name" data-parsley-required="true">
									</div>
								</div>
                                 
								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="email">Product Catagory * :</label>
									<div class="col-md-8 col-sm-8">
                                    <select class="form-control" id="product_category_id" name="product_category_id" data-parsley-required="true">
											<option value="">- - Select Catagory - -</option>
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
								<!-- <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="email">Product Sub Catagory * :</label>
									<div class="col-md-8 col-sm-8">
                                    <select class="form-control" id="product_sub_category_id" name="product_sub_category_id" data-parsley-required="true">
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
								</div> -->
								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="email">Sub Status * :</label>
									<div class="col-md-8 col-sm-8">
                                    <select class="form-control" id="in_stoke" name="in_stoke" data-parsley-required="true">
											<option value="">- - Select Stoke Type - -</option>
											<option value="1">Yes</option>
											<option value="0">No</option>
										</select>
									</div>
								</div>
                                <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="fullname">Product Price * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="product_price" name="product_price" placeholder="Product Price" data-parsley-required="true">
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="fullname">Product Gender * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="product_gender" name="product_gender" placeholder="Product Gender" data-parsley-required="true">
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="fullname">Product Sale Type * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="product_sale_type" name="product_sale_type" placeholder="Product Sale Type" data-parsley-required="true">
									</div>
								</div>
								
                                <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="fullname">In Stoke Message * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="in_stoke_message" name="in_stoke_message" placeholder="Product In Stoke Message" data-parsley-required="true">
									</div>
								</div>

                                <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="fullname">Out Stoke Message * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="text" id="out_of_stoke_message" name="out_of_stoke_message" placeholder="Product Stoke Message" data-parsley-required="true">
									</div>
								</div>
                                <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="fullname">Sub Catagory Image * :</label>
									<div class="col-md-8 col-sm-8">
										<input class="form-control" type="file" id="prodcut_image" name="prodcut_image[]" placeholder="Product Image" multiple data-parsley-required="true">
									</div>
								</div>
                                <div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="message">Product Description  :</label>
									<div class="col-md-8 col-sm-8">
										<textarea class="form-control" id="product_description" name="product_description" rows="4"  placeholder="Product Description"></textarea>
									</div>
								</div>
								<div class="form-group row m-b-15">
									<label class="col-md-4 col-sm-4 col-form-label" for="email">Product Status * :</label>
									<div class="col-md-8 col-sm-8">
                                    <select class="form-control" id="is_active" name="is_active" data-parsley-required="true">
											<option value="">- - Select Status - -</option>
											<option value="1">Active</option>
											<option value="0">Inactive</option>
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