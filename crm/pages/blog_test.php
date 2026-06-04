<img class="d-block w-100" src="assets/img/slider1.jpg" alt="First slide" height="400">
<div class="centered">Blogs</div>
<div class="container">
<div class="row">
    <div class="col-md-4 hide-mobile d-sm-none d-md-block">
        <ul class="list-group side_blog">
          <li class="list-group-item active" aria-current="true">An active item</li>
          <li class="list-group-item">A second item</li>
          <li class="list-group-item">A third item</li>
          <li class="list-group-item">A fourth item</li>
          <li class="list-group-item">And a fifth one</li>
        </ul>
    </div>    
    <div class="col-sm-12 col-md-8 blogs">
        <div class="container">
            <?php
                $from = date('M j Y', strtotime('today - 30 days'));
                $to = date('M j Y');
            ?>
           <form>
               <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                        <label for="exampleInputEmail1">From</label>
                        <input type="text" class="form-control datepicker" id="date_from" name="from" value="<?php echo $from; ?>">
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="form-group">
                        <label for="exampleInputPassword1">To</label>
                        <input type="text" class="form-control datepicker" id="date_to" name="to" value="<?php echo $to; ?>">
                    </div>
                </div>
                <div class="col-sm-6 col-md-2">
                    <button type="submit" class="btn btn-primary" id="submit_order">Submit</button>
                </div>
               </div>
            </form>
           
          <div class="row">
                        <div class="col-sm-12 order_listing_views table-responsive">
                          <table class="order_list_view" id="unique_order_datatable" >
              <!-- <table class="" > -->
                <thead style="display: none">
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th></th>
                </thead>

                            </table>
              </div>
              <div class="cargo_banner"></div>
                          <div class="col-sm-3 order_info_box hidden" id="view_box_detail">

                                  <div class="fix_wrapper_h" id="fix_wrapper_h">
                                  </div>
                          </div>

                      </div>
        </div>
      </div> 
    </div>
</div>