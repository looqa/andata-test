@include('layouts.parts.head')
<body>
<div id="app">
    <v-app>
        <v-layout>
            <main-header></main-header>
            <v-main class="d-flex justify-center">
                <v-container style="max-width:1200px;" class="pt-10">
                    @yield('content')
                </v-container>
            </v-main>
            <main-footer></main-footer>
        </v-layout>
    </v-app>
</div>
@assets(main.ts)
</body>
</html>