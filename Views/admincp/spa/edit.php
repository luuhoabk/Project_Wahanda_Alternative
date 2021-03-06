<div id="home-holder" class="content-holder pending">
	<div class="sidebar">
		<div class="venue-info">
			<p class="title-admincp">Quản lý địa điểm</p>
			<button onclick="returnToSpa()" id="" class="button button-primary redeem" type="button">
				<div class="button-inner">
					<div class="button-icon icons-arrow-left2"></div>
					Trờ về trang địa điểm
				</div>
			</button>
		</div>
	</div>
	<div class="main-content">
		<h3 class="add-place">Sửa/ Xóa một địa điểm</h3>
		<hr />
		<div style="display: none;" id="error_edit_place">
			<p class="alert alert-warning">Địa điểm không tồn tại !</p>
		</div>
		<div class="row" id="edit_place">
			<div class="form-horizontal">
				<div class="col-md-6">
					<div class="form-group">
						<label class="control-label col-md-4">Họ tên</label>
						<div class="col-md-8">
							<input id="user_full_name" name="user_full_name" class="form-control" type="text" placeholder="Nhập họ tên người đăng ký..." />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4">Email</label>
						<div class="col-md-8">
							<input readonly="readonly" id="user_email" name="user_email" class="form-control" type="text" placeholder="Nhập email (*)..." />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4">Tên địa điểm</label>
						<div class="col-md-8">
							<input readonly="readonly" id="user_business_name" name="user_business_name" class="form-control" type="text" placeholder="Nhập tên địa điểm (thương hiệu *)..." />
						</div>
					</div>
				</div>
				<div class="col-md-6">			
					<div class="form-group">
						<label class="control-label col-md-4">Địa chỉ (*)</label>
						<div class="col-md-8">
							<input id="user_address" name="user_address" class="form-control" type="text" placeholder="Nhập địa chỉ (*)..." />
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4">Quận</label>
						<div class="col-md-8">
							<select id="user_district_id" class="form-control">
								
							</select>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-md-4">Số ĐT</label>
						<div class="col-md-8">
							<input id="user_phone" onkeypress="inputNumbers(event)" name="user_phone" class="form-control" type="text" placeholder="Nhập số điện thoại.." />
						</div>
					</div>
				</div>
			</div>
		</div>
		<hr />
		<div class="row">
			<div class="col-md-12">
				<button onclick="saveEditDetail()" id="btn_edit_spa" type="button" class="button action action-default button-primary save-action">
					<div class="button-inner">
						<div class="button-icon icons-tick done"></div>
						<div id="save_loading" class="button-icon fa fa-spin fa-refresh s-loading"></div>
						<span class="msg msg-action-default">Lưu</span>
					</div>
				</button>
				<button onclick="deleteUser()" id="btn_delete_spa" type="button" class="button action action-default button-secondary save-action">
					<div class="button-inner">
						<div class="button-icon icons-delete remove"></div>
						<div id="remove_loading" class="button-icon fa fa-spin fa-refresh s-loading"></div>
						<span class="msg msg-action-default">Xóa</span>
					</div>
				</button>
				<button onclick="approveUser()" id="btn_approve_spa" type="button" class="button action action-default button-other save-action">
					<div class="button-inner">
						<div class="button-icon icons-tick approve"></div>
						<div id="approve_loading" class="button-icon fa fa-spin fa-refresh s-loading"></div>
						<span class="msg msg-action-default">Xác thực</span>
					</div>
				</button>
				<small id="error_add_spa" style="color: red; display: none;">Nhập đầy đủ các trường có (*)</small>
			</div>
		</div>
	</div>
</div>
<script>
	var IS_ADD = 0;
	var IS_EDIT = 1;
	var USER_ID = "<?php echo $this -> user_id; ?>";
</script>