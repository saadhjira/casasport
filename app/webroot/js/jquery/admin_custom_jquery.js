var domain="http://localhost/hagga";

getFieldsWeight=function(){
	els=[];
    $.each($('input.weight'),function(index,item){
    	els.push({'id':item.id.split('_')[1],'value':item.value});
    });
    //stringify
    $.ajax({
  type: 'POST',
  url: domain+'/admin/articles/save_weights',
  data: {"data":$.toJSON(els)},
  dataType:'json',
  success:function(){
  	alert("ok");
  }
  //dataType: dataType
});
    //$.post('/hagga/admin/articles/save_weights',els);
    //console.log($.toJSON(els));	
}

getChekedArticles=function(){
	els=[];
    $.each($('span[class*=ui-checkbox-state-checked]').prev(),function(index,item){
    	els.push(item.id.split('_')[1]);
    });
    //stringify
    $.ajax({
  type: 'POST',
  url: domain+'/admin/articles/delete',
  data: {"data":els.join(',')},
  dataType:'json',
  success: function(){
    window.location.reload( false );
  }
  //dataType: dataType
});
    //$.post('/hagga/admin/articles/save_weights',els);
    //console.log($.toJSON(els));	
}

getChekedMenu=function(){
	els=[];
    $.each($('span[class*=ui-checkbox-state-checked]').prev(),function(index,item){
    	els.push(item.id.split('_')[1]);
    });
    //stringify
    $.ajax({
  type: 'POST',
  url: domain+'/admin/menus/delete',
  data: {"data":els.join(',')},
  dataType:'json',
  success: function(){
    window.location.reload( false );
  }
  //dataType: dataType
});
    //$.post('/hagga/admin/articles/save_weights',els);
    console.log(els);	
}

$(document).ready(function () {
    $("#save_weights").click(function () {
          getFieldsWeight();
    });
     $("#delete_articles").click(function () {
          getChekedArticles();
    });
      $("#delete_menus").click(function () {
         // getChekedMenu();
    });
});
  
