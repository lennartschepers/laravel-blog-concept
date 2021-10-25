    <x-dropdown>

      <x-slot name="trigger">

        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">{{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}
          <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;" />
        </button>
      </x-slot>



      {{-- default slot doesn't have to be named --}}
      {{-- two ways of setting active category, with named routes and checking in request uri if the slug matches with the current slug--}}
      <x-dropdown-item href="/?{{ http_build_query(request()->except('category', 'page')) }}" :active="request('category') === null">All </x-dropdown-item>
      @foreach($categories as $category)
      {{-- we need to save the rest of the query if it exists, for example if a search is already been made but the category is adjusted. thats why we have the request() array for everything except the current category is converted into a querystring and added to the href of every category option --}}
      <x-dropdown-item href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}" :active='request("category")===$category->slug'>{{ ucwords($category->name) }}</x-dropdown-item>
      @endforeach
    </x-dropdown>
