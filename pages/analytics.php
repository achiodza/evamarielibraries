<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>Eva Marie Libraries | Analytics</title>
  <!-- Fonts and icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
  <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script> <!-- SheetJS library -->
  <style>
    .card {
      box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
      transform: translateY(-5px);
      box-shadow: 0px 8px 12px rgba(0, 0, 0, 0.2);
    }

    .btn {
      font-size: 14px;
      padding: 8px 20px;
      border-radius: 30px;
    }

    .btn:hover {
      background-color: #4caf50;
      color: #fff;
    }

    .error-message {
      color: red;
      font-weight: bold;
    }
  </style>
</head>

<body class="g-sidenav-show bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <a class="navbar-brand m-0" href="#">
        <img src="../assets/img/logos.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Eva Marie Libraries</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <?php include './includes/navheader.php'; ?>
  </aside>

  <div class="container-fluid py-4">
    <div class="row">
      <!-- Borrowed Books -->
      <div class="col-md-6">
        <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
          <img class="w-10 me-3 mb-0" src="../assets/img/logos.png" alt="logo">
          <h6 class="mb-0">Borrowed Books</h6>
          <div class="col-6 text-end">
            <button class="btn bg-gradient-dark mb-0" id="download-borrowedbooks-excel">
              <i class="material-icons text-sm">cloud</i>&nbsp;&nbsp;Download
            </button>
          </div>
        </div>
      </div>
      <!-- Users -->
      <div class="col-md-6">
        <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
          <img class="w-10 me-3 mb-0" src="../assets/img/logos.png" alt="logo">
          <h6 class="mb-0">Users Data</h6>
          <div class="col-6 text-end">
            <button class="btn bg-gradient-dark mb-0" id="download-users-excel">
              <i class="material-icons text-sm">cloud</i>&nbsp;&nbsp;Download
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    // API Tokens
    const borrowedBooksToken = 'Bearer 8a751582219d16d9a8a64c10e4b419b9763acb0f90d3b1dcf9ab978308ff4c5585ee8b2fb516b57c86646d2620afe2acff22194957bb09fceccb71e8cbec9850c710eb3c4aecb0257e5839e5235c960e11d3444edd60e0b00e7681d912c5b3d55013f9207d52ee111dc81d861f972e7b5cd25628a8c2f9dba50cceec04dfed25';
    const usersToken = 'Bearer d68ab99a384e85007a4588d4f9c6cfcb438b2e1bf3298a057a93175310e642dfc7e8bd304d1e34cab68ad1e1b98a7745f60ddf0254f71c258f6bda92a8e3e9a6ffa3daa8ca4c4ccce8dff5435b9f4180e22de31961ca0a3729232633a9bb415b5ed03624662dd8b4b09551bd3b458ec051e5957c617955a69bdec568c1967d5b';

    // Fetch and Download Borrowed Books Data
    document.getElementById('download-borrowedbooks-excel').addEventListener('click', async () => {
      const apiUrl = 'https://admin.evamarielibraries.org/api/borrowedbooks?populate=*';
      try {
        const response = await fetch(apiUrl, {
          method: 'GET',
          headers: { 'Authorization': borrowedBooksToken }
        });
        const data = await response.json();

        if (!data || !data.data || data.data.length === 0) {
          alert('No borrowed books data available to download.');
          return;
        }

        const formattedBooks = data.data.map(record => ({
          UserID: record.attributes.userid,
          BorrowedAt: record.attributes.createdAt,
          BookTitle: record.attributes.bookdetail[0]?.title || 'N/A',
          Author: record.attributes.bookdetail[0]?.author || 'N/A'
        }));

        const worksheet = XLSX.utils.json_to_sheet(formattedBooks);
        const workbook = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(workbook, worksheet, 'Borrowed Books');
        XLSX.writeFile(workbook, 'Borrowed_Books_Data.xlsx');
      } catch (error) {
        console.error('Error fetching borrowed books:', error);
        alert('Failed to fetch borrowed books data.');
      }
    });

    // Fetch and Download Users Data
    document.getElementById('download-users-excel').addEventListener('click', async () => {
      const apiUrl = 'https://admin.evamarielibraries.org/api/users?populate=*';
      try {
        const response = await fetch(apiUrl, {
          method: 'GET',
          headers: { 'Authorization': usersToken }
        });
        const data = await response.json();

        if (!data || !data.data || data.data.length === 0) {
          alert('No users data available to download.');
          return;
        }

        const formattedUsers = data.data.map(user => ({
          Username: user.attributes.username,
          Email: user.attributes.email,
          Location: user.attributes.location || 'N/A'
        }));

        const worksheet = XLSX.utils.json_to_sheet(formattedUsers);
        const workbook = XLSX.utils.book_new();
        XLSX.utils.book_append_sheet(workbook, worksheet, 'Users Data');
        XLSX.writeFile(workbook, 'Users_Data.xlsx');
      } catch (error) {
        console.error('Error fetching users data:', error);
        alert('Failed to fetch users data.');
      }
    });
  </script>
</body>

</html>
