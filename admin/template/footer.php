<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script>
      $(document).ready(function() {
		  $('.summernote').summernote({
            width : 500,
            height : 300,
          });
      $('.summernote_challenge').summernote({
            width : 500,
            height : 120,
          });
      $('.challenge').summernote({
            width : 500,
            height : 120,
          });
      $('.summernote_insert').summernote({
            width : 500,
            height : 300,
          });
		});
    $(document).ready(function(){
        $('#table_langganan').DataTable();
        $('#table').DataTable(/*/{searchingkey: "value",  false,}/*/);
    });
</script>
    <script src="../assets/js/admin.js"></script>
  	<!-- <script src="../js/jquery.min.js"></script> -->
  </body>
</html>