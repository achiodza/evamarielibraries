
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
  
</head>

<body class="g-sidenav-show  bg-gray-200">
  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark" id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="#" target="_blank">
        <img src="../assets/img/logos.png" class="navbar-brand-img h-100" alt="main_logo">
        <span class="ms-1 font-weight-bold text-white">Eva Marie Libraries</span>
      </a>
    </div>
    <hr class="horizontal light mt-0 mb-2">
    <?php include './includes/navheader.php'; ?>

    

 
  
    <!-- End Of script to Fetch Data -->
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-warning shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Last Book Borrowed/Returned</p>
                <!-- displaying last book borrowed/returned on the dashboard -->
                <h4 class="mb-0"><span id="last-book-title"></span></h4>
            </div>
        
            <script>
                // Function to fetch and display the last book borrowed/returned
                async function fetchLastBook() {
                    try {
                        const response = await fetch('https://admin.evamarielibraries.org/api/borrowedbooks?populate=*', {
                            headers: {
                                'Authorization': 'Bearer 8a751582219d16d9a8a64c10e4b419b9763acb0f90d3b1dcf9ab978308ff4c5585ee8b2fb516b57c86646d2620afe2acff22194957bb09fceccb71e8cbec9850c710eb3c4aecb0257e5839e5235c960e11d3444edd60e0b00e7681d912c5b3d55013f9207d52ee111dc81d861f972e7b5cd25628a8c2f9dba50cceec04dfed25'
                            }
                        });
                        const data = await response.json();
                        const lastBook = data.data[data.data.length - 1];
                        const lastBookTitle = lastBook.attributes.bookdetail[0].title;
        
                        document.getElementById('last-book-title').textContent = lastBookTitle;
                    } catch (error) {
                        console.error('Error fetching the last book:', error);
                    }
                }
        
                // Call the function to fetch and display the last book
                fetchLastBook();
            </script>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
               <!-- displaying transaction time on dasboard -->
              <p class="mb-0"><span class="text-success text-sm font-weight-bolder" id="transaction-time"> Borrowed</span> | Book Status</p>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
              <div class="card-header p-3 pt-2">
                  <div class="icon icon-lg icon-shape bg-gradient-warning shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                      <i class="material-icons opacity-10">money</i>
                  </div>
                  <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Total Books In the Library</p>
                    <h4 id="total-books-count" class="mb-0">Loading...</h4>
                  </div>
                  
              </div>
              <hr class="dark horizontal my-0">
              <div class="card-footer p-3">
                  <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span>View Library Books</p>
              </div>
          </div>
      </div>
      
      <script>
        document.addEventListener('DOMContentLoaded', () => {
          // Define the endpoint URL and the authorization token
          const endpoint = 'https://admin.evamarielibraries.org/api/books-metas/';
          const token = '8a751582219d16d9a8a64c10e4b419b9763acb0f90d3b1dcf9ab978308ff4c5585ee8b2fb516b57c86646d2620afe2acff22194957bb09fceccb71e8cbec9850c710eb3c4aecb0257e5839e5235c960e11d3444edd60e0b00e7681d912c5b3d55013f9207d52ee111dc81d861f972e7b5cd25628a8c2f9dba50cceec04dfed25';
      
          // Fetch total books from the booksmeta endpoint
          fetch(endpoint, {
            headers: {
              'Authorization': `Bearer ${token}`,
              'Content-Type': 'application/json'
            }
          })
          .then(response => response.json())
          .then(data => {
            console.log(data);  // Log the data to check its structure
      
            // Assuming the total number of books is available in a property called 'total'
            // Adjust the property name according to the actual response structure
            const totalBooks = data.meta.pagination.total;
      
            // Update the HTML content with the total number of books
            const totalBooksElement = document.getElementById('total-books-count');
            totalBooksElement.textContent = totalBooks || 0; // Display 0 if totalBooks is undefined
          })
          .catch(error => console.error('Error fetching booksmeta:', error));
        });
      </script>
      
      
        
      <div class="col-xl-4 col-sm-6">
        <div class="card">
            <div class="card-header p-3 pt-2">
                <div class="icon icon-lg icon-shape bg-gradient-warning shadow-info text-center border-radius-xl mt-n4 position-absolute">
                    <i class="material-icons opacity-10">receipt_long</i>
                </div>
                <div class="text-end pt-1">
                    <p class="text-sm mb-0 text-capitalize">Total Books Borrowed</p>
                    <!-- Add an ID to the h4 element to update its content dynamically -->
                    <h4 id="" class="mb-0">Loading...</h4> <!--todays-total-revenue-->
                </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
                <p class="mb-0"><span class="text-success text-sm font-weight-bolder"></span>From Inception</p>
            </div>
        </div>
    </div>
    
    
    

      <div class="row">
        <div class="col-md-12 mt-4">
          <div class="card h-100 mb-4">
            <div class="card-header pb-0 px-3">
              <div class="row">
                <!-- <div class="col-md-6">
                  <h6 class="mb-0">Recently Borrowed Books</h6>
                </div>
                <div class="col-md-6 d-flex justify-content-start justify-content-md-end align-items-center"> -->
                  <!-- <i class="material-icons me-2 text-lg">date_range</i> -->
                  
                <!-- </div>
              </div>
            </div> -->
            <!-- <div class="card-body pt-4 p-3">
              <h6 class="text-uppercase text-body text-xs font-weight-bolder mb-3">Newest</h6>
              <ul class="list-group" id="book-list"> -->
                <!-- List items will be populated here by JavaScript -->
              <!-- </ul>
            </div>
             -->
            <script>
            // Fetch book details from the endpoint
            fetch('https://admin.evamarielibraries.org/api/borrowedbooks?populate=*&_sort=createdAt:desc&_limit=5',{
              headers: {
                'Authorization': 'Bearer 8a751582219d16d9a8a64c10e4b419b9763acb0f90d3b1dcf9ab978308ff4c5585ee8b2fb516b57c86646d2620afe2acff22194957bb09fceccb71e8cbec9850c710eb3c4aecb0257e5839e5235c960e11d3444edd60e0b00e7681d912c5b3d55013f9207d52ee111dc81d861f972e7b5cd25628a8c2f9dba50cceec04dfed25',
                'Content-Type': 'application/json'
              }
            })
              .then(response => response.json())
              .then(data => {
                console.log(data);  // Log the data to check its structure
            
                const books = data.data; // Access the array of books
                const bookList = document.getElementById('book-list');
            
                books.forEach(book => {
                  // Assuming bookdetail information is stored within attributes, adjust as necessary
                  const availabilityStatus = book.attributes.availability ? 'Returned' : 'Borrowed';
                  const availabilityClass = book.attributes.availability ? 'text-success' : 'text-danger';
                  const buttonClass = book.attributes.availability ? 'btn-outline-success' : 'btn-outline-danger';
                  const buttonIcon = book.attributes.availability ? 'expand_less' : 'expand_more';
            
                  const listItem = document.createElement('li');
                  listItem.className = 'list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg';
            
                  listItem.innerHTML = `
                    <div class="d-flex align-items-center">
                      <button class="btn btn-icon-only btn-rounded ${buttonClass} mb-0 me-3 p-3 btn-sm d-flex align-items-center justify-content-center">
                        <i class="material-icons text-lg">${buttonIcon}</i>
                      </button>
                      <div class="d-flex flex-column">
                        <h6 class="mb-1 text-dark text-sm">Book Name: <span>${book.attributes.bookdetail[0].title}</span></h6>
                        <span>Borrowed By: ${book.attributes.userid}</span>
                        <span>Date and Time: ${new Date(book.attributes.createdAt).toLocaleString()}</span>
                      </div>
                    </div>
                    <div class="d-flex align-items-center ${availabilityClass} text-gradient text-sm font-weight-bold">
                      <h6>${availabilityStatus}</h6>
                    </div>
                  `;
            
                  bookList.appendChild(listItem);
                });
              })
              .catch(error => console.error('Error fetching book data:', error));
            </script>
            
            
          </div>
        </div>
        <div class="col-md-12 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">Borrowing Request Details Queue</h6>
            </div>
            <div class="card-body pt-4 p-3">
              <ul class="list-group" id="request-queue">
                <!-- List items will be populated here by JavaScript -->
              </ul>
              <div class="pagination-controls" id="pagination-controls">
            <!-- Pagination buttons will be inserted here dynamically -->
              </div>
            </div>
          </div>
        </div>

        <script>

  let currentPage = 0;
  const itemsPerPage = 10;

  // Load Borrowed Books
  function loadRequests(page = 0) {
    currentPage = page;
    const offset = page * itemsPerPage;

    fetch(
      `https://admin.evamarielibraries.org/api/borrowedbooks?populate=*&sort[0]=createdAt:desc&pagination[start]=${offset}&pagination[limit]=${itemsPerPage}`,
      {
        headers: {
        'Authorization': 'Bearer 8a751582219d16d9a8a64c10e4b419b9763acb0f90d3b1dcf9ab978308ff4c5585ee8b2fb516b57c86646d2620afe2acff22194957bb09fceccb71e8cbec9850c710eb3c4aecb0257e5839e5235c960e11d3444edd60e0b00e7681d912c5b3d55013f9207d52ee111dc81d861f972e7b5cd25628a8c2f9dba50cceec04dfed25',
        'Content-Type': 'application/json',
      },
      }
    )
      .then((response) => response.json())
      .then((data) => {
        const requests = data.data;
        const requestQueue = document.getElementById('request-queue');

        // Clear the previous list before adding new records
        requestQueue.innerHTML = '';

        requests.forEach((request) => {
          const attributes = request.attributes;
          const requestDate = attributes.createdAt
            ? new Date(attributes.createdAt).toLocaleDateString()
            : 'N/A';
          const user = attributes.userid || 'N/A';
          const bookTitle = attributes.bookdetail[0]?.title || 'N/A';
          const phoneNumber = attributes.phoneNo || 'N/A';
          const category = attributes.bookdetail[0]?.genre || 'N/A';

          const listItem = document.createElement('li');
          listItem.className =
            'list-group-item border-0 d-flex p-4 mb-2 bg-gray-100 border-radius-lg';

          listItem.innerHTML = `
            <div class="d-flex flex-column">
              <h6 class="mb-3 text-sm">${bookTitle}</h6>
              <span class="mb-2 text-xs">Requested By: <span class="text-dark font-weight-bold ms-sm-2">${user}</span></span>
              <span class="mb-2 text-xs">Phone Number: <span class="text-dark ms-sm-2 font-weight-bold">${phoneNumber}</span></span>
              <span class="mb-2 text-xs">Book Category: <span class="text-dark ms-sm-2 font-weight-bold">${category}</span></span>
              <span class="mb-2 text-xs">Date Requested: <span class="text-dark ms-sm-2 font-weight-bold">${requestDate}</span></span>
            </div>
            <div class="ms-auto text-end">
              <button class="btn btn-success approve-btn" data-book-id="${attributes.bookdetail[0].id}">Approve</button>
              <button class="btn btn-danger return-btn" data-book-id="${request.id}">Return</button>
            </div>
          `;
          requestQueue.appendChild(listItem);
        });

        // Update Pagination Controls
        updatePaginationControls(data.meta.pagination);
        addEventListeners();
      })
      .catch((error) => console.error('Error fetching book requests:', error));
  }

  // Update Pagination Controls
  function updatePaginationControls(pagination) {
    const paginationControls = document.getElementById('pagination-controls');
    paginationControls.innerHTML = `
      <button ${currentPage === 0 ? 'disabled' : ''} onclick="loadRequests(${currentPage - 1})">Previous</button>
      <button ${
        currentPage + 1 >= pagination.pageCount ? 'disabled' : ''
      } onclick="loadRequests(${currentPage + 1})">Next</button>
    `;
  }

  // Add Event Listeners for Approve and Return Buttons
  function addEventListeners() {
    // Approve Button
    document.querySelectorAll('.approve-btn').forEach((button) => {
      button.addEventListener('click', function () {
        const bookId = this.getAttribute('data-book-id');
        updateBookAvailability(bookId, this);
      });
    });

    // Return Button
    document.querySelectorAll('.return-btn').forEach((button) => {
      button.addEventListener('click', function () {
        const bookId = this.getAttribute('data-book-id');
        if (confirm('Are you sure you want to return this book?')) {
          deleteBorrowedBook(bookId, this);
        }
      });
    });
  }

  // Approve Book (Update Availability)
  function updateBookAvailability(bookId, button) {
    fetch(`https://admin.evamarielibraries.org/api/bookmetas/${bookId}`, {
      method: 'POST',
      headers: {
        'Authorization': 'Bearer 8a751582219d16d9a8a64c10e4b419b9763acb0f90d3b1dcf9ab978308ff4c5585ee8b2fb516b57c86646d2620afe2acff22194957bb09fceccb71e8cbec9850c710eb3c4aecb0257e5839e5235c960e11d3444edd60e0b00e7681d912c5b3d55013f9207d52ee111dc81d861f972e7b5cd25628a8c2f9dba50cceec04dfed25',
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        data: { availability: false },
      }),
    })
      .then((response) => response.json())
      .then(() => {
        alert('Book approved successfully!');
        const listItem = button.closest('li');
        listItem.remove(); // Remove the approved book from the list
      })
      .catch((error) => console.error('Error updating book availability:', error));
  }

  // Delete Borrowed Book Record
  function deleteBorrowedBook(bookId, button) {
    fetch(`https://admin.evamarielibraries.org/api/borrowedbooks/${bookId}`, {
      method: 'DELETE',
      headers: {
        'Authorization': 'Bearer 8a751582219d16d9a8a64c10e4b419b9763acb0f90d3b1dcf9ab978308ff4c5585ee8b2fb516b57c86646d2620afe2acff22194957bb09fceccb71e8cbec9850c710eb3c4aecb0257e5839e5235c960e11d3444edd60e0b00e7681d912c5b3d55013f9207d52ee111dc81d861f972e7b5cd25628a8c2f9dba50cceec04dfed25',
        'Content-Type': 'application/json',
      },
    })
      .then((response) => {
        if (response.ok) {
          alert('Book returned successfully!');
          const listItem = button.closest('li');
          listItem.remove(); // Remove the returned book from the list
        } else {
          throw new Error('Failed to return the book.');
        }
      })
      .catch((error) => console.error('Error returning book:', error));
  }

  // Initial Load
  loadRequests();
</script>

        
       
      </div>
      <footer class="footer py-4  ">
        <div class="container-fluid">
          <div class="row align-items-center justify-content-lg-between">
            <div class="col-lg-6 mb-lg-0 mb-4">
              
            </div>
           
          </div>
        </div>
      </footer>
    </div>
  </main>
 
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/chartjs.min.js"></script>
  <!-- <script>
    var ctx = document.getElementById("chart-bars").getContext("2d");

    new Chart(ctx, {
      type: "bar",
      data: {
        labels: ["M", "T", "W", "T", "F", "S", "S"],
        datasets: [{
          label: "Sales",
          tension: 0.4,
          borderWidth: 0,
          borderRadius: 4,
          borderSkipped: false,
          backgroundColor: "rgba(255, 255, 255, .8)",
          data: [50, 20, 10, 22, 50, 10, 40],
          maxBarThickness: 6
        }, ],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              suggestedMin: 0,
              suggestedMax: 500,
              beginAtZero: true,
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
              color: "#fff"
            },
          },
          x: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });


    var ctx2 = document.getElementById("chart-line").getContext("2d");

    new Chart(ctx2, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [50, 40, 300, 320, 500, 350, 200, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });

    var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");

    new Chart(ctx3, {
      type: "line",
      data: {
        labels: ["Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
        datasets: [{
          label: "Mobile apps",
          tension: 0,
          borderWidth: 0,
          pointRadius: 5,
          pointBackgroundColor: "rgba(255, 255, 255, .8)",
          pointBorderColor: "transparent",
          borderColor: "rgba(255, 255, 255, .8)",
          borderWidth: 4,
          backgroundColor: "transparent",
          fill: true,
          data: [50, 40, 300, 220, 500, 250, 400, 230, 500],
          maxBarThickness: 6

        }],
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false,
          }
        },
        interaction: {
          intersect: false,
          mode: 'index',
        },
        scales: {
          y: {
            grid: {
              drawBorder: false,
              display: true,
              drawOnChartArea: true,
              drawTicks: false,
              borderDash: [5, 5],
              color: 'rgba(255, 255, 255, .2)'
            },
            ticks: {
              display: true,
              padding: 10,
              color: '#f8f9fa',
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
          x: {
            grid: {
              drawBorder: false,
              display: false,
              drawOnChartArea: false,
              drawTicks: false,
              borderDash: [5, 5]
            },
            ticks: {
              display: true,
              color: '#f8f9fa',
              padding: 10,
              font: {
                size: 14,
                weight: 300,
                family: "Roboto",
                style: 'normal',
                lineHeight: 2
              },
            }
          },
        },
      },
    });
  </script> -->
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