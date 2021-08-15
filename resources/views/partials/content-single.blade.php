<article @php(post_class())>
  <div class="container max-w-3xl mx-auto mb-32">
    <div class="flex flex-col px-4 md:gap-16 lg:flex-row">
      <div class="w-full mt-48 lg:w-3/4">
        <div class="prose xl:prose-lg">
          @php(the_content())
        </div>
      </div>
    </div>
  </div>

  @php(comments_template())
</article>