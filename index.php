<!DOCTYPE html>
<html lang="en">
  <head>
	<link rel="icon" href="assets/icon.png" />
	<title>Motor Rent</title>
	<link rel="stylesheet" href="style.css" />
	<link rel="preconnect" href="https://fonts.googleapis.com" /> 
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Roboto:wght@500;700&display=swap" rel="stylesheet" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
  </head>
  <body>
    <div class="container">
	<header>
        <nav>
	    <div class="logo">
		<img src="image/logo.jpeg" alt="Logo"/>
          </div>
	    <input type="checkbox" id="click" />
	    <label for="click" class="menu-btn">
	      <i class="fas fa-bars"></i>
	    </label>
	    <ul>
		<li><a href="admin.php">Home</a></li>
		<li><a href="categories.php">Motor Categories</a></li>
		<li><a href="login.php" class="btn_login">Login</a></li>
          </ul>
	  </nav>
	</header>
	<main>
        <div class="jumbotron">
	     <div class="jumbotron-text">
		 <h1>Find Your Perfect Ride, Make a New Adventure</h1>
		 <p>Your new adventure awaits. Discover our range of rental motorcycles today.</p>
		<button type="button" class="btn_getStarted">Get Started</button>
	     </div>
           <div class="jumbotron-img">
	       <img src="image/icon.jpeg" alt="Jumbotron Image" />
           </div>
	  </div>
	  <div class="cards-categories">
	     <h2>Motor Categories</h2>
	     <div class="card-categories">
		  <div class="card">
		    <img src="image/120cc.jpeg" alt="Sport Bike" />
		    <h5>Sport Bikes</h5>
		    <p> Experience the thrill with our range of sport bikes. Designed for speed and agility, perfect for adventure seekers.</p>
		  </div>
		  <div class="card">
			<img src="image/150cc.jpeg" alt="Cruiser" />
			<h5>Cruisers</h5>
			<p> Enjoy a comfortable ride with our selection of cruisers. Ideal for long rides with unmatched comfort and style.</p>
		  </div>
		  <div class="card">
		      <img src="image/200cc.jpeg" alt="Scooter" />
			<h5>Scooters</h5>
			<p> Navigate the city with ease using our scooters. Compact, fuel-efficient, and perfect for short commutes.</p>
		  </div>
	  </div>
    </div>
  </main>
  <footer>
    <h4>&copy; Motor Rent 2023</h4>
  </footer>
</div>
</body>
</html>
