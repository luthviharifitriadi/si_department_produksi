<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<div class="container">    
  <div id="loginbox" style="margin-top:50px;" class="mainbox col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">                    
    <div class="panel panel-info" >
      <div class="panel-heading">
          <div class="panel-title">Login</div>
          <div style="float:right; font-size: 80%; position: relative; top:-10px"></div>
      </div>     

        <div style="padding-top:30px" class="panel-body" >
          <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>       

            <form id="loginform" class="form-horizontal" role="form"  action="<?= base_url('auth') ?>" method="post"> 
              <?= form_error('username', '<small class="text-danger ">', '</small>') ?> 
              <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                <input id="login-username" type="text" class="form-control" name="username" value="<?= set_value('username') ?>" placeholder="username">                                 
              </div>
 
               <?= form_error('password', '<small class="text-danger ">', '</small>') ?>       
              <div style="margin-bottom: 25px" class="input-group">
                <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                <input id="login-password" type="password" class="form-control" name="password" placeholder="Kata Sandi">
              </div>
              
                        
              <div style="margin-top:10px" class="form-group">
              <!-- Button -->
                <div class="col-sm-12 controls">
                  <button type="submit" class="btn btn-primary ">
                    Login
                  </button>  
                </div>
              </div>    
            </form>  

          </div>                     
        </div>  
    </div>
  </div>
</div>
   
    