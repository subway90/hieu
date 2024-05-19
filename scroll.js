var scrollButton = document.getElementById("scrollButton");

// Hiển thị/ẩn nút khi cuộn trang
window.onscroll = function() {
    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
    scrollButton.style.display = "block";
    } else {
    scrollButton.style.display = "none";
    }
};

// Kéo lên đầu trang khi nhấp vào nút
scrollButton.addEventListener("click", function() {
    document.body.scrollTop = 0; // Dành cho trình duyệt Chrome, Safari
    document.documentElement.scrollTop = 0; // Dành cho trình duyệt Firefox, IE
});