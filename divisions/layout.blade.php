<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5/themes.css" rel="stylesheet" type="text/css" />
    <title>{{$empresa->name}}</title>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/sort@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body
    class="{{ isset($menuContent->styleLayouts->background) ? 'bg-['.$menuContent->styleLayouts->background.']' : 'bg-white' }}">
    @php
    $menu = json_decode($menuContent->intems);
    @endphp
    <header class="shadow-sm border-b border-gray-300
    {{ isset($menuContent->styleLayouts->background_header) ? 
    'bg-['.$menuContent->styleLayouts->background_header.']' : 'bg-base-200' }}">
        <div class="navbar mx-auto container">
            <div class="navbar-start">
                <div class="dropdown">
                    <div tabindex="0" role="button" class="btn btn-ghost lg:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h8m-8 6h16" />
                        </svg>
                    </div>
                    <ul tabindex="-1"
                        class="menu menu-sm dropdown-content bg-base-100 rounded-box z-1 mt-3 w-52 p-2 shadow">
                        @foreach ($menu as $key => $item)
                        <li>
                            <a href="#link{{$key + 1}}" {{ isset($menuContent->styleLayouts->color_menu) ?
                                'text-['.$menuContent->styleLayouts->color_menu.']' : '' }}
                                {{ isset($menuContent->styleLayouts->color_hover_menu) ?
                                'hover:text-['.$menuContent->styleLayouts->color_hover_menu.']' : '' }}
                                {{ isset($menuContent->styleLayouts->bold) ? 'font-'.$menuContent->styleLayouts->bold :
                                '' }}
                                {{ isset($menuContent->styleLayouts->font) ? 'font-'.$menuContent->styleLayouts->font :
                                '' }}
                                {{ isset($menuContent->styleLayouts->size) ? 'text-'.$menuContent->styleLayouts->size :
                                '' }}
                                >
                                {{$item->name}}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <a class="text-xl">
                    <img src="../../../storage/{{ $empresa->empresaImage->logo }}" alt="" class="w-20">
                </a>
            </div>
            <div class="navbar-center hidden lg:flex">
                <ul class="menu menu-horizontal px-1">
                    @foreach ($menu as $key => $item)
                    <li class="text-white">
                        <a href="#link{{$item->page}}" class="
                            {{ isset($menuContent->styleLayouts->color_menu) ? 'text-['.$menuContent->styleLayouts->color_menu.']' : '' }}
                            {{ isset($menuContent->styleLayouts->color_hover_menu) ? 'hover:text-['.$menuContent->styleLayouts->color_hover_menu.']' : '' }}
                            {{ isset($menuContent->styleLayouts->bold) ? 'font-'.$menuContent->styleLayouts->bold : '' }}
                            {{ isset($menuContent->styleLayouts->font) ? 'font-'.$menuContent->styleLayouts->font : '' }}
                            {{ isset($menuContent->styleLayouts->size) ? 'text-'.$menuContent->styleLayouts->size : '' }}   
                            ">
                            {{$item->name}}
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="navbar-end">
                <a href="#contacts" class="
                    group relative w-full sm:w-auto px-6 py-3 min-w-[160px]
                    absolute inset-0  rounded-lg cursor-pointer
                    {{isset($menuContent->styleLayouts->background_button1)? 'bg-['.$menuContent->styleLayouts->background_button1.']': 'bg-gradient-to-r from-violet-600 to-cyan-600' }}  
                    {{ isset($menuContent->styleLayouts->color_button1) ?  'text-['.$menuContent->styleLayouts->color_button1.']' : '' }}
                    {{ isset($menuContent->styleLayouts->color_hover_button1) ? 'hover:text-['.$menuContent->styleLayouts->color_hover_button1.']' : '' }} 
                    ">
                    <div class="">
                    </div>
                    <div class="relative flex items-center justify-center gap-2">
                        <span class="font-medium">Contactar agora</span>
                        <svg class="w-6 h-6  {{ isset($menuContent->styleLayouts->color_button1) ? 
                        'text-['.$menuContent->styleLayouts->color_button1.']' : '' }}" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18.427 14.768 17.2 13.542a1.733 1.733 0 0 0-2.45 0l-.613.613a1.732 1.732 0 0 1-2.45 0l-1.838-1.84a1.735 1.735 0 0 1 0-2.452l.612-.613a1.735 1.735 0 0 0 0-2.452L9.237 5.572a1.6 1.6 0 0 0-2.45 0c-3.223 3.2-1.702 6.896 1.519 10.117 3.22 3.221 6.914 4.745 10.12 1.535a1.601 1.601 0 0 0 0-2.456Z" />
                        </svg>
                    </div>
                </a>
            </div>
        </div>
    </header>

    <main @if (isset($user) and ($user->id == $empresa->user_id))
        x-sort="hendle"

        x-data="
        {
        hendle (item, position)
        {
        axios.put('/update-position',
        {
        id: item,
        position
        }).then(response =>
        {
        console.log(response.data);
        }).catch(error =>
        {
        console.log(error);
        });
        },
        }
        @endif
        ">
        @forelse ($sections as $section)
        @php
        $viewPath = 'components.' . str_replace('.blade.php', '', $section->html);
        @endphp
        @include($viewPath, ['empresa' => $empresa, 'section' => $section, 'user'=> $user])
        @empty
        @endforelse
    </main>

    <!-- BAKS--->
    <section class="bg-gray-200" id="contacts">
        <div class="container mx-auto px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto ">
            <div class="grid sm:grid-cols-2 sm:items-center gap-8">
                <div class="sm:order-2">
                    <div class="relative pt-[50%] sm:pt-[100%] rounded-lg">
                        <img class="size-full absolute top-0 start-0 object-cover rounded-lg"
                            src="https://cloud.paysend.com/strapi/prod/Cheapest_way_1200_7b845567a5.jpg"
                            alt="Blog Image">
                    </div>
                </div>
                <div class="sm:order-1">
                    <div class="mt-10" id="payment-references">
                        <h3 class="text-2xl font-bold text-indigo-500">Referencias de pagamento</h3>
                        @forelse ($empresa->banks as $bank)
                        <div class="mt-4 space-y-2  grid grig-cols-3 mt-10 ">
                            <div class="border p-4 border-gray-200 rounded-lg shadow bg-white">
                                <p class="text-sm font-semibold text-gray-800">{{$bank->name}}</p>
                                <p class="text-xs text-gray-600">TITULAR: {{$bank->titular}}</p>
                                <p class="text-xs text-gray-600">IBAN: {{$bank->iban}}</p>
                                <p class="text-xs text-gray-600">TELEFONE: {{$bank->telefone}}</p>
                                <hr class="my-2 text-gray-200">
                            </div>
                        </div>
                        @empty
                        <div class="mt-4 space-y-2  grid grig-cols-3 mt-10 ">
                            <div class="border p-4 border-gray-200 rounded-lg shadow bg-white">
                                <p class="text-sm font-semibold text-gray-800">BAI</p>
                                <p class="text-xs text-gray-600">TITULAR: Josimar Tito</p>
                                <p class="text-xs text-gray-600">IBAN: 0099494994494959596959</p>
                                <p class="text-xs text-gray-600">TELEFONE: 944555999</p>
                                <hr class="my-2 text-gray-200">
                            </div>
                        </div>
                        <div class="mt-4 space-y-2  grid grig-cols-3">
                            <div class="border p-4 border-gray-200 rounded-lg shadow bg-white">
                                <p class="text-sm font-semibold text-gray-800">BAI</p>
                                <p class="text-xs text-gray-600">TITULAR: Josimar Tito</p>
                                <p class="text-xs text-gray-600">IBAN: 0099494994494959596959</p>
                                <p class="text-xs text-gray-600">TELEFONE: 944555999</p>
                                <hr class="my-2 text-gray-200">
                            </div>
                        </div>
                        <div class="mt-4 space-y-2  grid grig-cols-3">
                            <div class="border p-4 border-gray-200 rounded-lg shadow bg-white">
                                <p class="text-sm font-semibold text-gray-800">BAI</p>
                                <p class="text-xs text-gray-600">TITULAR: Josimar Tito</p>
                                <p class="text-xs text-gray-600">IBAN: 0099494994494959596959</p>
                                <p class="text-xs text-gray-600">TELEFONE: 944555999</p>
                                <hr class="my-2 text-gray-200">
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--END BANKS--->
    <!---Contacts-->
    <section id="link6" class=" container mx-auto py-20 bg-gray-900 text-white px-10 rounded-lg my-10">
        <div class="container-custom">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <!-- Contact Details -->
                <div>
                    <img src="https://cdni.iconscout.com/illustration/premium/thumb/contact-us-illustration-svg-download-png-3779137.png"
                        alt="">
                </div>

                <!-- Contact Form -->
                <div class="bg-gray-800 p-8 rounded-xl">

                    <h2 class="text-3xl font-bold mb-6">
                        Contactos
                    </h2>
                    <p class="text-xl text-gray-300 mb-8">
                        Entre em contacto connosco!
                    </p>
                    <div class="space-y-6">
                        <!-- Location -->
                        <div class="flex items-start">
                            <svg class="h-6 w-6 text-amber-600 mt-1 mr-4 flex-shrink-0"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 11c1.656 0 3-1.343 3-3s-1.344-3-3-3-3 1.343-3 3 1.344 3 3 3zm0 1c-2.667 0-8 1.333-8 4v2h16v-2c0-2.667-5.333-4-8-4z" />
                            </svg>
                            <div>
                                <h3 class="font-bold text-lg mb-1">Localização</h3>
                                <p class="text-gray-300">{{$empresa->morada}}</p>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div class="flex items-start">
                            <svg class="h-6 w-6 text-amber-400 mt-1 mr-4 flex-shrink-0"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 5a2 2 0 012-2h1l2 5-2 1a11 11 0 006 6l1-2 5 2v1a2 2 0 01-2 2h-1c-6.627 0-12-5.373-12-12V5z" />
                            </svg>
                            <div>
                                <h3 class="font-bold text-lg mb-1">Telefone</h3>
                                <p class="text-gray-300">+244 {{$empresa->telefone1}}</p>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="flex items-start">
                            <svg class="h-6 w-6 text-amber-400 mt-1 mr-4 flex-shrink-0"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                                aria-hidden="true">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 12l-4-4-4 4m8 0v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4m0-4a2 2 0 012-2h8a2 2 0 012 2v4z" />
                            </svg>
                            <div>
                                <h3 class="font-bold text-lg mb-1">Email</h3>
                                <p class="text-gray-300">{{$empresa->email}}</p>
                            </div>
                        </div>
                    </div>
                    <!-- Social Icons -->
                    <div class="mt-8 flex space-x-4">
                        <!-- Facebook -->
                        <a href="{{$empresa->facebook_page ?? ''}}"
                            class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-amber-500 transition-colors"
                            aria-label="Facebook">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path
                                    d="M22 12a10 10 0 10-11.5 9.9v-7h-2v-3h2v-2c0-2 1.2-3 3-3h2v3h-1c-1 0-1 .5-1 1v1h3l-1 3h-2v7A10 10 0 0022 12z" />
                            </svg>
                        </a>
                        <!-- Instagram -->
                        <a href="{{ $empresa->instagram ?? ''}}"
                            class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-amber-500 transition-colors"
                            aria-label="Instagram">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path
                                    d="M7 2C4.24 2 2 4.24 2 7v10c0 2.76 2.24 5 5 5h10c2.76 0 5-2.24 5-5V7c0-2.76-2.24-5-5-5H7zm10 2a3 3 0 013 3v10a3 3 0 01-3 3H7a3 3 0 01-3-3V7a3 3 0 013-3h10zm-5 3a5 5 0 100 10 5 5 0 000-10zm0 2a3 3 0 110 6 3 3 0 010-6zm4.5-.5a1 1 0 100 2 1 1 0 000-2z" />
                            </svg>
                        </a>
                        <!-- LinkedIn -->
                        <a href="{{$empresa->linkeding ?? ''}}"
                            class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center hover:bg-amber-500 transition-colors"
                            aria-label="LinkedIn">
                            <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                                <path
                                    d="M4.98 3.5a2.5 2.5 0 112.5 2.5 2.5 2.5 0 01-2.5-2.5zM3 8h4v12H3zm6 0h3.8v1.75h.05a4.15 4.15 0 013.7-2.05c3.95 0 4.7 2.6 4.7 5.95V20h-4v-5.5c0-1.3-.02-3-1.85-3-1.86 0-2.15 1.45-2.15 2.9V20h-4z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--END CAONTACT-->
    <section class="relative h-96">
        @php
        $latitude = $empresa->latitude ?? -8.839;
        $longitude = $empresa->longitude ?? 13.289;
        @endphp
        <section class="relative h-96">
            <iframe class="w-full h-full" style="border:0;" loading="lazy" allowfullscreen
                referrerpolicy="no-referrer-when-downgrade"
                src="https://www.google.com/maps?q={{ $latitude }},{{ $longitude }}&hl=pt&z=15&output=embed">
            </iframe>
        </section>
    </section>

    <div class="fab fab-flower">
        <!-- a focusable div with tabindex is necessary to work on all browsers. role="button" is necessary for accessibility -->
        <div tabindex="0" role="button" class="btn btn-circle btn-lg bg-blue-500 border-blue-500">
            <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M5 12h14m-7 7V5" />
            </svg>

        </div>

        <!-- Main Action button replaces the original button when FAB is open -->
        <button class="fab-main-action btn btn-circle btn-lg btn-primary">
            <svg class="w-6 h-6 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18 17.94 6M18 18 6.06 6" />
            </svg>
        </button>

        <!-- buttons that show up when FAB is open -->
        <a href="https://api.whatsapp.com/send?phone={{$empresa->numero_whatsapp}}" class="btn btn-circle btn-lg">
            <svg class="w-6 h-6 text-green-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                height="24" fill="none" viewBox="0 0 24 24">
                <path fill="currentColor" fill-rule="evenodd"
                    d="M12 4a8 8 0 0 0-6.895 12.06l.569.718-.697 2.359 2.32-.648.379.243A8 8 0 1 0 12 4ZM2 12C2 6.477 6.477 2 12 2s10 4.477 10 10-4.477 10-10 10a9.96 9.96 0 0 1-5.016-1.347l-4.948 1.382 1.426-4.829-.006-.007-.033-.055A9.958 9.958 0 0 1 2 12Z"
                    clip-rule="evenodd" />
                <path fill="currentColor"
                    d="M16.735 13.492c-.038-.018-1.497-.736-1.756-.83a1.008 1.008 0 0 0-.34-.075c-.196 0-.362.098-.49.291-.146.217-.587.732-.723.886-.018.02-.042.045-.057.045-.013 0-.239-.093-.307-.123-1.564-.68-2.751-2.313-2.914-2.589-.023-.04-.024-.057-.024-.057.005-.021.058-.074.085-.101.08-.079.166-.182.249-.283l.117-.14c.121-.14.175-.25.237-.375l.033-.066a.68.68 0 0 0-.02-.64c-.034-.069-.65-1.555-.715-1.711-.158-.377-.366-.552-.655-.552-.027 0 0 0-.112.005-.137.005-.883.104-1.213.311-.35.22-.94.924-.94 2.16 0 1.112.705 2.162 1.008 2.561l.041.06c1.161 1.695 2.608 2.951 4.074 3.537 1.412.564 2.081.63 2.461.63.16 0 .288-.013.4-.024l.072-.007c.488-.043 1.56-.599 1.804-1.276.192-.534.243-1.117.115-1.329-.088-.144-.239-.216-.43-.308Z" />
            </svg>
        </a>
        <a href="/" class="btn btn-circle btn-lg">
            <svg class="w-6 h-6 text-yellow-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5" />
            </svg>
        </a>
        @if (isset($user) and ($user->id == $empresa->user_id))
        <a target="_blank" href="{{route('site',$empresa->link_site)}}" class="btn btn-circle btn-lg">
            <svg class="w-6 h-6 text-blue-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                height="24" fill="none" viewBox="0 0 24 24">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m14.304 4.844 2.852 2.852M7 7H4a1 1 0 0 0-1 1v10a1 1 0 0 0 1 1h11a1 1 0 0 0 1-1v-4.5m2.409-9.91a2.017 2.017 0 0 1 0 2.853l-6.844 6.844L8 14l.713-3.565 6.844-6.844a2.015 2.015 0 0 1 2.852 0Z" />
            </svg>
        </a>
        @endif
    </div>
    <footer class="border-t shadow-sm 
    footer sm:footer-horizontal 
    text-neutral-content items-center p-4
     {{ isset($menuContent->styleLayouts->background_footer) ? 'bg-['.$menuContent->styleLayouts->background_footer.']' : 'bg-[#121212]' }}
     {{ isset($menuContent->styleLayouts->color_menu) ? 'text-['.$menuContent->styleLayouts->color_menu.']' : '' }}
     {{ isset($menuContent->styleLayouts->color_hover_menu) ? 'hover:text-['.$menuContent->styleLayouts->color_hover_menu.']' : '' }}
     {{ isset($menuContent->styleLayouts->bold) ? 'font-'.$menuContent->styleLayouts->bold : '' }}
     {{ isset($menuContent->styleLayouts->font) ? 'font-'.$menuContent->styleLayouts->font : '' }}
     {{ isset($menuContent->styleLayouts->size) ? 'text-'.$menuContent->styleLayouts->size : '' }}
    ">
        <div class="container mx-auto lg:flex lg:justify-between items-center block justify-center">
            <aside class="grid-flow-col items-center block lg:flex lg:justify-between gap-4 items-center">
                <img src="../../../storage/{{ $empresa->empresaImage->logo }}" alt="" class="w-20">
                <p class="block mt-4 lg:mt-0 text-gray-500">Copyright © 2024 - Todos direitos reservados</p>
            </aside>
            <nav class="block grid-flow-col gap-4 md:place-self-center md:justify-self-end items-center 
            flex lg:justify-between gap-4 mt-4 lg:mt-0">
                <a href="{{$empresa->facebook_page ?? ''}}">
                    <svg class="h-5 w-5 text-yellow-600" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path
                            d="M22 12a10 10 0 10-11.5 9.9v-7h-2v-3h2v-2c0-2 1.2-3 3-3h2v3h-1c-1 0-1 .5-1 1v1h3l-1 3h-2v7A10 10 0 0022 12z" />
                    </svg>
                </a>
                <a href="{{$empresa->instagram ?? '' }}">
                    <svg class="h-5 w-5 text-yellow-600" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <path
                            d="M7 2C4.24 2 2 4.24 2 7v10c0 2.76 2.24 5 5 5h10c2.76 0 5-2.24 5-5V7c0-2.76-2.24-5-5-5H7zm10 2a3 3 0 013 3v10a3 3 0 01-3 3H7a3 3 0 01-3-3V7a3 3 0 013-3h10zm-5 3a5 5 0 100 10 5 5 0 000-10zm0 2a3 3 0 110 6 3 3 0 010-6zm4.5-.5a1 1 0 100 2 1 1 0 000-2z" />
                    </svg>
                </a>
            </nav>
        </div>
    </footer>
</body>

</html>