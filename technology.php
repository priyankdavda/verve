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
	/* ===============================
   CASE STUDY / TECH GRID FIXES
================================ */

/* Section spacing control */
.case-study-area {
    padding: 60px 0;
}

/* Filter menu alignment */
.case_study_menu {
    display: flex;
    justify-content: center;
    margin-bottom: 40px;
}

.case_study_menu ul {
    display: flex;
    gap: 12px;
    flex-wrap: wrap;
    justify-content: center;
}

.case_study_menu ul li {
    padding: 10px 18px;
    border-radius: 30px;
    font-size: 14px;
    white-space: nowrap;
}

/* Active menu */
.case_study_menu ul li.current_menu_item {
    background: #ff4a17;
    color: #fff;
}

/* Grid row fix */
.image_load {
    row-gap: 30px;
}

/* Card box */
.tech-card-box {
    height: 100%;
    background: #fff;
    border-radius: 14px;
    padding: 28px 20px;
    text-align: center;
    box-shadow: 0 8px 25px rgba(0,0,0,0.05);
    transition: all 0.3s ease;
    display: flex;
    flex-direction: column;
    justify-content: center;
}

.tech-card-box:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 35px rgba(0,0,0,0.08);
}

/* Icon alignment */
.tech-icon {
    height: 70px;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 14px;
}

.tech-icon img {
    max-height: 55px;
    max-width: 80px;
    object-fit: contain;
}

/* Title */
.feature-title {
    font-size: 16px;
    font-weight: 600;
    color: #222;
    margin: 0;
}

/* ===============================
   RESPONSIVE FIXES
================================ */

/* Tablet */
@media (max-width: 991px) {
    .tech-card-box {
        padding: 24px 16px;
    }

    .feature-title {
        font-size: 15px;
    }
}

/* Mobile */
@media (max-width: 767px) {

    /* horizontal scroll filter menu */
    .case_study_menu ul {
        flex-wrap: nowrap;
        overflow-x: auto;
        padding-bottom: 10px;
        justify-content: flex-start;
    }

    .case_study_menu ul::-webkit-scrollbar {
        height: 4px;
    }

    .case_study_menu ul::-webkit-scrollbar-thumb {
        background: #ddd;
        border-radius: 10px;
    }

    .tech-icon {
        height: 60px;
    }

    .tech-icon img {
        max-height: 45px;
    }

    .feature-title {
        font-size: 14px;
    }
}
</style>

<!--==================================================-->
	<!-- Start solutek case-study-area -->
<!--==================================================-->
	<div class="case-study-area">
		<div class="container">
			<div class="row case-study-bg">
				<div class="col-lg-12 col-sm-12">
					<div class="case_study_nav">
						<div class="case_study_menu">
							<ul class="menu-filtering">
								<!-- <li data-filter="*" class="current_menu_item">Engineering & Software Development</li> -->
								<!-- <li data-filter="*" class="current_menu_item">All</li> -->
								<li data-filter=".ESD"  class="current_menu_item">Engineering & Software Development</li>
								<li data-filter=".cloud">Cloud & DevOps</li>
								<li data-filter=".data_and_AI">Data & AI</li>
								<li data-filter=".ERP">ERP & CRM</li>
								<li data-filter=".Infrastructure">Infrastructure & Security</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div class="row image_load">
				<?php
				$sections = [
					'ESD' => [
						'title' => 'Engineering & Software Development',
						'techs' => [
							['name' => 'Python', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/python/python-original.svg'],
							['name' => 'Node.js', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nodejs/nodejs-original.svg'],
							['name' => 'Angular', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/angularjs/angularjs-original.svg'],
							['name' => 'React', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/react/react-original.svg'],
							['name' => 'Vue.js', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/vuejs/vuejs-original.svg'],
							['name' => 'C++', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/cplusplus/cplusplus-original.svg'],
							['name' => 'PHP', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/php/php-original.svg'],
							['name' => 'Ruby on Rails', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/rails/rails-plain-wordmark.svg'], 
							['name' => 'Go', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/go/go-original-wordmark.svg'],
							['name' => 'Swift', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/swift/swift-original.svg'],
							['name' => 'Kotlin', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/kotlin/kotlin-original.svg'],
							['name' => 'Spring Boot', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/spring/spring-original.svg'],
							['name' => 'ASP.NET Core', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/dotnetcore/dotnetcore-original.svg'],
							['name' => 'Django', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/django/django-plain.svg'],
							['name' => 'Flask', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/flask/flask-original.svg'],
							['name' => 'Express.js', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/express/express-original.svg'],
							['name' => 'Next.js', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/nextjs/nextjs-original.svg'],
							['name' => 'TypeScript', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/typescript/typescript-original.svg'],
							['name' => 'HTML5', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/html5/html5-original.svg'],
							['name' => 'CSS3', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/css3/css3-original.svg'],
							['name' => 'Sass', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/sass/sass-original.svg'],
						]
					],
					'cloud' => [
						'title' => 'Cloud & DevOps',
						'techs' => [
							['name' => 'AWS', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/amazonwebservices/amazonwebservices-original-wordmark.svg'],
							['name' => 'Azure', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/azure/azure-original.svg'],
							['name' => 'GCP', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/googlecloud/googlecloud-original.svg'],
							['name' => 'Kubernetes', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/kubernetes/kubernetes-plain.svg'],
							['name' => 'Terraform', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/terraform/terraform-original.svg'],
							['name' => 'Jenkins', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/jenkins/jenkins-original.svg'],
							['name' => 'Docker', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/docker/docker-original.svg'],
							['name' => 'Ansible', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/ansible/ansible-original.svg'],
							['name' => 'GitLab', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/gitlab/gitlab-original.svg'],
							['name' => 'Prometheus', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/prometheus/prometheus-original.svg'],
							['name' => 'Grafana', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/grafana/grafana-original.svg'],
						]
					],
					'data_and_AI' => [
						'title' => 'Data & AI',
						'techs' => [
							['name' => 'Snowflake', 'icon' => 'https://upload.wikimedia.org/wikipedia/commons/f/ff/Snowflake_Logo.svg'], 
							['name' => 'TensorFlow', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/tensorflow/tensorflow-original.svg'],
							['name' => 'Hadoop', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/hadoop/hadoop-original.svg'],
							['name' => 'Power BI', 'icon' => 'https://upload.wikimedia.org/wikipedia/commons/c/cf/New_Power_BI_Logo.svg'], 
							['name' => 'PyTorch', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/pytorch/pytorch-original.svg'],
							['name' => 'Scikit-learn', 'icon' => 'https://upload.wikimedia.org/wikipedia/commons/0/05/Scikit_learn_logo_small.svg'],
							['name' => 'Pandas', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/pandas/pandas-original.svg'],
							['name' => 'NumPy', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/numpy/numpy-original.svg'],
							['name' => 'Apache Spark', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/apachespark/apachespark-original.svg'],
							['name' => 'Kafka', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/apachekafka/apachekafka-original.svg'],
							['name' => 'MongoDB', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mongodb/mongodb-original.svg'],
							['name' => 'Cassandra', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/apache/apache-original.svg'], // Fallback or Apache logo
							['name' => 'SQL', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/mysql/mysql-original.svg'],
						]
					],
					'ERP' => [
						'title' => 'ERP & CRM',
						'techs' => [
							['name' => 'SAP', 'icon' => 'https://cdn.jsdelivr.net/npm/simple-icons@v9/icons/sap.svg'],

							['name' => 'Oracle', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/oracle/oracle-original.svg'],
							['name' => 'Salesforce', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/salesforce/salesforce-original.svg'],
							['name' => 'Workday', 'icon' => 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwIiBoZWlnaHQ9IjEwMCIgdmlld0JveD0iMCAwIDEwMCAxMDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHRleHQgeD0iMTAiIHk9IjU1IiBmb250LXNpemU9IjQwIiBmaWxsPSIjRkY2NjAwIj5XPC90ZXh0Pjwvc3ZnPg=='],
							['name' => 'Dynamics 365', 'icon' => 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwIiBoZWlnaHQ9IjEwMCIgdmlld0JveD0iMCAwIDEwMCAxMDAiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PHRleHQgeD0iNSIgeT0iNTUiIGZvbnQtc2l6ZT0iMzIiIGZpbGw9IiMwMDc4RkYiPkQzNjU8L3RleHQ+PC9zdmc+'
        ],
						]
					],
					'Infrastructure' => [
						'title' => 'Infrastructure & Security',
						'techs' => [
							['name' => 'Linux', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/linux/linux-original.svg'],
							['name' => 'Windows', 'icon' => 'https://cdn.jsdelivr.net/gh/devicons/devicon/icons/windows8/windows8-original.svg'],
							['name' => 'VMware', 'icon' => 'https://upload.wikimedia.org/wikipedia/commons/9/9a/Vmware.svg'],
							['name' => 'Cisco', 'icon' => 'https://upload.wikimedia.org/wikipedia/commons/6/64/Cisco_logo.svg'],
						]
					]
				];

				foreach ($sections as $filterClass => $data) {
					foreach ($data['techs'] as $tech) {
						?>
						<div class="col-lg-3 col-md-4 col-6 grid-item <?php echo $filterClass; ?>">
							<div class="tech-card-box">
								<div class="tech-icon">
									<img src="<?php echo $tech['icon']; ?>" alt="<?php echo $tech['name']; ?>" title="<?php echo $tech['name']; ?>">
								</div>
								<h3 class="feature-title"><?php echo $tech['name']; ?></h3>
							</div>
						</div>
						<?php
					}
				}
				?>
			</div>
			<!-- Unified Footer Note -->
			<div class="row">
				<div class="col-lg-12 text-center" style="margin-top: 40px;">
					<p class="section-title-descr3" style="font-size: 18px; color: #666;">...and over 250+ specialized skills and frameworks within our delivery teams.</p>
				</div>
			</div>
		</div>
	</div>
		</div>
	</div>
<!--==================================================-->
	<!--End solutek case-study-area -->
<!--==================================================-->


<?php include 'footer.php'; ?>
