<? include ("header.php"); ?>
    <div id="page-content-wrapper">
        <div class="content-header">
          <h1>
            <a id="menu-toggle" href="#" class="btn btn-default"><i class="icon-reorder"></i></a>
            All articles
          </h1>
        </div>
        <!-- Keep all page content within the page-content inset div! -->
        <div class="page-content inset">
          <div class="row">
            <div class="col-lg-8">
	  <a href="<?=$siteurl?>?act=admin&to=add_article" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-plus"></span> Article</a>           <a href="<?=$siteurl?>?act=admin&to=add_category" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-plus"></span> Category</a><br>                                       	
    <br><?if ($noarticles == 0) {
     while ($row = mysql_fetch_array($result)) {?>
    <div class="well">
	       <h1><a href="<?=$siteurl?>view/<?=$row['id']?>/"><?=$row['title'];?></a>       <a href="<?=$siteurl?>?act=admin&to=edit_article&id=<?=$row['id']?>" class="btn btn-success"><i class="icon-edit"></i> <strong>Edit</strong></a>       <a href="<?=$siteurl?>?act=admin&to=del_article&id=<?=$row['id']?>" class="btn btn-danger"><i class="icon-trash"></i> <strong>Delete</strong></a></h1>

          <p class="lead">by <a href="<?=$siteurl?>user/<?=$row['user_id']?>"><?=$row['username']?></a></p>
          <hr>
          <p><span class="glyphicon glyphicon-time"></span> <?=$row['Date'] = rdate('d M Y H:i', $row['Date']);?></p>
          <hr>
          <img src="http://placehold.it/900x300" class="img-responsive">
          <hr>
          <p class="lead"><?=$row['summary']?></p>
          <a class="btn btn-primary" href="<?=$siteurl?>view/<?=$row['id']?>/">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>                  
          <hr>
          </div>
    <? }
    }
    else { ?>
    <h1> Нет записей </h1>
      <? }  ?>
	</div> 

<? pagination_admin($page, $count, $pages_count, 2); ?>	
          </div>
        </div>
      </div>
<? include ("footer.php"); ?>