<article @php(post_class('flex items-center flex-row justify-between bg-black body-font text-white mb-4 md:mb-8 p-4
  lg:p-8 2xl:p-12'))>
  <div class="max-w-xl ">
    <header>
      <a href="{{ get_permalink() }}">
        <x-heading level="2" class="mt-0 mb-4">
          {!! get_the_title() !!}
        </x-heading>
      </a>

      @includeWhen(get_post_type() === 'post', 'partials/entry-meta')
    </header>

    <div class="mb-2 font-bold text-violet-200">{{ get_the_date() }}</div>

    <div class="hidden text-sm leading-relaxed md:block">
      {!! get_the_excerpt() !!}
    </div>
  </div>
  <a href="{{ get_permalink() }}">
    <x-icon.arrow-right class="flex-shrink-0 w-16 h-16 -mr-4 md:w-32 md:h-32 text-violet-300" />
  </a>
</article>