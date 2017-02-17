@extends('layouts.master')

@section('content')


<div id="content-header">
	<div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a> </div>
	<h1><?php echo $pagename ?></h1>
</div>

<div class="container-fluid">
	<div class="widget-box">
		<div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
			<h5></h5>
			<div class="buttons">
				<a id="add-event" href="<?php echo DOMAIN ?>user/add" class="btn btn-inverse btn-mini"><i class="icon-plus icon-white"></i> Add User</a>
            </div>
		</div>
		<div class="widget-content nopadding">
			<table class="table table-bordered data-table">
			  <thead>
				<tr>
				  <th>User</th>
				  <th>Avatar</th>
				  <th>Create Time</th>
				  <th>Action</th>
				</tr>
			  </thead>
			  <tbody>

			  <?php if($data) {
                    foreach($data as $v){
              ?>
              				<tr class="user_<?php echo $v['id']; ?>">
              				  <td style="text-align: center;"><?php echo $v['username']; ?></td>
              				  <td style="text-align: center;"><img src="<?php echo DOMAIN . $v['images']; ?>" style="width: 50px; height: 50px;"></td>
              				  <td style="text-align: center;"><?php echo date('d-m-Y', $v['create_time']); ?></td>

              				  <td style="text-align: center;" >
              					<a href="<?php echo DOMAIN ?>user/edit/<?php echo $v['id']; ?>" style="margin-right: 20px;"><i class="icon-pencil"></i></a>
              					<a href="<?php echo $v['id']; ?>"  ><i class="icon-remove"></i></a>
              				  </td>
              				</tr>
            <?php } } ?>

			  </tbody>
			</table>
		</div>
	</div>
</div>


@stop