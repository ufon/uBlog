<? include ("header.php"); ?>
    <!-- Wrap all page content here -->
    <div id="wrap">
      <!-- Begin page content -->
      <div class="container">	 
	  <div class="row row-offcanvas row-offcanvas-right">
   <div class="col-lg-4">
          <div class="well">
            <div class="input-group">
              <input type="text" class="form-control">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
              </span>
            </div><!-- /input-group -->
          </div><!-- /well -->
  <div class="list-group">
<? include ("/app/widget.php"); ?>
</div>
        </div>
		<? while ($row = mysql_fetch_array($result)) { ?>
	<div class="col-md-3" >
  <div class="well">
	<h1>Description</h1>
	<hr>
	<p class="lead"><?=$row['bio'];?></p>
  </div>
	</div>
	
        <div class="col-md-3" style="float:right;">
          <div class="thumbnail" style="padding: 0">
            <div style="padding:4px">
              <img alt="300x200" style="width: 100%" src="<?=$row['avatar']?>">
            </div>
            <div class="caption">
              <h2><?=$row['name'];?></h2>
              <p><?=$row['email'];?></p>
            </div>
			<? } ?>
          </div>
        </div>

      <!--/row-->
      </div>
	  </div>
    </div>
<!-- /.container -->
<? include ("footer.php"); ?>