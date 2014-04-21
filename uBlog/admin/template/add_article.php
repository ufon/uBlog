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
            <form action="?act=admin&to=add_article" method="POST" class="well form-sign">
    <label>Category</label><br>
	<select name="category" >
    <? $query = mysql_query("select * from categories"); 

for ($i=0; $i<mysql_num_rows($query); $i++) 
{ 

$row = mysql_fetch_array($query); 
echo '<option value='.$row['id'].'>'.$row['name'].'</option>'; 
}
    ?>
	</select><br>
    <label>Header</label>
    <input type="text" name="header" class="form-control">
    <label>Content</label>
    <textarea id="redactor" name="content">
			<h2>Hello and Welcome</h2>
			<p>Lorem ipsum <a href="http://test.com" title="dolor">dolor</a> sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing <b>elit, sed do eiusmod tempor incididunt</b> ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</textarea>
	<label>Summary</label>
	<textarea name="summary" class="form-control"></textarea>
    <div style="padding-top: 10px;">
        <button type="submit" class="btn btn-primary" name="pick" class="btn">
            Post
        </button>
    </div>
</form>
          </div>
        </div>
      </div>
<? include ("footer.php"); ?>

