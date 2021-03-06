<?php
function _main() {

	$page = array();
	$page['form'] = array();
	return $page;
}

$page = _main();
?>
<!DOCTYPE html>
<html>
	<head>

		<title>peta</title>
		<meta charset="utf-8">

		<style>
		html {
			width: 100%;
			height: 100%;
		}

		body {
			width: 100%;
			height: 100%;
			padding-top: 70px;
		}

		.div-canvas {
			height: 500px;
			width: 100%;
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
			visibility: hidden;
			width: 300px;
			height: 200px;
			left: 0px;
			top: 0px;
		}

		.btn-default-xxxxxxxxxx {
			/*height: 24px;*/
			font-size: 14px;
		}
		</style>

		<!-- jQuery 3.x -->
		<!-- script src="/js/jquery-3.1.1.min.js"></script -->
		<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

		<!-- React 諦め中... -->
		<!-- script src="https://unpkg.com/react@15/dist/react.min.js"></script -->
		<!-- script src="https://unpkg.com/react-dom@15/dist/react-dom.min.js"></script -->

		<script>
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

			$("#myModal").modal("show");
		}

		function _show_inputbox_x() {

			var inputbox = document.getElementById("div-input-box");
			if (inputbox == null)
				return;
			var left = ($(window).width() - $("#div-input-box").width()) / 2.0;
			var top = ($(window).height() - $("#div-input-box").height()) / 2.0;
			inputbox.style.left = "" + left + "px";
			inputbox.style.top = "" + top + "px";
			inputbox.style.visibility = "visible";
			return true;
		}

		function _on_dragend_canvas() {

			if(dragging_position == null)
				return;
			var current_position = {x: window.event.x, y: window.event.y};
			if (!_show_inputbox())
				return;
		}

		function _onclick_text_cancel() {

			_hide_inputbox();
		}

		function _hide_inputbox() {

			$("#myModal").modal("hide");
		}

		function _hide_inputbox_xxx() {

			var inputbox = document.getElementById("div-input-box");
			if (inputbox == null)
				return;
			inputbox.style.visibility = "hidden";
		}

		function _pop_comment_value() {

			var comment = $("#comment").val();
			$("#comment").val("");
			return comment;
		}

		function _create_new_box(x, y, text) {

			var new_element = document.createElement('DIV');
			new_element.id = "";
			new_element.innerHTML = text;
			new_element.className = "well div-box";
			new_element.style.left = "" + x + "px";
			new_element.style.top = "" + y + "px";
			var canvas = document.getElementById("div-canvas");
			if (canvas == null)
				return;
			canvas.appendChild(new_element);
		}

		function _create_new_box_x(x, y, text) {

			var new_element = document.createElement('DIV');
			new_element.id = "";
			new_element.innerHTML = text;
			new_element.className = "div-box";
			new_element.style.left = "" + x + "px";
			new_element.style.top = "" + y + "px";
			var canvas = document.getElementById("div-canvas");
			if (canvas == null)
				return;
			canvas.appendChild(new_element);
		}

		function _on_click_apply() {

			_hide_inputbox();

			if (dragging_position == null) {
				alert("ASSERTION FAILURE");
				return;
			}

			_create_new_box(
					dragging_position.x,
					dragging_position.y,
					_pop_comment_value());
		}
		</script>
	</head>
	<body onload="javascript: _onload_document();">
		<form>
			<!-- ========================================================== -->
			<!-- Navigation -->
			<!-- ========================================================== -->
			<nav class="navbar navbar-inverse navbar-fixed-top">
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
							<span class="sr-only">Toggle navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="#">ぺたぺたするやつ(旧)</a>
					</div>
					<div id="navbar" class="navbar-collapse collapse">
						<ul class="nav navbar-nav">
							<li class="active"><a href="#">Home</a></li>
							<li class="inactive"><a href="/preferences">Preferences</a></li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown"
										role="button" aria-haspopup="true"
										aria-expanded="false">Dropdown <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="#">Action</a></li>
									<li><a href="#">Another action</a></li>
									<li><a href="#">Something else here</a></li>
									<li role="separator" class="divider"></li>
									<li class="dropdown-header">Nav header</li>
									<li><a href="#">Separated link</a></li>
									<li><a href="#">One more separated link</a></li>
								</ul>
							</li>
						</ul>
					</div><!--/.nav-collapse -->
				</div>
			</nav>

			<!-- ========================================================== -->
			<!-- Main Content -->
			<!-- ========================================================== -->
 			<div class="container theme-showcase" role="main">
				<div id="div-canvas" class="div-canvas" onmouseup="javascript: _on_dragend_canvas();" onmousedown="javascript: _on_begindrag_canvas();">
				</div>
			</div>

			<!-- ========================================================== -->
			<!-- Modal Sample -->
			<!-- ========================================================== -->
			<div id="div-input-box" class="div-input-box">
				コメント: <input type="text" name="txt-content" class="txt-content">
				<br>
				<button type="button" class="btn btn-sm btn-default" onclick="javascript: _on_click_apply();">apply</button>
				<button type="button" class="btn btn-sm btn-default" onclick="javascript: _onclick_text_cancel();">cancel</button>
			</div>

			<!-- ========================================================== -->
			<!-- Modal -->
			<!-- ========================================================== -->
			<div id="myModal" class="modal fade" role="dialog">
				<div class="modal-dialog">
					<!-- Modal content-->
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"
									onclick="javascript: _onclick_text_cancel();">&times;</button>
							<h4 class="modal-title">コメントを入力</h4>
						</div>
						<div class="modal-body">
							<!--p>Some text in the modal.</p-->
							<div class="form-group">
								<label for="field-01">title:</label>
								<input type="text" class="form-control" id="field-01">
							</div>
							<div class="form-group">
								<label for="comment">comment:</label>
								<textarea class="form-control" rows="5" id="comment"></textarea>
							</div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-default" data-dismiss="modal"
									onclick="javascript: _on_click_apply();">apply</button>
						</div>
					</div>
				</div>
			</div>

			<!-- ========================================================== -->
			<!-- footer -->
			<!-- ========================================================== -->

			<!-- ========================================================== -->
			<!-- end -->
			<!-- ========================================================== -->

		</form>
	</body>
</html>
