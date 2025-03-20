// Fetch and render the produce from the SQL database via API
async function fetchProduceData() {
    try {
        const response = await fetch("api/produce.php"); // Fetch data from backend
        if (!response.ok) {
            throw new Error("Network response was not ok");
        }
        const data = await response.json();
        console.log("Fetched produce data:", data); // Debugging line
        // renderProduce(data.produce); // Render all items initially
        renderProduce(data);
    } catch (error) {
        console.error("There was a problem fetching the produce data:", error);
    }
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
        img.src = item.image;
        img.classList.add("card-img-top");
        img.alt = item.name;

        const cardBody = document.createElement("div");
        cardBody.classList.add("card-body");

        const title = document.createElement("h5");
        title.classList.add("card-title");
        title.textContent = item.name;

        const farmText = document.createElement("p");
        farmText.classList.add("card-text");
        farmText.textContent = item.farm ? item.farm : "N/A";

        const priceText = document.createElement("p");
        priceText.classList.add("produce-price");
        priceText.textContent = `$${item.price.toFixed(2)}`;

        const quantityText = document.createElement("p");
        quantityText.classList.add("card-text");
        quantityText.textContent = item.quantity;

        const carbonText = document.createElement("p");
        carbonText.classList.add("card-text");
        carbonText.textContent = `Carbon Credits: ${item.carbonCredit}`;

        cardBody.appendChild(title);
        cardBody.appendChild(farmText);
        cardBody.appendChild(priceText);
        cardBody.appendChild(quantityText);
        cardBody.appendChild(carbonText);
        
        card.appendChild(img);
        card.appendChild(cardBody);
        produceCard.appendChild(card);

        const addButton = document.createElement("button");
        addButton.classList.add("add-to-cart-btn");
        addButton.textContent = "Add";

        addButton.addEventListener("mouseover", () => {
            addButton.textContent = "+ Add to Cart";
        });

        addButton.addEventListener("mouseout", () => {
            addButton.textContent = "Add";
        });

        produceCard.appendChild(addButton);
        container.appendChild(produceCard);
    });
}

// Filter produce by category
function filterProduce(category) {
    fetch(`/api/produce.php?category=${category}`)
        .then((response) => response.json())
        .then((data) => {
            renderProduce(category === "All" ? data.produce : data.produce.filter((item) => item.category === category));
        })
        .catch((error) => console.error("Error fetching filtered data:", error));
}

document.getElementById("category-select").addEventListener("change", function (event) {
    const selectedCategory = event.target.value;
    console.log("Category selected:", selectedCategory);
    filterProduce(selectedCategory);
});

fetchProduceData();
