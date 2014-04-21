<? include ("header.php"); ?>
<style>
.form-sign {
  max-width: 500px;
  padding: 15px;
  margin: 0 auto;
}
</style>
<script type="text/javascript">
$("#myModal").modal();

function send()
{
//Получаем параметры
var data = $('#url').val()
var image = $('#image').val()
  // Отсылаем паметры
       $.ajax({
                type: "POST",
                url: "?act=admin&to=check_image",
                data: "data="+data+"&image="+image,
                // Выводим то что вернул PHP
                success: function(html) {
 //предварительно очищаем нужный элемент страницы
                        $("#result").empty();
//и выводим ответ php скрипта
                        $("#result").append(html);
                }
        });

}
</script>
   </script>
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
	<label>Image</label>
    <input type="text" name="url" class="form-control">
    <label>Header</label>
    <input type="text" name="header" class="form-control">
    <label>Content</label>
    <textarea name="content" class="form-control"></textarea>
	<label>Summary</label>
	<textarea name="summary" class="form-control"></textarea>
	
        <button type="submit" class="btn btn-primary" name="pick" class="btn">
            Post
        </button>
		</form>
<form action="" id="myform">
<input type="text" name="url" id="url" />
<input type="file" name="image" id="image" />
<input type="button" onclick="send();" value="Отправить" />
</form>
<div id="result"></div>
		</div>
<button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    

          
        </div>
      </div>
<? include ("footer.php"); ?>