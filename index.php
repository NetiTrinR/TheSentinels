<?PHP 
$title = "Frontpage";
$current = "home";
include("includes/header.php"); ?>
<!-- Main Content  -->
<div class="row-fluid">
  <div class=" span9">
    <!-- Main hero unit for a primary marketing message or call to action -->
    <!-- Is this even needed?-->
    <div class="hero-unit">
     <h1>Welcome to The Sentinels</h1>
     <p>This is a company of FFXIV.  Could be shown to non-signed in members.</p>
     <p><a href="#" class="btn btn-inverse btn-large">Learn more &raquo;</a></p>
    </div>
    <div class="well">
      <h2>News Heading1</h2>
      <p>Could possibly do a rss stream from the main FFXIV website here.  Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae ipsa minima consequuntur ea iste ad totam amet beatae quaerat quasi.</p>
      <p><a class="btn btn-inverse" href="#">View details &raquo;</a></p>
    </div>
    <div class="well">
      <h2>News Heading2</h2>
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quia iste eos optio neque vero vitae assumenda distinctio delectus ipsum consequuntur eligendi maiores nulla. Quia exercitationem odit nemo doloribus beatae neque eum repellendus quod dolores sint expedita labore voluptatem doloremque. Enim. </p>
      <p><a class="btn btn-inverse" href="#">View details &raquo;</a></p>
    </div>
  </div>
  <!--Le Right Sidebar-->
  <?php include("includes/rightsidebar.php"); ?>
</div>
<!--le Footer-->
<?PHP include("includes/footer.php"); ?>
