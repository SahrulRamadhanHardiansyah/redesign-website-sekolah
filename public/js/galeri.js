document.addEventListener("DOMContentLoaded", function () {
    // 1. Inisialisasi & Konfigurasi
    let currentPage = 1;
    let itemsPerPage = getItemsPerPage(); // Dapatkan nilai dinamis saat pertama kali dimuat

    const allCards = Array.from(document.querySelectorAll(".gallery-card"));
    const searchInput = document.getElementById("gallery-search");
    const filterButtons = document.querySelectorAll(".filter-btn");
    const paginationContainer = document.querySelector(".pagination-container");

    // PERBAIKAN: Fungsi untuk menentukan item per halaman berdasarkan lebar layar
    function getItemsPerPage() {
        if (window.innerWidth <= 767) {
            // Breakpoint mobile (sama seperti di CSS Anda)
            return 8; // Hanya 8 gambar untuk mobile
        } else {
            return 12; // 12 gambar untuk tablet dan desktop
        }
    }

    // Fungsi utama untuk menampilkan semua perubahan
    function renderGallery() {
        // A. Tentukan item mana yang akan ditampilkan berdasarkan filter & pencarian
        const activeFilter = document
            .querySelector(".filter-btn.active")
            .getAttribute("data-filter");
        const searchTerm = searchInput.value.toLowerCase();

        const filteredCards = allCards.filter((card) => {
            const cardCategory = card.getAttribute("data-category");
            const titleElement = card.querySelector(".overlay-title");
            const cardTitle = titleElement
                ? titleElement.textContent.toLowerCase()
                : "";

            const matchesFilter =
                activeFilter === "all" || cardCategory === activeFilter;
            const matchesSearch = cardTitle.includes(searchTerm);

            return matchesFilter && matchesSearch;
        });

        // Sembunyikan semua kartu terlebih dahulu
        allCards.forEach((card) => (card.style.display = "none"));

        // B. Atur Paginasi
        setupPagination(filteredCards);

        // C. Tampilkan kartu untuk halaman saat ini
        displayPage(filteredCards);
    }

    // 2. Fungsi untuk menampilkan halaman tertentu
    function displayPage(items) {
        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;
        const pageItems = items.slice(startIndex, endIndex);

        pageItems.forEach((item) => {
            item.style.display = "block";
        });
    }

    // 3. Fungsi untuk membuat tombol-tombol paginasi
    function setupPagination(items) {
        paginationContainer.innerHTML = ""; // Kosongkan kontainer
        const pageCount = Math.ceil(items.length / itemsPerPage);

        // Hanya tampilkan paginasi jika lebih dari 1 halaman
        if (pageCount > 1) {
            for (let i = 1; i <= pageCount; i++) {
                const btn = document.createElement("button");
                btn.classList.add("pagination-btn");
                btn.innerText = i;
                if (i === currentPage) {
                    btn.classList.add("active");
                }

                btn.addEventListener("click", () => {
                    currentPage = i;
                    renderGallery();
                });

                paginationContainer.appendChild(btn);
            }
        }
    }

    // 4. Event Listeners untuk Filter dan Pencarian
    filterButtons.forEach((button) => {
        button.addEventListener("click", () => {
            filterButtons.forEach((btn) => btn.classList.remove("active"));
            button.classList.add("active");
            currentPage = 1;
            renderGallery();
        });
    });

    searchInput.addEventListener("keyup", () => {
        currentPage = 1;
        renderGallery();
    });

    // PERBAIKAN: Event Listener untuk window resize
    let resizeTimer;
    window.addEventListener("resize", () => {
        clearTimeout(resizeTimer);
        resizeTimer = setTimeout(() => {
            const newItemsPerPage = getItemsPerPage();
            // Hanya render ulang jika jumlah item per halaman berubah
            if (newItemsPerPage !== itemsPerPage) {
                itemsPerPage = newItemsPerPage;
                currentPage = 1; // Kembali ke halaman pertama setelah resize
                renderGallery();
            }
        }, 250); // Debounce untuk performa
    });

    // 5. Render pertama kali saat halaman dimuat
    renderGallery();

    // Opsi untuk Lightbox2 (opsional)
    if (typeof lightbox !== "undefined") {
        lightbox.option({
            resizeDuration: 200,
            wrapAround: true,
            disableScrolling: true,
        });
    }
});
