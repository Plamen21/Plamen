function showCourseNames() {
    let container = document.getElementById('courseContainer');
    if (container.style.display === 'block') {
        container.style.display = 'none';
        container.innerHTML = '';
    } else {
        // Извикване на API или заявка към сървъра за извличане на имената на курсовете
        fetch('/api/courses') // Променете пътя към вашето API за извличане на курсовете
            .then(response => response.json())
            .then(data => {
                // Извличане на имената на курсовете от получените данни
                let courseNames = data.map(course => course.title);
                let coursesIds = data.map(course => course.id);
                // Изграждане на HTML кода за показване на имената на курсовете
                for (let i = 0; i < courseNames.length; i++) {
                    let getId = coursesIds[i];
                    if (i % 2 === 0) {
                        let div = document.createElement('div');
                        div.className = 'dropdown-divider';
                        container.appendChild(div);
                    }
                    let anchor = document.createElement('a');
                    anchor.className = 'dropdown-item';
                    anchor.id = 'course' + getId;
                    anchor.textContent = courseNames[i];
                    anchor.href = '/course/' + getId;
                    container.appendChild(anchor);
                    container.style.display = 'block';


                }


            })
            .catch(error => console.error(error));
    }
}
