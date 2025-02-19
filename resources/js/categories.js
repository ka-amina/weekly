// Display Create Modal
document.getElementById('create-category-toggler').addEventListener('click', function() {
    document.getElementById('create-category-popup').classList.toggle('hidden');
});

document.getElementById('creation-popup-close').addEventListener('click', function() {
    document.getElementById('create-category-popup').classList.add('hidden');
});
// Function to display the update modal
function showModal(categoryId) {
    var modal = document.getElementById("update-category-popup-" + categoryId);
    modal.classList.remove("hidden");
}

// Function to hide the update modal
function hideModal(categoryId) {
    var modal = document.getElementById("update-category-popup-" + categoryId);
    modal.classList.add("hidden");
}

// Add event listeners to edit buttons to display respective update modals
var editButtons = document.querySelectorAll(".edit-category");
editButtons.forEach(function(button) {
    button.addEventListener("click", function() {
        var categoryId = button.getAttribute("data-category-id");
        showModal(categoryId);
    });
});

// Add event listeners to close buttons to hide update modals
var closeButtons = document.querySelectorAll(".update-popup-close");
closeButtons.forEach(function(button) {
    button.addEventListener("click", function() {
        var categoryId = button.getAttribute("data-category-id");
        hideModal(categoryId);
    });
});

// Hide modal when clicking outside the update modal
window.addEventListener("click", function(event) {
    if (event.target.classList.contains("update-category-popup-container")) {
        var categoryId = event.target.getAttribute("data-category-id");
        hideModal(categoryId);
    }
});