@extends('layouts.master')

@section('content')

<div id="content-header">
  <div id="breadcrumb">  </div>
  <h1><?php echo $pagename; ?></h1>
</div>
<div class="container-fluid">
	<hr>
	<div class="row-fluid">
		<div class="span12">
		  <div class="widget-box">
			<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
			  <?php if($succ): ?><h5 style="color: #28b779;"><?= $succ; ?></h5> <?php endif; ?>
			  <?php if($error): ?><h5 style="color: #da542e;"><?= $error; ?></h5><?php endif; ?>
			</div>
			<div class="widget-content nopadding">
			  <form action="<?php echo DOMAIN ?>user/add2" method="post" class="form-horizontal" enctype="multipart/form-data">
			  <input type="hidden" name="_token" value="{{ csrf_token() }}">
				<div class="control-group">
				  <label class="control-label">Username:</label>
				  <div class="controls">
					<input type="text" class="span11" required placeholder="Username" name="username" value="<?php echo $username ? $username : ''; ?>" />
				  </div>
				</div>
				<div class="control-group">
				  <label class="control-label">Password:</label>
				  <div class="controls">
				    <input type="password" class="span11" required placeholder="Password" name="password" value="" />
				  </div>
				</div>
				<div class="control-group">
                  <label class="control-label">Password Confirm :</label>
                  <div class="controls">
                    <input type="password" class="span11" required placeholder="Password Confirm" name="re_password" value="" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Images :</label>
                  <div class="controls">
                    <input type="file" name="photo" />
                  </div>
                </div>
				<div class="form-actions">
				  <button type="submit" name="submit" class="btn btn-success">Save</button>
				</div>
			  </form>
			</div>
		  </div>
		</div>
	</div>
</div>

@stop