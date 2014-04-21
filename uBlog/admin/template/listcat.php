<? include ("header.php"); ?>
    <div id="page-content-wrapper">
        <div class="content-header">
          <h1>
            <a id="menu-toggle" href="#" class="btn btn-default"><i class="icon-reorder"></i></a>
            All categories
          </h1>
        </div>
        <!-- Keep all page content within the page-content inset div! -->
        <div class="page-content inset">
          <div class="row">
            <div class="col-lg-8">
             <a href="<?=$siteurl?>?act=admin&to=add_article" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-plus"></span> Article</a>           <a href="<?=$siteurl?>?act=admin&to=add_category" class="btn btn-lg btn-primary"><span class="glyphicon glyphicon-plus"></span> Category</a><br>                                        
	 	 <? if ($nocategories == 0) {
     while ($row = mysql_fetch_array($result)) { ?>
       <div class="page-header">
          <a href="<?=$siteurl?>category/<?=$row['id']?>/"><h1> <?=$row['name'];?></h1></a> <a href="<?=$siteurl?>?act=admin&to=edit_category&id=<?=$row['id']?>" class="btn btn-success"><i class="icon-edit"></i> <strong>Edit</strong></a>       <a href="<?=$siteurl?>/?act=admin&to=del_category&id=<?=$row['id']?>" class="btn btn-danger"><i class="icon-trash"></i> <strong>Delete</strong></a></h1>

        </div>
        <p class="lead"><?=$row['description']?></p>
    <? } 
    } else { ?>
      <h1> Нет категорий </h1>
     <? }?>
	</div> 
<? pagination_cat($page, $count, $pages_count, 2); ?>	
          </div>
        </div>
      </div>
<? include ("footer.php"); ?>