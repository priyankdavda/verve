<?php include 'header.php'; ?>
<!--==================================================-->
<!-- Start Curser Section Here -->
<!--==================================================-->
<div class="curser"></div>
<div class="curser2"></div>
<!--==================================================-->
<!-- Ends Curser Section Here -->
<!--==================================================-->

<style>
/* Dropdown 	 */
.form_box select {
	width: 100%;
	height: 60px;
	padding: 0 23px;
	border: 1px solid rgba(122, 122, 122, 0.5);
	border-radius: 15px;
	background: #ffffff;
	font-size: 16px;
	line-height: 26px;
	color: #7a7a7a;
	font-weight: 400;
	font-family: "Fira Sans";
	margin-bottom: 21px;
	transition: 0.5s;
	outline: none;
	cursor: pointer;
	-webkit-appearance: none;
	-moz-appearance: none;
	appearance: none;
	background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 20 20'%3E%3Cpath fill='%237a7a7a' d='M5 7l5 5 5-5H5z'/%3E%3C/svg%3E");
	background-repeat: no-repeat;
	background-position: right 20px center;
	padding-right: 50px;
}

.form_box select:focus {
	border-color: #ff3d00;
	box-shadow: 0 0 4px rgba(255, 61, 0, 0.5);
}

.form_box select option {
	padding: 10px;
	color: #7a7a7a;
}
</style>

<!--==================================================-->
<!-- Start solutek breadcumb Area -->
<!--==================================================-->
<div class="breadcumb-area3">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcumb-content">
					<h4>Contact</h4>
					<ul class="breadcumb-list">
						<li><a href="index.html">Home</a></li>
						<li class="list-arrow">&lt;</li>
						<li>Contact</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<!--==================================================-->
<!-- end solutek breadcumb Area -->
<!--==================================================-->




<!--==================================================-->
<!-- Start solutek contact Area -->
<!--==================================================-->

<div class="contact-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-6">
				<div class="section-title text-left">
					<h5 class="section-sub-title">CONTACT US</h5>
					<h1 class="section-main-title">Make an Online Appoinemnt Booking</h1>
					<h1 class="section-main-title">For Business Planing.</h1>
				</div>
					<div class="contact_from_box">
						<form action="https://formspree.io/f/myyleorq" method="POST" id="dreamit-form">
							<div class="row">
								<div class="col-lg-6">
									<div class="form_box">
										<input type="text" name="name" placeholder="Your Name *" required>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form_box">
										<input type="email" name="email" placeholder="Your E-Mail *" required>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form_box">
										<input type="text" name="subject" placeholder="Subject *" required>
									</div>
								</div>
								<div class="col-lg-6">
									<div class="form_box">
										<input type="text" name="phone" placeholder="Phone *" required>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form_box">
										<select name="inquiry_type" id="inquiry_type" required>
											<option value="" disabled selected>How can we help? Select your primary requirement *</option>
											<option value="Hire Talent / Staff Augmentation">Hire Talent / Staff Augmentation</option>
											<option value="Setup GCC / BOT">Setup GCC / BOT</option>
											<option value="Digital Consulting / Project">Digital Consulting / Project</option>
											<option value="RFP / Vendor Partnership">RFP / Vendor Partnership</option>
											<option value="General Inquiry">General Inquiry</option>
										</select>
									</div>
								</div>
								<div class="col-lg-12">
									<div class="form_box">
										<textarea name="message" id="message" cols="30" rows="10" placeholder="Message"></textarea>
									</div>
									<div class="quote_button">
										<button class="btn" type="submit">SUBMIT <i class="bi bi-arrow-right"></i></button>
									</div>
								</div>
							</div>
						</form>
					<div id="status" class="error"></div>
				</div>
			</div>
			<div class="col-lg-4 col-md-6">
		    	<div class="row">
					<div class="col-lg-12">
						
						<div class="widget-sidber">
							<div class="widget-sidber-content">
								<h4>Address</h4>
							</div>
							<div class="sidber-widget-recent-post">
								<div class="recent-widget-content">
									<a href="#">India</a>	
									<p class="address"> 522, Vihav Trade Center,
											Nr. Waves Club,
											Bhayli, Vadodara - 391410</p>													
								</div>
							</div>
						</div>		

						<div class="widget-sidber">
							<div class="widget-sidber-content">
								<h4>Direct Contacts</h4>
							</div>
							<div class="sidber-widget-recent-post">
								<div class="recent-widget-content">
									<a href="#">Inquiries</a>	
									<p class="address"> hello@verveinfosystems.com</p>		
								</div>
							</div>							
							<div class="sidber-widget-recent-post">
								<div class="recent-widget-content">
									<a href="#">Phone</a>	
									<p class="address"> +91 95126 11125</p>				
								</div>
							</div>							
						</div>	
											
						
					</div>
				</div>
		    </div>
		</div>
	</div>
</div>

<!--==================================================-->
<!-- end solutek contact Area -->
<!--==================================================-->




<!--==================================================-->
<!-- Start solutek google map area-->
<!--==================================================-->
<!-- <div class="google-map">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233667.9067777347!2d90.11481839453124!3d23.780840500000014!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x63e259d796515e63%3A0x8b68319aae711aa1!2sIT%20Park%20BD!5e0!3m2!1sen!2sbd!4v1716707554611!5m2!1sen!2sbd" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
			</div>
		</div>
	</div>
</div> -->
<!--==================================================-->
<!--End solutek google map area-->
<!--==================================================-->


<?php include 'footer.php'; ?>