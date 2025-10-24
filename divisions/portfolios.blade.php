<!-- PORTFOLIOS-->
@if (isset($user) and ($user->id == $empresa->user_id))
    <section id="link{{$section->id}}" class="my-10 container mx-auto {{isset($section->background) ?
    'bg-['.$section->background.']' : 'bg-white' }} cursor-pointer hover:border-blue-500 hover:border px-2"
    x-sort:item="{{$section->id}}">
@else
    <section id="link{{$section->id}}" class="my-10 container mx-auto {{isset($section->background) ?
    'bg-['.$section->background.']' : 'bg-white' }} cursor-pointer px-2" >
@endif
        <h1 class="text-4xl  tracking-tight  
        {{ isset($section->Size_title) ? 'md:text-'.$section->Size_title : 'sm:text-5xl' }}
        {{ isset($section->peso) ? 'font-'.$section->peso : 'bold' }} 
        {{isset($section->color_title) ? 'text-['.$section->color_title.']' : 'text-gray-900' }}
    ">
            <span class="block xl:inline">{{ $section->title ?? 'Portfólios' }}</span>
        </h1>
        <div class="flex  grid lg:grid-cols-3 grid-cols-1 gap-6 mt-12 px-2 lg:px-0">
            @forelse ($empresa->portfolios as $portfolio)
            <article class="grid col-span-1 card bg-base-100 image-full w-full shadow-sm">
                <figure>
                    <img src="storage/{{$portfolio->img}}" alt="Shoes" class="w-full" />
                </figure>
                <div class="card-body">
                    <h2 class="card-title"> {{ $portfolio->name }}</h2>
                    <p>{{ substr($portfolio->descri,0, 200) }}...</p>
                    <div class="card-actions justify-end">
                        <button onclick="document.getElementById('modal_servico_{{ $portfolio->id }}').showModal()"
                            class="text-blue-500 font-semibold cursor-pointer">Ver mais</button>
                    </div>
                </div>
            </article>
            <dialog id="modal_servico_{{$portfolio->id}}" class="modal">
                <div class="modal-box w-11/12 max-w-7xl">
                    <h3 class="font-bold text-lg">{{ $portfolio->name }}</h3>
                    <p class="py-4">{{ $portfolio->descri}}</p>
                    <div class="modal-action">
                        <form method="dialog">
                            <button class="btn">Fechar</button>
                        </form>
                    </div>
                </div>
            </dialog>
            @empty
            <div class="grid col-span-1 card bg-base-100 image-full w-full shadow-sm">
                <figure>
                    <img src="https://cdn.pixabay.com/photo/2024/05/21/19/57/computer-8779040_640.jpg" alt="Shoes" />
                </figure>
                <div class="card-body">
                    <h2 class="card-title">Card Title</h2>
                    <p>A card component has a figure, a body part, and inside body there are title and actions parts
                    </p>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">Buy Now</button>
                    </div>
                </div>
            </div>
            <div class="grid col-span-1 card bg-base-100 image-full w-full shadow-sm">
                <figure>
                    <img src="https://media.istockphoto.com/id/1089609628/photo/administrator-working-in-data-center-configure-and-check-internet-network-on-computer-laptop.webp?b=1&s=612x612&w=0&k=20&c=Zi_0V3ghd5riuWMie7xf_9JaAbRDENPhf_ZpUStNWJ4="
                        alt="Shoes" />
                </figure>
                <div class="card-body">
                    <h2 class="card-title">Card Title</h2>
                    <p>A card component has a figure, a body part, and inside body there are title and actions parts
                    </p>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">Buy Now</button>
                    </div>
                </div>
            </div>
            <div class="grid col-span-1 card bg-base-100 image-full w-fullshadow-sm">
                <figure>
                    <img src="https://media.istockphoto.com/id/1515913422/photo/a-data-analyst-using-technology-ai-for-working-tool-for-data-analysis-chatbot-chat-with-ai.jpg?s=2048x2048&w=is&k=20&c=8eruy8bG_f0KSDLSAMeF76eeZWJHk-Tg1PLCwMhx_Yw="
                        alt="Shoes" />
                </figure>
                <div class="card-body">
                    <h2 class="card-title">Card Title</h2>
                    <p>A card component has a figure, a body part, and inside body there are title and actions parts
                    </p>
                    <div class="card-actions justify-end">
                        <button class="btn btn-primary">Buy Now</button>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
    </section>
    <!-- END PORTFOLIOS-->