<!--- Hero-->
@if (isset($user) and ($user->id == $empresa->user_id))
<section id="link{{$section->id}}" class="relative  text-white overflow-hidden  pb-10 
        hover:border-blue-500 hover:border" x-sort:item="{{$section->id}}">
    @else
    <section id="link{{$section->id}}" class="relative  text-white overflow-hidden  pb-10">
        @endif
        <div class="absolute inset-0 bg-black opacity-50"></div>
        <div class="absolute inset-0 bg-cover bg-center " @if (isset($section->img))
            style="background-image: url(storage/{{$section->img}}); filter: brightness(0.4);">
            @else
            style="background-image: url('https://www.leadsnextech.com/_next/static/media/bg.153fe1e6.jpg'); filter:
            brightness(0.4);">
            @endif
        </div>
        <div class="container mx-auto lg:px-12 px-5 py-24 md:py-32 relative z-10 lg:h-[90vh]">
            <div class="flex flex-col md:flex-row items-center justify-around">
                <div class="w-full md:w-1/2 mb-12 md:mb-0 relative">
                    <h1 class="text-5xl  mb-6 leading-tight
                            {{ isset($section->Size_title) ? 'md:text-'.$section->Size_title : 'md:text-7xl' }}
                            {{ isset($section->peso) ? 'font-'.$section->peso : 'bold' }}
                            {{isset($section->color_title) ? 'text-['.$section->color_title.']' : 'text-white' }}
                        ">
                        {{ $section->title ?? 'Conexão com o futuro melhor!' }}
                    </h1>
                    <p class="text-xl mb-5  
                        {{ isset($section->size_text) ? 'md:text-'.$section->size_text : 'text-xl' }}
                        {{isset($section->color_text) ? 'text-['.$section->color_text.']' : 'text-gray-300' }}
                        ">
                        {{$section->content ?? 'Harnessing Research for developing Sustainable, Scalable, & Impactful
                        Solutions' }}
                    </p>
                    <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4 ">
                        <a href="#contacts" class="group relative w-full sm:w-auto px-6 py-3 min-w-[160px]
                            {{isset($section->bg_btn) ? 'bg-['.$section->bg_btn.']' : 'bg-gradient-to-r from-violet-600 to-cyan-600' }}
                            {{isset($section->color_btn) ?  'text-['.$section->color_btn.']' : 'text-white' }}
                            absolute inset-0  rounded-lg">
                            <div class="">
                            </div>

                            <div class="relative flex items-center justify-center gap-2">
                                <span class="font-medium">Saiba mais</span>
                                <svg class="w-5 h-5 
                                    {{isset($section->color_btn) ?  'text-['.$section->color_btn.']' : 'text-white' }}
                                    transform group-hover:translate-x-1 transition-transform" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
                                        d="M13 7l5 5m0 0l-5 5m5-5H6" />
                                </svg>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="w-full md:w-2/5 md:pl-12 ">
                    <div></div>
                </div>
            </div>
        </div>
        <div class="absolute bottom-0 left-0 right-0">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M0 120L60 105C120 90 240 60 360 45C480 30 600 30 720 37.5C840 45 960 60 1080 67.5C1200 75 1320 75 1380 75L1440 75V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z"
                    fill="white" />
            </svg>
        </div>
    </section>
    <!--- END Hero-->