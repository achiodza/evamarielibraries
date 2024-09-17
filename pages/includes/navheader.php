<div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link text-white" href="../pages/dashboard.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <span class="nav-link-text ms-1">Library Dashboard</span>
          </a>
        </li>
     
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/billing.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">receipt_long</i>
            </div>
            <span class="nav-link-text ms-1">Borrowing History</span>
          </a>
        </li>

        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/librarybooks.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">book</i>
            </div>
            <span class="nav-link-text ms-1">Library Books</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/librarytoys.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">toys</i>
            </div>
            <span class="nav-link-text ms-1">Childrens Toys</span>
          </a>
        </li>
      
    
        <li class="nav-item mt-3">
          <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account Management</h6>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/users.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">home</i>
            </div>
            <span class="nav-link-text ms-1">Platform Users</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white " href="../pages/analytics.php">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">report</i>
            </div>
            <span class="nav-link-text ms-1">Analytics & Reports</span>
          </a>
        </li>
        
        <li class="nav-item">
          <a class="nav-link text-white " href="../index.hp">
            <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
              <i class="material-icons opacity-10">assignment</i>
            </div>
            <span class="nav-link-text ms-1">Log Out</span>
          </a>
        </li>
      </ul>
    </div>
    
  </aside>
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <!-- Navbar -->
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" data-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
            <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Dashboard </a></li>
            <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Harare | Eva Marie Libraries</li>
          </ol>
          <h6 class="font-weight-bolder mb-0"><b style="color: blue;">Eva Marie </b>Libraries</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group input-group-outline">
              
              <div class="clock" id="clock" style="color: blue;"></div>
            </div>
          </div>
          <script>
            function updateClock() {
              const now = new Date();
              const hours = now.getHours().toString().padStart(2, '0');
              const minutes = now.getMinutes().toString().padStart(2, '0');
              const seconds = now.getSeconds().toString().padStart(2, '0');
              const timeString = `${hours}:${minutes}:${seconds}`;
              
              document.getElementById('clock').textContent = timeString;
            }
            
            // Update the clock every second
            setInterval(updateClock, 1000);
            
            // Initial call to display the clock immediately
            updateClock();
          </script>
          <ul class="navbar-nav  justify-content-end">
          
            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </a>
            </li>
            <li class="nav-item px-3 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0">
                <i class="fa fa-cog fixed-plugin-button-nav cursor-pointer"></i>
              </a>
            </li>
            <li class="nav-item dropdown pe-2 d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body p-0" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="fa fa-bell cursor-pointer"></i>
              </a>
              
            </li>
            <li class="nav-item d-flex align-items-center">
              <button class="btn bg-gradient-warning mb-0" onclick="window.location.href='addbook.php'">Add Book</button>

          </li>
          <li class="nav-item d-flex align-items-center">
            <button style="margin-left: 10px;" class="btn bg-gradient-warning mb-0" onclick="window.location.href='addtoy.php'">Add Toy(s)</button>

        </li>
          </ul>
        </div>
      </div>
    </nav>