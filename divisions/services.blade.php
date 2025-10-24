<!--- SERVICES-->
@if (isset($user) and ($user->id == $empresa->user_id))
<section class="my-10 container mx-auto cursor-pointer hover:border-blue-500 hover:border 
    lg:px-0 px-4
    {{isset($section->background) ? 'bg-['.$section->background.']' : 'bg-white' }}" 
    id="link{{$section->id}}" x-sort:item="{{$section->id}}">
    @else
    <section
        class="my-10 container mx-auto lg:px-0 px-4 {{isset($section->background) ?
         'bg-['.$section->background.']' : 'bg-white' }}" id="link{{$section->id}}">
    @endif
        <h1 class="text-4xl  
        {{ isset($section->Size_title) ? 'text-'.$section->Size_title : 'sm:text-5xl' }}
        {{ isset($section->peso) ? 'font-'.$section->peso : 'bold' }} 
        {{isset($section->color_title) ? 'text-['.$section->color_title.']' : 'text-gray-900' }}
    ">
            <span class="block xl:inline">{{ $section->title ?? 'Servicos' }}</span>
        </h1>
        <div class="py-10  lg:py-14">
            <!-- Grid -->
            <div class="grid sm:grid-cols-3 lg:grid-cols-3 gap-6">
                @forelse ($empresa->servicos as $servico)
                <article
                    class="grid col-span-1 group flex flex-col h-full bg-white shadow-2xs rounded-xl border border-gray-200">
                    <div class="h-52 flex flex-col justify-center items-center bg-blue-600 rounded-t-xl">
                        <img class="h-full w-full rounded-t-lg" src="storage/{{$servico->img}}" alt="">
                    </div>
                    <div class="p-4 md:p-6">
                        <span class="block mb-1 text-xs font-semibold uppercase text-blue-600">
                            {{ $empresa->name }}
                        </span>
                        <h3 class="text-xl font-semibold text-gray-800">
                            {{ $servico->name }}
                        </h3>
                        <p class="mt-3 text-gray-500 dark:text-neutral-500">
                            {{ substr($servico->descri,0, 200)}}...
                        </p>
                    </div>
                    <div class="mt-auto flex border-t border-gray-200 divide-x divide-gray-200 dark:divide-neutral-700">
                        <a href="tel:" class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 
                        text-sm font-medium rounded-es-xl bg-white shadow-2xs 
                        hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50
                        disabled:pointer-events-none text-yellow-600" href="#">
                            Ligar agora
                        </a>
                        <button onclick="document.getElementById('modal_servico_{{ $servico->id }}').showModal()" class=" cursor-pointer w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm 
                        font-medium rounded-ee-xl bg-white  shadow-2xs hover:bg-gray-50
                        focus:outline-hidden focus:bg-gray-50 disabled:opacity-50
                        disabled:pointer-events-none text-yellow-600">
                            Saber mais
                        </button>
                    </div>
                </article>
                <dialog id="modal_servico_{{ $servico->id }}" class="modal">
                    <div class="modal-box w-11/12 max-w-7xl">
                        <h3 class="font-bold text-lg">{{ $servico->name }}</h3>
                        <p class="py-4">{{ $servico->descri }}</p>
                        <div class="modal-action">
                            <form method="dialog">
                                <button class="btn">Fechar</button>
                            </form>
                        </div>
                    </div>
                </dialog>
                @empty
                <!-- Card -->
                <div
                    class="grid col-span-1 group flex flex-col h-full bg-white shadow-2xs rounded-xl border border-gray-200">
                    <div class="h-52 flex flex-col justify-center items-center bg-blue-600 rounded-t-xl">
                        <img class="h-full w-full rounded-t-lg"
                            src="https://media.istockphoto.com/id/1435220822/photo/african-american-software-developer.webp?s=2048x2048&w=is&k=20&c=d1UoAVikBSCBACAx6VowheFeZQbmJymYjqQKQeK48jI="
                            alt="">
                    </div>
                    <div class="p-4 md:p-6">
                        <span class="block mb-1 text-xs font-semibold uppercase text-blue-600">
                            Atlassian API
                        </span>
                        <h3 class="text-xl font-semibold text-gray-800">
                            Atlassian
                        </h3>
                        <p class="mt-3 text-gray-500 dark:text-neutral-500">
                            A software that develops products for software developers and developments.
                        </p>
                    </div>
                    <div class="mt-auto flex border-t border-gray-200 divide-x divide-gray-200 dark:divide-neutral-700">
                        <a class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 
                                        text-sm font-medium rounded-es-xl bg-white shadow-2xs 
                                        hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50
                                        disabled:pointer-events-none text-yellow-600" href="#">
                            Ligar agora
                        </a>
                        <a class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm 
                                        font-medium rounded-ee-xl bg-white  shadow-2xs hover:bg-gray-50
                                        focus:outline-hidden focus:bg-gray-50 disabled:opacity-50
                                        disabled:pointer-events-none text-yellow-600" href="#">
                            Saber mais
                        </a>
                    </div>
                </div>
                <!-- End Card -->
                <!-- Card -->
                <div
                    class="grid col-span-1 group flex flex-col h-full bg-white shadow-2xs rounded-xl border border-gray-200">
                    <div class="h-52 flex flex-col justify-center items-center bg-blue-600 rounded-t-xl">
                        <img class="h-full w-full rounded-t-lg"
                            src="https://media.istockphoto.com/id/2007171998/photo/monitoring-mri-scan-results.jpg?s=612x612&w=0&k=20&c=MU8MxHYljEsh30gsaGQmAxAXIovSuCNiYC5lCD6wnyk="
                            alt="">
                    </div>
                    <div class="p-4 md:p-6">
                        <span class="block mb-1 text-xs font-semibold uppercase text-blue-600">
                            Atlassian API
                        </span>
                        <h3 class="text-xl font-semibold text-gray-800">
                            Atlassian
                        </h3>
                        <p class="mt-3 text-gray-500 dark:text-neutral-500">
                            A software that develops products for software developers and developments.
                        </p>
                    </div>
                    <div class="mt-auto flex border-t border-gray-200 divide-x divide-gray-200 dark:divide-neutral-700">
                        <a class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 
                                        text-sm font-medium rounded-es-xl bg-white shadow-2xs 
                                        hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50
                                        disabled:pointer-events-none text-yellow-600" href="#">
                            Ligar agora
                        </a>
                        <a class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm 
                                        font-medium rounded-ee-xl bg-white  shadow-2xs hover:bg-gray-50
                                        focus:outline-hidden focus:bg-gray-50 disabled:opacity-50
                                        disabled:pointer-events-none text-yellow-600" href="#">
                            Saber mais
                        </a>
                    </div>
                </div>
                <!-- End Card -->
                <!-- Card -->
                <div
                    class="grid col-span-1 group flex flex-col h-full bg-white shadow-2xs rounded-xl border border-gray-200">
                    <div class="h-52 flex flex-col justify-center items-center bg-blue-600 rounded-t-xl">
                        <img class="h-full w-full rounded-t-lg"
                            src="https://media.istockphoto.com/id/2231717976/photo/renewable-energy-engineer-in-office-upgrades-windmill-farm-infrastructure.jpg?s=612x612&w=0&k=20&c=U_vjpAk8MEMzMnhC7nxoH6i7auOnMQ6xG9A6LKlQ05k="
                            alt="">
                    </div>
                    <div class="p-4 md:p-6">
                        <span class="block mb-1 text-xs font-semibold uppercase text-blue-600">
                            Atlassian API
                        </span>
                        <h3 class="text-xl font-semibold text-gray-800">
                            Atlassian
                        </h3>
                        <p class="mt-3 text-gray-500 dark:text-neutral-500">
                            A software that develops products for software developers and developments.
                        </p>
                    </div>
                    <div class="mt-auto flex border-t border-gray-200 divide-x divide-gray-200 dark:divide-neutral-700">
                        <a class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 
                                        text-sm font-medium rounded-es-xl bg-white shadow-2xs 
                                        hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50
                                        disabled:pointer-events-none text-yellow-600" href="#">
                            Ligar agora
                        </a>
                        <a class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm 
                                        font-medium rounded-ee-xl bg-white  shadow-2xs hover:bg-gray-50
                                        focus:outline-hidden focus:bg-gray-50 disabled:opacity-50
                                        disabled:pointer-events-none text-yellow-600" href="#">
                            Saber mais
                        </a>
                    </div>
                </div>
                <!-- End Card -->
                @endforelse
            </div>
            <!-- End Grid -->
        </div>
        <!-- End Card Blog -->
    </section>
    <!-- END SERVICES-->