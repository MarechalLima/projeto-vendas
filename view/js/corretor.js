//var editor = document.getElementById("editor-texto");

//editor.addEventListener('input', function() {
//  getFormat();
//});

function getContent() {
  document.getElementById("texto-email").value = document.getElementById("editor-texto").innerHTML;
  console.log("textoo:" + document.getElementById("editor-texto").innerHTML)
}

function formatCode(command, value) {
  document.getElementById("editor-texto").focus();
  document.execCommand(command, false, value);

}

function setColor(color, cmd) {
  document.getElementById("editor-texto").focus();
  document.execCommand('styleWithCSS', false, true);
  document.execCommand(cmd, false, color)
}
