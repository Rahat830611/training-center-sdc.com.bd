//Progress Script
let options = {
	startAngle: -1.55,
	size: 110,
	value: 0.90,
	fill: {gradient: ['#2C5C2D', '#2C5C2D']}
  }
  $(".circle .bar").circleProgress(options).on('circle-animation-progress',
  function(event, progress, stepValue){
	$(this).parent().find("span").text(String(stepValue.toFixed(2).substr(2)) + "%");
  });
  $(".js .bar").circleProgress({
	value: 0.75
  });
  $(".react .bar").circleProgress({
	value: 0.85
  });