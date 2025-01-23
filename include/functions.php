<?php
include_once 'db.php'; 
$envFile = __DIR__ . '/../.env';
if (file_exists($envFile)) {
    $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) { // Skip comments
            continue;
        }
        list($name, $value) = explode('=', $line, 2);
        putenv(trim($name) . '=' . trim($value));
    }
} else {
    die('.env file not found.');
}

// Function to add an blog
function addBlog() {
    global $conn;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        // Get form data
        $blogHeading = $_POST['blogHeading'];
        $blogURL = $_POST['blogURL'];
        $blogParagraph = $_POST['blogParagraph'];
        $blogMessage = $_POST['blogMessage']; // Rich text content

        // Insert blog details into the database
        $stmt = $conn->prepare("INSERT INTO blog (blogHeading, blogURL, blogParagraph, blogMessage) VALUES(?, ?, ?, ?)");
        if (!$stmt) {
            echo "<div class='alert alert-danger' role='alert'>Error preparing query: " . $conn->error . "</div>";
            return;
        }

        $stmt->bind_param("ssss", $blogHeading, $blogURL, $blogParagraph, $blogMessage);

        if ($stmt->execute()) {
            $blogId = $stmt->insert_id; // Get the auto-incremented ID for the new post
            echo "<div class='alert alert-success' role='alert'>blog added successfully with ID: $blogId</div>";

            // Check if an image file is uploaded
            if (isset($_FILES['blogImage']) && $_FILES['blogImage']['error'] == 0) {
                $blogImage = $_FILES['blogImage'];
                $imageExtension = pathinfo($blogImage['name'], PATHINFO_EXTENSION);
                $imageName = "blog" . $blogId . "." . $imageExtension;
                $targetDirectory = "../images/blog/";
                $targetFile = $targetDirectory . $imageName;

                // Create the directory if it doesn't exist
                if (!file_exists($targetDirectory)) {
                    mkdir($targetDirectory, 0777, true);
                }

                // Move the uploaded file to the target directory
                if (move_uploaded_file($blogImage['tmp_name'], $targetFile)) {
                    // Update the blog record with the image name
                    $updateImageStmt = $conn->prepare("UPDATE blog SET blogImage = ? WHERE id = ?");
                    $updateImageStmt->bind_param("si", $imageName, $blogId);
                    $updateImageStmt->execute();
                    $updateImageStmt->close();

                    echo "<div class='alert alert-success' role='alert'>Blog image uploaded successfully.</div>";

                    header("Refresh: 5; url=add-blog.php");
                    

                } else {
                    echo "<div class='alert alert-danger' role='alert'>Error uploading the blog image.</div>";
                }
            } else {
                echo "<div class='alert alert-warning' role='alert'>No file uploaded or file upload error, blog added without an image.</div>";
            }
        } else {
            echo "<div class='alert alert-danger' role='alert'>Error adding blog: " . $stmt->error . "</div>";
        }

        $stmt->close();
    }
}







// Function to view blog
function viewBlogTable() {
    global $conn;

    if (!$conn) {
        echo "<div class='alert alert-danger' role='alert'>Database connection is not established.</div>";
        return;
    }

    $query = "SELECT * FROM blog";
    $result = $conn->query($query);

    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $blogId = $row['id'];
            $blogHeading = htmlspecialchars($row['blogHeading']);
            $blogParagraph = htmlspecialchars($row['blogParagraph']);
            $dateCreated = date('d/m/Y', strtotime($row['created_at']));
            $blogMessage = htmlspecialchars($row['blogMessage']);
            $blogImageLink = htmlspecialchars($row['blogImage']);
            
            
            echo "<tr>
                    <td class='py-3 col'>$blogId</td>
                    <td class='py-3 col'>$blogHeading</td>
                    <td class='py-3 col'>$blogParagraph</td>
                    <td class='py-3 col'>$dateCreated</td>
                    <td class='py-3 col'><a href='../images/blog/$blogImageLink'>View</a></td>
                    <td class='py-3 col'>$blogMessage</td>
                    <td class='py-3 col'>
                        <a href='?deleteblog=$blogId' class='pe-lg-3 p-2 me-lg-2 text-white bg-danger d-inline-block mb-3 text-center'>
                            <i class='fa-regular fa-trash px-2'></i>Delete
                        </a>
                    </td>
                </tr>";
        }
        $result->free();
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error retrieving blog: " . $conn->error . "</div>";
    }
}

// Function to delete an blog
function deleteBlog() {
    global $conn;

    if (!$conn) {
        echo "<div class='alert alert-danger' role='alert'>Database connection is not established.</div>";
        return;
    }

    if (isset($_GET['deleteblog'])) {
        $blogId = intval($_GET['deleteblog']);
        
        echo "<script>
                if (confirm('Are you sure you want to delete this blog?')) {
                    window.location.href = '?confirmedDeleteblog=$blogId';
                } else {
                    window.location.href = '?blogNotDeleted';
                }
              </script>";
    }

    // Handling the confirmed deletion
    if (isset($_GET['confirmedDeleteblog'])) {
        $blogId = intval($_GET['confirmedDeleteblog']);

        // Fetch the blog cover image name first
        $selectQuery = "SELECT blogImage FROM blog WHERE id = ?";
        if ($stmt = $conn->prepare($selectQuery)) {
            $stmt->bind_param("i", $blogId);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result) {
                $row = $result->fetch_assoc();
                $blogImage = $row['blogImage'];
                $stmt->close();

                // Delete the record from the database
                $deleteQuery = "DELETE FROM blog WHERE id = ?";
                if ($stmt = $conn->prepare($deleteQuery)) {
                    $stmt->bind_param("i", $blogId);
                    if ($stmt->execute()) {
                        // If the deletion was successful, remove the file from the folder
                        if ($blogImage) {
                            $filePath = "../images/blog/" . $blogImage;
                            if (file_exists($filePath)) {
                                if (unlink($filePath)) {
                                    echo "<div class='alert alert-success' role='alert'>blog and file deleted successfully.</div>";

                                    header("Location: view-blog.php");
                                    exit;
                                } else {
                                    echo "<div class='alert alert-danger' role='alert'>Error deleting the file.</div>";
                                }
                            } else {
                                echo "<div class='alert alert-warning' role='alert'>File does not exist: $filePath</div>";
                            }
                        } else {
                            echo "<div class='alert alert-warning' role='alert'>No file to delete for this blog.</div>";
                        }
                    } else {
                        echo "<div class='alert alert-danger' role='alert'>Error deleting blog: " . $conn->error . "</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger' role='alert'>Prepare failed: " . $conn->error . "</div>";
                }
            } else {
                echo "<div class='alert alert-danger' role='alert'>Error retrieving blog details: " . $conn->error . "</div>";
            }
        } else {
            echo "<div class='alert alert-danger' role='alert'>Prepare failed: " . $conn->error . "</div>";
        }
    }
}




function getRandomblog($limit = 10) {
    global $conn;

    if (!$conn) {
        echo "<div class='alert alert-danger' role='alert'>Database connection is not established.</div>";
        return [];
    }

    $query = "SELECT * FROM blog ORDER BY RAND() LIMIT ?";
    
    if ($stmt = $conn->prepare($query)) {
        // Bind parameters
        $stmt->bind_param("i", $limit);
        
        // Execute and fetch results
        $stmt->execute();
        $result = $stmt->get_result();
        $blog = $result->fetch_all(MYSQLI_ASSOC);
        $stmt->close();

        return $blog;
    } else {
        echo "<div class='alert alert-danger' role='alert'>Prepare failed: " . $conn->error . "</div>";
        return [];
    }
}


function getblogOptions() {
    global $conn;

    $query = "SELECT customblogId, blogHeading, blogParagraph FROM blog";
    $result = mysqli_query($conn, $query);

    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $blogId = $row['customblogId'];
            $blogHeading = $row['blogHeading'];
            $blogParagraph = $row['blogParagraph'];
            $optionText = "$blogParagraph, $blogHeading";
            
            echo "<option value='$blogId'>$optionText</option>";
        }
        mysqli_free_result($result);
    } else {
        echo "<option disabled>No blog found</option>";
    }
}











function handleLogin() {
    if (isset($_POST['login'])) {
        $usernameOrEmail = trim($_POST['email']);
        $password = trim($_POST['password']);
        
        if (($usernameOrEmail === 'nemc1' || $usernameOrEmail === 'nemc1@memconsults.com') && $password === 'A293jshr4!.') {
            // Start the session and redirect to the admin panel
            session_start();
            $_SESSION['loggedIn'] = true;
            header("Location: admin/");
            exit();
        } else {
            // Show an alert for wrong credentials
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                    Wrong credentials. Please try again.
                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
        }
    }
}

function checkAdminSession() {
    session_start();

    if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] !== true) {
        header("Location: ../signin.php");
        exit();
    }
}

function handleLogout() {
    session_start();
    
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the login page
    header("Location: ../signin.php");
    exit();
}
