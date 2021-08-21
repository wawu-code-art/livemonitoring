<div class="container">

<!-- start -->
    <!-- <?php
    //  	$dataPoints = [ 
    //     		["label"=>"Free Space", "y"=>((1130-$total_tires)/1130)*100],
    //     		["label"=>"Used Space", "y"=>(($total_tires)/1130)*100]
    //      ];
    // // var_dump($dataPoints);
	// $week1 = [];
	// $week2 = [];
	// $week3 = [];
	// $week4 = [];
	// $weekother = [];
    // foreach ($alllivemonitoringstock as $alms) :
    //     {
    //     $scanin = str_replace('/','-',$alms['jdge_date_in']);
    //     $ageoftire = round((time()-strtotime($scanin))/86400);
    //         if($ageoftire <= 7){
    //         $week1[] = $alms['jdge_date_in'];
    //         } else if ($ageoftire > 7 && $ageoftire <= 14){
    //         $week2[] = $alms['jdge_date_in'];
    //         } else if ($ageoftire > 14 && $ageoftire <= 21){
    //         $week3[] = $alms['jdge_date_in'];
    //         } else if ($ageoftire > 21 && $ageoftire <= 28){
    //         $week4[] = $alms['jdge_date_in'];
    //         } else {
    //         $weekother[] = $alms['jdge_date_in'];
    //         }
    //     }
    // endforeach;
    // // var_dump(count($week1));

    // $dataPoints1 = [ 
    //     ["label"=>"1 week", "y"=>count($week1)],
    //     ["label"=>"2 weeks", "y"=>count($week2)],
    //     ["label"=>"3 weeks", "y"=>count($week3)],
    //     ["label"=>"4 weeks", "y"=>count($week4)],
    //     ["label"=>"more than 4 weeks", "y"=>count($weekother)]
    // ];
    // var_dump($dataPoints1);
    ?>
    
	<!DOCTYPE HTML>
	<html>
	<head>
	<script>
	window.onload = function() {

    var chart = new CanvasJS.Chart("chartContainer", {
		animationEnabled: true,
		title: {
			text: "Storage"
		},
		subtitles: [{
			text: "Test Tire Warehouse"
		}],
		data: [{
			type: "pie",
			yValueFormatString: "#,##0.00\"%\"",
			indexLabel: "{label},{y}",
			dataPoints: <?php // echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
		}]

	});
	chart.render();

    var chart1 = new CanvasJS.Chart("chartContainer1", {
		animationEnabled: true,
		title: {
			text: "Age of Tire"
		},
		subtitles: [{
			text: "Test Tire"
		}],
		data: [{
			type: "pie",
			// yValueFormatString: "#,##0.00\"%\"",
			indexLabel: "{label},{y}",
			dataPoints: <?php // echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
		}]

	});
	chart1.render();

	}
	</script>
	</head>
	<body>
    <div id="chartContainer" style="height: 370px; width: 40%;" ></div>
	<div id="chartContainer1" style="height: 370px; width: 40%;"></div>
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> -->
	<!-- </body>
	</html> -->
<!-- end -->

<!-- start trial chart -->

<?php
    $piechartjs = [ 
        ((1130-$total_tires)/1130)*100,
        (($total_tires)/1130)*100
    ];

    $week1 = [];
    $week2 = [];
    $week3 = [];
    $week4 = [];
    $weekother = [];

    foreach ($alllivemonitoringstock as $alms) :
        {
        $scanin = str_replace('/','-',$alms['jdge_date_in']);
        $ageoftire = round((time()-strtotime($scanin))/86400);
            if($ageoftire <= 7){
            $week1[] = $alms['jdge_date_in'];
            } else if ($ageoftire > 7 && $ageoftire <= 14){
            $week2[] = $alms['jdge_date_in'];
            } else if ($ageoftire > 14 && $ageoftire <= 21){
            $week3[] = $alms['jdge_date_in'];
            } else if ($ageoftire > 21 && $ageoftire <= 28){
            $week4[] = $alms['jdge_date_in'];
            } else {
            $weekother[] = $alms['jdge_date_in'];
            }
        }
    endforeach;	
    
    $piechartjs2 = [ 
        count($week1),
        count($week2),
        count($week3),
        count($week4),
        count($weekother)
    ];
    // var_dump($piechartjs);
    // var_dump($piechartjs2);
?>

<div class="mt-3 mb-3" id="mychart" style="width: 50%;" >
<canvas id="myChart"></canvas>
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'pie',
        // The data for our dataset
        data: {
            labels: ['Free Space','Used Space'],
            datasets: [{
                // label:'Current Process',
                backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)','rgb(175, 238, 239)','rgb(12, 28, 239)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: <?= json_encode($piechartjs,JSON_NUMERIC_CHECK) ?>
            }]
        },
        // Configuration options go here
        options: {
            scales: {
                yAxes: false,
                xAxes: false,
            }
        }
    });
</script>
</div>

<div class="mt-3 mb-3" id="mychart2" style="width: 50%;" >
<canvas id="myChart2"></canvas>
<script>
    var ctx = document.getElementById('myChart2').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'pie',
        // The data for our dataset
        data: {
            labels: ['1 week','2 weeks','3 weeks','4 weeks','more than 4 weeks'],
            datasets: [{
                // label:'Current Process',
                backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)','rgb(175, 238, 239)','rgb(90, 28, 209)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: <?= json_encode($piechartjs2,JSON_NUMERIC_CHECK) ?>
            }]
        },
        // Configuration options go here
        options: {
            scales: {
                yAxes: false,
                xAxes: false,
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
                <th>Area Code</th>
                <th>Scan In</th>
                <th>Age of Tire</th>
            </tr>
        </thead>
        <tbody>
            <tr>    
            <?php if ($this->input->post('keyword')){
                    $no = 1;
                } else {$no=$this->uri->segment('3')+1;
                }?>
                <?php foreach ($livemonitoringstock as $lms) : ?>
                    <?php 
                    $scanin1 = str_replace('/','-',$lms['jdge_date_in']);
                    $ageoftire1 = round((time()-strtotime($scanin1))/(24*60*60));
                    ?>
                    <td><?= $no++;?></td>
                    <td class="<?php if ($ageoftire1 > 30){
                        echo 'barcode1';
                    } else {
                        echo '';
                    } ?>"><?= $lms['bc_entried'];?></td>
                    <td>
                    <a href="<?= base_url(); ?>LiveMonitoringStock/detail/<?= $lms['bc_entried']; ?>"
                        class="badge badge-primary float-right">detail</a>
                    </td>
                    <td><?= $lms['location'];?></td>
                    <td><?= $scanin1;?></td>
                    <td><?= $ageoftire1;?></td>
                    <style>
                    .barcode1 {
                        background-color:red;
                        }
                    </style>
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
        <a href="<?= base_url(); ?>LiveMonitoringStock/export" class="<?php if ($this->input->post('keyword')){
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