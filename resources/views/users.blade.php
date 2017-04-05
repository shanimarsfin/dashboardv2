<?php echo view('templates.header'); ?>
<?php echo view('templates.sidebar'); ?>
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12 icons">
                      <h2><i class="fa fa-users"></i> Accounts</h2>   
                    </div>
                </div>              
                <hr style="border:10px solid #29e5b7;"/>
                <?php $segment = Request::segment(2); ?>
                <div class="row" style="margin-bottom:40px;">
                  <form action="<?php echo URL::full(); ?>" method="POST">
                    <div class="col-sm-12 text-center">
                      <h3>User Information Form</h3>
                      <br/>
                      <div class="row" style="margin-bottom:10px;">
                        <div class="col-sm-3 text-right">
                          <label>First Name :</label>
                        </div>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" name="admins[first_name]" id="first_name" value="<?php echo isset($values) ? $values->first_name : null; ?>" required/>
                        </div>
                      </div>
                      <div class="row" style="margin-bottom:10px;">
                        <div class="col-sm-3 text-right">
                          <label>Last Name :</label>
                        </div>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" name="admins[last_name]" id="last_name" value="<?php echo isset($values) ? $values->last_name : null; ?>" required/>
                        </div>
                      </div>
                      <div class="row" style="margin-bottom:10px;">
                        <div class="col-sm-3 text-right">
                          <label>Login Name :</label>
                        </div>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" name="admins[username]" id="username" value="<?php echo isset($values) ? $values->username : null; ?>" required/>
                        </div>
                      </div>
                      
                      
                        <div class="row" style="margin-bottom:10px;">
                          <div class="col-sm-3 text-right">
                            <label>Password :</label>
                          </div>
                          <div class="col-sm-6">
                            <?php $segment = Request::segment(2); ?>
                            <?php $required = ''; ?>
                            <?php if($segment != 'edit') : ?>
                              <?php $required = 'required'; ?>
                            <?php endif; ?>
                            <input type="password" class="form-control" name="admins[password]" id="password" value="" <?php echo $required; ?>/>
                          </div>
                        </div>
                      
                      <div class="row" style="margin-bottom:10px;">
                        <div class="col-sm-3 text-right">
                          <label>Province :</label>
                        </div>
                        <div class="col-sm-6">
                          <select class="form-control" id="province_fk" required>
                            <option selected disabled>Select a province</option>
                            <?php foreach($provinces as $province) : ?>
                                <?php $selected = ''; ?>
                                <?php if(isset($prov->code)) : ?>
                                  <?php if($prov->code == $province->code) : ?>
                                    <?php $selected = 'selected'; ?>
                                  <?php endif; ?>
                                <?php endif; ?>
                                <option value="<?php echo $province->code; ?>" <?php echo $selected; ?>><?php echo $province->name; ?></option>
                            <?php endforeach; ?>
                          </select>
                        </div>
                      </div>
                      <div class="row" style="margin-bottom:10px;">
                        <div class="col-sm-3 text-right">
                          <label>Municipality :</label>
                        </div>
                        <div class="col-sm-6">
                          <select class="form-control" name="admins[psgc_citymuncode]" id="city_fk" required>
                            <option selected disabled>Select a municipality</option>
                            <?php if($segment == 'edit') : ?>
                              <?php foreach($cities as $city) : ?>
                                <?php $selected = ''; ?>
                                <?php if($cty->id == $city->id) : ?>
                                  <?php $selected = 'selected'; ?>
                                <?php endif; ?>
                                <option <?php echo $selected; ?> value="<?php echo $city->id; ?>" data-code="<?php echo $city->code; ?>"><?php echo $city->name; ?></option>
                              <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                        </div>
                      </div>
                      <div class="row" style="margin-bottom:10px;">
                        <div class="col-sm-3 text-right">
                          <label>Facility :</label>
                        </div>
                        <div class="col-sm-6">
                          <select class="form-control" name="admins[facility_code]" id="facility_fk" required>
                            <option selected disabled>Select a health facility</option>
                            <?php if($segment == 'edit') : ?>
                              <?php foreach($facilities as $facility) : ?>
                                <?php $selected = ''; ?>
                                <?php if($values->facility_code == $facility->doh_class_id) : ?>
                                  <?php $selected = 'selected'; ?>
                                <?php endif; ?>
                                <option <?php echo $selected; ?> value="<?php echo $facility->doh_class_id; ?>"><?php echo $facility->facility_name; ?></option>
                              <?php endforeach; ?>
                            <?php endif; ?>
                          </select>
                        </div>
                      </div>
                      <div class="row" style="margin-bottom:10px;">
                        <div class="col-sm-3 text-right">
                          <label>User Type :</label>
                        </div>
                        <div class="col-sm-6">
                          <select class="form-control" name="admins[user_type]" id="user_type" required>
                            <option selected disabled>Select a user</option>
                            <?php $admin = ''; ?>
                            <?php $manager = ''; ?>
                            <?php $municipality_user = ''; ?>

                            <?php if(isset($values)) : ?>
                              <?php if($values->user_type == 'admin') : ?>
                                <?php $admin = 'selected'; ?>
                              <?php elseif($values->user_type == 'manager') : ?>
                                <?php $manager = 'selected'; ?>
                              <?php else : ?>
                                <?php $municipality_user = 'selected'; ?>
                              <?php endif; ?>
                            <?php endif; ?>
                            <option value="admin" <?php echo $admin; ?>>Administrator</option>
                            <option value="manager" <?php echo $manager; ?>>Facility Data Manager</option>
                            <option value="municipality_user" <?php echo $municipality_user; ?>>Municipality/City-level User</option>
                          </select>
                        </div>
                      </div>
                      <div class="row" style="margin-bottom:10px;">
                        <div class="col-sm-3 text-right">
                          <label>Email :</label>
                        </div>
                        <div class="col-sm-6">
                          <input type="text" class="form-control" name="admins[email]" value="<?php echo isset($values) ? $values->email : null; ?>"/>
                        </div>
                      </div>
                      <?php if(isset($error) && !empty($error)) : ?>
                        <div class="row">
                          <div class="col-sm-8 text-center">
                            <h4 style="color:red;"><?php echo $error; ?></h4>
                          </div>
                        </div>
                      <?php endif; ?>
                      <?php if(isset($add) && !empty($add)) : ?>
                        <div class="row">
                          <div class="col-sm-12 text-center">
                            <h4 style="color:green;"><?php echo $add; ?></h4>
                          </div>
                        </div>
                      <?php endif; ?>
                      <div class="row">
                        <div class="col-sm-9">
                          <input type="hidden" name="_method" value="POST" />
                          <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
                          <button type="reset" class="btn btnuser-reset"><i class="glyphicon glyphicon-refresh"></i> Reset</button>
                          <button type="submit" class="btn btnuser-save"><i class="glyphicon glyphicon-ok"></i> Save User</button>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <hr style="border:10px solid #29e5b7;"/>
                <?php if(isset($confirm) && !empty($confirm)) : ?>
                  <div class="row">
                    <div class="alert alert-warning">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <center>Are you sure you want to delete this user? &nbsp;&nbsp;<a href="<?php echo url('accounts/delete/' . Request::segment(3)); ?>" class="btn btnuser-delete1"><i class="glyphicon glyphicon-trash"></i> Delete</a>&nbsp;<a href="<?php echo url('accounts'); ?>" class="btn btnuser-cancel"><i class="glyphicon glyphicon-remove"></i> Cancel</a>&nbsp;</center>
                    </div>
                  </div>
                <?php endif; ?>
                <div class="row">
                  <div class="col-sm-12">
                    <h3>List of registered users</h3>
                  </div>
                </div>
                <?php if(isset($edit) && !empty($edit)) : ?>
                        <div class="row">
                          <div class="col-sm-12 text-center">
                            <h4 style="color:green;"><?php echo $edit; ?></h4>
                          </div>
                        </div>
                      <?php endif; ?>
                      <?php if(isset($delete) && !empty($delete)) : ?>
                        <div class="row">
                          <div class="col-sm-12 text-center">
                            <h4 style="color:green;"><?php echo $delete; ?></h4>
                          </div>
                        </div>
                      <?php endif; ?> 
                <div class="row">
                  <!-- Data Table -->
                  <div class="col-sm-12">
                    <div class="table-responsive">
                      <table class="table manage table-hover">
                        <thead>
                          <tr style="background:">
                            <th style="text-align:center;">Name</th>
                            <th style="text-align:center;">Health Facility</th>
                            <th style="text-align:center;">User Type</th>
                            <th style="text-align:center;">Action</th>
                            <!-- <th colspan="3" style="text-align:center;">Health Facility</th>
                            <th colspan="2" style="text-align:center;">User Type</th>
                            <th colspan="3" style="text-align:center;">Action</th> -->
                          </tr>
                        </thead>
                        <tbody>
                          <?php if(isset($admins) && !empty($admins)) : ?>
                            <?php foreach($admins as $admin) : ?>
                              <tr>
                                <td align="center"><?php echo $admin->last_name . ', ' . $admin->first_name; ?></td>
                                <td align="center"><?php echo $admin->facility_name; ?></td>
                                <td align="center"><?php echo $admin->user_type; ?></td>
                                <td align="center"><a href="<?php echo url('accounts/edit/' . $admin->id); ?>" class="btn btn-sm btnuser-edit"><i class="glyphicon glyphicon-pencil"></i> Edit</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo url('accounts/confirm/' . $admin->id); ?>" class="btn btn-sm btnuser-delete"><i class="glyphicon glyphicon-trash"></i> Delete</a></td>
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
  $(".manage").DataTable();
});

$("form").submit(function(e){
  e.preventDefault();
  var province_fk = $("#province_fk");
  var city_fk = $("#city_fk");
  var facility_fk = $("#facility_fk");
  var user_type = $("#user_type");

  if(province_fk[0].selectedIndex != '0' && city_fk[0].selectedIndex != '0' && facility_fk[0].selectedIndex != '0' && user_type[0].selectedIndex != '0'){
    this.submit();
  }
});

$("#province_fk").change(function(){
  var province = $(this).val();
  //$("#facility_fk").html('<option selected disabled>Select a facility</option>');

  $.ajax({
        url : "<?php echo url('get_municipalities'); ?>" + '/' + province,
        type : "GET",
        success:function(data){
          var html;// = '<option selected>Select a municipality</option>';
          html += data;
          console.log(html);
          $("#city_fk").html(data);
        },
        error:function(data){
            console.log(data);
        },
        datatype: "json"
    }); 
});

$("#city_fk").change(function(){
  //var city = $(this).val();
  var city = $("#city_fk option:selected").data('code');
  $.ajax({
        url : "<?php echo url('get_health_facilities'); ?>" + '/' + city,
        type : "GET",
        success:function(data){
          var html = '<option selected disabled>Select a health facility</option>';
          html += data;
          $("#facility_fk").html(html);
        },
        error:function(data){
            console.log(data);
        },
        datatype: "json"
    });
});
</script>
   

