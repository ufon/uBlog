<? include ("header.php");?>
    <!-- Wrap all page content here -->
    <div id="wrap">

      <!-- Fixed navbar -->


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
	  <div class="col-lg-8">  
		<? while ($row = mysql_fetch_array($result)) { ?>
          <!-- the actual blog post: title/author/date/content -->
          <h1><?=$row['title'];?></h1>
          <p class="lead">by <a href="<?=$siteurl?>user/<?=$row['user_id']?>"><?=$row['username']?></a></p>
          <hr>
          <p><span class="glyphicon glyphicon-time"></span> <?=$row['Date'] = rdate('d M Y H:i', $row['Date']);?></p>
          <hr>
          <img width="900" src="<?=$row['image'];?>" class="img-responsive">
          <? if (!empty($row['image'])) { ?>
          <hr>
          <? } ?>
          <p class="lead"><?=$row['summary']?></p>
          <p><?=$row['content']?></p>
		  <? } ?>
          <hr>
 <h1>Добавить комментарий</h1>   
<hr> <!-- the comment box -->
<div class="well">			
	<form id="addCommentForm" method="post" action="http://project.ru/?act=add_com&id=<?=$_GET['id']?>">
    	<div>
        	<label for="name">Имя</label>
			
        	 <input type="text" name="name" class="form-control">
			<hr>
            <label for="email">Email</label>
            <input type="text" class="form-control" name="email" id="email" />
            <hr>
            <label for="url">Вебсайт (не обязательно)</label>
            <input type="text" class="form-control" name="url" id="url" />
            <hr>
            <label for="body">Содержание комментария</label>
            <textarea name="body" class="form-control" id="body" cols="20" rows="5"></textarea>
			<br>
            <input type="submit" class="btn btn-primary" id="submit" value="Отправить" />
        </div>
    </form>

</div>
          			
          <!-- the comments -->
          </div>

		  <div class="col-lg-12" style="float:right;">
		  <? while ($com = mysql_fetch_array($comments)) { ?>
		  <div class="wello">   		  
		  <h3><?=$com['name'];?><small><?=$com['dt'];?></small></h3>
		  
		  <p><?=$com['body'];?></p>
		  <hr>
		  </div>
		  <?}?>      
		  </div>
		  
		  
        </div>      
	  
	</div>
      <!--/row-->
      </div>
	  </div>
<!-- /.container -->
<? include ("footer.php"); ?>