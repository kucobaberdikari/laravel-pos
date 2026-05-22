<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{  'POS Livewire' }}</title>
        @vite('resources/css/app.css')
        {{-- @livewireStyles --}}
    </head>
    <body class="bg-blue-gray-50 ">
        <main class="hide-print flex flex-row h-screen antialiased text-blue-gray-800">
            <div class="flex lg:w-screen flex-row h-screen antialiased text-blue-gray-800  ">
                {{-- sidebar left --}}
                @includeIf('components.pos-sidebar')

                {{-- main content --}}
                <div class="grow flex">
                    <div class="flex flex-col bg-blue-gray-50 h-full w-full py-4">
                        @includeIf('components.pos-navbar')
                        {{ $slot }}
                    </div>

                    {{-- right sidebar --}}
                    @includeIf('components.pos-right-sidebar')
                </div>

            </div>
        </main>
        @livewireScripts
    </body>
</html>
