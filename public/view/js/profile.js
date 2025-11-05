document.addEventListener('DOMContentLoaded', function() {
    const inputFileAvatar = document.getElementById('change_avatar');
    const inputFileBanner = document.getElementById('change_banner');

    inputFileAvatar.addEventListener('change', function() {
        this.form.submit();
    });

    inputFileBanner.addEventListener('change', function() {
        this.form.submit();
    });
});