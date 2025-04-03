document.addEventListener("DOMContentLoaded", loadCart);

function loadCart() {
    const cartContainer = document.getElementById("cart-container");
    const cart = JSON.parse(localStorage.getItem("cart")) || [];

    cartContainer.innerHTML = ""; // Clear previous content

    if (cart.length === 0) {
        cartContainer.innerHTML = "<p>Your cart is empty.</p>";
        return;
    }

    cart.forEach((item, index) => {
        const cartItem = document.createElement("div");
        cartItem.classList.add("cart-item");

        const img = document.createElement("img");
        img.src = item.produce_image;
        img.alt = item.produce_name;
        img.classList.add("cart-img");

        const details = document.createElement("div");
        details.classList.add("cart-details");

        const name = document.createElement("h5");
        name.textContent = item.produce_name;

        const price = document.createElement("p");
        price.textContent = `Price: $${parseFloat(item.produce_price).toFixed(2)}`;

        const item_discount = document.createElement("p");
        item_discount.textContent = `Discount: ${item.discount}`;

        const quantity = document.createElement("input");
        quantity.type = "number";
        quantity.value = item.quantity;
        quantity.min = 1;
        quantity.classList.add("cart-quantity");
        quantity.addEventListener("change", () => updateQuantity(index, quantity.value));

        const total = document.createElement("p");
        total.classList.add("cart-total");
        const tempDiscount = (item.quantity * parseFloat(item.produce_price).toFixed(2))- (parseFloat(item.discount) * item.quantity);
        // total.textContent = `Total: <del>$${((item.quantity * parseFloat(item.produce_price)).toFixed(2))}</del> ${tempDiscount} `;
        if(parseFloat(item.discount) > 0 ){
            total.innerHTML = `Total: <del>$${(item.quantity * parseFloat(item.produce_price)).toFixed(2)}</del> ${tempDiscount}`;
        }
        else{
            total.innerHTML = `Total: $${(item.quantity * parseFloat(item.produce_price)).toFixed(2)}`;
        }


        const carbonText = document.createElement("p");
        carbonText.classList.add("cart-credit");
        carbonText.textContent = `Carbon Credit: ${item.produce_carbonCredit}`;

        const removeBtn = document.createElement("button");
        removeBtn.textContent = "Remove";
        removeBtn.classList.add("remove-btn");
        removeBtn.addEventListener("click", () => removeFromCart(index));

        if(parseFloat(item.discount) > 0 ){

        details.append(name, price, item_discount, quantity, total, carbonText, removeBtn);
        }
        else{
            details.append(name, price, quantity, total, carbonText, removeBtn);
        }
        cartItem.append(img, details);
        cartContainer.appendChild(cartItem);
    });

    updateCartSummary();
}

function updateQuantity(index, newQuantity) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    cart[index].quantity = parseInt(newQuantity);
    localStorage.setItem("cart", JSON.stringify(cart));
    loadCart();
}

function removeFromCart(index) {
    let cart = JSON.parse(localStorage.getItem("cart")) || [];
    cart.splice(index, 1);
    localStorage.setItem("cart", JSON.stringify(cart));
    loadCart();
}

function updateCartSummary() {
    const cart = JSON.parse(localStorage.getItem("cart")) || [];
    const totalAmount = cart.reduce((sum, item) => sum + item.quantity * parseFloat(item.produce_price), 0);
    const taxRate = 0.05;
    const totalCarbonCredit = cart.reduce((sum, item) => sum + (item.produce_carbonCredit * item.quantity), 0);
    const discount = cart.reduce((sum, item) => sum + parseFloat(item.discount), 0);

    // console.log("Discount",discount.toFixed(2));



    let taxAmount = totalAmount * taxRate;
    let grandTotal = totalAmount + taxAmount;

    console.log("Updating cart summary:", totalAmount, taxAmount, grandTotal); // Debugging

    document.getElementById("subtotal").textContent = `$${totalAmount.toFixed(2)}`;
    document.getElementById("tax").textContent = `$${taxAmount.toFixed(2)}`;
    document.getElementById("total").textContent = `$${grandTotal.toFixed(2)}`;
    document.getElementById("discount").textContent = `-$${discount.toFixed(2)}`;
    document.getElementById("totalCarbonCredit").textContent = `${totalCarbonCredit}`;

    localStorage.setItem("subtotal", String(totalAmount.toFixed(2)));
    localStorage.setItem("taxAmount", String(taxAmount.toFixed(2)));
    localStorage.setItem("grandTotal", String(grandTotal.toFixed(2)));
    localStorage.setItem("discount", String(discount.toFixed(2)));
    localStorage.setItem("totalCarbonCredit", String(totalCarbonCredit));
}




