/*------------------------------------------------------
    Author : www.webthemez.com
    License: Commons Attribution 3.0
    http://creativecommons.org/licenses/by/3.0/
---------------------------------------------------------  */

(function ($) {
    "use strict";
    var mainApp = {

        initFunction: function () {
            /*MENU 
            ------------------------------------*/
            $('#main-menu').metisMenu();
			
            $(window).bind("load resize", function () {
                if ($(this).width() < 768) {
                    $('div.sidebar-collapse').addClass('collapse')
                } else {
                    $('div.sidebar-collapse').removeClass('collapse')
                }
            });

            /* MORRIS BAR CHART
			-----------------------------------------*/
            Morris.Bar({
                element: 'morris-bar-chart',
                data: dataBar,
                xkey: 'y',
                ykeys: ['a', 'b', 'c'],
                labels: ['Heureux', 'Fatigué', 'Stressé'],
				barColors: ['yellow','orange','red'],
                hideHover: 'auto',
                resize: true
            });
	 

           

            /* MORRIS LINE CHART
			----------------------------------------*/
            Morris.Line({
                element: 'morris-line-chart',
                data: dataLine,
            
				 
      xkey: 'y',
      ykeys: ['a', 'b', 'c'],
      parseTime: false,
      labels: ['Heureux','Fatigué','Stressé'],
      fillOpacity: 0.6,
      hideHover: 'auto',
      behaveLikeLine: true,
      resize: true,
      pointFillColors:['#ffffff'],
      pointStrokeColors: ['black'],
       lineColors:['yellow','orange','red']
	  
            });
           
        
            $('#morris-bar-chart').cssCharts({type:"bar"});
            // $('.donut-chart').cssCharts({type:"donut"}).trigger('show-donut-chart');
            $('#morris-line-chart').cssCharts({type:"line"});

            // $('.pie-thychart').cssCharts({type:"pie"});
       
	 
        },

        initialization: function () {
            mainApp.initFunction();

        }

    }
    // Initializing ///

    $(document).ready(function () {
        mainApp.initFunction(); 
		$("#sideNav").click(function(){
			if($(this).hasClass('closed')){
				$('.navbar-side').animate({left: '0px'});
				$(this).removeClass('closed');
				$('#page-wrapper').animate({'margin-left' : '260px'});	
			}
			else{
			    $(this).addClass('closed');
				$('.navbar-side').animate({left: '-260px'});
				$('#page-wrapper').animate({'margin-left' : '0px'}); 
			}
		});
    });

}(jQuery));



window.addEventListener('load', function(){
    const tspan = document.querySelectorAll('#morris-chart-line tspan');
        for(element of tspan){
            console.log(element);
        }
})
