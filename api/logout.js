document.addEventListener("DOMContentLoaded", function () {
    let logoutBtn = document.getElementById("logoutBtn");
    
    if (logoutBtn) {
        logoutBtn.addEventListener("click", function (e) {
            e.preventDefault(); // Prevent default link behavior

            fetch("logout.php", {
                method: "POST",
                headers: { "Content-Type": "application/json" },
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === "success") {
                    alert(data.message);
                    window.location.href = "index.php"; // Redirect to homepage
                }
            })
            .catch(error => console.error("Error:", error));
        });
    }
});
