$(document).ready(function() {
    $('#courses').on('change', function() {
        let studentId = $('#student').val();
        let moduleId = $('#modules').val();
        let courseId = $('#courses').val();
        let url3 = '/grades/' + studentId;
        if (courseId){
            $.get(url3, function (grades) {

                let overallGradesum = 0;
                let overallGradeCount = 0;

                for (const grade of grades) {
                    if(grade.course_id == courseId) {
                    overallGradesum += parseFloat(grade.grade)
                    overallGradeCount++;
                    }
                }

                if (overallGradesum && overallGradeCount){
                let overallGrede = overallGradesum / overallGradeCount;
                overallGrede = overallGrede.toFixed(2);
                $('#overalGrade').text(overallGrede);

                } else {
                    $('#overalGrade').text('');
                }
            });

        } else {
            $('#overalGrade').text('');
        }
    });
    $('#modules').on('change', function() {
        let studentId = $('#student').val();
        let moduleId = $('#modules').val();
        let courseId = $('#courses').val();
        let url3 = '/grades/' + studentId;
        if (moduleId && courseId ){
            $.get(url3, function (grades) {

                let moduleGradesum = 0;
                let moduleGradeCount = 0;

                for (const grade of grades) {
                    if(grade.course_id == courseId && grade.module_id == moduleId) {
                    moduleGradesum += parseFloat(grade.grade)
                    moduleGradeCount++;
                    }
                }

                if (moduleGradesum && moduleGradeCount){
                let moduleGrede = moduleGradesum / moduleGradeCount;
                moduleGrede = moduleGrede.toFixed(2);
                $('#moduleGrade').text(moduleGrede);

                } else {
                    $('#moduleGrade').text('');
                }
            });

        } else {
            $('#moduleGrade').text('');
        }
    });
    $('#lectures').on('change', function() {
        let studentId = $('#student').val();
        let lectureId = $(this).val();
        let moduleId = $('#modules').val();
        let courseId = $('#courses').val();
        let url3 = '/grades/' + studentId;
        if (moduleId && courseId && lectureId){
            $.get(url3, function (grades) {

                let lectureGradesum = 0;
                let lectureGradeCount = 0;

                for (const grade of grades) {
                    if(grade.course_id == courseId && grade.module_id == moduleId && grade.lecture_id == lectureId) {
                    lectureGradesum += parseFloat(grade.grade)
                    lectureGradeCount++;
                    }
                }

                if (lectureGradesum && lectureGradeCount){
                let lectureGrede = lectureGradesum / lectureGradeCount;
                lectureGrede = lectureGrede.toFixed(2);
                $('#lectureGrade').text(lectureGrede);

                } else {
                    $('#lectureGrade').text('');
                }
            });

        } else {
            $('#lectureGrade').text('');
        }
    });
});
