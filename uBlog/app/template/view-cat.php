<? include ("header.php"); ?>
    <!-- Wrap all page content here -->
    <div id="wrap">
      <!-- Fixed navbar -->
      <!-- Begin page content -->
      <div class="container">	 
	  <div class="row row-offcanvas row-offcanvas-right">
	 <div class="col-lg-4">
          <div class="well">
      <form id="searchForm" name="searchForm" method="post" action="javascript:insertTask();">
<div class="searchInput">
<div class="input-group">
              <input type="text" name="searchq" type="text" id="searchq" onkeyup="javascript:searchNameq()" class="form-control">
              <span class="input-group-btn">
                <button class="btn btn-default" name="submitSearch" class="btn btn-primary" id="submitSearch" value="Search" onclick="javascript:searchNameq()" type="button"><span class="glyphicon glyphicon-search"></span></button>
              </span>
            </div>
</div>
<div id="msg">Type something into the input field</div>
</form>
          </div><!-- /well -->
  <div class="list-group">
<? include ("/app/widget.php"); ?>
</div>
        </div>
	  <div id="resSearch" class="col-lg-8">
	  
	 <? while ($row = mysql_fetch_array($result)) {?>
   <div class="well" >
	       <h1><a href="<?=$siteurl?>view/<?=$row['id']?>/"><?=$row['title'];?></a></h1>
          <p class="lead">by <a href="<?=$siteurl?>user/<?=$row['user_id']?>"><?=$row['username']?></a></p>
          <hr>
          <p><span class="glyphicon glyphicon-time"></span> <?=$row['Date'] = rdate('d M Y H:i', $row['Date']);?></p>
          <hr>
          <img src="<?=$row['image'] ?>" class="img-responsive">
          <? if (!empty($row['image'])) { ?>
          <hr>
          <? } ?>
          <p class="lead"><?=$row['summary']?></p>
          <a class="btn btn-primary" href="<?=$siteurl?>view/<?=$row['id']?>/">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>                  
          <hr>
    </div>
    <? }?>
	</div>  
      <!--/row-->
      </div>
	  <? pagination_cat_view($page, $count, $pages_count, 2, $_GET['id']); ?>
	  </div>
    </div>
<!-- /.container -->
<? include ("footer.php"); ?>