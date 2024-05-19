function copyPhone() {
    // Get the content to be copied
    var content = "0965279041";

    // Create a temporary textarea element
    var tempInput = document.createElement("textarea");
    tempInput.value = content;
    document.body.appendChild(tempInput);

    // Select the content and copy it to the clipboard
    tempInput.select();
    document.execCommand("copy");

    // Remove the temporary textarea element
    document.body.removeChild(tempInput);

    // Change the button icon to "fas fa-copy"
    var button = document.querySelector(".btnPhone");
    button.innerHTML = '<i class="fas fa-copy"></i>';

    // Show a success message
    alert("đã copy số điện thoại thành công !");
}
function copyEmail() {
    // Get the content to be copied
    var content = "nguyenhieu3105@gmail.com";

    // Create a temporary textarea element
    var tempInput = document.createElement("textarea");
    tempInput.value = content;
    document.body.appendChild(tempInput);

    // Select the content and copy it to the clipboard
    tempInput.select();
    document.execCommand("copy");

    // Remove the temporary textarea element
    document.body.removeChild(tempInput);

    // Change the button icon to "fas fa-copy"
    var button = document.querySelector(".btnEmail");
    button.innerHTML = '<i class="fas fa-copy"></i>';

    // Show a success message
    alert("đã copy email thành công !");
}