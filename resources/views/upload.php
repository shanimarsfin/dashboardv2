<?php echo view('templates.header'); ?>
<?php echo view('templates.sidebar'); ?>

        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12 icons">
                      <h2><i class="fa fa-upload"></i> Upload</h2>   
                    </div>
                </div>              
                <hr style="border:10px solid #29e5b7;"/>
                <div class="row" style="margin-bottom:150px;">
                  <div class="col-sm-5">
                    <h4>Guidelines for file uploading:</h4>
                    
                    <ul style="list-style-type:none;padding:0;font-size:1em;">
                      <li>-Make sure that the DOH Facility ID is correct</li>
                      <li>-The file is in CSV format(.csv extension)</li>
                      <li>-No spaces are allowed in the file name</li>
                      <li>-The report submitted should follow the FHSIS 2012 version</li>
                    </ul>
                  </div>
                  <div class="col-sm-7">
                    <legend>Upload</legend>
                    <div class="upload_box" style="height:50px;">
                      <form action="<?php echo url('upload'); ?>" method="POST" enctype="multipart/form-data">
                        <div class="row">
                          <div class="col-sm-6">

                            <input type="file" class="form-control" name="csv" />
                            <input type='hidden' name='_token' value='<?php echo csrf_token(); ?>' />
                            <input type='hidden' name='_method' value='POST' />
                          </div>
                          <div class="col-sm-6">
                            <button type="submit" class="btn btnuser-upload"><i class="fa fa-upload"></i> Upload CSV</button>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-sm-12"> 
                            <?php if(isset($error) && !empty($error)) : ?>
                              <h4 style='color:red;font-style:italic;'><?php echo $error; ?></h4>
                            <?php endif; ?>
                            <?php if(isset($success) && !empty($success)) : ?>
                              <h4 style='color:green;font-style:italic;'><?php echo $success; ?></h4>
                            <?php endif; ?>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
                <hr style="border:10px solid #29e5b7;"/>
                <div class="row">
                  <div class="col-sm-12">
                    <h3>List of submitted reports</h3>
                    <hr/>
                  </div>
                </div> 
                <?php if(isset($delete) && !empty($delete)) : ?>
                  <h4 style='color:green;font-style:italic;'><?php echo $delete; ?></h4>
                <?php endif; ?>  
                <div class="row">
                  <!-- Data Table -->
                  <div class="col-sm-12">
                    <div class="table-responsive">
                      <table class="table manage table-hover">
                        <thead>
                          <tr>
                            <th style="text-align:center;">Health Facility</th>
                            <th style="text-align:center;">Month</th>
                            <th style="text-align:center;">Year</th>
                            <th style="text-align:center;">Program</th>
                            <th style="text-align:center;">Date Submitted</th>
                            <th style="text-align:center;">Submitted By</th>
                            <?php if(Request::session()->get('user_type') == 'admin'): ?>
                            <th style="text-align:center;">Action</th>
                            <?php endif; ?>
                          </tr>
                        </thead>
                        <tbody>
                          <?php if(isset($results) && !empty($results)) : ?>
                            <?php foreach($results as $result) : ?>
                              <tr style="text-align:center;">
                                <td><?php echo $result->facility_name; ?></td>
                                <td><?php echo $result->month_name; ?></td>
                                <td><?php echo $result->year; ?></td>
                                <td><?php echo $result->program_name; ?></td>
                                <td data-sort="<?php echo strtotime($result->date_submitted); ?>"><?php echo $result->date_submitted; ?></td>
                                <td><?php echo $result->first_name . ' ' . $result->last_name; ?></td>
                                <?php if(Request::session()->get('user_type') == 'admin'): ?>
                                  <td><a href="<?php echo url('delete_report/' . $result->id); ?>" class="btn btnuser-delete2" /><i class="glyphicon glyphicon-trash"></i> Delete</a></td>
                                <?php endif; ?>
                              </tr>
                            <?php endforeach; ?>
                          <?php endif; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            </div>
        </div>
<?php echo view('templates.footer'); ?>
<script>
$(document).ready(function(){
  $(".manage").DataTable({
    "order": [[ 4, "desc" ]]
  });
});
</script>
   

