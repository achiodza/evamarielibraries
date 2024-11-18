<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Eva Marie Libraries : Edit Book
  </title>
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <style>
        /* Simple loader styles */
        #loader {
            display: none;
            border: 8px solid #f3f3f3;
            border-radius: 50%;
            border-top: 8px solid #3498db;
            width: 50px;
            height: 50px;
            animation: spin 2s linear infinite;
            margin: 20px auto;
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    </style>
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="" target="_blank">
        <img src="../assets/img/logos.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Eva Marie Libraries</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <?php include './includes/navheader.php'; ?>
    
    
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  
  <div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-info shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Edit Book Data</h6>
                            </div>
                        </div>
                        <div class="card-body">
    <form id="bookForm" class="text-start">
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group input-group-outline">
                    <label class="form-label"></label>
                    <input type="text" id="title" name="title" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group input-group-outline">
                    <label class="form-label"></label>
                    <input type="text" id="author" name="author" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group input-group-outline">
                    <label class="form-label"></label>
                    <input type="text" id="genre" name="genre" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group input-group-outline">
                    <label class="form-label"></label>
                    <input type="text" id="language" name="language" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group input-group-outline">
                    <label class="form-label"></label>
                    <input type="number" id="pages" name="pages" class="form-control" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group input-group-outline">
                    <label class="form-label"></label>
                    <input type="text" id="publicationDate" name="publicationDate" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
            <div class="input-group input-group-outline">
                <label class="form-label"></label>
                <input type="number" step="0.1" id="rating" name="rating" class="form-control" required min="0" max="5">
            </div>

            </div>
            <div class="col-md-6">
                <div class="input-group input-group-outline">
                    <label class="form-label">Number of Books Present:</label>
                    <input type="number" id="timesBorrowed" name="timesBorrowed" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group input-group-outline">
                    <label class="form-label"></label>
                    <textarea placeholder="Description" id="description" name="description" class="form-control" required></textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="input-group input-group-outline">
                    <label class="form-label"></label>
                    <input type="file" id="coverImage" name="coverImage" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="input-group input-group-outline">
                    <label class="form-label"></label>
                    <select id="availability" name="availability" class="form-control" required>
                        <option value="">Select Availability</option>
                        <option value="true">Available</option>
                        <option value="false">Not Available</option>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
                <div class="input-group input-group-outline">
                    <label class="form-label"></label>
                    <input type="text" id="isbn" name="isbn" class="form-control" required>
                </div>
            </div>

        </div>
        <div id="loader"></div>

        <div class="text-center">
            <button type="submit" class="btn bg-gradient-info w-50 my-4 mb-2">Submit</button>
        </div>
    </form>
    
</div>

                      
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer py-4">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-lg-between">
                <div class="col-lg-6 mb-lg-0 mb-4">
                    
                </div>
                <div class="col-lg-6">
                    <ul class="nav nav-footer justify-content-center justify-content-lg-end">
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</div>
<script>
 document.addEventListener('DOMContentLoaded', () => {
    // Retrieve book data from localStorage
    const bookData = JSON.parse(localStorage.getItem('editBook'));

    if (bookData) {
        // Populate form fields with book data
        document.getElementById('title').value = bookData.title;
        document.getElementById('author').value = bookData.author;
        document.getElementById('genre').value = bookData.genre;
        document.getElementById('language').value = bookData.language;
        document.getElementById('pages').value = bookData.pages;
        document.getElementById('publicationDate').value = bookData.publicationDate;
        document.getElementById('rating').value = bookData.rating;
        document.getElementById('timesBorrowed').value = bookData.timesBorrowed;
        document.getElementById('description').value = bookData.description;
        document.getElementById('availability').value = bookData.availability ? "true" : "false";
        document.getElementById('isbn').value = bookData.isbn;
    } else {
        console.error('No book data found in localStorage');
    }
});


        document.getElementById('bookForm').addEventListener('submit', async function(event) {
            event.preventDefault();

            // Show the loader
            document.getElementById('loader').style.display = 'block';

            // Disable the submit button to prevent multiple submissions
            const submitButton = event.target.querySelector('button[type="submit"]');
            submitButton.disabled = true;

            // Get form data
            const formData = new FormData();
            formData.append('files', document.getElementById('coverImage').files[0]);

            let coverImageId;

            try {
                // Upload image
                const imageResponse = await fetch('https://admin.evamarielibraries.org/api/upload', {
                    method: 'POST',
                    headers: {
                        'Authorization': 'Bearer 21cacb682481947a85cdb07d7d32580647e58194e373e7287ed4f3a0d4a0101a32080ddc785d8b457509fee2461349f13ae7cfda32837b701cbec6293e4ba92d01613460bf157bb23a161edd2d771f1f783df3fe02d8cda7a83c5d25bc63a04b6f377bed081a8aefa45271d872544fd77755c16c4b042964dae96ff58b4550de',
                    },
                    body: formData
                });

                if (!imageResponse.ok) {
                    throw new Error('Image upload failed');
                }

                const imageData = await imageResponse.json();
                coverImageId = imageData[0].id;

                // Prepare book data
                const bookData = {
                    title: document.getElementById('title').value,
                    author: document.getElementById('author').value,
                    description: document.getElementById('description').value,
                    availability: document.getElementById('availability').value === 'true',
                    coverImage: coverImageId,
                    genre: document.getElementById('genre').value,
                    language: document.getElementById('language').value,
                    pages: document.getElementById('pages').value,
                    publicationDate: document.getElementById('publicationDate').value,
                    rating: document.getElementById('rating').value,
                    timesBorrowed: document.getElementById('timesBorrowed').value,
                    isbn: document.getElementById('isbn').value
                };

                // Send book data
                const bookResponse = await fetch('https://admin.evamarielibraries.org/api/books-metas/', {
                    method: 'PUT',
                    headers: {
                        'Authorization': 'Bearer 8a751582219d16d9a8a64c10e4b419b9763acb0f90d3b1dcf9ab978308ff4c5585ee8b2fb516b57c86646d2620afe2acff22194957bb09fceccb71e8cbec9850c710eb3c4aecb0257e5839e5235c960e11d3444edd60e0b00e7681d912c5b3d55013f9207d52ee111dc81d861f972e7b5cd25628a8c2f9dba50cceec04dfed25',
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ data: bookData })
                });

                if (!bookResponse.ok) {
                    throw new Error('Book meta submission failed');
                }

                // Success: Clear the form and provide feedback
                document.getElementById('bookForm').reset();
                alert('Book submitted successfully!');

            } catch (error) {
                console.error('Error submitting the form:', error);
                alert('There was an error submitting the form.');
            } finally {
                // Hide the loader and re-enable the submit button
                document.getElementById('loader').style.display = 'none';
                submitButton.disabled = false;
            }
        });
</script>



  </main>
  
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>