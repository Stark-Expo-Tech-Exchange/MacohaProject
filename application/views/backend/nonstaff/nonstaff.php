<div class="row">
                    <div class="col-sm-5">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('add_nonstaff'); ?></div>
										<div class="panel-body table-responsive">
										
										
										
<?php echo form_open(base_url() . 'nonstaff/nonstaff/insert',
                    array('class' => 'form-horizontal form-groups-bordered', 'enctype' => 'multipart/form-data')); ?>

              
					
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('nonstaff_name');?></label>
                    <div class="col-sm-12">
                        <input type="text" class="form-control" name="name" value="" required autofocus />
                    </div>
                </div>
                
                <span id="designation">
                    <br>
                    <div class="form-group">
                       <label class="col-md-12" for="example-text"><?php echo get_phrase('designation'); ?></label>

                        <div class="col-sm-12">
                            <input type="text" class="form-control" name="designation[]" value="" required /placeholder= "designation here">
                        </div>
                    </div>
                </span>
                
                <span id="designation_input">
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-12">
                            <input type="text" class="form-control" name="designation[]"  value="" / placeholder= "designation here">
                        </div>
                        
                        <div class="col-sm-2">
                            <button type="button" class="btn btn-danger btn-circle btn-xs" onclick="deleteParentElement(this)">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                </span>
                
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-8">
                        <button type="button" class="btn btn-info btn-sm btn-rounded" onClick="add_designation()">
                           <i class="fa fa-plus"></i>&nbsp; <?php echo get_phrase('add_designation'); ?>
                            
                        </button>
                    </div>
                </div>
<div class="form-group">
                        <button type="submit" class="btn btn-success btn-block btn-rounded btn-sm"> <i class="fa fa-plus"></i>&nbsp; <?php echo get_phrase('add_nonstaff'); ?></button>
                </div>
                <?php echo form_close(); ?>
		 		</div>                
			</div>
		</div>
		
		
		
			<!----CREATION FORM ENDS-->
			<div class="col-sm-7">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('list_nonstaffs'); ?></div>
							


<div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
                                <table id="example23" class="display nowrap" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th><div>#</div></th>
            <th><div><?php echo get_phrase('nonstaff_name'); ?></div></th>
            <th><div><?php echo get_phrase('designation'); ?></div></th>
            <th><div><?php echo get_phrase('total_employees'); ?></div></th>
            <th><div><?php echo get_phrase('options'); ?></div></th>
        </tr>
</thead>
<tbody>
    <?php
    $count = 1;
    $this->db->order_by('nonstaff_id', 'desc');
    $nonstaff = $this->db->get('nonstaff')->result_array();
    foreach ($nonstaff as $row):
        ?>
        <tr>
            <td><?php echo $count++; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td>
                <?php
                $count2 = 1;
                 $designation = $this->db->get_where('designation', array('nonstaff_id' => $row['nonstaff_id']))->result_array();
                 foreach ($designation as $row1):
                     echo $count2++.'.';
                     echo $row1['name'];
                     echo '<br>';
                 endforeach;
                ?>
            </td>
            <td><?php echo $this->db->get_where('teacher', array('nonstaff_id' => $row['nonstaff_id']))->num_rows(); ?></td>
            <td>
			
			
			<a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/edit_nonstaff/<?php echo $row['nonstaff_code']; ?>');" 
                        class="btn btn-info btn-circle btn-xs"><i class="fa fa-edit" style="color:white"></i></a>
						
               
							
														<a href="#" onclick="confirm_modal('<?php echo base_url();?>nonstaff/nonstaff/delete/<?php echo $row['nonstaff_code'];?>');"><button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times"></i></button></a>


            </td>
        </tr>
<?php endforeach; ?>
</tbody>
</table>



</div>
			</div>
			</div>
			</div>
			</div>
            <!----TABLE LISTING ENDS--->
			
<script>    
    $('#designation_input').hide();
    
    // CREATING BLANK DESIGNATION INPUT
    var blank_designation = '';
    $(document).ready(function () {
        blank_designation = $('#designation_input').html();
    });

    function add_designation()
    {
        $("#designation").append(blank_designation);
    }

    // REMOVING DESIGNATION INPUT
    function deleteParentElement(n) {
        n.parentNode.parentNode.parentNode.removeChild(n.parentNode.parentNode);
    }

</script>