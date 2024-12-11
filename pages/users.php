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
   
    .pagination {
            margin-top: 20px;
            display: flex;
            justify-content: center;
        }
        .pagination button {
            margin: 0 5px;
            padding: 5px 10px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
        }
        .pagination button.disabled {
            background-color: #cccccc;
            cursor: not-allowed;
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
                                <h6 class="text-white text-capitalize ps-3">Our Users Database</h6>
                            </div>
                        </div>
                        <div class="card-body px-0 pb-2">
        <div class="table-responsive p-0">
            <table class="table align-items-center mb-0">
                <thead>
                    <tr>
                        <th>Full Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        
                        <th>Location</th>
                        <th>Joined On</th>
                        <th>Actions</th>
                    </tr>
                    <tr>
                        <th><input type="text" class="form-control" id="filter-username" placeholder="Filter by username"></th>
                        <th><input type="text" class="form-control" id="filter-email" placeholder="Filter by email"></th>
                        <th><input type="text" class="form-control" id="filter-phone" placeholder="Filter by phone number"></th>
                        
                       
                        <th><input type="text" class="form-control" id="filter-location" placeholder="Filter by location"></th>
                        <th><input type="text" class="form-control" id="filter-date" placeholder="Filter by Date of Registration"></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody id="user-table-body" style="margin:2%;">
                    <!-- User data will be inserted here dynamically -->
                </tbody>
            </table>
        </div>
        <div class="pagination" id="pagination">
            <!-- Pagination buttons will be inserted here dynamically -->
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
        const apiUrl = 'https://admin.evamarielibraries.org/api/users?populate=*';  //
        const authToken = 'Bearer d68ab99a384e85007a4588d4f9c6cfcb438b2e1bf3298a057a93175310e642dfc7e8bd304d1e34cab68ad1e1b98a7745f60ddf0254f71c258f6bda92a8e3e9a6ffa3daa8ca4c4ccce8dff5435b9f4180e22de31961ca0a3729232633a9bb415b5ed03624662dd8b4b09551bd3b458ec051e5957c617955a69bdec568c1967d5b';

        const rowsPerPage = 15;
        let currentPage = 1;
        let users = [];  // This will hold the fetched data

        // Function to fetch users from Strapi API
        async function fetchUsers() {
            try {
                const response = await fetch(apiUrl, {
                    method: 'GET',
                    headers: {
                        'Authorization': authToken
                    }
                });
                const data = await response.json();
                users = data;  // Populate the users array with API response data
                renderTable();  // Render table with the fetched data
            } catch (error) {
                console.error('Error fetching users:', error);
            }
        }
// Function to delete a user by ID
async function deleteUser(userId) {
    const confirmDelete = confirm("Are you sure you want to delete this user?");
    if (!confirmDelete) return; // Exit if the user cancels

    try {
        const response = await fetch(`${apiUrl}/${userId}`, {
            method: 'DELETE',
            headers: {
                'Authorization': authToken
            }
        });

        if (response.ok) {
            alert("User deleted successfully.");
            // Refresh the table by fetching updated user data
            fetchUsers();
        } else {
            const error = await response.json();
            alert(`Failed to delete user: ${error.message}`);
        }
    } catch (error) {
        console.error('Error deleting user:', error);
        alert('An error occurred while trying to delete the user.');
    }
}

// Function to render table rows dynamically
function renderTable(page = 1) {
    const tbody = document.getElementById('user-table-body');
    tbody.innerHTML = ''; // Clear previous data

    // Calculate start and end index for the current page
    const startIndex = (page - 1) * rowsPerPage;
    const endIndex = Math.min(startIndex + rowsPerPage, users.length);

    // Create table rows for the current page
    for (let i = startIndex; i < endIndex; i++) {
        const user = users[i];
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${user.username}</td>
            <td>${user.email}</td>
            <td>${user.phoneNo || 'N/A'}</td>
            <td>${user.location || 'N/A'}</td>
            <td>${new Date(user.createdAt).toLocaleDateString() || 'N/A'}</td>
            <td>
                <button class="btn btn-danger btn-sm" onclick="deleteUser('${user.id}')">Delete</button>
            </td>
        `;
        tbody.appendChild(row);
    }

    // Render pagination controls
    renderPagination();
}


        // Function to render pagination controls dynamically
        function renderPagination() {
            const paginationDiv = document.getElementById('pagination');
            paginationDiv.innerHTML = ''; // Clear previous pagination controls

            const totalPages = Math.ceil(users.length / rowsPerPage);

            // Create "Previous" button
            const prevButton = document.createElement('button');
            prevButton.textContent = 'Previous';
            prevButton.classList.add(currentPage === 1 ? 'disabled' : '');
            prevButton.onclick = () => {
                if (currentPage > 1) {
                    currentPage--;
                    renderTable(currentPage);
                }
            };
            paginationDiv.appendChild(prevButton);

            // Create page number buttons
            for (let i = 1; i <= totalPages; i++) {
                const pageButton = document.createElement('button');
                pageButton.textContent = i;
                pageButton.classList.add(currentPage === i ? 'disabled' : '');
                pageButton.onclick = () => {
                    currentPage = i;
                    renderTable(currentPage);
                };
                paginationDiv.appendChild(pageButton);
            }

            // Create "Next" button
            const nextButton = document.createElement('button');
            nextButton.textContent = 'Next';
            nextButton.classList.add(currentPage === totalPages ? 'disabled' : '');
            nextButton.onclick = () => {
                if (currentPage < totalPages) {
                    currentPage++;
                    renderTable(currentPage);
                }
            };
            paginationDiv.appendChild(nextButton);
        }

        // Initial call to fetch users and render the table
        fetchUsers();
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