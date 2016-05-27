var triangleWidth = 22,
	colorOffset =  28;

$(function() {
	$('.pattern-text').each(function() {
		var dim, canvas = document.createElement('canvas'), fontSize, text;
		
		fontSize = $(this).attr('data-size');
		text = $(this).attr('data-text');
		
		if (!canvas.getContext) return;
		ctx = canvas.getContext('2d');
		
		ctx.font = "bold " + fontSize + "px Segoe Ui";

        console.log(fontSize);

		dim = new V(ctx.measureText(text).width, ~~Math.max($(this).height(), fontSize * 1.3));
		
		canvas.width = dim.x;
		canvas.height = dim.y;
		
		$(this).html(canvas);
		
		ctx.drawImage(drawInMemoryCanvas(text, fontSize, dim), 0, 0);
		
		ctx.globalCompositeOperation = 'source-in';
		
		ctx.drawImage(drawBackgroundImage(dim), 0, 0);
	});
});

var V = function(x, y) {
	this.x = x;
	this.y = y;
}

function drawInMemoryCanvas(text, fontSize, dim) {
	var canvas = document.createElement('canvas'), ctx;
	if (!canvas.getContext) return;
	canvas.width = dim.x;
	canvas.height = dim.y;
	
	ctx = canvas.getContext('2d');
	ctx.beginPath();
	
	ctx.font = "bold " + fontSize + "px Segoe Ui";
	
	ctx.textBaseline = 'middle';
	
	ctx.fillText(text, 0, dim.y / 2);
	ctx.closePath();

	return canvas;
}

function drawBackgroundImage(dim) {
	var canvas = document.createElement('canvas'), ctx;
	if (!canvas.getContext) return;
	canvas.width = dim.x;
	canvas.height = dim.y;
	
	ctx = canvas.getContext('2d');
	
	// draw triangles
	for (var i=0; i<~~(dim.x / triangleWidth) + 20; i++) { // x
		for (var h=0; h<~~(dim.y / triangleWidth) + 1; h++) { // y
				drawTriangle( // upside up
					new V(i * triangleWidth - i * 2, h * triangleWidth),
					new V(i * triangleWidth + triangleWidth / 2 - i * 2, h * triangleWidth + triangleWidth),
					new V(i * triangleWidth - triangleWidth / 2 - i * 2, h * triangleWidth + triangleWidth), ctx);
			
				drawTriangle( // upside down
					new V(i * triangleWidth - i * 2 - 1, h * triangleWidth),
					new V(i * triangleWidth + triangleWidth - i * 2 - 1, h * triangleWidth),
					new V(i * triangleWidth + triangleWidth / 2 - i * 2 - 1, h * triangleWidth + triangleWidth), ctx);
		}
	}
	
	return canvas;
}

function drawTriangle(pos1, pos2, pos3, ctx) {
	ctx.beginPath();
	
	ctx.fillStyle = 'rgba(' + (43 - colorOffset / 2 + ~~(Math.random() * colorOffset)) + ', ' + (141 - colorOffset / 2 + ~~(Math.random() * colorOffset)) + ', ' + (191 - colorOffset / 2 + ~~(Math.random() * colorOffset)) + ', 1)';
	
    ctx.moveTo(pos1.x, pos1.y);
    ctx.lineTo(pos2.x, pos2.y);
    ctx.lineTo(pos3.x, pos3.y);
    ctx.fill();
	ctx.closePath();
}