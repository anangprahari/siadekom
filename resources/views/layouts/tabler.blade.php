<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/>
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/backgrounds/logokominfo.png') }}" />

    <!-- CSS files - URUTAN PENTING -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="{{ asset('dist/css/tabler.min.css') }}" rel="stylesheet"/>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    
    <style>
        @import url('https://rsms.me/inter/inter.css');
        
        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
            --sidebar-width: 220px;
            --header-height: 80px;
            --content-padding: 1.5rem;
            --sidebar-bg: #ffffff;
            --sidebar-border: #e5e7eb;
            --main-bg: #f8fafc;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
            font-family: var(--tblr-font-sans-serif);
            font-feature-settings: "cv03", "cv04", "cv11";
            background-color: var(--main-bg);
            line-height: 1.6;
        }

        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            background-color: var(--sidebar-bg);
            border-right: 1px solid var(--sidebar-border);
            z-index: 1030;
            overflow-y: auto;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            transition: var(--transition);
        }

        /* Loading spinner position */
        .dropdown-item {
            position: relative;
        }
        
        .loading {
            position: absolute;
            right: 15px;
            top: 40px;
            z-index: 10;
            display: none;
        }

        /* Auto-filled field styling */
        .auto-filled {
            background-color: #f0f9ff !important;
            border-color: #0891b2 !important;
        }

        /* Fade animation */
        .fade-in {
            animation: fadeIn 0.4s ease-in;
        }

        @keyframes fadeIn {
            from { 
                opacity: 0; 
                transform: translateY(15px); 
            }
            to { 
                opacity: 1; 
                transform: translateY(0); 
            }
        }

        /* Rest of your existing styles... */
    </style>

    @stack('page-styles')
    {{-- @livewireStyles --}}
</head>
<body>
    {{-- Mobile Toggle Button --}}
    <button class="mobile-toggle" onclick="toggleSidebar()" aria-label="Toggle menu">
        <i class="fas fa-bars"></i>
    </button>

    {{-- Mobile Overlay --}}
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>

    {{-- Sidebar --}}
    <div class="sidebar" id="sidebar">
        @include('layouts.body.navbar')
        @yield('sidebar')
    </div>

    {{-- Header --}}
    @include('layouts.body.header')

    {{-- Main Content --}}
    <div class="main-content">
        <main>
            <div class="content-wrapper">
                @yield('content')
            </div>
        </main>

        @include('layouts.body.footer')
    </div>

    <!-- Scripts - URUTAN SANGAT PENTING -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('dist/js/tabler.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        console.log('Layout script starting...');
        
        // Mobile sidebar functionality
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            
            if (sidebar && overlay) {
                sidebar.classList.toggle('show');
                overlay.classList.toggle('show');
                document.body.style.overflow = sidebar.classList.contains('show') ? 'hidden' : '';
            }
        }

        function closeSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebarOverlay');
            
            if (sidebar && overlay) {
                sidebar.classList.remove('show');
                overlay.classList.remove('show');
                document.body.style.overflow = '';
            }
        }

        // Initialize when DOM is ready
        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM loaded, initializing...');
            
            // Mobile sidebar events
            document.addEventListener('click', function(event) {
                const sidebar = document.getElementById('sidebar');
                const toggle = document.querySelector('.mobile-toggle');
                
                if (window.innerWidth <= 768 && sidebar && toggle) {
                    if (!sidebar.contains(event.target) && !toggle.contains(event.target)) {
                        closeSidebar();
                    }
                }
            });

            // Window resize handler
            window.addEventListener('resize', function() {
                if (window.innerWidth > 768) {
                    closeSidebar();
                }
            });

            // Keyboard handler
            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape') {
                    closeSidebar();
                }
            });

            console.log('Layout initialized successfully');
        });

        // Helper function to get CSRF token for AJAX requests
        function getCSRFToken() {
            return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        }

        // Debug helper
        window.debugLayout = function() {
            console.log('=== LAYOUT DEBUG ===');
            console.log('Bootstrap loaded:', typeof bootstrap !== 'undefined');
            console.log('jQuery loaded:', typeof $ !== 'undefined');
            console.log('SweetAlert2 loaded:', typeof Swal !== 'undefined');
            console.log('Sidebar element:', document.getElementById('sidebar'));
            console.log('CSRF Token:', getCSRFToken());
        };
    </script>

    @stack('page-scripts')
    @stack('scripts')
    {{-- @livewireScripts --}}
</body>
</html>