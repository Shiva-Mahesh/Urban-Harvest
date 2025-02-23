document.addEventListener("DOMContentLoaded", function () {
    const cartButtons = document.querySelectorAll(".add-to-cart");
    const cartCount = document.getElementById("cart-count");

    // Initialize cart count
    if(cartCount){
    updateCartCount();
    }

    // Event listener for add-to-cart buttons
    cartButtons.forEach(button => {
        button.addEventListener("click", function () {
            let product = {
                name: this.dataset.name,
                price: parseFloat(this.dataset.price),
                image: this.dataset.image,
                quantity: 1
            };
            addProductToCart(product);
        });
    });

    // Global function for adding items via onclick="addToCart('Organic Carrots')"
    window.addToCart = function (productName) {
        fetch("produce.json")
            .then(response => response.json())
            .then(data => {
                const product = data.produce.find(item => item.name === productName);
                if (product) {
                    let formattedProduct = {
                        name: product.name,
                        price: parseFloat(product.price),
                        image: product.image,
                        quantity: 1
                    };
                    addProductToCart(formattedProduct);
                } else {
                    console.error("Product not found:", productName);
                }
            })
            .catch(error => console.error("Error loading JSON:", error));
    };

    // Function to add a product to the cart
    function addProductToCart(product) {
        let cart = JSON.parse(localStorage.getItem("cart")) || [];

        // Check if item already exists
        let existingProduct = cart.find(item => item.name === product.name);
        if (existingProduct) {
            existingProduct.quantity += 1;
        } else {
            cart.push(product);
        }

        // Save updated cart
        localStorage.setItem("cart", JSON.stringify(cart));

        // Update cart count and animate
        if(cartCount){
        updateCartCount(true);
        }
        alert(`${product.name} added to cart!`);
    }

    // Function to update cart count
    function updateCartCount(animate = false) {
        if(!cartCount) return;
        const cart = JSON.parse(localStorage.getItem("cart")) || [];
        const totalCount = cart.reduce((total, item) => total + item.quantity, 0);

        // Update cart number display
        cartCount.textContent = totalCount;

        if (animate && totalCount > 0) {
            cartCount.classList.remove("show");
            setTimeout(() => {
                cartCount.classList.add("show");
            }, 100);
        }
    }
});
