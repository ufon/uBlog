<? include ("header.php"); ?>
    <!-- Wrap all page content here -->
    <div id="wrap">

      <!-- Fixed navbar -->


      <!-- Begin page content -->
      <div class="container">	 
	  <div class="row row-offcanvas row-offcanvas-right">
	  <div class="col-md-3">
          <div class="bs-sidebar" role="complementary">
            <ul class="nav bs-sidenav">
			<? include("/app/widget.php"); ?>
            </ul>
          </div>
        </div>
	  <div class="col-xs-12 col-sm-9">
	  <? while ($row = mysql_fetch_array($result)) { ?>
       <div class="page-header">
          <h1> <?=$row['title'];?></h1>
        </div>
        <p><?=$row['summary']?></p>
		
	<p class="lead"><?=$row['content']?></p>
		
    <? } ?>
	</div>
      <!--/row-->
      </div>
	  </div>
    </div>
<!-- /.container -->
<? include ("footer.php"); ?>