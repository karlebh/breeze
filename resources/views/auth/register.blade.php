<x-guest-layout>
     <div class="m-auto hidden lg:block">
        <p class="p-4">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet, assumenda, veniam nesciunt sunt quo sed magnam reprehenderit tenetur soluta laudantium possimus, harum, ut expedita debitis illo iste voluptates ipsam sint veritatis quasi excepturi! Laborum est delectus quibusdam facilis eius, vero incidunt. Pariatur eos minima incidunt adipisci consequatur? Magnam, illum! Asperiores non natus enim, mollitia. Aliquam quod officia nostrum iure vitae ex id dicta temporibus, autem. Eaque repellat adipisci architecto magnam maiores veniam repudiandae voluptas rem perspiciatis sed voluptatibus nam provident esse dignissimos inventore laudantium, tempore, facilis earum maxime voluptates autem pariatur quam est doloribus! Odio cupiditate, nulla quae voluptatem deleniti!
        </p>
    </div>

    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" 
                    class="block mt-1 w-full" 
                    type="text" 
                    name="name" 
                    :value="old('name')" required autofocus />

                <x-single-error value="name" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <label for="name" class="block font-medium text-sm text-gray-700">
                    {{__('Email')}}
                    <strong class="text-red-500">*</strong>
                </label>

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
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
                                required autocomplete="new-password" />

                @error('email')
                    <span class="text-red-400 text-sm font-semibold"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="name" class="block font-medium text-sm text-gray-700">
                    {{__('Confirm Password')}}
                    <strong class="text-red-500">*</strong>
                </label>


                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />

                @error('password')
                    <span class="text-red-400 text-sm font-semibold"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
