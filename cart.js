document.addEventListener("DOMContentLoaded", function () {
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
  
    // Render cart items
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
  });