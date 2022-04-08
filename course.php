<?php
require_once __DIR__ . '/../../../wp-admin/admin.php';
$title = __( 'courselist' );
require_once ABSPATH . 'wp-admin/admin-header.php';

require_once( __DIR__  . '/class.course.php' );
require_once( __DIR__  . '/class.courselist.php' );
require_once( __DIR__  . '/class.tag.php' );

$page = 1;
$courselist = new courselist();
$courselist->pageing($page);

?>
	<style>
		.course {
			margin: 27px;
			text-align: center;
			font-size: 29px;
			border: 1px solid gray;
			border-radius: 5px;
			padding: 31px;
			background: #f4f0ed;
		}

		.courselist {
			display: inline-flex;
			width: 100%;
			flex-flow: wrap-reverse;
		}

		.courselist img {
			padding: 10px;
			width: 177px;
			height: 102px;
			border-radius: 17px;
		}
	</style>
	<div class='courselist'>
<?php

foreach ($courselist->getCourses($page) as $course) {
	?>
		<div class='course'>
		<div> <?php echo $course->getName()?> </div>
		<img src="<?php echo $course->getImage()?>"  width='30px' height='30px'/>
		<?php foreach ($course->getTag() as $tag) {
			?>
				<div> <?php echo $tag->getName()?> </div>
			<?php
			}
			?>
		</div>
	<?php
}
?>
	</div>
<?php

do_action( 'admin_footer');

//require_once ABSPATH . 'wp-admin/admin-footer.php';
