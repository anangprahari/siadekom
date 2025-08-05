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
                        Copyright &copy; <script>document.write(new Date().getFullYear())</script>
                        <a href="#" class="link-secondary">SIADEKOM</a>.
                        All rights reserved.
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<style>
/* CSS untuk Footer Fixed */
.fixed-footer {
    position: fixed;
    bottom: 0;
    left: 200px; /* Sesuaikan dengan lebar sidebar */
    right: 0;
    background-color: #ffffff;
    border-top: 1px solid #ddd;
    padding: 1rem;
    z-index: 1020;
    box-shadow: 0 -2px 4px rgba(0,0,0,0.1);
}

/* Responsive untuk mobile */
@media (max-width: 768px) {
    .fixed-footer {
        left: 0;
    }
}

/* Tambahkan padding-bottom pada body agar konten tidak tertutup footer */
body {
    padding-bottom: 80px;
}
</style>