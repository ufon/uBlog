<? include ("header.php"); ?>
    <!-- Wrap all page content here -->
    <div id="wrap">

      <!-- Fixed navbar -->


      <!-- Begin page content -->
      <div class="container">	 
	  <div class="row row-offcanvas row-offcanvas-right">
	  <div class="col-xs-12 col-sm-9">
	 <? while ($row = mysql_fetch_array($result)) { ?>
       <div class="page-header">
          <a href="<?=$siteurl?>category/<?=$row['id']?>/"><h1> <?=$row['name'];?></h1></a>
        </div>
        <p class="lead"><?=$row['description']?></p>
    <? } ?>
	</div>
	<!--/span-->
      <!--/row-->
      </div>
	  <? pagination_cat($page, $count, $pages_count, 2); ?>
	  </div>
    </div>
<!-- /.container -->
<? include ("footer.php"); ?>