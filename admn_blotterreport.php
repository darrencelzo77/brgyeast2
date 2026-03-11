<?php

error_reporting(E_ALL ^ E_WARNING);
ini_set('display_errors', 0);
require('classes/resident.class.php');

// Initialize
$userdetails = $bmis->get_userdata();
$bmis->validate_admin();

// Handle POST actions
$bmis->create_blotter_walkin();
$bmis->delete_blotter();

// Get data
$view = $residentbmis->view_blotter();
$id_blotter = isset($_GET['id_blotter']) ? $_GET['id_blotter'] : 0;

if ($id_blotter > 0) {
    $resident = $residentbmis->get_single_blotter($id_blotter);
}

?>

<?php include('dashboard_sidebar_start.php'); ?>

<style>
.table-responsive{margin-top:20px;}
.chart-box{height:350px;}
.small-pie{max-width:300px;margin:auto;}
.heat-low{background:#f8f9fa;}
.heat-mid{background:#ffc107;}
.heat-high{background:#ff4d4d;color:white;}
</style>

<div class="container-fluid">

<div class="row">
<div class="col text-center">
<h1>Peace and Order Report Data</h1>
</div>
</div>

<hr>

<?php

/* =========================
   EXISTING RISK ANALYSIS
========================= */

$hourCounts=[];
$locationCounts=[];

foreach($view as $record){

$hour=date('H',strtotime($record['timeapplied']));
$hourCounts[$hour]=($hourCounts[$hour]??0)+1;

$location=$record['street'].', '.$record['brgy'];
$locationCounts[$location]=($locationCounts[$location]??0)+1;

}

arsort($hourCounts);
arsort($locationCounts);

$topHours=array_slice($hourCounts,0,3,true);
$topLocations=array_slice($locationCounts,0,3,true);

/* =========================
   ADDITIONAL ANALYTICS
========================= */

$caseCounts=[];
$monthlyIncidents=[];
$respondentCounts=[];
$dayCounts=[];
$heatmapData=[];
$nightIncidents=0;

$totalIncidents=count($view);

foreach($view as $record){

$timestamp=strtotime($record['timeapplied']);
$month=date('Y-m',$timestamp);
$day=date('l',$timestamp);
$hour=date('H',$timestamp);

$case=$record['case_name']?:'Unknown';
$resp=$record['case_respondent'];

$caseCounts[$case]=($caseCounts[$case]??0)+1;
$monthlyIncidents[$month]=($monthlyIncidents[$month]??0)+1;
$dayCounts[$day]=($dayCounts[$day]??0)+1;

$heatmapData[$day][$hour]=($heatmapData[$day][$hour]??0)+1;

if($hour>=18 || $hour<=5){$nightIncidents++;}

if($resp){
$respondentCounts[$resp]=($respondentCounts[$resp]??0)+1;
}

}

arsort($caseCounts);
arsort($respondentCounts);
arsort($dayCounts);

$predictedPeakHour=!empty($hourCounts)?array_key_first($hourCounts):null;
$predictedHotspot=!empty($locationCounts)?array_key_first($locationCounts):null;
$predictedCase=!empty($caseCounts)?array_key_first($caseCounts):null;
$mostDangerousDay=!empty($dayCounts)?array_key_first($dayCounts):null;

$incidentProbabilityTonight=$totalIncidents>0
? round(($nightIncidents/$totalIncidents)*100,2):0;

/* =========================
   MONTHLY FORECAST
========================= */

$values=array_values($monthlyIncidents);
$growth=0;

for($i=1;$i<count($values);$i++){
$growth+=($values[$i]-$values[$i-1]);
}

$growth=count($values)>1?$growth/(count($values)-1):0;
$predictedNextMonth=end($values)+$growth;

/* =========================
   RISK SCORE
========================= */

$incidentFrequency=$totalIncidents;
$peakHour=max($hourCounts);
$hotspot=max($locationCounts);

$riskScore=($incidentFrequency*0.4)+($hotspot*0.3)+($peakHour*0.3);

if($riskScore<20){$riskLevel="LOW";}
elseif($riskScore<50){$riskLevel="MEDIUM";}
else{$riskLevel="HIGH";}
?>

<!-- EXISTING RISK CARDS -->

<div class="row mb-4">

<div class="col-md-6">
<div class="card border-primary">
<div class="card-header bg-primary text-white">
Top Risky Hours
</div>
<div class="card-body">
<ul class="list-group">
<?php foreach($topHours as $hour=>$count): ?>
<li class="list-group-item">
<?=date('h:i A',strtotime($hour.':00'))?>
<span class="badge badge-danger float-right"><?=$count?></span>
</li>
<?php endforeach;?>
</ul>
</div>
</div>
</div>

<div class="col-md-6">
<div class="card border-warning">
<div class="card-header bg-warning">
Top Risky Locations
</div>
<div class="card-body">
<ul class="list-group">
<?php foreach($topLocations as $loc=>$count): ?>
<li class="list-group-item">
<?=htmlspecialchars($loc)?>
<span class="badge badge-danger float-right"><?=$count?></span>
</li>
<?php endforeach;?>
</ul>
</div>
</div>
</div>

</div>

<!-- PREDICTIVE CARDS -->

<div class="row mb-4">

<div class="col-md-3">
<div class="card bg-info text-white">
<div class="card-body">
Predicted Peak Hour
<h4><?=date('h:i A',strtotime($predictedPeakHour.':00'))?></h4>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card bg-danger text-white">
<div class="card-body">
Predicted Hotspot
<h5><?=$predictedHotspot?></h5>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card bg-warning">
<div class="card-body">
Most Frequent Case
<h5><?=$predictedCase?></h5>
</div>
</div>
</div>

<div class="col-md-3">
<div class="card bg-success text-white">
<div class="card-body">
Next Month Prediction
<h4><?=round($predictedNextMonth)?></h4>
</div>
</div>
</div>

</div>

<!-- ADDITIONAL ANALYTICS -->

<div class="row mb-4">

<div class="col-md-4">
<div class="card border-danger">
<div class="card-header bg-danger text-white">
Most Dangerous Day
</div>
<div class="card-body">
<h4><?=$mostDangerousDay?></h4>
</div>
</div>
</div>

<div class="col-md-4">
<div class="card border-dark">
<div class="card-header bg-dark text-white">
Incident Probability Tonight
</div>
<div class="card-body">
<h3><?=$incidentProbabilityTonight?>%</h3>
</div>
</div>
</div>

<div class="col-md-4">
<div class="card border-secondary">
<div class="card-header bg-secondary text-white">
Barangay Risk Score
</div>
<div class="card-body">
<h2><?=round($riskScore)?></h2>
<p>Risk Level: <b><?=$riskLevel?></b></p>
</div>
</div>
</div>

</div>

<!-- TABLE -->

<div class="table-responsive">
<table class="table table-bordered table-striped">

<thead>
<tr>
<th>Control #</th>
<th>Case No</th>
<th>Complainant</th>
<th>Case Type</th>
<th>Respondent</th>
<th>Contact</th>
<th>Date Filed</th>
</tr>
</thead>

<tbody>

<?php foreach($view as $data): ?>

<tr>

<td><?=$data['control_no']?></td>
<td><?=$data['case_no']?></td>
<td><?=$data['lname'].', '.$data['fname']?></td>
<td><?=$data['case_name']?></td>
<td><?=$data['case_respondent']?></td>
<td><?=$data['contact']?></td>
<td><?=date('M d Y h:i A',strtotime($data['timeapplied']))?></td>

</tr>

<?php endforeach; ?>

</tbody>
</table>
</div>

<!-- CHARTS -->

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="row mt-4">

<div class="col-md-6 chart-box">
<h5>Incidents by Hour</h5>
<canvas id="hourChart"></canvas>
</div>

<div class="col-md-6 chart-box">
<h5>Monthly Trend</h5>
<canvas id="monthChart"></canvas>
</div>

</div>

<div class="row mt-4">

<div class="col-md-4">
<h5>Case Distribution</h5>
<div class="small-pie">
<canvas id="caseChart"></canvas>
</div>
</div>

<div class="col-md-8">
<h5>Incidents by Day</h5>
<canvas id="dayChart"></canvas>
</div>

</div>

<script>

new Chart(document.getElementById('hourChart'),{
type:'bar',
data:{
labels: <?=json_encode(array_keys($hourCounts))?>,
datasets:[{
label:'Incidents',
data:<?=json_encode(array_values($hourCounts))?>
}]
}
});

new Chart(document.getElementById('monthChart'),{
type:'line',
data:{
labels: <?=json_encode(array_keys($monthlyIncidents))?>,
datasets:[{
label:'Monthly Incidents',
data:<?=json_encode(array_values($monthlyIncidents))?>
}]
}
});

new Chart(document.getElementById('caseChart'),{
type:'pie',
data:{
labels: <?=json_encode(array_keys($caseCounts))?>,
datasets:[{
data:<?=json_encode(array_values($caseCounts))?>
}]
}
});

new Chart(document.getElementById('dayChart'),{
type:'bar',
data:{
labels: <?=json_encode(array_keys($dayCounts))?>,
datasets:[{
label:'Incidents by Day',
data:<?=json_encode(array_values($dayCounts))?>
}]
}
});

</script>

<!-- CRIME HEATMAP -->

<h5 class="mt-5">Crime Heatmap (Day vs Hour)</h5>

<table class="table table-bordered text-center">

<tr>
<th>Day / Hour</th>

<?php for($h=0;$h<24;$h++){echo "<th>$h</th>";} ?>

</tr>

<?php

foreach($heatmapData as $day=>$hours){

echo "<tr>";
echo "<td><b>$day</b></td>";

for($h=0;$h<24;$h++){

$count=$hours[$h]??0;

$class="heat-low";
if($count>3)$class="heat-high";
elseif($count>1)$class="heat-mid";

echo "<td class='$class'>$count</td>";

}

echo "</tr>";

}

?>

</table>

</div>

<?php include('dashboard_sidebar_end.php'); ?>