<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
    Eva Marie Libraries Dashboard
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
    .table {
        table-layout: fixed;
        width: 100%;
    }
    
    .table th, .table td {
        word-wrap: break-word;
        overflow-wrap: break-word;
        white-space: normal;
    }
    
    .table th:nth-child(2), .table td:nth-child(2) {
        width: 40%; /* Adjust width as needed */
    }
    
    .table th, .table td {
        padding: 10px;
        vertical-align: top;
    }
</style>
</head>

<body class="g-sidenav-show  bg-gray-200">
<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="#" target="_blank">
        <img src="../assets/img/logos.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Eva Marie Libraries</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
<?php include './includes/navheader.php'; ?>
   
    <!-- End Navbar -->

  <!-- Tables for Borrowing History -->
  <div class="container-fluid py-4">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-12">
                    <div class="card my-4">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-info shadow-primary border-radius-lg pt-4 pb-3">
                                <h6 class="text-white text-capitalize ps-3">Library Books Listing</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
                            <div class="table-responsive p-0">
                                <div col-md-6 style="margin:2%">
                            <div class="search-container input-group input-group-outline" >
                                <input class="form-control" type="text" id="search-input" placeholder="Search by title or author..." />
                            </div>
                            </div>
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Book Name & Author</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Description</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Genre</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Availability</th>
                                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Action</th>
                                        </tr>
                                    
                                    </thead>
                                    <tbody id="book-table-body">
                                        <!-- Book information will be populated here -->
                                    </tbody>
                                </table>

                               
                            </div>
                            <div id="pagination-controls" class="d-flex align-items-center" style="margin-left:42%">
                                    <button id="prev-page" class="btn bg-gradient-dark mb-0" disabled>Previous</button>
                                    <span id="page-number" style="margin-left:1px;">Page 1</span>
                                    <button id="next-page"class="btn bg-gradient-dark mb-0">Next</button>
                            </div>
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
                    <ul class="nav nav-footer justify-content-center justify-content-lg-end"></ul>
                </div>
            </div>
        </div>
    </footer>
</div>

    <script>
            document.addEventListener('DOMContentLoaded', () => {
                
                const pageSize = 10; // Number of items per page

                // Fetch and populate data with pagination
                // const fetchData = (page) => {
                //     const url = `https://admin.evamarielibraries.org/api/books-metas/?populate=*&pagination[page]=${page}&pagination[pageSize]=${pageSize}`;
                //     fetchBooks(url);
                 };

            
            // Fetch books from a given URL and populate the table
            const fetchBooks = (url) => {
                fetch(url, {
                    method: 'GET',
                    headers: {
                        'Authorization': 'Bearer 8a751582219d16d9a8a64c10e4b419b9763acb0f90d3b1dcf9ab978308ff4c5585ee8b2fb516b57c86646d2620afe2acff22194957bb09fceccb71e8cbec9850c710eb3c4aecb0257e5839e5235c960e11d3444edd60e0b00e7681d912c5b3d55013f9207d52ee111dc81d861f972e7b5cd25628a8c2f9dba50cceec04dfed25',
                    }
                })
                .then(response => response.json())
                .then(data => {
                    populateTable(data.data);

                    // Update pagination controls
                    if (data.meta) {
                        document.getElementById('page-number').textContent = `Page ${currentPage}`;
                        document.getElementById('prev-page').disabled = currentPage === 1;
                        document.getElementById('next-page').disabled = data.meta.pagination.page === data.meta.pagination.pageCount;
                    }
                })
                .catch(error => console.error('Error fetching books:', error));
            };

            // Populate the table with book data
            const populateTable = (books) => {
                const tableBody = document.getElementById('book-table-body');
                tableBody.innerHTML = ''; // Clear existing data

                books.forEach(book => {
                    const row = document.createElement('tr');
                    row.innerHTML = `
                        <td>
                            <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center">
                                    <h6 class="mb-0 text-sm">${book.attributes.title}</h6>
                                    <p class="text-xs text-secondary mb-0">${book.attributes.author}</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <p class="text-xs mb-0">${book.attributes.description}</p>
                        </td>
                        <td>
                            <p class="text-xs mb-0">${book.attributes.genre}</p>
                        </td>
                        <td>
                            <p class="text-xs mb-0">${book.attributes.availability ? 'Available' : 'Unavailable'}</p>
                        </td>
                        <td>
                            <a href="#" 
                                class="text-secondary font-weight-bold text-xs" 
                                data-book-id="${book.id}" 
                                data-title="${book.attributes.title.replace(/'/g, "&#39;")}" 
                                data-author="${book.attributes.author.replace(/'/g, "&#39;")}" 
                                data-genre="${book.attributes.genre.replace(/'/g, "&#39;")}" 
                                data-language="${book.attributes.language.replace(/'/g, "&#39;")}" 
                                data-pages="${book.attributes.pages}" 
                                data-publication-date="${book.attributes.publicationDate}" 
                                data-rating="${book.attributes.rating}" 
                                data-times-borrowed="${book.attributes.timesBorrowed}" 
                                data-description="${book.attributes.description.replace(/'/g, "&#39;")}" 
                                data-availability="${book.attributes.availability}" 
                                data-isbn="${book.attributes.isbn}">
                                    Edit
                            </a>
                        </td>
                    `;
                    tableBody.appendChild(row);
                });
            };

            // Search functionality
            document.getElementById('search-input').addEventListener('input', (event) => {
                const query = event.target.value.trim().toLowerCase();

                if (query.length > 0) {
                    const url = `https://admin.evamarielibraries.org/api/books-metas/?populate=*&filters[$or][0][title][$containsi]=${query}&filters[$or][1][author][$containsi]=${query}`;
                    fetchBooks(url);
                } else {
                    // Reload paginated data when search is cleared
                    fetchData(currentPage);
                }
            });

            // Initial fetch for paginated data
            let currentPage = 1; // Ensure currentPage is declared
            const fetchData = (page) => {
                const url = `https://admin.evamarielibraries.org/api/books-metas/?populate=*&pagination[page]=${page}&pagination[pageSize]=10`;
                fetchBooks(url);
            };
            fetchData(currentPage);

            // Pagination controls
            document.getElementById('prev-page').addEventListener('click', () => {
                if (currentPage > 1) {
                    currentPage--;
                    fetchData(currentPage);
                }
            });

            document.getElementById('next-page').addEventListener('click', () => {
                currentPage++;
                fetchData(currentPage);
            });

            // Handle clicks on the Edit button
            document.addEventListener('click', function (event) {
                if (event.target.matches('[data-book-id]')) {
                    const link = event.target;
                    const bookData = {
                        id: link.getAttribute('data-book-id'),
                        title: link.getAttribute('data-title'),
                        author: link.getAttribute('data-author'),
                        genre: link.getAttribute('data-genre'),
                        language: link.getAttribute('data-language'),
                        pages: link.getAttribute('data-pages'),
                        publicationDate: link.getAttribute('data-publication-date'),
                        rating: link.getAttribute('data-rating'),
                        timesBorrowed: link.getAttribute('data-times-borrowed'),
                        description: link.getAttribute('data-description'),
                        availability: link.getAttribute('data-availability'),
                        isbn: link.getAttribute('data-isbn'),
                    };
                    saveBookData(bookData);
                }
            });

            function saveBookData(book) {
                console.log('Book data:', book);
                // Save data to localStorage
                localStorage.setItem('editBook', JSON.stringify(book));

                // Redirect to edit page
                window.location.href = `./editbook.php?bookId=${book.id}`;
            }
        
    
  </script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>