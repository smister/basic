
// JavaScript Document

//author:54xiaosu(87753586) 
//函数说明：合并指定表格（表格id为_w_table_id）指定列（列数为_w_table_colnum）的相同文本的相邻单元格
//参数说明：_w_table_id 为需要进行合并单元格的表格的id。如在HTMl中指定表格 id="data" ，此参数应为 #data
//参数说明：_w_table_colnum 为需要合并单元格的所在列。为数字，从最左边第一列为1开始算起。
    function _w_table_rowspan(_w_table_id, _w_table_colnum) {
	_w_table_firsttd = "";
	_w_table_currenttd = "";
	_w_table_SpanNum = 0;
	_w_table_Obj = $(_w_table_id + " tr td:nth-child(" + _w_table_colnum + ")");
	_w_table_Obj.each(function(i) {
	    if (i == 0) {
		_w_table_firsttd = $(this);
		_w_table_SpanNum = 1;
	    } else {
		_w_table_currenttd = $(this);
		if (_w_table_firsttd.text() == _w_table_currenttd.text()) {
		    _w_table_SpanNum++;
		    _w_table_currenttd.hide(); //remove();
		    _w_table_firsttd.attr("rowSpan", _w_table_SpanNum);
		} else {
		    _w_table_firsttd = $(this);
		    _w_table_SpanNum = 1;
		}
	    }
	});
    }
//函数说明：合并指定表格（表格id为_w_table_id）指定行（行数为_w_table_rownum）的相同文本的相邻单元格
//参数说明：_w_table_id 为需要进行合并单元格的表格id。如在HTMl中指定表格 id="data" ，此参数应为 #data
//参数说明：_w_table_rownum 为需要合并单元格的所在行。其参数形式请参考jQuery中nth-child的参数。
//          如果为数字，则从最左边第一行为1开始算起。
//          "even" 表示偶数行
//          "odd" 表示奇数行
//          "3n+1" 表示的行数为1、4、7、10.......
//参数说明：_w_table_maxcolnum 为指定行中单元格对应的最大列数，列数大于这个数值的单元格将不进行比较合并。
//          此参数可以为空，为空则指定行的所有单元格要进行比较合并。
    function _w_table_colspan(_w_table_id, _w_table_rownum, _w_table_maxcolnum) {
	if (_w_table_maxcolnum == void 0) {
	    _w_table_maxcolnum = 0;
	}
	_w_table_firsttd = "";
	_w_table_currenttd = "";
	_w_table_SpanNum = 0;
	$(_w_table_id + " tr:nth-child(" + _w_table_rownum + ")").each(function(i) {
	    _w_table_Obj = $(this).children();
	    _w_table_Obj.each(function(i) {
		if (i == 0) {
		    _w_table_firsttd = $(this);
		    _w_table_SpanNum = 1;
		} else if ((_w_table_maxcolnum > 0) && (i > _w_table_maxcolnum)) {
		    return "";
		} else {
		    _w_table_currenttd = $(this);
		    if (_w_table_firsttd.text() == _w_table_currenttd.text()) {
			_w_table_SpanNum++;
			_w_table_currenttd.hide(); //remove();
			_w_table_firsttd.attr("colSpan", _w_table_SpanNum);
		    } else {
			_w_table_firsttd = $(this);
			_w_table_SpanNum = 1;
		    }
		}
	    });
	});
    }

    //var a;

   

    function buildSkuTable( array) {

	  $('#sku').find('tbody').empty();
  
	  for (var i = 0; i < array.length; i++) {
		  if (array[i].length < 1) {
		  return;
		  }
	  }
  
	  var a = array[0];
  
	  for (var i = 1; i < array.length; i++) {
		  fff(array[i]);
	  }
	  
	  
	  function fff(array) {
		var ar = a;
		a = new Array();
		for (var i = 0; i < ar.length; i++) {
			for (var j = 0; j < array.length; j++) {
			  var v = a.push(ar[i] + "_" + array[j]);
			}
		}	 
	  }
	  
	  
	  var idArray = [];
	  var opArray = [];
	  for (var k = 0; k < a.length; k++) {
	  	 var arr = a[k].split('_');
		 var tmArr = [];
		 var mpArr = [];
		 for (var i = 0; i < arr.length; i++) {
			 var arr2 = arr[i].split(';');
			 tmArr.push(arr2[0]);
			 mpArr.push(arr2)
		 }
		 idArray.push(tmArr);
		 opArray.push( mpArr);
	  }
  
	  var body = '';
  
	  for (var k = 0; k < a.length; k++) {
		  body += '<tr>';
		  arr = opArray[k]
		  var count = arr.length;
		  for (var i = 0; i < count; i++) {
			//var arr2 = arr[i];
			body += '<td><input data-index="'+i+'" data-id="'+idArray[k].slice(0,i+1).join('_') +'" value="' +  arr[i][0] + '" type="hidden" name="Item[skusData][table]['+k+'][props][]">' +  arr[i][1] + '</td>';
		  }
		  var sku_row_id = idArray[k].join('_');
		  body += '<td><input type="hidden" class="skusid" data-props="'+sku_row_id +'" value="0" name="Item[skusData][table]['+k+'][sku_id]"><input class="skus-price span8" value="0.00" type="text" data-id="'+sku_row_id +'" name="Item[skusData][table]['+k+'][price]"></td><td><input class="skus-stock span8" data-id="'+sku_row_id +'" value="0" type="text" name="Item[skusData][table]['+k+'][stock]"></td><td><input class="skus-outer_id span8" value="" data-id="'+sku_row_id +'" type="text" name="Item[skusData][table]['+k+'][outer_id]"></td><td class="operation"><a href="javascript:void(0);" data-id="'+sku_row_id+'" ><i class=" icon-th-large"></i></a></td></tr>';
	  }
  
	  $('#sku').find('tbody').html(body);
	  
	  $('#sku td.operation a').popover({
			html : true,
			placement: 'left',
			container: 'body',
			title: '批量操作',
			content: function(){
				return $("#hint-contentbox").html();
			}	
	  });
	  
	  $('#sku td.operation a').on('shown.bs.popover', function () {
		$current = $(this);
		$("#currentRow").val($current.data('id'));
		updateBatchOption($current.data('id'));
		$('#sku td.operation a').each( function(){
		  if ($current.data("id") != $(this).data("id")){
			  $(this).popover('hide');
		  }
		});
	  });
  
	  for (var i = array.length; i >= 1; i--) {
		  _w_table_rowspan("#sku", i);
	  }
	  
	  renderBatchLayer(opArray[0]);
	  fillData();

    }
	
	function updateBatchOption(optid){
		var optArr = optid.split("_");
		for (var i =0,count = optArr.length; i < count; i++) {
			$("div.popover-content").find('input[data-index="'+i+'"]').data("optid",optArr[i]);
			$("#hint-contentbox").find('input[data-index="'+i+'"]').data("optid",optArr[i]);
		}
	}
	
	function renderBatchLayer(optArr){
		var html = [];
		var count = optArr.length;
		if (count == 0) return false;	
		
		html.push('<div class="batch-type span6">');
		html.push('<div class="caption">价格：</div>');
        html.push('<ul class="unstyled">');
		for (var i = 0; i < count; i++) {
			html.push('<li>');
			html.push('<input class="batch-radio" data-type="price" data-index="'+i+'" name="batch-price" data-optId="'+optArr[i][0]+'" id="batch-price-'+i+'" type="radio">');
			var moid = optArr[i][0].split(":");
			html.push('<label for="batch-price-'+i+'">同'+global.skus[moid[0]]+'价格相同</label>');
			html.push('</li>');			
		}
		
		html.push('</ul>');
		html.push('</div>');
        
		
		html.push('<div class="batch-type span6">');
		html.push('<div class="caption">数量：</div>');
        html.push('<ul class="unstyled">');
		for (var i = 0; i < count; i++) {
			html.push('<li>');
			html.push('<input class="batch-radio" data-type="stock" data-index="'+i+'" name="batch-stock" data-optId="'+optArr[i][0]+'" id="batch-stock-'+i+'" type="radio">');
			var moid = optArr[i][0].split(":");
			html.push('<label for="batch-stock-'+i+'">同'+ global.skus[moid[0]]+'数量相同</label>');
			html.push('</li>');			
		}
	   html.push('</ul>');
	   html.push('</div>');	  
	   
	   $("#hint-contentbox div.batch-body").html(html.join(""));
	}
	
	function fillData(){
		var item_id = $("#skus_info").data("id");		
		var skus_url =  $("#skus_info").data("url");
		var token = $("[name=YII_CSRF_TOKEN]").val();
		if (parseInt(item_id)>0){			
			$.ajax
		    ({
				type: "POST",				
				data: {"item_id": item_id, "YII_CSRF_TOKEN":token},
				url: skus_url ,
				dataType: "json",
				success: function(res)
				{					
					updateSkus(res);
				}
		    });
		}
	}
	
	function updateSkus(json){
		//var json = eval(res);
		$.each(json, function(i,data){
			var dprops = data["props"].replace(";","_");
			 $("#sku").find("input[type=hidden][data-props='"+dprops+"']").val(data["sku_id"]);//更新sku_id 
			  $("#sku").find("input[class='skus-price span8'][data-id='"+dprops+"']").val(data["price"]);//更新price
			   $("#sku").find("input[class='skus-stock span8'][data-id='"+dprops+"']").val(data["stock"]);//更新stock
			    $("#sku").find("input[class='skus-outer_id span8'][data-id='"+dprops+"']").val(data["outer_id"]);//更新outer_id
		});
	}
	
	function renderTable(){
		 $('.sku-map').show();
	    //建立sku表格内容
	    array = new Array();
	    array_props = new Array();
	    $('ul.sku-list').each(function() {
		var $that = $(this);
		var newArray = new Array();
		$(this).find('.change').filter(':checked').each(function() {
		    newArray.push($(this).val()+";"+$(this).next().text());
		});
		array.push(newArray);
	    });
	    buildSkuTable(array);


	    var tmp = null;
	    var count = 0;
	    $('input[class=change]:checked').each(function() {
		if (tmp === null) {
		    tmp = $(this);
		    count = 1;
		}


		if (tmp.attr('name') !== $(this).attr('name')) {
		    count++;
		}
	    });

	    if (count < 2) {
		//显示
		$("#output").after('<div class="alert alert-info">您需要选择所有的销售属性，才能组合成完整的规格信息。</div>');
		if ($('input[class=change]:checked').length >= 1) {
		    $(".alert").remove();
		    $("#output").after('<div class="alert alert-info">您需要选择所有的销售属性，才能组合成完整的规格信息。</div>');
		}
		if ($('input[class=change]:checked').length === 0) {
		    $(".alert").remove();
		}
	    } else {
		$(".alert").remove();
	    }
	}
	
	function render_sku_table(){
		var html =[];	
		html.push('<table id="sku" class="table table-bordered"><thead><tr>');
		$.each(global.skus, function(id,name){
			html.push('<th id="th_'+id+'">'+name+'</th>');			
		});
			
		html.push('<th id="th_price">价格</th><th>数量</th><th>商家编码</th><th>操作</th></tr>');		
		html.push('</thead><tbody></tbody></table>');
		
		$("#skuTable").html(html.join(""));
		
	}
	
	function add_thread_th(id,name){
		if ($("#th_"+name).length>0) { 
			return false;
		} else {
			if ($("#sku").get(0)){
				$("#th_price").before('<th id="th_'+id+'">'+name+'</th>');
			} else {
				render_sku_table();
			}
			
			renderTable();
		
			return true;			
		}
	}
	
	function render_option_hidden(prop_id,prop_name,value,b){
		var html =[];
		
		var type = "";
		
		switch(b){
			case 1:
				type = "propsData";
			break;
			
			case 2:
				type = "skusData";
			break;			
			
			default:
				type = "propsData";
			break;
		}
		
		if ((typeof value === Object) || (value instanceof Array)) {
			html.push('<input name="Item['+type+']['+prop_id+']" id="item_'+type+'_'+prop_id+'" type="hidden" value="'+$.toJSON( value )+'">');	
		} else {		
		
			html.push('<input name="Item['+type+']['+prop_id+']" id="item_'+type+'_'+prop_id+'" type="hidden" value="'+value+'">');	
		}
		
		return html.join("");
	}
	
	
	function render_dropdown(id,name,values){
		var html =[];
		html.push('<select name="'+name+'" id="sp_'+id+'" class="span5">');
		
		html.push('<option value="">----Please select----</option>');
		
		$.each(values, function(k,v){
			html.push('<option value="'+k+'">'+v+'</option>');			
		});
		
		html.push('</select>');
		
		return html.join("");
	}
	
	function render_option_text(prop_id,prop_name,value,must,b,selected){
		var html =[];
		
		var type = "";
		
		switch(b){
			case 1:
				type = "propsData";
			break;
			
			case 2:
				type = "skusData";
			break;
			
			default:
				type = "propsData";
			break;
		}		
	
		html.push('<div class="control-group" id="div_'+prop_id+'">');
		html.push('<label class="control-label" for="Item['+type+']['+prop_id+']">'+prop_name);
		if (must == 1) {
			html.push('<span class="required">*</span>');
		}
		
		html.push('<div class="controls">');		
		if (selected instanceof Array && selected.length > 0) {	
			html.push('<input name="Item['+type+']['+prop_id+']" id="item_'+type+'_'+prop_id+'"  type="text" value="'+selected[0]+'">');
		} else {
			html.push('<input name="Item['+type+']['+prop_id+']" id="item_'+type+'_'+prop_id+'" type="text" value="'+selected +'">');
		}
	
		html.push('</div></div>');
		
		return html.join("");
	}
	
	function render_option_dropdown(prop_id,prop_name,values,must,b,selected){
		var html =[];
		var type = "";
		
		switch(b){
			case 1:
				type = "propsData";
			break;
			
			case 2:
				type = "skusData";
			break;
			
			default:
				type = "propsData";
			break;
		}		
		
		html.push('<div class="control-group" id="div_'+prop_id+'">');
		html.push('<label class="control-label" for="Item['+type+']['+prop_id+']">'+prop_name);
		if (must == 1) {
			html.push('<span class="required">*</span>');
		}
		
		
		html.push('<div class="controls">');
		html.push('<select name="Item['+type+']['+prop_id+']" id="item_'+type+'_'+prop_id+'" class="span5">');
		
		html.push('<option value="">----Please select----</option>');
		
		$.each(values, function(k,v){
			
			if ($.inArray(k, selected) == -1){	
				html.push('<option value="'+k+'">'+v+'</option>');
			} else {
				html.push('<option value="'+k+'" selected="selected">'+v+'</option>');				
			}		
		});
		
		html.push('</select></div></div>');
		
		return html.join("");
	}
	
	
	function render_option_multicheck(prop_id,prop_name,values,must,b,selected){
		var html =[];
		var type = "";
		
		switch(b){
			case 1:
				type = "propsData";
			break;
			
			case 2:
				type = "skusData";
			break;
			
			default:
				type = "propsData";
			break;
		}		
		
		
		html.push('<div class="control-group" id="div_'+prop_id+'">');
		html.push('<label class="control-label" for="Item['+type+']['+prop_id+']">'+prop_name);
		if (must == 1) {
			html.push('<span class="required">*</span>');
		}
		
		
		html.push('<div class="controls">');
		
		$.each(values, function(k,v){
			html.push('<label class="checkbox inline">');
			
			
			if ($.inArray(k, selected) == -1){	
				html.push('<input type="checkbox" name="Item['+type+']['+prop_id+'][]" id="item_'+type+'_'+k+'" value="'+k+'">');
			} else {
				html.push('<input type="checkbox" name="Item['+type+']['+prop_id+'][]" id="item_'+type+'_'+k+'" value="'+k+'" checked="checked">');				
			}		
			
			html.push(v);
			html.push('</label>');			
		});
		
		html.push('</div></div>');
		
		return html.join("");
	}
	
	
	
	function render_option_sku_multicheck(prop_id,prop_name,values,must,type,selected){
		var html =[];
		html.push('<div class="sku-group" id="div_'+prop_id+'">');
		html.push('<label class="sku-head">'+prop_name+' </label>');
		html.push('<div class="sku-box">');
		html.push('<ul class="sku-list">');
		
		
		$.each(values, function(k,v){
			html.push('<li class="sku-item">');
			
			if ($.inArray(k, selected) == -1)	{				
				html.push('<input type="checkbox" class="change" name="Item[skusData][checkbox]['+prop_id+'][]" id="item_skus_checkbox_'+k+'" value="'+k+'">');
			} else {
				html.push('<input type="checkbox" class="change" name="Item[skusData][checkbox]['+prop_id+'][]" id="item_skus_checkbox_'+k+'" value="'+k+'" checked="checked">');			
			
				
			}		
		
			
			html.push('<label class="checkbox inline" for="item_skus_checkbox_'+k+'">'+v+'</label>');
			html.push('</li>');			
		});
		
		html.push('</ul></div></div>');
		return html.join("");
	}
	
	function add_attribute_form(data){
		var $cnt = $("#div_"+data["prop_id"]);
		if ($cnt.length > 0){
			return "";
		}
		
		html = "";
		
		if (data["type"] == 1) {
			html = render_option_text(data['item_prop_id'],data['prop_name'],data['values'],data['must'],1,data['selected']);
		} else if (data["type"] == 2) {
			html = render_option_dropdown(data['item_prop_id'],data['prop_name'],data['values'],data['must'],1,data['selected']);
		} else if (data["type"] ==  3) {
			html = render_option_multicheck(data['item_prop_id'],data['prop_name'],data['values'],data['must'],1,data['selected']);
		}
		$("#item_prop_values").append(html);
	}
	
	
	function add_options_form(data){
		
		var $cnt = $("#div_"+data["item_prop_id"]);
		if ($cnt.length > 0){
			return "";
		}
		
		var html = "";
		
		if (data["type"] ==  3) {
			html = render_option_sku_multicheck(data['item_prop_id'],data['prop_name'],data['values'],data['must'],2,data['selected']);
		}
		$("#sku-wrap").append(html);
		
	}
	
	
	
	function clear_options(){
		
		 $.each(global.prop, function(k, pitem){				   
				$("#div_"+k).remove();				   
		 });	
				
		 $.each(global.skus, function(k, pitem){
		   	$("#div_"+k).remove();			   
		});
		
		
		$("#skuTable").html('');
		 global.prop = {};
		 global.skus = {};
		
	}
	
	
 $(document).ready(function() {
	
	$(document).on('click', '.change', function() {	    
	   renderTable();
	});

	$(document).on('change', '#item_price', function() {	    
	   $("#spn_price").text($(this).val());
	});
	
	function apply_same_param(optid,index,type){
		var rid = $("#currentRow").val();
		
		if (index == 0){
		  var cur_price =  $("#sku").find("input[class='skus-price span8'][data-id='"+rid+"']").val();
		  var cur_stock = $("#sku").find("input[class='skus-stock span8'][data-id='"+rid+"']").val();	
		  if (type == 0){
			var oid = $("#sku").find("input[type=hidden][data-index='"+index+"']").data("id");
			$("#sku").find("input[class='skus-price span8'][data-id*='"+optid+"']").each(function(){
				  $(this).val(cur_price);
			});
		  } else if (type == 1){
			  var oid = $("#sku").find("input[type=hidden][data-index='"+index+"']").data("id");
			$("#sku").find("input[class='skus-stock span8'][data-id*='"+optid+"']").each(function(){
				  $(this).val(cur_stock);
			});
		  }
		} else {
			
			var opAr = rid.split("_");
			var mat = "";
			for(var i=0,count=opAr.length; i< count; i++){
				mat += (i==0)?opAr[i]:"_"+opAr[i];
				$("#sku").find("input[type=hidden][class='skusid'][data-props*='"+mat+"']").each(function(){
				  var tr = $(this).parent("td").parent("tr");
				  var opMatch = $(this).data("props").replace(mat,"");
				  cur_price = tr.find("input[class='skus-price span8']").val();
				  cur_stock = tr.find("input[class='skus-stock span8']").val();
				  if (type == 0){
						
						$("#sku").find("input[class='skus-price span8'][data-id*='"+opMatch+"']").each(function(){
							  $(this).val(cur_price);
						});
				  } else if (type == 1){
						
						$("#sku").find("input[class='skus-stock span8'][data-id*='"+opMatch+"']").each(function(){
							  $(this).val(cur_stock);
						});
				  }
				});
			}
			
			
		}
	
	}	
	
	
	$(document).on("click", "#btnPopSub", function(e) {		
		$(".popover-content").find("input[type=radio][data-type=price]:checked").each(function(){
			var optid = $(this).data('optid');
			var index = $(this).data('index');
			apply_same_param(optid,index,0);			
		});
		
		$(".popover-content").find("input[type=radio][data-type=stock]:checked").each(function(){
			var optid = $(this).data('optid');
			var index = $(this).data('index');
			apply_same_param(optid,index,1);			
		});
		
		$("#hint-contentbox").html($(".popover-content").html());
		$('#sku td.operation a').popover('hide');
	});
	
	
	$(document).on("click", "#btnPopCancel", function(e) {		
		$(".popover-content").find("input[type=radio]:checked").each(function(){
			$(this).removeAttr("checked");
		});
		$("#hint-contentbox").html($(".popover-content").html());
		$('#sku td.operation a').popover('hide');
	});
	
	

	$("#Item_category_id").change(function() {	    
	    var Tid = $("#Item_category_id").find("option:selected").val();
		var purl =  global.category_url; 
		if(Tid == '') return false;
		var token = $("[name=YII_CSRF_TOKEN]").val();
		   
	    $.ajax
		    ({
			type: "POST",
			data: {"category_id": Tid, "YII_CSRF_TOKEN":token},
			url: purl,
			dataType: "json",
			success: function(res)
			{
				
			   clear_options();	
			   var props = res.props, skus = res.skus;
			   $.each(props, function(k, pitem){
				   
				   add_attribute_form(pitem);
				   global.prop[pitem.item_prop_id]= pitem.prop_name;
				   
				});
				
				 $.each(skus, function(k, pitem){
				   
				   add_options_form(pitem);  
				   global.skus[pitem.item_prop_id]= pitem.prop_name;
				   add_thread_th(pitem.prop_id,pitem.prop_name);
				   //renderTable();			  
				   
				});

			}
		 });

	});
});
