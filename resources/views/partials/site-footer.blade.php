<footer>
  <div class="antialiased text-gray-100 bg-blue">
    <div class="container pt-24 pb-16 ">
      <div class="flex flex-wrap order-first gap-8 text-center md:text-left">
        <div class="flex-shrink w-full mt-3 lg:w-1/4 md:w-1/2">
          <x-logo text="blue" background="white" />
        </div>
        <div class="flex-shrink w-full mr-auto lg:mt-0 xl:w-1/3 lg:w-1/4">
          @if(get_theme_mod('contact_address'))
          <p class="mb-4 text-sm site-footer--address contact-address">{!!
            nl2br(strip_tags(get_theme_mod('contact_address')))
            !!}</p>
          @endif

          <p class="mb-4 text-sm">
            @if(get_theme_mod('contact_email'))
            <a class="block mb-4 site-footer--email contact-email"
              href="mailto:{{ get_theme_mod('contact_email') }}">{{ get_theme_mod('contact_email') }}</a>
            @endif
            @if(get_theme_mod('contact_phone') || get_theme_mod('contact_phone_human'))
            <a class="block site-footer--phone contact-phone"
              href="tel:{{ get_theme_mod('contact_phone') ?? get_theme_mod('contact_phone_human') }}">{{ get_theme_mod('contact_phone_human') ?? get_theme_mod('contact_phone') }}</a>
            @endif
          </p>

          @if(get_theme_mod('company_info'))
          <p class="mt-3 text-xs text-gray-300 company-info">{{ get_theme_mod('company_info') }}</p>
          @endif

        </div>
        @if(!empty($primaryNavigationFooter))
        <div class="flex-shrink w-full text-xl md:-ml-6 lg:ml-0 xl:w-1/6 lg:w-1/5 md:w-1/2">
          {!! $primaryNavigationFooter !!}
        </div>
        @endif

        @if(!empty($secondaryNavigationFooter))
        <div class="flex-shrink w-full text-xl md:-ml-6 lg:ml-0 xl:w-1/6 lg:w-1/5 md:w-1/2">
          {!! $secondaryNavigationFooter !!}
        </div>
        @endif

        @if(!empty($tertiaryNavigation))
        <div class="w-full text-xl lg:w-1/5 md:-ml-6 lg:ml-0 xl:w-1/6 md:w-1/2">
          {!! $tertiaryNavigation !!}
        </div>
        @endif

      </div>
    </div>
  </div>
</footer>