<link rel="stylesheet" href="[@path]/admin.css" />

<div class="col-sm-4 pages-list" id="disabled_menu"  ondrop="drop(event)" ondragover="allowDrop(event)">	
	
	[@menu]
		
</div>

<input type="hidden" id="menu_array" name="menu" value='[@current_val]' />

<div class="col-sm-8"  id="sortable" class="ui-sortable" ondrop="drop(event)" ondragover="allowDrop(event)" >
	<ul>
		<ol class="sortable">
			[@current]
		</ol>
	</ul>
</div>

<script>
		
	function allowDrop(ev) {
		ev.preventDefault();
	}

	function drag(ev) {
		ev.dataTransfer.setData("text", ev.target.id);
	}

	function drop(ev) {
		ev.preventDefault();
		var data = ev.dataTransfer.getData("text");
		ev.target.appendChild(document.getElementById(data));
		
		list = $('.sortable').nestedSortable('toHierarchy');
		
		$('#menu_array').val(JSON.stringify(list));
				
			
	}

	$(document).ready(function(){

        $('.sortable').nestedSortable({
            handle: 'div',
            items: 'li',
			maxLevels: 2,
            toleranceElement: '> div',
			options: {
				maxLevels: 1
			},	
			update: function () {
				list = $(this).nestedSortable('toHierarchy');
				$('#menu_array').val(JSON.stringify(list));
			}
        });
    });
	
		$('body').on('click', '.remove_item', function(){

			var id = $(this).parent('li').attr('id');
			
			var content = document.getElementById(id).outerHTML;
			
			$("#" + id + " li").each(function(){
				
				var li_id = $(this).attr('id');
					
				var inner_li = document.getElementById(li_id).outerHTML;
				
				$('#sortable ul ol ').append(inner_li);
				
			});
			
			$('#sortable #' + id).remove();
			
			$('#disabled_menu').prepend(content);
			
			$("#" + id + " ol").remove();
			
			list = $('.sortable').nestedSortable('toHierarchy');
			$('#menu_array').val(JSON.stringify(list));
				
			
		});	
	
</script>

<script src="[@path]/jquery.mjs.nestedSortable.js"></script>