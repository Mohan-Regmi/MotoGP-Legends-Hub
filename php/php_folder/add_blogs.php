<?php
$conn = new mysqli("localhost", "root", "", "motogp");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM blogs ORDER BY published_date DESC";
$result = $conn->query($sql);
?>

<tbody>
<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo '<tr>
            <td>'.$row['id'].'</td>
            <td>'.htmlspecialchars($row['title']).'</td>
            <td>'.htmlspecialchars($row['category']).'</td>
            <td><img src="'.htmlspecialchars($row['featured_image']).'" alt="Image"></td>
            <td>'.htmlspecialchars($row['author']).'</td>
            <td>'.htmlspecialchars($row['published_date']).'</td>
            <td>'.htmlspecialchars($row['status']).'</td>
            <td>
                <a href="edit_blog.php?id='.$row['id'].'" class="action-btn">Edit</a>
                <a href="delete_blog.php?id='.$row['id'].'" class="action-btn" onclick="return confirm(\'Are you sure?\')">Delete</a>
            </td>
        </tr>';
    }
} else {
    echo '<tr><td colspan="8" style="text-align:center;">No blogs found.</td></tr>';
}
$conn->close();
?>
</tbody>
