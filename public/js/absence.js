$(document).ready(function() {
    $('#lectures').on('change', function() {
        let lectureId = $(this).val();
        let moduleId = $('#modules').val();
        let courseId = $('#courses').val();
        let studentId = $('#student').val();

        let url = '/absences/' + studentId + '/' + courseId + '/' + moduleId + '/' + lectureId;
        $.get(url, function(data) {
            if (data && data.length > 0) {
                let absenceReason = data[0].absence;
                $('input[name="absenceReason"]').prop('checked', false);
                if (absenceReason === 'Was late') {
                    $('#wasLate').prop('checked', true);
                } else if (absenceReason === 'Escaped') {
                    $('#escaped').prop('checked', true);
                } else if (absenceReason === 'Did not come') {
                    $('#didNotCome').prop('checked', true);
                }

                let absenceNote = data[0].absence_note;
                $('#absenseDescription').val(absenceNote);
            } else {
                $('input[name="absenceReason"]').prop('checked', false);
                $('#absenseDescription').val('');
            }
        });
    });
});
