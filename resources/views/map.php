<?php echo view('templates.header'); ?>
<?php echo view('templates.sidebar'); ?>
<style>
  #map{
    height:500px;
    width:1000px;

  }
</style>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12 icons">
                      <h2><i class="fa fa-map-marker"></i> Map</h2>   
                    </div>
                </div>              
                <hr style="border:10px solid #29e5b7;"/>
                <div class="row">  
                  <div class="col-sm-12 col-md-12 col-lg-12">
                      <div id="map"></div>
                      <br />
                      <form action="<?php echo url('map'); ?>" method="POST">
                        <?php if(isset($error) && !empty($error)) : ?>
                          <div class="row">
                            <div class="col-sm-12 text-center">
                              <p style='color:red;font-size:1.3em;font-weight:bold'><?php echo $error; ?></p>
                            </div>
                          </div>
                        <?php endif; ?>
                        <div class="row">
                          <div class="col-sm-4" id="programs">
                            <select name="case" id="case" class="form-control">
                              <optgroup label="Morbidity Disease">
                                <?php $selected = ''; ?>
                                <?php if(isset($morbidity_type) && !empty($morbidity_type)) : ?>
                                  <?php $selected = $morbidity_type; ?>
                                <?php endif; ?>
                                <option value="morbidity_A90" <?php echo ($selected == 'morbidity_A90') ? 'selected' : null; ?>>Dengue</option>
                                <option value="morbidity_J06" <?php echo ($selected == 'morbidity_J06') ? 'selected' : null; ?>>Acute Upper Respiratory Infection</option>
                                <option value="morbidity_A09" <?php echo ($selected == 'morbidity_A09') ? 'selected' : null; ?>>Diarrhea</option>
                              </optgroup>
                              <optgroup label="Child Care">
                                <?php $selected = ''; ?>
                                <?php if(isset($child_care_type) && !empty($child_care_type)) : ?>
                                  <?php $selected = $child_care_type; ?>
                                <?php endif; ?>
                                <option value="childcare_FIC-M_FIC-F" <?php echo ($selected == 'childcare_FIC-M_FIC-F') ? 'selected' : null; ?>>Fully Immunized Child</option>
                                <option value="childcare_CIC-M_CIC-F" <?php echo ($selected == 'childcare_CIC-M_CIC-F') ? 'selected' : null; ?>>Completely Immunized Child</option>
                                <option value="childcare_INF-BREAST-M_INF-BREAST-F"<?php echo ($selected == 'childcare_INF-BREAST-M_INF-BREAST-F') ? 'selected' : null; ?>>Exclusively Breastfed</option>
                              </optgroup>
                              <optgroup label="WAH e-Reporting">
                                <?php $selected = ''; ?>
                                <?php if(isset($wah_type) && !empty($wah_type)) : ?>
                                    <?php $selected = $wah_type; ?>
                                <?php endif; ?>
                                <option value="wah_completeness" <?php echo ($selected == 'wah_completeness') ? 'selected' : null; ?>>Completeness of Report</option>
                                <option value="wah_timeliness" <?php echo ($selected == 'wah_timeliness') ? 'selected' : null; ?>>Timeliness of Report</option>
                                <option value="wah_level" <?php echo ($selected == 'wah_level') ? 'selected' : null; ?>>Facility Levels</option>
                              </optgroup>
                              <script>
                                $(document).ready(function(){
                                  var selected = '<?php echo $selected; ?>';
                                  if(selected == 'wah_level'){
                                    $("#m_month").hide();
                                    $("#m_year").hide();
                                    $("#m_month").removeClass("col-sm-6");
                                    $("#m_year").removeClass("col-sm-6");
                                    $("#programs").removeClass('col-sm-4');
                                    $("#programs").addClass('col-sm-10');
                                  }
                                });
                              </script>
                              <optgroup label="Maternal Care">
                                <?php $selected = ''; ?>
                                <?php if(isset($maternal_care_type) && !empty($maternal_care_type)) : ?>
                                    <?php $selected = $maternal_care_type; ?>
                                <?php endif; ?>
                                <option value="mc_PC1" <?php echo ($selected == 'mc_PC1') ? 'selected' : null; ?>>Pregnant women with 4 or more prenatal visits (4ANC)</option>
                              </optgroup>
                            </select>
                          </div>
                          <div class="col-sm-3" id="m_month">
                            <select name="month" id="month" class="form-control">
                              <?php $selected = ''; ?>
                              <?php if(isset($month) && !empty($month)) : ?>
                                  <?php $selected = $month; ?>
                              <?php endif; ?>

                              <option value="01" <?php echo ($selected == '01') ? 'selected' : null; ?>>January</option>
                              <option value="02" <?php echo ($selected == '02') ? 'selected' : null; ?>>February</option>
                              <option value="03" <?php echo ($selected == '03') ? 'selected' : null; ?>>March</option>
                              <option value="04" <?php echo ($selected == '04') ? 'selected' : null; ?>>April</option>
                              <option value="05" <?php echo ($selected == '05') ? 'selected' : null; ?>>May</option>
                              <option value="06" <?php echo ($selected == '06') ? 'selected' : null; ?>>June</option>
                              <option value="07" <?php echo ($selected == '07') ? 'selected' : null; ?>>July</option>
                              <option value="08" <?php echo ($selected == '08') ? 'selected' : null; ?>>August</option>
                              <option value="09" <?php echo ($selected == '09') ? 'selected' : null; ?>>September</option>
                              <option value="10" <?php echo ($selected == '10') ? 'selected' : null; ?>>October</option>
                              <option value="11" <?php echo ($selected == '11') ? 'selected' : null; ?>>November</option>
                              <option value="12" <?php echo ($selected == '12') ? 'selected' : null; ?>>December</option>
                            </select>
                          </div>
                          <div class="col-sm-3" id="m_year">
                            <select name="year" id="year" class="form-control">
                              <?php foreach($years as $year) : ?>
                                <?php $selected = ''; ?>
                                <?php if(isset($d_year) && !empty($d_year)) : ?>
                                    <?php if($d_year == $year->year) : ?>
                                      <?php $selected = 'selected'; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <option value="<?php echo $year->year; ?>" <?php echo $selected; ?>><?php echo $year->year; ?></option>
                              <?php endforeach; ?>
                            </select>
                          </div>
                          <div class="col-sm-2">
                            <input type="hidden" name="_method" value="POST" />
                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
                            <button type="submit" class="btn btnuser-submit"><i class="glyphicon glyphicon-ok"></i> Submit</button>
                          </div>
                        </div>
                      </form>
                      <div id="legend" style="background-color:white;padding:10px;width:200px;height:220px;margin-right:10px;">
                        <?php echo isset($legend) ? $legend : null; ?>
                      </div>
                     <script>
                      var map;
                      function initMap() {
                        var myLatLng = {lat: 12.879721, lng: 121.774017};

                        var map = new google.maps.Map(document.getElementById('map'), {
                          zoom: 6,
                          center: myLatLng
                        });

                        map.controls[google.maps.ControlPosition.RIGHT_BOTTOM].push(document.getElementById('legend'));

                        <?php if(isset($result) && !empty($result)) : ?>
                          <?php foreach($result as $HFHUDCODE => $res) : ?>
                              var lng = parseFloat('<?php echo $details[$HFHUDCODE]['longitude']; ?>');
                              var lat = parseFloat('<?php echo $details[$HFHUDCODE]['latitude']; ?>');

                              var myLatLng = {lat: lat, lng: lng};
                              var image ={
                                  url: '<?php echo asset("public_html/imgs"); ?>' + '/' + '<?php echo $res . ".png"; ?>',
                                  scaledSize: new google.maps.Size(34, 54)
                              }
                              marker = new google.maps.Marker({
                                position: myLatLng,
                                map: map,
                                animation: google.maps.Animation.DROP,
                                icon: image
                              });

                              var infowindow = new google.maps.InfoWindow({
                                pixelOffset: new google.maps.Size(-2, 21)
                              });

                              google.maps.event.addListener(marker, 'click', (function(marker) {
                                return function() {
                                  infowindow.setContent('<?php echo $details[$HFHUDCODE]['label']; ?>');
                                  infowindow.open(map, marker);
                                  map.setCenter(marker.getPosition());
                                }
                              })(marker));
                          <?php endforeach; ?>
                        <?php endif; ?>

                        <?php if(isset($hf) && !empty($hf)) : ?>
                          <?php foreach($hf as $value) : ?>
                              var lng = parseFloat('<?php echo $value->longitude; ?>');
                              var lat = parseFloat('<?php echo $value->latitude; ?>');

                              var myLatLng = {lat: lat, lng: lng};
                              var image ={
                                  url: '<?php echo asset("public_html/imgs"); ?>' + '/blue.png',
                                  scaledSize: new google.maps.Size(34, 54)
                              }
                              marker = new google.maps.Marker({
                                position: myLatLng,
                                map: map,
                                animation: google.maps.Animation.DROP,
                                icon: image
                              });

                              var infowindow = new google.maps.InfoWindow({
                                pixelOffset: new google.maps.Size(-2, 21)
                              });

                              google.maps.event.addListener(marker, 'click', (function(marker) {
                                return function() {
                                  infowindow.setContent('<?php echo $value->facility_name; ?>');
                                  infowindow.open(map, marker);
                                  map.setCenter(marker.getPosition());
                                }
                              })(marker));
                          <?php endforeach; ?>
                        <?php endif; ?>
                      }

                    </script>
                    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAsVpEBezxbT1akVJgSXNFiHyykL3LAkPU&region=PH&callback=initMap"
                    async defer></script>
                  </div>
                </div>
            </div>
        </div>
<?php echo view('templates.footer'); ?>
<script>
$("#programs").change(function(){
  var program = $("#programs option:selected").val();

  if(program == 'wah_level'){
    $("#m_month").attr('style', 'display:none;');
    $("#m_year").attr('style', 'display:none;');
    $("#m_month").removeClass("col-sm-3");
    $("#m_year").removeClass("col-sm-3");
    $("#programs").removeClass('col-sm-4');
    $("#programs").addClass('col-sm-10');
  }else{
    $("#m_month").show();
    $("#m_year").show();
    $("#m_month").addClass("col-sm-3");
    $("#m_year").addClass('col-sm-3');
    $("#programs").addClass('col-sm-4');
    $("#programs").removeClass('col-sm-10');
  }
});
</script>
    
   

