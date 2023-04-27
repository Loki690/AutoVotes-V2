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
    colorDark: "#000000",
    colorLight: "#ffffff",
    correctLevel: QRCode.CorrectLevel.H,
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
