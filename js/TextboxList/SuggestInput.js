(function($){

$.SuggestInput = function(bitEditable, textboxlist, autocomplete){

  var value, lastValue, suggestInput;

  bitEditableInput = bitEditable.getInput().data('suggest', this);

  var self = this;
	var init = function(){
	  suggestInput = $('<input type="text" class="'+ textboxlist.getOptions().prefix +'-autocomplete-suggest ' + bitEditableInput.attr('class') +'" disabled="disabled" />')
	                    .insertBefore(bitEditableInput);
	  
	  lastValue = bitEditableInput.val();
	  bitEditableInput.keypress(updateSuggest).keyup(delKey).blur(clearSuggest);
	};
	
	var updateSuggest = function(ev) {
    if(ev.which == 8) return;
    new_search = bitEditableInput.val() + String.fromCharCode(ev.charCode);
    if (!strStartsWith(lastValue, new_search)) clearSuggest();
	};
	
	var delKey = function(ev) {
	  if(ev.which != 8) return;
	  if(bitEditableInput.val().length < autocomplete.getOptions().minLength) {
	    clearSuggest();
	  }
	}
	
	var suggest = function(resultValue) {
	  if(resultValue == lastValue) return;
	  suggestInput.val(compose(bitEditableInput.val(), resultValue));
	  lastValue = resultValue;
	};
	
	var clearSuggest = function() {
	  suggestInput.val('');
	  lastValue = '';
	};
	
	this.suggest = suggest;
	this.clearSuggest = clearSuggest;
	
	init();
};

var strStartsWith = function(str, prefix){
  return sanitize(str.toLowerCase()).indexOf(sanitize(prefix.toLowerCase())) === 0;
}
var compose = function(base, extended){ return base + extended.substring(base.length) }
var sanitize = function(str) {
  var r = '';

  for(var i = 0, l = str.length; i < l; i++) {
    var s = str.charAt(i);
    switch(s) {
      case 'à': case 'á':
        r += 'a'; break;
      case 'è': case 'é':
        r += 'e'; break;
      case 'í':
        r += 'i'; break;
      case 'ò': case 'ó':
        r += 'o'; break;
      case 'ú':
        r += 'u'; break;
      default:
        r += s;
    }
  }
  return r;
}

})(jQuery);