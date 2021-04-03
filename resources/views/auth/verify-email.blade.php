<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button>
                        {{ __('Resend Verification Email') }}
                    </x-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Log out') }}
                </button>
            </form>
        </div>
    </x-auth-card>

      <div class="m-auto hidden lg:block">
        <p class="p-4">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eveniet, assumenda, veniam nesciunt sunt quo sed magnam reprehenderit tenetur soluta laudantium possimus, harum, ut expedita debitis illo iste voluptates ipsam sint veritatis quasi excepturi! Laborum est delectus quibusdam facilis eius, vero incidunt. Pariatur eos minima incidunt adipisci consequatur? Magnam, illum! Asperiores non natus enim, mollitia. Aliquam quod officia nostrum iure vitae ex id dicta temporibus, autem. Eaque repellat adipisci architecto magnam maiores veniam repudiandae voluptas rem perspiciatis sed voluptatibus nam provident esse dignissimos inventore laudantium, tempore, facilis earum maxime voluptates autem pariatur quam est doloribus! Odio cupiditate, nulla quae voluptatem deleniti!
        </p>
    </div>

</x-guest-layout>
