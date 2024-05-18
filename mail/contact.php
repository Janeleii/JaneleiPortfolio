<div>
    <form id="contactForm" method="post">
        <input type="text" name="name" placeholder="Your Name" required>
        <input type="email" name="email" placeholder="Your Email" required>
        <input type="text" name="subject" placeholder="Subject" required>
        <textarea name="message" placeholder="Your Message" required></textarea>
        <button class="btn" type="submit" id="sendMessageButton">Send Message</button>
    </form>
</div>

<script>
    document.getElementById('contactForm').addEventListener('submit', function(event) {
        event.preventDefault();
        var form = this;
        // Logic to submit email
        fetch('send_email.php', {
            method: 'POST',
            body: new FormData(form)
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.text();
        })
        .then(data => {
            console.log(data); // Log the response from the server
            // Here you can handle the response as needed
            // For example, display a success message or redirect the user
            form.reset(); // Reset the form after successful submission
        })
        .catch(error => {
            console.error('There was an error!', error);
            // Here you can handle errors
            // For example, display an error message to the user
        });
    });
</script>
