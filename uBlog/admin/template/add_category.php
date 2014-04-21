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
            Add category
          </h1>
        </div>
        <!-- Keep all page content within the page-content inset div! -->
        <div class="page-content inset">
          <div class="row">
            <form action="?act=admin&to=add_category" method="POST" class="well form-sign">
    <label>Name category</label>
    <input name="name" type="text" class="form-control" />
    <label>Description category</label>
    		<textarea id="redactor" name="description">
			<h2>Hello and Welcome</h2>
			<p>Lorem ipsum <a href="http://test.com" title="dolor">dolor</a> sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing <b>elit, sed do eiusmod tempor incididunt</b> ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</textarea>
    <div style="padding-top: 10px;">
        <button type="submit"  name="pick" class="btn btn-primary">
            Post
        </button>
    </div>
</form>
          </div>
        </div>
      </div>
<? include ("footer.php"); ?>