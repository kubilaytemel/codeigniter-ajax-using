<style type="text/css">
	.table-kt > thead > tr {background: #4285f4!important; color:#fff; }
	.form-control{ padding: 6px!important; font-size:13px!important;height: 37px!important; }
	.form-group > label {}
	.dataTables_filter {display: none!important;}
	.hidden{display: none;}
	.visible{display: visible;}
</style>

<div class="be-content">
	<div class="main-content container-fluid">
	  <div class="row">
	 	<div id="uyar"></div>
	  	<div class="col-md-4">
            <div id="MEGAMENU"></div>
	  	</div>
	
	  	<div class="col-md-8">
	  		<form id="megamenu"  data-parsley-validate="" novalidate="" class="form-horizontal group-border-dashed">
	  			<button type="submit" class="btn btn-info" id="subb">Güncelle</button>
	  			<input type="hidden" name="mid" id="mid" value="<?php echo $veri[0]->megamenu_id; ?>">
	  			<div class="form-group">
	         		<label>Modül Adı</label>
	         		<input name="modad"  type="text" class="form-control" id="modad" parsley-trigger="change" required="" value="<?php echo $veri[0]->megamenu_name; ?>">
	         	</div>

	         	<div class="form-group">
	         		<label>Statü</label>
	         		<select class="form-control" name="statu" id="statu">
	         			<?php if($veri[0]->megamenu_statu!=1){ $val = 0; $text = "Aktif";}else{$val = 1; $text = "Pasif";} ?>
	         			<option value="<?php echo $val; ?>"><?php echo $text;?></option>
	         			<option value="0">Aktif</option>
	         			<option value="1">Pasif</option>
	         		</select>
	         	</div>

	         	<div class="form-group">
	         		<label>HTML Açıklaması</label>
	         		<textarea id="htmlack" name="htmlack" class="form-control"><?php echo $veri[0]->megamenu_html; ?></textarea>
	         	</div>
	   
	         	<div class="form-group" onchange="goster();">
	         		<label>Menü Tipini Seçinizi</label>
	         		<select name="goster" id="goster" class="form-control" parsley-trigger="change" required="">
	         			<option></option>
	         			<option value="1">Kategori</option>
	         			<option value="2">Sayfa</option>
	         		</select>
	         		<div id="kat" class="hidden">
		         		<label for="tags">Kategori Adı</label>
		         		
		         		<select class="select2 form-control" id="katid" name="katid">
		         			<?php if($veri[0]->megamenu_cat>0){$val = $cat_veri[0]->cat_id; $catname= $cat_veri[0]->cat_name; }else{ $val=0; $catname="";} ?>
				         	<option value="<?php echo $val; ?>"><?php echo $catname; ?></option>
				         	<?php foreach ($cat_data as $key) { ?>
					      	<option value="<?php echo $key->cat_id; ?>">	<?php echo $key->cat_name; ?></option>
					      	<?php } ?>
			            </select>
					</div>

					<div id="page" class="hidden">
		         		<label for="tags">Bilgi Sayfası Seçiniz</label>
		         		<select class="select2 form-control" id="pageid" name="pageid">
		         			<?php if($veri[0]->megamenu_page>0){$pval = $page_veri[0]->pid; $pagename= $page_veri[0]->page_name; }else{ $pval=0; $pagename="";} ?>
				         	<option value="<?php echo $pval; ?>"><?php echo $pagename; ?></option>
				         	<?php foreach ($page_data as $key) { ?>
					      	<option value="<?php echo $key->pid; ?>">	<?php echo $key->page_name; ?></option>
					      	<?php } ?>
			            </select>
					</div>
					<input type="hidden" id="pk" name="pk">
	         	</div>

	         	<div class="form-group">
	         		<label>Sira Numarası</label>
	         		<input name="modsira"  type="text" class="form-control" id="modsira" parsley-trigger="change" required="" value="<?php echo $veri[0]->megamenu_number; ?>">
	         	</div>
	         	
	  		</form>
	  	</div>
	   </div>
	</div>
</div>



<script type="text/javascript">
	function goBack() {window.history.back();}
	CKEDITOR.replace('htmlack');

	function goster(){
		var x = $("#goster").val();
		if(x==1){
			$("#page").removeClass('visible');
			$("#page").addClass('hidden');
			$("#kat").removeClass('hidden');
			$("#kat").addClass('visible');
			$("#pk").val('category');
		}else if(x==2){
			$("#kat").removeClass('visible');
			$("#kat").addClass('hidden');
			$("#page").removeClass('hidden');
			$("#page").addClass('visible');
			$("#pk").val('page');
		}
	}


  	$('#subb').click(function() {
		  var modad = $("#modad").val();
		  var goster = $("goster").val();
		  if(modad!="" && goster!=""){
				  	$.ajax({
				    url: "<?php echo base_url(""); ?>admin/megamenu/editMegamenu/",
				    type: 'POST',
				   // dataType: "JSON",
				    data: $("form").serialize(),
				    success: function(a) {
						getAjaxData();
				    },
				    error: function(a) {
				       $("#uyar").html("<div class='alert alert-danger'>Güncelleme Sırasında bir Hata Oluştu</div>");
				    }
				  });
				  return false;
		  }			  
	});

	//if(x==1){$("#uyar").html("<div class='alert alert-success'>Bilgiler Başarıyla Eklendi</div>");}else{alert("dddd");}


	function megamenuDelete(id){
		 swal({
	        title: "Bilgiler Silinsin mi?",
	        text: "",
	        type: "warning",
	        showCancelButton: true,
	        cancelButtonClass: 'btn-secondary waves-effect',
	        confirmButtonClass: 'btn-warning',
	        confirmButtonText: "Evet Silinsin!",
	        closeOnConfirm: true
	        },
	        function(isConfirm){
		        if (isConfirm) {
			        // ajax delete data to database
			        $.ajax({
			            url: "<?php echo base_url("admin/megamenu/delete"); ?>/" + id ,
			            type: "POST",
			            dataType: "json",
			            success: function (data){
			               getAjaxData();
			            },
			            error: function (jqXHR, textStatus, errorThrown)
			            {
			            	alert(errorThrown);
			                $("#uyar").html('<div class="alert alert-warning" role="alert">Silme İşlemi Sırasında Bir Hata Oluştu.</div>');
			            }
			        });
		    	}
	    	});
	}

	
    function getAjaxData(){
		$.post( "<?php echo base_url(""); ?>admin/megamenu/getAjax", function( data ) {
	      $("#MEGAMENU" ).empty().append( data );
	    });
	}
	$(document).ready(function(){
     	getAjaxData();
    });
	


 </script>	
