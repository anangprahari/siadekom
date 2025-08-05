<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <title>{{ config('app.name') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />
    <!-- CSS files -->
    <link href="{{ asset('dist/css/tabler.min.css') }}" rel="stylesheet"/>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Inter', sans-serif;
            background: url('{{ asset("assets/img/backgrounds/bglogin.jpg") }}') center/cover no-repeat;
            min-height: 100vh;
            position: relative;
            overflow: hidden;
        }
        
        /* Dark overlay for background */
        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.4);
            z-index: 0;
        }
        
        /* Building silhouettes */
        .building-bg {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 300px;
            z-index: 1;
        }
        
        .building {
            position: absolute;
            bottom: 0;
            background: #2c3e50;
            border-radius: 2px 2px 0 0;
        }
        
        .building-1 {
            left: 5%;
            width: 80px;
            height: 120px;
        }
        
        .building-2 {
            left: 15%;
            width: 100px;
            height: 180px;
        }
        
        .building-3 {
            left: 30%;
            width: 90px;
            height: 150px;
        }
        
        .building-4 {
            left: 45%;
            width: 110px;
            height: 200px;
        }
        
        .building-5 {
            right: 40%;
            width: 85px;
            height: 140px;
        }
        
        .building-6 {
            right: 25%;
            width: 95px;
            height: 170px;
        }
        
        .building-7 {
            right: 10%;
            width: 105px;
            height: 190px;
        }
        
        .building-8 {
            right: 2%;
            width: 75px;
            height: 130px;
        }
        
        /* Trees */
        .tree {
            position: absolute;
            bottom: 0;
            z-index: 2;
        }
        
        .tree-1 {
            left: 3%;
            width: 50px;
            height: 70px;
            background: #27ae60;
            border-radius: 50% 50% 50% 50% / 60% 60% 40% 40%;
        }
        
        .tree-2 {
            left: 8%;
            width: 40px;
            height: 55px;
            background: #2ecc71;
            border-radius: 50% 50% 50% 50% / 65% 65% 35% 35%;
        }
        
        .tree-3 {
            right: 5%;
            width: 45px;
            height: 60px;
            background: #27ae60;
            border-radius: 50% 50% 50% 50% / 60% 60% 40% 40%;
        }
        
        /* Main container */
        .page-center {
            position: relative;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 20px;
            flex-direction: column;
        }
        
        /* Title outside card */
        .main-title {
            text-align: center;
            margin-bottom: 30px;
            z-index: 15;
        }
        
        .system-title {
            color: #ffffff;
            font-size: 3rem;
            font-weight: 900;
            letter-spacing: 4px;
            margin-bottom: 8px;
            text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.7);
            filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.3));
        }
        
        .system-subtitle {
            color: #ffffff;
            font-size: 1.1rem;
            font-weight: 500;
            margin-bottom: 0;
            letter-spacing: 1px;
            text-shadow: 1px 1px 4px rgba(0, 0, 0, 0.7);
            filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.3));
        }
        
        .login-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            padding: 40px;
            width: 100%;
            max-width: 400px;
            text-align: center;
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .logo-container {
            margin-bottom: 30px;
        }
        
        .logo {
            max-width: 150px;
            height: auto;
            filter: drop-shadow(0 4px 8px rgba(0, 0, 0, 0.1));
        }
        
        .login-form {
            text-align: left;
        }
        
        .input-group {
            position: relative;
            margin-bottom: 30px;
        }
        
        .input-icon {
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            color: #3498db;
            z-index: 5;
            width: 20px;
            height: 20px;
        }
        
        .form-control {
            border: none;
            border-bottom: 2px solid #e0e0e0;
            border-radius: 0;
            padding: 15px 0 15px 35px;
            font-size: 1rem;
            font-weight: 400;
            width: 100%;
            transition: all 0.3s ease;
            background: transparent;
        }
        
        .form-control:focus {
            border-bottom-color: #3498db;
            box-shadow: none;
            outline: none;
        }
        
        .form-control::placeholder {
            color: #999;
            font-weight: 400;
        }
        
        .form-footer {
            margin-top: 35px;
            margin-bottom: 20px;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, #3498db 0%, #2980b9 100%);
            border: none;
            border-radius: 12px;
            padding: 15px 30px;
            font-weight: 600;
            font-size: 1rem;
            color: #fff;
            width: 100%;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #2980b9 0%, #1f639a 100%);
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(52, 152, 219, 0.3);
        }
        
        .forgot-password {
            color: #3498db;
            text-decoration: none;
            font-size: 0.9rem;
            text-align: center;
            display: block;
            margin-top: 15px;
            font-weight: 500;
            transition: color 0.3s ease;
        }
        
        .forgot-password:hover {
            color: #2980b9;
            text-decoration: underline;
        }
        
        /* Government logos at bottom */
        .gov-logos {
            position: fixed;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            display: flex;
            gap: 15px;
            z-index: 10;
        }
        
        .gov-logo {
            width: 80px;
            height: 60px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.7rem;
            font-weight: 700;
            color: #2c3e50;
            text-align: center;
            line-height: 1.1;
            border: 2px solid rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(5px);
        }
        
        .gov-logo:first-child {
            background: #e74c3c;
            color: #fff;
        }
        
        .gov-logo:nth-child(2) {
            background: #f39c12;
            color: #fff;
        }
        
        .gov-logo:last-child {
            background: #9b59b6;
            color: #fff;
        }
        
        @media (max-width: 768px) {
            .main-title {
                margin-bottom: 20px;
            }
            
            .system-title {
                font-size: 2.2rem;
                letter-spacing: 2px;
            }
            
            .system-subtitle {
                font-size: 1rem;
            }
            
            .login-card {
                margin: 10px;
                padding: 30px 25px;
            }
            
            .gov-logos {
                bottom: 10px;
                gap: 10px;
            }
            
            .gov-logo {
                width: 70px;
                height: 50px;
                font-size: 0.6rem;
            }
        }
        
        @media (max-width: 480px) {
            .system-title {
                font-size: 2rem;
                letter-spacing: 1px;
            }
            
            .system-subtitle {
                font-size: 0.9rem;
            }
            
            .login-card {
                margin: 5px;
                padding: 25px 20px;
            }
            
            .logo {
                max-width: 120px;
            }
        }
    </style>
    
    <!-- Custom CSS for specific page -->
    @stack('page-styles')
</head>

<body>
    <!-- Building silhouettes -->
    <div class="building-bg">
        <div class="building building-1"></div>
        <div class="building building-2"></div>
        <div class="building building-3"></div>
        <div class="building building-4"></div>
        <div class="building building-5"></div>
        <div class="building building-6"></div>
        <div class="building building-7"></div>
        <div class="building building-8"></div>
        
        <div class="tree tree-1"></div>
        <div class="tree tree-2"></div>
        <div class="tree tree-3"></div>
    </div>
    
    <div class="page-center">
        <div class="main-title">
            <h1 class="system-title">SIADEKOM</h1>
            <p class="system-subtitle">(Sistem Informasi Aset Diskominfo)</p>
        </div>
        
        <div class="login-card">
            <div class="logo-container">
                <img src="{{ asset('assets/img/backgrounds/logokominfo.png') }}" class="logo" alt="Diskominfo Logo">
            </div>
            
            <!-- BEGIN: Content -->
            @yield('content')
            <!-- END: Content -->
        </div>
    </div>
    
    <!-- Libs JS -->
    <script src="{{ asset('dist/js/tabler.min.js') }}" defer></script>
    
    <!-- Custom JS for specific page -->
    @stack('page-scripts')
</body>
</html>