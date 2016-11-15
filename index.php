<!doctype html>
<html ng-app="app">
  <head>



    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/myccs.css" rel="stylesheet">


  </head>
  <body>

    <!--header banner-->
    <?php include 'includes/header.php';?>

    <div class="container">
      <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="panel panel-default">
            <div class="panel-body">
            <div class="row">

              <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                  <b>Flight Status:</b>
              </div>

              <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                  <b>Flight Duration:</b>
              </div>

              <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                 <b>Last Packet Recieved:</b>
              </div>

          </div>
        </div>
          </div>
        </div>
      </div>


<div class="row">
  <div class="col-lg-8 col-md-9 col-sm-12 col-xs-12">
          <!--Generate Tabs-->
    <div id="content">
        <div ng-controller="tabs">
            <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
              <li class="active"><a href="#overview" data-toggle="tab">Overview</a></li>
              <li ng-repeat="tab in tabs"><a data-toggle="tab" ng-href="#{{tab.name}}">{{tab.name}}</a></li>
            </ul>
          </div>
    </div>

<div id="my-tab-content" class="tab-content">
<div class="tab-pane active" id="overview">

  <!--Overview Table-->
  <div ng-controller="Status">
<div class="panel panel-default">
      <table class="table">
        <thead>
        <th>Type</th>
        <th>Last Recieved [UTC]</th>
        <th>Status</th>

        </thead>
        <tbody>
          <tr ng-repeat="stat in dataStatus">

             <!--NAME-->
             <td> {{stat.name}} </td>

             <!--TIME STAMP-->
             <td> {{stat.LastRecieved}} </td>

             <!--STATUS BADGE-->
             <td>
                <!--Check if status is good/bad and alter badge css-->
                <div class="label"
                ng-class="{'label-success': stat.status === 'good',
                'label-danger': stat.status === 'bad'}">
                 {{stat.status}}</div>
             </td>
          </tr>
        <tbody>
      </table>
    </div>
  </div>

</div>

<!--dataflow graph-->
<div class="tab-pane" id="dataflow">


</div>

<!--Memomery graph-->
<div class="tab-pane" id="memory">

</div>

<div class="tab-pane fade" id="Temperature">
<!--Data toggle info alert-->
<?php include 'includes/dataToggleAlert.php';?>
<!--specific status-->
<div ng-controller="Status">
<div class="panel panel-default">
    <table class="table">
      <tbody>
        <tr ng-repeat="stat in dataStatus" ng-show="stat.name == 'Temperature'">

           <!--NAME-->
           <td> {{stat.name}} </td>

           <!--TIME STAMP-->
           <td>Last Recieved: {{stat.LastRecieved}} </td>

           <!--STATUS BADGE-->
           <td>
              <!--Check if status is good/bad and alter badge css-->
              <div class="label"
              ng-class="{'label-success': stat.status === 'good',
              'label-danger': stat.status === 'bad'}">
               {{stat.status}}</div>
           </td>
        </tr>
      <tbody>
    </table>
  </div>
   <!--Temerautre Graph-->
   <div ng-controller="tempGraph">
        <canvas id="line" class="chart chart-line" chart-data="data"
                  chart-labels="labels" chart-series="series" chart-options="options"
                  chart-dataset-override="datasetOverride" chart-click="onClick">
        </canvas>
</div>

<div class="tab-pane" id="power">

</div>

</div>

        </div>
</div>
</div>
<div class="col-lg-4 col-md-3 col-sm-12 col-xs-12">

  <!--Meta Data Display-->
  <div ng-controller="metadataCtrl">
     <div class="panel panel-default">
        <div class="panel-heading"><b>Recent Packet Meta Data</b></div>

           <ul class="list-group">
             <!--Print 3 most recent Packet Meta Data.-->
              <li class="list-group-item" ng-repeat="dat in metadata | limitTo:3:0">
                   <p>Telemetry: {{dat.telem}}</p>
                   <p>Recieved: {{dat.recieved}}</p>
                   <p>Size: {{dat.size}}</p>
              </li>
           </ul>

       </div>
    </div>

    <div ng-controller="fruitsController">
    <li ng-repeat="fruit in fruits">
      {{fruit.name}} </li>
    <div>

</div>
</div>
</div>
</div>

<!--Footer-->
<?php include 'includes/footer.php';?>

    <!--angularjs-->
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular.min.js"></script>
    <script src="modules/ui-bootstrap-2.2.0.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.5.8/angular-animate.js"></script>

    <!--angularchart-->
    <script src="modules/Chart.bundle.min.js"></script>
    <script src="modules/angular-chart.min.js"></script>

    <!--appframework-->
    <script src="app/main.js"></script>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="modules/bootstrap.min.js"></script>

  </body>
</html>
