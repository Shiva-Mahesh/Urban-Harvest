// document.addEventListener("DOMContentLoaded", () => {
//     let cartCount = 0;
//     const cartCountElement = document.getElementById("cart-count");

//     function addToCart(item) {
//         cartCount++;
//         cartCountElement.textContent = cartCount;
//         alert(`${item} has been added to your cart!`);
//     }

//     window.addToCart = addToCart;
// });

window.onload = function() {
    //Shopping Cart functionality
    const cartItemsContainer = document.getElementById("cart-items");
    const subtotalElement = document.getElementById("subtotal");
    const taxElement = document.getElementById("tax");
    const totalElement = document.getElementById("total");

    // Example cart data (replace with data from localStorage or backend)
    let cart = [
        {
          id: 1,
          name: "Tomato",
          price: 2.5,
          image: "images/Tomato.jpg",
          quantity: 2,
        },
        {
          id: 2,
          name: "Blueberries",
          price: 5.0,
          image: "images/Blueberries.jpg",
          quantity: 1,
        },
      ];

      function renderCart() {
        cartItemsContainer.innerHTML = "";
        let subtotal = 0;
    
        cart.forEach((item) => {
          const cartItem = document.createElement("div");
          cartItem.className = "cart-item";
    
          const itemTotal = item.price * item.quantity;
          subtotal += itemTotal;
    
          cartItem.innerHTML = `
            <img src="${item.image}" alt="${item.name}">
            <div class="cart-item-details">
              <h4>${item.name}</h4>
              <p>Price: $${item.price.toFixed(2)}</p>
              <div class="cart-item-controls">
                <input type="number" value="${item.quantity}" min="1" data-id="${item.id}">
                <button class="remove-item" data-id="${item.id}">Remove</button>
              </div>
            </div>
            <p>$${itemTotal.toFixed(2)}</p>
          `;
    
          cartItemsContainer.appendChild(cartItem);
        });
    
        // Calculate totals
        const tax = subtotal * 0.1; // 10% tax
        const total = subtotal + tax;
    
        subtotalElement.textContent = `$${subtotal.toFixed(2)}`;
        taxElement.textContent = `$${tax.toFixed(2)}`;
        totalElement.textContent = `$${total.toFixed(2)}`;
      }
    
      // Event listener for quantity changes
      cartItemsContainer.addEventListener("change", function (event) {
        if (event.target.tagName === "INPUT") {
          const itemId = parseInt(event.target.getAttribute("data-id"));
          const newQuantity = parseInt(event.target.value);
    
          const item = cart.find((item) => item.id === itemId);
          if (item) {
            item.quantity = newQuantity;
            renderCart();
          }
        }
      });
    
      // Event listener for remove item
      cartItemsContainer.addEventListener("click", function (event) {
        if (event.target.classList.contains("remove-item")) {
          const itemId = parseInt(event.target.getAttribute("data-id"));
          cart = cart.filter((item) => item.id !== itemId);
          renderCart();
        }
      });
    
      // Initial render
      renderCart();

      
};

//PROMOTIONS PAGE FUNCTIONALIYT

async function fetchProduceData() {
  try {
    const response = await fetch("producePromotions.json");
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
  // container.innerHTML = "";

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

    // Create the discount element and assign the produce-discount class
    const priceDiscount = document.createElement("p");
    priceDiscount.classList.add("produce-discount");
    priceText.textContent = `SAVE ${item.discount *100} %`;

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
    cardBody.appendChild(priceDiscount);

    // Append the image and card body to the card
    card.appendChild(img);
    card.appendChild(cardBody);

    // Append the card to the produce card
    produceCard.appendChild(card);

    // Create the "Add to Cart" button dynamically
    const addButton = document.createElement("button");
    addButton.classList.add("add-to-cart-btn-promotions");
    addButton.textContent = "+Add";
// Add item data as a data attribute (we'll pass the item object when the button is clicked)
addButton.dataset.item = JSON.stringify(item);
    // Change text on hover
addButton.addEventListener("mouseover", () => {
  addButton.textContent = "+ Add to Cart"; // Change text when hovered
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

// Initial fetch and render
fetchProduceData();

//Modal


