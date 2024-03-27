<?php
session_start();
if(isset($_SESSION['username'])) {
    header("location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>

    <div class="container text-center">

        <h1>Thông tin nhân viên</h1>

        <table class="table table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Mã Nhân Viên</th>
                    <th>Tên Nhân Viên</th>
                    <th>Giới Tính</th>
                    <th>Nơi sinh</th>
                    <th>Tên Phòng</th>
                    <th>Lương</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php include_once("list_nhanvien.php"); ?>
            </tbody>
        </table>

        <!-- <form class="form-inline m-2" action="create.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" class="form-control m-2" id="name" name="name">
            <label for="score">Score:</label>
            <input type="number" class="form-control m-2" id="score" name="score">
            <button type="submit" class="btn btn-primary">Add</button>
        </form> -->
        <?php
            
        ?>
        <nav aria-label="Page navigation example" style="justify-content: center; display: flex;">
        <ul class="pagination">
            <?php for ($i = 1; $i <= $total_pages; $i++) : ?>
                <li class="page-item <?php if ($i == $current_page) echo 'active'; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>

    <a href="logout.php" style="position: absolute; right: 0; top: 0; margin: 10px" class="btn btn-danger">Logout</a>
    </div>
</body>

</html>