<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="/FinalProject">Movie Database</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Browse
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="https://cit228.pbsteele.com/FinalProject/CRUD/view/viewStudio.php">View Studios</a>
                    <a class="dropdown-item" href="https://cit228.pbsteele.com/FinalProject/CRUD/view/movie/viewAll-loggedin.php">View Movies</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Add Items
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="https://cit228.pbsteele.com/FinalProject/CRUD/add/addStudio.php">Add Studio</a>
                    <a class="dropdown-item" href="https://cit228.pbsteele.com/FinalProject/CRUD/add/addMovie.php">Add Movie</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="https://cit228.pbsteele.com/FinalProject/CRUD/add/addZipcode.php">Add Zipcode</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Generate JSON
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="https://cit228.pbsteele.com/FinalProject/json/movieJSON.php">JSON Movie</a>
                </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Admin
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="https://cit228.pbsteele.com/FinalProject/CRUD/view/viewUser.php">Manage Users</a>
                    <a class="dropdown-item" href="https://cit228.pbsteele.com/FinalProject/CRUD/view/movie/viewMovie-loggedin.php">Manage Movies</a>
                    <a class="dropdown-item" href="https://cit228.pbsteele.com/FinalProject/CRUD/view/viewStudio-loggedin.php">Manage Studios</a>
                    <a class="dropdown-item" href="https://cit228.pbsteele.com/FinalProject/CRUD/view/viewZipcode.php">Manage Zipcodes</a>
                </div>
            </li>
        </ul>
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="fas fa-user"></span> <?php echo $_SESSION["name"]; ?>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="https://cit228.pbsteele.com/FinalProject/admin/user/userProfile.php">User Profile <span class="fas fa-user"></a>
                    <a class="dropdown-item" href="https://cit228.pbsteele.com/FinalProject/admin/user/auth/logout.php" id="logout">Logout <span class="fas fa-sign-out-alt"></span></a>
                </div>
            </li>
        </ul>
    </div>
</nav>