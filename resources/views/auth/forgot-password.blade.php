<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <label for="name" class="block font-medium text-sm text-gray-700">
                    {{__('Email')}}
                    <strong class="text-red-500">*</strong>
                </label>

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />

                @error('email')
                    <span class="text-red-400 text-sm font-semibold"><strong>{{ $message }}</strong></span>
                @enderror
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-button>
                    {{ __('Email Password Reset Link') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>

      <div class="m-auto hidden lg:block">
        <p class="p-4">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet, assumenda, veniam nesciunt sunt quo sed magnam reprehenderit tenetur soluta laudantium possimus, harum, ut expedita debitis illo iste voluptates ipsam sint veritatis quasi excepturi! Laborum est delectus quibusdam facilis eius, vero incidunt. Pariatur eos minima incidunt adipisci consequatur? Magnam, illum! Asperiores non natus enim, mollitia. Aliquam quod officia nostrum iure vitae ex id dicta temporibus, autem. Eaque repellat adipisci architecto magnam maiores veniam repudiandae voluptas rem perspiciatis sed voluptatibus nam provident esse dignissimos inventore laudantium, tempore, facilis earum maxime voluptates autem pariatur quam est doloribus! Odio cupiditate, nulla quae voluptatem deleniti!
        </p>
    </div>

</x-guest-layout>
