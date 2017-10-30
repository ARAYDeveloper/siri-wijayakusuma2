<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIRI</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/datepicker3.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-table.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}">
    <link href="{{asset('plugins/select2/select2.min.css')}}" rel="stylesheet" type="text/css"/>

    <!--Icons-->
    <script src="{{asset('js/lumino.glyphs.js')}}"></script>

    <link rel="stylesheet" href="{{asset('css/navbar.css')}}">

    <!--[if lt IE 9]>
    <script src="{{asset('js/html5shiv.js')}}"></script>
    <script src="{{asset('js/respond.min.js')}}"></script>
    <![endif]-->

    @yield('head-css')

</head>

<body>
<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- logo -->
            <a class="navbar-brand" href="#"><span>Sistem Informasi</span> Rawat Inap</a>
        </div>
        <div class="collapse navbar-collapse animated fadeIn" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav animated fadeIn text16">
                <li><a href="/adm_dash">Dashboard</a></li>

                @if(Auth::user()->keuserlevel->level == 'petugas')
                <li><a href="/riwayat"><span class="glyphicon glyphicon-user"></span> Pasien</a></li>
                @endif

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                class="glyphicon glyphicon-list-alt"></span> Laporan <span class="caret"></span></a>
                    <ul class="dropdown-menu animated flipInX" role="menu">
                        <li><a href="/adm_lap_in"><span class="glyphicon glyphicon-th-list"></span> Laporan Internal</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="/adm_lap_ex_rl12">
                                <span class="glyphicon glyphicon-th-list"></span> Laporan Ext. RL 1.2
                            </a>
                        </li>
                        <li>
                            <a href="/adm_lap_ex_rl13">
                                <span class="glyphicon glyphicon-th-list"></span> Laporan Ext. RL 1.3
                            </a>
                        </li>
                        <li>
                            <a href="/adm_lap_ex_rl31">
                                <span class="glyphicon glyphicon-th-list"></span> Laporan Ext. RL 3.1
                            </a>
                        </li>
                        <li>
                            <a href="/adm_lap_ex_rl4a">
                                <span class="glyphicon glyphicon-th-list"></span> Laporan Ext. RL 4a
                            </a>
                        </li>
                        <li>
                            <a href="/adm_lap_ex_rl53">
                                <span class="glyphicon glyphicon-th-list"></span> Laporan Ext. RL 53
                            </a>
                        </li>
                    </ul>
                </li>

                @if(Auth::user()->keuserlevel->level == 'petugas')
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                class="glyphicon glyphicon-book"></span> Transaksi <span class="caret"></span></a>
                    <ul class="dropdown-menu animated flipInX" role="menu">
                        <li><a href="/adm_t_pas_masuk"><span class="glyphicon glyphicon-circle-arrow-right"></span>
                                Pasien Masuk</a></li>
                        <li><a href="/adm_t_pas_keluar"><span class="glyphicon glyphicon-circle-arrow-left"></span>
                                Pasien Keluar</a></li>
                    </ul>
                </li>
                @endif

                @if(Auth::user()->keuserlevel->level == 'petugas')
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                class="glyphicon glyphicon-wrench"></span> Data Master <span class="caret"></span></a>
                    <ul class="dropdown-menu animated flipInX" role="menu">
                        <li>
                            <a class="" href="/layanan">
                                <span class="glyphicon glyphicon-folder-open"></span> Jenis Pelayanan
                            </a>
                        </li>
                        <li>
                            <a class="" href="/bayar">
                                <span class="glyphicon glyphicon-folder-open"></span> Jenis Pembayaran
                            </a>
                        </li>
                        <li>
                            <a class="" href="/kamar">
                                <span class="glyphicon glyphicon-folder-open"></span> Data Kamar
                            </a>
                        </li>
                        <li>
                            <a class="" href="/pasien">
                                <span class="glyphicon glyphicon-folder-open"></span> Data Pasien
                            </a>
                        </li>
                        <li>
                            <a class="" href="/petugas">
                                <span class="glyphicon glyphicon-folder-open"></span> Data Petugas
                            </a>
                        </li>
                        <li>
                            <a class="" href="/diagnosis">
                                <span class="glyphicon glyphicon-folder-open"></span> Data Diagnosis
                            </a>
                        </li>
                        <li>
                            <a class="" href="/spesialis">
                                <span class="glyphicon glyphicon-folder-open"></span> Data Spesialis
                            </a>
                        </li>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span
                                class="glyphicon glyphicon-user"></span><b> User</b> <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        {{--<li><a href="#"><span class="glyphicon glyphicon-user"></span></span>   Profile</a></li>--}}
                        {{--<li><a href="#"><span class="glyphicon glyphicon-cog"></span> Settings</a></li>--}}
                        <li><a href="{{ route('logout.index') }}"><span class="glyphicon glyphicon-remove-circle"></span> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
<hr>

<div class="col-lg-12 main">

    @yield('content')


</div>    <!--/.main-->

<script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('js/bootstrap-table.js')}}"></script>
<script src="{{asset('plugins/select2/select2.min.js')}}"></script>
<script>
    $('#calendar').datepicker({});

    !function ($) {
        $(document).on("click", "ul.nav li.parent > a > span.icon", function () {
            $(this).find('em:first').toggleClass("glyphicon-minus");
        });
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
        if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
        if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })
</script>

<script type="text/javascript">
    jQuery.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@stack('scripts')
</body>

</html>
