<!DOCTYPE html>
<html lang="en">


<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&amp;display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <style type="text/css">
        svg:not(:root).svg-inline--fa {
            overflow: visible
        }

        .svg-inline--fa {
            display: inline-block;
            font-size: inherit;
            height: 40px;
            overflow: visible;
            vertical-align: -.125em
        }

        .svg-inline--fa.fa-lg {
            vertical-align: -.225em
        }

        .svg-inline--fa.fa-w-10 {
            width: .625em
        }

        .svg-inline--fa.fa-w-14 {
            width: .875em
        }

        /* ^ both arrow inside button */
        .svg-inline--fa.fa-w-15 {
            width: .9375em
        }

        .svg-inline--fa.fa-w-16 {
            width: 1em
        }

        .svg-inline--fa.fa-w-18 {
            width: 1.125em
        }

        .svg-inline--fa.fa-w-20 {
            width: 1.25em
        }
    </style>

    <link rel="apple-touch-icon" type="image/png" href="https://cpwebassets.codepen.io/assets/favicon/apple-touch-icon-5ae1a0698dcc2402e9712f7d01ed509a57814f994c660df9f7a952f3060705ee.png">
    <link rel="mask-icon" type="" href="https://cpwebassets.codepen.io/assets/favicon/logo-pin-8f3771b1072e3c38bd662872f6b673a722f4b3ca2421637d5596661b4e2132cc.svg" color="#111">
    <title>Robot Control </title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans|Voces" rel="stylesheet">
    <style>
        body {
            display: grid;
            box-sizing: border-box;
            place-content: center;
            height: unset !important;
            min-height: 100vh;
            background-color: #222228 !important;
            font-family: Voces, Open-Sans, Arial, Verdana;
            margin: 0;
            padding: 10px 20px;
        }

        body::after {
            content: "Develped by Wesam Al-jurish";
            color: #aaa;
            margin-top: 25px;
            text-align: center;
            pointer-events: none;
            user-select: none;
        }

        body>h3 {
            text-align: center;
            margin: 0;
            color: #aaa;
        }

        body>demobox {
            position: relative;
            display: block;
            background: #161616;
            margin-top: 20px;
            border-radius: 8px;
            color: #FFF;
        }
    </style>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="https://robin-garbe.de/include/css_library/click.css">
    <link rel="stylesheet" href="https://robin-garbe.de/include/css_library/design-variables.css">
    <link rel="stylesheet" href="https://robin-garbe.de/include/css_library/design.css">
    <link rel="stylesheet" href="https://robin-garbe.de/include/css_library/tooltips.css">

    <style>
        /* ----------------------------- */
        /* -------  Demo Style:  ------- */
        /* ----------------------------- */
        body>demobox {
            width: 90vw;
            min-width: 900px;
            height: calc(100vh - 180px);
            min-height: 690px;
            border-radius: 0;
            border: 2px solid #161616;
            margin-top: -50px;
        }


        /* ----------------------------- */
        /* ---  Color Customisation:  -- */
        /* ----------------------------- */
        :root {
            --primary: #0088FF;
            --primary-text: #FFFFFF;
            --secondary: #DDDDDD;
            --secondary-text: #333333;
            --secondary_dark: #444;
            --secondary_dark-text: #FAFAFA;
            --success: #00BA47;
            --success-text: #FFFFFF;
            --warning: #F3BA41;
            --warning-text: #FFFFFF;
            --danger: #EF4239;
            --danger-text: #FFFFFF;
            --gray_dark: #1E1E1E;
            --gray: #424242;
            --gray_light: #DDDDDD;
            --gray_lighter: #EEEEEE;
        }


        /* ----------------------------- */
        /* -------  App Style:  -------- */
        /* ----------------------------- */
        *,
        *::before,
        *::after {
            user-select: none;
        }

        .app {
            position: relative;
            height: calc(100%);
            background: linear-gradient(10deg, #191919, #262626);
        }

        .sidepanel {
            position: absolute;
            display: flex;
            top: 50px;
            bottom: 0;
            left: 0;
            width: 80px;
            margin: 0;
            padding: 0;
            flex-direction: column;
            align-items: center;
        }

        .sidepanel>menuitem {
            position: relative;
            width: 100%;
            text-align: center;
            font-size: 32px;
            padding: 8px 0;
            cursor: pointer;

            transition: background 0.2s ease;
        }



        .sidepanel>menuitem:last-child {
            position: absolute;
            bottom: 12px;
        }

        .sidepanel>menuitem::before {
            content: "";
            position: absolute;
            background: var(--primary);
            top: calc(50% - 13px);
            left: 0;
            width: 5px;
            height: 26px;
            border-radius: 0 16px 16px 0;
            opacity: 0;
            transform-origin: center left;
            transform: scale(0);
            transition: transform 0.4s ease,
                opacity 0.4s ease;
        }

        .sidepanel>menuitem:hover {
            background: #00000033;
        }

        .sidepanel>menuitem>svg {
            opacity: 0.2;
            transition: opacity 0.2s ease;
        }

        .sidepanel>menuitem:hover>svg,
        .sidepanel>.menu-active>svg {
            opacity: 1;
        }

        .sidepanel>.menu-active {
            pointer-events: none;
        }

        .sidepanel>.menu-active::before {
            opacity: 1;
            transform: scale(1);
        }


        .mainbox {
            background: #161616;
            top: 50px;
            right: 0;
            bottom: 0;
            left: 80px;
            position: absolute !important;
            border-radius: 10px 0 0 0;
        }

        .main {
            margin: 8px;
            height: calc(100% - 16px);
        }

        /* ----------------------------- */
        /* -------  Main Style:  ------- */
        /* ----------------------------- */
        .main {
            position: absolute !important;
            display: flex;
            justify-content: center;
            box-sizing: border-box;
            min-width: 800px;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            overflow-x: hidden;
            overflow-y: auto;
            opacity: 0;
            pointer-events: none;
        }

        .main-active {
            display: flex;
            opacity: 1;
            pointer-events: auto;
        }

        .main::-webkit-scrollbar {
            width: 8px;
        }

        .main::-webkit-scrollbar-thumb {
            background: #444;
            border-radius: 20px;
            box-shadow: 0 0 0 4px #161616;
        }

        .main::-webkit-scrollbar-thumb:hover {
            background: #666;
            transition: background 0.2s;
        }

        .main::-webkit-scrollbar-track {
            background: #FFFFFF11;
            border-radius: 20px;
        }

        .main-column1 {
            flex-grow: 0;
            flex-shrink: 0;

        }

        .main[max-width~="1120px"] .main-column1 {
            width: 390px;
        }

        .main-column2 {
            flex-grow: 1;
            flex-shrink: 1;
            max-width: 1100px;
        }

        .ctrlWidget {
            position: relative;
            padding: 20px;
        }

        .ctrlWidget::before {
            content: "";
            position: absolute;
            display: block;
            background: linear-gradient(10deg, #191919, #262626);
            width: calc(100% - 16px);
            height: calc(100% - 16px);
            top: 8px;
            left: 8px;
            border-radius: 0.4rem;
        }

        .ctrlWidget h2,
        .ctrlWidget h3,
        .ctrlWidget h4,
        .ctrlWidget td,
        .ctrlWidget.widgetConnect>div>div>div>span {
            position: relative;
        }

        .ctrlWidget h2 {
            margin-top: 0.4rem;
        }

        .ctrlWidget table {
            width: 100%;
            border-spacing: 0;
        }

        .ctrlWidget table td {
            padding: 0;
        }

        .widgetForKin .rs-table:not(:last-of-type) td {
            border-bottom: 2px solid #FFFFFF22;
        }

        .rs-table td:first-child {
            width: 10px;
        }

        .rs-table td:last-child {
            width: 100%;
        }

        .invKin_box1 {
            flex-grow: 0;
            flex-shrink: 0;
            padding-right: 20px;
            padding-top: 180px;
            padding-bottom: 530px;

        }

        .invKin_subbox1>table td>div {
            text-align: center;
        }

        .invKin_subbox1>table td>div:not(:last-child) {
            margin-bottom: 6px;
        }

        /* ----------------------------- */
        /* ----  Range Slider Style: --- */
        /* ----------------------------- */
        .range-slider,
        .range-slider *,
        .rangeslider,
        .rangeslider * {
            box-sizing: border-box;
        }

        .range-slider {
            width: 100%;
            padding: 15px 10px 15px 20px;
        }

        /*The Range Bar*/
        input[type="range"] {
            -webkit-appearance: none;
            width: 87%;
            padding: 2px;
            margin-top: 10px;
            box-shadow: inset 4px 6px 10px -4px rgba(0, 0, 0, 0.3), 0 1px 1px -1px rgba(255, 255, 255, 0.3);
            background: rgba(0, 0, 0, 0.2);
            overflow: hidden;
            outline: none;
            border: 1px solid rgba(0, 0, 0, 0.7);
        }

        /*The Range Dial*/
        input[type="range"]::-webkit-slider-thumb {
            -webkit-appearance: none;
            width: 20px;
            height: 20px;
            background: #333;
            position: relative;
            z-index: 3;
            box-shadow: inset 4px 6px 10px -4px rgba(0, 0, 0, 0.3), 0 1px 1px -1px rgba(255, 255, 255, 0.3);
        }

        input[type="range"]::-webkit-slider-thumb:hover {
            cursor: pointer;
        }

        #rangeValue,
        #rangeValue1,
        #rangeValue2,
        #rangeValue3,
        #rangeValue4,
        #rangeValue5 {
            width: 55px;
            font-size: 15px;
            background-color: #222;
            color: whitesmoke;
            text-align: center;
            position: relative;
            bottom: 8px;
            box-shadow: 0 0.5em 0.5em -0.4em rgb(95, 104, 129);
            border: gray inset 3px;
        }

        input[type="number"] {
            width: 55px;
            font-size: 15px;
            background-color: #222;
            color: whitesmoke;
            text-align: center;
            position: relative;
            top: 9px;
            box-shadow: 0 0.5em 0.5em -0.4em rgb(95, 104, 129);
            border: gray inset 3px;
        }

        label {
            font-size: 18px;
            position: relative;
            top: 9px;
        }

        #rangeValue::after {
            content: "°";
        }

        #rangeValue1::after {
            content: "°";
        }

        #rangeValue2::after {
            content: "°";
        }

        #rangeValue3::after {
            content: "°";
        }

        #rangeValue4::after {
            content: "°";
        }

        #rangeValue5::after {
            content: "°";
        }

        .range2,
        .range3,
        .range4 {
            margin-top: 20px 15px;
        }

        /* Range Buttons: */
        .range-buttons {
            text-align: center;

        }

        .range-slider .range-buttons {
            margin-top: 6px;
        }

        .range-buttons.range-btnsArtic>button:nth-child(-n+6) {
            /* Correct width of the buttons with negative values */
            padding: 0.438rem 0.9rem;
        }


        .d-btn-square {
            padding: 5%;
            margin: 2px;
        }

        td {
            font-size: 20px;
            position: relative;
            left: 15px;
            ;
            text-align: center;
        }

        #save {
            margin: 10px 50px;
        }

        #show {
            position: relative;
            right: 8%;
        }

        /* ----------------------------- */
        /* ------  Titlebar Style: ----- */
        /* ----------------------------- */
        #titlebar {
            position: absolute;
            z-index: 900000;
            display: block;
            height: 50px;
            width: 100%;
            background: transparent;
            color: #FFF;
            padding: 4px;
        }

        #titlebar-drag-region {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            -webkit-app-region: drag;
        }

        #titlebar-icon {
            position: absolute;
            top: 4px;
            left: 17px;
            height: 44px;
            width: 64px;
        }

        #titlebar-icon>svg {
            height: 100%;
        }

        #titlebar-title {
            position: absolute;
            display: flex;
            align-items: center;
            top: 0px;
            left: 80px;
            height: 50px;
            font-size: 24px;
            font-family: Verdana;
        }

        #titlebar-title>span:last-child {
            font-size: 20px;
            font-family: 'Press Start 2P', cursive;
            margin-left: 16px;
            opacity: 0.5;
        }

        #titlebar-window-controls {
            position: absolute;
            display: grid;
            top: 0;
            right: 0;
            height: 34px;
            grid-template-columns: 46px 46px 46px;
            -webkit-app-region: no-drag;
        }

        .titlebar-button {
            display: flex;
            width: 100%;
            height: 100%;

            grid-row: 1 / span 1;
            justify-content: center;
            align-items: center;
            cursor: default;
            user-select: none;
            transition: background 0.15s ease-out;
        }

        .titlebar-button:hover {
            background: rgba(255, 255, 255, 0.2);
            transition: background 0.1s ease-out;
        }

        .titlebar-button svg {
            width: 40%;
        }

        .titlebar-button svg path {
            fill: #FFFFFF;
        }

        #titlebar-min-button {
            grid-column: 1;

        }

        #titlebar-max-button,
        #titlebar-restore-button {
            grid-column: 2;
        }

        #titlebar-restore-button {
            display: none;
        }

        #titlebar-close-button {
            grid-column: 3;
        }

        #titlebar-close-button:hover {
            background: #E81123;
        }
    </style>
    <style>
        /* Responsive */

        /* Tablet */
        @media screen and (max-width:768px) {
            body>demobox {
                width: 90vw;
                min-width: 900px;
                height: 900px;
                min-height: 690px;
                border-radius: 0;
                border: 2px solid #161616;
                zoom: 70%;
            }
        }

        @media screen and (max-width:620px) {
            .invKin_box1 {
                padding-bottom: 780px;
            }

            body>demobox {
                width: 90vw;
                min-width: 900px;
                height: 900px;
                min-height: 690px;
                border-radius: 0;
                border: 2px solid #161616;
                zoom: 60%;
            }
        }

        /* mobile phones */
        /* @media screen and (max-width:500px) {
            body>demobox {
                width: 90vw;
                min-width: 900px;
                height: 900px;
                min-height: 690px;
                border-radius: 0;
                border: 2px solid #161616;
                zoom: 40%;
            }
        }

        @media screen and (max-width:320px) {
            body>demobox {
                width: 90vw;
                min-width: 900px;
                height: 900px;
                min-height: 690px;
                border-radius: 0;
                border: 2px solid #161616;
                zoom: 36%;
            }
        } */
    </style>

    <script>
        // connect the slider with input number
        function fetch(idrange, idtext, value, idspan) {
            let get = document.getElementById(idrange).value;
            document.getElementById(idtext).value = get;
            document.getElementById(idspan).innerHTML = value;
        }
        // connect buttons with slider and value
        function myFunction(degree, ids, idr, idt) {
            document.getElementById(idr).value = degree;
            document.getElementById(idt).value = degree;
            document.getElementById(ids).innerHTML = degree;

        }
        $(document).ready(function() {
            $("#hide").click(function() {
                $("#Hide").hide();
            });
            $("#show").click(function() {
                $("#Hide").show();
            });
        });
    </script>

    <script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons/ionicons.dkb1z4hj.js" type="module" crossorigin="true" data-resources-url="https://unpkg.com/ionicons@4.5.5/dist/ionicons/" data-namespace="ionicons"></script>

</head>

<body translate="no" class="d-dark vsc-initialized">
    <br>
    <br>
    <demobox>

        <div class="app">

            <header id="titlebar">
                <div id="titlebar-drag-region">
                    <div id="titlebar-icon">
                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                            <path fill="#242222" stroke="#FFFFFF" stroke-width="25" stroke-miterlimit="10" d="M452.14,440.5H59.86 C40.61,440.5,25,424.89,25,405.64V106.36C25,87.11,40.61,71.5,59.86,71.5h392.27c19.25,0,34.86,15.61,34.86,34.86v299.27 C487,424.89,471.39,440.5,452.14,440.5z"></path>
                            <path fill="#FFFFFF" d="M69,406L69,406c-4.14,0-7.5-3.36-7.5-7.5v-15c0-4.14,3.36-7.5,7.5-7.5h0c4.14,0,7.5,3.36,7.5,7.5v15 C76.5,402.64,73.14,406,69,406z"></path>
                            <path fill="#CCCCCC" d="M106.5,402.25L106.5,402.25c-4.14,0-7.5-3.36-7.5-7.5v-7.5c0-4.14,3.36-7.5,7.5-7.5h0 c4.14,0,7.5,3.36,7.5,7.5v7.5C114,398.89,110.64,402.25,106.5,402.25z"></path>
                            <path fill="#FFFFFF" d="M144,406L144,406c-4.14,0-7.5-3.36-7.5-7.5v-15c0-4.14,3.36-7.5,7.5-7.5l0,0c4.14,0,7.5,3.36,7.5,7.5v15 C151.5,402.64,148.14,406,144,406z"></path>
                            <path fill="#CCCCCC" d="M181.5,402.25L181.5,402.25c-4.14,0-7.5-3.36-7.5-7.5v-7.5c0-4.14,3.36-7.5,7.5-7.5l0,0 c4.14,0,7.5,3.36,7.5,7.5v7.5C189,398.89,185.64,402.25,181.5,402.25z"></path>
                            <path fill="#FFFFFF" d="M219,406L219,406c-4.14,0-7.5-3.36-7.5-7.5v-15c0-4.14,3.36-7.5,7.5-7.5l0,0c4.14,0,7.5,3.36,7.5,7.5v15 C226.5,402.64,223.14,406,219,406z"></path>
                            <path fill="#CCCCCC" d="M256.5,402.25L256.5,402.25c-4.14,0-7.5-3.36-7.5-7.5v-7.5c0-4.14,3.36-7.5,7.5-7.5l0,0 c4.14,0,7.5,3.36,7.5,7.5v7.5C264,398.89,260.64,402.25,256.5,402.25z"></path>
                            <path fill="#FFFFFF" d="M294,406L294,406c-4.14,0-7.5-3.36-7.5-7.5v-15c0-4.14,3.36-7.5,7.5-7.5l0,0c4.14,0,7.5,3.36,7.5,7.5v15 C301.5,402.64,298.14,406,294,406z"></path>
                            <path fill="#CCCCCC" d="M331.5,402.25L331.5,402.25c-4.14,0-7.5-3.36-7.5-7.5v-7.5c0-4.14,3.36-7.5,7.5-7.5l0,0 c4.14,0,7.5,3.36,7.5,7.5v7.5C339,398.89,335.64,402.25,331.5,402.25z"></path>
                            <path fill="#FFFFFF" d="M369,406L369,406c-4.14,0-7.5-3.36-7.5-7.5v-15c0-4.14,3.36-7.5,7.5-7.5l0,0c4.14,0,7.5,3.36,7.5,7.5v15 C376.5,402.64,373.14,406,369,406z"></path>
                            <path fill="#CCCCCC" d="M406.5,402.25L406.5,402.25c-4.14,0-7.5-3.36-7.5-7.5v-7.5c0-4.14,3.36-7.5,7.5-7.5l0,0 c4.14,0,7.5,3.36,7.5,7.5v7.5C414,398.89,410.64,402.25,406.5,402.25z"></path>
                            <path fill="#FFFFFF" d="M444,406L444,406c-4.14,0-7.5-3.36-7.5-7.5v-15c0-4.14,3.36-7.5,7.5-7.5l0,0c4.14,0,7.5,3.36,7.5,7.5v15 C451.5,402.64,448.14,406,444,406z"></path>
                            <path fill="#AAAAAA" d="M279,227L279,227c-4.14,0-7.5-3.36-7.5-7.5v-91c0-4.14,3.36-7.5,7.5-7.5l0,0c4.14,0,7.5,3.36,7.5,7.5v91 C286.5,223.64,283.14,227,279,227z"></path>
                            <path fill="#AAAAAA" d="M354,166L354,166c-4.14,0-7.5-3.36-7.5-7.5v-30c0-4.14,3.36-7.5,7.5-7.5l0,0c4.14,0,7.5,3.36,7.5,7.5v30 C361.5,162.64,358.14,166,354,166z"></path>
                            <path fill="#AAAAAA" d="M429,241L429,241c-4.14,0-7.5-3.36-7.5-7.5v-105c0-4.14,3.36-7.5,7.5-7.5l0,0c4.14,0,7.5,3.36,7.5,7.5v105 C436.5,237.64,433.14,241,429,241z"></path>
                            <path fill="#FFFFFF" d="M279,347L279,347c-4.14,0-7.5-3.36-7.5-7.5v-43c0-4.14,3.36-7.5,7.5-7.5l0,0c4.14,0,7.5,3.36,7.5,7.5v43 C286.5,343.64,283.14,347,279,347z"></path>
                            <path fill="#FFFFFF" d="M354,347L354,347c-4.14,0-7.5-3.36-7.5-7.5v-103c0-4.14,3.36-7.5,7.5-7.5l0,0c4.14,0,7.5,3.36,7.5,7.5v103 C361.5,343.64,358.14,347,354,347z"></path>
                            <path fill="#FFFFFF" d="M429,347L429,347c-4.14,0-7.5-3.36-7.5-7.5v-28c0-4.14,3.36-7.5,7.5-7.5l0,0c4.14,0,7.5,3.36,7.5,7.5v28 C436.5,343.64,433.14,347,429,347z"></path>
                            <path fill="#51A84C" stroke="#FFFFFF" stroke-width="16" stroke-miterlimit="10" d="M280,293h-2c-11.32,0-20.5-9.18-20.5-20.5v-2 c0-11.32,9.18-20.5,20.5-20.5h2c11.32,0,20.5,9.18,20.5,20.5v2C300.5,283.82,291.32,293,280,293z"></path>
                            <path fill="#E6AA40" stroke="#FFFFFF" stroke-width="16" stroke-miterlimit="10" d="M355,232.5h-2c-11.32,0-20.5-9.18-20.5-20.5 v-2c0-11.32,9.18-20.5,20.5-20.5h2c11.32,0,20.5,9.18,20.5,20.5v2C375.5,223.32,366.32,232.5,355,232.5z"></path>
                            <path fill="#C04D4A" stroke="#FFFFFF" stroke-width="16" stroke-miterlimit="10" d="M430,307.5h-2c-11.32,0-20.5-9.18-20.5-20.5 v-2c0-11.32,9.18-20.5,20.5-20.5h2c11.32,0,20.5,9.18,20.5,20.5v2C450.5,298.32,441.32,307.5,430,307.5z"></path>
                            <path fill="#464444" d="M144.5,127.5L144.5,127.5c-41.42,0-75,33.58-75,75v0c0,8.28,6.72,15,15,15h120c8.28,0,15-6.72,15-15v0 C219.5,161.08,185.92,127.5,144.5,127.5z"></path>
                            <path fill="#AAAAAA" d="M136.99,219.84L136.99,219.84c-3.5-2.22-4.54-6.85-2.32-10.35l25.83-40.75c2.22-3.5,6.85-4.54,10.35-2.32 l0,0c3.5,2.22,4.54,6.85,2.32,10.35l-25.83,40.75C145.12,221.02,140.48,222.06,136.99,219.84z"></path>
                            <path fill="none" stroke="#FFFFFF" stroke-width="15" stroke-miterlimit="10" d="M144.5,127.5L144.5,127.5 c-41.42,0-75,33.58-75,75v0c0,8.28,6.72,15,15,15h120c8.28,0,15-6.72,15-15v0C219.5,161.08,185.92,127.5,144.5,127.5z"></path>
                            <path fill="#FFFFFF" d="M111.36,250.53c-1.9-1.87-4.31-2.81-7.17-2.81H76.6c-2.87,0-5.28,0.95-7.16,2.83 c-1.88,1.88-2.83,4.29-2.83,7.16v84.59c0,2.88,0.95,5.28,2.83,7.16c1.88,1.88,4.29,2.83,7.16,2.83h27.59 c2.86,0,5.28-0.95,7.17-2.81c1.91-1.88,2.88-4.29,2.88-7.18V257.7C114.24,254.82,113.27,252.41,111.36,250.53z M99.49,261.46 v77.08H81.36v-77.08H99.49z"></path>
                            <path fill="#FFFFFF" d="M166.16,250.52c-1.9-1.87-4.31-2.81-7.17-2.81h-35v97.2c0,4.07,3.31,7.38,7.38,7.38 c4.07,0,7.38-3.31,7.38-7.38v-31.74h20.24c2.87,0,5.29-0.96,7.19-2.86c1.9-1.9,2.86-4.32,2.86-7.19V257.7 C169.04,254.86,168.05,252.38,166.16,250.52z M154.29,261.46v37.9h-15.54v-37.9H154.29z"></path>
                            <path fill="#FFFFFF" d="M214.98,283.63c4.09,0,7.41-3.32,7.41-7.41V257.7c0-2.85-1.01-5.34-2.93-7.19 c-1.92-1.86-4.34-2.8-7.19-2.8h-25.38c-2.87,0-5.28,0.95-7.16,2.83c-1.88,1.88-2.83,4.29-2.83,7.16v84.59 c0,2.88,0.95,5.28,2.83,7.16c1.88,1.88,4.29,2.83,7.16,2.83h25.38c2.85,0,5.27-0.94,7.19-2.8c1.92-1.86,2.93-4.34,2.93-7.19v-20.6 c0-4.08-3.32-7.41-7.41-7.41s-7.41,3.32-7.41,7.41v16.84h-15.92v-77.08h15.92v14.76C207.57,280.31,210.9,283.63,214.98,283.63z"></path>
                        </svg>
                    </div>
                    <div id="titlebar-title">
                        <span>Robot Control</span>
                    </div>
                    <div id="titlebar-window-controls">
                        <div class="titlebar-button" id="titlebar-min-button">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512">
                                <path d="M416,288H96c-17.67,0-32-14.33-32-32v0c0-17.67,14.33-32,32-32h320c17.67,0,32,14.33,32,32v0C448,273.67,433.67,288,416,288 z"></path>
                            </svg>
                        </div>
                        <div class="titlebar-button" id="titlebar-max-button">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512">
                                <path d="M405.25,63.95h-298.6c-23.5,0-42.7,19.2-42.7,42.7v298.7c0,23.5,19.2,42.7,42.7,42.7h298.7c23.5,0,42.7-19.2,42.7-42.7 v-298.7C447.95,83.15,428.75,63.95,405.25,63.95z M384,384H128V128h256V384z"></path>
                            </svg>
                        </div>
                        <div class="titlebar-button" id="titlebar-restore-button">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512">
                                <path d="M414.62,63.95H181.4c-18.35,0-33.35,15-33.35,33.35v50.75H97.3c-18.35,0-33.35,15-33.35,33.35v233.3 c0,18.35,15,33.35,33.35,33.35h233.3c18.35,0,33.35-15,33.35-33.35v-50.75h50.75c18.35,0,33.35-15,33.35-33.35V97.3 C447.97,78.95,432.98,63.95,414.62,63.95z M299.95,384.05h-172v-172h172V384.05z M384.05,299.95h-20.1V181.4 c-0.08-18.35-15.07-33.35-33.43-33.35H212.05v-20.1h172V299.95z"></path>
                            </svg>
                        </div>
                        <div class="titlebar-button" id="titlebar-close-button">
                            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512">
                                <path d="M435.15,389.89L301.12,255.87l133.89-133.89c12.5-12.5,12.5-32.76,0-45.25l0,0c-12.5-12.5-32.76-12.5-45.25,0L255.87,210.61 L122.11,76.85c-12.5-12.5-32.76-12.5-45.25,0l0,0c-12.5,12.5-12.5,32.76,0,45.25l133.76,133.76L76.72,389.76 c-12.5,12.5-12.5,32.76,0,45.25l0,0c12.5,12.5,32.76,12.5,45.25,0l133.89-133.89l134.02,134.02c12.5,12.5,32.76,12.5,45.25,0l0,0 C447.64,422.65,447.64,402.39,435.15,389.89z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </header>
            <menu class="sidepanel">
                <menuitem data-menu="ControlPanel" class="menu-active">
                <svg class="svg-inline--fa fa-digital-tachograph fa-w-20" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="digital-tachograph" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512" data-fa-i2svg="">
                    <path fill="currentColor" d="M608 96H32c-17.67 0-32 14.33-32 32v256c0 17.67 14.33 32 32 32h576c17.67 0 32-14.33 32-32V128c0-17.67-14.33-32-32-32zM304 352c0 4.42-3.58 8-8 8H72c-4.42 0-8-3.58-8-8v-8c0-4.42 3.58-8 8-8h224c4.42 0 8 3.58 8 8v8zM72 288v-16c0-4.42 3.58-8 8-8h16c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8H80c-4.42 0-8-3.58-8-8zm64 0v-16c0-4.42 3.58-8 8-8h16c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8h-16c-4.42 0-8-3.58-8-8zm64 0v-16c0-4.42 3.58-8 8-8h16c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8h-16c-4.42 0-8-3.58-8-8zm64 0v-16c0-4.42 3.58-8 8-8h16c4.42 0 8 3.58 8 8v16c0 4.42-3.58 8-8 8h-16c-4.42 0-8-3.58-8-8zm40-64c0 8.84-7.16 16-16 16H80c-8.84 0-16-7.16-16-16v-48c0-8.84 7.16-16 16-16h208c8.84 0 16 7.16 16 16v48zm272 128c0 4.42-3.58 8-8 8H344c-4.42 0-8-3.58-8-8v-8c0-4.42 3.58-8 8-8h224c4.42 0 8 3.58 8 8v8z"></path>
                </svg><!-- <i class="fas fa-digital-tachograph"></i> -->
                <div class="menu-tooltip" tooltip="Control Panel" flow="right"></div>
                </menuitem>



                <menuitem>

                </menuitem>
            </menu>

            <div class="mainbox">
                <div class="main main-ControlPanel main-active" max-width="1120px" style="position: relative;">
                    <div class="main-column1">
                        <div class="ctrlWidget widgetInvKin">
                            <h2>Base Controlar</h2>
                            <div>
                                <form action="base.php" method="post">
                                    <div class="invKin_box1">
                                        <div class="invKin_subbox1">
                                            <table>
                                                <!-- Direction bouttons -->
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div>
                                                                <button class="d-btn d-btn-secondary d-btn-square invKin-btnX+" name="forward"><svg class="svg-inline--fa fa-chevron-up fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-up" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                                                        <path fill="currentColor" d="M240.971 130.524l194.343 194.343c9.373 9.373 9.373 24.569 0 33.941l-22.667 22.667c-9.357 9.357-24.522 9.375-33.901.04L224 227.495 69.255 381.516c-9.379 9.335-24.544 9.317-33.901-.04l-22.667-22.667c-9.373-9.373-9.373-24.569 0-33.941L207.03 130.525c9.372-9.373 24.568-9.373 33.941-.001z"></path>
                                                                    </svg><!-- <i class="fas fa-chevron-up"></i> --></button>
                                                            </div>
                                                            <div>
                                                                <button class="d-btn d-btn-secondary d-btn-square invKin-btnY-" name="left"><svg class="svg-inline--fa fa-chevron-left fa-w-10" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-left" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                                                                        <path fill="currentColor" d="M34.52 239.03L228.87 44.69c9.37-9.37 24.57-9.37 33.94 0l22.67 22.67c9.36 9.36 9.37 24.52.04 33.9L131.49 256l154.02 154.75c9.34 9.38 9.32 24.54-.04 33.9l-22.67 22.67c-9.37 9.37-24.57 9.37-33.94 0L34.52 272.97c-9.37-9.37-9.37-24.57 0-33.94z"></path>
                                                                    </svg><!-- <i class="fas fa-chevron-left"></i> --></button>
                                                                <button class="d-btn d-btn-secondary d-btn-square invKin-btnHome" name="stop">STOP</button>
                                                                <button class="d-btn d-btn-secondary d-btn-square invKin-btnY+" name="right"><svg class="svg-inline--fa fa-chevron-right fa-w-10" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-right" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512" data-fa-i2svg="">
                                                                        <path fill="currentColor" d="M285.476 272.971L91.132 467.314c-9.373 9.373-24.569 9.373-33.941 0l-22.667-22.667c-9.357-9.357-9.375-24.522-.04-33.901L188.505 256 34.484 101.255c-9.335-9.379-9.317-24.544.04-33.901l22.667-22.667c9.373-9.373 24.569-9.373 33.941 0L285.475 239.03c9.373 9.372 9.373 24.568.001 33.941z"></path>
                                                                    </svg><!-- <i class="fas fa-chevron-right"></i> --></button>
                                                            </div>
                                                            <div>
                                                                <button class="d-btn d-btn-secondary d-btn-square invKin-btnX-" name="backward"><svg class="svg-inline--fa fa-chevron-down fa-w-14" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chevron-down" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                                                        <path fill="currentColor" d="M207.029 381.476L12.686 187.132c-9.373-9.373-9.373-24.569 0-33.941l22.667-22.667c9.357-9.357 24.522-9.375 33.901-.04L224 284.505l154.745-154.021c9.379-9.335 24.544-9.317 33.901.04l22.667 22.667c9.373 9.373 9.373 24.569 0 33.941L240.971 381.476c-9.373 9.372-24.569 9.372-33.942 0z"></path>
                                                                    </svg><!-- <i class="fas fa-chevron-down"></i> --></button>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="invKin_subbox2">
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="main-column2">
                        <div class="ctrlWidget widgetForKin" id="c2">
                            <h2>Arm Controllar</h2>

                            <table class="rs-table">
                                <!-- ******* RANGE BAR1******** -->
                                <tbody>
                                    <tr>
                                        <td>
                                            Base:
                                        </td>
                                        <td>
                                            <!-- *******RANGE BAR1******** -->
                                            <div class="range-slider" max-width="300px 400px 600px 885px 750px 630px 495px 360px 810px 655px 525px 370px 205px" style="position: relative;">
                                                <div class="range1">
                                                    <input type="range" min="0" max="180" value="0" id="get" name="Base" onmousemove="fetch('get','put',this.value,'rangeValue')" onchange="fetch('get','put',this.value,'rangeValue')">
                                                    <span id="rangeValue">0</span>
                                                </div>


                                                <!-- *******BOUTTONS UNDER RANGE BAR1******** -->

                                                <div class="range-buttons range-btnsArtic">
                                                    <button class="d-btn d-btn-secondary" id="button4" onclick="myFunction(30,'rangeValue','get','put')" type="button"><span>30°</span></button>
                                                    <button class="d-btn d-btn-secondary" id="button3" onclick="myFunction(45,'rangeValue','get','put')" type="button"><span>45°</span></button>
                                                    <button class="d-btn d-btn-secondary d-btn-square rs-home" id="button5" onclick="myFunction(0,'rangeValue','get','put')" type="button"><span>0°</span></button>
                                                    <button class="d-btn d-btn-secondary " id="button2" onclick="myFunction(90,'rangeValue','get','put')" type="button"><span>90°</span></button>
                                                    <button class="d-btn d-btn-secondary" type="button" onclick="myFunction(180,'rangeValue','get','put')"><span>180°</span></button>
                                                </div>

                                                <label for="put">Last saved value :</label>
                                                <input type="number" id="put" min="0" max=" 180" placeholder=" 0" value="<?php
                                                                                                                            if (isset($_POST['Base'])) {
                                                                                                                                if (isset($_POST['save'])) {
                                                                                                                                    echo $_POST['Base'];
                                                                                                                                }
                                                                                                                            } ?>">
                                                <div dir="ltr" class="resize-sensor" style="position: absolute; inset: -10px 0px 0px -10px; overflow: hidden; z-index: -1; visibility: hidden;">
                                                    <div class="resize-sensor-expand" style="position: absolute; left: -10px; top: -10px; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                                                        <div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 100000px; height: 100000px;"></div>
                                                    </div>
                                                    <div class="resize-sensor-shrink" style="position: absolute; left: -10px; top: -10px; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                                                        <div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>

                            <table class="rs-table">
                                <!-- *******RANGE BAR2******** -->
                                <tbody>
                                    <tr>
                                        <td>Shoulder:</td>
                                        <td>
                                            <div class="range-slider" max-width="600px 885px 750px 630px 810px 655px 525px" style="position: relative;">
                                                <div class="range2">
                                                    <input type="range" min="0" max="180" value="0" id="get1" name="shoulder" onmousemove="fetch('get1','put1',this.value,'rangeValue1')" onchange="fetch('get1','put1',this.value,'rangeValue1')">

                                                    <span id="rangeValue1">0</span>
                                                </div>
                                                <!-- *******BOUTTONS UNDER RANGE BAR2******** -->
                                                <div class="range-buttons range-btnsArtic">
                                                    <button class="d-btn d-btn-secondary" type="button" onclick="myFunction(30,'rangeValue1','get1','put1')"><span>30°</span></button>
                                                    <button class="d-btn d-btn-secondary" type="button" onclick="myFunction(45,'rangeValue1','get1','put1')"><span>45°</span></button>
                                                    <button class="d-btn d-btn-secondary d-btn-square rs-home" type="button" onclick="myFunction(0,'rangeValue1','get1','put1')"><span>0°</span></button>
                                                    <button class="d-btn d-btn-secondary " type="button" onclick="myFunction(90,'rangeValue1','get1','put1')"><span>90°</span></button>
                                                    <button class="d-btn d-btn-secondary" type="button" onclick="myFunction(180,'rangeValue1','get1','put1')"><span>180°</span></button>
                                                </div>
                                                <label for="put1">Last saved value :</label>
                                                <input type="number" id="put1" min="0" " max=" 180" " placeholder=" 0" value="<?php
                                                                                                                                if (isset($_POST['shoulder'])) {
                                                                                                                                    if (isset($_POST['save'])) {
                                                                                                                                        echo $_POST['shoulder'];
                                                                                                                                    }
                                                                                                                                } ?>">
                                                <div dir="ltr" class="resize-sensor" style="position: absolute; inset: -10px 0px 0px -10px; overflow: hidden; z-index: -1; visibility: hidden;">
                                                    <div class="resize-sensor-expand" style="position: absolute; left: -10px; top: -10px; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                                                        <div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 100000px; height: 100000px;"></div>
                                                    </div>
                                                    <div class="resize-sensor-shrink" style="position: absolute; left: -10px; top: -10px; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                                                        <div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>


                            <table class="rs-table">
                                <!-- *******RANGE BAR3******** -->
                                <tbody>
                                    <tr>
                                        <td>Elbow:</td>
                                        <td>
                                            <div class="range-slider" max-width="600px 885px 750px 630px 810px 655px 525px" style="position: relative;">
                                                <div class=" range3">
                                                    <input type="range" min="0" max="180" value="0" id="get2" name="Elbow" onmousemove="fetch('get2','put2',this.value,'rangeValue2')" onchange="fetch('get2','put2',this.value,'rangeValue2')">
                                                    <span id="rangeValue2">0</span>
                                                </div>


                                                <div class="range-buttons range-btnsArtic">
                                                    <button class="d-btn d-btn-secondary" type="button" onclick="myFunction(30,'rangeValue2','get2','put2')"><span>30°</span></button>
                                                    <button class="d-btn d-btn-secondary" type="button" onclick="myFunction(45,'rangeValue2','get2','put2')"><span>45°</span></button>
                                                    <button class="d-btn d-btn-secondary d-btn-square rs-home" type="button" onclick="myFunction(0,'rangeValue2','get2','put2')"><span>0°</span></button>
                                                    <button class="d-btn d-btn-secondary " type="button" onclick="myFunction(90,'rangeValue2','get2','put2')"><span>90°</span></button>
                                                    <button class="d-btn d-btn-secondary" type="button" onclick="myFunction(180,'rangeValue2','get2','put2')"><span>180°</span></button>
                                                </div>
                                                <label for="put2">Last saved value :</label>
                                                <input type="number" id="put2" min=" 0" max="180" " placeholder=" 0" value="<?php
                                                                                                                            if (isset($_POST['Elbow'])) {
                                                                                                                                if (isset($_POST['save'])) {
                                                                                                                                    echo $_POST['Elbow'];
                                                                                                                                }
                                                                                                                            } ?>">
                                                <div dir="ltr" class="resize-sensor" style="position: absolute; inset: -10px 0px 0px -10px; overflow: hidden; z-index: -1; visibility: hidden;">
                                                    <div class="resize-sensor-expand" style="position: absolute; left: -10px; top: -10px; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                                                        <div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 100000px; height: 100000px;"></div>
                                                    </div>
                                                    <div class="resize-sensor-shrink" style="position: absolute; left: -10px; top: -10px; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                                                        <div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>


                            <table class="rs-table">
                                <!-- *******RANGE BAR4******** -->
                                <tbody>
                                    <tr>
                                        <td>Wrist:</td>
                                        <td>
                                            <div class="range-slider" max-width="600px 885px 750px 630px 810px 655px 525px" style="position: relative;">
                                                <div class=" range4">
                                                    <input type="range" min="0" max="180" value="0" id="get3" name="Wrist" onmousemove="fetch('get3','put3',this.value,'rangeValue3')" onchange="fetch('get3','put3',this.value,'rangeValue3')">
                                                    <span id="rangeValue3">0</span>
                                                </div>

                                                <div class="range-buttons range-btnsArtic">
                                                    <button class="d-btn d-btn-secondary" type="button" onclick="myFunction(30,'rangeValue3','get3','put3')"><span>30°</span></button>
                                                    <button class="d-btn d-btn-secondary" type="button" onclick="myFunction(45,'rangeValue3','get3','put3')"><span>45°</span></button>
                                                    <button class="d-btn d-btn-secondary d-btn-square rs-home" type="button" onclick="myFunction(0,'rangeValue3','get3','put3')"><span>0°</span></button>
                                                    <button class="d-btn d-btn-secondary " type="button" onclick="myFunction(90,'rangeValue3','get3','put3')"><span>90°</span></button>
                                                    <button class="d-btn d-btn-secondary" type="button" onclick="myFunction(180,'rangeValue3','get3','put3')"><span>180°</span></button>
                                                </div>
                                                <label for="put3">Last saved value :</label>
                                                <input type="number" id="put3" min=" 0" max="180" " placeholder=" 0" value="<?php
                                                                                                                            if (isset($_POST['Wrist'])) {
                                                                                                                                if (isset($_POST['save'])) {
                                                                                                                                    echo $_POST['Wrist'];
                                                                                                                                }
                                                                                                                            } ?>">
                                                <div dir="ltr" class="resize-sensor" style="position: absolute; inset: -10px 0px 0px -10px; overflow: hidden; z-index: -1; visibility: hidden;">
                                                    <div class="resize-sensor-expand" style="position: absolute; left: -10px; top: -10px; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                                                        <div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 100000px; height: 100000px;"></div>
                                                    </div>
                                                    <div class="resize-sensor-shrink" style="position: absolute; left: -10px; top: -10px; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                                                        <div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>


                            <table class="rs-table">
                                <!-- *******RANGE BAR5******** -->
                                <tbody>
                                    <tr>
                                        <td>Gripper:</td>
                                        <td>
                                            <div class="range-slider" max-width="600px 885px 750px 630px 810px 655px 525px" style="position: relative;">
                                                <div class=" range4">
                                                    <input type="range" min="0" max="180" value="0" id="get4" name="Gripper" onmousemove="fetch('get4','put4',this.value,'rangeValue4')" onchange="fetch('get4','put4',this.value,'rangeValue4')">
                                                    <span id="rangeValue4">0</span>
                                                </div>


                                                <div class="range-buttons range-btnsArtic">
                                                    <button class="d-btn d-btn-secondary" type="button" onclick="myFunction(30,'rangeValue4','get4','put4')"><span>30°</span></button>
                                                    <button class="d-btn d-btn-secondary" type="button" onclick="myFunction(45,'rangeValue4','get4','put4')"><span>45°</span></button>
                                                    <button class="d-btn d-btn-secondary d-btn-square rs-home" type="button" onclick="myFunction(0,'rangeValue4','get4','put4')"><span>0°</span></button>
                                                    <button class="d-btn d-btn-secondary " type="button" onclick="myFunction(90,'rangeValue4','get4','put4')"><span>90°</span></button>
                                                    <button class="d-btn d-btn-secondary" type="button" onclick="myFunction(180,'rangeValue4','get4','put4')"><span>180°</span></button>
                                                </div>
                                                <label for="put4">Last saved value :</label>
                                                <input type="number" id="put4" min=" 0" max="180" " placeholder=" 0" value="<?php {
                                                                                                                                if (isset($_POST['save'])) {
                                                                                                                                    if (isset($_POST['Gripper'])) echo $_POST['Gripper'];
                                                                                                                                }
                                                                                                                            } ?>">
                                                <div dir="ltr" class="resize-sensor" style="position: absolute; inset: -10px 0px 0px -10px; overflow: hidden; z-index: -1; visibility: hidden;">
                                                    <div class="resize-sensor-expand" style="position: absolute; left: -10px; top: -10px; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                                                        <div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 100000px; height: 100000px;"></div>
                                                    </div>
                                                    <div class="resize-sensor-shrink" style="position: absolute; left: -10px; top: -10px; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                                                        <div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>


                            <table class="rs-table" id="Hide">
                                <!-- *******RANGE BAR6******** -->
                                <tbody>
                                    <tr>
                                        <td>Engine:</td>
                                        <td>
                                            <div class="range-slider" max-width="600px 885px 750px 630px 810px 655px 525px" style="position: relative;">
                                                <div class=" range5">
                                                    <input type="range" min="0" max="180" value="0" id="get5" name="Engine" onmousemove="fetch('get5','put5',this.value,'rangeValue5')" onchange="fetch('get5','put5',this.value,'rangeValue5')">
                                                    <span id="rangeValue5">0</span>
                                                </div>

                                                <div class="range-buttons range-btnsArtic">
                                                    <button class="d-btn d-btn-secondary" type="button" id="hide"><span>Hide</span></button>
                                                    <button class="d-btn d-btn-secondary" type="button" onclick="myFunction(30,'rangeValue5','get5','put5')"><span>30°</span></button>
                                                    <button class="d-btn d-btn-secondary" type="button" onclick="myFunction(45,'rangeValue5','get5','put5')"><span>45°</span></button>
                                                    <button class="d-btn d-btn-secondary d-btn-square rs-home" type="button" onclick="myFunction(0,'rangeValue5','get5','put5')"><span>0°</span></button>
                                                    <button class="d-btn d-btn-secondary " type="button" onclick="myFunction(90,'rangeValue5','get5','put5')"><span>90°</span></button>
                                                    <button class="d-btn d-btn-secondary" type="button" onclick="myFunction(180,'rangeValue5','get5','put5')"><span>180°</span></button>

                                                </div>


                                                <label for="put5">Last saved value :</label>
                                                <input type="number" id="put5" min=" 0" max="180" " placeholder=" 0" value="<?php
                                                                                                                            if (isset($_POST['Engine'])) {
                                                                                                                                if (isset($_POST['save'])) {
                                                                                                                                    echo $_POST['Engine'];
                                                                                                                                }
                                                                                                                            } ?>">
                                                <div dir="ltr" class="resize-sensor" style="position: absolute; inset: -10px 0px 0px -10px; overflow: hidden; z-index: -1; visibility: hidden;">
                                                    <div class="resize-sensor-expand" style="position: absolute; left: -10px; top: -10px; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                                                        <div style="position: absolute; left: 0px; top: 0px; transition: all 0s ease 0s; width: 100000px; height: 100000px;"></div>
                                                    </div>
                                                    <div class="resize-sensor-shrink" style="position: absolute; left: -10px; top: -10px; right: 0; bottom: 0; overflow: hidden; z-index: -1; visibility: hidden;">
                                                        <div style="position: absolute; left: 0; top: 0; transition: 0s; width: 200%; height: 200%"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                            <div class="range-buttons range-btnsArtic">
                                <button class="d-btn d-btn-secondary" type="button" id="show"><span>Show</span></button>
                                <button class="d-btn d-btn-secondary" type="submit" name="save" id="save"><span>Save</span></button>
                                <button class="d-btn d-btn-secondary" type="submit" name="run" id="run"><span>Run</span></button>

                            </div>

                            </form>

                        </div>

                    </div>
                </div>

            </div>

    </demobox>

    <?php
    error_reporting(E_ALL & ~E_NOTICE);
    ini_set('display_errors', 1);
    $Base = $_POST["Base"];
    $shoulder = $_POST["shoulder"];
    $Elbow = $_POST["Elbow"];
    $Wrist = $_POST["Wrist"];
    $Gripper = $_POST["Gripper"];
    $Engine = $_POST["Engine"];


    $conn = new mysqli('localhost', 'root', '', 'ROBOT_CONTROLLERS');
    if (isset($_POST["save"])) {
        $stmt = $conn->prepare("INSERT INTO Engines (Base,Shoulder,Elbow,Wrist,Gripper,Engine) VALUES (?,?,?,?,?,?)");
        $stmt->bind_param("iiiiii", $Base, $shoulder, $Elbow, $Wrist, $Gripper, $Engine);
        $stmt->execute();
    }

    if (isset($_POST["run"])) {
        $stmt = $conn->prepare("INSERT INTO Run VALUES (NULL,1);");
        $stmt->execute();
    }
    if (isset($_POST["forward"])) {
        $stmt = $conn->prepare("INSERT INTO Directions (id,Direction) VALUES (NULL,'Forward')");
        $stmt->execute();
    }
    if (isset($_POST["left"])) {
        $stmt = $conn->prepare("INSERT INTO Directions (id,Direction) VALUES (NULL,'Left')");
        $stmt->execute();
    }
    if (isset($_POST["right"])) {
        $stmt = $conn->prepare("INSERT INTO Directions (id,Direction) VALUES (NULL,'Right')");
        $stmt->execute();
    }
    if (isset($_POST["backward"])) {
        $stmt = $conn->prepare("INSERT INTO Directions (id,Direction) VALUES (NULL,'Backward')");
        $stmt->execute();
    }
    if (isset($_POST["stop"])) {
        $stmt = $conn->prepare("INSERT INTO Directions (id,Direction) VALUES (NULL,'Stop')");
        $stmt->execute();
    }
    ?>

</body>

</html>