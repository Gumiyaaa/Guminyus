<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guminyus</title>
    <link rel="stylesheet" href="path/to/bootstrap.min.css">
    <style>
        body {
            padding-top: 70px; /* Adjust the padding to match the height of your navbar */
            background-color: #f8f9fa; /* Optional: add a light background color */
        }

        .navbar {
            background-color: #000000; /* Black background for navbar */
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Add subtle shadow for depth */
        }

        .navbar-brand img {
            height: 50px; /* Ensure the logo height is consistent */
        }

        .navbar-nav .nav-item .nav-link {
            color: #ffffff; /* White text for nav links */
            font-weight: 500; /* Slightly bolder font for readability */
            transition: color 0.3s; /* Smooth transition for hover effect */
        }

        .navbar-nav .nav-item .nav-link:hover {
            color: #adb5bd; /* Lighter gray for hover effect */
        }

        .btn-contributor {
            color: #ffffff; /* White text for button */
            border: 1px solid #ffffff; /* White border for button */
            margin-left: 20px; /* Add margin to separate the button from the other nav items */
            border-radius: 30px; /* Rounded button */
            padding: 5px 15px; /* Add padding for button */
            font-weight: 500; /* Slightly bolder font */
            transition: background-color 0.3s, color 0.3s; /* Smooth transition for hover effect */
        }

        .btn-contributor:hover {
            color: #000000; /* Black text for hover effect */
            background-color: #ffffff; /* White background for hover effect */
        }

        /* Add responsive styles if necessary */
        @media (max-width: 767px) {
            .navbar-nav {
                text-align: center;
            }

            .btn-contributor {
                margin-top: 10px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="images/Logo.png" alt="Guminyus Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="about-us.php">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">News</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact-us.php">Contact Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-contributor" href="https://guminyus.000webhostapp.com/admin">Maukah Menjadi Kontributor Artikel Kami?</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <script src="path/to/jquery.min.js"></script>
    <script src="path/to/bootstrap.bundle.min.js"></script>
</body>
</html>
