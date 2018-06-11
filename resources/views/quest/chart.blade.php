<!doctype html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title   >{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">
</head>
<body>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-heading"><b>Charts</b></div>
            <div class="panel-body">
                <canvas id="canvas" height="280" width="600"></canvas>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/bootstrap-select.min.js')}}" charset="utf-8"></script>
<script src="{{asset('js/chart.js')}}" charset="utf-8"></script>
<script>
    var url = "{{url('/ticket/chart')}}";

    var Years = new Array();
    var Labels = new Array();
    var Prices = new Array();
    $(document).ready(function(){
        $.get(url, function(response){

            response.forEach(function(data){
                Years.push(data.ticket_status);
                Labels.push(data.it_person);
                Prices.push(data.id);
            });
            var ctx = document.getElementById("canvas").getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels:Years,
                    datasets: [{
                        label: 'Infosys Price',
                        data: Prices,
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
        });
    });
</script>
</body>
</html>
