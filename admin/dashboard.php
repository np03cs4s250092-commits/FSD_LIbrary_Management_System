<?php
require_once "../includes/auth.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>

    <!-- MAIN CSS -->
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>

<div class="wrapper">

    <!-- SIDEBAR -->
    <div class="sidebar">
        <h2>Library System</h2>
        <ul>
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="students.php">Manage Students</a></li>
            <li><a href="categories.php">Manage Categories</a></li>
            <li><a href="books.php">Manage Books</a></li>
            <li><a href="issue_book.php">Issue Books</a></li>
            <li><a href="return_book.php">Return Books</a></li>
            <li><a href="../logout.php">Logout</a></li>
        </ul>
    </div>

    <!-- MAIN CONTENT -->
    <div class="main-content">

        <!-- HEADER -->
        <div class="header">
            <h1>Welcome, <?php echo htmlspecialchars($_SESSION["username"]); ?></h1>
        </div>

        <!-- SEARCH CARD -->
        <div class="card">
            <h3>Search Books</h3>
            <div class="search-box">
                <input type="text" id="searchBox" placeholder="Type book title or author...">
            </div>
            <ul id="result"></ul>
        </div>

        <!-- FOOTER -->
        <div class="footer">
            &copy; <?php echo date("Y"); ?> Library Management System
        </div>

    </div>
</div>

<!-- AJAX SEARCH SCRIPT -->
<script>
document.getElementById("searchBox").addEventListener("keyup", function () {
    let term = this.value.trim();

    if (term.length < 2) {
        document.getElementById("result").innerHTML = "";
        return;
    }

    fetch("../ajax/search_books.php?term=" + encodeURIComponent(term))
        .then(res => res.json())
        .then(data => {
            let list = "";
            data.forEach(item => {
                list += "<li>" + item + "</li>";
            });
            document.getElementById("result").innerHTML = list;
        });
});
</script>

</body>
</html>
