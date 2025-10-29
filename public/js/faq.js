document.addEventListener("DOMContentLoaded", function () {
    // Elements
    const faqItems = document.querySelectorAll(".faq-item");
    const categoryBtns = document.querySelectorAll(".category-btn");
    const searchInput = document.getElementById("faqSearch");

    faqItems.forEach((item) => {
        const question = item.querySelector(".faq-question");

        question.addEventListener("click", () => {
            faqItems.forEach((otherItem) => {
                if (
                    otherItem !== item &&
                    otherItem.classList.contains("active")
                ) {
                    otherItem.classList.remove("active");
                }
            });

            item.classList.toggle("active");
        });
    });

    categoryBtns.forEach((btn) => {
        btn.addEventListener("click", () => {
            categoryBtns.forEach((b) => b.classList.remove("active"));
            btn.classList.add("active");

            const category = btn.dataset.category;

            faqItems.forEach((item) => {
                if (category === "all" || item.dataset.category === category) {
                    item.style.display = "block";
                    setTimeout(() => {
                        item.style.opacity = "1";
                        item.style.transform = "translateY(0)";
                    }, 10);
                } else {
                    item.style.opacity = "0";
                    item.style.transform = "translateY(10px)";
                    setTimeout(() => {
                        item.style.display = "none";
                    }, 300);
                }
            });
        });
    });

    searchInput.addEventListener("input", function () {
        const searchTerm = this.value.toLowerCase().trim();

        faqItems.forEach((item) => {
            const question = item
                .querySelector(".faq-question h3")
                .textContent.toLowerCase();
            const answer = item
                .querySelector(".faq-answer")
                .textContent.toLowerCase();

            if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                item.style.display = "block";
                setTimeout(() => {
                    item.style.opacity = "1";
                    item.style.transform = "translateY(0)";
                }, 10);
            } else {
                item.style.opacity = "0";
                item.style.transform = "translateY(10px)";
                setTimeout(() => {
                    item.style.display = "none";
                }, 300);
            }
        });
    });

    document.addEventListener("click", function (e) {
        if (!e.target.closest(".faq-item")) {
            faqItems.forEach((item) => {
                item.classList.remove("active");
            });
        }
    });
});
