<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SIRI</title>

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{asset('css/datepicker3.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap-table.css')}}" >
    <link rel="stylesheet" type="text/css" href="{{asset('css/styles.css')}}" >

    <!--Icons-->
    <script src="{{asset('js/lumino.glyphs.js')}}"></script>

    <!--[if lt IE 9]>
    <script src="{{asset('js/html5shiv.js')}}"></script>
    <script src="{{asset('js/respond.min.js')}}"></script>
    <![endif]-->

</head>

<body>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><span>Sistem Informasi</span> Rawat Inap</a>
            <ul class="user-menu">
                <li class="dropdown pull-right">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> User <span class="caret"></span></a>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>
                        <li><a href="#"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
                        <li><a href="#"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>

    </div><!-- /.container-fluid -->
</nav>

<div id="sidebar-collapse" class="col-sm-2 col-lg-2 sidebar">
    {{--<form role="search">--}}
        {{--<div class="form-group">--}}
            {{--<input type="text" class="form-control" placeholder="Search">--}}
        {{--</div>--}}
    {{--</form>--}}
    <ul class="nav menu">
        <li class="active"><a href="adm_dash"><svg class="glyph stroked dashboard-dial"><use xlink:href="#stroked-dashboard-dial"></use></svg> Dashboard</a></li>
        <li><a href="/adm_pasien"><svg class="glyph stroked male user "><use xlink:href="#stroked-male-user"/></svg> Pasien</a></li>
        <li class="parent ">
            <a href="#sub-item-1">
                <span data-toggle="collapse" href="#sub-item-1"><svg class="glyph stroked clipboard with paper"><use xlink:href="#stroked-clipboard-with-paper"/></svg></span> Laporan
            </a>
            <ul class="children collapse" id="sub-item-1">
                <li>
                    <a class="" href="/adm_lap_in">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Laporan Internal
                    </a>
                </li>
                <li>
                    <a class="" href="/adm_lap_ex_rl12">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Laporan Ext. RL 1.2
                    </a>
                </li>
                <li>
                    <a class="" href="/adm_lap_ex_rl13">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Laporan Ext. RL 1.3
                    </a>
                </li>
                <li>
                    <a class="" href="/adm_lap_ex_rl31">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Laporan Ext. RL 3.1
                    </a>
                </li>
                <li>
                    <a class="" href="/adm_lap_ex_rl4a">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Laporan Ext. RL 4a
                    </a>
                </li>
                <li>
                    <a class="" href="/adm_lap_ex_rl53">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Laporan Ext. RL 53
                    </a>
                </li>
            </ul>
        </li>
        <li class="parent">
            <a href="#sub-item-8">
                <span data-toggle="collapse" href="#sub-item-8"><svg class="glyph stroked pencil"><use xlink:href="#stroked-blank-document"></use></svg></span> Transaksi</a>
            <ul class="children collapse" id="sub-item-8">
                <li>
                    <a class="" href="/adm_t_pas_masuk">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Pasien Masuk
                    </a>
                </li>
                <li>
                    <a class="" href="/adm_t_pas_keluar">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Pasien Keluar
                    </a>
                </li>
            </ul>
        </li>
        <li class="parent">
            <a href="#">
                <span data-toggle="collapse" href="#sub-item-3"><svg class="glyph stroked pencil"><use xlink:href="#stroked-pencil"></use></svg></span> Master</a>
            <ul class="children collapse" id="sub-item-3">
                <li>
                    <a class="" href="/layanan">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Jenis Pelayanan
                    </a>
                </li>
                <li>
                    <a class="" href="/bayar">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Jenis Pembayaran
                    </a>
                </li>
                <li>
                    <a class="" href="/kamar">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Data Kamar
                    </a>
                </li>
                <li>
                    <a class="" href="/pasien">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Data Pasien
                    </a>
                </li>
                <li>
                    <a class="" href="/petugas">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Data Petugas
                    </a>
                </li>
                <li>
                    <a class="" href="/diagnosis">
                        <svg class="glyph stroked chevron-right"><use xlink:href="#stroked-chevron-right"></use></svg> Data Diagnosis
                    </a>
                </li>
                </li>
            </ul>

        <li role="presentation" class="divider"></li>
        <li><a href="/login"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"/></svg>
                Logout</a></li>
    </ul>
    {{--<div class="attribution">Powered by <a href="http://www.aray.com/">ARAY</a><br/><a href="http://www.glyphs.co" style="color: #333;">Icons by Glyphs</a></div>--}}
</div><!--/.sidebar-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">

    @yield('content')


</div>	<!--/.main-->

<script src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/bootstrap-datepicker.js')}}"></script>
<script src="{{asset('js/bootstrap-table.js')}}"></script>
<script>
    $('#calendar').datepicker({
    });

    !function ($) {
        $(document).on("click","ul.nav li.parent > a > span.icon", function(){
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
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
</script>

@stack('scripts')
</body>

</html>
