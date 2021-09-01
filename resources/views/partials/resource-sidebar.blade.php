<aside class="pt-24 pb-12 border-r">
    <nav class="">
        <h2 class="px-8 mb-6 text-xl font-bold text-blue">
            <a class="block mx-auto mr-16 w-60" href="/resources">
                Resources
            </a>
        </h2>

        <h3 class="block px-8 py-3 mt-8 font-semibold tracking-tight text-gray-500">Types</h3>
        @foreach($types as $key => $type)
        <a href="{{ get_term_link($type->term_id, 'resourcetype') }}" class="hover:bg-sky-lightest px-8 block py-3 text-lg @if($_SERVER['REQUEST_URI'] == get_term_link($type->term_id, 'resourcetype'))bg-sky text-blue @else text-gray-600
        @endif">
            <span class="block mx-auto mr-16 w-60">{{ $type->name }}</span>
        </a>
        @endforeach


        <h3 class="block px-8 py-3 mt-8 font-semibold tracking-tight text-gray-500">Key Learnings</h3>

        @foreach($keylearnings as $key => $keylearning)

        <a href="{{ get_term_link($keylearning->term_id, 'resourcekeylearning') }}" class="hover:bg-sky-lightest px-8 block py-3 text-lg @if($_SERVER['REQUEST_URI'] == get_term_link($keylearning->term_id, 'resourcekeylearning')) bg-sky text-blue @else text-gray-600
                @endif">
            <span class="block mx-auto mr-16 w-60">{{ $keylearning->name }}</span>
        </a>
        @endforeach

    </nav>
</aside>