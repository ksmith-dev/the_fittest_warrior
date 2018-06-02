var power = [60, 40];
var endurance = [30, 70];
var speed = [80, 20];
var colors = ['rgb(192, 108, 12)', 'rgb(241, 173, 40)'];
var borderColor = 'rgb(241, 173, 40)';

var power_ctx = document.getElementById('overall-power').getContext('2d');
var endurance_ctx = document.getElementById('overall-endurance').getContext('2d');
var speed_ctx = document.getElementById('overall-speed').getContext('2d');

var overall_power = new Chart(power_ctx, {

    type: 'doughnut',

    data: {
        datasets: [{
            backgroundColor: colors,
            borderColor: borderColor,
            data: power,
        }]
    },

    // Configuration options go here
    options: {
        tooltips: {enabled: false},
        hover: {mode: null},
        elements: {
            center: {
                text: '60%',
                color: 'rgb(241, 173, 40)', // Default is #000000000000
                fontStyle: 'Arial', // Default is Arial
                sidePadding: 20
            }
        }
    }
});
var overall_speed = new Chart(speed_ctx, {

    type: 'doughnut',

    data: {
        datasets: [{
            backgroundColor: colors,
            borderColor: borderColor,
            data: speed,
        }]
    },

    // Configuration options go here
    options: {
        tooltips: {enabled: false},
        hover: {mode: null},
        elements: {
            center: {
                text: '80%',
                color: 'rgb(241, 173, 40)', // Default is #000000000000
                fontStyle: 'Arial', // Default is Arial
                sidePadding: 20
            }
        }
    }
});


var overall_endurance = new Chart(endurance_ctx, {

    type: 'doughnut',

    data: {
        datasets: [{
            backgroundColor: colors,
            borderColor: borderColor,
            data: endurance,
        }]
    },

    // Configuration options go here
    options: {
        tooltips: {enabled: false},
        hover: {mode: null},
        elements: {
            center: {
                text: '30%',
                color: 'rgb(241, 173, 40)', // Default is #000000000000
                fontStyle: 'Arial', // Default is Arial
                sidePadding: 20
            }
        }
    }
});


Chart.pluginService.register({
    beforeDraw: function (chart) {
        if (chart.config.options.elements.center) {
            //Get ctx from string
            var ctx = chart.chart.ctx;

            //Get options from the center object in options
            var centerConfig = chart.config.options.elements.center;
            var fontStyle = centerConfig.fontStyle || 'Arial';
            var txt = centerConfig.text;
            var color = centerConfig.color || '#000000';
            var sidePadding = centerConfig.sidePadding || 20;
            var sidePaddingCalculated = (sidePadding / 100) * (chart.innerRadius * 2)
            //Start with a base font of 30px
            ctx.font = "30px " + fontStyle;

            //Get the width of the string and also the width of the element minus 10 to give it 5px side padding
            var stringWidth = ctx.measureText(txt).width;
            var elementWidth = (chart.innerRadius * 2) - sidePaddingCalculated;

            // Find out how much the font can grow in width.
            var widthRatio = elementWidth / stringWidth;
            var newFontSize = Math.floor(30 * widthRatio);
            var elementHeight = (chart.innerRadius * 2);

            // Pick a new font size so it will not be larger than the height of label.
            var fontSizeToUse = Math.min(newFontSize, elementHeight);

            //Set font settings to draw it correctly.
            ctx.textAlign = 'center';
            ctx.textBaseline = 'middle';
            var centerX = ((chart.chartArea.left + chart.chartArea.right) / 2);
            var centerY = ((chart.chartArea.top + chart.chartArea.bottom) / 2);
            ctx.font = fontSizeToUse + "px " + fontStyle;
            ctx.fillStyle = color;

            //Draw text in center
            ctx.fillText(txt, centerX, centerY);
        }
    }
});