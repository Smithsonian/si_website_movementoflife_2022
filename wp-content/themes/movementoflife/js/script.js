var $ = jQuery;

$(document).ready(function() {
	// Sticky nav
	$(window).on('scroll', function() {
		if ($(window).scrollTop() > 100) {
			$('.header').addClass('scrolled');
		} else {
			$('.header').removeClass('scrolled');
		}
	});

	// Billboard spacing
	$('.home-billboard, .billboard').css('padding-top', $('.header').outerHeight(true));

	var BGImage = new Image();
	BGImage.src = $('.billboard-slideshow-slide').css('background-image').replace(/"/g,"").replace(/url\(|\)$/ig, "");

	BGImage.onload = function() {
		width = this.width;
		height = this.height;
		dimensions = height/width;

		if ($('.billboard-slideshow-slide').length < 2) {
			$('.billboard, .billboard-slideshow-slide').css('height', $(window).width() * dimensions);
		}
	}

	// Mobile menu
	if ($(window).width() < 801) {
		$('.sub-header').insertAfter('.header');
	}

	$('.header .fa-bars').click(function() {
		$('.sub-header').animate({'left': 0});
		$(this).hide();
		$('.header .fa-times').show();
	});
	$('.header .fa-times').click(function() {
		$('.sub-header').animate({'left': '-1200px'});
		$(this).hide();
		$('.header .fa-bars').show();
	});
	$('#navContainer .menu-option a').click(function() {
		if ($(window).width() < 801) {
			$('.sub-header').animate({'left': '-1200px'});
			$('.header .fa-times').hide();
			$('.header .fa-bars').show();
		}
	});

	// Move partner nav into mobile menu
	if ($(window).width() < 801) {
		$('.partner-nav').appendTo('#navContainer');
	}

	// Nav scroll to section
	var header = $('.header').outerHeight();
	$('#navContainer .menu-option a').click(function() {
	    $('html, body').animate({
	        scrollTop: ($($.attr(this, 'href')).offset().top) - header
	    }, 500);
	    return false;
	});

	// Add iframes into text-wrappers in order to set width and height
	$('.species-detail-page iframe').each(function() {
    	$(this).appendTo($(this).prev('.text-wrapper')); 
    	$(this).height($(this).width() * 0.6);
	});

	// Show sign up form on button click
	$('#mc_embed_signup_scroll h2').on('click', function() {
		$(this).parent().css('height', 'auto');
	});
});

// =================================================================
// Begin slideshow
// =================================================================
function slideshow(slideshowWrapper, timeToTranstion, transitionTime) {
  var $slide = $('.billboard-slideshow-slide');
  var slideTime = timeToTranstion;
  var fadeTime = transitionTime;
  var slideCount = 1;

  // Wrap all slides with billboard-slideshow container
  var slidePad = $slide.css('padding-top');

  //slideshowWrapper.css({'height': $slide.width()*0.45});
  if ($(window).width() > 900) {
    slideshowWrapper.css({'padding-top': slidePad});
  }

  if ($slide.length > 1) {
    // Hide all slides except first
    $slide.first().show();
	//$('.billboard-slideshow-slide i.fa').show();

    // Slide forwards
    function slideForward() {
      // Update slide count
      if (slideCount < $slide.length) {
        $slide.eq(slideCount-1).animate({'margin-left': '100%'}, fadeTime, function() {
          $(this).css('margin-left', '-100%');
        });
        $slide.eq(slideCount).animate({'margin-left': '0'}, fadeTime);
        slideCount++;
      } else {
        $slide.eq(slideCount-1).animate({'margin-left': '100%'}, fadeTime, function() {
          $(this).css('margin-left', '-100%');
        });
        $slide.eq(0).animate({'margin-left': '0'}, fadeTime);
        slideCount = 1;
      }
    }

    var startSlide = setInterval(slideForward, slideTime);

    // Slide backwards
    function slideBack() {
      $slide.eq(slideCount-1).animate({'margin-left': '-100%'}, fadeTime);
      if (slideCount  !== 1) {
        $slide.eq(slideCount-2).css('margin-left', '100%').animate({'margin-left': '0'}, fadeTime);
        slideCount--;
        console.log(slideCount);
      } else {
        slideCount = $slide.length;
        $slide.eq(slideCount-1).css('margin-left', '100%').animate({'margin-left': '0'}, fadeTime);
        console.log(slideCount);
      }
    };

    // Slideshow action
    $('.billboard-slideshow-slide .fa-chevron-right').on('click', function() {
      slideForward();
    });

    $('.billboard-slideshow-slide .fa-chevron-left').on('click', function() {
      slideBack();
    });

	$(document).on('mouseenter', '.billboard', function(event, slideForward, slideTime) {
		clearInterval(startSlide);
	}).on('mouseleave','.billboard',  function(){
		startSlide = setInterval(slideForward, slideTime);
	});
  } 
}

// Execute slideshow
slideshow($('.billboard'), 10000, 500);

// =================================================================
// End slideshow
// =================================================================
// ====================================
// Begin Wufoo email sign up form
// ====================================
addEvent(window, 'load', initForm);

var highlight_array = new Array();

function initForm(){
	initializeFocus();
	var activeForm = document.getElementsByTagName('form')[0];
	addEvent(activeForm, 'submit', disableSubmitButton);
	ifInstructs();
	showRangeCounters();
}

function disableSubmitButton() {
	document.getElementById('saveForm').disabled = true;
}

// for radio and checkboxes, they have to be cleared manually, so they are added to the
// global array highlight_array so we dont have to loop through the dom every time.
function initializeFocus(){
	var fields = getElementsByClassName(document, "*", "field");
	
	for(i = 0; i < fields.length; i++) {
		if(fields[i].type == 'radio' || fields[i].type == 'checkbox') {
			fields[i].onclick = function() {highlight(this, 4);};
			fields[i].onfocus = function() {highlight(this, 4);};
		}
		else if(fields[i].className.match('addr') || fields[i].className.match('other')) {
			fields[i].onfocus = function(){highlight(this, 3);};
		}
		else {
			fields[i].onfocus = function(){highlight(this, 2); };
		}
	}
}

function highlight(el, depth){
	if(depth == 2){var fieldContainer = el.parentNode.parentNode;}
	if(depth == 3){var fieldContainer = el.parentNode.parentNode.parentNode;}
	if(depth == 4){var fieldContainer = el.parentNode.parentNode.parentNode.parentNode;}
	
	addClassName(fieldContainer, 'focused', true);
	var focusedFields = getElementsByClassName(document, "*", "focused");
	
	for(i = 0; i < focusedFields.length; i++) {
		if(focusedFields[i] != fieldContainer){
			removeClassName(focusedFields[i], 'focused');
		}
	}
}

function ifInstructs(){
	var container = document.getElementById('public');
	if(container){
		removeClassName(container,'noI');
		var instructs = getElementsByClassName(document,"*","instruct");
		if(instructs == ''){
			addClassName(container,'noI',true);
		}
		if(container.offsetWidth <= 450){
			addClassName(container,'altInstruct',true);
		}
	}
}

function showRangeCounters(){
	counters = getElementsByClassName(document, "em", "currently");
	for(i = 0; i < counters.length; i++) {
		counters[i].style.display = 'inline';
	}
}

function validateRange(ColumnId, RangeType) {
	if(document.getElementById('rangeUsedMsg'+ColumnId)) {
	var field;
	if (document.getElementById('Field'+ColumnId)) {
		field = document.getElementById('Field'+ColumnId);
	} else if (document.getElementById('Field'+ColumnId+'_other')) {
		field = document.getElementById('Field'+ColumnId+'_other');
	}
		var msg = document.getElementById('rangeUsedMsg'+ColumnId);

		switch(RangeType) {
			case 'character':
				msg.innerHTML = field.value.length;
				break;
				
			case 'word':
				var val = field.value;
				val = val.replace(/\n/g, " ");
				var words = val.split(" ");
				var used = 0;
				for(i =0; i < words.length; i++) {
					if(words[i].replace(/\s+$/,"") != "") used++;
				}
				msg.innerHTML = used;
				break;
				
			case 'digit':
				msg.innerHTML = field.value.length;
				break;
		}
	}
}

function handleRadioOther(id, last) {
	var label = document.getElementById(id+'_otherlabel');
	if (label) {
	if (last) {
		label.style.display = 'block';
	} else {
		label.style.display = 'none';
	}
	}
}

/*--------------------------------------------------------------------------*/

//http://www.robertnyman.com/2005/11/07/the-ultimate-getelementsbyclassname/
function getElementsByClassName(oElm, strTagName, strClassName){
	var arrElements = (strTagName == "*" && oElm.all)? oElm.all : oElm.getElementsByTagName(strTagName);
	var arrReturnElements = new Array();
	strClassName = strClassName.replace(/\-/g, "\\-");
	var oRegExp = new RegExp("(^|\\s)" + strClassName + "(\\s|$)");
	var oElement;
	for(var i=0; i<arrElements.length; i++){
		oElement = arrElements[i];		
		if(oRegExp.test(oElement.className)){
			arrReturnElements.push(oElement);
		}	
	}
	return (arrReturnElements)
}

//http://www.bigbold.com/snippets/posts/show/2630
function addClassName(objElement, strClass, blnMayAlreadyExist){
	if ( objElement.className ){
		var arrList = objElement.className.split(' ');
		if ( blnMayAlreadyExist ){
			var strClassUpper = strClass.toUpperCase();
			for ( var i = 0; i < arrList.length; i++ ){
			if ( arrList[i].toUpperCase() == strClassUpper ){
				arrList.splice(i, 1);
				i--;
				}
			}
		}
		arrList[arrList.length] = strClass;
		objElement.className = arrList.join(' ');
	}
	else{  
		objElement.className = strClass;
		}
}

//http://www.bigbold.com/snippets/posts/show/2630
function removeClassName(objElement, strClass){
	if ( objElement.className ){
		var arrList = objElement.className.split(' ');
		var strClassUpper = strClass.toUpperCase();
		for ( var i = 0; i < arrList.length; i++ ){
			if ( arrList[i].toUpperCase() == strClassUpper ){
			arrList.splice(i, 1);
			i--;
			}
		}
		objElement.className = arrList.join(' ');
	}
}

//http://ejohn.org/projects/flexible-javascript-events/
function addEvent( obj, type, fn ) {
	if ( obj.attachEvent ) {
	obj["e"+type+fn] = fn;
	obj[type+fn] = function() { obj["e"+type+fn]( window.event ) };
	obj.attachEvent( "on"+type, obj[type+fn] );
	} 
	else{
	obj.addEventListener( type, fn, false );	
	}
}

// Prevent form submit if email field is empty
$('input#saveForm').on('click', function(e) {
	e.preventDefault();

	if ($('form#form27 input#Field1').val()) {
		$('form#form27').submit();
	} else {
		alert('Please enter an email address');
	}
});

// ====================================
// End Wufoo email sign up form
// ====================================

// News page category filtering
$(document).ready(function() {
	// Add count to sidebar
	var categories = [];
	var avian = 0;
	var marine = 0;
	var terrestrial = 0;

	$('.blog-post').each(function() {
		categories.push($(this).find('.news-category').text());
		categories = categories.filter(function (value, index, array) { 
			return array.indexOf(value) === index;
		});
		
		if ($(this).find('.news-category').text() === 'Avian') {
			avian++;
		} else if ($(this).find('.news-category').text() === 'Marine') {
			marine++;
		} else if ($(this).find('.news-category').text() === 'Terrestrial') {
			terrestrial++;
		}
	});

	$('#avianCount').text('(' + avian + ')');
	$('#marineCount').text('(' + marine + ')');
	$('#terrestrialCount').text('(' + terrestrial + ')');

	// Category filtering
	$('.news-filter').on('click', function() {
		var filterName = $(this).attr('id').replace('Filter', '');

		if ($(this).hasClass('active')) {
			$('.blog-post').show();
			$(this).removeClass('active');
		} else {
			$('.blog-post').hide();
			$('.news-category').each(function() {
	
				if ($(this).text() === filterName) {
					$(this).parent().show();
				}
			});
	
			$('.news-filter').removeClass('active');
			$(this).addClass('active');
		}
	});
});

// Move Stay In Touch form position on About page
$(document).ready(function() {
	if ($('body.about').length) {
		$('section#stayInTouch').insertBefore($('section#stayInTouch').prev());
	}
});