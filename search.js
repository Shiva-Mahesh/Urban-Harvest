document.addEventListener("DOMContentLoaded", function () {
    const searchBar = document.getElementById("search-input");
    const dropdown = document.getElementById("dropdown-results");
    let collections = [];

    // Fetch JSON data
    fetch("collection.json")
        .then(response => response.json())
        .then(data => {
            collections = data;
        })
        .catch(error => console.error("Error loading JSON:", error));

    // Show dropdown on focus
    searchBar.addEventListener("focus", function () {
        updateDropdown(collections);
    });

    // Hide dropdown when clicking outside
    document.addEventListener("click", function (event) {
        if (!searchBar.contains(event.target) && !dropdown.contains(event.target)) {
            dropdown.style.display = "none";
        }
    });

    // Filter collections based on input
    searchBar.addEventListener("input", function () {
        const searchTerm = searchBar.value.toLowerCase();
        const filteredCollections = collections.filter(collection =>
            collection.name.toLowerCase().includes(searchTerm)
        );
        updateDropdown(filteredCollections);
    });

    function updateDropdown(data) {
        dropdown.innerHTML = "";
        if (data.length === 0) {
            dropdown.style.display = "none";
            return;
        }

        data.forEach(collection => {
            let item = document.createElement("a");
            item.href = `shop.html?collection=${encodeURIComponent(collection.name)}`;
            item.className = "collection-item";
            item.innerHTML = `<img src="${collection.image}" alt="${collection.name}">
                              <span>${collection.name}</span>`;
            dropdown.appendChild(item);
        });

        dropdown.style.display = "block";
    }
});
