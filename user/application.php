<!--le Header-->
<?PHP $title = "Application"; $current = "apply"; include("../includes/header.php"); ?>
		<div class="row-fluid">
				<div class="text-center applyDiv1">
					<h1>Sentinels Application</h1><br />
					<form>
						<input type="text" id="applyKey inputIcon" name="applyKey" placeholder="Application Key"/>
						<a href="#" rel="tooltip" id="applyKeyTooltip" data-toggle="tooltip" title='An application key is required to start the application.  You can receive an application key by talking to any of the guild leaders.'><i class="icon-question-sign"></i></a><br />
						<input class="btn-inverse btn-small" type="button" name="applyKeyBtn" value="Submit"/>
					</form>
				</div>
		</div>
<!--le Footer-->
</script>
<?PHP include("../includes/footer.php"); ?>