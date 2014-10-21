<div id="header-2" class="clearfix">
	<!--
	#################################
		- THEMEPUNCH BANNER -
	#################################
	-->
	<div class="tp-banner-container">
		<div class="tp-banner" >
			<ul>
				<!-- SLIDE  -->
				<li data-transition="fade" data-slotamount="7" data-masterspeed="1500" >
					<!-- MAIN IMAGE -->
					<img src="<?php echo ASSETS;?>img/slider-image-01.jpg"  alt="Spa Hồng Vân"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
					<!-- LAYERS -->
					<!-- LAYER NR. 1 -->
					<div class="tp-caption lightgrey_divider skewfromrightshort fadeout"
						data-x="85"
						data-y="224"
						data-speed="500"
						data-start="1200"
						data-easing="Power4.easeOut">Spa Hồng Vân
					</div>
					Địa điểm 245 Trường Chinh, Tp.HCM

				</li>
				<!-- SLIDE  -->
				<li data-transition="zoomout" data-slotamount="7" data-masterspeed="1000" >
					<!-- MAIN IMAGE -->
					<img src="<?php echo ASSETS;?>img/slider-image-02.jpg"  alt="Spa Ngọc Trinh"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
					<!-- LAYERS -->
					<!-- LAYER NR. 1 -->
					<div class="tp-caption lightgrey_divider skewfromrightshort fadeout"
						data-x="85"
						data-y="224"
						data-speed="500"
						data-start="1200"
						data-easing="Power4.easeOut">My Caption
					</div>
					...
				</li>
				<!-- SLIDE  -->
				<li data-transition="zoomout" data-slotamount="7" data-masterspeed="1000" >
					<!-- MAIN IMAGE -->
					<img src="<?php echo ASSETS;?>img/slider-image-03.png"  alt="Người mẫu"  data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
					<!-- LAYERS -->
					<!-- LAYER NR. 1 -->
					<div class="tp-caption lightgrey_divider skewfromrightshort fadeout"
						data-x="85"
						data-y="224"
						data-speed="500"
						data-start="1200"
						data-easing="Power4.easeOut">My Caption
					</div>
					...
				</li>
				....
			</ul>
		</div>
	</div>
</div>

<div id="site_container" class="container">
	<div class="row">
		<?php
			Session::init();
			if(isset($_SESSION['checkReq'])){
				if(Session::get('checkReq') == FALSE){
					echo '<div class="alert alert-block alert-warning">';
					echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
					echo '<h4>Cảnh báo!</h4>';
					echo 'Không thể gửi yêu cầu, vui lòng thử lại!';
					echo '</div>';
					unset($_SESSION['checkReq']);
				}else{
					echo '<div class="alert alert-block alert-success">';
					echo '<button type="button" class="close" data-dismiss="alert">&times;</button>';
					echo '<h4>Chúc mừng bạn!</h4>';
					echo 'Gửi yêu cầu thành công, vui lòng kiểm tra email của bạn!';
					echo '</div>';
					unset($_SESSION['checkReq']);
				}
			}
		?>
	</div>
	<div class="row well">
		<div class="col-sm-offset-1 col-sm-8" id="content">
			<h3>- YÊU CẦU MẬT KHẨU -</h3>
			<div class="divider"></div>
			<form class="form-horizontal" id="password_request_form" name="password_request_form" action="<?php echo URL; ?>requestpass/sendRequestPassword" method="post">
				<div class="form-group">
					<p class="col-sm-12">
						Quên mật khẩu? Đừng lo lắng, chúng tôi sẽ giúp bạn đăng nhập trong nháy mắt - 
						chỉ cần nhập địa chỉ email của bạn vào ô bên dưới, sau đó đi kiểm tra hộp thư đến của bạn. 
						Chúng tôi sẽ gửi một đường dẫn cho phép bạn nhập mật khẩu mới.
					</p>
				</div>
				<div class="form-group">
					<p class="col-sm-12" id="email_check" style="font-weight: bold;">E-mail của bạn</p>
					<div class="col-sm-6">
						<input class="form-control required email" type="text" name="email_address" id="email_address">
					</div>
					<div class="col-sm-6"></div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<button class="btn btn-orange-black pull-right" id="re_submit" type="submit">
							<span>Gửi yêu cầu đổi mật khẩu</span>
						</button>
					</div>
				</div>
			</form>
			<!-- <p id="login_message_authentication_error" class="error" style="display:none">
				Sorry, we couldn't log you in.
			</p>
			<p id="login_message_external_authentication_required" class="error" style="display:none">
				Sorry. This account is accessed using facebook connect
			</p> -->
		</div>
	</div>
</div>
<!-- Le Transition -->
<style>
	#password_request_form *, .well {
		border-radius: 0px !important;
	}
	#password_request_form{
		border: none !important;
	}
	#password_request_form p {
		font-weight: normal;
		color: #5B5C56;
	}
	input.error{
		position: relative;
		border-left: 3px solid #cc3333;
	}
	span.error{
		position:absolute;
		background-color: #D2322D;
		left: 65%;
		bottom: 115%;
		color: #fff;
		padding: 1%;
		border: solid;
		border-color: #f5f5f5 transparent;
		border-width: 0px 0px 12px 12px;
		content: "";
		box-shadow: -3px -3px 3px #9A9797;
	}
</style>