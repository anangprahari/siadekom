@extends('layouts.tabler')

@section('content')
<div class="container-xl px-4 mt-4">
    <x-alert/>

    <nav class="nav nav-borders">
        <a class="nav-link active ms-0" href="{{ route('profile.edit') }}">Profil</a>
        <a class="nav-link" href="{{ route('profile.settings') }}">Pengaturan</a>
    </nav>

    <hr class="mt-0 mb-4" />

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('patch')
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">
                            {{ __('Informasi Profil') }}
                        </h3>

                        <x-input name="name" value="{{ old('name', $user->name) }}" :required="true" />

                        <x-input name="email" label="Email address" value="{{ old('email', $user->email) }}" :required="true" />

                        <x-input name="username" value="{{ old('username', $user->username) }}" :required="true" />
                    </div>

                    <div class="card-footer text-end">
                        <x-button.save type="submit">
                            {{ __('Perbarui') }}
                        </x-button.save>

                        <x-button.back route="{{ route('dashboard') }}">
                            {{ __('Batalkan') }}
                        </x-button.back>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection