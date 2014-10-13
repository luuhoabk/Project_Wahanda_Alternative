<div id="calendar-holder" class="content-holder type-appointment">
	<div class="section-aside has-upgrade-note">
		<div class="calendar-wrapper">
			<div class="calendar-buttons">
				<div class="redeem-evoucher-box">
					<button class="button button-primary button-flexible redeem" type="button" data-toggle="modal" data-target="#redeemVoucher_modal">
						<div class="button-inner">
							<div class="button-icon icons-voucher"></div>
							Redeem an eVoucher
						</div>
					</button>
				</div>
			</div><!-- END redeem-evoucher-box -->


		</div>
	</div><!-- END Side bar -->


	<!-- Section Main -->
	<div class="section-main">
		<div class="calendar-pane">
			<div class="calendar-main-header">
				<div class="calendar-search top-search">
					<div class="txt-input">
						<input type="text" placeholder="Search: client, phone#, order#..." id="calendar-search" name="calendar-search" class="ui-autocomplete-input" autocomplete="off" role="textbox" aria-autocomplete="list" aria-haspopup="true">
						<a class="clear-search" href="#" ><div class="icons-clear-search-mini"></div></a>
						<div class="search-loader" ></div>
					</div>
					<ul class="ui-autocomplete ui-menu ui-widget ui-widget-content ui-corner-all search-results" role="listbox" aria-activedescendant="ui-active-menuitem" style="top: 0px; left: 0px; display: none;"></ul>
				</div>
			</div>
		</div><!-- END Calendar Pane -->

		<div class="form-content">
			<div id='script-warning'>
				<!-- <code>php/get-events.php</code> must be running. -->
				Mất kết nối với máy chủ.
			</div>

			<div id='loading' class="search-loader"> loading...</div>

			<!-- CALENDAR -->
			<div id='calendar'></div>
		</div>

		<div class="sync-button" id="employee-ext-calendar-sync">
			<button title="Click to update availabilities from external calendar" class="button button-basic no-txt" type="button">
				<div class="button-inner">
					<div class="button-icon icons-sync"></div>
				</div>
			</button>
		</div>
	</div>
</div>



<!-- Modal redeemVoucher_modal-->
<div id="redeemVoucher_modal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="ui-dialog-title-voucher-redemption" aria-hidden="true">
	<div class="modal-dialog" style="width: 500px;">
		<div class="modal-content">
			<div class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-draggable">
				<div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
					<span class="ui-dialog-title" id="ui-dialog-title-voucher-redemption">eVoucher</span>
					<a href="#" class="ui-dialog-titlebar-close ui-corner-all" role="button">
						<span class="ui-icon ui-icon-closethick">close</span>
					</a>
				</div>
				<div id="voucher-redemption" class="ui-dialog-content ui-widget-content" scrolltop="0" scrollleft="0">
					<div class="voucher-search">
						<form novalidate="novalidate">
							<div class="icon icons-logo-vouchers"></div>

							<div class="reference-container txt-input txt-input-big">
								<input type="tel" class="required evoucher-code valid" name="voucher-reference">
								<div class="clear-search"><div class="icons-delete3"></div></div>
							</div>
							<button class="button action action-default button-primary find-action" type="submit"><div class="button-inner"><span class="msg msg-action-default">Find</span><span class="msg msg-action-doing">Searching...</span></div></button>
						</form>
					</div>
					<div class="voucher-redemption-wrapper">
						<div class="voucher-note voucher-start" style="position: relative;">
							<div class="voucher-note-inner vertically-centered" style="position: absolute; height: 101px; top: 50%; margin-top: -50.5px;">
								<p class="main-title">Please enter eVoucher number</p>
								<ul class="simple-list">
									<li>Look for eVoucher number on the booking confirmation email.</li>
									<li>Redeem eVoucher bookings only. For appointments, you just need to confirm them to get paid.</li>
								</ul>
							</div>
						</div>
						<div class="voucher-note voucher-searching hidden">
							<div class="voucher-note-inner vertically-centered">
								<div class="icon"></div>
								Searching...
							</div>
						</div>
						<div class="voucher-note voucher-not-found hidden">
							<div class="voucher-note-inner vertically-centered">
								Voucher not found.
								<span>Please check that you have entered the voucher number correctly.</span>
							</div>
						</div>
						<div class="voucher-note voucher-belongs hidden">
							<div class="voucher-note-inner vertically-centered">
								Voucher belongs to another venue
								<span><a class="login-link" target="_blank" href="/login?route=%2Fhome">Do you want to login as different user?</a></span>
							</div>
						</div>
						<div class="voucher-info hidden">
							<ul class="voucher-container">
								<li class="price-wrapper">
									<span class="evoucher-price"></span>
								</li>
								<li class="title-wrapper">
									<span class="title"></span>
								</li>
								<li class="status-wrapper status-active">
									Status:
									<span class="evoucher-status status-txt"></span>
								</li>
								<li class="expiration-wrapper">
									<span class="label-wrapper">Expires on</span>
									<span class="evoucher-expiry"></span>
								</li>
								<li class="recipient-wrapper">
									<span class="label-wrapper">Recipient</span>
									<span class="evoucher-recipient"></span>
								</li>
							</ul>
							<div class="meta-wrapper">
								Order ref#:
								<span class="evoucher-order-ref"></span>

								<span class="b-booking-link hidden">
									<span class="separator">|</span>
									Booking ID:
									<a class="evoucher-booking-id" href="javascript:;"></a>
								</span>
							</div>
							<div class="venue-wrapper hidden">
								<form novalidate="novalidate">
									<table cellspacing="0" cellpadding="0" class="default-form ">
										<tbody><tr class="form-row">
											<td class="label-part"><label for="voucher-redemption-venue-id">Redeem at this venue:</label></td>
											<td class="input-part evoucher-venue-container"></td>
										</tr>
									</tbody></table>
								</form>
							</div>
							<div class="message-wrapper message-valid hidden">
								<div class="message">
									<span class="v-message-title">Voucher redeemed</span>
									<span class="payment-date b-payment-date v-payment-date"></span>
								</div>
							</div>
						</div>
					</div>
					<div class="dialog-actions">
						<button class="button action action-default button-primary redeem-another hidden" type="button"><div class="button-inner"><div class="button-icon icons-voucher"></div>Redeem another</div></button>
						<button class="button action action-default button-primary redeem-action hidden" type="button"><div class="button-inner"><div class="button-icon icons-voucher"></div><span class="msg msg-action-default">Redeem</span><span class="msg msg-action-doing">Working...</span></div></button>
						<button class="button button-primary a-create-appointment hidden" type="button"><div class="button-inner"><div class="button-icon icons-plus"></div>Book an appointment</div></button>
						<a class="button-cancel a-cancel" data-dismiss="modal" href="javascript:;">Cancel</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div><!-- END redeemVoucher_modal-->

<!-- Modal confirmedAppointment_modal-->
<div id="confirmedAppointment_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog" style="width: 800px;">
        <div class="modal-content">
            <div class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-draggable">
                <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix status-scheduled">
                    <span id="ui-dialog-title-1" class="ui-dialog-title">Confirmed Appointment</span>
                    <a role="button" class="ui-dialog-titlebar-close ui-corner-all" href="#">
                        <span class="ui-icon ui-icon-closethick" data-dismiss="modal">close</span>
                    </a>
                </div>   
                <div scrollleft="0" scrolltop="0" class="ui-dialog-content ui-widget-content">
                    <div class="calendar-appointment-wrapper">
                        <div class="dialog-content">
                            <div class="form-intro warning">
                                <div class="icon icons-attention"></div>
                                <p>
                                    <span class="warning-title">Please assign employee for this appointment</span>
                                </p>
                            </div>
                            <div class="clearfix appointment-info">
                                <div class="calendar-time">
                                    <div class="weekday">Thứ 3 weekday</div>
                                    <div class="day">19 day</div>
                                    <div class="year-month">
                                        <span class="month">Tháng 8 month</span>, <span class="year">2014 year</span>
                                    </div>
                                    <div class="time">13:00 time</div>
                                </div>
                                <div class="title-and-sku">
                                    <div class="title user_service_name">Service name</div>
                                    <div class="sku hidden"></div>
                                </div>
                                <table class="default-data-table" cellpadding="0" cellspacing="0">
                                    <tbody><tr class="b-venue-name hidden">
                                        <th>Venue name</th>
                                        <td><span class="v-venue-name"></span></td>
                                    </tr>
                                    <tr>
                                        <th>Thời gian</th>
                                        <td><span class="user_service_duration">1 h </span></td>
                                    </tr>
                                    <tr class="b-price">
                                        <th class="v-price-title user_service_price">Giá</th>
                                        <td>
                                            <span class="price v-price"></span>
                                            <span class="status-prepaid label label-confirmed">Prepaid</span>
                                            <span class="status status-unpaid">Unpaid</span>
                                            <span class="status-paid label label-confirmed">Paid at venue</span>
                                            <span class="b-status status status-discounted hidden"></span>
                                        </td>
                                    </tr>
                                    <tr class="hidden b-additional-price">
                                        <th class="v-additional-price-title">Additional Price</th>
                                        <td>
                                            <span class="price v-additional-price"></span>
                                            <span class="status-paid label label-confirmed hidden">Paid at venue</span>
                                        </td>
                                    </tr>
                                    <tr class="b-total hidden">
                                        <th class="v-total-price-title">Giá</th>
                                        <td>
                                            <span class="price v-total-price">-</span>
                                            <span class="status status-unpaid">Unpaid</span>
                                            <span class="status-prepaid label label-confirmed hidden">Prepaid</span>
                                            <span class="status-paid label label-confirmed hidden">Paid at venue</span>

                                            <span class="b-status status status-discounted hidden"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Status</th>
                                        <td><span class="status-paid label label-confirmed hidden">Prepaid</span><span class="b-status status payment-status hidden"></span></td>
                                    </tr> 
                                    <tr class="b-view-in-calendar hidden">
                                        <td colspan="2"><a class="v-view-in-calendar" href="/calendar#venue/285925/appointment/appointment/549569">View in calendar</a></td>
                                    </tr>
                                </tbody></table>
                                <div class="appointment-actions">
                                    <button type="button" class="button button-primary accept-action"><div class="button-inner"><div class="button-icon icons-tick5"></div>Accept</div></button>
                                    <button type="button" class="button button-attention smart-reschedule-action hidden"><div class="button-inner"><div class="button-icon icons-edit2"></div>Smart reschedule</div></button>
                                    <button type="button" class="button button-secondary reject-action"><div class="button-inner"><div class="button-icon icons-reject2"></div>Reject</div></button>
                                </div>
                            </div>
                            <div class="appointment-notes has-notes hidden">
                                <span class="notes-title">Appointment notes:</span>
                                <span class="notes v-notes"></span>
                                <div style="display: none;" class="wahanda-notes b-verification-notes hidden">
                                    <span class="icon icons-attention-small2"></span>
                                    <span class="notes-title">Notes from Wahanda:</span>
                                    <span class="notes v-verification-notes"></span>
                                </div>
                            </div>
                            <div class="client-info clearfix">
                                <div class="icons-customer"></div>
                                <ul class="person-info">
                                    <li class="person-name">
                                        <a href="javascript:;" class="a-view-consumer"><span class="client_name">0903676222</span></a>
                                        <a href="javascript:;" class="edit-link a-rebook">
                                            Rebook
                                        </a>
                                    </li>
                                    <li class="consumer-phone-row">
                                        <div class="icon icons-phone"></div>
                                        <span class="consumer-phone">+84 90 367 62 22</span>
                                    </li>
                                    <li class="consumer-email-row">
                                        <div class="icon icons-email"></div>
                                        <a class="consumer-email" href="mailto:vietnt134@gmail.com">vietnt134@gmail.com</a>
                                    </li>
                                </ul>

                                <div class="client-note">

                                    <span class="note-wrapper v-note">hello</span>

                                    <div class="icons-note-tip2"></div>
                                </div>
                            </div>
                            <div class="appointment-meta">
                                Booked at: <span class="full-date">19/08/2014, 13:40</span>
                                <span class="separator">|</span>
                                Source:<span class="source">Added in Connect by minhnhat</span>
                                <span class="order-ref-part hidden">
                                    <span class="separator">|</span>
                                    Order ref#: <a href="javascript:;" class="order-ref">null</a>
                                </span>
                                <div class="b-evoucher-ref hidden">
                                    Created by using eVoucher: <a href="javascript:;" class="v-evoucher-ref"></a>
                                </div>
                            </div>
                        </div>
                        <div class="dialog-actions b-standard-actions">
                            <button type="button" class="button button-primary a-ok"><div class="button-inner"><div class="button-icon icons-tick"></div>OK</div></button>
                            <button type="button" class="button button-edit change-only-this edit-appointment" data-toggle="modal" data-target="#appointment_modal">
                                <div class="button-inner"><div class="button-icon icons-edit2"></div>Edit / Reschedule</div>
                            </button>
                            <button type="button" class="button a-no-show button-secondary delete-action hidden"><div class="button-inner"><div class="button-icon icons-no-show"></div>No show</div></button>
                            <button type="button" class="button action action-default a-delete button-secondary delete-action"><div class="button-inner"><div class="button-icon icons-delete"></div><span class="msg msg-action-default">Delete</span><span class="msg msg-action-doing">Deleting...</span></div></button>
                            <button type="button" class="button button-other a-checkout"><div class="button-inner"><div class="button-icon icons-tick"></div>Complete</div></button>

                            <div class="sub-actions">
                                <a href="javascript:;" class="button-cancel" data-dismiss="modal">Close</a>
                            </div>
                        </div>
                        <div class="dialog-actions b-unassigned-actions hidden">
                            <button type="submit" class="button action action-default button-primary save-action">
                                <div class="button-inner">
                                    <div class="button-icon icons-tick"></div>
                                    <span class="msg msg-action-default">Save</span>
                                </div>
                            </button>
                            <a href="javascript:;" class="button-cancel">Cancel</a>
                        </div>
                    </div>
                </div>
            </div> 
        </div>
    </div>
</div><!-- END confirmedAppointment_modal-->

<!-- Modal editConfirmedAppointment_modal-->
<div id="editConfirmedAppointment_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ui-dialog-title-appointment-dialog">
    <div class="modal-dialog" style="width: 615px;">
        <div class="modal-content">
            <div class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-draggable">
                <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
                    <span id="ui-dialog-title-appointment-dialog" class="ui-dialog-title">Appointment</span>
                    <a role="button" class="ui-dialog-titlebar-close ui-corner-all" href="#">
                        <span class="ui-icon ui-icon-closethick">close</span>
                    </a>
                </div>
                <div scrollleft="0" scrolltop="0" class="ui-dialog-content ui-widget-content" id="appointment-dialog">
                <form novalidate="novalidate">
                    <div class="dialog-content clearfix">
                        <table class="default-form part-one" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr class="form-row client-select">
                                    <td class="label-part">
                                        <label for="">Khách hàng</label>
                                    </td>
                                    <td class="input-part b-consumer">
                                        <!-- search -->
                                        <div class="txt-input b-consumer-autocomplete hidden">
                                            <input aria-haspopup="true" aria-autocomplete="list" role="textbox" autocomplete="off" id="consumer-block-search" name="consumer-block-search" class="ui-autocomplete-input" placeholder="Search by phone number or name" type="text">
                                            <input id="consumer-block-anonymous-comment" class="hidden" placeholder="Walk-in comment" type="text">
                                        </div>
                                        <!-- end search -->
                                        <!-- client -->
                                        <ul class="person-info b-person-info">
                                            <li class="person-name">
                                                <span class="b-consumer-name">
                                                    <a href="javascript:;" class="f-consumer-name a-show-customer">0903676222</a>
                                                </span>
                                                <a href="javascript:;" class="edit-link a-consumer-edit" data-toggle="modal" data-target="#client_modal">Sửa</a>
                                                <a style="display: none;" href="javascript:;" class="edit-link a-change-consumer">Change client</a>
                                            </li>
                                            <li class="consumer-phoneNumber-row b-consumer-phone">
                                                <div class="icon icons-phone"></div>
                                                <span class="v-consumer-phone">+84 90 367 62 22</span>
                                            </li>
                                            <li style="display: list-item;" class="consumer-email-row b-consumer-email hidden">
                                                <div class="icon icons-email"></div>
                                                <span class=""><a href="mailto:" class="v-consumer-email">vietnt134@gmail.com</a></span>
                                            </li>
                                            <li class="consumer-note-row b-customer-note">
                                                <div class="client-note">

                                                    <span class="note-wrapper v-customer-note">hello</span>

                                                    <div class="icons-note-tip2"></div>
                                                </div>
                                            </li>
                                        </ul>
                                        <!-- end client -->
                                        <!-- buttons -->
                                        <div class="client-buttons b-consumer-buttons hidden">
                                            <button type="button" class="button button-basic button-mini a-new-consumer"><div class="button-inner"><div class="button-icon icons-plus4"></div>Create new</div></button>
                                            <button type="button" class="button button-basic button-mini a-walk-in"><div class="button-inner"><div class="button-icon icons-walkin"></div>Walk-in</div></button>
                                        </div>
                                        <!-- end buttons -->
                                        <!-- walkin -->
                                        <div class="client-walkin b-walkin hidden">
                                            <a href="javascript:;" class="edit-link a-change-consumer">Change client</a>
                                            <span class="walkin-status"><span class="icon icons-walkin2"></span> Walk-in</span>
                                        </div>
                                        <!-- end walkin -->
                                    </td>
                                </tr>

                                <tr class="form-row b-service-not-exist form-element-wrapper hidden">
                                    <td class="label-part"></td>
                                    <td class="input-part">
                                        <div class="form-note">
                                            <span class="icon icons-attention-small2"></span>
                                            <span class="notes">Service on eVoucher is no longer available. Select another service.</span>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="form-row appointment-service form-element-wrapper">
                                    <td class="label-part">
                                        <label for="appointment-offerId">Dịch vụ</label>
                                    </td>
                                    <td class="input-part">
                                        <select id="appointment-offerId" class="v-appointment-service required" name="appointment-offerId"><option value="">Not set</option><optgroup label="aaa" data-group-id="24287"><option value="offer:601975" class="offer" data-sku-id="341263" data-duration="60">A kas su ki (1 h )</option></optgroup><optgroup label="fgfhg" data-group-id="23664"><option value="offer:598645" class="offer" data-sku-id="335484" data-duration="60">ghgfhgfh (1 h )</option></optgroup><optgroup label="Body" data-group-id="22810"><option value="offer:593322" class="offer" data-sku-id="325832" data-duration="60">abcxyz (1 h )</option><option value="offer:598354" class="offer" data-duration="60">Acoustic Wave Therapy</option><option value="offer:598353" class="offer" data-duration="60">Acupuncture</option><option value="offer:598349" class="offer" data-duration="60">Body Exfoliation Treatments</option><option value="offer:598350" class="offer" data-duration="60">Heat Treatments</option><option value="offer:593319" class="offer" data-sku-id="325829" data-duration="60">Body Exfoliation Treatments (1 h )</option></optgroup><optgroup label="Spa" data-group-id="22811"><option value="offer:597142" class="offer" data-sku-id="333239" data-duration="60">dfdfdsfdf (1 h )</option></optgroup><optgroup label="Counselling &amp; Holistic" data-group-id="23622"><option value="offer:598351" class="offer" data-duration="60">Reiki</option><option value="offer:598352" class="offer" data-duration="60">Aromatherapy</option><option value="offer:598955" class="offer" data-duration="60">Addictions Counselling</option></optgroup><optgroup label="Dance" data-group-id="23662"><option value="offer:598488" class="offer" data-duration="60">Ballet</option><option value="offer:598644" class="offer" data-duration="60">Ballroom Dancing</option></optgroup><optgroup label="Fitness" data-group-id="24286"><option value="offer:598355" class="offer" data-duration="60">Acrobatics</option></optgroup></select>
                                    </td>
                                </tr>
                                <tr class="form-row appointment-sku form-element-wrapper hidden">
                                    <td class="label-part">
                                        <label for="appointment-skuId">SKU</label>
                                    </td>
                                    <td class="input-part">
                                        <select id="appointment-skuId" class="v-appointment-sku" name="appointment-skuId"><option value="">Not set</option></select>
                                    </td>
                                </tr>
                                <tr class="form-row form-element-wrapper">
                                    <td class="label-part">
                                        <label for="cv-appointment-appointmentDate">Ngày</label>
                                    </td>
                                    <td class="input-part">
                                        <div class="txt-input date-input">
                                            <input date-format="dd/mm/yy" class="datepicker required hasDatepicker" name="cv-appointment-appointmentDate" id="cv-appointment-appointmentDate" type="text">
                                        </div>
                                        <select name="appointment-startTime" id="appointment-startTime" class="required">
                                            <option value="07:00">07:00</option>
                                            <option value="08:00">08:00</option>
                                            <option value="09:00">09:00</option>
                                            <option value="10:00">10:00</option>
                                            <option value="11:00">11:00</option>
                                            <option value="12:00">12:00</option>
                                            <option value="13:00">13:00</option>
                                            <option value="14:00">14:00</option>
                                            <option value="15:00">15:00</option>
                                            <option value="16:00">16:00</option>
                                            <option value="17:00">17:00</option>
                                            <option value="18:00">18:00</option>
                                            <option value="19:00">19:00</option>
                                            <option value="20:00">20:00</option>
                                            <option value="21:00">21:00</option>
                                            <option value="22:00">22:00</option>
                                        </select>
                                        <span class="block-note b-rescheduled hidden">
                                            <input class="" id="rescheduled-block-old-time" type="checkbox">
                                            <label for="rescheduled-block-old-time">Block out original appointment time</label>
                                        </span>
                                    </td>
                                </tr>
                                <tr class="form-row">
                                    <td class="label-part">
                                        <label for="cv-appointment-duration">Thời gian</label>
                                    </td>
                                    <td class="input-part">
                                        <select name="cv-appointment-duration" id="cv-appointment-duration" class="required">
                                            <option value="10">10 min</option>
                                            <option value="15">15 min</option>
                                            <option value="20">20 min</option>
                                            <option value="25">25 min</option>
                                            <option value="30">30 min</option>
                                            <option value="35">35 min</option>
                                            <option value="40">40 min</option>
                                            <option value="45">45 min</option>
                                            <option value="50">50 min</option>
                                            <option value="55">55 min</option>
                                            <option value="60">1 h </option>
                                            <option value="65">1 h 05 min</option>
                                            <option value="70">1 h 10 min</option>
                                            <option value="75">1 h 15 min</option>
                                            <option value="80">1 h 20 min</option>
                                            <option value="85">1 h 25 min</option>
                                            <option value="90">1 h 30 min</option>
                                            <option value="95">1 h 35 min</option>
                                            <option value="100">1 h 40 min</option>
                                            <option value="105">1 h 45 min</option>
                                            <option value="110">1 h 50 min</option>
                                            <option value="115">1 h 55 min</option>
                                            <option value="120">2 h </option>
                                            <option value="135">2 h 15 min</option>
                                            <option value="150">2 h 30 min</option>
                                            <option value="165">2 h 45 min</option>
                                            <option value="180">3 h </option>
                                            <option value="195">3 h 15 min</option>
                                            <option value="210">3 h 30 min</option>
                                            <option value="225">3 h 45 min</option>
                                            <option value="240">4 h </option>
                                            <option value="270">4 h 30 min</option>
                                            <option value="300">5 h </option>
                                            <option value="330">5 h 30 min</option>
                                            <option value="360">6 h </option>
                                            <option value="390">6 h 30 min</option>
                                            <option value="420">7 h </option>
                                            <option value="450">7 h 30 min</option>
                                            <option value="480">8 h </option>
                                            <option value="540">9 h </option>
                                            <option value="600">10 h </option>
                                            <option disabled="" value="660">11 h </option>
                                            <option disabled="" value="720">12 h </option>
                                        </select>
                                        <span class="help-txt">Kết thúc lúc <span class="cv-end-time">14:00</span></span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <table class="default-form part-two" cellpadding="0" cellspacing="0">
                            <tbody>
                                <tr class="form-row">
                                    <td class="label-part">
                                        <label class="optional" for="appointment-notes">Ghi chú </label>
                                    </td>
                                    <td class="input-part">
                                        <textarea rows="6" cols="5" class="full" id="appointment-notes" name="appointment-notes"></textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="b-evoucher-redemption-note hidden">
                            <div class="form-note">
                                <span class="icon icons-attention-small2"></span>
                                <span class="notes">Creating this appointment will lock the eVoucher. Make sure the customer understands that they will not be able to redeem it again.</span>
                            </div>
                        </div>
                        <div class="b-reschedule-note hidden">
                            <div class="form-note">
                                <span class="icon icons-attention-small2"></span>
                                <span class="notes">Please ensure that you have contacted the customer and confirmed that they are happy with the rescheduled time slot.</span>
                            </div>
                        </div>
                    </div>
                    <div class="dialog-actions">
                        <button type="submit" class="button action action-default button-primary save-action">
                            <div class="button-inner">
                                <div class="button-icon icons-tick"></div>
                                <span class="msg msg-action-default">Save</span>
                            </div>
                        </button>
                        <a href="javascript:;" class="button-cancel" data-dismiss="modal">Cancel</a>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div> 
</div><!-- END editConfirmedAppointment_modal-->

<!-- Modal editClient_modal-->
<div id="editClient_modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="ui-dialog-title-4">
    <div class="modal-dialog" style="width: 460px;">
        <div class="modal-content">
            <div class="ui-dialog ui-widget ui-widget-content ui-corner-all ui-draggable">
                <div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix">
                    <span id="ui-dialog-title-4" class="ui-dialog-title">Khách hàng</span>
                    <a role="button" class="ui-dialog-titlebar-close ui-corner-all" href="#">
                        <span class="ui-icon ui-icon-closethick">close</span>
                    </a>
                </div>
                <div scrollleft="0" scrolltop="0" class="client-info-dialog ui-dialog-content ui-widget-content">
                <form novalidate="novalidate" class="edit-mode">
                    <div class="dialog-content clearfix">
                        <table class="default-form part-one" cellpadding="0" cellspacing="0">
                            <tbody><tr class="form-row client-name-row">
                                <td class="label-part">
                                    <label for="client_name">Tên</label>
                                </td>
                                <td class="input-part">
                                    <div class="txt-input txt-input-big">
                                        <input name="client_name" id="client_name" class="required valid" type="text">
                                    </div>
                                </td>
                            </tr>
                            <tr class="form-row">
                                <td class="label-part">
                                    <label for="client_phone">Điện thoại</label>
                                </td>
                                <td class="input-part">
                                    <div class="txt-input">
                                        <input name="client_phone" id="client_phone" class="required phone-by-country" type="tel">
                                    </div>
                                </td>
                            </tr>
                            <tr class="form-row">
                                <td class="label-part">
                                    <label class="optional" for="client_email">Email</label>
                                </td>
                                <td class="input-part">
                                    <div class="txt-input">
                                        <input name="client_email" id="client_email" class="email" type="email">
                                    </div>
                                </td>
                            </tr>
                            <tr class="form-row">
                                <td class="label-part"></td>
                                <td class="input-part">
                                    <input class="" name="client_sendMassEmails" id="client_sendMassEmails" type="checkbox">
                                    <label class="help-txt optional" for="client_sendMassEmails">Đồng ý nhận email thông báo lịch hẹn</label>
                                </td>
                            </tr>
                            <tr class="form-row">
                                <td class="label-part">
                                    <label class="optional">Giới tính</label>
                                </td>
                                <td class="input-part">
                                    <div class="several">
                                        <input class="" name="client_sex" id="client_sex-female" value="F" type="radio">
                                        <label for="client_sex-female">Nữ</label>

                                        <input class="" name="client_sex" id="client_sex-male" value="M" type="radio">
                                        <label for="client_sex-male">Nam</label>
                                    </div>
                                </td>
                            </tr>
                            <tr class="form-row">
                                <td class="label-part">
                                    <label class="optional" for="client_birth">Ngày sinh</label>
                                </td>
                                <td class="input-part">
                                    <div class="txt-input txt-input-mini">
                                        <select class="" name="client_birthMonth" id="client_birthMonth"><option value="1">January</option><option value="2">February</option><option value="3">March</option><option value="4">April</option><option value="5">May</option><option value="6">June</option><option value="7">July</option><option value="8">August</option><option value="9">September</option><option value="10">October</option><option value="11">November</option><option value="12">December</option><option value="">Month</option></select>
                                        <input name="client_birthDay" pattern="\d*" id="client_birthDay" class="digits" require-with="#client_birthMonth" min="1" max="31" placeholder="day" type="number">
                                    </div>
                                    <a href="javascript:;" class="edit-link a-show-year hidden">Set year</a>
                                    <div class="txt-input txt-input-mini b-birthYear hidden">
                                        <input name="client_birthYear" pattern="\d*" id="client_birthYear" class="digits birthyear" placeholder="year" maxlength="4" type="number">
                                    </div>
                                </td>
                            </tr>
                        </tbody></table>
                        <table class="default-form part-two" cellpadding="0" cellspacing="0">
                            <tbody><tr class="form-row">
                                <td class="label-part">
                                    <label class="optional" for="client_notes">Ghi chú</label>
                                </td>
                                <td class="input-part">
                                    <textarea rows="6" cols="5" class="full" id="client_notes" name="client_notes"></textarea>
                                </td>
                            </tr>

                        </tbody></table>
                    </div>
                    <div class="dialog-actions">
                        <button type="submit" class="button action action-default button-primary save-action">
                            <div class="button-inner">
                                <div class="button-icon icons-tick"></div>
                                <span class="msg msg-action-default">Save</span>
                            </div>
                        </button>
                        <a href="javascript:;" class="button-cancel" data-dismiss="modal">Cancel</a>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div><!-- END editClient_modal-->