document.addEventListener('DOMContentLoaded', function() {
    const inputFile = document.getElementById('change_avatar');

    inputFile.addEventListener('change', function() {
        this.form.submit();
    });
});