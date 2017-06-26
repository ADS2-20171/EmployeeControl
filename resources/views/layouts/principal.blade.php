<html lang="en-us">

    <head>

    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Academic System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/font-awesome.css')}}" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{asset('css/fullcalendar.min.css')}}">
    
    <link rel="stylesheet" type="text/css" href="{{asset('css/jquery-ui.min.css')}}">
    <!-- Toastr style -->
    <link href="{{asset('css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet">
     <link href="{{asset('css/calendar.css')}}" rel="stylesheet">
    <link href="{{asset('css/toastr.min.css')}}" rel="stylesheet">
    <!-- Gritter -->
    <link href="{{asset('css/jquery.gritter.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.css">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
     <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
    <!--Vue.JS-->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.16.1/axios.min.js"></script>
    <script src="{{asset('js/vue.js')}}"></script>
    
    
   
    <script src="{{asset('js/metos.js')}}"></script>
    <link href="{{asset('js/bootstrap-datetimepicker.es.js')}}" rel="stylesheet">
    <link href="{{asset('js/bootstrap-datetimepicker.js')}}" rel="stylesheet">
    
    <link href="{{asset('js/underscore-min.js')}}" rel="stylesheet">
    </head>

<body class="pace-done">
<div class="pace  pace-inactive">
<div class="pace-progress" data-progress-text="100%" data-progress="99" style="transform: translate3d(100%, 0px, 0px);">
  <div class="pace-progress-inner">
      
  </div>
</div>
<div class="pace-activity">
    
</div>
</div>

    <div id="wrapper">
        <nav class="navbar-default navbar-static-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav metismenu" id="side-menu">
                    <li class="nav-header">
                        <div class="dropdown profile-element"> 
                            <span>
                            <img alt="image" class="img-circle" src="{{asset('img/profile_small.jpg')}}">
                             </span>
                            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> 
                            <span class="block m-t-xs"> 
                                <strong class="font-bold">{{ Auth::user()->name }}</strong>
                            </span>
                            </span> 
                            </a>
                        </div>
       @if(Auth::user()->getRol() == 'Administrador')
                    <div class="logo-element">
                        <img alt="image" class="img-circle" src="{{asset('img/profile_small.jpg')}}">
                    </div>
                    </li>
                    <li>
                        <a href="{{ url('/usuario') }}"><i class="fa fa-user"></i> <span class="menu-item-parent">Usuarios</span></a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-book"></i> <span class="nav-label">Registro</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                           <li>
                                <a href="{{ url('/alumno') }}"><i class="fa fa-user"></i> <span class="menu-item-parent">Alumno</span></a>
                            </li>
                            <li>
                                <a href="{{ url('/trabajador') }}"><i class="fa fa-user"></i> <span class="menu-item-parent">Trabajador</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-info"></i> <span class="nav-label">Reportes</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                           <li>
                                <a href="{{ url('/reportalumno') }}"><i class="fa fa-eye"></i> <span class="menu-item-parent">Alumno</span></a>
                            </li>
                            <li>
                                <a href="{{ url('/reporttrabajador') }}"><i class="fa fa-eye"></i> <span class="menu-item-parent">Trabajador</span></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ url('/horario')}}"><i class="fa fa-clock-o" aria-hidden="true"></i> <span class="nav-label">horarios</span></a>
                    </li>
                    <li>
                        <a href="{{ url('/asistencia') }}"><i class="fa fa-check" aria-hidden="true"></i> <span class="nav-label">Asistencia</span></a>
                    </li>
                    <li>
                        <a href="{{ url('/agenda')}}"><i class="fa fa-calendar" aria-hidden="true"></i><span class="nav-label">Agenda</span></a>
                    </li>
                   
               @endif                   
                </ul>

            </div>
        </nav>

<div id="page-wrapper" class="gray-bg dashbard-1" style="min-height: 800px;">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
       
        <a href="#" class="navbar-minimalize minimalize-styl-2 btn btn-primary " title="Collapse Menu">
        <i class="fa fa-reorder"></i>
        </a>
           
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <a href="{{ url('/logout') }}">
                        <i class="fa fa-sign-out"></i> Cerrar Sesion
                    </a>
                </li>
            </ul>

</nav>

             @yield('content')



        </div>


 <div class="footer">
                    <div>
                        <strong>Copyright</strong>
                    </div>
</div>
</div>
       

    <!-- Mainly scripts -->
    <script src="{{asset('js/analytics.js')}}"></script>
    <script src="{{asset('js/jquery-2.1.1.js')}}"></script>
    <script src="{{asset('js/moment.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
    <script src="{{asset('js/push.js')}}"></script>
    <script src="{{asset('js/push.min.js')}}"></script>
<!--Recordar     <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/4.0.1/min/dropzone.min.js"></script> -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/jquery.metisMenu.js')}}"></script>
    <script src="{{asset('js/jquery.slimscroll.min.js')}}"></script>
    <!--FullCalendar-->
    <script src="{{asset('js/jquery-ui.custom.min.js')}}"></script>
    <script src="{{asset('js/moment.min.js')}}"></script>
    <script src="{{asset('js/fullcalendar.js')}}"></script>
    <script src="{{asset('js/locale-all.js')}}"></script>
    <!-- Flot -->
    <script src="{{asset('js/jquery.flot.js')}}"></script>
    <script src="{{asset('js/jquery.flot.tooltip.min.js')}}"></script>
    <script src="{{asset('js/jquery.flot.spline.js')}}"></script>
    <script src="{{asset('js/jquery.flot.resize.js')}}"></script>
    <script src="{{asset('js/jquery.flot.pie.js')}}"></script>

    <!-- Peity -->
    <script src="{{asset('js/jquery.peity.min.js')}}"></script>
    <script src="{{asset('js/peity-demo.js')}}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{asset('js/inspinia.js')}}"></script>
    <script src="{{asset('js/pace.min.js')}}"></script>

    <!-- jQuery UI -->
    <script src="{{asset('js/jquery-ui.min.js')}}"></script>

    <!-- GITTER -->
    <script src="{{asset('js/jquery.gritter.min.js')}}"></script>

    <!-- Sparkline -->
    <script src="{{asset('js/jquery.sparkline.min.js')}}"></script>

    <!-- Sparkline demo data  -->
    <script src="{{asset('js/sparkline-demo.js')}}"></script>

       <!-- ChartJS-->
    <script src="{{asset('js/Chart.min.js')}}"></script>
   
    
     
    <!-- Toastr -->
    <script src="{{asset('js/toastr.min.js')}}"></script>
    
    <script>
        $(document).ready(function() {
            var currentLangCode = 'es';//cambiar el idioma al español
 
            $('#calendar').fullCalendar({
                eventClick: function(calEvent,updateEvent, jsEvent, view) {
 
                    $(this).css('background', 'red');
                    //al evento click; al hacer clic sobre un evento cambiara de background
                    //a color rojo y nos enviara a los datos generales del evento seleccionado
                },
 
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay'
                },
 
                lang:currentLangCode,
                editable: true,
                eventLimit: true,
                events:{
             
                    url:'http://localhost/AcademicSystem/public/api/agenda'
                }
            });
 
        });
    </script>



   <script type="text/javascript">
    $(window).load(function(){
        $('#mostrarmodal').addClass('visible');
    });
    </script>



    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
            (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','js/analytics.js','ga');

        ga('create', 'UA-4625583-2', 'webapplayers.com');
        ga('send', 'pageview');

    </script>



<script>
    // Config box

    // Enable/disable fixed top navbar
    $('#fixednavbar').click(function (){
        if ($('#fixednavbar').is(':checked')){
            $(".navbar-static-top").removeClass('navbar-static-top').addClass('navbar-fixed-top');
            $("body").removeClass('boxed-layout');
            $("body").addClass('fixed-nav');
            $('#boxedlayout').prop('checked', false);

            if (localStorageSupport){
                localStorage.setItem("boxedlayout",'off');
            }

            if (localStorageSupport){
                localStorage.setItem("fixednavbar",'on');
            }
        } else{
            $(".navbar-fixed-top").removeClass('navbar-fixed-top').addClass('navbar-static-top');
            $("body").removeClass('fixed-nav');
            $("body").removeClass('fixed-nav-basic');
            $('#fixednavbar2').prop('checked', false);

            if (localStorageSupport){
                localStorage.setItem("fixednavbar",'off');
            }

            if (localStorageSupport){
                localStorage.setItem("fixednavbar2",'off');
            }
        }
    });

    // Enable/disable fixed top navbar
    $('#fixednavbar2').click(function (){
        if ($('#fixednavbar2').is(':checked')){
            $(".navbar-static-top").removeClass('navbar-static-top').addClass('navbar-fixed-top');
            $("body").removeClass('boxed-layout');
            $("body").addClass('fixed-nav').addClass('fixed-nav-basic');
            $('#boxedlayout').prop('checked', false);

            if (localStorageSupport){
                localStorage.setItem("boxedlayout",'off');
            }

            if (localStorageSupport){
                localStorage.setItem("fixednavbar2",'on');
            }
        } else {
            $(".navbar-fixed-top").removeClass('navbar-fixed-top').addClass('navbar-static-top');
            $("body").removeClass('fixed-nav').removeClass('fixed-nav-basic');
            $('#fixednavbar').prop('checked', false);

            if (localStorageSupport){
                localStorage.setItem("fixednavbar2",'off');
            }
            if (localStorageSupport){
                localStorage.setItem("fixednavbar",'off');
            }
        }
    });

    // Enable/disable fixed sidebar
    $('#fixedsidebar').click(function (){
        if ($('#fixedsidebar').is(':checked')){
            $("body").addClass('fixed-sidebar');
            $('.sidebar-collapse').slimScroll({
                height: '100%',
                railOpacity: 0.9
            });

            if (localStorageSupport){
                localStorage.setItem("fixedsidebar",'on');
            }
        } else{
            $('.sidebar-collapse').slimscroll({destroy: true});
            $('.sidebar-collapse').attr('style', '');
            $("body").removeClass('fixed-sidebar');

            if (localStorageSupport){
                localStorage.setItem("fixedsidebar",'off');
            }
        }
    });

    // Enable/disable collapse menu
    $('#collapsemenu').click(function (){
        if ($('#collapsemenu').is(':checked')){
            $("body").addClass('mini-navbar');
            SmoothlyMenu();

            if (localStorageSupport){
                localStorage.setItem("collapse_menu",'on');
            }

        } else{
            $("body").removeClass('mini-navbar');
            SmoothlyMenu();

            if (localStorageSupport){
                localStorage.setItem("collapse_menu",'off');
            }
        }
    });

    // Enable/disable boxed layout
    $('#boxedlayout').click(function (){
        if ($('#boxedlayout').is(':checked')){
            $("body").addClass('boxed-layout');
            $('#fixednavbar').prop('checked', false);
            $('#fixednavbar2').prop('checked', false);
            $(".navbar-fixed-top").removeClass('navbar-fixed-top').addClass('navbar-static-top');
            $("body").removeClass('fixed-nav');
            $("body").removeClass('fixed-nav-basic');
            $(".footer").removeClass('fixed');
            $('#fixedfooter').prop('checked', false);

            if (localStorageSupport){
                localStorage.setItem("fixednavbar",'off');
            }

            if (localStorageSupport){
                localStorage.setItem("fixednavbar2",'off');
            }

            if (localStorageSupport){
                localStorage.setItem("fixedfooter",'off');
            }


            if (localStorageSupport){
                localStorage.setItem("boxedlayout",'on');
            }
        } else{
            $("body").removeClass('boxed-layout');

            if (localStorageSupport){
                localStorage.setItem("boxedlayout",'off');
            }
        }
    });

    // Enable/disable fixed footer
    $('#fixedfooter').click(function (){
        if ($('#fixedfooter').is(':checked')){
            $('#boxedlayout').prop('checked', false);
            $("body").removeClass('boxed-layout');
            $(".footer").addClass('fixed');

            if (localStorageSupport){
                localStorage.setItem("boxedlayout",'off');
            }

            if (localStorageSupport){
                localStorage.setItem("fixedfooter",'on');
            }
        } else{
            $(".footer").removeClass('fixed');

            if (localStorageSupport){
                localStorage.setItem("fixedfooter",'off');
            }
        }
    });

    // SKIN Select
    $('.spin-icon').click(function (){
        $(".theme-config-box").toggleClass("show");
    });

    // Default skin
    $('.s-skin-0').click(function (){
        $("body").removeClass("skin-1");
        $("body").removeClass("skin-2");
        $("body").removeClass("skin-3");
    });

    // Blue skin
    $('.s-skin-1').click(function (){
        $("body").removeClass("skin-2");
        $("body").removeClass("skin-3");
        $("body").addClass("skin-1");
    });

    // Inspinia ultra skin
    $('.s-skin-2').click(function (){
        $("body").removeClass("skin-1");
        $("body").removeClass("skin-3");
        $("body").addClass("skin-2");
    });

    // Yellow skin
    $('.s-skin-3').click(function (){
        $("body").removeClass("skin-1");
        $("body").removeClass("skin-2");
        $("body").addClass("skin-3");
    });

    if (localStorageSupport){
        var collapse = localStorage.getItem("collapse_menu");
        var fixedsidebar = localStorage.getItem("fixedsidebar");
        var fixednavbar = localStorage.getItem("fixednavbar");
        var fixednavbar2 = localStorage.getItem("fixednavbar2");
        var boxedlayout = localStorage.getItem("boxedlayout");
        var fixedfooter = localStorage.getItem("fixedfooter");

        if (collapse == 'on'){
            $('#collapsemenu').prop('checked','checked')
        }
        if (fixedsidebar == 'on'){
            $('#fixedsidebar').prop('checked','checked')
        }
        if (fixednavbar == 'on'){
            $('#fixednavbar').prop('checked','checked')
        }
        if (fixednavbar2 == 'on'){
            $('#fixednavbar2').prop('checked','checked')
        }
        if (boxedlayout == 'on'){
            $('#boxedlayout').prop('checked','checked')
        }
        if (fixedfooter == 'on') {
            $('#fixedfooter').prop('checked','checked')
        }
    }
</script>


</body>


</html>