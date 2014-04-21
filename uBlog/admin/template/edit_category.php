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
<form action="?act=admin&to=edit_category&id=<?=$_GET['id']?>&check" method="POST" class="well form-sign">
    <label>Name</label><br>
    <input type="text" name="name" value="<?=$row['name']?>" class="form-control">
    <textarea name="description" id="redactor" class="form-control"><?=$row['description'];?></textarea>
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