<!-- Footer Fixed -->
<footer class="footer footer-transparent d-print-none fixed-footer">
    <div class="container-xl">
        <div class="row text-center align-items-center flex-row-reverse">
            <div class="col-lg-auto ms-lg-auto">
                <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item">
                        <a href="#" target="_blank" class="link-secondary" rel="noopener">
                            DINAS KOMUNIKASI DAN INFORMATIKA PROVINSI JAMBI
                        </a>
                    </li>
                </ul>
            </div>
            <div class="col-12 col-lg-auto mt-3 mt-lg-0">
                <ul class="list-inline list-inline-dots mb-0">
                    <li class="list-inline-item">
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="#" class="link-secondary">SIADEKOM</a>.
                        All rights reserved.
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<style>
    /* CSS untuk Footer Fixed - PERBAIKAN */
    .fixed-footer {
        position: fixed;
        bottom: 0;
        left: var(--sidebar-width);
        /* Gunakan CSS variable yang konsisten (280px) */
        right: 0;
        background-color: #ffffff;
        border-top: 1px solid #e2e8f0;
        padding: 1rem 2rem;
        z-index: 1010;
        /* Lebih rendah dari navbar (1030) dan sidebar (1020) */
        box-shadow: 0 -4px 12px rgba(0, 0, 0, 0.05);
        transition: var(--transition-smooth);
        backdrop-filter: blur(10px);
    }

    /* Responsive untuk mobile */
    @media (max-width: 768px) {
        .fixed-footer {
            left: 0;
            padding: 1rem;
        }
    }

    /* Tambahkan padding-bottom pada main-content agar tidak tertutup footer */
    .main-content {
        margin-left: var(--sidebar-width);
        padding: 0;
        transition: var(--transition-smooth);
        min-height: 100vh;
        padding-bottom: 100px;
        /* Tambahkan ini untuk ruang footer */
    }

    /* Pastikan main juga punya padding bottom */
    main {
        padding: calc(var(--header-height) + 2rem) 2rem 6rem 2rem;
        /* Ubah padding bottom dari 2rem ke 6rem */
        overflow-x: auto;
    }

    /* Mobile adjustment */
    @media (max-width: 768px) {
        main {
            padding: calc(var(--header-height) + 1rem) 1rem 6rem 1rem;
        }
    }
</style>
