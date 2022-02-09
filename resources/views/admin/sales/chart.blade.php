@extends('admin.layouts.app')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-12">
                            <h3 class="card_header">{{ $domain_name }}</h3  >
                            <input type="hidden" id="traffic_data" value="{{ $traffic }}">
                        </div>
                    </div>
                    <div class="row mb-5">
                        <h4 class="my-3">How many Traffic & keyword consumed</h4>
                        <div class="col s-12 m-6">
                            <canvas id="traffic" width="1550" height="500"></canvas>
                        </div>
                    </div>
                    <div class="row">
                        <h4 class="my-3">How many TrustFlow ,CitationFlow & Domaines référents</h4>
                        <div class="col-12">
                            @php
                                $data = $responseBody['data'][3]
                            @endphp
                            <table class="table table-bordered" id="table">
                                <thead>
                                    <th>Ref Domain</th>
                                    <th>TrustFlow</th>
                                    <th>CitationFlow</th>
                                </thead>
                                <tbody>
                                    <td>{{ $data['RefDomains'] }}</td>
                                    <td>{{ $data['TrustFlow'] }}</td>
                                    <td>{{ $data['CitationFlow'] }}</td>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/1.0.2/Chart.min.js"></script>
    <script>
        $(document).ready(function(){
            $(".nav-item").removeClass('active');
            $("#diagnostic_tab").addClass('active');
        });

        var traffic = $("#traffic_data").val();
        traffic = traffic.split(',');
        Chart.defaults.global = {
            animation: true,
            animationSteps: 60,
            animationEasing: "easeOutQuart",
            showScale: true,
            scaleOverride: false,
            scaleSteps: null,
            scaleStepWidth: null,
            scaleStartValue: null,
            scaleLineColor: "rgba(0,0,0,.1)",
            scaleLineWidth: 1,
            scaleShowLabels: true,
            scaleLabel: "<%=value%>",
            scaleIntegersOnly: true,
            scaleBeginAtZero: false,
            scaleFontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
            scaleFontSize: 12,
            scaleFontStyle: "normal",
            scaleFontColor: "#666",
            responsive: true,
            maintainAspectRatio: true,
            showTooltips: true,
            customTooltips: false,
            tooltipEvents: ["mousemove", "touchstart", "touchmove"],
            tooltipFillColor: "rgba(0,0,0,0.8)",
            tooltipFontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
            tooltipFontSize: 14,
            tooltipFontStyle: "normal",
            tooltipFontColor: "#fff",
            tooltipTitleFontFamily: "'Helvetica Neue', 'Helvetica', 'Arial', sans-serif",
            tooltipTitleFontSize: 14,
            tooltipTitleFontStyle: "bold",
            tooltipTitleFontColor: "#fff",
            tooltipYPadding: 6,
            tooltipXPadding: 6,
            tooltipCaretSize: 8,
            tooltipCornerRadius: 6,
            tooltipXOffset: 10,
            tooltipTemplate: "<%if (label){%><%=label%>: <%}%><%= value %>",
            multiTooltipTemplate: "<%= value %>",
            onAnimationProgress: function(){},
            onAnimationComplete: function(){}
        };
        var data = {
            labels: ["January", "February", "March", "April", "May", "June", "July","August","september","october","november","December"],
            datasets: [
                {
                    label: "My First dataset",
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: traffic
                }
            ]
        };
        var options = {
            scaleShowGridLines : true,
            scaleGridLineColor : "rgba(0,0,0,.05)",
            scaleGridLineWidth : 1,
            scaleShowHorizontalLines: true,
            scaleShowVerticalLines: true,
            bezierCurve : false,
            bezierCurveTension : 0.4,
            pointDot : true,
            pointDotRadius : 4,
            pointDotStrokeWidth : 1,
            pointHitDetectionRadius : 20,
            datasetStroke : true,
            datasetStrokeWidth : 2,
            datasetFill : true,
            legendTemplate : "<ul class=\"<%=name.toLowerCase()%>-legend\"><% for (var i=0; i<datasets.length; i++){%><li><span style=\"background-color:<%=datasets[i].strokeColor%>\"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>"

        };;

        var ctx = document.getElementById("traffic").getContext("2d");
        var myLineChart = new Chart(ctx).Line(data, options);
    </script>
@endsection
