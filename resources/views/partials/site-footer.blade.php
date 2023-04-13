<footer>
  <div class="antialiased text-gray-100 bg-blue">
    <div class="container pt-24 pb-16 ">
      <div
        class="flex flex-wrap order-first space-y-8 text-center space-x-4 2xl:space-x-8 lg::space-y-0 md:text-left">
        <div class="flex-shrink flex flex-row justify-center md:justify-start w-full gap-4 mt-3 text-center md:text-left lg:w-1/4 mr-auto md:w-1/2">
          <x-logo :large="false" text="blue" background="white" />
          <x-forum-central-logo />
        </div>
        <div class="flex-shrink w-full mr-auto lg:pt-4  lg:w-1/3 !lg:mr-auto">
          @if(get_theme_mod('contact_address'))
          <p class="mb-4 text-base site-footer--address contact-address">{!!
            nl2br(strip_tags(get_theme_mod('contact_address')))
            !!}</p>
          @endif

          <p class="mb-4 text-base">
            @if(get_theme_mod('contact_email'))
            <a class="block mb-4 site-footer--email contact-email" href="mailto:{{ get_theme_mod('contact_email') }}">{{
              get_theme_mod('contact_email') }}</a>
            @endif
            @if(get_theme_mod('contact_phone') || get_theme_mod('contact_phone_human'))
            <a class="block site-footer--phone contact-phone"
              href="tel:{{ get_theme_mod('contact_phone') ?? get_theme_mod('contact_phone_human') }}">{{
              get_theme_mod('contact_phone_human') ?? get_theme_mod('contact_phone') }}</a>
            @endif
          </p>

          @if(get_theme_mod('company_info'))
          <p class="mt-3 text-sm text-gray-300 company-info">{{ get_theme_mod('company_info') }}</p>
          @endif

        </div>


        @if(!empty($secondaryNavigationFooter))
        <div class="flex-shrink w-full text-xl lg:w-1/6 md:w-1/4 lg:ml-auto xl:ml-auto 2xl:ml-auto">
          {!! $secondaryNavigationFooter !!}
        </div>
        @endif

        @if(!empty($tertiaryNavigation))
        <div class="flex-shrink w-full lg:w-1/6 text-xl  md:w-1/4">
          {!! $tertiaryNavigation !!}
        </div>
        @endif

      </div>
    </div>
  </div>
</footer>