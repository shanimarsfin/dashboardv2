<?php echo view('templates.header'); ?>
<?php echo view('templates.sidebar'); ?>
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12 icons">
                      <h2><i class="fa fa-download"></i> Download</h2>   
                    </div>
                </div>              
                <hr style="border:10px solid #29e5b7;"/>
                <div class="row">
                  
                  <!-- Data Table -->
                  <div class="col-sm-12">
                    <h3>List of uploaded CSV files</h3> 
                    <hr/>
                    <div class="table-responsive">
                      <table class="table manage table-hover">
                        <thead>
                          <tr>
                            <th style="text-align:center;">Facility Name</th>
                            <th style="text-align:center;">Month</th>
                            <th style="text-align:center;">Year</th>
                            <th style="text-align:center;">Date Submitted</th>
                            <th style="text-align:center;">Program</th>
                            <th style="text-align:center;">Download File</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php if(isset($results) && !empty($results)) : ?>
                            <?php foreach($results as $result) : ?>
                              <tr style="text-align:center;">
                                <td ><?php echo $result->facility_name; ?></td>
                                <td><?php echo $result->month_name; ?></td>
                                <td><?php echo $result->year; ?></td>
                                <td><?php echo $result->date_submitted; ?></td>
                                <td><?php echo $result->program_name; ?></td>
                                <td><a href="<?php echo url('download_csv/' . $result->id); ?>" class="btn btnuser-download"><i class="glyphicon glyphicon-save"></i> Download</a></td>
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
    "order": [[ 3, "desc" ]]
  });
});
</script>
   

