<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="theme-color" content="#12121A">
        <meta name="author" content="vinvui">

        <link rel="canonical" href="https://herocompanion.vinvui.com/">
        <link rel="shortcut icon" href="https://herocompanion.vinvui.com/favicon.ico" type="image/x-icon">
        <link rel='manifest' href='https://herocompanion.vinvui.com/manifest.json'>

        <meta property="og:locale" content="en_EN">
        <meta property="og:type" content="website">
        <meta property="og:title" content="Hero Companion">
        <meta property="og:description" content="Brew Tracking App">
        <meta property="og:url" content="https://herocompanion.vinvui.com">
        <meta property="og:site_name" content="Hero Companion">
        <meta property="og:image" content="https://herocompanion.vinvui.com/assets/logo/logo@512.png">
        <meta property="og:image:secure_url" content="">
        <meta property="og:image:width" content="512">
        <meta property="og:image:height" content="512">

        <meta name="msapplication-TileColor" content="#000000">
        <meta name="msapplication-TileImage" content="https://herocompanion.vinvui.com/assets/logo/logo@512.png">

        <link rel="icon" type="image/png" sizes="52x52" href="https://herocompanion.vinvui.com/assets/logo/logo@52.png">
        <link rel="icon" type="image/png" sizes="148x148" href="https://herocompanion.vinvui.com/assets/logo/logo@148.png">
        <link rel="icon" type="image/png" sizes="512x512" href="https://herocompanion.vinvui.com/assets/logo/logo@512.png">
        <link rel="icon" type="image/png" sizes="1024x1024" href="https://herocompanion.vinvui.com/assets/logo/logo@1024.png">

        <link rel="apple-touch-icon" sizes="52x52" href="https://herocompanion.vinvui.com/assets/logo/logo@52.png">
        <link rel="apple-touch-icon" sizes="148x148" href="https://herocompanion.vinvui.com/assets/logo/logo@148.png">
        <link rel="apple-touch-icon" sizes="512x512" href="https://herocompanion.vinvui.com/assets/logo/logo@512.png">
        <link rel="apple-touch-icon" sizes="1024x1024" href="https://herocompanion.vinvui.com/assets/logo/logo@1024.png">

        <link rel="apple-touch-startup-image" href="https://herocompanion.vinvui.com/assets/logo/logo@148.png" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)">
        <link rel="apple-touch-startup-image" href="https://herocompanion.vinvui.com/assets/logo/logo@148.png" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)">
        <link rel="apple-touch-startup-image" href="https://herocompanion.vinvui.com/assets/logo/logo@148.png" media="(device-width: 621px) and (device-height: 1104px) and (-webkit-device-pixel-ratio: 3)">
        <link rel="apple-touch-startup-image" href="https://herocompanion.vinvui.com/assets/logo/logo@512.png" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)">
        <link rel="apple-touch-startup-image" href="https://herocompanion.vinvui.com/assets/logo/logo@512.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2)">
        <link rel="apple-touch-startup-image" href="https://herocompanion.vinvui.com/assets/logo/logo@512.png" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3)">
        <link rel="apple-touch-startup-image" href="https://herocompanion.vinvui.com/assets/logo/logo@1024.png" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2)">
        <link rel="apple-touch-startup-image" href="https://herocompanion.vinvui.com/assets/logo/logo@1024.png" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2)">
        <link rel="apple-touch-startup-image" href="https://herocompanion.vinvui.com/assets/logo/logo@1024.png" media="(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2)">
        <link rel="apple-touch-startup-image" href="https://herocompanion.vinvui.com/assets/logo/logo@1024.png" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2)">

        <title inertia>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @routes
        @vite(['resources/js/app.js', "resources/js/Pages/{$page['component']}.vue"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
