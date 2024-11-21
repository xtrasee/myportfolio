<?php require('mail.php'); ?>

<?php
$response= '';

if (isset($_POST['submit'])) {
    if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message'])) {
        $response = "All fields are required";
    } else {
        $mail_sent = sendMail($_POST['name'], $_POST['email'], $_POST['message']);

        if ($mail_sent) {
            $response = "success";
        } else {
            $response = "error";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Contact</title>
    <link rel="icon" href="/img/favicon.png" type="image/x-icon">
</head>
<body>

    <div class="wrapper">
        <header>
            <div class="menu-wrap">
                <input type="checkbox" class="toggler">
                <div class="hamburger"><div></div></div>
                <div class="menu">
                    <div>
                        <div>
                            <nav class="navbar">    
                                <ul class="navbar-nav" id="navbar">
                                    <li class="nav-item"><a href="/index.html">Home</a></li> 
                                    <li class="nav-item"><a href="/about.html">About</a></li> 
                                    <li class="nav-item"><a href="/work.html">Work</a></li> 
                                    <li class="nav-item active"><a href="/contact.php">Contact</a></li>
                                    <label class="ui-switch">
                                        <input type="checkbox" id="theme-button">
                                        <div class="slider">
                                          <div class="circle"></div>
                                        </div>
                                    </label>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    
        <main>
            <div class="page-container">
                <section class="contact">
                    <div class="contact-heading">
                        <h1>Contact.</h1>
                        <p>Get in touch or email me directly at thn018@ucsd.edu</p>
                    </div>
    
                    <div class="form input-wrapper">
                        <form method="POST" action="" enctype="multipart/form-data" id="contactForm">
                            <div class="form-row">
                                <input type="text" id="name" name="name" placeholder="Name" class="input" required>
                    
                                <input type="email" id="email" name="email" placeholder="Email" class="input" required>
                            </div>
                    
                            <textarea id="message" name="message" rows="4" placeholder="Message" class="input" required></textarea>
                            
                            <div class="submit-button">
                                <button type="submit" name="submit">Send Message</button>
                            </div>
                            
                            <?php
                                if(@$response == "success"){
                                    echo "<script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                Swal.fire({
                                                    title: 'If you could see my face right now, you would see gratitude.',
                                                    width: 600,
                                                    padding: '3em',
                                                    color: '#716add',
                                                    background: '#FAE7F3',
                                                    backdrop: 'rgba(0,0,123,0.4) url(/img/bob.jpeg) left top no-repeat'
                                                });
                                            });
                                        </script>";
                                } elseif ($response!= '') {
                                    echo "<script>
                                            document.addEventListener('DOMContentLoaded', function() {
                                                Swal.fire({
                                                    title: 'Error!',
                                                    text: 'Something went wrong. Please try again.',
                                                    icon: 'error',
                                                    confirmButtonText: 'Okay'
                                                });
                                            });
                                        </script>";
                                }
                            ?>

                        </form>
                    </div>
                </section>
            </div>
            
        </main>
    
        <footer>
            <div class="left-footer">
                <img src="/img/pom.png" alt="" height="100">
                <p class="copyright">&copy 2024 Tracy Nguyen.</p>
            </div>
            <div class="social-container">
                <div class="socials">
                    <p>Elsewhere</p>
                    <a href="https://github.com/xtrasee">Github</a>
                    <a href="https://www.linkedin.com/in/tracyhnguy/">LinkedIn</a>
                    <a href="https://www.instagram.com/xtrasee/">Instagram</a>
                    <a href="https://discord.gg/Z37FgdjB">Discord</a>
                    <a href="https://www.facebook.com/nguywen.tracy/">Facebook</a>
                </div>
                <div class="message">
                    <p>Contact</p>
                    <a href="mailto:thn018@ucsd.edu?subject=Inquiry">Message</a>
                </div>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://kit.fontawesome.com/1ded1ed97d.js" crossorigin="anonymous"></script>
    <script src="script.js"></script>
</body>
</html>