<?= $this->extend('admin/layout/admin_default_layout');  ?>

<?= $this->section('content') ?>
	
	<div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb float-xl-right">
				<li class="breadcrumb-item"><a href="<?php echo base_url().'addsubcatagory'?>">Home</a></li>
				<li class="breadcrumb-item"><a href="<?php echo base_url().'addproduct'?>">Add Product</a></li>
				<li class="breadcrumb-item active">Product Listing</li>
			</ol>
			<?php 
					if (!empty($succes_message)){
						echo '<div id="gritter-notice-wrapper">
							<div id="gritter-item-1" class="gritter-item-wrapper my-sticky-class" style="" role="alert">
								<div class="gritter-top"></div>
								<div class="gritter-item">
									<a class="gritter-close" href="#" tabindex="1" style="display: none;">Close Notification</a>
									 
								<div class="gritter-with-image">
									<span class="gritter-title">Success</span>
									<p>'.$succes_message.'</p>
								</div>
								<div style="clear:both"></div>
							</div>
							<div class="gritter-bottom"></div>
						</div>
					</div>';
					}
					if (!empty($error_message)){
						echo '<div id="gritter-notice-wrapper">
							<div id="gritter-item-1" class="gritter-item-wrapper my-sticky-class" style="" role="alert">
								<div class="gritter-top"></div>
								<div class="gritter-item">
									<a class="gritter-close" href="#" tabindex="1" style="display: none;">Close Notification</a>
									 
								<div class="gritter-with-image">
									<span class="gritter-title">Error</span>
									<p>'.$error_message.'</p>
								</div>
								<div style="clear:both"></div>
							</div>
							<div class="gritter-bottom"></div>
						</div>
					</div>';
					}
				?>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Product Listing</small></h1>
			<!-- end page-header -->
			<!-- begin panel -->
			<div class="panel panel-inverse">
				<!-- begin panel-heading -->
				<div class="panel-heading">
					<h4 class="panel-title">Product Listing</h4>					 
				</div>
				<!-- end panel-heading -->
				<!-- begin panel-body -->
				<div class="panel-body">
					<table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
						<thead>
							<tr> 
								<th width="1%" data-orderable="false">SNo.</th> 
								<th class="text-nowrap">Product Image</th>
								<th class="text-nowrap">Product Uid</th>
								<th class="text-nowrap">Product Name</th>  
								<th class="text-nowrap">Product Description</th>
								<th class="text-nowrap">Product Instoke Message</th>
								<th class="text-nowrap">Product Outstoke Message</th>
								<th class="text-nowrap">Product Price</th>
								<th class="text-nowrap">Product Sale Type</th>
								<th class="text-nowrap">Status</th>
								<th class="text-nowrap">Action </th>
							</tr>
						</thead>
						<tbody>
                            <?php 
						 
                                foreach($getallproduct as $key=>$val)
                                {
                                	if($val->is_active == 1){ $status='<a href="javascript:;" data-uid="'.$val->id.'" data-status="'.$val->is_active.'" data-tablename="sub_category " data-pagetype="subcat" class="btn btn-success changestatus" data-csrftoken="'.csrf_hash().'" data-csrfname="'.csrf_token().'" data-sesid="'.$sesid.'">Active</a>';} 
                                    else { $status = '<a href="javascript:;" data-uid="'.$val->id.'" data-status="'.$val->is_active.'" data-pagetype="subcat" data-tablename="sub_category " data-csrftoken="'.csrf_hash().'" data-csrfname="'.csrf_token().'" data-sesid="'.$sesid.'" class="btn btn-danger changestatus" >Inactive</a>';}

                                    $image = explode(',',$val->product_image);

                                    $imageurl = base_url().'product_image/';
									//$editid = $val->id;
									$editid = urlencode(base64_encode($val->id));
                            ?>
							<tr class="odd gradeX"> 
								<td width="1%" class="f-s-600 text-inverse"><?php echo $key+1;?></td>
                                <td  class="with-img">
                                	<?php 
                                		foreach ($image as $k=>$v){
                                	?>
                                		<img src="<?php echo $imageurl.$val->image_folder.'/'.$v; ?>" class="img-rounded height-30" />
                                	<?php 
                                		}
                                	?>
                                </td>
								<td><?php echo $val->product_un_id;?></td>
								<td><?php echo $val->product_name;?></td>  
								<td><?php echo $val->product_description;?></td>
								<td><?php echo $val->in_stoke_message;?></td> 
								<td><?php echo $val->out_of_stoke_message;?></td> 
								<td><?php echo $val->product_price;?></td> 
								<td><?php echo $val->product_sale_type;?></td> 
								 
								
								<td><?php echo $status; ?></td>
								<td><a href="<?= base_url();?>edit_subcatagory/<?php echo $editid; ?>" class="btn btn-primary">Edit</a>&nbsp;&nbsp;&nbsp;
									<a href="javascript:;" class="btn btn-warning" href="javascript:;" id="globaldelete" data-uid="<?= $val->id;?>" data-pagetype="cat" data-tablename="category " data-csrftoken="<?= csrf_hash();?>" data-csrfname="<?= csrf_token(); ?>">Delete</a></td>
							</tr>
                            <?php 
                                }
                            ?>
							
						</tbody>
					</table>
				</div>
				<!-- end panel-body -->
			</div>
			<!-- end panel -->
		</div>
<?= $this->endSection() ?>