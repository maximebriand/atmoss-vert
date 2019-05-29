jQuery(document).ready(function($) {

    function trackLocation(e) {
        e.preventDefault();
        var rect = videoContainer.getBoundingClientRect(),
            position = ((e.pageX - rect.left) / videoContainer.offsetWidth) * 100;
        if (position <= 100) {
            videoClipper.style.width = position + "%";
            clippedVideo.style.width = ((100 / position) * 100) + "%";
            clippedVideo.style.zIndex = 3;
        }
    }
    var videoContainer = $('.beforeAfter')[0],
        videoClipper = $('.cd-resize-img')[0],
        clippedVideo = videoClipper.getElementsByTagName("img")[0];
    videoContainer.addEventListener("mousemove", trackLocation, false);
    videoContainer.addEventListener("touchstart", trackLocation, false);
    videoContainer.addEventListener("touchmove", trackLocation, false);
});