<x-form.field>
  <button {{$attributes->merge(['class' => "uppercase font-semibold bg-blue-500 text-white text-xs py-2 px-10 rounded-2xl hover:bg-blue-600"]) }} type="submit">{{ $slot }}</button>
</x-form.field>
