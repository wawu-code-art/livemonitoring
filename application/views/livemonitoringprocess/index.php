<div class="container">
    <?php
    // $A= [["Element", "Density", '{role: "style"}']];
    // foreach ($arraykeytire as $akt) :
    // {
    //         $A[]= [$akt,$totaltirebyitemcode[$akt],"blue"];
    //         $Q[]= [$akt];
    //         $R[]= [$totaltirebyitemcode[$akt]];
    // }            
    // endforeach;
    // var_dump($A);
	?>

<!-- start google chart -->

<!-- <script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable($A);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
            {
                calc: "stringify",
                sourceColumn: 1,
                type: "string",
                role: "annotation"
            },
            2
        ]);

        var options = {
            title: "Total Test Tire By Item Code",
            width: 600,
            height: 400,
            bar: {
                groupWidth: "95%"
            },
            legend: {
                position: "none"
            },
        };
        var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
        chart.draw(view, options);
    }
</script> -->
<!-- end google chart -->


<!-- start canvasJS chart -->
	<?php
     	// $dataPoints1 = [ 
        // 		["label"=>"Building", "y"=>($currentprocess['databuilding']-$currentprocess['datagip'])],
        // 		["label"=>"GIP", "y"=>($currentprocess['datagip']-$currentprocess['datacuring'])],
        // 		["label"=>"Curing", "y"=>($currentprocess['datacuring']-$currentprocess['datatrimming'])],
        // 		["label"=>"Trimming", "y"=>$currentprocess['datatrimming']]
        //  ];
	?>

	<?php	
    // $B=[];
    // foreach ($arraykeytire as $akt) :
    // {
    //         $B[]= ["y" => $totaltirebyitemcode[$akt],"label" =>$akt];
    // }            
    // endforeach;
	// $dataPoints = $B;
	// var_dump($B);
	?>
    
	<!-- <!DOCTYPE HTML>
	<html>
	<head>
	<script>
	window.onload = function() {

    var chart1 = new CanvasJS.Chart("chartContainer1", {
		animationEnabled: true,
		title: {
			text: "Current Process"
		},
		subtitles: [{
			text: "Test Tire"
		}],
		data: [{
			type: "pie",
			// yValueFormatString: "#,##0.00\"%\"",
			indexLabel: "{label},{y}",
			dataPoints: <?php //echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
		}]

	});
	chart1.render();

var chart = new CanvasJS.Chart("chartContainer", {
		animationEnabled: true,
		title:{
			text: "Total Test Tire By Item Code"
		},
		axisY: {
			title: "Quantity",
			includeZero: true,
			prefix: "",
			suffix:  "  pcs"
		},
        axisX: {
			title: "Item Code",
            interval: 1,
            // intervaltype: "month",
		},
		data: [{
			// type: "column",
			// type: "stackedBar",
			type: "bar",
			yValueFormatString: "",
			indexLabel: "",
			indexLabelPlacement: "outside",
			indexLabelFontWeight: "bolder",
			indexLabelFontColor: "black",
			color: "blue",
			dataPoints: <?php //echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
		}]
	});
	chart.render();


	}
	</script>
	</head>
	<body>
    <div id="chartContainer1" style="height: 370px; width: 40%;" ></div>
	<div id="chartContainer" style="height: 370px; width: 40%;"></div>
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script> -->
	<!-- </body> -->
	<!-- </html> -->

<!-- end canvasJS chart -->


<!-- start trial chart -->

<?php
    $piechartjs = [ 
            ($currentprocess['databuilding']-$currentprocess['datagip']),
            ($currentprocess['datagip']-$currentprocess['datacuring']),
            ($currentprocess['datacuring']-$currentprocess['datatrimming']),
            $currentprocess['datatrimming']
        ];
// var_dump (json_encode($piechartjs,JSON_NUMERIC_CHECK));

$parameter1=[];
$parameter2=[];
foreach ($arraykeytire as $akt) :
{
    $parameter1[]= $akt;
    $parameter2[]= $totaltirebyitemcode[$akt];
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
        type: 'pie',
        // The data for our dataset
        data: {
            labels: ['Building','GIP','Curing','Trimming'],
            datasets: [{
                // label:'Current Process',
                backgroundColor: ['rgb(255, 99, 132)', 'rgba(56, 86, 255, 0.87)', 'rgb(60, 179, 113)','rgb(175, 238, 239)'],
                borderColor: ['rgb(255, 99, 132)'],
                data: <?= json_encode($piechartjs,JSON_NUMERIC_CHECK) ?>
            }]
        },
        // Configuration options go here
        options: {
            scales: {
                yAxes: false,
                xAxes: false,
                // scales:{xAxes:[{type:"linear",position:"bottom",id:"x-axis-0"}],
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
        type: 'horizontalBar',
        // The data for our dataset
        data: {
            labels: <?= json_encode($parameter1,JSON_NUMERIC_CHECK) ?>,
            datasets: [{
                label:'Total Test Tire by Item Code',
                backgroundColor:'rgba(56, 86, 255, 0.87)',
                borderColor: ['rgb(255, 99, 132)'],
                data: <?= json_encode($parameter2,JSON_NUMERIC_CHECK) ?>
            }]
        },
        // Configuration options go here
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true
                    },
                    gridLines:false
                }],
                xAxes: [{
                    ticks: {
                        beginAtZero:true
                    },
                }],
            },
            // trial
            // scales:{
            //     xAxes:[{
            //         type:"category",
            //         categoryPercentage:.8,
            //         barPercentage:.9,
            //         offset:!0,
            //         gridLines:{offsetGridLines:!0}}]
            // end trial
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
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php if ($this->input->post('keyword')){
                    $no = 1;
                } else {$no=$this->uri->segment('3')+1;
                }?>
                <?php
                foreach ($livemonitoringprocess as $lmp) : 
                ?>
                <?php
                $ageoftire = round((time()-strtotime(substr($lmp['ydate_shift'],0,8)))/(24*60*60));
                ?>
                <td><?= $no++;?></td>
                <td class="<?php if ($ageoftire > 3 ){
                        echo 'barcode';
                    } else {
                        echo '';
                    } ?>"><?= $lmp['bc_entried'];?>
                </td>
                <style>
                .barcode {
                    background-color:red;
                }
                </style>
                <td>
                <a href="<?= base_url(); ?>LiveMonitoringProcess/detail/<?= $lmp['bc_entried']; ?>"
                class="badge badge-primary float-left">detail</a>
                </td>
                <td><?= str_replace('/','-',$lmp['bld_date']);?></td>
                <td><?= $lmp['eventdate'];?></td>
                <td><?= str_replace('/','-',$lmp['cur_in']);?></td>
                <td><?= str_replace('/','-',$lmp['jdge_date']);?></td>
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
        <a href="<?= base_url(); ?>LiveMonitoringProcess/export" class="<?php if ($this->input->post('keyword')){
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