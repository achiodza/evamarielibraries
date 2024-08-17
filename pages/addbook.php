<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Eva Marie Libraries : Add Book
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
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard " target="_blank">
        <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Eva Marie Libraries</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <?php include './includes/navheader.php'; ?>
    
    
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
  

 
  



  <!-- Tables for Borrowing History -->
  <div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-info shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Submit Book Data</h6>
                            </div>
                        </div>
                        <div class="card-body w-50">
                          <form id="bookForm" class="text-start">
                              <div class="input-group input-group-outline mb-3">
                                  <label class="form-label">Title:</label>
                                  <input type="text" id="title" name="title" class="form-control" required>
                              </div>
                              <div class="input-group input-group-outline mb-3">
                                  <label class="form-label">Author:</label>
                                  <input type="text" id="author" name="author" class="form-control" required>
                              </div>
                              <div class="input-group input-group-outline mb-3">
                                  <label class="form-label"></label>
                                  <textarea placeholder="Description" id="description" name="description" class="form-control" required></textarea>
                              </div>
                              <div class="input-group input-group-outline mb-3">
                                <label class="form-label"></label>
                                <input type="file" id="coverImage" name="coverImage" class="form-control" required>
                            </div>
                              <div class="input-group input-group-outline mb-3">
                                  <label class="form-label">Availability:</label>
                                  <select id="availability" name="availability" class="form-control" required>
                                    <option value=""></option>
                                    <option value="true">Available</option>
                                    <option value="false">Not Available</option>
                                  </select>
                              </div>
                              <div class="input-group input-group-outline mb-3">
                                  <label class="form-label">Genre:</label>
                                  <input type="text" id="genre" name="genre" class="form-control" required>
                              </div>
                              <div class="input-group input-group-outline mb-3">
                                  <label class="form-label">Language:</label>
                                  <input type="text" id="language" name="language" class="form-control" required>
                              </div>
                              <div class="input-group input-group-outline mb-3">
                                  <label class="form-label">Pages:</label>
                                  <input type="number" id="pages" name="pages" class="form-control" required>
                              </div>
                              <div class="input-group input-group-outline mb-3">
                                  <label class="form-label">Publication Date:</label>
                                  <input type="text" id="publicationDate" name="publicationDate" class="form-control" required>
                              </div>
                              <div class="input-group input-group-outline mb-3">
                                  <label class="form-label">Rating:</label>
                                  <input type="number" step="0.1" id="rating" name="rating" class="form-control" required>
                              </div>
                              <div class="input-group input-group-outline mb-3">
                                  <label class="form-label">Times Borrowed:</label>
                                  <input type="number" id="timesBorrowed" name="timesBorrowed" class="form-control" required>
                              </div>
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
  document.getElementById('bookForm').addEventListener('submit', async function(event) {
      event.preventDefault();

      const form = event.target;
      const title = sanitize(form.title.value);
      const author = sanitize(form.author.value);
      const description = sanitize(form.description.value);
      const coverImageFile = form.coverImage.files[0];  // Get the selected file
      const availability = form.availability.value === 'true';
      const genre = sanitize(form.genre.value);
      const language = sanitize(form.language.value);
      const pages = sanitize(form.pages.value);
      const publicationDate = sanitize(form.publicationDate.value);
      const rating = sanitize(form.rating.value);
      const timesBorrowed = sanitize(form.timesBorrowed.value);

      try {
          // Step 1: Upload the cover image
          const formData = new FormData();
          formData.append('files', coverImageFile);

          const uploadResponse = await fetch('http://203.161.49.218:1337/api/upload', {
              method: 'POST',
              headers: {
                  'Authorization': 'fa202df8776a58179bb222a33562c69723749e7179de4e83331ab624cce077160c9ab6cac885de1447d11e24dbae3ff9b6743831ba1bd0acbeb3a5c76665107b6c9552d897a7b96f18d19f6932f7d4961d9953211549234e84c211ea89a1209744936ddf65c08b4b68299efeabe20c0e63eb94c700867063543f939f8e3afa30'
              },
              body: formData
          });

          if (!uploadResponse.ok) {
              const uploadError = await uploadResponse.json();
              throw new Error('Error uploading image: ' + uploadError.message);
          }

          const uploadResult = await uploadResponse.json();
          const uploadedImageId = uploadResult[0].id;

          // Step 2: Create the book entry
          const bookData = {
              data: {
                  title: title,
                  author: author,
                  description: description,
                  coverImage: { id: uploadedImageId },
                  availability: availability,
                  genre: genre,
                  language: language,
                  pages: pages,
                  publicationDate: publicationDate,
                  rating: rating,
                  timesBorrowed: timesBorrowed
              }
          };

          const bookResponse = await fetch('http://203.161.49.218:1337/api/books-metas/', {
              method: 'POST',
              headers: {
                  'Authorization': '54afcf2adc076c68aec973bb9af9f40e2a636e8cb4dea8d1587ee653a13e3dff7c0a80dc640a506f951eab03413f161d8f9fea6cb0122bb3974fa5eb6536be36060f73e05405266e4bfaf10f20943b272ae0a723de57f1b6894b71eba26a1d45e32ca15e085cb28fa9967d3782ac006469a6aca7434bba33c8933a004070cab2',
                  'Content-Type': 'application/json'
              },
              body: JSON.stringify(bookData)
          });

          if (bookResponse.ok) {
              alert('Book data submitted successfully!');
              form.reset();
          } else {
              const errorData = await bookResponse.json();
              alert('Error submitting data: ' + errorData.message);
          }
      } catch (error) {
          alert('Error submitting data: ' + error.message);
      }
  });

  function sanitize(input) {
      const div = document.createElement('div');
      div.textContent = input;
      return div.innerHTML;
  }
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