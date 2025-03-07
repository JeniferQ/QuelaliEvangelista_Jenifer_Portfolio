export function video() {
    const player = new Plyr('video'),
    video = document.querySelector("video"),
    videoCon = document.querySelector("#video");

    function checkVideoSource() {
        if (video.getAttribute("src") === "videos/") {
            console.log('Empty video player');
            videoCon.classList.add("hidden");
        }
    }

    checkVideoSource();
}