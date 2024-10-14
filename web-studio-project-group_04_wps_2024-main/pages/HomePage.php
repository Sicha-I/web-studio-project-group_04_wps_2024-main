<?php include 'includes/header.php'; ?>
<!-- Main page content -->
<div class="container">
    <h1>Welcome to YoungHelp!</h1>
    <button>JOIN NOW</button>
    <h2>Select Your Area of Internship</h2>
    <div class="internships">
        <button>Cybersecurity</button>
        <button>Data Analytic</button>
        <button>Information technology</button>
        <button>Engineering</button>
        <button>Business</button>
        <button>Media</button>
        <button>Database Admin</button>
        <button>IT Support</button>
        <button>Barista</button>
        <!-- Add more buttons here -->
    </div>
    <h2>Meet Our Mentors</h2>
    <div class="mentors">
        <?php
        $db = new SQLite3('db/database.sqlite');
        $result = $db->query('SELECT * FROM mentors');
        while ($row = $result->fetchArray()) {
            echo "<div class='mentor'>";
            echo "<img src='assets/images/mentor_{$row['id']}.jpg' alt='{$row['name']}'>";
            echo "<h3>{$row['name']}</h3>";
            echo "<p>{$row['specialization']}</p>";
            echo "</div>";
        }
        ?>
    </div>
</div>
<?php include 'includes/footer.php'; ?>
