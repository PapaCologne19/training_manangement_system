   <!-- Core JS -->
   <!-- build:js assets/vendor/js/core.js -->
   <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
   <script src="../../assets/vendor/libs/popper/popper.js"></script>
   <script src="../../assets/vendor/js/bootstrap.js"></script>
   <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

   <script src="../../assets/vendor/js/menu.js"></script>
   <!-- endbuild -->

   <script>
      // Accept Training Requests
      $('#example').on('click', '.accept_btn', function(e) {
         e.preventDefault();

         var accept_id = $(this).closest("tr").find('.id').val();

         Swal.fire({
            title: "Are you sure you want to accept?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No"
         }).then((willDelete) => {
            if (willDelete.isConfirmed) {
               $.ajax({
                  type: "POST",
                  url: "../../controller/trainingController.php",
                  data: {
                     "accept_button_click": 1,
                     "accept_id": accept_id
                  },
                  success: function(response) {
                     Swal.fire({
                        title: "Success",
                        icon: "success"
                     }).then((result) => {
                        location.reload();
                     });
                  },
                  error: function(xhr, status, error) {
                     console.log("AJAX Error: " + error);
                  }
               });
            }
         });
      });

      // Reject Training Request
      $('#example').on('click', '.reject_btn', function(e) {
         e.preventDefault();

         var reject_id = $(this).closest("tr").find('.id').val();

         Swal.fire({
            title: "Are you sure you want to accept?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Yes",
            cancelButtonText: "No"
         }).then((willDelete) => {
            if (willDelete.isConfirmed) {
               $.ajax({
                  type: "POST",
                  url: "../../controller/trainingController.php",
                  data: {
                     "reject_button_click": 1,
                     "reject_id": reject_id
                  },
                  success: function(response) {
                     Swal.fire({
                        title: "Success",
                        icon: "success"
                     }).then((result) => {
                        location.reload();
                     });
                  },
                  error: function(xhr, status, error) {
                     console.log("AJAX Error: " + error);
                  }
               });
            }
         });
      });
   </script>

   <!-- Data Table -->
   <script>
      new DataTable('#example');
   </script>

   <!-- Tooltips Enabler -->
   <script>
      const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
      const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
   </script>

   <!-- Vendors JS -->
   <script src="../../assets/vendor/libs/apex-charts/apexcharts.js"></script>

   <!-- Main JS -->
   <script src="../../assets/js/main.js"></script>

   <!-- Page JS -->
   <script src="../../assets/js/dashboards-analytics.js"></script>

   <!-- Place this tag in your head or just before your close body tag. -->
   <script async defer src="https://buttons.github.io/buttons.js"></script>