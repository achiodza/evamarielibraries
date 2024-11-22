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
      border-radius: 10px;
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
            <button class="btn bg-gradient-dark mb-0" id="download-borrowed-excel">
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
      <!-- Books Metas -->
      <div class="row" style="margin-top:3%;">
      <div class="col-md-6" >
        <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
          <img class="w-10 me-3 mb-0" src="../assets/img/logos.png" alt="logo">
          <h6 class="mb-0">Books In The Library</h6>
          <div class="col-6 text-end">
            <button class="btn bg-gradient-dark mb-0" id="download-booksmetas-excel">
              <i class="material-icons text-sm">cloud</i>&nbsp;&nbsp;Download
            </button>
          </div>
        </div>
      </div>
      <!-- Toys -->
      <div class="col-md-6">
        <div class="card card-body border card-plain border-radius-lg d-flex align-items-center flex-row">
          <img class="w-10 me-3 mb-0" src="../assets/img/logos.png" alt="logo">
          <h6 class="mb-0">Toys</h6>
          <div class="col-6 text-end">
            <button class="btn bg-gradient-dark mb-0" id="download-toys-excel">
              <i class="material-icons text-sm">cloud</i>&nbsp;&nbsp;Download
            </button>
          </div>
        </div>
      </div>
    </div>
    </div>
  </div>

  <script>
    const tokens = {
      borrowedBooks: 'Bearer 8a751582219d16d9a8a64c10e4b419b9763acb0f90d3b1dcf9ab978308ff4c5585ee8b2fb516b57c86646d2620afe2acff22194957bb09fceccb71e8cbec9850c710eb3c4aecb0257e5839e5235c960e11d3444edd60e0b00e7681d912c5b3d55013f9207d52ee111dc81d861f972e7b5cd25628a8c2f9dba50cceec04dfed25',
      users: 'Bearer d68ab99a384e85007a4588d4f9c6cfcb438b2e1bf3298a057a93175310e642dfc7e8bd304d1e34cab68ad1e1b98a7745f60ddf0254f71c258f6bda92a8e3e9a6ffa3daa8ca4c4ccce8dff5435b9f4180e22de31961ca0a3729232633a9bb415b5ed03624662dd8b4b09551bd3b458ec051e5957c617955a69bdec568c1967d5b',
      booksMetas: 'Bearer 8a751582219d16d9a8a64c10e4b419b9763acb0f90d3b1dcf9ab978308ff4c5585ee8b2fb516b57c86646d2620afe2acff22194957bb09fceccb71e8cbec9850c710eb3c4aecb0257e5839e5235c960e11d3444edd60e0b00e7681d912c5b3d55013f9207d52ee111dc81d861f972e7b5cd25628a8c2f9dba50cceec04dfed25',
      toys: 'Bearer 8a751582219d16d9a8a64c10e4b419b9763acb0f90d3b1dcf9ab978308ff4c5585ee8b2fb516b57c86646d2620afe2acff22194957bb09fceccb71e8cbec9850c710eb3c4aecb0257e5839e5235c960e11d3444edd60e0b00e7681d912c5b3d55013f9207d52ee111dc81d861f972e7b5cd25628a8c2f9dba50cceec04dfed25'
    };

    const endpoints = {
      borrowedBooks: 'https://admin.evamarielibraries.org/api/borrowedbooks?populate=*',
      users: 'https://admin.evamarielibraries.org/api/users?populate=*',
      booksMetas: 'https://admin.evamarielibraries.org/api/books-metas?populate=*',
      toys: 'https://admin.evamarielibraries.org/api/toymetas?populate=*'
    };

    const fetchDataAndDownload = async (key, filename, processData) => {
  try {
    const response = await fetch(endpoints[key], {
      method: 'GET',
      headers: { 'Authorization': tokens[key] }
    });
    const data = await response.json();

    // Handle both response formats
    const records = Array.isArray(data) 
      ? data // Direct array
      : (data.data || []); // Nested in data.data

    if (!records || records.length === 0) {
      alert(`No ${key.replace(/-/g, ' ')} data available to download.`);
      return;
    }

    const formattedData = processData(records);
    const worksheet = XLSX.utils.json_to_sheet(formattedData);
    const workbook = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(workbook, worksheet, key);
    XLSX.writeFile(workbook, `${filename}.xlsx`);
  } catch (error) {
    console.error(`Error fetching ${key} data:`, error);
    alert(`Failed to fetch ${key} data.`);
  }
};


    document.getElementById('download-booksmetas-excel').addEventListener('click', async () => {
  const fetchAllBooksMetas = async () => {
    let allData = [];
    let page = 1;
    const pageSize = 100; // Assuming API supports specifying a page size

    try {
      while (true) {
        const response = await fetch(
          `https://admin.evamarielibraries.org/api/books-metas?populate=*&pagination[page]=${page}&pagination[pageSize]=${pageSize}`,
          {
            method: 'GET',
            headers: {
              'Authorization': tokens.booksMetas,
            },
          }
        );

        const data = await response.json();
        if (!data || !data.data || data.data.length === 0) {
          break; // Stop fetching if no more data
        }

        allData = [...allData, ...data.data];
        page += 1; // Move to the next page
      }
    } catch (error) {
      console.error('Error fetching paginated books metas data:', error);
      alert('Failed to fetch books metas data.');
    }

    return allData;
  };

  try {
    const data = await fetchAllBooksMetas();
    if (!data || data.length === 0) {
      alert('No books metas data available to download.');
      return;
    }

    const formattedData = data.map(meta => ({
      MetaID: meta.id,
      Title: meta.attributes.title,
      Genre: meta.attributes.genre || 'N/A',
      Language: meta.attributes.language || 'N/A',
      BookID: meta.attributes.isbn || 'N/A',
      PublishedYear: meta.attributes.publicationDate || 'N/A'
    }));

    const worksheet = XLSX.utils.json_to_sheet(formattedData);
    const workbook = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(workbook, worksheet, 'BooksMetas');
    XLSX.writeFile(workbook, `Library_Books_Data.xlsx`);
  } catch (error) {
    console.error('Error processing books metas data:', error);
    alert('Failed to process books metas data.');
  }
});


    document.getElementById('download-users-excel').addEventListener('click', () => {
      fetchDataAndDownload('users', 'Users_Data', data =>
        data.map(user => ({
          Id: user.id,
          Username: user.username,
          Email: user.email,
          Location: user.location || 'N/A'
        }))
      );
    });


    document.getElementById('download-borrowed-excel').addEventListener('click', () => {
      fetchDataAndDownload('borrowedBooks', 'Borrowed_Books_Data', data =>
        data.flatMap(entry =>
          entry.attributes.bookdetail.map(book => ({
            MetaID: entry.id,
            Title: book.title,
            Borrowed_By: entry.attributes.userid,
            Genre: book.genre || 'N/A',
            Language: book.language || 'N/A',
            BookID: book.isbn || 'N/A',
            PublishedYear: book.publicationDate || 'N/A'
          }))
        )
      );
    });


    document.getElementById('download-toys-excel').addEventListener('click', () => {
      fetchDataAndDownload('toys', 'Toys_Data', data =>
        data.map(toy => ({
          ToyID: toy.id,
          Name: toy.attributes.name,
          Category: toy.attributes.category || 'N/A',
          Availability: toy.attributes.availability || 'N/A'
        }))
      );
    });
  </script>
</body>

</html>
