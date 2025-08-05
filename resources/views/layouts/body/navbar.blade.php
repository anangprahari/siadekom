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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
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

        /* Modern Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background: var(--sidebar-bg);
            border-right: 2px solid var(--sidebar-border);
            z-index: 1030;
            box-shadow: var(--sidebar-shadow);
            overflow-y: auto;
            scrollbar-width: thin;
            scrollbar-color: rgba(59, 130, 246, 0.3) transparent;
            backdrop-filter: blur(20px);
        }

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

        /* Logo Section */
        .sidebar-logo {
            height: var(--header-height);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0 2rem;
            background: #fff; /* Ubah dari var(--accent-gradient) menjadi putih */
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

        .sidebar-logo img {
        }

        .sidebar-logo:hover img {
            transform: scale(1.05);
        }

        /* Navigation Styles */
        .sidebar .nav {
            padding: 1.5rem 1rem;
        }

       .sidebar .nav-link {
    display: flex;
    align-items: center;
    gap: 0.75rem; /* Jarak antara ikon dan teks */
    padding: 0.85rem 1.5rem;
    margin-bottom: 0.5rem;
    border-radius: 16px;
    color: var(--sidebar-text);
    text-decoration: none;
    font-weight: 500;
    font-size: 1rem; /* Sedikit lebih besar agar mudah dibaca */
    transition: var(--transition-smooth);
    border: 2px solid transparent;
    position: relative;
    overflow: hidden;
    backdrop-filter: blur(10px);
    white-space: nowrap; /* Agar tidak turun ke bawah */
}

        /* Subtle gradient overlay */
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

        /* Hover effects */
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

        /* Active state */
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

        /* Dropdown Indicator */
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

        /* Dropdown Badge */
        .sidebar .nav-link.has-dropdown .dropdown-badge {
            margin-left: auto;
            margin-right: 0.5rem;
            padding: 2px 8px;
            background: rgba(59, 130, 246, 0.1);
            color: var(--accent-color);
            border-radius: 12px;
            font-size: 0.75rem;
            font-weight: 600;
            transition: var(--transition-smooth);
        }

        .sidebar .nav-link.has-dropdown:hover .dropdown-badge {
            background: rgba(59, 130, 246, 0.2);
            transform: scale(1.05);
        }

        /* Dropdown Menu Styles */
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

        /* Main Content Adjustments */
        .main-content {
            margin-left: var(--sidebar-width);
            padding: 0;
            transition: var(--transition-smooth);
            min-height: 100vh;
        }

        .navbar {
            position: fixed;
            top: 0;
            left: var(--sidebar-width);
            width: calc(100% - var(--sidebar-width));
            z-index: 1028;
            height: var(--header-height);
            transition: var(--transition-smooth);
            backdrop-filter: blur(20px);
            background: rgba(255, 255, 255, 0.95);
            border-bottom: 1px solid var(--sidebar-border);
        }

        main {
            padding: calc(var(--header-height) + 2rem) 2rem 2rem 2rem;
            overflow-x: auto;
        }

        /* Mobile Toggle Button */
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

        /* Responsive Design */
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
        }

        /* Enhanced animations */
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

        /* Loading animation for sidebar */
        .sidebar::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--accent-gradient);
            transform: translateX(-100%);
            animation: loading 3s infinite ease-in-out;
        }

        @keyframes loading {
            0%, 100% {
                transform: translateX(-100%);
            }
            50% {
                transform: translateX(100%);
            }
        }

        /* Overlay for mobile */
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
            .sidebar-overlay.show {
                display: block;
            }
        }

        /* Micro interactions */
        .sidebar .nav-link:active {
            transform: translateX(4px) scale(0.98);
        }

        .sidebar .dropdown-item:active {
            transform: translateX(4px) scale(0.98);
        }

        /* Focus states for accessibility */
        .sidebar .nav-link:focus,
        .sidebar .dropdown-item:focus {
            outline: 2px solid var(--accent-color);
            outline-offset: 2px;
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
    </style>

    @stack('page-styles')
    @livewireStyles
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
                     stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M5 12l-2 0l9 -9l9 9l-2 0"/>
                    <path d="M5 12v7a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-7"/>
                    <path d="M9 21v-6a2 2 0 0 1 2 -2h2a2 2 0 0 1 2 2v6"/>
                </svg>
                <span>{{ __('Dashboard') }}</span>
            </a>

            <!-- Aset Dropdown -->
<div class="nav-item">
    <a class="nav-link has-dropdown {{ request()->is('asets*', 'aset-lancar*') ? 'active' : '' }}" 
       href="#" 
       onclick="toggleDropdown(event, 'asetDropdown')" 
       aria-expanded="false"
       role="button">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="22" height="22" viewBox="0 0 24 24"
             stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M3 7v4a1 1 0 0 0 1 1h3"/>
            <path d="M7 7v10"/>
            <path d="M10 8v8a1 1 0 0 0 1 1h2a1 1 0 0 0 1 -1v-8a1 1 0 0 0 -1 -1h-2a1 1 0 0 0 -1 1z"/>
            <path d="M17 7v4a1 1 0 0 0 1 1h3"/>
            <path d="M21 7v10"/>
            <path d="M22 7h-2l-2 -2h-6l-2 2h-2"/>
        </svg>
       <span>{{ __('Aset') }}</span>
    </a>
    <div class="dropdown-menu" id="asetDropdown">
        <a class="dropdown-item {{ request()->is('asets*') ? 'active' : '' }}" href="{{ route('asets.index') }}">Aset Tetap</a>
        <a class="dropdown-item {{ request()->is('aset-lancars*') ? 'active' : '' }}" href="{{ route('aset-lancars.index') }}">Aset Lancar</a>
    </div>
</div>

            {{-- <!-- Produk -->
            <a class="nav-link {{ request()->is('products*') ? 'active' : '' }}" href="{{ route('products.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="22" height="22" viewBox="0 0 24 24"
                     stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M7 16.5l-5 -3l5 -3l5 3v5.5l-5 3z"/>
                    <path d="M2 13.5v5.5l5 3"/>
                    <path d="M7 16.545l5 -3.03"/>
                    <path d="M17 16.5l-5 -3l5 -3l5 3v5.5l-5 3z"/>
                    <path d="M12 19l5 3"/>
                    <path d="M17 16.5l5 -3"/>
                    <path d="M12 13.5v-5.5l-5 -3l5 -3l5 3v5.5"/>
                    <path d="M7 5.03v5.455"/>
                    <path d="M12 8l5 -3"/>
                </svg>
                <span>{{ __('Produk') }}</span>
            </a>

            <!-- Pesanan Dropdown -->
            <div class="nav-item">
                <a class="nav-link has-dropdown {{ request()->is('orders*') ? 'active' : '' }}" 
                   href="#" 
                   onclick="toggleDropdown(event, 'pesananDropdown')" 
                   aria-expanded="false"
                   role="button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="22" height="22" viewBox="0 0 24 24"
                         stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M12 21l-8 -4.5v-9l8 -4.5l8 4.5v4.5"/>
                        <path d="M12 12l8 -4.5"/>
                        <path d="M12 12v9"/>
                        <path d="M12 12l-8 -4.5"/>
                        <path d="M15 18h7"/>
                        <path d="M19 15l3 3l-3 3"/>
                    </svg>
                    <span>{{ __('Pesanan') }}</span>
                </a>
                <div class="dropdown-menu" id="pesananDropdown">
                    <a class="dropdown-item" href="{{ route('orders.index') }}">Semua</a>
                    <a class="dropdown-item" href="{{ route('orders.complete') }}">Selesai</a>
                    <a class="dropdown-item" href="{{ route('orders.pending') }}">Tunggu</a>
                    <a class="dropdown-item" href="{{ route('due.index') }}">Karena</a>
                </div>
            </div>

            <!-- Pembelian Dropdown -->
            <div class="nav-item">
                <a class="nav-link has-dropdown {{ request()->is('purchases*') ? 'active' : '' }}" 
                   href="#" 
                   onclick="toggleDropdown(event, 'pembelianDropdown')" 
                   aria-expanded="false"
                   role="button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="22" height="22" viewBox="0 0 24 24"
                         stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M12 21l-8 -4.5v-9l8 -4.5l8 4.5v4.5"/>
                        <path d="M12 12l8 -4.5"/>
                        <path d="M12 12v9"/>
                        <path d="M12 12l-8 -4.5"/>
                        <path d="M22 18h-7"/>
                        <path d="M18 15l-3 3l3 3"/>
                    </svg>
                    <span>{{ __('Pembelian') }}</span>
                </a>
                <div class="dropdown-menu" id="pembelianDropdown">
                    <a class="dropdown-item" href="{{ route('purchases.index') }}">Semua</a>
                    <a class="dropdown-item" href="{{ route('purchases.approvedPurchases') }}">Persetujuan</a>
                    <a class="dropdown-item" href="{{ route('purchases.dailyPurchaseReport') }}">Laporan pembelian harian</a>
                </div>
            </div>

            <!-- Kutipan -->
            <a class="nav-link {{ request()->is('quotations') ? 'active' : '' }}" href="{{ route('quotations.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="22" height="22" viewBox="0 0 24 24"
                     stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M14 3v4a1 1 0 0 0 1 1h4"/>
                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"/>
                </svg>
                <span>{{ __('Kutipan') }}</span>
            </a>

            <!-- Halaman Dropdown -->
            <div class="nav-item">
                <a class="nav-link has-dropdown {{ request()->is('suppliers*', 'customers*') ? 'active' : '' }}" 
                   href="#" 
                   onclick="toggleDropdown(event, 'halamanDropdown')" 
                   aria-expanded="false"
                   role="button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="22" height="22" viewBox="0 0 24 24"
                         stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M8 4m0 2a2 2 0 0 1 2 -2h8a2 2 0 0 1 2 2v8a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2z"/>
                        <path d="M16 16v2a2 2 0 0 1 -2 2h-8a2 2 0 0 1 -2 -2v-8a2 2 0 0 1 2 -2h2"/>
                    </svg>
                    <span>{{ __('Halaman') }}</span>
                </a>
                <div class="dropdown-menu" id="halamanDropdown">
                    <a class="dropdown-item" href="{{ route('suppliers.index') }}">Pemasok</a>
                    <a class="dropdown-item" href="{{ route('customers.index') }}">Pelanggan</a>
                </div>
            </div>

            <!-- Pengaturan Dropdown -->
            <div class="nav-item">
                <a class="nav-link has-dropdown {{ request()->is('users*', 'categories*', 'units*') ? 'active' : '' }}" 
                   href="#" 
                   onclick="toggleDropdown(event, 'pengaturanDropdown')" 
                   aria-expanded="false"
                   role="button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="22" height="22" viewBox="0 0 24 24"
                         stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M10.325 4.317c.426 -1.756 2.924 -1.756 3.35 0a1.724 1.724 0 0 0 2.573 1.066
                            c1.543 -.94 3.31 .826 2.37 2.37a1.724 1.724 0 0 0 1.065 2.572c1.756 .426
                            1.756 2.924 0 3.35a1.724 1.724 0 0 0 -1.066 2.573c.94 1.543 -.826 3.31 -2.37 2.37a1.724
                            1.724 0 0 0 -2.572 1.065c-.426 1.756 -2.924 1.756 -3.35 0a1.724 1.724 0 0 0 -2.573 -1.066
                            c-1.543 .94 -3.31 -.826 -2.37 -2.37a1.724 1.724 0 0 0 -1.065 -2.572
                            c-1.756 -.426 -1.756 -2.924 0 -3.35a1.724 1.724 0 0 0 1.066 -2.573
                            c-.94 -1.543 .826 -3.31 2.37 -2.37c1 .608 2.296 .07 2.572 -1.065z"/>
                        <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0"/>
                    </svg>
                    <span>{{ __('Pengaturan') }}</span>
                </a>
                <div class="dropdown-menu" id="pengaturanDropdown">
                    <a class="dropdown-item" href="{{ route('users.index') }}">Pengguna</a>
                    <a class="dropdown-item" href="{{ route('categories.index') }}">Kategori</a>
                    <a class="dropdown-item" href="{{ route('units.index') }}">Unit</a>
                </div>
            </div> --}}
        </nav>
    </div>
    {{-- Header --}}
    @include('layouts.body.header')

    {{-- Main Content --}}
    <div class="main-content">
        <main>
            @yield('content')
        </main>

        @include('layouts.body.footer')
    </div>

    <script src="{{ asset('dist/js/tabler.min.js') }}" defer></script>
    <script>
        // Enhanced dropdown functionality
        function toggleDropdown(event, dropdownId) {
            event.preventDefault();
            
            const link = event.currentTarget;
            const dropdown = document.getElementById(dropdownId);
            const isExpanded = link.getAttribute('aria-expanded') === 'true';
            
            // Close all other dropdowns
            closeAllDropdowns(dropdownId);
            
            // Toggle current dropdown
            if (!isExpanded) {
                dropdown.classList.add('show');
                link.setAttribute('aria-expanded', 'true');
                
                // Add a small delay to ensure smooth animation
                setTimeout(() => {
                    dropdown.style.maxHeight = dropdown.scrollHeight + 'px';
                }, 10);
            } else {
                dropdown.classList.remove('show');
                link.setAttribute('aria-expanded', 'false');
                dropdown.style.maxHeight = '0px';
            }
        }

        function closeAllDropdowns(exceptId = null) {
            const allDropdowns = document.querySelectorAll('.dropdown-menu');
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

        // Mobile sidebar functionality
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            
            sidebar.classList.toggle('show');
            overlay.classList.toggle('show');
        }

        function closeSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            
            sidebar.classList.remove('show');
            overlay.classList.remove('show');
        }

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            const isDropdownToggle = event.target.closest('.has-dropdown');
            const isDropdownContent = event.target.closest('.dropdown-menu');
            
            if (!isDropdownToggle && !isDropdownContent) {
                closeAllDropdowns();
            }
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const toggle = document.querySelector('.sidebar-toggle');
            
            if (window.innerWidth <= 768) {
                if (!sidebar.contains(event.target) && !toggle.contains(event.target)) {
                    closeSidebar();
                }
            }
        });

        // Handle window resize
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                const sidebar = document.getElementById('sidebar');
                const overlay = document.getElementById('sidebarOverlay');
                
                sidebar.classList.remove('show');
                overlay.classList.remove('show');
            }
        });

        // Keyboard navigation support
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeAllDropdowns();
                
                if (window.innerWidth <= 768) {
                    closeSidebar();
                }
            }
        });

        // Initialize dropdowns on page load
        document.addEventListener('DOMContentLoaded', function() {
            // Set initial max-height for all dropdown menus
            const dropdownMenus = document.querySelectorAll('.dropdown-menu');
            dropdownMenus.forEach(menu => {
                menu.style.maxHeight = '0px';
            });

            // Auto-expand active dropdowns
            const activeLinks = document.querySelectorAll('.nav-link.active.has-dropdown');
            activeLinks.forEach(link => {
                const dropdownId = link.getAttribute('onclick').match(/toggleDropdown\(event, '(.+?)'\)/)[1];
                const dropdown = document.getElementById(dropdownId);
                
                if (dropdown) {
                    dropdown.classList.add('show');
                    link.setAttribute('aria-expanded', 'true');
                    setTimeout(() => {
                        dropdown.style.maxHeight = dropdown.scrollHeight + 'px';
                    }, 100);
                }
            });

            // Add smooth scroll behavior
            document.documentElement.style.scrollBehavior = 'smooth';
        });

        // Add loading states for better UX
        function addLoadingState(element) {
            element.style.opacity = '0.7';
            element.style.pointerEvents = 'none';
        }

        function removeLoadingState(element) {
            element.style.opacity = '1';
            element.style.pointerEvents = 'auto';
        }

        // Enhanced hover effects with throttling
        let hoverTimeout;
        document.querySelectorAll('.nav-link, .dropdown-item').forEach(item => {
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

        // Preload images for better performance
        function preloadImages() {
            const images = ['{{ asset("assets/img/backgrounds/logokominfo.png") }}'];
            images.forEach(src => {
                const img = new Image();
                img.src = src;
            });
        }

        // Initialize preloading
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', preloadImages);
        } else {
            preloadImages();
        }
    </script>
    @stack('page-scripts')
    @livewireScripts
</body>
</html>