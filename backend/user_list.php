<?php
    include 'layout/header.php';
?>
    <!-- Content Body -->
    <div class="container-fluid p-4">
        <h3>User List</h3>

        <!-- Example Content Cards -->
        <div class="row">

            <table id="usersTable" class="display">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = []) { ?>
                        <tr>
                            <td><?= $row['id']; ?></td>
                            <td><?= $row['name']; ?></td>
                            <td><?= $row['email']; ?></td>
                            <td><?= $row['phone']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

        </div>
    </div>

<?php
    include 'layout/footer.php';
?>

<script>
$(document).ready(function() {
    $('#usersTable').DataTable(); // Initialize DataTables
});
</script>
