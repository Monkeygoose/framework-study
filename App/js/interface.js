	//java die dump
	function dump(obj) {
	    var out = '';
	    for (var i in obj) {
	        out += i + ": " + obj[i] + "\n";
	    }

	    alert(out);
	}

	//Initialize draggable content
	$(function() {
		$( ".draggable" ).draggable({ containment: ".toolscontainer", grid: [ 20, 20 ] });
	});

	//minimise or close element
	function showhide(ident,self,action){
		var classid = ident;
		var selfid = self;
		var action = action;

		$( classid ).toggleClass( action ).scrollTop( 0 );

	};

	//Toggle visual cue MINIMISE BUTTON
	$('.min').on('click', function(e){

		$(this).toggleClass( "on" );

	});

	//Toggle visual cue TOOLBUTTON
	$('.toolbtn').on('click', function(e){

		$(this).toggleClass( "toolOn" );

	});

	//Bring to front
	$('.draggable').on('mousedown', function(e){

		$('.draggable').css('z-index', 10);
		$(this).css('z-index', 20);

	});

	//Overlay stuff
	$('.overlay').on('click', function(e){

		$(".controlBox").addClass( "hidden" );
		var parentClass = $(this).parent().attr("class");
		$("."+parentClass+"-Controls").toggleClass( "hidden" );

	});

	//Toolicon
	$('.toolicon').on('click', function(e){

		$(this).toggleClass( "tooliconon" );
		$('.overlay').toggleClass( "hidden" );

	});

	//Submit design forms.
	$('.submit').on('click', function(e){

		$( "#returnData").html( $( "#designForm" ).serialize() );
		$.post( "process.php", $( "#designForm" ).serialize() )  
		.done(function( data ) {  });

	});

	//Process submitted values into form from database.

		$(function(){

			$.get( "/framework2-study/get-vars" )
			.done(function( data ) {
				var arr = JSON.parse(data);
				console.log(arr);

				//$( "#returnData").html(arr[0]['headerboxShadow']);
	    	 });

		});		
