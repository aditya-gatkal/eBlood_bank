<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="style.css"> <!-- Link your CSS -->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
            margin-top: 50px;
        }

        h2 {
            text-align: center;
            color: #c62828;
            margin-bottom: 20px;
        }

        .contact-info {
            text-align: center;
            margin-bottom: 20px;
        }

        .contact-info p {
            font-size: 16px;
        }

        .contact-info i {
            color: #c62828;
            margin-right: 10px;
        }

        .contact-form label {
            font-weight: bold;
            display: block;
            margin-top: 10px;
        }

        .contact-form input, .contact-form textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 5px;
        }

        .contact-form button {
            margin-top: 15px;
            background: #c62828;
            color: white;
            border: none;
            padding: 10px 15px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
        }

        .contact-form button:hover {
            background: #b71c1c;
        }

        .social-icons {
            text-align: center;
            margin-top: 20px;
        }

        .social-icons a {
            text-decoration: none;
            margin: 0 10px;
            font-size: 20px;
            color: #c62828;
            transition: 0.3s;
        }

        .social-icons a:hover {
            color: #ff5252;
        }

        .map-container {
            text-align: center;
            margin-top: 20px;
        }

        iframe {
            width: 100%;
            height: 300px;
            border: none;
            border-radius: 10px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2><i class="fas fa-envelope"></i> Contact Us</h2>

        <div class="contact-info">
            <p><i class="fas fa-map-marker-alt"></i> 107 eBlood Bank , Nanded, MAHARASTRA</p>
            <p><i class="fas fa-phone"></i> +91 8080711986</p>
            <p><i class="fas fa-envelope"></i> support@ebloodbankmgm.com</p>
        </div>

        <form class="contact-form" action="contact_process.php" method="POST">
            <label for="name"><i class="fas fa-user"></i> Your Name</label>
            <input type="text" name="name" required>

            <label for="email"><i class="fas fa-envelope"></i> Your Email</label>
            <input type="email" name="email" required>

            <label for="message"><i class="fas fa-comment"></i> Your Message</label>
            <textarea name="message" rows="5" required></textarea>

            <button type="submit"><i class="fas fa-paper-plane"></i> Send Message</button>
        </form>

        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
        </div>

        <div class="map-container">
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3153.494775320286!2d144.95373531592688!3d-37.81720957975153!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65d5df8e8af9b%3A0x5017d681632c970!2s123%20Blood%20Bank%20Street!5e0!3m2!1sen!2sin!4v1617982879200!5m2!1sen!2sin" 
                allowfullscreen="" loading="lazy">
            </iframe>
        </div>
    </div>

</body>
</html>
