<x-layout>
  <section class="px-6 py-8">
    <main class="max-w-lg mx-auto mt-10">
      <x-panel>
        <h1 class="text-center font-bold text-xl">Log in</h1>
        <form method="POST" action="/sessions" class="mt-10">
          <!-- this expands to a hidden input with a value that will be checked to secure against Cross Site Request Forgery, if you dont add this you'll get a 419 error -->
          {{-- @error will execute code in case of error at specified field, where you can display the error message that laravel provides. The value is set to old(attribute) in case this happens, laravel will put in the old session data so you won't have to type it in again in case of error --}}
          @csrf


          <x-form.input name="email" type="email" />
          <x-form.input name="password" type="password" />

          <x-form.button>Log In</x-form.button>


        </form>
      </x-panel>
    </main>
  </section>
</x-layout>
