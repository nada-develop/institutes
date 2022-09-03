@extends('layouts.admin')
@section('content')
    <div class="content mt-2">
        <div class="container-fluid">
            <div class="row home-summary">
                <div class="col-md-6 col-xl-3 col-differ">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded bg-soft-primary">
                                        <i class="dripicons-view-thumb font-24 avatar-title text-primary"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $regionCount }}</span>
                                        </h3>
                                        <a>
                                            <p class="text-muted mb-1 text-truncate"> المناطق</p>
                                        </a>
                                    </div>
                                </div>
                            </div> <!-- end row-->
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3 col-differ">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded bg-soft-info">

                                        <i class=" dripicons-mail font-24 avatar-title text-info"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1"><span
                                                data-plugin="counterup">{{ $managementCount }}</span></h3>
                                        <a>
                                            <p class="text-muted mb-1 text-truncate">الادارات</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-6 col-xl-3 col-differ">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded bg-soft-success">
                                        <i class="dripicons-blog font-24 avatar-title text-success"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1"><span
                                                data-plugin="counterup">{{ $instituteCount }}</span></h3>
                                        <a>
                                            <p class="text-muted mb-1 text-truncate">المعاهد</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-6 col-xl-3 col-differ">
                    <div class="widget-rounded-circle card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <div class="avatar-lg rounded bg-soft-warning">
                                        <i class="dripicons-photo-group font-24 avatar-title text-warning"></i>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="text-end">
                                        <h3 class="text-dark mt-1"><span data-plugin="counterup">{{ $teacherCount }}</span>
                                        </h3>
                                        <a>
                                            <p class="text-muted mb-1 text-truncate">المعلمين</p>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-xl-4 col-differ">
                    <!-- Portlet card -->
                    <div class="card chart">
                        <div class="card-body">
                            <div class="card-widgets">
                                <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                <a data-bs-toggle="collapse" href="#cardCollpase19" role="button" aria-expanded="false" aria-controls="cardCollpase19"><i class="mdi mdi-minus"></i></a>
                                <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                            </div>
                            <h4 class="header-title mb-0"> الموقف من العمل</h4>

                            <div id="cardCollpase19" class="collapse pt-3 show" dir="ltr">
                                <div id="apex-pie-2" class="apex-charts" data-colors="#6658dd,#4fc6e1,#4a81d4,#00b19d,#f1556c"></div>
                            </div> <!-- collapsed end -->
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div>
                <div class="col-xl-8 col-differ">
                    <div class="card chart">
                        <div class="card-body">
                            <div class="card-widgets">
                                <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                <a data-bs-toggle="collapse" href="#cardCollpase7" role="button" aria-expanded="false"
                                    aria-controls="cardCollpase7"><i class="mdi mdi-minus"></i></a>
                                <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                            </div>
                            <h4 class="header-title mb-0"> المؤهلات</h4>

                            <div id="cardCollpase7" class="collapse pt-3 show" dir="ltr">
                                <div id="apex-mixed-1" class="apex-charts" data-colors="#CED4DC,#6658dd"></div>
                            </div> <!-- collapsed end -->
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div>

            </div>
            <div class="row">
                <div class="col-lg-4 col-differ">
                    <div class="card chart">
                        <div class="card-body">
                            <h4 class="header-title">الكفاءة</h4>
                            <div class="mt-4 chartjs-chart">
                                <canvas id="line-chart-example" height="280" data-colors="#1abc9c,#f1556c"></canvas>
                            </div>
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div>
                {{--  <div class="col-xl-8 col-differ">
                    <div class="card chart">
                        <div class="card-body">
                            <div class="card-widgets">
                                <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                <a data-bs-toggle="collapse" href="#cardCollpase5" role="button" aria-expanded="false" aria-controls="cardCollpase5"><i class="mdi mdi-minus"></i></a>
                                <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                            </div>
                            <h4 class="header-title mb-0">الوظيفة على الكادر</h4>

                            <div id="cardCollpase5" class="collapse pt-3 show" dir="ltr">
                                <div id="apex-column-1" class="apex-charts" data-colors="#6658dd,#1abc9c,#CED4DC"></div>
                            </div> <!-- collapsed end -->
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div>  --}}
                <div class="col-xl-8 col-differ">
                    <div class="card chart">
                        <div class="card-body">
                            <div class="card-widgets">
                                <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                <a data-bs-toggle="collapse" href="#cardCollpase7" role="button" aria-expanded="false"
                                    aria-controls="cardCollpase7"><i class="mdi mdi-minus"></i></a>
                                <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                            </div>
                            <h4 class="header-title mb-0">الوظيفة على الكادر</h4>


                            <div id="cardCollpase7" class="collapse pt-3 show" dir="ltr">
                                <div id="apex-mixed-12" class="apex-charts" data-colors="#CED4DC,#6658dd"></div>
                            </div> <!-- collapsed end -->
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div>


            </div>
            <div class="row">
                <div class="col-xl-12 col-differ">
                    <div class="card chart">
                        <div class="card-body">
                            <div class="card-widgets">
                                <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                <a data-bs-toggle="collapse" href="#cardCollpase5" role="button" aria-expanded="false" aria-controls="cardCollpase5"><i class="mdi mdi-minus"></i></a>
                                <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                            </div>
                            <h4 class="header-title mb-0">التخصصات</h4>

                            <div id="cardCollpase5" class="collapse pt-3 show" dir="ltr">
                                <div id="apex-column-111" class="apex-charts" data-colors="#cea120,#1abc9c,#CED4DC"></div>
                            </div> <!-- collapsed end -->
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-differ">
                    <div class="card chart">
                        <div class="card-body">
                            <div class="card-widgets">
                                <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                <a data-bs-toggle="collapse" href="#cardCollpase7" role="button" aria-expanded="false"
                                    aria-controls="cardCollpase7"><i class="mdi mdi-minus"></i></a>
                                <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                            </div>
                            <h4 class="header-title mb-0"> الوظيفة</h4>

                            <div id="cardCollpase7" class="collapse pt-3 show" dir="ltr">
                                <div id="apex-mixed-111" class="apex-charts" data-colors="#1abc9c,#1abc9c"></div>
                            </div> <!-- collapsed end -->
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div>
            </div>
        </div>

@endsection
@section('custom-script')
    <script src="{{ asset('assets/js/pages/form-advanced.init.js') }}"></script>
    <script src="{{ asset('assets/libs/chart.js/Chart.bundle.min.js') }}"></script>
    /
    //
    {{--  <script src="{{ asset('assets/js/pages/chartjs.init.js') }}"></script>  --}}
    <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="https://apexcharts.com/samples/assets/irregular-data-series.js"></script>
    <script src="https://apexcharts.com/samples/assets/ohlc.js"></script>
    {{--  <script src="{{ asset('assets/js/pages/apexcharts.init.js') }}"></script>  --}}

    <script>
        Apex.grid = {
            padding: {
               right: 0,
               left: 0
            }
         }, Apex.dataLabels = {
            enabled: !1
         };
         var randomizeArray = function (e) {
               for (var o, t, a = e.slice(), r = a.length; 0 !== r;) t = Math.floor(Math.random() * r), o = a[--r], a[r] = a[t], a[t] = o;
               return a
            },
            sparklineData = [47, 45, 54, 38, 56, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46],
            colorPalette = ["#00D8B6", "#008FFB", "#FEB019", "#FF4560", "#775DD0"],
            colors = ["#6658dd"];
         (dataColors = $("#spark1").data("colors")) && (colors = dataColors.split(","));
         var spark1 = {
            chart: {
               type: "area",
               height: 160,
               sparkline: {
                  enabled: !0
               }
            },
            stroke: {
               width: 2,
               curve: "straight"
            },
            fill: {
               opacity: .2
            },
            series: [{
               name: "UBold Sales ",
               data: randomizeArray(sparklineData)
            }],
            yaxis: {
               min: 0
            },
            colors: colors,
            title: {
               text: "$424,652",
               offsetX: 10,
               style: {
                  fontSize: "22px"
               }
            },
            subtitle: {
               text: "Total Sales",
               offsetX: 10,
               offsetY: 35,
               style: {
                  fontSize: "13px"
               }
            }
         };
         new ApexCharts(document.querySelector("#spark1"), spark1).render();
         colors = ["#DCE6EC"];
         (dataColors = $("#spark2").data("colors")) && (colors = dataColors.split(","));
         var spark2 = {
            chart: {
               type: "area",
               height: 160,
               sparkline: {
                  enabled: !0
               }
            },
            stroke: {
               width: 2,
               curve: "straight"
            },
            fill: {
               opacity: .2
            },
            series: [{
               name: "UBold Expenses ",
               data: randomizeArray(sparklineData)
            }],
            yaxis: {
               min: 0
            },
            colors: colors,
            title: {
               text: "$235,312",
               offsetX: 10,
               style: {
                  fontSize: "22px"
               }
            },
            subtitle: {
               text: "Expenses",
               offsetX: 10,
               offsetY: 35,
               style: {
                  fontSize: "13px"
               }
            }
         };
         new ApexCharts(document.querySelector("#spark2"), spark2).render();
         colors = ["#f672a7"];
         (dataColors = $("#spark3").data("colors")) && (colors = dataColors.split(","));
         var spark3 = {
            chart: {
               type: "area",
               height: 160,
               sparkline: {
                  enabled: !0
               }
            },
            stroke: {
               width: 2,
               curve: "straight"
            },
            fill: {
               opacity: .2
            },
            series: [{
               name: "Net Profits ",
               data: randomizeArray(sparklineData)
            }],
            xaxis: {
               crosshairs: {
                  width: 1
               }
            },
            yaxis: {
               min: 0
            },
            colors: colors,
            title: {
               text: "$135,965",
               offsetX: 10,
               style: {
                  fontSize: "22px"
               }
            },
            subtitle: {
               text: "Profits",
               offsetX: 10,
               offsetY: 35,
               style: {
                  fontSize: "13px"
               }
            }
         };
         new ApexCharts(document.querySelector("#spark3"), spark3).render();
         colors = ["#6658dd", "#1abc9c"];
         (dataColors = $("#apex-line-1").data("colors")) && (colors = dataColors.split(","));
         var options = {
            chart: {
               height: 380,
               type: "line",
               zoom: {
                  enabled: !1
               },
               toolbar: {
                  show: !1
               }
            },
            colors: colors,
            dataLabels: {
               enabled: !0
            },
            stroke: {
               width: [3, 3],
               curve: "smooth"
            },
            series: [{
               name: "High - 2018",
               data: [28, 29, 33, 36, 32, 32, 33]
            }, {
               name: "Low - 2018",
               data: [12, 11, 14, 18, 17, 13, 13]
            }],
            title: {
               text: "Average High & Low Temperature",
               align: "left",
               style: {
                  fontSize: "14px",
                  color: "#666"
               }
            },
            grid: {
               row: {
                  colors: ["transparent", "transparent"],
                  opacity: .2
               },
               borderColor: "#f1f3fa"
            },
            markers: {
               style: "inverted",
               size: 6
            },
            xaxis: {
               categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul"],
               title: {
                  text: "Month"
               }
            },
            yaxis: {
               title: {
                  text: "Temperature"
               },
               min: 5,
               max: 40
            },
            legend: {
               position: "top",
               horizontalAlign: "right",
               floating: !0,
               offsetY: -25,
               offsetX: -5
            },
            responsive: [{
               breakpoint: 600,
               options: {
                  chart: {
                     toolbar: {
                        show: !1
                     }
                  },
                  legend: {
                     show: !1
                  }
               }
            }]
         };
         (chart = new ApexCharts(document.querySelector("#apex-line-1"), options)).render();
         colors = ["#f672a7"];
         (dataColors = $("#apex-line-2").data("colors")) && (colors = dataColors.split(","));
         options = {
            chart: {
               height: 380,
               type: "line",
               shadow: {
                  enabled: !1,
                  color: "#bbb",
                  top: 3,
                  left: 2,
                  blur: 3,
                  opacity: 1
               }
            },
            stroke: {
               width: 5,
               curve: "smooth"
            },
            series: [{
               name: "Likes",
               data: [4, 3, 10, 9, 29, 19, 22, 9, 12, 7, 19, 5, 13, 9, 17, 2, 7, 5]
            }],
            xaxis: {
               type: "datetime",
               categories: ["1/11/2000", "2/11/2000", "3/11/2000", "4/11/2000", "5/11/2000", "6/11/2000", "7/11/2000", "8/11/2000", "9/11/2000", "10/11/2000", "11/11/2000", "12/11/2000", "1/11/2001", "2/11/2001", "3/11/2001", "4/11/2001", "5/11/2001", "6/11/2001"]
            },
            title: {
               text: "Social Media",
               align: "left",
               style: {
                  fontSize: "14px",
                  color: "#666"
               }
            },
            fill: {
               type: "gradient",
               gradient: {
                  shade: "dark",
                  gradientToColors: colors,
                  shadeIntensity: 1,
                  type: "horizontal",
                  opacityFrom: 1,
                  opacityTo: 1,
                  stops: [0, 100, 100, 100]
               }
            },
            markers: {
               size: 4,
               opacity: .9,
               colors: ["#56c2d6"],
               strokeColor: "#fff",
               strokeWidth: 2,
               style: "inverted",
               hover: {
                  size: 7
               }
            },
            yaxis: {
               min: -10,
               max: 40,
               title: {
                  text: "Engagement"
               }
            },
            grid: {
               row: {
                  colors: ["transparent", "transparent"],
                  opacity: .2
               },
               borderColor: "#185a9d"
            },
            responsive: [{
               breakpoint: 600,
               options: {
                  chart: {
                     toolbar: {
                        show: !1
                     }
                  },
                  legend: {
                     show: !1
                  }
               }
            }]
         };
         (chart = new ApexCharts(document.querySelector("#apex-line-2"), options)).render();
         colors = ["#6658dd", "#f7b84b", "#CED4DC"];
         (dataColors = $("#apex-area").data("colors")) && (colors = dataColors.split(","));
         options = {
            chart: {
               height: 380,
               type: "area",
               stacked: !0,
               events: {
                  selection: function (e, o) {
                     console.log(new Date(o.xaxis.min))
                  }
               }
            },
            colors: colors,
            dataLabels: {
               enabled: !1
            },
            stroke: {
               width: [2],
               curve: "smooth"
            },
            series: [{
               name: "South",
               data: generateDayWiseTimeSeries(new Date("11 Feb 2017 GMT").getTime(), 20, {
                  min: 10,
                  max: 60
               })
            }, {
               name: "North",
               data: generateDayWiseTimeSeries(new Date("11 Feb 2017 GMT").getTime(), 20, {
                  min: 10,
                  max: 20
               })
            }, {
               name: "Central",
               data: generateDayWiseTimeSeries(new Date("11 Feb 2017 GMT").getTime(), 20, {
                  min: 10,
                  max: 15
               })
            }],
            fill: {
               type: "gradient",
               gradient: {
                  opacityFrom: .6,
                  opacityTo: .8
               }
            },
            legend: {
               position: "top",
               horizontalAlign: "left"
            },
            xaxis: {
               type: "datetime"
            }
         };

         function generateDayWiseTimeSeries(e, o, t) {
            for (var a = 0, r = []; a < o;) {
               var s = e,
                  i = Math.floor(Math.random() * (t.max - t.min + 1)) + t.min;
               r.push([s, i]), e += 864e5, a++
            }
            return r
         }(chart = new ApexCharts(document.querySelector("#apex-area"), options)).render();
         colors = ["#6658dd", "#1abc9c", "#CED4DC"];
         (dataColors = $("#apex-column-1").data("colors")) && (colors = dataColors.split(","));
         options = {
            chart: {
               height: 290,
               type: "bar",
               toolbar: {
                  show: !1
               }
            },
            plotOptions: {
               bar: {
                  horizontal: !1,
                  endingShape: "rounded",
                  columnWidth: "55%"
               }
            },
            dataLabels: {
               enabled: !1
            },
            stroke: {
               show: !0,
               width: 2,
               colors: ["transparent"]
            },
            colors: colors,
            series: [{
               name: "Net Profit",
               data: {{ $data['job_staff_count']  }}
            }],
            xaxis: {
               categories: {!! $data['job_staff_names'] !!}
            },
            legend: {
               offsetY: 5
            },
            yaxis: {

            },
            fill: {
               opacity: 1
            },
            grid: {
               row: {
                  colors: ["transparent", "transparent"],
                  opacity: .2
               },
               borderColor: "#f1f3fa",
               padding: {
                  bottom: 10
               }
            },
            tooltip: {
               y: {
                  formatter: function (e) {
                     return "$ " + e + " thousands"
                  }
               }
            }
         };
         (chart = new ApexCharts(document.querySelector("#apex-column-1"), options)).render();
         colors = ["#cea120", "#cea120", "#cea120"];
         (dataColors = $("#apex-column-111").data("colors")) && (colors = dataColors.split(","));
         options = {
            chart: {
               height: 290,
               type: "bar",
               toolbar: {
                  show: !1
               }
            },
            plotOptions: {
               bar: {
                  horizontal: !1,
                  endingShape: "rounded",
                  columnWidth: "55%"
               }
            },
            dataLabels: {
               enabled: !1
            },
            stroke: {
               show: !0,
               width: 2,
               colors: ["transparent"]
            },
            colors: colors,
            series: [{
               name: "Net Profit",
               data: {{ $data['subjects_count']  }}
            }],
            xaxis: {
               categories: {!! $data['subjects_names'] !!}
            },
            legend: {
               offsetY: 5
            },
            yaxis: {

            },
            fill: {
               opacity: 1
            },
            grid: {
               row: {
                  colors: ["transparent", "transparent"],
                  opacity: .2
               },
               borderColor: "#cea120",
               padding: {
                  bottom: 10
               }
            },
            tooltip: {
               y: {
                  formatter: function (e) {
                     return  e
                  }
               }
            }
         };
         (chart = new ApexCharts(document.querySelector("#apex-column-111"), options)).render();
         colors = ["#6658dd"];
         (dataColors = $("#apex-column-2").data("colors")) && (colors = dataColors.split(","));
         options = {
            chart: {
               height: 380,
               type: "bar",
               toolbar: {
                  show: !1
               }
            },
            plotOptions: {
               bar: {
                  dataLabels: {
                     position: "top"
                  }
               }
            },
            dataLabels: {
               enabled: !0,
               formatter: function (e) {
                  return e + "%"
               },
               offsetY: -30,
               style: {
                  fontSize: "12px",
                  colors: ["#304758"]
               }
            },
            colors: colors,
            series: [{
               name: "Inflation",
               data: [2.3, 3.1, 4, 10.1, 4, 3.6, 3.2, 2.3, 1.4, .8, .5, .2]
            }],
            xaxis: {
               categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
               position: "top",
               labels: {
                  offsetY: -18
               },
               axisBorder: {
                  show: !1
               },
               axisTicks: {
                  show: !1
               },
               crosshairs: {
                  fill: {
                     type: "gradient",
                     gradient: {
                        colorFrom: "#D8E3F0",
                        colorTo: "#BED1E6",
                        stops: [0, 100],
                        opacityFrom: .4,
                        opacityTo: .5
                     }
                  }
               },
               tooltip: {
                  enabled: !0,
                  offsetY: -35
               }
            },
            fill: {
               gradient: {
                  enabled: !1,
                  shade: "light",
                  type: "horizontal",
                  shadeIntensity: .25,
                  gradientToColors: void 0,
                  inverseColors: !0,
                  opacityFrom: 1,
                  opacityTo: 1,
                  stops: [50, 0, 100, 100]
               }
            },
            yaxis: {
               axisBorder: {
                  show: !1
               },
               axisTicks: {
                  show: !1
               },
               labels: {
                  show: !1,
                  formatter: function (e) {
                     return e + "%"
                  }
               }
            },
            title: {
               text: "Monthly Inflation in Argentina, 2002",
               floating: !0,
               offsetY: 350,
               align: "center",
               style: {
                  color: "#444"
               }
            },
            grid: {
               row: {
                  colors: ["transparent", "transparent"],
                  opacity: .2
               },
               borderColor: "#f1f3fa"
            }
         };
         (chart = new ApexCharts(document.querySelector("#apex-column-2"), options)).render();
         colors = ["#6658dd","#CED4DC"];
         (dataColors = $("#apex-mixed-1").data("colors"));
         options = {
            chart: {
               height: 290,
               type: "line"
            },
            stroke: {
               width: 5,
               curve: "smooth"
            },
            series: [{
               name: "الكفاءة",
               type: "line",
               data:  {{ $data['qualifications_count'] }},
            }],
            colors: colors,
            fill: {
               type: "solid",
               opacity: [1, 1]
            },
            labels: {!! $data['qualifications_names'] !!},
            markers: {
               size: 0
            },
            yaxis: [ {
               title: {
                  text: "العدد"
               }
            }],
            tooltip: {
               shared: !0,
               intersect: !1,
               y: {
                  formatter: function (e) {
                     return void 0 !== e ? e.toFixed(0) + "" : e
                  }
               }
            },
            legend: {
               offsetY: 7
            }
         };
         (chart = new ApexCharts(document.querySelector("#apex-mixed-1"), options)).render();
         colors = ["#dc3545","#CED4DC"];
         (dataColors = $("#apex-mixed-111").data("colors"));
         options = {
            chart: {
               height: 290,
               type: "line"
            },
            stroke: {
               width: 5,
               curve: "smooth"
            },
            series: [{
               name: "الكفاءة",
               type: "line",
               data:  {{ $data['jobs_count'] }},
            }],
            colors: colors,
            fill: {
               type: "solid",
               opacity: [1, 1]
            },
            labels: {!! $data['jobs_names'] !!},
            markers: {
               size: 0
            },
            yaxis: [ {
               title: {
                  text: "العدد"
               }
            }],
            tooltip: {
               shared: !0,
               intersect: !1,
               y: {
                  formatter: function (e) {
                     return void 0 !== e ? e.toFixed(0) + "" : e
                  }
               }
            },
            legend: {
               offsetY: 7
            }
         };
         (chart = new ApexCharts(document.querySelector("#apex-mixed-111"), options)).render();
         colors = ["#dc3545","#CED4DC"];
         (dataColors = $("#apex-mixed-12").data("colors"));
         options = {
            chart: {
               height: 290,
               type: "line"
            },
            stroke: {
               width: 5,
               curve: "smooth"
            },
            series: [{
               name: "عدد المعلمين",
               type: "line",
               data:  {{ $data['job_staff_count']  }},
            }],
            colors: colors,
            fill: {
               type: "solid",
               opacity: [1, 1]
            },
            labels: {!! $data['job_staff_names'] !!},
            markers: {
               size: 0
            },
            yaxis: [ {
               title: {
                  text: "العدد"
               }
            }],
            tooltip: {
               shared: !0,
               intersect: !1,
               y: {
                  formatter: function (e) {
                     return void 0 !== e ? e.toFixed(0) + "" : e
                  }
               }
            },
            legend: {
               offsetY: 7
            }
         };
         (chart = new ApexCharts(document.querySelector("#apex-mixed-12"), options)).render();
         colors = ["#1abc9c"];
         (dataColors = $("#apex-bar-1").data("colors")) && (colors = dataColors.split(","));
         options = {
            chart: {
               height: 380,
               type: "bar",
               toolbar: {
                  show: !1
               }
            },
            plotOptions: {
               bar: {
                  horizontal: !0
               }
            },
            dataLabels: {
               enabled: !1
            },
            series: [{
               data: [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380]
            }],
            colors: colors,
            xaxis: {
               categories: ["South Korea", "Canada", "United Kingdom", "Netherlands", "Italy", "France", "Japan", "United States", "China", "Germany"]
            },
            states: {
               hover: {
                  filter: "none"
               }
            },
            grid: {
               borderColor: "#f1f3fa"
            }
         };
         (chart = new ApexCharts(document.querySelector("#apex-bar-1"), options)).render();
         colors = ["#6658dd", "#1abc9c"];
         (dataColors = $("#apex-bar-2").data("colors")) && (colors = dataColors.split(","));
         options = {
            chart: {
               height: 380,
               type: "bar",
               stacked: !0,
               toolbar: {
                  show: !1
               }
            },
            colors: colors,
            plotOptions: {
               bar: {
                  horizontal: !0,
                  barHeight: "80%"
               }
            },
            dataLabels: {
               enabled: !1
            },
            stroke: {
               width: 1,
               colors: ["#fff"]
            },
            series: [{
               name: "Males",
               data: [.4, .65, .76, .88, 1.5, 2.1, 2.9, 3.8, 3.9, 4.2, 4, 4.3, 4.1, 4.2, 4.5, 3.9, 3.5, 3]
            }, {
               name: "Females",
               data: [-.8, -1.05, -1.06, -1.18, -1.4, -2.2, -2.85, -3.7, -3.96, -4.22, -4.3, -4.4, -4.1, -4, -4.1, -3.4, -3.1, -2.8]
            }],
            grid: {
               borderColor: "#f1f3fa"
            },
            yaxis: {
               min: -5,
               max: 5,
               title: {}
            },
            tooltip: {
               shared: !1,
               x: {
                  formatter: function (e) {
                     return e
                  }
               },
               y: {
                  formatter: function (e) {
                     return Math.abs(e) + "%"
                  }
               }
            },
            xaxis: {
               categories: ["85+", "80-84", "75-79", "70-74", "65-69", "60-64", "55-59", "50-54", "45-49", "40-44", "35-39", "30-34", "25-29", "20-24", "15-19", "10-14", "5-9", "0-4"],
               title: {
                  text: "Percent"
               },
               labels: {
                  formatter: function (e) {
                     return Math.abs(Math.round(e)) + "%"
                  }
               }
            },
            legend: {
               offsetY: 7
            }
         };
         (chart = new ApexCharts(document.querySelector("#apex-bar-2"), options)).render();
         colors = ["#6658dd", "#1abc9c", "#f672a7"];
         (dataColors = $("#apex-mixed-2").data("colors")) && (colors = dataColors.split(","));
         options = {
            chart: {
               height: 380,
               type: "line",
               padding: {
                  right: 0,
                  left: 0
               },
               stacked: !1,
               toolbar: {
                  show: !1
               }
            },
            stroke: {
               width: [0, 2, 4],
               curve: "smooth"
            },
            plotOptions: {
               bar: {
                  columnWidth: "50%"
               }
            },
            colors: colors,
            series: [{
               name: "Team A",
               type: "column",
               data: [23, 11, 22, 27, 13, 22, 37, 21, 44, 22, 30]
            }, {
               name: "Team B",
               type: "area",
               data: [44, 55, 41, 67, 22, 43, 21, 41, 56, 27, 43]
            }, {
               name: "Team C",
               type: "line",
               data: [30, 25, 36, 30, 45, 35, 64, 52, 59, 36, 39]
            }],
            fill: {
               opacity: [.85, .25, 1],
               gradient: {
                  inverseColors: !1,
                  shade: "light",
                  type: "vertical",
                  opacityFrom: .85,
                  opacityTo: .55,
                  stops: [0, 100, 100, 100]
               }
            },
            labels: ["01/01/2003", "02/01/2003", "03/01/2003", "04/01/2003", "05/01/2003", "06/01/2003", "07/01/2003", "08/01/2003", "09/01/2003", "10/01/2003", "11/01/2003"],
            markers: {
               size: 0
            },
            legend: {
               offsetY: 7
            },
            xaxis: {
               type: "datetime"
            },
            yaxis: {
               title: {
                  text: "Points"
               }
            },
            tooltip: {
               shared: !0,
               intersect: !1,
               y: {
                  formatter: function (e) {
                     return void 0 !== e ? e.toFixed(0) + " points" : e
                  }
               }
            },
            grid: {
               borderColor: "#f1f3fa",
               padding: {
                  bottom: 10
               }
            }
         };
         (chart = new ApexCharts(document.querySelector("#apex-mixed-2"), options)).render();
         colors = ["#6658dd,#ebf2f6,#f672a7"];
         (dataColors = $("#apex-mixed-3").data("colors")) && (colors = dataColors.split(","));
         options = {
            chart: {
               height: 380,
               type: "line",
               stacked: !1,
               toolbar: {
                  show: !1
               }
            },
            dataLabels: {
               enabled: !1
            },
            stroke: {
               width: [0, 0, 3]
            },
            series: [{
               name: "Income",
               type: "column",
               data: [1.4, 2, 2.5, 1.5, 2.5, 2.8, 3.8, 4.6]
            }, {
               name: "Cashflow",
               type: "column",
               data: [1.1, 3, 3.1, 4, 4.1, 4.9, 6.5, 8.5]
            }, {
               name: "Revenue",
               type: "line",
               data: [20, 29, 37, 36, 44, 45, 50, 58]
            }],
            colors: colors,
            xaxis: {
               categories: [2009, 2010, 2011, 2012, 2013, 2014, 2015, 2016]
            },
            yaxis: [{
               axisTicks: {
                  show: !0
               },
               axisBorder: {
                  show: !0,
                  color: "#675db7"
               },
               labels: {
                  style: {
                     color: "#675db7"
                  }
               },
               title: {
                  text: "Income (thousand crores)"
               }
            }, {
               axisTicks: {
                  show: !0
               },
               axisBorder: {
                  show: !0,
                  color: "#23b397"
               },
               labels: {
                  style: {
                     color: "#23b397"
                  },
                  offsetX: 10
               },
               title: {
                  text: "Operating Cashflow (thousand crores)"
               }
            }, {
               opposite: !0,
               axisTicks: {
                  show: !0
               },
               axisBorder: {
                  show: !0,
                  color: "#e36498"
               },
               labels: {
                  style: {
                     color: "#e36498"
                  }
               },
               title: {
                  text: "Revenue (thousand crores)"
               }
            }],
            tooltip: {
               followCursor: !0,
               y: {
                  formatter: function (e) {
                     return void 0 !== e ? e + " thousand crores" : e
                  }
               }
            },
            grid: {
               borderColor: "#f1f3fa",
               padding: {
                  bottom: 10
               }
            },
            legend: {
               offsetY: 7
            },
            responsive: [{
               breakpoint: 600,
               options: {
                  yaxis: {
                     show: !1
                  },
                  legend: {
                     show: !1
                  }
               }
            }]
         };

         function generateData(e, o, t) {
            for (var a = 0, r = []; a < o;) {
               var s = Math.floor(750 * Math.random()) + 1,
                  i = Math.floor(Math.random() * (t.max - t.min + 1)) + t.min,
                  l = Math.floor(61 * Math.random()) + 15;
               r.push([s, i, l]), a++
            }
            return r
         }(chart = new ApexCharts(document.querySelector("#apex-mixed-3"), options)).render();
         colors = ["#6658dd,#1abc9c,#f672a7"];
         (dataColors = $("#apex-bubble-1").data("colors")) && (colors = dataColors.split(","));
         options = {
            chart: {
               height: 380,
               type: "bubble",
               toolbar: {
                  show: !1
               }
            },
            dataLabels: {
               enabled: !1
            },
            series: [{
               name: "Bubble 1",
               data: generateData(new Date("11 Feb 2017 GMT").getTime(), 20, {
                  min: 10,
                  max: 60
               })
            }, {
               name: "Bubble 2",
               data: generateData(new Date("11 Feb 2017 GMT").getTime(), 20, {
                  min: 10,
                  max: 60
               })
            }, {
               name: "Bubble 3",
               data: generateData(new Date("11 Feb 2017 GMT").getTime(), 20, {
                  min: 10,
                  max: 60
               })
            }],
            fill: {
               opacity: .8,
               gradient: {
                  enabled: !1
               }
            },
            colors: colors,
            xaxis: {
               tickAmount: 12,
               type: "category"
            },
            yaxis: {
               max: 70
            },
            grid: {
               borderColor: "#f1f3fa",
               padding: {
                  bottom: 10
               }
            },
            legend: {
               offsetY: 7
            }
         };

         function generateData1(e, o, t) {
            for (var a = 0, r = []; a < o;) {
               var s = Math.floor(Math.random() * (t.max - t.min + 1)) + t.min,
                  i = Math.floor(61 * Math.random()) + 15;
               r.push([e, s, i]), e += 864e5, a++
            }
            return r
         }(chart = new ApexCharts(document.querySelector("#apex-bubble-1"), options)).render();
         colors = ["#6658dd,#1abc9c,#f672a7,#6c757d"];
         (dataColors = $("#apex-bubble-2").data("colors")) && (colors = dataColors.split(","));
         var options2 = {
            chart: {
               height: 380,
               type: "bubble",
               toolbar: {
                  show: !1
               }
            },
            dataLabels: {
               enabled: !1
            },
            series: [{
               name: "Product 1",
               data: generateData1(new Date("11 Feb 2017 GMT").getTime(), 20, {
                  min: 10,
                  max: 60
               })
            }, {
               name: "Product 2",
               data: generateData1(new Date("11 Feb 2017 GMT").getTime(), 20, {
                  min: 10,
                  max: 60
               })
            }, {
               name: "Product 3",
               data: generateData1(new Date("11 Feb 2017 GMT").getTime(), 20, {
                  min: 10,
                  max: 60
               })
            }, {
               name: "Product 4",
               data: generateData1(new Date("11 Feb 2017 GMT").getTime(), 20, {
                  min: 10,
                  max: 60
               })
            }],
            fill: {
               type: "gradient"
            },
            colors: colors,
            xaxis: {
               tickAmount: 12,
               type: "datetime",
               labels: {
                  rotate: 0
               }
            },
            yaxis: {
               max: 70
            },
            legend: {
               offsetY: 7
            },
            grid: {
               borderColor: "#f1f3fa",
               padding: {
                  bottom: 10
               }
            }
         };
         (chart = new ApexCharts(document.querySelector("#apex-bubble-2"), options2)).render();
         colors = ["#1abc9c", "#f672a7", "#6c757d"];
         (dataColors = $("#apex-scatter-1").data("colors")) && (colors = dataColors.split(","));
         options = {
            chart: {
               height: 380,
               type: "scatter",
               zoom: {
                  enabled: !1
               }
            },
            series: [{
               name: "Sample A",
               data: [
                  [16.4, 5.4],
                  [21.7, 2],
                  [25.4, 3],
                  [19, 2],
                  [10.9, 1],
                  [13.6, 3.2],
                  [10.9, 7.4],
                  [10.9, 0],
                  [10.9, 8.2],
                  [16.4, 0],
                  [16.4, 1.8],
                  [13.6, .3],
                  [13.6, 0],
                  [29.9, 0],
                  [27.1, 2.3],
                  [16.4, 0],
                  [13.6, 3.7],
                  [10.9, 5.2],
                  [16.4, 6.5],
                  [10.9, 0],
                  [24.5, 7.1],
                  [10.9, 0],
                  [8.1, 4.7],
                  [19, 0],
                  [21.7, 1.8],
                  [27.1, 0],
                  [24.5, 0],
                  [27.1, 0],
                  [29.9, 1.5],
                  [27.1, .8],
                  [22.1, 2]
               ]
            }, {
               name: "Sample B",
               data: [
                  [6.4, 13.4],
                  [1.7, 11],
                  [5.4, 8],
                  [9, 17],
                  [1.9, 4],
                  [3.6, 12.2],
                  [1.9, 14.4],
                  [1.9, 9],
                  [1.9, 13.2],
                  [1.4, 7],
                  [6.4, 8.8],
                  [3.6, 4.3],
                  [1.6, 10],
                  [9.9, 2],
                  [7.1, 15],
                  [1.4, 0],
                  [3.6, 13.7],
                  [1.9, 15.2],
                  [6.4, 16.5],
                  [.9, 10],
                  [4.5, 17.1],
                  [10.9, 10],
                  [.1, 14.7],
                  [9, 10],
                  [12.7, 11.8],
                  [2.1, 10],
                  [2.5, 10],
                  [27.1, 10],
                  [2.9, 11.5],
                  [7.1, 10.8],
                  [2.1, 12]
               ]
            }, {
               name: "Sample C",
               data: [
                  [21.7, 3],
                  [23.6, 3.5],
                  [24.6, 3],
                  [29.9, 3],
                  [21.7, 20],
                  [23, 2],
                  [10.9, 3],
                  [28, 4],
                  [27.1, .3],
                  [16.4, 4],
                  [13.6, 0],
                  [19, 5],
                  [22.4, 3],
                  [24.5, 3],
                  [32.6, 3],
                  [27.1, 4],
                  [29.6, 6],
                  [31.6, 8],
                  [21.6, 5],
                  [20.9, 4],
                  [22.4, 0],
                  [32.6, 10.3],
                  [29.7, 20.8],
                  [24.5, .8],
                  [21.4, 0],
                  [21.7, 6.9],
                  [28.6, 7.7],
                  [15.4, 0],
                  [18.1, 0],
                  [33.4, 0],
                  [16.4, 0]
               ]
            }],
            xaxis: {
               tickAmount: 10
            },
            yaxis: {
               tickAmount: 7
            },
            colors: colors,
            grid: {
               borderColor: "#f1f3fa",
               padding: {
                  bottom: 10
               }
            },
            legend: {
               offsetY: 7
            },
            responsive: [{
               breakpoint: 600,
               options: {
                  chart: {
                     toolbar: {
                        show: !1
                     }
                  },
                  legend: {
                     show: !1
                  }
               }
            }]
         };
         (chart = new ApexCharts(document.querySelector("#apex-scatter-1"), options)).render();
         colors = ["#1abc9c", "#f672a7", "#6c757d", "#6658dd", "#6559cc"];
         (dataColors = $("#apex-scatter-2").data("colors")) && (colors = dataColors.split(","));
         options = {
            chart: {
               height: 380,
               type: "scatter",
               zoom: {
                  type: "xy"
               }
            },
            series: [{
               name: "Team 1",
               data: generateDayWiseTimeSeries(new Date("11 Feb 2017 GMT").getTime(), 20, {
                  min: 10,
                  max: 60
               })
            }, {
               name: "Team 2",
               data: generateDayWiseTimeSeries(new Date("11 Feb 2017 GMT").getTime(), 20, {
                  min: 10,
                  max: 60
               })
            }, {
               name: "Team 3",
               data: generateDayWiseTimeSeries(new Date("11 Feb 2017 GMT").getTime(), 30, {
                  min: 10,
                  max: 60
               })
            }, {
               name: "Team 4",
               data: generateDayWiseTimeSeries(new Date("11 Feb 2017 GMT").getTime(), 10, {
                  min: 10,
                  max: 60
               })
            }, {
               name: "Team 5",
               data: generateDayWiseTimeSeries(new Date("11 Feb 2017 GMT").getTime(), 30, {
                  min: 10,
                  max: 60
               })
            }],
            dataLabels: {
               enabled: !1
            },
            colors: colors,
            grid: {
               borderColor: "#f1f3fa",
               xaxis: {
                  showLines: !0
               },
               yaxis: {
                  showLines: !0
               },
               padding: {
                  bottom: 10
               }
            },
            legend: {
               offsetY: 7
            },
            xaxis: {
               type: "datetime"
            },
            yaxis: {
               max: 70
            },
            responsive: [{
               breakpoint: 600,
               options: {
                  chart: {
                     toolbar: {
                        show: !1
                     }
                  },
                  legend: {
                     show: !1
                  }
               }
            }]
         };

         function generateDayWiseTimeSeries(e, o, t) {
            for (var a = 0, r = []; a < o;) {
               var s = Math.floor(Math.random() * (t.max - t.min + 1)) + t.min;
               r.push([e, s]), e += 864e5, a++
            }
            return r
         }(chart = new ApexCharts(document.querySelector("#apex-scatter-2"), options)).render();
         colors = ["#6658dd", "#1abc9c"];
         (dataColors = $("#apex-candlestick-1").data("colors")) && (colors = dataColors.split(","));
         options = {
            chart: {
               height: 400,
               type: "candlestick"
            },
            plotOptions: {
               candlestick: {
                  colors: {
                     upward: colors[0],
                     downward: colors[1]
                  }
               }
            },
            series: [{
               data: seriesData
            }],
            stroke: {
               show: !0,
               colors: "#f1f3fa",
               width: [1, 4]
            },
            xaxis: {
               type: "datetime"
            },
            grid: {
               borderColor: "#f1f3fa"
            }
         };
         (chart = new ApexCharts(document.querySelector("#apex-candlestick-1"), options)).render();
         colors = ["#6658dd", "#f7b84b"];
         (dataColors = $("#apex-candlestick-2").data("colors")) && (colors = dataColors.split(","));
         var optionsCandlestick = {
               chart: {
                  height: 240,
                  type: "candlestick",
                  toolbar: {
                     show: !1
                  },
                  zoom: {
                     enabled: !1
                  }
               },
               series: [{
                  data: seriesData
               }],
               plotOptions: {
                  candlestick: {
                     colors: {
                        upward: colors[0],
                        downward: colors[1]
                     }
                  }
               },
               xaxis: {
                  type: "datetime"
               },
               grid: {
                  borderColor: "#f1f3fa"
               }
            },
            chartCandlestick = new ApexCharts(document.querySelector("#apex-candlestick-2"), optionsCandlestick);
         chartCandlestick.render();
         colors = ["#f45454", "#37cde6"];
         (dataColors = $("#apex-candlestick-3").data("colors")) && (colors = dataColors.split(","));
         options = {
            chart: {
               height: 160,
               type: "bar",
               toolbar: {
                  show: !1,
                  autoSelected: "selection"
               },
               selection: {
                  xaxis: {
                     min: new Date("20 Jan 2017").getTime(),
                     max: new Date("10 Dec 2017").getTime()
                  },
                  fill: {
                     color: "#6c757d",
                     opacity: .4
                  },
                  stroke: {
                     color: "#6c757d"
                  }
               },
               events: {
                  selection: function (e, o) {
                     chartCandlestick.updateOptions({
                        xaxis: {
                           min: o.xaxis.min,
                           max: o.xaxis.max
                        }
                     }, !1, !1)
                  }
               }
            },
            dataLabels: {
               enabled: !1
            },
            plotOptions: {
               bar: {
                  columnWidth: "80%",
                  colors: {
                     ranges: [{
                        from: -1e3,
                        to: 0,
                        color: colors[0]
                     }, {
                        from: 1,
                        to: 1e4,
                        color: colors[1]
                     }]
                  }
               }
            },
            series: [{
               name: "volume",
               data: seriesDataLinear
            }],
            xaxis: {
               type: "datetime",
               axisBorder: {
                  offsetX: 13
               }
            },
            yaxis: {
               labels: {
                  show: !1
               }
            },
            grid: {
               borderColor: "#f1f3fa"
            }
         };
         (chart = new ApexCharts(document.querySelector("#apex-candlestick-3"), options)).render();
         colors = ["#6658dd", "#4fc6e1", "#4a81d4", "#00b19d", "#f1556c"];
         (dataColors = $("#apex-pie-1").data("colors")) && (colors = dataColors.split(","));
         options = {
            chart: {
               height: 350,
               type: "pie"
            },
            series: {{  $data['job_attitudes_count'] }},
            labels: {!! $data['job_attitudes_names'] !!},
            colors: colors,
            legend: {
               show: !0,
               position: "bottom",
               horizontalAlign: "center",
               verticalAlign: "middle",
               floating: !1,
               fontSize: "14px",
               offsetX: 0,
               offsetY: 7
            },
            responsive: [{
               breakpoint: 600,
               options: {
                  chart: {
                     height: 240
                  },
                  legend: {
                     show: !1
                  }
               }
            }]
         };
         (chart = new ApexCharts(document.querySelector("#apex-pie-1"), options)).render();
         colors = ["#6658dd", "#4fc6e1", "#4a81d4", "#00b19d", "#f1556c"];
         (dataColors = $("#apex-pie-2").data("colors")) && (colors = dataColors.split(","));
         options = {
            chart: {
               height: 320,
               type: "donut"
            },
            series: {{  $data['job_attitudes_count'] }},
            legend: {
               show: !0,
               position: "bottom",
               horizontalAlign: "center",
               verticalAlign: "middle",
               floating: !1,
               fontSize: "14px",
               offsetX: 0,
               offsetY: 7
            },
            labels:  {!! $data['job_attitudes_names'] !!},
            colors: colors,
            responsive: [{
               breakpoint: 600,
               options: {
                  chart: {
                     height: 240
                  },
                  legend: {
                     show: !1
                  }
               }
            }],
            fill: {
               type: "gradient"
            }
         };
         (chart = new ApexCharts(document.querySelector("#apex-pie-2"), options)).render();

         colors = ["#6658dd", "#e36498", "#23b397", "#f7b84b"];
         (dataColors = $("#apex-radialbar-2").data("colors")) && (colors = dataColors.split(","));
         options = {
            chart: {
               height: 350,
               type: "radialBar"
            },
            plotOptions: {
               radialBar: {
                  dataLabels: {
                     name: {
                        fontSize: "22px"
                     },
                     value: {
                        fontSize: "16px"
                     },
                     total: {
                        show: !0,
                        label: "Total",
                        formatter: function (e) {
                           return 249
                        }
                     }
                  }
               }
            },
            colors: colors,
            series: [44, 55, 67, 83],
            labels: ["Apples", "Oranges", "Bananas", "Berries"]
         };

         var dataColors;
         colors = ["#f1556c"];
         (dataColors = $("#apex-radialbar-3").data("colors")) && (colors = dataColors.split(","));
         var chart;
         options = {
            chart: {
               height: 375,
               type: "radialBar"
            },
            plotOptions: {
               radialBar: {
                  startAngle: -135,
                  endAngle: 135,
                  dataLabels: {
                     name: {
                        fontSize: "16px",
                        color: void 0,
                        offsetY: 120
                     },
                     value: {
                        offsetY: 76,
                        fontSize: "22px",
                        color: void 0,
                        formatter: function (e) {
                           return e + "%"
                        }
                     }
                  }
               }
            },
            fill: {
               gradient: {
                  enabled: !0,
                  shade: "dark",
                  shadeIntensity: .15,
                  inverseColors: !1,
                  opacityFrom: 1,
                  opacityTo: 1,
                  stops: [0, 50, 65, 91]
               }
            },
            stroke: {
               dashArray: 4
            },
            colors: colors,
            series: [67],
            labels: ["Median Ratio"],
            responsive: [{
               breakpoint: 380,
               options: {
                  chart: {
                     height: 280
                  }
               }
            }]
         };
         (chart = new ApexCharts(document.querySelector("#apex-radialbar-3"), options)).render();

    </script>

    <script>
        function hexToRGB(a, r) {
            var e = parseInt(a.slice(1, 3), 16),
                t = parseInt(a.slice(3, 5), 16),
                o = parseInt(a.slice(5, 7), 16);
            return r ? "rgba(" + e + ", " + t + ", " + o + ", " + r + ")" : "rgb(" + e + ", " + t + ", " + o + ")"
        }! function(d) {
            "use strict";

            function a() {
                this.$body = d("body"), this.charts = []
            }
            a.prototype.respChart = function(r, e, t, o) {
                var n = r.get(0).getContext("2d"),
                    l = d(r).parent();
                return Chart.defaults.global.defaultFontColor = "#8391a2", Chart.defaults.scale.gridLines.color =
                    "#8391a2",
                    function() {
                        var a;
                        switch (r.attr("width", d(l).width()), e) {
                            case "Line":
                                a = new Chart(n, {
                                    type: "line",
                                    data: t,
                                    options: o
                                });
                                break;
                            case "Doughnut":
                                a = new Chart(n, {
                                    type: "doughnut",
                                    data: t,
                                    options: o
                                });
                                break;
                            case "Pie":
                                a = new Chart(n, {
                                    type: "pie",
                                    data: t,
                                    options: o
                                });
                                break;
                            case "Bar":
                                a = new Chart(n, {
                                    type: "bar",
                                    data: t,
                                    options: o
                                });
                                break;
                            case "Radar":
                                a = new Chart(n, {
                                    type: "radar",
                                    data: t,
                                    options: o
                                });
                                break;
                            case "PolarArea":
                                a = new Chart(n, {
                                    data: t,
                                    type: "polarArea",
                                    options: o
                                })
                        }
                        return a
                    }()
            }, a.prototype.initCharts = function() {
                var a = [],
                    r = ["#1abc9c", "#f1556c", "#4a81d4", "#e3eaef"];
                if (0 < d("#line-chart-example").length) {
                    var e = {
                        labels: {!! $data['efficiencies_names'] !!},
                        datasets: [{

                            label: "الكفاءة",
                            backgroundColor: hexToRGB((s = (i = d("#line-chart-example").data("colors")) ? i
                                .split(",") : r.concat())[0], .3),
                            borderColor: s[0],
                            data: {{ $data['efficiencies_count'] }}
                        }]
                    };
                    a.push(this.respChart(d("#line-chart-example"), "Line", e, {
                        maintainAspectRatio: !1,
                        legend: {
                            display: !1
                        },
                        tooltips: {
                            intersect: !1
                        },
                        hover: {
                            intersect: !0
                        },
                        plugins: {
                            filler: {
                                propagate: !1
                            }
                        },
                        scales: {
                            xAxes: [{
                                reverse: !0,
                                gridLines: {
                                    color: "rgba(0,0,0,0.05)"
                                },
                                ticks: {
                                    autoSkip: false,
                                    maxRotation: 45,
                                    minRotation: 45
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    stepSize: 20
                                },
                                display: !0,
                                borderDash: [5, 5],
                                gridLines: {
                                    color: "rgba(0,0,0,0)",
                                    fontColor: "#fff"
                                }
                            }]
                        }
                    }))
                }


                if (0 < d("#radar-chart-example").length) {
                    var i, s, c = {
                        labels: ["Eating", "Drinking", "Sleeping", "Designing", "Coding", "Cycling", "Running"],
                        datasets: [{
                            label: "Desktops",
                            backgroundColor: hexToRGB((s = (i = d("#radar-chart-example").data("colors")) ?
                                i.split(",") : r.concat())[0], .3),
                            borderColor: s[0],
                            pointBackgroundColor: s[0],
                            pointBorderColor: "#fff",
                            pointHoverBackgroundColor: "#fff",
                            pointHoverBorderColor: s[0],
                            data: [65, 59, 90, 81, 56, 55, 40]
                        }, {
                            label: "Tablets",
                            backgroundColor: hexToRGB(s[1], .3),
                            borderColor: s[1],
                            pointBackgroundColor: s[1],
                            pointBorderColor: "#fff",
                            pointHoverBackgroundColor: "#fff",
                            pointHoverBorderColor: s[1],
                            data: [28, 48, 40, 19, 96, 27, 100]
                        }]
                    };
                    a.push(this.respChart(d("#radar-chart-example"), "Radar", c, {
                        maintainAspectRatio: !1
                    }))
                }
                return a

            }, a.prototype.init = function() {
                var r = this;
                Chart.defaults.global.defaultFontFamily = "Nunito,sans-serif", r.charts = this.initCharts(), d(window)
                    .on("resize", function(a) {
                        d.each(r.charts, function(a, r) {
                            try {
                                r.destroy()
                            } catch (a) {}
                        }), r.charts = r.initCharts()
                    })
            }, d.ChartJs = new a, d.ChartJs.Constructor = a
        }(window.jQuery),
        function() {
            "use strict";
            window.jQuery.ChartJs.init()
        }();
    </script>


@endsection
