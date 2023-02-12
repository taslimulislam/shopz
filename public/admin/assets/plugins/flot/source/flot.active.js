$(document).ready(function () {

    "use strict"; // Start of use strict

    //Flot charts data and options

    var data = [[1, 4], [2, 6], [3, 8], [4, 10], [5, 12], [6, 8], [7, 6], [8, 4], [9, 8], [10, 5], [11, 12], [12, 3]];
	
	var data5 = [
        {
            data: [[1, 3], [2, 20], [3, 7], [4, 17], [5, 5], [6, 25], [7, 7], [8, 30]]
        }
    ];
	
	var chartUsersOptions5 = {
        series: {
            lines: {
                show: true,
                fill: 0.1
            }
        },
        grid: {
            tickColor: "#e4e5e7",
            borderWidth: 1,
            borderColor: '#ddd',
            color: '#f5001b'
        },
        colors: ["#f5001b"]
    };

    $.plot($("#flotChart5"), data5, chartUsersOptions5);	

});