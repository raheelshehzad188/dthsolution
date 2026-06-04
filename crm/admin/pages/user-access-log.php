
    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div id="portlet-config" class="modal hide">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button"></button>
        <h3>Widget Settings</h3>
      </div>
      <div class="modal-body"> Widget settings form goes here </div>
    </div>
    <div class="clearfix"></div>
    <div class="content">
      <ul class="breadcrumb">
        <li>
          <p>YOU ARE HERE</p>
        </li>
        <li><a href="#" class="active">Access Log</a> </li>
      </ul>
      <div class="page-title"> <i class="icon-custom-left"></i>
        <h3>Manage Access Log</h3>
      </div>
      <div class="row-fluid">
        <div class="span12">
          <div class="grid simple ">
            <div class="grid-title">
              <h4>Table <span class="semi-bold">Styles</span></h4>
              <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
            </div>
            <div class="grid-body ">
              <table class="table table-hover table-condensed" id="example">
                <thead>
                  <tr>
                    <th style="width:1%">#Uid</th>
                    <th style="width:10%">User Name</th>
                      <th style="width:10%">Email </th>
                             <th style="width:18%">Login date | Login Time </th>
                    <th style="width:10%" data-hide="phone,tablet">IP</th>
                    <th style="width:15%">Mac id</th>
                    <th style="width:12%" data-hide="phone,tablet">City </th>
                    <th style="width:10%">Country </th>
                  </tr>
                </thead>
                <tbody>
                <?php $ret=mysqli_query($con,"select * from usercheck ");
				$cnt=1;
				while($row=mysqli_fetch_array($ret))
				{?>
                  <tr >
                    <td class="v-align-middle"><?php echo $row['user_id'];?></td>
                    <td class="v-align-middle"><?php echo $row['username'];?></td>
                               <td class="v-align-middle"><?php echo $row['email'];?></td>
                               <td class="v-align-middle"><?php echo $row['logindate'];?> | <?php echo $row['logintime'];?> </td>
                    <td class="v-align-middle"><span class="muted"><?php echo $row['ip'];?></span></td>
                    <td><span class="muted"><?php echo $row['mac'];?></span></td>
                    <td class="v-align-middle"><?php echo $row['city'];?>
                    </td>
                      <td><?php echo $row['country'];?></td>
                  </tr>
                 <?php $cnt=$cnt+1; } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
     </div>
      
    <div class="addNewRow"></div>
  