<?php global $site;?>
<!DOCTYPE html>
<html class="no-js" lang="en">
	<head>
	<?php
		    if ($this->section('header')) :
		        echo $this->section('header');
		    endif;
		?>
		<?php
		    if ($this->section('extheader')) :
		        echo $this->section('extheader');
		    endif;
		?>
	</head>
	<body id="page-top" class="sidebar-toggled">
		<div id="wrapper">
			<div id="content-wrapper" class="d-flex flex-column">
				<div id="content" style="min-height: 89vh;">
					<div class="container-fluid">
						<?php
							if ($this->section('section')) :
							echo  $this->section('section');
							endif;
						?>
					</div>
				</div>
				<footer class="sticky-footer bg-white">
					<div class="container my-auto">
						<div class="copyright text-center my-auto">
							<span>Copyright &copy; <?=$site["theme"]["sitename"]?> <?=date('Y')?></span>
						</div>
					</div>
				</footer>
			</div>
		</div>

		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fas fa-angle-up"></i>
		</a>

		
		<?php
		    if ($this->section('footer')) :
		        echo $this->section('footer');
		    endif;
		?>
		<?php
		    if ($this->section('extfooter')) :
		        echo $this->section('extfooter');
		    endif;
		?>
	</body>
</html>