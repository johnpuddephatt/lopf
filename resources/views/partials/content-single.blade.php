<article @php(post_class())>
  <div class="container max-w-3xl mx-auto mb-32">

    <div class="prose xl:prose-lg">
      @php(the_content())
    </div>


  </div>

  @php(comments_template())
</article>