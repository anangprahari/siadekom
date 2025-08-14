// Consolidated form utilities untuk digunakan di semua halaman
// Simpan file ini sebagai: public/js/shared-utilities.js

/**
 * Form utilities untuk validasi dan handling
 */
const FormUtils = {
    // Username validation
    validateUsername(input) {
        const sanitized = input.value.replace(/[^a-zA-Z0-9_]/g, "");
        if (input.value !== sanitized) {
            input.value = sanitized;
        }
    },

    // Form submission with loading state
    handleFormSubmit(form, button) {
        const originalText = button.innerHTML;
        button.disabled = true;
        button.innerHTML =
            '<i class="fas fa-spinner fa-spin me-1"></i>Menyimpan...';

        // Reset button after timeout (fallback)
        setTimeout(() => {
            button.disabled = false;
            button.innerHTML = originalText;
        }, 10000);
    },

    // Show notification
    showNotification(type, title, message, options = {}) {
        const config = {
            icon: type,
            title: title,
            text: message,
            timer: options.timer || 3000,
            timerProgressBar: true,
            showConfirmButton: false,
            toast: true,
            position: "top-end",
            ...options,
        };

        Swal.fire(config);
    },
};

/**
 * Password utilities untuk toggle visibility dan validasi
 */
const PasswordUtils = {
    // Toggle password visibility
    toggleVisibility(target) {
        const input = document.querySelector(
            `[data-password-toggle="${target}"]`
        );
        const button = document.querySelector(
            `[data-toggle-target="${target}"]`
        );

        if (input && button) {
            const icon = button.querySelector("i");

            if (input.type === "password") {
                input.type = "text";
                icon.classList.replace("fa-eye", "fa-eye-slash");
            } else {
                input.type = "password";
                icon.classList.replace("fa-eye-slash", "fa-eye");
            }
        }
    },

    // Validate password confirmation
    validateConfirmation(
        passwordId = "newPassword",
        confirmId = "confirmPassword",
        submitBtnId = null
    ) {
        const password = document.getElementById(passwordId)?.value || "";
        const confirm = document.getElementById(confirmId);
        const submitBtn = submitBtnId
            ? document.getElementById(submitBtnId)
            : null;

        if (!confirm) return;

        if (confirm.value.length > 0) {
            if (password === confirm.value) {
                confirm.classList.remove("is-invalid");
                confirm.classList.add("is-valid");
                if (submitBtn) submitBtn.disabled = false;
            } else {
                confirm.classList.remove("is-valid");
                confirm.classList.add("is-invalid");
                if (submitBtn) submitBtn.disabled = true;
            }
        } else {
            confirm.classList.remove("is-valid", "is-invalid");
            if (submitBtn) submitBtn.disabled = false;
        }
    },

    // Password strength checker
    checkStrength(password) {
        let strength = 0;
        let strengthText = "";
        let strengthClass = "";

        // Check criteria
        if (password.length >= 8) strength++;
        if (/[a-zA-Z]/.test(password)) strength++;
        if (/\d/.test(password)) strength++;
        if (/[^a-zA-Z0-9]/.test(password)) strength++;

        // Determine strength level
        if (strength < 2) {
            strengthText = "Lemah";
            strengthClass = "strength-weak";
        } else if (strength < 3) {
            strengthText = "Sedang";
            strengthClass = "strength-medium";
        } else {
            strengthText = "Kuat";
            strengthClass = "strength-strong";
        }

        return { strength, strengthText, strengthClass };
    },
};

/**
 * User actions untuk CRUD operations
 */
const UserActions = {
    // Search functionality
    initSearch(tableId = "usersTable", searchInputId = "searchInput") {
        const searchInput = document.getElementById(searchInputId);
        const table = document.getElementById(tableId);

        if (!searchInput || !table) return;

        searchInput.addEventListener("input", function () {
            const value = this.value.toLowerCase();
            const rows = table.querySelectorAll("tbody tr:not(.no-results)");
            let hasResults = false;

            rows.forEach((row) => {
                const shouldShow =
                    row.textContent.toLowerCase().indexOf(value) > -1;
                row.style.display = shouldShow ? "" : "none";
                if (shouldShow) hasResults = true;
            });

            // Remove existing no results row
            const existingNoResults = table.querySelector(".no-results");
            if (existingNoResults) {
                existingNoResults.remove();
            }

            // Add no results row if needed
            if (!hasResults && value.length > 0) {
                const noResultsRow = document.createElement("tr");
                noResultsRow.className = "no-results";
                noResultsRow.innerHTML = `
                    <td colspan="6" class="text-center py-4">
                        <div class="text-secondary">
                            <i class="fas fa-search me-2"></i>
                            Tidak ada hasil yang ditemukan untuk "<strong>${value}</strong>"
                        </div>
                    </td>
                `;
                table.querySelector("tbody").appendChild(noResultsRow);
            }
        });
    },

    // Delete confirmation
    confirmDelete(userId, userName) {
        Swal.fire({
            title: "Hapus User?",
            html: `Apakah Anda yakin ingin menghapus user <strong>${userName}</strong>?<br><small class="text-danger">Tindakan ini tidak dapat dibatalkan!</small>`,
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#6c757d",
            confirmButtonText: '<i class="fas fa-trash me-1"></i>Ya, Hapus!',
            cancelButtonText: '<i class="fas fa-times me-1"></i>Batal',
            reverseButtons: true,
            focusConfirm: false,
            focusCancel: true,
        }).then((result) => {
            if (result.isConfirmed) {
                // Show loading
                Swal.fire({
                    title: "Menghapus...",
                    text: "Sedang menghapus user, mohon tunggu.",
                    allowOutsideClick: false,
                    allowEscapeKey: false,
                    showConfirmButton: false,
                    didOpen: () => {
                        Swal.showLoading();
                    },
                });

                // Submit delete form
                const form = document.getElementById("deleteForm");
                if (form) {
                    form.action = `/users/${userId}`;
                    form.submit();
                }
            }
        });
    },
};

/**
 * User creation utilities
 */
const UserCreateUtils = {
    // Auto-generate username from name
    initUsernameGeneration(nameFieldId = "name", usernameFieldId = "username") {
        const nameField = document.getElementById(nameFieldId);
        const usernameField = document.getElementById(usernameFieldId);

        if (!nameField || !usernameField) return;

        nameField.addEventListener("input", function () {
            if (!usernameField.dataset.manualEdit) {
                let username = this.value
                    .toLowerCase()
                    .replace(/[^a-zA-Z0-9\s]/g, "")
                    .replace(/\s+/g, "_")
                    .substring(0, 20);
                usernameField.value = username;
            }
        });

        // Mark username as manually edited
        usernameField.addEventListener("keydown", function () {
            this.dataset.manualEdit = "true";
        });
    },

    // Password strength indicator
    initPasswordStrength(passwordFieldId = "password") {
        const passwordField = document.getElementById(passwordFieldId);
        if (!passwordField) return;

        passwordField.addEventListener("input", function () {
            const password = this.value;

            // Remove existing strength indicator
            const existing =
                this.parentNode.nextElementSibling?.classList?.contains(
                    "password-strength"
                );
            if (existing) {
                this.parentNode.nextElementSibling.remove();
            }

            if (password.length > 0) {
                const { strengthText, strengthClass } =
                    PasswordUtils.checkStrength(password);

                const strengthHtml = document.createElement("div");
                strengthHtml.className = "password-strength";
                strengthHtml.innerHTML = `
                    <div class="password-strength-bar ${strengthClass}"></div>
                    <small class="text-muted">Kekuatan password: <span class="fw-medium">${strengthText}</span></small>
                `;

                this.parentNode.insertAdjacentElement("afterend", strengthHtml);
            }
        });
    },
};

/**
 * Common initialization
 */
const CommonInit = {
    // Initialize tooltips
    initTooltips() {
        const tooltipTriggerList = [].slice.call(
            document.querySelectorAll('[data-bs-toggle="tooltip"]')
        );
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    },

    // Initialize all password toggles
    initPasswordToggles() {
        document.addEventListener("click", function (e) {
            if (e.target.closest("[data-toggle-target]")) {
                e.preventDefault();
                const button = e.target.closest("[data-toggle-target]");
                const target = button.getAttribute("data-toggle-target");
                PasswordUtils.toggleVisibility(target);
            }
        });
    },

    // Initialize form validation
    initFormValidation() {
        // Username validation
        document.addEventListener("input", function (e) {
            if (
                e.target.hasAttribute("data-validation") &&
                e.target.getAttribute("data-validation") === "username"
            ) {
                FormUtils.validateUsername(e.target);
            }
        });
    },
};

// Auto-initialize common features when DOM is loaded
document.addEventListener("DOMContentLoaded", function () {
    CommonInit.initTooltips();
    CommonInit.initPasswordToggles();
    CommonInit.initFormValidation();
});
