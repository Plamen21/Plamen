$(document).ready(function() {
    var initialHomeworkTableRows = $('#homeworkTable').html();

    $('#lectures, #modules, #courses').on('change', function() {
        $('#homeworkTable').html(initialHomeworkTableRows);
    });

    $('#lectures').on('change', function() {
        let lectureId = $(this).val();
        let moduleId = $('#modules').val();
        let courseId = $('#courses').val();
        let studentId = $('#student').val();

        let homeworkUrl = '/homework/' + studentId + '/' + courseId + '/' + moduleId + '/' + lectureId;
        $.get(homeworkUrl, function(homeworkData) {
            let rows = homeworkData;

            let homeworkTable = '';
            if (rows.length > 0) {
                rows.forEach(function(row, index) {

                    homeworkTable += `
                        <tr id="row${index}">
                            <td style="border: 1px solid black; width: 2%">
                                <input type="text" name="homeworkName" value="${row.lecture_id}">
                            </td>
                            <td style="border: 1px solid black;">
                                <input type="checkbox" name="homeworkStatus1[]" value="Has homework" style="display: inline-block;margin-left: 10px;" ${row.homework_status !== 'None' ? 'checked' : ''}>
                                <label for="disregarded" style="display: inline-block; margin-right: 30px;">Has homework</label>
                                <input type="checkbox" name="homeworkStatus1[]" value="not working" style="display: inline-block;" ${row.homework_status == 'Incomplete' ? 'checked' : ''}>
                                <label for="disregarded" style="display: inline-block; margin-right: 40px;">not working</label>
                                <input type="checkbox" name="homeworkStatus1[]" value="on time" style="display: inline-block;"  ${row.grade >= '5' ? 'checked' : ''}>
                                <label for="disregarded" style="display: inline-block; margin-right: 10px;">on time</label>
                            </td>
                            <td style="border: 1px solid black;">
                                <input type="text" name="homeworkgrades" value="${row.grade}">
                            </td>
                        </tr>
                    `;
                });
                $('#homeworkTable').html(homeworkTable);
            }
        });

    });



    });
