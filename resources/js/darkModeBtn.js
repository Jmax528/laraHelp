// toggles dark mode
document.addEventListener("DOMContentLoaded", () => {

    function darkMode() {
        const darkModeBtn = document.getElementById('darkModeBtn');
        if (!darkModeBtn) return;

        //grab the button, grab the svg path, the "d" atribute within it and replace the content of "d"
        const path = document.getElementById('svgPath');
        const svgSun = path.getAttribute('d');
        const svgMoon = "M12 21a9 9 0 0 1-.5-17.986V3c-.354.966-.5 1.911-.5 3a9 9 0 0 0 9 9c.239 0 .254.018.488 0A9.004 9.004 0 0 1 12 21Z";

        //toggle the CSS for between light mode and dark mode, swap the SVG pattern between a sun and a moon
        const darkMode = document.getElementsByClassName('dark' );
        darkModeBtn.addEventListener('click', () => {
            for (let el of darkMode) {
                el.classList.toggle('dark-mode');
            }
            if (path.getAttribute('d') === svgSun) {
                path.setAttribute('d', svgMoon)
            } else {
                path.setAttribute('d', svgSun);
            }
        });
    }
    darkMode();
})
