<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<button onclick="Open()">open</button>
	<div id="modal" style="width: 300px;height: 300px;background-color: red;display: none;">
		<h1>Shalini</h1>
	</div>
	<script type="text/javascript">
	function Open(){
		document.getElementById('modal').style.display="block";
	}	
	</script>

</body>
</html>