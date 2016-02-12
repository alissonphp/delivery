<!doctype html>
<html class=no-js>
<head>
    <meta charset=utf-8>
    <title>Delivery Clube :: Seu guia de Deliveres</title>
    <meta name=description>
    <meta name=viewport content="width=device-width">
    <link rel=stylesheet href={{ asset('app/styles/main.css') }}>
    <link rel=stylesheet href={{ asset('app/styles/custom.css') }}>
    <link type="text/css" rel="stylesheet" href="{{ asset('app/vendor/datatables/media/css/jquery.dataTables.min.css') }}"/>
    <link type="text/css" rel="stylesheet" href="{{ asset('app/vendor/notify/ng-notify.min.css') }}"/>
</head>
<body ng-app=ctrlApp> <!--[if lt IE 7]>
<p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade
    your browser</a> to improve your experience.</p>
<![endif]-->
<div>
    <div ui-view></div>
</div>
<script> /*
     (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
     (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
     m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
     })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

     ga('create', 'UA-XXXXX-X');
     ga('send', 'pageview'); */
</script>
<!--[if lt IE 9]>
<script src="{{ asset('app/scripts/oldieshim.js') }}"></script>
<![endif]-->
<script src="{{ asset('app/vendor/datatables/media/js/jquery.js') }}"></script>
<script type="text/javascript" src="{{ asset('app/vendor/angular/angular.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('app/vendor/angular/angular-locale_pt-br.js') }}"></script>
<script src="{{ asset('app/vendor/angular/angular-mocks.js') }}"></script>
<script src="{{ asset('app/vendor/angular/angular-ui-router.js') }}"></script>
<script src="{{ asset('app/vendor/angular/angular-resource.min.js') }}"></script>
<script src="{{ asset('app/vendor/angular/angular-animate.min.js') }}"></script>
<script src="{{ asset('app/vendor/angular/ngStorage.min.js') }}"></script>
<script src="{{ asset('app/vendor/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('app/vendor/angular-datatables/angular-datatables.js') }}"></script>
<script src="{{ asset('app/vendor/notify/ng-notify.min.js') }}"></script>
<script src="{{ asset('app/vendor/angular-fileupload/ng-file-upload.min.js') }}"></script>

<script src={{ asset('app/scripts/app.js') }}></script>
<script src={{ asset('app/scripts/routes.js') }}></script>
<script src={{ asset('app/scripts/factories/planoFactory.js') }}></script>
<script src={{ asset('app/scripts/factories/empresaFactory.js') }}></script>
<script src={{ asset('app/scripts/controllers/PlanoCtrl.js') }}></script>
<script src={{ asset('app/scripts/controllers/EmpresaCtrl.js') }}></script>
<script src={{ asset('app/scripts/controllers/dashboard.js') }}></script>
<script src={{ asset('app/scripts/controllers/login.js') }}></script>
</body>
</html>