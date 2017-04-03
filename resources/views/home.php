<?php echo view('templates.header'); ?>
<?php echo view('templates.sidebar'); ?>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12 icons">
                      <h2><i class="fa fa-home"></i> Home</h2>   
                    </div>
                </div>              
                <hr style="border:10px solid #29e5b7;"/>
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Carousel -->
                        <div id="myCarousel" class="carousel slide" data-ride="carousel" style="height:400px;">
                          <!-- Indicators -->
                          <ol class="carousel-indicators">
                            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                            <li data-target="#myCarousel" data-slide-to="1"></li>
                            <li data-target="#myCarousel" data-slide-to="2"></li>
                            <li data-target="#myCarousel" data-slide-to="3"></li>
                          </ol>

                          <!-- Wrapper for slides -->
                          <div class="carousel-inner" role="listbox">

                            <div class="item active">
                              <img src="<?php echo asset('public_html/imgs/2.png'); ?>" style="height:435px;">
                            </div>
                            <div class="item">
                              <img src="<?php echo asset('public_html/imgs/4.png'); ?>" style="height:435px;">
                            </div>
                            <div class="item">
                              <img src="<?php echo asset('public_html/imgs/6.png'); ?>" style="height:435px;">
                            </div>
                            <div class="item">
                              <img src="<?php echo asset('public_html/imgs/8.png'); ?>" style="height:435px;">
                            </div>
                          </div>

                          <!-- Left and right controls -->
                          <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                          </a>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                  <form action="<?php echo url('home'); ?>" method="POST">
                  <div class="col-sm-5">
                    <select name="month" id="month" class="form-control">
                      <?php $selected = ''; ?>
                      <?php if(isset($month) && !empty($month)) : ?>
                          <?php $selected = $month; ?>
                      <?php endif; ?>
                      
                      <option value="01" <?php echo ($selected->id == '1') ? 'selected' : null; ?>>January</option>
                      <option value="02" <?php echo ($selected->id == '2') ? 'selected' : null; ?>>February</option>
                      <option value="03" <?php echo ($selected->id == '3') ? 'selected' : null; ?>>March</option>
                      <option value="04" <?php echo ($selected->id == '4') ? 'selected' : null; ?>>April</option>
                      <option value="05" <?php echo ($selected->id == '5') ? 'selected' : null; ?>>May</option>
                      <option value="06" <?php echo ($selected->id == '6') ? 'selected' : null; ?>>June</option>
                      <option value="07" <?php echo ($selected->id == '7') ? 'selected' : null; ?>>July</option>
                      <option value="08" <?php echo ($selected->id == '8') ? 'selected' : null; ?>>August</option>
                      <option value="09" <?php echo ($selected->id == '9') ? 'selected' : null; ?>>September</option>
                      <option value="10" <?php echo ($selected->id == '10') ? 'selected' : null; ?>>October</option>
                      <option value="11" <?php echo ($selected->id == '11') ? 'selected' : null; ?>>November</option>
                      <option value="12" <?php echo ($selected->id == '12') ? 'selected' : null; ?>>December</option>
                    </select>
                  </div>
                  <div class="col-sm-5">
                    <select name="year" id="year" class="form-control">
                      <?php $selected = ''; ?>
                      <?php if(isset($year) && !empty($year)) : ?>
                          <?php $selected = $year; ?>
                      <?php endif; ?>
                      <?php foreach($years as $year) : ?>
                        <?php $selected = ''; ?>
                        <option value="<?php echo $year->year; ?>" <?php echo $selected; ?>><?php echo $year->year; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                  <div class="col-sm-2">
                    <input type="hidden" name="_method" value="POST" />
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>" />
                    <input type="submit" value="Submit" class="btn btn-primary" />
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="panel panel-default">
                      <div class="panel-heading" style="background:#00bcd4;color:white;">
                        <h3 class="panel-title">Health Facility with the most FIC</h3>
                        <h5>(<?php echo $month->name . ' ' .  $y ; ?>)</h5>
                      </div>
                      <div class="panel-body">
                        <?php if(sizeof($FIC) > 0) : ?>
                          <ul style="list-style-type:none;">
                          <?php $counter = 0; ?>
                          <?php foreach($FIC as $key => $f) : ?>
                              <?php if($f->total > 0) : ?>
                                <li><?php echo ($counter + 1) . '. ';?> <span style="color:blue;"><?php echo number_format($f->total,2) . "%"; ?></span> <?php echo $f->facility_name; ?></li>
                                <?php ++$counter; ?>
                              <?php endif; ?>
                          <?php endforeach; ?>
                          </ul>
                        <?php else : ?>
                          <h4>No data available for this month and year.</h4>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="panel panel-default">
                      <div class="panel-heading" style="background:#00bcd4;color:white;">
                        <h3 class="panel-title">Health Facility with the most 4ANC</h3>
                        <h5>(<?php echo $month->name . ' ' .  $y ; ?>)</h5>
                      </div>
                      <div class="panel-body">
                        <?php if(sizeof($PC1) > 0) : ?>
                            <ul style="list-style-type:none;">
                            <?php $counter = 0; ?>
                            <?php foreach($PC1 as $key => $p) : ?>
                                <?php if($p->total > 0) : ?>
                                <li><?php echo ($counter + 1) . '. ';?> <span style="color:blue;"><?php echo number_format($p->total,2) . "%"; ?></span> <?php echo $p->facility_name; ?></li>
                                  <?php ++$counter; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            </ul>
                        <?php else : ?>
                            <h4>No data available for this month and year.</h4>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="panel panel-default">
                      <div class="panel-heading" style="background:#009688;color:white;">
                        <h3 class="panel-title">Health Facility with the most CIC</h3>
                        <h5>(<?php echo $month->name . ' ' .  $y ; ?>)</h5>
                      </div>
                      <div class="panel-body">
                        <?php if(sizeof($CIC) > 0) : ?>
                          <ul style="list-style-type:none;">
                          <?php $counter = 0; ?>
                          <?php foreach($CIC as $key => $c) : ?>
                              <?php if($c->total > 0) : ?>
                              <li><?php echo ($counter + 1) . '. ';?> <span style="color:blue;"><?php echo number_format($c->total,2) . "%"; ?></span> <?php echo $c->facility_name; ?></li>
                                <?php ++$counter; ?>
                              <?php endif; ?>
                          <?php endforeach; ?>
                          </ul>
                        <?php else : ?>
                          <h4>No data available for this month and year.</h4>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="panel panel-default">
                      <div class="panel-heading" style="background:#009688;color:white;">
                        <h3 class="panel-title">Health Facility with the most Exclusively Breastfed children</h3>
                        <h5>(<?php echo $month->name . ' ' .  $y ; ?>)</h5>
                      </div>
                      <div class="panel-body">
                        <?php if(sizeof($INF) > 0) : ?>
                            <ul style="list-style-type:none;">
                            <?php $counter = 0; ?>
                            <?php foreach($INF as $key => $i) : ?>
                                <?php if($i->total > 0) : ?>
                                  <li><?php echo ($counter + 1) . '. ';?> <span style="color:blue;"><?php echo number_format($i->total,2) . "%"; ?></span> <?php echo $i->facility_name; ?></li>
                                  <?php ++$counter; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            </ul>
                        <?php else : ?>
                            <h4>No data available for this month and year.</h4>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="panel panel-default">
                      <div class="panel-heading" style="background:#00bcd4;color:white;">
                        <h3 class="panel-title">Health Facility with the most Dengue</h3>
                        <h5>(<?php echo $month->name . ' ' .  $y ; ?>)</h5>
                      </div>
                      <div class="panel-body">
                        <?php if(sizeof($DENGUE) > 0) : ?>
                          <ul style="list-style-type:none;">
                          <?php $counter = 0; ?>
                          <?php foreach($DENGUE as $key => $d) : ?>
                              <?php if($d->total > 0) : ?>
                                <li><?php echo ($counter + 1) . '. ';?> <span style="color:blue;"><?php echo intval($d->total); ?></span> <?php echo $d->facility_name; ?></li>
                                <?php ++$counter; ?>
                              <?php endif; ?>
                          <?php endforeach; ?>
                          </ul>
                        <?php else : ?>
                          <h4>No data available for this month and year.</h4>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="panel panel-default">
                      <div class="panel-heading" style="background:#00bcd4;color:white;">
                        <h3 class="panel-title">Health Facility with the most Acute Upper Respiratory Infection</h3>
                        <h5>(<?php echo $month->name . ' ' .  $y ; ?>)</h5>
                      </div>
                      <div class="panel-body">
                        <?php if(sizeof($AURI) > 0) : ?>
                            <ul style="list-style-type:none;">
                            <?php $counter = 0; ?>
                            <?php foreach($AURI as $key => $a) : ?>
                                <?php if($a->total > 0) : ?>
                                  <li><?php echo ($counter + 1) . '. ';?> <span style="color:blue;"><?php echo intval($a->total); ?></span> <?php echo $a->facility_name; ?></li>
                                  <?php ++$counter; ?>
                                <?php endif; ?>
                            <?php endforeach; ?>
                            </ul>
                        <?php else : ?>
                            <h4>No data available for this month and year.</h4>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="panel panel-default">
                      <div class="panel-heading" style="background:#009688;color:white;">
                        <h3 class="panel-title">Health Facility with the most Diarrhea</h3>
                        <h5>(<?php echo $month->name . ' ' .  $y ; ?>)</h5>
                      </div>
                      <div class="panel-body">
                        <?php if(sizeof($DIARRHEA) > 0) : ?>
                          <ul style="list-style-type:none;">
                          <?php $counter = 0; ?>
                          <?php foreach($DIARRHEA as $key => $d) : ?>
                              <?php if($d->total > 0) : ?>
                              <li><?php echo ($counter + 1) . '. ';?> <span style="color:blue;"><?php echo intval($d->total); ?></span> <?php echo $d->facility_name; ?></li>
                                <?php ++$counter; ?>
                              <?php endif; ?>
                          <?php endforeach; ?>
                          </ul>
                        <?php else : ?>
                          <h4>No data available for this month and year.</h4>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
<?php echo view('templates.footer'); ?>

    
   

