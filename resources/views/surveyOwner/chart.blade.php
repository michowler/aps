@extends('layouts.owner_layout')

@section('navbar-brand', 'Survey Visualization')

@section('content')

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card ">
                            <div class="header">
                                <!-- <h4 class="title">Customer Satisfaction</h4> <span class="category">24/06/2019</span> -->
                            </div>
                            <br><br>
                            <div class="content">
                                <figure class="highcharts-figure">
                                    <div id="container"></div>
                                </figure>
                                
                                </div>
                                
                                    <!-- <div class="stats">
                                        <a href="/chart" class="fas fa-file-csv"></a><a href="/chart" > Export Result to CSV </a>
                                    </div> -->
                                
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    
    Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: '{{$survey->surveys_title}}'
    },
    subtitle: {
        text: '{{strftime("%d/%m/%Y", strtotime($survey->created_at))}}'
    },
    xAxis: {
        categories: {!!$qNo!!},
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Number of Responses'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b> {point.y} </b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: {!!$result!!},
    navigation: {
        buttonOptions: {
            enabled: {{$allowExport}}
        }
    }
});
</script>


@endsection