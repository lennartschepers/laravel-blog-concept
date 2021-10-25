@props(['posts'])

    <x-post-featured-card :post="$posts[0]" />

    @if ($posts->count() > 1 )
    <div class="lg:grid lg:grid-cols-6">
      <!-- next two posts in grid layout of 2, rest in grid rows of three-->

      <!-- skip(1) to skip the featured post, bit weird that its not skip(0)-->
      @foreach ($posts->skip(1) as $post)
      <x-post-card :post="$post" class="{{ $loop->iteration < 3 ? 'col-span-3' : 'col-span-2' }}" />

      @endforeach
    </div>
    @endif
