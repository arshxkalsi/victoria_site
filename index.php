<?php
// Connect to the database
$mysqli = new mysqli("localhost", "root", "", "week14");

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Fetch data from the database
$sql = "SELECT * FROM victoria_content";
$result = $mysqli->query($sql);

// Close connection
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .jumbotron {
            background-image: url('https://upload.wikimedia.org/wikipedia/commons/thumb/0/06/British_Columbia_Parliament_Buildings_-_Pano_-_HDR.jpg/1200px-British_Columbia_Parliament_Buildings_-_Pano_-_HDR.jpg');
            background-size: cover;
            color: white;
            text-align: center;
            padding: 100px;
            margin-bottom: 0;
        }
        .navbar {
            background-color: #343a40;
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: white !important;
        }
        .navbar-toggler-icon {
            background-color: white;
        }
        .section-title {
            margin-top: 80px;
        }
    </style>
    <title>Victoria Tourism</title>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Victoria Tourism</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Welcome Section -->
    <?php if ($result && $result->num_rows > 0) { 
        $row = $result->fetch_assoc(); ?>
        <section id="home">
            <div class="jumbotron">
                <h1 class="display-4"><?php echo $row["title"]; ?></h1>
                <p class="lead"><?php echo $row["description"]; ?></p>
            </div>
        </section>
    <?php } ?>

    <!-- Other Sections -->
    <?php if ($result && $result->num_rows > 1) { ?>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <section>
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="section-title"><?php echo $row["title"]; ?></h2>
                            <p><?php echo $row["description"]; ?></p>
                        </div>
                        <div class="col-md-6">
                            <!-- Add images or other content for the right column if needed -->
                        </div>
                    </div>
                </div>
            </section>
        <?php } ?>
    <?php } ?>

    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <h2 class="section-title">Contact Us</h2>
            <p>For inquiries and information, please contact us using the form below:</p>
            <form action="submit_form.php" method="post">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Your Name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Your Email">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="3" placeholder="Your Message"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </section>

    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
