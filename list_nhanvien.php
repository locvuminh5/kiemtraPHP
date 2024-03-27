
<?php
require_once("db.class.php");

$db = new Db();

//Giới hạn trang
$per_page = 5;

// Trang hiện tại (mặc định là trang 1)
$current_page = isset($_GET['page']) ? $_GET['page'] : 1;

// Tính OFFSET cho truy vấn SQL
$offset = ($current_page - 1) * $per_page;


$sql = "SELECT * FROM nhanvien LIMIT $per_page OFFSET $offset";
$result = $db->query_execute($sql);
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    if ($row['Ma_NV'] == $_GET['id']) {
        echo '<form class="form-inline m-2" action="update.php" method="POST">';
        echo '<td><input type="text" class="form-control" name="Ten_NV" value="' . $row['Ten_NV'] . '"></td>';
        echo '<td><input type="text" class="form-control" name="Phai" value="' . $row['Phai'] . '"></td>';
        echo '<td><input type="text" class="form-control" name="Noi_Sinh" value="' . $row['Noi_Sinh'] . '"></td>';
        echo '<td><input type="text" class="form-control" name="Luong" value="' . $row['Luong'] . '"></td>';
        echo '<td><button type="submit" class="btn btn-primary">Save</button></td>';
        echo '<input type="hidden" name="Ma_NV" value="' . $row['Ma_NV'] . '">';
        echo '</form>';
    } else {
        echo "<td>" . $row['Ma_NV'] . "</td>";
        echo "<td>" . $row['Ten_NV'] . "</td>";
        if ($row['Phai'] == "NAM") {
            echo '<td><img src="nam.png" alt="Male"></td>';
        } else {
            echo '<td><img src="nu.png" alt="Female"></td>';
        }
        echo "<td>" . $row['Noi_Sinh'] . "</td>";
        echo "<td>" . $row['Ma_Phong'] . "</td>";
        echo "<td>" . $row['Luong'] . "</td>";
        echo '<td><a class="btn btn-primary" style="margin-right: 5px" href="index.php?id=' . $row['Ma_NV'] . '" role="button">Update</a><a class="btn btn-danger" href="delete.php?id=' . $row['Ma_NV'] . '" role="button">Delete</a></td>';
    }
    echo "</tr>";
}
$total_records = $db->query_count("SELECT COUNT(*) FROM nhanvien");
$count = $total_records->fetch_array()[0];
$total_pages = ceil($count / 5);
$db->close();
?>
