<?php
/**
 * Service Details Page
 * 
 * Displays detailed information for each service based on the query parameter
 * 
 * @package Verve
 * @version 1.0
 */

// Get the service type from URL parameter
$service = isset($_GET['service']) ? $_GET['service'] : 'talent';

// Define service content
$services = array(
    'talent' => array(
        'title' => 'Global Talent & Workforce Solutions',
        'subtitle' => 'Comprehensive talent acquisition and management to build high-performing global teams',
        'description' => 'At Verve Infos, we understand that your people are your greatest asset. Our Global Talent & Workforce Solutions help you attract, retain, and develop world-class talent across borders. We leverage cutting-edge recruitment technologies, AI-driven insights, and deep industry expertise to connect you with the best professionals worldwide.',
        'description2' => 'Our comprehensive approach ensures that every hire aligns with your company culture, technical requirements, and long-term strategic goals. From executive search to volume hiring, we provide end-to-end talent solutions that scale with your business needs.',
        'features' => array(
            'Executive & Leadership Hiring',
            'Global Talent Acquisition',
            'Contract, Permanent & Hybrid Staffing',
            'Recruitment Process Outsourcing (RPO)',
            'AI-driven Predictive Hiring',
            'Diversity & Inclusion Programs'
        )
    ),
    'technology' => array(
        'title' => 'Technology & Digital Consulting',
        'subtitle' => 'Strategic technology guidance and engineering to accelerate your digital transformation journey',
        'description' => 'Navigate the complex technology landscape with confidence. Our Technology & Digital Consulting services empower your organization to leverage cutting-edge technologies like Cloud, AI, Machine Learning, and DevOps to drive innovation and competitive advantage.',
        'description2' => 'We provide strategic guidance combined with hands-on engineering expertise across the full technology stack. Our consultants work alongside your teams to design, build, and optimize solutions that deliver measurable business outcomes.',
        'features' => array(
            'Cloud, Data, AI & Machine Learning',
            'Digital Engineering & DevOps',
            'Automation & Cybersecurity',
            'Data Analytics & Technology Advisory'
        ),
        'core_expertise' => array(
            'Microsoft .NET Ecosystem',
            'Java & Spring Framework'
        )
    ),
    'managed' => array(
        'title' => 'Managed Services & Advisory',
        'subtitle' => 'End-to-end management of your non-core functions to enhance efficiency and reduce overhead',
        'description' => 'Focus on your core business while we handle the rest. Our Managed Services & Advisory offerings provide comprehensive management of HR, IT, operations, and support functions with SLA-driven delivery models that ensure quality and performance.',
        'description2' => 'We become an extension of your team, providing 24/7 global support, continuous improvement initiatives, and strategic advisory to help you optimize costs while maintaining service excellence. Our data-driven approach ensures transparency and measurable results.',
        'features' => array(
            'SLA-based Delivery Models',
            'HR & Compliance Advisory',
            'Performance & Talent Analytics',
            'Talent Retention & Upskilling Programs',
            '24x7 Global Support'
        )
    ),
    'gcc' => array(
        'title' => 'Build-Operate-Transfer & GCC Setup',
        'subtitle' => 'Establish your own Global Capability Center (GCC) with our proven, end-to-end framework',
        'description' => 'Establish your strategic presence in India or other global locations with our comprehensive Build-Operate-Transfer (BOT) and GCC setup services. We handle everything from market research and legal setup to talent acquisition, infrastructure, and ongoing operations.',
        'description2' => 'Our proven methodology ensures a smooth transition from concept to fully operational center. We provide ongoing support during the operate phase and facilitate seamless knowledge transfer when you\'re ready to take full ownership. This de-risks your expansion while accelerating time-to-value.',
        'features' => array(
            'End-to-end GCC & ODC Setup',
            'Global Talent & HR Strategy',
            'Technology & Infrastructure Enablement',
            'Operational Governance & Management',
            'Seamless Knowledge Transfer & Transition'
        )
    )
);

// Get current service data or default to talent
$current_service = isset($services[$service]) ? $services[$service] : $services['talent'];

// Include header
include_once 'header.php';
?>

<!-- Fix breadcrumb responsiveness -->
<style>
.breadcumb-content h4 {
    font-size: clamp(20px, 4vw, 36px);
    word-wrap: break-word;
    overflow-wrap: break-word;
}
.breadcumb-list {
    font-size: clamp(12px, 2vw, 16px);
    flex-wrap: wrap;
}
.breadcumb-list li {
    word-break: break-word;
}
</style>

<!--==================================================-->
<!-- Start Curser Section Here -->
<!--==================================================-->
<div class="curser"></div>
<div class="curser2"></div>
<!--==================================================-->
<!-- Ends Curser Section Here -->
<!--==================================================-->

<!--==================================================-->
<!-- Start solutek breadcumb Area -->
<!--==================================================-->
<div class="breadcumb-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="breadcumb-content">
					<h4><?php echo $current_service['title']; ?></h4>
					<ul class="breadcumb-list">
						<li><a href="home.php">Home</a></li>
						<li class="list-arrow">&lt;</li>
						<li><a href="service.php">Services</a></li>
						<li class="list-arrow">&lt;</li>
						<li><?php echo $current_service['title']; ?></li>
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
<!--start solutek service details area -->
<!--==================================================-->
<div class="services-details-area">
	<div class="container">
		<div class="row">
			<div class="col-lg-8">
				<div class="row">
					<div class="col-lg-12">
						<div class="services-details-thumb">
							<img src="assets/images/inner/service-details.png" alt="<?php echo $current_service['title']; ?>">
						</div>
						<div class="services-details-content">
							<h4 class="services-details-title"><?php echo $current_service['title']; ?></h4>
							<p class="services-details-desc"><?php echo $current_service['description']; ?></p>
							<p class="services-details-desc"><?php echo $current_service['description2']; ?></p>
						</div>
						
						<!-- Single consolidated section for all features -->
						<div class="row">
							<div class="col-lg-12">
								<div class="service-details-content" style="margin-top: 30px;">
									<h4>Our Service Offerings</h4>
									<div class="service-details-list">
										<ul>
											<?php foreach($current_service['features'] as $feature): ?>
												<li><i class="bi bi-check-circle-fill" style="color: #10b981; margin-right: 10px;"></i><?php echo $feature; ?></li>
											<?php endforeach; ?>
										</ul>
									</div>
									
									<?php if(isset($current_service['core_expertise'])): ?>
										<h4 style="margin-top: 30px;">Core Expertise</h4>
										<div class="service-details-list">
											<ul>
												<?php foreach($current_service['core_expertise'] as $expertise): ?>
													<li><i class="bi bi-check-circle-fill" style="color: #10b981; margin-right: 10px;"></i><?php echo $expertise; ?></li>
												<?php endforeach; ?>
											</ul>
										</div>
									<?php endif; ?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-4">
				<div class="row">
					<div class="col-lg-12">
						<div class="widget-sidber">
							<div class="widget-sidber-content">
								<h4>Our Services</h4>
							</div>
							<div class="widget-category">
								<ul>
									<li><a href="service-details.php?service=talent" class="<?php echo $service == 'talent' ? 'active' : ''; ?>"><img src="assets/images/inner/category-icon.png" alt="">Global Talent Solutions<i class="bi bi-arrow-right"></i></a></li>
									<li><a href="service-details.php?service=technology" class="<?php echo $service == 'technology' ? 'active' : ''; ?>"><img src="assets/images/inner/category-icon.png" alt="">Technology Consulting<i class="bi bi-arrow-right"></i></a></li>
									<li><a href="service-details.php?service=managed" class="<?php echo $service == 'managed' ? 'active' : ''; ?>"><img src="assets/images/inner/category-icon.png" alt="">Managed Services<i class="bi bi-arrow-right"></i></a></li>
									<li><a href="service-details.php?service=gcc" class="<?php echo $service == 'gcc' ? 'active' : ''; ?>"><img src="assets/images/inner/category-icon.png" alt="">GCC Setup<i class="bi bi-arrow-right"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="widget-sidber-contact-box">
							<div class="widget-sidber-contact">
								<img src="assets/images/inner-images/sidber-cont-icon.png" alt="">
							</div>
							<p class="widget-sidber-contact-text">Call Us Anytime</p>
							<h3 class="widget-sidber-contact-number">+123 (4567) 890</h3>
							<span class="widget-sidber-contact-gmail"><i class="bi bi-envelope-fill"></i>info@verveinfos.com</span>
							<div class="widget-sidber-contact-btn">
								<a href="contact.php">Contact Us <i class="bi bi-arrow-right"></i></a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!--==================================================-->
<!-- end solutek service details area  -->
<!--==================================================-->

<?php
// Include footer
include_once 'footer.php';
?>
