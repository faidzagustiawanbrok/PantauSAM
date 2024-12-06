<head>
    <!-- Add Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>


<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <!-- Phone Number -->
        <div>
            <x-input-label for="telpon" :value="__('Nomor Telepon')" />
            <x-text-input id="telpon" name="telpon" type="text" class="mt-1 block w-full" :value="old('telpon', $user->telpon)" required autocomplete="telpon" />
            <x-input-error class="mt-2" :messages="$errors->get('telpon')" />
        </div>

        <!-- Address -->
        <div>
            <x-input-label for="alamat" :value="__('Alamat')" />
            <x-text-input id="alamat" name="alamat" type="text" class="mt-1 block w-full" :value="old('alamat', $user->alamat)" required autocomplete="alamat" />
            <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
        </div>

        <!-- Gender -->
        <div>
            <x-input-label for="kelamin" :value="__('Kelamin')" />
            <select name="kelamin" id="kelamin" class="mt-1 block w-full">
                <option value="tidak ingin menyertakan" {{ $user->kelamin === 'tidak ingin menyertakan' ? 'selected' : '' }}>tidak ingin menyertakan</option>
                <option value="laki-laki" {{ $user->kelamin === 'laki-laki' ? 'selected' : '' }}>laki-laki</option>
                <option value="perempuan" {{ $user->kelamin === 'perempuan' ? 'selected' : '' }}>perempuan</option>
            </select>
            <x-input-error class="mt-2" :messages="$errors->get('kelamin')" />
        </div>



        <div class="flex justify-center">
            <div class="relative">
                <!-- Periksa apakah pengguna memiliki foto profil, jika tidak tampilkan default avatar -->
                @if (!empty($user->foto) )
                <img src="{{ asset($user->foto) }}" width="500px" id="profile-img" alt="foto_profil">
                @else
                <img src="{{ asset('images/default-avatar.jpg') }}" width="500px" id="profile-img" alt="Default Avatar" />

                @endif


                <!-- Input file untuk memilih foto -->
                <input type="file" name="foto" id="file-input"
                       class="absolute top-0 left-0 w-full h-full opacity-0 cursor-pointer"
                       onchange="handleFileChange(event)">

                <!-- Tombol kamera untuk visualisasi perubahan -->
                    <div class="absolute bottom-2 right-2 bg-blue-500 text-white rounded-full p-2 cursor-pointer hover:bg-blue-600 transition">
                        <i class="fas fa-camera"></i>
                    </div>
            </div>

            <!-- Preview nama file yang dipilih (opsional) -->
            <div id="file-name" class="text-sm text-gray-500 mt-2 text-center"></div>
        </div>





        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>

<script>
    function handleFileChange(event) {
        const fileInput = event.target;
        const fileNameDisplay = document.getElementById('file-name');

        // Perbarui nama file di UI (opsional)
        if (fileInput.files && fileInput.files[0]) {
            fileNameDisplay.textContent = `File: ${fileInput.files[0].name}`;

            // Menampilkan preview gambar secara instan (opsional)
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profile-img').src = e.target.result;
            };
            reader.readAsDataURL(fileInput.files[0]);
        }
    }
</script>
