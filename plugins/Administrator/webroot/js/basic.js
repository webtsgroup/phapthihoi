function getFormData(form) {
  var _key,
    _value,
    _msg,
    _tag,
    _type,
    _required,
    _formData;
  formData = {
    data : {},
    error : {}
  };
  $form = '#' + form;
  $('input, select, textarea', $form).each(function(index, el) {
    var $el = $(el);
    _tag = $el.get(0).tagName;
    _type = _tag !=='INPUT' ? _tag : $el.attr('type');
    //init data
    _value = 'non-data';
    _key = $el.attr('name');
    _msg = $el.attr('title');
    _required = $el.attr('data-required');
    formData.error[_key] = true;
    //end
    switch (_type) {
      case 'checkbox':
        if(_key.indexOf("[]")) { //multiple checkbox
          var _getValue = [];
          $('input[name="' + _key + '"]').each(function() {
            if($(this).prop('checked')) {
              _getValue.push($el.val());
            }
          });
          if(_getValue.length > 0) {
            _value = _getValue;
          }
        } else { //single checkbox true|false
          _value = $el.prop('checked') ? 1 : 0 ;
        }
        break;
      case 'radio':
        $('input[name=' + _key + ']').each(function() {
          if($(this).prop('checked')){
            _value = $(this).val();
          }
        });
        break;
      case 'SELECT':
        if($el.val() !== -1) {
          _value = $el.val();
        }
        break;
      default:
        if($el.val() !== '') {
          _value = $el.val();
        }
        break;
    }
    if(_value === 'non-data' && _required == 1) {
      formData.error[_key] = _msg;
    } else {
      delete formData.error[_key];
      if(_value !== 'non-data') {
        formData.data[_key] = _value;
      }
    }
  });
  return formData;
}
function user(url) {
	var formData = getFormData('formUser');
  console.log(formData);
	if ($.isEmptyObject(formData.error)) {
		$ajax(url, formData.data);
	}
}
function deleteImage(id, url)
{
	var check = $ajax(url, {}, true);
	$('#image-'+id).remove();
}
function addNewHouse(form,url)
{
	var formData = validatorFormData(form);
	if(!formData.error) {
		if(!validateEmail(formData.data['contact_email']))
		{
			showNotify('Email invalid');
			return;
		}
		$ajax(url, formData.data);
	}
}
function addNewSlider(form,url)
{
	var formData = validatorFormData(form);
	if(!formData.error) {
		$ajax(url, formData.data);
	}
}
function addNewPlace(form,url)
{
	var formData = validatorFormData(form);
	if(!formData.error) {
		$ajax(url, formData.data);
	}
}
function addNewArticle(form,url)
{
	var formData = validatorFormData(form);
	if(!formData.error) {
		$ajax(url, formData.data);
	}
}
function addNewAccount(url)
{
	var formData = validatorFormData('addAccount');
	if(!formData.error) {
		if(!validateEmail(formData.data['email']))
		{
			showNotify('Email invalid');
			return;
		}
		$ajax(url, formData.data);
	}
}
function updateField(model,id,field,value)
{
	var elm = $('#'+field);
	if(elm.attr('rel') == 'date')
	{
		var arr = value.split("-");
		var date = arr[1]+"/"+arr[0]+"/"+arr[2];
		console.log(date);
		date = new Date(date);
		console.log(date);
		value = date.getTime();
		console.log(value);
		var c = new Date();
		c = c.getTime();
		value = c - value;
	}
	$.ajax({
		url  : '/ajaxs/updateField',
		type : 'POST',
		data : {
			data : {model : model , id : id, field : field, value : value}
		},
		dataType : 'json',
		success: function(data)
		{
			showNotify(data.message,true);
		}
	});
}
function changePass(url)
{
	var error = 0;
	var arr = ['old_pass', 'pass','re_pass'];
	var formData = {};
	$.each(arr,function(index,elm){
		var val = $('#'+elm).val();
		if( val == '')
		{
			showNotify('Insert '+elm);
			error++;
		}
		formData[elm] = val;
	});
	if(error == 0)	{
		if($ajax(url, formData, false))
		{
			$.each(arr,function(index,elm){
				$('#'+elm).val('');
			});
			showBoxChangePass();
		}
	}
}
function setModalAttr(title,html,btn)
{
	if(title != '')
	{
		$('.modal-title').text(title);
	}
	if(html != '')
	{
		$("#myModal #showResult").html(html);
	}
	if(btn != '')
	{
		$(btn).insertAfter('#btnCancelModal');
	}
}
function showBoxChangePass()
{
	$('.elm-hide').toggle();
}
function showNotify(text,hide)
{
	$("#showResult").show();
	$("#showResult").html(text);
	$("#myModal").modal();
	if(hide == true)
	{
		setTimeout(function(){$('#myModal').modal('hide')},1000);
	}
}
function alertMsg(text,cls)
{
	$("#showResult").attr('class','');
	$("#showResult").addClass(cls);
	$("#showResult").html(text);
	$("#showResult").fadeIn();
}
<!---login------------>
function login(form, url)
{
	var form = getFormData(form);
	if(!form.data.username) {
		alertMsg('Enter the Username', 'text-danger');
		jQuery('#email').focus();
		return false;
	}
	if(!form.data.pass) {
		alertMsg('Enter the password','text-danger');
		jQuery('#pass').focus();
		return false;
	}
	$.ajax({
		url : url,
		type : "POST",
		data: form.data,
		dataType : 'json',
		beforeSend : function() {
			alertMsg('Loging...','text-info');
		},
		success : function (data) {
			var cls = 'text-danger';
			var redirect = typeof (data.redirect) !== 'undefined' ? data.redirect : false;
			if(data.success) cls = 'text-success';
			alertMsg(data.message,cls);
			if(redirect) {
				setTimeout(function() {
					window.location.assign(redirect)
				}, 2500);
			} else if (data.reload === true) {
				setTimeout(function() {
					location.reload(true);
				}, 1000);
			}
		},
		error: function (jqXHR, textStatus, errorThrown) {
    	alertMsg('Error','text-danger');
    }
	});
 }

 function logout()
{
    var data="logout=1";
        $.ajax({
     			type: "POST",
     			data: data,
     			cache: false,
     			success: function (html) {
					showNotify(html);
					setTimeout(function() {location.reload(true);}, 5000);
     			}
      		});
 }
 /*---------AJAX PROCESS GENERAL-------------*/
 function $ajax(url, data, sync)
 {
	 sync = typeof sync == 'undefined' ? true : sync;
	 var success = false ;
	 $.ajax({
		url : url,
		type : "POST",
		data: data,
		//data : '',
		dataType : 'json',
		async : sync,
		beforeSend : function(){
			showNotify('Sending...');
		},
		success : function (data) {
			var cls = 'text-danger';
			var _redirect = typeof (data.redirect) !== 'undefined' ? data.redirect : false;
			var _msg = _redirect ? data.message + '<br /> Redirect to...' : data.message;
			if(data.success) cls = 'text-success';
			success = data.success ;
			showNotify(_msg, true);
			if(_redirect) {
				setTimeout(function(){ window.location.assign(_redirect) },2500);
			} else if(data.reload == true) {
				setTimeout(function(){ location.reload(true); },1500);
			}
		},
		error: function (jqXHR, textStatus, errorThrown) {
			showNotify('Error');
    }
	});
	return success;
 }
 function checkNumber(e)
 {
	if (window.event)//lấy giá trị ASCII kí tự mới nhập vào với trình duyệt IE
	{
		var value = window.event.keyCode;
	}
	else
		var value=e.which;
	if(value!=8)
	{
		if(value<48 || value>57)
		{
			showNotify('Only allow number')
			return false;
		}
	}
 }
 function validateEmail(email) {
    var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    return re.test(email);
}


function checkAll(name, parent, child)
{
	var x=document.getElementsByName(name);
	var i=0;
	var count = x.length;
	if(document.getElementById(parent).checked==true)
		for (i=0;i<count;i++)
		{
			var check=child+'_'+i;
			document.getElementById(check).checked=true;
		}
	else
	{
		for (i=0;i<count;i++)
		{
			var check=child+'_'+i;
			document.getElementById(check).checked=false;
		}
	}
	return 0;
}

function checkOne(name, parent, child)
{
	var x=document.getElementsByName(name);
	var i=0;
	var count = x.length;
	for (i=0;i<count;i++)
	{
		var check=child+'_'+i;
		if(document.getElementById(check).checked==false)
		{
			document.getElementById(parent).checked=false
		}
		else
		{
			var tmp = 0;
			for (i=0;i<count;i++)
			{
				var check=child+'_'+i;
				if(document.getElementById(check).checked==true) tmp++;
			}
			if(tmp == count) document.getElementById(parent).checked=true;
		}
	}
	return 0;
}
