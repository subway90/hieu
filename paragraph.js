const paragraph = document.querySelector('p');
const text = paragraph.textContent;
paragraph.textContent = '';

let i = 0;
function typeWriter() {
    if (i < text.length) {
        paragraph.textContent += text.charAt(i);
        i++;
        setTimeout(typeWriter, 50); // Chạy chữ với tốc độ 50ms/ký tự
    }
}

typeWriter();