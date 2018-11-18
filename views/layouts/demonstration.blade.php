@php
    $cclr = isset($cclr) ? $cclr : null;
    if(!isset($visitor) || empty($visitor)){
        $vid = ($cclr) ? null : (Cookie::get('__teeb_visitor') ?: null);
        $visitor = $vid ? Milestone\Teebpd\Model\Visitor::find($vid) : null;
    }
@endphp<!DOCTYPE html>
<html lang="en-US" class="yes-js js_active js js_active  vc_desktop  vc_transform  vc_transform">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>{{ config('appframe.title', 'Product Demonstration Website') }}</title>
    @component('teebpd::comps.assets') @endcomponent
</head>
<body class="loaded">
<div id="yith-wcwl-popup-message" style="display: none;"><div id="yith-wcwl-message"></div></div>
<div class="loader-content"><div id="loader"><div class="chasing-dots"><div></div><div></div><div></div></div></div></div>

<div id="page" class="hfeed page-wrapper">
    <header id="bwp-header" class="bwp-header header-v1">
        <div class="header-wrapper ">
            <div class="header-content" data-sticky_header="">
                <div class="row">
                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 header-logo">@component('teebpd::comps.header_logo') @endcomponent</div>
                    <div class="col-lg-8 col-md-8 hidden-sm hidden-xs wpbingo-menu-mobile text-center"><div class="wpbingo-menu-wrapper">&nbsp;</div></div>
                    <div class="col-lg-2 col-md-2 col-sm-12 col-xs-12 header-right">@component('teebpd::comps.header_icons',compact('visitor')) @endcomponent</div>
                </div>
            </div>
        </div>
    </header>
    <div id="bwp-main" class="bwp-main">
        <div class="page-title bwp-title" style="background-image:url({{ asset('teebpd/images/banner_background_pattern.png') }}); padding: 0px; height: 180px"></div>
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
                <div class="container">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>
    @component('teebpd::comps.footer') @endcomponent
</div>
<div class="bwp-quick-view">@component('teebpd::comps.product_quick_view') @endcomponent</div>
<div class="back-top"><i class="arrow_carrot-up"></i></div>
<div class="popupshadow" style="display:none"></div>
@stack('extra')
@stack('script')
@stack('style')
<script type="text/javascript" defer="" src="{{ asset('teebpd/js/theme.js') }}"></script>
</body>
</html>
