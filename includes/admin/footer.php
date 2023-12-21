<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="../../Public/Js/jquery-3.3.1.slim.min.js"></script>
<script src="../../Public/Js/popper.min.js"></script>
<script src="../../Public/Js/bootstrap.min.js"></script>
<script src="../../Public/Js/jquery-3.3.1.min.js"></script>
<script src="../../Public/Js/bootstrap.bundle.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
            $('#content').toggleClass('active');
        });

        $('.more-button,.body-overlay').on('click', function() {
            $('#sidebar,.body-overlay').toggleClass('show-nav');
        });

    });
</script>

<script>
    const activeItems = document.querySelectorAll(".dashboard");

    activeItems.forEach(item => {
        item.addEventListener("click", () => {
            activeItems.forEach(otherItem => {
                otherItem.parentElement.classList.remove("active");
            });

            item.parentElement.classList.add("active");
        });
    });
</script>

</body>

</html>