// Fetch and render the produce from the JSON file
async function fetchProduceData() {
    try {
        const response = await fetch("produce.php");
        if (!response.ok) {
            throw new Error("Network response was not ok");
        }

        const data = await response.json();
        console.log("Fetched produce data:", data);

        // Check if data is an array
        if (!Array.isArray(data)) {
            throw new Error("Expected an array but received something else");
        }

        renderProduce(data); // Directly pass the array instead of data.produce
    } catch (error) {
        console.error("There was a problem fetching the produce data:", error);
    }
}





// Function to add product to cart
function addToCart(item) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    let cartCount = localStorage.getItem("cartCount") || 0;
    cartCount = parseInt(cartCount) + 1;
    const existingItem = cart.find(cartItem => cartItem.produce_name === item.produce_name);
    if (existingItem) {
        existingItem.quantity += 1;
    } else {
        item.quantity = 1;
        cart.push(item);
    }
    localStorage.setItem("cart", JSON.stringify(cart));
    localStorage.setItem("cartCount", cartCount);
    updateCartCount(cartCount);
    alert("Added to cart!");
}

// Render produce items dynamically
function renderProduce(produceData) {
    const container = document.getElementById("produce-container");
    container.innerHTML = "";

    produceData.forEach((item) => {
        const produceCard = document.createElement("div");
        produceCard.classList.add("produce-card");

        const card = document.createElement("div");
        card.classList.add("card");

        const img = document.createElement("img");
        img.src = item.produce_image; // Updated key
        img.classList.add("card-img-top");
        img.alt = item.produce_name; // Updated key

        const cardBody = document.createElement("div");
        cardBody.classList.add("card-body");

        const title = document.createElement("h5");
        title.classList.add("card-title");
        title.textContent = item.produce_name; // Updated key

        const farmText = document.createElement("p");
        farmText.classList.add("card-text");
        farmText.textContent = item.produce_farm ? item.produce_farm : "N/A"; // Updated key

        const priceText = document.createElement("p");
        priceText.classList.add("produce-price");
        priceText.textContent = `$${parseFloat(item.produce_price).toFixed(2)}`; // Updated key

        const quantityText = document.createElement("p");
        quantityText.classList.add("card-text");
        quantityText.textContent = item.produce_quantity; // Updated key

        const carbonText = document.createElement("p");
        carbonText.classList.add("card-text");
        carbonText.textContent = `CarbonCredits:${item.produce_carbonCredit}`; // Updated key

        cardBody.append(title, farmText, priceText, quantityText, carbonText);
        card.append(img, cardBody);
        produceCard.appendChild(card);

        // Create the "Add to Cart" button
        const addButton = document.createElement("button");
        addButton.classList.add("add-to-cart-btn");
        addButton.textContent = "+ Add";
        addButton.addEventListener("mouseover", () => {
            addButton.textContent = "+ Add to Cart";
        });
        addButton.addEventListener("mouseout", () => {
            addButton.textContent = "Add";
        });
        addButton.addEventListener("click", () => addToCart(item));

        produceCard.appendChild(addButton);
        container.appendChild(produceCard);
    });
}

// Filter produce by category
function filterProduce(category) {
    fetch("produce.php")  // Ensure this is the correct source
        .then(response => response.json())
        .then(data => {
            console.log("Fetched data for filtering:", data);

            // Check if `data` is an array
            if (!Array.isArray(data)) {
                throw new Error("Expected an array but received something else");
            }

            const filteredProduce = category === "All" ? data : data.filter(item => item.produce_category === category);
            renderProduce(filteredProduce);
        })
        .catch(error => console.error("Error fetching filtered data:", error));
}


// Event listener for category selection
window.addEventListener("DOMContentLoaded", function () {
    const categorySelect = document.getElementById("category-select");
    const params = new URLSearchParams(window.location.search);
    const category = params.get("category") || "All";

    if (categorySelect) {

        categorySelect.value = category;

        categorySelect.addEventListener("change", function (event) {
            console.log("Category selected:", event.target.value);
            filterProduce(event.target.value);

            const newParams = new URLSearchParams(window.location.search);
            newParams.set("category", event.target.value);
            window.history.replaceState({}, "", `${window.location.pathname}?${newParams}`);
        });
    } else {
        console.error("Category select element not found. Make sure it exists in your HTML.");
    }

    if (category && category !== "All") {
        filterProduce(category);
    } else{ 
        fetchProduceData();
    }

    // Initial fetch
});
