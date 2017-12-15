function toggleNextSection(sectID, level){   
    if(!sectID)
        return false;
    var $el = $(".info-it-base-container").find("[data-sectionid='" + sectID + "']");
    var hide = showHideEl($el);    
}

function showHideEl($el){
	var res;
    if($el.hasClass('hidden')){
    	$el.removeClass('hidden')
    	res = false;
    }else{
    //	$el.addClass('hidden')
    	res = true;
    }
    return res;
}