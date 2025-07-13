<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<nav>
  <label class="logo">Football Academy</label>
  <div class="group">
    <a href="{{ route('players.index') }}" class="item">Home</a>
    <a href="{{ route('AboutUs') }}" class="item">About Us</a>
    <a href="{{ route('ContactUs') }}" class="item">Contact Us</a>
  </div>
</nav>

<div class="content">
    <h1>About Us</h1>
    <p>Welcome to our Football Academy, dedicated to nurturing talent and fostering sportsmanship.</p>
</div>
</body>
</html>
