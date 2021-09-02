<article @php(post_class())>


    <div class="container pb-32 mx-auto xl:max-w-5xl">

        <div class="flex flex-col gap-8 md:gap-16 lg:flex-row-reverse">

            <div class="max-w-screen-sm md:pt-32 lg:w-1/4">
                <div class="sticky mx-auto mt-16 -z-10 top-16">
                    {!! do_shortcode('[toc]') !!}
                </div>
            </div>
            <div class="flex-1 md:mt-24 lg:px-0">
                <div class="prose xl:prose-lg">
                    @php(the_content())
                </div>
            </div>
        </div>
    </div>

</article>