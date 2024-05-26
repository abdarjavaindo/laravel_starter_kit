{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout> --}}

<x-layouts.dashboard>
    <h1 class="app-page-title">Akun</h1>
    <hr class="mb-4">
    <div class="row g-4 settings-section">
        <div class="col-12 col-md-4">
            <h3 class="section-title">Profile Information</h3>
            <div class="section-intro">Update your account's profile information and email address.</div>
            @if (session('status') === 'profile-updated')
                <div class="alert alert-success" role="alert">
                    Profil berhasil di update
                </div>
            @endif
        </div>
        <div class="col-12 col-md-8">
            <div class="app-card app-card-settings shadow-sm p-4">

                <div class="app-card-body">
                    <form class="settings-form" method="post" action="{{ route('profile.update') }}">
                        @csrf
                        @method('patch')
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="name" name="name"
                                value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
                            @error('name')
                                <span class="text-danger" style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email', $user->email) }}" required autocomplete="username">
                            @error('email')
                                <span class="text-danger" style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn app-btn-primary">Save Changes</button>
                    </form>
                </div><!--//app-card-body-->

            </div><!--//app-card-->
        </div>
    </div><!--//row-->
    <hr class="my-4">
    <div class="row g-4 settings-section">
        <div class="col-12 col-md-4">
            <h3 class="section-title">Update Password</h3>
            <div class="section-intro">Ensure your account is using a long, random password to stay secure.</div>
            @if (session('status') === 'password-updated')
                <div class="alert alert-success" role="alert">
                    Password berhasil di update
                </div>
            @endif
        </div>
        <div class="col-12 col-md-8">
            <div class="app-card app-card-settings shadow-sm p-4">

                <div class="app-card-body">
                    <form class="settings-form" method="post" action="{{ route('password.update') }}">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label for="update_password_current_password" class="form-label">Password Saat Ini</label>
                            <input type="password" class="form-control" id="update_password_current_password"
                                name="current_password" autocomplete="current-password">
                            @error('current_password')
                                <span class="text-danger" style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="update_password_password" class="form-label">Password Baru</label>
                            <input type="password" class="form-control" id="update_password_password" name="password"
                                autocomplete="new-password">
                            @error('password')
                                <span class="text-danger" style="color:red">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="update_password_password_confirmation" class="form-label">Konfirmasi
                                Password</label>
                            <input type="password" class="form-control" id="update_password_password_confirmation"
                                name="password_confirmation" autocomplete="current-password">
                            @error('password_confirmation')
                                <span class="text-danger" style="color:red">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn app-btn-primary">Save Changes</button>
                    </form>
                </div><!--//app-card-body-->

            </div><!--//app-card-->
        </div>
    </div><!--//row-->
    <hr class="my-4">
</x-layouts.dashboard>
