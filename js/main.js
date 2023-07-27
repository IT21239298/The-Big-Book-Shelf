// Find search bar
const searchInput = document.getElementById('search-input');

searchInput.addEventListener('keypress', function(event) {
    // Enter key pressed?
    if (event.key === "Enter") {
        const searchText = event.target.value;

        // Search text is not empty?
        if (searchText && searchText.length > 0) {
            // Go to search.php with search text as query parameter
            window.location = 'search.php?q=' + searchText;
        }
    }
});