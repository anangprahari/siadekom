<header class="navbar navbar-expand-md d-print-none shadow-sm" style="background: linear-gradient(135deg, #005eff 0%, #0047cc 100%); height: 80px; color: white; border-bottom: 1px solid rgba(255,255,255,0.1);">
    <div class="container-fluid d-flex justify-content-between align-items-center px-4" style="height: 100%;">
        <!-- Kiri: Judul Sistem dengan Icon -->
        <div class="d-flex align-items-center">
            <div class="me-3 p-2 rounded-circle" style="background: rgba(255,255,255,0.15); backdrop-filter: blur(10px);">
                <i class="fas fa-laptop-code text-white" style="font-size: 1.5rem;"></i>
            </div>
            <div>
                <span class="fw-bold d-block" style="font-size: 1.8rem; line-height: 1.2; text-shadow: 0 2px 4px rgba(0,0,0,0.1);">
                    SIADEKOM
                </span>
                <span class="fw-normal opacity-90" style="font-size: 0.9rem; letter-spacing: 0.5px;">
                 Sistem Informasi Aset Diskominfo
                </span>
            </div>
        </div>

        <!-- Kanan: Ultra Modern Avatar Dropdown -->
        <div class="nav-item dropdown">
            <a href="#" class="nav-link text-white fw-semibold dropdown-toggle d-flex align-items-center px-3 py-2 rounded-pill position-relative" 
               data-bs-toggle="dropdown" 
               aria-expanded="false"
               style="background: rgba(255,255,255,0.1); backdrop-filter: blur(15px); border: 1px solid rgba(255,255,255,0.2); transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); text-decoration: none; box-shadow: 0 4px 15px rgba(0,0,0,0.1);"
               onmouseover="this.style.background='rgba(255,255,255,0.2)'; this.style.transform='translateY(-2px) scale(1.02)'; this.style.boxShadow='0 8px 25px rgba(0,0,0,0.15)'"
               onmouseout="this.style.background='rgba(255,255,255,0.1)'; this.style.transform='translateY(0) scale(1)'; this.style.boxShadow='0 4px 15px rgba(0,0,0,0.1)'">
                
                <!-- Ultra Modern Avatar -->
                <div class="position-relative me-3">
                    <div class="rounded-circle d-flex align-items-center justify-content-center position-relative" 
                         style="width: 45px; height: 45px; background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%); border: 3px solid rgba(255,255,255,0.3); box-shadow: 0 4px 12px rgba(0,0,0,0.15);">
                        <span class="fw-bold" style="font-size: 1.2rem; color: #005eff; text-shadow: none;">
                            {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                        </span>
                    </div>
                    <!-- Online Status Indicator -->
                    <div class="position-absolute rounded-circle" 
                         style="width: 14px; height: 14px; background: #10b981; border: 2px solid white; bottom: 2px; right: 2px; animation: pulse 2s infinite;"></div>
                </div>
                
                <!-- User Info dengan Efek Modern -->
                <div class="d-flex flex-column align-items-start">
                    <span style="font-size: 0.75rem; opacity: 0.85; line-height: 1; text-shadow: 0 1px 2px rgba(0,0,0,0.1);">Selamat Datang</span>
                    <span style="font-size: 1rem; line-height: 1.2; text-transform: capitalize; font-weight: 600; text-shadow: 0 1px 2px rgba(0,0,0,0.1);">{{ Auth::user()->name }}</span>
                </div>
                
                <!-- Animated Dropdown Arrow -->
                <i class="fas fa-chevron-down ms-3" style="font-size: 0.7rem; transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1); opacity: 0.8;"></i>
            </a>
            
            <!-- Ultra Modern Dropdown Menu -->
            <div class="dropdown-menu dropdown-menu-end border-0 shadow-lg" 
                 style="background: white; border-radius: 16px; padding: 12px; min-width: 220px; margin-top: 10px; box-shadow: 0 20px 40px rgba(0,0,0,0.1), 0 0 0 1px rgba(0,0,0,0.05); backdrop-filter: blur(10px);">
                
                <!-- Enhanced User Info Header -->
                <div class="px-3 py-3 mb-2" style="background: linear-gradient(135deg, #005eff 0%, #0047cc 100%); border-radius: 12px; color: white;">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle me-3 d-flex align-items-center justify-content-center position-relative" 
                             style="width: 40px; height: 40px; background: rgba(255,255,255,0.2); border: 2px solid rgba(255,255,255,0.3); backdrop-filter: blur(10px);">
                            <span class="fw-bold" style="font-size: 1.1rem; color: white;">
                                {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                            </span>
                            <!-- Mini online indicator -->
                            <div class="position-absolute rounded-circle" 
                                 style="width: 10px; height: 10px; background: #10b981; border: 1px solid white; bottom: 0; right: 0;"></div>
                        </div>
                        <div class="flex-grow-1">
                            <div class="fw-semibold" style="font-size: 1rem; text-transform: capitalize; opacity: 0.95;">{{ Auth::user()->name }}</div>
                            <div style="font-size: 0.8rem; opacity: 0.8;">Administrator</div>
                        </div>
                    </div>
                </div>
                
                <!-- Enhanced Menu Items -->
                <a href="{{ route('profile.edit') }}" class="dropdown-item d-flex align-items-center px-3 py-3 rounded-lg" 
                   style="transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); color: #374151; margin-bottom: 4px;"
                   onmouseover="this.style.background='linear-gradient(135deg, #005eff 0%, #0047cc 100%)'; this.style.color='white'; this.style.transform='translateX(8px) scale(1.02)'; this.style.boxShadow='0 4px 12px rgba(0, 94, 255, 0.2)'"
                   onmouseout="this.style.background='transparent'; this.style.color='#374151'; this.style.transform='translateX(0) scale(1)'; this.style.boxShadow='none'">
                    <div class="me-3 p-2 rounded-circle" style="background: rgba(0, 94, 255, 0.1); transition: all 0.3s ease;">
                        <i class="fas fa-user-cog" style="font-size: 0.9rem; color: #005eff;"></i>
                    </div>
                    <div>
                        <div style="font-weight: 500; font-size: 0.95rem;">Kelola Akun</div>
                        <div style="font-size: 0.75rem; opacity: 0.7;">Pengaturan profil</div>
                    </div>
                </a>
                
                <div class="dropdown-divider my-3" style="border-color: #e5e7eb; margin: 12px 0;"></div>
                
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="dropdown-item d-flex align-items-center px-3 py-3 rounded-lg w-100 border-0 bg-transparent text-start" 
                            style="transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); color: #dc2626;"
                            onmouseover="this.style.background='linear-gradient(135deg, #dc2626 0%, #b91c1c 100%)'; this.style.color='white'; this.style.transform='translateX(8px) scale(1.02)'; this.style.boxShadow='0 4px 12px rgba(220, 38, 38, 0.2)'"
                            onmouseout="this.style.background='transparent'; this.style.color='#dc2626'; this.style.transform='translateX(0) scale(1)'; this.style.boxShadow='none'">
                        <div class="me-3 p-2 rounded-circle" style="background: rgba(220, 38, 38, 0.1); transition: all 0.3s ease;">
                            <i class="fas fa-sign-out-alt" style="font-size: 0.9rem; color: #dc2626;"></i>
                        </div>
                        <div>
                            <div style="font-weight: 500; font-size: 0.95rem;">Keluar</div>
                            <div style="font-size: 0.75rem; opacity: 0.7;">Logout sistem</div>
                        </div>
                    </button>
                </form>
            </div>
        </div>
    </div>
</header>

<!-- Advanced Custom CSS -->
<style>
    .dropdown-toggle::after {
        display: none !important;
    }
    
    .dropdown-menu {
        animation: ultraDropdown 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    }
    
    @keyframes ultraDropdown {
        0% {
            opacity: 0;
            transform: translateY(-15px) scale(0.95);
        }
        100% {
            opacity: 1;
            transform: translateY(0) scale(1);
        }
    }
    
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
    
    .dropdown-toggle:hover .fas.fa-chevron-down {
        transform: rotate(180deg);
    }
    
    /* Enhanced glassmorphism effect */
    .dropdown-menu::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 16px;
        z-index: -1;
    }
    
    /* Avatar initial animation */
    .rounded-circle {
        animation: avatarGlow 3s ease-in-out infinite;
    }
    
    @keyframes avatarGlow {
        0%, 100% {
            box-shadow: 0 0 5px rgba(0, 94, 255, 0.3);
        }
        50% {
            box-shadow: 0 0 20px rgba(0, 94, 255, 0.6);
        }
    }
    
    /* Menu item hover enhancement */
    .dropdown-item:hover .rounded-circle {
        background: rgba(255, 255, 255, 0.2) !important;
        transform: scale(1.1);
    }
    
    .dropdown-item:hover .fas {
        color: currentColor !important;
    }
</style>