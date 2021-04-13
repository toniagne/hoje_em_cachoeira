<!doctype html>
<html lang="pt">
<head>
    <meta name="description" content="Hoje em Cachoeira é um site de busca. Aqui, você encontra as melhores empresas e profissionais liberais de Cachoeira do Sul.">


    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta http-equiv="Cache-Control" content="no-cache, no-store">
    <meta http-equiv="Pragma" content="no-cache, no-store">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="author" content="Hoje em Cachoeira">
    <meta name="copyright" content="© Hoje em Cachoeira">
    <meta name="url" content="https://www.hojeemcachoeira.com.br">
    <meta name="description" content="Conheça as empresas do hoje em Cachoeira do Sul - RS. Confira se haverá previsão de chuva para Cachoeira do Sul - RS o melhor site de pesquisas do RS.">
    <meta name="publisher" content="Hoje em Cachoeira">


    <meta name="regiao" content="s">
    <meta name="uf" content="rs">
    <meta name="idCidade" content="1379">
    <meta name="tmin" content="11">
    <meta name="tmax" content="20">
    <meta name="cmomento" content="muitas-nuvens">
    <meta name="tmomento" content="12">
    <meta name="icoman" content="2r">
    <meta name="icotar" content="2r">
    <meta name="iconoi" content="2rn">
    <meta name="icodia" content="2r">
    <meta name="chuvamm" content="0">
    <meta name="urmax" content="93">
    <meta name="uvmax" content="9">
    <meta name="agricola" content="1">
    <meta name="litoranea" content="0">
    <meta name="secao" content="prev_hoje">
    <meta name="website" content="producao">
    <meta name="lancamento" content="Maio2020">
    <meta name="vitaminaD" content="media">
    <meta name="qualidadeAr" content="Média">
    <meta name="resfriado" content="3">
    <meta name="mosquito" content="1">
    <meta name="raiosUV" content="4">
    <meta name="pele" content="2">



    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-2083743-52"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-2083743-52');
    </script>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-WRFPFWH');</script>
    <!-- End Google Tag Manager -->

    <title>{{ $configs->title }} | @yield('title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="icon" href="{{ asset('images/favicon.png')}}" type="image/x-icon">
    <meta name="robots" content="index, follow">


    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,700i,900,900i%7CMerriweather:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">

    <!-- Bootstrap Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">

    <!-- Font Awesome Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css')}}">

    <!-- Custom Stylesheets -->
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
    <link rel="stylesheet" id="cpswitch" href="{{ asset('css/orange.css')}}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css')}}">

    <!-- Owl Carousel Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.css')}}">

    <!-- Flex Slider Stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/flexslider.css')}}" type="text/css" />

    <!--Date-Picker Stylesheet-->
    <link rel="stylesheet" href="{{ asset('css/datepicker.css')}}">

    <!-- Magnific Gallery -->
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css')}}">
    @stack('style')
</head>
