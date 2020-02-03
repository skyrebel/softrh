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
				barColors: ['#A6A6A6','#24C2CE','#A8E9DC'],
                hideHover: 'auto',
                resize: true
            });
	 


           

           

            /* MORRIS LINE CHART
			----------------------------------------*/
            Morris.Line({
                element: 'morris-line-chart',
                data: [
					  { y: '2014', a: 50, b: 90, c:40},
					  { y: '2015', a: 165,  b: 185, c: 85},
					  { y: '2016', a: 150,  b: 130, c:65},
					  { y: '2017', a: 175,  b: 160, c:145},
					  { y: '2018', a: 80,  b: 65, c: 189},
					  { y: '2019', a: 90,  b: 70, c:147}, 
					  { y: '2020', a: 100, b: 125, c:125},
					  { y: '2021', a: 155, b: 175, c:35},
					  { y: '2022', a: 80, b: 85, c: 165},
					  { y: '2023', a: 145, b: 155, c:85},
					  { y: '2024', a: 160, b: 195, c:95}
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
      lineColors:['#A6A6A6','#24C2CE', '#A8E9DC']
	  
            });
           
        
            $('.bar-chart').cssCharts({type:"bar"});
            // $('.donut-chart').cssCharts({type:"donut"}).trigger('show-donut-chart');
            $('.line-chart').cssCharts({type:"line"});

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
