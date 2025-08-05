@extends('layouts.tabler')

@section('content')
<div class="container-xl px-4 mt-4">
    <x-alert/>

    <nav class="nav nav-borders">
        <a class="nav-link ms-0" href="{{ route('profile.edit') }}">Profil</a>
        <a class="nav-link active" href="{{ route('profile.settings') }}">Pengaturan</a>
    </nav>

    <hr class="mt-0 mb-4" />

    @include('partials.session')

    <div class="row">
        <div class="col-lg-8">
            <div class="card mb-4">
                <div class="card-header">
                    <div>
                        <h3 class="card-title">
                            {{ __('Rubah Password') }}
                        </h3>
                    </div>
                </div>

                <x-form action="{{ route('password.update') }}" method="PUT">
                    <div class="card-body">
                        <x-input type="password" name="current_password" label="Current Password" required />
                        <x-input type="password" name="password" label="New Password" required />
                        <x-input type="password" name="password_confirmation" label="Confirm Password" required />
                    </div>

                    <div class="card-footer text-end">
                        <x-button type="submit">{{ __('Simpan') }}</x-button>
                    </div>
                </x-form>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-header">
                    Autentikasi 2 Faktor
                </div>
                <div class="card-body">
                    <p>
                        Tambahkan tingkat keamanan lain ke akun Anda dengan mengaktifkan otentikasi dua faktor. 
                        Kami akan mengirimkan pesan teks kepada Anda untuk memverifikasi upaya login Anda pada
                        perangkat dan browser yang tidak dikenali..
                    </p>
                    <form>
                        <div class="form-check">
                            <input class="form-check-input" id="twoFactorOn" type="radio" name="twoFactor" checked="" />
                            <label class="form-check-label" for="twoFactorOn">Aktif</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" id="twoFactorOff" type="radio" name="twoFactor" />
                            <label class="form-check-label" for="twoFactorOff">Mati</label>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    Hapus Akun
                </div>
                <div class="card-body">
                    <p>
                        Menghapus akun Anda adalah tindakan permanen dan tidak dapat dibatalkan. Jika Anda yakin ingin menghapus akun Anda, pilih tombol di bawah.
                    </p>
                    <button type="button" class="btn btn-danger-soft text-danger">
                        Saya mengerti, hapus akun saya
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
