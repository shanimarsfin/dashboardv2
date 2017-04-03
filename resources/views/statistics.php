<?php echo view('templates.header'); ?>
<?php echo view('templates.sidebar'); ?>
<link rel = 'stylesheet' type = 'text/css' href = '<?php echo asset('public_html/css/table/normalize.css'); ?>' />
<link rel = 'stylesheet' type = 'text/css' href = '<?php echo asset('public_html/css/table/demo.css'); ?>'/>
<link rel = 'stylesheet' type = 'text/css' href = '<?php echo asset('public_html/css/table/component.css'); ?>' />
<script src="<?php echo asset('public_html/js/jquery.stickyheader.js'); ?>"></script>        
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12 icons">
                      <h2><i class="fa fa-bar-chart-o"></i> Statistics</h2>   
                    </div>
                </div>              
                <hr style="border:10px solid #29e5b7;"/>
                <h3>Set values for the query categories</h3>
                <br/>
                <form action="statistics" method="POST">
                  <div class="row" style="margin-bottom:15px;">
                    <div class="col-sm-2">
                      <label>Select Program</label>
                    </div>
                    <div class="col-sm-6">
                      <select class="form-control chosen_program" name="program" id="program">
                        <option selected disabled>Select program</option>
                        <?php foreach($programs as $program) : ?>
                          <option value="<?php echo $program->id; ?>"><?php echo $program->name; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <script>
                        $('.chosen_program').chosen();
                      </script>
                    </div>
                  </div>
                  <div class="row" style="margin-bottom:15px;">
                    <div class="col-sm-2">
                      <label>Level of Comparison</label>
                    </div>
                    <div class="col-sm-6">
                      <select class="form-control" name="level_of_comparison" id="level_of_comparison">
                        <option selected disabled>Select level of comparison</option>
                        <option value="4">Region</option>
                        <option value="1">Province</option>
                        <option value="2">Municipality</option>
                        <option value="3">Health Facility</option>
                      </select>
                      <script>
                        $("#level_of_comparison").chosen();
                      </script>
                    </div>
                  </div>
                  <div class="row regions_all" style="display:none;">
                    <div class="col-sm-2">
                      <label>Select Region</label>
                    </div>
                    <div class="col-sm-4">
                      <select class="form-control region-chosen-multiple" multiple name="region_all[]" id="region_all">
                        <?php foreach($regions as $region) : ?>
                          <option value="<?php echo $region->region_code; ?>"><?php echo $region->region_name; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="row provinces_normal" style="display:none;">
                    <div class="col-sm-2">
                      <label>Select Province</label>
                    </div>
                    <div class="col-sm-4">
                      <select class="form-control province-chosen-normal" name="province_normal" id="province_normal">
                        <option selected>Select province</option>
                        <?php foreach($provinces as $province) : ?>
                          <option value="<?php echo $province->code; ?>"><?php echo $province->name; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="row provinces_all" style="display:none;">
                    <div class="col-sm-2">
                      <label>Select Province</label>
                    </div>
                    <div class="col-sm-4">
                      <select class="form-control province-chosen-multiple" multiple name="province_all[]" id="province_all">
                        <?php foreach($provinces as $province) : ?>
                          <option value="<?php echo $province->code; ?>"><?php echo $province->name; ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="row municipality_normal" style="display:none;">
                    <div class="col-sm-2">
                      <label>Select Municipality</label>
                    </div>
                    <div class="col-sm-4">
                      <select class="form-control municipality-chosen-normal" name="municipality_normal" id="municipality">
                        <option selected disabled>Select municipality</option>
                        <?php //foreach($cities as $city) : ?>
                          <!-- <option value="<?php //echo $city->id; ?>"><?php //echo $city->name; ?></option> -->
                        <?php //endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="row municipality_hf_normal" style="display:none;">
                    <div class="col-sm-2">
                      <label>Select Municipality</label>
                    </div>
                    <div class="col-sm-4">
                      <select class="form-control municipality_hf-chosen-normal" name="municipality_hf_normal" id="municipality_hf">
                        <option selected disabled>Select municipality</option>
                        <?php //foreach($cities as $city) : ?>
                          <!-- <option value="<?php //echo $city->id; ?>"><?php //echo $city->name; ?></option> -->
                        <?php //endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="row municipality_all" style="display:none;">
                    <div class="col-sm-2">
                      <label>Select Municipality</label>
                    </div>
                    <div class="col-sm-4">
                      <select class="form-control municipality-chosen-multiple" multiple name="municipality_all[]" id="municipality">
                      </select>
                    </div>
                  </div>
                  <div class="row municipality_choose" style="display:none;">
                    <div class="col-sm-2">
                      <label>Select Municipality</label>
                    </div>
                    <div class="col-sm-4">
                      <select class="form-control municipality-chosen-choose" name="municipality_normal" id="municipality">
                        <option selected disabled>Select municipality</option>
                        <?php //foreach($cities as $city) : ?>
                          <!-- <option value="<?php //echo $city->id; ?>"><?php //echo $city->name; ?></option> -->
                        <?php //endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="row m_container" style='margin-bottom:15px;display:none;'>
                      <div class="col-sm-2">
                        <label>Chosen Municipalities</label>
                      </div>
                      <div class="col-sm-4">
                        <ul class="m" style='list-style-type:none;'>
                              
                        </ul>
                      </div>
                  </div>
                  <div class="row health_facility" style="display:none;">
                    <div class="col-sm-2">
                      <label>Select Health Facility</label>
                    </div>
                    <div class="col-sm-4">
                      <select class="form-control health_facility-chosen-normal" name="health_facility" id="health_facility">
                      </select>
                    </div>
                  </div>
                  <div class="row hf_container" style='margin-bottom:15px;display:none;'>
                      <div class="col-sm-2">
                        <label>Chosen Health Facilities</label>
                      </div>
                      <div class="col-sm-4">
                        <ul class="hf" style='list-style-type:none;'>
                              
                        </ul>
                      </div>
                  </div>
                  <div class="row" style="margin-bottom:15px;">
                    <div class="col-sm-2">
                      <label>Set period</label>
                    </div>
                    <div class="col-sm-3">
                      <select class="form-control" name="month1" id="month1">
                        <option selected disabled>Select month</option>
                        <?php foreach($months as $month) : ?>
                          <option value="<?php echo $month->id; ?>"><?php echo $month->name; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <script>
                      $("#month1").chosen();
                      </script>
                    </div>
                    <div class="col-sm-1 text-center">
                      <label>TO</label>
                    </div>
                    <div class="col-sm-3">
                      <select class="form-control" name="month2" id="month2">
                        <option selected disabled>Select month</option>
                        <?php foreach($months as $month): ?>
                          <option value="<?php echo $month->id; ?>"><?php echo $month->name; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <script>
                      $("#month2").chosen();
                      </script>
                    </div>
                    <div class="col-sm-3">
                      <select class="form-control" name="year" id="year">
                        <option selected disabled>Select year</option>
                        <?php foreach($years as $year) : ?>
                          <option value="<?php echo $year->year; ?>"><?php echo $year->year; ?></option>
                        <?php endforeach; ?>
                      </select>
                      <script>
                      $("#year").chosen();
                      </script>
                    </div>
                  </div>
                  <div class="row" style="margin-bottom:50px;">
                    <div class="col-sm-12">
                      <center>
                        <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
                        <input type="hidden" name="_method" value="POST" />
                        <button type="submit" class="btn btn-lg btnuser-submitquery"><i class="glyphicon glyphicon-ok"></i> Submit Query</button>
                      </center>
                    </div>
                  </div>
                </form>
                
                <?php if(isset($result) && !empty($result)) : ?>
                  <?php if($labels['month1'] == $labels['month2']) : ?>
                        <h4><b><?php echo $labels['program']; ?></b> > <b><?php echo $labels['month1'] . ' ' . $labels['year']; ?></b></h4>
                  <?php else : ?>
                        <h4><b><?php echo $labels['program']; ?></b> > <b><?php echo $labels['month1']; ?></b> to <b><?php echo $labels['month2'] . ' ' . $labels['year']; ?></b></h4>
                  <?php endif; ?>
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="table-responsive">
                        <style>
                          .sticky-intersect thead tr th{
                            text-align:center;
                          }
                        </style>
                        <table class="manage overflow-y stat">
                          <thead>
                            <tr>
                              <th colspan="3" style="background-color:#0066ff;color:white;text-align:center;">Indicators</th>
                              <?php if($is_morbidity != null) : ?>
                                    <?php foreach($morbidity_fields as $field) : ?>
                                        <th colspan="2" style="background-color:#0066ff;color:white;white-space:nowrap;text-align:center;"><?php echo $field; ?></th>  
                                    <?php endforeach; ?>
                                    <th colspan="2" style="background-color:#0066ff;color:white;white-space:nowrap;text-align:center;">Grand Total</th>
                              <?php else : ?>
                                   <?php if(isset($province_filters) && !empty($province_filters)) : ?>
                                      <?php foreach($province_filters as $pf) : ?>
                                        <th colspan="2" style="background-color:#0066ff;color:white;white-space:nowrap;text-align:center;"><?php echo $pf->name; ?></th>
                                      <?php endforeach; ?>
                                      <th colspan="2" style="background-color:#0066ff;color:white;white-space:nowrap;text-align:center;">Grand Total</th>
                                  <?php elseif(isset($province_cities_filters) && !empty($province_cities_filters)) : ?>
                                      <?php foreach($province_cities_filters as $pcf) : ?>
                                        <th colspan="2" style="background-color:#0066ff;color:white;white-space:nowrap;text-align:center;"><?php echo $pcf->name; ?></th>
                                      <?php endforeach; ?>
                                      <th colspan="2" style="background-color:#0066ff;color:white;white-space:nowrap;text-align:center;">Grand Total</th>
                                  <?php elseif(isset($city_filters) && !empty($city_filters)) : ?>
                                      <?php foreach($city_filters as $cf) : ?>
                                        <th colspan="2" style="background-color:#0066ff;color:white;white-space:nowrap;text-align:center;"><?php echo $cf->name; ?></th>
                                      <?php endforeach; ?>
                                      <th colspan="2" style="background-color:#0066ff;color:white;white-space:nowrap;text-align:center;">Grand Total</th>
                                  <?php elseif(isset($health_facility_filters) && !empty($health_facility_filters)) : ?>
                                      <?php foreach($health_facility_filters as $hff) : ?>
                                        <th colspan="2" style="background-color:#0066ff;color:white;white-space:nowrap;text-align:center;"><?php echo $hff->facility_name; ?></th>
                                      <?php endforeach; ?>
                                      <th colspan="2" style="background-color:#0066ff;color:white;white-space:nowrap;text-align:center;">Grand Total</th>
                                  <?php elseif(isset($region_filters) && !empty($region_filters)) : ?>
                                      <?php foreach($region_filters as $rf) : ?>
                                        <th colspan="2" style="background-color:#0066ff;color:white;white-space:nowrap;text-align:center;"><?php echo $rf->region_name; ?></th>
                                      <?php endforeach; ?>
                                      <th colspan="2" style="background-color:#0066ff;color:white;white-space:nowrap;text-align:center;">Grand Total</th>
                                  <?php elseif(isset($region_provinces_filters) && !empty($region_provinces_filters)) : ?>
                                      <?php foreach($region_provinces_filters as $rpf) : ?>
                                        <th colspan="2" style="background-color:#0066ff;color:white;white-space:nowrap;text-align:center;"><?php echo $rpf->name; ?></th>
                                      <?php endforeach; ?>
                                      <th colspan="2" style="background-color:#0066ff;color:white;white-space:nowrap;text-align:center;">Grand Total</th>
                                  <?php endif; ?>
                              <?php endif; ?>
                            </tr>
                          </thead>
                          <tbody>
                            <?php if($is_morbidity != null) : ?>
                                  <?php if(sizeof($morbidity_array) > 0) : ?>
                                    <?php foreach($morbidity_array as $key => $ma) : ?>
                                        <tr>
                                          <th colspan="3" style="text-align:center;"><?php echo $ma->description; ?></th>
                                          <?php foreach($morbidity_fields as $field) : ?>
                                                  <td colspan="2"><?php echo $ma->$field; ?></td>
                                          <?php endforeach; ?>
                                          <td colspan="2" style="text-align:center;"><?php echo $ma->grand_total; ?></th>
                                        </tr>
                                    <?php endforeach; ?>
                                  <?php else : ?>
                                    <tr>
                                        <?php $colspan = 5; ?>
                                        <?php foreach($morbidity_fields as $field) : ?>
                                          <?php $colspan += 2; ?>
                                        <?php endforeach; ?>
                                        <td colspan="<?php echo $colspan; ?>" style="text-align:center;">No data available for this query.</td>
                                    </tr>
                                  <?php endif; ?>
                            <?php else : ?>
                              <?php if(isset($indicators) && !empty($indicators)) : ?>
                                <?php foreach($indicators as $indicator) : ?>
                                  <?php $indicator_code = $indicator->indicator_code; ?>
                                  <tr>
                                    <th colspan="3" style="width:200px !important;color:white;background-color:#0066ff;text-align:center;"><?php echo $indicator->indicator_desc; ?></th>
                                    <?php if(isset($province_filters) && !empty($province_filters)) : ?>
                                      <?php $grand_total = 0; ?>
                                      <?php foreach($province_filters as $pf) : ?>
                                        <?php $province_code = $pf->code; ?>
                                        <?php if(isset($result[$province_code][$indicator_code]) && !empty($result[$province_code][$indicator_code])) : ?>
                                          <?php if(($result[$province_code][$indicator_code] == null || $result[$province_code][$indicator_code] == 0)) : ?>
                                              <td style="text-align:center;"><?php echo ($result[$province_code][$indicator_code] == null) ? 0 : $result[$province_code][$indicator_code]; ?></td>
                                          <?php else : ?>
                                              <?php if(isset($whole_link[$province_code][$indicator_code]) && !empty($whole_link[$province_code][$indicator_code])) : ?>
                                                    <td style="text-align:center;"><a target="_blank" href="<?php echo $whole_link[$province_code][$indicator_code]; ?>"><?php echo ($result[$province_code][$indicator_code] == null) ? 0 : $result[$province_code][$indicator_code]; ?></a></td>
                                              <?php else : ?>
                                                    <td style="text-align:center;"><?php echo ($result[$province_code][$indicator_code] == null) ? 0 : $result[$province_code][$indicator_code]; ?></td>
                                              <?php endif; ?>
                                          <?php endif; ?>
                                          <?php $grand_total += $result[$province_code][$indicator_code]; ?>
                                          <?php if((!isset($percent[$province_code][$indicator_code]) && empty($percent[$province_code][$indicator_code])) || $percent[$province_code][$indicator_code] == 0)  : ?>
                                              <td style="text-align:center;"><?php echo '0.00'; ?>%</td>
                                          <?php else : ?>
                                              <?php if(($result[$province_code][$indicator_code] / floatval($percent[$province_code][$indicator_code])) == 0) : ?>
                                                  <td style="text-align:center;"><?php echo '0.00%'; ?></td>
                                              <?php else : ?>
                                                  <td style="text-align:center;"><a target="_blank" href="<?php echo $percent_link[$province_code][$indicator_code]; ?>"><?php echo number_format(($result[$province_code][$indicator_code] / floatval($percent[$province_code][$indicator_code])) * 100, 2); ?>%</a></td>
                                              <?php endif; ?>   
                                          <?php endif; ?>
                                        <?php else : ?>
                                            <td style="text-align:center;">0</td>
                                            <td style="text-align:center;">0%</td>
                                        <?php endif; ?>
                                      <?php endforeach; ?>
                                      <td style="text-align:center;" colspan="2">
                                        <?php if($grand_total > 0) : ?>
                                          <a target="_blank" href="<?php echo $grand_total_link[$indicator_code]; ?>">
                                          <?php echo $grand_total; ?>
                                          </a>
                                        <?php else : ?>
                                          <?php echo $grand_total; ?>
                                        <?php endif; ?>
                                      </td>
                                    <?php elseif(isset($province_cities_filters) && !empty($province_cities_filters)) : ?>
                                      <?php $grand_total = 0; ?>
                                      <?php foreach($province_cities_filters as $pcf) : ?>
                                        <?php $city_code = $pcf->code; ?>
                                        <?php if(isset($result[$city_code][$indicator_code]) && !empty($result[$city_code][$indicator_code])) : ?>
                                          <?php if(($result[$city_code][$indicator_code] == null || $result[$city_code][$indicator_code] == 0)) : ?>
                                              <td style="text-align:center;"><?php echo ($result[$city_code][$indicator_code] == null) ? 0 : $result[$city_code][$indicator_code]; ?></td>
                                          <?php else : ?>
                                              <?php if(isset($whole_link[$city_code][$indicator_code]) && !empty($whole_link[$city_code][$indicator_code])) : ?>
                                                    <td style="text-align:center;"><a target="_blank" href="<?php echo $whole_link[$city_code][$indicator_code]; ?>"><?php echo ($result[$city_code][$indicator_code] == null) ? 0 : $result[$city_code][$indicator_code]; ?></a></td>
                                              <?php else : ?>
                                                    <td style="text-align:center;"><?php echo ($result[$city_code][$indicator_code] == null) ? 0 : $result[$city_code][$indicator_code]; ?></td>
                                              <?php endif; ?>
                                          <?php endif; ?>
                                          <?php $grand_total += $result[$city_code][$indicator_code]; ?>
                                          <?php if((!isset($percent[$city_code][$indicator_code]) && empty($percent[$city_code][$indicator_code])) || $percent[$city_code][$indicator_code] == 0)  : ?>
                                              <td style="text-align:center;"><?php echo '0.00'; ?>%</td>
                                          <?php else : ?>
                                              <?php if(($result[$city_code][$indicator_code] / floatval($percent[$city_code][$indicator_code])) == 0) : ?>
                                                  <td style="text-align:center;"><?php echo '0.00%'; ?></td>
                                              <?php else : ?>
                                                  <td style="text-align:center;"><a target="_blank" href="<?php echo $percent_link[$city_code][$indicator_code]; ?>"><?php echo number_format(($result[$city_code][$indicator_code] / floatval($percent[$city_code][$indicator_code])) * 100, 2); ?>%</a></td>
                                              <?php endif; ?>   
                                          <?php endif; ?>
                                        <?php else : ?>
                                            <td style="text-align:center;">0</td>
                                            <td style="text-align:center;">0%</td>
                                        <?php endif; ?>
                                      <?php endforeach; ?>
                                      <td style="text-align:center;" colspan="2">
                                        <?php if($grand_total > 0) : ?>
                                          <a target="_blank" href="<?php echo $grand_total_link[$indicator_code]; ?>">
                                          <?php echo $grand_total; ?>
                                          </a>
                                        <?php else : ?>
                                          <?php echo $grand_total; ?>
                                        <?php endif; ?>
                                      </td>
                                    <?php elseif(isset($city_filters) && !empty($city_filters)) : ?>
                                        <?php $grand_total = 0; ?>
                                        <?php foreach($city_filters as $cf) : ?>
                                          <?php if(isset($result[$cf->code]) && !empty($result[$cf->code])) : ?>
                                            <?php if(($result[$cf->code][$indicator_code] == null || $result[$cf->code][$indicator_code] == 0)) : ?>
                                                <td style="text-align:center;"><?php echo ($result[$cf->code][$indicator_code] == null) ? 0 : $result[$cf->code][$indicator_code]; ?></td>
                                            <?php else : ?>
                                                <?php if(isset($whole_link[$cf->code][$indicator_code]) && !empty($whole_link[$cf->code][$indicator_code])) : ?>
                                                    <td style="text-align:center;"><a target="_blank" href="<?php echo $whole_link[$cf->code][$indicator_code]; ?>"><?php echo ($result[$cf->code][$indicator_code] == null) ? 0 : $result[$cf->code][$indicator_code]; ?></a></td>
                                                <?php else : ?>
                                                      <td style="text-align:center;"><?php echo ($result[$cf->code][$indicator_code] == null) ? 0 : $result[$cf->code][$indicator_code]; ?></td>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <?php $grand_total += $result[$cf->code][$indicator_code]; ?>
                                            <?php if((!isset($percent[$cf->code][$indicator_code]) && empty($percent[$cf->code][$indicator_code])) || $percent[$cf->code][$indicator_code] == 0) : ?>
                                                <td style="text-align:center;"><?php echo '0.00'; ?>%</td>
                                            <?php else : ?>
                                                <?php if(($result[$cf->code][$indicator_code] / floatval($percent[$cf->code][$indicator_code])) == 0) : ?>
                                                    <td style="text-align:center;"><?php echo '0.00%'; ?></td>
                                                <?php else : ?>
                                                    <td style="text-align:center;"><a target="_blank" href="<?php echo $percent_link[$cf->code][$indicator_code]; ?>"><?php echo number_format(($result[$cf->code][$indicator_code] / floatval($percent[$cf->code][$indicator_code])) * 100, 2); ?>%</a></td>
                                                <?php endif; ?>   
                                            <?php endif; ?>
                                        <?php else : ?>
                                            <td style="text-align:center;">0</td>
                                            <td style="text-align:center;">0%</td>
                                        <?php endif; ?>
                                        <?php endforeach; ?>
                                        <td style="text-align:center;" colspan="2">
                                          <?php if($grand_total > 0) : ?>
                                            <a target="_blank" href="<?php echo $grand_total_link[$indicator_code]; ?>">
                                            <?php echo $grand_total; ?>
                                            </a>
                                          <?php else : ?>
                                            <?php echo $grand_total; ?>
                                          <?php endif; ?>
                                        </td>
                                    <?php elseif(isset($health_facility_filters) && !empty($health_facility_filters)) : ?>
                                        <?php $grand_total = 0; ?>
                                        <?php foreach($health_facility_filters as $hff) : ?>
                                          <?php if(isset($result[$hff->doh_class_id]) && !empty($result[$hff->doh_class_id])) : ?>
                                              <?php if(($result[$hff->doh_class_id][$indicator_code] == null || $result[$hff->doh_class_id][$indicator_code] == 0)) : ?>
                                                  <td style="text-align:center;"><?php echo ($result[$hff->doh_class_id][$indicator_code] == null) ? 0 : $result[$hff->doh_class_id][$indicator_code]; ?></td>
                                              <?php else : ?>
                                                 <?php if(isset($whole_link[$hff->doh_class_id][$indicator_code]) && !empty($whole_link[$hff->doh_class_id][$indicator_code])) : ?>
                                                    <td style="text-align:center;"><a target="_blank" href="<?php echo $whole_link[$hff->doh_class_id][$indicator_code]; ?>"><?php echo ($result[$hff->doh_class_id][$indicator_code] == null) ? 0 : $result[$hff->doh_class_id][$indicator_code]; ?></a></td>
                                                <?php else : ?>
                                                      <td style="text-align:center;"><?php echo ($result[$hff->doh_class_id][$indicator_code] == null) ? 0 : $result[$hff->doh_class_id][$indicator_code]; ?></td>
                                                <?php endif; ?>
                                                <?php $grand_total += $result[$hff->doh_class_id][$indicator_code]; ?>
                                              <?php endif; ?>
                                              <?php if((!isset($percent[$hff->doh_class_id][$indicator_code]) && empty($percent[$hff->doh_class_id][$indicator_code])) || $percent[$hff->doh_class_id][$indicator_code] == 0) : ?>
                                                  <td style="text-align:center;"><?php echo '0.00'; ?>%</td>
                                              <?php else : ?>
                                                  <?php if(($result[$hff->doh_class_id][$indicator_code] / floatval($percent[$hff->doh_class_id][$indicator_code])) == 0) : ?>
                                                      <td style="text-align:center;"><?php echo '0.00%'; ?></td>
                                                  <?php else : ?>
                                                      <td style="text-align:center;"><a target="_blank" href="<?php echo $percent_link[$hff->doh_class_id][$indicator_code]; ?>"><?php echo number_format(($result[$hff->doh_class_id][$indicator_code] / floatval($percent[$hff->doh_class_id][$indicator_code])) * 100, 2); ?>%</a></td>
                                                  <?php endif; ?>   
                                              <?php endif; ?>
                                          <?php else : ?>
                                              <td style="text-align:center;">0</td>
                                              <td style="text-align:center;">0%</td>
                                          <?php endif; ?>
                                        <?php endforeach; ?>
                                        <td style="text-align:center;" colspan="2">
                                        <?php if($grand_total > 0) : ?>
                                          <a target="_blank" href="<?php echo $grand_total_link[$indicator_code]; ?>">
                                          <?php echo $grand_total; ?>
                                          </a>
                                        <?php else : ?>
                                          <?php echo $grand_total; ?>
                                        <?php endif; ?>
                                        </td>
                                    <?php elseif(isset($region_filters) && !empty($region_filters)) : ?>
                                        <?php $grand_total = 0; ?>
                                        <?php foreach($region_filters as $rf) : ?>
                                          <?php $region_code = $rf->region_code; ?>
                                          <?php if(isset($result[$region_code][$indicator_code]) && !empty($result[$region_code][$indicator_code])) : ?>
                                            <?php if(($result[$region_code][$indicator_code] == null || $result[$region_code][$indicator_code] == 0)) : ?>
                                                <td style="text-align:center;"><?php echo ($result[$region_code][$indicator_code] == null) ? 0 : $result[$region_code][$indicator_code]; ?></td>
                                            <?php else : ?>
                                                <?php if(isset($whole_link[$region_code][$indicator_code]) && !empty($whole_link[$region_code][$indicator_code])) : ?>
                                                      <td style="text-align:center;"><a target="_blank" href="<?php echo $whole_link[$region_code][$indicator_code]; ?>"><?php echo ($result[$region_code][$indicator_code] == null) ? 0 : $result[$region_code][$indicator_code]; ?></a></td>
                                                <?php else : ?>
                                                      <td style="text-align:center;"><?php echo ($result[$region_code][$indicator_code] == null) ? 0 : $result[$region_code][$indicator_code]; ?></td>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                            <?php $grand_total += $result[$region_code][$indicator_code]; ?>
                                            <?php if((!isset($percent[$region_code][$indicator_code]) && empty($percent[$region_code][$indicator_code])) || $percent[$region_code][$indicator_code] == 0)  : ?>
                                                <td style="text-align:center;"><?php echo '0.00'; ?>%</td>
                                            <?php else : ?>
                                                <?php if(($result[$region_code][$indicator_code] / floatval($percent[$region_code][$indicator_code])) == 0) : ?>
                                                    <td style="text-align:center;"><?php echo '0.00%'; ?></td>
                                                <?php else : ?>
                                                    <td style="text-align:center;"><a target="_blank" href="<?php echo $percent_link[$region_code][$indicator_code]; ?>"><?php echo number_format(($result[$region_code][$indicator_code] / floatval($percent[$region_code][$indicator_code])) * 100, 2); ?>%</a></td>
                                                <?php endif; ?>   
                                            <?php endif; ?>
                                          <?php else : ?>
                                              <td style="text-align:center;">0</td>
                                              <td style="text-align:center;">0%</td>
                                          <?php endif; ?>
                                        <?php endforeach; ?>
                                        <td style="text-align:center;" colspan="2">
                                          <?php if($grand_total > 0) : ?>
                                            <a target="_blank" href="<?php echo $grand_total_link[$indicator_code]; ?>">
                                            <?php echo $grand_total; ?>
                                            </a>
                                          <?php else : ?>
                                            <?php echo $grand_total; ?>
                                          <?php endif; ?>
                                        </td>
                                    <?php elseif(isset($region_provinces_filters) && !empty($region_provinces_filters)) : ?>
                                          <?php $grand_total = 0; ?>
                                          <?php foreach($region_provinces_filters as $rpf) : ?>
                                            <?php $province_code = $rpf->code; ?>
                                            <?php if(isset($result[$province_code][$indicator_code]) && !empty($result[$province_code][$indicator_code])) : ?>
                                              <?php if(($result[$province_code][$indicator_code] == null || $result[$province_code][$indicator_code] == 0)) : ?>
                                                  <td style="text-align:center;"><?php echo ($result[$province_code][$indicator_code] == null) ? 0 : $result[$province_code][$indicator_code]; ?></td>
                                              <?php else : ?>
                                                  <?php if(isset($whole_link[$province_code][$indicator_code]) && !empty($whole_link[$province_code][$indicator_code])) : ?>
                                                        <td style="text-align:center;"><a target="_blank" href="<?php echo $whole_link[$province_code][$indicator_code]; ?>"><?php echo ($result[$province_code][$indicator_code] == null) ? 0 : $result[$province_code][$indicator_code]; ?></a></td>
                                                  <?php else : ?>
                                                        <td style="text-align:center;"><?php echo ($result[$province_code][$indicator_code] == null) ? 0 : $result[$province_code][$indicator_code]; ?></td>
                                                  <?php endif; ?>
                                              <?php endif; ?>
                                              <?php $grand_total += $result[$province_code][$indicator_code]; ?>
                                              <?php if((!isset($percent[$province_code][$indicator_code]) && empty($percent[$province_code][$indicator_code])) || $percent[$province_code][$indicator_code] == 0)  : ?>
                                                  <td style="text-align:center;"><?php echo '0.00'; ?>%</td>
                                              <?php else : ?>
                                                  <?php if(($result[$province_code][$indicator_code] / floatval($percent[$province_code][$indicator_code])) == 0) : ?>
                                                      <td style="text-align:center;"><?php echo '0.00%'; ?></td>
                                                  <?php else : ?>
                                                      <td style="text-align:center;"><a target="_blank" href="<?php echo $percent_link[$province_code][$indicator_code]; ?>"><?php echo number_format(($result[$province_code][$indicator_code] / floatval($percent[$province_code][$indicator_code])) * 100, 2); ?>%</a></td>
                                                  <?php endif; ?>   
                                              <?php endif; ?>
                                            <?php else : ?>
                                                <td style="text-align:center;">0</td>
                                                <td style="text-align:center;">0%</td>
                                            <?php endif; ?>
                                          <?php endforeach; ?>
                                          <td style="text-align:center;" colspan="2">
                                            <?php if($grand_total > 0) : ?>
                                              <a target="_blank" href="<?php echo $grand_total_link[$indicator_code]; ?>">
                                              <?php echo $grand_total; ?>
                                              </a>
                                            <?php else : ?>
                                              <?php echo $grand_total; ?>
                                            <?php endif; ?>
                                          </td>
                                    <?php endif; ?>
                                  </tr>
                                <?php endforeach; ?>
                              <?php endif; ?>
                            <?php endif; ?>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                <?php else : ?>
                  <?php if($post) : ?>
                    <h3 class="text-center">No data available for this query</h3>
                  <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
<?php echo view('templates.footer'); ?>
<script>


var hf_array = [];
var m_array = [];

$("#level_of_comparison").change(function(){
  var comparison = $(this).val();

  if(comparison == '1'){
    //Province
    //Deselect Current
    $(".region-chosen-multiple").chosen('destroy');
    $(".province-chosen-normal").chosen('destroy');
    $(".province-chosen-multiple").chosen('destroy');
    $(".municipality-chosen-multiple").chosen('destroy');
    $(".municipality-chosen-normal").chosen('destroy');
    $(".municipality-chosen-choose").chosen('destroy');
    $(".municipality_hf-chosen-normal").chosen('destroy');
    $(".health_facility-chosen-normal").chosen('destroy');

    $(".region-chosen-multiple option").prop('selected', false);
    $(".province-chosen-normal option").prop("selected", false);
    $(".province-chosen-multiple option").prop("selected", false);
    $(".municipality-chosen-multiple option").prop("selected", false);
    $(".municipality-chosen-normal option").prop("selected", false);
    $(".municipality-chosen-choose option").prop("selected", false);
    $(".municipality_hf-chosen-normal option").prop("selected", false);
    $(".health_facility-chosen-normal option").prop("selected", false);

    $(".provinces_all").attr('style', 'margin-bottom:15px;');
    $(".province-chosen-multiple").chosen();
    $(".regions_all").attr('style', 'display:none;');
    $(".provinces_normal").attr('style', 'display:none;');
    $(".municipality_all").attr('style','display:none;');
    $(".municipality_normal").attr('style','display:none;');
    $(".municipality_choose").attr('style','display:none;');
    $(".municipality_hf_normal").attr('style','display:none;');
    $(".health_facility").attr('style', 'display:none;');
    $(".hf").html('');
    $(".hf_container").attr('style', 'display:none;')
    $(".m").html('');
    $(".m_container").attr('style', 'display:none;');
    hf_array = [];
    m_array = [];
  }else if(comparison == '2'){
    //Municipality
    //Deselect Current
    $(".region-chosen-multiple").chosen('destroy');
    $(".province-chosen-normal").chosen('destroy');
    $(".province-chosen-multiple").chosen('destroy');
    $(".municipality-chosen-multiple").chosen('destroy');
    $(".municipality-chosen-normal").chosen('destroy');
    $(".municipality-chosen-choose").chosen('destroy');
    $(".municipality_hf-chosen-normal").chosen('destroy');
    $(".health_facility-chosen-normal").chosen('destroy');

    $(".region-chosen-multiple option").prop("selected", false);
    $(".province-chosen-normal option").prop("selected", false);
    $(".province-chosen-multiple option").prop('selected', false);
    $(".municipality-chosen-multiple option").prop("selected", false);
    $(".municipality-chosen-normal option").prop("selected", false);
    $(".municipality-chosen-choose option").prop("selected", false);
    $(".municipality_hf-chosen-normal option").prop("selected", false);
    $(".health_facility-chosen-normal option").prop("selected", false);

    $(".provinces_all").attr('style', 'display:none;');
    $(".provinces_normal").attr('style', 'margin-bottom:15px;');
    $(".province-chosen-normal").chosen();
    $(".regions_all").attr('style', 'display:none;');
    $(".municipality_all").attr('style','display:none;');
    $(".municipality_normal").attr('style','display:none;');
    $(".municipality_choose").attr('style','display:none;');
    $(".municipality_hf_normal").attr('style','display:none;');
    $(".health_facility").attr('style', 'display:none;');
    $(".hf").html('');
    $(".hf_container").attr('style', 'display:none;')
    $(".m").html('');
    $(".m_container").attr('style','');
    hf_array = [];
    m_array = [];
  }else if(comparison == '3'){
    //Health Facility
    //Deselect
    $(".region-chosen-multiple").chosen('destroy');
    $(".province-chosen-normal").chosen('destroy');
    $(".province-chosen-multiple").chosen('destroy');
    $(".municipality-chosen-multiple").chosen('destroy');
    $(".municipality-chosen-normal").chosen('destroy');
    $(".municipality-chosen-choose").chosen('destroy');
    $(".municipality_hf-chosen-normal").chosen('destroy');
    $(".health_facility-chosen-normal").chosen('destroy');

    $(".region-chosen-multiple option").prop("selected", false);
    $(".province-chosen-normal option").prop("selected", false);
    $(".province-chosen-multiple option").prop("selected", false);
    $(".municipality-chosen-multiple option").prop("selected", false);
    $(".municipality-chosen-normal option").prop("selected", false);
    $(".municipality-chosen-choose option").prop("selected", false);
    $(".municipality_hf-chosen-normal option").prop("selected", false);
    $(".health_facility-chosen-normal option").prop("selected", false);

    $(".regions_all").attr('style', 'display:none;');
    $(".provinces_all").attr('style', 'display:none;');
    $(".provinces_normal").attr('style', 'margin-bottom:15px;');
    $(".province-chosen-normal").chosen();
    $(".municipality_all").attr('style','display:none;');
    $(".municipality_normal").attr('style','display:none;');
    $(".municipality_choose").attr('style', 'display:none;');
    $(".municipality_hf_normal").attr('style','display:none;');
    $(".hf_container").attr('style','margin-bottom:15px;');
    $(".hf").html('');
    $(".hf_container").attr('style', '')
    $(".m").html('');
    $(".m_container").attr('style','display:none;');
    hf_array = [];
    m_array = [];
  }else if(comparison == '4'){
    //Province
    //Deselect Current
    $(".region-chosen-multiple").chosen('destroy');
    $(".province-chosen-normal").chosen('destroy');
    $(".province-chosen-multiple").chosen('destroy');
    $(".municipality-chosen-multiple").chosen('destroy');
    $(".municipality-chosen-normal").chosen('destroy');
    $(".municipality-chosen-choose").chosen('destroy');
    $(".municipality_hf-chosen-normal").chosen('destroy');
    $(".health_facility-chosen-normal").chosen('destroy');

    $(".region-chosen-multiple").prop('selected', false);
    $(".province-chosen-normal option").prop("selected", false);
    $(".province-chosen-multiple option").prop("selected", false);
    $(".municipality-chosen-multiple option").prop("selected", false);
    $(".municipality-chosen-normal option").prop("selected", false);
    $(".municipality-chosen-choose option").prop("selected", false);
    $(".municipality_hf-chosen-normal option").prop("selected", false);
    $(".health_facility-chosen-normal option").prop("selected", false);

    $(".regions_all").attr('style', 'margin-bottom:15px;');
    $(".region-chosen-multiple").chosen();
    $(".provinces_all").attr('style', 'display:none;');
    $(".provinces_normal").attr('style', 'display:none;');
    $(".municipality_all").attr('style','display:none;');
    $(".municipality_normal").attr('style','display:none;');
    $(".municipality_choose").attr('style','display:none;');
    $(".municipality_hf_normal").attr('style', 'display:none;');
    $(".health_facility").attr('style', 'display:none;');
    $(".hf").html('');
    $(".hf_container").attr('style', 'display:none;')
    $(".m").html('');
    $(".m_container").attr('style', 'display:none;');
    hf_array = [];
    m_array = [];
  }
});

$("form").submit(function(e){
  e.preventDefault();
  var level_of_comparison = $("#level_of_comparison").val();

  if(level_of_comparison == '1'){
    if(($("#program")[0].selectedIndex != '0') && ($("#month1")[0].selectedIndex != '0') && ($("#month2")[0].selectedIndex != '0') && ($("#year")[0].selectedIndex != '0')){
      this.submit();
    }
  }else if(level_of_comparison == '2'){
    if(($("#program")[0].selectedIndex != '0') && ($("#province_normal")[0].selectedIndex != '0') && ($("#month1")[0].selectedIndex != '0') && ($("#month2")[0].selectedIndex != '0') && ($("#year")[0].selectedIndex != '0')){
      this.submit();
    }
  }else if(level_of_comparison == '3'){
    if(($("#program")[0].selectedIndex != '0') && (hf_array.length > 0) && ($("#month1")[0].selectedIndex != '0') && ($("#month2")[0].selectedIndex != '0') && ($("#year")[0].selectedIndex != '0')){
      this.submit();
    }
  }else if(level_of_comparison == '4'){
    if(($("#program")[0].selectedIndex != '0') && ($("#month1")[0].selectedIndex != '0') && ($("#month2")[0].selectedIndex != '0') && ($("#year")[0].selectedIndex != '0')){
      this.submit();
    }
  }
}); 

$(".province-chosen-normal").change(function(){
  var province = $(this).val();
  var level_of_comparison = $("#level_of_comparison").val();
  
  if(level_of_comparison == '2'){
    $.ajax({
        url : "<?php echo url('get_municipalities2'); ?>" + '/' + province,
        type : "GET",
        success:function(data){
            $(".municipality-chosen-choose").chosen('destroy');
            $(".municipality-chosen-choose").html('');

            $(".municipality_choose").attr("style", '');
            $(".municipality-chosen-choose").html(data);
            $(".municipality-chosen-choose").chosen();
            //$(".municipality-chosen-multiple").html(data);
           // $(".municipality-chosen-multiple").chosen();
        },
        error:function(data){
            console.log(data);
        },
        datatype: "json"
    }); 
  }else if(level_of_comparison == '3'){
    /*$.ajax({
        url : "<?php //echo url('get_health_facilities_per_province'); ?>" + '/' + province,
        type : "GET",
        success:function(data){
            $(".health_facility-chosen-normal").chosen('destroy');
            $(".health_facility-chosen-normal").html('');
            $(".health_facility").attr('style', 'margin-bottom:15px;');
            var html = '<option selected disabled>Select health facility</option>';
            html += data;
            $(".health_facility-chosen-normal").html(html);
            $(".health_facility-chosen-normal").chosen();
        },
        error:function(data){
            console.log(data);
        },
        datatype: "json"
    }); */
    $.ajax({
        url : "<?php echo url('get_municipalities2'); ?>" + '/' + province,
        type : "GET",
        success:function(data){
            $(".municipality_hf-chosen-normal").chosen('destroy');
            $(".municipality_hf-chosen-normal").html('');

            $(".municipality_hf_normal").attr("style", '');
            $(".municipality_hf-chosen-normal").html(data);
            $(".municipality_hf-chosen-normal").chosen();
        },
        error:function(data){
            console.log(data);
        },
        datatype: "json"
    }); 
  }
  
});

$(".municipality_hf-chosen-normal").change(function(){
  var city = $(".municipality_hf-chosen-normal option:selected").attr('data-code');
  $.ajax({
        url : "<?php echo url('get_health_facilities'); ?>" + '/' + city,
        type : "GET",
        success:function(data){
            $(".health_facility-chosen-normal").chosen('destroy');
            $(".health_facility-chosen-normal").html('');
            $(".health_facility").attr('style', 'margin-top:10px;margin-bottom:15px;');
            var html = '<option selected disabled>Select health facility</option>';
            html += data;
            $(".health_facility-chosen-normal").html(html);
            $(".health_facility-chosen-normal").chosen();
        },
        error:function(data){
            console.log(data);
        },
        datatype: "json"
    });
});

$("#health_facility").change(function(){
  if(hf_array.indexOf($(this).val()) != -1){
    alert('Health facility is already selected!');
  }else{
    hf_array.push($(this).val());
    $(".hf").append("<li><input type='hidden' name='health_facilities[]' style='border:0' value='" + $(this).val() + "' />"+$("#health_facility option:selected").text()+"<button type='button' class='close' data-val='"+$(this).val()+"' aria-label='Close'><span aria-hidden='true'>&times;</span></button></li>");
  }
});

$(".municipality-chosen-choose").change(function(){
  console.log($(this).text());
  if(m_array.indexOf($(this).val()) != -1){
    alert('Municipality is already selected!');
  }else{
    m_array.push($(this).val());
    $(".m").append("<li><input type='hidden' name='municipalities[]' style='border:0' value='" + $(this).val() + "' />"+$(".municipality-chosen-choose option:selected").text()+"<button type='button' class='close' data-val='"+$(this).val()+"' aria-label='Close'><span aria-hidden='true'>&times;</span></button></li>");
  }
});

$(".hf").on('click', '.close', function(){
  var val = $(this).data('val');
  val = val.toString();
  $(this).parent().remove();
  delete hf_array[hf_array.indexOf(val)];
  var new_hf_array = [];

  for(var i = 0;i < hf_array.length;i++){
    if(hf_array[i] != undefined){
      new_hf_array.push(hf_array[i]);
    }
  }

  hf_array = [];
  hf_array = new_hf_array;
}); 

$(".m").on('click', '.close', function(){
  var val = $(this).data('val');
  val = val.toString();
  $(this).parent().remove();
  delete m_array[m_array.indexOf(val)];
  var new_m_array = [];

  for(var i = 0;i < m_array.length;i++){
    if(m_array[i] != undefined){
      new_m_array.push(m_array[i]);
    }
  }

  m_array = [];
  m_array = new_m_array;
}); 
</script>
   

