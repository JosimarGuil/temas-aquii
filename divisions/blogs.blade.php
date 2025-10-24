<!-- Card Blog -->
    @if (isset($user) and ($user->id == $empresa->user_id))
        <section class=" {{isset($section->background) ? 'bg-['.$section->background.']' : 'bg-white' }} 
        cursor-pointer hover:border-blue-500 hover:border" x-sort:item="{{$section->id}}" id="link{{$section->id}}">
    @else
        <section class=" {{isset($section->background) ? 'bg-['.$section->background.']' : 'bg-white' }} " id="link{{$section->id}}">
    @endif
        <div class="mx-auto container px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
            <!-- Title -->
            <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
                <h2 class="text-2xl 
                    {{ isset($section->Size_title) ? 'md:text-'.$section->Size_title : 'md:text-4xl md:leading-tight' }}
                    {{ isset($section->peso) ? 'font-'.$section->peso : 'bold' }} 
                    {{isset($section->color_title) ? 'text-['.$section->color_title.']' : 'text-gray-900' }}

                    ">{{ $section->title ?? 'Blogs' }}</h2>
                <p class="mt-6
                        {{isset($section->color_text) ? 'text-['.$section->color_text.']' : 'text-gray-600' }}
                        {{ isset($section->size_text) ? 'md:text-'.$section->size_text : 'text-lg' }}
                    ">
                    {{$section->content ?? 'Harnessing Research for developing Sustainable, Scalable, & Impactful
                    Solutions'
                    }}
                </p>
            </div>
            <!-- End Title -->

            <!-- Grid -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Card -->
                @forelse ($empresa->publicacaos as $publicidade)
                <article>
                    <a href="{{route('single-publicidades', $publicidade->id)}}" class="group flex flex-col h-full border border-gray-200 hover:border-transparent 
                                hover:shadow-lg focus:outline-hidden focus:border-transparent 
                                focus:shadow-lg transition duration-300 rounded-xl p-5 " href="#">
                        <div class="aspect-w-16 aspect-h-11">
                            @if(isset($publicidade->img))
                            <img class="w-full object-cover rounded-xl" src="../../storage/{{$publicidade->img}}"
                                alt="Blog Image">
                            @elseif(!isset($publicidade->img) and isset($publicidade->linkImage))
                            <img src="{{$publicidade->linkImage}}" alt="Album" class="w-full object-cover rounded-xl" />
                            @elseif(!isset($publicidade->img) and !isset($publicidade->linkImage) and
                            isset($publicidade->video))
                            <video class="w-full object-cover h-96 " src="../../storage/{{$publicidade->video}}"
                                controls>
                            </video>
                            @elseif(!isset($publicidade->img) and !isset($publicidade->linkImage) and
                            isset($publicidade->linkVideo))
                            <iframe frameborder="0" allowfullscreen="1"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                class="w-full object-cover h-96" src="{{$publicidade->linkVideo}}" id="widget2">
                            </iframe>
                            @endif
                        </div>
                        <div class="my-6">
                            <h3 class="text-xl font-semibold text-gray-800">
                                {{ $publicidade->title }}
                            </h3>
                            <p class="mt-5 text-gray-600 ">
                                {{ substr($publicidade->content,0,100)}}...
                            </p>
                        </div>
                    </a>
                </article>
                @empty
                <a class="group flex flex-col h-full border border-gray-200 hover:border-transparent 
                            hover:shadow-lg focus:outline-hidden focus:border-transparent 
                            focus:shadow-lg transition duration-300 rounded-xl p-5 " href="#">
                    <div class="aspect-w-16 aspect-h-11">
                        <img class="w-full object-cover rounded-xl"
                            src="https://images.unsplash.com/photo-1633114128174-2f8aa49759b0?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=560&q=80"
                            alt="Blog Image">
                    </div>
                    <div class="my-6">
                        <h3 class="text-xl font-semibold text-gray-800">
                            Announcing a free plan for small teams
                        </h3>
                        <p class="mt-5 text-gray-600 ">
                            At Wake, our mission has always been focused on bringing openness.
                        </p>
                    </div>
                </a>
                <!-- End Card -->
                <a class="group flex flex-col h-full border border-gray-200 hover:border-transparent 
                            hover:shadow-lg focus:outline-hidden focus:border-transparent 
                            focus:shadow-lg transition duration-300 rounded-xl p-5 " href="#">
                    <div class="aspect-w-16 aspect-h-11">
                        <img class="w-full object-cover rounded-xl"
                            src="https://images.unsplash.com/photo-1633114128174-2f8aa49759b0?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=560&q=80"
                            alt="Blog Image">
                    </div>
                    <div class="my-6">
                        <h3 class="text-xl font-semibold text-gray-800">
                            Announcing a free plan for small teams
                        </h3>
                        <p class="mt-5 text-gray-600 ">
                            At Wake, our mission has always been focused on bringing openness.
                        </p>
                    </div>
                </a>

                <a class="group flex flex-col h-full border border-gray-200 hover:border-transparent 
                            hover:shadow-lg focus:outline-hidden focus:border-transparent 
                            focus:shadow-lg transition duration-300 rounded-xl p-5 " href="#">
                    <div class="aspect-w-16 aspect-h-11">
                        <img class="w-full object-cover rounded-xl"
                            src="https://images.unsplash.com/photo-1633114128174-2f8aa49759b0?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=560&q=80"
                            alt="Blog Image">
                    </div>
                    <div class="my-6">
                        <h3 class="text-xl font-semibold text-gray-800">
                            Announcing a free plan for small teams
                        </h3>
                        <p class="mt-5 text-gray-600 ">
                            At Wake, our mission has always been focused on bringing openness.
                        </p>
                    </div>
                </a>
                @endforelse
            </div>
            <!-- End Grid -->
        </div>
    </section>
    <!-- End Card Blog -->