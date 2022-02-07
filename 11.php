<!doctype html>
<html>
 <head>
  <meta charset="UTF-8">
  <title>Document</title>

	<script type="text/javascript">

		var ta = Math.random() * 20 + 10;
		var tb = Math.random() * 20 + 10;
		var tc = Math.random() * 20 + 10;
		var td = Math.random() * 20 + 10;

		
		//obj.value = String(ta);

		alert('A = ' + ta + ', B = ' + tb + ' , C = ' + tc + ', D =' + td);
		
		var fta = 0.0;
		var ftb = 0.0;
		var ftc = 0.0;
		var ftd = 0.0;

		var extpected = 0.0;

		var xa = 0;
		var ya = 0;
		var xb = 400;
		var yb = 0;
		var xc = 0;
		var yc = 400;
		var xd = 400;
		var yd = 400;

		var xe = 380;
		var ye = 380;

		var lena = 0;
		var lenb = 0;
		var lenc = 0;
		var lend = 0;

		var lenTotal = 0;

		function doCanvas()
		{
			var canvas = document.getElementById('canvas');
			var context = canvas.getContext('2d');

			

			for(var i=1; i<400; i++)
			{
				for(var j=1; j<400; j++)
				{
					lena = Math.sqrt( (i - xa)* (i-xa) + (j -ya) * (j-ya));
					lenb = Math.sqrt( (i - xb)* (i-xb) + (j -yb) * (j-yb));
					lenc = Math.sqrt( (i - xc)* (i-xc) + (j -yc) * (j-yc));
					lend = Math.sqrt( (i - xd)* (i-xd) + (j -yd) * (j-yd));

		
					lenTotal = lena + lenb + lenc + lend;
					//alert('lenTotal = ' + lenTotal);

					lena = lenTotal / lena;
					lenb = lenTotal / lenb;
					lenc = lenTotal / lenc;
					lend = lenTotal / lend;

					//alert('lena = ' + lena);
					//alert('lenb = ' + lenb);
			
					var a1 = (lena / (lena + lenb + lenc + lend)) * ta;
					var a2 = (lenb / (lena + lenb + lenc + lend)) * tb;
					var a3 = (lenc / (lena + lenb + lenc + lend)) * tc;
					var a4 = (lend / (lena + lenb + lenc + lend)) * td;

					expected = (a1 + a2 + a3 + a4);
					var testInt = Math.floor(expected);

					if(i == 300 && j == 300)
					{
						//alert('test Int = ' +testInt);


					}				
					switch(Math.floor(expected))
					{
						case 10:
							context.fillStyle = 'rgb(0,0,255)';
							break;
						case 11:
							context.fillStyle = 'rgb(18,18,255)';
							break;
						case 12:
							context.fillStyle = 'rgb(36,36,255)';
							break;
						case 13:
							context.fillStyle = 'rgb(54,54,255)';
							break;
						case 14:
							context.fillStyle = 'rgb(72,72,255)';
							break;
						case 15:
							context.fillStyle = 'rgb(90,90,255)';
							break;
						case 16:
							context.fillStyle = 'rgb(108,108,255)';
							break;
						case 17:
							context.fillStyle = 'rgb(126,126,255)';
							break;
						case 18:
							context.fillStyle = 'rgb(144,144,255)';
							break;
						case 19:
							context.fillStyle = 'rgb(162,162,255)';
							break;
						case 20:
							context.fillStyle = 'rgb(255,255,255)';
							break;
						case 21:
							context.fillStyle = 'rgb(255,162,162)';
							break;
						case 22:
							context.fillStyle = 'rgb(255,144,144)';
							break;
						case 23:
							context.fillStyle = 'rgb(255,126,126)';
							break;
						case 24:
							context.fillStyle = 'rgb(255,108,108)';
							break;
						case 25:
							context.fillStyle = 'rgb(255,90,90)';
							break;
						case 26:
							context.fillStyle = 'rgb(255,72,72)';
							break;
						case 27:
							context.fillStyle = 'rgb(255,54,54)';
							break;
						case 28:
							context.fillStyle = 'rgb(255,36,36)';
							break;
						case 29:
							context.fillStyle = 'rgb(255,18,18)';
							break;
						case 30:
							context.fillStyle = 'rgb(255,0,0)';
							break;
						default:
							break;
					}					
					//context.fillStyle = 'rgb(255,0,0)';
					context.fillRect(i, j, 1, 1);
					//context.stroke()

				}
			}
		}



	</script>

 </head>
 <body onLoad="doCanvas()">
	<canvas id="canvas" width="400" height="400" style="border:solid 1px #000000">
	</canvas>


 </body>
</html>
