document.addEventListener("DOMContentLoaded", function () {
    const hamburger = document.getElementById("hamburger-menu");
    const navbarNav = document.querySelector(".navbar-nav");
    const navbarHeader = document.querySelector(".navbar");

    // Fungsi untuk mendapatkan tinggi navbar dinamis
    function getNavbarHeight() {
        return navbarHeader.offsetHeight;
    }

    // Toggle menu mobile
    hamburger.addEventListener("click", function (e) {
        e.stopPropagation();
        this.classList.toggle("active");
        navbarNav.classList.toggle("active");

        // Set top position of navbar-nav based on actual navbar height
        navbarNav.style.top = `${getNavbarHeight()}px`;

        // Mencegah body scroll saat menu terbuka
        document.body.style.overflow = navbarNav.classList.contains("active")
            ? "hidden"
            : "";
    });

    // Menangani klik dropdown di mobile
    const dropdownToggles = document.querySelectorAll(
        ".navbar-nav .dropdown-toggle"
    );

    dropdownToggles.forEach((toggle) => {
        toggle.addEventListener("click", function (e) {
            // Hanya aktifkan di tampilan mobile (lebar di bawah 992px)
            if (window.innerWidth <= 991) {
                // Menyesuaikan breakpoint dengan CSS
                e.preventDefault();
                const parentDropdown = this.parentElement;

                // Tutup dropdown lain yang mungkin terbuka, kecuali yang sedang di-klik
                document
                    .querySelectorAll(".navbar-nav .dropdown")
                    .forEach((d) => {
                        if (d !== parentDropdown) {
                            d.classList.remove("active");
                        }
                    });

                // Buka/tutup dropdown yang di-klik
                parentDropdown.classList.toggle("active");
            }
        });
    });

    // Menutup menu saat klik di luar area nav
    document.addEventListener("click", function (e) {
        if (
            !hamburger.contains(e.target) &&
            !navbarNav.contains(e.target) &&
            navbarNav.classList.contains("active")
        ) {
            hamburger.classList.remove("active");
            navbarNav.classList.remove("active");
            document.body.style.overflow = "";
            // Tutup semua dropdown saat menu utama ditutup
            document
                .querySelectorAll(".navbar-nav .dropdown")
                .forEach((d) => d.classList.remove("active"));
        }
    });

    // Reset saat resize ke desktop
    let resizeTimer;
    window.addEventListener("resize", () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            if (window.innerWidth > 991) {
                // Menyesuaikan breakpoint dengan CSS
                hamburger.classList.remove("active");
                navbarNav.classList.remove("active");
                document.body.style.overflow = "";
                document
                    .querySelectorAll(".navbar-nav .dropdown")
                    .forEach((d) => d.classList.remove("active"));
                navbarNav.style.top = ""; // Reset top position
            } else if (navbarNav.classList.contains("active")) {
                // Adjust top position if menu is open on resize within mobile breakpoint
                navbarNav.style.top = `${getNavbarHeight()}px`;
            }
        }, 250);
    });
});
