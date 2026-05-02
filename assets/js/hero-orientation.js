document.addEventListener('DOMContentLoaded', function () {
    var img = document.querySelector('.post-hero-image');
    if (!img) return;

    function checkOrientation() {
        if (img.naturalHeight > img.naturalWidth) {
            img.classList.add('portrait');
        }
    }

    if (img.complete) {
        checkOrientation();
    } else {
        img.addEventListener('load', checkOrientation);
    }
});
