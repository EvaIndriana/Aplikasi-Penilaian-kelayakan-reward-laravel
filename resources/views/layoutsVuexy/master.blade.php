<html class="loaded" lang="en" data-textdirection="ltr" style="--vh: 11.06px;">
    <!-- BEGIN: Head--><!-- Mirrored from pixinvent.com/demo/vuexy-html-bootstrap-admin-template/bs5-old/html/ltr/vertical-menu-template/dashboard-analytics.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Jan 2023 09:54:42 GMT -->

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
        <meta name="description"
            content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
        <meta name="keywords"
            content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
        <meta name="author" content="PIXINVENT">
        <title>Aplikasi Reward</title>
        <link rel="apple-touch-icon"
            href="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/images/ico/apple-icon-120.html') }}">
        <link rel="shortcut icon" type="image/x-icon"
            href="https://pixinvent.com/demo/vuexy-html-bootstrap-admin-template/bs5-old/app-assets/images/ico/favicon.ico">
        <link
            href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
            rel="stylesheet">

        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css"
            href="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/vendors/css/vendors.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/vendors/css/charts/apexcharts.css') }}">

        <link rel="stylesheet" type="text/css"
            href="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
        <!-- END: Vendor CSS-->

        <!--select-->
        <link rel="stylesheet" type="text/css"
            href="{{ asset('vuexy/demo1/demo2/demo3/app-assets/vendors/css/forms/select/select2.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/demo1/demo2/demo3/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/demo1/demo2/demo3/app-assets/vendors/css/calendars/fullcalendar.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/demo1/demo2/demo3/app-assets/css/core/menu/menu-types/vertical-menu.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/demo1/demo2/demo3/app-assets/css/plugins/forms/pickers/form-flat-pickr.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/demo1/demo2/demo3/app-assets/css/pages/app-calendar.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/demo1/demo2/demo3/app-assets/css/plugins/forms/form-validation.css')}}">
        <!-- fontawesome-->
        <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/vendors/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/vendors/fontawesome-free/css/brands.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/vendors/fontawesome-free/css/all.css') }}">
        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" type="text/css"
            href="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/css/bootstrap.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/css/bootstrap-extended.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/css/colors.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/css/components.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/css/themes/dark-layout.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/css/themes/bordered-layout.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/css/themes/semi-dark-layout.css') }}">

        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css"
            href="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/css/core/menu/menu-types/vertical-menu.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/css/plugins/charts/chart-apex.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/css/plugins/extensions/ext-component-toastr.css') }}">
        <link rel="stylesheet" type="text/css"
            href="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/css/pages/app-invoice-list.css') }}">
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css"
            href="{{ asset('vuexy/demo1/demo2/demo3/demo4/assets/css/style.css') }}">
        <!-- END: Custom CSS-->

        <style type="text/css">
            .apexcharts-canvas {
                position: relative;
                user-select: none;
                /* cannot give overflow: hidden as it will crop tooltips which overflow outside chart area */
            }


            /* scrollbar is not visible by default for legend, hence forcing the visibility */
            .apexcharts-canvas ::-webkit-scrollbar {
                -webkit-appearance: none;
                width: 6px;
            }

            .apexcharts-canvas ::-webkit-scrollbar-thumb {
                border-radius: 4px;
                background-color: rgba(0, 0, 0, .5);
                box-shadow: 0 0 1px rgba(255, 255, 255, .5);
                -webkit-box-shadow: 0 0 1px rgba(255, 255, 255, .5);
            }


            .apexcharts-inner {
                position: relative;
            }

            .apexcharts-text tspan {
                font-family: inherit;
            }

            .legend-mouseover-inactive {
                transition: 0.15s ease all;
                opacity: 0.20;
            }

            .apexcharts-series-collapsed {
                opacity: 0;
            }

            .apexcharts-tooltip {
                border-radius: 5px;
                box-shadow: 2px 2px 6px -4px #999;
                cursor: default;
                font-size: 14px;
                left: 62px;
                opacity: 0;
                pointer-events: none;
                position: absolute;
                top: 20px;
                display: flex;
                flex-direction: column;
                overflow: hidden;
                white-space: nowrap;
                z-index: 12;
                transition: 0.15s ease all;
            }

            .apexcharts-tooltip.apexcharts-active {
                opacity: 1;
                transition: 0.15s ease all;
            }

            .apexcharts-tooltip.apexcharts-theme-light {
                border: 1px solid #e3e3e3;
                background: rgba(255, 255, 255, 0.96);
            }

            .apexcharts-tooltip.apexcharts-theme-dark {
                color: #fff;
                background: rgba(30, 30, 30, 0.8);
            }

            .apexcharts-tooltip * {
                font-family: inherit;
            }


            .apexcharts-tooltip-title {
                padding: 6px;
                font-size: 15px;
                margin-bottom: 4px;
            }

            .apexcharts-tooltip.apexcharts-theme-light .apexcharts-tooltip-title {
                background: #ECEFF1;
                border-bottom: 1px solid #ddd;
            }

            .apexcharts-tooltip.apexcharts-theme-dark .apexcharts-tooltip-title {
                background: rgba(0, 0, 0, 0.7);
                border-bottom: 1px solid #333;
            }

            .apexcharts-tooltip-text-value,
            .apexcharts-tooltip-text-z-value {
                display: inline-block;
                font-weight: 600;
                margin-left: 5px;
            }

            .apexcharts-tooltip-text-z-label:empty,
            .apexcharts-tooltip-text-z-value:empty {
                display: none;
            }

            .apexcharts-tooltip-text-value,
            .apexcharts-tooltip-text-z-value {
                font-weight: 600;
            }

            .apexcharts-tooltip-marker {
                width: 12px;
                height: 12px;
                position: relative;
                top: 0px;
                margin-right: 10px;
                border-radius: 50%;
            }

            .apexcharts-tooltip-series-group {
                padding: 0 10px;
                display: none;
                text-align: left;
                justify-content: left;
                align-items: center;
            }

            .apexcharts-tooltip-series-group.apexcharts-active .apexcharts-tooltip-marker {
                opacity: 1;
            }

            .apexcharts-tooltip-series-group.apexcharts-active,
            .apexcharts-tooltip-series-group:last-child {
                padding-bottom: 4px;
            }

            .apexcharts-tooltip-series-group-hidden {
                opacity: 0;
                height: 0;
                line-height: 0;
                padding: 0 !important;
            }

            .apexcharts-tooltip-y-group {
                padding: 6px 0 5px;
            }

            .apexcharts-tooltip-candlestick {
                padding: 4px 8px;
            }

            .apexcharts-tooltip-candlestick>div {
                margin: 4px 0;
            }

            .apexcharts-tooltip-candlestick span.value {
                font-weight: bold;
            }

            .apexcharts-tooltip-rangebar {
                padding: 5px 8px;
            }

            .apexcharts-tooltip-rangebar .category {
                font-weight: 600;
                color: #777;
            }

            .apexcharts-tooltip-rangebar .series-name {
                font-weight: bold;
                display: block;
                margin-bottom: 5px;
            }

            .apexcharts-xaxistooltip {
                opacity: 0;
                padding: 9px 10px;
                pointer-events: none;
                color: #373d3f;
                font-size: 13px;
                text-align: center;
                border-radius: 2px;
                position: absolute;
                z-index: 10;
                background: #ECEFF1;
                border: 1px solid #90A4AE;
                transition: 0.15s ease all;
            }

            .apexcharts-xaxistooltip.apexcharts-theme-dark {
                background: rgba(0, 0, 0, 0.7);
                border: 1px solid rgba(0, 0, 0, 0.5);
                color: #fff;
            }

            .apexcharts-xaxistooltip:after,
            .apexcharts-xaxistooltip:before {
                left: 50%;
                border: solid transparent;
                content: " ";
                height: 0;
                width: 0;
                position: absolute;
                pointer-events: none;
            }

            .apexcharts-xaxistooltip:after {
                border-color: rgba(236, 239, 241, 0);
                border-width: 6px;
                margin-left: -6px;
            }

            .apexcharts-xaxistooltip:before {
                border-color: rgba(144, 164, 174, 0);
                border-width: 7px;
                margin-left: -7px;
            }

            .apexcharts-xaxistooltip-bottom:after,
            .apexcharts-xaxistooltip-bottom:before {
                bottom: 100%;
            }

            .apexcharts-xaxistooltip-top:after,
            .apexcharts-xaxistooltip-top:before {
                top: 100%;
            }

            .apexcharts-xaxistooltip-bottom:after {
                border-bottom-color: #ECEFF1;
            }

            .apexcharts-xaxistooltip-bottom:before {
                border-bottom-color: #90A4AE;
            }

            .apexcharts-xaxistooltip-bottom.apexcharts-theme-dark:after {
                border-bottom-color: rgba(0, 0, 0, 0.5);
            }

            .apexcharts-xaxistooltip-bottom.apexcharts-theme-dark:before {
                border-bottom-color: rgba(0, 0, 0, 0.5);
            }

            .apexcharts-xaxistooltip-top:after {
                border-top-color: #ECEFF1
            }

            .apexcharts-xaxistooltip-top:before {
                border-top-color: #90A4AE;
            }

            .apexcharts-xaxistooltip-top.apexcharts-theme-dark:after {
                border-top-color: rgba(0, 0, 0, 0.5);
            }

            .apexcharts-xaxistooltip-top.apexcharts-theme-dark:before {
                border-top-color: rgba(0, 0, 0, 0.5);
            }

            .apexcharts-xaxistooltip.apexcharts-active {
                opacity: 1;
                transition: 0.15s ease all;
            }

            .apexcharts-yaxistooltip {
                opacity: 0;
                padding: 4px 10px;
                pointer-events: none;
                color: #373d3f;
                font-size: 13px;
                text-align: center;
                border-radius: 2px;
                position: absolute;
                z-index: 10;
                background: #ECEFF1;
                border: 1px solid #90A4AE;
            }

            .apexcharts-yaxistooltip.apexcharts-theme-dark {
                background: rgba(0, 0, 0, 0.7);
                border: 1px solid rgba(0, 0, 0, 0.5);
                color: #fff;
            }

            .apexcharts-yaxistooltip:after,
            .apexcharts-yaxistooltip:before {
                top: 50%;
                border: solid transparent;
                content: " ";
                height: 0;
                width: 0;
                position: absolute;
                pointer-events: none;
            }

            .apexcharts-yaxistooltip:after {
                border-color: rgba(236, 239, 241, 0);
                border-width: 6px;
                margin-top: -6px;
            }

            .apexcharts-yaxistooltip:before {
                border-color: rgba(144, 164, 174, 0);
                border-width: 7px;
                margin-top: -7px;
            }

            .apexcharts-yaxistooltip-left:after,
            .apexcharts-yaxistooltip-left:before {
                left: 100%;
            }

            .apexcharts-yaxistooltip-right:after,
            .apexcharts-yaxistooltip-right:before {
                right: 100%;
            }

            .apexcharts-yaxistooltip-left:after {
                border-left-color: #ECEFF1;
            }

            .apexcharts-yaxistooltip-left:before {
                border-left-color: #90A4AE;
            }

            .apexcharts-yaxistooltip-left.apexcharts-theme-dark:after {
                border-left-color: rgba(0, 0, 0, 0.5);
            }

            .apexcharts-yaxistooltip-left.apexcharts-theme-dark:before {
                border-left-color: rgba(0, 0, 0, 0.5);
            }

            .apexcharts-yaxistooltip-right:after {
                border-right-color: #ECEFF1;
            }

            .apexcharts-yaxistooltip-right:before {
                border-right-color: #90A4AE;
            }

            .apexcharts-yaxistooltip-right.apexcharts-theme-dark:after {
                border-right-color: rgba(0, 0, 0, 0.5);
            }

            .apexcharts-yaxistooltip-right.apexcharts-theme-dark:before {
                border-right-color: rgba(0, 0, 0, 0.5);
            }

            .apexcharts-yaxistooltip.apexcharts-active {
                opacity: 1;
            }

            .apexcharts-yaxistooltip-hidden {
                display: none;
            }

            .apexcharts-xcrosshairs,
            .apexcharts-ycrosshairs {
                pointer-events: none;
                opacity: 0;
                transition: 0.15s ease all;
            }

            .apexcharts-xcrosshairs.apexcharts-active,
            .apexcharts-ycrosshairs.apexcharts-active {
                opacity: 1;
                transition: 0.15s ease all;
            }

            .apexcharts-ycrosshairs-hidden {
                opacity: 0;
            }

            .apexcharts-selection-rect {
                cursor: move;
            }

            .svg_select_boundingRect,
            .svg_select_points_rot {
                pointer-events: none;
                opacity: 0;
                visibility: hidden;
            }

            .apexcharts-selection-rect+g .svg_select_boundingRect,
            .apexcharts-selection-rect+g .svg_select_points_rot {
                opacity: 0;
                visibility: hidden;
            }

            .apexcharts-selection-rect+g .svg_select_points_l,
            .apexcharts-selection-rect+g .svg_select_points_r {
                cursor: ew-resize;
                opacity: 1;
                visibility: visible;
            }

            .svg_select_points {
                fill: #efefef;
                stroke: #333;
                rx: 2;
            }

            .apexcharts-svg.apexcharts-zoomable.hovering-zoom {
                cursor: crosshair
            }

            .apexcharts-svg.apexcharts-zoomable.hovering-pan {
                cursor: move
            }

            .apexcharts-zoom-icon,
            .apexcharts-zoomin-icon,
            .apexcharts-zoomout-icon,
            .apexcharts-reset-icon,
            .apexcharts-pan-icon,
            .apexcharts-selection-icon,
            .apexcharts-menu-icon,
            .apexcharts-toolbar-custom-icon {
                cursor: pointer;
                width: 20px;
                height: 20px;
                line-height: 24px;
                color: #6E8192;
                text-align: center;
            }

            .apexcharts-zoom-icon svg,
            .apexcharts-zoomin-icon svg,
            .apexcharts-zoomout-icon svg,
            .apexcharts-reset-icon svg,
            .apexcharts-menu-icon svg {
                fill: #6E8192;
            }

            .apexcharts-selection-icon svg {
                fill: #444;
                transform: scale(0.76)
            }

            .apexcharts-theme-dark .apexcharts-zoom-icon svg,
            .apexcharts-theme-dark .apexcharts-zoomin-icon svg,
            .apexcharts-theme-dark .apexcharts-zoomout-icon svg,
            .apexcharts-theme-dark .apexcharts-reset-icon svg,
            .apexcharts-theme-dark .apexcharts-pan-icon svg,
            .apexcharts-theme-dark .apexcharts-selection-icon svg,
            .apexcharts-theme-dark .apexcharts-menu-icon svg,
            .apexcharts-theme-dark .apexcharts-toolbar-custom-icon svg {
                fill: #f3f4f5;
            }

            .apexcharts-canvas .apexcharts-zoom-icon.apexcharts-selected svg,
            .apexcharts-canvas .apexcharts-selection-icon.apexcharts-selected svg,
            .apexcharts-canvas .apexcharts-reset-zoom-icon.apexcharts-selected svg {
                fill: #008FFB;
            }

            .apexcharts-theme-light .apexcharts-selection-icon:not(.apexcharts-selected):hover svg,
            .apexcharts-theme-light .apexcharts-zoom-icon:not(.apexcharts-selected):hover svg,
            .apexcharts-theme-light .apexcharts-zoomin-icon:hover svg,
            .apexcharts-theme-light .apexcharts-zoomout-icon:hover svg,
            .apexcharts-theme-light .apexcharts-reset-icon:hover svg,
            .apexcharts-theme-light .apexcharts-menu-icon:hover svg {
                fill: #333;
            }

            .apexcharts-selection-icon,
            .apexcharts-menu-icon {
                position: relative;
            }

            .apexcharts-reset-icon {
                margin-left: 5px;
            }

            .apexcharts-zoom-icon,
            .apexcharts-reset-icon,
            .apexcharts-menu-icon {
                transform: scale(0.85);
            }

            .apexcharts-zoomin-icon,
            .apexcharts-zoomout-icon {
                transform: scale(0.7)
            }

            .apexcharts-zoomout-icon {
                margin-right: 3px;
            }

            .apexcharts-pan-icon {
                transform: scale(0.62);
                position: relative;
                left: 1px;
                top: 0px;
            }

            .apexcharts-pan-icon svg {
                fill: #fff;
                stroke: #6E8192;
                stroke-width: 2;
            }

            .apexcharts-pan-icon.apexcharts-selected svg {
                stroke: #008FFB;
            }

            .apexcharts-pan-icon:not(.apexcharts-selected):hover svg {
                stroke: #333;
            }

            .apexcharts-toolbar {
                position: absolute;
                z-index: 11;
                max-width: 176px;
                text-align: right;
                border-radius: 3px;
                padding: 0px 6px 2px 6px;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .apexcharts-menu {
                background: #fff;
                position: absolute;
                top: 100%;
                border: 1px solid #ddd;
                border-radius: 3px;
                padding: 3px;
                right: 10px;
                opacity: 0;
                min-width: 110px;
                transition: 0.15s ease all;
                pointer-events: none;
            }

            .apexcharts-menu.apexcharts-menu-open {
                opacity: 1;
                pointer-events: all;
                transition: 0.15s ease all;
            }

            .apexcharts-menu-item {
                padding: 6px 7px;
                font-size: 12px;
                cursor: pointer;
            }

            .apexcharts-theme-light .apexcharts-menu-item:hover {
                background: #eee;
            }

            .apexcharts-theme-dark .apexcharts-menu {
                background: rgba(0, 0, 0, 0.7);
                color: #fff;
            }

            @media screen and (min-width: 768px) {
                .apexcharts-canvas:hover .apexcharts-toolbar {
                    opacity: 1;
                }
            }

            .apexcharts-datalabel.apexcharts-element-hidden {
                opacity: 0;
            }

            .apexcharts-pie-label,
            .apexcharts-datalabels,
            .apexcharts-datalabel,
            .apexcharts-datalabel-label,
            .apexcharts-datalabel-value {
                cursor: default;
                pointer-events: none;
            }

            .apexcharts-pie-label-delay {
                opacity: 0;
                animation-name: opaque;
                animation-duration: 0.3s;
                animation-fill-mode: forwards;
                animation-timing-function: ease;
            }

            .apexcharts-canvas .apexcharts-element-hidden {
                opacity: 0;
            }

            .apexcharts-hide .apexcharts-series-points {
                opacity: 0;
            }

            .apexcharts-gridline,
            .apexcharts-annotation-rect,
            .apexcharts-tooltip .apexcharts-marker,
            .apexcharts-area-series .apexcharts-area,
            .apexcharts-line,
            .apexcharts-zoom-rect,
            .apexcharts-toolbar svg,
            .apexcharts-area-series .apexcharts-series-markers .apexcharts-marker.no-pointer-events,
            .apexcharts-line-series .apexcharts-series-markers .apexcharts-marker.no-pointer-events,
            .apexcharts-radar-series path,
            .apexcharts-radar-series polygon {
                pointer-events: none;
            }


            /* markers */

            .apexcharts-marker {
                transition: 0.15s ease all;
            }

            @keyframes opaque {
                0% {
                    opacity: 0;
                }

                100% {
                    opacity: 1;
                }
            }


            /* Resize generated styles */

            @keyframes resizeanim {
                from {
                    opacity: 0;
                }

                to {
                    opacity: 0;
                }
            }

            .resize-triggers {
                animation: 1ms resizeanim;
                visibility: hidden;
                opacity: 0;
            }

            .resize-triggers,
            .resize-triggers>div,
            .contract-trigger:before {
                content: " ";
                display: block;
                position: absolute;
                top: 0;
                left: 0;
                height: 100%;
                width: 100%;
                overflow: hidden;
            }

            .resize-triggers>div {
                background: #eee;
                overflow: auto;
            }

            .contract-trigger:before {
                width: 200%;
                height: 200%;
            }
        </style>
    </head>
    <!-- END: Head-->

    <!-- BEGIN: Body-->

    <body class="pace-done vertical-layout navbar-floating footer-static menu-expanded vertical-menu-modern"
        data-open="click" data-menu="vertical-menu-modern" data-col="">
        <div class="pace pace-inactive">
            <div class="pace-progress" data-progress-text="100%" data-progress="99"
                style="transform: translate3d(100%, 0px, 0px);">
                <div class="pace-progress-inner"></div>
            </div>
            <div class="pace-activity"></div>
        </div>

        <!-- BEGIN: Header topbar-->
        @include('layoutsVuexy.topbarvuexy')
        <!-- END: Header-->


        <!-- BEGIN: Main Menu-->
        @include('layoutsVuexy.navbarvuexy')
        <!-- END: Main Menu-->

        <!-- BEGIN: Content-->
        <div class="app-content content ">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper container-xxl p-0">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <!-- Dashboard Analytics Start -->
                    <section id="dashboard-analytics">
                        <div class="row match-height">
                            @include('layoutsVuexy.contentvuexy')
                        </div>
                    </section>
                    <!-- Dashboard Analytics end -->

                </div>
            </div>
        </div>
        <!-- END: Content-->


        <!-- BEGIN: Customizer-->
        <div class="customizer d-none d-md-block"><a
                class="customizer-toggle d-flex align-items-center justify-content-center" href="#"><svg
                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                    stroke-linejoin="round" class="feather feather-settings spinner">
                    <circle cx="12" cy="12" r="3"></circle>
                    <path
                        d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z">
                    </path>
                </svg></a>
            <div class="customizer-content ps">
                <!-- Customizer header -->
                <div class="customizer-header px-2 pt-1 pb-0 position-relative">
                    <h4 class="mb-0">Theme Customizer</h4>
                    <p class="m-0">Customize &amp; Preview in Real Time</p>

                    <a class="customizer-close" href="#"><svg xmlns="http://www.w3.org/2000/svg"
                            width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg></a>
                </div>

                <hr>

                <!-- Styling & Text Direction -->
                <div class="customizer-styling-direction px-2">
                    <p class="fw-bold">Skin</p>
                    <div class="d-flex">
                        <div class="form-check me-1">
                            <input type="radio" id="skinlight" name="skinradio"
                                class="form-check-input layout-name" checked="" data-layout="">
                            <label class="form-check-label" for="skinlight">Light</label>
                        </div>
                        <div class="form-check me-1">
                            <input type="radio" id="skinbordered" name="skinradio"
                                class="form-check-input layout-name" data-layout="bordered-layout">
                            <label class="form-check-label" for="skinbordered">Bordered</label>
                        </div>
                        <div class="form-check me-1">
                            <input type="radio" id="skindark" name="skinradio"
                                class="form-check-input layout-name" data-layout="dark-layout">
                            <label class="form-check-label" for="skindark">Dark</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" id="skinsemidark" name="skinradio"
                                class="form-check-input layout-name" data-layout="semi-dark-layout">
                            <label class="form-check-label" for="skinsemidark">Semi Dark</label>
                        </div>
                    </div>
                </div>

                <hr>

                <!-- Menu -->
                <div class="customizer-menu px-2">
                    <div id="customizer-menu-collapsible" class="d-flex">
                        <p class="fw-bold me-auto m-0">Menu Collapsed</p>
                        <div class="form-check form-check-primary form-switch">
                            <input type="checkbox" class="form-check-input" id="collapse-sidebar-switch">
                            <label class="form-check-label" for="collapse-sidebar-switch"></label>
                        </div>
                    </div>
                </div>
                <hr>

                <!-- Layout Width -->
                <div class="customizer-footer px-2">
                    <p class="fw-bold">Layout Width</p>
                    <div class="d-flex">
                        <div class="form-check me-1">
                            <input type="radio" id="layout-width-full" name="layoutWidth" class="form-check-input"
                                checked="">
                            <label class="form-check-label" for="layout-width-full">Full Width</label>
                        </div>
                        <div class="form-check me-1">
                            <input type="radio" id="layout-width-boxed" name="layoutWidth"
                                class="form-check-input">
                            <label class="form-check-label" for="layout-width-boxed">Boxed</label>
                        </div>
                    </div>
                </div>
                <hr>

                <!-- Navbar -->
                <div class="customizer-navbar px-2">
                    <div id="customizer-navbar-colors">
                        <p class="fw-bold">Navbar Color</p>
                        <ul class="list-inline unstyled-list">
                            <li class="color-box bg-white border selected" data-navbar-default=""></li>
                            <li class="color-box bg-primary" data-navbar-color="bg-primary"></li>
                            <li class="color-box bg-secondary" data-navbar-color="bg-secondary"></li>
                            <li class="color-box bg-success" data-navbar-color="bg-success"></li>
                            <li class="color-box bg-danger" data-navbar-color="bg-danger"></li>
                            <li class="color-box bg-info" data-navbar-color="bg-info"></li>
                            <li class="color-box bg-warning" data-navbar-color="bg-warning"></li>
                            <li class="color-box bg-dark" data-navbar-color="bg-dark"></li>
                        </ul>
                    </div>

                    <p class="navbar-type-text fw-bold">Navbar Type</p>
                    <div class="d-flex">
                        <div class="form-check me-1">
                            <input type="radio" id="nav-type-floating" name="navType" class="form-check-input"
                                checked="">
                            <label class="form-check-label" for="nav-type-floating">Floating</label>
                        </div>
                        <div class="form-check me-1">
                            <input type="radio" id="nav-type-sticky" name="navType" class="form-check-input">
                            <label class="form-check-label" for="nav-type-sticky">Sticky</label>
                        </div>
                        <div class="form-check me-1">
                            <input type="radio" id="nav-type-static" name="navType" class="form-check-input">
                            <label class="form-check-label" for="nav-type-static">Static</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" id="nav-type-hidden" name="navType" class="form-check-input">
                            <label class="form-check-label" for="nav-type-hidden">Hidden</label>
                        </div>
                    </div>
                </div>
                <hr>

                <!-- Footer -->
                <div class="customizer-footer px-2">
                    <p class="fw-bold">Footer Type</p>
                    <div class="d-flex">
                        <div class="form-check me-1">
                            <input type="radio" id="footer-type-sticky" name="footerType"
                                class="form-check-input">
                            <label class="form-check-label" for="footer-type-sticky">Sticky</label>
                        </div>
                        <div class="form-check me-1">
                            <input type="radio" id="footer-type-static" name="footerType" class="form-check-input"
                                checked="">
                            <label class="form-check-label" for="footer-type-static">Static</label>
                        </div>
                        <div class="form-check me-1">
                            <input type="radio" id="footer-type-hidden" name="footerType"
                                class="form-check-input">
                            <label class="form-check-label" for="footer-type-hidden">Hidden</label>
                        </div>
                    </div>
                </div>
                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                </div>
                <div class="ps__rail-y" style="top: 0px; right: 0px;">
                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                </div>
            </div>

        </div>
        <!-- End: Customizer-->


        <div class="sidenav-overlay"
            style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
        </div>
        <div class="drag-target"
            style="touch-action: pan-y; user-select: none; -webkit-user-drag: none; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);">
        </div>

        <!-- BEGIN: Footer-->
        <footer class="footer footer-static footer-light">
            <p class="clearfix mb-0"><span class="float-md-start d-block d-md-inline-block mt-25">COPYRIGHT © 2023<a
                        class="ms-25" href="https://1.envato.market/pixinvent_portfolio"
                        target="_blank"></a><span class="d-none d-sm-inline-block">, Eva Indriana Juansyah</span></span><span class="float-md-end d-none d-md-block">Hand-crafted &amp; Made
                    with<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-heart">
                        <path
                            d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z">
                        </path>
                    </svg></span></p>
        </footer>
        <!-- END: Footer-->


        <!-- BEGIN: Vendor JS-->
        <script src="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/vendors/js/vendors.min.js') }}"></script>
        <!-- BEGIN Vendor JS-->

        <!-- BEGIN: Page Vendor JS-->
        <script src="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/vendors/js/charts/apexcharts.min.js') }}"></script>
        <script src="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/vendors/js/extensions/toastr.min.js') }}"></script>
        <script src="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/vendors/js/extensions/moment.min.js') }}"></script>
        <script
            src="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}">
        </script>
        <script
            src="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}">
        </script>
        <script
            src="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}">
        </script>
        <script
            src="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}">
        </script>
        <script
            src="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js') }}">
        </script>
        <!-- END: Page Vendor JS-->

        <!-- BEGIN: Theme JS-->
        <script src="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/js/core/app-menu.js') }}"></script>
        <script src="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/js/core/app.js') }}"></script>
        <script src="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/js/scripts/customizer.js') }}"></script>
        <!-- END: Theme JS-->

        <!-- BEGIN: Page JS-->
        <script src="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/js/scripts/pages/dashboard-analytics.js') }}"></script>
        <script src="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/js/scripts/pages/app-invoice-list.js') }}"></script>
        <!-- END: Page JS-->

        <!--select2-->
        <script src="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/js/scripts/forms/form-select2.js') }}"></script>
        <script src="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/vendors/js/forms/select/select2.full.min.js') }}">
        </script>

        <!--fontawesome-->
        <script src="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/vendors/fontawesome-free/js/all.js') }}"></script>
        <script src="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/vendors/fontawesome-free/js/all.min.js') }}"></script>
        <script src="{{ asset('vuexy/demo1/demo2/demo3/demo4/app-assets/vendors/fontawesome-free/js/brands.js') }}"></script>



        {{--  <script>
            $(window).on('load', function() {
                if (feather) {
                    feather.replace({
                        width: 14,
                        height: 14
                    });
                }
            })
        </script>  --}}
    </body>
    <!-- END: Body-->
    <!-- Mirrored from pixinvent.com/demo/vuexy-html-bootstrap-admin-template/bs5-old/html/ltr/vertical-menu-template/dashboard-analytics.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 24 Jan 2023 09:55:22 GMT -->


</html>
