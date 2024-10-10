<?= $this->extend('admin/layout/admin_default_layout');  ?>

<?= $this->section('content') ?>
 <!-- begin #content -->
 <div id="content" class="content">
			<!-- begin breadcrumb -->
			<ol class="breadcrumb float-xl-right">
				<li class="breadcrumb-item"><a href="<?php echo base_url().'addsubcatagory'?>">Home</a></li>
				<li class="breadcrumb-item"><a href="<?php echo base_url().'addsubcatagory'?>">Add Sub Catagory</a></li>
				<li class="breadcrumb-item active">Catagory Listing</li>
			</ol>
			<!-- end breadcrumb -->
			<!-- begin page-header -->
			<h1 class="page-header">Catagory Listing</small></h1>
			<!-- end page-header -->
			<!-- begin panel -->
			<div class="panel panel-inverse">
				<!-- begin panel-heading -->
				<div class="panel-heading">
					<h4 class="panel-title">Catagory Listing</h4>					 
				</div>
				<!-- end panel-heading -->
				<!-- begin panel-body -->
				<div class="panel-body">
					<table id="data-table-default" class="table table-striped table-bordered table-td-valign-middle">
						<thead>
							<tr> 
								<th width="1%" data-orderable="false">SNo.</th>
								<th class="text-nowrap">Sub Category Image</th>
								<th class="text-nowrap">Sub Cat Uid</th>
								<th class="text-nowrap">Sub Category Name</th>
								<th class="text-nowrap">Parent Catagory</th>
								<th class="text-nowrap">Sub Category Text </th>
								<th class="text-nowrap">Sub Category Description</th>
								<th class="text-nowrap">Status</th>
								<th class="text-nowrap">Action </th>
							</tr>
						</thead>
						<tbody>
                            <?php 
						 
                                foreach($getallsubcatagory as $key=>$val)
                                {
                                    if($val->is_active == 1){ $status='<a href="'.base_url().'changestatus" data-uid="'.$val->id.'" data-status="'.$val->is_active.'" data-tablename="category" data-pagetype="cat" class="btn btn-success changestatus">Active</a>';} 
                                    else { $status = '<a href="'.base_url().'changestatus" data-uid="'.$val->id.'" data-status="'.$val->is_active.'" data-pagetype="cat" data-tablename="category" class="btn btn-danger changestatus" >Inactive</a>';}
                                    $imageurl = base_url().'catagory_image/'.$val->sub_category_image;
									  
                            ?>
							<tr class="odd gradeX"> 
								<td width="1%" class="f-s-600 text-inverse"><?php echo $key+1;?></td>
                                <td  class="with-img"><img src="<?php echo $imageurl; ?>" class="img-rounded height-30" /></td>
								<td><?php echo $val->subcategory_uid;?></td>
								<td><?php echo $val->sub_category_name;?></td>
								<td><?php echo $val->category_name;?></td> 
								<td><?php echo $val->sub_category_text;?></td> 
								<td><?php echo $val->sub_category_description;?></td> 
								
								<td><?php echo $status; ?></td>
								<td><a href="#" class="btn btn-primary">Edit</a>&nbsp;&nbsp;&nbsp;<a href="#" class="btn btn-warning">Delete</a></td>
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