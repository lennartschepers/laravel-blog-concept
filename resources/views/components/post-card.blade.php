@props(['post'])
<!-- following line makes it possible to assign html attributes in the parent like: <x-post-card class="col-span-2", this code will merge that class value with the others that are defined here -->
<article {{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
  <div class="py-6 px-5">
    <div>
      <!-- todo add image support in forms -->
      <img src="{{ asset('storage/' . $post->thumbnail)}}" alt="Blog Post illustration" class="rounded-xl w-full h-96 object-cover">
    </div>

    <div class="mt-8 flex flex-col justify-between">
      <header>
        <div class="space-x-2">
          <x-category-button :category="$post->category" />
        </div>

        <div class="mt-4">
          <h1 class="text-3xl">{{ $post->title }} </h1>

          <span class="mt-2 block text-gray-400 text-xs">
            Published <time>{{ $post->created_at->diffForHumans() }}</time>
          </span>
        </div>
      </header>

      <div class="text-sm mt-4 space-y-4">
        {!! $post->excerpt !!}

      </div>

      <footer class="flex justify-between items-center mt-8">
        <div class="flex items-center text-sm">
          <img height="80px" width="80px" src="/images/lary-avatar.svg" alt="Lary avatar">
          <div class="ml-3">
            <a href="/?author={{ $post->author->username }}" .<h5 class="font-bold">{{ $post->author->name }}</h5></a>
          </div>
        </div>

        <div class="flex-shrink-0">
          <a href="/posts/{{ $post->slug }}" class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8">Read More</a>
        </div>
      </footer>
    </div>
  </div>
</article>
