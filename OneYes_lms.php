
<?php

include 'config.php';
session_start();
$user_id = $_SESSION['user_id'];


?>
<!DOCTYPE html>
<html lang="en">
<head>
    
    <title>OneYes LMS Portal </title>
    <!-- Font Awesome Icons -->
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"
    />
    <!-- Google Fonts -->
    <link
            href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700&display=swap"
            rel="stylesheet"
    />
    <!-- Stylesheet -->
    <link rel="stylesheet" href="oneyes_lms.css"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="https://i.ibb.co/prbm4Fd/video-image-iy-DVBDl-Jd-removebg-preview.png">
</head>
<body>
<header>
    <nav>

        <a href="#default" id="logo" class="a4"><img
                src="https://i.ibb.co/prbm4Fd/video-image-iy-DVBDl-Jd-removebg-preview.png" alt="video-image-iy-DVBDl-Jd-removebg-preview" border="0" width=60%"
                height="80px"></a>
        
        <i class="fas fa-bars" id="ham-menu" style="cursor:pointer"></i>
        <ul id="nav-bar">
            <li>
                <a href="index.html">Logout</a>
            </li>
            <li>
                <a href="oneyes_about.php">About</a>
            </li>
            <li>
                <a href="oneyes_services.php">Services</a>
            </li>
            <li>
                <a href="oneyes_team.php">Team</a>
            </li>
            <li>
                <a href="oneyes_contact.php">Contact</a>
            </li>
            <li>
                <?php
                $select = mysqli_query($conn, "SELECT * FROM `user_form` WHERE id = '$user_id'") or die('query failed');
                if(mysqli_num_rows($select) > 0){
                   $fetch = mysqli_fetch_assoc($select);
                }
                
             ?>
                <a href="user_profile.php" class="active1">Hii <?php echo $fetch['name']; ?></a>
            </li>
        </ul>
    </nav>

</header>
<br>
<br>
<br>
<br><br>



<section id="home">
    <div class="do3" data-aos="fade-down">
        <div class="do31">
          <h1 class="do3h1">Learn Without Limits</h1>
          <h2 class="do3h2">Be with us and Learn with us. Don't stop until you reach your heights.We are with you to provide the best courses with the good management system.</h2>
  
        </div>
        <div class="do32">
          <img src="https://i.ibb.co/QksFRsT/coding-assistant-removebg-preview-1.png" alt="coding-assistant-removebg-preview" border="0" class="img31">
          
        </div>
      </div>
      <hr>
    <div class="div12" data-aos="fade-right">
        <img src="https://i.ibb.co/BZtKp6y/vh1.png" class="img1" id="img1" alt="vh1" border="0">
    </div>
    <div class="div11" data-aos="fade-up">
        <h1 class="maintext1">Welcome to <SPAN class="name">ONEYES</SPAN></h1>
        <h1 class="text2">LMS PORTAL</h1>
        <div class="search-container">
            <p><input type="text" class="search"id="searchInput" placeholder="Search..."></p>
            <ul id="searchResults"></ul>
        </div>
        <p class="text1">OneYesLMS stands for Learning Management System, which is a software application or platform designed to manage and deliver educational content and resources in an organized and efficient manner. LMS platforms are commonly used in educational institutions, corporations, and other organizations to facilitate online learning and training.

        </p>
        <p class="text1" data-aos="fade-right" id="text1">OneYesLMS portals provide a centralized platform for managing and delivering educational content. This makes it easy to organize, store, and access course materials, reducing the need for physical resources and paperwork.</p>
        <p class="text1" data-aos="fade-up">Ready to acquire new skills and elevate your expertise?
            Start your learning journey with OneYesLMS today. Empower yourself with knowledge that
            translates into real-world capabilities. The adventure begins here.</p>

        
    </div>
    <div id="popup" class="popup">
        <div class="popup-content">
            <!-- Content for the pop-up window goes here -->

            <button onclick="closePopup()" class="cancel_button" onclick="toggleContent()">X
            </button>
            <br><br>
            <h1 class="alertm">Here a Message for you</h1>
            <h1 class="popupmessage">Hii This is OneYes</h1>
            <p class="ll">All the best !! </p>
            <br>
            <br>
            <a href="course_registration.php" class="do7a1"><button class="glow-on-hover" type="button">Continue Registration</button></a>
            <a href="oneyes_courses.php" class="do7a1"><button class="glow-on-hover" type="button">Explore all courses</button></a>
        </div>
    </div>
    <div class="d02" data-aos="fade-up">
      <h1 class="heading2"> TRENDING COURSES</h1>
      <div class="do21" data-aos="fade-down">
        
        <img src="https://i.ibb.co/pnQGhTc/OIP-14.jpg" alt="https://th.bing.com/th/id/OIP.E0yEvGDqXof63L66vR1r3AHaEK?pid=ImgDet&rs=1" border="0" class="img21">
        <h1 class="do2h1">Artificial Intelligence</h1>
        <button class="glow-on-hover" type="button" onclick="toggleContent()" id="buttonsdo">Register to course</button>
        
      </div>
      <div class="do21" data-aos="fade-down">
        <img src="https://th.bing.com/th/id/OIP.A05U6VziETlmD9unMsIWHQHaEK?pid=ImgDet&rs=1" alt="https://i.ibb.co/3R1SFZt/Data-Science.jpg" border="0" class="img22">
        <h1 class="do2h1">Data Science</h1>
        <button class="glow-on-hover" type="button" onclick="toggleContent()" id="buttonsdo">Register to course</button>
        
      </div>
      <div class="do21" data-aos="fade-down">
        <img src="https://th.bing.com/th/id/OIP.6vVq7gsqpCe9wJooMeIYSAHaEK?pid=ImgDet&w=800&h=450&rs=1" alt="https://i.ibb.co/1RbSfNR/OIP-17.jpg" border="0" class="img22">
        <h1 class="do2h1">Machine Learning</h1>
        <button class="glow-on-hover" type="button" onclick="toggleContent()" id="buttonsdo">Register to course</button>
        
      </div>
      <div class="do21" data-aos="fade-up">
        <img src="https://swansoftwaresolutions.com/wp-content/uploads/2020/04/05.14.20-Meet-a-Full-Stack-Developer-Vlad-Ryba.jpg" alt="https://i.ibb.co/m5Dg47K/05-14-20-Meet-a-Full-Stack-Developer-Vlad-Ryba.jpg" border="0" class="img22">
        <h1 class="do2h1">FullStack Development</h1>
        <button class="glow-on-hover" type="button" onclick="toggleContent()" id="buttonsdo">Register to course</button>
        
      </div>
      <div class="do21" data-aos="fade-up">
        <img src="https://th.bing.com/th/id/OIP.KJKxnBdQGm9AwECSTtJxjgAAAA?pid=ImgDet&rs=1" alt="https://i.ibb.co/YBnnWfw/OIP-18.jpg" border="0" class="img22">
        <h1 class="do2h1">Data Analytics</h1>
        <button class="glow-on-hover" type="button" onclick="toggleContent()" id="buttonsdo">Register to course</button>
        
      </div>
      <div class="do21" data-aos="fade-up">
        <img src="https://s3.ap-south-1.amazonaws.com/townscript-production/images/3db55480-5fb4-43c3-baf5-791d33796ad2.jpg" alt="https://i.ibb.co/QDrJtVZ/3db55480-5fb4-43c3-baf5-791d33796ad2.jpg" border="0" class="img22">
        <h1 class="do2h1">UI / UX Design</h1>
        <button class="glow-on-hover" type="button" onclick="toggleContent()" id="buttonsdo">Register to course</button>
        
      </div>
      <div class="do21" data-aos="fade-up" style=" background-color:transparent ;margin-left:40%">
        <button class="glow-on-hover" type="button"  id="buttonsdo"><a href="oneyes_courses.php" class="do7a1">Explore all Course</a></button>
        
      </div>

      
    </div>
    
    <div class="do4" data-aos="fade-up">
        <h1 class="do4h1" id="about">ABOUT US</h1>
       <div class="do41">
        <p class="do4p1" data-aos="">If your mind thinks about mobile/website development, then we have created a niche for ourselves. We started in 2012 with just 3 employees and now have expanded ourselves to 50+ which shows about growth and quality of work that we did over the years.</p>
        <h1 class="do4r">Research And Analysis</h1>
        <p class="do4p1">Proper research and analysis are done for efficient strategy and cost reduction. Flexibility is one of our key strengths and we are ready to negotiate according to the client’s requirements.</p>
        
        <h1 class="do4r">Creative and innovative solutions</h1>
        <p class="do4p1">We have professionals who thinks out of the box and provide efficient and innovative solutions.</p>
        <h1 class="do4r">Agile Method</h1>
        <p class="do4p1">Agile methodologies are approaches to product development that are aligned with the values ​​and principles described in the Agile Manifesto for software development.</p>

        </div>
        <div class="do42">
            <img src="https://i.ibb.co/4JrGYZ7/OIP-19-removebg-preview.png" alt="https://www.suttlejsoft.com/home-banners/about.png" class="do4img">
        </div>
    </div>
    <div class="do5" data-aos="fade-up">
        <h1 class="do5h1" id="services">Services</h1>
        <div class="do51" data-aos="fade-down">
            <h1 class="webdo">WEB DEVELOPMENT</h1>
            <p class="webp">We build a distinct agile approach in web development & design services to meet all the business needs and stay out from competitors. Our website development outcome is creating abiding impressions.</p>
        </div>
        <div class="do51" data-aos="fade-down">
            <h1 class="webdo">APP DEVELOPMENT</h1>
            <p class="webp">You might have a business that you wish to take to the next level. In the age of the internet, it’s possible!
                Your business can have a presence online within your compact mobile phone.</p>
        </div>
        <div class="do51" data-aos="fade-up">
            <h1 class="webdo">WEB DESIGN</h1>
            <p class="webp">If you want to have creative web design services, then you’ve landed at the right place! At OneYes Infotech Solutions, we have designed different websites for our esteemed clients.</p>
        </div>
        <div class="do51" data-aos="fade-up">
            <h1 class="webdo">DIGITAL MARKETING</h1>
            <p class="webp">In today’s world, the internet plays a huge part in everyone’s life. A wide audience is available on the internet, who continuously searching for products or services.</p>
        </div>
    </div>
    <div class="do6" data-aos="fade-down">
        <h1 class="do6h1">PRODUCTS</h1>
        <div class="do61" data-aos="fade-up">
            <h1 class="do61h1" >ECOMMERCE</h1>
            <p class="webp">As you are aware, the advancement of technology and communications has had a great say in the business and economy of the world that trading is made possible round the clock from any corner of the globe. Such a transaction, also known as ecommerce, has enabled companies to gain access to their clients at any part of the world at any time. We are the best Ecommerce Website Development in Chennai to fullfill your needs.</p>

        </div>
        <div class="do62" data-aos="fade-down">
            <h1 class="do61h2">CRM</h1>
            <p class="webp">We serve cloud-based CRM software for enterprises, which provides comprehensive customer experience management facilities across multiple communication channels. The software is also capable of automating business-critical activities such as lead capturing, distribution, ticket management, and more.The program can be configured according to unique business requirements.</p>

        </div>
        <div class="do61" data-aos="fade-down">
            
                <h1 class="do61h1">HIRING CONTENT</h1>
                <p class="webp">Give your talent acquisition team the power to develop engaging and interactive virtual hiring events that drive conversions.The technical interview- in which subject related questions will be asked, Group discussion and finally face to face interview will happen through our portal and the HR will select the qualified candidates . Offer letter issuance can be directly done from our portal.</p>

        </div>
        <div class="do62" data-aos="fade-up">
            
            <h1 class="do61h1">Edu - Tech</h1>
            <p class="webp">Online Education Portal is one of our premium products and this portal focuses on providing end-to-end management solutions to all the stakeholders of an educational institute.Online Education ensures flexibility to all its stakeholders. While the students get the freedom to study at their pace, the teachers can also share their e-assessments, reports at their convenience.

            </p>

    </div>

    </div>
    <br>
    <br><br>
    <hr>
    <div class="do7" id="team" data-aos="fade-down">
        <h1 class="do7h1">TEAM MEMBERS</h1>
        <div class="do71" data-aos="fade-down">
            <img src="https://www.oneyesinfotechsolutions.com/img/oneyes%20logo.png" alt="https://i.ibb.co/zff2qM9/oneyes-logo-1.png" class="do7img">
            <h1 class="do7h2">One Yes InfoTech Solutions</h1>
            <button class="glow-on-hover" type="button"  id="buttonsdo" ><a href="https://www.oneyesinfotechsolutions.com/" class="do7a1">Visit Us</a></button>
        </div>
        <div class="do71" data-aos="fade-up">
            <img src=" https://cdn2.iconfinder.com/data/icons/modern-avatars/600/myAvatar50-512.png" alt="https://i.ibb.co/Bth8XwW/Whats-App-Image-2023-10-06-at-16-47-26-d31cddee.jpg" class="do7img1">
            <h1 class="do7h2">G Dinesh Babu</h1>
            <button class="glow-on-hover" type="button"  id="buttonsdo" ><a href="https://www.oneyesinfotechsolutions.com/" class="do7a1">Visit Us</a></button>
        </div>
    </div>
    <div class="do8" id="contact">
        <div class="do81">
            <h1 class="do8h1">ONEYES INFOTECH SOLUTIONS</h1>
            <p class="do8p">You might have a business that you wish to take to the next level. In the age of the internet, it’s possible! Your business can have a presence online. We at OneYes Infotech Solutions, provide you with a custom-made applications that fulfill your needs.Build your site with us!.</p>
        </div>
        <div class="do82">
            <h1 class="do8h2">Contact Us</h1>
            <i class="fas fa-envelope" id="tt"><a class="tt" href="mailto:info@oneyesinfotechsolutions.com">Email</a></i><br>
            <br>
                
                <i class="fa fa-instagram" area-hidden="true" id="tt"><a class="tt"
                                                                        href="https://www.instagram.com/oneyes_technologies/?hl=en">Instagram</a></i><br>
                <br>
                <i class="fa fa-facebook" area-hidden="true" id="tt"><a class="tt"
                                                                         href="https://www.facebook.com/OneYesTechnologies/">Facebook</a></i><br>
                <br>
                <i class="fa fa-linkedin" id="tt"><a class="tt" href="https://www.linkedin.com/in/oneyestechnologies">LinkedIn</a></i><br>

                <br>
        

        </div>
        <br>
        <a href="OneYes_lms.php" class="la2">Home</a>
        <a href="#about" class="la1">About</a>
        <a href="#services" class="la1">Services</a>
        <a href="#team" class="la1">Team</a>
        <a href="#contact" class="la1">Contact Us</a>
        <br><br>
        <a href="meetUs.php" class="do7a1"><button class="glow-on-hover" type="button"  id="buttonsdo">Feedback</button></a>
        <br><br><br>

    </div>


   

</section>


<!-- Script -->
<script src="oneyesLMS.js"></script>
<script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
<link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="path/to/fontawesome.min.css">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
</body>
</html>

<script>
    //for search bar
const searchInput = document.getElementById('searchInput');
const searchResults = document.getElementById('searchResults');

searchInput.addEventListener('input', function() {
  const searchTerm = searchInput.value.toLowerCase();
  searchResults.innerHTML = '';

  if (searchTerm.length > 0) {
    // Replace with your own data
    const searchData = [
      { title: 'Artificial Intelligence', link: 'user_profile.php' },
      { title: 'C++', link: '#' },
      { title: 'Cyber Security', link: '#' },
      // Add more data entries as needed
    ];

    searchData.forEach(item => {
      if (item.title.toLowerCase().includes(searchTerm)) {
        const li = document.createElement('li');
        li.textContent = item.title;
        li.addEventListener('click', () => {
          window.location.href = item.link;
        });
        searchResults.appendChild(li);
      }
    });

    searchResults.style.display = 'block';
  } else {
    searchResults.style.display = 'none';
  }
});

</script>
