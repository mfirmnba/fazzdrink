<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Fazz Drink</title>
        @vite('resources/css/app.css')

        {{-- Google Fonts --}}
        <link
            href="https://fonts.googleapis.com/css2?family=Cinzel:wght@700&display=swap"
            rel="stylesheet"
        />
        <style>
            .font-cinzel {
                font-family: "Cinzel", serif;
            }
        </style>
    </head>
    <body class="bg-gray-50 text-gray-900">
        {{-- Navbar --}}
        @include('welcome.layouts.navbar')

        {{-- Content --}}
        <main>@yield('content')</main>

        {{-- Footer --}}
        @include('welcome.layouts.footer')
    </body>
</html>
