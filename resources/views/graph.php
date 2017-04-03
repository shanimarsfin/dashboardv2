<link rel="stylesheet" href="<?php echo asset('public_html/css/bootstrap.min.css'); ?>">
<script src="<?php echo asset('public_html/js/bootstrap.min.css'); ?>"></script>
<script src="<?php echo asset('public_html/js/amcharts/amcharts.js'); ?>"></script>
<script src="<?php echo asset('public_html/js/amcharts/serial.js'); ?>"></script>

<div class="row">
  <div class="col-sm-12">
    <center>
      <h2><?php echo $indicator->indicator_desc; ?></h2>
      <h4><?php echo $place; ?></h4>
    </center>
  </div>
</div>
<?php $m_list = array('1' => 'January',
                      '2' => 'February',
                      '3' => 'March',
                      '4' => 'April',
                      '5' => 'May',
                      '6' => 'June',
                      '7' => 'July',
                      '8' => 'August',
                      '9' => 'September',
                      '10' => 'October',
                      '11' => 'November',
                      '12' => 'December'); ?>

<?php $months = array(); ?>
<?php $start_month = $month1->id; ?>
<?php $end_month = $month2->id; ?>
<?php $months[0] = $start_month; ?>
<?php 
    while(($start_month + 1) <= $end_month){
      $start_month = $start_month + 1;
      $months[] = $start_month;
    }
?>

<div class="row">
    <div class="col-sm-12">
      <center>
        <div id="chartdiv" style="width: 900px; height: 400px;"></div>  
      </center>
    </div>
</div>

<script>
<?php $counter = 0; ?>
var colors_array = ["#000000", "#000033", "#000066", "#003333", "#003300", "#006600", "#009966", "#00ff99", "#330000", "#330033", "#330099", "#3300cc", "#333333", "#336633", "#339999", "#33cc99", "#660033", "#666633", "#666600", "#669900", "#669999", "#6699cc", "#6699ff", "#66cc00", "#990000", "#990033", "#cc6600", "#cc3300", "#cc6633", "#cc9933", "#cccc00", "#ccff99", "#ccffcc", "#ff0000", "#ff3300", "#ff6600", "#ff9900", "#ffcc33", "#ffff00"];

var chart = AmCharts.makeChart("chartdiv", {
    "theme": "light",
    "type": "serial",
    "startDuration": 2,
    "dataProvider": [
    <?php foreach($months as $m) : ?>
      <?php if((sizeof($months) - 1) == $counter) : ?>
        {
            "month": "<?php echo $m_list[$m] . ' ' . $year; ?>",
            <?php if(isset($values[$counter]) && !empty($values[$counter])) : ?>
              "val": "<?php echo $values[$counter]; ?>",
            <?php else : ?>
              "val": "0",
            <?php endif; ?>
            "color": colors_array[<?php echo $counter; ?>]
        }
      <?php else : ?>
        {
            "month": "<?php echo $m_list[$m] . ' ' . $year; ?>",
            <?php if(isset($values[$counter]) && !empty($values[$counter])) : ?>
              "val": "<?php echo $values[$counter]; ?>",
            <?php else : ?>
              "val": "0",
            <?php endif; ?>
            "color": colors_array[<?php echo $counter; ?>]
        },
      <?php endif; ?>
      <?php ++$counter; ?>
    <?php endforeach; ?>
    ],
    "valueAxes": [{
        "position": "left",
        "axisAlpha":0,
        "gridAlpha":0         
    }],
    "graphs": [{
        "balloonText": "[[category]]: <b>[[value]]</b>",
        "colorField": "color",
        "fillAlphas": 0.85,
        "lineAlpha": 0.1,
        "type": "column",
        "topRadius":1,
        "valueField": "val"
        <?php if($counter == 1 || $counter == 2 || $counter == 3) : ?>
          , "fixedColumnWidth": 150
        <?php endif; ?>
    }],
    "depth3D": 40,
    "angle": 30,
    "chartCursor": {
        "categoryBalloonEnabled": false,
        "cursorAlpha": 0,
        "zoomable": false
    },    
    "categoryField": "month",
    "categoryAxis": {
        "gridPosition": "start",
        "axisAlpha":0,
        "gridAlpha":0
        
    },
    "export": {
      "enabled": true
     }

},0);
</script>