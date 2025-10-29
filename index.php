<?php
$servername="localhost";
$username="root";
$password="mysql";
$dtbname="precmavit";

//dtb conn
$conn=mysqli_connect($servername, $username, $password, $dtbname);

//checking if dtb is connected successfuly
if($conn==1) {
    $say="Connection successful";
}else{
    $say="connection unsuccessful";
}
//echo $say;

//checking if submit utton is clicked or not
if(isset($_POST['send'])) {

    //creting varibles to collect data from the form
    $name=$_POST['name'];
    $email=$_POST['email'];
    $message=$_POST['message'];

    //checking if the fields are empty
    if($name !="" && $email !="" && $message !=""){

    //checking if data is sent successfully
    $sql = mysqli_query($conn, "INSERT INTO mmessage(full_name, email, prec_message)VALUES('$name','$email','$message' )");

    //ckeckig if data is sent successfully
    if($sql==1) {
        $msg="User added successfully";
    }else{
        $msg="User not added successfully";
    }
    }else{
        $msg="fill all fields";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>PRECMAVIT</title>

  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      scroll-behavior: smooth;
    }

    body {
      font-family: 'Poppins', sans-serif;
      overflow-x: hidden;
    }

    /* ===== NAVIGATION ===== */
    nav {
      box-shadow: 0 0 10px rgb(233, 244, 253);
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 26px 40px;
      position: fixed;
      width: 100%;
      top: 0;
      left: 0;
      background: transparent;
      z-index: 1000;
      backdrop-filter: blur(10px);
    }

    nav .logo {
      font-size: 28px;
      font-weight: 700;
      letter-spacing: 2px;
    }

    nav ul {
      list-style: none;
      display: flex;
      gap: 25px;
      transition: 0.4s ease;
    }

    nav ul li a {
      color: white;
      text-decoration: none;
      font-size: 18px;
      transition: 0.3s;
    }

    nav ul li a:hover {
      color: rgb(169, 210, 247);
    }

    /* ===== HAMBURGER MENU ===== */
    .menu-icon {
      display: none;
      font-size: 30px;
      color: white;
      cursor: pointer;
    }

    /* ===== SECTIONS ===== */
    section {
      padding: 100px 60px 40px;
      min-height: 100vh;
    }

    /* ===== HOME ===== */
    #home {
      background: linear-gradient(151deg, #646363 50%, #797979 45%);
      color: white;
      text-align: center;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
    }

    #home h1 {
      font-size: 45px;
      font-family: 'ALGERIAN';
      margin-bottom: 10px;
    }

    #home p {
      font-size: 24px;
    }

    /* ===== SERVICES ===== */
    #services {
  background: linear-gradient(-151deg, #646363 50%, #797979 45%);
  background-size: cover;
  text-align: center;
  color: white;
  padding: 100px 40px;
}

#services h2 {
  font-size: 40px;
  margin-bottom: 10px;
  color: #fff;
}

#services .service-desc {
  font-size: 18px;
  margin-bottom: 40px;
  color: #e0e0e0;
}

/* Cards layout */
.card {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 25px;
  justify-content: center;
}

.card > div {
  background: transparent;
  box-shadow: 0 0 15px rgba(0,0,0,0.4);
  border-radius: 15px;
  padding: 25px;
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.card > div:hover {
  transform: translateY(-8px);
  box-shadow: 0 0 20px rgba(255,255,255,0.3);
}

.card h3 {
  margin-bottom: 15px;
  font-size: 22px;
  color: #fff;
}

.card p {
  font-size: 16px;
  line-height: 1.6;
  color: #ddd;
}

    /* ===== PRODUCTS ===== */
    #products {
      background: linear-gradient(152deg, #797777 50%, #868383 45%);
      text-align: center;
    }

    .section-title {
      color: white;
      font-size: 40px;
      margin-bottom: 10px;
    }

    .section-desc {
      color: white;
      font-size: 18px;
      margin-bottom: 40px;
    }

    .product-container {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
      gap: 25px;
      justify-items: center;
    }

    .product-card {
      background: transparent;
      border-radius: 15px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
      padding: 20px;
      transition: 0.3s ease;
      max-width: 280px;
    }

    .product-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 6px 15px rgba(0,0,0,0.3);
    }

    .product-card img {
      width: 100%;
      border-radius: 10px;
      height: 160px;
      object-fit: cover;
      margin-bottom: 15px;
    }

    .product-card h3 {
      color: white;
      margin-bottom: 8px;
    }

    .product-card p {
      color: #eee;
      font-size: 0.9em;
    }

    /* ===== ABOUT US ===== */
/* ABOUT SECTION */
#aboutus {
  background: linear-gradient(-152deg, #797777 50%, #868383 45%);
  padding: 100px 60px;
  color: white;
}

.about-container {
  display: flex;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-between;
  gap: 50px;
}

/* Image Section */
.about-image {
  flex: 1;
  text-align: center;
}

.about-image img {
  width: 420px;
  max-width: 100%;
  border-radius: 15px;
  box-shadow: 0 4px 15px rgba(0,0,0,0.4);
  transition: transform 0.4s ease;
}

.about-image img:hover {
  transform: scale(1.05);
}

/* Text Section */
.about-text {
  flex: 1.2;
  color: #f5f5f5;
}

.about-text h2 {
  font-size: 45px;
  color: #e9ebee;
  margin-bottom: 20px;
  position: relative;
}

.about-text h2::after {
  content: '';
  display: block;
  width: 70px;
  height: 4px;
  background: #004aad;
  margin-top: 10px;
  border-radius: 2px;
}

.about-text p {
  font-size: 18px;
  line-height: 1.8;
  margin-bottom: 20px;
  color: #f6f4f8;
  text-align: justify;
}

/* Button */
.about-btn {
  display: inline-block;
  background: #004aad;
  color: white;
  padding: 12px 25px;
  border-radius: 30px;
  text-decoration: none;
  font-weight: 600;
  transition: all 0.3s ease;
}

.about-btn:hover {
  background: #00327a;
  transform: translateY(-2px);
}

/* Responsive Design */
@media (max-width: 900px) {
  #aboutus {
    padding: 70px 20px;
  }

  .about-container {
    flex-direction: column;
    text-align: center;
  }

  .about-image img {
    width: 80%;
  }

  .about-text h2 {
    font-size: 35px;
  }

  .about-text p {
    font-size: 17px;
  }

  .about-btn {
    margin-top: 10px;
  }
}

    /* ===== CONTACT ===== */
/* CONTACT SECTION */
#contact {
  background: linear-gradient(153deg, #797777 45%, rgb(131, 130, 130) 45%);
  padding: 100px 40px;
  color: white;
  text-align: center;
}

#contact h2 {
  font-size: 40px;
  margin-bottom: 10px;
}

#contact .contact-desc {
  font-size: 18px;
  color: #e2e2e2;
  margin-bottom: 40px;
}

.contact-grid {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
  gap: 30px;
  align-items: flex-start;
}

/* Contact Info */
.contact-info {
  display: flex;
  flex-direction: column;
  gap: 25px;
}

.info-box {
  background: transparent;
  box-shadow: 0 0 15px rgba(255,255,255,0.2);
  border-radius: 10px;
  padding: 25px;
  transition: transform 0.3s ease;
}

.info-box:hover {
  transform: translateY(-5px);
}

.contact-icon {
  width: 50px;
  margin-bottom: 10px;
}

.info-box h3 {
  color: #fff;
  font-size: 22px;
  margin-bottom: 8px;
}

.info-box p {
  color: #e2e2e2;
  font-size: 16px;
}

.info-box a {
  color: #fff;
  text-decoration: none;
}

.info-box a:hover {
  text-decoration: underline;
}

/* Contact Form */
.contact-form form {
  display: flex;
  flex-direction: column;
  gap: 15px;
  background: transparent;
  box-shadow: 0 0 15px rgba(255,255,255,0.2);
  border-radius: 10px;
  padding: 25px;
}

.contact-form input,
.contact-form textarea {
  width: 100%;
  padding: 12px;
  border: none;
  outline: none;
  border-radius: 6px;
  font-size: 16px;
  background: rgba(255,255,255,0.15);
  color: #fff;
}

.contact-form input::placeholder,
.contact-form textarea::placeholder {
  color: #ddd;
}

.contact-form button {
  background: #004aad;
  color: white;
  border: none;
  padding: 12px;
  border-radius: 8px;
  font-size: 18px;
  cursor: pointer;
  transition: background 0.3s ease;
}

.contact-form button:hover {
  background: #00327a;
}

/* Responsive */
@media (max-width: 768px) {
  #contact {
    padding: 70px 20px;
  }

  .contact-grid {
    grid-template-columns: 1fr;
  }

  .contact-form form {
    padding: 20px;
  }
}

    /* ===== RESPONSIVE DESIGN ===== */
    @media (max-width: 768px) {
      nav {
        padding: 15px 25px;
      }

      .menu-icon {
        display: block;
      }

      nav ul {
        position: absolute;
        top: 70px;
        left: 0;
        background: rgba(0, 0, 0, 0.9);
        width: 100%;
        flex-direction: column;
        align-items: center;
        gap: 20px;
        padding: 20px 0;
        max-height: 0;
        overflow: hidden;
      }

      nav ul.active {
        max-height: 400px;
      }

      #home h1 {
        font-size: 30px;
      }

      #home p {
        font-size: 18px;
      }

      .about-container {
        flex-direction: column;
      }
    }

    @media (max-width: 480px) {
      section {
        padding: 80px 20px;
      }

      .logo {
        font-size: 24px;
      }

      #home h1 {
        font-size: 24px;
      }

      #home p {
        font-size: 16px;
      }

      .section-title {
        font-size: 28px;
      }

      .about-text p {
        font-size: 16px;
      }
    }
  </style>
</head>
<body>
  <!-- ==== NAVIGATION ==== -->
  <nav>
    <div class="logo">PRECMAVIT</div>
    <div class="menu-icon" onclick="toggleMenu()">☰</div>
    <ul id="menu-list">
      <li><a href="#home" onclick="toggleMenu()">Home</a></li>
      <li><a href="#services" onclick="toggleMenu()">Services</a></li>
      <li><a href="#products" onclick="toggleMenu()">Products</a></li>
      <li><a href="#aboutus" onclick="toggleMenu()">About Us</a></li>
      <li><a href="#contact" onclick="toggleMenu()">Contact</a></li>
    </ul>
  </nav>

  <!-- ==== HOME ==== -->
  <section id="home">
    <h1>WELCOME TO PRECMAVIT ONLINE PHARMACY</h1>
    <p>In God We Trust.</p>
  </section>

  <!-- ===== SERVICES ===== -->
<section id="services">
  <h2>Our Services</h2>
  <p class="service-desc">
    At <strong>PRECMAVIT Pharmacy</strong>, we provide trusted healthcare services to help you live healthier every day.
  </p>

  <div class="card">

    <div class="div1">
      <h3>Prescription Services</h3>
      <p>We fill your prescriptions accurately and promptly, ensuring your medications are always available.</p>
    </div>

    <div class="div2">
      <h3>Health Consultation</h3>
      <p>Speak with our licensed pharmacists for expert advice on medications, side effects, and proper dosage.</p>
    </div>

    <div class="div3">
      <h3>Home Delivery</h3>
      <p>Enjoy fast, secure, and convenient delivery of your medicines right to your door.</p>
    </div>

    <div class="div1">
      <h3>Blood Pressure & Sugar Check</h3>
      <p>We offer accurate in-store health checks to help you stay informed about your body.</p>
    </div>

    <div class="div2">
      <h3>Health & Wellness Counselling</h3>
      <p>Receive personalized guidance on skincare, diet, supplements, and healthy living.</p>
    </div>

    <div class="div3">
      <h3>Vaccination Support</h3>
      <p>Get professional information and assistance with recommended vaccines for you and your family.</p>
    </div>

  </div>
</section>

  <!-- ===== PRODUCTS ===== -->
  <section id="products">
    <h2 class="section-title">Our Products</h2>
    <p class="section-desc">We provide a wide range of quality medicines and healthcare products.</p>
    <div class="product-container">
      <div class="product-card"><img src="pic.jpg" alt=""><h3>Vitamin C 1000mg</h3><p>Boosts your immune system.</p></div>
      <div class="product-card"><img src="pic3.jpg" alt=""><h3>Pain Relief Tablets</h3><p>Fast and effective pain relief.</p></div>
      <div class="product-card"><img src="pic2.jpg" alt=""><h3>Skin Care Cream</h3><p>Soothes and nourishes your skin.</p></div>
      <div class="product-card"><img src="pic4.jpg" alt=""><h3>Blood Pressure Monitor</h3><p>Accurate readings at home.</p></div>
    </div>
  </section>

  <!-- ===== ABOUT US ===== -->
<section id="aboutus">
  <div class="about-container">
    
    <!-- Image -->
    <div class="about-image">
      <img src="pic1.jpg" alt="Pharmacy Team">
    </div>

    <!-- Text Content -->
    <div class="about-text">
      <h2>About Us</h2>
      <p>
        At <strong>PRECMAVIT Pharmacy</strong>, we are dedicated to providing quality healthcare products, 
        trusted pharmaceutical advice, and compassionate customer service to our community.
      </p>

      <p>
        Our mission is to make safe and affordable medicines accessible to everyone while promoting
        a healthier and happier lifestyle through professional guidance.
      </p>

      <p>
        With experienced pharmacists, modern facilities, and a passion for wellness, we aim to 
        redefine pharmacy care with excellence and trust.
      </p>

      <a href="tel:+2348136963554" class="about-btn">Contact Us</a>
    </div>
  </div>
</section>

  <!-- ===== CONTACT ===== -->
<section id="contact">
  <div class="contact-container">
    <h2>Contact Us</h2>
    <p class="contact-desc">We’d love to hear from you. Reach out to us anytime!</p>

    <div class="contact-grid">

      <!-- Contact Info -->
      <div class="contact-info">
        <div class="info-box">
          <img src="https://cdn-icons-png.flaticon.com/512/724/724664.png" alt="Phone" class="contact-icon">
          <h3>Call Us</h3>
          <p><a href="tel:+2348136963554">+234 813 696 3554</a></p>
        </div>

        <div class="info-box">
          <img src="https://cdn-icons-png.flaticon.com/512/732/732200.png" alt="Email" class="contact-icon">
          <h3>Email Us</h3>
          <p><a href="mailto:someone@gmail.com">someone@gmail.com</a></p>
        </div>

        <div class="info-box">
          <img src="https://cdn-icons-png.flaticon.com/512/535/535239.png" alt="Location" class="contact-icon">
          <h3>Visit Us</h3>
          <p>Angwangede, Kuje-Abuja, Nigeria</p>
        </div>
      </div>

      <!-- Contact Form -->
      <div class="contact-form">
        <!-- MESSAGE FORM -->
<form   method="POST"
  class="contact-form"
  id="contactForm"
  >
  <b style="color:blue;"> <?php echo $msg ?></b><br>
  <h3>Send Us a Message</h3>

  <label for="name">Full Name</label>
  <input type="text" id="name" name="name" placeholder="Enter your full name" required>

  <label for="email">Email</label>
  <input type="email" id="email" name="email" placeholder="Enter your email" required>

  <label for="message">Message</label>
  <textarea id="message" name="message" rows="5" placeholder="Write your message..." required></textarea>

  <button type="submit" name="send">Send Message</button>

  <!-- Success alert -->
  <p id="form-status" style="display:none; color:#00ff6a; font-weight:bold; margin-top:10px;">
    ✅ Message sent successfully!
  </p>
</form>

<!-- JavaScript
<script>
  const form = document.getElementById('contactForm');
  const statusMsg = document.getElementById('form-status');

  form.addEventListener('submit', async (e) => {
    e.preventDefault();
    const data = new FormData(form);
    const response = await fetch(form.action, {
      method: form.method,
      body: data,
      headers: { 'Accept': 'application/json' }
    });
    if (response.ok) {
      form.reset();
      statusMsg.style.display = 'block';
      setTimeout(() => statusMsg.style.display = 'none', 4000);
    } else {
      alert('❌ Failed to send message. Please try again.');
    }
  });
</script>
      </div>

    </div>
  </div>
</section>
-->
  <script>
    function toggleMenu() {
      const menu = document.getElementById('menu-list');
      menu.classList.toggle('active');
    }
  </script>
  
  
</body>
</html>