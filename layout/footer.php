</div>

<!-- jquery -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- bootstrap -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<!-- datatable -->
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<!-- select2 -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script type="text/javascript">
$(document).ready(function() {
    $('#data').DataTable();

    $('#select2-modal').select2({
        theme: 'bootstrap-5',
        dropdownParent: $("#detailFormModal")
    });
});
</script>

<script>
function editModalShow(id, menuId, note, amount) {
    document.getElementsByName('modal_id')[0].value = id;
    document.getElementsByName('modal_menu_id')[0].value = menuId;
    document.getElementsByName('modal_note')[0].value = note;
    document.getElementsByName('modal_amount')[0].value = amount;
    $("#select2-modal").val(menuId).trigger("change");
}
</script>
</body>

</html>