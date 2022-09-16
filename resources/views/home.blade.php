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
                {{-- الموقف من العمل --}}
                <div class="col-xl-4 col-differ">
                    <!-- Portlet card -->
                    <div class="card chart">
                        <div class="card-body">
                            <div class="card-widgets">
                                <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                <a data-bs-toggle="collapse" href="#cardCollpase19" role="button" aria-expanded="false"
                                    aria-controls="cardCollpase19"><i class="mdi mdi-minus"></i></a>
                                <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                            </div>
                            <h4 class="header-title mb-0"> الموقف من العمل</h4>

                            <div id="cardCollpase19" class="collapse pt-3 show" dir="ltr">
                                <div id="apex-pie-123" class="apex-charts"
                                    data-colors="#cea120,#4fc6e1,#705915,#00b19d,#f1556c"></div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- الوظيفه ع الكادر --}}
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
                                <div id="apex-mixed-128" class="apex-charts" data-colors="#cea120,#cea120"></div>
                            </div> <!-- collapsed end -->
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div>

            </div>
            <div class="row">
                {{-- الكفاءه --}}
                {{--  <div class="col-xl-4 col-differ">
                    <div class="card chart">
                        <div class="card-body">
                            <div class="card-widgets">
                                <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                <a data-bs-toggle="collapse" href="#cardCollpase7" role="button" aria-expanded="false"
                                    aria-controls="cardCollpase7"><i class="mdi mdi-minus"></i></a>
                                <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                            </div>
                            <h4 class="header-title mb-0"> الكفاءه </h4>


                            <div id="cardCollpase7" class="collapse pt-3 show" dir="ltr">
                                <div id="apex-mixed-127" class="apex-charts" data-colors="#cea120,#cea120"></div>
                            </div> <!-- collapsed end -->
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div>  --}}
                <div class="col-xl-4">
                    <!-- Portlet card -->
                    <div class="card">
                        <div class="card-body">
                            <div class="card-widgets">
                                <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                <a data-bs-toggle="collapse" href="#cardCollpase18" role="button" aria-expanded="false" aria-controls="cardCollpase18"><i class="mdi mdi-minus"></i></a>
                                <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                            </div>
                            <h4 class="header-title mb-0">  الكفاءه</h4>

                            <div id="cardCollpase18" class="collapse pt-3 show" dir="ltr">
                                <div id="apex-pie-155" class="apex-charts" data-colors="#6658dd,#4fc6e1,#4a81d4,#00b19d,#f1556c"></div>
                            </div> <!-- collapsed end -->
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div>

                {{-- المجموعه النوعيه --}}
                <div class="col-xl-8 col-differ">
                    <div class="card chart">
                        <div class="card-body">
                            <div class="card-widgets">
                                <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                <a data-bs-toggle="collapse" href="#cardCollpase7" role="button" aria-expanded="false"
                                    aria-controls="cardCollpase7"><i class="mdi mdi-minus"></i></a>
                                <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                            </div>
                            <h4 class="header-title mb-0"> المجموعة النوعية</h4>

                            <div id="cardCollpase7" class="collapse pt-3 show" dir="ltr">
                                <div id="apex-mixed-126" class="apex-charts" data-colors="#cea120,#cea120"></div>
                            </div> <!-- collapsed end -->
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div>

            </div>
            <div class="row">
                {{-- التخصصات --}}
                <div class="col-xl-12 col-differ">
                    <div class="card chart">
                        <div class="card-body">
                            <div class="card-widgets">
                                <a href="javascript: void(0);" data-toggle="reload"><i class="mdi mdi-refresh"></i></a>
                                <a data-bs-toggle="collapse" href="#cardCollpase7" role="button" aria-expanded="false"
                                    aria-controls="cardCollpase7"><i class="mdi mdi-minus"></i></a>
                                <a href="javascript: void(0);" data-toggle="remove"><i class="mdi mdi-close"></i></a>
                            </div>
                            <h4 class="header-title mb-0"> التخصصات </h4>


                            <div id="cardCollpase7" class="collapse pt-3 show" dir="ltr">
                                <div id="apex-mixed-125" class="apex-charts" data-colors="#cea120,#cea120"></div>
                            </div> <!-- collapsed end -->
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div>
            </div>
            <div class="row">
                {{-- الموهلات --}}

                <div class="col-xl-12 col-differ">
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
                                <div id="apex-mixed-124" class="apex-charts" data-colors="#cea120,#cea120"></div>
                            </div> <!-- collapsed end -->
                        </div> <!-- end card-body -->
                    </div> <!-- end card-->
                </div>

            </div>
            <div class="row">
                {{-- الوظيفه --}}
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
                                <div id="apex-mixed-129" class="apex-charts" data-colors="#cea120,#cea120"></div>
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
        <script src="{{ asset('assets/libs/apexcharts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('assets/js/pages/irregular-data-series.js') }}"></script>
        <script src="{{ asset('assets/js/pages/ohlc.js') }}"></script>

        <script>
            Apex.grid = {
                padding: {
                    right: 0,
                    left: 0
                }
            }, Apex.dataLabels = {
                enabled: !1
            };
            var randomizeArray = function(e) {
                    for (var o, t, a = e.slice(), r = a.length; 0 !== r;) t = Math.floor(Math.random() * r), o = a[--r], a[r] =
                        a[t], a[t] = o;
                    return a
                },
                sparklineData = [47, 45, 54, 38, 56, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19,
                    46
                ],
                colorPalette = ["#00D8B6", "#008FFB", "#FEB019", "#FF4560", "#775DD0"],


                colors = ["#cea120", "#cea120"];

            colors = ["#cea120", "#cea120", "#cea120", "#cea120", "#cea120"];
            (dataColors = $("#apex-pie-123").data("colors")) && (colors = dataColors.split(","));
            options = {
                chart: {
                    height: 320,
                    type: "donut"
                },
                series: {{ $data['job_attitudes_count'] }},
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
                grid: {
                    padding: {
                      left: 20,
                      right: 20
                    }
                  },
                labels: {!! $data['job_attitudes_names'] !!},
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
            (chart = new ApexCharts(document.querySelector("#apex-pie-123"), options)).render();

            // الكفاءه
            (dataColors = $("#apex-pie-155").data("colors")) && (colors = dataColors.split(","));
            options = {
               chart: {
                  height: 320,
                  type: "pie"
               },
               series: {{ $data['efficiencies_count'] }},
               labels:  {!! $data['efficiencies_names'] !!},
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
            (chart = new ApexCharts(document.querySelector("#apex-pie-155"), options)).render();

            (dataColors = $("#apex-mixed-124").data("colors"));
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
                    data: {{ $data['jobs_count'] }},
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
                grid: {
                    padding: {
                      left: 20,
                      right: 20
                    }
                  },
                yaxis: [{
                    title: {
                        text: "العدد"
                    }
                }],
                tooltip: {
                    shared: !0,
                    intersect: !1,
                    y: {
                        formatter: function(e) {
                            return void 0 !== e ? e.toFixed(0) + "" : e
                        }
                    }
                },
                legend: {
                    offsetY: 7
                }
            };

            (chart = new ApexCharts(document.querySelector("#apex-mixed-124"), options)).render();
            colors = ["#cea120", "#cea120"];
            (dataColors = $("#apex-mixed-129").data("colors"));
            options = {
                chart: {
                    height: 290,
                    type: "line"
                },
                stroke: {
                    width: 2,
                    curve: "smooth"
                },
                series: [{
                    name: "عدد المعلمين",
                    type: "line",
                    data: {{ $data['jobs_count'] }},
                }],
                colors: colors,
                fill: {
                    type: "solid",
                    opacity: [1, 1]
                },
                labels: {!! $data['jobs_names'] !!},
                markers: {

                    size: 3,
                    colors: ['#fff'],
                    strokeColors: '#cea120',
                    strokeWidth: 2,
                    strokeOpacity: 0.9,
                    strokeDashArray: 0,
                    fillOpacity: 1,
                    discrete: [],
                    shape: "circle",
                    radius: 2,
                    offsetX: 0,
                    offsetY: 0,
                    onClick: undefined,
                    onDblClick: undefined,
                    showNullDataPoints: true,
                    hover: {
                      size: undefined,
                      sizeOffset: 3
                    }
                },
                grid: {
                    padding: {
                      left: 20,
                      right: 20
                    }
                  },
                yaxis: [{
                    title: {
                        text: "العدد"
                    }
                }],
                tooltip: {
                    shared: !0,
                    intersect: !1,
                    y: {
                        formatter: function(e) {
                            return void 0 !== e ? e.toFixed(0) + "" : e
                        }
                    }
                },
                legend: {
                    offsetY: 7
                }
            };
            (chart = new ApexCharts(document.querySelector("#apex-mixed-129"), options)).render();
            (dataColors = $("#apex-mixed-126").data("colors"));
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
                    data: {{ $data['group_types_count'] }},
                }],
                colors: colors,
                fill: {
                    type: "solid",
                    opacity: [1, 1]
                },
                labels: {!! $data['group_types_names'] !!},
                markers: {
                    {{--  colors: ['#9c94e9'],
                    size: 8,  --}}
                },
                yaxis: [{
                    title: {
                        text: "العدد"
                    }
                }],

                tooltip: {
                    shared: !0,
                    intersect: !1,
                    y: {
                        formatter: function(e) {
                            return void 0 !== e ? e.toFixed(0) + "" : e
                        }
                    }
                },
                legend: {
                    offsetY: 7
                },
                grid: {
                    padding: {
                      left: 20,
                      right: 20
                    }
                  }

            };
            (chart = new ApexCharts(document.querySelector("#apex-mixed-126"), options)).render();
            colors = ["#cea120", "#CED4DC"];
            (dataColors = $("#apex-mixed-128").data("colors"));
            options = {
                chart: {
                    height: 290,
                    type: "line"
                },
                stroke: {
                    width: 5,
                    curve: "smooth"
                },
                dataLabels: {
                    {{--  enabled: true,
                    style: {
                        colors: ['#b9911d']
                    }  --}}

                },
                series: [{
                    name: "عدد المعلمين",
                    type: "line",
                    data: {{ $data['job_staff_count'] }},
                }],
                colors: colors,
                fill: {
                    type: "solid",
                    opacity: [1, 1]
                },
                labels: {!! $data['job_staff_names'] !!},
                markers: {
                    {{--  colors: ['#b9911d'],
                    size: 5,  --}}
                },
                yaxis: [{
                    title: {
                        text: "العدد"
                    }
                }],
                tooltip: {
                    shared: !0,
                    intersect: !1,
                    y: {
                        formatter: function(e) {
                            return void 0 !== e ? e.toFixed(0) + "" : e
                        }
                    }
                },
                legend: {
                    offsetY: 7
                },
                grid: {
                    padding: {
                      left: 20,
                      right: 20
                    }
                  }
            };
            (chart = new ApexCharts(document.querySelector("#apex-mixed-128"), options)).render();
            (dataColors = $("#apex-mixed-127").data("colors"));
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
                    data: {{ $data['efficiencies_count'] }},
                }],
                colors: colors,
                fill: {
                    type: "solid",
                    opacity: [1, 1]
                },
                labels: {!! $data['efficiencies_names'] !!},
                markers: {
                     {{--  colors: ['#9c94e9'],
                    size: 8,  --}}
                },
                yaxis: [{
                    title: {
                        text: "العدد"
                    }
                }],
                tooltip: {
                    shared: !0,
                    intersect: !1,
                    y: {
                        formatter: function(e) {
                            return void 0 !== e ? e.toFixed(0) + "" : e
                        }
                    }
                },
                legend: {
                    offsetY: 7
                },
                grid: {
                    padding: {
                      left: 20,
                      right: 20
                    }
                  }
            };
            (chart = new ApexCharts(document.querySelector("#apex-mixed-127"), options)).render();


            (dataColors = $("#apex-mixed-125").data("colors"));
            options = {
                chart: {
                    height: 290,
                    type: "line",
                },
                stroke: {
                    width: 5,
                    curve: "smooth"
                },
                dataLabels: {
                    {{--  enabled: true,
                    style: {
                        colors: ['#9c94e9']
                    }  --}}
                },
                series: [{
                    name: "عدد المعلمين",
                    type: "line",
                    data: {{ $data['subjects_count'] }},
                }],
                colors: colors,
                fill: {
                    colors: ['#F44336', '#E91E63', '#9C27B0'],
                    type: "solid",
                    opacity: [1, 1]
                },

                labels: {!! $data['subjects_names'] !!},
                markers: {
                  size:0
                },
                yaxis: [{
                    title: {
                        text: "العدد"
                    }
                }],

                tooltip: {
                    shared: !0,
                    intersect: !1,
                    y: {
                        formatter: function(e) {
                            return void 0 !== e ? e.toFixed(0) + "" : e
                        }
                    }
                },
                legend: {
                    offsetY: 7
                },
                grid: {
                    padding: {
                      left: 20,
                      right: 20
                    }
                  }
            };
            (chart = new ApexCharts(document.querySelector("#apex-mixed-125"), options)).render();
        </script>
    @endsection
