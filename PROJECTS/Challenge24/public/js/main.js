document.addEventListener("DOMContentLoaded", (event) => {
    document.querySelectorAll(".card").forEach((card) => {
        const adminControls = card.querySelector(".card-footer.admin-controls");
        card.addEventListener("mouseenter", () => {
            if (adminControls) {
                adminControls.style.display = "block";
                adminControls.style.display = "flex";
                adminControls.style.alignItems = "flex-end";
                adminControls.style.justifyContent = "center";

                const buttons = adminControls.querySelectorAll("button");
                buttons.forEach((button) => {
                    button.style.marginRight = "10px";
                });
            }
        });
        card.addEventListener("mouseleave", () => {
            if (adminControls) {
                adminControls.style.display = "none";
            }
        });
    });
});

document.addEventListener("DOMContentLoaded", function (event) {
    document.querySelectorAll(".flip-button").forEach(function (button) {
        button.addEventListener("click", function (e) {
            e.preventDefault();
            var flipContainer = this.closest(".flip-container");
            if (flipContainer) {
                flipContainer.classList.toggle("hover");
            }
        });
    });
});
