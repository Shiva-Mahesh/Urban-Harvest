document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector('form');

    form.addEventListener('submit', async (event) => {
        event.preventDefault();

        // Collect form data
        const formData = new FormData(form);

        try {
            const response = await fetch('new_register.php', {
                method: 'POST',
                body: formData
            });

            if (response.redirected) {
               
                window.location.href = response.url;
                return;
            }

            const result = await response.json();

            if (result.success) {
                alert('Registration successful!');
                console.log('Registration successful');
                window.location.href = 'success.html'; 
                
            } else {
                alert(`Error: ${result.message}`);
                console.log(`Error: ${result.message}`);
                form.reset();
            }
        } catch (error) {
            console.error('Error:', error);
            alert('An error occurred while registering.');
        }
    });
});
