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
        if(_key.indexOf("[]") !== -1) { //multiple checkbox
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
        if($el.val() !== -1 && $el.val() !== '') {
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

function errorHandle(form, errors) {
  $.each(errors, function(id, text) {
    var span = '<span class="control-label">' + text + '</span>';
    var elm = '#' + form + ' #' + id;
    $(span).insertAfter(elm);
    $(elm).parent().addClass('has-error');
  });
}

function setModalAttr(title,html,btn) {
	if(title != '') {
		$('.modal-title').text(title);
	}
	if(html != '') {
		$("#myModal #showResult").html(html);
	}
	if(btn != '') {
		$(btn).insertAfter('#btnCancelModal');
	}
}

function showLoading(show) {
  if (show === true) {
    $('#loading').show();
  } else {
    $('#loading').hide();
  }
}

function showNotify(text, hide) {
	// $("#showResult").show();
	// $("#showResult").html(text);
	// $("#myModal").modal();
	// if(hide) {
	// 	setTimeout(function(){$('#myModal').modal('hide')},1000);
	// }
	toastr.remove();
	toastr.info(text);
  //toastr.remove()
}

function alertMsg(text,cls) {
	$("#js-show-result").attr('class','');
	$("#js-show-result").addClass(cls);
	$("#js-show-result").html(text);
	$("#js-show-result").fadeIn();
}

/*-------------AUTHENTICATION---------------*/
function login(form, url) {
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
			alertMsg('Loging...', 'text-info');
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
    	alertMsg('Error', 'text-danger');
    }
	});
}

function logout() {
  var data="logout=1";
  $.ajax({
		type: "POST",
		data: data,
		cache: false,
		success: function (html) {
		showNotify(html);
		setTimeout(function() {
      location.reload(true);
    }, 1000);
		}
	});
}

/*---------AJAX PROCESS GENERAL-------------*/
function $ajax(url, data, sync, type) {
  sync = typeof sync == 'undefined' ? true : sync;
  var success = false ;
  $.ajax({
    url : url,
    type : typeof type === 'undefined' ? 'POST' : type,
    data: data,
    //data : '',
    dataType : 'json',
    async : sync,
    beforeSend : function(){
      showLoading(true);
    	showNotify('Sending...');
    },
    success : function (data) {
    	var cls = 'text-danger';
    	var _redirect = typeof (data.redirect) !== 'undefined' ? data.redirect : false;
    	var _msg = _redirect ? data.message + '<br /> Redirect to...' : data.message;
    	if(data.success) cls = 'text-success';
    	success = true ;
      showLoading(false);
    	showNotify(_msg, true);
    	if(_redirect) {
    		setTimeout(function(){ window.location.assign(_redirect) },2500);
    	} else if(data.reload == true) {
    		setTimeout(function(){ location.reload(true); },1500);
    	}
    },
    error: function (jqXHR, textStatus, errorThrown) {
      success = false;
      showLoading(false);
    	showNotify('Error');
    }
  });
  return success;
}

/*-----------COMMON FUNCTION------------*/
function checkNumber(e) {
  if (window.event) {
    //lấy giá trị ASCII kí tự mới nhập vào với trình duyệt IE
  	var value = window.event.keyCode;
  } else {
    var value=e.which;
  }
  if(value!=8) {
  	if(value < 48 || value > 57) {
  		showNotify('Only allow number')
  		return false;
  	}
  }
}

function validateEmail(email) {
  var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
  return re.test(email);
}

function checkAll(name, parent, child) {
	var x=document.getElementsByName(name);
	var i=0;
	var count = x.length;
	if (document.getElementById(parent).checked) {
    for (i = 0; i < count; i++) {
      var check = child + '_' + i;
      document.getElementById(check).checked = true;
    }
  }
	else {
		for (i=0;i<count;i++) {
			var check = child + '_' + i;
			document.getElementById(check).checked = false;
		}
	}
	return 0;
}

function checkOne(name, parent, child) {
	var x = document.getElementsByName(name);
	var i = 0;
	var count = x.length;
	for (i = 0; i < count; i++) {
		var check = child + '_' + i;
		if (!document.getElementById(check).checked) {
			document.getElementById(parent).checked = false
		} else {
			var tmp = 0;
			for (i = 0; i < count; i++) {
				var check = child + '_' + i;
				if (document.getElementById(check).checked) {
          tmp++;
        }
			}
			if (tmp == count) {
        document.getElementById(parent).checked = true;
      }
		}
	}
	return 0;
}

$(document).on('click', '.js-delete-item', function() {
	var id = $(this).attr('data-id');
	var url = $(this).attr('data-url');
  var r = confirm("Are you sure ???");
  if (r) {
    var result = $ajax(url, {}, false, 'DELETE');
    if (result) {
      $('.dataTables tr[data-id=' + id + ']').remove();
      $('#js-row-' + id).remove();
    }
  }
});
