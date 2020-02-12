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
                data: [{
                    y: 'lundi',
                    a: 50,
                    b: 60 ,
                    c: 15                
                }, {
                    y: 'mardi',
                    a: 75,
                    b: 65,
                    c: 25
                }, {
                    y: 'mercredi',
                    a: 50,
                    b: 40,
                    c: 60
                }, {
                    y: 'jeudi',
                    a: 75,
                    b: 65,
                    c: 80
                }, {
                    y: 'vendredi',
                    a: 50,
                    b: 40,
                    c: 75
                }, 
                
                ],
                xkey: 'y',
                ykeys: ['a', 'b', 'c'],
                labels: ['Series A', 'Series B', 'Series C'],
				barColors: ['red','orange','yellow'],
                hideHover: 'auto',
                resize: true
            });
	 

           

            /* MORRIS LINE CHART
			----------------------------------------*/
            Morris.Line({
                element: 'morris-line-chart',
                data: [
					  { y: '01', a: 50, b: 90, c:40},
					  { y: '02', a: 165,  b: 185, c: 85},
					  { y: '03', a: 150,  b: 130, c:65},
					  { y: '04', a: 175,  b: 160, c:145},
					  { y: '05', a: 80,  b: 65, c: 189},
					  { y: '06', a: 90,  b: 70, c:147}, 
					  { y: '07', a: 100, b: 125, c:125},
					  { y: '08', a: 155, b: 175, c:35},
					  { y: '09', a: 80, b: 85, c: 165},
					  { y: '10', a: 145, b: 155, c:85},
                      { y: '11', a: 160, b: 195, c:95},
                      { y: '12', a: 160, b: 195, c:95},
                      { y: '13', a: 160, b: 195, c:95},
                      { y: '14', a: 160, b: 195, c:95},
                      { y: '15', a: 160, b: 195, c:95},
                      { y: '16', a: 160, b: 195, c:95},
                      { y: '17', a: 160, b: 195, c:95},
                      { y: '18', a: 160, b: 195, c:95},
                      { y: '19', a: 160, b: 195, c:95},
                      { y: '20', a: 160, b: 195, c:95},
                      { y: '21', a: 160, b: 195, c:95},
                      { y: '22', a: 160, b: 195, c:95},
                      { y: '23', a: 160, b: 195, c:95},
                      { y: '24', a: 160, b: 195, c:95},
                      { y: '25', a: 160, b: 195, c:95},
                      { y: '26', a: 160, b: 195, c:95},
                      { y: '27', a: 160, b: 195, c:95},
                      { y: '28', a: 160, b: 195, c:95},
                      { y: '29', a: 160, b: 195, c:95},
                      { y: '30', a: 160, b: 195, c:95},
                      { y: '31', a: 160, b: 195, c:95}
				],
            
				 
      xkey: 'y',
      ykeys: ['a', 'b', 'c'],
      labels: ['Total Income', 'Total Outcome'],
      fillOpacity: 0.6,
      hideHover: 'auto',
      behaveLikeLine: true,
      resize: true,
      pointFillColors:['#ffffff'],
      pointStrokeColors: ['black'],
       lineColors:['red','orange','yellow']
	  
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
