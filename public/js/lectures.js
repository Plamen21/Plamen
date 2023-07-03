$(document).ready(function() {
    $('#modules').on('change', function() {
        let id = $(this).val();
        let url = '/lectures/' + id;
        if (id) {
            $.get(url, function(lectures) {
                let lectureHtml = '<option value=""> Select lecture</option>';
                for (const lecture of lectures) {
                    lectureHtml += '<option value="' + lecture.lecture_number + '">' + lecture.lecture_number + '. ' + lecture.lecture_name + '</option>';
                }
                $('#lectures').html(lectureHtml);
            });
        } else {
            $('#lectures').html('<option value="">Select lecture</option>');
        }
    });
});
