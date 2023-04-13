@props(['large' => true, 'text' => 'sky', 'background' => 'blue' ])
<div class="inline-block w-40 h-40 overflow-hidden @if($large) xl:w-72 xl:h-72 @endif">
    <div
        class="antialiased text-left relative flex items-center pl-12 @if($large) xl:pl-20  xl:text-4xl  xl:w-80 xl:h-80 xl:-left-12 xl:-top-12 @endif pr-16 mr-2 text-2xl font-bold rounded-full w-48 h-48 -left-8  -top-8 text-{{ $text ?? 'sky'}} bg-{{ $background ?? 'blue' }}">
        <div class="mt-4 leading-tight">
            {{ $siteName }}
        </div>
    </div>
</div>