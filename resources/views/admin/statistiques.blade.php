<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets2/vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="icon" href="{{ asset('assets/images/logo/logo.png') }}" />
    <link href="{{ asset('assets2/vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets2/libs/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/vendor/fonts/fontawesome/css/fontawesome-all.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/vendor/charts/chartist-bundle/chartist.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/vendor/charts/morris-bundle/morris.css') }}">
    <link rel="stylesheet"
        href="{{ asset('assets2/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/vendor/charts/c3charts/c3.css') }}">
    <link rel="stylesheet" href="{{ asset('assets2/vendor/fonts/flag-icon-css/flag-icon.min.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Statistiques</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper" style="margin-left: 0;">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    <!-- ============================================================== -->
                    <!-- pageheader  -->
                    <!-- ============================================================== -->
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Dashboard RH </h2>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">

                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end pageheader  -->
                    <!-- ============================================================== -->
                    <div class="ecommerce-widget">
                        <div class="row">
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted" style="margin: 0;">Effectif actuel</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1" style="margin: 0;">{{ $effectif }}</h1>
                                        </div>
                                        <div class="metric-value">
                                            <h1 class="mb-1" style="font-size: 14px;">Période : {{ $mois }}
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted" style="margin: 0;">Masse Salariale</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1" style="margin: 0;">Ar {{ $masseSalariale }}</h1>
                                        </div>
                                        <div class="metric-value">
                                            <h1 class="mb-1" style="font-size: 14px;">Période : 2023</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted" style="margin: 0;">Turn-over</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1" style="margin: 0;">{{ $turnOver }} %</h1>
                                        </div>
                                        <div class="metric-value">
                                            <h1 class="mb-1" style="font-size: 14px;">Période : 2023</h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="text-muted" style="margin: 0;">Absentéisme</h5>
                                        <div class="metric-value d-inline-block">
                                            <h1 class="mb-1" style="margin: 0;">{{$absenteisme}} %</h1>
                                        </div>
                                        <div class="metric-value">
                                            <h1 class="mb-1" style="font-size: 14px;">Période : {{ $mois }}
                                            </h1>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <!-- ============================================================== -->
                            <!-- pie chart  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Effectif par département </h5>
                                    <div class="card-body">
                                        <canvas id="donut" style="width: 300px; height:300px;"
                                            class="small"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end pie chart  -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- dount chart  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Par genre </h5>
                                    <div class="card-body">
                                        <canvas id="pie" style="width: 300px; height:300px;"
                                            class="small"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end dount chart  -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- dount gauge  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Par contrat </h5>
                                    <div class="card-body">
                                        <canvas id="bar" style="width: 300px; height:300px;"
                                            class="small"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end dount gauge  -->
                            <!-- ============================================================== -->
                        </div>

                        <div class="row">
                            <!-- ============================================================== -->

                            <!-- ============================================================== -->

                            <!-- recent orders  -->
                            <!-- ============================================================== -->
                            <div class="col-lg-12 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <h5 class="card-header">Nouveaux employés</h5>
                                    <div class="card-body p-0">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead class="bg-light">
                                                    <tr class="border-0">
                                                        <th class="border-0">#</th>
                                                        <th class="border-0">Image</th>
                                                        <th class="border-0">Nom</th>
                                                        <th class="border-0">Prénom</th>
                                                        <th class="border-0">Sexe</th>
                                                        <th class="border-0">Département</th>
                                                        <th class="border-0">Poste</th>
                                                        <th class="border-0">Type Contrat</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($newestEmployee as $key => $emp)
                                                        <tr>
                                                            <td>{{ $key + 1 }}</td>
                                                            <td>
                                                                <div class="m-r-10">
                                                                    <img style="width: 25px;" src="{{ asset('assets/images/icon/profil.png') }}"
                                                                        alt="user" class="rounded"
                                                                        width="45">
                                                                </div>
                                                            </td>
                                                            <td>{{ $emp->nom }} </td>
                                                            <td>{{ $emp->prenom }} </td>
                                                            <td>{{ $emp->genre }}</td>
                                                            <td>{{ $emp->departement }}</td>
                                                            <td>{{ $emp->poste }}</td>
                                                            <td>{{ $emp->contrat }} </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end recent orders  -->

                        </div>
                        <div class="row">
                            <!-- ============================================================== -->
                            <!-- product category  -->
                            <!-- ============================================================== -->
                            <!-- ============================================================== -->
                            <!-- end product category  -->
                            <!-- product sales  -->
                            <!-- ============================================================== -->
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <!-- <div class="float-right">
                                                <select class="custom-select">
                                                    <option selected>Today</option>
                                                    <option value="1">Weekly</option>
                                                    <option value="2">Monthly</option>
                                                    <option value="3">Yearly</option>
                                                </select>
                                            </div> -->
                                        <h5 class="mb-0"> Total dépenses salariales par département</h5>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="barSalaire" style="width: 300px; height:300px;"
                                        class="small"></canvas>
                                    </div>
                                </div>
                            </div>
                            <!-- ============================================================== -->
                            <!-- end product sales  -->
                            <!-- ============================================================== -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- end wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <!-- jquery 3.3.1 -->
    <script src="{{ asset('assets2/vendor/jquery/jquery-3.3.1.min.js') }}"></script>
    <!-- bootstap bundle js -->
    <script src="{{ asset('assets2/vendor/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <!-- slimscroll js -->
    <script src="{{ asset('assets2/vendor/slimscroll/jquery.slimscroll.js') }}"></script>
    <!-- main js -->
    <script src="{{ asset('assets2/libs/js/main-js.js') }}"></script>
    <!-- chart chartist js -->
    <script src="{{ asset('assets2/vendor/charts/chartist-bundle/chartist.min.js') }}"></script>
    <!-- sparkline js -->
    <script src="{{ asset('assets2/vendor/charts/sparkline/jquery.sparkline.js') }}"></script>
    <!-- morris js -->
    <script src="{{ asset('assets2/vendor/charts/morris-bundle/raphael.min.js') }}"></script>
    <script src="{{ asset('assets2/vendor/charts/morris-bundle/morris.js') }}"></script>
    <!-- chart c3 js -->
    <script src="{{ asset('assets2/vendor/charts/c3charts/c3.min.js') }}"></script>
    <script src="{{ asset('assets2/vendor/charts/c3charts/d3-5.4.0.min.js') }}"></script>
    <script src="{{ asset('assets2/vendor/charts/c3charts/C3chartjs.js') }}"></script>
    <script src="{{ asset('assets2/libs/js/dashboard-ecommerce.js') }}"></script>

    <script>
        var effectif = @json($effectifDept);
        var nbGenre = @json($nbreGenre);
        var effectifContrat = @json($nbreEffectifContrat);
        var depenseSalaireDept = @json($salaireDept);
        console.log(depenseSalaireDept);
    </script>

    <script src="{{ asset('assets2/vendor/charts/chart_perso.js') }}"></script>
</body>

</html>
