<div class="container">
	<h1><span class="glyphicon glyphicon-dashboard"></span> DASHBOARD</h1>
	<p>&nbsp;</p>
	<div class="alert alert-info" id="user-info-notif" >
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<!-- This page will show an overview of the system data. Current items on display are just mockups. -->
		<?php		
		$user = $this->ion_auth->user()->row();
		$username = ucfirst($user->username);
		echo 'You are logged in as user '.$username.'.';
		?>
	</div>
	<!--
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong><span class="glyphicon glyphicon-alert"></span> Reminders</strong>
				</div>
				<div class="panel-body">
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla magna neque, suscipit et dolor nec, mollis accumsan neque. Nunc maximus interdum efficitur. Vivamus maximus imperdiet odio, eget pulvinar lacus. Integer enim leo, varius ac laoreet vel, bibendum id velit. Praesent varius porta commodo. Aenean tortor libero, tincidunt eget magna vel, rutrum faucibus lectus. Vestibulum sed justo a neque pulvinar dapibus. Aliquam diam tortor, consectetur sit amet varius sed, posuere vel magna.
				</div>
			</div>
		</div>
	</div>
	-->
	<div class="row">
	    <div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong><span class="glyphicon glyphicon-stats"></span> Charts</strong>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6" id="pie_age" style="text-align: center"></div>
						<div class="col-md-6" id="pie_nationality" style="text-align: center"></div>
					</div>
                    <div class="row">
                        <div class="col-md-6">
                            <canvas id="visitorsByMonth" width="400" height="200"></canvas>
                        </div>
                        <div class="col-md-6">
                            <canvas id="revenueByMonth" width="400" height="200"></canvas>
                        </div>
                    </div>
                    <small>*All values in the charts above are for demo purposes.</a>
				</div>
			</div>
		</div>
	</div>
    <div class="row">
		<div class="col-md-8">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong><span class="glyphicon glyphicon-th-list"></span> Updates</strong>
				</div>
				
				<div class="panel-body">
					<div class="row">
						<div class="col-md-6">
							<p><strong><span class="glyphicon glyphicon-folder-open"></span>&nbsp; Latest Visitors</strong></p>
							<ul class="list-group">
							<?php
                                if ($latest_visitors == NULL)
								{
									echo '<li class="list-group-item">There are currently no visitors on record.</li>';
								}
								else{
									foreach ($latest_visitors as $latest_visitor) 
									{
										$link = base_url('visitors/view/'.$latest_visitor['visitor_id']);
										$display = strtoupper($latest_visitor['fname'].' '.$latest_visitor['lname']).', '.$latest_visitor['age'].' ('.$latest_visitor['nationality'].')';
										echo '<li class="list-group-item"><a href="'.$link.'">'.$display.'</a></li>';
									}
								}
							?>
							</ul>
						</div>
						<div class="col-md-6">
							<p><strong><span class="glyphicon glyphicon-folder-open"></span>&nbsp; Recent Visits</strong></p>
							<ul class="list-group">
                                <?php 
                                    if ($recent_visits == NULL) {
                                        echo '<li class="list-group-item">There are currently no visits on record.</li>';
                                    }
                                    else{
                                        foreach ($recent_visits as $rsa) 
                                        {
                                            $link = base_url('visits/view/'.$rsa['visit_id']);
                                            $display = '('.$rsa['visit_date'].') &nbsp;'.strtoupper($rsa['fname'].' '.$rsa['lname']);
                                            echo '<li class="list-group-item"><a href="'.$link.'">'.$display.'</a></li>';
                                        }
                                    }
								?>
							</ul>
						</div>
					</div>
				</div>

			</div>
		</div>
		
		<div class="col-md-4">
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong><span class="glyphicon glyphicon-th-list"></span> Figures</strong>
				</div>
				<div class="panel-body">
                        <p>Total Visits-to-date: 860,030</p>
                        <p>Total Visitors-to-date: 550,307</p>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<strong><span class="glyphicon glyphicon-th-list"></span> Reminders</strong>
				</div>
				<div class="panel-body">
					<p>
					Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut eget mauris eu urna congue tempus. Aliquam erat volutpat. Sed hendrerit posuere felis, eu tempus sem euismod ac. Phasellus dapibus ipsum erat, vitae consequat arcu tempus sed. Etiam eget dictum arcu. Nunc sed odio eget metus tristique pharetra eget a ex. Fusce euismod nec urna consectetur scelerisque. Etiam cursus eros non dui facilisis, sagittis sagittis odio placerat. Aliquam sed auctor orci. Vestibulum vel mi vitae metus ultricies mollis.
					</p>
				</div>
			</div>
		</div>

	</div>
	
	<div class="alert alert-danger" id="base-url-notif" >
		<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		<strong>Alert!</strong> Set base url.
	</div>
	
</div>
<script language="javascript" >
$(function() {
	
    /** Time-delay modal close **/
    setTimeout(function() {
        $('#user-info-notif').fadeOut('fast');
        $('#base-url-notif').fadeOut('fast');
    }, 5000);
    
    //Target indicator percentage chart
	//$("#bar_indicators").jChart();
	
	//Visitors grouping by Nationality
	var pie = new d3pie("pie_nationality", {
	"header": {
			"title": {
				"text": "Visitors by Nationality",
				"fontSize": 12,
				"font": "verdana"
			},
			"subtitle": {
				"color": "#999999",
				"fontSize": 10,
				"font": "verdana"
			},
			"titleSubtitlePadding": 12
		},
		"footer": {
			"color": "#999999",
			"fontSize": 11,
			"font": "open sans",
			"location": "bottom-center"
		},
		"size": {
			"canvasHeight": 250,
			"canvasWidth": 300,
			"pieOuterRadius": "80%"
		},
		"data": {
			"content": [
				{
					"label": "American",
					"value": <?php echo '25' //$barangka_count ?>,
					"color": "#094b83"
				},
				{
					"label": "British",
					"value": <?php echo '30' //$con_uno_count ?>,
					"color": "#094b83"
				},
				{
					"label": "Filipino",
					"value": <?php echo '50' //$con_dos_count ?>,
					"color": "#1266AB"
				},
				{
					"label": "Chinese",
					"value": <?php echo '40' //$fortune_count ?>,
					"color": "#094b83"
				},
				{
					"label": "Japanese",
					"value": <?php echo '45' //$tumana_count ?>,
					"color": "#337BB7"
				}
				]
		},
		"labels": {
			"outer": {
				"format": "label-value2",
				"pieDistance": 0
			},
			"mainLabel": {
				"font": "verdana"
			},
			"percentage": {
				"color": "#e1e1e1",
				"font": "verdana",
				"decimalPlaces": 0
			},
			"value": {
				"color": "#7e7a7a",
				"font": "verdana"
			},
			"lines": {
				"enabled": true,
				"color": "#cccccc"
			},
			"truncation": {
				"enabled": true
			}
		},
		"effects": {
			"pullOutSegmentOnClick": {
				"effect": "linear",
				"speed": 400,
				"size": 8
			}
		}
	});

	
	
	
	//Grouping by age
	var pie = new d3pie("pie_age", {
	"header": {
			"title": {
				"text": "Visitors by Age Group",
				"fontSize": 12,
				"font": "verdana"
			},
			"subtitle": {
				"color": "#999999",
				"fontSize": 10,
				"font": "verdana"
			},
			"titleSubtitlePadding": 12
		},
		"footer": {
			"color": "#999999",
			"fontSize": 11,
			"font": "open sans",
			"location": "bottom-center"
		},
		"size": {
			"canvasHeight": 250,
			"canvasWidth": 300,
			"pieOuterRadius": "80%"
		},
		"data": {
			"content": [
				{
					"label": "Below 18",
					"value": <?php echo 15//count($r_ben) ?>,
					"color": "#094b83"
				},
                {
					"label": "19-25",
					"value": <?php echo 20//count($r_ben) ?>,
					"color": "#094b83"
				},
                {
					"label": "26-35",
					"value": <?php echo 50//count($r_ben) ?>,
					"color": "#094b83"
				},
				{
					"label": "35-50",
					"value": <?php echo 40//count($n_ben) ?>,
					"color": "#5393C8"
				},
                {
					"label": "50 and above",
					"value": <?php echo 12//count($n_ben) ?>,
					"color": "#5393C8"
				}
			]
		},
		"labels": {
			"outer": {
				"format": "label-value2",
				"pieDistance": 0
			},
			"mainLabel": {
				"font": "verdana"
			},
			"percentage": {
				"color": "#e1e1e1",
				"font": "verdana",
				"decimalPlaces": 0
			},
			"value": {
				"color": "#7e7a7a",
				"font": "verdana"
			},
			"lines": {
				"enabled": true,
				"color": "#cccccc"
			},
			"truncation": {
				"enabled": true
			}
		},
		"effects": {
			"pullOutSegmentOnClick": {
				"effect": "linear",
				"speed": 400,
				"size": 8
			}
		}
	});

});
</script>
<script>
var ctx = document.getElementById("visitorsByMonth").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "July", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: 'No. of Visitors per Month',
            data: [400, 500, 450, 380, 150, 100, 90, 80, 100, 150, 350, 390],
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    },
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

var ctx = document.getElementById("revenueByMonth").getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "July", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
            label: 'Revenue per Month (in thousands of pesos)',
            data: [860, 1200, 1000, 600, 300, 200, 180, 160, 200, 350, 800, 850],
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
    },
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
