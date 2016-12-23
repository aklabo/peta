<?php



?>
<!DOCTYPE html>
<html>
	<head>
		<title>peta</title>
		<style>
		html {
			width: 100%;
			height: 100%;
		}

		body {
			width: 100%;
			height: 100%;
		}

		.div-canvas {
			height: 400px;
			width: 700px;
			border-style: solid;
			border-width: 1px;
			border-color: #999999;
			overflow: scroll;
		}

		.div-box {
			width: 100px;
			height: 100px;
			background-color: #f0f0f0;
			border-color: #101010;
			border-style: solid;
			border-width: 1px;
			position: absolute;
		}

		.div-input-box {
			background-color: #ffffff;
			position: absolute;
			visibility: none;
			width: 300px;
			height: 200px;
		}
		</style>
		<!-- script src="https://unpkg.com/react@15/dist/react.min.js"></script -->
		<!-- script src="https://unpkg.com/react-dom@15/dist/react-dom.min.js"></script -->
		<script src="/js/jquery-3.1.1.min.js"></script>
		<script>
		function onClick(event) {

		}

		function _load_boxes() {
			// none
		}

		function _onload_document() {
			_load_boxes();
		}

		var dragging_position = null;

		function _on_begindrag_canvas() {

			// alert("MOUSE: [x=" + window.event.x + ",y=" + window.event.y + "]");

			//
			// detecting canvas position.
			//
			var canvas = document.getElementById("div-canvas");
			if (canvas == null)
				return;

			// alert("canvas.style.left=" + canvas.style.left + ", canvas.style.top=" + canvas.style.top);

			var canvas_position = {
				x: canvas.offsetLeft,
				y: canvas.offsetTop
			};

			// alert("canvas.left=" + canvas_position.x + ", canvas.top=" + canvas_position.y);

			dragging_position = {
				x: window.event.x - canvas_position.x,
				y: window.event.y - canvas_position.y
			};
			dragging_position = {
				x: window.event.x,
				y: window.event.y
			};
		}

		function _show_inputbox() {


		}

		function _on_dragend_canvas() {

			if(dragging_position == null)
				return;

			//
			// event position
			//
			var current_position = {x: window.event.x, y: window.event.y};

			if (!_show_inputbox()) {
				//
				// canceled...
				//
				return;
			}

			//
			// creating a new box.
			//
			var new_element = document.createElement('DIV'); 
			new_element.id = "";
			new_element.innerHTML = "<marquee>新しい要素</marquee>";
			new_element.className = "div-box";
			new_element.style.left = "" + dragging_position.x + "px";
			new_element.style.top = "" + dragging_position.y + "px";

			//
			// appending to canvas.
			//
			var canvas = document.getElementById("div-canvas");
			if (canvas == null)
				return;
			canvas.appendChild(new_element);
			// dragging_position = null;
		}
		</script>
	</head>
	<body onload="javascript: _onload_document();">
		<h2>dashboard</h2>
		<div id="div-canvas" class="div-canvas" onmouseup="javascript: _on_dragend_canvas();" onmousedown="javascript: _on_begindrag_canvas();">
		</div>
		<div id="div-input-box">
			いつ <input type="text" name="txt-date" class="txt-date"><br>
			<br>
			内容 <input type="text" name="txt-content" class="txt-content">
			<br>
			<br>
			<input type="button" value="OK" onclick="javascript: _onclick_text_apply();">
			<input type="button" value="CANCEL" onclick="javascript: _onclick_text_cancel();">
		</div>
	</body>
</html>
