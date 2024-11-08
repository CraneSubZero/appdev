// script.js
document.addEventListener("DOMContentLoaded", function () {
    const deleteButtons = document.querySelectorAll(".delete-btn");
    const themeToggle = document.getElementById("themeToggle");

    // Apply saved theme on load
    if (localStorage.getItem("theme") === "dark") {
        document.body.classList.add("dark-mode");
        themeToggle.textContent = "Switch to Light Mode";
    } else {
        themeToggle.textContent = "Switch to Dark Mode";
    }

    // Theme toggle event listener
    themeToggle.addEventListener("click", () => {
        document.body.classList.toggle("dark-mode");
        const theme = document.body.classList.contains("dark-mode") ? "dark" : "light";
        localStorage.setItem("theme", theme);
        themeToggle.textContent = theme === "dark" ? "Switch to Light Mode" : "Switch to Dark Mode";
    });

    // Delete button confirmation
    deleteButtons.forEach(button => {
        button.addEventListener("click", function (e) {
            if (!confirm("Are you sure you want to delete this contact?")) {
                e.preventDefault();
            }
        });
    });
});