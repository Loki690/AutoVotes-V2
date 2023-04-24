<!DOCTYPE html>
<html>
<head>
	<title>QR Code Generator</title>
	<script src="https://cdn.rawgit.com/davidshimjs/qrcodejs/gh-pages/qrcode.min.js"></script>
	<style>
		#qrcode img {
    border: none; /* Remove the border around the QR code */
    display: block; /* Remove any extra spacing around the QR code */
    margin: 0 auto; /* Center the QR code horizontally */
}
	</style>
</head>
<body>
	<h1>QR Code Generator</h1>
	<div id="qrcode">
        <img src="" alt="">
    </div>
	<form>
		<label for="input">Enter text to encode:</label>
		<input type="text" id="input" name="input">
		<button type="button" onclick="generateQR()" id="generate-btn">Generate QR Code</button>
	</form>
	<button type="button" onclick="downloadQR()" id="download-btn" disabled>Download QR Code</button>
	<script>
		var qrcode;
		function generateQR() {
			var input = document.getElementById("input").value;
			if (input.trim() === "") {
				alert("Please enter some text to encode.");
				return;
			}
			qrcode = new QRCode(document.getElementById("qrcode"), {
				text: input,
				width: 256,
				height: 256,
				colorDark : "#000000",
				colorLight : "#ffffff",
				correctLevel : QRCode.CorrectLevel.H
			});
			document.getElementById("generate-btn").disabled = true;
			document.getElementById("download-btn").disabled = false;
		}
		function downloadQR() {
			var canvas = document.getElementsByTagName("canvas")[0];
			var img = canvas.toDataURL("image/png");
			var link = document.createElement("a");
			link.download = "qrcode.png";
			link.href = img;
			link.click();
		}
	</script>
</body>
</html>