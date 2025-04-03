let cartTotal = 0;
let cartItems = [];



// Fetch and render the produce from the PHP endpoint (fetch_products.php)
async function fetchProduceData() {
  try {
    // Fetch data from the PHP endpoint (fetch_products.php)
    const response = await fetch("produce.php");
    if (!response.ok) {
      throw new Error("Network response was not ok");
    }
    const data = await response.json();
    console.log("Fetched produce data:", data); // Debugging line

    // Render all items initially
    renderProduce(data); // Pass the data directly (since it's now coming from the database)
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
    img.src = item.produce_image;  // Assuming the image field is stored in your database
    img.classList.add("card-img-top");
    img.alt = item.produce_name;

    // Create the card body div and assign the class
    const cardBody = document.createElement("div");
    cardBody.classList.add("card-body");

    // Create the title and assign the class
    const title = document.createElement("h5");
    title.classList.add("card-title");
    title.textContent = item.produce_name;

    // Create the farm info and assign the class
    const farmText = document.createElement("p");
    farmText.classList.add("card-text");
    farmText.textContent = `${item.produce_farm ? item.produce_farm : "N/A"}`;

    // Create the price element and assign the produce-price class
    const priceText = document.createElement("p");
    priceText.classList.add("produce-price");
    priceText.textContent = `$${item.produce_price}`;

    // Create the quantity element
    const quantityText = document.createElement("p");
    quantityText.classList.add("card-text");
    quantityText.textContent = `${item.produce_quantity}`;

    // Create the carbon credits element
    const carbonText = document.createElement("p");
    carbonText.classList.add("card-text");
    carbonText.textContent = `Carbon Credits: ${item.produce_carbonCredit}`;

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
    });

    addButton.addEventListener("mouseout", () => {
      addButton.textContent = "Add"; // Change back to "Add" when hover ends
    });

    // Append the button to the produce card
    produceCard.appendChild(addButton);

    // Append the produce card to the container
    container.appendChild(produceCard);
  });
}

// Filter produce by category
function filterProduce(category) {
  fetch("produce.php")  // Fetch from the PHP endpoint now
    .then((response) => response.json())
    .then((data) => {
      // Filter items by selected category
      const filteredProduce =
        category === "All"
          ? data  // Now using the entire array returned from the database
          : data.filter((item) => item.category === category);  // Ensure your DB has a 'category' field

      // Find the produce container and clear existing content
      const container = document.getElementById("produce-container");
      container.innerHTML = ""; // Clear existing items before rendering new ones

      // Render the filtered produce items
      renderProduce(filteredProduce);
    })
    .catch((error) => console.error("Error fetching filtered data:", error));
}



function loadCart() {
  var storedTotal = localStorage.getItem('cartTotal');
  var storedItems = localStorage.getItem('cartItems');

  if (!storedTotal || !storedItems){
      storedTotal = 0;
      storedItems = [];
      localStorage.setItem('cartTotal', 0);
      localStorage.setItem('cartItems', JSON.stringify(storedItems));
  }    
}


//ADD TO CART FUNCTIONALITY


// Add an item to the cart when the "Add to Cart" button is clicked

function addToCart(event) {
  const button = event.target;
  const produceCard = button.closest('.card');
  const priceElement = produceCard.querySelector('.produce-price');
  const price = parseFloat(priceElement.innerText);
  const title = produceCard.querySelector('.card-title').innerText;
  const image = produceCard.querySelector('.card-img-top').src;

  var cartTotal = parseFloat(localStorage.getItem('cartTotal'));
  const cartItems = JSON.parse(localStorage.getItem('cartItems')); 
  
  cartTotal += price;
  cartItems.push({ title, price,image });

  localStorage.setItem('cartTotal', cartTotal.toFixed(2));
  localStorage.setItem('cartItems', JSON.stringify(cartItems));
  //document.getElementById('cart-total').innerText = cartTotal.toFixed(2);
  alert("Item added successfully");
}


window.onload = function() {



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
loadCart();

const buttons = document.querySelectorAll('.add-to-cart-btn');
    buttons.forEach(button => {
        button.addEventListener('click', addToCart);
    });

  //Shopping Cart functionality
  const cartItemsContainer = document.getElementById("cart-items");
  const subtotalElement = document.getElementById("subtotal");
  const taxElement = document.getElementById("tax");
  const totalElement = document.getElementById("total");

  // Example cart data (replace with data from localStorage or backend)

  var subtotal = parseFloat(localStorage.getItem('cartTotal'));
  const cart = JSON.parse(localStorage.getItem('cartItems'));
  // let cart = [
  //     {
  //       id: 1,
  //       name: "Tomato",
  //       price: 2.5,
  //       image: "images/Tomato.jpg",
  //       quantity: 2,
  //     },
  //     {
  //       id: 2,
  //       name: "Blueberries",
  //       price: 5.0,
  //       image: "images/Blueberries.jpg",
  //       quantity: 1,
  //     },
  //   ];

    function renderCart() {
      cartItemsContainer.innerHTML = "";
      // let subtotal = 0;
  
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












