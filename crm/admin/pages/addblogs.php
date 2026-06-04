    <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
    <div id="portlet-config" class="modal hide">
      <div class="modal-header">
        <button data-dismiss="modal" class="close" type="button"></button>
        <h3>Widget Settings</h3>
      </div>
      <div class="modal-body"> Widget settings form goes here </div>
    </div>
    <div class="clearfix"></div>
    <div class="content sm-gutter">
      <div class="page-title">
      </div>
	   <!-- BEGIN DASHBOARD TILES -->
<div class="content">  
		<div class="page-title">	
			<h3>Add Blog</h3>	
            <div class="row">
                        <div class="col-md-12">
                            
                            <form class="form-horizontal" name="form1" method="post" action="" onsubmit="return valid();">
                            <div class="panel panel-default">
                               
                             
                                <div class="panel-body">                                                                        
                                    <p align="center" style="color:#FF0000"></p>
                               <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Title</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                  <span class="input-group-addon"><span class="fa fa-angle-right" ></span></span>
                                                <input type="text" name="title" id="title" value="" class="form-control" autocomplete="off">
                                            </div>            
                                        
                                        </div>
                                    </div>
									
									
									<div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Subject</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                               <span class="input-group-addon"><span class="fa fa-angle-right" ></span></span>
                                                <input type="text" name="subject" id="subject" value="" class="form-control">
                                            </div>            
                                          </div>
                                    </div>
									 <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Description</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-angle-right" ></span></span>
                                                <textarea class="ckeditor desc" name="desc" id="content"></textarea>
                                            </div>            
                                        </div>
                                    </div>
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Image</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-angle-right" ></span></span>
                                                 <input type="file" class="form-control-file" id="image" name="image">
                                            </div>            
                                        </div>
                                    </div>
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Author</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                               <span class="input-group-addon"><span class="fa fa-angle-right" ></span></span>
                                                <input type="text" name="author" id="author" value="" class="form-control">
                                            </div>            
                                          </div>
                                    </div>
                                    <div class="form-group">                                        
                                        <label class="col-md-3 col-xs-12 control-label">Published Date</label>
                                        <div class="col-md-6 col-xs-12">
                                            <div class="input-group">
                                               <span class="input-group-addon"><span class="fa fa-angle-right" ></span></span>
                                                <input type="text" value="<?php echo date("M j Y"); ?>" class="form-control datepicker" id="blog_date" name="date">
                                            </div>            
                                          </div>
                                    </div>
                                </div>                               
                                    <input type="submit" value="Save" name="save" class="btn btn-primary pull-right" id="save_blog">
                                
                            </div>
                            </form>
                        </div>
                    </div>                    
		</div>
    </div>
                </div>
			
               