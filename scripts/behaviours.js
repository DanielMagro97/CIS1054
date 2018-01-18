window.onload = function () {
    /* Question 1 */
    alert("Hey, I'm alive");

    /* Question 2 */
    var d = new Date();
    var time = d.getHours();
    var greetingSpan = document.getElementById('greeting');
    if (greetingSpan) {
        if (time < 12) {
            greetingSpan.innerText = "Good Morning!";
        }
        if (time > 12 && time < 17) {
            greetingSpan.innerText = "Good Afternoon!";
        }
        if (time > 17) {
            greetingSpan.innerText = "Good Evening!";
        }
    }

    /* Question 3 */
    var image = document.getElementById('welcomeImg');
    if (image) {
        image.onclick = function () {
            var imgSrc = image.getAttribute('src');
            if (imgSrc === 'images/image1.jpg') {
                image.setAttribute('src', 'images/image2.jpg');
            }
            if (imgSrc === 'images/image2.jpg') {
                image.setAttribute('src', 'images/image1.jpg');
            }
        };
    }
};