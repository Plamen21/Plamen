function addInputFields(container_id,input_type) {
    let container=document.getElementById(container_id);
    console.log(container);
    let element=document.createElement('input');
    element.name = input_type + "[]";
    element.className="form-control";
    console.log(element);
    container.appendChild(element);

}

function showStudentCourses(studentId) {
    let container = document.getElementById('showStudentCourses');
    if (container.style.display === 'block') {
        container.style.display = 'none';
        container.innerHTML = '';
    } else {
        fetch(`/api/student/${studentId}/courses`)
            .then(response => response.json())
            .then(data => {
                let courseNames = data.map(course => course.course.title);
                let coursesIds = data.map(course => course.course.id);

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


document.addEventListener('alpine:init', () => {
    Alpine.data('slider', () => ({

    }))
});

function getCurrentStudent() {

}

document.addEventListener('alpine:init', () => {
    Alpine.data('slider', () => ({

        tab: 0,

        tabs: [...document.querySelectorAll('nav[role=tablist] a[role=tab]')],

        init() {

            this.changeSlide()
        },

        changeSlide() {
            let timeInterval = this.$refs.slider.dataset.interval;
            this.tabs[this.tab].setAttribute('class', 'active')


            let startInterval = () => {
                this.tab = (this.tab < this.tabs.length - 1)? this.tab + 1 : 0;
                this.tabs.forEach( (tab)=> {
                    (this.tab == this.tabs.indexOf(tab)) ?  tab.setAttribute('class', 'active') : tab.removeAttribute('class')
                })
            }

            let slideInterval = setInterval(startInterval, timeInterval);

            this.$refs.slider.onmouseover = () => {
                if (slideInterval) {
                    clearInterval(slideInterval)
                    slideInterval = null;
                }
            }

            this.$refs.slider.onmouseout = () => {
                if (slideInterval === null) {
                    slideInterval = setInterval(startInterval, timeInterval);
                }
            }

            this.tabs.forEach( (tab)=> {
                tab.addEventListener('click', (e)=> {
                    e.preventDefault()
                    this.tab = this.tabs.indexOf(e.target)
                    this.tabs.forEach( (tab)=> {
                        (this.tab == this.tabs.indexOf(tab)) ?  tab.setAttribute('class', 'active') : tab.removeAttribute('class')
                    })
                })
            })
        }
    }))
})

var fileInput = document.getElementById("upload-file");
                var fileNameSpan = document.getElementById("file-name");

                fileInput.addEventListener("change", function() {
                    var fileName = fileInput.files[0].name;
                    fileNameSpan.textContent = "Selected file: " + fileName;
                });

                document.getElementById("fileUpload").addEventListener("click", function(event) {
                    event.preventDefault();
                    fileInput.click();
                });


