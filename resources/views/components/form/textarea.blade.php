@props(['name', 'placeholder' => null])
<x-form.field>
  <x-form.label name=" {{ $name }}" />
  <textarea class="border border-gray-200 p-2 w-full rounded" type="text" placeholder="{{ $placeholder }}" name="{{ $name }}" id="{{ $name }}" {{ $attributes }} required>{{ $slot ?? old($name) }}</textarea>
  <x-form.error name="{{ $name }}" />
</x-form.field>
