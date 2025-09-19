
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/styles.css">

    <!--cwms links-->
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

    <!-- CSS Libraries -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
<div class="nav-bar">
    <div class="container">
        <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
            <a href="#" class="navbar-brand">MENU</a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav mr-auto">
                    <a id="nav" href="../views/index.php" class="nav-item nav-link active">Home</a>
                    <a id="nav" href="../sidenav/service.php" class="nav-item nav-link">Services</a>
                    <a id="nav" href="../sidenav/contact.php" class="nav-item nav-link">Contact</a>
                    <a id="nav" href="../sidenav/about.php" class="nav-item nav-link">About</a>
                    <a id="nav" href="../admin/admin-login.php" class="nav-item nav-link">Admin</a>
                </div>
                <div class="ml-auto">
                    <a class="btn btn-custom" href="../sidenav/contact.php">Get Appointment</a>
                </div>
            </div>
        </nav>
    </div>
</div>
<!-- Nav Bar End -->
<link rel="stylesheet" href="../assets/styles.css">


<div class="page-header" style="margin-top: 0px;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>Contact</h2>
            </div>
            <div class="col-12">
                <a href="../views/index.php">Home</a>
                <a href="./contact.php">Contact</a>
            </div>
        </div>
    </div>
</div>
<hr><br>

<div class="contact">
    <div class="container">
        <div class="section-header text-center">
            <p>Get In Touch</p>
            <h2>Contact for any query</h2>
        </div>
        <div class="row">


            <div class="col-md-4">
                <div class="contact-info">
                    <h2>Quick Contact Info</h2>

                    <div class="contact-info-item">
                        <div class="contact-info-icon">
                            <i class="fa fa-map-marker-alt"></i>
                        </div>
                        <div class="contact-info-text">
                            <h3>Address</h3>
                            <p>+Paterno St. Tacloban CIty</p>
                        </div>
                    </div>


                    <div class="contact-info-item">
                        <div class="contact-info-icon">
                            <i class="far fa-clock"></i>
                        </div>
                        <div class="contact-info-text">
                            <h3>Opening Hour</h3>
                            <p>Mon - Fri, 9:00 AM - 9:00 PM</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-info-icon">
                            <i class="fa fa-phone-alt"></i>
                        </div>
                        <div class="contact-info-text">
                            <h3>Call Us</h3>
                            <p>+9123456789</p>
                        </div>
                    </div>
                    <div class="contact-info-item">
                        <div class="contact-info-icon">
                            <i class="far fa-envelope"></i>
                        </div>
                        <div class="contact-info-text">
                            <h3>Email Us</h3>
                            <p>123@123.com</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="contact-form">
                    <div id="success"></div>
                    <form name="sentMessage" id="contactForm" action="../page/contact-handler.php?function=sendSMS" method="post">
                        <div class="control-group">
                            <input type="text" class="form-control" id="name" placeholder="Your Name" required="required" name="name"><br>

                        </div>
                        <div class="control-group">
                            <input type="email" class="form-control" id="email" placeholder="Your Email" name="email" required="required"> <br>

                        </div>
                        <div class="control-group">
                            <input type="text" class="form-control" id="subject" placeholder="Subject" required="required" name="subject"> <br>

                        </div>
                        <div class="control-group">
                            <textarea class="form-control" id="message" placeholder="Message" required="required" name="message"></textarea><br>

                        </div>
                        <div>
                            <button class="btn btn-custom" type="submit" id="sendMessageButton" name="submit">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


<!-- Footer Start -->
<div class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
            </div>

        </div>
    </div>
    <div class="container copyright">
        <p>&copy; 2025/Sep/Fri Carwash Management System</p>
    </div>
</div>
<!-- Footer End -->


</body>

</html><div class=""></div>