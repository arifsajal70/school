<!-- Content -->
<div class="content-area py-1">
	<div class="container-fluid">
		<div class="row row-md">
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<div class="box box-block tile tile-2 bg-danger mb-2">
					<div class="t-icon right"><i class="pe-7s-user"></i></div>
					<div class="t-content">
						<h1 class="mb-1">1,325</h1>
						<h6 class="text-uppercase">Students</h6>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<div class="box box-block tile tile-2 bg-success mb-2">
					<div class="t-icon right"><i class="pe-7s-users"></i></div>
					<div class="t-content">
						<h1 class="mb-1">1,325</h1>
						<h6 class="text-uppercase">Parents</h6>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<div class="box box-block tile tile-2 bg-info mb-2">
					<div class="t-icon right"><i class="ti-user"></i></div>
					<div class="t-content">
						<h1 class="mb-1">1,325</h1>
						<h6 class="text-uppercase">Teachers</h6>
					</div>
				</div>
			</div>
			<div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
				<div class="box box-block tile tile-2 bg-primary mb-2">
					<div class="t-icon right"><i class="ti-shopping-cart-full"></i></div>
					<div class="t-content">
						<h1 class="mb-1">1,325</h1>
						<h6 class="text-uppercase">Orders</h6>
					</div>
				</div>
			</div>
		</div>

		<div class="box box-block bg-white b-t-0 mb-2">
			<div class="chart-container demo-chart">
				<div id="accounts-chart" class="chart-placeholder"></div>
			</div>
		</div>

		<script type="text/javascript">
			$(function () { 
				var myChart = Highcharts.chart('accounts-chart', {
					chart: {
						type: 'areaspline'
					},
					title: {
						text: '<?php echo date("Y");?> Accounts Report'
					},
					xAxis: {
						categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
					},
					yAxis: {
						title: {
							text: 'Amount'
						}
					},
					series: [{
						name: 'Income',
						color: '#F44236',
						data: [0, 0, 0, 0, 0, 5000, 0, 0, 0, 0, 0, 0]
					}, {
						name: 'Expense',
						color: '#43B968',
						data: [0, 0, 0, 0, 0, 3000, 0, 0, 0, 0, 0, 0]
					}]
				});
			});
		</script>

		<div class="row row-md mb-2">

			<div class="col-md-6">
				<div id="attendance-chart" class="chart-placeholder"></div>
				<script type="text/javascript">
					$(function () { 
						var myChart = Highcharts.chart('attendance-chart', {
							chart: {
								type: 'column'
							},
							title: {
								text: 'Today Attendance Report'
							},
							xAxis: {
								categories: ['One', 'Tow', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten']
							},
							yAxis: {
								title: {
									text: 'Attend'
								}
							},plotOptions: {
								column: {
									stacking: 'normal',
								}
							},
							series: [{
								name: 'Attendance',
								color: '#F44236',
								data: [20, 30, 25, 36, 21, 32, 45, 29, 37, 22]
							}]
						});
					});
				</script>
			</div>

			<div class="col-md-6">
				<div id="student-chart" class="chart-placeholder"></div>
				<script type="text/javascript">
					$(function () { 
						var myChart = Highcharts.chart('student-chart', {
							chart: {
								type: 'area'
							},
							title: {
								text: 'Studet Per Class'
							},
							xAxis: {
								categories: ['One', 'Tow', 'Three', 'Four', 'Five', 'Six', 'Seven', 'Eight', 'Nine', 'Ten']
							},
							yAxis: {
								title: {
									text: 'Total Student'
								}
							},
							series: [{
								name: 'Total Student',
								color: '#43B968',
								data: [50, 40, 35, 40, 50, 45, 45, 30, 35, 40]
							}]
						});
					});
				</script>
			</div>

		</div>



		<div class="box box-block bg-white">
			<div class="clearfix mb-1">
				<h5 class="float-xs-left">Calander</h5>
				<div class="float-xs-right">
					<button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-angle-down"></i></button>
					<button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-reload"></i></button>
					<button class="btn btn-link btn-sm text-muted" type="button"><i class="ti-close"></i></button>
				</div>
			</div>
			<div class="row">
				<div class="box box-block bg-white clearfix">
					<div id="calendar"></div>
				</div>
			</div>
		</div>
	</div>