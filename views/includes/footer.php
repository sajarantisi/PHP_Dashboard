<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script src="../../assets/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/js/feather.min.js"></script>
<script src="../../assets/js/Chart.min.js"></script>
<script src="../../assets/js/dashboard.js"></script>

<script>
    $(document).ready(function() {
        $(".delete").on("click", function() {
            $("#id").val($(this).attr("data-id"));
            $("#name").text($(this).closest("tr").children("td")[1].innerHTML);
            $("#deleteModal").modal("show");
        });
    });
</script>