<?php include('layout/_header.php');?>

<div class="container">
        <div class="p-5 text-center rounded-3 mt-5">
            <h1 class="color-webcreate fw-bold hero-title position-relative display-3">Register</h1>
        </div>
    </div>

    <div class="bg-webcreate marketing">
        <div class="container">
          <div class="row featurette">
            <div class="col-12 d-flex flex-column align-items-center">
              <form class="row g-3" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" id="myForm">
                <div class="col-12">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="col-12">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <!-- <div class="col-12">
                    <label for="place_of_birth" class="form-label">Place of Birth:</label>
                    <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" required>
                </div>
                <div class="col-12">
                    <label for="school" class="form-label">School:</label>
                    <input type="text" class="form-control" id="school" name="school" required>
                </div> -->
                <div class="col-12">
                    <label for="contact_info" class="form-label">Contact Info:</label>
                    <input type="number" class="form-control" id="contact_info" name="contact_info" required>
                </div>
                <div class="col-12">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="col-12">
                    <label for="confirm_password" class="form-label">Confirm Passowrd:</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                </div>
                <?php
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $username = $_POST["username"];
                    $email = $_POST["email"];
                    $place_of_birth = " ";
                    $school = " ";
                    $contact_info = $_POST['contact_info'];
                    $image = "";
                    $password = $_POST["password"];
                    $confirm_password = $_POST["confirm_password"];

                    if ($password != $confirm_password) {
                        echo "Passwords do not match. Please try again.";
                    } else {
                        $host = "localhost";
                        $db_username = "root";
                        $db_password = "";
                        $db_name = "webcreatesystem";
                        $mysqli = new mysqli($host, $db_username, $db_password, $db_name);

                        if ($mysqli->connect_error) {
                            die("Connection failed: " . $mysqli->connect_error);
                        }
                        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                        $query = "INSERT INTO users (username, email, place_of_birth, school, contact_info, password, image) VALUES (?, ?, ?, ?, ?, ?, ?)";
                        $stmt = $mysqli->prepare($query);
                        $stmt->bind_param("sssssss", $username, $email, $place_of_birth, $school, $contact_info, $hashed_password, $image);
                        if ($stmt->execute()) {
                            echo "Registration successful!<br>";
                            echo "Username: $username<br>";
                            echo "Email: $email<br>";
                            echo '<script>setTimeout(function(){window.location.href="login.php";}, 3000);</script>';
                        } else {
                            echo "Error: " . $stmt->error;
                        }

                        $stmt->close();
                        $mysqli->close();
                    }
                }
                ?>
                <div class="col-12">
                  <button type="submit" class="btn btn-primary w-100">Submit</button>
                </div>
              </form>
            </div>
            <hr class="featurette-divider" />
          </div>
        </div>
    </div>
    <script>
        document.getElementById('myForm').addEventListener('submit', function(event) {
            var usernameInput = document.getElementById('username');
            var passwordInput = document.getElementById('password');
            var usernameValue = usernameInput.value;
            var passwordValue = passwordInput.value;

            var lettersOnlyRegex = /^[a-zA-Z]+$/;
            var uppercaseRegex = /[A-Z]/;
            var numberRegex = /\d/;

            if (!lettersOnlyRegex.test(usernameValue)) {
                alert('Please enter only letters in the username field.');
                event.preventDefault();
            }

            if (passwordValue.length < 6) {
                alert('Password must be at least 6 characters long.');
                event.preventDefault();
            } else if (!uppercaseRegex.test(passwordValue) || !numberRegex.test(passwordValue)) {
                alert('Password must contain at least one uppercase letter and one number.');
                event.preventDefault();
            }

        });
    </script>

<?php include('layout/_footer.php');?>
