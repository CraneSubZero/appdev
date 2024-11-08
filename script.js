// script.js
document.addEventListener("DOMContentLoaded", function () {
    const deleteButtons = document.querySelectorAll(".delete-btn");

    deleteButtons.forEach(button => {
        button.addEventListener("click", function (e) {
            if (!confirm("Are you sure you want to delete this contact?")) {
                e.preventDefault();
            }
        });
    });
});