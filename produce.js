// Fetch and render the produce from the JSON file
async function fetchProduceData() {
    try {
      // const response = await fetch("produce.json");
      const response = await fetch("/api/produce.php"); // Fetch data from backend
      if (!response.ok) {
        throw new Error("Network response was not ok");
      }
      const data = await response.json();
      console.log("Fetched produce data:", data); // Debugging line
      renderProduce(data.produce); // Render all items initially
    } catch (error) {
      console.error("There was a problem fetching the produce data:", error);
    }
  }
  
  // Render produce items dynamically
  function renderProduce(produceData) {
    const container = document.getElementById("produce-container");
  
    // Clear existing content before rendering new items
    container.innerHTML = "";
  
    // Loop through each item and create the HTML structure
    produceData.forEach((item) => {
      const produceCard = document.createElement("div");
      produceCard.classList.add("produce-card");
  
      // Create the card div and assign the class
      const card = document.createElement("div");
      card.classList.add("card");
  
      // Create the image element and assign classes
      const img = document.createElement("img");
      img.src = item.image;
      img.classList.add("card-img-top");
      img.alt = item.name;
  
      // Create the card body div and assign the class
      const cardBody = document.createElement("div");
      cardBody.classList.add("card-body");
  
      // Create the title and assign the class
      const title = document.createElement("h5");
      title.classList.add("card-title");
      title.textContent = item.name;
  
      // Create the farm info and assign the class
      const farmText = document.createElement("p");
      farmText.classList.add("card-text");
      farmText.textContent = `${item.farm ? item.farm : "N/A"}`;
  
      // Create the price element and assign the produce-price class
      const priceText = document.createElement("p");
      priceText.classList.add("produce-price");
      priceText.textContent = `$${item.price.toFixed(2)}`;
  
      // Create the quantity element
      const quantityText = document.createElement("p");
      quantityText.classList.add("card-text");
      quantityText.textContent = `${item.quantity}`;
  
      // Create the carbon credits element
      const carbonText = document.createElement("p");
      carbonText.classList.add("card-text");
      carbonText.textContent = `Carbon Credits: ${item.carbonCredit}`;
  
      // Append the child elements to the card body
      cardBody.appendChild(title);
      cardBody.appendChild(farmText);
      cardBody.appendChild(priceText);
      cardBody.appendChild(quantityText);
      cardBody.appendChild(carbonText);
  
      // Append the image and card body to the card
      card.appendChild(img);
      card.appendChild(cardBody);
  
      // Append the card to the produce card
      produceCard.appendChild(card);
  
      // Create the "Add to Cart" button dynamically
      const addButton = document.createElement("button");
      addButton.classList.add("add-to-cart-btn");
      addButton.textContent = "+ Add";
  
     
  
      // Change text on hover
  addButton.addEventListener("mouseover", () => {
    addButton.textContent = "+ Add to Cart"; // Change text when hovered
  
    ;
  });
  
  addButton.addEventListener("mouseout", () => {
    addButton.textContent = "Add"// Change back to "Add" when hover ends
  });
  
  
      // Append the button to the produce card
      produceCard.appendChild(addButton);
      
  
      // Append the produce card to the container
      container.appendChild(produceCard);
    });
  }
  
  
  // Filter produce by category
  function filterProduce(category) {
    fetch("produce.json")
      .then((response) => response.json())
      .then((data) => {
        // Filter items by selected category
        const filteredProduce =
          category === "All"
            ? data.produce
            : data.produce.filter((item) => item.category === category);
  
        // Find the produce container and clear existing content
        const container = document.getElementById("produce-container");
        container.innerHTML = ""; // Clear existing items before rendering new ones
  
        // Render the filtered produce items
        renderProduce(filteredProduce);
      })
      .catch((error) => console.error("Error fetching filtered data:", error));
  }
  
  // Event listener for category selection (e.g., dropdown filter)
  document
    .getElementById("category-select")
    .addEventListener("change", function (event) {
      const selectedCategory = event.target.value;
      console.log("Category selected:", selectedCategory); // Debugging line
      filterProduce(selectedCategory); // Call filter function when category changes
    });
  
  // Initial fetch and render
  fetchProduceData();
  
  document.addEventListener("DOMContentLoaded", function () {
    fetch("produce.json") // Load JSON data
        .then(response => response.json())
        .then(data => {
            window.produceData = data.produce; 

            // Get category from URL
            const urlParams = new URLSearchParams(window.location.search);
            const category = urlParams.get("category") || "All"; // Default to "All"

            filterProduce(category);
        })
        .catch(error => console.error("Error loading JSON:", error));
});
