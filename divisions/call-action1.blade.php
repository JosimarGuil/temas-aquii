   <!--Call action--->
   @if (isset($user) and ($user->id == $empresa->user_id))
        <section class="py-12 cursor-pointer hover:border-blue-500 hover:border" x-sort:item="{{$section->id}}">
    @else
        <section class="py-12 cursor-pointer">
    @endif
            <div class="">
                <div class="mx-auto container">
                    <div
                        class="relative isolate overflow-hidden  {{isset($section->background) ? 'bg-['.$section->background.']' : 'bg-gray-900' }} px-6 pt-16 after:pointer-events-none
                         after:absolute after:inset-0 after:inset-ring after:inset-ring-white/10 
                         sm:rounded-3xl sm:px-16 after:sm:rounded-3xl md:pt-24 lg:flex lg:gap-x-20 lg:px-24 lg:pt-0">
                        <svg viewBox="0 0 1024 1024" aria-hidden="true"
                            class="absolute top-1/2 left-1/2 -z-10 size-256 -translate-y-1/2 mask-[radial-gradient(closest-side,white,transparent)] sm:left-full sm:-ml-80 lg:left-1/2 lg:ml-0 lg:-translate-x-1/2 lg:translate-y-0">
                            <circle r="512" cx="512" cy="512" fill="url(#759c1415-0410-454c-8f7c-9a820de03641)"
                                fill-opacity="0.7" />
                            <defs>
                                <radialGradient id="759c1415-0410-454c-8f7c-9a820de03641">
                                    <stop stop-color="#7775D6" />
                                    <stop offset="1" stop-color="#E935C1" />
                                </radialGradient>
                            </defs>
                        </svg>
                        <div class="mx-auto max-w-md text-center lg:mx-0 lg:flex-auto lg:py-32 lg:text-left">
                            <h2 class="text-3xl tracking-tight text-balance  
                                {{ isset($section->Size_title) ? 'md:text-'.$section->Size_title : 'sm:text-4xl sm:text-4xl' }}
                                {{ isset($section->peso) ? 'font-'.$section->peso : 'semibold' }} 
                                {{isset($section->color_title) ? 'text-['.$section->color_title.']' : 'text-gray-900' }}">
                                 {{ $section->title ?? 'Quem somos' }}
                                </h2>
                            <p class="mt-6  
                            {{isset($section->color_text) ? 'text-['.$section->color_text.']' : 'text-gray-300' }}
                            {{ isset($section->size_text) ? 'md:text-'.$section->size_text : 'text-lg/8 text-pretty' }}
                            ">
                                {{$section->content ?? 'Harnessing Research for developing Sustainable, Scalable, & Impactful Solutions' }}
                            </p>
                        </div>
                        <div class="relative mt-16 h-80 lg:mt-8">
                            <img width="1824" height="1080"
                                @if (isset($section->img))
                                    src = "storage/{{$section->img}}"
                                @else
                                    src="https://tailwindcss.com/plus-assets/img/component-images/dark-project-app-screenshot.png"
                                @endif
                                alt="App screenshot"
                                class="absolute top-0 left-0 w-228 max-w-none rounded-md bg-white/5 ring-1 ring-white/10" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--END CALL ACTION-->