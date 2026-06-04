<?php

  include_once "includes/conn.php";
  include_once "includes/header.php";
?>

  <!-- Navigation -->
 
  <div class="masthead text-center ">
    <div class="masthead-content">
        <?php
          include_once "pages/blog_test.php";
        ?>
        <!-- <a href="registration.php" class="btn btn-primary btn-xl rounded-pill mt-5">User Signup</a> -->
      </div>
  </div>

<?php
  include_once "includes/footer.php";
?>
<script type="text/javascript">
document.addEventListener('DOMContentLoaded', function() {
  var dataTable = $('#unique_order_datatable').DataTable({
    'processing': true,
    'serverSide': true,
    'serverMethod': 'post',
    // 'scrollCollapse': true,
        // 'ordering': false,
        // pageLength: 5,
        'responsive': true,
        'dom': "<'row'<'col-sm-4'l><'col-sm-4'f><'col-sm-4 text-right'B>>t<'bottom'p><'clear'>",
       // dom: '<"html5buttons"B>lTfgitp',
         'buttons': [
                  // {extend: 'copy'},
                  // {extend: 'csv'},
                  // {extend: 'excel', title: 'ExampleFile'},
                  // {extend: 'pdf', title: 'ExampleFile'},
                  // {extend: 'print',

                  //  customize: function (win){
                  //    $(win.document.body)
                  //       .css( 'font-size', '10pt' )
                  //       .prepend(
                  //           '<div>xxxxxxxxxxxxxxxxxxxxxxxx</div><img src="http://datatables.net/media/images/logo-fade.png" style="position:absolute; top:0; left:0;" />'
                  //       );
                  //         $(win.document.body).addClass('white-bg');
                  //         $(win.document.body).css('font-size', '10px');
                  //         $(win.document.body).find('table')
                  //                 .addClass('compact')
                  //                 .css('font-size', 'inherit');
                  // }
                  // }
              ],
    //'searching': false, // Remove default Search Control
    'ajax': {

       'url':'ajax_view_blog.php',
       'data': function(data){
        var date_from = $('#date_from').val();
        var date_to = $('#date_to').val();
         // Read values
        data.date_from = date_from;
        data.date_to = date_to;
         
        
       }
    },
    'columns': [
      { data: 'id' },
      { data: 'srno' },
       { data: 'pickup_deatil' },
       { data: 'order_detail' },
       { data: 'tracK_image' },
       { data: 'delivery_detail' },
       { data: 'orgin_destination' },
       { data: 'action' },
       { data: 'payment' },
    ]
  });

  $('#submit_order').click(function(e){
    e.preventDefault();
    dataTable.draw();
  });



}, false);
</script>

 
