document.addEventListener("DOMContentLoaded", function () {
    const sidebarToggle = document.getElementById("sidebar-toggle");
    const sidebar = document.getElementById("sidebar");

    if (sidebarToggle && sidebar) {
        sidebarToggle.addEventListener("click", () => {
            sidebar.classList.toggle("active");
        });
    }
});
