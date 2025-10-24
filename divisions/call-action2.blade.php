<!-- CALL ACTION--->
@if (isset($user) and ($user->id == $empresa->user_id))
    <section class="w-full mb-40 mt-20 lg:px-0 px-2 cursor-pointer hover:border-blue-500 
    hover:border" x-sort:item="{{$section->id}}">
@else
    <section class="w-full mb-40 mt-20 lg:px-0 px-2">
@endif
    <div class="relative container mx-auto -mb-16 md:-mb-20 z-10 px-4">
        <div
            class="  {{isset($section->background) ? 'bg-['.$section->background.']' : 'bg-indigo-800' }}  p-8 md:p-12  rounded-3xl shadow-xl text-center">
            <h2 class="text-2xl  mb-6
                     {{ isset($section->Size_title) ? 'md:text-'.$section->Size_title : 'md:text-3xl' }}
                    {{ isset($section->peso) ? 'font-'.$section->peso : 'semibold' }} 
                    {{isset($section->color_title) ? 'text-['.$section->color_title.']' : 'text-white' }}
                    ">
                {{ $section->title ?? 'Get to know the world-class board of directors governing our organization.' }}
            </h2>
            <a href="tel:{{$empresa->telefone1}}" class="
            group relative w-full sm:w-auto px-6 py-3 min-w-[160px] absolute  rounded-lg
            {{isset($section->bg_btn) ? 'bg-['.$section->bg_btn.']' : 'bg-gradient-to-r from-violet-600 to-cyan-600' }}
            {{isset($section->color_btn) ?  'text-['.$section->color_btn.']' : 'text-white' }}
            ">
                Emtre contacto agora mesmo
        </a>
        </div>
    </div>
</section>

<!-- END CALL ACTION--->