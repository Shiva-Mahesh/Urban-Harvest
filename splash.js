window.onload = function() {

    if(!sessionStorage.getItem("splashShown")){
        document.getElementById("splashModal").style.visibility = "visible";
        document.getElementById("splashModal").style.opacity = "1";
    }
    
}
function closeSplash() {
    document.getElementById("splashModal").style.visibility = "hidden";
    document.getElementById("splashModal").style.opacity = "0";
    sessionStorage.setItem("splashShown", true);
}

function editProfile() {
    document.getElementById("editForm").style.display = 'block';
}

function saveProfile() {
    document.getElementById("userName").innerText = document.getElementById("editName").value;
    document.getElementById("userEmail").innerText = document.getElementById("editEmail").value;
    document.getElementById("userPhone").innerText = document.getElementById("editPhone").value;
    document.getElementById("userAddress").innerText = document.getElementById("editAddress").value;
    document.getElementById("editForm").style.display = 'none';
}
