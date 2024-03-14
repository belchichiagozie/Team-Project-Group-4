<!-- resources/views/contact.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@600&family=Poppins&display=swap">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
</head>
<body>
    <div class="container">
        <h1>Contact Us</h1>
        <p>
            Feel free to contact us, we will get back to you as soon as possible
        </p>
        <form action="{{ route('send.email') }}" method="POST">
            @csrf
            <label for="name">Name</label>
            <input type="text" name="name" id="name" />
            <label for="email">Email</label>
            <input type="text" name="email" id="email" />
            <label for="subject">Subject</label>
            <input type="text" name="subject" id="subject" />
            <label for="message">Message</label>
            <textarea name="message" cols="30" rows="10"></textarea>
            <input type="submit" value="Send" />
        </form>
    </div>
</body>
</html>
    