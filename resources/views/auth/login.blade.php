@extends('layouts.auth')

@section('content')
<div class="login-form">

 {{-- Menampilkan pesan error --}}
   @if ($errors->any())
    <div class="alert alert-danger" style="
        background: rgba(255, 0, 0, 0.1);
        border: 1px solid rgba(255, 0, 0, 0.2);
        color: #c0392b;
        padding: 15px 20px;
        border-radius: 10px;
        margin-bottom: 25px;
        font-size: 0.95rem;
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    ">
        <ul style="margin: 0; padding-left: 20px;">
            @foreach ($errors->all() as $error)
                <li style="margin-bottom: 6px;">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <form action="{{ route('login') }}" method="POST" autocomplete="off">
        @csrf
        
        <div class="input-group">
            <div class="input-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                    <circle cx="12" cy="7" r="4"></circle>
                </svg>
            </div>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Username atau Email" required>
        </div>
        
        <div class="input-group">
            <div class="input-icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                    <circle cx="12" cy="16" r="1"></circle>
                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                </svg>
            </div>
            <input type="password" name="password" class="form-control" placeholder="Password" required>
        </div>
        
        <div class="form-footer">
            <button type="submit" class="btn btn-primary">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" style="margin-right: 8px;">
                    <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
                    <polyline points="10,17 15,12 10,7"></polyline>
                    <line x1="15" y1="12" x2="3" y2="12"></line>
                </svg>
                Masuk
            </button>
        </div>
    </form>
</div>
@endsection