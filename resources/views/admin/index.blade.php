@extends('layouts.admin')
@section('content')
	<!--头部 开始-->
	<div class="top_box">
		<div class="top_left">
			<div class="logo">后台管理模板</div>
			<ul>
				<li><a href="#" class="active">首页</a></li>
				<li><a href="#">管理页</a></li>
			</ul>
		</div>
		<div class="top_right">
			<ul>

				<li>管理员：{{session('user')->username}}</li>
				<li><a href="{{url('admin/cgpass')}}" target="main">修改密码</a></li>
				<li><a href="{{url('admin/loginout')}}">退出</a></li>
			</ul>
		</div>
	</div>
	<!--头部 结束-->

	<!--左侧导航 开始-->
	@include('admin.common.left')
	<!--左侧导航 结束-->

	<!--主体部分 开始-->
	<div class="main_box">
		<iframe src="{{url('admin/info')}}" frameborder="0" width="100%" height="100%" name="main"></iframe>
	</div>
	<!--主体部分 结束-->

	<!--底部 开始-->
	<div class="bottom_box">
		CopyRight © 2015. Powered By <a href="http://www.houdunwang.com">http://www.houdunwang.com</a>.
	</div>
	<!--底部 结束-->
@endsection