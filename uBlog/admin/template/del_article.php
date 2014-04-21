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
            <form action="" method="GET" class="well form-sign">
    <label>Article id</label><br>
    <input type="text" name="id" class="form-control">
    <div style="padding-top: 10px;">
        <button type="submit" class="btn btn-primary" class="btn">
            Post
        </button>
    </div>
</form>
          </div>
        </div>
      </div>
<? include ("footer.php"); ?>