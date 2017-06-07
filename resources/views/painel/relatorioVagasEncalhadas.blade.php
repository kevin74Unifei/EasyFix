@extends('../templates/template_base')

@section('tools-icon')
@endsection
@section('menu')
@endsection

@section('Base')
   

    <style>
    .pagina{position: absolute;
        top:80px;
        left:350px;        
        width:760px;
        background-color: whitesmoke;
        padding: 4%;
        padding-top:20px;
        padding-bottom:100px;
    }
    </style>
    

    <script src="{{url('highcharts/code/highcharts.js')}}"></script>
    <script src="{{url('highcharts/code/modules/data.js')}}"></script>
    <script src="{{url('highcharts/code/modules/drilldown.js')}}"></script>
    <div class='pagina'>
        <h1>Relatório</h1>
        <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

        <script type="text/javascript">

    // Create the chart
    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Vagas que não foram ocupadas.'
        },
        subtitle: {
            text: 'Numeros de vagas que permaacem sem preechimento por falta de mão de obra.'
        },
        xAxis: {
            type: 'category'
        },
        yAxis: {
            title: {
                text: 'Numero de Vagas'
            }

        },
        legend: {
            enabled: false
        },
        plotOptions: {
            series: {
                borderWidth: 0,
                dataLabels: {
                    enabled: true,
                    format: '{point.y:.1f}'
                }
            }
        },

        tooltip: {
            headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
            pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
        },

        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: '1 Ano',
                y: {{count($vaga3m)}},
            }, {
                name: '6 meses',
                y: {{count($vaga6m)}},
            }, {
                name: '3 meses',
                y: {{count($vaga1a)}},
            }]
        }],
    });
        </script>
    </div>
        
    
@endsection