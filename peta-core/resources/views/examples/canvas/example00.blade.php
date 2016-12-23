<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<script type="application/javascript">
			function draw() {
				var canvas = document.getElementById("canvas");
				if (canvas.getContext) {
					var ctx = canvas.getContext("2d");

					ctx.fillStyle = "rgb(200,0,0)";
					ctx.fillRect (10, 10, 50, 50);

					ctx.fillStyle = "rgba(0, 0, 200, 0.5)";
					ctx.fillRect (30, 30, 50, 50);
				}
			}
		</script>
		<style type="text/css">
			canvas { border: 1px solid black; }
		</style>
	</head>
	<body onload="draw();">
		<canvas id="canvas" width="150" height="150"></canvas>
	</body>
</html>


