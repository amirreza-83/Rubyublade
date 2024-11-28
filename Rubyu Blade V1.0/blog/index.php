<!--# pb Amirreza nemati - aynar TM-->
<?php
// اتصال به پایگاه داده
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_system";

$conn = new mysqli($servername, $username, $password, $dbname);

// بررسی اتصال
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// تعداد پست‌ها در هر صفحه
$posts_per_page = 7;

// دریافت شماره صفحه از URL (اگر موجود باشد)
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$offset = ($page - 1) * $posts_per_page;

// دریافت تعداد کل پست‌ها
$sql_count = "SELECT COUNT(*) AS total_posts FROM blog_posts";
$result_count = $conn->query($sql_count);
$row_count = $result_count->fetch_assoc();
$total_posts = $row_count['total_posts'];

// محاسبه تعداد صفحات
$total_pages = ceil($total_posts / $posts_per_page);

// دریافت پست‌ها برای صفحه جاری
$sql = "SELECT title, description, download_link, image_link FROM blog_posts LIMIT $posts_per_page OFFSET $offset";
$result = $conn->query($sql);
?>

<!--# pb Amirreza nemati - aynar TM-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="description" content="وبسایت روبیو بلید">
    <meta name="keywords" content="روبیو بلید , rubyu blade , amirreza83 , aynar tm , تیم اینار , گیم , گیم استدیو روبیو , روبیو گیمز , روبیو گیم">
    <meta name="author" content="Ayanr TM - تیم توسعه اینار">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:title" content="Rubyu Blade - Home">
    <meta property="og:description" content="Rubyu Blade computer game development team website">
    <meta property="og:image" content="https://imgurl.ir/uploads/c263263_rubyu_blade.png">
    <meta property="og:url" content="https://aynar.xyz">
    <meta property="og:type" content="website">
    <meta name="twitter:title" content="Rubyu Blade - Home">
    <meta name="twitter:description" content="Rubyu Blade computer game development team website">
    <meta name="twitter:image" content="https://imgurl.ir/uploads/c263263_rubyu_blade.png">
    <meta name="twitter:card" content="summary_large_image">
    <link rel="icon" href="https://imgurl.ir/uploads/c263263_rubyu_blade.png" type="image/x-icon">
    <meta charset="UTF-8">
    <title>Rubyu Blog</title>
    <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="blog.css">
</head>
<body>
    <div class="background">
        <header>
            <div class="logo">
                <a href="/index.php"><h1>Rubyu blade</h1></a>
            </div>
            <nav class="nav-desktop">
                <a href="../pages/About.php">About Us</a>
                <a href="../pages/Contact.php">Contact</a>
                <a href="../blog/">Blog</a>
            </nav>
            <!-- منوی موبایل -->
            <div class="hamburger" id="hamburger">
                <div class="line"></div>
                <div class="line"></div>
                <div class="line"></div>
            </div>
            <nav class="nav-mobile" id="nav-mobile">
                <a href="../pages/About.php">About Us</a>
                <a href="../pages/Contact.php">Contact</a>
                <a href="../blog/">Blog</a>
            </nav>
        </header>
        <section class="hero">
            <h1><b><br></b><h3>BLOG</h3></h1>
        </section>
    </div>
    <div class="container">
        <?php
        // بررسی اینکه داده‌ای وجود دارد یا خیر
        if ($result->num_rows > 0) {
            // ایجاد کارت برای هر رکورد
            while ($row = $result->fetch_assoc()) {
                echo "<div class='post'>";
                echo "<img src='" . htmlspecialchars($row['image_link']) . "' alt='تصویر پست'>";
                echo "<h2>" . htmlspecialchars($row['title']) . "</h2>";
                echo "<p>" . htmlspecialchars($row['description']) . "</p>";
                echo "<a href='" . htmlspecialchars($row['download_link']) . "' target='_blank'>More</a>";
                echo "</div>";
            }
        } else {
            echo "<p>هیچ پستی برای نمایش وجود ندارد.</p>";
        }
        ?>
    </div>

    <!-- لینک‌های صفحه‌بندی -->
    <div class="pagination">
        <?php
        // لینک به صفحه قبلی
        if ($page > 1) {
            echo "<a href='?page=" . ($page - 1) . "'>قبلی</a>";
        }

        // لینک به صفحات بعدی
        for ($i = 1; $i <= $total_pages; $i++) {
            if ($i == $page) {
                echo "<span class='current-page'>$i</span>";
            } else {
                echo "<a href='?page=$i'>$i</a>";
            }
        }

        // لینک به صفحه بعدی
        if ($page < $total_pages) {
            echo "<a href='?page=" . ($page + 1) . "'>بعدی</a>";
        }
        ?>
    </div>
    <script src="script.js"></script>
    <br>
    <footer id="contact">
        <p>Contact Us: info@aynar.xyz</p>
        <a href="https://www.aynar.xyz"><p>&copy; 2020 - 2024 Rubyu blade - All Rights Reserved.</p></a>
    </footer>
</body>
</html>

<?php
// بستن اتصال
$conn->close();
?>
