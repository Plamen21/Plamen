$(document).ready(function() {

    var initialProjectsTableRows = $('#projectTable').html();

    $('#modules, #courses').on('change', function() {
        $('#projectTable').html(initialProjectsTableRows);
    });
            $('#modules').on('change', function() {
                var initialProjectsTableRows = $('#projectsTable').html();
                let moduleId = $(this).val();
                let courseId = $('#courses').val();
                let studentId = $('#student').val();
                let projectsUrl2 = '/projects/' + studentId + '/' + courseId + '/' + moduleId;

                $.get(projectsUrl2, function(projectsData) {
                let projectsRows = projectsData;
                let projectsTable = '';
                if (projectsRows.length > 0) {
                    projectsRows.forEach(function(row, i) {
                        let projectName = row.project_name;
                        let projectScore = row.project_score;
                        let grade = '';

                        if (projectScore === 'Satisfactory' || projectScore === 'Unsatisfactory') {
                            tags = 'not working';
                            grade = '4';
                        } else if (projectScore === 'Excellent') {
                            grade = '6';
                        } else if (projectScore === 'Good') {
                            grade = '5';
                        } else {
                            grade = '3';
                        }

                        projectTable = `
                            <tr id="row${i}">
                                <td style="border: 1px solid black; width: 2%">
                                    <input type="text" name="projectName" value="${projectName}">
                                </td>
                                <td style="border: 1px solid black;">
                                    <input type="checkbox" name="projectStatus1[]" value="Has project" style="display: inline-block;margin-left: 10px;" ${grade >= '2' ? 'checked' : ''}>
                                    <label for="disregarded" style="display: inline-block; margin-right: 30px;">Has project</label>
                                    <input type="checkbox" name="projectStatus1[]" value="not working" style="display: inline-block;"${row.homework_status == 'Unsatisfactory ' ? 'checked' : ''}>
                                    <label for="disregarded" style="display: inline-block; margin-right: 40px;">not working</label>
                                    <input type="checkbox" name="projectStatus1[]" value="on time" style="display: inline-block;"${row.homework_status !== 'Excellent' ? 'checked' : ''}>
                                    <label for="disregarded" style="display: inline-block; margin-right: 10px;">on time</label>
                                </td>
                                <td style="border: 1px solid black;">
                                    <input type="text" name="projectGrade" value="${grade}">
                                </td>
                            </tr>
                        `;
                    });



                }
                $('#projectTable').html(projectTable);
            });



            });
        });

