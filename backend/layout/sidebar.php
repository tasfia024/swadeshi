<!-- Sidebar -->
<div class="text-white" id="sidebar-wrapper">
    <div class="sidebar-heading p-4" style="border-bottom: 1px solid #ddd">
        <div class="logo-container">
            <img class="logo" src="../asset/img/logo.jpg">
        </div>
        <div class="text-center">
            <?php echo $panelTitle ?>
        </div>
    </div>
    <div class="list-group list-group-flush">
        <a href="dashboard.php" class="list-group-item list-group-item-action text-white">
            <i class="fas fa-tachometer-alt"></i> Dashboard
        </a>

        <a href="profile_view.php" class="list-group-item list-group-item-action text-white">
            <i class="fas fa-user"></i> Profile
        </a>

        <?php 
        if ($userType == 1) { ?>
        <a href="user_list.php" class="list-group-item list-group-item-action text-white">
            <i class="fas fa-users"></i> Users
        </a>

        <a href="category_list.php" class="list-group-item list-group-item-action text-white">
            <i class="fas fa-list"></i> Category
        </a>

        <a href="sub_category_list.php" class="list-group-item list-group-item-action text-white">
            <i class="fas fa-list"></i> Sub Category
        </a>

        <?php } ?>

        <?php if ($userType == 1 || $userType == 2) { ?>
        <a href="product_list.php" class="list-group-item list-group-item-action text-white">
            <i class="fas fa-list"></i> Products
        </a>
        <?php } ?>


        <a href="#" class="list-group-item list-group-item-action text-white">
            <i class="fas fa-circle"></i> Cart List
        </a>
        <a href="#" class="list-group-item list-group-item-action text-white">
            <i class="fas fa-circle"></i> Order List
        </a>

        <a href="vendor_app_list.php" class="list-group-item list-group-item-action text-white">
            <i class="fas fa-circle"></i> Vendor Application
        </a>


        <?php if ($userType == 1) { ?>
        <a href="#" class="list-group-item list-group-item-action text-white">
            <i class="fas fa-cogs"></i> Settings
        </a>
        <?php } ?>


        <a href="?action=logout" class="list-group-item list-group-item-action text-white">
            <i class="fa fa-power-off"></i> Sign Out
        </a>
    </div>
</div>