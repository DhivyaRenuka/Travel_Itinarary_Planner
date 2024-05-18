<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tourly - Travel agancy</title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap"
    rel="stylesheet">
</head>

<body id="top">

  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>

    <div class="overlay" data-overlay></div>

    <div class="header-top">
      <div class="container">

        <a href="tel:+01123456790" class="helpline-box">

          <div class="icon-box">
            <ion-icon name="call-outline"></ion-icon>
          </div>

          <div class="wrapper">
            <p class="helpline-title">For Further Inquires :</p>

            <p class="helpline-number">+91 9629492855</p>
          </div>

        </a>

        <a href="#" class="logo">
          <img src="./assets/images/logo.svg" alt="Tourly logo">
        </a>

        <div class="header-btn-group">

          <button class="search-btn" aria-label="Search">
            <ion-icon name="search"></ion-icon>
          </button>

          <button class="nav-open-btn" aria-label="Open Menu" data-nav-open-btn>
            <ion-icon name="menu-outline"></ion-icon>
          </button>

        </div>

      </div>
    </div>

    <div class="header-bottom">
      <div class="container">

        <ul class="social-list">

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-facebook"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-twitter"></ion-icon>
            </a>
          </li>

          <li>
            <a href="#" class="social-link">
              <ion-icon name="logo-youtube"></ion-icon>
            </a>
          </li>

        </ul>

        <nav class="navbar" data-navbar>

          <div class="navbar-top">

            <a href="#" class="logo">
              <img src="./assets/images/logo-blue.svg" alt="Tourly logo">
            </a>

            <button class="nav-close-btn" aria-label="Close Menu" data-nav-close-btn>
              <ion-icon name="close-outline"></ion-icon>
            </button>

          </div>

          <ul class="navbar-list">

            <li>
              <a href="#home" class="navbar-link" data-nav-link>home</a>
            </li>

            <li>
              <a href="#" class="navbar-link" data-nav-link>about us</a>
            </li>

            <li>
              <a href="#destination" class="navbar-link" data-nav-link>destination</a>
            </li>

            <li>
              <a href="#package" class="navbar-link" data-nav-link>packages</a>
            </li>

            <li>
              <a href="#gallery" class="navbar-link" data-nav-link>gallery</a>
            </li>

            <li>
              <a href="#contact" class="navbar-link" data-nav-link>contact us</a>
            </li>

          </ul>

        </nav>

        <button class="btn btn-primary" onclick="openRegistrationFormPopup()">Register</button>
        <button class="btn btn-primary" onclick="openLoginFormPopup()">Login</button>

      </div>
    </div>

  </header>



  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="hero" id="home">
        <div class="container">

          <h2 class="h1 hero-title">Journey to explore world</h2>

          <p class="hero-text">
            Travel Made Simple: Let Us Create Your Dream Itinerary
            Unlock Your Wanderlust: Tailored Itineraries for Unforgettable Trips.
            Embark on Your Next Adventure: Expertly Crafted Itineraries Awaiting
          </p>

          <div class="btn-group">

            <button class="btn btn-secondary" onclick="openRegistrationFormPopup()">Register Now</button>
            <button class="btn btn-secondary" onclick="openLoginFormPopup()">Login Now</button>
          </div>

        </div>
      </section>

      <!-- 
        - #TOUR SEARCH
      -->
      <section class="tour-search">
    <div class="container">
        <form action="store_data.php" method="post" class="tour-search-form" id="tour-form">
            <div class="input-wrapper">
                <label for="destination" class="input-label">Search Destination*</label>
                <select name="destination" id="destination" required class="input-field">
                    <option value="">Select Destination</option>
                    <?php
                    // Connect to your database
                    $conn = new mysqli("localhost", "root", "", "tourly");

                    // Check connection
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }

                    // Fetch destinations from the database
                    $sql = "SELECT destination_id, name FROM destinations";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                        // Output data of each row
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='" . $row["destination_id"] . "'>" . $row["name"] . "</option>";
                        }
                    } else {
                        echo "0 results";
                    }

                    $conn->close();
                    ?>
                </select>
            </div>
            <div class="input-wrapper">
                <label for="people" class="input-label">Pax Number*</label>
                <input type="number" name="people" id="people" required placeholder="No. of People" class="input-field">
            </div>
            <div class="input-wrapper">
                <label for="checkin" class="input-label">Checkin Date*</label>
                <input type="date" name="checkin" id="checkin" required class="input-field">
            </div>
            <div class="input-wrapper">
                <label for="checkout" class="input-label">Checkout Date*</label>
                <input type="date" name="checkout" id="checkout" required class="input-field">
            </div>
            <button type="submit" class="btn btn-secondary">Inquire now</button>
        </form>
    </div>
</section>
<section id="results">
    <div id="weather"></div>
    <div id="itinerary"></div>
</section>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var form = document.getElementById('tour-form');
    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission
        var formData = new FormData(form); // Create FormData object from form
        // Send form data using Fetch API
        fetch('store_data.php', {
            method: 'POST',
            body: formData
        })
        .then(function(response) {
            return response.text().then(function(text) {
                try {
                    return JSON.parse(text);
                } catch (error) {
                    throw new Error('Invalid JSON: ' + text);
                }
            });
        })
        .then(function(data) {
            if (data.error) {
                alert(data.error);
            } else {
                alert('Data submitted successfully!');

                // Display weather data
                var weatherDiv = document.getElementById('weather');
                weatherDiv.innerHTML = '';
                data.weather.forecastday.forEach(function(day) {
                    weatherDiv.innerHTML += `<p>Date: ${day.date}, Condition: ${day.day.condition.text}, Temp: ${day.day.avgtemp_c}°C</p>`;
                });

                // Display itinerary data
                var itineraryDiv = document.getElementById('itinerary');
                itineraryDiv.innerHTML = '';
                if (Array.isArray(data.itinerary)) {
                    data.itinerary.forEach(function(item) {
                        // Check if itinerary item has expected properties
                        if (item && item.day_number && item.activity_time && item.activity_description) {
                            itineraryDiv.innerHTML += `<p>Day: ${item.day_number}, Time: ${item.activity_time}, Activity: ${item.activity_description}</p>`;
                        } else {
                            console.error('Unexpected format of itinerary item:', item);
                            alert('Unexpected format of itinerary item');
                        }
                    });
                } else {
                    console.error('Unexpected format of itinerary data:', data.itinerary);
                    alert('Unexpected format of itinerary data');
                }
        
            }
        })
        .catch(function(error) {
            console.error('There was a problem with your fetch operation:', error.message);
        });
    });
});
</script>

      <!-- 
        - #POPULAR
      -->

      <section class="popular" id="destination">
        <div class="container">

          <p class="section-subtitle">Uncover place</p>

          <h2 class="h2 section-title">Popular destination</h2>

          <p class="section-text">
            Here, some things seem rather to some extent, just the first, neither nobody, a routine. Meanwhile, they
            praise the vestibule. It keeps the duties of ornamental militias, let them have
          </p>

          <ul class="popular-list" id="popular-list">
            <!-- Attractions will be dynamically added here -->
          </ul>

          <button class="btn btn-primary" id="view-more-button">More destination</button>

        </div>
      </section>

      <script>
        document.addEventListener('DOMContentLoaded', function () {
          const popularList = document.getElementById('popular-list');
          const viewMoreButton = document.getElementById('view-more-button');
          const attractionsToShow = 6; // Number of attractions to initially show
          let attractionsData = null; // Variable to store attractions data

          // Fetch data from PHP backend using AJAX
          fetch('get_attractions.php')
            .then(response => response.json())
            .then(data => {
              attractionsData = data; // Store attractions data
              displayAttractions(attractionsData, attractionsToShow); // Display initial attractions
            })
            .catch(error => console.error('Error fetching attractions:', error));

          // Function to display attractions
          function displayAttractions(data, count) {
            popularList.innerHTML = ''; // Clear previous attractions
            data.slice(0, count).forEach(attraction => {
              const listItem = document.createElement('li');
              listItem.innerHTML = `
                <div class="popular-card">
                    <figure class="card-img">
                        <img src="./assets/images/${attraction.attraction_id}.jpg" loading="lazy">
                    </figure>
                    <div class="card-content">
                        <div class="card-rating">
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                            <ion-icon name="star"></ion-icon>
                        </div>
                        <p class="card-subtitle"><a href="#">${attraction.location}</a></p>
                        <h3 class="h3 card-title"><a href="#">${attraction.name}</a></h3>
                        <p class="card-text">${attraction.description}</p>
                        <button class="booking-button" onclick="openBookingFormPopup('${attraction.name}')">Book Now</button>
                    </div>
                </div>
            `;
              popularList.appendChild(listItem);
            });
          }

          // Event listener for view more button
          viewMoreButton.addEventListener('click', function () {
            const buttonText = viewMoreButton.textContent.trim();
            if (buttonText === 'View More') {
              displayAttractions(attractionsData, attractionsData.length); // Display all attractions
              viewMoreButton.textContent = 'View Less'; // Change button text to View Less
            } else {
              displayAttractions(attractionsData, attractionsToShow); // Display limited attractions
              viewMoreButton.textContent = 'View More'; // Change button text to View More
            }
          });
        });

      </script>

      <!-- 
        - #PACKAGE
      -->

      <?php
// Assume you have already established a database connection

// Fetch packages from the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tourly";

// Create connection
$connection = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM packages";
$result = mysqli_query($connection, $query);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Output HTML for each package
?>
<li>
    <div class="package-card">
        <figure class="card-banner">
            <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['title']; ?>" loading="lazy">
        </figure>
        <div class="card-content">
            <h3 class="h3 card-title">
                <?php echo $row['title']; ?>
            </h3>
            <p class="card-text">
                <?php echo $row['description']; ?>
            </p>
            <ul class="card-meta-list">
                <li class="card-meta-item">
                    <div class="meta-box">
                        <ion-icon name="time"></ion-icon>
                        <p class="text">
                            <?php echo $row['duration']; ?>
                        </p>
                    </div>
                </li>
                <li class="card-meta-item">
                    <div class="meta-box">
                        <ion-icon name="people"></ion-icon>
                        <p class="text">pax:
                            <?php echo $row['capacity']; ?>
                        </p>
                    </div>
                </li>
                <li class="card-meta-item">
                    <div class="meta-box">
                        <ion-icon name="location"></ion-icon>
                        <p class="text">
                            <?php echo $row['location']; ?>
                        </p>
                    </div>
                </li>
            </ul>
        </div>
        <div class="card-price">
            <div class="wrapper">
                <p class="reviews">(<?php echo $row['reviews']; ?> reviews)</p>
                <div class="card-rating">
                    <?php
                    $rating = $row['rating'];
                    for ($i = 0; $i < $rating; $i++) {
                        echo '<ion-icon name="star"></ion-icon>';
                    }
                    ?>
                </div>
            </div>
            <p class="price">
                <?php echo $row['price']; ?> <span>/ per person</span>
            </p>
           
        </div>
    </div>
</li>
<?php
    }
}
?>
      <!-- 
        - #GALLERY
      -->

      <section class="gallery" id="gallery">
        <div class="container">

          <p class="section-subtitle">Photo Gallery</p>

          <h2 class="h2 section-title">Photo's From Travellers</h2>

          <p class="section-text">
            Here, some things seem somewhat justified, just the first, neither nobody, a routine. Meanwhile, they praise
            the vestibule. Let ornamental militias be held, they are suitable.
          </p>

          <ul class="gallery-list">

            <li class="gallery-item">
              <figure class="gallery-image">
                <img src="./assets/images/gallery-1.jpg" alt="Gallery image">
              </figure>
            </li>

            <li class="gallery-item">
              <figure class="gallery-image">
                <img src="./assets/images/gallery-2.jpg" alt="Gallery image">
              </figure>
            </li>

            <li class="gallery-item">
              <figure class="gallery-image">
                <img src="./assets/images/gallery-3.jpg" alt="Gallery image">
              </figure>
            </li>

            <li class="gallery-item">
              <figure class="gallery-image">
                <img src="./assets/images/gallery-4.jpg" alt="Gallery image">
              </figure>
            </li>

            <li class="gallery-item">
              <figure class="gallery-image">
                <img src="./assets/images/gallery-5.jpg" alt="Gallery image">
              </figure>
            </li>

          </ul>

        </div>
      </section>





      <!-- 
        - #CTA
      -->

      <section class="cta" id="contact">
        <div class="container">

          <div class="cta-content">
            <p class="section-subtitle">Call To Action</p>

            <h2 class="h2 section-title">Ready For Unforgatable Travel. Remember Us!</h2>

            <p class="section-text">
              Here, some things seem to be somewhat justified, just the first, neither nobody, a routine. Meanwhile,
              they praise the vestibule. Let ornamental militias hold, they are suitable.
            </p>
          </div>

          <button class="btn btn-secondary">Contact Us !</button>

        </div>
      </section>

    </article>
  </main>

  <!-- 
    - #FOOTER
  -->

  <footer class="footer">

    <div class="footer-top">
      <div class="container">

        <div class="footer-brand">

          <a href="#" class="logo">
            <img src="./assets/images/logo.svg" alt="Tourly logo">
          </a>

          <p class="footer-text">
            Before these urns, with reason, providing, an eleifend, vulputate troubles fringilla, the present great
            marriages both for preferring, the price, and even the ultrices
          </p>

        </div>

        <div class="footer-contact">

          <h4 class="contact-title">Contact Us</h4>

          <p class="contact-text">
            Feel free to contact and reach us !!
          </p>

          <ul>

            <li class="contact-item">
              <ion-icon name="call-outline"></ion-icon>

              <a href="tel:+01123456790" class="contact-link">+01 (123) 4567 90</a>
            </li>

            <li class="contact-item">
              <ion-icon name="mail-outline"></ion-icon>

              <a href="mailto:info.tourly.com" class="contact-link">info.tourly.com</a>
            </li>

            <li class="contact-item">
              <ion-icon name="location-outline"></ion-icon>

              <address>3146 Koontz, California</address>
            </li>

          </ul>

        </div>

        <div class="footer-form">

          <p class="form-text">
            Subscribe our newsletter for more update & news !!
          </p>

          <form action="" class="form-wrapper">
            <input type="email" name="email" class="input-field" placeholder="Enter Your Email" required>

            <button type="submit" class="btn btn-secondary">Subscribe</button>
          </form>

        </div>

      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">

        <p class="copyright">
          &copy; 2024 <a href="">dhivya</a>. All rights reserved
        </p>

        <ul class="footer-bottom-list">

          <li>
            <a href="#" class="footer-bottom-link">Privacy Policy</a>
          </li>

          <li>
            <a href="#" class="footer-bottom-link">Term & Condition</a>
          </li>

          <li>
            <a href="#" class="footer-bottom-link">FAQ</a>
          </li>

        </ul>

      </div>
    </div>

  </footer>





  <!-- 
    - #GO TO TOP
  -->

  <a href="#top" class="go-top" data-go-top>
    <ion-icon name="chevron-up-outline"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<!-- popup form sections -->
<!-- Popup form -->
<div id="registrationFormPopup" class="booking-form-popup" style="display: none;">
  <span class="close" onclick="closeRegistrationFormPopup()">&times;</span>
  <h2>Registration Form</h2>
  <form id="registrationFormFields" onsubmit="handleRegistration()">
    <!-- Add registration form fields here -->
    <label for="name">Username:</label>
    <input type="text" id="username" name="username" required>

    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <!-- Add more fields as needed -->

    <button type="submit" class="btn btn-primary">Register</button>
  </form>
</div>
<!-- Popup form -->
<div id="loginFormPopup" class="booking-form-popup" style="display: none;">
  <span class="close" onclick="closeLoginFormPopup()">&times;</span>
  <h2>Login Form</h2>
  <form id="loginFormFields" onsubmit="handleLogin()">
    <!-- Add login form fields here -->
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>

    <!-- Add more fields as needed -->
    <button type="submit" class="btn btn-primary">Login</button>
  </form>
</div>
<script>
  // Function to open the registration form popup
function openRegistrationFormPopup() {
  document.getElementById("registrationFormPopup").style.display = "block";
}

// Function to close the registration form popup
function closeRegistrationFormPopup() {
  document.getElementById("registrationFormPopup").style.display = "none";
}

// Function to handle registration form submission
function handleRegistration() {
  var formData = new FormData(document.getElementById("registrationFormFields"));
  fetch('registration.php', {
    method: 'POST',
    body: formData
  })
  .then(response => {
    if (response.ok) {
      return response.text();
    }
    throw new Error('Network response was not ok.');
  })
  .then(data => {
    // Handle success response
    alert('Registration successful!');
    var userId = data.trim(); // Assuming the server returns the user ID as plain text
    openBookingFormPopup(userId);
    closeRegistrationFormPopup();
  })
  .catch(error => {
    // Handle error response
    console.error('There was a problem with your fetch operation:', error.message);
  });
}


// Function to open the login form popup
function openLoginFormPopup() {
  document.getElementById("loginFormPopup").style.display = "block";
}

// Function to close the login form popup
function closeLoginFormPopup() {
  document.getElementById("loginFormPopup").style.display = "none";
}


// Function to handle login form submission
function handleLogin() {
  var formData = new FormData(document.getElementById("loginFormFields"));
  fetch('login.php', {
    method: 'POST',
    body: formData
  })
  .then(response => {
    if (response.ok) {
      return response.text();
    }
    throw new Error('Network response was not ok.');
  })
  .then(data => {
    // Handle success response
    if(data.trim() === 'success') {
      alert('Login successful!');
      closeLoginFormPopup();
      window.location.href = 'dashboard.php'; // Redirect to dashboard
    } else {
      alert('Invalid username or password');
    }
  })
  .catch(error => {
    // Handle error response
    console.error('There was a problem with your fetch operation:', error.message);
  });
}
</script>

<!-- booking form -->
<!-- Popup form -->
<div id="bookingFormPopup" class="booking-form-popup" style="display: none;">
  <span class="close" onclick="closeBookingFormPopup()">&times;</span>
  <h2>Booking Form</h2>
  <form id="bookingForm" onsubmit="handleBooking()">
    <input type="hidden" id="userId" name="userId" value="">
    <input type="hidden" id="destinationId" name="destinationId" value="">
    <div class="input-wrapper">
      <label for="startDate">Start Date:</label>
      <input type="date" id="startDate" name="startDate" required>
    </div>
    <div class="input-wrapper">
      <label for="endDate">End Date:</label>
      <input type="date" id="endDate" name="endDate" required>
    </div>
    <div class="input-wrapper">
      <label for="budget">Budget:</label>
      <input type="text" id="budget" name="budget" required>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
</div>
<script>
function getParameterByName(name, url) {
  if (!url) url = window.location.href;
  name = name.replace(/[\[\]]/g, '\\$&');
  var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
      results = regex.exec(url);
  if (!results) return null;
  if (!results[2]) return '';
  return decodeURIComponent(results[2].replace(/\+/g, ' '));
}
function openBookingFormPopup(attractionName) {
  // Retrieve the destination ID corresponding to the attraction name
  fetch(`get_destination_id.php?attractionName=${encodeURIComponent(attractionName)}`)
  .then(response => {
    if (response.ok) {
      return response.text();
    }
    throw new Error('Network response was not ok.');
  })
  .then(destinationId => {
    // Handle success response
    if (destinationId) {
      // Fetch the user ID based on the username stored in the session
      var userID = getParameterByName('username');
      fetch(`get_user_id.php?username=${userID}`)
      .then(response => {
        if (response.ok) {
          return response.text();
        }
        throw new Error('Network response was not ok.');
      })
      .then(userId => {
        // Set the userId variable with the retrieved user ID
        // Open the booking form popup with destination ID and user ID
        document.getElementById("destinationId").value = destinationId;
        document.getElementById("userId").value = userId;
        document.getElementById("bookingFormPopup").style.display = "block";
      })
      .catch(error => {
        console.error('Error fetching user ID:', error.message);
      });
    } else {
      alert('Destination ID not found for the given attraction name.');
    }
  })
  .catch(error => {
    // Handle error response
    console.error('There was a problem with your fetch operation:', error.message);
  });
}




// Function to close the booking form popup
function closeBookingFormPopup() {
  document.getElementById("bookingFormPopup").style.display = "none";
}

// Function to handle booking form submission
function handleBooking() {
  var formData = new FormData(document.getElementById("bookingForm"));
  fetch('store_itinerary.php', {
    method: 'POST',
    body: formData
  })
  .then(response => {
    if (response.ok) {
      return response.text();
    }
    throw new Error('Network response was not ok.');
  })
  .then(data => {
    // Handle success response
    alert('Itinerary created successfully!');
    closeBookingFormPopup();
  })
  .catch(error => {
    // Handle error response
    console.error('There was a problem with your fetch operation:', error.message);
  });
}

</script>

</body>

</html>