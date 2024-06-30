<!DOCTYPE html>
<html lang="en">
<style type="text/css">
	html {
  		font-size: 80%;
  		/*font-size: 85%;*/
	}
	.main-sidebar { background-color: #1c202e !important; position: fixed !important;}

.nav-pills .nav-link.active,
.nav-pills .show > .nav-link {
  color: #fff;
  background-color: #cc4f02 !important;
}

.dt-button.buttons-columnVisibility {
  background-color: white;
  color: black;
}
.dt-button.buttons-columnVisibility.active, .dt-button.buttons-columnVisibility:focus {
  background-color: grey !important;
  color: white !important;
}

.page-item.active .page-link {
    background-color: lightgrey !important;
    border: none !important;
}
.page-link {
    color: black !important;
}

/*.dropdown-item.active, .dropdown-item.active:focus {
	background-color: none !important;
    border: none !important;
}*/

.info-box {
    /*background-color: #1c202e;*/
    color: black !important;
    /*opacity: 0.8;*/
}
.info-box:hover {
    background-color: lightgrey;
    /*color: white !important;*/
    /*opacity: 0.8;*/
}
</style>

<?php echo $head; ?>

<body class="hold-transition sidebar-mini sidebar-collapse">
	<div class="wrapper">
	<!-- Sidebar -->
	<?php echo $sidebar; ?>
	<!-- End of Navbar -->

	<!-- Navbar -->
	<?php echo $topbar; ?>
	<!-- End of Navbar -->

	    <div class="content-wrapper">
		    <section class="content-header">

		    </section>

		   <!-- Main Content -->
			<?php echo $content; ?>
			<!-- End of Main Content -->

		  </div>

		  <!-- Footer -->
			<?php echo $footer; ?>
			<!-- End of Footer -->
	</div>

	<?php echo $required; ?>

  <?php echo $spec_script; ?>

</body>

</html>