<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<!-- Bootstrap 5 JS and Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

<script>
    // Toggle sidebar visibility
    document.getElementById('menu-toggle').addEventListener('click', function () {
        var sidebar = document.getElementById('sidebar-wrapper');
        sidebar.style.display = sidebar.style.display === 'none' ? 'block' : 'none';

        var contentWidth = document.getElementById('page-content-wrapper');
        contentWidth.style.marginLeft = sidebar.style.display == 'none' ? '0px' : '250px';
    });
</script>