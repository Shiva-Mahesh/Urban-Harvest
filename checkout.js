

document.addEventListener("DOMContentLoaded", loadCheckoutSummary);

function loadCheckoutSummary() {
    const subtotal = parseFloat(localStorage.getItem("subtotal")) || "0.00";
    const taxAmount = parseFloat(localStorage.getItem("taxAmount")) || "0.00";
    const grandTotal = parseFloat(localStorage.getItem("grandTotal")) || "0.00";
    const promoDiscount = parseFloat(localStorage.getItem("discount")) || "0.00";
    const totalCarbonPoints = parseFloat(localStorage.getItem("totalCarbonCredit")) || "0.00";

    
    // Set discount rules
    let discountPerPoint = 0.10;  // $0.10 discount per carbon point
    let maxDiscount = subtotal * 0.20;  // Max 20% discount on subtotal
    let discountAmount = Math.min(totalCarbonPoints * discountPerPoint, maxDiscount);
    discountAmount = discountAmount - promoDiscount;
    // Apply discount to grand total
    let finalTotal = grandTotal - discountAmount;
    console.log (subtotal, taxAmount, grandTotal, promoDiscount, finalTotal);

    document.getElementById("subtotal").textContent = `$${subtotal.toFixed(2)}`;
    document.getElementById("reward_score").textContent = `${totalCarbonPoints}`;
    document.getElementById("reward_discount").textContent = `-$${discountAmount.toFixed(2)}`;
    document.getElementById("promo_discount").textContent = `-$${promoDiscount.toFixed(2)}`;
    document.getElementById("tax").textContent = `$${taxAmount.toFixed(2)}`;
    document.getElementById("final_total").textContent = `$${finalTotal.toFixed(2)}`;
}

window.addEventListener("beforeunload", () => {
    localStorage.removeItem("cart");
    localStorage.removeItem("subtotal");
    localStorage.removeItem("taxAmount");
    localStorage.removeItem("grandTotal");
    localStorage.removeItem("totalCarbonCredit");
    localStorage.removeItem("cartCount");
});
