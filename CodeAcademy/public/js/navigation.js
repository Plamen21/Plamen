

function showCourseNames() {
    // Извикване на API или заявка към сървъра за извличане на имената на курсовете
    fetch('/api/courses') // Променете пътя към вашето API за извличане на курсовете
        .then(response => response.json())
        .then(data => {
            // Извличане на имената на курсовете от получените данни
            var courseNames = data.map(course => course.title);
            var coursesIds= data.map(course=>course.id);
            var courseNamesHTML='';
            var courseNamesContainer = document.getElementById('courseNamesContainer');
            // Изграждане на HTML кода за показване на имената на курсовете
            for (var i = 0; i < courseNames.length; i++) {
                var getId=coursesIds[i];
                if (i%2===0){
                    courseNamesHTML += '<li class="dropdown-divider"></li>';
                }

                courseNamesHTML += '<li class="nav-item"><a class="dropdown-item" id="' + getId + '" href="course/getId">' + courseNames[i] + '</a></li>';
            }

            // Показване на имената на курсовете в контейнера

            courseNamesContainer.innerHTML = courseNamesHTML;
        })
        .catch(error => console.error(error));
}
