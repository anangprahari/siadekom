<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{{ config('app.name') }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />

    <!-- CSS files -->
    <link href="{{ asset('dist/css/tabler.min.css') }}" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
            --sidebar-width: 280px;
            --sidebar-bg: linear-gradient(180deg, #ffffff 0%, #f8fafc 100%);
            --sidebar-hover: rgba(59, 130, 246, 0.08);
            --sidebar-active: linear-gradient(135deg, rgba(59, 130, 246, 0.15) 0%, rgba(37, 99, 235, 0.15) 100%);
            --sidebar-text: #334155;
            --sidebar-text-active: #1e40af;
            --sidebar-text-secondary: #64748b;
            --sidebar-border: #e2e8f0;
            --sidebar-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            --transition-smooth: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --header-height: 80px;
            --accent-color: #3b82f6;
            --accent-gradient: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        }

        /* Global Styles */
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-feature-settings: "cv03", "cv04", "cv11";
            background: linear-gradient(135deg, #f1f5f9 0%, #e2e8f0 100%);
            font-family: var(--tblr-font-sans-serif);
        }

        /* =====================================
           SIDEBAR STYLES
        ===================================== */
        .sidebar {
            width: var(--sidebar-width);
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: var(--sidebar-bg);
            border-right: 2px solid var(--sidebar-border);
            z-index: 1020;
            box-shadow: var(--sidebar-shadow);
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: rgba(59, 130, 246, 0.3) transparent;
            backdrop-filter: blur(20px);
        }

        /* Sidebar Scrollbar */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, rgba(59, 130, 246, 0.4) 0%, rgba(37, 99, 235, 0.4) 100%);
            border-radius: 6px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, rgba(59, 130, 246, 0.6) 0%, rgba(37, 99, 235, 0.6) 100%);
        }

        /* Sidebar Logo */
        .sidebar-logo {
            height: var(--header-height);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 2rem;
            background: #fff;
            position: relative;
            overflow: hidden;
        }

        .sidebar-logo::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 1s ease;
        }

        .sidebar-logo:hover::before {
            left: 100%;
        }

        .sidebar-logo:hover img {
            transform: scale(1.05);
        }

        /* Sidebar Navigation */
        .sidebar .nav {
            padding: 1.5rem 1rem;
        }

        .sidebar .nav-link {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.85rem 1.5rem;
            margin-bottom: 0.5rem;
            border-radius: 16px;
            color: var(--sidebar-text);
            text-decoration: none;
            font-weight: 500;
            font-size: 1rem;
            transition: var(--transition-smooth);
            border: 2px solid transparent;
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(10px);
            white-space: nowrap;
        }

        .sidebar .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.02) 0%, rgba(37, 99, 235, 0.02) 100%);
            opacity: 0;
            transition: var(--transition-smooth);
        }

        .sidebar .nav-link:hover {
            background: var(--sidebar-hover);
            color: var(--sidebar-text-active);
            transform: translateX(8px) scale(1.02);
            border-color: rgba(59, 130, 246, 0.2);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.15);
        }

        .sidebar .nav-link:hover::before {
            opacity: 1;
        }

        .sidebar .nav-link.active {
            background: var(--sidebar-active);
            color: var(--sidebar-text-active);
            border-color: rgba(59, 130, 246, 0.3);
            box-shadow: 0 15px 35px rgba(59, 130, 246, 0.2);
            transform: translateX(6px);
            font-weight: 600;
        }

        .sidebar .nav-link.active::after {
            content: '';
            position: absolute;
            right: 0;
            top: 20%;
            bottom: 20%;
            width: 4px;
            background: var(--accent-gradient);
            border-radius: 2px 0 0 2px;
            box-shadow: 0 0 10px rgba(59, 130, 246, 0.5);
        }

        .sidebar .nav-link .icon {
            margin-right: 0;
            width: 22px;
            height: 22px;
            opacity: 0.8;
            transition: var(--transition-smooth);
            flex-shrink: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .sidebar .nav-link:hover .icon,
        .sidebar .nav-link.active .icon {
            opacity: 1;
            transform: scale(1.1);
        }

        .sidebar .nav-link span {
            flex: 1;
            display: flex;
            align-items: center;
            min-width: 0;
            font-size: 1rem;
            font-weight: 500;
            letter-spacing: 0.01em;
        }

        /* Sidebar Dropdown */
        .sidebar .nav-link.has-dropdown {
            justify-content: space-between;
        }

        .sidebar .nav-link.has-dropdown::after {
            content: '';
            width: 0;
            height: 0;
            border-left: 6px solid transparent;
            border-right: 6px solid transparent;
            border-top: 8px solid currentColor;
            transition: var(--transition-smooth);
            opacity: 0.6;
            flex-shrink: 0;
        }

        .sidebar .nav-link.has-dropdown[aria-expanded="true"]::after {
            transform: rotate(180deg);
            opacity: 1;
        }

        .sidebar .nav-link.has-dropdown:hover::after {
            opacity: 1;
        }

        .sidebar .dropdown-menu {
            margin-top: 0.5rem;
            margin-left: 0;
            padding: 0.75rem;
            background: rgba(248, 250, 252, 0.95);
            border: 2px solid rgba(59, 130, 246, 0.1);
            border-radius: 16px;
            box-shadow: inset 0 2px 15px rgba(59, 130, 246, 0.08);
            backdrop-filter: blur(15px);
            max-height: 0;
            overflow: hidden;
            opacity: 0;
            transform: translateY(-10px);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .sidebar .dropdown-menu.show {
            max-height: 500px;
            opacity: 1;
            transform: translateY(0);
        }

        .sidebar .dropdown-item {
            display: flex;
            align-items: center;
            padding: 0.875rem 1.25rem;
            margin: 0.25rem 0;
            color: var(--sidebar-text-secondary);
            text-decoration: none;
            border-radius: 12px;
            transition: var(--transition-smooth);
            font-size: 0.9rem;
            position: relative;
            border: 1px solid transparent;
        }

        .sidebar .dropdown-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 0;
            background: var(--accent-gradient);
            border-radius: 2px;
            transition: var(--transition-smooth);
        }

        .sidebar .dropdown-item:hover {
            background: rgba(59, 130, 246, 0.08);
            color: var(--sidebar-text-active);
            transform: translateX(8px);
            border-color: rgba(59, 130, 246, 0.2);
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.1);
        }

        .sidebar .dropdown-item:hover::before {
            height: 60%;
        }

        .sidebar .dropdown-item.active {
            background: rgba(59, 130, 246, 0.12);
            color: var(--sidebar-text-active);
            font-weight: 600;
            border-color: rgba(59, 130, 246, 0.3);
        }

        .sidebar .dropdown-item.active::before {
            height: 80%;
        }

        /* =====================================
           NAVBAR STYLES
        ===================================== */
        .navbar {
            position: fixed;
            top: 0;
            left: var(--sidebar-width);
            width: calc(100% - var(--sidebar-width));
            z-index: 1030;
            height: var(--header-height);
            transition: var(--transition-smooth);
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.95);
            border-bottom: 1px solid var(--sidebar-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 2rem;
        }

        /* Navbar Title */
        .navbar-title {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .navbar-title .icon-wrapper {
            padding: 0.75rem;
            border-radius: 12px;
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        }

        .navbar-title h1 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: 700;
            color: #1e293b;
            background: linear-gradient(135deg, #1e293b 0%, #475569 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .navbar-title .subtitle {
            font-size: 0.875rem;
            color: #64748b;
            font-weight: 500;
        }

        /* User Profile Dropdown */
        .user-dropdown {
            position: relative;
        }

        .user-dropdown .dropdown-toggle {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.75rem 1.25rem;
            border-radius: 16px;
            background: rgba(255, 255, 255, 0.8);
            border: 2px solid rgba(59, 130, 246, 0.1);
            text-decoration: none;
            color: #334155;
            font-weight: 500;
            transition: var(--transition-smooth);
            backdrop-filter: blur(10px);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.05);
        }

        .user-dropdown .dropdown-toggle:hover {
            background: rgba(59, 130, 246, 0.05);
            border-color: rgba(59, 130, 246, 0.3);
            color: #1e40af;
            transform: translateY(-2px) scale(1.02);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.15);
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 12px;
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 1.1rem;
            position: relative;
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.3);
        }

        .user-avatar::after {
            content: '';
            position: absolute;
            bottom: -2px;
            right: -2px;
            width: 12px;
            height: 12px;
            background: #10b981;
            border: 2px solid white;
            border-radius: 50%;
            animation: pulse 2s infinite;
        }

        .user-info h6 {
            margin: 0;
            font-size: 0.9rem;
            font-weight: 600;
            color: #1e293b;
            text-transform: capitalize;
        }

        .user-info small {
            font-size: 0.75rem;
            color: #64748b;
        }

        .dropdown-arrow {
            font-size: 0.7rem;
            opacity: 0.6;
            transition: var(--transition-smooth);
        }

        .user-dropdown:hover .dropdown-arrow {
            opacity: 1;
            transform: rotate(180deg);
        }

        /* User Dropdown Menu */
        .user-dropdown .dropdown-menu {
            position: absolute;
            top: calc(100% + 10px);
            right: 0;
            min-width: 280px;
            background: white;
            border: none;
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1), 0 0 0 1px rgba(0, 0, 0, 0.05);
            padding: 1rem;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px) scale(0.95);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(20px);
            z-index: 1040;
        }

        .user-dropdown.show .dropdown-menu {
            opacity: 1;
            visibility: visible;
            transform: translateY(0) scale(1);
        }

        .user-dropdown .dropdown-menu .user-header {
            padding: 1rem;
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            border-radius: 12px;
            color: white;
            margin-bottom: 1rem;
        }

        .user-dropdown .dropdown-menu .dropdown-item {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            padding: 0.875rem 1rem;
            border-radius: 12px;
            color: #374151;
            text-decoration: none;
            transition: var(--transition-smooth);
            margin-bottom: 0.5rem;
            border: 1px solid transparent;
        }

        .user-dropdown .dropdown-menu .dropdown-item:hover {
            background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
            color: white;
            transform: translateX(8px) scale(1.02);
            box-shadow: 0 4px 12px rgba(59, 130, 246, 0.2);
        }

        .user-dropdown .dropdown-menu .dropdown-item.logout:hover {
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
        }

        .user-dropdown .dropdown-menu .dropdown-item .icon-wrapper {
            width: 36px;
            height: 36px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(59, 130, 246, 0.1);
            transition: var(--transition-smooth);
        }

        .user-dropdown .dropdown-menu .dropdown-item:hover .icon-wrapper {
            background: rgba(255, 255, 255, 0.2);
            transform: scale(1.1);
        }

        .user-dropdown .dropdown-menu .dropdown-item.logout .icon-wrapper {
            background: rgba(220, 38, 38, 0.1);
        }

        /* =====================================
           MAIN CONTENT STYLES
        ===================================== */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 0;
            transition: var(--transition-smooth);
            min-height: 100vh;
        }

        main {
            padding: calc(var(--header-height) + 2rem) 2rem 2rem 2rem;
            overflow-x: auto;
        }

        /* =====================================
           MODAL Z-INDEX FIXES
        ===================================== */
        .modal {
            z-index: 1060 !important;
        }

        .modal-backdrop {
            z-index: 1055 !important;
        }

        .modal-dialog {
            margin: 3rem auto;
            max-height: calc(100vh - 6rem);
            position: relative;
            z-index: 1061 !important;
        }

        .modal-content {
            border: none;
            border-radius: 0.5rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
            position: relative;
            z-index: 1062 !important;
        }

        /* =====================================
           MOBILE STYLES
        ===================================== */
        .sidebar-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1031;
            background: var(--accent-gradient);
            color: white;
            border: none;
            padding: 12px;
            border-radius: 12px;
            cursor: pointer;
            transition: var(--transition-smooth);
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3);
        }

        .sidebar-toggle:hover {
            transform: scale(1.1);
            box-shadow: 0 12px 35px rgba(59, 130, 246, 0.4);
        }

        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1029;
            opacity: 0;
            transition: var(--transition-smooth);
        }

        .sidebar-overlay.show {
            display: block;
            opacity: 1;
        }

        @media (max-width: 768px) {
            :root {
                --sidebar-width: 320px;
            }

            .sidebar {
                transform: translateX(-100%);
                transition: var(--transition-smooth);
            }

            .sidebar.show {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .navbar {
                left: 0;
                width: 100%;
            }

            .sidebar-toggle {
                display: block;
            }

            main {
                padding: calc(var(--header-height) + 1rem) 1rem 1rem 1rem;
            }

            .modal-dialog {
                margin: 1rem;
                max-height: calc(100vh - 2rem);
            }

            .sidebar-overlay.show {
                display: block;
            }
        }

        /* =====================================
           ANIMATIONS
        ===================================== */
        @keyframes pulse {
            0% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.1);
                opacity: 0.8;
            }

            100% {
                transform: scale(1);
                opacity: 1;
            }
        }

        .sidebar .nav-link {
            animation: fadeInUp 0.6s ease forwards;
            opacity: 0;
            transform: translateY(20px);
        }

        .sidebar .nav-link:nth-child(1) { animation-delay: 0.1s; }
        .sidebar .nav-link:nth-child(2) { animation-delay: 0.15s; }
        .sidebar .nav-link:nth-child(3) { animation-delay: 0.2s; }
        .sidebar .nav-link:nth-child(4) { animation-delay: 0.25s; }
        .sidebar .nav-link:nth-child(5) { animation-delay: 0.3s; }
        .sidebar .nav-link:nth-child(6) { animation-delay: 0.35s; }
        .sidebar .nav-link:nth-child(7) { animation-delay: 0.4s; }
        .sidebar .nav-link:nth-child(8) { animation-delay: 0.45s; }

        @keyframes fadeInUp {
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* =====================================
           UTILITY CLASSES
        ===================================== */
        .sidebar .nav-link:active,
        .sidebar .dropdown-item:active {
            transform: translateX(4px) scale(0.98);
        }

        .sidebar .nav-link:focus,
        .sidebar .dropdown-item:focus {
            outline: 2px solid var(--accent-color);
            outline-offset: 2px;
        }

        /* Prevent modal conflicts */
        body.modal-open {
            overflow: hidden;
            padding-right: 0 !important;
        }

        body.modal-open .navbar .dropdown-toggle {
            pointer-events: none;
        }

        body.modal-open .navbar .dropdown-menu {
            display: none !important;
        }

        body.modal-open .modal * {
            pointer-events: auto;
        }
    </style>

    @stack('page-styles')
</head>

<body>
    {{-- Mobile Toggle Button --}}
    <button class="sidebar-toggle" onclick="toggleSidebar()" aria-label="Toggle Sidebar">
        <i class="fas fa-bars"></i>
    </button>

    {{-- Mobile Overlay --}}
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>

    {{-- Sidebar --}}
    <div class="sidebar" id="sidebar">
        <!-- Logo Section -->
        <div class="sidebar-logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('assets/img/backgrounds/logokominfo.png') }}" alt="Logo Kominfo" width="180">
            </a>
        </div>

        <!-- Navigation -->
        <nav class="nav flex-column nav-pills">
            <!-- Beranda -->
            <a class="nav-link {{ request()->is('dashboard*') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="22" height="22" viewBox="0 0 24 24"
                    stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                    stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                    <path d="M5 12l-2 0l9 -9l9 9l-2 0" />
                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7" />
                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6" />
                </svg>
                <span>{{ __('Dashboard') }}</span>
            </a>

            <!-- Aset Dropdown -->
            <div class="nav-item">
                <a class="nav-link has-dropdown {{ request()->is('asets*', 'aset-lancar*') ? 'active' : '' }}"
                    href="#" onclick="toggleDropdown(event, 'asetDropdown')" aria-expanded="false" role="button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="22" height="22"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M3 7v4a1 1 0 0 0 1 1h3" />
                        <path d="M7 7v10" />
                        <path d="M10 8v8a1 1 0 0 0 1 1h2a1 1 0 0 0 1 -1v-8a1 1 0 0 0 -1 -1h-2a1 1 0 0 0 -1 1z" />
                        <path d="M17 7v4a1 1 0 0 0 1 1h3" />
                        <path d="M21 7v10" />
                        <path d="M22 7h-2l-2 -2h-6l-2 2h-2" />
                    </svg>
                    <span>{{ __('Aset') }}</span>
                </a>
                <div class="dropdown-menu" id="asetDropdown">
                    <a class="dropdown-item {{ request()->is('asets*') ? 'active' : '' }}"
                        href="{{ route('asets.index') }}">Aset Tetap</a>
                    <a class="dropdown-item {{ request()->is('aset-lancars*') ? 'active' : '' }}"
                        href="{{ route('aset-lancars.index') }}">Aset Lancar</a>
                </div>
            </div>

            <!-- Pengaturan Dropdown -->
            <div class="nav-item">
                <a class="nav-link has-dropdown {{ request()->is('users*', 'categories*', 'units*') ? 'active' : '' }}"
                    href="#" onclick="toggleDropdown(event, 'pengaturanDropdown')" aria-expanded="false"
                    role="button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="22" height="22"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                        stroke-linejoin="round">
                        <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066
                            c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426
                            1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724
                            1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066
                            c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572
                            c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573
                            c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z" />
                        <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                    </svg>
                    <span>{{ __('Pengaturan') }}</span>
                </a>
                <div class="dropdown-menu" id="pengaturanDropdown">
                    <a class="dropdown-item" href="{{ route('users.index') }}">Pengguna</a>
                    {{-- <a class="dropdown-item" href="{{ route('categories.index') }}">Kategori</a>
                    <a class="dropdown-item" href="{{ route('units.index') }}">Unit</a> --}}
                </div>
            </div>
        </nav>
    </div>

    {{-- Modern Navbar with User Profile --}}
    <nav class="navbar">
        <!-- Left: System Title -->
        <div class="navbar-title">
            <div class="icon-wrapper">
                <i class="fas fa-laptop-code text-white" style="font-size: 1.2rem;"></i>
            </div>
            <div>
                <h1>SIADEKOM</h1>
                <div class="subtitle">Sistem Informasi Aset Diskominfo</div>
            </div>
        </div>

        <!-- Right: User Profile Dropdown (Simple version - no dropdown menu here) -->
        <div class="user-dropdown" onclick="toggleUserDropdown()">
            <a href="#" class="dropdown-toggle">
                <div class="user-avatar">
                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                </div>
                <div class="user-info">
                    <h6>{{ Auth::user()->name }}</h6>
                    <small>Administrator</small>
                </div>
                <i class="fas fa-chevron-down dropdown-arrow"></i>
            </a>

            <div class="dropdown-menu">
                <!-- User Header -->
                <div class="user-header">
                    <div class="d-flex align-items-center">
                        <div class="user-avatar me-3" style="width: 50px; height: 50px;">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </div>
                        <div>
                            <h6 class="mb-1 text-white">{{ Auth::user()->name }}</h6>
                            <small class="text-white-50">Administrator</small>
                        </div>
                    </div>
                </div>

                <!-- Menu Items -->
                <a href="{{ route('profile.edit') }}" class="dropdown-item">
                    <div class="icon-wrapper">
                        <i class="fas fa-user-cog" style="color: #3b82f6;"></i>
                    </div>
                    <div>
                        <div style="font-weight: 500;">Kelola Akun</div>
                        <small style="color: #6b7280;">Pengaturan profil</small>
                    </div>
                </a>

                <div style="border-top: 1px solid #e5e7eb; margin: 0.75rem 0;"></div>

                <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="dropdown-item logout w-100 border-0 bg-transparent text-start">
                        <div class="icon-wrapper">
                            <i class="fas fa-sign-out-alt" style="color: #dc2626;"></i>
                        </div>
                        <div>
                            <div style="font-weight: 500;">Keluar</div>
                            <small style="color: #6b7280;">Logout sistem</small>
                        </div>
                    </button>
                </form>
            </div>
        </div>
    </nav>

    {{-- Main Content --}}
    <div class="main-content">
        <main>
            @yield('content')
        </main>

        @include('layouts.body.footer')
    </div>

    <script src="{{ asset('dist/js/tabler.min.js') }}" defer></script>
    <script>
        // =====================================
        // CORE FUNCTIONALITY
        // =====================================
        
        class SidebarManager {
            constructor() {
                this.sidebar = document.getElementById('sidebar');
                this.overlay = document.getElementById('sidebarOverlay');
                this.init();
            }

            init() {
                this.setupEventListeners();
                this.initializeDropdowns();
                this.handleResize();
            }

            setupEventListeners() {
                // Window resize handler
                window.addEventListener('resize', () => this.handleResize());
                
                // Close sidebar when clicking outside on mobile
                document.addEventListener('click', (event) => this.handleOutsideClick(event));
                
                // Keyboard navigation
                document.addEventListener('keydown', (event) => this.handleKeyDown(event));
            }

            initializeDropdowns() {
                // Set initial max-height for all dropdown menus
                const dropdownMenus = document.querySelectorAll('.sidebar .dropdown-menu');
                dropdownMenus.forEach(menu => {
                    menu.style.maxHeight = '0px';
                });

                // Auto-expand active dropdowns
                this.autoExpandActiveDropdowns();
            }

            autoExpandActiveDropdowns() {
                const activeLinks = document.querySelectorAll('.nav-link.active.has-dropdown');
                activeLinks.forEach(link => {
                    const onclickAttr = link.getAttribute('onclick');
                    if (onclickAttr) {
                        const match = onclickAttr.match(/toggleDropdown\(event, '(.+?)'\)/);
                        if (match) {
                            const dropdownId = match[1];
                            const dropdown = document.getElementById(dropdownId);
                            if (dropdown) {
                                dropdown.classList.add('show');
                                link.setAttribute('aria-expanded', 'true');
                                setTimeout(() => {
                                    dropdown.style.maxHeight = dropdown.scrollHeight + 'px';
                                }, 100);
                            }
                        }
                    }
                });
            }

            toggle() {
                this.sidebar.classList.toggle('show');
                this.overlay.classList.toggle('show');
            }

            close() {
                this.sidebar.classList.remove('show');
                this.overlay.classList.remove('show');
            }

            handleResize() {
                if (window.innerWidth > 768) {
                    this.close();
                }
            }

            handleOutsideClick(event) {
                const toggle = document.querySelector('.sidebar-toggle');
                if (window.innerWidth <= 768) {
                    if (!this.sidebar.contains(event.target) && !toggle.contains(event.target)) {
                        this.close();
                    }
                }
            }

            handleKeyDown(event) {
                if (event.key === 'Escape') {
                    this.close();
                }
            }
        }

        class DropdownManager {
            static toggleDropdown(event, dropdownId) {
                event.preventDefault();

                const link = event.currentTarget;
                const dropdown = document.getElementById(dropdownId);
                const isExpanded = link.getAttribute('aria-expanded') === 'true';

                // Close all other dropdowns
                this.closeAllDropdowns(dropdownId);

                // Toggle current dropdown
                if (!isExpanded) {
                    dropdown.classList.add('show');
                    link.setAttribute('aria-expanded', 'true');
                    setTimeout(() => {
                        dropdown.style.maxHeight = dropdown.scrollHeight + 'px';
                    }, 10);
                } else {
                    dropdown.classList.remove('show');
                    link.setAttribute('aria-expanded', 'false');
                    dropdown.style.maxHeight = '0px';
                }
            }

            static closeAllDropdowns(exceptId = null) {
                const allDropdowns = document.querySelectorAll('.sidebar .dropdown-menu');
                const allToggles = document.querySelectorAll('.has-dropdown');

                allDropdowns.forEach((dropdown, index) => {
                    if (!exceptId || dropdown.id !== exceptId) {
                        dropdown.classList.remove('show');
                        dropdown.style.maxHeight = '0px';
                        if (allToggles[index]) {
                            allToggles[index].setAttribute('aria-expanded', 'false');
                        }
                    }
                });
            }
        }

        class UserDropdownManager {
            constructor() {
                this.userDropdown = document.querySelector('.user-dropdown');
                this.init();
            }

            init() {
                this.setupEventListeners();
            }

            setupEventListeners() {
                // Close user dropdown when clicking outside
                document.addEventListener('click', (event) => {
                    if (this.userDropdown && !this.userDropdown.contains(event.target)) {
                        this.close();
                    }
                });

                // Prevent dropdown toggle link default behavior
                const toggleLink = this.userDropdown?.querySelector('.dropdown-toggle');
                if (toggleLink) {
                    toggleLink.addEventListener('click', (e) => e.preventDefault());
                }
            }

            toggle() {
                if (!this.userDropdown) return;

                const isOpen = this.userDropdown.classList.contains('show');
                
                // Close all sidebar dropdowns first
                DropdownManager.closeAllDropdowns();
                
                if (!isOpen) {
                    this.userDropdown.classList.add('show');
                } else {
                    this.userDropdown.classList.remove('show');
                }
            }

            close() {
                if (this.userDropdown) {
                    this.userDropdown.classList.remove('show');
                }
            }
        }

        class ModalManager {
            static init() {
                // Enhanced modal and dropdown management
                $(document).ready(() => {
                    this.setupModalEvents();
                    this.setupZIndexManagement();
                    this.setupKeyboardHandling();
                });
            }

            static setupModalEvents() {
                // Close dropdowns before showing modal
                $(document).on('show.bs.modal', '.modal', function() {
                    DropdownManager.closeAllDropdowns();
                    userDropdownManager.close();
                    
                    const modal = $(this);
                    const zIndex = 1060 + $('.modal:visible').length * 10;
                    modal.css('z-index', zIndex);
                    
                    setTimeout(() => {
                        $('.modal-backdrop').css('z-index', zIndex - 5);
                    }, 50);
                });

                // Re-enable interactions when modal is hidden
                $(document).on('hidden.bs.modal', '.modal', function() {
                    $('body').removeClass('modal-open');
                    $('.navbar .dropdown-toggle').css('pointer-events', 'auto');
                    
                    if ($('.modal:visible').length === 0) {
                        modalZindex = 1060;
                    }
                });

                // Handle modal backdrop clicks
                $(document).on('click', '.modal', function(e) {
                    if (e.target === e.currentTarget) {
                        $(this).modal('hide');
                    }
                });

                // Prevent dropdown clicks from closing modal
                $(document).on('click', '.dropdown-menu', function(e) {
                    e.stopPropagation();
                });
            }

            static setupZIndexManagement() {
                let modalZindex = 1060;
                
                $(document).on('show.bs.modal', '.modal', function() {
                    const currentModal = $(this);
                    modalZindex++;
                    currentModal.css('z-index', modalZindex);
                    
                    setTimeout(() => {
                        $('.modal-backdrop').last().css('z-index', modalZindex - 1);
                    }, 50);
                });
            }

            static setupKeyboardHandling() {
                $(document).on('keydown', function(e) {
                    if (e.key === 'Escape') {
                        // Close user dropdown first
                        userDropdownManager.close();
                        
                        // Then handle modal
                        const visibleModal = $('.modal:visible').last();
                        if (visibleModal.length) {
                            visibleModal.modal('hide');
                        }
                    }
                });
            }
        }

        // =====================================
        // GLOBAL FUNCTIONS (for backward compatibility)
        // =====================================
        
        function toggleSidebar() {
            sidebarManager.toggle();
        }

        function closeSidebar() {
            sidebarManager.close();
        }

        function toggleDropdown(event, dropdownId) {
            DropdownManager.toggleDropdown(event, dropdownId);
        }

        function closeAllDropdowns(exceptId = null) {
            DropdownManager.closeAllDropdowns(exceptId);
        }

        function toggleUserDropdown() {
            userDropdownManager.toggle();
        }

        // =====================================
        // INITIALIZATION
        // =====================================
        
        let sidebarManager, userDropdownManager;

        document.addEventListener('DOMContentLoaded', function() {
            // Initialize managers
            sidebarManager = new SidebarManager();
            userDropdownManager = new UserDropdownManager();
            ModalManager.init();

            // Preload images for better performance
            const images = ['{{ asset('assets/img/backgrounds/logokominfo.png') }}'];
            images.forEach(src => {
                const img = new Image();
                img.src = src;
            });

            // Add smooth scroll behavior
            document.documentElement.style.scrollBehavior = 'smooth';

            // Enhanced hover effects with performance optimization
            const hoverElements = document.querySelectorAll('.nav-link, .dropdown-item');
            let hoverTimeout;
            
            hoverElements.forEach(item => {
                item.addEventListener('mouseenter', function() {
                    clearTimeout(hoverTimeout);
                    this.style.willChange = 'transform, box-shadow';
                });

                item.addEventListener('mouseleave', function() {
                    hoverTimeout = setTimeout(() => {
                        this.style.willChange = 'auto';
                    }, 300);
                });
            });
        });

        // Initialize modal management if jQuery is available
        if (typeof $ !== 'undefined') {
            ModalManager.init();
        }
    </script>
    
    @stack('page-scripts')
</body>

</html>