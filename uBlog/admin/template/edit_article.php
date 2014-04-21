<? include ("header.php"); ?>
<style>
.form-sign {
  max-width: 500px;
  padding: 15px;
  margin: 0 auto;
}
</style>
    <div id="page-content-wrapper">
        <div class="content-header">
          <h1>
            <a id="menu-toggle" href="#" class="btn btn-default"><i class="icon-reorder"></i></a>
            Add article
          </h1>
        </div>
        <!-- Keep all page content within the page-content inset div! -->
        <div class="page-content inset">
          <div class="row">
<? while ($row = mysql_fetch_array($result)) { ?>
<form action="?act=admin&to=edit_article&id=<?=$_GET['id']?>&check" method="POST" class="well form-sign">
    <label>Category</label><br>
	<select name="category" >
	<option value='<?=$row['id']?>'><?=$row['name']?> - id<?=$row['id']?> Сейчас выбрана эта категория</option>
    <? $query = mysql_query("select * from categories"); 

for ($i=0; $i<mysql_num_rows($query); $i++) 
{ 
$cow = mysql_fetch_array($query); 
echo '<option value='.$cow['id'].'>'.$cow['name'].' - id'.$cow['id'].'</option>'; 
}
    ?>
	</select><br>
	<label>Time</label>
    <input type="text" name="time" value="<?=$row['Date']?>" class="form-control">
	<label>User id</label><br>
	<select name="user_id" >
	<option value='<?=$row['user_id']?>'>Сейчас выбран пользователь с - id <?=$row['user_id']?></option>
	<? $query = mysql_query("select * from users"); 

for ($i=0; $i<mysql_num_rows($query); $i++) 
{ 
$cow = mysql_fetch_array($query); 
echo '<option value='.$cow['id'].'>'.$cow['username'].'- id'.$cow['id'].'</option>'; 
}
    ?>
	</select> <br>
    <label>Header</label>
    <input type="text" name="header" value="<?=$row['title'];?>" class="form-control">
    <label>Content</label>
    <textarea name="content" id="redactor" class="form-control"><?=$row['content'];?></textarea>
	<label>Summary</label>
	<textarea name="summary"  class="form-control"><?=$row['summary'];?></textarea>
    <div style="padding-top: 10px;">
        <button type="submit" class="btn btn-primary" name="pick" class="btn">
            Post
        </button>
    </div>
</form>
<? } ?>
          </div>
        </div>
      </div>
<? include ("footer.php"); ?>