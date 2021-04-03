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

        <div class="mb-4 text-sm text-gray-600">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" />
            </div>

            <div class="flex justify-end mt-4">
                <x-button>
                    {{ __('Confirm') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
