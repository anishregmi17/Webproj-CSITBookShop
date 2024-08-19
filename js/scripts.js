// scripts.js
$(document).ready(function () {
    $('.delete-btn').on('click', function (e) {
        if (!confirm('Are you sure you want to delete this book?')) {
            e.preventDefault();
        }
    });
});
