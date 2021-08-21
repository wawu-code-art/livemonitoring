<div class="container">

<!-- start canvasJS chart--> 
<?php 
//  $A=[];
//  foreach ($arraykeydate as $akd) :
//  {
//          $A[]= ["y" => $totaltire[$akd],"label" => $akd];
//  }            
//  endforeach;
// //  var_dump ($A);

// $dataPoints = $A;
?>


        <!-- <!DOCTYPE HTML>
        <html>
        <head>  
        <script>
        window.onload = function () {
        
        var chart = new CanvasJS.Chart("chartContainer", {
        animationEnabled: true,
        //theme: "light2",
        title:{
        text: "Total Lost Test Tire"
        },
        axisX:{
        interval:1,
        intervalType: "day",
        crosshair: {
        enabled: true,
        snapToDataPoint: true
        }
        },
        axisY:{
        title: "Quantity",
        // interval:100,
        intervalType: "day",
        includeZero: true,
        crosshair: {
        enabled: true,
        snapToDataPoint: true
        }
        },
        toolTip:{
        enabled: false
        },
        data: [{
        type: "area",
        dataPoints: <?php // echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
        }]
        });
        chart.render();
        
        }
        </script>
        </head>
        <body>
        <div id="chartContainer" style="height: 370px; width: 100%;"></div> -->
        <!-- <script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> -->
        <!-- </body>
        </html>  -->
    <!-- end canvasJS chart -->


<!-- start trial chart -->

<?php
    $parameter1=[];
    $parameter2=[];
        foreach ($arraykeydate as $akd) :
        {
                $parameter1[]= $akd;
                $parameter2[]= $totaltire[$akd];
        }            
        endforeach;        
	// var_dump($parameter1);
	// var_dump($parameter2);
?>

<div class="mt-3 mb-3" id="mychart" style="width: 50%;" >
<canvas id="myChart"></canvas>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'bar',
        // The data for our dataset
        data: {
            labels: <?= json_encode($parameter1,JSON_NUMERIC_CHECK) ?>,
            datasets: [{
                label:'Total Lost Test Tire',
                backgroundColor: 'rgba(56, 86, 255, 0.87)',
                borderColor: 'rgb(255, 99, 132)',
                data: <?= json_encode($parameter2,JSON_NUMERIC_CHECK) ?>
            }]
        },
        // Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    }
                }]
            }
        }
    });
</script>
</div>

<!-- end trial chart -->


    <div class="row mt-3">
        <div class="col-md-3">
            <form action="" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Cari barcode.." name="keyword">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="submit">Cari</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>No.</th>
                <th>Barcode</th>
                <th></th>
                <th>Building</th>
                <th>GIP</th>
                <th>Curing</th>
                <th>Trimming</th>
                <th>Laborat</th>
                <th>Test Tire Warehouse</th>
                <th>Scrap Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php if ($this->input->post('keyword')){
                    $no = 1;
                } else {$no=$this->uri->segment('3')+1;
                }?>
                <?php foreach ($historymonitoringprocess as $hmp) : ?>
                
                <td><?= $no++;?></td>
                <td class="<?php if ($hmp['reg_date'] == '' ){
                    if ($hmp['jdge_date_in'] == ''){
                        if ($hmp['probcode'] !== 'SCRAP'){
                            echo 'barcode';
                        } else {
                            echo '';
                        }
                    } else {
                        echo '';
                    }} 
                    else {
                        echo '';
                    } ?>"><?= $hmp['bc_entried'];?></td>
                <style>
                .barcode {
                    background-color:red;
                }
                </style>
                <td>
                <a href="<?= base_url(); ?>HistoryMonitoringProcess/detail/<?= $hmp['bc_entried']; ?>"
                class="badge badge-primary float-right">detail</a>
                </td>
                <td><?= str_replace('/','-',$hmp['bld_date']);?></td>
                <td><?= $hmp['eventdate'];?></td>
                <td><?= str_replace('/','-',$hmp['cur_in']);?></td>
                <td><?= str_replace('/','-',$hmp['jdge_date']);?></td>
                <td><?= str_replace('/','-',$hmp['reg_date']);?></td>
                <td><?= str_replace('/','-',$hmp['jdge_date_in']);?></td>
                <td><?php if ($hmp['probcode'] === 'SCRAP') {
                    echo 'scrap';
                    } else {
                    echo '';
                    }?>
                </td>
            </tr>
            <?php endforeach; ?>
            <div class="row ml-2 mt-3 mb-1">
            <?php if($this->input->post('keyword')) {
                echo $halaman = ''; 
            } else {echo $halaman = $this->pagination->create_links();
            }?>
            </div>
        </tbody>
    </table>
    <div class="row ml-2 mt-1">
    <?php echo $halaman;?>
    </div>
    <div class="text-right">
        <a href="<?= base_url(); ?>HistoryMonitoringProcess/export" class="<?php if ($this->input->post('keyword')){
                                                                                echo '';
                                                                            } else {
                                                                                echo 'btn btn-success btn-sm';
                                                                            }?>"><?php if ($this->input->post('keyword')){
                                                                                    echo '';
                                                                                } else {
                                                                                    echo 'Export ke Excel';
                                                                                }?></a>
    </div>

</div>