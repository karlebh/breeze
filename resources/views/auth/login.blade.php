<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <label for="name" class="block font-medium text-sm text-gray-700">
                    {{__('Name')}}
                    <strong class="text-red-500">*</strong>
                </label>

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />

                @error('name')
                    <span class="text-red-400 text-sm font-semibold"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="name" class="block font-medium text-sm text-gray-700">
                    {{__('Password')}}
                    <strong class="text-red-500">*</strong>
                </label>

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />

                @error('password')
                    <span class="text-red-400 text-sm font-semibold"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-3">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>

        <hr class="my-2">
        <br>
        <div class="flex">
            <a href="{{ url('auth/github') }}" class="ml-3 p-0">
                {{ __('Github Sign Up') }}
            </a>

            <a href="{{ url('auth/facebook') }}" class="ml-3">
                {{ __('Facebook Sign Up') }}
            </a>
           
            <a href="{{ url('auth/twitter') }}" class="ml-3">
                {{ __('Twitter Sign Up') }}
            </a>
           
            <a href="{{ url('auth/google') }}" class="ml-3">
                {{ __('Google Sign Up') }}
            </a>
           
            <a href="{{ url('auth/linkedin') }}" class="ml-3">
                {{ __('LinkedIn Sign Up') }}
            </a>
           
        </div>
    </x-auth-card>

    <div class="m-auto hidden lg:block">
        <p class="p-4">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet, assumenda, veniam nesciunt sunt quo sed magnam reprehenderit tenetur soluta laudantium possimus, harum, ut expedita debitis illo iste voluptates ipsam sint veritatis quasi excepturi! Laborum est delectus quibusdam facilis eius, vero incidunt. Pariatur eos minima incidunt adipisci consequatur? Magnam, illum! Asperiores non natus enim, mollitia. Aliquam quod officia nostrum iure vitae ex id dicta temporibus, autem. Eaque repellat adipisci architecto magnam maiores veniam repudiandae voluptas rem perspiciatis sed voluptatibus nam provident esse dignissimos inventore laudantium, tempore, facilis earum maxime voluptates autem pariatur quam est doloribus! Odio cupiditate, nulla quae voluptatem deleniti!
        </p>
    </div>
</x-guest-layout>


