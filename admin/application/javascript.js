var deleteRecord = function(id){
    $.ajax({
         url: 'application/ajax/ajaxDelete.php',
         type: 'POST',
         data: {id: id},
         success: function(){
            location.reload();
        }
    });   
}

var editRecord = function(id){
   $("#edit").load('application/ajax/ajaxEdit.php', {id: id});  
}

var saveEdit = function(form){
    $.ajax({
		url: 'application/ajax/ajaxEditSave.php',
		type: 'POST',
		data: {id: form.id.value, name: form.name.value, autor: form.autor.value, udk: form.udk.value, bbk: form.bbk.value},
		success: function(){
			location.reload();
        }
    });   	
}

var searchWord = function(form){ 
	$("#edit").load('application/ajax/ajaxSearch.php', {search: form.search.value});  
}
