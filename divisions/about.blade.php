<!--- ABOUT-->
@if (isset($user) and ($user->id == $empresa->user_id))
<section class="md:px-0 {{isset($section->background) ? 
 'bg-['.$section->background.']' : 'bg-white' }} cursor-pointer hover:border-blue-500 hover:border" 
 id="link{{$section->id}}"
    x-sort:item="{{$section->id}}">
    @else
    <section class="md:px-0 {{isset($section->background) ? 
'bg-['.$section->background.']' : 'bg-white' }}" id="link{{$section->id}}">
        @endif

        <div x-data="{ count: {{ $empresa->visits ?? 0 }}, displayed: 0 }" x-init="
        let start = 0;
        const duration = 1000;
        const step = (timestamp) => {
            if (!start) start = timestamp;
            const progress = Math.min((timestamp - start) / duration, 1);
            displayed = Math.floor(count * progress);
            if (progress < 1) requestAnimationFrame(step);
        };
        requestAnimationFrame(step); cursor-pointer
    " class="max-w-sm mx-auto mt-10 mb-20">
            <div
                class="flex items-center justify-between bg-white rounded-2xl shadow-lg border border-gray-100 p-5 hover:scale-105 hover:shadow-xl transition-all duration-300">
                <!-- Ícone -->
                <div class="bg-blue-100 text-blue-600 rounded-xl p-3">
                    <svg class="w-6 h-6 text-blue-600" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-width="2"
                            d="M21 12c0 1.2-4.03 6-9 6s-9-4.8-9-6c0-1.2 4.03-6 9-6s9 4.8 9 6Z" />
                        <path stroke="currentColor" stroke-width="2" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                    </svg>
                </div>

                <!-- Texto -->
                <div class="flex-1 text-right">
                    <h3 class="text-sm font-medium text-gray-500">Visitas totais</h3>
                    <p class="text-3xl font-bold text-gray-900" x-text="displayed"></p>
                </div>
            </div>
        </div>
        <div class="container items-center px-8 mx-auto xl:px-5 mb-20">
            <div class="flex flex-wrap items-center sm:-mx-3">
                <div class="w-full md:w-1/2 md:px-3">
                    <div
                        class="w-full pb-6 space-y-6 sm:max-w-md lg:max-w-lg md:space-y-4 lg:space-y-8 xl:space-y-9 sm:pr-5 lg:pr-0 md:pb-0">
                        <h1
                            class="text-4xl 
                                {{ isset($section->Size_title) ? 'text-'.$section->Size_title : 'md:text-7xl' }}
                                {{ isset($section->peso) ? 'font-'.$section->peso : 'bold' }} 
                                {{isset($section->color_title) ? 'text-['.$section->color_title.']' : 'text-gray-900' }}">
                            <span class="block xl:inline"> {{ $section->title ?? 'Quem somos' }}</span>
                        </h1>
                        <p class="mx-auto text-base 
                            {{isset($section->color_text) ? 'text-['.$section->color_text.']' : 'text-gray-500' }}
                            {{ isset($section->size_text) ? 'md:text-'.$section->size_text : 'text-xl' }}
                            sm:max-w-md lg:text-xl md:max-w-3xl">
                            {{substr($section->content, 0, 500) ?? 'Harnessing Research for developing Sustainable,
                            Scalable, & Impactful
                            Solutions' }}
                        </p>
                        <div class="relative flex flex-col sm:flex-row sm:space-x-4">
                            <button onclick="my_modal_4.showModal()" class="group relative w-full sm:w-auto px-6 py-3 
                        min-w-[160px] absolute  rounded-lg cursor-pointer
                                {{isset($section->bg_btn) ? 'bg-['.$section->bg_btn.']' : 'bg-gradient-to-r from-violet-600 to-cyan-600' }}
                                {{isset($section->color_btn) ?  'text-['.$section->color_btn.']' : 'text-white' }}
                                ">
                                <div class="">
                                </div>
                                <div class="relative flex items-center justify-center gap-2">
                                    <span class="font-medium">Vermais</span>
                                    <svg class="w-5 h-5
                                        {{isset($section->color_btn) ?  'text-['.$section->color_btn.']' : 'text-white' }}
                                        transform group-hover:translate-x-1 transition-transform" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24">
                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
                                            d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                    </svg>
                                </div>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    <div class="w-full h-auto overflow-hidden rounded-md shadow-xl sm:rounded-xl"
                        data-rounded="rounded-xl" data-rounded-max="rounded-full">
                        <img class="w-full" @if (isset($section->img))
                        src = "storage/{{$section->img}}"
                        @else
                        src="https://cdn.pixabay.com/photo/2018/05/14/16/54/cyber-3400789_1280.jpg"
                        @endif
                        >
                    </div>
                </div>
            </div>
        </div>
        <dialog id="my_modal_4" class="modal">
            <div class="modal-box w-11/12 max-w-5xl">
                <h3 class="text-2xl font-bold"> {{ $section->title ?? 'Quem somos' }}</h3>
                <P class="mt-5">
                    {{$section->content ?? 'Harnessing Research for developing Sustainable, Scalable, & Impactful
                    Solutions'
                    }}
                </P>
                <div class="modal-action">
                    <form method="dialog">
                        <!-- if there is a button, it will close the modal -->
                        <button class="btn">Fechar</button>
                    </form>
                </div>
            </div>
        </dialog>
    </section>
    <!--END ABOUT-->