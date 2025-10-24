// Hàm để lấy giá trị cookie theo tên
function getCookie(name) {
    const value = `; ${document.cookie}`;
    const parts = value.split(`; ${name}=`);
    if (parts.length === 2) return parts.pop().split(';').shift();
}

// Hàm để cập nhật chế độ ánh sáng
function updateLightMode() {
    const lightModeCookie = getCookie('mode_light');
    const body = document.body;
    const icon = document.querySelector('#mode-light i');

    if (lightModeCookie === 'on') {
        body.classList.add('light');
        icon.className = 'bi bi-brightness-high';
    } else {
        body.classList.remove('light');
        icon.className = 'bi bi-moon-stars';
    }
}

// Hàm để chuyển đổi cookie
function toggleLightMode() {
    const lightModeCookie = getCookie('mode_light');
    const newMode = (lightModeCookie === 'on') ? 'off' : 'on';

    // Cập nhật cookie
    document.cookie = `mode_light=${newMode}; path=/; max-age=${60 * 60 * 24 * 365}`; // Hạn 1 năm
    updateLightMode(); // Cập nhật giao diện sau khi thay đổi cookie
}

// Kiểm tra và cập nhật chế độ khi trang được tải
updateLightMode();

// Thêm sự kiện click cho nút
document.getElementById('mode-light').addEventListener('click', toggleLightMode);