<!DOCTYPE html>
<html>
<body>
	<div id="container">
		<video autoplay="true"></video>
	</div>
	<button class="btn" onclick="startWebCam()">Start</button>
	<script type="text/javascript">
		var video = document.querySelector("video");
		function startWebCam() {
			if (navigator.mediaDevices.getUserMedia) {
				navigator.mediaDevices.getUserMedia({ video: true })
			    	.then(function (stream) {
			      		video.srcObject = stream;
			    	})
			    	.catch(function (err0r) {
			      		console.log("Something went wrong!");
			    	});
			}
		}
		startWebCam();
	</script>
</body>
</html>
