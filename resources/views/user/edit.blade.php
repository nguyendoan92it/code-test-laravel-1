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
			  <form action="<?php echo DOMAIN ?>user/edit2/<?php echo $id; ?>" method="post" class="form-horizontal" >
			  <input type="hidden" name="_token" value="{{ csrf_token() }}" content="{{ csrf_token() }}">
			  <input type="hidden" name="id" value="<?php echo $id; ?>">
			  <input type="hidden" name="check_submit" value="<?php echo md5($id.'khong_hack_duoc_dau_12345'); ?>">
				<div class="control-group">
				  <label class="control-label">Username:</label>
				  <div class="controls">
					<input type="text" class="span11" placeholder="Username" name="username" value="<?php echo $username ? $username : ''; ?>" />
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