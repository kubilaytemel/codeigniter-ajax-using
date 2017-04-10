<script src="<?php echo base_url('assets/admin'); ?>/lib/jquery.nestable/jquery.nestable.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/admin'); ?>/js/app-ui-nestable-lists.js" type="text/javascript"></script>
<script type="text/javascript">
  $(document).ready(function(){
  	//initialize the javascript
  	App.init();
  	App.uiNestableLists();
  });
</script>
<div id="list2" class="dd">
	<ol class="dd-list">
		<?php foreach ($megamenu_item as $key) {?>
			<li data-id="13" class="dd-item dd3-item">
		        <div class="dd-handle dd3-handle"></div>
		        <div class="dd3-content"><?php echo $key->megamenu_name; ?>
		        	<a href="<?php echo base_url(); ?>/admin/megamenu/edit/<?php echo $key->megamenu_id; ?>" class="mdi mdi-edit pull-right" style="color:#e05b49; margin-left: 10px;"></a>
		        	<a href="javascript:megamenuDelete(<?php echo $key->megamenu_id; ?>)" class="mdi mdi-delete pull-right" style="color:#e05b49;"></a>&nbsp;&nbsp;
		        </div>
		        <?php if($key->megamenu_parent>0){?>
		        	<ol style="" class="dd-list">
		              <li data-id="14" class="dd-item dd3-item">
		                <div class="dd-handle dd3-handle"></div>
		                <div class="dd3-content"><?php echo $key->megamenu_name; ?>
		                	
		                	<a href="<?php echo base_url(); ?>/admin/megamenu/edit/<?php echo $key->megamenu_id; ?>" class="mdi mdi-edit pull-right" style="color:#e05b49; margin-left: 10px;"></a>
		        	<a href="javascript:megamenuDelete(<?php echo $key->megamenu_id; ?>)" class="mdi mdi-delete pull-right" style="color:#e05b49;"></a>&nbsp;&nbsp;
		                </div>
		              </li>
		            </ol>
		        <?php } ?> 
		    </li>
		<?php } ?>
	</ol>
</div>
<div class="xs-mt-30">
	<h4>Serialized Output:</h4>
	<pre><code id="out2"></code></pre>
</div>
